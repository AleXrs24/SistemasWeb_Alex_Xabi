<?php
	session_start();
	$pregunta = $_GET['pregunta'];
	$respuesta = $_GET['respuesta'];
	$complejidad = $_GET['complejidad'];
	$tema = $_GET['tema'];

	if((!empty($pregunta))&&(!empty($respuesta))&&(!empty($_SESSION['email']))) {
		/*
		mysql_connect("localhost", "root", "root");
		mysql_select_db("Quiz") or die(mysql_error());
		*/
		include 'conexion.php';

		$sql="INSERT INTO Preguntas VALUES (NULL, '$_SESSION[email]', '$pregunta', '$respuesta', '$_GET[complejidad]')";

		if(!mysql_query($sql)){
			die('Error: ' . mysql_error());
		} else {
			//echo "<script> alert('Se ha realizado correctamente la inserción en la base de datos') </script>";
		}

		mysql_close();

		$xml = simplexml_load_file('preguntas.xml');
		$preguntaxml = $xml->addChild('assessmentItem');
		$preg = $preguntaxml->addChild('itemBody');
		$preg->addChild('p', $pregunta);
		$resp = $preguntaxml->addChild('correctResponse');
		$resp->addChild('value', $respuesta);

		$preguntaxml->addAttribute('complexity', $complejidad);
		$preguntaxml->addAttribute('subject', $tema);
		
		if (!$xml->asXML('preguntas.xml')) {
			echo "No es posible la inserción en el fichero xml";
		} else {
			//echo "<p>Se ha insertado correctamente en el fichero xml</p><a href='VerPreguntasXML.php'>Ver preguntas desde fichero xml</a>";
		}
		echo "La pregunta se ha guardado correctamente";
	}
?>