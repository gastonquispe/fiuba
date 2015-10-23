<?php

require "../../../validar.php";
require '../../../conexion.php';

$sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
    "FROM alumnos as a left join nacionalidades as n " .
    "ON a.id_nac = n.id_nac ";

$resultados = mysqli_query($link, $sql);

$listado = array();

while ($fila = mysqli_fetch_array($resultados)) {

    $listado[] = ["padron"       => $fila["padron"],
                  "nombre"       => $fila["nombre"],
                  "apellido"     => $fila["apellido"],
                  "dni"          => $fila["dni"],
                  "nacionalidad" => $fila["nacionalidad"]];
}

$listado_json = json_encode($listado);

echo $listado_json;

mysqli_close($link);