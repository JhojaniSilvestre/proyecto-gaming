<?php
//echo var_dump($_POST);
//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //recojo los valores en variables
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    //Si se han rellenado los campos del login
    if($email != '' && $clave != ''){
        header("location: controllers/welcome_controller.php");  
    }
	else{ //sino guardo los errores en variables para imprimir
        if($email == ''){
            $email_err = "No se ha proporcionado un correo!";
        }
        if($clave == ''){
            $clave_err = "No se ha proporcionado una contrase&ntilde;a!";
        }
	}
}

//Llamada a la vista login para recoger datos del formulario
require_once("views/login_view.php");
?>