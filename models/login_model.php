<?php
//Función: getCustomerId
//Parámetros entrada: $conexion: id conexión; $usuario email introducido por pantalla; $clave clave introducido por pantalla
//Parámetros salida: devuelve el identificador de la conexión
function getUserId($conexion,$email, $clave){
        try{
            $sql = $conexion->prepare("SELECT id_user, email, username, shift, password FROM users
                                        WHERE email = '$email' AND 
                                        users.password = '$clave' AND active = 1");
            $sql->execute();
            return $sql;
        }catch(Exception $e){
            echo "<strong>ERROR: </strong>".$e->getMessage();
        }
        
}

function getAdminId($conexion,$id){
    try {
        $sql = $conexion->prepare("SELECT id_admin FROM admins, users WHERE admins.id_user = users.id_user AND
                                    admins.id_user = $id");
        $sql->execute();
        return $sql;

    }catch(Exception $e){
        echo "<strong>ERROR: </strong>".$e->getMessage();
    }
}

?>