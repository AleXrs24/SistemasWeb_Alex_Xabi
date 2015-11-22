<?php
	require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');

	//$cliente = new nusoap_client("http://localhost/SistemasWeb/ComprobarContraseña.php?wsdl", false);
	$cliente = new nusoap_client("http://swetxeberria.hol.es/ComprobarContrasena.php?wsdl", false);

	$result = $cliente->call('comprobarPass', array('x'=>$_GET['pass']));
	
	if($result=="VALIDA"){
		echo "La contraseña es segura";
	}else if($result=="INVALIDA"){
		echo "La contraseña no es segura";
	}
?>