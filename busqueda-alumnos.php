<?php
    require "validar.php";

	$title = "BUSQUEDA DE ALUMNOS";
	
	require "conexion.php";

	//$sql = "SELECT padron, nombre, apellido, dni FROM alumnos";

    $sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
                "FROM alumnos as a left join nacionalidades as n " .
                    "ON a.id_nac = n.id_nac";

	$resultado = mysqli_query($link, $sql);

?>

<?php require "encabezado.php" ?>
<body>
    <?php require "menu.php" ?>

    <script >

        function operacion_completada(event, request) {
            $$("alumnos_encontrados").innerHTML = request.responseText;

            //$("alumnos_encontrados").innerHTML = $("nombre_alumno").value;
        }

        function buscar_alumno() {
            //if($$("nombre_alumno").value.length < 3)
            //    return true;

            var request = new XMLHttpRequest();

            request.addEventListener('load', function(event){ operacion_completada(event, request) }, false);
            request.open('POST', 'php/soap/alumno/buscar.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send("nombre_alumno=" + $$("nombre_alumno").value);
        };

    </script>

    <form action="">
        <label for="nombre_alumno">NOMBRE</label>
        <input type="text" name="nombre_alumno" id="nombre_alumno" onkeyup="buscar_alumno()">
    </form>

    <div id="alumnos_encontrados"></div>

</body>
</html>

<?php
    mysqli_close($link);
?>