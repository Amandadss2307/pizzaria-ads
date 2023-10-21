<?php
require '../connections/connection.php';
include '../../utils/crudUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeCompleto = $_POST['nome-completo'];
    $email = strtolower($_POST['email']);
    $senha = md5($_POST['senha']);
    $telefone = $_POST['telefone'];

    $message = '';

    if (!existUser($conn, $email)) {
        $query = "INSERT INTO `clientes` (
            `id_cliente`, `nome_completo`, `email`, `telefone`, `senha`
            ) VALUES (
                NULL, '$nomeCompleto', '$email', '$telefone', '$senha'
            );";

        try {
            $conn->query($query);

            $message = 'Usuário cadastrado com sucesso!';
        } catch (Exception $error) {
            $message = 'Erro ao cadastrar o usuário';
        }
    } else {
        $message = 'Usuário já cadastrado no sistema!';
    }

    echo "<script>
        window.alert('$message')
        window.location.href='../../pages/user/login.php';
    </script>";

    $conn->close();
}
