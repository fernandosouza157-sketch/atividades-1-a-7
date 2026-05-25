<?php
require_once "config.php";
include "cabecalho.php";

echo "<h3>Lista de Clientes</h3>";
echo "<a href='cadastro_clientes.php' class='btn-adicionar'>+ Adicionar Novo Cliente</a>";

$stmt = $pdo->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll();

if (empty($clientes)) {
    echo "<p>Nenhum cliente cadastrado.</p>";
} else {
    echo "<table class='tabela-agenda'>";
    echo "<thead><tr><th>Nome</th><th>CPF</th><th>E-mail</th><th>Endereço</th></tr></thead>";
    echo "<tbody>";
    foreach ($clientes as $c) {
        echo "<tr>";
        echo "<td><strong>".$c['nome']."</strong></td>";
        echo "<td>".$c['cpf']."</td>";
        echo "<td>".$c['email']."</td>";
        echo "<td>".$c['endereco']."</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}

include "rodape.php";
?>