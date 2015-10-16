<?php
    //$titulo = "Salir del sistema";
    session_start();
    //$nombreUsuario = $_SESSION['nombre'];
    session_unset(); // Debido a versiones viejas de PHP
    session_destroy();
    //header("refresh:3;url=index.php");
    header("location:index.php");
