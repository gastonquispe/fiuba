<?php
require "../../../validar.php";
require '../../../conexion.php';

$nro_padron = $_POST["nro_padron"];

$sql = "DELETE FROM alumnos WHERE padron='" . $nro_padron . "'";
mysqli_query($link, $sql);

$cantidad_de_borrados = mysqli_affected_rows($link);

/*
if ($cantidad_de_borrados == 1)
    echo 1;
else
    echo 0;
*/

echo "PEPE";

mysqli_close($link);