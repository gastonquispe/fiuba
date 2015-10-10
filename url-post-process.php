<?php

if (isset($_POST["url"])) {
    echo "POST: " . $_POST["url"];
    //echo file_get_contents('http://' . sanitizeString($_GET['url']));
}


function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
}