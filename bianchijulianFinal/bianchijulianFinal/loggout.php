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
    $fecha = date("d-m-Y");
    $hora = date("H:i:s");
    $horaInicio = time();

    session_destroy();

    $horaFinal = time();
    $tiempo = $horaFinal - $horaInicio;
    $texto = "

    Usuario: $usuario ID: $idUsuario
    Dia conexion $fecha a las $hora
    Tiempo: $tiempo
    
    ";

    $archivo = fopen("accesos.txt", "a+");
    fwrite($archivo, $texto);
    fclose($archivo);

    echo "<br><br>";
    echo "Sesion cerrada correctamente";
    echo "<a href='index.php'>Volver a iniciar sesion</a>";

    ?>
</body>

</html>