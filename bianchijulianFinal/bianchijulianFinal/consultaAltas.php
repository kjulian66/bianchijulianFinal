<?php
session_start();
if (isset($_SESSION["idUsuario"]) && $_SESSION["rol"] == 1) {
} else {
  echo "ACCESO DENEGADO!!!";
  echo "<br> <a href='index.php'><button>VOLVER</button></a>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="estilo.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div id="cierreSesion">
    <?php echo "Usuario: " . $_SESSION["nombre"] ?>
    <a href="loggout.php"><button>CERRAR SESION</button></a>
  </div>
  <?php
  if (isset($_POST["ENVIAR"])) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNac = $_POST["fechaNac"];
    $cuota = $_POST["cuota"];

    $sql = "insert into alumnos (
      nombre,
      apellido,
      fechaNac,
      cuota
      )
      values (
        '$nombre',
        '$apellido',
        '$fechaNac',
        '$cuota'
      );";

    require "conexion.php";
    $conexion = conectar();

    mysqli_query($conexion, $sql);

    if (mysqli_affected_rows($conexion) > 0) {
      echo "Se cargo alumno <br>";
      echo "<a href='altas.php'>VOLVER</a>";
    } else {
      echo "No se cargo alumno <br>";
      echo "<a href='altas.php'>VOLVER</a>";
    }
  }
  ?>
</body>

</html>