<?php
	include '../../config.php';
	$idCR=$_POST['idciuid'];
	$nameCR=$_POST['idcinam'];
	if ($idCR=="" || $nameCR=="") {
		echo "1";
	}
	else{
		$existeciudad="SELECT * from ciudad where nam_ciudad='$nameCR'";
		$sqlexist=mysql_query($existeciudad,$conexion) or die (mysql_error());
		$numeroexist=mysql_num_rows($sqlexist);
		if ($numeroexist>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE ciudad set nam_ciudad='$nameCR' where id_ciudad='$idCR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>