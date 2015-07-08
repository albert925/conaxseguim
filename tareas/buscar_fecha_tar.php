<?php
	include '../config.php';
	$a=$_POST['ad'];//fecha ingreso
	$b=$_POST['bd'];//responsable admin
	if ($a=="" || $b=="") {
		echo "error, fecha o responsable en blanco";
	}
	else{
		$existe_tarea_dia="SELECT * from tareas where admin_id=$b and fechain_tar='$a'";
		$sql_existe=mysql_query($existe_tarea_dia,$conexion) or die (mysql_error());
		$numexiste=mysql_num_rows($sql_existe);
		if ($numexiste>0) {
			echo "2";
		}
		else{
			echo "3";
		}
	}
?>