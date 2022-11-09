<?php

function obtenerTorneos($conn){
    try {
        $stmt = $conn->prepare("SELECT id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame FROM tournaments, games
            WHERE tournaments.id_game = games.id_game");
        $stmt->execute();
        $tournaments = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $tournaments[] =array($row["id_tournament"],$row["nametourn"],$row["nomgame"],$row["date"]); 
            }
        }
        return $tournaments;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerJuegos($conn){
    try {
        $stmt = $conn->prepare("SELECT id_game, name FROM games");
        $stmt->execute();
        $games = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $id_game = $row["id_game"];
                $games["$id_game"] = $row["name"]; 
            }
        }
        return $games;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function fechaDisponible($conn,$datetime){
    try {
        $dateFree = true;
        //Compruebo que no haya un torneo con la misma fecha
        $stmt = $conn->prepare("SELECT date FROM tournaments WHERE date = '$datetime'");
        $stmt->execute();
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $dateFree = false;
        }
        //Compruebo que no haya una reserva de sitio esa fecha
        $stmt = $conn->prepare("SELECT date FROM booking WHERE date = '$datetime'");
        $stmt->execute();
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $dateFree = false;
        }
        return $dateFree;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function generarIdTorneo($conn){
    try {
        $stmt = $conn->prepare("SELECT max(id_tournament) FROM tournaments");
        $stmt->execute();
        
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $maxid = $stmt->fetchColumn();
        }
        $id_tournament = $maxid + 1;
        return $id_tournament;
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTorneo($conn,$idTournmt,$name,$datetime,$idgame){
    try {
        $insert = "INSERT INTO tournaments (id_tournament,name,date,id_game) 
        VALUES ($idTournmt,'$name','$datetime',$idgame)";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

?>