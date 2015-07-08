$(document).on("ready",empzaringresosectores);
function empzaringresosectores () {
	$("#ingrenexpais").on("click",ingresopaisF);
	$("#ingrenexdepart").on("click",ingresodepartF);
	$("#ingrenexciudad").on("click",ingresociudadF);
	$(".modfiP").on("click",modifpais);
	$(".modifDE").on("click",modifdepart);
	$(".CIC").on("click",modifciudad);
	$("#ingrerelPsDt").on("click",relacioningA);
	$("#ingrerelDsCt").on("click",relacioningB);
	$(".modifrelPD").on("click",modifarrelacionpaisdepartamento);
	$(".modifrelCD").on("click",modifarrelaciondepartamentociudad);
	$(".modficrSli").on("click",modifrelseliA);
	$(".modficrSliB").on("click",modifrelseliB);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function ingresopaisF () {
	var siap=$("#newpais").val();
	if (siap=="") {
		$("#mespaisNEW").css(normal).text("ingrese nombre del país");
		$("#mespaisNEW").fadeIn();
	}
	else{
		$("#mespaisNEW").css(normal).text("");
		$("#mespaisNEW").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mespaisNEW").fadeIn();
		$.post("datepaisingreso.php",{nampais:siap},mismespais);
	}
}
function mismespais (setp) {
	if (setp=="2") {
		$("#mespaisNEW").css(normal).text("El País ingresado ya exsite");
		$("#mespaisNEW").fadeIn();$("#mespaisNEW").fadeOut(3000);
	}
	else{
		if (setp=="3") {
			$("#mespaisNEW").css(bien).text("Pais Ingresado");
			$("#mespaisNEW").fadeIn();$("#mespaisNEW").fadeOut(3000);
		}
		else{
			$("#mespaisNEW").html(setp);
			$("#mespaisNEW").css(normal);
			$("#mespaisNEW").fadeIn();
		}
	}
}
function ingresodepartF () {
	var traped=$("#newdepart").val();
	if (traped=="") {
		$("#mesdepartNEW").css(normal).text("Ingrese nombre departamento o estado");
		$("#mesdepartNEW").fadeIn();
	}
	else{
		$("#mesdepartNEW").css(normal).text("");
		$("#mesdepartNEW").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mesdepartNEW").fadeIn();
		$.post("datedepartingreso.php",{namdepart:traped},mismesdepart);
	}
}
function mismesdepart (setd) {
	if (setd=="2") {
		$("#mesdepartNEW").css(normal).text("El departamento o estado ya existe");
		$("#mesdepartNEW").fadeIn();$("#mesdepartNEW").fadeOut(3000);
	}
	else{
		if (setd=="3") {
			$("#mesdepartNEW").css(bien).text("Departamento ingresado");
			$("#mesdepartNEW").fadeIn();$("#mesdepartNEW").fadeOut(3000);
		}
		else{
			$("#mesdepartNEW").html(setd);
			$("#mesdepartNEW").css(normal)
			$("#mesdepartNEW").fadeIn();
		}
	}
}
function ingresociudadF () {
	var daduic=$("#newciudad").val();
	if (daduic=="") {
		$("#mesciudadNEW").css(normal).text("Ingrese la ciudad");
		$("#mesciudadNEW").fadeIn();
	}
	else{
		$("#mesciudadNEW").css(normal).text("");
		$("#mesciudadNEW").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mesciudadNEW").fadeIn();
		$.post("dateciudadingreso.php",{namciudad:daduic},mismesciudad);
	}
}
function mismesciudad (setc) {
	if (setc=="2") {
		$("#mesciudadNEW").css(normal).text("la ciudad ya existe");
		$("#mesciudadNEW").fadeIn();$("#mesciudadNEW").fadeOut(3000);
	}
	else{
		if (setc=="3") {
			$("#mesciudadNEW").css(bien).text("Ciudad ingresado");
			$("#mesciudadNEW").fadeIn();$("#mesciudadNEW").fadeOut(3000);
		}
		else{
			$("#mesciudadNEW").html(setc);
			$("#mesciudadNEW").css(normal)
			$("#mesciudadNEW").fadeIn();
		}
	}
}
function modifpais () {
	var idpaisR=$(this).attr("data-id");
	var divtexcajiP="paisf_"+idpaisR;
	var plaP=$("#"+divtexcajiP).val();
	if (idpaisR=="") {
		alert("Id pais no disponible");
	}
	else{
		if (plaP=="") {
			alert("Ingrese nombre pais");
		}
		else{
			$.post("modifcarpais.php",{paifmid:idpaisR,paifmnam:plaP},midefpais);
		}
	}
}
function midefpais (terpais) {
	if (terpais=="2") {
		$("#menssector").css(normal).text("EL pais ya existe");
		$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
	}
	else{
		if (terpais=="3") {
			$("#menssector").css(bien).text("país modificado");
			$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#menssector").html(terpais);
			$("#menssector").css(normal);
			$("#menssector").fadIn();
		}
	}
}
function modifdepart () {
	var iddepart=$(this).attr("data-id");
	var divtexcajiD="departf_"+iddepart;
	var plaD=$("#"+divtexcajiD).val();
	if (iddepart=="") {
		alert("id departamento no disponible");
	}
	else{
		if (plaD=="") {
			alert("Ingrese nombre departamento o estado");
		}
		else{
			$.post("modifcardepart.php",{deparifid:iddepart,deparifnam:plaD},midefdepart);
		}
	}
}
function midefdepart (terdepart) {
	if (terdepart=="2") {
		$("#menssector").css(normal).text("EL departamento o estado ya existe");
		$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
	}
	else{
		if (terdepart=="3") {
			$("#menssector").css(bien).text("departamento o estado modificado");
			$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#menssector").html(terdepart);
			$("#menssector").css(normal);
			$("#menssector").fadIn();
		}
	}
}
function modifciudad () {
	var idciudadR=$(this).attr("data-id");
	var divtexcajiC="ciudf_"+idciudadR;
	var plaC=$("#"+divtexcajiC).val();
	if (idciudadR=="") {
		alert("id ciudad no disponible");
	}
	else{
		if (plaC=="") {
			alert("Ingrese la ciudad");
		}
		else{
			$.post("modifcarciudad.php",{idciuid:idciudadR,idcinam:plaC},midefciudad);
		}
	}
}
function midefciudad (terciudad) {
	if (terciudad=="2") {
		$("#menssector").css(normal).text("la ciudad ya existe");
		$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
	}
	else{
		if (terciudad=="3") {
			$("#menssector").css(bien).text("ciudad modificado");
			$("#menssector").fadeIn();$("#menssector").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#menssector").html(terciudad);
			$("#menssector").css(normal);
			$("#menssector").fadIn();
		}
	}
}
function relacioningA () {
	var idRRpais=$("#PaisRA").val();
	var dptrr=new Array();
	$(".prd:checked").each(function() {
		dptrr.push($(this).val());
	});
	if (idRRpais=="0") {
		$("#mensajerelacionA").css(normal).text("Selecione el pais");
		$("#mensajerelacionA").fadeIn();
	}
	else{
		$("#mensajerelacionA").css(normal).text("");
		$("#mensajerelacionA").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mensajerelacionA").fadeIn();
		$.post("IngresoRelacionPaisDepart.php",{idPev:idRRpais,idarDptev:dptrr},mesirelacionA);
	}
}
function mesirelacionA (rilA) {
	$("#mensajerelacionA").html(rilA);
	$("#mensajerelacionA").fadeIn();$("#mensajerelacionA").fadeOut(5000);
}
function modifarrelacionpaisdepartamento () {
	var idrelPDr=$(this).attr("data-id");
	var cajapais="selPs_"+idrelPDr;
	var cajadepart="selDpt_"+idrelPDr;
	var selipaisF=$("#"+cajapais).val();
	var selidepartF=$("#"+cajadepart).val();
	if (idrelPDr=="") {
		alert("Id relacion no disponible");
	}
	else{
		if (selidepartF=="0" || selidepartF=="") {
			alert("Id departamento no disoinible");
		}
		else{
			if (selipaisF=="0" || selipaisF=="") {
				alert("Id pais no disponible");
			}
			else{
				$.post("modificarelapaisdepart.php",{idRpDvT:idrelPDr,kka:selipaisF,kkb:selidepartF},meskfrtPD);
			}
		}
	}
}
function meskfrtPD (pdrt) {
	if (pdrt=="2") {
		$("#mesaRPDT").css(normal).text("La relación ya existe");
		$("#mesaRPDT").fadeIn();$("#mesaRPDT").fadeOut(3000);
	}
	else{
		if (pdrt=="3") {
			$("#mesaRPDT").css(bien).text("relación Modificada");
			$("#mesaRPDT").fadeIn();$("#mesaRPDT").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mesaRPDT").html(pdrt);
			$("#mesaRPDT").css(normal);
			$("#mesaRPDT").fadeIn();
		}
	}
}
function relacioningB () {
	var iddepartRc=$("#DeparRA").val();
	var cdrr=new Array();
	$(".prc:checked").each(function() {
		cdrr.push($(this).val());
	});
	if (iddepartRc=="0" || iddepartRc=="") {
		$("#mensajerelacionB").css(normal).text("Selecione Departamento o Estado");
		$("#mensajerelacionB").fadeIn();
	}
	else{
		$("#mensajerelacionB").css(normal).text("");
		$("#mensajerelacionB").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mensajerelacionB").fadeIn();
		$.post("IngresoRelacionDepartCiudad.php",{idDev:iddepartRc,idCiuev:cdrr},mesirelacionB);
	}
}
function mesirelacionB (rilB) {
	$("#mensajerelacionB").html(rilB);
	$("#mensajerelacionB").fadeIn();$("#mensajerelacionB").fadeOut(5000);
}
function modifarrelaciondepartamentociudad () {
	var idrelDCr=$(this).attr("data-id");
	var cajadepartb="selDs_"+idrelDCr;
	var cajaciudad="selCiud_"+idrelDCr;
	var selidepartbF=$("#"+cajadepartb).val();
	var seliciudadF=$("#"+cajaciudad).val();
	if (idrelDCr=="") {
		alert("id relcaion no disponible");
	}
	else{
		if (selidepartbF=="0" || selidepartbF=="") {
			alert("Selecione departamento");
		}
		else{
			if (seliciudadF=="0" || seliciudadF=="") {
				alert("Selecione la ciudad");
			}
			else{
				$.post("modificareladepartciudad.php",{idrelEv:idrelDCr,kkc:selidepartbF,kkd:seliciudadF},meskfrtDC);
			}
		}
	}
}
function meskfrtDC (cdrt) {
	if (cdrt=="2") {
		$("#mesaRDCT").css(normal).text("La relación ya existe");
		$("#mesaRDCT").fadeIn();$("#mesaRDCT").fadeOut(3000);
	}
	else{
		if (cdrt=="3") {
			$("#mesaRDCT").css(bien).text("relación Modificada");
			$("#mesaRDCT").fadeIn();$("#mesaRDCT").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mesaRDCT").html(cdrt);
			$("#mesaRDCT").css(normal);
			$("#mesaRDCT").fadeIn();
		}
	}
}
function modifrelseliA () {
	var relaidla=$(this).attr("data-id");
	var idpaisla=$(this).attr("data-pais");
	var cajedepart="selDpt_"+relaidla;
	var optiondepart=$("#"+cajedepart).val();
	if (relaidla=="") {
		alert("Id relacion no disponible");
	}
	else{
		if (idpaisla=="") {
			alert("id pais no disponible");
		}
		else{
			if (optiondepart=="0" || optiondepart=="") {
				alert("selecione departamento");
			}
			else{
				$.post("ModifcarrelaA.php",{hta:relaidla,htb:idpaisla,htc:optiondepart},lias);
			}
		}
	}
}
function lias (hds) {
	if (hds=="2") {
		$("#menssectorA").css(normal).text("La relación ya existe");
		$("#menssectorA").fadeIn();$("#menssectorA").fadeOut(3000);
	}
	else{
		if (hds=="3") {
			$("#menssectorA").css(bien).text("La relación modificada");
			$("#menssectorA").fadeIn();$("#menssectorA").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#menssectorA").html(hds);
			$("#menssectorA").css(normal);
			$("#menssectorA").fadeIn();
		}
	}
}
function modifrelseliB () {
	var relaidlb=$(this).attr("data-id");
	var iddepartlb=$(this).attr("data-depart");
	var cajeciudad="seliCiud_"+relaidlb;
	var optionciudad=$("#"+cajeciudad).val();
	if (relaidlb=="") {
		alert("id relacion no disponible");
	}
	else{
		if (iddepartlb=="") {
			alert("id departamento no disponible");
		}
		else{
			if (optionciudad=="0" || optionciudad=="") {
				alert("Selecione la ciudad");
			}
			else{
				$.post("ModifcarrelaB.php",{htd:relaidlb,hte:iddepartlb,htf:optionciudad},libs);
			}
		}
	}
}
function libs (hgj) {
	if (hgj=="2") {
		$("#menssectorB").css(normal).text("La relación ya existe");
		$("#menssectorB").fadeIn();$("#menssectorB").fadeOut(3000);
	}
	else{
		if (hgj=="3") {
			$("#menssectorB").css(bien).text("La relación modificada");
			$("#menssectorB").fadeIn();$("#menssectorB").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#menssectorB").html(hgj);
			$("#menssectorB").css(normal);
			$("#menssectorB").fadeIn();
		}
	}
}