<?php
	include '../config.php';
	$idr=$_POST['di'];//id empresa
	$a=$_POST['a'];//correo
	$b=$_POST['b'];//contraseña
	$c=$_POST['c'];//servidor pop3 imap
	$d=$_POST['d'];//puerto pop3 imap
	$e=$_POST['e'];//servidor smtp
	$f=$_POST['f'];//puerto smtp
	if ($idr=="" || $a=="" || $b=="" || $c=="" || $d=="" || $e=="" || $f=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into corr_corp(empre_id,corr_corp,pass_corp,pop3_imat,smpt,
			puerto_pop3,puerto_imat) 
			values($idr,'$a','$b','$c','$e','$d','$f')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>