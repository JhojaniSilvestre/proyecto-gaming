<?php
    session_start();
    
    if (!isset($_SESSION['id_user'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}


	require_once '../db/db.php';
	$conn = generarConexion();

	require_once '../models/userTournament_model.php';
	//array que contienelos torneos disponibles
	$tournamentsMorning = obtenerTorneosMañana($conn);
    $tournamentsEvening = obtenerTorneosTarde($conn);


	cerrarConexion($conn);

	require_once("../views/userTournament_view.php");
