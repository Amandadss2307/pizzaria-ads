<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/pedidos/cadastro.php');
} else {
  $id = $_GET['id'];

  $select = "SELECT img FROM produto WHERE `produto`.`id` = $id";

  $img = $conn->query($select)->fetch_row();

  unlink("../../uploadImage/" . $img[0]);

  $delete = "DELETE FROM produto WHERE `produto`.`id` = $id";

  $conn->query($delete);

  $conn->close();

  echo "<script>
    window.alert('Produto excluído com sucesso!')
    window.location.href='../../pages/produto/listagem.php';
  </script>";
}
