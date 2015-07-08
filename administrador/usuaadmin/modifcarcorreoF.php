<?php
	include '../../config.php';
	$IDr=$_POST['idevB'];
	$corradmin=$_POST['hhb'];
	if ($IDr=="" || $corradmin=="") {
		echo "1";
	}
	else{
		$existenameus="SELECT * from administrador where correo_adm='$corradmin'";
		$sqlexist=mysql_query($existenameus,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sqlexist);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modifcar="UPDATE administrador set correo_adm='$corradmin' where id_admin='$IDr'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>