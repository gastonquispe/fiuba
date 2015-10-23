<?php

require "../../../validar.php";
require '../../../conexion.php';

$dato_alumno = $_POST["dato_alumno"];

if ($dato_alumno !== "") {

    $where  =     "(padron              LIKE '%" . $dato_alumno . "%')";
    $where .= " OR (lower(nombre)       LIKE '%" . $dato_alumno . "%')";
    $where .= " OR (lower(apellido)     LIKE '%" . $dato_alumno . "%')";
    $where .= " OR (lower(dni)          LIKE '%" . $dato_alumno . "%')";
    $where .= " OR (lower(nacionalidad) LIKE '%" . $dato_alumno . "%')";


    $sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
        "FROM alumnos as a left join nacionalidades as n " .
        "ON a.id_nac = n.id_nac " .
        "WHERE " . $where . " ORDER BY padron";

    $resultados = mysqli_query($link, $sql);

    $listado = array();

    while ($fila = mysqli_fetch_array($resultados)) {
        $listado[] = [
            "padron"       => $fila["padron"],
            "nombre"       => $fila["nombre"],
            "apellido"     => $fila["apellido"],
            "dni"          => $fila["dni"],
            "nacionalidad" => $fila["nacionalidad"]
        ];
    }

    $listado_json = json_encode($listado);

    echo $listado_json;

    mysqli_close($link);


}