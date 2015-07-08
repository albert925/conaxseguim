<?php
	include '../config.php';
	$idR=$_POST['ide'];//i seguimiento
	$a=$_POST['a'];//corre
	$b=$_POST['b'];//ps coreo
	$c=$_POST['c'];//facebook
	$d=$_POST['d'];//ps face
	$e=$_POST['e'];//instagrma
	$f=$_POST['f'];//ps intagram
	$g=$_POST['g'];//pinteres
	$h=$_POST['h'];//ps pinteres
	$i=$_POST['i'];//likdedin
	$j=$_POST['j'];//ps likdedin
	$k=$_POST['k'];//twitter
	$l=$_POST['l'];//ps twitter
	if ($idR=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE seguimiento set correo_correo='$a',pass_correo='$b',usuario_face='$c',
			pass_face='$d',usuario_inst='$e',pass_inst='$f',usuario_pinters='$g',pass_pinters='$h',
			usuario_likind='$i',pass_likind='$j',usuario_twitter='$k',pass_twitter='$l' 
			where id_seguimineto=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>