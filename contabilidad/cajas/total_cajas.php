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
		$dia_hoy=$YH."-".$MH."-".$DH;
		$mes_in=$YH."-".$MH."-1";
		$mes_fin=$YH."-".$MH."-31";
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
		</hgroup>
		<article id="menub">
			<div id="verind">Ver mes actual</div>
			<select id="mesacaja">
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
			<select id="yearcaja">
				<?php
					for ($Fcy=2014; $Fcy <=($YH+1) ; $Fcy++) { 
				?>
				<option value="<?php echo $Fcy ?>"><?php echo "$Fcy"; ?></option>
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
		<article class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Tipo</b></td>
					<td><b>Total</b></td>
				</tr>
				<?php
					$KtoA=0;
					$ingresAnum="SELECT * from abonob";
					$sqlingreA=mysql_query($ingresAnum,$conexion) or die (mysql_error());
					while ($gl=mysql_fetch_array($sqlingreA)) {
						$idab=$gl['id_abono'];
						$idSgab=$gl['id_plan_sg'];
						$valab=$gl['valor_abono'];
						$KtoA=$valab+$KtoA;
					}
					$forGA=number_format($KtoA,2);
					$KtoB=0;
					$ingresBnum="SELECT * from abonoc";
					$sqlingreB=mysql_query($ingresBnum,$conexion) or die (mysql_error());
					while ($hl=mysql_fetch_array($sqlingreB)) {
						$idIN=$hl['id_indirecto'];
						$valIN=$hl['valor_indirecto'];
						$KtoB=$valIN+$KtoB;
					}
					$forGB=number_format($KtoB,2);
					$TotF=$KtoA+$KtoB;
					$fotTtF=number_format($TotF,2);
				?>
				<tr>
					<td>
						Ingresos
					</td>
					<td>
						$<?php echo "$fotTtF"; ?>
					</td>
				</tr>
				<?php
					$kpgT=0;
					$KcsT=0;
					$pagarD="SELECT * from pagos where estado_p='2'";
					$sqlpagar=mysql_query($pagarD,$conexion) or die (mysql_error());
					while ($il=mysql_fetch_array($sqlpagar)) {
						$idP=$il['id_pago'];
						$valP=$il['valor_p'];
						$kpgT=$valP+$kpgT;
					}
					$costosV="SELECT * from costos where estad_cost='2'";
					$sql_vcodt=mysql_query($costosV,$conexion) or die (mysql_error());
					while ($vc=mysql_fetch_array($sql_vcodt)) {
						$idCs=$vc['id_cos'];
						$valCs=$vc['valor_cos'];
						$KcsT=$valCs+$KcsT;
					}
					$restDos=$kpgT+$KcsT;
					$fotmpagar=number_format($restDos,2);
				?>
				<tr>
					<td>Cuentas por Pagar</td>
					<td>
						$<?php echo "$fotmpagar"; ?>
					</td>
				</tr>
				<tr id="titol">
					<td><b>Caja</b></td>
					<td>
						<b>$<?php $reatTot=$TotF-$restDos; $fomatoresta=number_format($reatTot,2); echo "$fomatoresta"; ?></b>
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
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>