<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/pedidos/pedidos.php');
} else {
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $id = $_GET['id'];
  $img = $_POST['imagem_padrao'];

  if (array_key_exists('imagem', $_FILES)) {
    if ($_FILES["imagem"]["size"] > 0) {
      $target_dir = "../../uploadImage/";
      
      $extensao = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);

      $novo_nome = md5(uniqid()) . ".$extensao";
  
      $target_file = $target_dir . $novo_nome;

      move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

      unlink($target_dir . $img);

      $img = $novo_nome;
    }
  }

  $insert = "UPDATE `produto` SET `titulo` = '$titulo', `descricao` = '$descricao', `preco` = '$preco', `img` = '$img' WHERE `produto`.`id` = $id;";

  $conn->query($insert);

  $conn->close();

  echo "<script>
     window.alert('Produto atualizado com sucesso!')
     window.location.href='../../pages/produto/listagem.php';
   </script>";
}
