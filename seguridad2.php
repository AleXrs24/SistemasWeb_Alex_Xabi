<?php
	session_start();

	if($_SESSION['autentificado'] != "SI" || $_SESSION['email'] != "web000@ehu.es"){
		header("location:login.php");
		exit();
	}
?>