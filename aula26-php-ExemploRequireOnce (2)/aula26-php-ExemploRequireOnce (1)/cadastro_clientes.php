<?php
require_once "config.php";
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    if (strlen($cpf) !== 14) {
        echo "<p class='alerta-erro'>O CPF deve ter o formato 000.000.000-00 (14 caracteres).</p>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, endereco) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $cpf, $email, $endereco]);
        
        header("Location: clientes.php");
        exit;
    }
}
?>

<h3>Novo Cliente</h3>
<form method="POST" class="form-agenda">
    <div class="form-group">
        <label>Nome Completo:</label>
        <input type="text" name="nome" required>
    </div>
    <div class="form-group">
        <label>CPF:</label>
        <input type="text" name="cpf" placeholder="000.000.000-00" required>
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Endereço Residencial:</label>
        <input type="text" name="endereco">
    </div>
    <button type="submit" class="btn-salvar">Salvar Cliente</button>
</form>

<?php include "rodape.php"; ?>