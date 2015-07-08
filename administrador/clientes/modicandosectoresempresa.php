<?php
	include '../../config.php';
	$idEmpresa=$_POST['ape'];
	$paisE=$_POST['bpe'];
	$departmanetoE=$_POST['cpe'];
	$ciudadE=$_POST['dpe'];
	if ($idEmpresa=="" || $paisE=="0" || $paisE=="" || $departmanetoE=="0" || $departmanetoE=="" || $ciudadE=="0" || $ciudadE=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE empresas set pais_emp='$paisE',depart_emp='$departmanetoE',ciudad_emp='$ciudadE' where id_empresa='$idEmpresa'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>