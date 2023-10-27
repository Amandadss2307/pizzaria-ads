<?php
session_start();
session_destroy();
echo "<script>
window.alert('Usuário desconectado!')
window.location.href='../../pages/user/login.php';
</script>";
