<?php
session_start();
require '../../utils/session.php';

?>
<link rel="stylesheet" href="../estilo/index-estilo.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css">
<header>
    <h1>Pizzaria</h1>
    <nav>
        <a href="../inicial/index.php">Pagina Inicial</a> <!-- Para a pagina inicial-->
        <a href="../pedidos/cadastro.php">Faça seu pedido</a> <!-- Para fazer o pedido -->
        <a href="../pedidos/listagem.php">Historico de pedidos</a> <!-- Para o historico de pedidos-->
    </nav>
    <span><i class="fa-brands fa-whatsapp"></i></span>
    <button id="desconect"><a href="../controller/scripts/logout.php"> Desconectar <i class="fa-solid fa-right-from-bracket"></i></a></button> <!-- Desconectar -->
</header>