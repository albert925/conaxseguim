var contador=1;
$(document).on("ready",inicaranimacionyeventos);
function inicaranimacionyeventos () {
	$("#mn_mov").on("click",animarmenu);
	$(".submen").on("click",abrirsubmenu);
	$("#Apais").on("click",redirecionA);
	$("#Adep").on("click",redirecionB);
	$("#Aciud").on("click",redirecionC);
	$("#Vpais").on("click",redirecionPais);
	$("#Vdpt").on("click",redirecionDepart);
	$("#Vciud").on("click",redirecionCiudad);
	$("#Rpd").on("click",redirecionRPD);
	$("#Rdc").on("click",redirecionRDC);
	$("#Acl").on("click",clientdirecionD);
	$("#Aemp").on("click",clientdirecionE);
	$("#Vcl").on("click",clientdirecionF);
	$("#Vempr").on("click",empresdirecionG);
	$("#Adir").on("click",direciondirecionH);
	$("#Verdire").on("click",direciondirecionI);
	$("#Apl").on("click",plandirecionJ);
	$("#Vpl").on("click",plandirecionK);
	$("#Apve").on("click",proveedirecionL);
	$("#Vpve").on("click",proveedirecionM);
	$("#Vsgu").on("click",seguimdirecionN);
	$("#Vsgub").on("click",seguimdirecionO);
	$("#Agseg").on("click",seguimdirecionP);
	$("#Busseg").on("click",seguimdirecionQ);
	$("#VsguC").on("click",seguimdirecionU);
	$("#BussegC").on("click",seguimdirecionV);
	$(".deli").on("click",borrardatos);
	$(".veradmA").on("click",usuariodirecionR);
	$(".veradmB").on("click",usuariodirecionS);
	$(".veradmC").on("click",usuaruidirecionW);
	$(".veradmD").on("click",usuaruidirecionX);
	$("#Vtas").on("click",tareasdirecionZ);
	$("#Atas").on("click",agregartardirecionAA);
	$("#BususA").on("click",busqdirecionAB);
	$("#Vsusers").on("click",direcionAC);
	$("#Bustas").on("click",direcionAD);
	$("#Aterc").on("click",tercdirecionAE);
	$("#Vepag").on("click",tercdirecionAF);
	$("#Veterc").on("click",tercdirecionAG);
	$("#Atepag").on("click",pagosdirecionAH);
	$("#PagosDirec").on("click",pagosdirecionAI);
	$("#Domin").on("click",dominpagsaAJ);
	$("#NuvMet").on("click",netadirecionAK);
	$("#vermet").on("click",netadirecionAL);
	$("#VerMetotro").on("click",netadirecionAM);
	$("#VerMeto").on("click",netadirecionAN);
	$("#VerIcont").on("click",comerdirecionAO);
	$("#cajaTot").on("click",cajadirecionAP);
	$("#verind").on("click",cajadirecionAQ);
	$("#NuvMDrc").on("click",metdirdirecionAR);
	$("#VerMetoB").on("click",mteaverBdirecionAS);
	$("#VerMetodrB").on("click",metadirecionAT);
	$("#MtusA").on("click",usemetdirecionAU);
	$("#MtusB").on("click",usemetdirecionAV);
	$("#Buscl").on("click",busqdclientdirecionT);
	$("#paisempr").on("change",buscardepartamentos);
	$("#depestempr").on("change",buscarciudades);
	$(".redecl figure").on("click",abrirredes);
	if ($(window).width()<701) {
		$(window).scroll(posicionheader);
	}
}
var altomena={height:"13em"};
var altocero={height:"0"};
function borrardatos () {
	return confirm("Estas seguro de eliminar el dato?");
}
function animarmenu () {
	if (contador==1) {
		$("#mnP").animate({left:"0"}, 500);
		contador=0;
	}
	else{
		$("#mnP").animate({left:"-100%"}, 500);
		contador=1;
	}
}
function abrirsubmenu () {
	var numerothis=$(this).attr("data-num");
	$(".children"+numerothis).slideToggle();
}
function posicionheader () {
	var altoscroll=$(window).scrollTop();
	if (altoscroll>0) {
		$("header").css({position:"fixed"});
	}
	else{
		$("header").css({position:"initial"});
	}
}
function redirecionA () {
	window.location.href="ingresopais.php";
}
function redirecionB () {
	window.location.href="ingresodepartamento.php";
}
function redirecionC () {
	window.location.href="ingresociudad.php";
}
function redirecionPais () {
	window.location.href="../sectores";
}
function redirecionDepart () {
	window.location.href="../sectores/departamentoestado.php";
}
function redirecionCiudad () {
	window.location.href="../sectores/ciudad.php";
}
function redirecionRPD () {
	window.location.href="../sectores/recionpaisdepart.php";
}
function redirecionRDC () {
	window.location.href="../sectores/reciondepartciudad.php";
}
function clientdirecionD () {
	window.location.href="../clientes/agregarcliente.php";
}
function clientdirecionE () {
	window.location.href="../clientes/agregarempresa.php";
}
function clientdirecionF () {
	window.location.href="../clientes";
}
function empresdirecionG () {
	window.location.href="../clientes/empresas.php";
}
function direciondirecionH () {
	window.location.href="../direcionador/nuevodirecion.php";
}
function direciondirecionI () {
	window.location.href="../direcionador";
}
function plandirecionJ () {
	window.location.href="../planes/ingrenuevoplan.php";
}
function plandirecionK () {
	window.location.href="../planes";
}
function proveedirecionL () {
	window.location.href="../proveedores/nuevoproveedor.php";
}
function proveedirecionM () {
	window.location.href="../proveedores";
}
function seguimdirecionN () {
	window.location.href="../";
}
function seguimdirecionO () {
	window.location.href="../administrador";
}
function seguimdirecionP () {
	window.location.href="../administrador/nuegoseguimiento.php";
}
function seguimdirecionQ () {
	window.location.href="../administrador/busquedaseg.php";
}
function usuariodirecionR () {
	window.location.href="usuaadmin";
}
function usuariodirecionS () {
	window.location.href="../usuaadmin";
}
function busqdclientdirecionT () {
	window.location.href="../clientes/busquedaselipon.php";
}
function seguimdirecionU () {
	window.location.href="../contabilidad";
}
function seguimdirecionV () {
	window.location.href="../contabilidad/busquedaseg.php";
}
function usuaruidirecionW () {
	window.location.href="../administrador/usuaadmin";
}
function usuaruidirecionX () {
	window.location.href="../../administrador/usuaadmin";
}
function tareasdirecionZ () {
	window.location.href="../tareas";
}
function agregartardirecionAA () {
	window.location.href="nuevatarea.php";
}
function busqdirecionAB () {
	window.location.href="../users/busquedaseg.php";
}
function direcionAC () {
	window.location.href="../users";
}
function direcionAD () {
	window.location.href="../tareas/busquepersTareas.php";
}
function tercdirecionAE () {
	window.location.href="../pagos/nuevotercero.php";
}
function tercdirecionAF () {
	window.location.href="../pagos";
}
function tercdirecionAG () {
	window.location.href="../pagos/terceros.php";
}
function pagosdirecionAH () {
	window.location.href="../pagos/nuevopagos.php";
}
function pagosdirecionAI () {
	window.location.href="../pagos/pagdirecion.php";
}
function dominpagsaAJ () {
	window.location.href="../pagos/pagdominio.php";
}
function netadirecionAK () {
	window.location.href="../comercial/nuevometa.php";
}
function netadirecionAL () {
	window.location.href="../comercial";
}
function netadirecionAM () {
	window.location.href="../comercial/metas_mes.php";
}
function netadirecionAN () {
	window.location.href="../comercial";
}
function comerdirecionAO () {
	window.location.href="../comercial/ingreso_comercial.php";
}
function cajadirecionAP () {
	window.location.href="../cajas/total_cajas.php";
}
function cajadirecionAQ () {
	window.location.href="../cajas";
}
function metdirdirecionAR () {
	window.location.href="../comercial/nuevometaB.php";
}
function mteaverBdirecionAS () {
	window.location.href="../comercial/ind2x.php";
}
function metadirecionAT () {
	window.location.href="../comercial/metas_mes_direc.php";
}
function usemetdirecionAU () {
	window.location.href="../metas";
}
function usemetdirecionAV () {
	window.location.href="../metas/indx.php";
}
function buscardepartamentos () {
	var paisB=$("#paisempr").val();
	$.post("busquedafindepart.php",{idPS:paisB},colocaropdepart);
}
function colocaropdepart (deparcl) {
	$("#depestempr").html(deparcl);
}
function buscarciudades () {
	var departB=$("#depestempr").val();
	$.post("busquedafinciudad.php",{idDS:departB},colocaropciudad);
}
function colocaropciudad (ciudadcl) {
	$("#ciudadempr").html(ciudadcl);
}
function abrirredes () {
	var numred=$(this).attr("data-red");
	switch(numred){
		case '1':
			$("#c,#cr,#corrercorreo,#pasccrrr,#corrercorreoB,#pasccrrrB").each(disApl);
			break;
		case '2':
			$("#f,#fr,#usface,#facepass,#usfaceB,#facepassB").each(disBpl);
			break;
		case '3':
			$("#i,#ir,#usinst,#instpass,#usinstB,#instpassB").each(disCpl);
			break;
		case '4':
			$("#p,#pr,#uspints,#pintspass,#uspintsB,#pintspassB").each(disDpl);
			break;
		case '5':
			$("#l,#lr,#uslikind,#likindpass,#uslikindB,#likindpassB").each(disEpl);
			break;
		case '6':
			$("#t,#tr,#ustwiter,#twitterpass,#ustwiterB,#twitterpassB").each(disFpl);
			break;
		case '7':
			$("#lkurl,#adurl,#surl,#psurl,#a,#ad,#ap,#lkurlB,#adurlB,#surlB,#psurlB").each(disFpl);
			break;
		default:
			alert("Error");
			break;
	}
}
function disApl () {
	var disA=$(this).css("display");
	//alert(disA);
	if (disA=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}
function disBpl () {
	var disB=$(this).css("display");
	//alert(disB);
	if (disB=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}
function disCpl () {
	var disC=$(this).css("display");
	//alert(disC);
	if (disC=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}
function disDpl () {
	var disD=$(this).css("display");
	//alert(disD);
	if (disD=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}
function disEpl () {
	var disE=$(this).css("display");
	//alert(disE);
	if (disE=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}
function disFpl () {
	var disF=$(this).css("display");
	//alert(disF);
	if (disF=="block") {
		$(this).fadeOut();
	}
	else{
		$(this).fadeIn();
	}
}