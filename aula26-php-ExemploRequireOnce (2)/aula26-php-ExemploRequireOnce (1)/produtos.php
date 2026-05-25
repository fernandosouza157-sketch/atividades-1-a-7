<?php
require_once "config.php";
include "cabecalho.php";

echo "<h3>Lista de Produtos</h3>";
echo "<a href='cadastro_produto.php' class='btn-adicionar'>+ Adicionar Novo Produto</a>";

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();

if (empty($produtos)) {
    echo "<p class='sem-dados'>Nenhum produto cadastrado.</p>";
} else {
    echo "<table class='tabela-agenda'>";
    echo "<thead><tr><th>Imagem</th><th>Produto</th><th>Descrição</th><th>Preço</th><th>Estoque</th></tr></thead>";
    echo "<tbody>";
    foreach ($produtos as $p) {
        $foto = !empty($p['imagem']) ? 'uploads/' . $p['imagem'] : 'https://via.placeholder.com/50';
        
        echo "<tr>";
        echo "<td><img src='".$foto."' width='50' height='50'></td>";
        echo "<td><strong>".$p['nome']."</strong></td>";
        echo "<td>".$p['descricao']."</td>";
        echo "<td><span class='preco-tag'>R$ " . number_format($p['preco'], 2, ',', '.') . "</span></td>"; 
        echo "<td>".$p['estoque']." un.</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}

include "rodape.php";
?>