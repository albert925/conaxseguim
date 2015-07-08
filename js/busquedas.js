$(document).on("ready",iniciarbusquedas);
function iniciarbusquedas () {
	$("#busqueda").on("click",enbusa);
	$("#busquedb").on("click",enbusb);
	$("#mespor,#yerpor").on("change",busquedames);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function enbusa () {
	var bba=$("#empresaB").val();
	var bbb=$("#plansB").val();
	var bbc=$("#estdplansgB").val();
	var bbd=$("#redirecionadorB").val();
	var bbe=$("#estadodirecionsegB").val();
	var bbf=$("#proveedorB").val();
	var fdi=$("#fdiB").val();
	var fmi=$("#fmesiB").val();
	var fyi=$("#yeariB").val();
	var fdf=$("#fdFB").val();
	var fmf=$("#fmesFB").val();
	var fyf=$("#yearFB").val();
	var fdr=$("#fdRB").val();
	var fmr=$("#fmesRB").val();
	var fyr=$("#yearRB").val();
	var fdg=$("#fding").val();
	var fmg=$("#fmesing").val();
	var fyg=$("#yearing").val();
	var bbg=$("#paisempr").val();
	var bbh=$("#depestempr").val();
	var bbi=$("#ciudadempr").val();
	$("#finresultados").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#finresultados").fadeIn();
	$.post("busquedaterminada.php",{
		la:bba,lb:bbb,lc:bbc,ld:bbd,le:bbe,lf:bbf,lg:bbg,lh:bbh,li:bbi,
		fia:fdi,fib:fmi,fic:fyi,
		ffa:fdf,ffb:fmf,ffc:fyf,
		fra:fdr,frb:fmr,frc:fyr,
		fba:fdg,fbb:fmg,fbc:fyg
	},resultadobudsqdas);
}
function resultadobudsqdas (busdog) {
	$("#finresultados").html(busdog);
}
function enbusb () {
	cca=$("#empresaB").val();
	ccb=$("#clienterempr").val();
	ccc=$("#paisempr").val();
	ccd=$("#depestempr").val();
	cce=$("#ciudadempr").val();
	$("#setfinbusq").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#setfinbusq").fadeIn();
	$.post("busqdadesdeclient.php",{
		ka:cca,kb:ccb,kc:ccc,kd:ccd,ke:cce
	},resultadosbusB);
}
function resultadosbusB (busdag) {
	$("#setfinbusq").fadeOut();
	$("#setfinbusq center").remove();
	$("#finresultadosB").html(busdag);
}
function busquedames () {
	var idmes=$("#mespor").val();
	var idyear=$("#yerpor").val();
	//$.post("busquedmesfin.php",{mesEV:idmes},terminadomeses);
	window.location.href="ind2x.php?mesEV="+idmes+"&yearEV="+idyear;
}
function terminadomeses (haga) {
	$("#vertables,#paginasc").fadeOut();
	$("#filtro").html(haga);
	$("#filtro").fadeIn();
}