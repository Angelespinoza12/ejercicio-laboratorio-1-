<?php

$conexion = new mysqli("localhost", "root", "", "login_app");

$usuario = "admin";
$password = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";

if($conexion->query($sql)){
    echo "Usuario creado correctamente";
}else{
    echo "Error";
}

?>