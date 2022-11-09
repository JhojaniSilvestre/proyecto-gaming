<?php
    session_start();
    
    if (!isset($_SESSION['id_admin'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}
    require_once("../views/admin_view.php");
?>