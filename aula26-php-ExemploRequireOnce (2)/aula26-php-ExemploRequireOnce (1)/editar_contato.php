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

$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch();
?>

<h3>Editar Contato</h3>
<form method="POST" class="form-agenda">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required>
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" value="<?php echo $contato['email']; ?>" required>
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>">
    </div>
    <button type="submit" class="btn-salvar">Atualizar Dados</button>
</form>

<?php include "rodape.php"; ?>