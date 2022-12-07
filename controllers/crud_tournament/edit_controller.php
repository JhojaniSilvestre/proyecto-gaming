<?php
    require_once '../../db/db.php';
	$conn = generarConexion();

	require_once '../../models/crudTournament_model.php';
	//array que contiene los juegos
	$games = obtenerJuegos($conn);

    if (isset($_GET['id']) && $_GET['id'] != "") {

        //obtener datos del torneo seleccionado
        $id = $_GET['id']; //obtengo el id pasado por la url del enlace
        $respuesta = obtenerTorneoEspecifico($conn, $id);
        //compruebo que existe el registro, sino redireciona
        if($respuesta->rowCount() > 0){
            //metodo de obtencion array asociativo   
            $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
            //guardo los registros en variables, estas se imprimiran en los input como valores por defecto
            $name = $resultado["nametourn"];
			$idgame =  $resultado["idgame"];
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

                if ($_POST["nombre"] == "" || $_POST["fecha"] == "" || $_POST["juego"] == "" || $_POST["turno"] == "") {
                    array_push($errors,"No puede dejar campos en blanco o sin seleccionar.");
                    $correct = false;
                }
                else{
                    $id = limpiar($_POST["id"]);
                    $name = limpiar($_POST["nombre"]);
                    $date = limpiar($_POST["fecha"]);
                    $idgame = limpiar($_POST["juego"]);
                    $shift = limpiar($_POST["turno"]);

                    //fecha formato datetime según la hora elegida
                    if ($shift == "m")
                        $datetime = $date." 11:15:00";
                    else
                        $datetime = $date." 17:45:00";

                    /* funcion para obtener la fecha actual */
                    date_default_timezone_set('Europe/Madrid');
                    $dateNow = date("Y-m-d");
                    /* comprobar que la fecha este disponible */
                    $dateFree = fechaDisponibleEdit($conn,$id,$datetime);
                    if ($dateFree === false) {
                        array_push($errors,"La fecha seleccionada no está disponible");
                        $correct = false;
                    }

                } 

                if($correct){
                    updateTorneo($conn,$id,$name,$datetime,$idgame);
                    header("location: ../adminTournament_controller.php");
                }
            } //fin if isset
        } //fin if request post
        else{
            header("location: ../adminTournament_controller.php");
        }
    }

	cerrarConexion($conn);
	require_once("../../views/crud_tournament/edit_view.php");
