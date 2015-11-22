<?php
	session_start();
	include 'seguridad.php';
?>

<html>

	<head>
    	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	  	<title>Gestión de preguntas</title>

	  	<script type="text/javascript">

	  		XMLHttpRequestObject = new XMLHttpRequest();
	  		XMLHttpRequestObject.onreadystatechange = function(){
	  			if((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){
	  				document.getElementById("preguntas").innerHTML = XMLHttpRequestObject.responseText;
	  			}
	  		}

	  		XMLHttpRequestObject2 = new XMLHttpRequest();
	  		XMLHttpRequestObject2.onreadystatechange = function(){
	  			if((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status=200)){
	  				document.getElementById("insercion").innerHTML = XMLHttpRequestObject2.responseText;
	  			}
	  		}

	  		XMLHttpRequestObject3 = new XMLHttpRequest();
	  		XMLHttpRequestObject3.onreadystatechange = function(){
	  			if((XMLHttpRequestObject3.readyState==4)&&(XMLHttpRequestObject3.status=200)){
	  				document.getElementById("numeroPreguntas").innerHTML = XMLHttpRequestObject3.responseText;
	  			}
	  		}

	  		function obtenerPreguntas(){
	  			XMLHttpRequestObject.open("GET", "misPreguntas.php", true);
	  			XMLHttpRequestObject.send();
	  		}

	  		function nuevaPregunta(){
	  			XMLHttpRequestObject2.open("GET", "insertarPregunta.php?pregunta="+document.Preguntas.pregunta.value+"&respuesta="+document.Preguntas.respuesta.value+"&complejidad="+document.Preguntas.complejidad.value+"&tema="+document.Preguntas.tema.value, true);
	  			document.getElementById("Preguntas").reset();
	  			XMLHttpRequestObject2.send();
	  		}

	  		function numeroPreguntas(){
	  			setInterval(function(){
	  				XMLHttpRequestObject3.open("GET", "numeroPreguntas.php", true);
	  				XMLHttpRequestObject3.send();
	  			}, 5000);
	  			
	  		}
	  	</script>
	</head>

	<body onload="numeroPreguntas()">
		<form method="post">
			<input type="button" name="verPreguntas" value="Ver mis preguntas" onClick="obtenerPreguntas()">
			<input type="submit" id="logout" name="logout" method="post" value="Logout"/>
		</form>
		<div id="preguntas">Aquí aparecerán tus preguntas</div>		
		<br>
		<form id="Preguntas" name="Preguntas" action="">
			<fieldset>
				<legend>Insertar una nueva pregunta</legend>
				<h2></h2>
				<p> Pregunta: </p>
				<textarea cols="40" rows="3" required name="pregunta" id="pregunta"></textarea>
				<p> Respuesta: </p>
				<textarea cols="40" rows="3" required name="respuesta" id="respuesta"></textarea>
				<p> Complejidad: <select name="complejidad" id="complejidad">
											<option selected>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
								</select>
				</p>
				<p> Tema: </p>
				<input type="text" required name="tema" id="tema"></input>
				<p> <input id="insertar" type="button" value="Enviar" onClick="nuevaPregunta()"/> </p>
			</fieldset>
		</form>
			
		<div id="insercion"></div>
		<a href="layout.php">Volver a la página de inicio</a>
		<br>

	</body>

</html>

<?php
	if(isset($_POST['logout'])){
		session_destroy();
		header("Location: layout.php");
	}
?>