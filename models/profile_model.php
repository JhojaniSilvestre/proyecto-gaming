<?php

function obtenerMisReservas($conn,$id_user)
{
    try {
        $stmt = $conn->prepare("SELECT id_booking,date,id_seat,responsible
        FROM booking WHERE id_user=$id_user AND active=1 ORDER by date DESC; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_booking"], $row["date"], $row["id_seat"],$row["responsible"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function obtenerMisTorneos($conn,$id_user)
{
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame,username, participants.id_seat,responsible 
        FROM tournaments,games,users,participants WHERE tournaments.id_game = games.id_game AND tournaments.id_tournament = participants.id_tournament
        AND participants.id_user = users.id_user AND participants.id_user=$id_user AND tournaments.active = 1 AND participants.active = 1; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"], $row["id_seat"], $row["responsible"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateTorneo($conn,$id_tournament,$id_user){
    try {
        $update = "UPDATE participants SET active = 0 WHERE id_tournament = $id_tournament AND id_user = $id_user ";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido cancelar la inscripción", $e-> getMessage();
    }
}

function updateReserva($conn,$id_booking){
    try {
        $update = "UPDATE booking SET active = 0 WHERE id_booking = $id_booking";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido cancelar la reserva", $e-> getMessage();
    }
}

function comprobarResponsable($conn,$id_booking)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM booking WHERE responsible = 1 AND id_booking = $id_booking");
        $stmt->execute();
        $existe = false;

        if ($stmt->rowCount() > 0) {
            $existe = true;  
        }
        return $existe;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function comprobarResponsableTorneo($conn,$id_user,$id_tournament)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM participants,tournaments WHERE participants.id_tournament = tournaments.id_tournament 
        AND id_user = $id_user AND responsible = 1 AND participants.id_tournament = $id_tournament");
        $stmt->execute();
        $existe = false;

        if ($stmt->rowCount() > 0) {
            $existe = true;  
        }
        return $existe;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



function asignarNuevoResponsable($conn,$id_booking)
{
    try {

        $update = "UPDATE booking SET responsible = 0 WHERE id_booking = $id_booking ";
        $conn->exec($update);

        $stmt = $conn->prepare("SELECT date FROM booking WHERE id_booking= $id_booking");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $date = $stmt->fetchColumn();
        }

        $stmt = $conn->prepare("SELECT id_booking FROM booking WHERE date = '$date' AND active=1 ");
        $stmt->execute();
        $array_booking = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $array_booking[] = $row["id_booking"];
            }
        }
        $bookingId = $array_booking[0];
        $update = "UPDATE booking SET responsible = 1 WHERE id_booking = $bookingId ";
        $conn->exec($update);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function asignarNuevoResponsableTorneo($conn,$id_user,$id_tournament)
{
    try {

        $update = "UPDATE participants SET responsible = 0 WHERE id_user = $id_user AND id_tournament= $id_tournament ";
        $conn->exec($update);

        $stmt = $conn->prepare("SELECT date FROM tournaments,participants WHERE tournaments.id_tournament = participants.id_tournament 
        AND id_user = $id_user AND participants.id_tournament= $id_tournament");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $date = $stmt->fetchColumn();
        }

        $stmt = $conn->prepare("SELECT id_participant FROM participants,tournaments WHERE participants.id_tournament = tournaments.id_tournament
        AND date = '$date' AND participants.active=1 ");
        $stmt->execute();
        $array_participants = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $array_participants[] = $row["id_participant"];
            }
        }
        $update = "UPDATE participants SET responsible = 1 WHERE id_participant = $array_participants[0] ";
        $conn->exec($update);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateResponsable($conn,$id_booking){
    try {
        $update = "UPDATE booking SET active = 0 WHERE id_booking = $id_booking";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido cancelar la reserva", $e-> getMessage();
    }
}

function obtenerSumaUserWin($conn,$id_user){
    try {
        $stmt = $conn->prepare("SELECT SUM(number) as total FROM wins, participants, users 
                                WHERE wins.id_participant = participants.id_participant 
                                AND participants.id_user = users.id_user AND users.id_user = $id_user");
        $stmt->execute();
        $suma = 0;
        
        if ($stmt->rowCount() > 0) {
            $suma = $stmt->fetchColumn();
        }
        return $suma;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}





?>
