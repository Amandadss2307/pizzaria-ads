<?php
require '../../utils/navBar.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
  header('Location: ../../pages/user/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cadastro </title>
</head>

<body>
  <h1> Cadastro da noticia </h1>
  <a href='listagem.php'>
    <button>Voltar</button>
  </a>

  <form action="../../controller/scripts/cadastroNoticia.php" method="POST" enctype="multipart/form-data">
    <label for="titulo"> Titulo do noticia:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="imagem">Imagem</label>
    <input type="file" id="imagem" name="imagem" required><br>

    <label for="data_criacao"> Data da criação:</label>
    <input type="date" name="data_criacao" value="2022-12-31" required><br>

    <label for="descricao"> Descrição da noticia:</label>
    <textarea step="0.01" id="descricao" name="descricao" required></textarea><br>

    <input type="submit" value="Cadastrar noticia">
  </form>
</body>
</html>