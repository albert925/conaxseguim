$(document).on("ready",inicio_eventos);
function inicio_eventos () {
	$("#nvevetnt").on("click",nuevo_evento);
	$("#imaevet").on("click",nuevo_imagen_evento);
	$("#modtnt").on("click",modif_evento);
	$(".dell").on("click",confirmar);
	$(".nvcoment").on("click",nvcomentario);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"}
function confirmar () {
	return confirm("Estas seguro de elimar?");
}
function es_imagen (tipederf) {
	switch(tipederf.toLowerCase()){
		case 'jpg':
			return true;
			break;
		case 'gif':
			return true;
			break;
		case 'png':
			return true;
			break;
		case 'jpeg':
			return true;
			break;
		default:
			return false;
			break;
	}
}
function nuevo_evento () {
	var namV=$("#nmev").val();
	var txV=$("#txev").val();
	if (namV=="") {
		$("#ldv").css(normal).text("Ingrese el nombre");
	}
	else{
		$("#ldv").css(normal).text("");
		$("#ldv").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$.post("new_event.php",{ua:namV,ub:txV},resuleventon);
	}
}
function resuleventon (loev) {
	if (loev=="2") {
		$("#ldv").css(bien).text("Evento ingresado");
		location.reload(20);
	}
	else{
		$("#ldv").css(normal).html(loev);
	}
}
function nuevo_imagen_evento () {
	var delevento=$("#evetid").val();
	var vtgmi=$("#gmv")[0].files[0];
	var namevtgmi=vtgmi.name;
	var extevtgmi=namevtgmi.substring(namevtgmi.lastIndexOf('.')+1);
	var tamvtgmi=vtgmi.size;
	var tipovtgmi=vtgmi.type;
	if (delevento=="0" || delevento=="") {
		$("#ldk").css(normal).text("id de evento no disponible");
		return false;
	}
	else{
		if (!es_imagen(extevtgmi)) {
			$("#ldk").css(normal).text("id de evento no disponible");
			return false;
		}
		else{
			$("#ldk").css(normal).text("");
			var formRc=new FormData($("#imagenevent")[0]);
			$.ajax({
				url: '../nuevoimgEvet.php',
				type: 'POST',
				data: formRc,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#ldk").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:10px;' /></center>");
				},
				success:function (dkevgm) {
					if (dkevgm=="2") {
						$("#ldk").css(normal).text("Carpeta sin permisos o resolución de imagen no permitido");
						$("#ldk").fadeIn();$("#ldk").fadeOut(3000);
						return false;
					}
					else{
						if (dkevgm=="3") {
							$("#ldk").css(normal).text("Tamañoo no permitido");
							$("#ldk").fadeIn();$("#ldk").fadeOut(3000);
							return false;
						}
						else{
							if (dkevgm=="4") {
								$("#ldk").css(normal).text("Carpeta sin permisos o resolución de imagen no permitido");
								$("#ldk").fadeIn();$("#ldk").fadeOut(3000);
								return false;
							}
							else{
								if (dkevgm=="5") {
									$("#ldk").css(bien).text("Imagen subida");
									$("#ldk").fadeIn();$("#ldk").fadeOut(3000);
									window.location.href="eventos_images.php?pd="+delevento;
								}
								else{
									$("#ldk").css(normal).html(dkevgm);
									$("#ldk").fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#ldk").css(mal).text("Ocurrió un error");
					$("#ldk").fadeIn();$("#ldk").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function modif_evento () {
	var ida=$(this).attr("data-id");
	var fa=$("#nmev").val();
	var fb=$("#txev").val();
	$.post("modif_evet.php",{lid:ida,la:fa,lb:fb},resulmodificado);
}
function resulmodificado (lpo) {
	if (lpo=="2") {
		alert("modificado");
		location.reload(20);
	}
	else{
		alert(lpo);
	}
}
function nvcomentario () {
	var idcm=$(this).attr("data-ev");
	var usercm=$(this).attr("data-us");
	var textcm=$("#tccmm_"+idcm).val();
	if (textcm=="") {
		$("#wxy_"+idcm).css(normal).text("Ingrese el mensaje");
	}
	else{
		$("#wxy_"+idcm).css(normal).text("");
		$("#wxy_"+idcm).prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
		$.post("new_coment.php",{ca:idcm,cb:usercm,cc:textcm},function (cmrcm) {
			$("#wxy_"+idcm+" center").remove();
			$("#tccmm_"+idcm).val("");
			var separador=cmrcm.split("|");
			var errorphp=separador[0];
			var admina=separador[1];
			var fechaphp=separador[2];
			if (errorphp=="2") {
				$("#todoComent_"+idcm).prepend("<article id='restcommen'>"+
						"<article>"+
							"<figure id='avatcomn' style='background-image:url(../"+admina+");'></figure>"+
						"</article>"+
						"<article id='texto'>"+
							"<div id='parfcmc'>"+
								textcm+
							"</div>"+
							"<div id='feccm'>"+
								fechaphp+
							"</div>"+
						"</article>"+
					"</article>");
			}
			else{
				$("#wxy_"+idcm).css(normal).html(cmrcm);
			}
		});
	}
}