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

    $_SESSION["fechaInicio"] = date("d-m-Y H:i:s");

    switch ($registro["rol"]) {
      case 1:
        header("location:admin.php");
        break;
      case 2:
        header("location:usuario.php");
        break;
      default:
        echo "Se ha producido un error";
    }
  } else {
    header("location:index.php?error=Contraseña incorrecta");
    exit();
  }
} else {
  header("location:index.php?error=No existe el usuario $usuario");
  exit();
}
