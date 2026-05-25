<?php
// Busca todos os contatos do banco
function obterContatos(PDO $pdo): array {
    $stmt = $pdo->query("SELECT * FROM contatos");
    return $stmt->fetchAll();
}

// Cria a tabela HTML estilizada
function exibirTabelaContatos(array $contatos): void {
    if (empty($contatos)) {
        echo "<p>Nenhum contato cadastrado.</p>";
        return;
    }

    echo "<table class='tabela-agenda'>";
    echo "<thead><tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr></thead>";
    echo "<tbody>";

    foreach ($contatos as $c) {
        echo "<tr>";
        echo "<td>" . $c['id'] . "</td>";
        echo "<td><strong>" . $c['nome'] . "</strong></td>";
        echo "<td>" . $c['email'] . "</td>";
        echo "<td>" . $c['telefone'] . "</td>";
        echo "<td>
                <a href='editar_contato.php?id=" . $c['id'] . "' class='btn-editar'>Editar</a>
                <a href='excluir_contato.php?id=" . $c['id'] . "' class='btn-excluir'>Excluir</a>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}
?>