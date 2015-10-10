<?php

    $title = "MODIFICACION DE ALUMNO";

    $padron = $_POST["padron"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $id_nac = $_POST["id_nac"];

    require "conexion.php";

    $sql = "UPDATE alumnos SET" .
                " nombre = '" . $nombre . "'" .
                 " ,apellido = '" . $apellido . "'" .
                " ,dni = '" . $dni . "'" .
                " ,id_nac = '" . $id_nac . "'" .
                " WHERE padron = '" . $padron . "'";

    $chequeo = mysqli_query($link, $sql);

    if ($chequeo == 1)
        $mensaje = "MODIFICACION EXITOSA";
    else
        $mensaje = "MODIFICACION FALLIDA";

    // MOSTRAR NACIONALIDAD

    $sql_nac = "SELECT nacionalidad FROM nacionalidades WHERE id_nac = '" . $id_nac . "'";
    $resultado_nac = mysqli_query($link, $sql_nac);
    $fila_nac = mysqli_fetch_array($resultado_nac);
    $alumno_nac = $fila_nac["nacionalidad"]

?>

<html>
<head>
    <title><?php echo $title ?></title>
</head>
<body>
    <h1><?php echo $title ?></h1>

    <h3><?php echo $mensaje ?></h3>
    <table>
        <tr>
            <td>PADRON</td>
            <td><?php echo $padron?></td>
        </tr>
        <tr>
            <td>NOMBRE</td>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <td>APELLIDO</td>
            <td><?php echo $apellido?></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><?php echo $dni?></td>
        </tr>
        <tr>
            <td>NACIONALIDAD</td>
            <td><?php echo $alumno_nac?></td>
        </tr>
    </table>

    <a href="admin.php">INICIO</a>
</body>
</html>

<?php
    mysqli_close($link);
?>