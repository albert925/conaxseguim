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
			$avatar=$adv['avatar_adm'];
			$tipoad=$adv['tip_adm'];
		}
		$idR=$_GET['br'];
		$mepr=$_GET['kem'];
		$adt=$_GET['kc'];
		if ($idR=="" || $mepr=="" || $adt=="") {
			echo "<script>";
				echo "alert('ids no disponibles');";
				echo "var pag='../clientes';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from corr_corp where id_corp=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('Correo borrado');";
				echo "var pag='ind2x.php?EMP=$mepr&adm=$adt';";
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