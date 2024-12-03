<?php

$username = 'carnie72_user';
$password = 'hu8C]k=*sq]f';
$dbname = 'carnie72_db_agenda';
$host = '50.116.86.45';

$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados". $mysqli->error);
}

?>
