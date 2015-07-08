<?php
	include '../../config.php';
	$a=$_POST['ka'];//Empresa
	$b=$_POST['kb'];//Cliente
	$c=$_POST['kc'];//Pais
	$d=$_POST['kd'];//departamento
	$e=$_POST['ke'];//Ciudad

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
			$bb="and clientes.id_usuario='$b'";
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
			$cc="and empresas.pais_emp='$c'";
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
			$dd="and empresas.depart_emp='$d'";
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
			$ee="and empresas.ciudad_emp='$e'";
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
		seguimiento.fecha_ingreso,seguimiento.fecabA,seguimiento.fecabB,seguimiento.fecabC,
		seguimiento.estdA,seguimiento.estdB,seguimiento.estdC,
		empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
		empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
		clientes.id_usuario, clientes.nombre_us 
		from seguimiento 
			inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa)
			inner join clientes on(empresas.usuario_id=clientes.id_usuario) 
		where $aa $bb $cc $dd $ee 
		order by seguimiento.id_seguimineto,seguimiento.fecha_ingreso asc";
	$busqusql=mysql_query($sql,$conexion) or die (mysql_error());
	$numerosTotal=mysql_num_rows($busqusql);
	if ($numerosTotal>0) {
?>
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/ingresegimientosd.js"></script>
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
			<td><b>Fecha 1</b></td>
			<td><b>Estado 1</b></td>
			<td><b>Abono 2</b></td>
			<td><b>Fecha 2</b></td>
			<td><b>Estado 2</b></td>
			<td><b>Abono 3</b></td>
			<td><b>Fecha 3</b></td>
			<td><b>Estado 3</b></td>
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
			<td><b>Dominio</b></td>
			<td><b>Ftp</b></td>
			<td><b>Usuario</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Fecha Renovacion</b></td>
			<td><b>Correo</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Facebook</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Instagram</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Pinters</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Likind</b></td>
			<td><b>Contraseña</b></td>
			<td><b>Twitter</b></td>
			<td><b>Contraseña</b></td>
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
			$cbl=$ps['fecabA'];
			$cbm=$ps['fecabB'];
			$cbn=$ps['fecabC'];
			$cbo=$ps['estdA'];
			$cbp=$ps['estdB'];
			$cbq=$ps['estdC'];
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
		<td><?php echo "$cbl"; ?></td>
		<td>
			<select id="modifEsA_<?php echo $caa ?>" class="esdoA" data-kl="<?php echo $caa ?>">
				<?php
					for ($eeA=0; $eeA <=2 ; $eeA++) { 
						if ($eeA==$cbo) {
							$nomasmodA="selected";
						}
						else{
							$nomasmodA="";
						}
						switch ($eeA) {
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
				<option value="<?php echo $eeA ?>" <?php echo $nomasmodA ?>><?php echo "$av"; ?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td>$<?php echo "$caf"; ?></td>
		<td><?php echo "$cbm"; ?></td>
		<td>
			<select id="modifEsB_<?php echo $caa ?>" class="esdoB" data-kl="<?php echo $caa ?>">
				<?php
					for ($eeB=0; $eeB <=2 ; $eeB++) { 
						if ($eeB==$cbp) {
							$nomasmodB="selected";
						}
						else{
							$nomasmodB="";
						}
						switch ($eeB) {
							case '0':
							$bv="Estado Abono 1";
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
				<option value="<?php echo $eeB ?>" <?php echo $nomasmodB ?>><?php echo "$bv"; ?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td>$<?php echo "$cag"; ?></td>
		<td><?php echo "$cbn"; ?></td>
		<td>
			<select id="modifEsC_<?php echo $caa ?>" class="esdoC" data-kl="<?php echo $caa ?>">
				<?php
					for ($eeC=0; $eeC <=2 ; $eeC++) { 
						if ($eeC==$cbq) {
							$nomasmodC="selected";
						}
						else{
							$nomasmodC="";
						}
						switch ($eeC) {
							case '0':
							$cv="Estado Abono 1";
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
				<option value="<?php echo $eeC ?>" <?php echo $nomasmodC ?>><?php echo "$cv"; ?></option>
				<?php
					}
				?>
			</select>
		</td>
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
								$oy="Canceladoo";
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
		<td>
			<a href="../modifcarsegidat.php?idSEG=<?php echo $caa ?>" id="yell">Modificar</a>
		</td>
		<td>
			<a href="../borrarsegu.php?idBrse=<?php echo $caa ?>" id="yell" class="deli">Borrar</a>
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