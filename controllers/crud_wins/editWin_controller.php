<?php
    session_start();

    if (!isset($_SESSION['id_admin'])) {
        session_unset();
        session_destroy();
        header("location: ../../index.php");
    }
    require_once '../../db/db.php';
	$conn = generarConexion();
	require_once '../../models/wins_model.php';
	
    if (isset($_GET['id']) && $_GET['id'] != "") {
        //obtener datos del juego seleccionado
        $id = $_GET['id']; //obtengo el id pasado por la url del enlace
        $respuesta = obtenerVictoriaEspecifica($conn, $id);
        //compruebo que existe el registro, sino redireciona
        if($respuesta->rowCount() > 0){
            //metodo de obtencion array asociativo   
            $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
            //guardo los registros en variables, estas se imprimiran en los input como valores por defecto
            $username = $resultado["username"];
            $tourname = $resultado["tourname"];
            //separo la fecha y la hora
            $explode = explode(" ", $resultado["date"]);
            //guardo la fecha
            $date = $explode[0];
            //guardo el turno segun la hora
            if ($explode[1] == "11:15:00")
                $shift = "m";
            else
                $shift = "t";
        }
    }
    else{  
        //envio del formulario para la actualización
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            if (isset($_POST['edit'])) {
                $errors = array();
                $correct = true;

                if($_POST["username"] == "" || $_POST["tourname"] == "" || $_POST["date"] == "" || $_POST["shift"] == ""){
                    array_push($errors,"No puede dejar el campo vacío.");
                    $correct = false;
                }
                else{
                    $id = limpiar($_POST["id"]);
                    $username = limpiar($_POST["username"]);
                    $tourname = limpiar($_POST["tourname"]);
                    $date = limpiar($_POST["date"]);
                    $shift = limpiar($_POST["shift"]);
    
                    //fecha formato datetime según la hora elegida
                    if ($shift == "m")
                        $datetime = $date." 11:15:00";
                    else
                        $datetime = $date." 17:45:00";

                    $id_participant = obtenerIdParticipante($conn,$username,$tourname,$datetime);

                    if (empty($id_participant)) {
                        array_push($errors,"El usuario no es un participante del torneo seleccionado.");
                        $correct = false;
                    }else{
                        $respuesta = editWinParticipantExiste($conn,$id,$id_participant);

                        if ($respuesta === true) {
                            array_push($errors,"La victoria del participante en el torneo seleccionado ya existe.");
                            $correct = false;
                        }
                    }
                } 

                if($correct){
                    updateVictoria($conn,$id,$id_participant);
                    header("location: ../adminWins_controller.php");
                }
            } //fin if isset
        } //fin if request post
        
    }

	cerrarConexion($conn);
	require_once("../../views/crud_wins/editWin_view.php");
