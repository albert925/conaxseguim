$(document).on("ready",inicio_inidcador);
function inicio_inidcador () {
	$("#mesBcb,#yearBcb").on("change",busqueda_meses_year);
	$("#pagadocobrar").on("change",cambioporcentaje_finaiciero);
	$("#trasdi").on("change",cambio_precio_y_porecentaje);
}
function busqueda_meses_year () {
	var ba=$("#mesBcb").val();
	var bb=$("#yearBcb").val();
	window.location.href="ind2x.php?ca="+ba+"&cb="+bb;
}
function colocar_color (numero) {
	if (numero<=74) {
		var stylnumer="color:#FF3C3C;";
	}
	else{
		if (numero>=75 && numero<=97) {
			var stylnumer="color:#FAFF1E;";
		}
		else{
			var stylnumer="color:#00A5D4;";
		}
	}
	return stylnumer;
}
function cambioporcentaje_finaiciero () {
	var numeroobtenido=parseInt($("#pagadocobrar").val());
	var cuentas_por_mes=parseInt($(this).attr("data-tocomercial"));
	var totalingresos=parseInt($("#ucltoprecioA").attr("data-ingresos"));
	var totalpagos=parseInt($("#ucltoprecioA").attr("data-pagos"));
	var totalareas=parseInt($("#ucltoprecioA").attr("data-area"));
	var numbr=parseInt($("#ucltoprecioA").attr("data-nub"));
	var sum_finaciero=parseInt($("#ucltoprecioA").attr("data-finacniero"));
	var diferencia=cuentas_por_mes+numeroobtenido;
	//var porcea=totalingresos/diferencia;
	var porcea=(totalingresos/numbr)*100;
	var porceb=porcea*0.7;
	var totalporcentaqje=totalpagos+porceb+totalareas;
	$("#ccol").text(diferencia.toFixed(2));
	$("#acol").text(porcea.toFixed(2));
	$("#bcol").text(porceb.toFixed(2));
	if (totalporcentaqje<=74) {
		var style="color:#FF3C3C;";
	}
	else{
		if (totalporcentaqje>=75 && totalporcentaqje<=97) {
			var style="color:#FAFF1E;";
		}
		else{
			var style="color:#00A5D4;";
		}
	}
	$("#totalfinc").text(sum_finaciero.toFixed(2));
	$("#totalfinc").attr("style",style);
	$.post("cartera.php",{a:numeroobtenido,b:diferencia,c:porcea,d:porceb,e:sum_finaciero},resultcartera);
}
function resultcartera (twk) {
	if (twk=="2") {
		location.reload(20);
	}
	else{
		alert(twk);
	}
}
function cambio_precio_y_porecentaje () {
	var diaa=$("#habdi").val();
	var diab=$("#trasdi").val();
	$("#cargador").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$.post("cambio_porecentajes.php",{a:diaa,b:diab},resulporcentjaes);
}
function resulporcentjaes (kyu) {
	$("#cargador center").remove();
	if (kyu=="1") {
		alert(kyu);
	}
	else{
		//alert(kyu);
		var separador=kyu.split("/");
		var pordias=separador[0];
		var meta_diaria=separador[1];
		var porcentaje_dias=separador[2];
		var totalmerdis=separador[3];
		var porce_dise=separador[4];
		var porce_merca=separador[5];
		var porce_program=separador[6];
		var porce_geren=separador[7];
		var totalventas=separador[8];
		$("#cja").text(meta_diaria);
		$("#cjb").text(pordias);
		$("#cjc").text(totalventas);
		$("#cjd").text(porcentaje_dias+"%").attr("style",colocar_color(porcentaje_dias));
		$("#cola").text(porce_dise+"%").attr("style",colocar_color(porce_dise));
		$("#colb").text(porce_merca+"%").attr("style",colocar_color(porce_merca));
		$("#colc").text(porce_program+"%").attr("style",colocar_color(porce_program));
		$("#cold").text(porce_geren+"%").attr("style",colocar_color(porce_geren));
	}
}