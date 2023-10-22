<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
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

            $query = $conn->prepare("SELECT id, nome FROM cliente");
            $result -> bind_result($id, $nome);

            $lst_clientes = array();
            
            while($result->fecth())
            {
                $cliente = array();
                $cliente["identificador"] = $id;
                $cliente["nome"] = $nome;
                array_push($lst_clientes, $cliente);
            }            
            $query = $conn->prepare("INSERT INTO carrinho(endereco_entrega,forma_pagamento,tipo_entrega,id_cliente)VALUE('" + $_POST["endereco_entrega"] + "','" + $_POST["forma_pagamento"] + "','" + $_POST["tipo_entrega"] + "','" + $_POST["id_cliente"] + "')");
            $query->commit();
        ?>        
        <form method="post">
            <label for="endereco_entrega">Endereço</label><br>
            <input type="text" name="endereco_entrega" id="endereco_entrega">
            
            <label for="forma_pagamento">Pagamento</label><br>
            <input type="text" name="forma_pagamento" id="forma_pagamento">
            
            <label for="tipo_entrega">Entrega</label><br>
            <input type="text" name="tipo_entrega" id="tipo_entrega">
            
            <label for="estado">Estado</label><br>
            <input type="text" name="estado" id="estado">
            
            <label for="id_cliente">Cliente</label><br>
            <select name="id_cliente" id="id_cliente">
                <?php foreach($lst_clientes as $cliente) : ?>
                    <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nome; ?></option>
                <?php endforeach; ?>
            </select>           
            
            <input type="submit" name="submit" value="Enviar">
        </form>
        
    </body>
</html>