<?php
	include '../config.php';
	$valorR=$_POST['vl'];
	$mesR=$_POST['ms'];
	$depart=$_POST['dp'];
	$DH=date("d");
	$MH=date("m");
	$YH=date("Y");
	$dia_hoy=$YH."-".$MH."-".$DH;
	if ($valorR=="" || $mesR=="0" || $mesR=="" || $depart=="0" || $depart=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into metas(precio_meta,mes_mt,year_mt,depart_metas) 
			values('$valorR','$mesR','$YH','$depart')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>