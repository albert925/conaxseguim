<?php
	include '../config.php';
	$a=$_POST['a'];//mes un digito
	$b=$_POST['b'];//mes dos digitos
	$c=$_POST['c'];//año
	function sumarmes($fechatarea)
	{
		$nuevafecha=strtotime("+1 month", strtotime($fechatarea));
		$nuevafecha=date("Y-m-d", $nuevafecha);
		return $nuevafecha;
	}
	if ($a=="" || $a=="0" || $b=="" || $b=="0" || $c=="") {
		echo "mes o año en blanco";
	}
	else{
		$mesin=$c."-".$b."-01";
		$mesfn=$c."-".$b."-31";
		$buscar_tarea="SELECT * from tareas 
			where esta_tar<'3' and fechain_tar>='$mesin' and fechain_tar<='$mesfn'";
		$sql_tareas=mysql_query($buscar_tarea,$conexion) or die (mysql_error());
		$numerotarea=mysql_num_rows($sql_tareas);
		if ($numerotarea>0) {
			while ($tr=mysql_fetch_array($sql_tareas)) {
				$idT=$tr['id_tarea'];
				$plidT=$tr['segui_id'];
				$residT=$tr['admin_id'];
				$tareT=$tr['tare_nam'];
				$fiT=$tr['fechain_tar'];
				$ffT=$tr['fechafin_tar'];
				$arT=$tr['area_tarea'];
				$hyT=$tr['fecha_ing'];
				$TxT=$tr['descrip_tarea'];
				$esdT=$tr['esta_tar'];
				$sumarfecha=sumarmes($fiT);
				$modificar_tarea_fecha="UPDATE tareas set fechain_tar='$sumarfecha' where id_tarea=$idT";
				mysql_query($modificar_tarea_fecha,$conexion) or die (mysql_error());
			}
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>