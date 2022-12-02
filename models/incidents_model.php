<?php

//require_once("../db/db.php");

    function registrarIncidencia($conexion,$title,$description,$date,$created) {
       // global $conn;

        try {
            $obtenerID = $conexion->prepare("INSERT into incidents (title,description,date,created_at)
                                             values ('$title','$description','$date','$created')");
            $obtenerID->execute();
            
        //return $obtenerID->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function comprobarResponsable($conn,$id_user,$date){
        try {
            $stmt = $conn->prepare("SELECT * FROM booking WHERE DATE(date) = '$date' AND responsible=$id_user");
            $stmt->execute();
            $correct=false;
            //compruebo si la select tiene resultados
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