function $$(id) {
    return document.getElementById(id);
}
/*
function $$html(id) {
    return $$(id).innerHTML;
}
*/
function $$limpiar(id) {
    $$(id).innerHTML= "";
}

function $$eliminar(id){
    var elemento = $$(id);
    if (!elemento)
        console.log("El elemento selecionado no existe")
    else
        elemento.parentNode.removeChild(elemento);
}