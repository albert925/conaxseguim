$(document).on("ready",iniciocd);
function iniciocd () {
	$("#coal").on("click",codigos);
}
function rand_code (chars, lon) {
	var code="";
	for (var i = 0; i < lon; i++) {
		rand= Math.floor(Math.random()*chars.length);
		code += chars.substr(rand, 1)
	}
	return code;
}
function codigos () {
	var numeros="01253456789";
	var letras="abcdefghijklmnopqrstuvwxyz";
	var carac=numeros+letras;
	var longitud=6;
	var letrcc="";
	$("#mscd").text(rand_code(carac,longitud));
}