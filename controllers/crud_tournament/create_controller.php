<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../../index.php");
	}

    require_once '../../db/db.php';
	$conn = generarConexion();
	require_once '../../models/crudTournament_model.php';
	//array que contiene los juegos
	$games = obtenerJuegos($conn);

	if ($_SERVER["REQUEST_METHOD"] === "POST") { 
		if (isset($_POST['crear'])) {
			
			$name = limpiar($_POST["nombre"]);
			$date = limpiar($_POST["fecha"]);
			$idgame = limpiar($_POST["juego"]);
			$shift = limpiar($_POST["turno"]);

			$errors = array();
			$correct = true;
			//fecha formato datetime según la hora elegida
			if ($shift == "m")
				$datetime = $date." 11:15:00";
			else
				$datetime = $date." 17:45:00";

			/* funcion para obtener la fecha actual */
			date_default_timezone_set('Europe/Madrid');
			$dateNow = date("Y-m-d");

			//validaciones 
			if ($_SESSION['shift'] != $shift) {
				array_push($errors,"No puede crear torneos que no correspondan a su turno");
				$correct = false;
			}
			//
			if ($date < $dateNow) {
				array_push($errors,"Introduzca una fecha correcta");
				$correct = false;
			}else{
				$dateFree = fechaDisponible($conn,$datetime);
				if ($dateFree === false) {
					array_push($errors,"La fecha seleccionada no está disponible");
					$correct = false;
				}
			}

			if($correct){
				$idTournmt = generarIdTorneo($conn);
				crearTorneo($conn,$idTournmt,$name,$datetime,$idgame);
			}
		}
	}
	cerrarConexion($conn);
	require_once("../../views/crud_tournament/create_view.php");
?>