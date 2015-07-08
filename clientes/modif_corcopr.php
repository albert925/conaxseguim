<?php
	include '../config.php';
	$idr=$_POST['di'];//id correo corporativo
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
		$modificar="UPDATE corr_corp set corr_corp='$a',pass_corp='$b',
			pop3_imat='$c',smpt='$e',puerto_pop3='$d',puerto_imat='$f' where id_corp=$idr";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>