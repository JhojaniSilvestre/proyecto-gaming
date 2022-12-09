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
	
    if (isset($_GET['id']) && $_GET['id'] != "") {
        //obtener datos del juego seleccionado
        $id = $_GET['id']; //obtengo el id pasado por la url del enlace
        $respuesta = obtenerJuegoEspecifico($conn, $id);
        //compruebo que existe el registro, sino redireciona
        if($respuesta->rowCount() > 0){
            //metodo de obtencion array asociativo   
            $resultado = $respuesta->fetchColumn();
            //guardo los registros en variables, estas se imprimiran en los input como valores por defecto
            $name = $resultado;
        }
    }
    else{  
        //envio del formulario para la actualización
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            if (isset($_POST['edit'])) {
                $errors = array();
                $correct = true;

                if ($_POST["nombre"] == "") {
                    array_push($errors,"No puede dejar el campo vacío.");
                    $correct = false;
                }
                else{
                    $id = limpiar($_POST["id"]);
                    $name = limpiar($_POST["nombre"]);

                    /* comprobar que el nombre este disponible */
                    $disponible = nombreJuegoDisponible($conn,$name);
                    if ($disponible === false) {
                        array_push($errors,"Ya existe un juego con el nombre introducido.");
                        $correct = false;
                    }
                } 

                if($correct){
                    updateJuego($conn,$id,$name);
                    header("location: ../games_controller.php");    
                }
            } //fin if isset
        } //fin if request post
        
    }

	cerrarConexion($conn);
	require_once("../../views/crud_games/edit_game_view.php");
