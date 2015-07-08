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
	<title>Seguimiento</title>
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/menu.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/busquedas.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../../administrador" class="selecionado">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../../administrador/clientes" class="selecionado">Clientes</a></li>
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
			<div id="ifmorver" class="veradmB">
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
		<h1>busqueda</h1>
		<article id="menub">
			<div id="Acl">Agregar Cliente</div>
			<div id="Aemp">Agregar Empresa</div>
			<div id="Vcl">Ver Clientes</div>
			<div id="Vempr">Ver Empresas</div>
			<div id="Vsgu">Ver Seguimiento</div>
			<div id="Buscl">Busqueda Clientes</div>
		</article>
		<article id="verdatos">
			<select id="empresaB">
				<option value="0">Empresas</option>
				<?php
					$emprem="SELECT * from empresas order by name_empr asc";
					$sqlempr=mysql_query($emprem,$conexion) or die (mysql_error());
					while ($ep=mysql_fetch_array($sqlempr)) {
						$idEM=$ep['id_empresa'];
						$naEM=$ep['name_empr'];
				?>
				<option value="<?php echo $idEM ?>"><?php echo "$naEM"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="clienterempr">
				<option value="0">Selecione Cliente</option>
				<?php
					$clientver="SELECT * from clientes order by nombre_us asc";
					$sqlvercl=mysql_query($clientver,$conexion) or die (mysql_error());
					while ($rcl=mysql_fetch_array($sqlvercl)) {
						$idclP=$rcl['id_usuario'];
						$nomclP=$rcl['nombre_us'];
						$aplclP=$rcl['apellido_us'];
				?>
				<option value="<?php echo $idclP ?>"><?php echo "$idclP--$nomclP $aplclP"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="paisempr">
				<option value="0">Paises</option>
				<?php
					$verpaisempr="SELECT * from pais order by nam_pais asc";
					$sqlpaisempr=mysql_query($verpaisempr,$conexion) or die (mysql_error());
					while ($pispr=mysql_fetch_array($sqlpaisempr)) {
						$idpaisE=$pispr['id_pais'];
						$nampaisE=$pispr['nam_pais'];
				?>
				<option value="<?php echo $idpaisE ?>"><?php echo "$nampaisE"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="depestempr">
				<option value="0">Departamento/Estado</option>
			</select>
			<select id="ciudadempr">
				<option value="0">Ciudades</option>
			</select>
			<div id="setfinbusq"></div>
			<input type="submit" value="Buscar" id="busquedb" class="botonstyle" data-seg="<?php echo $idTS ?>" />
		</article>
		<article id="finresultadosB" class="disentablasbusq"></article>
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