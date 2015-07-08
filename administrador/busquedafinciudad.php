<?php
	include '../config.php';
	$idPais=$_POST['idDS'];
	$busquedapais="SELECT depart_ciudad.id_depart_ciud,depart_ciudad.Dpart_id,depart_ciudad.ciudad_id,
		ciudad.id_ciudad,ciudad.nam_ciudad  
		from depart_ciudad 
			inner join ciudad on(depart_ciudad.ciudad_id=ciudad.id_ciudad) 
		where depart_ciudad.Dpart_id='$idPais' order by ciudad.nam_ciudad asc";
	$sql=mysql_query($busquedapais,$conexion) or die (mysql_error());
	$numerolist=mysql_num_rows($sql);
	if ($numerolist>0) {
?>
<option value="0">Ciudades</option>
<?php
		while ($dps=mysql_fetch_array($sql)) {
			$idDPT=$dps['id_ciudad'];
			$namDPT=$dps['nam_ciudad'];
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