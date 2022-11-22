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

	cerrarConexion($conn);

	require_once("../views/adminUsers_view.php");
?>