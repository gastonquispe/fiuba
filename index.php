<?php
    $title = "LOGIN";

    require "encabezado.php";
    //echo filectime("index.php");
    //echo date("F d Y H:i:s.", filectime("index.php"));
?>

<body>

    <div class="contenedor_principal">


        <?php if (isset($_GET["error"]) && $_GET["error"] == 1) { ?>
            <h2>NOMBRE DE USUARIO O CLAVE INCORRECTA</h2>
        <?php } ?>

        <?php if (isset($_GET["error"]) && $_GET["error"] == 2) { ?>
            <h2>NECESITA LOGEARSE PARA INGRESAR AL SITEMA</h2>
        <?php } ?>

        <!--<p>pepe 1234 <?php echo md5(1234) ?></p>-->
        <!--<p>gaston 8888 <?php echo md5(8888) ?></p>-->

        <form class="formulario login" action="login.php" method="post">
            <h1><?php echo $title ?></h1>
            <table>
                <tr>
                    <td>USUARIO:</td>
                    <td>
                        <input type="text" name="usu_nombre">
                    </td>
                </tr>
                <tr>
                    <td>CONTRASE&Ntilde;A:</td>
                    <td>
                        <input type="password" name="usu_clave">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Entrar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>