<?php

require 'vendor/autoload.php';
require 'conexion.php';



$faker = Faker\Factory::Create();

$sql_nac = "SELECT count(*) as cant_nac FROM nacionalidades";

$resultado = mysqli_query($link, $sql_nac);
$fila = mysqli_fetch_array($resultado);
$cant_nac = $fila['cant_nac'];



if ($cant_nac > 0) {
    mysql_query("BEGIN");
    for ($i = 0; $i < 10; $i++) {
        echo $sql = "INSERT INTO alumnos (padron, nombre, apellido, dni, id_nac) VALUES ("
            . "'" . $faker->numberBetween(82000, 96000) . "'" . ","
            . "'" . $faker->firstName . "'" . ","
            . "'" . $faker->lastName . "'" . ","
            . "'" . $faker->numberBetween(30000000, 40000000) . "'" . ","
            . "'" . $faker->numberBetween(1, $cant_nac) . "'" . ")";

        echo "<br />";
        mysqli_query($link, $sql);

    }
    mysql_query("COMMIT");
}
else {
    echo "ERROR: NO HAY NACIONALIDADES CARGADAS";
}


mysqli_close($link);

echo "<a href='admin.php'>INICIO</a>";
