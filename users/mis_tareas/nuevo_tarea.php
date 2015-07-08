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
	<script src="../../js/ingrestareas.js"></script>
	<script src="../../js/busq_tareas.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li><a href="../../users">Inicio</a></li>
					<li>
						<a href="../../users/mis_tareas" class="selecionado">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../../users/mis_tareas" class="selecionado">Mis tareas</a></li>
							<li><a href="../../users/indicador">Indicadores</a></li>
							<li><a href="../../users/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../../users/metas">Metas</a></li>
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
		<h1>Lista de mis Tareas</h1>
		<article class="miniventana">
			<a href="#" class="closep">Ocultar</a>
			<h2>Información</h2>
			<div id="datosf"></div>
		</article>
		<article id="dtetar">
			<article>
				<a id="disea" href="../mis_tareas">Ver Tareas</a>
				<a id="disea" href="ind3x.php">Todas tareas</a>
			</article>
		</article>
		<article id="verdatos">
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
			<select id="plans">
				<option value="0">Plan</option>
			</select>
			<label><b>Area</b></label>
			<select id="araead">
				<?php
					$arrarea=["seleccione","Comercial","Diseño","financiero","Gerencia","Mercadeo","Programación"];
					for ($iar=0; $iar <=6 ; $iar++) { 
				?>
				<option value="<?php echo $iar ?>"><?php echo $arrarea[$iar]; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Responsable</b></label>
			<select id="respadm">
				<option value="0">Responsables</option>
				<?php
					$resv="SELECT * from administrador order by usuadmin asc";
					$sqlres=mysql_query($resv,$conexion) or die (mysql_error());
					while ($reg=mysql_fetch_array($sqlres)) {
						$idR=$reg['id_admin'];
						$namR=$reg['usuadmin'];
				?>
				<option value="<?php echo $idR ?>"><?php echo "$namR"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Nombre tarea</b></label>
			<input type="text" id="nimetarea" placeholder="Nombre tarea" />
			<label><b>Descripción</b></label>
			<textarea id="descrirarea"></textarea>
			<article id="fechas" style="display:none;">
				<select id="fdi" name="fdi">
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesi" id="fmesi">
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
				<input type="number" id="yeari" name="yearinF" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" value="2015" />
			</article>
			<label><b>Fecha Propuesta</b></label>
			<input type="date" id="fehaUI" placeholder="YYYY-MM-DD" />
			<article id="fechas" style="display:none;">
				<select id="fdF" name="fdF">
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesF" id="fmesF">
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
				<input type="number" id="yearF" name="yearinF" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" value="2015" />
			</article>
			<label><b>Fecha Ejecución</b></label>
			<input type="date" id="fehaUF" placeholder="YYYY-MM-DD" />
			<div id="mesatareas"></div>
			<input type="submit" id="ingrtar" class="botonstyle" value="Ingresar" />
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