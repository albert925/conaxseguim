$(document).on("ready",iniciobusquedatareas);
function iniciobusquedatareas () {
	$("#buscartareas").on("click",inicarbusquedatar);
}
function inicarbusquedatar () {
	var az=$("#seguiB").val();
	var bz=$("#respadmB").val();
	var cz=$("#nimetareaB").val();
	var dz=$("#fdiB").val();
	var ez=$("#fmesiB").val();
	var fz=$("#yeariB").val();
	var gz=$("#fdFB").val();
	var hz=$("#fmesFB").val();
	var iz=$("#yearFB").val();
	$("#tareasbusenc").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#tareasbusenc").fadeIn();
	$.post("busquedafinTares.php",{
		qa:az,qb:bz,qc:cz,qd:dz,qe:ez,qf:fz,qg:gz,qh:hz,qi:iz
	},finbusquedatareas);
}
function finbusquedatareas (tarzs) {
	$("#tareasbusenc").html(tarzs);
}