<?php
function logout()
{
    session_destroy();
    header('Location: ../pages/user/login.php');
}
