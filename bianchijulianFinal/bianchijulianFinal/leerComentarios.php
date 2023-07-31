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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="estilo.css">
  <title>Document</title>
  <style>
    .rojo {
      color: red;
    }
  </style>
</head>

<body>
  <?php
  $archivo = fopen("comentarios.txt", "r");
  $tamanio = filesize("comentarios.txt");
  if ($tamanio <= 0) {
    echo "No hay comentarios";
  } else {
    echo fread($archivo, $tamanio) . "<br>";
  }

  ?>
  <a href="admin.php">VOLVER</a>
</body>

</html>