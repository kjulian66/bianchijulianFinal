<?php
require "conexion.php";
function listarDatos()
{
  $conexion = conectar();
  $sql = "select * from alumnos;";
  $resulset = mysqli_query($conexion, $sql);
  return $resulset;
}
