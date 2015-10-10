<?php
require "validar.php";

$title = "FORMULARIO DE PRUEBA";

$form_error = isset($_GET["error"]) && $_GET["error"] == 1;

$error_alum_nombre = (isset($_SESSION["errors"]["alum_nombre"]) && $form_error) ? $_SESSION["errors"]["alum_nombre"] : "";
$error_alum_edad = (isset($_SESSION["errors"]["alum_edad"]) && $form_error) ? $_SESSION["errors"]["alum_edad"] : "";

$alum_nombre = ($form_error) ? $_SESSION["form"]["alum_nombre"] : "";
$alum_edad = ($form_error) ? $_SESSION["form"]["alum_edad"] : "";

?>

<?php require "encabezado.php" ?>
<body>
<?php require "menu.php" ?>
<h1><?php echo $title ?></h1>

<?php if ($form_error) echo "<h3> SE ENCONTRARON CAMPOS INVALIDOS</h3>" ?>

<form action="procesar-test.php" method="post">
    <table>
        <tr>
            <td>NOMBRE</td>
            <td><input type="text" name="alum_nombre" id="alum_nombre" <?php echo "value='" . $alum_nombre . "'" ?></td>
            <td><?php echo $error_alum_nombre ?></td>
        </tr>
        <tr>
            <td>EDAD</td>
            <td><input type="text" name="alum_edad" id="alum_edad" <?php echo "value='" . $alum_edad . "'" ?></td>
            <td><?php echo $error_alum_edad ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="ENVIAR">
            </td>
        </tr>
    </table>
</form>
<a href="admin.php">INICIO</a>
</body>
</html>
