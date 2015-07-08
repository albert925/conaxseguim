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
		$idEMpreD=$_GET['idempE'];
		if ($idEMpreD=="") {
			echo "<script>";
				echo "alert('Id de Empresa no disponible');";
				echo "var pag='../clientes/empresas.php';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$delete="DELETE from empresas where id_empresa='$idEMpreD'";
			mysql_query($delete,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Empresa $idEMpreD ha sido borrado');";
				echo "var pag='../clientes/empresas.php';";
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