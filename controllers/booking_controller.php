<?php
    session_start();
    
    if (!isset($_SESSION['id_user'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}
    require_once("../views/booking_view.php");
?>