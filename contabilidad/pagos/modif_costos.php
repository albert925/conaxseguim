<?php
	include '../../config.php';
	$idr=$_POST['idcs'];
	$a=$_POST['oa'];//nombre
	$b=$_POST['ob'];//fecha
	$c=$_POST['oc'];//costo
	$d=$_POST['od'];//id administrador
	if ($idr=="" || $a=="" || $b=="" || $c=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE costos set nam_blanc='$a',fecha_cos='$b',valor_cos=$c,
			idadP_cost=$d where id_cos=$idr";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>