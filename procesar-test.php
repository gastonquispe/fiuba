<?php

require 'validar.php';

// TOMAR DATOS

$alum_nombre = $_POST["alum_nombre"];
$alum_edad = $_POST["alum_edad"];

// VERIFICAR DATOS

require 'php/validacion-datos.php';

$errors = array();
$descripcion = null;

if (!validarNombre($alum_nombre, $descripcion)) {
    $errors["alum_nombre"] = $descripcion;
}

if (!validarEdad($alum_edad, $descripcion)) {
    $errors["alum_edad"] = $descripcion;
}

// VERIFICAR SI SE ENCONTRARON ERRORES Y ACTUAR CONSECUENTEMENTE

if (empty($errors)) {
    echo 'NO HAY ERRORES <br /> DATOS ALMACENADOS <br /> <br /> <a href="form-test.php">VOLVER AL FORMULARIO</a>';
} else {

    $form = [
        "alum_nombre" => $alum_nombre,
        "alum_edad" => $alum_edad
    ];

    $_SESSION["form"] = $form;
    $_SESSION["errors"] = $errors;

    echo 'ERROR EN LOS DATOS DE FORMULARIO <br />';
    header("location:form-test.php?error=1");
}
