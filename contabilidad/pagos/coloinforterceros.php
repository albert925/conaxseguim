<?php
	include '../../config.php';
	$idR=$_POST['Tcid'];
	if ($idR=="") {
		echo "Error";
	}
	else{
		$busqueda="SELECT * from terceros where id_tercer='$idR'";
		$sqlver=mysql_query($busqueda,$conexion) or die (mysql_error());
		while ($ps=mysql_fetch_array($sqlver)) {
			$idT=$ps['id_tercer'];
			$nameT=$ps['nomb_terc'];
			$cdntT=$ps['ced_nit_terc'];
			$telT=$ps['telf_terc'];
			$dirT=$ps['dire_terc'];
			$tipoT=$ps['tipo_terc'];
			switch ($tipoT) {
				case '0':
					$xxx="Tipo Terceros";
					break;
				case '1':
					$xxx="Acreedor";
					break;
				case '2':
					$xxx="Cliente";
					break;
				case '3':
					$xxx="Empleado";
					break;
				case '4':
					$xxx="Proveedor";
					break;
				case '5':
					$xxx="Otros";
					break;
				default:
					$xxx="Error";
					break;
			}
		}
?>
	<p>
		<b>Id:</b> <?php echo "$idT"; ?><br/>
		<b>Nombre: </b><?php echo "$nameT"; ?><br/>
		<b>Cédula/Nit: </b><?php echo "$cdntT"; ?>
		<b>Teléfono: </b><?php echo "$telT"; ?><br />
		<b>Dirección: </b><?php echo "$dirT"; ?><br />
		<b>Tipo: </b><?php echo "$xxx"; ?><br />
	</p>
<?php
	}
?>