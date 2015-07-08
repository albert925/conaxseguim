<?php
	include '../../config.php';
	$idDeparR=$_POST['idDev'];
	$ciudadR=$_POST['idCiuev'];
	if ($idDeparR=="" || $idDeparR=="0" || $ciudadR=="null" || $ciudadR=="false") {
		echo "1";
	}
	else{
		for ($i=0; $i <count($ciudadR) ; $i++) { 
			$verciudad=$ciudadR[$i];
			$existerelacion="SELECT * from depart_ciudad where Dpart_id='$idDeparR' and ciudad_id='$verciudad'";
			$sqlexist=mysql_query($existerelacion,$conexion) or die (mysql_error());
			$numerosrel=mysql_num_rows($sqlexist);
			if ($numerosrel>0) {
				echo "<b style='color:#F7F7F7;'>La ciudad $verciudad ya tiene relación</b><br />";
			}
			else{
				$ingresando="INSERT into depart_ciudad(Dpart_id,ciudad_id) values('$idDeparR','$verciudad')";
				mysql_query($ingresando,$conexion) or die (mysql_error());
				echo "<b style='color:#00A5D4;'>Relación ingresada</b><br />";
			}
		}
	}
?>