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
			$avatar=$adv['avatar_adm'];
		}
		$idR=$_GET['idclE'];
		if ($idR=="") {
			echo "<script>";
				echo "alert('id tercero no disponible')";
				echo "var pag='../pagos/terceros.php';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from terceros where id_tercer='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('id $idR ha sido borrado');";
				echo "var pag='../pagos/terceros.php';";
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