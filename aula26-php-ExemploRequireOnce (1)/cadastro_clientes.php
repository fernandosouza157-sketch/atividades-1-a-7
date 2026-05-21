<?php
require_once "config.php";
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    // Validação de 14 caracteres exigida no PDF (Exemplo: 000.000.000-00)
    if (strlen($cpf) !== 14) {
        echo "<p style='color:red;'>O CPF deve ter o formato 000.000.000-00 (14 caracteres).</p>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, endereco) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $cpf, $email, $endereco]);
        
        header("Location: clientes.php");
        exit;
    }
}
?>

<h3>Novo Cliente</h3>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    CPF: <input type="text" name="cpf" placeholder="000.000.000-00" required><br><br>
    E-mail: <input type="email" name="email" required><br><br>
    Endereço: <input type="text" name="endereco"><br><br>
    <button type="submit">Salvar</button>
</form>

<?php include "rodape.php"; ?>