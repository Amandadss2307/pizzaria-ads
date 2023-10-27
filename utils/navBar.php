<?php
session_start();
require '../../utils/session.php';

?>
<link rel="stylesheet" href="../estilo/index-estilo.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css">
<header>
    <h1>Pizzaria</h1>
    <nav>
        <a href="../inicial/index.php">Pagina Inicial</a>
        <?php
        if ($_SESSION['user'][4] == 'ADMIN') {
            echo "<a href='../distribuidora/listagem.php'>Distribuidora</a> ";
            echo "<a href='../produto/listagem.php'>Produtos</a> ";
            echo "<a href='../pedidos/listagemAdmin.php'>Pedidos</a> ";
            echo "<a href='../noticias/listagem.php'>Noticias</a> ";
        } else {
            echo "<a href='../pedidos/cadastro.php'>Faça seu pedido</a>";
            echo "<a href='../pedidos/listagem.php'>Historico de pedidos</a> ";
        }

        ?>
    </nav>
    <span><i class="fa-brands fa-whatsapp"></i></span>
    <button id="desconect"><a href="../../controller/scripts/logout.php"> Desconectar <i class="fa-solid fa-right-from-bracket"></i></a></button>
</header>