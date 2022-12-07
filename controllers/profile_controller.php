<?php
   session_start();
    
    if (!isset($_SESSION['id_user'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();
	$id_user = $_SESSION["id_user"];

	require_once '../models/profile_model.php';
	//array que contienelos torneos disponibles

	$misReservas= obtenerMisReservas($conn,$id_user);
	$misTorneos=obtenerMisTorneos($conn,$id_user);

	if (isset($_GET['id_tournament']) && $_GET['id_tournament'] != "") {

        //obtener datos del torneo seleccionado
        $id_tournament = $_GET['id_tournament']; //obtengo el id pasado por la url del enlace
        updateTorneo($conn,$id_tournament,$id_user);
		$resultado=comprobarResponsableTorneo($conn,$id_user,$id_tournament);
		if($resultado === true){
			asignarNuevoResponsableTorneo($conn,$id_user,$id_tournament);
		}
		header("location: profile_controller.php");
       
    }else if (isset($_GET['id_booking']) && $_GET['id_booking'] != "") {

        $id_booking = $_GET['id_booking']; 
		updateReserva($conn,$id_booking);
		//Asignar nuevo responsable
		$resultado = comprobarResponsable($conn,$id_booking);
		var_dump($resultado);
		if($resultado === true){
			asignarNuevoResponsable($conn,$id_booking);
		}
		
		header("location: profile_controller.php");
       
    }

	cerrarConexion($conn);

    require_once("../views/profile_view.php");
