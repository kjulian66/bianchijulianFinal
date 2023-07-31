<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>
  <link href="estilo.css" rel="stylesheet">
</head>

<body>
  <h1>Final Julian Bianchi</h1>
  <h2>Iniciar Sesion</h2>
  <div class="admin">
    <form method="POST" action="loggin.php">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasenia" placeholder="Contraseña" required>
      <button type="submit" value="Iniciar Sesion">Iniciar Sesion
      </button>
    </form>
  </div>
</body>

</html>