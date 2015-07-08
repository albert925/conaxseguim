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
			$tipoad=$adv['tip_adm'];
		}
		$emR=$_GET['EMP'];
		$c=$_GET['adm'];
		if ($emR=="" || $c=="") {
			echo "<script>";
				echo "alert('id empresa o id administrador no disponible');";
				echo "var pag='../clientes';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Clientes</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/clientes.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<?php
						if ($tipoad=="1") {
					?>
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
					<li><a href="../comercial">Comercial</a></li>
					<li><a href="../clientes" class="selecionado">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
						else{
					?>
					<li><a href="../users">Inicio</a></li>
					<li>
						<a href="../users/mis_tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../users/mis_tareas">Mis tareas</a></li>
							<li><a href="../users/indicador">Indicadores</a></li>
							<li><a href="../users/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../users/metas">Metas</a></li>
					<li><a href="../clientes" class="selecionado">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
					?>
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
		<h1>Busqueda Clientes</h1>
		<article id="menub">
			<div id="ajf">Nuevo correo corporativo</div>
		</article>
		<article id="caja" class="tdcj">
			<label>*<b>correo</b></label>
			<input type="email" id="corem" />
			<label>*<b>Contraseña</b></label>
			<input type="text" id="psem" />
			<label>*<b>POP3 o IMAP</b></label>
			<div>
				<label>*<b>Servidor</b></label>
				<input type="text" id="popem" />
				<label>*<b>Puertos</b></label>
				<input type="text" id="puertpop" />
			</div>
			<label>*<b>SMTP</b></label>
			<div>
				<label>*<b>Servidor</b></label>
				<input type="text" id="smptem" />
				<label>*<b>Puertos</b></label>
				<input type="text" id="puertsmpt" />
			</div>
			<div id="txcla"></div>
			<input type="submit" value="Ingresar" id="nccorpr" class="botonstyle" data-id="<?php echo $emR ?>" />
		</article>
		<article id="verdatos">
			<input type="text" id="nomemprB" placeholder="Nombre Empresa" data-tipadm="<?php echo $tipoad ?>" />
			<select id="empresaB">
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
			<!-- <select id="clienterempr">
				<option value="0">Selecione Cliente</option>
				<?php
					$clientver="SELECT * from clientes order by nombre_us asc";
					$sqlvercl=mysql_query($clientver,$conexion) or die (mysql_error());
					while ($rcl=mysql_fetch_array($sqlvercl)) {
						$idclP=$rcl['id_usuario'];
						$nomclP=$rcl['nombre_us'];
						$aplclP=$rcl['apellido_us'];
				?>
				<option value="<?php echo $idclP ?>"><?php echo "$idclP--$nomclP $aplclP"; ?></option>
				<?php
					}
				?>
			</select> -->
			<div id="setfinbusq"></div>
			<input type="submit" value="Buscar" id="busimfcl" data-tipadm="<?php echo $tipoad ?>" class="botonstyle" />
			<div id="empreplaR"></div>
		</article>
		<article id="ifomrfinA" class="diseflex"></article>
		<article id="oculsiesselect" class="diseflex">
			<?php
				$busqsl="SELECT empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
					empresas.direc_emp,empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
					clientes.nombre_us,clientes.apellido_us,clientes.correo_us,clientes.telefono_us,
					pais.nam_pais,departamento.nam_depart,ciudad.nam_ciudad 
					from empresas 
						inner join clientes on(empresas.usuario_id=clientes.id_usuario) 
						inner join pais on(empresas.pais_emp=pais.id_pais) 
						inner join departamento on(empresas.depart_emp=departamento.id_depart) 
						inner join ciudad on(empresas.ciudad_emp=ciudad.id_ciudad) 
					where empresas.id_empresa='$emR' 
					order by empresas.name_empr asc";
				$busqensql=mysql_query($busqsl,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($busqensql)) {
					$idemp=$ps['id_empresa'];
					$idclemp=$ps['usuario_id'];
					$namcl=$ps['nombre_us'];
					$apelcl=$ps['apellido_us'];
					$namemp=$ps['name_empr'];
					$nitemp=$ps['nit_emp'];
					$drcemp=$ps['direc_emp'];
					$psemp=$ps['nam_pais'];
					$dpemp=$ps['nam_depart'];
					$cdemp=$ps['nam_ciudad'];
					$corcl=$ps['correo_us'];
					$telcl=$ps['telefono_us'];
			?>
			<h2 id="cetrhb"><?php echo "$namemp"; ?></h2>
			<article class="disediver">
				<article>
					<h2>Información Empresa</h2>
					<p>
						<b>Nit:</b> <?php echo "$nitemp"; ?><br/>
						<b>Dirección:</b> <?php echo "$drcemp"; ?><br/>
						<b>Pais: </b><?php echo "$psemp"; ?><br/>
						<b>Depar/Est: </b><?php echo "$dpemp"; ?><br/>
						<b>Ciudad: </b><?php echo "$cdemp"; ?><br/>
					</p>
				</article>
				<article>
					<h2>Información Contacto</h2>
					<p>
						<b>Nombres: </b><?php echo "$namcl $apelcl"; ?><br />
						<b>Correo: </b><?php echo "$corcl"; ?><br />
						<b>Teléfono: </b><?php echo "$telcl"; ?><br />
					</p>
				</article>
			</article>
			<h2>Redes Sociales</h2>
			<article class="disediver">
			<?php
						$sqlseguim="SELECT seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
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
						seguimiento.fecha_ingreso,seguimiento.fecabA,seguimiento.fecabB,seguimiento.fecabC,
						seguimiento.estdA,seguimiento.estdB,seguimiento.estdC,seguimiento.estad_prove,seguimiento.link_adm,seguimiento.us_adm,seguimiento.pass_adm,
						empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
						empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp 
						from seguimiento 
							inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
						where seguimiento.empre_id_seg='$idemp' 
						order by seguimiento.fecha_ingreso asc";
						$ensqlseg=mysql_query($sqlseguim,$conexion) or die (mysql_error());
						while ($sp=mysql_fetch_array($ensqlseg)) {
							$caa=$sp['id_seguimineto'];
							$cab=$sp['empre_id_seg'];
							$cac=$sp['plan_id_seg'];
							$cad=$sp['descuento'];
							$cae=$sp['abono1'];
							$caf=$sp['abono2'];
							$cag=$sp['abono3'];
							$cah=$sp['saldo'];
							$cai=$sp['en_caja'];
							$caj=$sp['fi_plan'];
							$cak=$sp['ff_plan'];
							$cal=$sp['estad_plan'];
							$cam=$sp['redirec_id'];
							$can=$sp['valor_p_dire'];
							$cao=$sp['insumos'];
							$cap=$sp['estado_insumo'];
							$caq=$sp['id_provee'];
							$car=$sp['precio_t_prove'];
							$cas=$sp['dominio'];
							$cat=$sp['ftp'];
							$cau=$sp['usuario'];
							$cav=$sp['pass_usuario_dm'];
							$caw=$sp['fech_r'];
							$cax=$sp['correo_correo'];
							$cay=$sp['pass_correo'];
							$caz=$sp['usuario_face'];
							$cba=$sp['pass_face'];
							$cbb=$sp['usuario_inst'];
							$cbc=$sp['pass_inst'];
							$cbd=$sp['usuario_pinters'];
							$cbe=$sp['pass_pinters'];
							$cbf=$sp['usuario_likind'];
							$cbg=$sp['pass_likind'];
							$cbh=$sp['usuario_twitter'];
							$cbi=$sp['pass_twitter'];
							$cbj=$sp['fecha_ingreso'];
							$cbk=$sp['estado_pag_dire'];
							$cbl=$sp['fecabA'];
							$cbm=$sp['fecabB'];
							$cbn=$sp['fecabC'];
							$cbo=$sp['estdA'];
							$cbp=$sp['estdB'];
							$cbq=$sp['estdC'];
							$cbr=$sp['estad_prove'];
							$cbs=$sp['link_adm'];
							$cbt=$sp['us_adm'];
							$cbu=$sp['pass_adm'];
							if ($cax=="") {
								$wa="";
							}
							else{
								$wa="<figure>
									<img src='../imagenes/Email.png' alt='correo' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $cax<br/>
										<b>pass:</b> $cay<br/>
									</figcaption>
								</figure>";
							}
							if ($caz=="") {
								$wb="";
							}
							else{
								$wb="<figure>
									<img src='../imagenes/Facebook.png' alt='facebook' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $caz<br/>
										<b>pass:</b> $cba<br/>
									</figcaption>
								</figure>";
							}
							if ($cbb=="") {
								$wc="";
							}
							else{
								$wc="<figure>
									<img src='../imagenes/Instagram.png' alt='instagram' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $cbb<br/>
										<b>pass:</b> $cbc<br/>
									</figcaption>
								</figure>";
							}
							if ($cbd=="") {
								$wd="";
							}
							else{
								$wd="<figure>
									<img src='../imagenes/Pinterest.png' alt='pinters' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $cbd<br/>
										<b>pass:</b> $cbe<br/>
									</figcaption>
								</figure>";
							}
							if ($cbf=="") {
								$we="";
							}
							else{
								$we="<figure>
									<img src='../imagenes/Linkedin.png' alt='kinkedin' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $cbf<br/>
										<b>pass:</b> $cbg<br/>
									</figcaption>
								</figure>";
							}
							if ($cbh=="") {
								$wf="";
							}
							else{
								$wf="<figure>
									<img src='../imagenes/Twitter.png' alt='twitter' style='width:50px;' />
									<figcaption>
										<b>usuario:</b> $cbh<br/>
										<b>pass:</b> $cbi<br/>
									</figcaption>
								</figure>";
							}
							if ($cbs=="") {
								$wg="";
							}
							else{
								$wg="
								<figure>
									<img src='../imagenes/MySpace.png' alt='twitter' style='width:50px;' />
									<figcaption>
										<b>Link</b><br />
										$cbs<br />
										<b>usuario:</b> $cbt<br/>
										<b>pass:</b> $cbu<br/>
									</figcaption>
								</figure>";
							}
							echo "$wa";
							echo "$wb";
							echo "$wc";
							echo "$wd";
							echo "$we";
							echo "$wf";
							echo "$wg";
						}
			?>
			</article>
			<article id="menub">
				<?php
					$TOmPid="SELECT * from seguimiento where empre_id_seg=$idemp order by id_seguimineto asc limit 1";
					$sql_TOTOT=mysql_query($TOmPid,$conexion) or die (mysql_error());
					while ($zqO=mysql_fetch_array($sql_TOTOT)) {
						$RdRdidsg=$zqO['id_seguimineto'];
					}
				?>
				<a id="boea" href="modif_red_seg.php?is=<?php echo $RdRdidsg ?>">Modificar redes seguimiento</a>
			</article>
			<h2>Correos corporativos</h2>
			<article  class="disentablasbusqsincroll">
				<table border="1" id="segitable" title="la Tabla No es adaptable">
					<tr>
						<td><b>Correo</b></td>
						<td><b>Contraseña</b></td>
						<td><b>POP3 - IMAP</b></td>
						<td><b>Puerto POP3 - IMAP</b></td>
						<td><b>SMTP</b></td>
						<td><b>Puerto SMTP</b></td>
						<td></td>
						<td></td>
					</tr>
					<?php
						$Tdcop="SELECT * from corr_corp where empre_id=$emR order by corr_corp asc";
						$sql_tdscop=mysql_query($Tdcop,$conexion) or die (mysql_error());
						while ($supor=mysql_fetch_array($sql_tdscop)) {
							$idcu=$supor['id_corp'];
							$corcu=$supor['corr_corp'];
							$pscu=$supor['pass_corp'];
							$potrcu=$supor['pop3_imat'];
							$smtpcu=$supor['smpt'];
							$ptpotrcu=$supor['puerto_pop3'];
							$ptsmcu=$supor['puerto_imat'];
					?>
					<tr>
						<td><?php echo "$corcu"; ?></td>
						<td><?php echo "$pscu"; ?></td>
						<td><?php echo "$potrcu"; ?></td>
						<td><?php echo "$ptpotrcu"; ?></td>
						<td><?php echo "$smtpcu"; ?></td>
						<td><?php echo "$ptsmcu"; ?></td>
						<td>
							<a href="modif_corp_cor.php?psm=<?php echo $idcu ?>">Modificar</a>
						</td>
						<td>
							<a class="deli" href="borr_corp.php?br=<?php echo $idcu ?>&kem=<?php echo $emR ?>&kc=<?php echo $c ?>">Borrar</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
			</article>
			<h2>Financiero</h2>
			<article id="normalpagos" class="disentablasbusqsincroll">
				<table border="1" id="segitable" title="la Tabla No es adaptable">
					<tr>
						<td><b>Plan</b></td>
						<td><b>Valor</b></td>
						<td><b>Saldo</b></td>
					</tr>
					<?php
						$totals=0;
						$finacie="SELECT * from seguimiento 
								inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
								inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
						where empre_id_seg='$idemp'";
						$sqlfinacie=mysql_query($finacie,$conexion) or die (mysql_error());
						$numero=mysql_num_rows($sqlfinacie);
						while ($ffn=mysql_fetch_array($sqlfinacie)) {
							$caaFF=$ffn['id_seguimineto'];
							$cabFF=$ffn['nombre_plan'];
							$cadFF=$ffn['name_empr'];
							$caeFF=$ffn['descuento'];
							$cafFF=$ffn['plan_id_seg'];
							$camFF=$ffn['redirec_id'];
							$cahFF=$ffn['saldo'];
							$busplan="SELECT * from planes where id_plan='$cafFF'";
							$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
							while ($pl=mysql_fetch_array($sqlplan)) {
								$idPL=$pl['id_plan'];
								$namPL=$pl['nombre_plan'];
								$precPL=$pl['precio_plan'];
							}
							$resta=$precPL-$caeFF;
							$totals=$cahFF+$totals;
					?>
					<tr>
						<td><?php echo "$namPL"; ?></td>
						<td>$<?php echo "$resta"; ?></td>
						<td>$<?php echo "$cahFF"; ?></td>
					</tr>
					<?php
						}
					?>
					<tr id="titol">
						<td colspan="2">Total</td>
						<td><b>$<?php echo "$totals"; ?></b></td>
					</tr>
				</table>
			</article>
			<?php
				if ($c=="1") {
			?>
			<h2>Tareas</h2>
			<article class="disediver">
			<?php
					$seguibdos="SELECT * from seguimiento where empre_id_seg='$idemp' order by fecha_ingreso asc";
					$sqlsegiudos=mysql_query($seguibdos,$conexion) or die (mysql_error());
					while ($ks=mysql_fetch_array($sqlsegiudos)) {
						$caatwo=$ks['id_seguimineto'];
						$teraver="SELECT tareas.id_tarea,tareas.segui_id,tareas.admin_id,tareas.tare_nam,
							tareas.DI,tareas.MI,tareas.AI,tareas.fechain_tar,tareas.DF,tareas.MF,tareas.AF,
							tareas.fechafin_tar,tareas.esta_tar,
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
							where tareas.segui_id='$caatwo' order by fechain_tar asc";
						$tarsql=mysql_query($teraver,$conexion) or die (mysql_error());
						while ($cs=mysql_fetch_array($tarsql)) {
							$idT=$cs['id_tarea'];
							$plidT=$cs['segui_id'];
							$residT=$cs['admin_id'];
							$naempreT=$cs['name_empr'];
							$naPLT=$cs['nombre_plan'];
							$resnamT=$cs['usuadmin'];
							$tareT=$cs['tare_nam'];
							$fiT=$cs['fechain_tar'];
							$ffT=$cs['fechafin_tar'];
							$esdT=$cs['esta_tar'];
							switch ($esdT) {
								case '0':
									$es="<b>Selecione</b>";
									break;
								case '1':
									$es="<b style='color:#FAFF1E;'>Asignado</b>";
									break;
								case '2':
									$es="<b style='color:#939393;'>En proceso</b>";
									break;
								case '3':
									$es="<b style='color:#00A5D4;'>Terminado</b>";
									break;
								case '4':
									$es="<b style='color:#FF3C3C;'>Cancelado</b>";
									break;
								default:
									$es="<b>Error</b>";
									break;
							}
				?>
				<div>
					<b><?php echo "$tareT"; ?></b>
				</div>
				<div>
					<?php echo "$es"; ?>
				</div>
				<div id="averl">
					<a href="../tareas/newtareab.php?idsegEr=<?php echo $caa ?>">Nueva tarea</a>
				</div>
				<?php
						}
					}
				?>
			</article>
			<?php
				}
				else{
					echo "";
				}
				}
			?>
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