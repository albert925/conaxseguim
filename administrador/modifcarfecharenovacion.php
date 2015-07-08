<?php
	include '../config.php';
	$idR=$_POST['idfr'];
	$Dr=$_POST['dr'];
	$Mr=$_POST['mr'];
	$Yr=$_POST['yr'];
	$fecha_unida=$Yr."-".$Mr."-".$Dr;
	if ($idR=="" || $Dr=="0" || $Dr=="" || $Mr=="0" || $Mr=="" || $Yr=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set fech_r='$fecha_unida' where id_seguimineto='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>