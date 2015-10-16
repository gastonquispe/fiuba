<?php

require 'vendor/autoload.php';
require 'conexion.php';
require 'validar.php';

$title = "GENERACION DE 10 ALUMNOS";

$faker = Faker\Factory::Create();

$sql_nac = "SELECT count(*) as cant_nac FROM nacionalidades";

$resultado = mysqli_query($link, $sql_nac);
$fila = mysqli_fetch_array($resultado);
$cant_nac = $fila['cant_nac'];

?>
<?php require "encabezado.php" ?>
<body>
    <?php require "menu.php" ?>
    <div class="contenedor_principal">
        <h1><?php echo $title ?></h1>

        <?php
            if ($cant_nac > 0) {
                mysql_query("BEGIN");
                for ($i = 0; $i < 10; $i++) {
                    echo "<p>";
                    echo $sql = "INSERT INTO alumnos (padron, nombre, apellido, dni, id_nac) VALUES ("
                        . "'" . $faker->numberBetween(82000, 96000) . "'" . ","
                        . "'" . $faker->firstName . "'" . ","
                        . "'" . $faker->lastName . "'" . ","
                        . "'" . $faker->numberBetween(30000000, 40000000) . "'" . ","
                        . "'" . $faker->numberBetween(1, $cant_nac) . "'" . ")";

                    echo "<p/>";
                    mysqli_query($link, $sql);

                }
                mysql_query("COMMIT");
            } else {
                echo "ERROR: NO HAY NACIONALIDADES CARGADAS";
            }
        ?>

        <h2><a href="admin.php">INICIO</a></h2>
    </div>
</body>
</html>

<?php mysqli_close($link); ?>