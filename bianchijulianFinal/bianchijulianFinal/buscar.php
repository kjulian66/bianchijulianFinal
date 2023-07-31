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

  require "consultaBuscar.php";
  require "conexion.php";

  $conexion = conectar();
  $resultado = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($resultado) > 0) {
  ?>
    <form method="POST">
      <table id="tablaListar">
        <tr>
          <th>ID Empleado</th>
          <th>Alumno</th>
          <th>Apellido</th>
          <th>Fecha de Nacimiento</th>
          <th>Cuota</th>
          <th></th>
        </tr>
        <?php
        while ($registro = mysqli_fetch_assoc($resultado)) {
        ?>
          <tr>
            <td><?php echo $registro["idAlumno"] ?></td>
            <td><?php echo $registro["nombre"] ?></td>
            <td><?php echo $registro["apellido"] ?></td>
            <td><?php echo $registro["fechaNac"] ?></td>
            <td><?php echo $registro["cuota"] ?></td>
            <td><input type="radio" name="idAlumno" required value="<?php echo $registro["idAlumno"] ?>"></td>
          </tr>
        <?php
        }
        ?>
      </table>
      <button id="botonEnviar" type="submit" value="modificar" formaction="modificar.php">MODIFICAR</button>
      <button id="botonEnviar" type="submit" value="eliminar" formaction="eliminar.php">ELIMINAR</button>
    </form>
  <?php
  } else {
  ?>
    <h1>NO HAY DATOS CARGADOS</h1>
  <?php
  }
  ?>
  <br><br><br><br>


  <a href="admin.php">VOLVER</a>

</body>

</html>