<?php
	include '../../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$usuariounico=$_SESSION['adm'];
		$sacarinform="SELECT * from administrador where usuadmin='$usuariounico'";
		$queryad=mysql_query($sacarinform,$conexion) or die (mysql_error());
		while ($adv=mysql_fetch_array($queryad)) {
			$idad=$adv['id_admin'];
			$correo=$adv['correo_adm'];
		}
		$idR=$_GET['idPEv'];
		if ($idR=="") {
			echo "<script>";
				echo "alert('Id Pais no disponible');";
				echo "var pag='../sectores';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from pais where id_pais='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Pais $idR ha sido borrada');";
				echo "var pag='../sectores';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
	}
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>