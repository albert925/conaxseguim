<?php
	include '../../config.php';
	$idEmpresaR=$_POST['idRea'];
	$clienteidR=$_POST['cliReb'];
	$nombreempreR=$_POST['naRec'];
	$nitempreR=$_POST['ntRed'];
	$direcionempreR=$_POST['dtRef'];
	$telefonosR=$_POST['tlRef'];
	if ($idEmpresaR=="" || $clienteidR=="" || $clienteidR=="0" || $nombreempreR=="") {
		echo "1";
	}
	else{
			$modifcar="UPDATE empresas set usuario_id='$clienteidR',
			name_empr='$nombreempreR',nit_emp='$nitempreR',direc_emp='$direcionempreR',tel_emp='$telefonosR' 
			where id_empresa='$idEmpresaR'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
	}
	/*$existenombreemrpesa="SELECT * from empresas where name_empr='$nombreempreR'";
		$sqlnoimbre=mysql_query($existenombreemrpesa,$conexion) or die (mysql_error());
		$numeronmbre=mysql_num_rows($sqlnoimbre);
		if ($numeronmbre>0) {
			echo "2";
		}*/
?>