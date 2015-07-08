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
	<title>Tareas</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingrestareas.js"></script>
	<script src="../js/busqstareas.js"></script>
</head>
<body>
	<header>
		<div id="ifmorver" class="veradmC">
			<?php 
				// echo "$usuariounico";
				$imagenadv="../".$avatar;
			?>
			<figure style="background-image:url(<?php echo $imagenadv ?>);">
				<!--Imagen-->
			</figure>
		</div>
		<nav>
			<a href="mis_tareas">Mis tareas</a>
			<a href="../cerrar">Salir</a>
		</nav>
		<div class="botnomenu">
			<center><img src="../imagenes/abajo_b.png" alt="abajo" /></center>
		</div>
		<aside>
			<div id="ContP"><a href="../contabilidad">Contabilidad</a></div>
			<div id="SegP"><a href="../administrador">Seguimiento</a></div>
			<div id="TareP" class="sipprimarel"><a href="../tareas">Tareas</a></div>
		</aside>
	</header><!-- /header -->
	<section>
		<h1>Busqueda Tareas</h1>
		<article id="menub">
			<div id="Vtas">Ver Tareas</div>
			<div id="Atas">Agregar tarea</div>
			<div id="Bustas">Busqueda Tareas</div>
		</article>
		<article id="verdatos">
			<select id="seguiB">
				<option value="0">Seguimiento</option>
				<?php
					$planess="SELECT seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
					seguimiento.descuento,seguimiento.abono1,seguimiento.abono2,seguimiento.abono3,
					seguimiento.saldo,seguimiento.en_caja,seguimiento.fi_plan,seguimiento.ff_plan,
					seguimiento.estad_plan,seguimiento.redirec_id,seguimiento.valor_p_dire,
					seguimiento.estado_pag_dire,seguimiento.insumos,seguimiento.estado_insumo,
					seguimiento.id_provee,seguimiento.precio_t_prove,seguimiento.dominio,
					seguimiento.ftp,seguimiento.usuario,seguimiento.pass_usuario_dm,seguimiento.fech_r,
					seguimiento.correo_correo,seguimiento.pass_correo,seguimiento.usuario_face,
					seguimiento.pass_face,seguimiento.usuario_inst,seguimiento.pass_inst,
					seguimiento.usuario_pinters,seguimiento.pass_pinters,seguimiento.usuario_likind,
					seguimiento.pass_likind,seguimiento.usuario_twitter,seguimiento.pass_twitter,
					seguimiento.fecha_ingreso,
					empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
					empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
					planes.id_plan,planes.nombre_plan 
					from seguimiento 
						inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
					order by seguimiento.id_seguimineto asc";
					$sqlplan=mysql_query($planess,$conexion) or die (mysql_error());
					while ($pl=mysql_fetch_array($sqlplan)) {
						$idPL=$pl['id_seguimineto'];
						$namPL=$pl['nombre_plan'];
						$namEP=$pl['name_empr'];
				?>
				<option value="<?php echo $idPL ?>"><?php echo "$idPL--$namPL--$namEP"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="respadmB">
				<option value="0">Responsables</option>
				<?php
					$resv="SELECT * from administrador order by usuadmin asc";
					$sqlres=mysql_query($resv,$conexion) or die (mysql_error());
					while ($reg=mysql_fetch_array($sqlres)) {
						$idR=$reg['id_admin'];
						$namR=$reg['usuadmin'];
				?>
				<option value="<?php echo $idR ?>"><?php echo "$idR--$namR"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="text" id="nimetareaB" placeholder="Nombre tarea" />
			<article id="fechas">
				<select id="fdiB" name="fdi">
					<option value="0">Dia Inicio</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesi" id="fmesiB">
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
				<input type="number" id="yeariB" name="yearinF" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<article id="fechas">
				<select id="fdFB" name="fdF">
					<option value="0">Dia Fin</option>
					<?php
					for ($s=1; $s <=31 ; $s++) { 
					?>
					<option value="<?php echo $s ?>"><?php echo "$s"; ?></option>
					<?php
					}
					?>
				</select>
				<select name="fmesF" id="fmesFB">
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
				<input type="number" id="yearFB" name="yearinF" placeholder="9999" 
					style="width:5em;text-align:center;" required="required" />
			</article>
			<input type="submit" id="buscartareas" class="botonstyle" value="Buscar" />
		</article>
		<article id="tareasbusenc" class="disentablasbusqsincroll">
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