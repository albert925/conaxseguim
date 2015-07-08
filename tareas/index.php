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
	<title>Tareas</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingrestareas.js"></script>
	<script src="../js/Chart_min.js"></script>
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
						<a href="../tareas" class="selecionado">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../tareas/indicador">Indicadores</a></li>
							<li><a href="../tareas/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../comercial">Comercial</a></li>
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
		<h1>Lista Tareas <?php echo $nommeses[$mbH]." ".$yH; ?></h1>
		<article id="menub">
			<div id="Vtas">Ver Tareas</div>
			<div id="Atas">Agregar tarea</div>
			<div id="Bustas">Busqueda Tareas</div>
			<select id="respoS">
				<option value="0">Responsable</option>
				<?php
					$admiB="SELECT * from administrador order by usuadmin asc";
					$sql_admB=mysql_query($admiB,$conexion) or die (mysql_error());
					while ($kB=mysql_fetch_array($sql_admB)) {
						$idADM=$kB['id_admin'];
						$nomBadm=$kB['usuadmin'];
				?>
				<option value="<?php echo $idADM ?>"><?php echo "$nomBadm"; ?></option>
				<?php
					}
				?>
			</select>
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
		<article>
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
			<b>Total tareas:</b> <?php echo "$numetarA"; ?><br />
			<b>Total en proceso:</b> <?php echo "$numetarD"; ?><br />
			<b>Total Pendientes:</b> <?php echo "$numetarB"; ?><br />
			<b>Total terminadas:</b> <?php echo "$numetarC"; ?><br />
		</article>
		<article id="grafico" style="margin:0 auto;max-width:560px;">
			<canvas id="canvas" height="300" width="600"></canvas>
		</article>
		<article class="miniventana">
			<a href="#" class="closep">Ocultar</a>
			<h2>Información</h2>
			<div id="datosf"></div>
		</article>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<?php
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT *	from tareas 
						inner join administrador on(tareas.admin_id=administrador.id_admin) 
						inner join seguimiento on(tareas.segui_id=seguimiento.id_seguimineto) 
						inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
						where fechain_tar>='$fein' and fechain_tar<='$feff'  
						order by id_tarea desc ";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
			?>
			<table border="1" title="la Tabla No es adaptable">
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
					<td><b>Moficiar</b></td>
					<td><b>Borrar</b></td>
				</tr>
			<?php
				$mysqlver="SELECT *	from tareas 
						inner join administrador on(tareas.admin_id=administrador.id_admin) 
						inner join seguimiento on(tareas.segui_id=seguimiento.id_seguimineto) 
						inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
						where fechain_tar>='$fein' and fechain_tar<='$feff'  
						order by id_tarea desc   
					limit $inicio, $tamno_pagina";
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
					$esdT=$ps['esta_tar'];
					$TxT=$ps['descrip_tarea'];
					$hyT=$ps['fecha_ing'];
					$arT=$ps['area_tarea'];
					switch ($esdT) {
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
						?></span>
				</td>
				<td><span <?php echo $sty ?>><?php echo "$resnamT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$tareT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$TxT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$fiT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$ffT"; ?></span></td>
				<td><span <?php echo $sty ?>><?php echo "$es"; ?></span></td>
				<td>
					<a href="modifcaciontareas.php?idTv=<?php echo $idT ?>" id="yell">Modificar</a>
				</td>
				<td>
					<a href="borrartare.php?idborT=<?php echo $idT ?>" id="yell" class="deli">Borrar</a>
				</td>
			</tr>
			<?php
				}
			?>
			</table>
		</article>
		<br />
			<b>Paginas: </b>
			<?php
			//muestro los distintos indices de las paginas
			if ($total_paginas>1) {
				for ($i=1; $i <=$total_paginas ; $i++) { 
					if ($pagina==$i) {
						//si muestro el indice del la pagina actual, no coloco enlace
			?>
				<b style="color:#00A5D4;"><?php echo $pagina." "; ?></b>
			<?php
					}
					else{
						//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
			?>
						<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

			<?php
					}
				}
			}
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