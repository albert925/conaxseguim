<?php
	include '../../config.php';
	$a=$_POST['a'];//dia habiles
	$b=$_POST['b'];//dia transcurridos
	$dH=date("d");
	$dbH=date("j");
	$mH=date("m");
	$mbH=date("n");
	$yH=date("Y");
	$fein=$yH."-".$mH."-00";
	$feff=$yH."-".$mH."-31";
	$hoy=$yH."-".$mH."-".$dH;
	if ($a=="" || $a=="0" || $b=="" || $b=="0") {
		echo "1";
	}
	else{
		$totalcomercial=0;
		$totalventas=0;
		$Sacar_comerciales="SELECT * from indicador 
				inner join administrador on(indicador.admin_id=administrador.id_admin) 
			where tipo_area='1' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_sacarcomer=mysql_query($Sacar_comerciales,$conexion) or die (mysql_error());
		while ($ra=mysql_fetch_array($sql_sacarcomer)) {
			$idIndaa=$ra['id_ind'];
			$adIndaa=$ra['admin_id'];
			$nmDInda=$ra['usuadmin'];
			//Sacar id direcionador
			$sac_direcionador="SELECT * from direcionador where del_admin='$adIndaa'";
			$sql_sacdirec=mysql_query($sac_direcionador,$conexion) or die (mysql_error());
			while ($rb=mysql_fetch_array($sql_sacdirec)) {
				$idDir=$rb['id_direcion'];
			}
			//sacar precio meta del direccionador
			$meta_direccionador="SELECT * from metab where direc_id=$idDir and year_mtB='$yH' and mes_mtb='$mbH'";
			$sql_metdirec=mysql_query($meta_direccionador,$conexion) or die (mysql_error());
			while ($rc=mysql_fetch_array($sql_metdirec)) {
				$idMTdr=$rc['id_metB'];
				$precTMTdr=$rc['precio_mtB'];
				$restTMTdr=$rc['restante_mtB'];
			}
			//sacar total ventas seguimiento
			$totsegu=0;
			$seguimiento="SELECT * from seguimiento where mes_in='$mH' and year_in='$yH' 
				and redirec_id=$idDir";
			$sql_seguim=mysql_query($seguimiento,$conexion) or die (mysql_error());
			while ($rd=mysql_fetch_array($sql_seguim)) {
				$caa=$rd['id_seguimineto'];
				$cab=$rd['nombre_plan'];
				$cad=$rd['name_empr'];
				$cae=$rd['descuento'];
				$caf=$rd['plan_id_seg'];
				$cam=$rd['redirec_id'];
				//precio plan
				$planes="SELECT * from  planes where id_plan=$caf";
				$sql_planes=mysql_query($planes,$conexion) or die (mysql_error());
				while ($re=mysql_fetch_array($sql_planes)) {
					$idPL=$re['id_plan'];
					$precPL=$re['precio_plan'];
				}
				$restasegui=$precPL-$cae;
				$totsegu=$restasegui+$totsegu;
			}
			$totalcomercial=$precTMTdr+$totalcomercial;
			$totalventas=$totsegu+$totalventas;
			$forA=number_format($precTMTdr,2);
			$forB=number_format($totsegu,2);
			//sacar porcentaje
			//$endecimalA=$totalcomercial/$precTMTdr;
			$endecimalA=$totsegu/$precTMTdr;
			$enporcentajeA=$endecimalA*100;
			$forD=number_format($endecimalA,2);
			if ($endecimalA<=74) {
				$sty="style='color:#FF3C3C;'";
			}
			else{
				if ($endecimalA>=75 && $endecimalA<=97) {
					$sty="style='color:#FAFF1E;'";
				}
				else{
					$sty="style='color:#00A5D4;'";
				}
			}
		}
		//porcentaje
		if ($totalcomercial==0) {
			$decimalmeta=0;
		}
		else{
			$decimalmeta=$totalventas/$totalcomercial;
		}
		$porecmeta=$decimalmeta*100;
		//dias habiles y transcurridos
		$pordias=($totalcomercial/$a)*$b;
		$meta_diaria=$totalcomercial/$a;
		//$porcentaje_dias=$porecmeta/$pordias;
		$porcentaje_dias=$pordias/$totalventas;
		//Sacar % comercial diseño
		$totalomerdis=$porcentaje_dias*0.7;
		$fors=number_format($totalomerdis,2);

		//diseñadores------------------------------------------------------------------
		$Sacar_dise="SELECT * from indicador 
					inner join administrador on(indicador.admin_id=administrador.id_admin) 
				where tipo_area='2' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_sacardise=mysql_query($Sacar_dise,$conexion) or die (mysql_error());
		while ($rk=mysql_fetch_array($sql_sacardise)) {
			$idIndcc=$rk['id_ind'];
			$adIndcc=$rk['admin_id'];
			$nmDIndcc=$rk['usuadmin'];
			$totIncc=$rk['tot_tareas'];
			$ejeIncc=$rk['ejecutadas_tareas'];
			$procIncc=$rk['proceso_tareas'];
			$pedIncc=$rk['pendiente_tareas'];
			$usporcIncc=$rk['porc_cada'];
			$arporIncc=$rk['porc_area'];
			$areIncc=$rk['tipo_area'];
			$fecIncc=$rk['fec_ind'];
			$convecienacc=$usporcIncc*100;
			$convecienbcc=$arporIncc*100;
			$unia=number_format($convecienacc,2);
			$areaa=number_format($convecienbcc,2);
		}
		//sacar numero maximo de porecentaje area diseño
		$maximodisearea="SELECT max(porc_area) as porc_area from indicador 
			where tipo_area='2' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_maxiomodise=mysql_query($maximodisearea,$conexion) or die (mysql_error());
		while ($rl=mysql_fetch_array($sql_maxiomodise)) {
			$areamaximodise=$rl['porc_area'];
		}
		//Total porcentaje de area+ comercial diseño
		$porcdisetotal=($areamaximodise*0.3)+$totalomerdis;
		$forr=number_format($porcdisetotal,2);
		if ($porcdisetotal<=74) {
			$styd="style='color:#FF3C3C;'";
		}
		else{
			if ($porcdisetotal>=75 && $porcdisetotal<=97) {
				$styd="style='color:#FAFF1E;'";
			}
			else{
				$styd="style='color:#00A5D4;'";
			}
		}
		//Mercadeo----------------------------------------------------------------------
		$Sacar_mercadeo="SELECT * from indicador 
					inner join administrador on(indicador.admin_id=administrador.id_admin) 
				where tipo_area='5' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_sacarmercade=mysql_query($Sacar_mercadeo,$conexion) or die (mysql_error());
		while ($rm=mysql_fetch_array($sql_sacarmercade)) {
			$idInddd=$rm['id_ind'];
			$adInddd=$rm['admin_id'];
			$nmDInddd=$rm['usuadmin'];
			$totIndd=$rm['tot_tareas'];
			$ejeIndd=$rm['ejecutadas_tareas'];
			$procIndd=$rm['proceso_tareas'];
			$pedIndd=$rm['pendiente_tareas'];
			$usporcIndd=$rm['porc_cada'];
			$arporIndd=$rm['porc_area'];
			$areIndd=$rm['tipo_area'];
			$fecIndd=$rm['fec_ind'];
			$convecienadd=$usporcIndd*100;
			$convecienbdd=$arporIndd*100;
			$unib=number_format($convecienadd,2);
			$areab=number_format($convecienbdd,2);
		}
		//sacar maximo de porcentaje de mercadeo
		$maximomercadarea="SELECT max(porc_area) as porc_area from indicador 
			where tipo_area='5' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_maxiomomercad=mysql_query($maximomercadarea,$conexion) or die (mysql_error());
		while ($rn=mysql_fetch_array($sql_maxiomomercad)) {
			$areamaximomercade=$rn['porc_area'];
		}
		//Total porcentaje de area+ comercial diseño
		$porcmercadtotal=(($areamaximomercade*100)*0.3)+$totalomerdis;
		$fort=number_format($porcmercadtotal,2);
		if ($porcmercadtotal<=74) {
			$stye="style='color:#FF3C3C;'";
		}
		else{
			if ($porcmercadtotal>=75 && $porcmercadtotal<=97) {
				$stye="style='color:#FAFF1E;'";
			}
			else{
				$stye="style='color:#00A5D4;'";
			}
		}
		//programacion------------------------------------------------------------------------------
		$Sacar_programacion="SELECT * from indicador 
					inner join administrador on(indicador.admin_id=administrador.id_admin) 
				where tipo_area='6' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_sacarmercade=mysql_query($Sacar_programacion,$conexion) or die (mysql_error());
		while ($ro=mysql_fetch_array($sql_sacarmercade)) {
			$idIndee=$ro['id_ind'];
			$adIndee=$ro['admin_id'];
			$nmDIndee=$ro['usuadmin'];
			$totInee=$ro['tot_tareas'];
			$ejeInee=$ro['ejecutadas_tareas'];
			$procInee=$ro['proceso_tareas'];
			$pedInee=$ro['pendiente_tareas'];
			$usporcInee=$ro['porc_cada'];
			$arporInee=$ro['porc_area'];
			$areInee=$ro['tipo_area'];
			$fecInee=$ro['fec_ind'];
			$convecienaee=$usporcInee*100;
			$convecienbee=$arporInee*100;
			$unic=number_format($convecienaee,2);
			$areac=number_format($convecienbee,2);
		}
		//sacar maximo de porcentaje de programacion
		$maximoprogramarea="SELECT max(porc_area) as porc_area from indicador 
			where tipo_area='6' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_maxiomoprogram=mysql_query($maximoprogramarea,$conexion) or die (mysql_error());
		while ($rp=mysql_fetch_array($sql_maxiomoprogram)) {
			$areamaximoprograme=$rp['porc_area'];
		}
		//Total porcentaje de area+ comercial programacion
		$porcprogramtotal=(($areamaximoprograme*100)*0.3)+$totalomerdis;
		$foru=number_format($porcprogramtotal,2);
		if ($porcprogramtotal<=74) {
			$styf="style='color:#FF3C3C;'";
		}
		else{
			if ($porcprogramtotal>=75 && $porcprogramtotal<=97) {
				$styf="style='color:#FAFF1E;'";
			}
			else{
				$styf="style='color:#00A5D4;'";
			}
		}
		//gerencia----------------------------------------------------------------------------------
		$Sacar_gerencia="SELECT * from indicador 
					inner join administrador on(indicador.admin_id=administrador.id_admin) 
				where tipo_area='4' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_gerencia=mysql_query($Sacar_gerencia,$conexion) or die (mysql_error());
		while ($rq=mysql_fetch_array($sql_gerencia)) {
			$idIndff=$rq['id_ind'];
			$adIndff=$rq['admin_id'];
			$nmDIndff=$rq['usuadmin'];
			$totInff=$rq['tot_tareas'];
			$ejeInff=$rq['ejecutadas_tareas'];
			$procInff=$rq['proceso_tareas'];
			$pedInff=$rq['pendiente_tareas'];
			$usporcInff=$rq['porc_cada'];
			$arporInff=$rq['porc_area'];
			$areInff=$rq['tipo_area'];
			$fecInff=$rq['fec_ind'];
			$convecienaff=$usporcInff*100;
			$convecienbff=$arporInff*100;
			$unid=number_format($convecienaff,2);
			$aread=number_format($convecienbff,2);
		}
		//sacar maximo de porcentaje de programacion
		$maximogerencarea="SELECT max(porc_area) as porc_area from indicador 
			where tipo_area='4' and fec_ind>='$fein' and fec_ind<='$feff'";
		$sql_maxiomogerenc=mysql_query($maximogerencarea,$conexion) or die (mysql_error());
		while ($rs=mysql_fetch_array($sql_maxiomogerenc)) {
			$areamaximogerence=$rs['porc_area'];
		}
		//Total porcentaje de area+ comercial gerencacion
		$porcgerenctotal=(($areamaximogerence*100)*0.3)+$totalomerdis;
		$forv=number_format($porcgerenctotal,2);
		if ($porcgerenctotal<=74) {
			$styg="style='color:#FF3C3C;'";
		}
		else{
			if ($porcgerenctotal>=75 && $porcgerenctotal<=97) {
				$styg="style='color:#FAFF1E;'";
			}
			else{
				$styg="style='color:#00A5D4;'";
			}
		}

		$porce_dise=$forr;
		$porce_merca=$fort;
		$porce_program=$foru;
		$porce_geren=$forv;
		$waa=number_format($pordias,2);
		$wbb=number_format($meta_diaria,2);
		$wcc=number_format($porcentaje_dias,2);//printf("%d",$porcentaje_dias);
		$wdd=number_format($totalomerdis,2);
		$wee=number_format($porce_dise,2);
		$wff=number_format($porce_merca,2);
		$wgg=number_format($porce_program,2);
		$whh=number_format($porce_geren,2);
		$wii=number_format($totalventas,2);
		echo $waa."/".$wbb."/".$wcc."/".$wdd."/".$wee."/".$wff."/".$wgg."/".$whh."/".$wii;
	}
?>