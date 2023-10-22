<?php
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// Validação dos campos

// Verificar se o campo nome está preenchido
if (empty($nome)) {
  // Exibir uma mensagem de erro
  echo "O campo nome é obrigatório!";
} else {
  // Caso todos os campos estejam preenchidos, realizar o
  // Cadastro do produto no banco de dados 
  // Apenas exibira uma mensagem com os dados do produto cadastrado
  echo "Produto cadastrado com sucesso!<br>";
  echo "Nome: " . $nome . "<br>";
  echo "Descrição: " . $descricao . "<br>";
  echo "Preço: R$ " . $preco;
}
?>