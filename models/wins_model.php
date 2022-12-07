<?php

function obtenerVictorias($conn){
    try {
        $stmt = $conn->prepare("SELECT id_win, wins.id_participant, username, tournaments.name as tourname, games.name, tournaments.date 
                                FROM wins, participants, users, tournaments, games
                                WHERE wins.id_participant = participants.id_participant 
                                AND participants.id_user = users.id_user 
                                AND participants.id_tournament = tournaments.id_tournament
                                AND tournaments.id_game = games.id_game");
        $stmt->execute();
        $wins = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $wins[] =array($row["id_win"],$row["id_participant"],$row["username"],$row["tourname"],$row["name"], $row["date"]); 
            }
        }
        return $wins;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerRankingWins($conn){
    try {
        $stmt = $conn->prepare("SELECT username, SUM(number) as total FROM wins, participants, users 
                                WHERE wins.id_participant = participants.id_participant 
                                AND participants.id_user = users.id_user GROUP BY username ORDER BY total DESC");
        $stmt->execute();
        $ranking = array();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                $ranking[] =array($row["username"],$row["total"]); 
            }
        }
        return $ranking;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerIdParticipante($conn,$user,$tournament,$datetime){
    try {
        $stmt = $conn->prepare("SELECT id_participant FROM participants, tournaments, users
                                WHERE participants.id_user = users.id_user 
                                AND participants.id_tournament = tournaments.id_tournament
                                AND users.username = '$user' AND tournaments.name = '$tournament' 
                                AND tournaments.date = '$datetime'");
        $stmt->execute();
        $id_participant = "";
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $id_participant = $stmt->fetchColumn();
        }
        
        return $id_participant;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function idParticipanteExiste($conn,$id_participant){
    try {
        $stmt = $conn->prepare("SELECT id_participant FROM wins WHERE id_participant = $id_participant");
        $stmt->execute();
        $respuesta = false;
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $respuesta = true;
        }
        
        return $respuesta;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editWinParticipantExiste($conn,$id,$id_participant){
    try {
        $stmt = $conn->prepare("SELECT id_participant FROM wins WHERE id_participant = $id_participant AND id_win != $id");
        $stmt->execute();
        $respuesta = false;
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $respuesta = true;
        }
        
        return $respuesta;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function InsertWins($conn,$id_participant){
    try {
        //Genero la id para el nuevo registro
        $stmt = $conn->prepare("SELECT max(id_win) FROM wins");
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $maxid = $stmt->fetchColumn();
        }
        $id_win = $maxid + 1;

        //insert del nuevo registro

        $insert = "INSERT INTO wins (id_win,number,id_participant) 
        VALUES ($id_win,1,$id_participant)";
        $conn->exec($insert);
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerVictoriaEspecifica($conn, $id){
    try {
        $stmt = $conn->prepare("SELECT username, tournaments.name as tourname, tournaments.date
                                FROM wins, participants, users, tournaments
                                WHERE wins.id_participant = participants.id_participant 
                                AND participants.id_user = users.id_user 
                                AND participants.id_tournament = tournaments.id_tournament
                                AND id_win = $id");
        $stmt->execute();

        return $stmt;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateVictoria($conn,$id,$id_participant){
    try {
        $update = "UPDATE wins SET id_participant = $id_participant WHERE id_win = $id";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido actualizar el registro", $e-> getMessage();
    }
}

?>