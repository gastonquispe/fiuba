<?php
require "validar.php";

$title = "BAJA ALUMNO";
?>

<?php require "encabezado.php" ?>
<body>
    <?php require "menu.php" ?>

    <div class="contenedor_principal">
    <h1><?php echo $title ?></h1>
        <form class="formulario" action="baja-alumno.php" method="post" onsubmit="return validar_form_baja_alumno()">
            <table>
                <tr>
                    <td>PADRON</td>
                    <td><input type="text" name="nro_padron" id="nro_padron"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <input type="submit" value="ELIMINAR ALUMNO">
                    </td>
                </tr>
            </table>
        </form>
    <h2><a href="admin.php">INICIO</a></h2>
    </div>
</body>
</html>
