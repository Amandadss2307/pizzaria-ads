<?php
session_start();
require '../../utils/session.php';
require '../../controller/connections/connection.php';
include '../../utils/verifyAdminUser.php';

if (!verifyAdminUser()) {
    header('Location: ../../pages/pedidos.php');
}

$id = $_GET['id'];

$select = "SELECT titulo, descricao, preco, img FROM `produto` WHERE id = $id ";

$result = $conn->query($select);

$pedido = $result->fetch_row();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atualizar </title>
</head>

<body>
    <h1> Atualizar produto </h1>
    <a href='listagem.php'>
        <button>Voltar</button>
    </a>

    <form action="../../controller/scripts/atualizarProduto.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
        <label for="titulo"> Titulo do produto:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $pedido[0]; ?>" required><br>

        <label for="imagem">Imagem</label>
        <input type="file" id="imagem" name="imagem"><br>
        <input type="hidden" id="imagem_padrao" name="imagem_padrao" value="<?php echo $pedido[3]; ?>">

        <label for="descricao"> Descrição:</label>
        <textarea step="0.01" id="descricao" name="descricao" required><?php echo $pedido[1]; ?></textarea><br>

        <label for="preco"> Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $pedido[2]; ?>" required><br>

        <input type="submit" value="Atualizar Produto">
    </form>
</body>

</html>