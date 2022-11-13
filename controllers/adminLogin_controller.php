<?php
session_start(); //se inicia la sesión

//cerrar sesión si actualmente hay una activa
if(isset($_SESSION['id_user'])){
    session_unset();
    session_destroy();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../db/db.php';
    $conn = generarConexion();

    require_once("../models/login_model.php");

    if(isset($_POST['submit'])){
        $respuesta = getUserId($conn,$_POST['email'], $_POST['clave']);
        if($respuesta->rowCount() > 0){   
            $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
                
            $_SESSION['id_user'] = $resultado["id_user"];
            $_SESSION['email'] = $resultado["email"];
            $_SESSION['username'] = $resultado["username"];
            $_SESSION['shift'] = $resultado["shift"];
            $_SESSION['clave'] = $resultado["password"];
            
            //obtener id admin
            $respuesta = getAdminId($conn,$resultado["id_user"]);

            if($respuesta->rowCount() > 0){
                $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id_admin'] = $resultado["id_admin"];

                //redireccionar a panel admin
                header("location: ../controllers/admin_controller.php");
            }
            else{
                $loginErr = "El usuario introducido no es administrador";
            }
        }
        else{
            $loginErr = "El email o contraseña introducidos no son correctos";
        }
    }

    cerrarConexion($conn);
}

//Llamada a la vista login para recoger datos del formulario
require_once("../views/adminLogin_view.php");

?>