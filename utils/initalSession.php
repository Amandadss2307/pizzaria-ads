<?php
if (!empty($_SESSION['user'])) {
    echo "<script>
        window.alert('Usuário já efetou o login!')
        window.location.href='../pedidos/cadastro.php';
    </script>";
}
