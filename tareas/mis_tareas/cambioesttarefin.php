<?php
	include '../../config.php';
	$idR=$_POST['idE'];
	$estado=$_POST['tipo'];
	$idrAdm=$_POST['adm'];
	$areaR=$_POST['ar'];
	$dH=date("d");
	$dbH=date("j");
	$mH=date("m");
	$mbH=date("n");
	$yH=date("Y");
	$fein=$yH."-".$mH."-00";
	$feff=$yH."-".$mH."-31";
	$hoy=$yH."-".$mH."-".$dH;
	$mes_in=$yH."-".$mH."-01";
	$mes_fin=$yH."-".$mH."-31";
	if ($idR=="" || $estado=="0" || $estado=="" || $areaR=="") {
		echo "1";
	}
	else{
		$modifcarestado="UPDATE tareas set esta_tar='$estado' where id_tarea='$idR'";
		mysql_query($modifcarestado,$conexion) or die (mysql_error());
		//tareas por persona y fecha
		$total_Tareas="SELECT * from tareas where admin_id=$idrAdm and area_tarea='$areaR' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$pendiente_Tareas="SELECT * from tareas where admin_id=$idrAdm and area_tarea='$areaR' and esta_tar='1' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$enproceso_Tareas="SELECT * from tareas where admin_id=$idrAdm and area_tarea='$areaR' and esta_tar='2' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$terminado_Tareas="SELECT * from tareas where admin_id=$idrAdm and area_tarea='$areaR' and esta_tar='3' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$sql_to_tar=mysql_query($total_Tareas,$conexion) or die (mysql_error());
		$sql_pend_tar=mysql_query($pendiente_Tareas,$conexion) or die (mysql_error());
		$sql_term_tar=mysql_query($terminado_Tareas,$conexion) or die (mysql_error());
		$sql_proceso_tar=mysql_query($enproceso_Tareas,$conexion) or die (mysql_error());
		$numetarA=mysql_num_rows($sql_to_tar);
		$numetarB=mysql_num_rows($sql_pend_tar);
		$numetarC=mysql_num_rows($sql_term_tar);
		$numetarD=mysql_num_rows($sql_proceso_tar);
		//tareas por area y fecha
		$total_Tareas_b="SELECT * from tareas where area_tarea='$areaR' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$pendiente_Tareas_b="SELECT * from tareas where area_tarea='$areaR' and esta_tar='1' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$enproceso_Tareas_b="SELECT * from tareas where area_tarea='$areaR' and esta_tar='2' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$terminado_Tareas_b="SELECT * from tareas where area_tarea='$areaR' and esta_tar='3' and fechain_tar>='$fein' and fechain_tar<='$feff'";
		$sql_to_tar_b=mysql_query($total_Tareas_b,$conexion) or die (mysql_error());
		$sql_pend_tar_b=mysql_query($pendiente_Tareas_b,$conexion) or die (mysql_error());
		$sql_term_tar_b=mysql_query($terminado_Tareas_b,$conexion) or die (mysql_error());
		$sql_proceso_tar_b=mysql_query($enproceso_Tareas_b,$conexion) or die (mysql_error());
		$numA=mysql_num_rows($sql_to_tar_b);
		$numB=mysql_num_rows($sql_pend_tar_b);
		$numC=mysql_num_rows($sql_term_tar_b);
		$numD=mysql_num_rows($sql_proceso_tar_b);
		//calculo %
			//Por persona
			$ppor_persona=$numetarC/$numetarA;
			//por area
			$ppor_area=$numC/$numA;
		//-------db indicador
		$dbindic="SELECT * from indicador where admin_id=$idrAdm and tipo_area='$areaR' and fec_ind>='$mes_in' and fec_ind<='$mes_fin'";
		$sql_indicador=mysql_query($dbindic,$conexion) or die (mysql_error());
		$numeroindcador=mysql_num_rows($sql_indicador);
		if ($numeroindcador>0) {
			while ($ind=mysql_fetch_array($sql_indicador)) {
				$idid=$ind['id_ind'];
			}
			$modifindicador="UPDATE indicador set tot_tareas='$numetarA',ejecutadas_tareas='$numetarC',
				proceso_tareas='$numetarD',pendiente_tareas='$numetarB',porc_cada=$ppor_persona,
				porc_area=$ppor_area where id_ind=$idid";
			mysql_query($modifindicador,$conexion) or die (mysql_error());
		}
		else{
			$ingresar="INSERT into indicador(admin_id,tot_tareas,ejecutadas_tareas,proceso_tareas,
				pendiente_tareas,porc_cada,porc_area,tipo_area,fec_ind) 
				values($idrAdm,'$numetarA','$numetarC','$numetarD',
					'$numetarB',$ppor_persona,$ppor_area,'$areaR','$mes_in')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
		}
		echo "2";
	}
?>