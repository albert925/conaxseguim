$(document).on("ready",iniciarmetas);
function iniciarmetas () {
	$("#ingrmeta").on("click",nuevometas);
	$("#imodfimeta").on("click",modifcarmetas);
	$("#ingrMTda").on("click",nuevometD);
	$("#imodfimebBf").on("click",modifmetBdos);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
function nuevometas () {
	var valormeta=$("#valmeta").val();
	var mesmeta=$("#mesT").val();
	var depardep=$("#dptT").val();
	if (valormeta=="0" || valormeta=="") {
		$("#mesjmetas").css(normal).text("ingres el valor de la meta");
		$("#mesjmetas").fadeIn();
	}
	else{
		if (mesmeta=="0" || mesmeta=="") {
			$("#mesjmetas").css(normal).text("Selecione el mes");
			$("#mesjmetas").fadeIn();
		}
		else{
			if (depardep=="0" || depardep=="") {
				$("#mesjmetas").css(normal).text("Selecione el departamento");
				$("#mesjmetas").fadeIn();
			}
			else{
				$("#mesjmetas").css(normal).text("");
				$("#mesjmetas").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesjmetas").fadeIn();
				$.post("ingresnuevometas.php",{vl:valormeta,ms:mesmeta,dp:depardep},resultadometasingf);
			}
		}
	}
}
function resultadometasingf (lv) {
	if (lv=="2") {
		$("#mesjmetas").css(bien).text("Valor meta ingresada");
		$("#mesjmetas").fadeIn();$("#mesjmetas").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesjmetas").html(lv);
		$("#mesjmetas").css(normal);
		$("#mesjmetas").fadeIn();
	}
}
function modifcarmetas () {
	var idmm=$(this).attr("data-id");
	var modfivalor=$("#valmetaf").val();
	var modfmes=$("#mesttf").val();
	var deparb=$("#dptTF").val();
	if (modfivalor=="") {
		$("#mesjmmodifmetas").css(normal).text("Ingrese valor meta");
		$("#mesjmmodifmetas").fadeIn();
	}
	else{
		if (modfmes=="0" || modfmes=="") {
			$("#mesjmmodifmetas").css(normal).text("Selecione el mes");
			$("#mesjmmodifmetas").fadeIn();
		}
		else{
			if (deparb=="0" || deparb=="") {
				$("#mesjmmodifmetas").css(normal).text("Selecione el departamento");
				$("#mesjmmodifmetas").fadeIn();
			}
			else{
				$("#mesjmmodifmetas").css(normal).text("");
				$("#mesjmmodifmetas").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesjmmodifmetas").fadeIn();
				$.post("cambiarvalormeta.php",{idfm:idmm,vlf:modfivalor,msf:modfmes,fdp:deparb},resulmdoficaciones);
			}
		}
	}
}
function resulmdoficaciones (valfrt) {
	if (valfrt=="2") {
		$("#mesjmmodifmetas").css(bien).text("Valor meta modficada");
		$("#mesjmmodifmetas").fadeIn();$("#mesjmmodifmetas").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesjmmodifmetas").html(valfrt);
		$("#mesjmmodifmetas").css(normal);
		$("#mesjmmodifmetas").fadeIn();
	}
}
function nuevometD () {
	var mesd=$("#mesTD").val();
	var derd=$("#diTD").val();
	var vald=$("#valmetaD").val();
	if (mesd=="" || mesd=="0") {
		$("#msjM").css(normal).text("Selecione el mes");
		$("#msjM").fadeIn();
	}
	else{
		if (derd=="" || derd=="0") {
			$("#msjM").css(normal).text("Selecione el direcionador");
			$("#msjM").fadeIn();
		}
		else{
			$("#msjM").css(normal).text("");
			$("#msjM").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#msjM").fadeIn();
			$.post("mew_metD.php",{mta:mesd,mtb:derd,mtc:vald},resultmetaDos);
		}
	}
}
function resultmetaDos (KdosMt) {
	if (KdosMt=="2") {
		$("#msjM").css(bien).text("meta ingresado");
		$("#msjM").fadeIn();
		window.location.href="../comercial/ind2x.php";
	}
	else{
		$("#msjM").css(normal).html(KdosMt);
		$("#msjM").fadeIn();
	}
}
function modifmetBdos () {
	var iddosmt=$(this).attr("data-id");
	var fecDs=$("#Bmesttf").val();
	var derDs=$("#BdptTF").val();
	var preDs=$("#Bvalmetaf").val();
	if (fecDs=="0" || fecDs=="") {
		$("#mofmsjB").css(normal).text("Selecione el mes");
		$("#mofmsjB").fadeIn();
	}
	else{
		if (derDs=="0" || derDs=="") {
			$("#mofmsjB").css(normal).text("Selecione el direcionador");
			$("#mofmsjB").fadeIn();
		}
		else{
			$("#mofmsjB").css(normal).text("");
			$("#mofmsjB").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#mofmsjB").fadeIn();
			$.post("modif_metB.php",{faC:iddosmt,fbC:fecDs,fcC:derDs,fdC:preDs},resuldosFmc);
		}
	}
}
function resuldosFmc (KcamK) {
	if (KcamK=="2") {
		$("#mofmsjB").css(bien).text("meta modificado");
		$("#mofmsjB").fadeIn();
		location.reload(20);
	}
	else{
		$("#mofmsjB").css(normal).html(KcamK);
		$("#mofmsjB").fadeIn();
	}
}