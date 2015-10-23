<?php
$title = "TEST GET AJAX";
require 'encabezado.php'; ?>


<body>
<script>
    function enviar_peticion_get() {
        var request = new XMLHttpRequest;

        request.addEventListener('load',
            function(event){
                $$("salida").innerHTML = request.responseText; }, true);
        request.open("GET", "test-get-ajax-request.php?nombre_alumno=pepe", true);
        request.send(null);
    }
</script>

<input type="submit" value="Enviar peticion GET" onclick="enviar_peticion_get()">

<div id="salida"></div>
</body>
</html>