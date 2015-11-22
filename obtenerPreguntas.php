<?php
	include 'conexion.php';

	$t_pregunta = $_GET['t_pregunta'];
	$query = mysql_query("SELECT * FROM Preguntas WHERE t_pregunta=$t_pregunta");
	$pregunta = mysql_fetch_array($query);
?>

<html>

	<head>
    	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	  	<title>Obtener preguntas</title>
	</head>

	<body>
		<form id="formulario-cambiar-pregunta">
		<?php
			echo '
			<label>ID de la pregunta:</label>
			<input type="text" readonly value='.$pregunta['n_pregunta'].'></input>
			<label>Autor:</label>
			<input type="text" readonly value='.$pregunta['email'].'></input>
			<label>Pregunta:</label>
			<input type="text" id="t-pregunta" value='.$pregunta['t_pregunta'].'></input>
			<label>Respuesta:</label>
			<input type="text" id="t-respuesta" value='.$pregunta['t_respuesta'].'></input>
			<label>Complejidad:</label>
			<input type="text" id="complejidad" value='.$pregunta['complejidad'].'></input>';
		?>
		<input type="button" onclick="cambiarPregunta.php">Cambiar pregunta</input> 
		</form>
	</body>

</html>