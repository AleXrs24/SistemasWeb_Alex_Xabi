<?php
	require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');

	$email = $_GET['email'];

	$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', true);

	$result = $soapclient->call('comprobar', array($email));

	//print_r($result);

	if($result=='NO'){
		echo 'Esta dirección de correo no está matriculada en Sistemas Web';
	}else{
		echo 'La dirección de correo es correcta';
	}

?>