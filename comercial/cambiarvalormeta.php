<?php
	include '../config.php';
	$idR=$_POST['idfm'];
	$valorr=$_POST['vlf'];
	$mesR=$_POST['msf'];
	$dppp=$_POST['fdp'];
	if ($idR=="" || $valorr=="" || $mesR=="0" || $mesR=="" || $dppp=="0" || $dppp=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE metas set precio_meta='$valorr',mes_mt='$mesR',depart_metas='$dppp' where id_meta='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>