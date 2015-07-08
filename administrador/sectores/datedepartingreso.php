<?php
	include '../../config.php';
	$nombDepart=$_POST['namdepart'];
	if ($nombDepart=="") {
		echo "1";
	}
	else{
		$existedepart="SELECT * from departamento where nam_depart='$nombDepart'";
		$sqlexit=mysql_query($existedepart,$conexion) or die (mysql_error());
		$numeroA=mysql_num_rows($sqlexit);
		if ($numeroA>0) {
			echo "2";
		}
		else{
			$ingresando="INSERT into departamento(nam_depart) values ('$nombDepart')";
			mysql_query($ingresando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>