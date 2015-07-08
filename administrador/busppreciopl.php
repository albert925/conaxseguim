<?php
	include '../config.php';
	$idPL=$_POST['idpA'];
	if ($idPL=="") {
		echo "1";
	}
	else{
		$busqueda_precio="SELECT * from planes where id_plan='$idPL'";
		$wer=mysql_query($busqueda_precio,$conexion) or die (mysql_error());
		while ($coli=mysql_fetch_array($wer)) {
			$precio=$coli['precio_plan'];
		}
		echo "$precio";
	}
?>