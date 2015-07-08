<?php
	include '../../config.php';
	$idR=$_POST['iddrev'];
	$nombreR=$_POST['nimdrev'];
	if ($idR=="" || $nombreR=="") {
		echo "1";
	}
	else{
		$existenombre="SELECT * from direcionador where nam_direcion='$nombreR'";
		$sqlnime=mysql_query($existenombre,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sqlnime);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificando="UPDATE direcionador set nam_direcion='$nombreR' where id_direcion='$idR'";
			mysql_query($modificando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>