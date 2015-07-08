$(document).on("ready",empezaringresos);
function empezaringresos () {
	$("#mesbP").on("change",busquedaingmes);
	$("#yearb").on("change",busquedaingmes);
	$("#nueva_ab").on("click",abrirventabono);
	$("#emab").on("change",colocarsegioenselectA);
	$("#nueva_bb").on("click",abrirbenindirectos);
	$("#nwab").on("click",nuevoabono);
	$("#nuid").on("click",nuevoinidrecto);
	$("#mesabono,#yearb").on("change",busquedmestres);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function busquedaingmes () {
	var aad=$("#mesbP").val();
	var bbd=$("#yearb").val();
	$.post("busquedafiningresosA.php",{a:aad,b:bbd},colocarreslfecha);
}
function colocarreslfecha (gmesyear) {
	$("#normalpagos").fadeOut();
	$("#finfingresos").html(gmesyear);
	$("#finfingresos").fadeIn();
}
function abrirventabono () {
	$("#ag_bn").each(abrircerabono);
}
function abrircerabono () {
	var altoabono=$(this).css("height");
	//alert(altoabono);
	if (altoabono=="280px") {
		$(this).animate({height:"0"}, 500);
		$("#nueva_ab").text("Agregar Abono");
	}
	else{
		$(this).animate({height:"280px"}, 500);
		$("#nueva_ab").text("Cerrar Abono");
	}
}
function colocarsegioenselectA () {
	var idempE=$("#emab").val();
	$("#loadopt center").remove();
	$("#loadopt").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#loadopt").fadeIn();
	$.post("busqueda_plan_seg.php",{pe:idempE},colocaroptionA);
}
function colocaroptionA (sitS) {
	$("#loadopt").fadeOut();
	$("#plsgab").html(sitS);
}
function nuevoabono () {
	var fab=$("#feab").val();
	var fbb=$("#emab").val();
	var fcb=$("#plsgab").val();
	var fdb=$("#valab").val();
	if (fbb=="" || fbb=="0") {
		$("#rslab").css(normal).text("Selecione el Cliente");
		$("#rslab").fadeIn();
	}
	else{
		if (fcb=="" || fcb=="0") {
			$("#rslab").css(normal).text("Selecione el Plan Seguimiento");
			$("#rslab").fadeIn();
		}
		else{
			$("#rslab").css(normal).text("");
			$("#rslab").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#rslab").fadeIn();
			$.post("new_abono.php",{ba:fab,bb:fbb,bc:fcb,bd:fdb},resultadoabnonoNew);
		}
	}
}
function resultadoabnonoNew (Wne) {
	if (Wne=="2") {
		$("#rslab").css(bien).text("Abono ingresado y modifcado en tabla Seguimiento");
		$("#rslab").fadeIn();$("#rslab").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#rslab").html(Wne);
		$("#rslab").css(normal);
		$("#rslab").fadeIn();
	}
}
function abrirbenindirectos () {
	$("#ag_ind").each(ventaanimaingresos);
}
function ventaanimaingresos () {
	var altoingresos=$(this).css("height");
	//alert(altoingresos);
	if (altoingresos=="350px") {
		$(this).animate({height:"0"}, 500);
		$("#nueva_bb").text("Agregar Ingresos")
	}
	else{
		$(this).animate({height:"350px"}, 500);
		$("#nueva_bb").text("Cerrar Ingresos")
	}
}
function nuevoinidrecto () {
	var feIn=$("#fecindire").val();
	var textoIn=$("#decrpindire").val();
	var tercIn=$("#terindire").val();
	var valIn=$("#valindire").val();
	$("#texidnirect").css(normal).text("");
	$("#texidnirect").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#texidnirect").fadeIn();
	$.post("new_indirecto.php",{ia:feIn,ib:textoIn,ic:tercIn,id:valIn},resultinidrectos);
}
function resultinidrectos (inif) {
	if (inif=="2") {
		$("#texidnirect").css(bien).text("Indirecto ingresado");
		$("#texidnirect").fadeIn();$("#texidnirect").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#texidnirect").html(inif);
		$("#texidnirect").css(normal);
		$("#texidnirect").fadeIn();
	}
}
function busquedmestres () {
	var mesOp=$("#mesabono").val();
	var yerOp=$("#yearb").val()
	window.location.href="ind3x.php?ms="+mesOp+"&ys="+yerOp;
}