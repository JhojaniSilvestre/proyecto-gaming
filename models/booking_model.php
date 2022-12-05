<?php

function disponibilidadPuestos($conn, $datetime)
{
    try {
        $stmt = $conn->prepare("SELECT id_seat FROM seats 
        WHERE seats.id_seat NOT IN (SELECT booking.id_seat FROM booking WHERE booking.date = '$datetime')");
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


function comprobarEmail($conn, $emailUser)
{
    try {
        $stmt = $conn->prepare("SELECT id_user FROM users where email = '$emailUser' AND active = 1 ");
        $stmt->execute(); //ejecuta la select
        $idUser="";
        if ($stmt->rowCount() > 0) {
            $idUser = $stmt->fetchColumn();
        }
        return $idUser;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function reservaNoRepetida($conn,$date,$idUser){
    try {
        $stmt = $conn->prepare("SELECT booking.id_user FROM seats,booking where 
        date = '$date' AND booking.id_user=$idUser AND active = 1");
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



function reservaPuesto($conn,$date,$idSeat,$idUser,$idComp){
    try {
        $stmt = $conn->prepare("SELECT id_user FROM booking WHERE date = '$date'");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $insert = "INSERT INTO booking (date,id_seat,id_user,id_companion,responsible,active) 
            VALUES ('$date',$idSeat,$idUser,$idComp,0,1)";
            $conn->exec($insert);
        }else{
            $insert = "INSERT INTO booking (date,id_seat,id_user,id_companion,responsible,active) 
            VALUES ('$date',$idSeat,$idUser,$idComp,1,1)";
            $conn->exec($insert);
        }
        

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

