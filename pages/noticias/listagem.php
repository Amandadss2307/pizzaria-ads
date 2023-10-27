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

$selectTotal = "SELECT COUNT(*) as total FROM `noticia`";

$total_noticias = $conn->query($selectTotal)->fetch_assoc()['total'];


$select = "SELECT titulo, data_criacao, img, id_cliente, descricao, id
          FROM `noticia` 
          LIMIT $totalPorPagina OFFSET $offset";

$result = $conn->query($select);

$listaNoticia = $result->fetch_all()

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem das noticias</title>
</head>

<body>
  <h1> Listagem das noticias </h1>

  <a href='cadastro.php'>
    <button>Cadastrar</button>
  </a>


  <?php

  if (sizeof($listaNoticia) > 0) {
    echo "
      <table>
        <tr>
          <th>Titulo</th>
          <th>Data</th>
          <th>img</th>
          <th>Descrição</th>
          <th>Ação</th>
        </tr>
    ";
    foreach ($listaNoticia as $noticia) {
      echo "
        <tr>
          <td>$noticia[0]</td>
          <td>$noticia[1]</td>
          <td>$noticia[2]</td>
          <td>$noticia[3]</td>
          <td>$noticia[4]</td>
          <td>
            <a href='../../controller/scripts/deletarNoticia.php?id=$noticia[5]'>
              <button>Excluir</button>
            </a>
          </td>
        </tr>";
    }

    echo "</table>";
  } else {
    echo "<p>Nenhuma noticia encontrada!</p>";
  }

  $anterior = $paginaAtual - 1;
  $proximo = $paginaAtual + 1;

  if ($paginaAtual != 1) {
    echo "<a href='listagem.php?pagina=$anterior'>Anterior</a> ";
  }

  if (($paginaAtual * $totalPorPagina) < $total_noticias)
    echo "<a href='listagem.php?pagina=$proximo'>Próximo</a>";
  ?>
</body>

</html>