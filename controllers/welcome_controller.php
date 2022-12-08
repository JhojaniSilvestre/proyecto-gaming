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
	require_once '../models/wins_model.php';

	$ranking = obtenerRankingWins($conn);
	$torneos = obtenerTorneosWelcome($conn);

	cerrarConexion($conn);

    require_once("../views/welcome_view.php");
?>