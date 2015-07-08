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
	<script src="../js/ingresegimientosd.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../administrador" class="selecionado">Seguimiento</a>
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
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
				</ul>
			</nav>
			<div id="mn_mov"><span class="icon-menu"></span></div>
			<div id="ifmorver" class="veradmA">
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
		<h1>Agregar Seguimiento</h1>
		<article id="menub">
			<div id="Vsgub">Ver Seguimiento</div>
			<div id="Agseg">Agregar Seguimiento</div>
			<div id="Busseg">Busqueda Seguimiento</div>
		</article>
		<article id="verdatos">
			<label><b>Empresa</b></label>
			<select id="empresa">
				<option value="0">Empresas</option>
				<?php
					$emprem="SELECT * from empresas order by name_empr asc";
					$sqlempr=mysql_query($emprem,$conexion) or die (mysql_error());
					while ($ep=mysql_fetch_array($sqlempr)) {
						$idEM=$ep['id_empresa'];
						$naEM=$ep['name_empr'];
				?>
				<option value="<?php echo $idEM ?>"><?php echo "$naEM"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Planes</b></label>
			<select id="plans">
				<option value="0">Planes</option>
				<?php
					$planess="SELECT * from planes order by id_plan asc";
					$sqlplan=mysql_query($planess,$conexion) or die (mysql_error());
					while ($pl=mysql_fetch_array($sqlplan)) {
						$idPL=$pl['id_plan'];
						$namPL=$pl['nombre_plan'];
				?>
				<option value="<?php echo $idPL ?>"><?php echo "$namPL"; ?></option>
				<?php
					}
				?>
			</select>
			<div id="precplA"></div>
			<label><b>Descuento Max 5%</b></label>
			<input type="number" class="blanc" id="descuento" placeholder="Descuento Max 5%" />
			<label><b>Abono</b></label>
			<input type="number" class="blanc" id="abnA" placeholder="Abono 1" />
			<label style="display:none;"><b>Fecha Abono 1</b></label>
			<input style="display:none;" type="date" id="fechaabonoA" placeholder="AAA-MM-DD (Fecha abono 1)" />
			<label style="display:none;"><b>Estado Abono 1</b></label>
			<select style="display:none;" id="estdA">
				<?php
					for ($aa=0; $aa <=2 ; $aa++) { 
						switch ($aa) {
							case '0':
								$av="Estado Abono 1";
								break;
							case '1':
								$av="Pendiente";
								break;
							case '2':
								$av="Pagado";
								break;
							default:
								$av="Error";
								break;
						}
				?>
				<option value="<?php echo $aa ?>"><?php echo "$av"; ?></option>
				<?php
					}
				?>
			</select>
			<label style="display:none;"><b>Abono 2</b></label>
			<input style="display:none;" type="number" class="blanc" id="abnB" placeholder="Abono 2" />
			<label style="display:none;"><b>Fecha Abono 2</b></label>
			<input style="display:none;" type="date" id="fechaabonoB" placeholder="AAA-MM-DD (Fecha abono 2)" />
			<label style="display:none;"><b>Estado Abono 2</b></label>
			<select style="display:none;" id="estdB">
				<?php
					for ($aa=0; $aa <=2 ; $aa++) { 
						switch ($aa) {
							case '0':
								$av="Estado Abono 2";
								break;
							case '1':
								$av="Pendiente";
								break;
							case '2':
								$av="Pagado";
								break;
							default:
								$av="Error";
								break;
						}
				?>
				<option value="<?php echo $aa ?>"><?php echo "$av"; ?></option>
				<?php
					}
				?>
			</select>
			<label style="display:none;"><b>Abono 3</b></label>
			<input style="display:none;" type="number" class="blanc" id="abnC" placeholder="Abono 3" />
			<label style="display:none;"><b>Fecha Abono 3</b></label>
			<input style="display:none;" type="date" id="fechaabonoC" placeholder="AAA-MM-DD (Fecha abono 3)" />
			<label style="display:none;"><b>Estado Abono 3</b></label>
			<select style="display:none;" id="estdC">
				<?php
					for ($aa=0; $aa <=2 ; $aa++) { 
						switch ($aa) {
							case '0':
								$av="Estado Abono 3";
								break;
							case '1':
								$av="Pendiente";
								break;
							case '2':
								$av="Pagado";
								break;
							default:
								$av="Error";
								break;
						}
				?>
				<option value="<?php echo $aa ?>"><?php echo "$av"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Saldo</b></label>
			<input type="number" class="blanc" id="saldo" placeholder="Saldo" />
			<label style="display:none;"><b>En caja</b></label>
			<input style="display:none;" type="number" class="blanc" id="caja" placeholder="En caja" />
			<label><b>Fecha Inicio</b></label>
			<input type="date" class="blanc" id="aafi" placeholder="Fecha Inicio" />
			<label><b>Fecha Fin</b></label>
			<input type="date" class="blanc" id="aaff" placeholder="Fecha Fin" />
			<label style="display:none;"><b>Estado del Plan</b></label>
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
					style="width:5em;text-align:center;" value="2015" required="required" />
			</article>
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
					style="width:5em;text-align:center;" value="2015" required="required" />
			</article>
			<select style="display:none;" id="estdplansg">
				<?php
					for ($X=1; $X <=3 ; $X++) { 
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
				<option value="<?php echo $X ?>"><?php echo "$optdplan"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Redirecionador</b></label>
			<select id="redirecionador">
				<option value="0">Redirecionador</option>
				<?php
					$redird="SELECT * from direcionador order by nam_direcion asc";
					$sqldird=mysql_query($redird,$conexion) or die (mysql_error());
					while ($dr=mysql_fetch_array($sqldird)) {
						$idDR=$dr['id_direcion'];
						$namDR=$dr['nam_direcion'];
				?>
				<option value="<?php echo $idDR ?>"><?php echo "$namDR"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Valor Pagar</b></label>
			<input type="number" class="blanc" id="valordirecC" placeholder="Valor Pagar" />
			<label><b>Estado Direcionador</b></label>
			<select id="estadodirecionseg">
				<?php
					for ($Y=1; $Y <=3 ; $Y++) { 
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
								$apt="Pendiente";
								break;
							default:
								$apt="Error";
								break;
						}
				?>
				<option value="<?php echo $Y ?>"><?php echo "$apt"; ?></option>
				<?php
					}
				?>
			</select>
			<label style="display:none;"><b>Insumos</b></label>
			<input style="display:none;" type="number" class="blanc" id="insumos" placeholder="Insumos" />
			<label style="display:none;"><b>Estado Insumo</b></label>
			<select style="display:none;" id="estadoisumos">
				<?php
					for ($Z=1; $Z <=3 ; $Z++) { 
						switch ($Z) {
							case '0':
								$bpt="Estado Insumos";
								break;
							case '1':
								$bpt="Proceso";
								break;
							case '2':
								$bpt="Pagado";
								break;
							case '3':
								$bpt="Cancelado";
								break;
							default:
								$bpt="Error";
								break;
						}
				?>
				<option value="<?php echo $Z ?>"><?php echo "$bpt"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Proveeodor</b></label>
			<select id="proveedor">
				<option value="0">Proveedor</option>
				<?php
					$prove="SELECT * from proveedores order by name_prove asc";
					$sqlprove=mysql_query($prove,$conexion) or die (mysql_error());
					while ($pv=mysql_fetch_array($sqlprove)) {
						$idPV=$pv['id_proveedor'];
						$naPV=$pv['name_prove'];
				?>
				<option value="<?php echo $idPV ?>"><?php echo "$naPV"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Precio Proveedor</b></label>
			<input type="number" class="blanc" id="preciprove" placeholder="Precio Proveedor" />
			<label style="display:none;"><b>Estado Proveedor</b></label>
			<select style="display:none;" id="estadoprove">
				<option value="0">Estado Proveedor</option>
				<option value="1">Pendiente</option>
				<option value="2">Pagado</option>
			</select>
			<label><b>Dominio</b></label>
			<input type="text" class="blanc" id="dominio" placeholder="Dominio" />
			<label><b>FTP</b></label>
			<input type="text" class="blanc" id="ftp" placeholder="FTP" />
			<label><b>Usuario</b></label>
			<input type="text" class="blanc" id="usuarioserv" placeholder="Usuario" />
			<label><b>Contraseña</b></label>
			<input type="text" class="blanc" id="passworddom" placeholder="Contraseña" />
			<label><b>Fecha Renovación</b></label>
			<input type="date" class="blanc" id="bbfr" placeholder="Fecha Renovación" />
			<article id="fechas" style="display:none;">
				<select id="fdR" name="fdR">
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesR" id="fmesR">
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
				<input type="number" id="yearR" name="yearinR" placeholder="9999" 
					style="width:5em;text-align:center;" value="2015" required="required" />
			</article>
			<article id="fechas" class="redecl">
				<figure data-red="1">
					<img src="../imagenes/Email.png" alt="Correo" />
				</figure>
				<figure data-red="2">
					<img src="../imagenes/Facebook.png" alt="Facebook" />
				</figure>
				<figure data-red="3">
					<img src="../imagenes/Instagram.png" alt="Instagram" />
				</figure>
				<figure data-red="4">
					<img src="../imagenes/Pinterest.png" alt="Pinterest" />
				</figure>
				<figure data-red="5">
					<img src="../imagenes/Linkedin.png" alt="Linkedin" />
				</figure>
				<figure data-red="6">
					<img src="../imagenes/Twitter.png" alt="Twitter" />
				</figure>
				<figure data-red="7">
					<img src="../imagenes/MySpace.png" alt="Adminis" />
				</figure>
			</article>
			<label style="display:none;" id="c"><b>Correo</b></label>
			<input style="display:none;" type="email" class="blanc" id="corrercorreo" placeholder="Correo" />
			<label style="display:none;" id="cr"><b>Cotraseña</b></label>
			<input style="display:none;" type="text" class="blanc" id="pasccrrr" placeholder="Cotraseña" />
			<label style="display:none;" id="f"><b>Usuario Facebook</b></label>
			<input style="display:none;" type="email" class="blanc" id="usface" placeholder="Usuario Facebook" />
			<label style="display:none;" id="fr"><b>Contraseña Facebook</b></label>
			<input style="display:none;" type="text" class="blanc" id="facepass" placeholder="Contraseña Facebook" />
			<label style="display:none;" id="i"><b>Usuario Instagram</b></label>
			<input style="display:none;" type="email" class="blanc" id="usinst" placeholder="Usuario Instagram" />
			<label style="display:none;" id="ir"><b>Contraseña Instagram</b></label>
			<input style="display:none;" type="text" class="blanc" id="instpass" placeholder="Contraseña Instagram" />
			<label style="display:none;" id="p"><b>Usuario Pinters</b></label>
			<input style="display:none;" type="email" class="blanc" id="uspints" placeholder="Usuario Pinters" />
			<label style="display:none;" id="pr"><b>Contraseña Pinters</b></label>
			<input style="display:none;" type="text" class="blanc" id="pintspass" placeholder="Contraseña Pinters" />
			<label style="display:none;" id="l"><b>Usuario Likind</b></label>
			<input style="display:none;" type="text" class="blanc" id="uslikind" placeholder="Usuario Likind" />
			<label style="display:none;" id="lr"><b>Contraseña Likind</b></label>
			<input style="display:none;" type="text" class="blanc" id="likindpass" placeholder="Contraseña Likind" />
			<label style="display:none;" id="t"><b>Usuario Twitter</b></label>
			<input style="display:none;" type="text" class="blanc" id="ustwiter" placeholder="Usuario Twitter" />
			<label style="display:none;" id="tr"><b>Contraseña Twitter</b></label>
			<input style="display:none;" type="text" class="blanc" id="twitterpass" placeholder="Contraseña Twitter" />
			<label style="display:none;" id="a"><b>Link administrador</b></label>
			<input style="display:none;" type="url" class="blanc" id="lkurl" placeholder="http://wwww.dominio.com/admin/" />
			<label style="display:none;" id="ad"><b>Administrador</b></label>
			<input style="display:none;" type="text" class="blanc" id="adurl" placeholder="Nombre usuario o correo del administrador" />
			<label style="display:none;" id="ap"><b>Contraseña</b></label>
			<input style="display:none;" type="text" class="blanc" id="psurl" placeholder="Contraseña del administrador" />
			<div id="mensajeseguimiento"></div>
			<input type="submit" value="Ingresar" id="ingrseguimiento" class="botonstyle" />
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