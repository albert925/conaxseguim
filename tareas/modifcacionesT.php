<?php
	include '../config.php';
	$idR=$_POST['ide'];
	$plan=$_POST['ae'];
	$responsable=$_POST['be'];
	$tarea=$_POST['ce'];
	$estados=$_POST['fe'];
	$descripciones=$_POST['ge'];
	$tareas=$_POST['gf'];
	if ($idR=="" || $plan=="0" || $plan=="" || $responsable=="0" || $responsable=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE tareas set segui_id='$plan',admin_id='$responsable',tare_nam='$tarea',
			esta_tar='$estados',descrip_tarea='$descripciones',area_tarea='$tareas' where id_tarea='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>