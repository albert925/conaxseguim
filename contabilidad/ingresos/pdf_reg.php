<?php
	include '../../config.php';
	require_once("../../dompdf/dompdf_config.inc.php");
	error_reporting(E_ALL ^ E_NOTICE);
	$idR=$_POST['idFact'];
	$a=$_POST['cdFp'];
	$b=$_POST['datFp'];
	$c=$_POST['valFp'];
	$d=$_POST['txFp'];
	$e=$_POST['chFp'];
	$f=$_POST['bnFp'];
	$g=$_POST['efFp'];
	$h=$_POST['ltnmb'];
	switch ($g) {
		case '':
			$gg="0";
			break;
		case '0':
			$gg="0";
			break;
		case '1':
			$gg="1";
			break;
		default:
			$gg="2";
			break;
	}
	if ($idR=="") {
		echo "en blanco el Codigo";
	}
	else{
		$modifcar="UPDATE recibo set fecha_rc='$b',lug_rc='$a',vaor_T='$c',text_rc='$d',
			cheke_rc='$e',banco_rc='$f',efect_rc='$gg',num_letras='$h' where n_rec='$idR'";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		$exportar_PDF="SELECT * from recibo where n_rec='$idR'";
		$sql_pdf=mysql_query($exportar_PDF,$conexion) or die (mysql_error());
		while ($fpd=mysql_fetch_array($sql_pdf)) {
			$idF=$fpd['n_rec'];
			$feF=$fpd['fecha_rc'];
			$lgF=$fpd['lug_rc'];
			$emF=$fpd['empre_id'];
			$txF=$fpd['text_rc'];
			$vlF=$fpd['vaor_T'];
			$ltF=$fpd['num_letras'];
			$chF=$fpd['cheke_rc'];
			$bnF=$fpd['banco_rc'];
			$efF=$fpd['efect_rc'];
			$edF=$fpd['estad_rc'];
			if ($efF=="1") {
				$eee="Si";
			}
			else{
				$eee="No";
			}
		}
		$Empresa="SELECT * from empresas where id_empresa='$emF'";
		$sql_Em=mysql_query($Empresa,$conexion) or die (mysql_error());
		while ($me=mysql_fetch_array($sql_Em)) {
			$nomEM=$me['name_empr'];
		}
		$hoy = date("Y-m-d g:i:s a");
		$formatoTotal=number_format($vlF,2);
		$codigo="
			<!DOCTYPE html>
				<html lang='es'>
				<head>
					<meta charset='utf-8' />
					<meta name='viewport' content='width=device-width, maximun-scale=1' />
					<title>Recibo $idF</title>
					<link rel='icon' href='../imagenes/icono.png' />
					<link rel='stylesheet' href='../../css/normalize.css' />
					<link rel='stylesheet' href='../../css/style_pdf.css' />
					<script src='../../js/jquery_2_1_1.js'></script>
				</head>
				<body>";
		$codigo.="
			<div>tílde</div>
			<br/><br/><br/><br/><br/><br/><br/><br/>
			<section id='cuadro'>
			<header>
				<figure id='logo'>
					<img src='../../imagenes/banner.png' alt='logo'  />
					<figcaption>
						<b>Nit. 1.090.434.4814-0</b>
					</figcaption>
				</figure>
				<article id='cod_caja'>
					<h4>Recibo de Caja No. $idR</h4>
				</article>
			</header>
			<nav>
				<span>AV 11 Nº 16-14 B. La Libertad Cúcuta - </span>
				<span>Col. Tel. 594 7018 Cel. 316 834 1424 - </span>
				<span>Email: contacto@conaxport.com</span>
			</nav>";
		$codigo.="<section id='piso_lin'>
			<label><b>Ciudad y Fecha: </b></label><span>&nbsp;&nbsp;$lgF $feF&nbsp;&nbsp;</span>
			<label><b>Valor: </b>
			</label><span>&nbsp;&nbsp;$$formatoTotal&nbsp;&nbsp;</span><br/>
			<label><b>Recibí de: </b></label><span>&nbsp;&nbsp;$nomEM&nbsp;&nbsp;</span><br />
			<label><b>Por concepto de: </b></label><span>&nbsp;&nbsp;$txF&nbsp;&nbsp;</span><br />
			<label><b>La suma de (en letras): </b></label><span>&nbsp;&nbsp;$ltF&nbsp;&nbsp;</span>
			<table border='1'>
				<tr>
					<td>
						<b>Cheque No.</b> $chF
					</td>
					<td>
						<b>Banco:</b> $bnF
					</td>
					<td colspan='2'>
						<b>Efectivo:</b> $eee
					</td>
				</tr>
				<tr>
					<td colspan='2' rowspan='3'>
						<b>Aprobado</b>
						<center><img src='../../imagenes/firma.jpg' alt='firma' style='width:180px;' /></center>
					</td>
					<td colspan='2' rowspan='2'>
						<b><b>Firma y Sello</b></b>
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan='2'>
						<b>C.C o NIT.</b> 
					</td>
				</tr>
			</table>
		</section>";
		$codigo.="</section>
					<footer>
						<div>
							Conaxport Asesorias empresariales Nit: 1090434481-0
						</div>
						<div>
							Página: 1
						</div>
					</footer>
				</body>
				</html>";
		$codigo=utf8_decode($codigo);
		$dompdf=new DOMPDF();
		$dompdf->load_html($codigo);
		ini_set("memory_limit","128M");
		$dompdf->render();
		$dompdf->stream("recibo_caja_$idR.pdf");
	}
?>