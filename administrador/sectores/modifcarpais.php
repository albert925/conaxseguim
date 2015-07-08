<?php
	include '../../config.php';
	$idPR=$_POST['paifmid'];
	$namePR=$_POST['paifmnam'];
	if ($idPR=="" || $namePR=="") {
		echo "1";
	}
	else{
		$existepais="SELECT * from pais where nam_pais='$namePR'";
		$sqlexist=mysql_query($existepais,$conexion) or die (mysql_error());
		$numeroexist=mysql_num_rows($sqlexist);
		if ($numeroexist>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE pais set nam_pais='$namePR' where id_pais='$idPR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>