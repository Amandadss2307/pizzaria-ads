<?php
if (empty($_SESSION['user'])) {
    echo "<script>
        window.alert('Faça o login antes!')
        window.location.href='../user/login.php';
    </script>";
}
