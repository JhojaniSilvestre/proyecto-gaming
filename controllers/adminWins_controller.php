<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

    require_once '../models/wins_model.php';
    $wins = obtenerVictorias($conn);

	$ranking = obtenerRankingWins($conn);

	cerrarConexion($conn);

	require_once("../views/adminWins_view.php");
?>