<?php
	include '../../config.php';
	$a=$_POST['a'];//numero obtenido
	$b=$_POST['b'];//diferencia
	$c=$_POST['c'];//porcea
	$d=$_POST['d'];//porecb
	$e=$_POST['e'];//total porcentaje
	$dH=date("d");
	$dbH=date("j");
	$mH=date("m");
	$mbH=date("n");
	$yH=date("Y");
	$fein=$yH."-".$mH."-00";
	$fegr=$yH."-".$mH."-01";
	$feff=$yH."-".$mH."-31";
	$hoy=$yH."-".$mH."-".$dH;
	if ($a=="" || $b=="" || $c=="" || $d=="" ||$e=="") {
		echo "error un valor en blanco";
	}
	else{
		$buscade_fecha_existe="SELECT * from cartera_indicador where fec_cart>='$fein' and fec_cart<='$feff'";
		$sql_buscar=mysql_query($buscade_fecha_existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_buscar);
		if ($numero>0) {
			while ($uy=mysql_fetch_array($sql_buscar)) {
				$id_cart=$uy['id_cart'];
				$nua=$uy['numero_cart'];
				$nub=$uy['numerb_cart'];
				$nuc=$uy['numerc_cart'];
				$nud=$uy['numerd_cart'];
				$nue=$uy['numere_cart'];
			}
			$modificar="UPDATE cartera_indicador set numero_cart=$a,numerb_cart=$b,numerc_cart=$c,numerd_cart=$d,numere_cart=$e 
				where id_cart=$id_cart";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "2";
		}
		else{
			$guardar="INSERT into cartera_indicador(fec_cart,numero_cart,numerb_cart,numerc_cart,numerd_cart,numere_cart) 
				values('$fegr',$a,$b,$c,$d,$e)";
			mysql_query($guardar,$conexion) or die (mysql_error());
			echo "2";
		}
	}
?>