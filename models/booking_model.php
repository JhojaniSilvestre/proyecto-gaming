<?php
function obtenerPuestos($conn){
    try {
        $stmt = $conn->prepare("SELECT id_seat FROM seats");
        $stmt->execute(); //ejecuta la select

        $seats = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                array_push($seats,$row["id_seat"]);
            }
        }
        return $seats; //devuelvo el array
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>