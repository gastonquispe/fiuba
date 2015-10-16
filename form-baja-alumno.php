<?php
require "validar.php";

$title = "BAJA ALUMNO";
?>

<?php require "encabezado.php" ?>
<body>
    <?php require "menu.php" ?>
    <h1><?php echo $title ?></h1>

    <form action="baja-alumno.php" method="post" onsubmit="return validar_form_baja_alumno()">
        <table>
            <th>
                <td>PADRON</td>
                <td><input type="text" name="nro_padron" id="nro_padron"></td>
            </th>
            <tr>
                <td colspan="2">
                    <input type="submit" value="ELIMINAR ALUMNO">
                </td>
            </tr>
        </table>
    </form>
    <a href="admin.php">INICIO</a>
</body>
</html>
