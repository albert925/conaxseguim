<?php
	include '../../config.php';
	$fechaR=$_GET['ff'];//Fecha
	$emprR=$_GET['mp'];//Id empresa
	$DH=date("d");
	$MH=date("m");
	$YH=date("Y");
	$feha_hoy=$YH."-".$MH."-".$DH;
	if ($fechaR=="" || $emprR=="") {
		echo "1";
	}
	else{
		$totalI=0;
		$nmplU="";
		$datosAbono_direc="SELECT * from abonob
				inner join empresas on(abonob.clien_abono=empresas.id_empresa) 
			where fecha_abono='$fechaR' and clien_abono='$emprR' order by id_abono asc";
		$slq_direc=mysql_query($datosAbono_direc,$conexion) or die (mysql_error());
		while ($hk=mysql_fetch_array($slq_direc)) {
			$idab=$hk['id_abono'];
			$fecab=$hk['fecha_abono'];
			$idSgab=$hk['id_plan_sg'];
			$idClab=$hk['clien_abono'];
			$empab=$hk['name_empr'];
			$valab=$hk['valor_abono'];
			$formvalab=number_format($valab,2);
			$bus_nam_plan="SELECT * from seguimiento 
					inner join planes on(seguimiento.plan_id_seg=planes.id_plan) 
				where id_seguimineto='$idSgab'";
			$sql_bus_plan=mysql_query($bus_nam_plan,$conexion) or die (mysql_error());
			while ($seR=mysql_fetch_array($sql_bus_plan)) {
				$namPLE=$seR['nombre_plan'];
			}
			$nmplU=$namPLE."-".$nmplU;
			$totalI=$valab+$totalI;
		}
		$cuadCLo="SELECT * from empresas 
				inner join ciudad on(empresas.ciudad_emp=ciudad.id_ciudad) 
			where id_empresa='$emprR'";
		$sql_cuad=mysql_query($cuadCLo,$conexion) or die (mysql_error());
		while ($kcd=mysql_fetch_array($sql_cuad)) {
			$nmcd=$kcd['nam_ciudad'];
		}
		$existe_recibo="SELECT * from recibo where fecha_rc='$fechaR' and empre_id='$emprR'";
		$sql_existente=mysql_query($existe_recibo,$conexion) or die (mysql_error());
		$numeroEX=mysql_num_rows($sql_existente);
		if ($numeroEX>0) {
			$ultmo_fact="SELECT * from recibo where fecha_rc='$fechaR' and empre_id='$emprR' order by n_rec desc limit 1";
			$sql_fact=mysql_query($ultmo_fact,$conexion) or die (mysql_error());
			while ($fc=mysql_fetch_array($sql_fact)) {
				$codF=$fc['n_rec'];
			}
			echo "<script>";
				echo "var pag='modif_factura.php?cod=$codF';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$ingresar_recibo="INSERT into recibo(fecha_rc,lug_rc,empre_id,text_rc,vaor_T,estad_rc) 
				values('$fechaR','$nmcd','$emprR','$nmplU','$totalI','1')";
			mysql_query($ingresar_recibo,$conexion) or die (mysql_error());
			$ultmo_fact="SELECT * from recibo where fecha_rc='$fechaR' and empre_id='$emprR' order by n_rec desc limit 1";
			$sql_fact=mysql_query($ultmo_fact,$conexion) or die (mysql_error());
			while ($fc=mysql_fetch_array($sql_fact)) {
				$codF=$fc['n_rec'];
			}
			echo "<script>";
				echo "var pag='modif_factura.php?cod=$codF';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
	}
?>