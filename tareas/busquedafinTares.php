<?php
	include '../config.php';
	$a=$_POST['qa'];//id Seguimiento
	$b=$_POST['qb'];//id Responsable
	$c=$_POST['qc'];//Nombre tarea
	$d=$_POST['qd'];//dia inicio
	$e=$_POST['qe'];//mes inicio
	$f=$_POST['qf'];//año inicio
	$g=$_POST['qg'];//dia fin
	$h=$_POST['qh'];//mes fin
	$i=$_POST['qi'];//año fin

	if ($d=="0" || $d=="" || $e=="0" || $e=="" || $f=="0" || $f=="") {
		$ffiu="000-00-00";
		$fecha_unida_in="";
	}
	else{
		$ffiu=$f."-".$e."-".$d;
		$fecha_unida_in="and tareas.fechain_tar>='$ffiu'";
	}

	if ($g=="0" || $g=="" || $h=="0" || $h=="" || $i=="0" || $i=="") {
		$fffu="000-00-00";
		$fecha_unida_fin="";
	}
	else{
		$fffu="000-00-00";
		$fecha_unida_fin="and tareas.fechafin_tar<='$fffu'";
	}

	switch ($a) {
		case '0':
			$aa="1";
			break;
		case '':
			$aa="1";
			break;
		default:
			$aa="tareas.segui_id='$a'";
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
			$bb="and tareas.admin_id='$b'";
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
			$cc="and tareas.tare_nam like '$c%'";
			break;
	}
	$busql="SELECT tareas.id_tarea,tareas.segui_id,tareas.admin_id,tareas.tare_nam,
		tareas.DI,tareas.MI,tareas.AI,tareas.fechain_tar,tareas.DF,tareas.MF,tareas.AF,
		tareas.fechafin_tar,tareas.esta_tar,
		seguimiento.id_seguimineto,seguimiento.empre_id_seg,seguimiento.plan_id_seg,
		empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
		empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
		planes.id_plan,planes.nombre_plan,
		administrador.usuadmin 
		from tareas 
			inner join administrador on(tareas.admin_id=administrador.id_admin) 
			inner join seguimiento on(tareas.segui_id=seguimiento.id_seguimineto) 
			inner join empresas on(seguimiento.empre_id_seg=empresas.id_empresa) 
			inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
		where $aa $bb $cc $fecha_unida_in $fecha_unida_fin 
		order by id_tarea,fechain_tar asc";
	$rs=mysql_query($busql,$conexion) or die (mysql_error());
	$num_total_registros= mysql_num_rows($rs);
	if ($num_total_registros>0) {
?>
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<table border="1" id="segitable" title="la Tabla No es adaptable">
		<tr>
			<td><b>Id</b></td>
			<td><b>Empresa</b></td>
			<td><b>PLan</b></td>
			<td><b>Responsable</b></td>
			<td><b>Tarea</b></td>
			<td><b>Fecha Inicio</b></td>
			<td><b>Fecha Fin</b></td>
			<td><b>Estado</b></td>
			<td><b>Moficiar</b></td>
			<td><b>Borrar</b></td>
		</tr>
<?php
		while ($ps=mysql_fetch_array($rs)) {
			$idT=$ps['id_tarea'];
			$plidT=$ps['segui_id'];
			$residT=$ps['admin_id'];
			$naempreT=$ps['name_empr'];
			$naPLT=$ps['nombre_plan'];
			$resnamT=$ps['usuadmin'];
			$tareT=$ps['tare_nam'];
			$fiT=$ps['fechain_tar'];
			$ffT=$ps['fechafin_tar'];
			$esdT=$ps['esta_tar'];
			switch ($esdT) {
				case '0':
					$es="<b>Selecione</b>";
					break;
				case '1':
					$es="<b style='color:#FAFF1E;'>Asignado</b>";
					break;
				case '2':
					$es="<b style='color:#939393;'>En proceso</b>";
					break;
				case '3':
					$es="<b style='color:#00A5D4;'>Terminado</b>";
					break;
				case '4':
					$es="<b style='color:#FF3C3C;'>Cancelado</b>";
					break;
				default:
					$es="<b>Error</b>";
					break;
			}
?>
	<tr>
		<td><b><?php echo "$idT"; ?></b></td>
		<td><?php echo "$naempreT"; ?></td>
		<td><?php echo "$naPLT"; ?></td>
		<td><?php echo "$resnamT"; ?></td>
		<td><?php echo "$tareT"; ?></td>
		<td><?php echo "$fiT"; ?></td>
		<td><?php echo "$ffT"; ?></td>
		<td><?php echo "$es"; ?></td>
		<td>
			<a href="modifcaciontareas.php?idTv=<?php echo $idT ?>" id="yell">Modificar</a>
		</td>
		<td>
			<a href="borrartare.php?idborT=<?php echo $idT ?>" id="yell" class="deli">Borrar</a>
		</td>
	</tr>
<?php
		}
?>
	</table>
<?php
	}
	else{
		echo "No se encontraron datos";
	}
?>