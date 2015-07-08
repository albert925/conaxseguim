<?php
	include '../config.php';
	$a=$_POST['mta'];//mes
	$b=$_POST['mtb'];//direcionador
	$c=$_POST['mtc'];//valor
	$DH=date("d");
	$MH=date("m");
	$YH=date("Y");
	$dia_hoy=$YH."-".$MH."-".$DH;
	if ($a=="" || $a=="0" || $b=="" || $b=="0") {
		echo "1";
	}
	else{
		$ingresar="INSERT into metab(precio_mtB,mes_mtB,year_mtB,direc_id) 
			values($c,'$a','$YH',$b)";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>