<?php

function obtenerIncidencias($conn){
    try {
        $stmt = $conn->prepare("SELECT id_incidence, title, description, date, created_at FROM incidents");
        $stmt->execute();
        $incidents = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $incidents[] =array($row["id_incidence"],$row["title"],$row["description"],$row["date"], $row["created_at"]); 
            }
        }
        return $incidents;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>