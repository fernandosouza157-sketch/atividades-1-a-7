<?php
require_once "config.php";
include "cabecalho.php";

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM contatos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}
?>

<h3>Excluir Contato</h3>
<p>Tem certeza que deseja deletar este contato?</p>
<form method="POST">
    <button type="submit">Sim, deletar</button>
    <a href="index.php">Cancelar</a>
</form>

<?php include "rodape.php"; ?>