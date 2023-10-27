<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/inicial/index.php');
} else {
  $id = $_GET['id'];

  $select = "SELECT img FROM noticia WHERE `noticia`.`id` = $id";

  $img = $conn->query($select)->fetch_row();

  unlink("../../uploadImage/" . $img[0]);

  $delete = "DELETE FROM noticia WHERE `noticia`.`id` = $id";

  $conn->query($delete);

  $conn->close();

  echo "<script>
    window.alert('Noticia excluído com sucesso!')
    window.location.href='../../pages/noticias/listagem.php';
  </script>";
}
