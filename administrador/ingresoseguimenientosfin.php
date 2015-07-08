<?php
	include '../config.php';
	$raa=$_POST['aa'];//Empresa
	$rab=$_POST['ab'];//Planes
	$rac=$_POST['ac'];//descuento
	$rad=$_POST['ad'];//Abono 1
	$rae=$_POST['ae'];//Abono 2
	$raf=$_POST['af'];//Abono 3
	$rag=$_POST['ag'];//Saldo
	$rah=$_POST['ah'];//Caja
	$rai=$_POST['ai'];//Estado del plan
	$raj=$_POST['aj'];//Redirecionador
	$rak=$_POST['ak'];//Valor redireciondador
	$ral=$_POST['al'];//Insumos
	$ram=$_POST['am'];//Estado Insumos
	$ran=$_POST['an'];//Proveedor
	$rao=$_POST['ao'];//Precio Provedor
	$rap=$_POST['ap'];//Dominio
	$raq=$_POST['aq'];//FTP
	$rar=$_POST['ar'];//Usuario Servidor
	$ras=$_POST['as'];//Contraseña Servidor
	$rat=$_POST['at'];//Correo Correo
	$rau=$_POST['au'];//Contraseña correp correo
	$rav=$_POST['av'];//usuario facebook
	$raw=$_POST['aw'];//Contraseña facebook
	$rax=$_POST['ax'];//Usuario Instagram
	$ray=$_POST['ay'];//Contrsaeña Instagram
	$raz=$_POST['az'];//Usuario Pints
	$rba=$_POST['ba'];//COntraseña Pints
	$rbb=$_POST['bb'];//Usuario linkd
	$rbc=$_POST['bc'];//Contraseña Linkd
	$rbd=$_POST['bd'];//usuario tiwtter
	$rbe=$_POST['be'];//Contraseña twitter
	$rbf=$_POST['bf'];//Estado Direcionador
	$rca=$_POST['ca'];//Dia Inicio
	$rcb=$_POST['cb'];//Mes INicio
	$rcc=$_POST['cc'];//Año Inicio
	$rcd=$_POST['cd'];//Dia fin
	$rce=$_POST['ce'];//Mes fin
	$rcf=$_POST['cf'];//Año Fin
	$rcg=$_POST['cg'];//Dia Renovacion
	$rch=$_POST['ch'];//Mes Renovacion
	$rci=$_POST['ci'];//Año Rrenovacion
	$rbg=$_POST['bg'];//Fecha abono 1
	$rbh=$_POST['bh'];//Fecha abono 2
	$rbi=$_POST['bi'];//Fecha abono 3
	$rbj=$_POST['bj'];//Estado 1
	$rbk=$_POST['bk'];//Estado 2
	$rbl=$_POST['bl'];//Estado 3
	$rbm=$_POST['bm'];//Estado Proveedor
	$rbn=$_POST['bn'];// inidcio mes dos
	$rbo=$_POST['bo'];// fin mes dos
	$rbp=$_POST['bp'];//mes renoavacion 2
	$rbq=$_POST['bq'];//link adm
	$rbr=$_POST['br'];//use adm
	$rbs=$_POST['bs'];//pass adm
	$fecha_uniI=$rcc."-".$rcb."-".$rca;
	//$rbo=$rcf."-".$rce."-".$rcd;
	$fecha_renov=$rci."-".$rch."-".$rcg;
	$DH=date("d");
	$MH=date("m");
	$YH=date("Y");
	$dia_hoy=$YH."-".$MH."-".$DH;
	if ($raa=="0" || $rab=="0") {
		echo "1";
	}
	else{
		$ingresando="INSERT into seguimiento
			(empre_id_seg,plan_id_seg,descuento,abono1,abono2,abono3,saldo,
			en_caja,fi_plan,ff_plan,estad_plan,redirec_id,valor_p_dire,estado_pag_dire,insumos,
			estado_insumo,id_provee,precio_t_prove,dominio,ftp,usuario,pass_usuario_dm,fech_r,
			estado_servidor,id_servi,correo_correo,pass_correo,usuario_face,pass_face,usuario_inst,
			pass_inst,usuario_pinters,
			pass_pinters,usuario_likind,pass_likind,usuario_twitter,pass_twitter,fecha_ingreso,
			fecabA,fecabB,fecabC,estdA,estdB,estdC,estad_prove,mes_in,year_in,
			link_adm,us_adm,pass_adm) 
		values('$raa','$rab','$rac','$rad','$rae','$raf','$rag',
			'$rah','$rbn','$rbo','$rai','$raj','$rak','$rbf','$ral',
			'$ram','$ran','$rao','$rap','$raq','$rar','$ras','$rbp',
			'1','1','$rat','$rau','$rav','$raw','$rax',
			'$ray','$raz',
			'$rba','$rbb','$rbc','$rbd','$rbe','$dia_hoy',
			'$rbg','$rbh','$rbi','$rbj','$rbk','$rbl','$rbm','$MH','$YH',
			'$rbq','$rbr','$rbs')";
		mysql_query($ingresando,$conexion) or die (mysql_error());
		$sacarid_seg_rec="SELECT * from seguimiento where fecha_ingreso>='$dia_hoy' 
			order by fecha_ingreso,id_seguimineto desc limit 1";
		$query_ultiimo=mysql_query($sacarid_seg_rec,$conexion) or die (mysql_error());
		while ($uls=mysql_fetch_array($query_ultiimo)) {
			$idsegDos=$uls['id_seguimineto'];
			$idprobDos=$uls['id_provee'];
			$dat_u=$uls['fecha_ingreso'];
		}
		$precio_prove="SELECT * from proveedores where id_proveedor='$idprobDos'";
		$sql_proveprec=mysql_query($precio_prove,$conexion) or die (mysql_error());
		while ($pve=mysql_fetch_array($sql_proveprec)) {
			$kid=$pve['id_proveedor'];
			$kpr=$pve['precio'];
		}
		$ingresar_costos="INSERT into costos(terc_prov_id,fecha_cos,valor_cos,estad_cost,idadP_cost) 
			values('$kid','$dia_hoy','$kpr','1','2')";
		mysql_query($ingresar_costos,$conexion) or die (mysql_error());
		if ($rad=="" || $rad==0 || $rad=="0") {
			echo "2";
		}
		else{
			$ingresar_abono_directo="INSERT into abonob(fecha_abono,id_plan_sg,clien_abono,valor_Abono) 
				values('$dia_hoy','$idsegDos','$raa','$rad')";
			mysql_query($ingresar_abono_directo,$conexion) or die (mysql_error());
			echo "2";
		}
	}
?>