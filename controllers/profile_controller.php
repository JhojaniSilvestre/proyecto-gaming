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
    
	cerrarConexion($conn);

    require_once("../views/profile_view.php");
?>