<?php
	include '../../config.php';
	$a=$_POST['ba'];//Fecha
	$b=$_POST['bb'];//Empresa
	$c=$_POST['bc'];//id Seguimiento
	$d=$_POST['bd'];//Valor
	if ($b=="0" || $b=="" || $c=="0" || $c=="") {
		echo "1";
	}
	else{
		$sarcarsaldo="SELECT * from seguimiento where id_seguimineto='$c'";
		$sql_saldo=mysql_query($sarcarsaldo,$conexion) or die (mysql_error());
		while ($sc=mysql_fetch_array($sql_saldo)) {
			$saldoO=$sc['saldo'];
		}
		if ($d=="") {
			$e=0;
		}
		else{
			$e=$d;
		}
		$resta=$saldoO-$e;
		$modificar_saldo="UPDATE seguimiento set saldo='$resta',fecabB='$a',abono2='$e' where id_seguimineto='$c'";
		mysql_query($modificar_saldo,$conexion) or die (mysql_error());
		$ingresar_nueva_tabla="INSERT into abonob(fecha_abono,id_plan_sg,clien_abono,valor_abono) 
			values('$a','$c','$b','$e')";
		mysql_query($ingresar_nueva_tabla,$conexion) or die (mysql_error());
		echo "2";
	}
?>