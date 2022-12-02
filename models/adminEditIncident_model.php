<?php

function obtenerIncidenciaEspecifica($conn,$id){
    try {
        $stmt = $conn->prepare("SELECT title,description,date FROM incidents
            WHERE id_incidence= $id");
        $stmt->execute();
        return $stmt;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateIncidencia($conn,$id,$title,$description,$date,$created_at){
    try {
        $update = "UPDATE incidents SET title= '$title', description = '$description', date = '$date', created_at='$created_at '
        WHERE id_incidence = $id";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido actualizar el registro", $e-> getMessage();
    }
}

?>