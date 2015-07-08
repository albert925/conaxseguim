<?php
	include 'config.php';
	$admiR=$_POST['aduse'];
	$passR=$_POST['piss'];
	$tipad=1;
	if ($admiR=="" || $passR=="") {
		echo "1";
	}
	else{
		$validar="SELECT * from administrador where usuadmin='$admiR' and password_adm='$passR'";
		$sql=mysql_query($validar,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql);
		if ($numero>0) {
			$tipoadminses="SELECT * from administrador where usuadmin='$admiR' and tip_adm='$tipad'";
			$sqltipoes=mysql_query($tipoadminses,$conexion) or die (mysql_error());
			$numeroBB=mysql_num_rows($sqltipoes);
			if ($numeroBB>0) {
				session_start();
				$_SESSION['adm']=$admiR;
				echo "3";
			}
			else{
				session_start();
				$_SESSION['adm']=$admiR;
				echo "4";
			}
		}
		else{
			echo "2";
		}
	}
?>