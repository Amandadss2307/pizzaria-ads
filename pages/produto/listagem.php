<?php
session_start();
require '../../utils/session.php';
require('../../controller/connections/connection.php');
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
    header('Location: ../../pages/pedidos/cadastro.php');
}

$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPorPagina = 10;
$offset = ($paginaAtual - 1) * $totalPorPagina;

$selectTotal = "SELECT COUNT(*) as total FROM `produto`";

$total_produto = $conn->query($selectTotal)->fetch_assoc()['total'];


$select = "SELECT titulo, descricao, preco, id, img
          FROM `produto` 
          LIMIT $totalPorPagina OFFSET $offset";

$result = $conn->query($select);

$listaProduto = $result->fetch_all()

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem dos produtos</title>
</head>

<body>
    <h1> Listagem dos produtos </h1>

    <a href='cadastro.php'>
        <button>Cadastrar</button>
    </a>

    <?php

    if (sizeof($listaProduto) > 0) {
        echo "
      <table>
        <tr>
          <th>Foto</th>
          <th>Titulo</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Ação</th>
        </tr>
    ";
        foreach ($listaProduto as $produto) {
            echo "
        <tr>
          <td><img src='../../uploadImage/$produto[4]' alt='Foto do produto'></td>
          <td>$produto[0]</td>
          <td>$produto[1]</td>
          <td>$produto[2]</td>
          <td>
            <a href='atualizar.php?id=$produto[3]'>
              <button>Atualizar</button>
            </a>
            <a href='../../controller/scripts/deletarProduto.php?id=$produto[3]'>
              <button>Excluir</button>
            </a>
          </td>
        </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum produto encontrado!</p>";
    }

    $anterior = $paginaAtual - 1;
    $proximo = $paginaAtual + 1;

    if ($paginaAtual != 1) {
        echo "<a href='listagem.php?pagina=$anterior'>Anterior</a> ";
    }

    if (($paginaAtual * $totalPorPagina) < $total_produto)
        echo "<a href='listagem.php?pagina=$proximo'>Próximo</a>";
    ?>
</body>

</html>