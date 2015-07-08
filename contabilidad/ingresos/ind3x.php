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
		$mesR=$_GET['ms'];
		$yarR=$_GET['ys'];
		if ($mesR=="") {
			echo "<script>";
				echo "alert('Mes No selecioando');";
				echo "var pag='../ingresos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$DH=date("d");
			$MH=date("m");
			$YH=date("Y");
			$fecha_uno=$yarR."-".$mesR."-00";
			$fecha_dos=$yarR."-".$mesR."-31";
			switch ($mesR) {
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
	<script src="../../js/ingreingresos.js"></script>
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
							<li><a href="../../contabilidad/pagos">Cuentas por Pagar</a></li>
							<li><a href="../../contabilidad/ingresos" class="selecionado">Ingresos</a></li>
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
		<h1>Ingresos Directos</h1>
		<h2><?php echo "$nombmes $yarR"; ?></h2>
		<article id="menub">
			<div id="nueva_ab">Agregar abono</div>
			<div id="nueva_bb">Agregar ingreso</div>
			<select id="mesabono">
				<?php
					for ($mS=0; $mS <=12 ; $mS++) {
						if ($mS==$mesR) {
							$selmes="selected";
						}
						else{
							$selmes="";
						}
						switch ($mS) {
							case '1':
								$nomSS="Enero";
								break;
							case '2':
								$nomSS="Febrero";
								break;
							case '3':
								$nomSS="Marzo";
								break;
							case '4':
								$nomSS="Abril";
								break;
							case '5':
								$nomSS="Mayo";
								break;
							case '6':
								$nomSS="Junio";
								break;
							case '7':
								$nomSS="Julio";
								break;
							case '8':
								$nomSS="Agosto";
								break;
							case '9':
								$nomSS="Septiembre";
								break;
							case '10':
								$nomSS="Octubre";
								break;
							case '11':
								$nomSS="Noviembre";
								break;
							case '12':
								$nomSS="Diciembre";
								break;
							default:
								$nomSS="Meses";
								break;
						}
				?>
				<option value="<?php echo $mS ?>" <?php echo $selmes ?>><?php echo "$nomSS"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="yearb">
				<option value="0">Años</option>
				<?php
					for ($Fcy=2014; $Fcy <=($YH+1) ; $Fcy++) {
						if ($Fcy==$yarR) {
							$selyear="selected";
						}
						else{
							$selyear="";
						}
				?>
				<option value="<?php echo $Fcy ?>" <?php echo $selyear ?>><?php echo "$Fcy"; ?></option>
				<?php
					}
				?>
			</select>
		</article>
		<article id="ag_bn" class="columfelx">
			<label><b>Fecha</b></label>
			<input type="date" id="feab" />
			<label><b>Cliente</b></label>
			<select id="emab">
				<option value="0">Empresa</option>
				<?php
					$emD="SELECT * from empresas order by name_empr asc";
					$sqemD=mysql_query($emD,$conexion) or die (mysql_error());
					while ($md=mysql_fetch_array($sqemD)) {
						$idEM=$md['id_empresa'];
						$namEM=$md['name_empr'];
				?>
				<option value="<?php echo $idEM ?>"><?php echo "$namEM"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Plan seguimiento</b></label>
			<div id="loadopt"></div>
			<select id="plsgab">
				<option value="0">Plan</option>
			</select>
			<label><b>Valor</b></label>
			<input type="number" id="valab" />
			<div id="rslab"></div>
			<input type="submit" value="Ingresar" id="nwab" class="botonstyle" />
		</article>
		<article id="ag_ind" class="columfelx">
			<label><b>Fecha</b></label>
			<input type="date" id="fecindire" placeholder="YYYY-MM-DD" />
			<label><b>Descripción</b></label>
			<textarea id="decrpindire"></textarea>
			<label><b>Terceros</b></label>
			<input type="text" id="terindire" placeholder="Escribir" />
				<label><b>Valor</b></label>
			<input type="number" id="valindire" />
			<div id="texidnirect"></div>
			<input type="submit" value="Ingresar" id="nuid" class="botonstyle" />
		</article>
		<article class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>#</b></td>
					<td><b>Fecha</b></td>
					<td><b>Descripción</b></td>
					<td><b>Tercero</b></td>
					<td><b>Valor</b></td>
					<td><b>Recibo</b></td>
				</tr>
				<?php
					$totalI=0;
					$colabono="SELECT * from abonob
							inner join empresas on(abonob.clien_abono=empresas.id_empresa) 
						where fecha_abono>='$fecha_uno' and fecha_abono<='$fecha_dos' 
						order by id_abono asc";
					$sqlabono=mysql_query($colabono,$conexion) or die (mysql_error());
					while ($abO=mysql_fetch_array($sqlabono)) {
						$idab=$abO['id_abono'];
						$fecab=$abO['fecha_abono'];
						$idSgab=$abO['id_plan_sg'];
						$idClab=$abO['clien_abono'];
						$empab=$abO['name_empr'];
						$valab=$abO['valor_abono'];
						$formvalab=number_format($valab,2);
						$bus_nam_plan="SELECT * from seguimiento 
								inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
							where id_seguimineto='$idSgab'";
						$sql_bus_plan=mysql_query($bus_nam_plan,$conexion) or die (mysql_error());
						while ($seR=mysql_fetch_array($sql_bus_plan)) {
							$namPLE=$seR['nombre_plan'];
						}
						$totalI=$valab+$totalI;
				?>
				<tr>
					<td><?php echo "$idab"; ?></td>
					<td><?php echo "$fecab"; ?></td>
					<td><?php echo "$namPLE"; ?></td>
					<td><?php echo "$empab"; ?></td>
					<td>$<?php echo "$formvalab"; ?></td>
					<td>
						<a href="rec_g_ypdf.php?ff=<?php echo $fecab ?>&mp=<?php echo $idClab ?>">Recibo de caja</a>
					</td>
				</tr>
				<?php
					}
					$fomattotalI=number_format($totalI,2);
				?>
				<tr id="titol">
					<td colspan="4"></td>
					<td><b>$<?php echo "$fomattotalI"; ?></b></td>
				</tr>
			</table>
		</article>
		<h1>Ingresos Indirectos</h1>
		<article class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>#</b></td>
					<td><b>Fecha</b></td>
					<td><b>Descripción</b></td>
					<td><b>Tercero</b></td>
					<td><b>Valor</b></td>
				</tr>
				<?php
					$toIN=0;
					$cloinidrecto="SELECT * from abonoc 
						where fecha_indirecto>='$fecha_uno' and fecha_indirecto<='$fecha_dos' 
						order by id_indirecto asc";
					$sql_inidrecto=mysql_query($cloinidrecto,$conexion) or die (mysql_error());
					while ($ind=mysql_fetch_array($sql_inidrecto)) {
						$idIN=$ind['id_indirecto'];
						$feIN=$ind['fecha_indirecto'];
						$terIN=$ind['terceros_indirecto'];
						$txtIN=$ind['descrip_indirecto'];
						$valIN=$ind['valor_indirecto'];
						$formtvalIn=number_format($valIN,2);
						$toIN=$valIN+$toIN;
				?>
				<tr>
					<td><?php echo "$idIN"; ?></td>
					<td><?php echo "$feIN"; ?></td>
					<td><?php echo "$txtIN"; ?></td>
					<td><?php echo "$terIN"; ?></td>
					<td><?php echo "$formtvalIn"; ?></td>
				</tr>
				<?php
					}
					$totalC=$totalI+$toIN;
					$fortIn=number_format($toIN);
					$fotmattotalC=number_format($totalC,2);
				?>
				<tr id="titol">
					<td colspan="4"></td>
					<td><b>$<?php echo "$fortIn"; ?></b></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>Total:</td>
					<td><b>$ <?php echo $fotmattotalC; ?></b></td>
				</tr>
			</table>
		</article>
		<!-- <article id="normalpagos" class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Año</b></td>
					<td><b>Mes</b></td>
					<td><b>Caja</b></td>
				</tr>
				<?php
					$maxyear="SELECT max(year_in) as year_in from seguimiento";
					$sqlmax=mysql_query($maxyear,$conexion) or die (mysql_error());
					while ($numeroyear=mysql_fetch_array($sqlmax)) {
						$maxyearc=$numeroyear['year_in'];
					}
					for ($k=2000; $k <=$maxyearc ; $k++) { 
							$suma=0;
						for ($j=1; $j <=12 ; $j++) { 
							$sumameses=0;
							$as="SELECT * from seguimiento where mes_in='$j' order by year_in asc";
							$sqlas=mysql_query($as,$conexion) or die (mysql_error());
							while ($rgas=mysql_fetch_array($sqlas)) {
								$idS=$rgas['id_seguimineto'];
								$mesS=$rgas['mes_in'];
								$yearS=$rgas['year_in'];
								$cae=$rgas['descuento'];
								$caf=$rgas['plan_id_seg'];
								$busplan="SELECT * from planes where id_plan='$caf'";
								$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
								while ($pl=mysql_fetch_array($sqlplan)) {
									$idPL=$pl['id_plan'];
									$namPL=$pl['nombre_plan'];
									$precPL=$pl['precio_plan'];
								}
								$cajaS=$precPL-$cae;
								$sumameses=$cajaS+$sumameses;
							}
							switch ($j) {
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
							if ($yearS==$k) {
								if ($mesS==$j) {
				?>
				<tr>
					<td><?php echo "$k"; ?></td>
					<td><a href="ver_mes.php?ms=<?php echo $j ?>"><?php echo "$nombmes"; ?></a></td>
					<td>$<?php echo "$sumameses"; ?></td>
				</tr>
				<?php
								}
								else{
									echo "";
								}
							}
							else{
								echo "";
							}
							$suma=$sumameses+$suma;
						}
					}
				?>
				<tr id="titol">
					<td colspan="2"></td>
					<td><b>$<?php echo "$suma"; ?></b></td>
				</tr>
			</table>
		</article>
		<article id="finfingresos" class="disentablasbusqsincroll"></article> -->
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
	}
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>