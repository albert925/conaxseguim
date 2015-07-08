<?php
	include '../../config.php';
	$mes=$_POST['mesese'];
	$yeaH=date("Y");
	if ($mes=="0") {
		$fechaut="000-00-00";
		$enfecaql="1";
	}
	else{
		$fechaut=$yeaH."-".$mes."-00";
		$fechautb=$yeaH."-".$mes."-31";
		$enfecaql="pagos.fecha_p>='$fechaut' and pagos.fecha_p<='$fechautb'";
	}

	$sumapagos=0;

	$sql="SELECT pagos.id_pago, pagos.terceros_id,pagos.fecha_p,
		pagos.valor_p,pagos.concepto_p,pagos.estado_p,pagos.idadP,
		terceros.id_tercer,terceros.nomb_terc,
		administrador.id_admin,administrador.usuadmin 
		from pagos 
			inner join terceros on(pagos.terceros_id=terceros.id_tercer) 
			inner join administrador on(pagos.idadP=administrador.id_admin) 
		where $enfecaql 
		order by pagos.fecha_p,pagos.id_pago asc";
?>
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/ingrepagosd.js"></script>
	<article class="miniventana">
		<a href="#" class="closep">Ocultar</a>
		<div class="verterceros"></div>
	</article>
	<table border="1" id="segitable" title="la Tabla No es adaptable">
	<tr>
		<td><b>Id</b></td>
		<td><b>Fecha</b></td>
		<td><b>Concepto</b></td>
		<td><b>Terceros</b></td>
		<td><b>Valor</b></td>
		<td><b>estado</b></td>
		<td><b>Ingresado o modifcado por</b></td>
		<td><b>Modificar</b></td>
	</tr>
<?php
	$busquedaver=mysql_query($sql,$conexion) or die (mysql_error());
	$numeros=mysql_num_rows($busquedaver);
	if ($numeros>0) {
		while ($ps=mysql_fetch_array($busquedaver)) {
			$idP=$ps['id_pago'];
			$idtercP=$ps['terceros_id'];
			$namterP=$ps['nomb_terc'];
			$idadminP=$ps['idadP'];
			$nombadminP=$ps['usuadmin'];
			$fecP=$ps['fecha_p'];
			$valP=$ps['valor_p'];
			$conP=$ps['concepto_p'];
			$estP=$ps['estado_p'];
			if ($estP=="1") {
				$colores="style='color:#FF3C3C;'";
			}
			else{
				$colores="";
			}
			$sumapagos=$valP+$sumapagos;
?>
	<tr>
		<td><b><?php echo "$idP"; ?></b></td>
		<td><?php echo "$fecP"; ?></td>
		<td><span <?php echo $colores ?>><?php echo "$conP"; ?></span></td>
		<td>
			<a href="#" class="verter" data-ter="<?php echo $idtercP ?>">
				<?php echo "$namterP"; ?>
			</a>
		</td>
		<td>$<?php echo "$valP"; ?></td>
		<td>
			<select id="estp_<?php echo $idP ?>" class="cambiP" data-id="<?php echo $idP ?>">
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
		</td>
		<td><?php echo "$nombadminP"; ?></td>
		<td>
			<a href="modifcacionpagos.php?idpg=<?php echo $idP ?>" id="yell">Modificar</a>
		</td>
	</tr>
<?php
	}
?>
	<tr id="titol">
		<td colspan="4"></td>
		<td><b>$<?php echo "$sumapagos"; ?></b></td>
		<td colspan="3"></td>
	</tr>
	<?php
		$ksum=0;
		$csum=0;
		$ktrlotal="SELECT * from pagos where $enfecaql and estado_p='2'";
		$swrlotal=mysql_query($ktrlotal,$conexion) or die (mysql_error());
		while ($llx=mysql_fetch_array($swrlotal)) {
			$precioa=$llx['valor_p'];
			$ksum=$precioa+$ksum;
		}
		$cslotal="SELECT * from pagos where $enfecaql and estado_p='1'";
		$sftllotal=mysql_query($cslotal,$conexion) or die (mysql_error());
		while ($jjc=mysql_fetch_array($sftllotal)) {
			$preciob=$jjc['valor_p'];
			$csum=$preciob+$csum;
		}
	?>
	<tr>
		<td colspan="3"></td>
		<td><b>Pagado</b></td>
		<td>$<?php echo "$ksum"; ?></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td><b>Pendiente</b></td>
		<td>$<?php echo "$csum"; ?></td>
		<td colspan="3"></td>
	</tr>
<?php
	}
	else{
		echo "<tr><td colspan='8'>No hay resultados</td></tr>";
	}
?>
</table>