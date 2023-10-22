<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem dos produtos</title>
</head>
<body>
<?php
// Supondo que a variável $produtos já possui os dados dos produtos cadastrados
$produtos = array(
  array("nome" => "Produto 1", "descricao" => "Descrição do produto 1", "preco" => 19.99),
  array("nome" => "Produto 2", "descricao" => "Descrição do produto 2", "preco" => 29.99),
  array("nome" => "Produto 3", "descricao" => "Descrição do produto 3", "preco" => 39.99)
);

//Listagem dos produtos cadastrados
foreach ($produtos as $produto) {
  echo "Nome: " . $produto['nome'] . "<br>";
  echo "Descrição: " . $produto['descricao'] . "<br>";
  echo "Preço: R$ " . $produto['preco'] . "<br><br>";
}
?>
</body>
</html>