<?php
session_start();
require '../../utils/session.php';
require('../../controller/connections/connection.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido</title>
</head>
<body>
    <h1>Faça seu pedido</h1>
    <form action="../../controller/scripts/cadastroPedido.php" method="POST">
        <label for="pedido">Produto:</label>
        <input type="text" name="pedido" id="pedido" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required><br>

        <label for="endereço de entrega"> Endereço:</label>
        <textarea name="endereço de entrega" id="endereco_entrega"></textarea><br>

        <label for="forma de pagamento">Forma de pagamento:</label>
        <input type="number" name="forma de pagamento" id="forma_pagamento" required><br>

        <label for="tipo de entrega">Entrega ou retirada:</label>
        <input type="text" name="entrega ou retirada" id="tipo_entrega" required><br>

        <label for="observacoes">Observações:</label>
        <textarea name="observacoes" id="observacoes"></textarea><br>

        <input type="submit" value="Enviar Pedido">
    </form>
</body>
</html>
