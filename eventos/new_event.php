<?php
	include '../config.php';
	$a=$_POST['ua'];
	$b=$_POST['ub'];
	$hoy=date("Y-m-d");
	if ($a=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into evento(nam_ev,desc_ev,fec_ev) 
			values('$a','$b','$hoy')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>