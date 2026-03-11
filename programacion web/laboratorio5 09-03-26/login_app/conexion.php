<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "login_app";

$conexion = new mysqli($host, $user, $pass, $db);

if($conexion->connect_error){
    die("Error de conexión");
}

?>