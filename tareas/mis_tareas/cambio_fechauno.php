<?php
	include '../../config.php';
	$idR=$_POST['ffa'];
	$ffR=$_POST['ffb'];
	if ($idR=="" || $ffR=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE tareas set fechain_tar='$ffR' where id_tarea=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>