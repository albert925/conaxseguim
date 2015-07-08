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
		$DH=date("d");
		$MH=date("m");
		$YH=date("Y");
		switch ($MH) {
			case '1':
				$nombmes="Enero";
				break;
			case '2':
				$nombmes="Febrero";
				break;
			case '3':
				$nombmes="Marzo";
				break;
			case '4':
				$nombmes="Abril";
				break;
			case '5':
				$nombmes="Mayo";
				break;
			case '6':
				$nombmes="Junio";
				break;
			case '7':
				$nombmes="Julio";
				break;
			case '8':
				$nombmes="Agosto";
				break;
			case '9':
				$nombmes="Septiembre";
				break;
			case '10':
				$nombmes="Octubre";
				break;
			case '11':
				$nombmes="Noviembre";
				break;
			case '12':
				$nombmes="Diciembre";
				break;
			default:
				$nombmes="Meses";
				break;
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../../imagenes/logo.png" />
	<title>Contabilidad</title>
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/menu.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/ingrepagosd.js"></script>
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
						<a href="../../contabilidad" class="selecionado">Contabilidad</a>
						<div class="submen" data-num="1"><span class="icon-ctrl"></span></div>
						<ul class="children1">
							<li><a href="../../contabilidad/pendiente">Cuentas por Cobrar</a></li>
							<li><a href="../../contabilidad/pagos" class="selecionado">Cuentas por Pagar</a></li>
							<li><a href="../../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../../contabilidad/cajas">Caja</a></li>
						</ul>
					</li>
					<li>
						<a href="../../tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../../tareas/indicador">Indicadores</a></li>
							<li><a href="../../tareas/indicadorTotal">Indicador total</a></li>
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
		<h1>Pagos de <?php echo "$nombmes"; ?></h1>
		<article id="menub">
			<div id="Aterc">Agregar Terceros</div>
			<div id="Atepag">Agregar Pagos</div>
			<div id="Vepag">Ver Pagos</div>
			<div id="Veterc">Ver Terceros</div>
			<div id="PagosDirec">Direcionador</div>
			<div id="Domin">Dominios</div>
			<select name="mesbP" id="mesbP">
				<option value="0">Mes</option>
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
			<select id="yearPago">
				<?php
					for ($Yfr=2014; $Yfr <=($YH+1) ; $Yfr++) {
				?>
				<option value="<?php echo $Yfr ?>"><?php echo "$Yfr"; ?></option>
				<?php
					}
				?>
			</select>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<h2>Gastos Fijos</h2>
			<article class="miniventana">
				<a href="#" class="closep">Ocultar</a>
				<div class="verterceros"></div>
			</article>
			<?php
				$suma=0;
			?>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Id</b></td>
					<td><b>Fecha</b></td>
					<td><b>Concepto</b></td>
					<td><b>Terceros</b></td>
					<td><b>Valor</b></td>
					<td><b>estado</b></td>
					<td><b>Ingresado o modificado por</b></td>
					<td><b>Modificar</b></td>
				</tr>
			<?php
				$dia_hoy=$YH."-".$MH."-".$DH;
				$mes_in=$YH."-".$MH."-1";
				$mes_fin=$YH."-".$MH."-31";
				$mysqlver="SELECT pagos.id_pago, pagos.terceros_id,pagos.fecha_p,
					pagos.valor_p,pagos.concepto_p,pagos.estado_p,pagos.idadP,
					terceros.id_tercer,terceros.nomb_terc,
					administrador.id_admin,administrador.usuadmin 
					from pagos 
						inner join terceros on(pagos.terceros_id=terceros.id_tercer) 
						inner join administrador on(pagos.idadP=administrador.id_admin) 
					where fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='1' 
					order by pagos.fecha_p,pagos.id_pago asc ";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$idP=$ps['id_pago'];
					$idtercP=$ps['terceros_id'];
					$namterP=$ps['nomb_terc'];
					$idadminP=$ps['idadP'];
					$nombadminP=$ps['usuadmin'];
					$fecP=$ps['fecha_p'];
					$valP=$ps['valor_p'];
					$conP=$ps['concepto_p'];
					$estP=$ps['estado_p'];
					if ($estP=="1") {
						$colores="style='color:#FF3C3C;'";
					}
					else{
						$colores="";
					}
					$suma=$valP+$suma;
			?>
				<tr>
					<td><b><?php echo "$idP"; ?></b></td>
					<td><?php echo "$fecP"; ?></td>
					<td><span <?php echo $colores ?>><?php echo "$conP"; ?></span></td>
					<td>
						<a href="#" class="verter" data-ter="<?php echo $idtercP ?>">
							<?php echo "$namterP"; ?>
						</a>
					</td>
					<td>$<?php $kaD=number_format($valP,2); echo "$kaD"; ?></td>
					<td>
						<select id="estp_<?php echo $idP ?>" class="cambiP" data-admn="<?php echo $idad ?>" data-id="<?php echo $idP ?>">
							<?php
								for ($x=0; $x <=2 ; $x++) { 
									if ($x==$estP) {
										$xx="selected";
									}
									else{
										$xx="";
									}
									switch ($x) {
										case '0':
											$xxx="Estado Pago";
											break;
										case '1':
											$xxx="Pendiente";
											break;
										case '2':
											$xxx="Pagado";
											break;
										default:
											$xxx="Error";
											break;
									}
							?>
							<option value="<?php echo $x ?>" <?php echo $xx ?>><?php echo "$xxx"; ?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td><?php echo "$nombadminP"; ?></td>
					<td>
						<a href="modifcacionpagos.php?idpg=<?php echo $idP ?>" id="yell">Modificar</a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr id="titol">
					<td colspan="4"></td>
					<td><b>$<?php $fotSa=number_format($suma,2); echo "$fotSa"; ?></b></td>
					<td colspan="3"></td>
				</tr>
				<?php
					$ksum=0;
					$csum=0;
					$ktrlotal="SELECT * from pagos where estado_p='2' and fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='1'";
					$swrlotal=mysql_query($ktrlotal,$conexion) or die (mysql_error());
					while ($llx=mysql_fetch_array($swrlotal)) {
						$precioa=$llx['valor_p'];
						$ksum=$precioa+$ksum;
					}
					$cslotal="SELECT * from pagos where estado_p='1' and fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='1'";
					$sftllotal=mysql_query($cslotal,$conexion) or die (mysql_error());
					while ($jjc=mysql_fetch_array($sftllotal)) {
						$preciob=$jjc['valor_p'];
						$csum=$preciob+$csum;
					}
				?>
				<tr>
					<td colspan="3"></td>
					<td><b>Pagado</b></td>
					<td>$<?php $ktitdA=number_format($ksum,2); echo "$ktitdA"; ?></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td><b>Pendiente</b></td>
					<td>$<?php $ktitdB=number_format($csum,2); echo "$ktitdB"; ?></td>
					<td colspan="3"></td>
				</tr>
			</table>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<h2>Gastos Variables</h2>
			<?php
				$suma_B=0;
			?>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Id</b></td>
					<td><b>Fecha</b></td>
					<td><b>Concepto</b></td>
					<td><b>Terceros</b></td>
					<td><b>Valor</b></td>
					<td><b>estado</b></td>
					<td><b>Ingresado o modificado por</b></td>
					<td><b>Modificar</b></td>
				</tr>
			<?php
				$mysqlver_B="SELECT pagos.id_pago, pagos.terceros_id,pagos.fecha_p,
					pagos.valor_p,pagos.concepto_p,pagos.estado_p,pagos.idadP,
					terceros.id_tercer,terceros.nomb_terc,
					administrador.id_admin,administrador.usuadmin 
					from pagos 
						inner join terceros on(pagos.terceros_id=terceros.id_tercer) 
						inner join administrador on(pagos.idadP=administrador.id_admin) 
					where fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='2' 
					order by pagos.fecha_p,pagos.id_pago asc ";
				$sql_B=mysql_query($mysqlver_B,$conexion) or die (mysql_error());
				while ($ps_B=mysql_fetch_array($sql_B)) {
					$idP_B=$ps_B['id_pago'];
					$idtercP_B=$ps_B['terceros_id'];
					$namterP_B=$ps_B['nomb_terc'];
					$idadminP=$ps_B['idadP'];
					$nombadminP_B=$ps_B['usuadmin'];
					$fecP_B=$ps_B['fecha_p'];
					$valP_B=$ps_B['valor_p'];
					$conP_B=$ps_B['concepto_p'];
					$estP_B=$ps_B['estado_p'];
					if ($estP_B=="1") {
						$colores_B="style='color:#FF3C3C;'";
					}
					else{
						$colores_B="";
					}
					$suma_B=$valP_B+$suma_B;
			?>
				<tr>
					<td><b><?php echo "$idP_B"; ?></b></td>
					<td><?php echo "$fecP_B"; ?></td>
					<td><span <?php echo $colores_B ?>><?php echo "$conP_B"; ?></span></td>
					<td>
						<a href="#" class="verter" data-ter="<?php echo $idtercP_B ?>">
							<?php echo "$namterP_B"; ?>
						</a>
					</td>
					<td>$<?php $kaU=number_format($valP_B); echo "$kaU"; ?></td>
					<td>
						<select id="estp_<?php echo $idP_B ?>" class="cambiP" data-admn="<?php echo $idad ?>" data-id="<?php echo $idP_B ?>">
							<?php
								for ($x_B=0; $x_B <=2 ; $x_B++) { 
									if ($x_B==$estP_B) {
										$xx_B="selected";
									}
									else{
										$xx_B="";
									}
									switch ($x_B) {
										case '0':
											$xxx_B="Estado Pago";
											break;
										case '1':
											$xxx_B="Pendiente";
											break;
										case '2':
											$xxx_B="Pagado";
											break;
										default:
											$xxx_B="Error";
											break;
									}
							?>
							<option value="<?php echo $x_B ?>" <?php echo $xx_B ?>><?php echo "$xxx_B"; ?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td><?php echo "$nombadminP_B"; ?></td>
					<td>
						<a href="modifcacionpagos.php?idpg=<?php echo $idP_B ?>" id="yell">Modificar</a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr id="titol">
					<td colspan="4"></td>
					<td><b>$<?php $udmaBBf=number_format($suma_B,2); echo "$udmaBBf"; ?></b></td>
					<td colspan="3"></td>
				</tr>
				<?php
					$ksum_B=0;
					$csum_B=0;
					$ktrlotal_B="SELECT * from pagos where estado_p='2' and fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='2'";
					$swrlotal_B=mysql_query($ktrlotal_B,$conexion) or die (mysql_error());
					while ($llx_B=mysql_fetch_array($swrlotal_B)) {
						$precioa_B=$llx_B['valor_p'];
						$ksum_B=$precioa_B+$ksum_B;
					}
					$cslotal_B="SELECT * from pagos where estado_p='1' and fecha_p>='$mes_in' and fecha_p<='$mes_fin' and tipo_pago='2'";
					$sftllotal_B=mysql_query($cslotal_B,$conexion) or die (mysql_error());
					while ($jjc_B=mysql_fetch_array($sftllotal_B)) {
						$preciob_B=$jjc_B['valor_p'];
						$csum_B=$preciob_B+$csum_B;
					}
				?>
				<tr>
					<td colspan="3"></td>
					<td><b>Pagado</b></td>
					<td>$<?php $pagypen=number_format($ksum_B,2); echo "$pagypen"; ?></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td><b>Pendiente</b></td>
					<td>$<?php $pagypendos=number_format($csum_B,2); echo "$pagypendos"; ?></td>
					<td colspan="3"></td>
				</tr>
			</table>
		</article>
		<article>
			<br />
			<span>
				<b>Total:</b> 
				<b style="color:#00A5D4;">
					$<?php $genTl=$suma+$suma_B; $formatA=number_format($genTl,2); echo "$formatA"; ?>
				</b>
			</span>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<h2>Costos</h2>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Id</b></td>
					<td><b>Fecha</b></td>
					<td><b>Concepto</b></td>
					<td><b>Terceros</b></td>
					<td><b>Valor</b></td>
					<td><b>estado</b></td>
					<td><b>Ingresado o modificado por</b></td>
					<td><b>Modificar</b></td>
				</tr>
				<?php
					$cosSuma=0;
					$feincos=$YH."-".$MH."-1";
					$fefincos=$YH."-".$MH."-31";
					$costV="SELECT * from costos where fecha_cos>='$feincos' and fecha_cos<='$fefincos' 
						order by fecha_cos,id_cos asc";
					$sql_cost=mysql_query($costV,$conexion) or die (mysql_error());
					while ($CS=mysql_fetch_array($sql_cost)) {
						$idCS=$CS['id_cos'];
						$nmblac=$CS['nam_blanc'];
						$idProveCS=$CS['terc_prov_id'];
						$pcCS=$CS['valor_cos'];
						$estCS=$CS['estad_cost'];
						$adidCS=$CS['idadP_cost'];
						$fecCS=$CS['fecha_cos'];
						$cosSuma=$pcCS+$cosSuma;
						if ($estCS=="1") {
							$colores_costos="style='color:#FF3C3C;'";
						}
						else{
							$colores_costos="";
						}
						$proveJOin="SELECT * from proveedores where id_proveedor='$idProveCS'";
						$sql_proverjoin=mysql_query($proveJOin,$conexion) or die (mysql_error());
						while ($Jpv=mysql_fetch_array($sql_proverjoin)) {
							$napvCS=$Jpv['name_prove'];
							$precRCS=$Jpv['precio'];
						}
				?>
				<tr>
					<td><b><?php echo "$idCS"; ?></b></td>
					<td><?php echo "$fecCS"; ?></td>
					<td><?php echo "$nmblac"; ?></td>
					<td><span <?php echo $colores_costos ?>><?php echo "$napvCS"; ?></span></td>
					<td>
						$<?php $formatvalCS=number_format($pcCS,2);echo "$formatvalCS"; ?>
					</td>
					<td>
						<select id="estpvU_<?php echo $idCS ?>" class="cambiUu" data-admn="<?php echo $idad ?>" data-id="<?php echo $idCS ?>">
							<?php
								for ($x_C=0; $x_C <=2 ; $x_C++) { 
									if ($x_C==$estCS) {
										$xx_C="selected";
									}
									else{
										$xx_C="";
									}
									switch ($x_C) {
										case '0':
											$xxx_C="Estado Pago";
											break;
										case '1':
											$xxx_C="Pendiente";
											break;
										case '2':
											$xxx_C="Pagado";
											break;
										default:
											$xxx_C="Error";
											break;
									}
							?>
							<option value="<?php echo $x_C ?>" <?php echo $xx_C ?>><?php echo "$xxx_C"; ?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td>
						<?php
							$amFU="SELECT * from administrador where id_admin='$adidCS'";
							$sql_amfU=mysql_query($amFU,$conexion) or die (mysql_error());
							while ($dad=mysql_fetch_array($sql_amfU)) {
								$namadmCS=$dad['usuadmin'];
							}
							echo "$namadmCS"; 
						?>
					</td>
					<td>
						<a href="cos_modif.php?cs=<?php echo $idCS ?>">Modificar</a>
					</td>
				</tr>
				<?php
					}
					$coA=0;
					$coB=0;
					$pendiC="SELECT * from costos where estad_cost='1' and fecha_cos>='$feincos' and fecha_cos<='$fefincos'";
					$pagadC="SELECT * from costos where estad_cost='2' and fecha_cos>='$feincos' and fecha_cos<='$fefincos'";
					$sql_ped=mysql_query($pendiC,$conexion) or die (mysql_error());
					$sql_pag=mysql_query($pagadC,$conexion) or die (mysql_query());
					while ($htC=mysql_fetch_array($sql_ped)) {
						$vcPe=$htC['valor_cos'];
						$coA=$vcPe+$coA;
					}
					while ($jtc=mysql_fetch_array($sql_pag)) {
						$vcPa=$jtc['valor_cos'];
						$coB=$vcPa+$coB;
					}
					$fprA=number_format($coA,2);
					$fprB=number_format($coB,2);
				?>
				<tr id="titol">
					<td colspan="4"></td>
					<td><b>$<?php $forcstot=number_format($cosSuma,2); echo "$forcstot"; ?></b></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"><b>Pagado</b></td>
					<td>$<?php echo "$fprB"; ?></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"><b>Pendiente</b></td>
					<td>$<?php echo "$fprA"; ?></td>
					<td colspan="3"></td>
				</tr>
			</table>
			<?php
				$totalTS=$suma+$suma_B+$cosSuma;
				$toTC=number_format($totalTS,2);
			?>
			<h2>Total</h2>
			<table>
				<tr>
					<td><b>$<?php echo "$toTC"; ?></b></td>
				</tr>
			</table>
		</article>
		<article id="finfechaspagos" class="disentablasbusqsincroll">
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