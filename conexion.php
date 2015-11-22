<?php 
 
$conex_remota = mysql_connect("mysql.hostinger.es","u468363394_root","root24");

if (!($conex_remota)) { 
    $conex_local = mysql_connect("localhost", "root", "contrasena") OR die ("No se puede conectar a la base de datos local");
    mysql_select_db("Quiz");
} else {
	mysql_select_db("u468363394_quiz"); 
}
?>