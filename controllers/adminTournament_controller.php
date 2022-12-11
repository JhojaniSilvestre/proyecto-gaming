<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

	require_once '../models/crudTournament_model.php';
	//array que contiene las pelis disponibles
	$tournaments = obtenerTorneos($conn);

	if (isset($_GET['id_tournament']) && $_GET['id_tournament'] != "") {

        //obtener datos del torneo seleccionado
        $id_tournament = $_GET['id_tournament']; //obtengo el id pasado por la url del enlace
		
        desactivarTorneo($conn,$id_tournament);
		header("location: ./adminTournament_controller.php");
       
    }

	cerrarConexion($conn);

	require_once("../views/adminTournament_view.php");
?>