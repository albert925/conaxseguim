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
	<script src="../js/busquedas.js"></script>
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
						<a href="../contabilidad" class="selecionado">Contabilidad</a>
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
		<h1>busqueda Seguimiento</h1>
		<article id="menub">
			<div id="VsguC">Ver Seguimiento</div>
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
						if ($idEM==$cab) {
							$ecA="selected";
						}
						else{
							$ecA="";
						}
				?>
				<option value="<?php echo $idEM ?>" <?php echo $ecA ?>><?php echo "$naEM"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="plansB">
				<option value="0">Planes</option>
				<?php
					$planess="SELECT * from planes order by id_plan asc";
					$sqlplan=mysql_query($planess,$conexion) or die (mysql_error());
					while ($pl=mysql_fetch_array($sqlplan)) {
						$idPL=$pl['id_plan'];
						$namPL=$pl['nombre_plan'];
						if ($idPL==$cac) {
							$ecB="selected";
						}
						else{
							$ecB="";
						}
				?>
				<option value="<?php echo $idPL ?>" <?php echo $ecB ?>><?php echo "$namPL"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="estdplansgB">
				<?php
					for ($X=0; $X <=3 ; $X++) { 
						if ($X==$cal) {
							$ecC="selected";
						}
						else{
							$ecC="";
						}
						switch ($X) {
							case '0':
								$optdplan="Estado plan";
								break;
							case '1':
								$optdplan="En proceso";
								break;
							case '2':
								$optdplan="Terminado";
								break;
							case '3':
								$optdplan="Cancelado";
								break;
							default:
								$optdplan="Error";
								break;
						}
				?>
				<option value="<?php echo $X ?>" <?php echo $ecC ?>><?php echo "$optdplan"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="redirecionadorB">
				<option value="0">Redirecionador</option>
				<?php
					$redird="SELECT * from direcionador order by nam_direcion asc";
					$sqldird=mysql_query($redird,$conexion) or die (mysql_error());
					while ($dr=mysql_fetch_array($sqldird)) {
						$idDR=$dr['id_direcion'];
						$namDR=$dr['nam_direcion'];
						if ($idDR==$cam) {
							$ecD="selected";
						}
						else{
							$ecD="";
						}
				?>
				<option value="<?php echo $idDR ?>" <?php echo $ecD ?>><?php echo "$namDR"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="estadodirecionsegB">
				<?php
					for ($Y=0; $Y <=3 ; $Y++) { 
						if ($Y==$cbk) {
							$ecE="selected";
						}
						else{
							$ecE="";
						}
						switch ($Y) {
							case '0':
								$apt="Estado Redireccionador";
								break;
							case '1':
								$apt="Proceso";
								break;
							case '2':
								$apt="Pagado";
								break;
							case '3':
								$apt="Cancelado";
								break;
							default:
								$apt="Error";
								break;
						}
				?>
				<option value="<?php echo $Y ?>" <?php echo $ecE ?>><?php echo "$apt"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="proveedorB">
				<option value="0">Proveedor</option>
				<?php
					$prove="SELECT * from proveedores order by name_prove asc";
					$sqlprove=mysql_query($prove,$conexion) or die (mysql_error());
					while ($pv=mysql_fetch_array($sqlprove)) {
						$idPV=$pv['id_proveedor'];
						$naPV=$pv['name_prove'];
						if ($idPV==$caq) {
							$ecG="selected";
						}
						else{
							$ecG="";
						}
				?>
				<option value="<?php echo $idPV ?>" <?php echo $ecG ?>><?php echo "$naPV"; ?></option>
				<?php
					}
				?>
			</select>
			<article id="fechas">
				<select id="fdiB" name="fdiB">
					<option value="0">Dia Inicio</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesiB" id="fmesiB">
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
				<input type="number" id="yeariB" name="yearinFB" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<article id="fechas">
				<select id="fdFB" name="fdFB">
					<option value="0">Dia Fin</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesFB" id="fmesFB">
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
				<input type="number" id="yearFB" name="yearinFB" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<article id="fechas">
				<select id="fdRB" name="fdRB">
					<option value="0">Dia Renovación</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesRB" id="fmesRB">
					<option value="0">Mese Renovación</option>
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
				<input type="number" id="yearRB" name="yearinRB" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<article id="fechas">
				<select id="fding" name="fding">
					<option value="0">Dia Ingreso</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesing" id="fmesing">
					<option value="0">Mese Ingreso</option>
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
				<input type="number" id="yearing" name="yearining" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
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
			<input type="submit" value="Buscar" id="busqueda" class="botonstyle" data-seg="<?php echo $idTS ?>" />
		</article>
		<article id="finresultados"></article>
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