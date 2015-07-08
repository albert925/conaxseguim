var nxpr=/^[0-9_\.\-]/;
$(document).on("ready",pagosyterceros);
function pagosyterceros () {
	$("#ingrnterc").on("click",ingresonuevotercero);
	$(".modfiterceros").on("click",modificarterceros);
	$("#nutipoPP").on("change",busquedaterceros);
	$("#ingrpagos").on("click",nuevopagos);
	$(".verter").on("click",ver_terceros);
	$(".closep").on("click",cerrartodos);
	$(".cambiP").on("change",cambiodeestado);
	$(".cambiUu").on("change",cambioestcostos);
	$("#modifcadatsA").on("click",cambiarpagosA);
	$("#modifcadatsB").on("click",cambiarpagosB);
	$("#fechamodifpagos").on("click",cambiarfechaC);
	$("#mesbP,#yearPago").on("change",busquedapagos);
	$(".pisestdos").on("change",cambiarestadoprovee);
	$("#csfcs").on("click",modifcar_costos);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
function cerrartodos (sert) {
	sert.preventDefault();
	$(".miniventana").fadeOut();
}
function ingresonuevotercero () {
	var la=$("#nuvnam").val();//nombre tercero
	var lb=$("#nucednit").val();//cedula/nit tercero
	var lc=$("#nutelf").val();//telefono tercero
	var ld=$("#nudire").val();//direccion tercero
	var le=$("#nutipo").val();//tipo tercero
	if (la=="") {
		$("#mester").css(normal).text("ingrese nombre");
		$("#mester").fadeIn();
	}
	else{
		if (lb=="" || lb.length<6) {
			$("#mester").css(normal).text("Cedula o nit minimo 6 digitos");
			$("#mester").fadeIn();
		}
		else{
			if (le=="0" || le=="") {
				$("#mester").css(normal).text("Selecione tipo de tercero");
				$("#mester").fadeIn();
			}
			else{
				$("#mester").css(normal).text("");
				$("#mester").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mester").fadeIn();
				$.post("ingrenuevotercerosF.php",{fa:la,fb:lb,fc:lb,fd:ld,fe:le},termmestercn);
			}
		}
	}
}
function termmestercn (sakl) {
	if (sakl=="2") {
		$("#mester").css(normal).text("La Cédula o Nit ya existe");
		$("#mester").fadeIn();$("#mester").fadeOut(3000);
	}
	else{
		if (sakl=="3") {
			$("#mester").css(bien).text("Terceros ingresado");
			$("#mester").fadeIn();$("#mester").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mester").html(sakl);
			$("#mester").css(normal);
			$("#mester").fadeIn();
		}
	}
}
function modificarterceros () {
	var idTt=$(this).attr("data-id");
	var cajaTa="namef_"+idTt;
	var cajaTb="cednitf_"+idTt;
	var cajaTc="telff_"+idTt;
	var cajaTd="direcf_"+idTt;
	var cajaTe="tipof_"+idTt;
	var opa=$("#"+cajaTa).val();
	var opb=$("#"+cajaTb).val();
	var opc=$("#"+cajaTc).val();
	var opd=$("#"+cajaTd).val();
	var ope=$("#"+cajaTe).val();
	if (idTt=="") {
		alert("Id tercero no disponible");
	}
	else{
		if (opa=="") {
			alert("Ingrese nombre");
		}
		else{
			if (opb=="" || opb.length<6) {
				alert("ceula o nit minimo 6 digitos");
			}
			else{
				if (ope=="0" || ope=="") {
					alert("selecione tipo tercero");
				}
				else{
					$.post("modifcacionterceros.php",{oa:opa,ob:opb,oc:opc,od:opd,oe:ope,of:idTt},reslmodifter);
				}
			}
		}
	}
}
function reslmodifter (finterc) {
	if (finterc=="2") {
		$("#informdoiftercer").css(bien).text("Datos modifcados");
		$("#informdoiftercer").fadeIn();$("#informdoiftercer").fadeOut(3000);
		location.reload(5000);
	}
	else{
		alert(finterc);
	}
}
function busquedaterceros () {
	var rtipo=$("#nutipoPP").val();
	$.post("busquedasterc.php",{idtp:rtipo},colocarsel);
}
function colocarsel (wet) {
	$("#usuterceros").html(wet);
}
function nuevopagos () {
	var adadd=$(this).attr("data-adm");
	var dia=$("#fdP").val();
	var mes=$("#fmesP").val();
	var year=$("#yearP").val();
	var tercerpg=$("#usuterceros").val();
	var valor=$("#valorP").val();
	var texto=$("#concepP").val();
	var estadop=$("#estdP").val();
	var tipPg=$("#tipPg").val();
	if (dia=="0") {
		$("#mespag").css(normal).text("selecione dia");
		$("#mespag").fadeIn();
	}
	else{
		if (mes=="0") {
			$("#mespag").css(normal).text("selecione mes");
			$("#mespag").fadeIn();
		}
		else{
			if (year=="" || year.length!=4) {
				$("#mespag").css(normal).text("escribe año");
				$("#mespag").fadeIn();
			}
			else{
				if (tercerpg=="0" || tercerpg=="") {
					$("#mespag").css(normal).text("selecione el tercero");
					$("#mespag").fadeIn();
				}
				else{
					if (valor=="" || !nxpr.test(valor)) {
						$("#mespag").css(normal).text("valor solo números");
						$("#mespag").fadeIn();
					}
					else{
						if (estadop=="0" || estadop=="") {
							$("#mespag").css(normal).text("selecione el estado de pago");
							$("#mespag").fadeIn();
						}
						else{
							if (tipPg=="0" || tipPg=="") {
								$("#mespag").css(normal).text("selecione Tipo de Pago");
								$("#mespag").fadeIn();
							}
							else{
								$("#mespag").css(normal).text("");
								$("#mespag").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
								$("#mespag").fadeIn();
								$.post("ingresonuvpagos.php",{amdev:adadd,d:dia,m:mes,y:year,t:tercerpg,v:valor,c:texto,e:estadop,f:tipPg},mesresultadopagisA);
							}
						}
					}
				}
			}
		}
	}
}
function mesresultadopagisA (misspa) {
	if (misspa=="2") {
		$("#mespag").css(bien).text("Pago ingresado");
		$("#mespag").fadeIn();$("#mespag").fadeOut(3000);
		//location.reload(5000);
	}
	else{
		$("#mespag").html(misspa);
		$("#mespag").css(normal);
		$("#mespag").fadeIn();
	}
}
function ver_terceros (al) {
	al.preventDefault();
	var idE=$(this).attr("data-ter");
	$.post("coloinforterceros.php",{Tcid:idE},mostrarterceros);
}
function mostrarterceros (sorecret) {
	$(".verterceros").html(sorecret);
	$(".miniventana").fadeIn();
}
function cambiodeestado () {
	var idcambio=$(this).attr("data-id");
	var administrator=$(this).attr("data-admn");
	var cajasel="estp_"+idcambio;
	var iptin=$("#"+cajasel).val();
	if (iptin=="0" || iptin=="") {
		alert("Selecione el estado");
	}
	else{
		$.post("cambiarestadoP.php",{idB:idcambio,tipoB:iptin,minad:administrator},resultadcabmios);
	}
}
function resultadcabmios (proty) {
	if (proty=="2") {
		alert("estado cambiado");
		location.reload(20);
	}
	else{
		alert(proty);
	}
}
function cambiarpagosA () {
	var quiencA=$(this).attr("data-adm");
	var idpagoA=$(this).attr("data-idp");
	var terceA=$("#usuterceros").val();
	if (idpagoA=="") {
		$("#mesanjA").css(normal).text("Id pago no disponible");
		$("#mesanjA").fadeIn();
	}
	else{
		if (terceA=="0" || terceA=="") {
			$("#mesanjA").css(normal).text("Selecione los terceros");
			$("#mesanjA").fadeIn();
		}
		else{
			$("#mesanjA").css(normal).text("");
			$("#mesanjA").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#mesanjA").fadeIn();
			$.post("cambiartercero.php",{pida:idpagoA,tcra:terceA,hada:quiencA},cambiomesA);
		}
	}
}
function cambiomesA (lkopa) {
	if (lkopa=="2") {
		$("#mesanjA").css(bien).text("Terceros de pagos cambiado");
		$("#mesanjA").fadeIn();$("#mesanjA").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesanjA").html(lkopa);
		$("#mesanjA").css(normal);
		$("#mesanjA").fadeIn();
	}
}
function cambiarpagosB () {
	var quiencB=$(this).attr("data-adm");
	var idpagoB=$(this).attr("data-idp");
	var tepeRP=$("#tipPgF").val();
	var valorB=$("#valorP").val();
	var textoB=$("#concepP").val();
	var estadoB=$("#estdP").val();
	if (valorB=="" || !nxpr.test(valorB)) {
		$("#mesanjB").css(normal).text("Valor solo números");
		$("#mesanjB").fadeIn();
	}
	else{
		if (estadoB=="0" || estadoB=="") {
			$("#mesanjB").css(normal).text("Selecione el estado pago");
			$("#mesanjB").fadeIn();
		}
		else{
			if (tepeRP=="0" || tepeRP=="") {
				$("#mesanjB").css(normal).text("Selecione el tipo de pago");
				$("#mesanjB").fadeIn();
			}
			else{
				$("#mesanjB").css(normal).text("");
				$("#mesanjB").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesanjB").fadeIn();
				$.post("cmbiarrestodatospago.php",{pidb:idpagoB,ag:valorB,bg:textoB,cg:estadoB,dg:quiencB,eg:tepeRP},cambiomesB);
			}
		}
	}
}
function cambiomesB (lkopb) {
	if (lkopb=="2") {
		$("#mesanjB").css(bien).text("Datos modifcado");
		$("#mesanjB").fadeIn();$("#mesanjB").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesanjB").html(lkopb);
		$("#mesanjB").css(normal);
		$("#mesanjB").fadeIn();
	}
}
function cambiarfechaC () {
	var quiencC=$(this).attr("data-adm");
	var idpagoC=$(this).attr("data-idp");
	var diaB=$("#fdP").val();
	var mesB=$("#fmesP").val();
	var yearB=$("#yearP").val();
	if (idpagoC=="") {
		alert("id pago no disponible");
	}
	else{
		if (diaB=="0" || diaB=="") {
			$("#mesanjC").css(normal).text("Selecione el dia");
			$("#mesanjC").fadeIn();
		}
		else{
			if (mesB=="0" || mesB=="") {
				$("#mesanjC").css(normal).text("Selecione el mes");
				$("#mesanjC").fadeIn();
			}
			else{
				if (yearB=="" || yearB.length!=4) {
					$("#mesanjC").css(normal).text("Escribe el año");
					$("#mesanjC").fadeIn();
				}
				else{
					$("#mesanjC").css(normal).text("");
					$("#mesanjC").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#mesanjC").fadeIn();
					$.post("cambiofechaApagos.php",{pidc:idpagoC,aj:diaB,bj:mesB,cj:yearB,dj:quiencC},cambiofechaB);
				}
			}
		}
	}
}
function cambiofechaB (lkopc) {
	if (lkopc=="2") {
		$("#mesanjC").css(bien).text("Fecha modificada");
		$("#mesanjC").fadeIn();$("#mesanjC").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesanjC").html(lkopc);
		$("#mesanjC").css(normal);
		$("#mesanjC").fadeIn();
	}
}
function busquedapagos () {
	var fechapae=$("#mesbP").val();
	var yepae=$("#yearPago").val();
	/*$("#finfechaspagos").fadeIn();
	$("#finfechaspagos img").remove();
	$("#finfechaspagos").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$.post("empezarbusqudapagosA.php",{mesese:fechapae},colocarresulf);*/
	window.location.href="ind2x.php?mesPr="+fechapae+"&yearPr="+yepae;
}
function colocarresulf (date) {
	$("#normalpagos,#paginasc").fadeOut();
	$("#finfechaspagos").html(date);
	//$("#finfechaspagos").fadeIn();
}
function cambiarestadoprovee () {
	var idpvp=$(this).attr("data-idpv");
	var nocajaD="espov_"+idpvp;
	var opcionD=$("#"+nocajaD).val();
	$.post("cambioDDf.php",{idDss:idpvp,tipoD:opcionD},jankD);
}
function jankD (wD) {
	if (wD=="2") {
		alert("Estado proveedor mnodificado");
		location.reload(20);
	}
	else{
		alert(wD);
	}
}
function cambioestcostos () {
	var cdSid=$(this).attr("data-id");
	var adCos=$(this).attr("data-admn");
	var tdcost=$("#estpvU_"+cdSid).val();
	$.post("cambio_estadoCostos.php",{sa:cdSid,sb:adCos,sc:tdcost},sigResA);
}
function sigResA (rcsR) {
	if (rcsR=="2") {
		alert("Estado Cambiado");
		location.reload(20);
	}
	else{
		alert(rcsR);
	}
}
function modifcar_costos () {
	var cosid=$(this).attr("data-id");
	var racs=$("#csa").val();
	var rbcs=$("#csb").val();
	var rccs=$("#csc").val();
	var cosad=$(this).attr("data-adm");
	if (racs=="") {
		$("#jac").css(normal).text("Ingrese el nombre");
		$("#jac").fadeIn();
	}
	else{
		if (rbcs=="") {
			$("#jac").css(normal).text("Ingrese la fecha");
			$("#jac").fadeIn();
		}
		else{
			if (rccs=="") {
				$("#jac").css(normal).text("Ingrese el valor");
				$("#jac").fadeIn();
			}
			else{
				$("#jac").css(normal).text("");
				$("#jac").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#jac").fadeIn();
				$.post("modif_costos.php",{idcs:cosid,oa:racs,ob:rbcs,oc:rccs,od:cosad},resul_fcosto);
			}
		}
	}
}
function resul_fcosto (cinft) {
	if (cinft=="2") {
		$("#jac").css(bien).text("Costo modificado");
		$("#jac").fadeIn();
		location.reload(20);
	}
	else{
		$("#jac").css(normal).html(cinft);
		$("#jac").fadeIn();
	}
}