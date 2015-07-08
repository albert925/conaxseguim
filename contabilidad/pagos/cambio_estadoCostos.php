<?php
	include '../../config.php';
	$a=$_POST['sa'];
	$b=$_POST['sb'];
	$c=$_POST['sc'];
	if ($a=="" || $c=="0" || $c=="" || $b=="") {
		echo "1";
	}
	else{
		$cambiar="UPDATE costos set estad_cost='$c',idadP_cost='$b' where id_cos='$a'";
		mysql_query($cambiar,$conexion) or die (mysql_error());
		echo "2";
	}
?>