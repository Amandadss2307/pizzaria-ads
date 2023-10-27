<?php
require '../../utils/navBar.php';
require '../../controller/connections/connection.php';

$select = "SELECT * FROM `noticia` ORDER BY data_criacao DESC LIMIT 3";

$result = $conn->query($select);

$listaNoticias = $result->fetch_all();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
</head>

<body>

    <main>
        <?php
        $count = -1;
        foreach ($listaNoticias as $noticia) {
            $count++;
            $titulo = $noticia[1];
            $descricao = $noticia[5];
            $img = $noticia[3];
            echo "
            <div id='post$count'>
                <h2>$titulo</h2>
                <p>$descricao</p>
                <img src='../../uploadImage/$img' alt='$titulo'>
            </div>";
        }
        ?>
        <br>
        <div id="post3">
            <h2> Conheça nossas redes Sociais</h2>
            <p>Agora estamos com: </p>
            <p class="rs"><i class="fa-brands fa-instagram"></i> Instagram </p>
            <p class="rs"><i class="fa-brands fa-facebook"></i> Facebook </p>
            <p class="rs"><i class="fa-brands fa-twitter"></i> Twitter</p>
        </div>
    </main>
</body>

</html>