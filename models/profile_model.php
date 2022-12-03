<?php

function obtenerMisReservas($conn,$id_user)
{
    try {
        $stmt = $conn->prepare("SELECT id_booking,date,id_seat
        FROM booking WHERE id_user=$id_user AND active=1 ORDER by date DESC; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_booking"], $row["date"], $row["id_seat"]);
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
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame,username, participants.id_seat,participants.id_user 
        FROM tournaments,games,users,participants WHERE tournaments.id_game = games.id_game AND tournaments.id_tournament = participants.id_tournament 
        AND participants.id_user = $id_user AND tournaments.active = 1 ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"], $row["id_seat"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
