<?php
	include '../../config.php';
	$idS=$_POST['ikal'];
	$tipo=$_POST['jac'];
	if ($idS=="0" || $tipo=="0") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estado_insumo='$tipo' where id_seguimineto='$idS'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>