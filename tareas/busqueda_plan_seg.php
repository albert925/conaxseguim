<?php
	include '../config.php';
	$idR=$_POST['pe'];
	$busqueda_seguimiento="SELECT * from seguimiento 
			inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
		where empre_id_seg='$idR'";
	$sql_bus=mysql_query($busqueda_seguimiento,$conexion) or die (mysql_error());
	$numero=mysql_num_rows($sql_bus);
	if ($numero>0) {
		while ($cah=mysql_fetch_array($sql_bus)) {
		$idSg=$cah['id_seguimineto'];
		$namPLan=$cah['nombre_plan'];
?>
<option value="<?php echo $idSg ?>"><?php echo "$namPLan"; ?></option>
<?php
		}
	}
	else{
?>
<option value="0">Planes</option>
<?php
	}
?>