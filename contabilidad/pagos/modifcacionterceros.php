<?php
	include '../../config.php';
	$nombreT=$_POST['oa'];
	$cedu_nitT=$_POST['ob'];
	$telefonoT=$_POST['oc'];
	$direcionT=$_POST['od'];
	$tipoT=$_POST['oe'];
	$idT=$_POST['of'];
	if ($nombreT=="" || $cedu_nitT=="" || $tipoT=="0" || $tipoT=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE terceros set nomb_terc='$nombreT',ced_nit_terc='$cedu_nitT',
			telf_terc='$telefonoT',dire_terc='$direcionT',tipo_terc='$tipoT' where id_tercer='$idT'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>