<?php
	include '../../config.php';
	$a=$_POST['ia'];//fecha
	$b=$_POST['ib'];//descripcion
	$c=$_POST['ic'];//tercero
	$d=$_POST['id'];//valor

	$nuevo_ingreso="INSERT into abonoc(fecha_indirecto,terceros_indirecto,descrip_indirecto,valor_indirecto) 
		values('$a','$c','$b','$d')";
	mysql_query($nuevo_ingreso,$conexion) or die (mysql_error());
	echo "2";
?>