<?php

require "../../../validar.php";
require '../../../conexion.php';

$where = "";

if ($_POST["input_nombre"] != "") {
    $where = $where . "(lower(nombre) LIKE '%" . $_POST["input_nombre"] . "%')";
    if ($_POST["input_apellido"] != "")
        $where = $where . " AND (lower(apellido) LIKE '%" . $_POST["input_apellido"] . "%')";
}

if ($_POST["input_nombre"] == "" && $_POST["input_apellido"] != "")
    $where = $where . "lower(apellido) LIKE '%" . $_POST["input_apellido"] . "%'";


    $sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
        "FROM alumnos as a left join nacionalidades as n " .
        "ON a.id_nac = n.id_nac " .
        "WHERE " . $where;

    $resultados = mysqli_query($link, $sql);

    $listado = array();

    while ($fila = mysqli_fetch_array($resultados)) {

        $listado[] = ["padron" => $fila["padron"],
            "nombre" => $fila["nombre"],
            "apellido" => $fila["apellido"],
            "dni" => $fila["dni"],
            "nacionalidad" => $fila["nacionalidad"]];
    }

    $listado_json = json_encode($listado);

    echo $listado_json;

//}
mysqli_close($link);