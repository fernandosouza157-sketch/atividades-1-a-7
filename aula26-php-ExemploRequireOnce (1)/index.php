<?php
require_once "config.php"; 
include "cabecalho.php";
include_once "funcoes.php";

echo "<h3>Lista de Contatos</h3>";
echo "<a href='cadastro_contato.php'>+ Adicionar Novo Contato</a><br><br>";

$lista = obterContatos($pdo);
exibirTabelaContatos($lista);

include "rodape.php";
?>