<?php
	require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');

	$server = new soap_server;
	//$ns="http://localhost/SistemasWeb";
	$ns="http://swetxeberria.hol.es";
	$server->configureWSDL('comprobarPass',$ns);
	$server->wsdl->schemaTargetNameespace=$ns;

	$server->register('comprobarPass', array('x'=>'xsd:string'), array('y'=>'xsd:string'), $ns);

	function comprobarPass($x){
		$file = fopen("data/toppasswords.txt", "r");
		while(!feof($file)){
			$linea = chop(fgets($file));
			if(strcmp($x, $linea)==0){
				fclose($file);
				return "INVALIDA";
			}
		}
		fclose($file);
		return "VALIDA";
	}

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>