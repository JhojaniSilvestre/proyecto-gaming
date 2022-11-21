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

	if ($_SERVER["REQUEST_METHOD"] === "POST") { 
		if (isset($_POST['aniadir'])) {
            $errors = array();
            $correct = true;
			//compruebo que no hay campos vacios o sin seleccionar
            if ($_POST["username"] == "" || $_POST["nomTourn"] == "" || $_POST["fecha"] == "" || $_POST["turno"] == "") {
                array_push($errors,"No puede dejar campos en blanco o sin seleccionar.");
				$correct = false;
            }
            else{
                $user = limpiar($_POST["username"]);
                $tournament = limpiar($_POST["nomTourn"]);
                $date = limpiar($_POST["fecha"]);
                $shift = limpiar($_POST["turno"]);

                //fecha formato datetime según la hora elegida
                if ($shift == "m")
                    $datetime = $date." 11:15:00";
                else
                    $datetime = $date." 17:45:00";
				
				
				$id_participant = obtenerIdParticipante($conn,$user,$tournament,$datetime);

				if (empty($id_participant)) {
					array_push($errors,"El usuario no es un participante del torneo seleccionado.");
                    $correct = false;
				}else{
					$respuesta = idParticipanteExiste($conn,$id_participant);

					if ($respuesta === true) {
						array_push($errors,"La victoria del participante en el torneo seleccionado ya existe.");
						$correct = false;
					}
				}
            }

            if($correct){
            	//inserto la nueva victoria del participante
				InsertWins($conn,$id_participant);
			}
		}
	}

	cerrarConexion($conn);

	require_once("../views/adminWins_view.php");
?>