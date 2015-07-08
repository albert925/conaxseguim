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
		$MsR=$_GET['ms'];
		if ($MsR=="") {
			echo "<script>";
				echo "alert('Mes no selecionado')";
				echo "var pag='../ingresos';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			switch ($MsR) {
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
					$nombmes="Error";
					break;
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Contabilidad</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingreingresos.js"></script>
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
		<h1>Mes <?php echo "$nombmes"; ?></h1>
		<article id="normalpagos" class="disentablasbusqsincroll">
			<?php
				$busdepart="SELECT * from departamento order by nam_depart";
				$sqdeaprt=mysql_query($busdepart,$conexion) or die (mysql_error());
				while ($dp=mysql_fetch_array($sqdeaprt)) {
					$idp=$dp['id_depart'];
					$nadp=$dp['nam_depart'];
					$buscaEmp="SELECT * from empresas where depart_emp='$idp'";
					$sqlbusc=mysql_query($buscaEmp,$conexion) or die (mysql_error());
					$numeroEnc=mysql_num_rows($sqlbusc);
					if ($numeroEnc>0) {
			?>
			<table border="1" id="segitable" title="la Tabla No es adaptable">
				<tr>
					<td colspan="3"><b><?php echo "$nadp"; ?></b></td>
				</tr>
				<tr>
					<td><b>Cliente</b></td>
					<td><b>Plan</b></td>
					<td><b>Precio</b></td>
				</tr>
				<?php
					$Yhoy=date("Y");
					$ksuma=0;
					$se_mes="SELECT seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
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
					where seguimiento.mes_in='$MsR' and seguimiento.year_in='$Yhoy' and empresas.depart_emp='$idp'";
					$sqlno=mysql_query($se_mes,$conexion) or die (mysql_error());
					while ($noh=mysql_fetch_array($sqlno)) {
						$caa=$noh['id_seguimineto'];
						$cab=$noh['nombre_plan'];
						$cad=$noh['name_empr'];
						$cae=$noh['descuento'];
						$caf=$noh['plan_id_seg'];
						$cam=$noh['redirec_id'];
						$busplan="SELECT * from planes where id_plan='$caf'";
						$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
						while ($pl=mysql_fetch_array($sqlplan)) {
							$idPL=$pl['id_plan'];
							$namPL=$pl['nombre_plan'];
							$precPL=$pl['precio_plan'];
						}
						$resta=$precPL-$cae;
						$ksuma=$resta+$ksuma;
				?>
				<tr>
					<td><?php echo "$cad"; ?></td>
					<td><?php echo "$namPL"; ?></td>
					<td><?php echo "$resta"; ?></td>
				</tr>
				<?php
					}
				?>
				<tr id="titol">
					<td colspan="2">Total</td>
					<td><b>$<?php echo "$ksuma"; ?></b></td>
				</tr>
			</table>
			<br />
			<br />
			<?php
					}
					else{
						echo "";
					}
				}
			?>
		</article>
		<article id="finfingresos" class="disentablasbusqsincroll"></article>
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