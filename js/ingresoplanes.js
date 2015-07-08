var expr=/^[0-9_\.\-]/;
$(document).on("ready",empezarplanes);
function empezarplanes () {
	$("#ingrplan").on("click",ingnuevoplan);
	$(".modfiplanes").on("click",modificarplanes);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function ingnuevoplan () {
	var nombpl=$("#nameplan").val();
	var esppl=$("#espacioplan").val();
	var tranfpl=$("#tranferiplan").val();
	var corpl=$("#correosplan").val();
	var precpl=$("#precioplan").val();
	var precdrpl=$("#preciodirecplan").val();
	var isupl=$("#insuplan").val();
	var pvpl=$("#proveedor").val();
	if (nombpl=="") {
		$("#mesingplanes").css(normal).text("Ingrese nombre plan");
		$("#mesingplanes").fadeIn();
	}
	else{
		if (precpl=="" || !expr.test(precpl)) {
			$("#mesingplanes").css(normal).text("Solo se permiten números del precio plan");
			$("#mesingplanes").fadeIn();
		}
		else{
			if (precdrpl=="" || !expr.test(precdrpl)) {
				$("#mesingplanes").css(normal).text("Solo se permiten números del precio direcionador");
				$("#mesingplanes").fadeIn();
			}
			else{
				if (pvpl=="0" || pvpl=="") {
					$("#mesingplanes").css(normal).text("Selecione el proveedor");
					$("#mesingplanes").fadeIn();
				}
				else{
					$("#mesingplanes").css(normal).text("");
					$("#mesingplanes").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#mesingplanes").fadeIn();
					$.post("ingresarplan.php",{
						pal:nombpl,pbl:esppl,pcl:tranfpl,pdl:corpl,
						pel:precpl,pfl:precdrpl,ius:isupl,provePL:pvpl
					},terminmesnsajeplanA);
				}
			}
		}
	}
}
function terminmesnsajeplanA (plena) {
	if (plena=="2") {
		$("#mesingplanes").css(normal).text("El nombre del plan ya existe");
		$("#mesingplanes").fadeIn();$("#mesingplanes").fadeOut(3000);
	}
	else{
		if (plena=="3") {
			$("#mesingplanes").css(bien).text("Plan ingresado");
			$("#mesingplanes").fadeIn();$("#mesingplanes").fadeOut(3000);
			$("#nameplan").val("");
			$("#espacioplan").val("");
			$("#tranferiplan").val("");
			$("#correosplan").val("");
			$("#precioplan").val("");
			$("#preciodirecplan").val("");
		}
		else{
			$("#mesingplanes").html(plena);
			$("#mesingplanes").css(normal);
			$("#mesingplanes").fadeIn();
		}
	}
}
function modificarplanes () {
	var idplF=$(this).attr("data-id");
	var cajaPA="name_"+idplF;
	var cajaPB="epc_"+idplF;
	var cajaPC="trans_"+idplF;
	var cajaPD="corrcnt_"+idplF;
	var cajaPE="precf_"+idplF;
	var cajaPF="precdrf_"+idplF;
	var cajaPG="insuf_"+idplF;
	var cajaPH="proveedorFF_"+idplF;
	var paa=$("#"+cajaPA).val();
	var pbb=$("#"+cajaPB).val();
	var pcc=$("#"+cajaPC).val();
	var pdd=$("#"+cajaPD).val();
	var pee=$("#"+cajaPE).val();
	var pff=$("#"+cajaPF).val();
	var pgg=$("#"+cajaPG).val();
	var phh=$("#"+cajaPH).val();
	if (idplF=="") {
		alert("id plan no disponible");
	}
	else{
		if (paa=="") {
			alert("Ingresa nombre plan");
		}
		else{
			if (pee=="" || !expr.test(pee)) {
				alert("Solo se permite numeros el precio plan");
			}
			else{
				if (pff=="" || !expr.test(pff)) {
					alert("solo se permite numeros el precio direcionador plan");
				}
				else{
					if (phh=="0" || phh=="") {
						alert("Selecione el proveedor");
					}
					else{
						$.post("modifcarplanesdt.php",{
							fhid:idplF,fha:paa,fhb:pbb,fhc:pcc,
							fhd:pdd,fhe:pee,fhf:pff,fhg:pgg,fhh:phh
						},mesamodifplanesfin);
					}
				}
			}
		}
	}
}
function mesamodifplanesfin (plafin) {
	if (plafin=="2") {
		$("#mensplanesv").css(normal).text("Nombre plan ya existe");
		$("#mensplanesv").fadeIn();$("#mensplanesv").fadeOut(3000);
	}
	else{
		if (plafin=="3") {
			$("#mensplanesv").css(bien).text("Plan modificado");
			$("#mensplanesv").fadeIn();$("#mensplanesv").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#mensplanesv").html(plafin);
			$("#mensplanesv").css(normal);
			$("#mensplanesv").fadeIn();
		}
	}
}