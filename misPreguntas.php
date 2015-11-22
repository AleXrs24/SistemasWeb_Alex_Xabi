<?php
	session_start();

	if(!empty($_SESSION['email'])){
		include 'conexion.php';
	
		$preguntas = mysql_query("select t_pregunta, complejidad from Preguntas where email= '$_SESSION[email]'");
	}
	
	echo '<table border=1> <tr> <th> Enunciado de la pregunta </th> <th> Complejidad </th> </tr>';
	while($row = mysql_fetch_array($preguntas)) {
		echo '<tr><td>' . $row['t_pregunta'] . '</td> <td>' . $row['complejidad'] . '</td> </tr>';
	}
	echo '</table>';

	mysql_close();
?>