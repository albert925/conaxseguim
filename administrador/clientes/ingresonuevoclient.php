<?php
	include '../../config.php';
	$nombreCL=$_POST['na'];
	$apellidoCL=$_POST['nb'];
	$correoCL=$_POST['nc'];
	$telefonoCL=$_POST['nd'];
	$diaCL=$_POST['ne'];
	$mesCL=$_POST['nf'];
	if ($nombreCL=="" || $apellidoCL=="") {
		echo "1";
	}
	else{
		$ingresando="INSERT into clientes(nombre_us,apellido_us,correo_us,telefono_us,diaNcl,mesNcl) 
			values('$nombreCL','$apellidoCL','$correoCL','$telefonoCL','$diaCL','$mesCL')";
		mysql_query($ingresando,$conexion) or die (mysql_error());
		echo "2";
	}
?>