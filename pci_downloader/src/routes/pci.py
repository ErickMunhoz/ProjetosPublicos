import os
import re
import requests
import unicodedata
from flask import Blueprint, request, jsonify, send_file
from urllib.parse import urljoin, urlparse
import tempfile
import zipfile
from datetime import datetime

pci_bp = Blueprint('pci', __name__)

# Global storage for downloaded files (in production, use a proper database)
downloaded_files = {}

def slugify(value):
    """Remove special characters and normalize text for filename compatibility"""
    value = str(value)
    value = unicodedata.normalize("NFKD", value).encode("ascii", "ignore").decode("utf-8")
    value = re.sub(r"[^\w\s-]", "", value).strip()
    return value

def extract_and_format_info(page_content):
    """Extract contest information from page content and format it"""
    # Try different patterns to extract information
    cargo_patterns = [
        r'##### Prova (.*?) - DPE/RS',
        r'<h5[^>]*>Prova (.*?) - DPE/RS</h5>',
        r'Prova (.*?) - DPE/RS'
    ]
    
    cargo_val = ''
    for pattern in cargo_patterns:
        cargo = re.search(pattern, page_content)
        if cargo:
            cargo_val = cargo.group(1).strip()
            break
    
    # Extract other information
    ano = re.search(r'\*\*Ano:\*\* (\d{4})', page_content)
    orgao = re.search(r'\*\*Órgão:\*\* \[([^\]]+)\]', page_content)
    instituicao = re.search(r'\*\*Instituição:\*\* \[([^\]]+)\]', page_content)
    nivel = re.search(r'\*\*Nível:\*\* (.*?)\n', page_content)

    ano_val = ano.group(1).strip() if ano else ''
    orgao_val = orgao.group(1).strip() if orgao else ''
    instituicao_val = instituicao.group(1).strip() if instituicao else ''
    nivel_val = nivel.group(1).strip() if nivel else ''

    # Apply slugify to remove special characters and normalize
    formatted_cargo = slugify(cargo_val).replace('-', ' ').replace('  ', ' ').strip()
    formatted_orgao = slugify(orgao_val).replace('-', ' ').replace('  ', ' ').strip()
    formatted_instituicao = slugify(instituicao_val).replace('-', ' ').replace('  ', ' ').strip()
    formatted_nivel = slugify(nivel_val).replace('-', ' ').replace('  ', ' ').strip()

    # Capitalize first letter of each word in formatted_cargo
    formatted_cargo = ' '.join([word.capitalize() for word in formatted_cargo.split()])

    # Construct the desired string format
    output_string = f"Cargo {formatted_cargo} Ano {ano_val} Órgão {formatted_orgao} Instituição {formatted_instituicao} Nível {formatted_nivel}"
    return output_string

def get_download_links_from_page(url):
    """Fetch page content and extract download links"""
    try:
        headers = {
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        }
        response = requests.get(url, headers=headers)
        response.raise_for_status()
        page_content = response.text
        
        # Extract PDF download links using multiple patterns
        pdf_patterns = [
            r'href="([^"]*\.pdf)"',
            r"href='([^']*\.pdf)'",
            r'href=([^\s>]*\.pdf)'
        ]
        
        pdf_links = []
        for pattern in pdf_patterns:
            links = re.findall(pattern, page_content)
            pdf_links.extend(links)
        
        # Remove duplicates and convert relative URLs to absolute URLs
        unique_links = list(set(pdf_links))
        absolute_links = []
        for link in unique_links:
            if link.startswith('http'):
                absolute_links.append(link)
            else:
                absolute_links.append(urljoin(url, link))
        
        return page_content, absolute_links
    except Exception as e:
        raise Exception(f"Erro ao acessar a página: {str(e)}")

def download_and_rename_files(formatted_name, download_links):
    """Download PDF files and rename them according to the specified format"""
    downloads = []
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    
    try:
        for i, link in enumerate(download_links):
            try:
                headers = {
                    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
                }
                response = requests.get(link, headers=headers)
                response.raise_for_status()
                
                # Determine file type based on original filename
                original_filename = link.split('/')[-1].lower()
                
                if 'gabarito' in original_filename:
                    new_filename = f"{formatted_name} GABARITO.pdf"
                else:
                    new_filename = f"{formatted_name} PROVA.pdf"
                
                # Create unique filename to avoid conflicts
                unique_filename = f"{timestamp}_{new_filename}"
                
                # Save file with new name in temp directory
                temp_dir = tempfile.gettempdir()
                file_path = os.path.join(temp_dir, unique_filename)
                with open(file_path, 'wb') as f:
                    f.write(response.content)
                
                # Store in global dictionary for later retrieval
                downloaded_files[unique_filename] = {
                    'path': file_path,
                    'original_name': new_filename,
                    'timestamp': timestamp
                }
                
                downloads.append({
                    'filename': new_filename,
                    'unique_filename': unique_filename,
                    'path': file_path,
                    'url': link
                })
                
            except Exception as e:
                print(f"Erro ao baixar {link}: {str(e)}")
                continue
    
    except Exception as e:
        raise Exception(f"Erro durante o download: {str(e)}")
    
    return downloads

@pci_bp.route('/process', methods=['POST'])
def process_pci_url():
    """Process PCI Concursos URL and download/rename files"""
    try:
        data = request.get_json()
        url = data.get('url')
        
        if not url:
            return jsonify({'error': 'URL é obrigatória'}), 400
        
        if 'pciconcursos.com.br' not in url:
            return jsonify({'error': 'URL deve ser do site PCI Concursos'}), 400
        
        # Get page content and download links
        page_content, download_links = get_download_links_from_page(url)
        
        if not download_links:
            return jsonify({'error': 'Nenhum link de download encontrado na página'}), 404
        
        # Extract and format contest information
        formatted_name = extract_and_format_info(page_content)
        
        # Download and rename files
        downloads = download_and_rename_files(formatted_name, download_links)
        
        if not downloads:
            return jsonify({'error': 'Nenhum arquivo foi baixado com sucesso'}), 500
        
        # Create response with download information
        download_info = []
        for download in downloads:
            download_info.append({
                'filename': download['filename'],
                'url': f"/api/pci/download/{download['unique_filename']}"
            })
        
        return jsonify({
            'message': f'Processamento concluído! {len(downloads)} arquivo(s) baixado(s) e renomeado(s).',
            'formatted_name': formatted_name,
            'downloads': download_info
        })
        
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@pci_bp.route('/download/<filename>')
def download_file(filename):
    """Serve downloaded files"""
    try:
        if filename in downloaded_files:
            file_info = downloaded_files[filename]
            file_path = file_info['path']
            original_name = file_info['original_name']
            
            if os.path.exists(file_path):
                return send_file(file_path, as_attachment=True, download_name=original_name)
            else:
                return jsonify({'error': 'Arquivo não encontrado no sistema'}), 404
        else:
            return jsonify({'error': 'Arquivo não encontrado'}), 404
            
    except Exception as e:
        return jsonify({'error': str(e)}), 500

