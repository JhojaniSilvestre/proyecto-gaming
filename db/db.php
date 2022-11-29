<?php
//Función: conexion()
//Parámetros entrada: --
//Parámetros salida: devuelve el identificador de la conexión
	function generarConexion(){
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "proyectogaming";
// contraseña generada: 90#/e=8+=2W(4OuJ

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

	function cerrarConexion($conn){
		$conn = null;
	}

	function limpiar($dato){
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
?>