<?php
require '../../utils/navBar.php';
require('../../controller/connections/connection.php');
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/inicial/index.php');
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
  <style>
    main {
      background-color: brown;
      color: white;
      text-align: center;
    }

    main > a > button {
      text-transform: uppercase;
      height: 40px;
      width: 120px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
      cursor: pointer;
    }

    table {
      margin: auto;
      padding: 5px;
      color: white;
      text-align: center;
    }

    table th {
      text-transform: uppercase;
    }

    table th, table td {
      border: 1px solid black;
      padding: 10px;
    }
  </style>
</head>

<body>
  <main>
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
  </main>
</body>

</html>