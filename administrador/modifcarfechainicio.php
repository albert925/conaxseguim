<?php
	include '../config.php';
	$idR=$_POST['idfi'];
	$Di=$_POST['di'];
	$Mi=$_POST['mi'];
	$Yi=$_POST['yi'];
	$fecha_unida=$Yi."-".$Mi."-".$Di;
	if ($idR=="" || $Di=="0" || $Di=="" || $Mi=="0" || $Mi=="" || $Yi=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set fi_plan='$fecha_unida' where id_seguimineto='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>