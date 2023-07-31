<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    echo "Hasta pronto " . $_SESSION["nombre"];

    $usuario = $_SESSION["usuario"];
    $nombre = $_SESSION["nombre"];
    $idUsuario = $_SESSION["idUsuario"];
    $fechaInicio = $_SESSION["fechaInicio"];
    $fechaCierre = date("d-m-Y H:i:s");
    session_destroy();


    $duracionSesion = (strtotime($fechaCierre) - strtotime($fechaInicio)) / 60;

    $texto = "
    Usuario: $usuario ID: $idUsuario
    Inicio de sesión: $fechaInicio
    Cierre de sesión: $fechaCierre
    Duración de sesión: $duracionSesion minutos
    ";

    $archivo = fopen("accesos.txt", "a+");
    fwrite($archivo, $texto);
    fclose($archivo);

    echo "<br><br>";
    echo "Sesión cerrada correctamente";
    echo "<a href='index.php'>Volver a iniciar sesión</a>";
    ?>
</body>

</html>