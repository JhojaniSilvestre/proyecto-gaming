<?php

function obtenerTorneosMañana($conn)
{
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame,username 
        FROM tournaments,games,users WHERE tournaments.id_game = games.id_game AND users.id_user = tournaments.responsible AND date LIKE '%15:00'; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"], $row["username"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerTorneosTarde($conn)
{
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame,username 
        FROM tournaments,games,users WHERE tournaments.id_game = games.id_game AND users.id_user = tournaments.responsible AND date LIKE '%45:00'; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"],$row["username"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
