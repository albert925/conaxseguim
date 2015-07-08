<?php
	include '../config.php';
	include 'fecha_format.php';
	$a=$_POST['ca'];//id evento
	$b=$_POST['cb'];//id admin
	$c=$_POST['cc'];//texto comentario
	$hoy=date("Y-m-d");
	$forff=fechatraducearray($hoy);
	$datos_admin="SELECT * from administrador where id_admin=$b";
	$sql_admin=mysql_query($datos_admin,$conexion) or die (mysql_error());
	while ($dt=mysql_fetch_array($sql_admin)) {
		$correo=$dt['correo_adm'];
		$avatar=$dt['avatar_adm'];
		$tpad=$dt['tip_adm'];
	}
	if ($a=="" || $b=="" || $c=="") {
		echo " [1|error|$forff] ";
	}
	else{
		$ingresar="INSERT into comentario_evento(aut_id,text_cm,fec_cm,evet_id) 
			values($b,'$c','$hoy',$a)";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2|$avatar|$forff";
	}
?>