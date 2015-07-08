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
				<?php
					$total_Tareas="SELECT * from tareas where admin_id=$idad";
					$pendiente_Tareas="SELECT * from tareas where admin_id=$idad and esta_tar='1'";
					$enproceso_Tareas="SELECT * from tareas where admin_id=$idad and esta_tar='2'";
					$terminado_Tareas="SELECT * from tareas where admin_id=$idad and esta_tar='3'";
					$sql_to_tar=mysql_query($total_Tareas,$conexion) or die (mysql_error());
					$sql_pend_tar=mysql_query($pendiente_Tareas,$conexion) or die (mysql_error());
					$sql_term_tar=mysql_query($terminado_Tareas,$conexion) or die (mysql_error());
					$sql_proceso_tar=mysql_query($enproceso_Tareas,$conexion) or die (mysql_error());
					$numetarA=mysql_num_rows($sql_to_tar);
					$numetarB=mysql_num_rows($sql_pend_tar);
					$numetarC=mysql_num_rows($sql_term_tar);
					$numetarD=mysql_num_rows($sql_proceso_tar);
				?>
				<b>Total tareas:</b> <?php echo "$numetarA"; ?><br />
				<b>Total en proceso:</b> <?php echo "$numetarD"; ?><br />
				<b>Total Pendientes:</b> <?php echo "$numetarB"; ?><br />
				<b>Total terminadas:</b> <?php echo "$numetarC"; ?><br />
			</article>
			<article>
				<a id="disea" href="nuevo_tarea.php">Nueva Tarea</a>
				<a id="disea" href="../mis_tareas">Tareas del mes</a>
			</article>
		</article>
		<article id="sinscroll">
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td><b>Id</b></td>
					<td><b>Fecha</b></td>
					<td><b>Empresa</b></td>
					<td><b>PLan</b></td>
					<td><b>Area</b></td>
					<td><b>Responsable</b></td>
					<td><b>Tarea</b></td>
					<td><b>Descripción</b></td>
					<td><b>Fecha Propuesta</b></td>
					<td><b>Fecha Ejecución</b></td>
					<td><b>Estado</b></td>
				</tr>
			<?php
				$mysqlver="SELECT * from tareas 
						inner join administrador on(tareas.admin_id=administrador.id_admin) 
						inner join seguimiento on(tareas.segui_id=seguimiento.id_seguimineto) 
						inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
					where tareas.admin_id='$idad' and esta_tar<'3' order by id_tarea desc";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$idT=$ps['id_tarea'];
					$plidT=$ps['segui_id'];
					$residT=$ps['admin_id'];
					$naempreT=$ps['name_empr'];
					$naPLT=$ps['nombre_plan'];
					$resnamT=$ps['usuadmin'];
					$tareT=$ps['tare_nam'];
					$fiT=$ps['fechain_tar'];
					$ffT=$ps['fechafin_tar'];
					$estaT=$ps['esta_tar'];
					$TxT=$ps['descrip_tarea'];
					$hyT=$ps['fecha_ing'];
					$arT=$ps['area_tarea'];
					switch ($estaT) {
						case '0':
							$es="<b>Selecione</b>";
							$sty="style='color:#fff;'";
							break;
						case '1':
							$es="<b style='color:#FF3C3C;'>Pendiente</b>";
							$sty="style='color:#FF3C3C;'";
							break;
						case '2':
							$es="<b style='color:#FAFF1E;'>En proceso</b>";
							$sty="style='color:#FAFF1E;'";
							break;
						case '3':
							$es="<b style='color:#00A5D4;'>Terminado</b>";
							$sty="style='color:#00A5D4;'";
							break;
						case '4':
							$es="<b style='color:#FF3C3C;'>Cancelado</b>";
							$sty="style='color:#FF3C3C;'";
							break;
						default:
							$es="<b>Error</b>";
							$sty="";
							break;
					}
			?>
			<tr>
				<td><b <?php echo $sty ?>><?php echo "$idT"; ?></b></td>
				<td><span <?php echo $sty ?>><?php echo "$hyT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$naempreT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$naPLT"; ?></span></td>
				<td><span <?php echo $sty ?>>
					<?php
						$arrarea=["seleccione","Comercial","Diseño","financiero","Gerencia","Mercadeo","Programación"];
						echo $arrarea[$arT];
						?>
					</span>
				</td>
				<td><span <?php echo $sty ?>><?php echo "$resnamT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$tareT"; ?></span></td>
				<td>
					<textarea rows="3" id="tex_<?php echo $idT ?>" class="texTT" data-id="<?php echo $idT ?>"><?php echo "$TxT"; ?></textarea>
				</td>
				<td><span <?php echo $sty ?>><?php echo "$fiT";?></span></td>
				<td>
					<input type="date" id="ff_<?php echo $idT ?>" class="fecD" value="<?php echo "$ffT"; ?>" data-id="<?php echo $idT ?>" />
				</td>
				<td>
					<select id="est_<?php echo $idT ?>" class="escambio" 
						data-id="<?php echo $idT ?>" data-adm="<?php echo $idad ?>" data-area="<?php echo $arT ?>">
						<?php
							for ($x=0; $x <=3 ; $x++) { 
								if ($x==$estaT) {
									$finsel="selected";
								}
								else{
									$finsel="";
								}
								switch ($x) {
									case '0':
										$xx="Selecione";
										break;
									case '1':
										$xx="Pendiente";
										break;
									case '2':
										$xx="En proceso";
										break;
									case '3':
										$xx="Terminado";
										break;
									case '4':
										$xx="Cancelado";
										break;
									default:
										$xx="Error";
										break;
								}
						?>
						<option value="<?php echo $x ?>" <?php echo $finsel ?>><?php echo "$xx"; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<?php
				}
			?>
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