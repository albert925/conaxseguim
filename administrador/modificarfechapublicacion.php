<?php
	include '../config.php';
	$idR=$_POST['idpp'];
	$Dp=$_POST['dp'];
	$Mp=$_POST['mp'];
	$Yp=$_POST['yp'];
	$fecha_unida=$Yp."-".$Mp."-".$Dp;
	if ($idR=="" || $Dp=="0" || $Dp=="" || $Mp=="0" || $Mp=="" || $Yp=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set fecha_ingreso='$fecha_unida',mes_in='$Mp',year_in='$Yp' 
		where id_seguimineto='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>