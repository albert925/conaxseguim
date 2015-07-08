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
		$codR=$_GET['cod'];
		if ($codR=="" || $codR=="0") {
			echo "<script>";
				echo "alert('Codigo de recibo no disponible');";
				echo "var pag='../ingresos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$factura="SELECT * from recibo where n_rec='$codR'";
			$sql_feact=mysql_query($factura,$conexion) or die (mysql_error());
			while ($fft=mysql_fetch_array($sql_feact)) {
				$idF=$fft['n_rec'];
				$feF=$fft['fecha_rc'];
				$cdF=$fft['lug_rc'];
				$emF=$fft['empre_id'];
				$txF=$fft['text_rc'];
				$vlF=$fft['vaor_T'];
				$edF=$fft['estad_rc'];
				$ltF=$fft['num_letras'];
			}
			$Empresa="SELECT * from empresas where id_empresa='$emF'";
			$sql_Em=mysql_query($Empresa,$conexion) or die (mysql_error());
			while ($me=mysql_fetch_array($sql_Em)) {
				$nomEM=$me['name_empr'];
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
	<script type="text/javascript">
		$(document).on("ready",inicO);
		function inicO () {
			$(".term").on("click",confterm);
		}
		function confterm () {
			return confirm("¿Estas seguro de terminar?");
		}
	</script>
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
		<h1>Recibo de caja</h1>
		<article class="disentablasbusqsincroll">
			<form action="pdf_reg.php" method="post" class="columfelx">
				<input type="text" name="idFact" value="<?php echo $codR ?>" required="required" style="display:none;" />
				<label><b>Ciudad:</b></label>
				<input type="text" name="cdFp" value="<?php echo $cdF ?>" />
				<label><b>Fecha:</b></label>
				<input type="date" name="datFp" value="<?php echo $feF ?>" placeholder="YYY-MM-DD" />
				<label><b>Valor:</b></label>
				<input type="number" name="valFp" value="<?php echo $vlF ?>" required="required" />
				<label><b>Recibí de: </b></label><span><?php echo "$nomEM"; ?></span>
				<label><b>Por Concepto de:</b></label>
				<textarea name="txFp"><?php echo "$txF"; ?></textarea>
				<label><b>La suma de (en letras)</b></label>
				<input type="text" name="ltnmb" value="<?php echo $ltF ?>" />
				<label><b>Cheque N°</b></label>
				<input type="text" name="chFp" />
				<label><b>Banco</b></label>
				<input type="text" name="bnFp" />
				<article>
					<label><b>Efectivo</b></label>
					<input type="checkbox" name="efFp" value="1" />
				</article>
				<input type="submit" value="Guardar PDF y modificar" class="botonstyle" />
				<a href="../ingresos" class="term">Terminar</a>
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
	}
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>