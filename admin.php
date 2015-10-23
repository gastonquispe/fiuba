<?php
    require "validar.php";
    $title = "SISTEMA ABM DE ALUMNOS";

    require "encabezado.php";
?>

<body>
    <?php require "menu.php" ?>
    <div class="contenedor_principal">
        <h1> <?php echo $title ?> </h1>

        <!--<img src="img/calavera.png"  width='200' height='200' alt="">-->

        <ul id="menu_vertical">
            <li><a href="listado-alumnos.php">LISTADO ALUMNOS</a></li>
            <li><a href="form-alta-alumno.php">ALTA ALUMNO</a></li>
            <li><a href="form-baja-alumno.php">BAJA ALUMNO</a></li>
            <li><a href="form-seleccionar-alumno-modificacion.php">MODIFICACION ALUMNO</a></li>
            <li><a href="form-test.php">FORMULARIO TEST (VALIDACION PHP)</a></li>
            <!--<li><a href="url-get-request.php">AJAX TEST (GET)</a></li>-->
            <!--<li><a href="url-post-request.php">AJAX TEST (POST)</a></li>-->
            <li><a href="generar-alumnos.php">GENERAR 10 ALUMNOS</a></li>
            <li><a href="form-busqueda-alumnos.php">BUSQUEDA</a></li>
            <li><a href="abm-ajax.php">ABM-AJAX</a></li>
            <li><a href="test-get-ajax.php">TEST-GET-AJAX</a></li>
            <li><a href="form-busqueda-alumnos-mejorada.php">BUSQUEDA-ALUMNOS-MEJORADA</a></li>
        </ul>
    </div>
</body>
</html>

