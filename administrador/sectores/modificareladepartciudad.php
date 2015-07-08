<?php
	include '../../config.php';
	$idRelacion=$_POST['idrelEv'];
	$departeRl=$_POST['kkc'];
	$ciudadRl=$_POST['kkd'];
	if ($idRelacion=="" || $departeRl=="" || $ciudadRl=="") {
		echo "1";
	}
	else{
		$existe_relacion="SELECT * from depart_ciudad where Dpart_id='$departeRl' and ciudad_id='$ciudadRl'";
		$sql=mysql_query($existe_relacion,$conexion) or die (mysql_error());
		$numeroEx=mysql_num_rows($sql);
		if ($numeroEx>0) {
			echo "2";
		}
		else{
			$modificando="UPDATE depart_ciudad set Dpart_id='$departeRl', ciudad_id='$ciudadRl' where id_depart_ciud='$idRelacion'";
			mysql_query($modificando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>