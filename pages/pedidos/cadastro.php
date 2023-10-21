<?php
session_start();
require '../../utils/session.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
</head>

<body>
    <h1>Faça seu Pedido</h1>
    <form action="" method="post">
        <h3>Selecione um ou mais sabor de pizza: </h3>
        <input type="radio" name="mussarela" id="mussarela">
        <label for="mussarela">Mussarela</label>
        <br><br>
        <input type="radio" name="calabresa" id="calabresa">
        <label for="calabresa">Calabresa</label>
        <br><br>
        <input type="radio" name="frango-catupiry" id="frango-catupiry">
        <label for="frango-catupiry">Frango com Catupiry</label>
    </form>
</body>

</html>