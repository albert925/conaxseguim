<?php
	include '../../config.php';
	$idS=$_POST['idtb'];
	$tipo=$_POST['jab'];
	if ($idS=="0" || $tipo=="0") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estado_pag_dire='$tipo' where id_seguimineto='$idS'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>