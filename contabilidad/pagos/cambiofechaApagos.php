<?php
	include '../../config.php';
	$idR=$_POST['pidc'];
	$dia=$_POST['aj'];
	$mes=$_POST['bj'];
	$year=$_POST['cj'];
	$quienes=$_POST['dj'];
	$fecha_unida=$year."-".$mes."-".$dia;
	if ($idR=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE pagos set fecha_p='$fecha_unida',idadP='$quienes' 
		where id_pago='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>