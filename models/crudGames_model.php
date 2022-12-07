<?php
function obtenerJuegos($conn){
    try {
        $stmt = $conn->prepare("SELECT id_game, name FROM games");
        $stmt->execute();
        $games = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $games[] =array($row["id_game"],$row["name"]); 
            }
        }
        return $games;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function añadirJuegos($conn,$name) {
    // global $conn;

     try {
         $obtenerID = $conn->prepare("INSERT into games (name) values ('$name')");
         $obtenerID->execute();
         
     //return $obtenerID->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $ex) {
         echo $ex->getMessage();
     }
}

function obtenerJuegoEspecifico($conn, $id){
    try {
        $stmt = $conn->prepare("SELECT name FROM games WHERE id_game = $id");
        $stmt->execute();

        return $stmt;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function nombreJuegoDisponible($conn,$name){
    try {
        $stmt = $conn->prepare("SELECT name FROM games WHERE name = '$name'");
        $stmt->execute();
        $disponible = true;
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $disponible = false;
        }
        return $disponible;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateJuego($conn,$id,$name){
    try {
        $update = "UPDATE games SET name = '$name' WHERE id_game = $id";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido actualizar el registro", $e-> getMessage();
    }
}


?>