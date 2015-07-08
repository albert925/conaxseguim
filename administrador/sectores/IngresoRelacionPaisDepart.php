<?php
	include '../../config.php';
	$idPaisR=$_POST['idPev'];
	$departamentodsR=$_POST['idarDptev'];
	if ($idPaisR=="" || $idPaisR=="0" || $departamentodsR=="null" || $departamentodsR=="false") {
		echo "1";
	}
	else{
		for ($i=0; $i <count($departamentodsR) ; $i++) { 
			$verdepart=$departamentodsR[$i];
			$existerelacion="SELECT * from pais_depart where pais_id='$idPaisR' and depart_id='$verdepart'";
			$sqlexist=mysql_query($existerelacion,$conexion) or die (mysql_error());
			$numerosrel=mysql_num_rows($sqlexist);
			if ($numerosrel>0) {
				echo "<b style='color:#F7F7F7;'>El departamento $verdepart ya tiene relación</b><br />";
			}
			else{
				$ingresando="INSERT into pais_depart(pais_id,depart_id) values('$idPaisR','$verdepart')";
				mysql_query($ingresando,$conexion) or die (mysql_error());
				echo "<b style='color:#00A5D4;'>Relación ingresada</b><br />";
			}
		}
	}
?>