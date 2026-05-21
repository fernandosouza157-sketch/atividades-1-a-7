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
        echo "<p style='color:red;'>Nome e E-mail são obrigatórios!</p>";
    }
}
?>

<h3>Novo Contato</h3>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    E-mail: <input type="email" name="email" required><br><br>
    Telefone: <input type="text" name="telefone"><br><br>
    <button type="submit">Salvar</button>
</form>

<?php include "rodape.php"; ?>