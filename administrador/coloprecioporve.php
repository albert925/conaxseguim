<?php
	include '../config.php';
	$idR=$_POST['proveIDev'];
	if ($idR=="") {
		echo "0";
	}
	else{
		$busqued="SELECT * from proveedores where id_proveedor='$idR'";
		$sql=mysql_query($busqued,$conexion) or die (mysql_error());
		while ($hk=mysql_fetch_array($sql)) {
			$precio=$hk['precio'];
		}
		echo "$precio";
	}
?>