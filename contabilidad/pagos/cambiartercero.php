<?php
	include '../../config.php';
	$idR=$_POST['pida'];
	$terceros=$_POST['tcra'];
	$quienes=$_POST['hada'];
	if ($idR=="" || $terceros=="0" || $terceros=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE pagos set terceros_id='$terceros',idadP='$quienes' where id_pago='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>