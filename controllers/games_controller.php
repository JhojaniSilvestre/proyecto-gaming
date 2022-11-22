<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

	require_once '../models/crudGames_model.php';

	//array que contiene los juegos disponibles
	$games = obtenerJuegos($conn);

	cerrarConexion($conn);

	require_once("../views/games_admin_view.php");
?>