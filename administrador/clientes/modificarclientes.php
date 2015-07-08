<?php
	include '../../config.php';
	$idclienteF=$_POST['idf'];
	$nombreF=$_POST['naev'];
	$apellidoF=$_POST['apev'];
	$cooreoF=$_POST['corev'];
	$telefonoF=$_POST['telev'];
	$diaF=$_POST['ed'];
	$mesF=$_POST['em'];
	if ($idclienteF=="" || $nombreF=="" || $apellidoF=="") {
		echo "1";
	}
	else{
		$modificando="UPDATE clientes set nombre_us='$nombreF',apellido_us='$apellidoF',correo_us='$cooreoF',telefono_us='$telefonoF',diaNcl='$diaF',mesNcl='$mesF' 
		where id_usuario='$idclienteF'";
		mysql_query($modificando,$conexion) or die (mysql_error());
		echo "2";
	}
?>