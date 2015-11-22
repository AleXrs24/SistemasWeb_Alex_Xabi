requestPregunta = new XMLHttpRequest();
requestPregunta.onreadystatechange = function(){
	if((requestPregunta.readyState==4)&&(requestPregunta.status==200)){
		document.getElementById("datosPregunta").innerHTML = requestPregunta.responseText;
	}
}

function obtenerPregunta(){
	var select = document.getElementById("preguntas");
	var t_pregunta = select.options[select.selectedIndex].value;

	if(t_pregunta!="--"){
		requestPregunta.open("GET", "obtenerPregunta.php?t_pregunta="+t_pregunta);
		requestPregunta.send();
	}
}