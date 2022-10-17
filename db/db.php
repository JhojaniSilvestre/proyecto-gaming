<?php
//Función: conexion()
//Parámetros entrada: --
//Parámetros salida: devuelve el identificador de la conexión
	function generarConexion(){
	  $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $dbname = "proyectoGaming";

	  try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  }

	  catch(PDOException $e)
	  {
		echo "Error: " . $e->getMessage();
	  }

	  return $conn;
	}
?>