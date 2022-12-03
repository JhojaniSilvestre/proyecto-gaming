<?php

//require_once("../db/db.php");

    function registerUser($conexion,$email,$password,$shift,$name) {
       // global $conn;

        try {
            $obtenerID = $conexion->prepare("INSERT into users (active,email,password,shift,username)
                                             values (1,'$email','$password','$shift','$name')");
            $obtenerID->execute();
            
        //return $obtenerID->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function obtenerEmails($conn){
        try {
            $stmt = $conn->prepare("SELECT email FROM users");
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
