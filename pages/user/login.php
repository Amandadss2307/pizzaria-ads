<?php
session_start();
require '../../utils/initalSession.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css">
    <title>Login</title>
    <link rel="stylesheet" href="../estilo/style.css">
</head>

<body>
    <main>
        <h1>PIZZARIA</h1>
        <form action="../../controller/scripts/login.php" method="post">
            <label for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="text" name="email" id="email" placeholder="email@email.com" required>
            <br><br>
            <label for="senha"><i class="fa-solid fa-lock"></i></label>
            <input type="password" name="senha" id="senha" placeholder="********" required minlength="6" maxlength="24">
            <br><br>
            <input type="submit" value="Entrar">
            <br><br>
            <a href="cadastro.php" id="cadastro">Cadastre-se</a>
        </form>

    </main>

</body>

</html>