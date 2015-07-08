<?php
	include '../config.php';
	$idR=$_POST['idff'];
	$Df=$_POST['df'];
	$Mf=$_POST['mf'];
	$Yf=$_POST['yf'];
	$fecha_unida=$Yf."-".$Mf."-".$Df;
	if ($idR=="" || $Df=="0" || $Df=="" || $Mf=="0" || $Mf=="" || $Yf=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set ff_plan='$fecha_unida' where id_seguimineto='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>