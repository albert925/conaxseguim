<?php
	include '../../config.php';
	$nombreP=$_POST['pal'];
	$espcaioP=$_POST['pbl'];
	$transfrernciaP=$_POST['pcl'];
	$correosP=$_POST['pdl'];
	$precioP=$_POST['pel'];
	$preciodireion=$_POST['pfl'];
	$insumos=$_POST['ius'];
	$proveedor=$_POST['provePL'];
	if ($nombreP=="" || $precioP=="" || $preciodireion=="" || $proveedor=="0" || $proveedor=="") {
		echo "1";
	}
	else{
		$existe_plan="SELECT * from planes where nombre_plan='$nombreP'";
		$sqlnombrpl=mysql_query($existe_plan,$conexion) or die (mysql_error());
		$numeronomb=mysql_num_rows($sqlnombrpl);
		if ($numeronomb>0) {
			echo "2";
		}
		else{
			$ingresando="INSERT into planes(nombre_plan,espacio_plan,transferencia_plan,
				cuentas_correo,precio_plan,precio_direcion,insumos_pl,proveedor_idpl) 
				values('$nombreP','$espcaioP','$transfrernciaP','$correosP','$precioP',
					'$preciodireion','$insumos','$proveedor')";
			mysql_query($ingresando,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>