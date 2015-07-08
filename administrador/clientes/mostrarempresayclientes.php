<?php
	include '../../config.php';
	$idR=$_POST['idEa'];
	$datosver="SELECT empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
		empresas.direc_emp,empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
		clientes.nombre_us,pais.nam_pais,departamento.nam_depart,ciudad.nam_ciudad 
		from empresas 
			inner join clientes on(empresas.usuario_id=clientes.id_usuario) 
			inner join pais on(empresas.pais_emp=pais.id_pais) 
			inner join departamento on(empresas.depart_emp=departamento.id_depart) 
			inner join ciudad on(empresas.ciudad_emp=ciudad.id_ciudad) 
		where empresas.id_empresa='$idR'";
	$rag=mysql_query($datosver,$conexion) or die (mysql_error());
	while ($kl=mysql_fetch_array($rag)) {
		$idemp=$kl['id_empresa'];
		$idclemp=$kl['usuario_id'];
		$clemp=$kl['nombre_us'];
		$namemp=$kl['name_empr'];
		$nitemp=$kl['nit_emp'];
		$drcemp=$kl['direc_emp'];
		$psemp=$kl['nam_pais'];
		$dpemp=$kl['nam_depart'];
		$cdemp=$kl['nam_ciudad'];
	}
	$verusuario="SELECT * from clientes where id_usuario='$idclemp'";
	$drtcl=mysql_query($verusuario,$conexion) or die (mysql_error());
	while ($ll=mysql_fetch_array($drtcl)) {
		$idcl=$ll['id_usuario'];
		$namcl=$ll['nombre_us'];
		$apelcl=$ll['apellido_us'];
		$corcl=$ll['correo_us'];
		$telcl=$ll['telefono_us'];
	}
?>
<h3><?php echo "$namemp"; ?></h3>
<div>
	<b>Nit:</b> <?php echo "$nitemp"; ?>
</div>
<div>
	<b>Dirección:</b> <?php echo "$drcemp"; ?>
</div>
<div>
	<b>Pais: </b><?php echo "$psemp"; ?>
</div>
<div>
	<b>Depar/Est: </b><?php echo "$dpemp"; ?>
</div>
<div>
	<b>Ciudad: </b><?php echo "$cdemp"; ?>
</div>
<h3>Cliente</h3>
<div>
	<b>Nombres: </b><?php echo "$namcl $apelcl"; ?>
</div>
<div>
	<b>Correo: </b><?php echo "$corcl"; ?>
</div>
<div>
	<b>Teléfono: </b><?php echo "$telcl"; ?>
</div>