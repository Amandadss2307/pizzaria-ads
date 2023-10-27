<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';

$endereco_entrega = $_POST['endereco_entrega'];
$forma_pagamento = $_POST['forma_pagamento'];
$tipo_entrega = $_POST['tipo_entrega'];

$estado = 'pendente';
$id_cliente = $_SESSION['user'][0];

$insert = "INSERT INTO `pedido` (`id`, `endereco_entrega`, `forma_pagamento`, `tipo_entrega`, `estado`, `id_cliente`) 
              VALUES (NULL, '$endereco_entrega', '$forma_pagamento', '$tipo_entrega', '$estado', '$id_cliente');";

$result = $conn->query($insert);

$id_pedido = $conn->insert_id;

print_r($_SESSION['produtos']);
echo $id_pedido;

foreach ($_SESSION['produtos'] as $produto) {
  $id_produto = $produto['id'];
  $qntd = $produto['qntd'];

  $insert_produto_pedido = "INSERT INTO produto_pedido (`id`, `id_produto`, `id_pedido`, `qntd`) 
                            VALUES (NULL, '$id_produto', '$id_pedido', '$qntd')";

  echo $insert_produto_pedido;

  $conn->query($insert_produto_pedido);
}

// $_SESSION['produtos'] = [];
$conn->close();

// echo "<script>
//     window.alert('Pedido cadastrado com sucesso!')
//     window.location.href='../../pages/pedidos/listagem.php';
//   </script>";
