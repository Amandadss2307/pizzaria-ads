<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/pedidos/pedidos.php');
} else {
  $endereco_entrega = $_POST['endereco_entrega'];
  $forma_pagamento = $_POST['forma_pagamento'];
  $tipo_entrega = $_POST['tipo_entrega'];
  $estado = $_POST['estado'];
  $id_cliente = $_SESSION['user'][0];

  $insert = "INSERT INTO `pedido` (`id`, `endereco_entrega`, `forma_pagamento`, `tipo_entrega`, `estado`, `id_cliente`) 
              VALUES (NULL, '$endereco_entrega', '$forma_pagamento', '$tipo_entrega', '$estado', '$id_cliente');";

  $conn->query($insert);

  $conn->close();

  echo "<script>
    window.alert('Pedido cadastrado com sucesso!')
    window.location.href='../../pages/pedidos/listagem.php';
  </script>";
}
