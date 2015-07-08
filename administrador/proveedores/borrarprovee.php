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
		$idPV=$_GET['idclE'];
		if ($idPV=="") {
			echo "<script>";
				echo "alert('Id proveedor no disponible');";
				echo "var pag='../proveedores';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from proveedores where id_proveedor='$idPV'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Proveedor Borrado');";
				echo "var pag='../proveedores';";
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