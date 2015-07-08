<?php
	include '../config.php';
	$idR=$_POST['idw'];
	$dia=$_POST['ia'];
	$mes=$_POST['ib'];
	$year=$_POST['ic'];
	$mes_unida=$year."-".$mes."-".$dia;
	
	if ($idR=="" || $dia=="0" || $mes=="0" || $dia=="" || $mes=="" || $year=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE tareas set DI='$dia',MI='$mes',AI='$year',fechain_tar='$mes_unida' where id_tarea='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>