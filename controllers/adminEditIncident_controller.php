<?php
    session_start();

    if (!isset($_SESSION['id_admin'])) {
        session_unset();
        session_destroy();
        header("location: ../index.php");
    }
    
    require_once '../db/db.php';
	$conn = generarConexion();

	require_once '../models/adminEditIncident_model.php';
	
    if (isset($_GET['id']) && $_GET['id'] != "") {

        //obtener datos del torneo seleccionado
        $id = $_GET['id']; //obtengo el id pasado por la url del enlace
        $respuesta = obtenerIncidenciaEspecifica($conn,$id);
        //compruebo que existe el registro, sino redireciona
        if($respuesta->rowCount() > 0){
            //metodo de obtencion array asociativo   
            $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
            //guardo los registros en variables, estas se imprimiran en los input como valores por defecto
            $title = $resultado["title"];
            $description = $resultado["description"];
            $date = $resultado["date"];
        }
    }
    else{  
        //envio del formulario para la actualización
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            if (isset($_POST['edit'])) {
                $correct = true;

                if ($_POST["title"] == "" || $_POST["description"] == "" || $_POST["date"] == "") {
                    $errors="No puede dejar campos en blanco o sin seleccionar.";
                    $correct = false;
                }
                else{
                    $id = limpiar($_POST["id"]);
                    $title = limpiar($_POST["title"]);
                    $date = limpiar($_POST["date"]);
                    $description = limpiar($_POST["description"]);
                    
                    date_default_timezone_set('Europe/Madrid');
                    $created_at = date("Y-m-d");
                    /* comprobar que la fecha este disponible */

                } 

                if($correct){
                    updateIncidencia($conn,$id,$title,$description,$date,$created_at);
                    header("location: adminIncidents_controller.php");
                }
            } //fin if isset
        } //fin if request post
    }

	cerrarConexion($conn);
	require_once("../views/adminEditIncident_view.php");

?>