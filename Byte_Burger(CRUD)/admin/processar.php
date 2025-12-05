<?php
require_once 'auth.php';
require_once __DIR__ . '/../config/conexao.php';

// Diretório de imagens do projeto Thegame (onde as imagens são salvas)
$uploadDir = __DIR__ . '/../../Thegame/images/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['acao'];

    if ($acao == 'cadastrar') {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        // Upload da imagem
        $imagemNome = '';
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $imagemNome = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadDir . $imagemNome);
        }

        $sql = "INSERT INTO produto (nomeProduto, precoProduto, fichaTecnica, imagemProduto) VALUES ('$nome', '$preco', '$descricao', '$imagemNome')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
    alert('Produto cadastrado com sucesso!');
    window.location.href = 'listar.php';
</script>";
        } else {
            echo "<script>
    alert('Erro ao cadastrar: " . mysqli_error($conn) . "');
    window.history.back();
</script>";
        }
    } elseif ($acao == 'editar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE produto SET nomeProduto='$nome', precoProduto='$preco', fichaTecnica='$descricao'";

        // Se enviou nova imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $imagemNome = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadDir . $imagemNome);

            $sql .= ", imagemProduto='$imagemNome'";
        }

        $sql .= " WHERE idProduto='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
    alert('Produto atualizado com sucesso!');
    window.location.href = 'listar.php';
</script>";
        } else {
            echo "<script>
    alert('Erro ao atualizar: " . mysqli_error($conn) . "');
    window.history.back();
</script>";
        }
    }
} elseif (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM produto WHERE idProduto='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
    alert('Produto excluído com sucesso!');
    window.location.href = 'listar.php';
</script>";
    } else {
        echo "<script>
    alert('Erro ao excluir: " . mysqli_error($conn) . "');
    window.location.href = 'listar.php';
</script>";
    }
}
