var uxpr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",iniciocunadoterminaraA);
function iniciocunadoterminaraA () {
	$("#busimfcl").on("click",libus);
	$("#nomemprB").keydown(plabus);
	$("#nomemprB").keyup(plabus);
	$("#nccorpr").on("click",new_corr_corp);
	$("#modifcor").on("click",mnodifc_corp);
	$("#ajf").on("click",abrircaju);
}
function libus () {
	$("#oculsiesselect").fadeOut();
	var tipoadm=$(this).attr("data-tipadm");
	var cla=$("#empresaB").val();
	var clb=$("#clienterempr").val();
	$("#ifomrfinA img").remove();
	$("#ifomrfinA").fadeIn();
	$("#ifomrfinA").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$.post("busquedaaa.php",{da:cla,db:clb,dc:tipoadm},sihjcolo);
}
function sihjcolo (at) {
	$("#ifomrfinA").html(at);
}
function plabus () {
	var pladm=$(this).attr("data-tipadm");
	var plalabra=$("#nomemprB").val();
	var claa=$("#empresaB").val();
	var clbb=$("#clienterempr").val();
	$("#ifomrfinA img").remove();
	$("#ifomrfinA").fadeIn();
	$("#ifomrfinA").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$.post("busquedaempresa.php",{de:plalabra,df:pladm},etia);
}
function etia (ta) {
	$("#ifomrfinA img").remove();
	$("#empreplaR").html(ta);
	$("#empreplaR").css({display:"flex","flex-direction":"column"});
	if ($("#empreplaR").text()=="" || $("#nomemprB").val()=="") {
		$("#empreplaR").css({display:"none"});
	}
}
function abrircaju () {
	$("#caja").each(anmrta);
}
function anmrta () {
	var hgalt=$(this).css("height");
	if (hgalt=="350px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"350px"}, 500);
	}
}
function new_corr_corp () {
	var emid=$(this).attr("data-id");
	var ka=$("#corem").val();
	var kb=$("#psem").val();
	var kc=$("#popem").val();
	var kd=$("#puertpop").val();
	var ke=$("#smptem").val();
	var kf=$("#puertsmpt").val();
	if (ka=="" || !uxpr.test(ka)) {
		$("#txcla").text("Ingrese le correo");
	}
	else{
		if (kb=="") {
			$("#txcla").text("Ingrese la contraseña");
		}
		else{
			if (kc=="") {
				$("#txcla").text("Ingrese el servidor pop3 o imap");
			}
			else{
				if (kd=="") {
					$("#txcla").text("ingrese el puerto pop3 o imapt");
				}
				else{
					if (ke=="") {
						$("#txcla").text("Ingrese el servidor smpt");
					}
					else{
						if (kf=="") {
							$("#txcla").text("Ingrese el puerto smpt");
						}
						else{
							$("#txcla").text("");
							$("#txcla").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
							$.post("new_corcopr.php",{di:emid,a:ka,b:kb,c:kc,d:kd,e:ke,f:kf},resulingcor);
						}
					}
				}
			}
		}
	}
}
function resulingcor (smppopt) {
	if (smppopt=="2") {
		$("#txcla").text("Correo ingresado");
		location.reload(20);
	}
	else{
		$("#txcla").html(smppopt);
	}
}
function mnodifc_corp () {
	var idk=$(this).attr("data-id");
	var qa=$("#coremF").val();
	var qb=$("#psemF").val();
	var qc=$("#popemF").val();
	var qd=$("#puertpopF").val();
	var qe=$("#smptemF").val();
	var qf=$("#puertsmptF").val();
	if (qa=="" || !uxpr.test(qa)) {
		$("#Fcla").text("Ingrese le correo");
	}
	else{
		if (qb=="") {
			$("#Fcla").text("Ingrese la contraseña");
		}
		else{
			if (qc=="") {
				$("#Fcla").text("Ingrese el servidor pop3 o imap");
			}
			else{
				if (qd=="") {
					$("#Fcla").text("ingrese el puerto pop3 o imapt");
				}
				else{
					if (qe=="") {
						$("#Fcla").text("Ingrese el servidor smpt");
					}
					else{
						if (qf=="") {
							$("#Fcla").text("Ingrese el puerto smpt");
						}
						else{
							$("#Fcla").text("");
							$("#Fcla").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
							$.post("modif_corcopr.php",{di:idk,a:qa,b:qb,c:qc,d:qd,e:qe,f:qf},resulcmabiocor);
						}
					}
				}
			}
		}
	}
}
function resulcmabiocor (qcaqw) {
	if (qcaqw=="2") {
		$("#Fcla").text("Datos modificado");
		location.reload(20);
	}
	else{
		$("#Fcla").html(qcaqw);
	}
}