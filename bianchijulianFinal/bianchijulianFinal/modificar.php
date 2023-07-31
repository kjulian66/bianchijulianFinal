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
    <h1>Modificar Alumnos</h1>
    <?php

    $idAlumno = $_POST["idAlumno"];
    echo "Modificar alumno con ID " . $idAlumno;

    require "conexion.php";
    $conexion = conectar();

    $sql = "select * from alumnos where idAlumno = $idAlumno;";

    $resultado = mysqli_query($conexion, $sql);

    $registro = mysqli_fetch_assoc($resultado);

    ?>
    <br><br><br><br>

    <form method="POST" action="consultaModificar.php">
        <input type="hidden" name="idAlumno" required value="<?php echo $registro["idAlumno"] ?>">
        <input type="text" name="nombre" required value="<?php echo $registro["nombre"] ?>">
        <input type="text" name="apellido" required value="<?php echo $registro["apellido"] ?>">
        <input type="date" name="fechaNac" required value="<?php echo $registro["fechaNac"] ?>">
        <input type="number" step="0.01" name="cuota" required value="<?php echo $registro["cuota"] ?>">
        <button id="botonEnviar" type="submit" value="guardarCambios">GUARDAR CAMBIOS</button>
    </form>

    <br><br><br><br>


    <a href="admin.php">VOLVER</a>

</body>

</html>