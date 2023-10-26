<?php
session_start();
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPorPagina = 10;
$offset = ($paginaAtual - 1) * $totalPorPagina;

$selectTotal = "SELECT COUNT(*) as total FROM `pedido`";

$total_pedidos = $conn->query($selectTotal)->fetch_assoc()['total'];


$select = "SELECT endereco_entrega, forma_pagamento, tipo_entrega, estado, id_cliente, id
          FROM `pedido` 
          LIMIT $totalPorPagina OFFSET $offset";

$result = $conn->query($select);

$listaPedido = $result->fetch_all()

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Listagem dos pedidos</title>
</head>

<body>
  <h1> Listagem dos pedidos </h1>
  <?php

  if (sizeof($listaPedidos) > 0) {
    echo "
      <table>
        <tr>
          <th> Endereço de entrega</th>
          <th> Forma de pagamento</th>
          <th> Tipo de entrega</th>
          <th> Estado</th>
          <th>Ação</th>
        </tr>
    ";
    foreach ($listaPedido as $pedido) {
      echo "
        <tr>
          <td>$pedido[0]</td>
          <td>$pedido[1]</td>
          <td>$pedido[2]</td>
          <td>$pedido[3]</td>
          </td>
        </tr>";
    }

    echo "</table>";
  } else {
    echo "<p>Nenhum pedido encontrado!</p>";
  }

  $anterior = $paginaAtual - 1;
  $proximo = $paginaAtual + 1;

  if ($paginaAtual != 1) {
    echo "<a href='listagem.php?pagina=$anterior'>Anterior</a> ";
  }

  if (($paginaAtual * $totalPorPagina) < $total_pedidos)
    echo "<a href='listagem.php?pagina=$proximo'>Próximo</a>";
  ?>
</body>

</html>