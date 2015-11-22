<html>

	<head>
    	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	  	<title>Número de preguntas</title>
	</head>


<?php
	session_start();
	include 'conexion.php';

	$preguntas = mysql_query("SELECT COUNT(*) FROM Rreguntas");
	$preguntasUsuario = mysql_query("SELECT COUNT(*) FROM Preguntas WHERE email='$_SESSION[email]'");

	echo "Mis preguntas / Todas las preguntas: " .$preguntasUsuario. "/" .$preguntas;

	mysql_close();
?>