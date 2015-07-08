$(document).on("ready",inicio_cajas);
function inicio_cajas () {
	$("#mesacaja,#yearcaja").on("change",mes_caja);
}
function mes_caja () {
	var numeroMes=$("#mesacaja").val();
	var numeroYear=$("#yearcaja").val();
	window.location.href="ind2x.php?ms="+numeroMes+"&ya="+numeroYear;
}