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
	<script src="../../js/indicador.js"></script>
	<script src="../../js/Chart_min.js"></script>
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
							<li><a href="../../users/mis_tareas">Mis tareas</a></li>
							<li><a href="../../users/indicador" class="selecionado">Indicadores</a></li>
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
		<h1>Indicador <?php echo $nommeses[$mbH]." ".$yH; ?></h1>
		<article id="dtetar">
			<article>
				<select id="mesBcb">
					<?php
						for ($mmb=0; $mmb <=12 ; $mmb++) { 
					?>
					<option value="<?php echo $mmb ?>"><?php echo $nommeses[$mmb]; ?></option>
					<?php
						}
					?>
				</select>
				<select id="yearBcb">
					<?php
						for ($yyB=2014; $yyB <=($yH+1) ; $yyB++) {
							if ($yyB==$yH) {
								$selyear="selected";
							}
							else{
								$selyear="";
							}
					?>
					<option value="<?php echo $yyB ?>" <?php echo $selyear ?>><?php echo "$yyB"; ?></option>
					<?php
						}
					?>
				</select>
			</article>
		</article>
		<article id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Id</b></td>
					<td><b>Area</b></td>
					<td><b>Nombre</b></td>
					<td><b>Total tareas</b></td>
					<td><b>Tareas Ejecutadas</b></td>
					<td><b>Tareas Proceso</b></td>
					<td><b>Tareas Pendiente</b></td>
					<td colspan="2"><b>%</b></td>
				</tr>
				<?php
					$arrarea=["seleccione","Comercial","Diseño","financiero","Gerencia","Mercadeo","Programación"];
					$totaltareas=0;
					$filarea=0;
					$mysqlver="SELECT * from indicador where fec_ind>='$fein' and fec_ind<='$feff'  
						order by tipo_area asc";
					$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
					while ($ps=mysql_fetch_array($sql)) {
						$idIn=$ps['id_ind'];
						$adIn=$ps['admin_id'];
						$totIn=$ps['tot_tareas'];
						$ejeIn=$ps['ejecutadas_tareas'];
						$procIn=$ps['proceso_tareas'];
						$pedIn=$ps['pendiente_tareas'];
						$usporcIn=$ps['porc_cada'];
						$arporIn=$ps['porc_area'];
						$areIn=$ps['tipo_area'];
						$fecIn=$ps['fec_ind'];
						$totaltareas=$totIn+$totaltareas;
						$conveciena=$usporcIn*100;
						$convecienb=$arporIn*100;
						$forma=number_format($conveciena,2);
						$formb=number_format($convecienb,2);
						if ($conveciena<=74) {
							$stya="style='color:#FF3C3C;'";
						}
						else{
							if ($conveciena>=75 && $conveciena<=97) {
								$stya="style='color:#FAFF1E;'";
							}
							else{
								$stya="style='color:#00A5D4;'";
							}
						}
						if ($convecienb<=74) {
							$styb="style='color:#FF3C3C;'";
						}
						else{
							if ($convecienb>=75 && $convecienb<=97) {
								$styb="style='color:#FAFF1E;'";
							}
							else{
								$styb="style='color:#00A5D4;'";
							}
						}
						$nomadmin="SELECT * from administrador where id_admin=$adIn";
						$sql_nomadmin=mysql_query($nomadmin,$conexion) or die (mysql_error());
						while ($ky=mysql_fetch_array($sql_nomadmin)) {
							$nombreadm=$ky['usuadmin'];
						}
				?>
				<tr>
					<td><b><?php echo "$idIn"; ?></b></td>
					<td><?php echo $arrarea[$areIn]; ?></td>
					<td><?php echo "$nombreadm"; ?></td>
					<td><?php echo "$totIn"; ?></td>
					<td><?php echo "$ejeIn"; ?></td>
					<td><?php echo "$procIn"; ?></td>
					<td><?php echo "$pedIn"; ?></td>
					<td><span <?php echo $stya ?>><?php echo "$forma"; ?>%</span></td>
					<td><span <?php echo $styb ?>><?php echo "$formb"; ?>%</span></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="3"><b>Total</b></td>
					<td><?php echo "$totaltareas"; ?></td>
					<td colspan="5"></td>
				</tr>
			</table>
		</article>
		<article id="grafico" style="margin:1em auto;max-width:560px;">
			<canvas id="can_areas" height="300" width="600"></canvas>
		</article>
		<?php
			function areaagrafico($tipoar,$badcon)
			{
				$dH=date("d");
				$dbH=date("j");
				$mH=date("m");
				$mbH=date("n");
				$yH=date("Y");
				$fein=$yH."-".$mH."-00";
				$feff=$yH."-".$mH."-31";
				$busquedaarea="SELECT max(porc_area) as porc_area from indicador where tipo_area='$tipoar' 
					and fec_ind>='$fein' and fec_ind<='$feff'";
				$sql_Area=mysql_query($busquedaarea,$badcon) or die (mysql_error());
				$numerarea=mysql_num_rows($sql_Area);
				if ($numerarea>0) {
					while ($argraf=mysql_fetch_array($sql_Area)) {
						$deciaare=$argraf['porc_area']*100;
						$numeroare=number_format($deciaare,1);
					}
				}
				else{
					$numeroare=0;
				}
				return $numeroare;
			}
			echo areaagrafico(1,$conexion);
		?>
	</section>
	<footer>
		<article id="margen">
			<p>
				Pie de página
			</p>
		</article>
	</footer>
	<script type="text/javascript">
		<?php
			$arrarea=["todos","Comercial","Diseño","financiero","Gerencia","Mercadeo","Programación"];
		?>
		var areaData={
			labels :[
				<?php
					for ($colal=2; $colal <=6 ; $colal++) {
				?>
				"<?php echo $arrarea[$colal] ?>",
				<?php
					}
				?>
			],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "rgba(220,220,220,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					data :[
						<?php
							for ($iar=2; $iar <=6 ; $iar++) {
						?>
						<?php echo areaagrafico($iar,$conexion) ?>,
						<?php
							}
						?>
					]
				}
			]
		};
		window.onload = function(){
			var ctx = document.getElementById("can_areas").getContext("2d");
			window.myBar = new Chart(ctx).Bar(areaData, {
				responsive : true
			});
		}
	</script>
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