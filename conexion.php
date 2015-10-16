<?php
$server="localhost";
$usuario_db="root";
$clave_db="";
$base="gaston";
$link=mysqli_connect($server,$usuario_db,$clave_db,$base);
//mysqli_set_charset($link, "utf8");

if (!$link) {
    die('Error de Conexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() );
}
