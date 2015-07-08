var uxpr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",iniciaradminisusuarios);
function iniciaradminisusuarios () {
	$("#modifavatar").on("click",modifcarimagenavatar);
	$("#modficusaf").on("click",modifcarusuarionam);
	$("#modifcorrF").on("click",modificarcorreoad);
	$("#passcambioF").on("click",modifcarpassadis);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
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
function modifcarimagenavatar () {
	var idusuariomg=$("#idadminF").val();
	var imgavatar=$("#iamavatar")[0].files[0];
	var namegavatar=imgavatar.name;
	var extegavatar=namegavatar.substring(namegavatar.lastIndexOf('.')+1);
	var tamgavatar=imgavatar.size;
	var tipogavatar=imgavatar.type;
	if (idusuariomg=="") {
		alert("Id administrador no disponible");
		return false;
	}
	else{
		if (!es_imagen(extegavatar)) {
			$("#mesajimgavatar").css(normal).text("Tipo de imagen no permitido");
			$("#mesajimgavatar").fadeIn();
			return false;
		}
		else{
			$("#mesajimgavatar").css(normal).text("");
			$("#mesajimgavatar").fadeIn();
			var forseliecion=new FormData($(".formiav")[0]);
			$.ajax({
				url: '../../modificarimagenavatar.php',
				type: 'POST',
				data: forseliecion,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#mesajimgavatar").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				},
				success:resultadoavatar,
				error:function () {
					$("#mesajimgavatar").css(normal).text("Ocurrión un error");
					$("#mesajimgavatar").fadeIn();$("#mesajimgavatar").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function resultadoavatar (postimg) {
	if (postimg=="2") {
		$("#mesajimgavatar").css(normal).text("Carpeta de imagenes sin permisos o Resolucón no permitida");
		$("#mesajimgavatar").fadeIn();$("#mesajimgavatar").fadeOut(3000);
		return false;
	}
	else{
		if (postimg=="3") {
			$("#mesajimgavatar").css(normal).text("Tamaño no permitido");
			$("#mesajimgavatar").fadeIn();$("#mesajimgavatar").fadeOut(3000);
			return false;
		}
		else{
			if (postimg=="4") {
				$("#mesajimgavatar").css(normal).text("Carpeta de imagenes sin permisos o Resolucón no permitida");
				$("#mesajimgavatar").fadeIn();$("#mesajimgavatar").fadeOut(3000);
				return false;
			}
			else{
				if (postimg=="5") {
					$("#mesajimgavatar").css(bien).text("Imagen subida");
					$("#mesajimgavatar").fadeIn();$("#mesajimgavatar").fadeOut(3000);
					location.reload(5000);
				}
				else{
					$("#mesajimgavatar").html(postimg);
					$("#mesajimgavatar").css(normal);
					$("#mesajimgavatar").fadeIn();
					return false;
				}
			}
		}
	}
}
function modifcarusuarionam () {
	var idAad=$(this).attr("data-id");
	var inputA=$("#usernamf").val();
	if (idAad=="0") {
		alert("Id aministrador no disponible");
	}
	else{
		if (inputA=="") {
			$("#adA").css(normal).text("Ingresa nombre usuario");
			$("#adA").fadeIn();
		}
		else{
			$("#adA").css(normal).text("");
			$("#adA").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$.post("modifcarusersadF.php",{idevA:idAad,hha:inputA},datgosverinfA);
		}
	}
}
function datgosverinfA (weta) {
	if (weta=="2") {
		$("#adA").css(normal).text("El Nombre Usuario ya existe");
		$("#adA").fadeIn();$("#adA").fadeOut(3000);
	}
	else{
		if (weta=="3") {
			$("#adA").css(bien).text("Nombre usuario Modificado");
			$("#adA").fadeIn();$("#adA").fadeOut(3000);
			setTimeout(cerrarperdida,1500);
		}
		else{
				$("#adA").html(weta);
				$("#adA").css(normal);
				$("#adA").fadeIn();
		}
	}
}
function cerrarperdida () {
	window.location.href="../../cerrar";
}
function modificarcorreoad () {
	var idBad=$(this).attr("data-id");
	var corrad=$("#modifcaorad").val();
	if (idBad=="") {
		alert("id administrador no disponible");
	}
	else{
		if (corrad=="" || !uxpr.test(corrad)) {
			$("#adB").css(normal).text("Ingrese el correo");
			$("#adB").fadeIn();
		}
		else{
			$("#adB").css(normal).text("");
			$("#adB").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
			$.post("modifcarcorreoF.php",{idevB:idBad,hhb:corrad},datgosverinfB);
		}
	}
}
function datgosverinfB (wetb) {
	if (wetb=="2") {
		$("#adB").css(normal).text("El Correo ya existe");
		$("#adB").fadeIn();$("#adB").fadeOut(3000);
	}
	else{
		if (wetb=="3") {
			$("#adB").css(bien).text("Correo Modificado");
			$("#adB").fadeIn();$("#adB").fadeOut(3000);
			location.reload(5000);
		}
		else{
				$("#adB").html(wetb);
				$("#adB").css(normal);
				$("#adB").fadeIn();
		}
	}
}
function modifcarpassadis () {
	var idCad=$(this).attr("data-id");
	var passV=$("#passAnt").val();
	var passNA=$("#passNa").val();
	var passNB=$("#passNb").val();
	if (idCad=="") {
		alert("id administrador no disponible");
	}
	else{
		if (passV=="") {
			$("#adC").css(normal).text("Ingrese contraseña actual");
			$("#adC").fadeIn();
		}
		else{
			if (passNA=="" || passNA.length<6) {
				$("#adC").css(normal).text("Contraseña mínimo 6 dígitos");
				$("#adC").fadeIn();
			}
			else{
				if (passNB!=passNA) {
					$("#adC").css(normal).text("Contraseñas no coinciden");
					$("#adC").fadeIn();
				}
				else{
					$("#adC").prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#adC").css(normal).text("");
					$("#adC").fadeIn();
					$.post("modifcarpassadmin.php",{idevC:idCad,hhc:passV,hhd:passNA},datgosverinfC);
				}
			}
		}
	}
}
function datgosverinfC (wetc) {
	if (wetc=="2") {
		$("#adC").css(normal).text("Contraseña actual incorrecta");
		$("#adC").fadeIn();$("#adC").fadeOut(3000);
	}
	else{
		if (wetc=="3") {
			$("#adC").css(bien).text("Contraseña cambiada");
			$("#adC").fadeIn();$("#adC").fadeOut(3000);
			setTimeout(cerrarperdida,1500);
		}
		else{
				$("#adC").html(wetc);
				$("#adC").css(normal);
				$("#adC").fadeIn();
		}
	}
}