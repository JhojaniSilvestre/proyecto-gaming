<?php

function obtenerTorneosMañana($conn)
{
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame 
        FROM tournaments,games WHERE tournaments.id_game = games.id_game AND date LIKE '%15:00' AND tournaments.active = 1; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"]);
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
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame
        FROM tournaments,games WHERE tournaments.id_game = games.id_game AND date LIKE '%45:00' AND tournaments.active = 1; ");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerTorneosWelcome($conn)
{
    try {
        $stmt = $conn->prepare("SELECT tournaments.id_tournament,tournaments.name AS nametourn,date, games.name AS nomgame 
        FROM tournaments,games WHERE tournaments.id_game = games.id_game AND tournaments.active = 1 LIMIT 8");
        $stmt->execute();
        $tournaments = array();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $row) {
                $tournaments[] = array($row["id_tournament"], $row["nametourn"], $row["nomgame"], $row["date"]);
            }
        }
        return $tournaments;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
