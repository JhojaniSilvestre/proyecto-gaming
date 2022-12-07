<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

    require_once '../models/adminIncidents_model.php';
    $incidents = obtenerIncidencias($conn);

	cerrarConexion($conn);

	require_once("../views/adminIncidents_view.php");
?>