<?php
    require "validar.php";

    $title = "CONFIMACION DE BAJA DE ALUMNO";
    $nro_padron = $_POST["nro_padron"];

    require 'conexion.php';

    $sql = "DELETE FROM alumnos WHERE padron='" . $nro_padron . "'";
    mysqli_query($link, $sql);

    $chequeo = mysqli_affected_rows($link);

    if ($chequeo == 1)
        $mensaje = "ALUMNO BORRADO EXITOSAMENTE";
    else
        $mensaje = "ERROR: EL ALUMNO NO EXISTE";

?>

<html>
<head>
    <title><?php echo $title ?></title>

    <h3><?php echo $mensaje ?></h3>

    <p><a href="form-baja-alumno.php">BAJA ALUMNO</a></p>
    <p><a href="admin.php">INICIO</a></p>
<body>

</body>
</html>

<?php
    mysqli_close($link);
?>