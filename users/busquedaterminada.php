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
			<td><b>Dominio</b></td>
			<td><b>Ftp</b></td>
			<td><b>Usuario</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Fecha Renovacion</b></td>
			<td colspan="2"><b>Correo</b></td>
			<td colspan="2"><b>Facebook</b></td>
			<td colspan="2"><b>Instagram</b></td>
			<td colspan="2"><b>Pinters</b></td>
			<td colspan="2"><b>Likind</b></td>
			<td colspan="2"><b>Twitter</b></td>
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
		<td><?php echo "$cas"; ?></td>
		<td><?php echo "$cat"; ?></td>
		<td><?php echo "$cau"; ?></td>
		<td><?php echo "$cav"; ?></td>
		<td><?php echo "$caw"; ?></td>
		<td><?php echo "$cax"; ?></td>
		<td><?php echo "$cay"; ?></td>
		<td><?php echo "$caz"; ?></td>
		<td><?php echo "$cba"; ?></td>
		<td><?php echo "$cbb"; ?></td>
		<td><?php echo "$cbc"; ?></td>
		<td><?php echo "$cbd"; ?></td>
		<td><?php echo "$cbe"; ?></td>
		<td><?php echo "$cbf"; ?></td>
		<td><?php echo "$cbg"; ?></td>
		<td><?php echo "$cbh"; ?></td>
		<td><?php echo "$cbi"; ?></td>
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