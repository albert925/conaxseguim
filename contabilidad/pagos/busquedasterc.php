<?php
	include '../../config.php';
	$tippoR=$_POST['idtp'];
	if ($tippoR=="0") {
?>
	<option value="0">Terceros</option>
<?php
	}
	else{
?>
	<option value="0">Terceros</option>
<?php
		$busqueda="SELECT * from terceros where tipo_terc='$tippoR' order by nomb_terc asc";
		$sql=mysql_query($busqueda,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql);
		if ($numero>0) {
			while ($tc=mysql_fetch_array($sql)) {
				$idT=$tc['id_tercer'];
				$namT=$tc['nomb_terc'];
?>
	<option value="<?php echo $idT ?>"><?php echo "$namT"; ?></option>
<?php
			}
		}
		else{
?>
	<option value="0">Terceros</option>
<?php
		}
	}
?>