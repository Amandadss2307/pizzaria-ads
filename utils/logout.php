<?php
function logout()
{
    session_destroy();
    header('Location: ../user/login.php');
}
