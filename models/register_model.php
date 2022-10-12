<?php

require_once("../db/db.php");

    function validateUser($idUser,$name,$email,$password) {
        global $conexion;

        try {
            $obtenerID = $conexion->prepare("INSERT into user (idUser,name,email,password)
                                             values ('$idUser','$name','$email','$password')");
            $obtenerID->execute();
            
        //return $obtenerID->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    function emptyField($idUser,$name,$email,$password){

        //Validamos si algún campo del registro está vacio
        if(empty($idUser) || empty($name) ||empty($email)|| empty($password)) {
            
          echo "Hay campos vacios.";
          return false;
        }else{
            return true;
        }
        
    }

    //FALTAN VALIDACIONES DE NOMBRE Y EMAIL

?>