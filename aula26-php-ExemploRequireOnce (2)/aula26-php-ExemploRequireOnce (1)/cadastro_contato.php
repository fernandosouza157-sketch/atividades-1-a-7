<?php
require_once "config.php";
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (!empty($nome) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $telefone]);
        
        header("Location: index.php");
        exit;
    } else {
        echo "<p class='alerta-erro'>Nome e E-mail são obrigatórios!</p>";
    }
}
?>

<h3>Novo Contato</h3>
<form method="POST" class="form-agenda">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" required>
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone">
    </div>
    <button type="submit" class="btn-salvar">Salvar Contato</button>
</form>

<?php include "rodape.php"; ?>