<?php
	include '../config.php';
	$idR=$_POST['lid'];
	$a=$_POST['la'];//nombre
	$b=$_POST['lb'];//texto
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE evento set nam_ev='$a',desc_ev='$b' where event_id=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>