<?php
session_start();
require '../../utils/session.php';
require('../../controller/connections/connection.php');

foreach ($_POST as $campo => $valor) {
    if (strpos($campo, 'qntd_') === 0) {
        $produto_id = substr($campo, strlen('qntd_'));
        $quantidade = $valor;

        if ($quantidade > 0) {
            if (isset($_SESSION['produtos'])) {
                $_SESSION['produtos'][] = ['id' => $produto_id, 'qntd' => $quantidade];
            } else {
                $_SESSION['produtos'] = [['id' => $produto_id, 'qntd' => $quantidade]];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize seu pedido</title>
</head>

<body>
    <h1>Finalize seu pedido</h1>
    <form action="../../controller/scripts/cadastroPedido.php" method="POST">
        <label for="endereco_entrega"> Endereço de entrega:</label>
        <input type="text" id="endereco_entrega" name="endereco_entrega" required><br>


        <label for="forma_pagamento">Forma de pagamento:</label>
        <select id="forma_pagamento" name="forma_pagamento" required>
            <option value="pix">PIX</option>
            <option value="dinheiro">Dinheiro</option>
            <option value="cartão">Cartão</option>
        </select><br>


        <label for="tipo_entrega">Tipo de entrega:</label>
        <select id="tipo_entrega" name="tipo_entrega" required>
            <option value="entrega">Entrega</option>
            <option value="retirada">Retirada</option>
        </select><br>

        <input type="submit" value="Finalizar Pedido">
    </form>
</body>

</html>