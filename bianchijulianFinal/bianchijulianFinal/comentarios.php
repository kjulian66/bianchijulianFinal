<?php
session_start();

$asunto = $_POST["asunto"];
$comentario = $_POST["comentario"];
$nombre = $_SESSION["nombre"];
$idUsuario = $_SESSION["idUsuario"];

$texto = "<br>Mensaje de <div class=rojo>$nombre </div> con ID: $idUsuario <br> Comentario: $comentario <br> Asunto: $asunto <br> Enviado el " . date("d-m-Y") . "<br><br>";
$archivo = fopen("comentarios.txt", "a+");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <title>Document</title>
</head>

<body>
  <?php

  if (fwrite($archivo, $texto)) {
    fclose($archivo);
    header("location: formularioUsuario.php?msj=enviado");
  } else {
    header("location: formularioUsuario.php?msj=noEnviado");
  }

  ?>
</body>

</html>