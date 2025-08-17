# Automatizador PCI Concursos

Uma aplicação web que automatiza o processo de download e renomeação de arquivos PDF do site PCI Concursos.

## Funcionalidades

- ✅ Extração automática de informações do concurso (cargo, ano, órgão, instituição, nível)
- ✅ Download automático de arquivos PDF (prova e gabarito)
- ✅ Renomeação automática dos arquivos conforme formato especificado
- ✅ Interface web intuitiva e responsiva
- ✅ Suporte a caracteres especiais e acentos

## Formato de Renomeação

Os arquivos são renomeados seguindo o padrão:

```
Cargo [Nome do Cargo] Ano [Ano] Órgão [Órgão] Instituição [Instituição] Nível [Nível] [PROVA/GABARITO]
```

### Exemplo:
- **Original:** `analista_area_de_apoio_especializado_tecnologia_da_informacao_desenvolvimento_de_sistemas.pdf`
- **Renomeado:** `Cargo Analista Area De Apoio Especializado Tecnologia Da Informacao Desenvolvimento De Sistemas Ano 2023 Órgão DPERS Instituição FGV Nível Superior PROVA.pdf`

## Como Usar

1. **Acesse a aplicação** em seu navegador
2. **Cole a URL** da página de download do PCI Concursos no campo de entrada
3. **Clique em "Processar e Baixar"**
4. **Aguarde o processamento** - a aplicação irá:
   - Acessar a página do PCI Concursos
   - Extrair as informações do concurso
   - Baixar os arquivos PDF disponíveis
   - Renomear os arquivos conforme o padrão especificado
5. **Baixe os arquivos** clicando nos links fornecidos

## Exemplo de URL Suportada

```
https://www.pciconcursos.com.br/provas/download/analista-area-de-apoio-especializado-tecnologia-da-informacao-desenvolvimento-de-sistemas-dpe-rs-fgv-2023
```

## Instalação e Execução

### Pré-requisitos
- Python 3.11+
- pip

### Passos para Instalação

1. **Clone ou baixe o projeto**
2. **Navegue até o diretório do projeto:**
   ```bash
   cd pci_downloader
   ```

3. **Ative o ambiente virtual:**
   ```bash
   source venv/bin/activate
   ```

4. **Instale as dependências:**
   ```bash
   pip install -r requirements.txt
   ```

5. **Execute a aplicação:**
   ```bash
   python src/main.py
   ```

6. **Acesse no navegador:**
   ```
   http://localhost:5000
   ```

## Estrutura do Projeto

```
pci_downloader/
├── src/
│   ├── main.py              # Arquivo principal da aplicação Flask
│   ├── routes/
│   │   ├── pci.py          # Rotas para processamento do PCI Concursos
│   │   └── user.py         # Rotas de usuário (template)
│   ├── models/
│   │   └── user.py         # Modelos de banco de dados
│   ├── static/
│   │   └── index.html      # Interface web principal
│   └── database/
│       └── app.db          # Banco de dados SQLite
├── venv/                   # Ambiente virtual Python
├── requirements.txt        # Dependências do projeto
└── README.md              # Este arquivo
```

## Tecnologias Utilizadas

- **Backend:** Flask (Python)
- **Frontend:** HTML, CSS, JavaScript
- **Processamento:** Requests, Regex, Unicodedata
- **Banco de dados:** SQLite (Flask-SQLAlchemy)

## Características Técnicas

- **Normalização de texto:** Remove acentos e caracteres especiais para compatibilidade com Windows
- **Headers HTTP:** Utiliza User-Agent para evitar bloqueios
- **Gestão de arquivos:** Armazena temporariamente os arquivos baixados
- **Interface responsiva:** Funciona em desktop e mobile
- **Tratamento de erros:** Mensagens de erro claras para o usuário

## Limitações

- Funciona especificamente com o formato de páginas do PCI Concursos
- Arquivos são armazenados temporariamente no servidor
- Requer conexão com a internet para acessar as páginas do PCI Concursos

## Suporte

Para dúvidas ou problemas, verifique:
1. Se a URL fornecida é válida e do site PCI Concursos
2. Se há conexão com a internet
3. Se os arquivos PDF estão disponíveis na página original

## Licença

Este projeto foi desenvolvido para uso educacional e pessoal.

