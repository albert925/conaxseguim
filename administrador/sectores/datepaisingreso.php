<?php
	include '../../config.php';
	$nombPais=$_POST['nampais'];
	if ($nombPais=="") {
		echo "1";
	}
	else{
		$existepais="SELECT * from pais where nam_pais='$nombPais'";
		$sqlexit=mysql_query($existepais,$conexion) or die (mysql_error());
		$numeroA=mysql_num_rows($sqlexit);
		if ($numeroA>0) {
			echo "2";
		}
		else{
			$ingresando="INSERT into pais(nam_pais) values ('$nombPais')";
			mysql_query($ingresando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>