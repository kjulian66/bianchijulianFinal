<?php
session_start();
if (isset($_SESSION["idUsuario"]) && $_SESSION["rol"] == 2) {
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
    <title>Usuario</title>
    <link href="estilo.css" rel="stylesheet">
</head>

<body>
    <div id="cierreSesion">
        <?php echo "Usuario: " . $_SESSION["nombre"] ?>
        <a href="loggout.php"><button>CERRAR SESION</button></a>
    </div>
    <h1>Pagina de Usuario</h1>
    <div class="admin">
        <form method="POST" action="usuarioBuscar.php">
            <input type="text" placeholder="Buscar" name="buscar" maxlength="10" required>
            <div class="radio-container">
                <input type="radio" name="op" value="idAlumno" id="radio-id" required>
                <label for="radio-id">ID Alumno</label>
            </div>
            <div class="radio-container">
                <input type="radio" name="op" value="nombre" id="radio-nombre" required>
                <label for="radio-nombre">NOMBRE</label>
            </div>
            <button type="submit" value="Buscar" name="ENVIAR">BUSCAR</button>
        </form>
        <a href="usuarioMostrar.php">Mostrar Alumnos</a>
        <a href="formularioUsuario.php">Enviar Mensaje a Administrador</a>

    </div>
</body>

</html>