<?php
    session_start(); //se inicia la sesión

    //cerrar sesión si actualmente hay una activa
    if(isset($_SESSION['id_user'])){
        session_unset();
        session_destroy();
    }

    //Llamada a la vista login para recoger datos del formulario
    require_once("views/index_view.php");

?>
