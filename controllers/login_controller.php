<?php
//echo var_dump($_POST);
//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //abro conexion, viene de index
    $conn = generarConexion();

    //Llamada al modelo para hacer la select que comprueba el login-- Intermediario entre vista y modelo !!!
    require_once("models/login_model.php");

    //recojo los valores en variables
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    //Si se han rellenado los campos del login
    if($email != '' && $clave != ''){ 
        $respuesta = getUserId($conn,$_POST['email'], $_POST['clave']);
        if($respuesta->rowCount() > 0){   
            //modo de obtención -> array indexado
            $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
            
            $_SESSION['id_user'] = $resultado["id_user"];
            $_SESSION['email'] = $resultado["email"];
            $_SESSION['username'] = $resultado["username"];
            $_SESSION['shift'] = $resultado["shift"];
            //obtener id admin
            $respuesta = getAdminId($conn,$resultado["id_user"]);
            if($respuesta->rowCount() > 0){
                $resultado = $respuesta->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id_admin'] = $resultado["id_admin"];
                //redireccionar a panel admin
                header("location: views/panelAdmin_view.php");
            }
            else{//redireccionar a inicio
                header("location: controllers/welcome_controller.php");
            }  
        }
    }
	else{ //sino guardo los errores en variables para imprimir
        if($email == ''){
            $email_err = "No se ha proporcionado un correo!";
        }
        if($clave == ''){
            $clave_err = "No se ha proporcionado una contrase&ntilde;a!";
        }
	}
}

//Llamada a la vista login para recoger datos del formulario
require_once("views/login_view.php");
?>