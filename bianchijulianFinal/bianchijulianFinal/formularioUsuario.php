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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <title>Document</title>
</head>
<div id="cierreSesion">
  <?php echo "Usuario: " . $_SESSION["nombre"] ?>
  <a href="loggout.php"><button>CERRAR SESION</button></a>
</div>
<h1>Enviar mensaje al administrador</h1>
<form action="comentarios.php" method="POST">
  Motivo: <select name="asunto">
    <option value="queja">Queja</option>
    <option value="sugerencia">Sugerencia</option>
    <option value="consulta">Consulta</option>
  </select>
  <br><br>
  <textarea name="comentario" placeholder="Comentario" cols="30" rows="10"></textarea>
  <br><br>
  <button type="submit" value="Enviar">ENVIAR</button>
</form>
<?php

if (isset($_GET["msj"])) {
  if ($_GET["msj"] == "enviado") {
    echo "Mensaje enviado";
  }

  if ($_GET["msj"] == "noEnviado") {
    echo "Mensaje no enviado";
  }
}

?>

<a href="usuario.php">VOLVER</a>

<body>

</body>

</html>