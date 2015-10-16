<?php
    $usu_nombre = $_POST["usu_nombre"];
    $usu_clave = $_POST["usu_clave"];

    require 'conexion.php';

    $sql = "SELECT 1 FROM usuarios
                WHERE usu_nombre = '" . $usu_nombre . "'
                AND   usu_clave = '" . md5($usu_clave) . "'";

    $resultado = mysqli_query($link, $sql);

    $cantRegistros = mysqli_num_rows($resultado);

    mysqli_close($link);

    if ($cantRegistros == 0)
        header("location:index.php?error=1");
    else if ($cantRegistros == 1){
        session_start();
        $_SESSION['login'] = "OK";

        $_SESSION['nombre'] = $usu_nombre;

        header('location:admin.php');
    } else
        die("ERROR DE INTEGRIDAD EN LA BASE DE DATOS");
?>

<?php
    mysqli_close($link);
?>