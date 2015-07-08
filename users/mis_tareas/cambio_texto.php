<?php
	include '../../config.php';
	$idR=$_POST['tid'];
	$txt=$_POST['txf'];
	if ($idR=="" || $txt=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE tareas set descrip_tarea='$txt' where id_tarea=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>