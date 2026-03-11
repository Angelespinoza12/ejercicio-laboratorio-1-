<?php

session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

    $fila = $resultado->fetch_assoc();

    if(password_verify($password, $fila['password'])){

        $_SESSION['usuario'] = $usuario;
        echo "Login correcto";
        header("refresh:2;url=dashboard.php");

    }else{

        echo "Contraseña incorrecta";
        header("refresh:2;url=login.php");

    }

}else{

    echo "Usuario no encontrado";
    header("refresh:2;url=login.php");

}

?>