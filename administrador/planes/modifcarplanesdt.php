<?php
	include '../../config.php';
	$idP=$_POST['fhid'];
	$nombreP=$_POST['fha'];
	$espacioP=$_POST['fhb'];
	$transferenciaP=$_POST['fhc'];
	$correosP=$_POST['fhd'];
	$preoppnalP=$_POST['fhe'];
	$preciodirecionadorP=$_POST['fhf'];
	$insumosP=$_POST['fhg'];
	$provedprP=$_POST['fhh'];
	if ($idP=="" || $nombreP=="" || $preoppnalP=="" || $preciodirecionadorP=="" || $provedprP=="0" || $provedprP=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE planes set nombre_plan='$nombreP',espacio_plan='$espacioP',
				transferencia_plan='$transferenciaP',cuentas_correo='$correosP',
				precio_plan='$preoppnalP',precio_direcion='$preciodirecionadorP',
				insumos_pl='$insumosP',proveedor_idpl='$provedprP' 
				where id_plan='$idP'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
		/*$existe_nom_plan="SELECT * from planes where nombre_plan='$nombreP'";
		$sqlnib=mysql_query($existe_nom_plan,$conexion) or die (mysql_error());
		$nunmer=mysql_num_rows($sqlnib);
		if ($nunmer>0) {
			echo "2";
		}
		else{

		}*/
	}
?>