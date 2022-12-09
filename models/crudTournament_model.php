<?php

function obtenerTorneos($conn){
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame
                                FROM tournaments,games WHERE tournaments.id_game = games.id_game ");
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

function obtenerTorneoEspecifico($conn, $id){
    try {
        $stmt = $conn->prepare("SELECT id_tournament,tournaments.name AS nametourn,date, games.id_game AS idgame FROM tournaments,games
            WHERE tournaments.id_game = games.id_game AND id_tournament = $id ");
        $stmt->execute();
        return $stmt;
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

function obtenerIdResponsable($conn,$nombreUser){
    try {
        $stmt = $conn->prepare("SELECT id_user FROM users where username = '$nombreUser' AND active = 1");
        $stmt->execute();
        $id_responsible="";
        
        if ($stmt->rowCount() > 0) {
            $id_responsible = $stmt->fetchColumn();
        }
        return $id_responsible;
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
        $insert = "INSERT INTO tournaments (id_tournament,name,date,id_game,active) 
        VALUES ($idTournmt,'$name','$datetime',$idgame,1)";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}



/*----------------- Update functions ---------------------------*/

function fechaDisponibleEdit($conn,$id,$datetime){
    try {
        $dateFree = true;
        //Compruebo que no haya un torneo con la misma fecha
        $stmt = $conn->prepare("SELECT date FROM tournaments WHERE date = '$datetime' AND id_tournament != $id");
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

function updateTorneo($conn,$id,$name,$datetime,$idgame){
    try {
        $update = "UPDATE tournaments SET name = '$name', date = '$datetime', id_game = $idgame
        WHERE id_tournament = $id";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido actualizar el registro", $e-> getMessage();
    }
}

function obtenerTorneoInscripcion($conn, $id){
    try {
        $stmt = $conn->prepare("SELECT id_tournament,tournaments.name AS nametourn,date, games.name FROM tournaments,games
            WHERE tournaments.id_game = games.id_game AND id_tournament = $id ");
        $stmt->execute();
        return $stmt;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function disponibilidadPuestosTorneo($conn, $datetime)
{
    try {
        $stmt = $conn->prepare("SELECT id_seat FROM seats 
        WHERE seats.id_seat NOT IN (SELECT participants.id_seat FROM participants,tournaments 
        WHERE participants.id_tournament=tournaments.id_tournament AND date = '$datetime' AND participants.active = 1)");
        $stmt->execute(); //ejecuta la select

        $seats = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                array_push($seats, $row["id_seat"]);
            }
        }
        return $seats; //devuelvo el array

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function inscribirseTorneo($conn,$id_tournament,$id_seat,$id_user,$date){
    try {
        $stmt = $conn->prepare("SELECT id_user FROM participants,tournaments WHERE tournaments.id_tournament= participants.id_tournament 
        AND date = '$date' AND participants.active = 1");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $insert = "INSERT INTO participants (id_tournament,id_seat,id_user,responsible,active) 
            VALUES ($id_tournament,$id_seat,$id_user,0,1)";
            $conn->exec($insert);
        }else{
            $insert = "INSERT INTO participants (id_tournament,id_seat,id_user,responsible,active) 
            VALUES ($id_tournament,$id_seat,$id_user,1,1)";
            $conn->exec($insert);
        }

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function inscripcionNoRepetida($conn,$date,$idUser){
    try {
        $stmt = $conn->prepare("SELECT participants.id_user FROM participants,tournaments where 
        participants.id_tournament=tournaments.id_tournament And date = '$date' AND participants.id_user=$idUser AND participants.active = 1");
        $stmt->execute(); //ejecuta la select
        $correcto=true;
        if ($stmt->rowCount() > 0) {
            $correcto= false;
        }
        return $correcto;
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 



?>