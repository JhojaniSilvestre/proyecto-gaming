<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

    require_once '../models/adminUsers_model.php';
    $users = obtenerUsuarios($conn);

	if (isset($_GET['idAct']) && $_GET['idAct'] != "") {

        //obtener datos del torneo seleccionado
        $idAct = $_GET['idAct']; //obtengo el id pasado por la url del enlace
        activarUser($conn,$idAct);

		header("location: adminUsers_controller.php");
       
    }else if (isset($_GET['idDesc']) && $_GET['idDesc'] != "") {

        $idDesc = $_GET['idDesc']; 
		desactivarUser($conn,$idDesc);

		header("location: adminUsers_controller.php");
       
    }


	cerrarConexion($conn);

	require_once("../views/adminUsers_view.php");
?>