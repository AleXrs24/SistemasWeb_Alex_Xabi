<?php
	session_start();
	
	if (isset($_POST['email'])) { 
		/*
		mysql_connect("localhost","root","root") or die(mysql_error());
		mysql_select_db("Quiz") or die(mysql_error());
		*/
		include 'conexion.php';
		$email=$_POST['email']; 
		$pass=$_POST['pass']; 
		$usuarios = mysql_query("select * from Usuario where email='$email' and contrasena='$pass'");
		$cont= mysql_num_rows($usuarios); 
		mysql_close();

		if($cont==1) {
			$_SESSION['autentificado'] = "SI";
			$_SESSION['email']=$_POST['email'];
			if($_SESSION['email']=="web000@ehu.es"){
				header('location:editarPreguntas.php');
			}else{	
				header('location:gestionPreguntas.php');
			}
		} else {
			header('location:login.php');
		}
	}
?>

<html>

	<head>
    	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	  	<title>Login</title>
	</head>

	<body>

		<form action="login.php" method="post">
			<h2>Identificación de usuario</h2>
			<p> Email : <input type="email" required name="email" size="21" value="" /> </p>
			<p> Password: <input type="password" required name="pass" size="21" value="" /> </p>
			<p> <input id="input" type="submit" value="Hacer login"/> </p>
		</form>

		<a href="layout.php"> Volver a la página de inicio </a>

	</body>

</html>