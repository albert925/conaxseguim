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
	<title>Comercial</title>
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
						<a href="../tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../tareas/indicador">Indicadores</a></li>
							<li><a href="../tareas/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../comercial" class="selecionado">Comercial</a></li>
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
		<h1>Meta</h1>
		<article id="menub">
			<div id="NuvMet">Nuevo Meta</div>
			<div id="VerMetotro">Metas de otros meses</div>
			<div id="VerMetodrB">Metas de otros meses Direcionador</div>
			<div id="VerMeto">Meta Actual</div>
			<div id="VerMetoB">Meta Actual Direcionados</div>
			<div id="VerIcont">Ingresos Comercial</div>
			<div id="NuvMDrc">Nuevo Meta Direcionador</div>
		</article>
		<article id="sinscroll">
				<?php
					$DH=date("d");
					$MH=date("n");
					$MHB=date("m");
					$YH=date("Y");
					$dia_hoy=$YH."-".$MH."-".$DH;
					$metassql="SELECT * from metab where mes_mtB='$MH' and year_mtB='$YH' order by id_metB asc";
					$dentrosql=mysql_query($metassql,$conexion) or die (mysql_error());
					while ($mt=mysql_fetch_array($dentrosql)) {
						$idM=$mt['id_metB'];
						$prM=$mt['precio_mtB'];
						$resM=$mt['restante_mtB'];
						$mesM=$mt['mes_mtB'];
						$yearM=$mt['year_mtB'];
						$drd=$mt['direc_id'];
						switch ($mesM) {
							case '1':
								$nombmes="Enero";
								break;
							case '2':
								$nombmes="Febrero";
								break;
							case '3':
								$nombmes="Marzo";
								break;
							case '4':
								$nombmes="Abril";
								break;
							case '5':
								$nombmes="Mayo";
								break;
							case '6':
								$nombmes="Junio";
								break;
							case '7':
								$nombmes="Julio";
								break;
							case '8':
								$nombmes="Agosto";
								break;
							case '9':
								$nombmes="Septiembre";
								break;
							case '10':
								$nombmes="Octubre";
								break;
							case '11':
								$nombmes="Noviembre";
								break;
							case '12':
								$nombmes="Diciembre";
								break;
							default:
								$nombmes="Meses";
								break;
						}
						$nombre_direcio="SELECT * from direcionador where id_direcion='$drd'";
						$sql_name=mysql_query($nombre_direcio,$conexion) or die (mysql_error());
						while ($fnd=mysql_fetch_array($sql_name)) {
							$nombreDirecionador=$fnd['nam_direcion'];
						}
						$Paf=number_format($prM,2);
						$reF=number_format($resM,2);
				?>
			<br/>
			<table border="1" id="segitable" class="tamne" title="la Tabla No es adaptable">
				<tr>
					<td colspan="2"><?php echo "<b>$nombreDirecionador</b>"; ?></td>
				</tr>
				<tr>
					<td><b>Mes</b></td>
					<td><?php echo "$nombmes"; ?></td>
				</tr>
				<tr>
					<td><b>Meta</b></td>
					<td><b style="color:#00A5D4;;">$<?php echo "$Paf"; ?></b></td>
				</tr>
				<tr>
					<td><b>Restante</b></td>
					<td><b style="color:#FF3C3C;">$<?php echo "$reF"; ?></b></td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="modifcarmetaBb.php?idmet=<?php echo $idM ?>" style="color:#FAFF1E;">Modifcar</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="borrarmetaBb.php?idmet=<?php echo $idM ?>" style="color:#FAFF1E;" class="deli">Borrar</a>
					</td>
				</tr>
			</table>
			<br/>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<?php
						$seguidesc="SELECT seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
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
					where seguimiento.mes_in='$MHB' and seguimiento.year_in='$YH' and seguimiento.redirec_id='$drd' 
					order by seguimiento.year_in,seguimiento.mes_in asc";
						$sqlsegi=mysql_query($seguidesc,$conexion) or die (mysql_error());
				?>
				<tr>
					<td><b>Empresa</b></td>
					<td><b>Plan</b></td>
					<td><b>Valor</b></td>
					<td><b>Descuento</b></td>
					<td><b>Rappe</b></td>
					<td><b>Direccionador</b></td>
				</tr>
				<?php
						$sumarape=0;
						while ($sg=mysql_fetch_array($sqlsegi)) {
							$caa=$sg['id_seguimineto'];
							$cab=$sg['nombre_plan'];
							$cad=$sg['name_empr'];
							$cae=$sg['descuento'];
							$caf=$sg['plan_id_seg'];
							$cam=$sg['redirec_id'];
							$busplan="SELECT * from planes where id_plan='$caf'";
							$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
							while ($pl=mysql_fetch_array($sqlplan)) {
								$idPL=$pl['id_plan'];
								$namPL=$pl['nombre_plan'];
								$precPL=$pl['precio_plan'];
							}
							$fRA=number_format($precPL,2);
							$fRB=number_format($cae,2);
				?>
				<tr>
					<td><?php echo "$cad"; ?></td>
					<td><?php echo "$cab"; ?></td>
					<td>$<?php echo "$fRA"; ?></td>
					<td>$<?php echo "$fRB"; ?></td>
					<td>$
						<?php
							$resta=$precPL-$cae;
							$fRD=number_format($resta,2);
							echo "$fRD";
						?>
					</td>
					<td>
						<?php
							$redireV="SELECT * from direcionador where id_direcion='$cam'";
							$sqlredi=mysql_query($redireV,$conexion) or die (mysql_error());
							while ($dr=mysql_fetch_array($sqlredi)) {
								$idDR=$dr['id_direcion'];
								$naDR=$dr['nam_direcion'];
							}
							echo "$naDR";
						?>
					</td>
				</tr>
				<?php
							$sumarape=$resta+$sumarape;
						}
						$metar=$prM-$sumarape;
						$modifcaion="UPDATE metab set restante_mtB='$metar' where id_metB='$idM'";
						mysql_query($modifcaion,$conexion) or die (mysql_error());
						$fRC=number_format($sumarape,2);
				?>
				<tr>
					<td colspan="4"></td>
					<td id="resulrap">$<b style="color:#FF3C3C;"><?php echo "$fRC"; ?></b></td>
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
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>