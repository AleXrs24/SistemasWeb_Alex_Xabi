<?php
	session_start();
	session_destroy();

	echo'<script type="text/javascript">alert("Has cerrado sesión");</script>';

	header('location:layout.php');
?>