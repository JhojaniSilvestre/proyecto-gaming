<?php
require_once("../db/db.php");
//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //abro conexion
    $conexion = generarConexion();

    require_once('../models/register_model.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $shift = $_POST['shift'];

    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (passwordValidate($password, $error_clave)) {
                registerUser($conexion, $email, $password, $shift, $name);

                //redireccionar a login
                header("location: ../index.php");
            
        }
        } else {
            $email_err = "Email incorrecto";
        }
    }



//Llamada a la vista register para recoger datos del formulario
require_once("../views/register_view.php");
