<?php
	include '../../config.php';
	$idRelacion=$_POST['hta'];
	$paisRl=$_POST['htb'];
	$departRl=$_POST['htc'];
	if ($idRelacion=="" || $paisRl=="" || $departRl=="") {
		echo "1";
	}
	else{
		$existe_relacion="SELECT * from pais_depart where pais_id='$paisRl' and depart_id='$departRl'";
		$sql=mysql_query($existe_relacion,$conexion) or die (mysql_error());
		$numeroEx=mysql_num_rows($sql);
		if ($numeroEx>0) {
			echo "2";
		}
		else{
			$modificando="UPDATE pais_depart set pais_id='$paisRl', depart_id='$departRl' where id_pais_depart='$idRelacion'";
			mysql_query($modificando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>