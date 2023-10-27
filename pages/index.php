<?php
include '../utils/logout.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link rel="stylesheet" href="/pages/estilo/index-estilo.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css">
</head>
<body>
    <header>
        <h1>Pizzaria</h1>
        <nav>
            <a href="#">Pagina Inicial</a> <!-- Para a pagina inicial-->
            <a href="#">Faça seu pedido</a> <!-- Para fazer o pedido -->
            <a href="#">Historico de pedidos</a> <!-- Para o historico de pedidos-->
        </nav>
        <span><i class="fa-brands fa-whatsapp"></i></span>
        <button id="desconect"><a href="#"> Desconectar  <i class="fa-solid fa-right-from-bracket"></i></a></button> <!-- Desconectar -->
    </header>
    <main>
        <div id="post0">
            <h2>Em breve novidades</h2>
            <img src="imagens/Process-rafiki.png" alt="">
        </div>
        <div id="post1">
            <h2>Promoção de Pizza!</h2>
            <p>O patrão ficou maluco!!!! na compra de 2 pizzas a terceira sai totalmente de graça!!</p>
            <p>Promoção válida até as 23:59 de hoje.</p>
            <img src="imagens/homem-maluco.jpg" alt="homem maluco">
        </div>
        <div id="post2">
            <h2>Venha descobrir como nossas deliciosas pizzas são feitas.</h2>
            <p>O chef está te esperando para te mostrar como é a nossa cozinha</p>
            <img src="imagens/cozinha-pizzaria.jpeg" alt="cozinha de uma pizzaria">
        </div>
        <div id="post3">
            <h2> Conheça nossas redes Sociais</h2>
            <p>Agora estamos com: </p>
            <p class="rs"><i class="fa-brands fa-instagram"></i> Instagram </p>
            <p class="rs"><i class="fa-brands fa-facebook"></i> Facebook </p>
            <p class="rs"><i class="fa-brands fa-twitter"></i> Twitter</p>
        </div>
        <button class="prox">1</button>
    </main>
</body>
</html>