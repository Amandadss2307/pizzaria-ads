<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro </title>
</head>
<body>
    <h1> Cadastro do produto </h1>
    <form action="cadastrar_produto.php" method="POST">
    <label for="nome"> Nome do Produto:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="descricao"> Descrição:</label>
    <textarea id="descricao" name="descricao" required></textarea><br>

     <label for="preco"> Preço:</label>
     <input type="number" step="0.01" id="preco" name="preco" required><br>

    <input type="submit" value="Cadastrar Produto">
    </form>
</body>
</html>