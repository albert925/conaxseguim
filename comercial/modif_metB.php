<?php
	include '../config.php';
	$idR=$_POST['faC'];
	$feR=$_POST['fbC'];
	$drR=$_POST['fcC'];
	$vlR=$_POST['fdC'];
	if ($idR=="" || $vlR=="" || $feR=="0" || $feR=="" || $drR=="0" || $drR=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE metab set precio_mtB=$vlR,mes_mtB='$feR',direc_id=$drR 
			where id_metB='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>