<?php
session_start();

if (!isset($_SESSION['id_user'])) {
	session_unset();
	session_destroy();
	header("location: ../index.php");
}

require_once '../db/db.php';
$conn = generarConexion();

require_once '../models/booking_model.php';
require_once '../models/crudTournament_model.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$errors = array();
	$correct = true;

	if (isset($_POST['disponibilidad'])) {
		if ($_POST["fecha"] == "" ||  $_POST["shift"] == "") {
			array_push($errors, "Tiene que seleccionar una fecha y hora para ver la disponibilidad.");
			$correct = false;
		}else{
			$date = limpiar($_POST["fecha"]);
			$turn = limpiar($_POST["shift"]);

				//fecha formato datetime según la hora elegida
				if ($turn == "m")
					$datetime = $date . " 11:15:00";
				else
					$datetime = $date . " 17:45:00";
		}

		if ($correct) {

			$seats = disponibilidadPuestos($conn, $datetime);
			
		}
	}

	if (isset($_POST['submit'])) {
		var_dump(($_POST));
		if (isset($_POST["seat"])) {
			array_push($errors, "Debe elegir un puesto disponible.");
			$correct = false;
		}
		if ($_POST["emailUser"] == "" || $_POST["fecha"] == "" || $_POST['shift'] == "") {
			array_push($errors, "No puede dejar campos en blanco o sin seleccionar.");
			$correct = false;
		} else {
			$emailUser = limpiar($_POST["emailUser"]);
			$emailAcomp = limpiar($_POST["emailAcomp"]);
			$seat = limpiar($_POST["seat"]);
			$date = limpiar($_POST["fecha"]);
			$turn = limpiar($_POST["shift"]);
			$idComp = 'NULL';

			//fecha formato datetime según la hora elegida
			if ($turn == "m")
				$datetime = $date . " 11:15:00";
			else
				$datetime = $date . " 17:45:00";

			$idUsuario = comprobarEmail($conn, $emailUser);
			if ($idUsuario == "") {
				array_push($errors, "El email es incorrecto");
				$correct = false;
			}

			if ($emailAcomp != "") {
				$idComp = comprobarEmail($conn, $emailAcomp);
				if ($idComp == "") {
					array_push($errors, "El email del acompañante es incorrecto");
					$correct = false;
				}
			}

			$resultado = comprobarSitioLibre($conn, $seat, $datetime);
			if ($resultado == false) {
				array_push($errors, "Sitio no disponible");
				$correct = false;
			}

			/* funcion para obtener la fecha actual */
			date_default_timezone_set('Europe/Madrid');
			$dateNow = date("Y-m-d");

			if ($_SESSION['shift'] != $turn) {
				array_push($errors, "No puede reservar un turno al que no pertenezca");
				$correct = false;
			}
			if ($date < $dateNow) {
				array_push($errors, "Introduzca una fecha correcta");
				$correct = false;
			}

			$resultado = reservaNoRepetida($conn,$datetime,$idUsuario);
			if ($resultado == false) {
				array_push($errors, "Ya tiene un puesto reservado para la fecha seleccionada.");
				$correct = false;
			}
		}

		if ($correct) {
			reservaPuesto($conn, $datetime, $seat, $idUsuario, $idComp);
			
		}
	}

	cerrarConexion($conn);
}


cerrarConexion($conn);

require_once("../views/booking_view.php");
