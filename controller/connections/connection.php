<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'login';

$conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if ($conn->connect_error) {
    die('Falha na conexão' . $conn->connect_error);
}
