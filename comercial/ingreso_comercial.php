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
	<title>Comercial</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingreingresos.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../administrador">Seguimiento</a>
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
					<li><a href="../comercial" class="selecionado">Comercial</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
				</ul>
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
		<h1>Ingresos Comercial</h1>
		<article id="menub">
			<div id="NuvMet">Nuevo Meta</div>
			<div id="VerMetotro">Metas de otros meses</div>
			<div id="VerMeto">Meta Actual</div>
			<div id="VerIcont">Ingresos Comercial</div>
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
			</select>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Año</b></td>
					<td><b>Mes</b></td>
					<td><b>Caja</b></td>
				</tr>
				<?php
					$maxyear="SELECT max(year_in) as year_in from seguimiento";
					$sqlmax=mysql_query($maxyear,$conexion) or die (mysql_error());
					/*while ($numeroyear=mysql_fetch_array($sqlmax)) {
						$maxyearc=$numeroyear['year_in'];
					}*/
					$maxyearc=date("Y");
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
		<article id="finfingresos" class="disentablasbusqsincroll"></article>
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