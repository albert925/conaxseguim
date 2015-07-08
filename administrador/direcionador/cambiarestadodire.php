<?php
	include '../../config.php';
	$idE=$_POST['hid'];
	$opciones=$_POST['hop'];
	if ($idE=="" || $opciones=="0" || $opciones=="") {
		echo "1";
	}
	else{
		$modifcaretado="UPDATE direcionador set estado_dire='$opciones' where id_direcion='$idE'";
		mysql_query($modifcaretado,$conexion) or die (mysql_error());
		echo "2";
	}
?>