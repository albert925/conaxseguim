$(document).on("ready",inicfiltrocobrar);
function inicfiltrocobrar () {
	$("#clientecr").on("change",haerfiltro);
	$("#nueva_ab").on("click",abrirventabono);
	$("#emab").on("change",colocarsegioenselectA);
	$("#nwab").on("click",nuevoabono);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
function haerfiltro () {
	var idclient=$("#clientecr").val();
	window.location.href="ind2x.php?cli="+idclient;
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