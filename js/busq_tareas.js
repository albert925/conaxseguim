$(document).on("ready",inicio_busqueda_tareas);
function inicio_busqueda_tareas () {
	$("#mesBcb,#yearBcb").on("change",buscarporfecha);
}
function buscarporfecha () {
	var fa=$("#mesBcb").val();
	var fb=$("#yearBcb").val();
	window.location.href="ind2x.php?ca="+fa+"&cb="+fb;
}