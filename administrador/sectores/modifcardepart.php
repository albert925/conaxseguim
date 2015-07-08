<?php
	include '../../config.php';
	$idDR=$_POST['deparifid'];
	$nameDR=$_POST['deparifnam'];
	if ($idDR=="" || $nameDR=="") {
		echo "1";
	}
	else{
		$existedepart="SELECT * from departamento where nam_depart='$nameDR'";
		$sqlexist=mysql_query($existedepart,$conexion) or die (mysql_error());
		$numeroexist=mysql_num_rows($sqlexist);
		if ($numeroexist>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE departamento set nam_depart='$nameDR' where id_depart='$idDR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>