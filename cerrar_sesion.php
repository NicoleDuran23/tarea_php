<?php

    session_start();
    ob_start();
    $_SESSION['sesion_exito']=4;
    header('Location:index.php');
?>