<?php
	include '../../config.php';
	$dia=$_POST['d'];
	$mes=$_POST['m'];
	$year=$_POST['y'];
	$tercero=$_POST['t'];
	$valor=$_POST['v'];
	$concepto=$_POST['c'];
	$estado=$_POST['e'];
	$administrador=$_POST['amdev'];
	$T_pagosT=$_POST['f'];
	$fecha_unida=$year."-".$mes."-".$dia;
	if ($tercero=="0" || $tercero=="" || $estado=="0" || $estado=="" || $T_pagosT=="0" || $T_pagosT=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into pagos(terceros_id,fecha_p,valor_p,concepto_p,estado_p,tipo_pago,idadP) 
			values('$tercero','$fecha_unida','$valor','$concepto','$estado','$T_pagosT','$administrador')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>