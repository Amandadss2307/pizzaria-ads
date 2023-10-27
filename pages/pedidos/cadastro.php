<?php
require '../../utils/navBar.php';
require('../../controller/connections/connection.php');

$selectProduto = "SELECT * FROM produto";

$result = $conn->query($selectProduto);

$listagemProdutos = $result->fetch_all();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro do pedido</title>
</head>

<body>
    <form action="./finalizar.php" method="POST">
        <?php
        if (sizeof($listagemProdutos) > 0) {
            echo "
      <table>
        <tr>
          <th> Nome do produto </th>
          <th> Descrição</th>
          <th> Preço</th>
          <th>Ação</th>
        </tr>
    ";
            foreach ($listagemProdutos as $produto) {
                echo "
        <tr>
          <td><img src='../../uploadImage/$produto[4]'></td>
          <td>$produto[1]</td>
          <td>$produto[2]</td>
          <td>$produto[3]</td>
          <td>
            <input type='number' step='0.01' id='qntd_$produto[0]' name='qntd_$produto[0]'>
            <input type='hidden' name='produto_id_$produto[0]' value='$produto[0]'>
          </td>
          </td>
        </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum pedido encontrado!</p>";
        }
        ?>
        <input type="submit" value="Cadastrar pedido">
    </form>

</body>

</html>