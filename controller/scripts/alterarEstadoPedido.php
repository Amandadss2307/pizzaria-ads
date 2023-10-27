<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/inicial/index.php');
} else {
  $id = $_GET['id'];

  $update = "UPDATE `pedido` SET `estado` = 'Entregue' WHERE `pedido`.`id` = $id";

  $conn->query($update);

  $conn->close();

  echo "<script>
    window.alert('Alteração realizada com sucesso!')
    window.location.href='../../pages/pedidos/listagemAdmin.php';
  </script>";
}
