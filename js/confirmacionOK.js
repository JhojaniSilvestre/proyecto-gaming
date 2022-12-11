function registerOK(){
    var answer = confirm("Pulsa 'Aceptar' para confirmar registro");
    if (answer ==true){
        return true;
    }else{
        return false;
    }
}

/*------------------- mensaje de confirmación para cancelar Torneos y Reservas en perfil de Usuario ------------------ */

function cancelarTournOK(id_tournament){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la Cancelación de la inscripción con ID: "+id_tournament);
    if (answer ==true){
        return window.location.href = "../controllers/profile_controller.php?id_tournament="+id_tournament;
    }else{
        return false;
    }
}

function cancelarBookingOK(id_booking){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la Cancelación de la reserva con ID: "+id_booking);
    if (answer ==true){
        return window.location.href = "../controllers/profile_controller.php?id_booking="+id_booking;
    }else{
        return false;
    }
}
/*-------------------- mensaje de confirmación para desactivar Torneos en panel administrador------------------ */

function desactivarTournOK(id_tournament){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la Desactivación del torneo con ID: "+id_tournament);
    if (answer ==true){
        return window.location.href = "../controllers/adminTournament_controller.php?id_tournament="+id_tournament;
    }else{
        return false;
    }
}
/*-------------------- mensaje de confirmación para desactivar Usuarios en panel administrador------------------ */

function desactivarUserOK(idDesc){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la Desactivación del usuario con ID: "+idDesc);
    if (answer ==true){
        return window.location.href = "../controllers/adminUsers_controller.php?idDesc="+idDesc;
    }else{
        return false;
    }
}

function activarUserOK(idAct){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la Activación del usuario con ID: "+idAct);
    if (answer ==true){
        return window.location.href = "../controllers/adminUsers_controller.php?idAct="+idAct;
    }else{
        return false;
    }
}