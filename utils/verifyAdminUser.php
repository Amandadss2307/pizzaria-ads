<?php
function verifyAdminUser(): bool
{
    if ($_SESSION['user'][4] == 'ADMIN') {
        return true;
    } else {
        return false;
    }
}
