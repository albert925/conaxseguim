$(document).on("ready",validacionadminid);
function validacionadminid () {
	$("#ingrad").on("click",ingresaodte);
}
function ingresaodte () {
	var usesad=$("#namad").val();
	var passad=$("#passad").val();
	if (usesad=="") {
		$("#mesingread").text("ingrese el nombre de usuario");
		$("#mesingread").fadeIn();
		return false;
	}
	else{
		if (passad=="") {
			$("#mesingread").text("ingrese la contraseña");
			$("#mesingread").fadeIn();
			return false;
		}
		else{
			$("#mesingread").text("");
			$("#mesingread").prepend("<img src='imagenes/loading.gif' alt='loading' style='width:10px;' />");
			$("#mesingread").fadeIn();
			$.post("ingresar.php",{aduse:usesad,piss:passad},menading);
			return false;
		}
	}
}
function menading (lit) {
	if (lit=="2") {
		$("#mesingread").text("usuario o contraseña incorrecta");
		$("#mesingread").fadeIn();$("#mesingread").fadeOut(3000);
		return false;
	}
	else{
		if (lit=="3") {
			$("#mesingread").text("Ingresando..");
			$("#mesingread").fadeIn();
			window.location.href="administrador";
		}
		else{
			if (lit=="4") {
			$("#mesingread").text("Ingresando..");
			$("#mesingread").fadeIn();
			window.location.href="users";
			}
			else{
				$("#mesingread").html(lit);
				$("#mesingread").fadeIn();
				return false;
			}
		}
	}
}