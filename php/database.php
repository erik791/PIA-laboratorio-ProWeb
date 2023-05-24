<?php

$host = "localhost";
$dbname = "tienda";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);


if($mysqli->connect_errno) {
    die("Error de conexion: " . $mysqli->connect_error);
}

return $mysqli;

