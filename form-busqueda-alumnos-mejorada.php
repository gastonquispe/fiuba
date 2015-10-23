<?php
    require "validar.php";
	require "conexion.php";

	$title = "LISTADO DE ALUMNOS";

    $sql = "SELECT * FROM nacionalidades";
    $resultado = mysqli_query($link, $sql);
?>

<?php require "encabezado.php" ?>
<body>
    <script >

        var listado_alumnos;

        /***************MODAL****************/
        function modal_form_alta_alumno() {
            var el = document.getElementById("modal_form_alta_alumno");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
        }

        /***************ELIMINAR ALUMNO****************/
        function eliminar_elemento_por_id(id){
            var elemento = document.getElementById(id);
            if (!elemento)
                console.log("El elemento selecionado no existe")
            else
                elemento.parentNode.removeChild(elemento);
        }

        function operacion_completada(event, padron) {
            eliminar_elemento_por_id(padron);
        }

        function eliminar_alumno(padron) {
            if (confirm('¿Esta seguro?')) {
                var request = new XMLHttpRequest();
                request.addEventListener('load', function(event){operacion_completada(event, padron)}, false);

                request.open('POST', 'php/soap/alumno/eliminar.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send("nro_padron=" + padron);
            }
        }

        /***************AGREGAR ALUMNO****************/
        function alta_nuevo_alumno() {
            //if (validar_form_alta_alumno()) {

                var request = new XMLHttpRequest();

                //request.addEventListener('load', function(event){ modal_form_alta_alumno(); }, true);
                request.addEventListener('load', function(event){
                    alert(request.responseText);
                }, true);

                request.open('POST', 'php/soap/alumno/alta-alumno.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                var post  = "alumno_nombre="   + $$("alumno_nombre").value   + "&";
                    post += "alumno_apellido=" + $$("alumno_apellido").value + "&";
                    post += "alumno_padron="   + $$("alumno_padron").value   + "&";
                    post += "alumno_dni="      + $$("alumno_dni").value      + "&";
                    post += "id_nac=1";

                //alert(post);
                request.send(post);
            //}
        }



        /***************FIN AGREGAR ALUMNO****************/

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

        function mostrar_datos_en_tabla(event, request) {

            $$limpiar("cuerpo_listado");

            listado_alumnos = JSON.parse(request.responseText);

            for (var i = 0; i < listado_alumnos.length; i++) {
                agragar_alumno_al_listado(
                    listado_alumnos[i]["padron"],
                    listado_alumnos[i]["nombre"],
                    listado_alumnos[i]["apellido"],
                    listado_alumnos[i]["dni"],
                    listado_alumnos[i]["nacionalidad"]);
            }

        }

        function similar(palabra1, palabra2) {
            return (palabra1.toLowerCase().search(palabra2.toLowerCase()) != -1);
        }

        function filtrar_alumnos() {

            $$limpiar("cuerpo_listado");

            var listado_alumnos_filtrada = _.filter(listado_alumnos, function(e) {
                return (similar(e["padron"]      , $$("input_padron").value)   &&
                        similar(e["nombre"]      , $$("input_nombre").value)   &&
                        similar(e["apellido"]    , $$("input_apellido").value) &&
                        similar(e["dni"]         , $$("input_dni").value)      &&
                        similar(e["nacionalidad"], $$("input_pais").value));
            });

            _.each(listado_alumnos_filtrada, function(e) {
                 agragar_alumno_al_listado(e["padron"], e["nombre"], e["apellido"], e["dni"], e["nacionalidad"]);
            });
        }

        function buscar_alumnos() {
            var request = new XMLHttpRequest();

            request.addEventListener('load', function(event){ mostrar_datos_en_tabla(event, request) }, true);

            request.open('POST', 'php/soap/alumno/buscar-alumno.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.send("dato_alumno=" +  $$("dato_alumno").value);
        }

    </script>

    <?php require "menu.php" ?>
    <div class="contenedor_principal">
        <form action="" class = "formulario">
            <table>
                <tr>
                    <td><a href="#" onclick="modal_form_alta_alumno()"><span class="boton-positivo">AGREGAR ALUMNO</span></a></td>
                    <td><input type="text" id="dato_alumno"></td>
                    <td><img src="img/boton-buscar.png" onclick="buscar_alumnos()"></td>
                </tr>
            </table>
        </form>


        <table class="listado">
            <thead>
                <tr>
                    <th><p>PADRON</p><p><input type="text" id="input_padron" onkeyup="filtrar_alumnos()"></p></th>
                    <th><p>NOMBRE</p><p><input type="text" id="input_nombre" onkeyup="filtrar_alumnos()"></p></th>
                    <th><p>APELLIDO</p><p><input type="text" id="input_apellido" onkeyup="filtrar_alumnos()"></p></th>
                    <th><p>DNI</p><p><input type="text" id="input_dni" onkeyup="filtrar_alumnos()"></p></th>
                    <th><p>PAIS</p><p><input type="text" id="input_pais" onkeyup="filtrar_alumnos()"></p></th>
                    <th><p>MODIFICAR</p></th>
                    <th><p>ELIMINAR</p></th>
                </tr>
            </thead>
            <tbody id="cuerpo_listado">

            </tbody>
        </table>

        <h2><a href="admin.php">INICIO</a></h2>
    </div>

    <div id="modal_form_alta_alumno">
         <div>
            <form class="formulario" action="">
                <table>
                    <tr>
                        <td>NOMBRE</td>
                        <td><input type="text" name="alumno_nombre" id="alumno_nombre"/></td>
                    </tr>
                    <tr>
                        <td>APELLIDO</td>
                        <td><input type="text" name="alumno_apellido" id="alumno_apellido"/></td>
                    </tr>
                    <tr>
                        <td>PADRON</td>
                        <td><input type="text" name="alumno_padron" id="alumno_padron"/></td>
                    </tr>
                    <tr>
                        <td>DNI</td>
                        <td><input type="text" name="alumno_dni" id="alumno_dni"/></td>
                    </tr>
                    <tr>
                        <td>PAIS</td>
                        <td>
                            <select name = "id_nac">
                                <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                                    <option value="<?php echo $fila['id_nac'] ?>"><?php echo $fila['nacionalidad']?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="#" onclick="alta_nuevo_alumno()"><span class="boton-positivo">AGREGAR</span></a></td>
                        <!--<td><input type="submit" value="Agregar alumno" onclick="alta_nuevo_alumno()"/></td>-->
                    </tr>
                </table>
            </form>
            <h2><a href='#' onclick='modal_form_alta_alumno()'>CERRRAR</a></h2>
         </div>
    </div>
</body>
</html>

<?php
    mysqli_close($link);
?>