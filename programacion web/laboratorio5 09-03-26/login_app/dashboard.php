<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Panel</title>
</head>

<body>

<h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>

<a href="logout.php">Cerrar Sesión</a>

</body>
</html>