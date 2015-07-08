<?php
	include '../../config.php';
	$nameprove=$_POST['nimpv'];
	$precprove=$_POST['precpv'];
	if ($nameprove=="") {
		echo "1";
	}
	else{
		$ingresando="INSERT into proveedores(name_prove,precio) values('$nameprove','$precprove')";
		$ing_tecr="INSERT into terceros(nomb_terc,tipo_terc) 
				values('$nameprove','4')";
		mysql_query($ingresando,$conexion) or die (mysql_error());
		mysql_query($ing_tecr,$conexion) or die (mysql_error());
		echo "2";
	}
?>