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
		$idPPr=$_GET['idpg'];
		if ($idPPr=="") {
			echo "<script>";
				echo "alert('Id de pagos no disponible');";
				echo "var pag='../pagos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$cambios="SELECT pagos.id_pago, pagos.terceros_id,pagos.fecha_p,
				pagos.valor_p,pagos.concepto_p,pagos.estado_p,pagos.idadP,pagos.tipo_pago,
				terceros.id_tercer,terceros.nomb_terc,
				administrador.id_admin,administrador.usuadmin 
				from pagos 
					inner join terceros on(pagos.terceros_id=terceros.id_tercer) 
					inner join administrador on(pagos.idadP=administrador.id_admin) 
				where pagos.id_pago='$idPPr'";
			$camsql=mysql_query($cambios,$conexion) or die (mysql_error());
			while ($ps=mysql_fetch_array($camsql)) {
				$idP=$ps['id_pago'];
				$idtercP=$ps['terceros_id'];
				$namterP=$ps['nomb_terc'];
				$idadminP=$ps['idadP'];
				$nombadminP=$ps['usuadmin'];
				$fecP=$ps['fecha_p'];
				$valP=$ps['valor_p'];
				$conP=$ps['concepto_p'];
				$tpP=$ps['tipo_pago'];
				$estP=$ps['estado_p'];
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
		<h1>Modifcación pagos <?php echo "$idP"; ?></h1>
		<article id="menub">
			<div id="Aterc">Agregar Terceros</div>
			<div id="Atepag">Agregar Pagos</div>
			<div id="Vepag">Ver Pagos</div>
			<div id="Veterc">Ver Terceros</div>
			<div id="PagosDirec">Direcionador</div>
			<div id="Domin">Dominios</div>
		</article>
		<article id="verdatos">
			<div>
				<b>Tercero: </b><?php echo "$namterP"; ?>
			</div>
			<select id="nutipoPP">
				<option value="0">Tipo Terceros</option>
				<option value="1">Acreedor</option>
				<option value="2">Cliente</option>
				<option value="3">Empleado</option>
				<option value="4">Proveedor</option>
				<option value="5">Otros</option>
			</select>
			<select id="usuterceros">
				<option value="0">Terceros</option>
			</select>
			<div id="mesanjA"></div>
			<input type="submit" id="modifcadatsA" class="botonstyle" value="Modificar" data-adm="<?php echo $idad ?>" data-idp="<?php echo $idP ?>" />
		</article>
		<article id="verdatos">
			<select id="tipPgF">
				<?php
					for ($pGt=0; $pGt <=2 ; $pGt++) {
						if ($pGt==$tpP) {
							$seltipo="selected";
						}
						else{
							$seltipo="";
						}
						switch ($pGt) {
							case '0':
								$plagtiops="Tipo de pago";
								break;
							case '1':
								$plagtiops="Gastos Fijos";
								break;
							case '2':
								$plagtiops="Gastos Variables";
								break;
							default:
								$plagtiops="Error";
								break;
						}
				?>
				<option value="<?php echo $pGt ?>" <?php echo $seltipo ?>><?php echo "$plagtiops"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="number" id="valorP" value="<?php echo $valP ?>" placeholder="Valor" />
			<textarea id="concepP" cols="20" placeholder="Concepto"><?php echo "$conP"; ?></textarea>
			<select id="estdP">
				<?php
					for ($x=0; $x <=2 ; $x++) { 
						if ($x==$estP) {
							$xx="selected";
						}
						else{
							$xx="";
						}
						switch ($x) {
							case '0':
								$xxx="Estado Pago";
								break;
							case '1':
								$xxx="Pendiente";
								break;
							case '2':
								$xxx="Pagado";
								break;
							default:
								$xxx="Error";
								break;
						}
				?>
				<option value="<?php echo $x ?>" <?php echo $xx ?>><?php echo "$xxx"; ?></option>
				<?php
					}
				?>
			</select>
			<div id="mesanjB"></div>
			<input type="submit" id="modifcadatsB" class="botonstyle" value="Modificar" data-adm="<?php echo $idad ?>" data-idp="<?php echo $idP ?>" />
		</article>
		<article id="verdatos">
			<div>
				<b>Fecha: </b><?php echo "$fecP"; ?>
			</div>
			<article id="fechas">
				<select id="fdP" name="fdP">
					<option value="0">Dia</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesP" id="fmesP">
					<option value="0">Mes</option>
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
				<input type="number" id="yearP" name="yearinP" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<div id="mesanjC"></div>
			<input type="submit" id="fechamodifpagos" class="botonstyle" value="Modificar" data-adm="<?php echo $idad ?>" data-idp="<?php echo $idP ?>" />
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