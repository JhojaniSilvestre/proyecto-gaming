function registerOK(){
    var answer = confirm("Pulsa 'Aceptar' para confirmar registro");
    if (answer ==true){
        return true;
    }else{
        return false;
    }
}

function cancelarTournOK(id_tournament){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la cancelación");
    if (answer ==true){
        return window.location.href = "../controllers/profile_controller.php?id_tournament="+id_tournament;
    }else{
        return false;
    }
}

function cancelarBookingOK(id_booking){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la cancelación");
    if (answer ==true){
        return window.location.href = "../controllers/profile_controller.php?id_booking="+id_booking;
    }else{
        return false;
    }
}

function desactivarTournOK(id_tournament){
    var answer = confirm("Pulsa 'Aceptar' para confirmar la desactivación");
    if (answer ==true){
        return window.location.href = "../controllers/adminTournament_controller.php?id_tournament="+id_tournament;
    }else{
        return false;
    }
}