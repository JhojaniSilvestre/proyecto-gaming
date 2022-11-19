<?php

function obtenerUsuarios($conn){
    try {
        $stmt = $conn->prepare("SELECT id_user, username , email, password, shift, active FROM users
            ORDER BY active DESC");
        $stmt->execute();
        $users = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $users[] =array($row["id_user"],$row["username"],$row["email"],$row["password"], $row["shift"], $row["active"]); 
            }
        }
        return $users;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>