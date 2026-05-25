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
<div class="alerta-erro" style="margin-top: 20px;">
    <strong>Atenção:</strong> Tem certeza absoluta que deseja deletar este contato? Esta ação não pode ser desfeita.
</div>
<form method="POST" class="form-agenda">
    <button type="submit" class="btn-salvar btn-deletar-confirmar">Sim, deletar permanentemente</button>
    <a href="index.php" class="btn-cancelar">Cancelar e Voltar</a>
</form>

<?php include "rodape.php"; ?>