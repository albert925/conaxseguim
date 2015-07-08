<?php
	include '../../config.php';
	$IdT=$_POST['idCss'];
	$tipo=$_POST['tipoC'];
	if ($IdT=="" || $tipo=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estdC='$tipo' where id_seguimineto='$IdT'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>