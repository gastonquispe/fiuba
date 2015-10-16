// VALIDACIONES PRIMITIVAS ================

function es_solo_texto(valor) {
    var filter = /^[\'A-Za-z\_\-\.\s\xF1\xD1]+$/;
    if (filter.test(valor))
        return true;
    return false;
}

function es_solo_espacios(valor) {
    if (/^\s+$/.test(valor))
        return true;
    return false;
}

// VALIDACION DE CAMPOS ===================

function padron_valido(valor, errores) {

    if (valor==null || valor.length == 0) {
        errores.push("El PADRON esta vacio.");
        return false;
    } else if (isNaN(valor) || es_solo_espacios(valor)) {
        errores.push("El PADRON no es un numero.");
        return false;
    }

    return true;
}

function nombre_alumno_valido(valor, errores) {

    if (valor == null || valor.length == 0) {
        errores.push("El campo NOMBRE esta vacio.");
        return false;
    } else if (es_solo_espacios(valor)) {
        errores.push("El campo NOMBRE es solo espacios.");
        return false;
    } else if (!es_solo_texto(valor)) {
        errores.push("El campo NOMBRE tiene caracteres invalidos.");
        return false;
    } else if (valor.length < 2) {
        errores.push("El campo NOMBRE debe tener 2 o mas caracteres.");
        return false;
    }

    return true;
}

function apellido_alumno_valido(valor, errores) {

    if (valor == null || valor.length == 0) {
        errores.push("El campo APELLIDO esta vacio.");
        return false;
    } else if (es_solo_espacios(valor)) {
        errores.push("El campo APELLIDO es solo espacios.");
        return false;
    } else if (!es_solo_texto(valor)) {
        errores.push("El campo APELLIDO tiene caracteres invalidos.");
        return false;
    } else if (valor.length < 2) {
        errores.push("El campo APELLIDO debe tener 2 o mas caracteres.");
        return false;
    }

    return true;
}

function dni_valido(valor, errores) {

    if (valor == null || valor.length == 0) {
        errores.push("El campo DNI esta vacio.");
        return false;
    } else if (isNaN(valor)) {
        errores.push("El campo DNI esta no es un numero.");
        return false;
    } else if (es_solo_espacios(valor)) {
        errores.push("El campo DNI esta no es solo espacios.");
        return false;
    }

    return true;
}

// VALIDACION DE FORMULARIOS ==============

function validar_form_seleccionar_alumno_modificacion() {
    var errores = [];

    var padron = document.getElementById("nro_padron").value;
    if (!padron_valido(padron, errores)) {
        alert(errores[0]);
        return false;
    }
}

function validar_form_baja_alumno() {
    var errores = [];

    var padron = document.getElementById("nro_padron").value;
    if (!padron_valido(padron, errores)) {
        alert(errores[0]);
        return false;
    }
}

function validar_form_alta_alumno() {
    var errores = [];

    var nombre = document.getElementById("alumno_nombre").value;
    if (!nombre_alumno_valido(nombre, errores)) {
        alert(errores[0]);
        return false;
    }

    errores = []; // TODO: VER EFICIENCIA
    var apellido = document.getElementById("alumno_apellido").value;
    if (!apellido_alumno_valido(apellido, errores)) {
        alert(errores[0]);
        return false;
    }

    errores = [];
    padron = document.getElementById("alumno_padron").value;
    if (!padron_valido(padron, errores)) {
        alert(errores[0]);
        return false;
    }

    errores = [];
    var dni = document.getElementById("alumno_dni").value;
    if (!dni_valido(dni, errores)) {
        alert(errores[0]);
        return false;
    }
}

function validar_form_modificacion_alumno() {
    var errores = [];

    var nombre = document.getElementById("alumno_nombre").value;
    if (!nombre_alumno_valido(nombre, errores)) {
        alert(errores[0]);
        return false;
    }

    errores = []; // TODO: VER EFICIENCIA
    var apellido = document.getElementById("alumno_apellido").value;
    if (!apellido_alumno_valido(apellido, errores)) {
        alert(errores[0]);
        return false;
    }

    errores = [];
    var dni = document.getElementById("alumno_dni").value;
    if (!dni_valido(dni, errores)) {
        alert(errores[0]);
        return false;
    }
}