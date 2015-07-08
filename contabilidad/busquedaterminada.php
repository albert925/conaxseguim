<?php
	include '../config.php';
	$a=$_POST['la'];//Empresa
	$b=$_POST['lb'];//planes
	$c=$_POST['lc'];//Estado del plan
	$d=$_POST['ld'];//Direcionador
	$e=$_POST['le'];//estado direcionador
	$f=$_POST['lf'];//proveedor
	$g=$_POST['lg'];//pais
	$h=$_POST['lh'];//departamento
	$i=$_POST['li'];//ciudad

	$adi=$_POST['fia'];
	$ami=$_POST['fib'];
	$ayi=$_POST['fic'];

	$adf=$_POST['ffa'];
	$adm=$_POST['ffb'];
	$ady=$_POST['ffc'];

	$adr=$_POST['fra'];
	$amr=$_POST['frb'];
	$ayr=$_POST['frc'];

	$adb=$_POST['fba'];
	$amb=$_POST['fbb'];
	$ayb=$_POST['fbc'];

	if ($adi=="0" || $adi=="" || $ami=="0" || $ami=="" || $ayi=="0" || $ayi=="") {
		$fecha_inicio="000-00-00";
		$businicio="";
	}
	else{
		$fecha_inicio=$ayi."-".$ami."-".$adi;
		$businicio="and seguimiento.fi_plan>='$fecha_inicio'";
	}

	if ($adf=="0" || $adf=="" || $amf=="0" || $amf=="" || $ayf=="0" || $ayf=="") {
		$fecha_fin="000-00-00";
		$busfin="";
	}
	else{
		$fecha_fin=$ayf."-".$amf."-".$adf;
		$busfin="and seguimiento.ff_plan<='$fecha_fin'";
	}

	if ($adr=="0" || $adr=="" || $amr=="0" || $amr=="" || $ayr=="0" || $ayr=="") {
		$fecha_renovacion="000-00-00";
		$busreno="";
	}
	else{
		$fecha_renovacion=$ayr."-".$amr."-".$adr;
		$busreno="and seguimiento.fech_r>='$fecha_renovacion'";
	}

	if ($adb=="0" || $adb=="" || $amb=="0" || $amb=="" || $ayb=="0" || $ayb=="") {
		$fecha_ingresod="000-00-00";
		$busingre="";
	}
	else{
		$fecha_ingresod=$ayb."-".$amb."-".$adb;
		$busingre="and seguimiento.fecha_ingreso='$fecha_ingresod'";
	}
	switch ($a) {
		case '0':
			$aa="1";
			break;
		case '':
			$aa="1";
			break;
		default:
			$aa="seguimiento.empre_id_seg='$a'";
			break;
	}
	switch ($b) {
		case '0':
			$bb="";
			break;
		case '':
			$bb="";
			break;
		default:
			$bb="and seguimiento.plan_id_seg='$b'";
			break;
	}
	switch ($c) {
		case '0':
			$cc="";
			break;
		case '':
			$cc="";
			break;
		default:
			$cc="and seguimiento.estad_plan='$c'";
			break;
	}
	switch ($d) {
		case '0':
			$dd="";
			break;
		case '':
			$dd="";
			break;
		default:
			$dd="and seguimiento.redirec_id='$d'";
			break;
	}
	switch ($e) {
		case '0':
			$ee="";
			break;
		case '':
			$ee="";
			break;
		default:
			$ee="and seguimiento.estado_pag_dire='$e'";
			break;
	}
	switch ($f) {
		case '0':
			$ff="";
			break;
		case '':
			$ff="";
			break;
		default:
			$ff="and seguimiento.id_provee='$f'";
			break;
	}
	switch ($g) {
		case '0':
			$gg="";
			break;
		case '':
			$gg="";
			break;
		default:
			$gg="and empresas.pais_emp='$g'";
			break;
	}
	switch ($h) {
		case '0':
			$hh="";
			break;
		case '':
			$hh="";
			break;
		default:
			$hh="and empresas.depart_emp='$h'";
			break;
	}
	switch ($i) {
		case '0':
			$ii="";
			break;
		case '':
			$ii="";
			break;
		default:
			$ii="and empresas.ciudad_emp='$i'";
			break;
	}

	$sql="SELECT seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
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
		empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp 
		from seguimiento 
			inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
		where $aa $bb $cc $dd $ee $ff $gg $hh $ii $businicio $busfin $busreno $busingre 
		order by seguimiento.id_seguimineto,seguimiento.fecha_ingreso asc";
	$busqusql=mysql_query($sql,$conexion) or die (mysql_error());
	$numerosTotal=mysql_num_rows($busqusql);
	if ($numerosTotal>0) {
?>
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/ingresegimientosd.js"></script>
	<article class="miniventana">
		<a href="#" class="closep">Ocultar</a>
		<h2>Información</h2>
		<div id="datosf"></div>
	</article>
	<table border="1" id="segitable" title="la Tabla No es adaptable">
		<tr>
			<td><b>Fecha</b></td>
			<td><b>Empresa</b></td>
			<td><b>Plan</b></td>
			<td><b>Prec. Plan</b></td>
			<td><b>Desc. Max 5%</b></td>
			<td><b>Abono 1</b></td>
			<td><b>Abono 2</b></td>
			<td><b>Abono 3</b></td>
			<td><b>Saldo</b></td>
			<td><b>En caja</b></td>
			<td><b>Fecha Inicio Plan</b></td>
			<td><b>Fecha Fin Plan</b></td>
			<td><b>Estado PLan</b></td>
			<td><b>Redirecionador</b></td>
			<td><b>Valor Red.</b></td>
			<td><b>Estado Direcionador</b></td>
			<td><b>Insumos</b></td>
			<td><b>Estado Insumo</b></td>
			<td><b>Proveedor</b></td>
			<td><b>Precio Porveedor</b></td>
			<td><b>Modificar</b></td>
			<td><b>Borrar</b></td>
		</tr>
<?php
		while ($ps=mysql_fetch_array($busqusql)) {
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
?>
	<tr>
		<td><?php echo "$cbj"; ?></td>
		<td>
			<?php
				$busnamemp="SELECT * from empresas where id_empresa='$cab'";
				$sqlPa=mysql_query($busnamemp,$conexion) or die (mysql_error());
				while ($ep=mysql_fetch_array($sqlPa)) {
					$idEP=$ep['id_empresa'];
					$naEP=$ep['name_empr'];
				}
			?>
			<a href="#" class="emprver" data-id="<?php echo $idEP ?>"><?php echo "$naEP"; ?></a>
		</td>
		<td>
			<?php
				$busplan="SELECT * from planes where id_plan='$cac'";
				$sqlplan=mysql_query($busplan,$conexion) or die (mysql_error());
				while ($pl=mysql_fetch_array($sqlplan)) {
					$idPL=$pl['id_plan'];
					$namPL=$pl['nombre_plan'];
					$precPL=$pl['precio_plan'];
				}
			?>
			<a href="#" class="verplan" data-id="<?php echo $idPL ?>"><?php echo "$namPL"; ?></a>
		</td>
		<td>$<?php echo "$precPL"; ?></td>
		<td>$<?php echo "$cad"; ?></td>
		<td>$<?php echo "$cae"; ?></td>
		<td>$<?php echo "$caf"; ?></td>
		<td>$<?php echo "$cag"; ?></td>
		<td>$<?php echo "$cah"; ?></td>
		<td>$<?php echo "$cai"; ?></td>
		<td><?php echo "$caj"; ?></td>
		<td><?php echo "$cak"; ?></td>
		<td>
			<select class="plaES" id="as_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
				<?php
					for ($x=0; $x <=3 ; $x++) { 
						if ($x==$cal) {
							$xx="selected";
						}
						else{
							$xx="";
						}
						switch ($x) {
							case '0':
								$ox="Estado del plan";
								break;
							case '1':
								$ox="En proceso";
								break;
							case '2':
								$ox="Terminado";
								break;
							case '3':
								$ox="Cancelado";
								break;
							default:
								$ox="Terminado";
								break;
						}
				?>
				<option value="<?php echo $x ?>" <?php echo $xx ?>><?php echo "$ox"; ?></option>
				<?php
					}
				?>
			</select>
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
		<td>$<?php echo "$can"; ?></td>
		<td>
			<select class="EDR" id="bs_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
				<?php
					for ($y=0; $y <=3 ; $y++) { 
						if ($y==$cbk) {
							$yy="selected";
						}
						else{
							$yy="";
						}
						switch ($y) {
							case '0':
								$oy="Estado Redirecionador";
								break;
							case '1':
								$oy="Proceso";
								break;
							case '2':
								$oy="Pagado";
								break;
							case '3':
								$oy="Pendiente";
								break;
							default:
								$oy="Error";
								break;
						}
				?>
				<option value="<?php echo $y ?>" <?php echo $yy ?>><?php echo "$oy"; ?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td>$<?php echo "$cao"; ?></td>
		<td>
			<select class="EIUS" id="cs_<?php echo $caa ?>" data-id="<?php echo $caa ?>">
				<?php
					for ($z=0; $z <=3 ; $z++) { 
						if ($z==$cap) {
							$zz="selected";
						}
						else{
							$zz="";
						}
						switch ($z) {
							case '0':
								$oz="Estado Insumos";
								break;
							case '1':
								$oz="Proceso";
								break;
							case '2':
								$oz="Pagado";
								break;
							case '3':
								$oz="Cancelado";
								break;
							default:
								$oz="Error";
								break;
						}
				?>
				<option value="<?php echo $z ?>" <?php echo $zz ?>><?php echo "$oz"; ?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td>
			<?php
				$provever="SELECT * from proveedores where id_proveedor='$caq'";
				$sqlprove=mysql_query($provever,$conexion) or die (mysql_error());
				while ($pv=mysql_fetch_array($sqlprove)) {
					$idPV=$pv['id_proveedor'];
					$naPV=$pv['name_prove'];
				}
			?>
			<?php echo "$naPV"; ?>
		</td>
		<td>$<?php echo "$car"; ?></td>
		<td>
			<a href="../administrador/modifcarsegidat.php?idSEG=<?php echo $caa ?>" id="yell">Modificar</a>
		</td>
		<td>
			<a href="../administrador/borrarsegu.php?idBrse=<?php echo $caa ?>" id="yell" class="deli">Borrar</a>
		</td>
	</tr>
<?php
		}
?>
</table>
<?php
	}
	else{
		echo "No hay resultados";
	}
?>