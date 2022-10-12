<?php
//require_once ('../models/register_model.php');

//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password = $_POST['password'];

    //Aquí se validad si los campos están vacios, falta validar nombre y email para que la validación sea completa.
    
        if (validateUser ($idUser,$name,$email,$password)){
            emptyField ($idUser,$name,$email,$password);

            echo "Registro Completado";
        }else{
    
            echo " NO se ha registrado correctamente";
        }
}
    require_once("../views/register_view.php");
