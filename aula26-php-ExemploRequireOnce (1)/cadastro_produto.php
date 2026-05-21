<?php
require_once "config.php";
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = floatval($_POST['preco']);
    $estoque = intval($_POST['estoque']);
    $nome_foto = null;

    // Validações do Exercício 7
    if ($preco <= 0) {
        echo "<p style='color:red;'>O preço precisa ser maior que zero!</p>";
    } elseif ($estoque < 0) {
        echo "<p style='color:red;'>O estoque não pode ser negativo!</p>";
    } else {
        // Verifica se enviaram um arquivo de imagem
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            
            // Gera um nome único pro arquivo para não substituir fotos com o mesmo nome
            $nome_foto = uniqid() . "." . $extensao;
            
            // Move da pasta temporária do PHP para a sua pasta 'uploads'
            move_uploaded_file($_FILES['imagem']['tmp_name'], "uploads/" . $nome_foto);
        }

        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $estoque, $nome_foto]);

        header("Location: produtos.php");
        exit;
    }
}
?>

<h3>Novo Produto</h3>
<form method="POST" enctype="multipart/form-data">
    Nome do Produto: <input type="text" name="nome" required><br><br>
    Descrição: <textarea name="descricao"></textarea><br><br>
    Preço: <input type="number" name="preco" step="0.01" required><br><br>
    Estoque: <input type="number" name="estoque" required><br><br>
    Foto do Produto: <input type="file" name="imagem"><br><br>
    <button type="submit">Salvar Produto</button>
</form>

<?php include "rodape.php"; ?>