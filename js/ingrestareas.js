$(document).on("ready",empezamrtodoldetareas);
function empezamrtodoldetareas () {
	$("#ingrtar").on("click",ingresonuevatareas);
	$("#modiftardat").on("click",modifcartareas);
	$("#modfifechainT").on("click",modifcartarefecinicio);
	$("#modfifechafinT").on("click",modificarfechafin);
	$(".escambio").on("change",cabiarestadotarea);
	$("#emab").on("change",colocarsegioenselectA);
	$("#respoS,#mesBcb,#yearBcb").on("change",busqueda_por_admin);
	$("#fehaUI").change(busfechaexiste);
	$("#smms").on("click",sumartareafechas);
	$(".fecU").change(cambiofeuno);
	$(".fecD").change(cabiofedos);
	$(".texTT").change(cambiotextotar);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
function ingresonuevatareas () {
	var planT=$("#plans").val();
	var respT=$("#respadm").val();
	var namT=$("#nimetarea").val();
	var fdiT=$("#fdi").val();
	var fmiT=$("#fmesi").val();
	var fyiT=$("#yeari").val();
	var fdfT=$("#fdF").val();
	var fmfT=$("#fmesF").val();
	var fyfT=$("#yearF").val();
	var fDosI=$("#fehaUI").val();
	var fDosF=$("#fehaUF").val();
	var texT=$("#descrirarea").val();
	var areaT=$("#araead").val();
	if (planT=="0" || planT=="") {
		$("#mesatareas").css(normal).text("Selecione el seguimiento");
		$("#mesatareas").fadeIn();
	}
	else{
		if (respT=="0" || respT=="") {
			$("#mesatareas").css(normal).text("Selecione el responsable");
			$("#mesatareas").fadeIn();
		}
		else{
			if (namT=="") {
				$("#mesatareas").css(normal).text("Escribe la tarea");
				$("#mesatareas").fadeIn();
			}
			else{
				if (fdiT=="0" || fdiT=="") {
					$("#mesatareas").css(normal).text("Selecion el dia de Inicio");
					$("#mesatareas").fadeIn();
				}
				else{
					if (fmiT=="0" || fmiT=="") {
						$("#mesatareas").css(normal).text("Selecione el mes inicio");
						$("#mesatareas").fadeIn();
					}
					else{
						if (fyiT=="" || fyiT.length!=4) {
							$("#mesatareas").css(normal).text("Escribe Inicio Año");
							$("#mesatareas").fadeIn();
						}
						else{
							if (areaT=="0" || areaT=="") {
								$("#mesatareas").css(normal).text("Seleccione el área");
								$("#mesatareas").fadeIn();
							}
							else{
								$("#mesatareas").css(normal).text("");
								$("#mesatareas").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
								$("#mesatareas").fadeIn();
								$.post("ingresnuevotarea.php",{
										Ta:planT,Tb:respT,Tc:namT,
										Td:fdiT,Te:fmiT,Tf:fyiT,
										Tg:fdfT,Th:fmfT,Ti:fyfT,
										Tj:fDosI,Tk:fDosF,Tl:texT,Tm:areaT
									},mensajetareaing
								);
							}
						}
					}
				}
			}
		}
	}
}
function mensajetareaing (tarfe) {
	if (tarfe=="2") {
		$("#mesatareas").css(bien).text("Tarea Ingresada");
		$("#mesatareas").fadeIn();$("#mesatareas").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesatareas").html(tarfe);
		$("#mesatareas").css(normal);
		$("#mesatareas").fadeIn();
	}
}
function modifcartareas () {
	var idfa=$(this).attr("data-tar");
	var planF=$("#plans").val();
	var respF=$("#respadmf").val();
	var tarnameF=$("#nimetareaf").val();
	var estadF=$("#estadof").val();
	var TextoF=$("#textF").val();
	var artareF=$("#araead").val();
	if (idfa=="") {
		alert("Id de tarea no disponible");
	}
	else{
		if (planF=="0" || planF=="") {
			$("#mesatarfa").css(normal).text("Selecione el plan");
			$("#mesatarfa").fadeIn();
		}
		else{
			if (respF=="0" || respF=="") {
				$("#mesatarfa").css(normal).text("Selecione el responsable");
				$("#mesatarfa").fadeIn();
			}
			else{
				if (tarnameF=="") {
					$("#mesatarfa").css(normal).text("Escribe la tarea");
					$("#mesatarfa").fadeIn();
				}
				else{
					$("#mesatarfa").css(normal).text("");
					$("#mesatarfa").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#mesatarfa").fadeIn();
					$.post("modifcacionesT.php",{ide:idfa,ae:planF,be:respF,ce:tarnameF,fe:estadF,ge:TextoF,gf:artareF},resisfin);
				}
			}
		}
	}
}
function resisfin (tasw) {
	if (tasw=="2") {
		$("#mesatarfa").css(bien).text("Tarea modificada");
		$("#mesatarfa").fadeIn();$("#mesatarfa").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesatarfa").html(tasw);
		$("#mesatarfa").css(normal);
		$("#mesatarfa").fadeIn();
	}
}
function modifcartarefecinicio () {
	var idfb=$(this).attr("data-tar");
	var diaa=$("#fdi").val();
	var mesa=$("#fmesi").val();
	var yeara=$("#yeari").val();
	if (idfb=="") {
		alert("id tarea no disponible");
	}
	else{
		if (diaa=="0") {
			$("#inmessaj").css(normal).text("Selecione dia");
			$("#inmessaj").fadeIn();
		}
		else{
			if (mesa=="0") {
				$("#inmessaj").css(normal).text("Selecione  el mes");
				$("#inmessaj").fadeIn();
			}
			else{
				if (yeara=="" || yeara.length!=4) {
					$("#inmessaj").css(normal).text("Ingrese el año");
					$("#inmessaj").fadeIn();
				}
				else{
					$("#inmessaj").css(normal).text("");
					$("#inmessaj").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#inmessaj").fadeIn();
					$.post("modifcarfechainicioT.php",{idw:idfb,ia:diaa,ib:mesa,ic:yeara},relmsfeca);
				}
			}
		}
	}
}
function relmsfeca (fechaA) {
	if (fechaA=="2") {
		$("#inmessaj").css(bien).text("Fecha Inicio Modificada");
		$("#inmessaj").fadeIn();$("#inmessaj").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#inmessaj").html(fechaA);
		$("#inmessaj").css(normal);
		$("#inmessaj").fadeIn();
	}
}
function modificarfechafin () {
	var idfc=$(this).attr("data-tar");
	var diab=$("#fdF").val();
	var mesb=$("#fmesF").val();
	var yearb=$("#yearF").val();
	if (idfc=="") {
		alert("id tarea no disponible");
	}
	else{
		if (diab=="0") {
			$("#finmesaj").css(normal).text("Selecione dia");
			$("#finmesaj").fadeIn();
		}
		else{
			if (mesb=="0") {
				$("#finmesaj").css(normal).text("Selecione  el mes");
				$("#finmesaj").fadeIn();
			}
			else{
				if (yearb=="" || yearb.length!=4) {
					$("#finmesaj").css(normal).text("Ingrese el año");
					$("#finmesaj").fadeIn();
				}
				else{
					$("#finmesaj").css(normal).text("");
					$("#finmesaj").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#finmesaj").fadeIn();
					$.post("modifcarfechafinT.php",{idx:idfc,ja:diab,jb:mesb,jc:yearb},relmsfecbb);
				}
			}
		}
	}
}
function relmsfecbb (fechaB) {
	if (fechaB=="2") {
		$("#finmesaj").css(bien).text("Fecha Fin Modificada");
		$("#finmesaj").fadeIn();$("#finmesaj").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#finmesaj").html(fechaB);
		$("#finmesaj").css(normal);
		$("#finmesaj").fadeIn();
	}
}
function cabiarestadotarea () {
	var idtarea=$(this).attr("data-id");
	var idadmin=$(this).attr("data-adm");
	var tararea=$(this).attr("data-area");
	var divop="est_"+idtarea;
	var opcionsele=$("#"+divop).val();
	if (idtarea=="") {
		alert("id no disponible");
	}
	else{
		if (opcionsele=="0" || opcionsele=="") {
			alert("selecione el estado");
		}
		else{
			$.post("cambioesttarefin.php",{idE:idtarea,tipo:opcionsele,adm:idadmin,ar:tararea},resultadoestado);
		}
	}
}
function resultadoestado (optd) {
	if (optd=="2") {
		alert("Estado modificado");
		location.reload(20);
	}
	else{
		alert(optd);
	}
}
function colocarsegioenselectA () {
	var idempE=$("#emab").val();
	$("#loadopt center").remove();
	$("#loadopt").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$("#loadopt").fadeIn();
	$.post("busqueda_plan_seg.php",{pe:idempE},colocaroptionA);
}
function colocaroptionA (sitS) {
	$("#loadopt").fadeOut();
	$("#plans").html(sitS);
}
function busqueda_por_admin () {
	var ideDa=$("#respoS").val();
	var wza=$("#mesBcb").val();
	var wzb=$("#yearBcb").val();
	window.location.href="ind2x.php?udad="+ideDa+"&ca="+wza+"&cb="+wzb;
}
function cambiofeuno () {
	var idfeu=$(this).attr("data-id");
	var feunotar=$("#fi_"+idfeu).val();
	$.post("cambio_fechauno.php",{ffa:idfeu,ffb:feunotar},resulunofec);
}
function cabiofedos () {
	var idfeu=$(this).attr("data-id");
	var feunotar=$("#ff_"+idfeu).val();
	$.post("cambio_fechados.php",{ffa:idfeu,ffb:feunotar},resulunofec);
}
function resulunofec (tfta) {
	if (tfta=="2") {
		location.reload(20);
	}
	else{
		alert(tfta);
	}
}
function cambiotextotar () {
	var idtexto=$(this).attr("data-id");
	var cjatext=$("#tex_"+idtexto).val();
	$.post("cambio_texto.php",{tid:idtexto,txf:cjatext},resulunofec);
}
function busfechaexiste () {
	var fechbusq=$("#fehaUI").val();
	var del_responsable=$("#respadm").val();
	$.post("buscar_fecha_tar.php",{ad:fechbusq,bd:del_responsable},resltfechaus);
}
function resltfechaus (hyki) {
	if (hyki=="2") {
		alert("Ya tiene una tarea para ese dia");
	}
	else{
		if (hyki=="3") {
			$("#mesatareas").text("");
		}
		else{
			alert(hyki);
		}
	}
}
function sumartareafechas () {
	var mesundig=$(this).attr("data-msun");
	var mesdosdig=$(this).attr("data-msdos");
	var yeardig=$(this).attr("data-year");
	$.post("sumar_mes_tarea.php",{a:mesundig,b:mesdosdig,c:yeardig},resulmessumado);
}
function resulmessumado (msmas) {
	if (msmas=="2") {
		alert("No hay tareas de esta fecha");
	}
	else{
		if (msmas=="3") {
			alert("tareas sumadas");
			location.reload(20);
		}
		else{
			alert(msmas);
		}
	}
}