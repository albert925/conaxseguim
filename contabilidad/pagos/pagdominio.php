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
		<h1>Dominios</h1>
		<article id="menub">
			<div id="Aterc">Agregar Terceros</div>
			<div id="Atepag">Agregar Pagos</div>
			<div id="Vepag">Ver Pagos</div>
			<div id="Veterc">Ver Terceros</div>
			<div id="PagosDirec">Direcionador</div>
			<div id="Domin">Dominios</div>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<?php
				$suma=0;
			?>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Dominio</b></td>
					<td><b>Fecha renovación</b></td>
					<td><b>Valor</b></td>
					<td><b>Estado</b></td>
				</tr>
				<?php
					$lict=0;
					$verdom="SELECT * from seguimiento where dominio!=''";
					$sqldiom=mysql_query($verdom,$conexion) or die (mysql_error());
					while ($mod=mysql_fetch_array($sqldiom)) {
						$caa=$mod['id_seguimineto'];
						$namdom=$mod['dominio'];
						$valdom=$mod['precio_t_prove'];
						$cbr=$mod['estad_prove'];
						$frr=$mod['fech_r'];
						if ($cbr=="1") {
							$colores="style='color:#FF3C3C;'";
						}
						else{
							$colores="";
						}
						$lict=$valdom+$lict;
				?>
				<tr>
					<td><span <?php echo $colores ?>><?php echo "$namdom"; ?></span></td>
					<td><span <?php echo $colores ?>><?php echo "$frr"; ?></span></td>
					<td><span <?php echo $colores ?>>$<?php echo "$valdom"; ?></span></td>
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
				</tr>
				<?php
					}
				?>
				<tr id="titol">
					<td></td>
					<td><b>$<?php echo "$lict"; ?></b></td>
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