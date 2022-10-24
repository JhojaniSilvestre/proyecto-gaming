<?php
session_start(); //se inicia la sesión

//cerrar sesión si actualmente hay una activa
if(isset($_SESSION['id_user'])){
    session_unset();
    session_destroy();
}
//echo var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //abro conexion, viene de index
    $conn = generarConexion();

    require_once("models/login_model.php");

    if(isset($_POST['submit'])){
        if(isset($_POST['email']) && isset($_POST['clave'])){ 
            $respuesta = getUserId($conn,$_POST['email'], $_POST['clave']);
            if($respuesta->rowCount() > 0){   
                //modo de obtención -> array indexado
                $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
                
                $_SESSION['id_user'] = $resultado["id_user"];
                $_SESSION['email'] = $resultado["email"];
                $_SESSION['username'] = $resultado["username"];
                $_SESSION['shift'] = $resultado["shift"];

                //obtener id admin
                $respuesta = getAdminId($conn,$resultado["id_user"]);
                if($respuesta->rowCount() > 0){
                    $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_admin'] = $resultado["id_admin"];

                    //redireccionar a panel admin
                    header("location: controllers/panelAdmin_controller.php");
                }
                else{//redireccionar a inicio
                    header("location: controllers/welcome_controller.php");
                }  
            }
        }
        else{ //sino guardo los errores en variables para imprimir
            if(!isset($_POST['email']))
            {
                $email_err = "No se ha proporcionado un correo!";
            }
            if(!isset($_POST['clave']))
            {
                $clave_err = "No se ha proporcionado una contrase&ntilde;a!";
            }
        }
    }
}

//Llamada a la vista login para recoger datos del formulario
require_once("views/login_view.php");
?>