<?php
	include '../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$usuariounico=$_SESSION['adm'];
		$sacarinform="SELECT * from administrador where usuadmin='$usuariounico'";
		$queryad=mysql_query($sacarinform,$conexion) or die (mysql_error());
		while ($adv=mysql_fetch_array($queryad)) {
			$idad=$adv['id_admin'];
			$correo=$adv['correo_adm'];
		}
		$idSEG=$_GET['idBrse'];
		if ($idSEG=="") {
			echo "<script>";
				echo "alert('Id seguimineto no disponible');";
				echo "var pag='../administrador';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from seguimiento where id_seguimineto='$idSEG'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Id $idSEG del seguimineto ha sido borrado');";
				echo "var pag='../administrador';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
	}
	else{
		echo "<script>";
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>