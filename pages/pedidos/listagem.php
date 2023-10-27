<?php
require '../../utils/navBar.php';
require('../../controller/connections/connection.php');

$id_cliente = $_SESSION['user'][0];

$sql = "SELECT 
          p.id as id_pedido, 
          p.endereco_entrega, 
          p.tipo_entrega, 
          p.estado,
          pr.titulo, 
          pr.descricao, 
          pr.preco, 
          pp.qntd, 
          (pr.preco * pp.qntd) as preco_total
      FROM 
          pedido p
      JOIN 
          produto_pedido pp ON p.id = pp.id_pedido
      JOIN 
          produto pr ON pp.id_produto = pr.id
      WHERE 
          id_cliente = $id_cliente";

$result = $conn->query($sql);


echo "<a href='cadastro.php'>
  <button>Cadastrar</button>
</a>";

if ($result->num_rows > 0) {
  $pedido_atual = null;
  $preco_final_pedido = 0;

  while ($row = $result->fetch_assoc()) {

    if ($row["id_pedido"] != $pedido_atual) {
      if ($pedido_atual !== null) {
        echo "<p>Preço Final do Pedido: " . $preco_final_pedido . "</p>";
      }
      echo "<h2>Pedido #" . $row["id_pedido"] . "</h2>";
      echo "<p>Endereço de Entrega: " . $row["endereco_entrega"] . "</p>";
      echo "<p>Tipo de Entrega: " . $row["tipo_entrega"] . "</p>";
      echo "<strong><p>Estado atual do pedido: " . $row["estado"] . "</p></strong>";
      $pedido_atual = $row["id_pedido"];
      $preco_final_pedido = 0;
    }

    echo "<p>Título do Produto: " . $row["titulo"] . "</p>";
    echo "<p>Descrição do Produto: " . $row["descricao"] . "</p>";
    echo "<p>Preço do Produto: " . $row["preco"] . "</p>";
    echo "<p>Quantidade: " . $row["qntd"] . "</p>";
    echo "<p>Preço Total: " . $row["preco_total"] . "</p>";

    $preco_final_pedido += $row["preco_total"];
  }

  echo "<p>Preço Final do Pedido: " . $preco_final_pedido . "</p>";
} else {
  echo "Nenhum resultado encontrado.";
}

$conn->close();
