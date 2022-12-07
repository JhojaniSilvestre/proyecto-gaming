<?php

session_start(); //se inicia la sesión

//cerrar sesión si actualmente hay una activa


require_once '../db/db.php';
$conn = generarConexion();

require_once '../models/crudTournament_model.php';

if (isset($_GET['id']) && $_GET['id'] != "") {

    //obtener datos del torneo seleccionado
    $id = $_GET['id']; //obtengo el id pasado por la url del enlace
    $respuesta = obtenerTorneoInscripcion($conn, $id);
    //compruebo que existe el registro, sino redireciona
    if ($respuesta->rowCount() > 0) {
        //metodo de obtencion array asociativo   
        $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
        //guardo los registros en variables, estas se imprimiran en los input como valores por defecto
        $name = $resultado["nametourn"];
        $gameName =  $resultado["name"];
        $date =  $resultado["date"];
    }
} else {
    //envio del formulario para la actualización
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['disponibilidad'])) {
            $id = $_POST["id"];
            $date = $_POST["date"];
            $name = $_POST["name"];
            $gameName =  $_POST["gameName"];
            $id_user = $_POST['id_user'];
            $puestos = disponibilidadPuestosTorneo($conn, $date);
        }

        if (isset($_POST['submit'])) {
            $errors = array();
            $correct = true;
            $date = $_POST["date"];
            $name = $_POST["name"];
            $gameName =  $_POST["gameName"];
            $id = $_POST["id"];
            $id_user = $_POST['id_user'];
            
            if (!isset($_POST["seat"])) {
                array_push($errors, "Debe elegir un puesto disponible.");
                $correct = false;
            }

            $resultado = inscripcionNoRepetida($conn,$date,$id_user);
			if ($resultado == false) {
				array_push($errors, "Ya tiene un puesto reservado para la fecha seleccionada.");
				$correct = false;
			}

            if($correct){
                inscribirseTorneo($conn,$id,$_POST["seat"],$id_user,$date);
                $mensajeOk="<h5 class='text-success text-center'>Inscripción realizada con exito!</h5>";
                
            }
            
            
        }
         
    } 
    else {
        header("location: ../userTournament_controller.php");
    }
}

cerrarConexion($conn);
require_once("../views/inscription_view.php");
