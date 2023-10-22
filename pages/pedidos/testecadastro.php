<?php
session_start();
require '../../utils/session.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        
        $conn = mysqli_connect($servername, $username, $password);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            echo "Connected successfully";
        }

        $query = $conn->prepare("SELECT id, titulo, descricao, preco, qtnd FROM produto;");
        $result -> bind_result($id, $titulo, $descricao, $preco, $qtnd);

        $lst_sabores = array();

        while($result->fetch())
        {
            $item = array();
            $item["identificador"] = $id;
            $item["sabor"] = $titulo;
            $item["resumo"] = $descricao;
            $item["valor"] = $preco;
            $item["quantidade"] = $qtnd; 
            array_push($lst_sabores, $item);
        }        
    ?>

    <h1>Faça seu Pedido</h1>
    <table>
        <tr>
            <td>Identificador</td>
            <td>Sabor</td>
            <td>Resumo</td>
            <td>Valor</td>
            <td>Quantidade</td>
        </tr>
        <?php foreach($lst_sabores as $item_sabor) : ?>
            <tr>
                <td><?php echo $item_sabor->identificador; ?></td>
                <td><?php echo $item_sabor->sabor; ?></td>
                <td><?php echo $item_sabor->resumo; ?></td>
                <td><?php echo $item_sabor->valor; ?></td>
                <td><?php echo $item_sabor->quantidade; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>