<?php
	include '../config.php';
	$idR=$_POST['idEb'];
	$datosver="SELECT planes.id_plan,planes.nombre_plan,planes.espacio_plan,
		planes.transferencia_plan,planes.cuentas_correo,planes.precio_plan,
		planes.precio_direcion,planes.insumos_pl,planes.proveedor_idpl,
		proveedores.id_proveedor,proveedores.name_prove 
		from planes 
			inner join proveedores on(planes.proveedor_idpl=proveedores.id_proveedor) 
		where planes.id_plan='$idR'";
	$rag=mysql_query($datosver,$conexion) or die (mysql_error());
	while ($kl=mysql_fetch_array($rag)) {
		$idplan=$kl['id_plan'];
		$nampl=$kl['nombre_plan'];
		$esppl=$kl['espacio_plan'];
		$transpl=$kl['transferencia_plan'];
		$corrpl=$kl['cuentas_correo'];
		$precpl=$kl['precio_plan'];
		$precdrpl=$kl['precio_direcion'];
		$iuspl=$kl['insumos_pl'];
		$idprovvpl=$kl['proveedor_idpl'];
		$nameproveedor=$kl['name_prove'];
	}
?>
<h3><?php echo "$nampl"; ?></h3>
<div>
	<b>Espacio plan:</b> <?php echo "$esppl"; ?>
</div>
<div>
	<b>Transfereencia plan:</b> <?php echo "$transpl"; ?>
</div>
<div>
	<b>Cuentas de correo: </b><?php echo "$corrpl"; ?>
</div>
<!--div>
	<b>Precio plan: </b>$<?php //echo "$precpl"; ?>
</div-->
<!--div>
	<b>Precio Redirecionador: </b>$<?php //echo "$precdrpl"; ?>
</div>
<div>
	<b>Insumos: </b>$<?php //echo "$iuspl"; ?>
</div-->
<div>
	<b>Proveedor: </b><?php echo "$nameproveedor"; ?>
</div>