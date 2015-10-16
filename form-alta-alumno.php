<?php
    require "validar.php";
    require "conexion.php";
    $title = "ALTA ALUMNO";

    $sql = "SELECT * FROM nacionalidades";

    $resultado = mysqli_query($link, $sql);
?>

<?php require "encabezado.php" ?>
<body>
	<?php require "menu.php" ?>
    <div class="contenedor_principal">

    <h1><?php echo $title ; ?></h1>

    <form class="formulario" action="alta-alumno.php" method="post" onsubmit="return validar_form_alta_alumno()">
        <table>
            <tr>
                <td>NOMBRE:</td>
                <td><input type="text" name="alumno_nombre" id="alumno_nombre"/></td>
            </tr>
            <tr>
                <td>APELLIDO:</td>
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
                <td><input type="submit" value="Agregar alumno"/></td>
            </tr>
        </table>
    </form>

    <h2><a href="admin.php">INICIO</a></h2>
    </div>
</body>
</html>

<?php
mysqli_close($link);
?>