$(document).on("ready",clientesempreinicio);
function clientesempreinicio () {
	$("#ingrencliente").on("click",nuevocliente);
	$("#ingrenempresa").on("click",nuevaempresa);
	$(".modficlicent").on("click",modifcarclienbte);
	$(".modfiempre").on("click",modificarempresa);
	$("#sectormodifempr").on("click",modifcarsectorempresa);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function nuevocliente () {
	var namcl=$("#namecliente").val();
	var fircl=$("#firtcliente").val();
	var corcl=$("#correocliente").val();
	var telcl=$("#telfcliente").val();
	var dNcl=$("#fdFB").val();
	var mNcl=$("#fmesFB").val();
	if (namcl=="") {
		$("#mesingcliente").css(normal).text("Ingrese nombre cliente");
		$("#mesingcliente").fadeIn();
	}
	else{
		if (fircl=="") {
			$("#mesingcliente").css(normal).text("Ingrese apellido cliente");
			$("#mesingcliente").fadeIn();
		}
		else{
			$("#mesingcliente").css(normal).text("");
			$("#mesingcliente").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$("#mesingcliente").fadeIn();
			$.post("ingresonuevoclient.php",{na:namcl,nb:fircl,nc:corcl,nd:telcl,ne:dNcl,nf:mNcl},menajenuevocliente);
		}
	}
}
function menajenuevocliente (clienA) {
	if (clienA=="2") {
		$("#mesingcliente").css(bien).text("Cliente ingresado, pasando paso2...");
		$("#mesingcliente").fadeIn();$("#mesingcliente").fadeOut(3000);
		setTimeout(direiconclA,1500);
	}
	else{
		$("#mesingcliente").html(clienA);
		$("#mesingcliente").css(bien);
		$("#mesingcliente").fadeIn();
	}
}
function direiconclA () {
	window.location.href="agregarempresa.php";
}
function nuevaempresa () {
	var clienteSliE=$("#clienterempr").val();
	var namempreE=$("#nameempre").val();
	var nitempreE=$("#nitempre").val();
	var direempreE=$("#direempre").val();
	var paisempreE=$("#paisempr").val();
	var departempreE=$("#depestempr").val();
	var ciudadempreE=$("#ciudadempr").val();
	var telefonoempreE=$("#telempre").val();
	if (clienteSliE=="0" || clienteSliE=="") {
		$("#mesingempresa").css(normal).text("Selecione le cliente");
		$("#mesingempresa").fadeIn();
	}
	else{
		if (namempreE=="") {
			$("#mesingempresa").css(normal).text("Escribe nombre de la emrpesa");
			$("#mesingempresa").fadeIn();
		}
		else{
			if (paisempreE=="0" || paisempreE=="") {
				$("#mesingempresa").css(normal).text("Selecione el pais");
				$("#mesingempresa").fadeIn();
			}
			else{
				if (departempreE=="0" || departempreE=="") {
					$("#mesingempresa").css(normal).text("Selecione Departamento");
					$("#mesingempresa").fadeIn();
				}
				else{
					if (ciudadempreE=="0" || ciudadempreE=="") {
						$("#mesingempresa").css(normal).text("Selecione la ciudad");
						$("#mesingempresa").fadeIn();
					}
					else{
						$("#mesingempresa").css(normal).text("");
						$("#mesingempresa").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
						$("#mesingempresa").fadeIn();
						$.post("ingresonuevaempresa.php",{
							cle:clienteSliE,
							nme:namempreE,
							nite:nitempreE,
							dire:direempreE,
							pase:paisempreE,
							depe:departempreE,
							ciue:ciudadempreE,
							tele:telefonoempreE
						},mensajeempresaA);
					}
				}
			}
		}
	}
}
function mensajeempresaA (delempres) {
	if (delempres=="2") {
		$("#mesingempresa").css(normal).text("Nombre de la Empresa ya existe");
		$("#mesingempresa").fadeIn();$("#mesingempresa").fadeOut(3000);
	}
	else{
		if (delempres=="3") {
			$("#mesingempresa").css(bien).text("Empresa ingresada");
			$("#mesingempresa").fadeIn();$("#mesingempresa").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mesingempresa").html(delempres);
			$("#mesingempresa").css(normal);
			$("#mesingempresa").fadeIn();
		}
	}
}
function modifcarclienbte () {
	var idcl=$(this).attr("data-id");
	var cajaA="name_"+idcl;
	var cajaB="apel_"+idcl;
	var cajaC="cor_"+idcl;
	var cajaD="tel_"+idcl;
	var cajaE="fdn_"+idcl;
	var cajaF="fmesn_"+idcl;
	var nombreclf=$("#"+cajaA).val();
	var apellclf=$("#"+cajaB).val();
	var correoclf=$("#"+cajaC).val();
	var telefclf=$("#"+cajaD).val();
	var diaclf=$("#"+cajaE).val();
	var mesclf=$("#"+cajaF).val();
	if (idcl=="") {
		alert("id cliente no disponible");
	}
	else{
		if (nombreclf=="") {
			alert("Ingrese el nombre");
		}
		else{
			if (apellclf=="") {
				alert("ingrese el apellido");
			}
			else{
				$.post("modificarclientes.php",{idf:idcl,naev:nombreclf,apev:apellclf,corev:correoclf,telev:telefclf,ed:diaclf,em:mesclf},mesnmodifclie);
			}
		}
	}
}
function mesnmodifclie (fclienf) {
	if (fclienf=="2") {
		$("#mensclientesr").css(bien).text("Cliente modificado");
		$("#mensclientesr").fadeIn();$("#mensclientesr").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mensclientesr").html(fclienf);
		$("#mensclientesr").css(normal);
		$("#mensclientesr").fadeIn();
	}
}
function modificarempresa () {
	var idempresa=$(this).attr("data-id");
	var cajaAemp="clients_"+idempresa;
	var cajaBemp="namEf_"+idempresa;
	var cajaCemp="nitEf_"+idempresa;
	var cajaDemp="dirEf_"+idempresa;
	var cajaEemp="telemF_"+idempresa;
	var sliclienteMP=$("#"+cajaAemp).val();
	var nimef=$("#"+cajaBemp).val();
	var nitff=$("#"+cajaCemp).val();
	var direff=$("#"+cajaDemp).val();
	var telff=$("#"+cajaEemp).val();
	if (idempresa=="") {
		alert("Id empresa no disponible");
	}
	else{
		if (sliclienteMP=="0" || sliclienteMP=="") {
			alert("Selecione el cliente");
		}
		else{
			if (nimef=="") {
				alert("Ingrese el nombre de la empresa");
			}
			else{
				$.post("modifcarempresatodo.php",{idRea:idempresa,cliReb:sliclienteMP,naRec:nimef,ntRed:nitff,dtRef:direff,tlRef:telff},resmesankempremodfi);
			}
		}
	}
}
function resmesankempremodfi (imprmodif) {
	if (imprmodif=="2") {
		$("#mensempresa").css(normal).text("Nombre empresa ya existe");
		$("#mensempresa").fadeIn();$("#mensempresa").fadeOut(3000);
	}
	else{
		if (imprmodif=="3") {
			$("#mensempresa").css(bien).text("Empresa modificada");
			$("#mensempresa").fadeIn();$("#mensempresa").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mensempresa").html(imprmodif);
			$("#mensempresa").css(normal);
			$("#mensempresa").fadeIn();
		}
	}
}
function modifcarsectorempresa () {
	var idsectempre=$(this).attr("data-id");
	var pasisect=$("#paisempr").val();
	var deparsect=$("#depestempr").val();
	var ciudsect=$("#ciudadempr").val();
	if (idsectempre=="") {
		alert("Id empresa no disponible");
	}
	else{
		if (pasisect=="0" || pasisect=="") {
			$("#mesector").css(normal).text("Selecione el Pais");
			$("#mesector").fadeIn();
		}
		else{
			if (deparsect=="0" || deparsect=="") {
				$("#mesector").css(normal).text("Selecione el Departamento");
				$("#mesector").fadeIn();
			}
			else{
				if (ciudsect=="0" || ciudsect=="") {
					$("#mesector").css(normal).text("Selecione la ciudad");
					$("#mesector").fadeIn();
				}
				else{
					$("#mesector").css(normal).text("");
					$("#mesector").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#mesector").fadeIn();
					$.post("modicandosectoresempresa.php",{ape:idsectempre,bpe:pasisect,cpe:deparsect,dpe:ciudsect},terminadocambio);
				}
			}
		}
	}
}
function terminadocambio (cimbt) {
	if (cimbt=="2") {
		$("#mesector").css(bien).text("Estado Modificado");
		$("#mesector").fadeIn();$("#mesector").fadeOut(3000);
		window.location.href="empresas.php";
	}
	else{
		$("#mesector").html(cimbt);
		$("#mesector").css(normal);
		$("#mesector").fadeIn();
	}
}