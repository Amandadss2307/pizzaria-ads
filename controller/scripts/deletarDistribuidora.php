<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/pedidos/pedidos.php');
} else {
  $id = $_GET['id'];

  $delete = "DELETE FROM distribuidora WHERE `distribuidora`.`id` = $id";

  $conn->query($delete);

  $conn->close();

  echo "<script>
    window.alert('Distribuidora excluída com sucesso!')
    window.location.href='../../pages/distribuidora/listagem.php';
  </script>";
}
