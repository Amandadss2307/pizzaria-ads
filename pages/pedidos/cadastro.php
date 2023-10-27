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
  <style>
    main {
      background-color: brown;
      color: white;
      text-align: center;
      padding: 10px;
    }
    
    main > h1 {
      padding: 3px;
      text-transform: uppercase;
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
      padding: 10px;
      border: 1px solid black;
      color: white;
      margin: auto;
    }

    table th {
      text-transform: uppercase;
    }

    table th, table td {
      padding: 10px;
      border: 1px solid black;
      text-align: center;
    }

    table button {
      cursor: pointer;
      height: 30px;
      width: 80px;
      border-radius: 5px;
      border: none;
    }
    
    img {
      width: 200px;
    }
  </style>
</head>

<body>

  <main>
    <a href='listagem.php'>
      <button>Voltar</button>
    </a>
    <form action="./finalizar.php" method="POST">
      <?php
      if (sizeof($listagemProdutos) > 0) {
        echo "
        <table>
          <tr>
            <th> Nome do produto </th>
            <th> Descrição</th>
            <th> Preço</th>
            <th>Quantidade</th>
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
  </main>

</body>

</html>