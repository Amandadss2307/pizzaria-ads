<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/pedidos/pedidos.php');
} else {
  $id = $_GET['id'];

  $delete = "DELETE FROM pedido WHERE `pedido`.`id` = $id";

  $conn->query($delete);

  $conn->close();

  echo "<script>
    window.alert('Pedido excluído com sucesso!')
    window.location.href='../../pages/pedidos/listagem.php';
  </script>";
}
