<?php
	$xml = simplexml_load_file('preguntas.xml');
	echo '<table border=1><tr><th> Pregunta </th><th> Complejidad </th><th> Temática </th></tr>';

	foreach ($xml->assessmentItem as $pregunta):

		$textopregunta = $pregunta->itemBody->p;
		$complejidad = $pregunta->attributes()->complexity;
		$tema = $pregunta->attributes()->subject;

		echo '<tr><td>' .$textopregunta. '</td><td>' .$complejidad. '</td><td>' .$tema. '</td></tr>';

	endforeach;
?>

<html>
	<head>
	    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Ver preguntas XML</title>
	</head>

		<a href="layout.php">Volver a la página de inicio</a><br>
</html>