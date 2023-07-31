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
  <title>Document</title>
  <link href="estilo.css" rel="stylesheet">
</head>

<body>
  <div id="cierreSesion">
    <?php echo "Usuario: " . $_SESSION["nombre"] ?>
    <a href="loggout.php"><button>CERRAR SESION</button></a>
  </div>

  <h1>MOSTRAR</h1>

  <?php
  require "consultaMostrar.php";
  $conexion = conectar();
  $listar = listarDatos();


  if (mysqli_num_rows($listar) > 0) {
  ?>
    <form method="POST">
      <table id="tablaListar">
        <tr>
          <th>ID Alumno</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha de Nacimiento</th>
          <th>Cuota</th>
          <th>Seleccionar</th>
        </tr>
        <?php
        while ($registro = mysqli_fetch_assoc($listar)) {
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
    </form>
    <button id="botonEnviar" type="submit" value="modificar" formaction="modificar.php">MODIFICAR</button>
    <button id="botonEnviar" type="submit" value="eliminar" formaction="eliminar.php">ELIMINAR</button>
  <?php
  } else {
  ?>
    <h1>NO HAY DATOS CARGADOS</h1>
  <?php
  }
  ?>

  <br><br><br>

  <a href="admin.php">VOLVER</a>
  <a href="altas.php">ALTAS</a>
</body>



</html>