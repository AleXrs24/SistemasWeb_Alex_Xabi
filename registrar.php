<?php
	include 'conexion.php';
	
	$email = $_POST['email'];
	$expr = '/^[a-zA-Z]+[0-9]{3}@ikasle.ehu.(es|eus)$/';
	$verf = filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]+[0-9]{3}@ikasle.ehu.(es|eus)$/")));
	if ($verf == false) {
		die("El email no cumple con el formato establecido 'Letras + 3 dígitos + “@ikasle.ehu.” + “es”/”eus”'
			<br>
			<p><a href='registro.html'>Atrás</a></p>");
	}
	
	$sql="INSERT INTO Usuario(email, nombre, apellidos, contrasena, telefono, especialidad, tecnologias) VALUES
	('$_POST[email]','$_POST[nombre]','$_POST[apellidos]', SHA('$_POST[contrasena]'),'$_POST[telefono]','$_POST[especialidad]','$_POST[tecnologias]')";
	if (!mysql_query($sql)) {
		echo "Se ha detectado un problema a la hora de realizar la inserción en la base de datos<br>";
		die('Error: ' . mysql_error());
	}

	echo "Se ha realizado correctamente la inserción";
	mysql_close();
	echo "<p><a href='VerUsuarios.php'>Ver registros</a></p>";
?>