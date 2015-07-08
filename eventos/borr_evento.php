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
		if ($idR=="") {
			echo "$idR";
			echo "<script>";
				echo "alert('id evento no disponible');";
				echo "var pag='../eventos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$sacarrut="SELECT * from imagenes_event where evet_id=$idR";
			$sql_rut=mysql_query($sacarrut,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_rut)) {
				$id_rut=$tr['id_img_evet'];
				$rutborr=$tr['rut_ev'];
				unlink("../".$rutborr);
				$borrar_rut="DELETE from imagenes_event where id_img_evet=$id_rut";
				mysql_query($borrar_rut,$conexion) or die (mysql_error());
			}
			$borar="DELETE from evento where event_id=$idR";
			mysql_query($borar,$conexion) or die (mysql_error());
			echo "<script>";
				echo "alert('evento borrado');";
				echo "var pag='../eventos';";
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