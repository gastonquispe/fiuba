<?php

function validarEdad($valor, &$descripcion) {
    if (filter_var($valor, FILTER_VALIDATE_INT) === FALSE) {
        $descripcion = "La edad no es un numero";
        return false;
    }


    if ($valor < 0 || $valor > 120) {
        $descripcion = "La edad debe ser un valor entre 0 y 120";
        return false;
    }

    return true;
}
///^[a-zA-Z]+$/
//"/^[a-zA-Z�����A������']+$/"
function validarNombre($valor, &$descripcion) {
    if (!preg_match("/^[a-zA-Z]+$/", $valor)) {
        $descripcion = "El nombre tiene caracteres invalidos";
        return false;
    }

    return true;
}