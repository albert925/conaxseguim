<?php
	include '../../config.php';
	$nombCiudad=$_POST['namciudad'];
	if ($nombCiudad=="") {
		echo "1";
	}
	else{
		$existeciudad="SELECT * from ciudad where nam_ciudad='$nombCiudad'";
		$sqlexit=mysql_query($existeciudad,$conexion) or die (mysql_error());
		$numeroA=mysql_num_rows($sqlexit);
		if ($numeroA>0) {
			echo "2";
		}
		else{
			$ingresando="INSERT into ciudad(nam_ciudad) values ('$nombCiudad')";
			mysql_query($ingresando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>