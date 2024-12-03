<?php

$username = '';
$password = '';
$dbname = '';
$host = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados". $mysqli->error);
}

?>
