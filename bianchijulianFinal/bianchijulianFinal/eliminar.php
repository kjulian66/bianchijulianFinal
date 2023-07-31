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
  <h1>Eliminar producto</h1>
  <?php

  $idAlumno = $_POST["idAlumno"];
  echo "Seguro que desea eliminar alumno con ID " . $idAlumno;

  ?>
  <br><br><br><br>

  <form method="POST" action="consultaEliminar.php">
    <input type="hidden" name="idAlumno" required value="<?php echo $idAlumno ?>">
    <button id="botonEnviar" type="submit" value="eliminar">ELIMINAR</button>
  </form>

  <br><br><br><br>


  <a href="admin.php">VOLVER</a>

</body>

</html>