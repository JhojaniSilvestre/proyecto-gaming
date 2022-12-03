<?php
require_once("../db/db.php");
//si el formulario se ha enviado

//abro conexion
$conexion = generarConexion();

require_once('../models/register_model.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $shift = $_POST['shift'];
    $error_clave = array();
    $correct = true;

    if (isset($_POST['submit'])) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            array_push($error_clave, "Email incorrecto");
            $correct = false;
        }

        if(obtenerEmails($conexion )){
            array_push($error_clave, "Este email ya ha sido registrado");
            $correct = false;
        }
        
        if(obtenerUsers($conexion)){
            array_push($error_clave, "Ya existe ese nombre de usuario");
            $correct = false;
        }

        if (strlen($password) < 6) {
            array_push($error_clave, "La clave debe tener al menos 6 caracteres");
            $correct = false;
        }
        if (strlen($password) > 16) {
            array_push($error_clave, "La clave no puede tener más de 16 caracteres");
            $correct = false;
        }
        if (!preg_match('`[a-z]`', $password)) {
            array_push($error_clave, "La clave debe tener al menos una letra minúscula");
            $correct = false;
        }
        if (!preg_match('`[A-Z]`', $password)) {
            array_push($error_clave, "La clave debe tener al menos una letra mayúscula");
            $correct = false;
        }
        if (!preg_match('`[0-9]`', $password)) {
            array_push($error_clave, "La clave debe tener al menos un caracter numérico");
            $correct = false;
        }
        if ($correct == true) {
            registerUser($conexion, $email, $password, $shift, $name);
            //redireccionar a login
            header("location: ../index.php");
        }
    }
}


//Llamada a la vista register para recoger datos del formulario
require_once("../views/register_view.php");
