<?php
session_start();
require '../../utils/session.php';
require '../connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/inicial/index.php');
} else {

  $target_dir = "../../uploadImage/";

  $extensao = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);

  $img = md5(uniqid()) . ".$extensao";

  $target_file = $target_dir . $img;

  move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

  $titulo = $_POST['titulo'];
  $data_criacao = $_POST['data_criacao'];
  $id_cliente = $_SESSION['user'][0];
  $descricao = $_POST['descricao'];

  $insert = "INSERT INTO `noticia` (`id`, `titulo`, `data_criacao`, `img`, `id_cliente`,`descricao`)
              VALUES (NULL, '$titulo', '$data_criacao', '$img', '$id_cliente', '$descricao' );";

  $conn->query($insert);

  $conn->close();

  echo "<script>
       window.alert('Notícia cadastrado com sucesso!')
       window.location.href='../../pages/noticias/listagem.php';
     </script>";
}
