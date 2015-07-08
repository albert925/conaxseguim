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
		$yearR=$_GET['ya'];
		if ($mesR=="" || $yearR=="") {
			echo "<script>";
				echo "alert('Mes No selecioando');";
				echo "var pag='../cajas';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$DH=date("d");
			$MH=date("m");
			$YH=date("Y");
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
			$dia_hoy=$YH."-".$MH."-".$DH;
			$mes_in=$yearR."-".$mesR."-01";
			$mes_fin=$yearR."-".$mesR."-31";
			$MA=$mesR-1;
			if ($MA==0 || $MA<0) {
				$MR=12;
				$YA=$yearR-1;
			}
			else{
				$MR=$MA;
				$YA=$yearR;
			}
			$mes_in_a=$YA."-".$MR."-1";
			$mes_fin_a=$YA."-".$MR."-31";
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
	<script src="../../js/caja.js"></script>
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
							<li><a href="../../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../../contabilidad/cajas" class="selecionado">Caja</a></li>
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
		<hgroup>
			<h1>Caja</h1>
			<h2><?php echo "$nombmes $yearR"; ?></h2>
		</hgroup>
		<article id="menub">
			<div id="cajaTot">Ver todo</div>
			<select id="mesacaja">
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
								$nomSS="Error";
								break;
						}
				?>
				<option value="<?php echo $mS ?>" <?php echo $selmes ?>><?php echo "$nomSS"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="yearcaja">
				<?php
					for ($Fcy=2014; $Fcy <=($YH+1) ; $Fcy++) {
						if ($Fcy==$yearR) {
							$sel_year="selected";
						}
						else{
							$sel_year="";
						}
				?>
				<option value="<?php echo $Fcy ?>" <?php echo $sel_year ?>><?php echo "$Fcy"; ?></option>
				<?php
					}
				?>
			</select>
			<!-- <select name="mesbP" id="mesbP">
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
			<select id="yearb">
				<option value="0">Años</option>
				<?php
					for ($j=00; $j <=50 ; $j++) { 
						if ($j<10) {
							$number="200".$j;
						}
						else{
							$number="20".$j;
						}
				?>
					<option value="<?php echo $number ?>"><?php echo "$number"; ?></option>
				<?php
					}
				?>
			</select> -->
		</article>
		<?php
			//abonos-----------------
			$KtoA=0;
			$ingresAnum="SELECT * from abonob where fecha_abono>='$mes_in' 
				and fecha_abono<='$mes_fin'";
			$sqlingreA=mysql_query($ingresAnum,$conexion) or die (mysql_error());
			while ($gl=mysql_fetch_array($sqlingreA)) {
				$idab=$gl['id_abono'];
				$idSgab=$gl['id_plan_sg'];
				$valab=$gl['valor_abono'];
				$KtoA=$valab+$KtoA;
			}
			$forGA=number_format($KtoA,2);
			$KtoB=0;
			$ingresBnum="SELECT * from abonoc where fecha_indirecto>='$mes_in' 
				and fecha_indirecto<='$mes_fin'";
			$sqlingreB=mysql_query($ingresBnum,$conexion) or die (mysql_error());
			while ($hl=mysql_fetch_array($sqlingreB)) {
				$idIN=$hl['id_indirecto'];
				$valIN=$hl['valor_indirecto'];
				$KtoB=$valIN+$KtoB;
			}
			$forGB=number_format($KtoB,2);
			$TotF=$KtoA+$KtoB;
			//Pagos y costos-----------------------
			$kpgT=0;
			$KcsT=0;
			$pagarD="SELECT * from pagos where estado_p='2' and fecha_p>='$mes_in' and fecha_p<='$mes_fin'";
			$sqlpagar=mysql_query($pagarD,$conexion) or die (mysql_error());
			while ($il=mysql_fetch_array($sqlpagar)) {
				$idP=$il['id_pago'];
				$valP=$il['valor_p'];
				$kpgT=$valP+$kpgT;
			}
			$costosV="SELECT * from costos where fecha_cos>='$mes_in' and fecha_cos<='$mes_fin' and estad_cost='2'";
			$sql_vcodt=mysql_query($costosV,$conexion) or die (mysql_error());
			while ($vc=mysql_fetch_array($sql_vcodt)) {
				$idCs=$vc['id_cos'];
				$valCs=$vc['valor_cos'];
				$KcsT=$valCs+$KcsT;
			}
			$restDos=$kpgT+$KcsT;
			//dbd caja------------------------------
			$bdcaja="SELECT * from caja where fec_caja>='$mes_in' and fec_caja<='$mes_fin'";
			$slq_bdcaja=mysql_query($bdcaja,$conexion) or die (mysql_error());
			$numero=mysql_num_rows($slq_bdcaja);
			if ($numero>0) {
				while ($pj=mysql_fetch_array($slq_bdcaja)) {
					$idcj=$pj['id_caja'];
					$fccj=$pj['fec_caja'];
					$mscj=$pj['mes_caja'];
					$pgcj=$pj['pago_caja'];
					$ttcj=$pj['total_caja'];
				}
				$bcjAN="SELECT * from caja where fec_caja>='$mes_in_a' and fec_caja<='$mes_fin_a'";
				$sql_cjAn=mysql_query($bcjAN,$conexion) or die (mysql_error());
				$num_cjAn=mysql_num_rows($sql_cjAn);
				if ($num_cjAn>0) {
					while ($tAt=mysql_fetch_array($sql_cjAn)) {
						$totmsant=$tAt['total_caja'];
					}
				}
				else{
					$totmsant=0;
				}
				//Total---------------------------------
				$reatTot=($TotF+$totmsant)-$restDos; 
				$fomatoresta=number_format($reatTot,2);
				$modiCja="UPDATE caja set mes_caja=$TotF,pago_caja=$restDos,total_caja=$reatTot 
					where id_caja=$idcj";
				mysql_query($modiCja,$conexion) or die (mysql_error());
			}
			else{
				//Total---------------------------------
				$mscj=0;
				$pgcj=0;
				$ttcj=0;
				$totmsant=0;
				$reatTot=$TotF-$restDos; 
				$fomatoresta=number_format($reatTot,2);
				$ingrCaja="INSERT into caja(fec_caja,mes_caja,pago_caja,total_caja) 
					values('$mes_in',$TotF,$restDos,$reatTot)";
				mysql_query($ingrCaja,$conexion) or die (mysql_error());
			}
			$focja=number_format($mscj,2);
			$focjb=number_format($pgcj,2);
			$focjc=number_format($ttcj,2);
			$focjd=number_format($totmsant,2);
		?>
		<article class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Tipo</b></td>
					<td><b>Total</b></td>
				</tr>
				<tr>
					<td>Ingreso Anterior</td>
					<td>
						$<?php echo "$focjd"; ?>
					</td>
				</tr>
				<tr>
					<td>
						Ingresos mes
					</td>
					<td>
						$<?php echo "$focja"; ?>
					</td>
				</tr>
				<tr>
					<td>Cuentas Pagadas</td>
					<td>
						$<?php echo "$focjb"; ?>
					</td>
				</tr>
				<tr id="titol">
					<td><b>Caja</b></td>
					<td>
						<b>$<?php echo "$focjc"; ?>
						</b>
					</td>
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
	}
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>