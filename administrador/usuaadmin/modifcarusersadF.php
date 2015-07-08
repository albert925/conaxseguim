<?php
	include '../../config.php';
	$IDr=$_POST['idevA'];
	$username=$_POST['hha'];
	if ($IDr=="" || $username=="") {
		echo "1";
	}
	else{
		$existenameus="SELECT * from administrador where usuadmin='$username'";
		$sqlexist=mysql_query($existenameus,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sqlexist);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modifcar="UPDATE administrador set usuadmin='$username' where id_admin='$IDr'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>