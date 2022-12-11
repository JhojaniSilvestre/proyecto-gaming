<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../../index.php");
	}

    require_once '../../db/db.php';
	$conn = generarConexion();
	require_once '../../models/crudGames_model.php';
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") { 
		if (isset($_POST['añadir'])) {
			
			$name = limpiar($_POST["nombre"]);

			$errors = array();
			$correct = true;

			/* comprobar que el nombre este disponible */
			$disponible = nombreJuegoDisponible($conn,$name);
			if ($disponible === false) {
				array_push($errors,"Ya existe un juego con el nombre introducido.");
				$correct = false;
			}

			if($correct){
				añadirJuegos($conn,$name);
                $mensajeOk="<h5 class='text-success text-center'>Juego añadido con exito!</h5>";
			}
		}
	}
	cerrarConexion($conn);
	require_once("../../views/crud_games/create_game_view.php");