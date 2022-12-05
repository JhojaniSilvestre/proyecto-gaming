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
        AND participants.id_user = users.id_user AND participants.id_user=$id_user AND tournaments.active = 1; ");
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

function updateTorneo($conn,$id_tournament){
    try {
        $update = "UPDATE tournaments SET active = 0 WHERE id_tournament = $id_tournament";
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

function comprobarResponsable($conn,$date,$id_user)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM booking WHERE id_user = $id_user AND responsible = 1 AND date = '$date' ");
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

function asignarNuevoResponsable($conn,$date)
{
    try {
        $stmt = $conn->prepare("SELECT id_booking FROM booking WHERE date = '$date' AND active=1 ");
        $stmt->execute();
        $array_booking = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $array_booking[] = array($row["id_booking"]);
            }
        }
        $update = "UPDATE booking SET responsible = 1 WHERE id_booking = $array_booking[0] ";
        $conn->exec($update);

        return $array_booking;
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

?>
