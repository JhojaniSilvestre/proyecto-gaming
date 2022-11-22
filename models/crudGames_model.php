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

?>