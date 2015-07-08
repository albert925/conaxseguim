<?php
	include '../../config.php';
	$idPV=$_POST['idfa'];
	$nombPV=$_POST['namfb'];
	$precPV=$_POST['precfc'];
	if ($idPV=="" || $nombPV=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE proveedores set name_prove='$nombPV',precio='$precPV' where id_proveedor='$idPV'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>