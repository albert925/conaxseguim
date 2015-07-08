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
		$idRt=$_GET['idTv'];
		if ($idRt=="") {
			echo "<script>";
				echo "alert('Id tarea no diponible');";
				echo "var pag='../tareas';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$mysqlver="SELECT tareas.id_tarea,tareas.segui_id,tareas.admin_id,tareas.tare_nam,
					tareas.DI,tareas.MI,tareas.AI,tareas.fechain_tar,tareas.DF,tareas.MF,tareas.AF,
					tareas.fechafin_tar,tareas.esta_tar,tareas.descrip_tarea,tareas.area_tarea,
					seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
					empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
					empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
					planes.id_plan,planes.nombre_plan,
					administrador.usuadmin 
					from tareas 
						inner join administrador on(tareas.admin_id=administrador.id_admin) 
						inner join seguimiento on(tareas.segui_id=seguimiento.id_seguimineto) 
						inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						inner join planes on(seguimiento.plan_id_seg=planes.id_plan)  
				where tareas.id_tarea='$idRt'";
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
				$txT=$ps['descrip_tarea'];
				$areT=$ps['area_tarea'];
			}
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
	<script src="../js/ingrestareas.js"></script>
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
		<h1>Modificación de Tarea <?php echo "$tareT"; ?></h1>
		<article id="menub">
			<div id="Vtas">Ver Tareas</div>
			<div id="Atas">Agregar tarea</div>
			<div id="Bustas">Busqueda Tareas</div>
		</article>
		<article>
			<b>Empresa:</b> <?php echo "$naempreT"; ?><br />
			<b>Plan del Seguimiento:</b> <?php echo "$naPLT"; ?>
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
						if ($areT==$iar) {
							$selarea="selected";
						}
						else{
							$selarea="";
						}
				?>
				<option value="<?php echo $iar ?>" <?php echo $selarea ?>><?php echo $arrarea[$iar]; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Responsable</b></label>
			<select id="respadmf">
				<option value="0">Responsables</option>
				<?php
					$resv="SELECT * from administrador order by usuadmin asc";
					$sqlres=mysql_query($resv,$conexion) or die (mysql_error());
					while ($reg=mysql_fetch_array($sqlres)) {
						$idR=$reg['id_admin'];
						$namR=$reg['usuadmin'];
						if ($idR==$residT) {
							$silb="selected";
						}
						else{
							$silb="";
						}
				?>
				<option value="<?php echo $idR ?>" <?php echo $silb ?>><?php echo "$namR"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Nombre Tarea</b></label>
			<input type="text" id="nimetareaf" value="<?php echo $tareT ?>" placeholder="Nombre tarea" />
			<label><b>Descripción</b></label>
			<textarea id="textF"><?php echo "$txT"; ?></textarea>
			<label><b>Estado</b></label>
			<select id="estadof">
				<?php
					for ($x=0; $x <=4 ; $x++) { 
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
			<div id="mesatarfa"></div>
			<input type="submit" id="modiftardat" class="botonstyle" value="Modificar" data-tar="<?php echo $idT ?>" />
		</article>
		<article id="verdatos">
			<h2>Modificación de fecha</h2>
			<b>Fecha Inicio:</b> <?php echo "$fiT"; ?>
			<b>Fecha Fin:</b> <?php echo "$ffT"; ?>
			<article id="fechas">
				<select id="fdi" name="fdi">
					<option value="0">Dia Inicio</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesi" id="fmesi">
					<option value="0">Mese Inicio</option>
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
					style="width:5em;text-align:center;" required="required" />
			</article>
			<div id="inmessaj"></div>
			<input type="submit" id="modfifechainT" class="botonstyle" value="Modificar" data-tar="<?php echo $idT ?>" />
			<article id="fechas">
				<select id="fdF" name="fdF">
					<option value="0">Dia Fin</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesF" id="fmesF">
					<option value="0">Mese Fin</option>
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
					style="width:5em;text-align:center;" required="required" />
			</article>
			<div id="finmesaj"></div>
			<input type="submit" id="modfifechafinT" class="botonstyle" value="Modificar" data-tar="<?php echo $idT ?>" />
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
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>