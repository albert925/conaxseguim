<?php
	include '../config.php';
	$IdT=$_POST['idAss'];
	$tipo=$_POST['tipoA'];
	if ($IdT=="" || $tipo=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estdA='$tipo' where id_seguimineto='$IdT'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>