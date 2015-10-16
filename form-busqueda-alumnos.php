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

    <div class="contenedor_principal">
    <h1><?php echo $title ?></h1>
    <script >

        function operacion_completada(event, request) {

            if (request.status == 200) {
                $$("alumnos_encontrados").innerHTML = request.responseText;
            }
            else {
                alert("MUERTOS");
            }
        }

        function buscar_alumno() {
            if($$("nombre_alumno").value.length == 0) {
                $$("alumnos_encontrados").innerHTML = "";
                return true;
            }

            var request = new XMLHttpRequest();

            request.addEventListener('load', function(event){ operacion_completada(event, request) }, false);
            request.open('POST', 'php/soap/alumno/buscar.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send("nombre_alumno=" + $$("nombre_alumno").value);
        };

    </script>

        <form class="formulario" action="">
            <table>
                <tr>
                    <td>
                        <label for="nombre_alumno">NOMBRE</label>
                    </td>
                    <td>
                        <input type="text" name="nombre_alumno" id="nombre_alumno" onkeyup="buscar_alumno()">
                    </td>
                </tr>
            </table>
        </form>

        <div id="alumnos_encontrados" style="text-align: center"></div>

        <h2><a href="admin.php">INICIO</a></h2>
    </div>
</body>
</html>

<?php
    mysqli_close($link);
?>