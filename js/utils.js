function $$(id) {
    return document.getElementById(id);
}
function $limpiar(id) {
    $$(id).innerHTML= "";
}

function $eliminar(id){
    var elemento = $$(id);
    if (!elemento)
        console.log("El elemento selecionado no existe")
    else
        elemento.parentNode.removeChild(elemento);
}