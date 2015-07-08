$(document).on("ready",inicairdirecionadores);
function inicairdirecionadores () {
	$("#ingrdirecionador").on("click",nuevodirecionador);
	$(".modfidireci").on("click",modifiaciondirecionador);
	$(".istedir").on("change",modifcarestadodirecin);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function nuevodirecionador () {
	var namedirecion=$("#namedirecionador").val();
	var estadodirecion=$("#estiddirer").val();
	if (namedirecion=="") {
		$("#mesingdirecionador").css(normal).text("Ingrese nombre direcionador");
		$("#mesingdirecionador").fadeIn();
	}
	else{
		if (estadodirecion=="0" || estadodirecion=="") {
			$("#mesingdirecionador").css(normal).text("Selecione el estado");
			$("#mesingdirecionador").fadeIn();
		}
		else{
			$("#mesingdirecionador").css(normal).text("");
			$("#mesingdirecionador").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#mesingdirecionador").fadeIn();
			$.post("ingresonuevodirer.php",{nimDR:namedirecion,stDR:estadodirecion},mesanjkedirediocA);
		}
	}
}
function mesanjkedirediocA (derft) {
	if (derft=="2") {
		$("#mesingdirecionador").css(normal).text("Nombre direcionador ya existe");
		$("#mesingdirecionador").fadeIn();$("#mesingdirecionador").fadeOut(3000);
	}
	else{
		if (derft=="3") {
			$("#mesingdirecionador").css(bien).text("Direcionador ingresado");
			$("#mesingdirecionador").fadeIn();$("#mesingdirecionador").fadeOut(3000);
		}
		else{
			$("#mesingdirecionador").html(derft);
			$("#mesingdirecionador").css(normal);
			$("#mesingdirecionador").fadeIn();
		}
	}
}
function modifiaciondirecionador () {
	var iddirecionador=$(this).attr("data-id");
	var cajadireA="name_"+iddirecionador;
	var nombrefdr=$("#"+cajadireA).val();
	if (iddirecionador=="") {
		alert("id direcionador no disponible");
	}
	else{
		if (nombrefdr=="") {
			alert("Ingrese nombre direcionador");
		}
		else{
			$.post("modfifcardirecionador.php",{iddrev:iddirecionador,nimdrev:nombrefdr},mesnamodifdirecB);
		}
	}
}
function mesnamodifdirecB (fiddr) {
	if (fiddr=="2") {
		$("#mensdireciondaroff").css(normal).text("Nombre Direcionador ya existe");
		$("#mensdireciondaroff").fadeIn();$("#mensdireciondaroff").fadeOut(3000);
	}
	else{
		if (fiddr=="3") {
			$("#mensdireciondaroff").css(bien).text("Direcionador modificado");
			$("#mensdireciondaroff").fadeIn();$("#mensdireciondaroff").fadeOut(3000);
		}
		else{
			$("#mensdireciondaroff").html(fiddr);
			$("#mensdireciondaroff").css(normal);
			$("#mensdireciondaroff").fadeIn();
		}
	}
}
function modifcarestadodirecin () {
	var idbdir=$(this).attr("data-id");
	var cajasele="estddire_"+idbdir;
	var opcionB=$("#"+cajasele).val();
	if (idbdir=="") {
		alert("id direcionador no disponible");
	}
	else{
		if (opcionB=="0" || opcionB=="") {
			alert("Selecione el estado");
		}
		else{
			$.post("cambiarestadodire.php",{hid:idbdir,hop:opcionB},mismesmodfidire);
		}
	}
}
function mismesmodfidire (actdesc) {
	if (actdesc=="2") {
		alert("Estado modificado");
		location.reload(10);
	}
	else{
		alert(actdesc);
	}
}