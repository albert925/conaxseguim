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
			$tpad=$adv['tip_adm'];
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
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Seguimiento</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/eventos.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<?php
						if ($tpad=="1") {
					?>
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
					<li><a href="../comercial">Comercial</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos" class="selecionado">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
						else{
					?>
					<li><a href="../users">Inicio</a></li>
					<li>
						<a href="../users/mis_tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../users/mis_tareas">Mis tareas</a></li>
							<li><a href="../users/indicador">Indicadores</a></li>
							<li><a href="../users/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../users/metas">Metas</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos" class="selecionado">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
					?>
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
		<h1>Nuevo Evento</h1>
		<article id="menub">
			<a id="disea" href="../eventos">Ver Eventos</a>
			<a id="disea" href="nuevo_evento.php">Nuevo Evento</a>
		</article>
		<article id="verdatos">
			<form action="#" method="posts" enctype="multipart/form-data" id="imagenevent" class="columninput">
				<label>*<b>Del evento</b></label>
				<select id="evetid" name="evetid">
					<option value="0">Seleccione</option>
					<?php
						$Todevet="SELECT * from evento order by event_id desc";
						$sql_evetn=mysql_query($Todevet,$conexion) or die (mysql_error());
						while ($ov=mysql_fetch_array($sql_evetn)) {
							$idv=$ov['event_id'];
							$nmv=$ov['nam_ev'];
					?>
					<option value="<?php echo $idv ?>"><?php echo "$nmv"; ?></option>
					<?php
						}
					?>
				</select>
				<label>*<b>Imagen</b></label>
				<input type="file" id="gmv" name="gmv" required="requried" />
				<div id="ldk"></div>
				<input type="submit" value="Ingresar" id="imaevet" class="botonstyle" />
			</form>
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
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>