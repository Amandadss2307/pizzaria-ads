<?php
session_start();
require '../../utils/session.php';
require('../../controller/connections/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $observacoes = $_POST['observacoes'];

    echo "Pedido Recebido:<br>";
    echo "Produto: $produto<br>";
    echo "Quantidade: $quantidade<br>";
    echo "Observações: $observacoes<br>";
}
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
        <label for="produto">Produto:</label>
        <input type="text" name="produto" id="produto" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required><br>

        <label for="observacoes">Observações:</label>
        <textarea name="observacoes" id="observacoes"></textarea><br>

        <input type="submit" value="Enviar Pedido">
    </form>
</body>
</html>
