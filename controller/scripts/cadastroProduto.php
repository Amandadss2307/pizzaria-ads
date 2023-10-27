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
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $insert = "INSERT INTO `produto` (`id`, `titulo`, `descricao`, `preco`, `img`)
              VALUES (NULL, '$titulo', '$descricao', '$preco', '$img');";



    $conn->query($insert);

    $conn->close();

    echo "<script>
      window.alert('Produto cadastrado com sucesso!')
      window.location.href='../../pages/produto/listagem.php';
    </script>";
}
