<?php
	include '../../config.php';
	$idP=$_POST['idB'];
	$tipoestado=$_POST['tipoB'];
	$adm=$_POST['minad'];
	if ($idP=="" || $tipoestado=="0" || $tipoestado=="" || $adm=="") {
		echo "1";
	}
	else{
		$cambiar="UPDATE pagos set estado_p='$tipoestado',idadP='$adm' where id_pago='$idP'";
		mysql_query($cambiar,$conexion) or die (mysql_error());
		echo "2";
	}
?>