<?php

$buscar = $_POST["buscar"];
$opcion = $_POST["op"];

switch ($opcion) {
    case "idAlumno":
        echo "Busqueda por ID <br> <br>";
        $sql = "select * from alumnos where idAlumno = $buscar;";
        break;
    case "nombre":
        echo "Busqueda por Nombre <br> <br>";
        $sql = "select * from alumnos where nombre = '$buscar';";
        break;
    default:
        echo "Busqueda indefinida";
}
