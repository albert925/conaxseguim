$(document).on("ready",iniciodossdosodsoseguio);
function iniciodossdosodsoseguio () {
	$("#cambreds").on("click",cambio_redesseguimiento);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
function cambio_redesseguimiento () {
	var ids=$(this).attr("data-sg");
	var CT=$("#corrercorreoB").val();
	var CU=$("#pasccrrrB").val();
	var CV=$("#usfaceB").val();
	var CW=$("#facepassB").val();
	var CX=$("#usinstB").val();
	var CY=$("#instpassB").val();
	var CZ=$("#uspintsB").val();
	var DA=$("#pintspassB").val();
	var DB=$("#uslikindB").val();
	var DC=$("#likindpassB").val();
	var DD=$("#ustwiterB").val();
	var DE=$("#twitterpassB").val();
	$("#txmjsredes").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
	$.post("cambio_dos_seg.php",{ide:ids,a:CT,b:CU,c:CV,d:CW,e:CX,
		f:CY,g:CZ,h:DA,i:DB,j:DC,k:DD,l:DE},resulcambiodsods);
}
function resulcambiodsods (udosudos) {
	if (udosudos=="2") {
		$("#txmjsredes").css(bien).text("Datos redes modificado");
		location.reload(20);
	}
	else{
		$("#txmjsredes").css(normal).html(udosudos);
	}
}