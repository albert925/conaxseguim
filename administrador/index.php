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
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Seguimiento</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingresegimientosd.js"></script>
	<script src="../js/busquedas.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../administrador" class="selecionado">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../administrador/clientes">Clientes</a></li>
							<li><a href="../administrador/direcionador">Direcionador</a></li>
							<li><a href="../administrador/planes">Planes</a></li>
							<li><a href="../administrador/proveedores">Proveedores</a></li>
							<li><a href="../administrador/sectores">Sectores</a></li>
						</ul>
					</li>
					<li>
						<a href="../contabilidad">Contabilidad</a>
						<div class="submen" data-num="1"><span class="icon-ctrl"></span></div>
						<ul class="children1">
							<li><a href="../contabilidad/pendiente">Cuentas por Cobrar</a></li>
							<li><a href="../contabilidad/pagos">Cuentas por Pagar</a></li>
							<li><a href="../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../contabilidad/cajas">Caja</a></li>
						</ul>
					</li>
					<li>
						<a href="../tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../tareas/indicador">Indicadores</a></li>
							<li><a href="../tareas/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../comercial">Comercial</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
				</ul>
				<!--a href="clientes">Clientes</a>
				<a href="direcionador">Direcionador</a>
				<a href="planes">Planes</a>
				<a href="proveedores">Proveedores</a>
				<a href="sectores">Sectores</a>
				<a href="../cerrar">Salir</a-->
			</nav>
			<div id="mn_mov"><span class="icon-menu"></span></div>
			<div id="ifmorver" class="veradmC">
				<?php 
					// echo "$usuariounico";
					$imagenadv="../".$avatar;
				?>
				<figure style="background-image:url(<?php echo $imagenadv ?>);">
					<!--Imagen-->
				</figure>
			</div>
		</article>
		<div class="botnomenu">
			<center><img src="../imagenes/abajo_b.png" alt="abajo" /></center>
		</div>
	</header><!-- /header -->
	<section>
		<h1>Seguimiento</h1>
		<article id="menub">
			<div id="Vsgub">Ver Seguimiento</div>
			<div id="Agseg">Agregar Seguimiento</div>
			<div id="Busseg">Busqueda Seguimiento</div>
			<select id="mespor">
				<option value="0">Mese Inicio</option>
				<option value="01">Enero</option>
				<option value="02">Febrero</option>
				<option value="03">Marzo</option>
				<option value="04">Abril</option>
				<option value="05">Mayo</option>
				<option value="06">Junio</option>
				<option value="07">Julio</option>
				<option value="08">Agosto</option>
				<option value="09">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
			<select id="yerpor">
				<?php
					$YH=date("Y");
					for ($Yfr=2014; $Yfr <=($YH+1) ; $Yfr++) {
				?>
				<option value="<?php echo $Yfr ?>"><?php echo "$Yfr"; ?></option>
				<?php
					}
				?>
			</select>
		</article>
		<article class="miniventana">
			<a href="#" class="closep">Ocultar</a>
			<h2>Información</h2>
			<div id="datosf"></div>
		</article>
		<article id="vertables">
			<div id="mensreopvedesv"></div>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<!-- <tr id="fila_fix">
					<td><b>Fecha</b></td>
					<td><b>Empresa</b></td>
					<td><b>Plan</b></td>
					<td><b>Prec. Plan</b></td>
					<td><b>Desc. Max 5%</b></td>
					<td><b>Abono 1</b></td>
					<td><b>Fecha 1</b></td>
					<td><b>Estado 1</b></td>
					<td><b>Abono 2</b></td>
					<td><b>Fecha 2</b></td>
					<td><b>Estado 2</b></td>
					<td><b>Abono 3</b></td>
					<td><b>Fecha 3</b></td>
					<td><b>Estado 3</b></td>
					<td><b>Saldo</b></td>
					<td><b>En caja</b></td>
					<td><b>Fecha Inicio Plan</b></td>
					<td><b>Fecha Fin Plan</b></td>
					<td><b>Estado Plan</b></td>
					<td><b>Redirecionador</b></td>
					<td><b>Valor Red.</b></td>
					<td><b>Estado Direcionador</b></td>
					<td><b>Insumos</b></td>
					<td><b>Estado Insumo</b></td>
					<td><b>Proveedor</b></td>
					<td><b>Precio Porveedor</b></td>
					<td><b>Estado Proveedor</b></td>
					<td><b>Dominio</b></td>
					<td><b>Ftp</b></td>
					<td><b>Usuario</b></td>
					<td><b>Contraseña</b></td>
					<td><b>Fecha Renovacion</b></td>
					<td colspan="2"><b>Correo</b></td>
					<td colspan="2"><b>Facebook</b></td>
					<td colspan="2"><b>Instagram</b></td>
					<td colspan="2"><b>Pinters</b></td>
					<td colspan="2"><b>Likind</b></td>
					<td colspan="2"><b>Twitter</b></td>
					<td><b>Modificar</b></td>
					<td><b>Borrar</b></td>
				</tr> -->
				<tr>
					<td><b>Fecha</b></td>
					<td><b>Empresa</b></td>
					<td><b>Plan</b></td>
					<td><b>Prec. Plan</b></td>
					<td><b>Desc. Max 5%</b></td>
					<td><b>Abono</b></td>
					<!-- <td><b>Fecha 1</b></td>
					<td><b>Estado 1</b></td>
					<td><b>Abono 2</b></td>
					<td><b>Fecha 2</b></td>
					<td><b>Estado 2</b></td>
					<td><b>Abono 3</b></td>
					<td><b>Fecha 3</b></td>
					<td><b>Estado 3</b></td> -->
					<td><b>Saldo</b></td>
					<!-- <td><b>En caja</b></td> -->
					<td><b>Fecha Inicio Plan</b></td>
					<td><b>Fecha Fin Plan</b></td>
					<!-- <td><b>Estado Plan</b></td> -->
					<td><b>Redirecionador</b></td>
					<td><b>Valor Red.</b></td>
					<!-- <td><b>Estado Direcionador</b></td> -->
					<!-- <td><b>Insumos</b></td>
					<td><b>Estado Insumo</b></td> -->
					<td><b>Proveedor</b></td>
					<td><b>Precio Porveedor</b></td>
					<td><b>Estado Proveedor</b></td>
					<td><b>Dominio</b></td>
					<td><b>Ftp</b></td>
					<td><b>Usuario</b></td>
					<td><b>Contraseña</b></td>
					<td><b>Fecha Renovacion</b></td>
					<td colspan="2"><b>Correo</b></td>
					<td colspan="2"><b>Facebook</b></td>
					<td colspan="2"><b>Instagram</b></td>
					<td colspan="2"><b>Pinters</b></td>
					<td colspan="2"><b>Likind</b></td>
					<td colspan="2"><b>Twitter</b></td>
					<td colspan="3"><b>Administrador</b></td>
					<td><b>Modificar</b></td>
					<td><b>Borrar</b></td>
				</tr>
			<?php
				$sumA=0;
				$sumB=0;
				$sumC=0;
				$sumD=0;
				$sumE=0;
				$sumF=0;
				$sumG=0;
				$sumH=0;
				$sumI=0;
				$sumJ=0;
				$numerms=0;
				$mysqlver="SELECT * from seguimiento order by fecha_ingreso asc ";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$caa=$ps['id_seguimineto'];
					$cab=$ps['empre_id_seg'];
					$cac=$ps['plan_id_seg'];
					$cad=$ps['descuento'];
					$cae=$ps['abono1'];
					$caf=$ps['abono2'];
					$cag=$ps['abono3'];
					$cah=$ps['saldo'];
					$cai=$ps['en_caja'];
					$caj=$ps['fi_plan'];
					$cak=$ps['ff_plan'];
					$cal=$ps['estad_plan'];
					$cam=$ps['redirec_id'];
					$can=$ps['valor_p_dire'];
					$cao=$ps['insumos'];
					$cap=$ps['estado_insumo'];
					$caq=$ps['id_provee'];
					$car=$ps['precio_t_prove'];
					$cas=$ps['dominio'];
					$cat=$ps['ftp'];
					$cau=$ps['usuario'];
					$cav=$ps['pass_usuario_dm'];
					$caw=$ps['fech_r'];
					$cax=$ps['correo_correo'];
					$cay=$ps['pass_correo'];
					$caz=$ps['usuario_face'];
					$cba=$ps['pass_face'];
					$cbb=$ps['usuario_inst'];
					$cbc=$ps['pass_inst'];
					$cbd=$ps['usuario_pinters'];
					$cbe=$ps['pass_pinters'];
					$cbf=$ps['usuario_likind'];
					$cbg=$ps['pass_likind'];
					$cbh=$ps['usuario_twitter'];
					$cbi=$ps['pass_twitter'];
					$cbj=$ps['fecha_ingreso'];
					$cbk=$ps['estado_pag_dire'];
					$cbl=$ps['fecabA'];
					$cbm=$ps['fecabB'];
					$cbn=$ps['fecabC'];
					$cbo=$ps['estdA'];
					$cbp=$ps['estdB'];
					$cbq=$ps['estdC'];
					$cbr=$ps['estad_prove'];
					$cbs=$ps['mes_in'];
					$cbt=$ps['link_adm'];
					$cbu=$ps['us_adm'];
					$cbv=$ps['pass_adm'];
					if ($numerms!=$cbs) {
						switch ($cbs) {
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
								$nombmes="Error";
								break;
						}
						echo "<tr><td colspan='46' style='background: #00A5D4;color: #F7F7F7;font-weight: bold;'>$nombmes</td></tr>";
					}
					$numerms=$cbs;
			?>
			<tr>
				<td><?php echo "$cbj"; ?></td>
				<td>
					<?php
						$busnamemp="SELECT * from empresas where id_empresa='$cab'";
						$sqlPa=mysql_query($busnamemp,$conexion) or die (mysql_error());
						while ($ep=mysql_fetch_array($sqlPa)) {
							$idEP=$ep['id_empresa'];
							$naEP=$ep['name_empr'];
						}
					?>
					<a href="#" class="emprver" data-id="<?php echo $idEP ?>"><?php echo "$naEP"; ?></a>
				</td>
				<td>
					<?php
						$busplan="SELECT * from planes where id_plan='$cac'";
						$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
						while ($pl=mysql_fetch_array($sqlplan)) {
							$idPL=$pl['id_plan'];
							$namPL=$pl['nombre_plan'];
							$precPL=$pl['precio_plan'];
						}
					?>
					<a href="#" class="verplan" data-id="<?php echo $idPL ?>"><?php echo "$namPL"; ?></a>
				</td>
				<td>$<?php echo "$precPL"; ?></td>
				<td>$<?php echo "$cad"; ?></td>
				<td>$<?php echo "$cae"; ?></td>
				<!-- <td><?php echo "$cbl"; ?></td>
				<td>
					<select id="modifEsA_<?php echo $caa ?>" class="esdoA" data-kl="<?php echo $caa ?>">
						<?php
							for ($eeA=0; $eeA <=2 ; $eeA++) { 
								if ($eeA==$cbo) {
									$nomasmodA="selected";
								}
								else{
									$nomasmodA="";
								}
								switch ($eeA) {
									case '0':
								$av="Estado Abono 1";
								break;
								case '1':
									$av="Pendiente";
									break;
								case '2':
									$av="Pagado";
									break;
								default:
									$av="Error";
									break;
								}
						?>
						<option value="<?php echo $eeA ?>" <?php echo $nomasmodA ?>><?php echo "$av"; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td>$<?php echo "$caf"; ?></td>
				<td><?php echo "$cbm"; ?></td>
				<td>
					<select id="modifEsB_<?php echo $caa ?>" class="esdoB" data-kl="<?php echo $caa ?>">
						<?php
							for ($eeB=0; $eeB <=2 ; $eeB++) { 
								if ($eeB==$cbp) {
									$nomasmodB="selected";
								}
								else{
									$nomasmodB="";
								}
								switch ($eeB) {
									case '0':
									$bv="Estado Abono 2";
									break;
								case '1':
									$bv="Pendiente";
									break;
								case '2':
									$bv="Pagado";
									break;
								default:
									$bv="Error";
									break;
								}
						?>
						<option value="<?php echo $eeB ?>" <?php echo $nomasmodB ?>><?php echo "$bv"; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td>$<?php echo "$cag"; ?></td>
				<td><?php echo "$cbn"; ?></td>
				<td>
					<select id="modifEsC_<?php echo $caa ?>" class="esdoC" data-kl="<?php echo $caa ?>">
						<?php
							for ($eeC=0; $eeC <=2 ; $eeC++) { 
								if ($eeC==$cbq) {
									$nomasmodC="selected";
								}
								else{
									$nomasmodC="";
								}
								switch ($eeC) {
									case '0':
									$cv="Estado Abono 3";
									break;
								case '1':
									$cv="Pendiente";
									break;
								case '2':
									$cv="Pagado";
									break;
								default:
									$cv="Error";
									break;
								}
						?>
						<option value="<?php echo $eeC ?>" <?php echo $nomasmodC ?>><?php echo "$cv"; ?></option>
						<?php
							}
						?>
					</select>
				</td> -->
				<td>$<?php echo "$cah"; ?></td>
				<!-- <td>$<?php echo "$cai"; ?></td> -->
				<td><?php echo "$caj"; ?></td>
				<td><?php echo "$cak"; ?></td>
				<!-- <td>
					<select class="plaES" id="as_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
						<?php
							for ($x=0; $x <=3 ; $x++) { 
								if ($x==$cal) {
									$xx="selected";
								}
								else{
									$xx="";
								}
								switch ($x) {
									case '0':
										$ox="Estado del plan";
										break;
									case '1':
										$ox="En proceso";
										break;
									case '2':
										$ox="Terminado";
										break;
									case '3':
										$ox="Cancelado";
										break;
									default:
										$ox="Terminado";
										break;
								}
						?>
						<option value="<?php echo $x ?>" <?php echo $xx ?>><?php echo "$ox"; ?></option>
						<?php
							}
						?>
					</select>
				</td> -->
				<td>
					<?php
						$redireV="SELECT * from direcionador where id_direcion='$cam'";
						$sqlredi=mysql_query($redireV,$conexion) or die (mysql_error());
						while ($dr=mysql_fetch_array($sqlredi)) {
							$idDR=$dr['id_direcion'];
							$naDR=$dr['nam_direcion'];
						}
						echo "$naDR";
					?>
				</td>
				<td>$<?php echo "$can"; ?></td>
				<!-- <td>
					<select class="EDR" id="bs_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
						<?php
							for ($y=0; $y <=3 ; $y++) { 
								if ($y==$cbk) {
									$yy="selected";
								}
								else{
									$yy="";
								}
								switch ($y) {
									case '0':
										$oy="Estado Redirecionador";
										break;
									case '1':
										$oy="Proceso";
										break;
									case '2':
										$oy="Pagado";
										break;
									case '3':
										$oy="Pendiente";
										break;
									default:
										$oy="Error";
										break;
								}
						?>
						<option value="<?php echo $y ?>" <?php echo $yy ?>><?php echo "$oy"; ?></option>
						<?php
							}
						?>
					</select>
				</td> -->
				<!-- <td>$<?php echo "$cao"; ?></td>
				<td>
					<select class="EIUS" id="cs_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
						<?php
							for ($z=0; $z <=3 ; $z++) { 
								if ($z==$cap) {
									$zz="selected";
								}
								else{
									$zz="";
								}
								switch ($z) {
									case '0':
										$oz="Estado Insumos";
										break;
									case '1':
										$oz="Proceso";
										break;
									case '2':
										$oz="Pagado";
										break;
									case '3':
										$oz="Cancelado";
										break;
									default:
										$oz="Error";
										break;
								}
						?>
						<option value="<?php echo $z ?>" <?php echo $zz ?>><?php echo "$oz"; ?></option>
						<?php
							}
						?>
					</select>
				</td> -->
				<td>
					<?php
						$provever="SELECT * from proveedores where id_proveedor='$caq'";
						$sqlprove=mysql_query($provever,$conexion) or die (mysql_error());
						while ($pv=mysql_fetch_array($sqlprove)) {
							$idPV=$pv['id_proveedor'];
							$naPV=$pv['name_prove'];
						}
					?>
					<?php echo "$naPV"; ?>
				</td>
				<td>$<?php echo "$car"; ?></td>
				<td>
					<select id="espov_<?php echo $caa ?>" class="pisestdos" data-idpv="<?php echo $caa ?>">
						<?php
							for ($h=0; $h <=2 ; $h++) { 
								if ($h==$cbr) {
									$akh="selected";
								}
								else{
									$akh="";
								}
								switch ($h) {
									case '0':
										$hhh="Estado Proveedor";
										break;
									case '1':
										$hhh="Pendiente";
										break;
									case '2':
										$hhh="Pagado";
										break;
									default:
										$hhh="error";
										break;
								}
						?>
						<option value="<?php echo $h ?>" <?php echo $akh ?>><?php echo "$hhh"; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><?php echo "$cas"; ?></td>
				<td><?php echo "$cat"; ?></td>
				<td><?php echo "$cau"; ?></td>
				<td><?php echo "$cav"; ?></td>
				<td><?php echo "$caw"; ?></td>
				<td><?php echo "$cax"; ?></td>
				<td><?php echo "$cay"; ?></td>
				<td><?php echo "$caz"; ?></td>
				<td><?php echo "$cba"; ?></td>
				<td><?php echo "$cbb"; ?></td>
				<td><?php echo "$cbc"; ?></td>
				<td><?php echo "$cbd"; ?></td>
				<td><?php echo "$cbe"; ?></td>
				<td><?php echo "$cbf"; ?></td>
				<td><?php echo "$cbg"; ?></td>
				<td><?php echo "$cbh"; ?></td>
				<td><?php echo "$cbi"; ?></td>
				<td><?php echo "$cbt"; ?></td>
				<td><?php echo "$cbu"; ?></td>
				<td><?php echo "$cbv"; ?></td>
				<td>
					<a href="modifcarsegidat.php?idSEG=<?php echo $caa ?>" id="yell">Modificar</a>
				</td>
				<td>
					<a href="borrarsegu.php?idBrse=<?php echo $caa ?>" id="yell" class="deli">Borrar</a>
				</td>
			</tr>
			<?php
					$sumA=$precPL+$sumA;
					$sumB=$cad+$sumB;
					$sumC=$cae+$sumC;
					$sumD=$caf+$sumD;
					$sumE=$cag+$sumE;
					$sumF=$cah+$sumF;
					$sumG=$cai+$sumG;
					$sumH=$can+$sumH;
					$sumI=$cao+$sumI;
					$sumJ=$car+$sumJ;
				}
			?>
				<tr id="titol">
					<td colspan="3"></td>
					<td><b>$<?php $fsA=number_format($sumA); echo "$fsA"; ?></b></td>
					<td><b>$<?php echo "$sumB"; ?></b></td>
					<td></td>
					<!-- <td><b>$<?php echo "$sumC"; ?></b></td>
					<td colspan="2"></td>
					<td><b>$<?php echo "$sumD"; ?></b></td>
					<td colspan="2"></td>
					<td><b>$<?php echo "$sumE"; ?></b></td>
					<td colspan="2"></td> -->
					<!-- <td><b>$<?php echo "$sumF"; ?></b></td>
					<td><b>$<?php echo "$sumG"; ?></b></td> -->
					<td colspan="4"></td>
					<td><b>$<?php echo "$sumH"; ?></b></td>
					<td></td>
					<!-- <td><b>$<?php echo "$sumI"; ?></b></td> -->
					<td><b>$<?php echo "$sumJ"; ?></b></td>
					<td colspan="19"></td>
				</tr>
			</table>
		</article>
		<article id="filtro" class="disentablasbusq"></article>
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
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>