<?php
	include '../config.php';
	$raa=$_POST['ca'];//Empresa
	$rab=$_POST['cb'];//Planes
	$rac=$_POST['cc'];//descuento
	$rad=$_POST['cd'];//Abono 1
	$rae=$_POST['ce'];//Abono 2
	$raf=$_POST['cf'];//Abono 3
	$rag=$_POST['cg'];//Saldo
	$rah=$_POST['ch'];//Caja
	$rai=$_POST['ci'];//Estado del plan
	$raj=$_POST['cj'];//Redirecionador
	$rak=$_POST['ck'];//Valor redireciondador
	$ral=$_POST['cl'];//Insumos
	$ram=$_POST['cm'];//Estado Insumos
	$ran=$_POST['cn'];//Proveedor
	$rao=$_POST['co'];//Precio Provedor
	$rap=$_POST['cp'];//Dominio
	$raq=$_POST['cq'];//FTP
	$rar=$_POST['cr'];//Usuario Servidor
	$ras=$_POST['cs'];//Contraseña Servidor
	$rat=$_POST['ct'];//Correo Correo
	$rau=$_POST['cu'];//Contraseña correp correo
	$rav=$_POST['cv'];//usuario facebook
	$raw=$_POST['cw'];//Contraseña facebook
	$rax=$_POST['cx'];//Usuario Instagram
	$ray=$_POST['cy'];//Contrsaeña Instagram
	$raz=$_POST['cz'];//Usuario Pints
	$rba=$_POST['da'];//COntraseña Pints
	$rbb=$_POST['db'];//Usuario linkd
	$rbc=$_POST['dc'];//Contraseña Linkd
	$rbd=$_POST['dd'];//usuario tiwtter
	$rbe=$_POST['de'];//Contraseña twitter
	$rbf=$_POST['df'];//Estado Direcionador
	$rbg=$_POST['dg'];//Fecha abono 1
	$rbh=$_POST['dh'];//Fecha abono 2
	$rbi=$_POST['di'];//Fecha abono 3
	$rbj=$_POST['dj'];//Estado 1
	$rbk=$_POST['dk'];//Estado 2
	$rbl=$_POST['dl'];//Estado 3
	$rbm=$_POST['dm'];//Estado proveedor
	$rbn=$_POST['dn'];
	$rbo=$_POST['doo'];
	$rbp=$_POST['dp'];
	$idRR=$_POST['idEEvv'];
	$DH=date("d");
	$MH=date("m");
	$YH=date("Y");
	$dia_hoy=$YH."-".$MH."-".$DH;
	if ($idRR=="" || $raa=="0" || $rab=="0") {
		echo "1";
	}
	else{
		$modifcar="UPDATE seguimiento set 
			empre_id_seg='$raa',plan_id_seg='$rab',descuento='$rac',abono1='$rad',abono2='$rae',abono3='$raf',saldo='$rag',en_caja='$rah',estad_plan='$rai',redirec_id='$raj',valor_p_dire='$rak',estado_pag_dire='$rbf',insumos='$ral',
			estado_insumo='$ram',	id_provee='$ran',precio_t_prove='$rao',dominio='$rap',ftp='$raq',usuario='$rar',
			pass_usuario_dm='$ras',estado_servidor='1',id_servi='1',correo_correo='$rat',pass_correo='$rau',
			usuario_face='$rav',pass_face='$raw',usuario_inst='$rax',pass_inst='$ray',usuario_pinters='$raz',
			pass_pinters='$rba',usuario_likind='$rbb',pass_likind='$rbc',usuario_twitter='$rbd',pass_twitter='$rbe',
			fecabA='$rbg',fecabB='$rbh',fecabC='$rbi',estdA='$rbj',estdB='$rbk',estdC='$rbl',estad_prove='$rbm',
			link_adm='$rbn',us_adm='$rbo',pass_adm='$rbp' 
			where id_seguimineto='$idRR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>