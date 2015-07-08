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
		$idR=$_GET['cs'];
		if ($idR=="") {
			echo "<script>";
				echo "alert('id costo no disponible')";
				echo "var pag='../pagos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$Mcosots="SELECT * from costos where id_cos=$idR";
			$sql_mcostos=mysql_query($Mcosots,$conexion) or die (mysql_error());
			while ($kg=mysql_fetch_array($sql_mcostos)) {
				$nmblac=$kg['nam_blanc'];
				$idProveCS=$kg['terc_prov_id'];
				$pcCS=$kg['valor_cos'];
				$estCS=$kg['estad_cost'];
				$adidCS=$kg['idadP_cost'];
				$fecCS=$kg['fecha_cos'];
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
		<h1>Modificación de costos</h1>
		<article id="menub">
			<div id="Aterc">Agregar Terceros</div>
			<div id="Atepag">Agregar Pagos</div>
			<div id="Vepag">Ver Pagos</div>
			<div id="Veterc">Ver Terceros</div>
			<div id="PagosDirec">Direcionador</div>
			<div id="Domin">Dominios</div>
		</article>
		<article id="verdatos">
			<label><b>Nombre</b></label>
			<input type="text" id="csa" value="<?php echo $nmblac ?>" />
			<label><b>Fecha</b></label>
			<input type="date" id="csb" value="<?php echo $fecCS ?>" placeholder="YYYY-MM-DD" />
			<label><b>Valor</b></label>
			<input type="number" id="csc" value="<?php echo $pcCS ?>" />
			<div id="jac"></div>
			<input type="submit" value="Modificar" id="csfcs" class="botonstyle" data-id="<?php echo $idR ?>" data-adm="<?php echo $idad ?>" />
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