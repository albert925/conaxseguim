<?php
	include '../config.php';
	$IdT=$_POST['idBss'];
	$tipo=$_POST['tipoB'];
	if ($IdT=="" || $tipo=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estdB='$tipo' where id_seguimineto='$IdT'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>