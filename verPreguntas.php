<html>

	<head>
    	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	  	<title>Ver preguntas</title>
	</head>

<?php
	include 'conexion.php';

	$preguntas = mysql_query("SELECT t_pregunta, complejidad FROM Preguntas");

	echo '<table border=1> <tr> <th> Enunciado de la pregunta </th> <th> Complejidad </th> </tr>';

	while($row = mysql_fetch_array($preguntas)) {
		echo '<tr><td>' . $row['t_pregunta'] . '</td> <td>' . $row['complejidad'] . '</td> </tr>';
	}

	mysql_close();

	echo '</table>';
	echo '<br>';
	echo '<a href="layout.php"> Volver a la página de inicio </a>';
?>