<?php
    require "validar.php";

	$title = "LISTADO DE ALUMNOS";
	
	require "conexion.php";

	//$sql = "SELECT padron, nombre, apellido, dni FROM alumnos";

    $sql = "SELECT padron, nombre, apellido, dni, nacionalidad " .
                "FROM alumnos as a left join nacionalidades as n " .
                    "ON a.id_nac = n.id_nac";

	$resultado = mysqli_query($link, $sql);

?>

<?php require "encabezado.php" ?>
<body>

    <script >

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
            var request = new XMLHttpRequest();
            request.addEventListener('load', function(event){operacion_completada(event, padron)}, false);

            request.open('POST', 'php/soap/alumno/eliminar.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send("nro_padron=" + padron);
        }
    </script>

    <?php require "menu.php" ?>
    <h1><?php echo $title ; ?></h1>
    <table>
        <tr>
            <th>PADRON</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>DNI</th>
            <th>PAIS</th>
            <th></th>
        </tr>

        <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
            <tr id = "<?php echo $fila['padron'] ?>">
                <td><?php echo $fila['padron'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['apellido'] ?></td>
                <td><?php echo $fila['dni'] ?></td>
                <td><?php echo $fila['nacionalidad'] ?></td>
                <td><img src="img/icono-eliminar.png" alt="Eliminar" onclick="eliminar_alumno(<?php echo $fila['padron'] ?>)"></td>
            </tr>
        <?php } ?>

    </table>

    <a href="admin.php">INICIO</a>
</body>
</html>

<?php
    mysqli_close($link);
?>