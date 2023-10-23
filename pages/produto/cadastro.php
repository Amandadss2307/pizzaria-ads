<?php
session_start();
require '../../utils/session.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
    header('Location: ../../pages/pedidos/cadastro.php');
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
    <h1> Cadastro do produto </h1>
    <a href='listagem.php'>
        <button>Voltar</button>
    </a>

    <form action="../../controller/scripts/cadastroProduto.php" method="POST" enctype="multipart/form-data">
        <label for="titulo"> Titulo do produto:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for= "imagem" >Imagem</label>
        <input type= "file" id="imagem" name= "imagem" required><br>

        <label for="descricao"> Descrição:</label>
        <input type="text" step="0.01" id="descricao" name="descricao" required></input><br>

        <label for="preco"> Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required><br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</body>

</html>