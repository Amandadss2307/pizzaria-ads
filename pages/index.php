<?php
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>
        window.alert('Faça o login antes!')
        window.location.href='../user/login.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
</head>
<body>
    <h1>Bem vindo!</h1>
</body>
</html>
