<?php
	include '../config.php';
	$idR=$_POST['idx'];
	$dia=$_POST['ja'];
	$mes=$_POST['jb'];
	$year=$_POST['jc'];
	$mes_unida=$year."-".$mes."-".$dia;
	
	if ($idR=="" || $dia=="0" || $mes=="0" || $dia=="" || $mes=="" || $year=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE tareas set DF='$dia',MF='$mes',AF='$year',fechafin_tar='$mes_unida' where id_tarea='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>