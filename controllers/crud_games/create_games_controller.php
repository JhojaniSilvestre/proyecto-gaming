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

			if($correct){
				añadirJuegos($conn,$name);
                array_push($errors,"Se ha añadido correctamente");
			}else{
                array_push($errors,"No se ha podido añadir el juego");
				$correct = false;
            }
		}
	}
	cerrarConexion($conn);
	require_once("../../views/crud_games/create_game_view.php");
?>