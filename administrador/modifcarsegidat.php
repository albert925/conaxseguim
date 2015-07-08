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
		$idTS=$_GET['idSEG'];
		if ($idTS=="") {
			echo "<script>";
				echo "alert('Id Seguimiento no disponible');";
				echo "var pag='../administrador';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$mysqlver="SELECT * from seguimiento where id_seguimineto='$idTS'";
			$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
			while ($ps=mysql_fetch_array($sql)) {
				$caa=$ps['id_seguimineto'];
				$cab=$ps['empre_id_seg'];
				$cac=$ps['plan_id_seg'];
				$cad=$ps['descuento'];
				$cae=$ps['abono1'];
				$caf=$ps['abono2'];
				$cag=$ps['abono3'];
				$cah=$ps['saldo'];
				$cai=$ps['en_caja'];
				$caj=$ps['fi_plan'];
				$cak=$ps['ff_plan'];
				$cal=$ps['estad_plan'];
				$cam=$ps['redirec_id'];
				$can=$ps['valor_p_dire'];
				$cao=$ps['insumos'];
				$cap=$ps['estado_insumo'];
				$caq=$ps['id_provee'];
				$car=$ps['precio_t_prove'];
				$cas=$ps['dominio'];
				$cat=$ps['ftp'];
				$cau=$ps['usuario'];
				$cav=$ps['pass_usuario_dm'];
				$caw=$ps['fech_r'];
				$cax=$ps['correo_correo'];
				$cay=$ps['pass_correo'];
				$caz=$ps['usuario_face'];
				$cba=$ps['pass_face'];
				$cbb=$ps['usuario_inst'];
				$cbc=$ps['pass_inst'];
				$cbd=$ps['usuario_pinters'];
				$cbe=$ps['pass_pinters'];
				$cbf=$ps['usuario_likind'];
				$cbg=$ps['pass_likind'];
				$cbh=$ps['usuario_twitter'];
				$cbi=$ps['pass_twitter'];
				$cbj=$ps['fecha_ingreso'];
				$cbk=$ps['estado_pag_dire'];
				$cbl=$ps['fecabA'];
				$cbm=$ps['fecabB'];
				$cbn=$ps['fecabC'];
				$cbo=$ps['estdA'];
				$cbp=$ps['estdB'];
				$cbq=$ps['estdC'];
				$cbr=$ps['estad_prove'];
				$cbs=$ps['link_adm'];
				$cbt=$ps['us_adm'];
				$cbu=$ps['pass_adm'];
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
		<h1>Modifcion del seguimiento id <?php echo "$caa"; ?></h1>
		<article id="menub">
			<div id="Vsgub">Ver Seguimiento</div>
			<div id="Agseg">Agregar Seguimiento</div>
			<div id="Busseg">Busqueda Seguimiento</div>
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
			<div id="precplB"></div>
			<?php
				$busplan="SELECT * from planes where id_plan='$cac'";
				$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
				while ($pl=mysql_fetch_array($sqlplan)) {
					$idPL=$pl['id_plan'];
					$namPL=$pl['nombre_plan'];
					$precPL=$pl['precio_plan'];
					$desct=$precPL*0.05;
				}
			?>
			<input type="number" value="<?php echo $cad ?>" class="blanc" id="descuentoB" placeholder="Descuento Max 5%" data-prec="<?php echo $desct ?>" />
			<input type="number" value="<?php echo $cae ?>" class="blanc" id="abnAB" placeholder="Abono" />
			<input style="display:none;" type="date" id="fechaabonoAB" value="<?php echo $cbl ?>" placeholder="AAA-MM-DD (Fecha abono 1)" />
			<select style="display:none;" id="estdAB">
				<?php
					for ($aa=0; $aa <=2 ; $aa++) { 
						if ($aa==$cbo) {
							$yabasta="selected";
						}
						else{
							$yabasta="";
						}
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
				<option value="<?php echo $aa ?>" <?php echo $yabasta ?>><?php echo "$av"; ?></option>
				<?php
					}
				?>
			</select>
			<input style="display:none;" type="number" value="<?php echo $caf ?>" class="blanc" id="abnBB" placeholder="Abono 2" />
			<input style="display:none;" type="date" id="fechaabonoBB" value="<?php echo $cbm ?>" placeholder="AAA-MM-DD (Fecha abono 2)" />
			<select style="display:none;" id="estdBB">
				<?php
					for ($bb=0; $bb <=2 ; $bb++) { 
						if ($bb==$cbp) {
							$yabastb="selected";
						}
						else{
							$yabastb="";
						}
						switch ($bb) {
							case '0':
								$bv="Estado Abono 2";
								break;
							case '1':
								$bv="Pendiente";
								break;
							case '2':
								$bv="Pagado";
								break;
							default:
								$bv="Error";
								break;
						}
				?>
				<option value="<?php echo $bb ?>" <?php echo $yabastb ?>><?php echo "$bv"; ?></option>
				<?php
					}
				?>
			</select>
			<input style="display:none;" type="number" value="<?php echo $cag ?>" class="blanc" id="abnCB" placeholder="Abono 3" />
			<input style="display:none;" type="date" id="fechaabonoCB" value="<?php echo $cbn ?>" placeholder="AAA-MM-DD (Fecha abono 3)" />
			<select style="display:none;" id="estdCB">
				<?php
					for ($cc=0; $cc <=2 ; $cc++) { 
						if ($cc==$cbq) {
							$yabastc="selected";
						}
						else{
							$yabastc="";
						}
						switch ($cc) {
							case '0':
								$cv="Estado Abono 3";
								break;
							case '1':
								$cv="Pendiente";
								break;
							case '2':
								$cv="Pagado";
								break;
							default:
								$cv="Error";
								break;
						}
				?>
				<option value="<?php echo $cc ?>" <?php echo $yabastc ?>><?php echo "$cv"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="number" value="<?php echo $cah ?>" class="blanc" id="saldoB" placeholder="Saldo" />
			<input style="display:none;" type="number" value="<?php echo $cai ?>" class="blanc" id="cajaB" placeholder="En caja" />
			<select style="display:none;" id="estdplansgB">
				<?php
					for ($X=1; $X <=3 ; $X++) { 
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
			<input type="number" value="<?php echo $can ?>" class="blanc" id="valordirecCB" placeholder="Valor Pagar" />
			<select style="display:none;" id="estadodirecionsegB">
				<?php
					for ($Y=1; $Y <=3 ; $Y++) { 
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
								$apt="Pendiente";
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
			<input style="display:none;" type="number" value="<?php echo $cao ?>" class="blanc" id="insumosB" placeholder="Insumos" />
			<select style="display:none;" id="estadoisumosB">
				<?php
					for ($Z=1; $Z <=3 ; $Z++) {
						if ($Z==$cap) {
						 	$ecF="selected";
						}
						else{
							$ecF="";
						}
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
				<option value="<?php echo $Z ?>" <?php echo $ecF ?>><?php echo "$bpt"; ?></option>
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
			<input type="number" value="<?php echo $car ?>" class="blanc" id="preciproveB" placeholder="Precio Proveedor" />
			<select id="etadoproveB">
				<?php
					for ($h=0; $h <=2 ; $h++) { 
						if ($h==$cbr) {
							$akh="selected";
						}
						else{
							$akh="";
						}
						switch ($h) {
							case '0':
								$hhh="Estado Proveedor";
								break;
							case '1':
								$hhh="Pendiente";
								break;
							case '2':
								$hhh="Pagado";
								break;
							default:
								$hhh="error";
								break;
						}
				?>
				<option value="<?php echo $h ?>" <?php echo $akh ?>><?php echo "$hhh"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="text" value="<?php echo $cas ?>" class="blanc" id="dominioB" placeholder="Dominio" />
			<input type="text" value="<?php echo $cat ?>" class="blanc" id="ftpB" placeholder="FTP" />
			<input type="text" value="<?php echo $cau ?>" class="blanc" id="usuarioservB" placeholder="Usuario" />
			<input type="text" value="<?php echo $cav ?>" class="blanc" id="passworddomB" placeholder="Contraseña" />
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
			<input style="display:none;" type="email" value="<?php echo $cax ?>" class="blanc" id="corrercorreoB" placeholder="Correo" />
			<input style="display:none;" type="text" value="<?php echo $cay ?>" class="blanc" id="pasccrrrB" placeholder="Cotraseña" />
			<input style="display:none;" type="email" value="<?php echo $caz ?>" class="blanc" id="usfaceB" placeholder="Usuario Facebook" />
			<input style="display:none;" type="text" value="<?php echo $cba ?>" class="blanc" id="facepassB" placeholder="Contraseña Facebook" />
			<input style="display:none;" type="email" value="<?php echo $cbb ?>" class="blanc" id="usinstB" placeholder="Usuario Instagram" />
			<input style="display:none;" type="text" value="<?php echo $cbc ?>" class="blanc" id="instpassB" placeholder="Contraseña Instagram" />
			<input style="display:none;" type="email" value="<?php echo $cbd ?>" class="blanc" id="uspintsB" placeholder="Usuario Pinters" />
			<input style="display:none;" type="text" value="<?php echo $cbe ?>" class="blanc" id="pintspassB" placeholder="Contraseña Pinters" />
			<input style="display:none;" type="text" value="<?php echo $cbf ?>" class="blanc" id="uslikindB" placeholder="Usuario Likind" />
			<input style="display:none;" type="text" value="<?php echo $cbg ?>" class="blanc" id="likindpassB" placeholder="Contraseña Likind" />
			<input style="display:none;" type="text" value="<?php echo $cbh ?>" class="blanc" id="ustwiterB" placeholder="Usuario Twitter" />
			<input style="display:none;" type="text" value="<?php echo $cbi ?>" class="blanc" id="twitterpassB" placeholder="Contraseña Twitter" />
			<input style="display:none;" type="url" value="<?php echo $cbs ?>" class="blanc" id="lkurlB" placeholder="http://wwww.dominio.com/admin/" />
			<input style="display:none;" type="text" value="<?php echo $cbt ?>" class="blanc" id="adurlB" placeholder="Nombre usuario o correo del administrador" />
			<input style="display:none;" type="text" value="<?php echo $cbu ?>" class="blanc" id="psurlB" placeholder="Contraseña del administrador" />
			<div id="mensajfinseg"></div>
			<input type="submit" value="Modificar" id="modifdatssegui" class="botonstyle" data-seg="<?php echo $idTS ?>" />
		</article>
		<article id="verdatos">
			<h2>Modifcacion fechas</h2>
			<div>
				<b>Fecha Inicio:</b> <?php echo "$caj"; ?><br />
				<b>Fecha Fin:</b> <?php echo "$cak"; ?><br />
				<b>Fecha Renovación:</b> <?php echo "$caw"; ?><br />
				<b>Fecha Seguimiento: </b><?php echo "$cbj"; ?>
			</div>
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
			<div id="mesinda"></div>
			<input type="submit" value="Modificar" id="modifin" class="botonstyle" data-dos="<?php echo $caa ?>" />
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
			<div id="mesfinda"></div>
			<input type="submit" value="Modificar" id="modiffin" class="botonstyle" data-dos="<?php echo $caa ?>" />
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
			<div id="mesrenda"></div>
			<input type="submit" value="Modificar" id="modifrev" class="botonstyle" data-dos="<?php echo $caa ?>" />
			<article id="fechas">
				<select id="fdPB" name="fdPB">
					<option value="0">Dia Seguimiento</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesPB" id="fmesPB">
					<option value="0">Mes Seguimiento</option>
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
				<input type="number" id="yearPB" name="yearinPB" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<div id="mespublic"></div>
			<input type="submit" value="Modificar" id="modipublic" class="botonstyle" data-dos="<?php echo $caa ?>" />
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