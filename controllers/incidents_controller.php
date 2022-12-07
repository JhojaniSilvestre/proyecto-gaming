<?php
session_start();

if (!isset($_SESSION['id_user'])) {
	session_unset();
	session_destroy();
	header("location: ../index.php");
}

require_once '../db/db.php';
$conn = generarConexion();

require_once '../models/incidents_model.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST['submit'])) {
		$errors = array();
		$correct = true;

		//compruebo que no hay campos vacios o sin seleccionar
		if ($_POST["title"] == "" || $_POST["fecha"] == "" || $_POST["description"] == "") {
			array_push($errors, "No puede dejar campos en blanco.");
			$correct = false;
		} else {
			$title = limpiar($_POST["title"]);
			$fecha = limpiar($_POST["fecha"]);
			$description = limpiar($_POST["description"]);
			$id_user = $_SESSION["id_user"];
            
			$existe = comprobarResponsableReservas($conn, $id_user, $fecha);
			$existe2 = comprobarResponsableTorneo($conn, $id_user, $fecha);

			if ($existe === false && $existe2 === false) {
				array_push($errors, "No puede registrar incidencias si no es el responsable de la fecha seleccionada");
				$correct = false;
			}
		
		}
		if ($correct) {
			/* funcion para obtener la fecha actual */
			date_default_timezone_set('Europe/Madrid');
			$created = date("Y-m-d");
			registrarIncidencia($conn, $title, $description, $fecha, $created);

			$mensajeOk="<h5 class='text-success text-center'>Incidencia registrada con exito!</h5>";
			
		}
	}
}

cerrarConexion($conn);

require_once("../views/incidents_view.php");
