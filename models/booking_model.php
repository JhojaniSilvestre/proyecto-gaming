<?php
function obtenerPuestos($conn)
{
    try {
        $stmt = $conn->prepare("SELECT id_seat FROM seats");
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

function comprobarSitioLibre($conn,$seat,$date){
    try {
        $stmt = $conn->prepare("SELECT seats.id_seat FROM seats,booking where seats.id_seat=booking.id_seat 
        AND date = '$date' AND booking.id_seat=$seat");
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
        $insert = "INSERT INTO booking (date,id_seat,id_user,id_companion) 
        VALUES ('$date',$idSeat,$idUser,$idComp)";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}