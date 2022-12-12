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

    function obtenerEmails($conn,$email){
        try {
            $stmt = $conn->prepare("SELECT email FROM users where email = '$email'");
            $stmt->execute();
            $correct = false;
            if ($stmt->rowCount() > 0) {
                $correct = true;
            }
            return $correct;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function obtenerUsers($conn,$user){
        try {
            $stmt = $conn->prepare("SELECT username from users where username = '$user'");
            $stmt->execute();
            $correct = false;
            if ($stmt->rowCount() > 0) {
                $correct = true;
            }
            return $correct;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>