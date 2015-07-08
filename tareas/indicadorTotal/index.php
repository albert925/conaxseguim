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
		$dH=date("d");
		$dbH=date("j");
		$mH=date("m");
		$mbH=date("n");
		$yH=date("Y");
		$fein=$yH."-".$mH."-00";
		$feff=$yH."-".$mH."-31";
		$hoy=$yH."-".$mH."-".$dH;
		$nommeses=["Meses","Enero","Febrero","Marzo","Abril",
			"Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
		$arrarea=["seleccione","Comercial","Diseño","financiero","Gerencia","Mercadeo","Programación"];
		//base datos cartera
		$sacar_cartera="SELECT * from cartera_indicador where fec_cart>='$fein' and fec_cart<='$feff'";
		$sql_carsa=mysql_query($sacar_cartera,$conexion) or die (mysql_error());
		$numerocartera=mysql_num_rows($sql_carsa);
		if ($numerocartera>0) {
			while ($uy=mysql_fetch_array($sql_carsa)) {
				$id_cart=$uy['id_cart'];
				$cartnumerob=$uy['numerb_cart'];
				$nudsinf=$uy['numerd_cart'];
				$nua=$uy['numero_cart'];
				$nub=number_format($uy['numerb_cart'],2);
				$nuc=number_format($uy['numerc_cart'],2);
				$nud=number_format($uy['numerd_cart'],2);
				$nue=number_format($uy['numere_cart'],2);
			}
		}
		else{
			$id_cart=0;
			$nua=0;
			$nub=0;
			$nuc=0;
			$nud=0;
			$nue=0;
		}
		$convernuecCC=$nue;
		//color cartera
		if ($nue<=74) {
				$stycart="style='color:#FF3C3C;'";
			}
			else{
				if ($nue>=75 && $nue<=97) {
					$stycart="style='color:#FAFF1E;'";
				}
				else{
					$stycart="style='color:#00A5D4;'";
				}
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../../imagenes/logo.png" />
	<title>Tareas</title>
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/menu.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/indicador.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../../administrador">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../../administrador/clientes">Clientes</a></li>
							<li><a href="../../administrador/direcionador">Direcionador</a></li>
							<li><a href="../../administrador/planes">Planes</a></li>
							<li><a href="../../administrador/proveedores">Proveedores</a></li>
							<li><a href="../../administrador/sectores">Sectores</a></li>
						</ul>
					</li>
					<li>
						<a href="../../contabilidad">Contabilidad</a>
						<div class="submen" data-num="1"><span class="icon-ctrl"></span></div>
						<ul class="children1">
							<li><a href="../../contabilidad/pendiente">Cuentas por Cobrar</a></li>
							<li><a href="../../contabilidad/pagos">Cuentas por Pagar</a></li>
							<li><a href="../../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../../contabilidad/cajas">Caja</a></li>
						</ul>
					</li>
					<li>
						<a href="../../tareas" class="selecionado">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../../tareas/indicador">Indicadores</a></li>
							<li><a href="../../tareas/indicadorTotal" class="selecionado">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../../comercial">Comercial</a></li>
					<li><a href="../../clientes">Clientes</a></li>
					<li><a href="../../eventos">Eventos</a></li>
					<li><a href="../../cerrar">Salir</a></li>
				</ul>
			</nav>
			<div id="mn_mov"><span class="icon-menu"></span></div>
			<div id="ifmorver" class="veradmD">
				<?php 
					// echo "$usuariounico";
					$imagenadv="../../".$avatar;
				?>
				<figure style="background-image:url(<?php echo $imagenadv ?>);">
					<!--Imagen-->
				</figure>
			</div>
		</article>
		<div class="botnomenu">
			<center><img src="../../imagenes/abajo_b.png" alt="abajo" /></center>
		</div>
	</header><!-- /header -->
	<section>
		<h1>Indicador Total de <?php echo $nommeses[$mbH]." ".$yH; ?></h1>
		<article id="dtetar">
			<article>
				<select id="mesBcc">
					<?php
						for ($mmb=0; $mmb <=12 ; $mmb++) { 
					?>
					<option value="<?php echo $mmb ?>"><?php echo $nommeses[$mmb]; ?></option>
					<?php
						}
					?>
				</select>
				<select id="yearBcc">
					<?php
						for ($yyB=2014; $yyB <=($yH+1) ; $yyB++) {
							if ($yyB==$yH) {
								$selyear="selected";
							}
							else{
								$selyear="";
							}
					?>
					<option value="<?php echo $yyB ?>" <?php echo $selyear ?>><?php echo "$yyB"; ?></option>
					<?php
						}
					?>
				</select>
			</article>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="5"><b><?php echo $arrarea[1]; ?></b></td>
				</tr>
				<tr>
					<td><b>Asesor</b></td>
					<td><b>Meta</b></td>
					<td><b>Ventas</b></td>
					<td><b>%</b></td>
				</tr>
				<?php
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
						$forD=number_format($enporcentajeA,2);
						if ($enporcentajeA<=74) {
							$sty="style='color:#FF3C3C;'";
						}
						else{
							if ($enporcentajeA>=75 && $enporcentajeA<=97) {
								$sty="style='color:#FAFF1E;'";
							}
							else{
								$sty="style='color:#00A5D4;'";
							}
						}
				?>
				<tr>
					<td><b><?php echo "$nmDInda"; ?></b></td>
					<td>$<?php echo "$forA"; ?></td>
					<td>$<?php echo "$forB"; ?></td>
					<td><span <?php echo $sty ?>><?php echo "$forD"; ?>%</span></td>
				</tr>
				<?php
					}
					//echo "$totalventas/$totalcomercial";
					if ($totalcomercial==0) {
						$decimalmeta=0;
					}
					else{
						$decimalmeta=$totalventas/$totalcomercial;
					}
					$porecmeta=$decimalmeta*100;
					$forC=number_format($totalcomercial,2);
					$forE=number_format($totalventas,2);
					$foF=number_format($porecmeta,2);
					if ($porecmeta<=74) {
						$styb="style='color:#FF3C3C;'";
					}
					else{
						if ($porecmeta>=75 && $porecmeta<=97) {
							$styb="style='color:#FAFF1E;'";
						}
						else{
							$styb="style='color:#00A5D4;'";
						}
					}
					//Sacar % comercial diseño
					$totalomerdis=$porecmeta*0.7;
					$fors=number_format($totalomerdis,2);
				?>
				<tr>
					<td><b>Total</b></td>
					<td>$<?php echo "$forC"; ?></td>
					<td>$<?php echo "$forE"; ?></td>
					<td><pan <?php echo $styb ?>><?php echo "$foF"; ?>%</pan></td>
				</tr>
			</table>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<?php
				//Sacar total pagos fijos y variables estado pagado
				$totalpagos=0;
				$T_cuentas_pagar="SELECT * from pagos where fecha_p>='$fein' and fecha_p<='$feff' 
					and estado_p='2'";
				$sql_pagos=mysql_query($T_cuentas_pagar,$conexion) or die (mysql_error());
				while ($rf=mysql_fetch_array($sql_pagos)) {
					$idP=$rf['id_pago'];
					$valP=$rf['valor_p'];
					$totalpagos=$valP+$totalpagos;
				}
				$forF=number_format($totalpagos,2);
				//Total pagos fijos y varables sin estado
				$totpgse=10000000;
				$difern=$totalpagos-$totpgse;
				$forg=number_format($totpgse,2);
				$forh=number_format($difern,2);
				//total de ingresos por mes
				$totingrasoA=0;
				$todosingresosA="SELECT * from abonob where fecha_abono>='$fein' and fecha_abono<='$feff'";
				$sql_todoingresoA=mysql_query($todosingresosA,$conexion) or die (mysql_error());
				while ($rh=mysql_fetch_array($sql_todoingresoA)) {
					$idab=$rh['id_abono'];
					$valab=$rh['valor_abono'];
					$totingrasoA=$valab+$totingrasoA;
				}
				$totingrasoB=0;
				$todosingresosB="SELECT * from abonoc where fecha_indirecto>='$fein' and fecha_indirecto<='$feff'";
				$sql_todoingresoB=mysql_query($todosingresosB,$conexion) or die (mysql_error());
				while ($ri=mysql_fetch_array($sql_todoingresoB)) {
					$idIN=$ri['id_indirecto'];
					$valIN=$ri['valor_indirecto'];
					$totingrasoB=$valIN+$totingrasoB;
				}
				//suma de los dos cuadros de abonob y aboonoc
				$totalingresos=$totingrasoA+$totingrasoB;
				$forj=number_format($totalingresos,2);
				//Total cuentas por cobrar * mes (total metas comercia * 0.4);
				$cu_cbr=$totalcomercial*0.4;
				$fori=number_format($cu_cbr,2);
				//Suma de $cu_br+ total de ingresos
				$diferencia_cobros=$cu_cbr+$totalingresos;
				$fork=number_format($diferencia_cobros,2);
				//Total cobros estado pagado
				//Total de pagado de fila 2 / diferencia de fila 2
				$decimpagdivdief=$totalingresos/$cartnumerob;
				$porcendiv=number_format($decimpagdivdief*100,2);
			?>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="7"><b><?php echo $arrarea[3]; ?></b></td>
				</tr>
				<tr>
					<td><b>Rubro</b></td>
					<td><b>Meta</b></td>
					<td><b>Diferencia</b></td>
					<td><b>Pagado</b></td>
					<td><b>%</b></td>
					<td colspan="2">Porcentajes</td>
				</tr>
				<tr>
					<td>Cuentas por pagar</td>
					<td>$<?php echo "$forg"; ?></td>
					<td>$<?php echo "$forh"; ?></td>
					<td>$<?php echo "$forF"; ?></td>
					<td>
						<?php
							if ($difern>=1000000) {
								$jaj=0;
							}
							else{
								$jaj=($difern*1)/1000000;
							}
							$forl=number_format($jaj,2);
							echo "$forl";
						?>%
					</td>
					<td>0.15</td>
					<td>
						<?php
							$porcTotpagos=$jaj*0.15;
							$forn=number_format($porcTotpagos,2);
							echo "$forn";
						?>%
					</td>
				</tr>
				<tr>
					<td>Cuentas x cobrar por mes</td>
					<td>$<?php echo "$fori"; ?></td>
					<td rowspan="2">$<div id="ccol"><?php echo "$nub"; ?></div><!--<?php echo "$fork"; ?> --></td>
					<td rowspan="2">$<?php echo "$forj"; ?></td>
					<td rowspan="2"><div id="acol"><?php echo "$porcendiv"; ?></div>%</td>
					<td rowspan="2">0.7</td>
					<td rowspan="2"><div id="bcol"><?php echo "$nud"; ?></div>%</td>
				</tr>
				<tr>
					<td>Cartera (ingresos)</td>
					<td>
						<input type="number" id="pagadocobrar" value="<?php echo $nua ?>" data-tocomercial="<?php echo $cu_cbr ?>" style="padding:0;" />
					</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendientes</b></td>
					<td colspan="2">%</td>
				</tr>
				<?php
					$sumotropor=0;
					$Sacar_financiero="SELECT * from indicador 
							inner join administrador on(indicador.admin_id=administrador.id_admin) 
						where tipo_area='3' and fec_ind>='$fein' and fec_ind<='$feff'";
					$sql_sacarfoner=mysql_query($Sacar_financiero,$conexion) or die (mysql_error());
					while ($rj=mysql_fetch_array($sql_sacarfoner)) {
						$idIndbb=$rj['id_ind'];
						$adIndbb=$rj['admin_id'];
						$nmDIndb=$rj['usuadmin'];
						$totInbb=$rj['tot_tareas'];
						$ejeInbb=$rj['ejecutadas_tareas'];
						$procInbb=$rj['proceso_tareas'];
						$pedInbb=$rj['pendiente_tareas'];
						$usporcInbb=$rj['porc_cada'];
						$arporInbb=$rj['porc_area'];
						$areInbb=$rj['tipo_area'];
						$fecInbb=$rj['fec_ind'];
						$otropor=$arporInbb*0.15;
						$conveciena=$usporcInbb*100;
						$convecienb=$otropor*100;
						$foro=number_format($conveciena,2);
						$forp=number_format($convecienb,2);
						$sumotropor=$otropor+$sumotropor;
				?>
				<tr>
					<td><?php echo "$nmDIndb"; ?></td>
					<td><?php echo "$totInbb"; ?></td>
					<td><?php echo "$ejeInbb"; ?></td>
					<td><?php echo "$procInbb"; ?></td>
					<td><?php echo "$pedInbb"; ?></td>
					<td><?php echo "$foro"; ?></td>
					<td><?php echo "$forp"; ?></td>
				</tr>
				<?php
					}
					$totporcetanjecaja=$porcTotpagos+0+$sumotropor;
					$forq=number_format($totporcetanjecaja,2);
					if ($totporcetanjecaja<=74) {
						$styc="style='color:#FF3C3C;'";
					}
					else{
						if ($totporcetanjecaja>=75 && $totporcetanjecaja<=97) {
							$styc="style='color:#FAFF1E;'";
						}
						else{
							$styc="style='color:#00A5D4;'";
						}
					}
				?>
				<tr>
					<td colspan="5"></td>
					<td colspan="2">
						<span id="totalfinc" <?php echo $stycart //$styc ?>>$<?php echo "$convernuecCC"; //$forq ?></span>%
					</td>
				</tr>
			</table>
			<div id="ucltoprecioA" data-pagos="<?php echo $porcTotpagos ?>" 
				data-area="<?php echo $sumotropor ?>" data-ingresos="<?php echo $totalingresos ?>" 
				data-nub="<?php echo $cartnumerob ?>" data-finacniero="<?php echo $suma_de_tres_finaciero ?>">
			</div>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="7"><b><?php echo $arrarea[2]; ?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Comercial</b></td>
					<td><b>Meta</b></td>
					<td><b>Ventas</b></td>
					<td><b>%</b></td>
					<td colspan="2"><b>%</b></td>
				</tr>
				<tr>
					<td colspan="2">Conaxport</td>
					<td><?php echo "$forC";?></td>
					<td><?php echo "$forE"; ?></td>
					<td><?php echo "$foF"; ?>%</td>
					<td>70%</td>
					<td><?php echo "$fors"; ?>%</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendientes</b></td>
					<td colspan="2">%</td>
				</tr>
				<?php
					$sumaareadise=0;
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
				?>
				<tr>
					<td><?php echo "$nmDIndcc"; ?></td>
					<td><?php echo "$totIncc"; ?></td>
					<td><?php echo "$ejeIncc"; ?></td>
					<td><?php echo "$procIncc"; ?></td>
					<td><?php echo "$pedIncc"; ?></td>
					<td><?php echo "$unia"; ?>%</td>
					<td><?php echo "$areaa"; ?>%</td>
				</tr>
				<?php
					}
					//sacar numero maximo de porecentaje area diseño
					$maximodisearea="SELECT max(porc_area) as porc_area from indicador 
						where tipo_area='2' and fec_ind>='$fein' and fec_ind<='$feff'";
					$sql_maxiomodise=mysql_query($maximodisearea,$conexion) or die (mysql_error());
					while ($rl=mysql_fetch_array($sql_maxiomodise)) {
						$areamaximodise=$rl['porc_area'];
					}
					//Total porcentaje de area+ comercial diseño
					$porcdisetotal=(($areamaximodise*100)*0.3)+$totalomerdis;
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
				?>
				<tr>
					<td colspan="5"></td>
					<td colspan="2">
						<span id="cola" <?php echo $styd ?>>$<?php echo "$forr";?>%</span>
					</td>
				</tr>
			</table>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="7"><b><?php echo $arrarea[5]; ?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Comercial</b></td>
					<td><b>Meta</b></td>
					<td><b>Ventas</b></td>
					<td><b>%</b></td>
					<td colspan="2"><b>%</b></td>
				</tr>
				<tr>
					<td colspan="2">Conaxport</td>
					<td><?php echo "$forC";?></td>
					<td><?php echo "$forE"; ?></td>
					<td><?php echo "$foF"; ?>%</td>
					<td>70%</td>
					<td><?php echo "$fors"; ?>%</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendientes</b></td>
					<td colspan="2">%</td>
				</tr>
				<?php
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
				?>
				<tr>
					<td><?php echo "$nmDInddd"; ?></td>
					<td><?php echo "$totIndd"; ?></td>
					<td><?php echo "$ejeIndd"; ?></td>
					<td><?php echo "$procIndd"; ?></td>
					<td><?php echo "$pedIndd"; ?></td>
					<td><?php echo "$unib"; ?>%</td>
					<td><?php echo "$areab"; ?>%</td>
				</tr>
				<?php
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
				?>
				<tr>
					<td colspan="5"></td>
					<td colspan="2">
						<span id="colb" <?php echo $stye ?>>$<?php echo "$fort";?>%</span>
					</td>
				</tr>
			</table>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="7"><b><?php echo $arrarea[6]; ?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Comercial</b></td>
					<td><b>Meta</b></td>
					<td><b>Ventas</b></td>
					<td><b>%</b></td>
					<td colspan="2"><b>%</b></td>
				</tr>
				<tr>
					<td colspan="2">Conaxport</td>
					<td><?php echo "$forC";?></td>
					<td><?php echo "$forE"; ?></td>
					<td><?php echo "$foF"; ?>%</td>
					<td>70%</td>
					<td><?php echo "$fors"; ?>%</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendientes</b></td>
					<td colspan="2">%</td>
				</tr>
				<?php
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
				?>
				<tr>
					<td><?php echo "$nmDIndee"; ?></td>
					<td><?php echo "$totInee"; ?></td>
					<td><?php echo "$ejeInee"; ?></td>
					<td><?php echo "$procInee"; ?></td>
					<td><?php echo "$pedInee"; ?></td>
					<td><?php echo "$unic"; ?>%</td>
					<td><?php echo "$areac"; ?>%</td>
				</tr>
				<?php
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
				?>
				<tr>
					<td colspan="5"></td>
					<td colspan="2">
						<span id="colc" <?php echo $styf ?>>$<?php echo "$foru";?>%</span>
					</td>
				</tr>
			</table>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="7"><b><?php echo $arrarea[4]; ?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Comercial</b></td>
					<td><b>Meta</b></td>
					<td><b>Ventas</b></td>
					<td><b>%</b></td>
					<td colspan="2"><b>%</b></td>
				</tr>
				<tr>
					<td colspan="2">Conaxport</td>
					<td><?php echo "$forC";?></td>
					<td><?php echo "$forE"; ?></td>
					<td><?php echo "$foF"; ?>%</td>
					<td>70%</td>
					<td><?php echo "$fors"; ?>%</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendientes</b></td>
					<td colspan="2">%</td>
				</tr>
				<?php
					$Sacar_gerencia="SELECT * from indicador 
								inner join administrador on(indicador.admin_id=administrador.id_admin) 
							where tipo_area='4' and fec_ind>='$fein' and fec_ind<='$feff'";
					$sql_sacargerencia=mysql_query($Sacar_gerencia,$conexion) or die (mysql_error());
					while ($rq=mysql_fetch_array($sql_sacargerencia)) {
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
				?>
				<tr>
					<td><?php echo "$nmDIndff"; ?></td>
					<td><?php echo "$totInff"; ?></td>
					<td><?php echo "$ejeInff"; ?></td>
					<td><?php echo "$procInff"; ?></td>
					<td><?php echo "$pedInff"; ?></td>
					<td><?php echo "$unid"; ?>%</td>
					<td><?php echo "$aread"; ?>%</td>
				</tr>
				<?php
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
				?>
				<tr>
					<td colspan="5"></td>
					<td colspan="2">
						<span id="cold" <?php echo $styg ?>>$<?php echo "$forv";?>%</span>
					</td>
				</tr>
			</table>
		</article>
		<article class="cajasidnica" id="sinscroll">
			<?php
				//Dias total metas (comercial);
				$dia_comercila=$totalcomercial/1;
				$forw=number_format($dia_comercila,2);
			?>
			<table border="1">
				<tr>
					<td rowspan="2">$<?php echo "$forC"; ?></td>
					<td><b>Dias Hab.</b></td>
					<td>
						<input type="number" id="habdi" min="0" max="31" style="padding:0;width:3em;" />
					</td>
					<td rowspan="2"><b>Meta diaria</b></td>
					<td rowspan="2">$<span id="cja"><?php echo "$forw"; ?></span></td>
				</tr>
				<tr>
					<td><b>Dias Tras.</b></td>
					<td>
						<input type="number" id="trasdi" min="0" max="31" style="padding:0;width:3em;" />
						<div id="cargador"></div>
					</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="2">Datos del equipo</td>
					<td>Deberiamos Estar</td>
					<td>Estamos</td>
					<td></td>
				</tr>
				<tr>
					<td>$<span id="cjb"></span></td>
					<td>$<span id="cjc"></span></td>
					<td><span id="cjd"></span></td>
				</tr>
			</table>
		</article>
	</section>
	<footer>
		<article id="margen">
			<p>
				Pie de página
			</p>
		</article>
	</footer>
</body>
</html>
<?php
	}
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>