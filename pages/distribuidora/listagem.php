<?php
require '../../utils/navBar.php';
require('../../controller/connections/connection.php');
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
    header('Location: ../../pages/pedidos/pedidos.php');
}

$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPorPagina = 10;
$offset = ($paginaAtual - 1) * $totalPorPagina;

$selectTotal = "SELECT COUNT(*) as total FROM `distribuidora`";

$total_distribuidoras = $conn->query($selectTotal)->fetch_assoc()['total'];


$select = "SELECT titulo, cnpj, endereco, telefone, id 
          FROM `distribuidora` 
          LIMIT $totalPorPagina OFFSET $offset";

$result = $conn->query($select);

$listaDistribuidora = $result->fetch_all()

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem das distribuidoras</title>
</head>

<body>
  <h1> Listagem das distribuidoras </h1>

  <a href='cadastro.php'>
    <button>Cadastrar</button>
  </a>


  <?php

  if (sizeof($listaDistribuidora) > 0) {
    echo "
      <table>
        <tr>
          <th>Titulo</th>
          <th>CNPJ</th>
          <th>Endereço</th>
          <th>Telefone</th>
          <th>Ação</th>
        </tr>
    ";
    foreach ($listaDistribuidora as $distribuidora) {
      echo "
        <tr>
          <td>$distribuidora[0]</td>
          <td>$distribuidora[1]</td>
          <td>$distribuidora[2]</td>
          <td>$distribuidora[3]</td>
          <td>
            <a href='../../controller/scripts/deletarDistribuidora.php?id=$distribuidora[4]'>
              <button>Excluir</button>
            </a>
          </td>
        </tr>";
    }

    echo "</table>";
  } else {
    echo "<p>Nenhuma distribuidora encontrada!</p>";
  }

  $anterior = $paginaAtual - 1;
  $proximo = $paginaAtual + 1;

  if ($paginaAtual != 1) {
    echo "<a href='listagem.php?pagina=$anterior'>Anterior</a> ";
  }

  if (($paginaAtual * $totalPorPagina) < $total_distribuidoras)
    echo "<a href='listagem.php?pagina=$proximo'>Próximo</a>";
  ?>
</body>

</html>