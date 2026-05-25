<?php
require_once "config.php";
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = floatval($_POST['preco']);
    $estoque = intval($_POST['estoque']);
    $nome_foto = null;

    if ($preco <= 0) {
        echo "<p class='alerta-erro'>O preço precisa ser maior que zero!</p>";
    } elseif ($estoque < 0) {
        echo "<p class='alerta-erro'>O estoque não pode ser negativo!</p>";
    } else {
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $nome_foto = uniqid() . "." . $extensao;
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
<form method="POST" enctype="multipart/form-data" class='form-agenda'>
    <div class="form-group">
        <label>Nome do Produto:</label>
        <input type="text" name="nome" required>
    </div>
    
    <div class="form-group">
        <label>Descrição:</label>
        <textarea name="descricao"></textarea>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label>Preço:</label>
            <input type="number" name="preco" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Estoque:</label>
            <input type="number" name="estoque" required>
        </div>
    </div>
    
    <div class="form-group">
        <label>Foto do Produto:</label>
        <input type="file" name="imagem" class="input-file">
    </div>
    
    <button type="submit" class="btn-salvar">Salvar Produto</button>
</form>

<?php include "rodape.php"; ?>