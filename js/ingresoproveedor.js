$(document).on("ready",inicioproveeedores);
function inicioproveeedores () {
	$("#ingrprove").on("click",nuevoproveeodr);
	$(".modfiprovee").on("click",modifcarproveedor);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function nuevoproveeodr () {
	var nameprove=$("#nameprove").val();
	var precioprove=$("#precioprove").val();
	if (nameprove=="") {
		$("#mesingprovees").css(normal).text("Ingrese nombre proveedor");
		$("#mesingprovees").fadeIn();
	}
	else{
		$("#mesingprovees").css(normal).text("");
		$("#mesingprovees").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$("#mesingprovees").fadeIn();
		$.post("ingresoproveedor.php",{nimpv:nameprove,precpv:precioprove},mesanjeproveA);
	}
}
function mesanjeproveA (vvpv) {
	if (vvpv=="2") {
		$("#mesingprovees").css(bien).text("Proveedor ingresado");
		$("#mesingprovees").fadeIn();$("#mesingprovees").fadeOut(3000);
	}
	else{
		$("#mesingprovees").html(vvpv);
		$("#mesingprovees").css(normal);
		$("#mesingprovees").fadeIn();
	}
}
function modifcarproveedor () {
	var idporveff=$(this).attr("data-id");
	var cajaproveA="name_"+idporveff;
	var cajaproveB="precprove_"+idporveff;
	var nombfpv=$("#"+cajaproveA).val();
	var precfpv=$("#"+cajaproveB).val();
	if (idporveff=="") {
		alert("id proveedor no disponible");
	}
	else{
		if (nombfpv=="") {
			alert("Escribe nombre proveedor");
		}
		else{
			$.post("modifcacionproveed.php",{idfa:idporveff,namfb:nombfpv,precfc:precfpv},mesajeresulf);
		}
	}
}
function mesajeresulf (frits) {
	if (frits=="2") {
		$("#mensreopvedesv").css(bien).text("Proveedor modificado");
		$("#mensreopvedesv").fadeIn();$("#mensreopvedesv").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mensreopvedesv").html(frits);
		$("#mensreopvedesv").css(normal);
		$("#mensreopvedesv").fadeIn();
	}
}