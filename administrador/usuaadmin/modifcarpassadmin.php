<?php
	include '../../config.php';
	$IDr=$_POST['idevC'];
	$passviejo=$_POST['hhc'];
	$passnuevo=$_POST['hhd'];
	if ($IDr=="" || $passviejo=="" || $passnuevo=="") {
		echo "1";
	}
	else{
		$existenameus="SELECT * from administrador where password_adm='$passviejo' and id_admin='$IDr'";
		$sqlexist=mysql_query($existenameus,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sqlexist);
		if ($numero>0) {
			$modifcar="UPDATE administrador set password_adm='$passnuevo' where id_admin='$IDr'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>