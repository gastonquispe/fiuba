<?php
    require "validar.php";

    $title = "MODIFICACION DE ALUMNOS";

    $nro_padron = $_POST["nro_padron"];

    require "conexion.php";

    $sql = "SELECT * FROM alumnos WHERE padron = '" . $nro_padron . "'";

    $resultado = mysqli_query($link, $sql);
    $chequeo = mysqli_affected_rows($link);
    $fila = mysqli_fetch_array($resultado);

    $sql_nac_todos = "SELECT * FROM nacionalidades";
    $resultado_nac_todos = mysqli_query($link, $sql_nac_todos);

    $sql_nac_alum = "SELECT * FROM nacionalidades WHERE id_nac = '" . $fila["id_nac"] . "'";
    $resultado_nac_alum = mysqli_query($link, $sql_nac_alum);
    $fila_nac_alum = mysqli_fetch_array($resultado_nac_alum);
?>

<?php require "encabezado.php" ?>
</head>
    <?php require "menu.php" ?>
    <h1><?php echo $title ?></h1>

    <?php if ($chequeo == 1) { ?>
        <form action="modificar-alumno.php" method="post" onsubmit="return validar_form_modificacion_alumno()">
            <input hidden type="text" id = "padron" name="padron" value="<?php echo $nro_padron ?>">
            <table>
                <tr>
                    <td>PADRON:</td>
                    <td><?php echo $nro_padron ?></td>
                </tr>
                <tr>
                    <td>NOMBRE:</td>
                    <td><input type="text" value="<?php echo $fila['nombre'] ?>" name="nombre" id="alumno_nombre"></td>
                </tr>
                <tr>
                    <td>APELLIDO:</td>
                    <td><input type="text" value="<?php echo $fila['apellido'] ?>" name="apellido" id="alumno_apellido"></td>
                </tr>
                <tr>
                    <td>DNI:</td>
                    <td><input type="text" value="<?php echo $fila['dni'] ?>" name="dni" id="alumno_dni"></td>
                </tr>
                <tr>
                    <td>NACIONALIDAD:</td>
                    <td>
                        <select name = "id_nac">
                            <?php while ($fila = mysqli_fetch_array($resultado_nac_todos)) { ?>
                                <?php if ($fila["id_nac"] == $fila_nac_alum["id_nac"]) { ?>
                                    <option selected = "selected" value="<?php echo $fila['id_nac'] ?>"><?php echo $fila['nacionalidad']?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $fila['id_nac'] ?>"><?php echo $fila['nacionalidad']?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="REALIZAR MODIFICACION"></td>
                </tr>
            </table>
        </form>
    <?php } else { ?>
        <h3>EL ALUMNO NO EXISTE</h3>
    <?php } ?>

    <a href="admin.php">INICIO</a>

</html>

<?php
mysqli_close($link);
?>
