<?php
require_once('../models/register_model.php');

//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $shift = $_POST['shift'];


    //Aquí se validad si los campos están vacios, falta validar nombre y email para que la validación sea completa.0


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        registerUser($email, $password, $shift, $name);
        header("location: ../views/login_view.php");
    } else {
        $email_err = "Email incorrecto";
    }
}

require_once("../views/register_view.php");
