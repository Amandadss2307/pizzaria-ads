<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/inicial/index.php');
} else {
  $titulo = $_POST['titulo'];
  $cnpj = $_POST['cnpj'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $id_cliente = $_SESSION['user'][0];

  $insert = "INSERT INTO `distribuidora` (`id`, `titulo`, `cnpj`, `endereco`, `telefone`, `id_cliente`) 
              VALUES (NULL, '$titulo', '$cnpj', '$endereco', '$telefone', '$id_cliente');";

  $conn->query($insert);

  $conn->close();

  echo "<script>
    window.alert('Distribuidora cadastrada com sucesso!')
    window.location.href='../../pages/distribuidora/listagem.php';
  </script>";
}
