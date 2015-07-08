<?php
	include '../config.php';
	$idPais=$_POST['idPS'];
	$busquedapais="SELECT pais_depart.id_pais_depart,pais_depart.pais_id,pais_depart.depart_id,
		departamento.id_depart,departamento.nam_depart 
		from pais_depart 
			inner join departamento on(pais_depart.depart_id=departamento.id_depart) 
		where pais_depart.pais_id='$idPais' order by departamento.nam_depart asc";
	$sql=mysql_query($busquedapais,$conexion) or die (mysql_error());
	$numerolist=mysql_num_rows($sql);
	if ($numerolist>0) {
		while ($dps=mysql_fetch_array($sql)) {
			$idDPT=$dps['id_depart'];
			$namDPT=$dps['nam_depart'];
?>
<option value="<?php echo $idDPT ?>"><?php echo "$namDPT"; ?></option>
<?php
		}
	}
	else{
?>
<option value="0">Departamento/Estado</option>
<?php
	}