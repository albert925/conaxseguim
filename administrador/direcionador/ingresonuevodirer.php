<?php
	include '../../config.php';
	$nombredr=$_POST['nimDR'];
	$estadodr=$_POST['stDR'];
	if ($nombredr=="" || $estadodr=="0" || $estadodr=="") {
		echo "1";
	}
	else{
		$existe_direcion="SELECT * from direcionador where nam_direcion='$nombredr'";
		$sqlext=mysql_query($existe_direcion,$conexion) or die (mysql_error());
		$numerdr=mysql_num_rows($sqlext);
		if ($numerdr>0) {
			echo "2";
		}
		else{
			$ingresando="INSERT into direcionador(nam_direcion,estado_dire) values('$nombredr','$estadodr')";
			mysql_query($ingresando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>