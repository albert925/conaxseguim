<?php
	include '../../config.php';
	$clienteE=$_POST['cle'];
	$nombreE=$_POST['nme'];
	$nitE=$_POST['nite'];
	$direcionE=$_POST['dire'];
	$paisE=$_POST['pase'];
	$departamentoE=$_POST['depe'];
	$ciudadE=$_POST['ciue'];
	$telefonoE=$_POST['tele'];
	if ($clienteE=="0" || $clienteE=="" || $nombreE=="" || $paisE=="0" || $paisE=="" || $departamentoE=="0" || $departamentoE=="" || $ciudadE=="0" || $ciudadE=="") {
		echo "1";
	}
	else{
		$existenombre="SELECT * from empresas where name_empr='$nombreE'";
		$sqln=mysql_query($existenombre,$conexion) or die (mysql_error());
		$numeroexit=mysql_num_rows($sqln);
		if ($numeroexit>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into empresas(usuario_id,name_empr,nit_emp,direc_emp,pais_emp,depart_emp,ciudad_emp,tel_emp) 
				values('$clienteE','$nombreE','$nitE','$direcionE','$paisE','$departamentoE','$ciudadE','$telefonoE')";
			$ing_ter="INSERT into terceros(nomb_terc,ced_nit_terc,telf_terc,dire_terc,tipo_terc) 
				values('$nombreE','$nitE','$telefonoE','$direcionE','2')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			mysql_query($ing_ter,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>