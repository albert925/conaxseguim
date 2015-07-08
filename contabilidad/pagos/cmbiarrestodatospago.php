<?php
	include '../../config.php';
	$idR=$_POST['pidb'];
	$valor=$_POST['ag'];
	$texto=$_POST['bg'];
	$estados=$_POST['cg'];
	$quienes=$_POST['dg'];
	$T_pagos=$_POST['eg'];
	if ($idR=="" || $estados=="0" || $estados=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE pagos set valor_p='$valor',concepto_p='$texto',estado_p='$estados',
			idadP='$quienes',tipo_pago='$T_pagos' where id_pago='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>