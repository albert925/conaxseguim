<?php
	include '../config.php';
	$IdT=$_POST['idDss'];
	$tipo=$_POST['tipoD'];
	if ($IdT=="" || $tipo=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estad_prove='$tipo' where id_seguimineto='$IdT'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>