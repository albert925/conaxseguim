<?php
	include '../../config.php';
	$idS=$_POST['idtda'];
	$tipo=$_POST['jaa'];
	if ($idS=="0" || $tipo=="0") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set estad_plan='$tipo' where id_seguimineto='$idS'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>