<?php if(isset($_SESSION['login'])) {?>
    <div id = "barra_titulo">
        <h3>USUARIO:<?php echo $_SESSION["nombre"] ?>  [<a href="logout.php">DESCONECTARSE</a>] </h3>
    </div>
<?php } else { ?>
    <h3><a href="login.php">Conectarse</a></h3>
<?php } ?>
