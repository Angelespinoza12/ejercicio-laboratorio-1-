<?php
// datos enviados desde Ajax
$usuario = $_POST["usuario"];
$password = $_POST["password"];

// Ejemplo simple: si usuario y contraseña son correctos
if($usuario == "admin" && $password == "1234"){
    echo "<div class='alert alert-success'>¡Bienvenido!</div>";
} else {
    echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
}