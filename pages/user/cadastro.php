<!DOCTYPE html>
<?php
session_start();
require '../../utils/initalSession.php';
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../estilo/style.css">
    <link rel="stylesheet" href="../estilo/cadastro-style.css">
</head>

<body>
    <main>
        <h1>CADASTRO</h1>
        <form action="../../controller/scripts/newUser.php" method="post">
            <label for="nome-completo">Nome completo: </label>
            <input type="text" name="nome-completo" id="nome-completo" placeholder="Seu nome completo">
            <br><br>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" placeholder="email@email.com" required>
            <br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="********" required minlength="6" maxlength="24" required>
            <br><br>
            <label for="telefone">Telefone: </label>
            <input type="tel" name="telefone" id="telefone" required placeholder="Seu número de telefone">
            <br><br>
            <input type="submit" value="Cadastrar">
            <br><br>
            <a href="login.php" id="cadastro">Fazer login</a>
        </form>

    </main>

</body>

</html>