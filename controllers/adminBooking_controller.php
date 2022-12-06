<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}

	require_once '../db/db.php';
	$conn = generarConexion();

	require_once '../models/booking_model.php';
	//array que contiene las pelis disponibles
	$booking=obtenerReservas($conn);
    $participants=obtenerParticipantes($conn);

	cerrarConexion($conn);

	require_once("../views/adminBooking_view.php");
?>