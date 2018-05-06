<?php
	//header('Content-Type: text/html; charset=iso-8859-1'); 	
	//header("Location: pricipal.php" );
	$host="localhost";
	$user="root";
	$pass="root";
	$dbname="residuos";	
	
	$dbh=mysqli_connect($host, $user, $pass,$dbname) or die('No se puede conectar a la base de datos '.$dbname);


	mysqli_select_db($dbh,$dbname) or die("No fue posible seleccionar la BD");
	

?>
