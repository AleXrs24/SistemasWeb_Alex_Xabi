<?php
	/*
	mysql_connect("localhost","root","root") or die(mysql_error());
	mysql_select_db("Quiz") or die(mysql_error());
	*/
	include 'conexion.php';
	$usuarios = mysql_query( "select * from Usuario" );
	echo '<table border=1> <tr> <th> Email </th> <th> Nombre </th> <th> Apellidos </th> <th> Contraseña </th> <th> Teléfono </th> <th> Especialidad </th> <th> Tecnologías </th></tr>';
	while($row = mysql_fetch_array($usuarios)) {
		echo '<tr><td>' . $row['email'] . '</td> <td>' . $row['nombre'] . '</td> <td>' . $row['apellidos'] . '</td> <td>' . $row['contrasena'] . '</td> <td>' . $row['telefono'] . '</td> <td>' . $row['especialidad'] . '</td> <td>' . $row['tecnologias'] . '</td> </tr>';
	}
	echo '</table>';
	echo '<br>';
	echo '<a href="layout.php"> Volver a la página de inicio </a>';
?>