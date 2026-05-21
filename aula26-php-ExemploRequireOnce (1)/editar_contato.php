<?php
require_once "config.php";
include "cabecalho.php";

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $telefone, $id]);

    header("Location: index.php");
    exit;
}

// Carrega os dados atuais do contato
$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch();
?>

<h3>Editar Contato</h3>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required><br><br>
    E-mail: <input type="email" name="email" value="<?php echo $contato['email']; ?>" required><br><br>
    Telefone: <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>"><br><br>
    <button type="submit">Atualizar</button>
</form>

<?php include "rodape.php"; ?>