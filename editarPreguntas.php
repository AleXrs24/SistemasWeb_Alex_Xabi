<?php
	include 'seguridad2.php';
	include 'conexion.php';

	$preguntas = mysql_query("SELECT n_pregunta, t_pregunta FROM Preguntas");

	$combobox = "";

	while($row = mysql_fetch_array($preguntas)){
		$combobox.= "<option value='".$row['n_pregunta']."'> ".$row['t_pregunta']."</option>";
	}
	mysql_close();
?>

<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Revisión de preguntas</title>
	</head>

	<body>
		<form id="form-logout" method="post">
			<input type="submit" id="logout" name="logout" value="Logout"/> 
		</form>
		<form id="editar" name="editar" method="post">
			<fieldset>
				<legend>Revisión de preguntas</legend>
				<label>Selecciona una pregunta</label>
				<select name="numeroselect" id="numeroselect" onchange="form.submit()">
					<option selected>--</option>
					<?php echo $combobox; ?>
				</select>

				<?php
					include 'conexion.php';
					$pregunta = mysql_query("SELECT n_pregunta, email, t_pregunta, t_respuesta, complejidad FROM Preguntas WHERE n_pregunta='$_POST[numeroselect]'");
					$row2 = mysql_fetch_array($pregunta);
				?>

				<p>
					<label>ID de la pregunta:</label>
					<input id="id" type="text" readonly value="<?php echo ($row2['n_pregunta']);?>">
				</p>
				<p>
					<label>Autor:</label>
					<input id="autor" type="text" readonly value="<?php echo ($row2['email']);?>">
				</p>
				<p>
					<label>Pregunta:</label>
					<input id="pregunta" name="pregunta" type="text" size="50" value="<?php echo ($row2['t_pregunta']);?>"/>
				</p>
				<p>
					<label>Respuesta:</label>
					<input id="respuesta" name="respuesta" type="text" value="<?php echo ($row2['t_respuesta']);?>"/>
				</p>
				<p>
					<label>Complejidad:</label>
					<input id="complejidad" name="complejidad" type="number" min="1" max="5" value="<?php echo ($row2['complejidad']);?>"/>
				</p>
				<input type="hidden" id="numero" name="numero" value="<?php echo($row2['n_pregunta']);?>"/>
				<input id="editar" name="editar" type="submit" value="Editar"/>
			</fieldset>
			
		</form>
	</body>
	</html>

<?php
	if(isset($_POST['editar'])){
		include 'conexion.php';
		$pregunta1 = $_POST['pregunta'];
		$respuesta = $_POST['respuesta'];
		$complejidad = $_POST['complejidad'];
		$numero = $_POST['numero'];

		$sql="UPDATE Preguntas SET t_pregunta='$pregunta1',t_respuesta='$respuesta', complejidad='$complejidad' WHERE n_pregunta='$numero'";
		mysql_query($sql);
		echo '<script language="javascript">alert("Se ha editado la pregunta")</script>';
	}

	if(isset($_POST['logout'])){
		include 'logout.php';
	}
?>
