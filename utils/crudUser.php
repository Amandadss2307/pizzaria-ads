<?php
function existUser(mysqli $conn, string $email): bool
{
    $select = "SELECT * FROM `cliente` WHERE email = '$email'";

    $result = $conn->query($select);

    if ($result->num_rows < 1) {
        return false;
    } else {
        return true;
    }
}

function getUser(mysqli $conn, string $email): array
{
    $select = "SELECT * FROM `cliente` WHERE email = '$email'";

    $result = $conn->query($select);

    return $result->fetch_row();
}
