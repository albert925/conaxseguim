<?php
	include '../../config.php';
	$nombreT=$_POST['fa'];
	$cedu_nitT=$_POST['fb'];
	$telefonoT=$_POST['fc'];
	$direcionT=$_POST['fd'];
	$tipoT=$_POST['fe'];
	if ($nombreT=="" || $cedu_nitT=="" || $tipoT=="0" || $tipoT=="") {
		echo "1";
	}
	else{
		$existenit="SELECT * from terceros where ced_nit_terc='$cedu_nitT'";
		$esisql=mysql_query($existenit,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($esisql);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into terceros(nomb_terc,ced_nit_terc,telf_terc,dire_terc,tipo_terc) 
				values('$nombreT','$cedu_nitT','$telefonoT','$direcionT','$tipoT')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>