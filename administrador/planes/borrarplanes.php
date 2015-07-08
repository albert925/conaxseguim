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
		$idPlr=$_GET['idclE'];
		if ($idPlr=="") {
			echo "<script>";
				echo "alert('Id plan no disponible');";
				echo "var pag='../planes';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from planes where id_plan='$idPlr'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Plan borrado');";
				echo "var pag='../planes';";
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