<?php
    require "validar.php";
	$title = "LISTADO DE ALUMNOS";
	require "conexion.php";

    $sql = "SELECT * FROM nacionalidades";
    $resultado = mysqli_query($link, $sql);


?>


<?php require "encabezado.php" ?>
<body onload="listar_alumnos();">

    <script >
        function eliminar_alumno(padron) {

            if (confirm('¿Esta seguro?')) {
                var request = new XMLHttpRequest();

                request.addEventListener('load', function(event){ $$eliminar(padron) }, false);

                request.open('POST', 'php/soap/alumno/eliminar.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send("nro_padron=" + padron);
            }
        }
        function agragar_alumno_al_listado(padron, nombre, apellido, dni, pais) {
            $$("cuerpo_listado").innerHTML +=
                "<tr id =" + padron + ">" +
                    "<td>" + padron   + "</td>" +
                    "<td>" + nombre   + "</td>" +
                    "<td>" + apellido + "</td>" +
                    "<td>" + dni      + "</td>" +
                    "<td>" + pais     + "</td>" +
                    "<td><img src='img/icono-modificar.png' alt=''></td>" +
                    "<td><img src='img/icono-eliminar.png' alt='' onclick='eliminar_alumno(" + padron + ")'></td>" +
                "</tr>";
        }

        function mostrar_en_tabla(event, request) {

            $$limpiar("cuerpo_listado");
            var listado_alumnos = JSON.parse(request.responseText);
            //$$("xxx").innerHTML += (request.responseText);

            for (var i = 0; i < listado_alumnos.length; i++) {
                agragar_alumno_al_listado(
                    listado_alumnos[i]["padron"],
                    listado_alumnos[i]["nombre"],
                    listado_alumnos[i]["apellido"],
                    listado_alumnos[i]["dni"],
                    listado_alumnos[i]["nacionalidad"]);
            }

        }

        function listar_alumnos() { //(padron,nombre,apellido,dni,pais)
            var request = new XMLHttpRequest();

            request.addEventListener('load', function(event){mostrar_en_tabla(event, request)}, false);

            request.open('POST', 'php/soap/alumno/listar.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send();
        }

        function buscar_alumnos() {

            var request = new XMLHttpRequest();

            request.addEventListener('load', function(event){ mostrar_en_tabla(event, request) }, false);

            request.open('POST', 'php/soap/alumno/buscar.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            var post = //"input_padron="   + $$("input_padron").value   + "&" +
                       "input_nombre="   + $$("input_nombre").value   + "&" +
                       "input_apellido=" + $$("input_apellido").value;// + "&" +
                       //"input_dni="      + $$("input_dni").value      + "&" +
                       //"input_pais="     + $$("input_pais").value;

            console.log(post);
            request.send(post);
        }

    </script>

    <?php require "menu.php" ?>
    <div class="contenedor_principal">

    <h1><?php echo $title ; ?></h1>

    <table class="listado">
        <thead>
            <tr>
                <th><p>PADRON</p><p><input type="text" id="input_padron" onkeyup="buscar_alumnos()"></p></th>
                <th><p>NOMBRE</p><p><input type="text" id="input_nombre" onkeyup="buscar_alumnos()"></p></th>
                <th><p>APELLIDO</p><p><input type="text" id="input_apellido" onkeyup="buscar_alumnos()"></p></th>
                <th><p>DNI</p><p><input type="text" id="input_dni" onkeyup="buscar_alumnos()"></p></th>
                <th>
                    <p>PAIS</p>
                    <p>
                        <select name = "id_nac" id="input_pais">
                            <option value="-1" selected>SIN FILTRAR</option>
                            <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                                <option value="<?php echo $fila['id_nac'] ?>"><?php echo $fila['nacionalidad']?></option>
                            <?php } ?>

                        </select>
                    </p>
                </th>
                <th><p>MODIFICAR</p></th>
                <th><p>ELIMINAR</p></th>
            </tr>
        </thead>
        <tbody id="cuerpo_listado">

        </tbody>
    </table>

    <h2><a href="admin.php">INICIO</a></h2>
    </div>

    <div id="xxx"></div>

</body>
</html>

<?php
    mysqli_close($link);
?>
*/
