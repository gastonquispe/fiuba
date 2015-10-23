<?php

require "../../../validar.php";
require '../../../conexion.php';

if (isset($_POST["nombre_alumno"])) {
    $nombre_alumno = $_POST["nombre_alumno"];

    $sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
        "FROM alumnos as a left join nacionalidades as n " .
        "ON a.id_nac = n.id_nac " .
        "WHERE lower(nombre) LIKE '%" . $nombre_alumno . "%'";

    $resultados = mysqli_query($link, $sql);

    //echo "PADRON\tNOMBRE\tAPELLIDO\tDNI\tNACIONALIDAD<br />";
    while ($fila = mysqli_fetch_array($resultados)) {

        echo $fila["padron"] . "\t" . $fila["nombre"] . $fila["apellido"] . "\t" . $fila["dni"] . "\t" . $fila["nacionalidad"] ."<br />";
    }

}
