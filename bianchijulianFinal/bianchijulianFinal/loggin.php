<?php

$usuario = $_POST["usuario"];
$contrasenia = $_POST["contrasenia"];

require "conexion.php";
$conexion = conectar();

$sql = "select * from usuarios where usuario = '$usuario';";

$resulset = mysqli_query($conexion, $sql);

if (mysqli_affected_rows($conexion) > 0) {
  $registro = mysqli_fetch_assoc($resulset);
  if ($contrasenia == $registro["contrasenia"]) {
    session_start();
    $_SESSION["idUsuario"] = $registro["idUsuario"];
    $_SESSION["usuario"] = $usuario;
    $_SESSION["nombre"] = $registro["nombre"];
    $_SESSION["rol"] = $registro["rol"];

    switch ($registro["rol"]) {
      case 1:
        header("location:admin.php");
        break;
      case 2:
        header("location:empleado.php");
        break;
      default:
        echo "Se ha producido un error";
    }
  } else {
    echo "Contraseña incorrecta";
  }
} else {
  echo "No existe el usuario " . $usuario;
}
