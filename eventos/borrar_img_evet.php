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
			$tpad=$adv['tip_adm'];
		}
		$idR=$_GET['br'];
		$evid=$_GET['pd'];
		if ($idR=="" || $evid=="") {
			echo "$idR---$evid";
			echo "<script>";
				echo "alert('id evento o de imagen no disponible');";
				echo "var pag='../eventos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$sacarrut="SELECT * from imagenes_event where id_img_evet=$idR";
			$sql_rut=mysql_query($sacarrut,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_rut)) {
				$rutborr=$tr['rut_ev'];
			}
			unlink("../".$rutborr);
			$borrar="DELETE from imagenes_event where id_img_evet=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('imagen borrado');";
				echo "var pag='eventos_images.php?pd=$evid';";
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