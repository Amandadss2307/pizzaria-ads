<?php
require '../connections/connection.php';
include '../../utils/crudUser.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = strtolower($_POST['email']);
    $password = md5($_POST['senha']);

    if (existUser($conn, $email)) {
        $user = getUser($conn, $email);

        $userEmail = $user[2];
        $userPassword = $user[4];


        if ($userPassword == $password) {
            $newUser = [$user[1], $user[2], $user[3]];

            session_start();

            $_SESSION['user.name'] = $newUser;

            header('Location: ../../pages/pedidos/cadastro.php');
        }
    }

    echo "<script>
        window.alert('Email/Senha incorreto')
        window.location.href='../../pages/user/login.php';
    </script>";
}
