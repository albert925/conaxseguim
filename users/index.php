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
	<title>Usuario</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/codigs.js"></script>
	<script src="../js/Chart_min.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li><a href="../users" class="selecionado">Inicio</a></li>
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
		<h1>Tareas <?php echo $nommeses[$mbH]." ".$yH; ?> de la empresa</h1>
		<?php
			$total_Tareas="SELECT * from tareas where fechain_tar>='$fein' and fechain_tar<='$feff'";
			$pendiente_Tareas="SELECT * from tareas where esta_tar='1' and fechain_tar>='$fein' and fechain_tar<='$feff'";
			$enproceso_Tareas="SELECT * from tareas where esta_tar='2' and fechain_tar>='$fein' and fechain_tar<='$feff'";
			$terminado_Tareas="SELECT * from tareas where esta_tar='3' and fechain_tar>='$fein' and fechain_tar<='$feff'";
			$sql_to_tar=mysql_query($total_Tareas,$conexion) or die (mysql_error());
			$sql_pend_tar=mysql_query($pendiente_Tareas,$conexion) or die (mysql_error());
			$sql_term_tar=mysql_query($terminado_Tareas,$conexion) or die (mysql_error());
			$sql_proceso_tar=mysql_query($enproceso_Tareas,$conexion) or die (mysql_error());
			$numetarA=mysql_num_rows($sql_to_tar);
			$numetarB=mysql_num_rows($sql_pend_tar);
			$numetarC=mysql_num_rows($sql_term_tar);
			$numetarD=mysql_num_rows($sql_proceso_tar);
		?>
		<article id="grafico" style="margin:1em auto;max-width:650px;">
			<canvas id="canvas" height="300" width="600"></canvas>
		</article>
	</section>
	<footer>
		<article id="margen">
			<p>
				Pie de página
			</p>
		</article>
	</footer>
	<script type="text/javascript">
		var pieData=[
			{
				value: <?php echo $numetarB; ?>,
				color:"#FF3C3C",
				highlight: "#FF5A5E",
				label: "Pendientes"
			},
			{
				value: <?php echo $numetarD; ?>,
				color: "#FAFF1E",
				highlight: "#FFC870",
				label: "Proceso"
			},
			{
				value: <?php echo $numetarC; ?>,
				color: "#00A5D4",
				highlight: "#5AD3D1",
				label: "Terminado"
			}
		];
		window.onload = function(){
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myPie = new Chart(ctx).Pie(pieData);
		};
	</script>
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