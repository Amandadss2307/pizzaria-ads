<?php
require '../../utils/navBar.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
    header('Location: ../../pages/pedidos/pedidos.php');
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
    <h1> Cadastro da distribuidora </h1>


    <a href='listagem.php'>
        <button>Voltar</button>
    </a>

    <form action="../../controller/scripts/cadastroDistribuidora.php" method="POST">
        <label for="titulo"> Titulo da distribuidora:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="cnpj"> CNPJ:</label>
        <input type="text" step="0.01" id="cnpj" name="cnpj" required></input><br>

        <label for="endereco"> Endereço:</label>
        <input type="text" step="0.01" id="endereco" name="endereco" required><br>

        <label for="telefone"> Telefone para contato:</label>
        <input type="text" step="0.01" id="telefone" name="telefone" required><br>

        <input type="submit" value="Cadastrar distribuidora">
    </form>
</body>

</html>