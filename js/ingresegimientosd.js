$(document).on("ready",seguimeintosfinpagi);
function seguimeintosfinpagi () {
	$("#ingrseguimiento").on("click",nuevoseguimiento);
	$("#plans").on("change",sliplanbusA);
	$("#abnA").change(cambiprcA);
	$("#abnB").change(cambiprcB);
	$("#abnC").change(cambiprcC);
	$("#descuento").change(cambiprcD);
	$(".emprver").on("click",verempresas);
	$(".verplan").on("click",verplanes);
	$(".closep").on("click",cerminivent);
	$(".plaES").on("change",cambiarestadoplan);
	$(".EDR").on("change",cambiarestadodirecionador);
	$(".EIUS").on("change",cambiarestadoinsumos);
	$(".esdoA").on("change",cambioarestabonoA);
	$(".esdoB").on("change",cambioarestabonoB);
	$(".esdoC").on("change",cambioarestabonoC);
	$(".pisestdos").on("change",cambiarestadoprovee);
	$("#plansB").on("change",sliplanbusABb);
	$("#abnAB").change(cambiprcAB);
	$("#abnBB").change(cambiprcBB);
	$("#abnCB").change(cambiprcCB);
	$("#descuentoB").change(cambiprcDB);
	$("#modifdatssegui").on("click",modifcardatoseguimiento);
	$("#modifin").on("click",modificarfechinicio);
	$("#modiffin").on("click",modifcarfechfin);
	$("#modifrev").on("click",modifcarfecrenova);
	$("#modipublic").on("click",modifcarfecpublicacion);
}
var bien={color:"#00A5D4"};
var normal={color:"#F7F7F7"};
//.prepend("<center><img src='../../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
//$("#proveedor option[value="+idplB+"]").attr('selected', true);//Seleciona el select
function sliplanbusA () {
	var idplB=$("#plans").val();
	$("#proveedor").find('option').removeAttr('selected');
	$.post("busppreciopl.php",{idpA:idplB},colocarA);
	$.post("buspprecdirecionpl.php",{idpB:idplB},colocarB);
	$.post("buspisumospl.php",{idpC:idplB},colocarC);
	$.post("buspidproveepl.php",{idpD:idplB},colocarD);
}
function colocarA (prec) {
	var decp=prec*0.05;
	$("#descuento").val(decp);
	$("#descuento,#abnA,#abnB,#abnC").attr('data-prec', prec);
	var numeroa=parseInt($("#abnA").val());
	var numerob=parseInt($("#abnB").val());
	var numeroc=parseInt($("#abnC").val());
	var numerod=parseInt($("#valordirecC").val());
	var numeroe=parseInt($("#insumos").val());
	var numerof=parseInt($("#preciprove").val());
	var resta=prec-decp-numeroa-numerob-numeroc;
	var totalabonos=numeroa+numerob+numeroc;
	var sumaotros=numerod+numeroe+numerof;
	var restaencaja=sumaotros-totalabonos;
	if (restaencaja<0) {
		var quitarn=restaencaja*(-1);
	}
	else{
		var quitarn=restaencaja;
	}
	$("#abnA").val(0);
	$("#abnB").val(0);
	$("#abnC").val(0);
	$("#saldo").val(resta);
	$("#caja").val(quitarn);
	$("#precplA").text("$"+prec);
	$("#precplA").fadeIn();
}
function colocarB (precdirec) {
	$("#valordirecC").val(precdirec);
}
function colocarC (insu) {
	$("#insumos").val(insu);
}
function colocarD (proveid) {
	$("#proveedor option[value="+proveid+"]").attr('selected', true);
	$.post("coloprecioporve.php",{proveIDev:proveid},colocarE);
}
function colocarE (pricpvrd) {
	$("#preciprove").val(pricpvrd);
}
function cambiprcA () {
	var precTa=$(this).attr("data-prec");
	var descina=parseInt($("#descuento").val());
	var numera=parseInt($("#abnA").val());
	var numerb=parseInt($("#abnB").val());
	var numerc=parseInt($("#abnC").val());
	var numerd=parseInt($("#valordirecC").val());
	var numere=parseInt($("#insumos").val());
	var numerf=parseInt($("#preciprove").val());
	var restab=precTa-descina-numera-numerb-numerc;
	var totalabonosb=numera+numerb+numerc;
	var sumaotrosb=numerd+numere+numerf;
	var restaencajab=sumaotrosb-totalabonosb;
	if (restaencajab<0) {
		var quitarnb=restaencajab*(-1);
	}
	else{
		var quitarnb=restaencajab;
	}
	$("#saldo").val(restab);
	$("#caja").val(quitarnb);
}
function cambiprcB () {
	var precTb=$(this).attr("data-prec");
	var descinb=parseInt($("#descuento").val());
	var numea=parseInt($("#abnA").val());
	var numeb=parseInt($("#abnB").val());
	var numec=parseInt($("#abnC").val());
	var numed=parseInt($("#valordirecC").val());
	var numee=parseInt($("#insumos").val());
	var numef=parseInt($("#preciprove").val());
	var restac=precTb-descinb-numea-numeb-numec;
	var totalabonosc=numea+numeb+numec;
	var sumaotrosc=numed+numee+numef;
	var restaencajac=sumaotrosc-totalabonosc;
	if (restaencajac<0) {
		var quitarnc=restaencajac*(-1);
	}
	else{
		var quitarnc=restaencajac;
	}
	$("#saldo").val(restac);
	$("#caja").val(quitarnc);
}
function cambiprcC () {
	var precTc=$(this).attr("data-prec");
	var descinc=parseInt($("#descuento").val());
	var numa=parseInt($("#abnA").val());
	var numb=parseInt($("#abnB").val());
	var numc=parseInt($("#abnC").val());
	var numd=parseInt($("#valordirecC").val());
	var nume=parseInt($("#insumos").val());
	var numf=parseInt($("#preciprove").val());
	var restad=precTc-descinc-numa-numb-numc;
	var totalabonosd=numa+numb+numc;
	var sumaotrosd=numd+nume+numf;
	var restaencajad=sumaotrosd-totalabonosd;
	if (restaencajad<0) {
		var quitarnd=restaencajad*(-1);
	}
	else{
		var quitarnd=restaencajad;
	}
	$("#saldo").val(restad);
	$("#caja").val(quitarnd);
}
function cambiprcD () {
	var precTd=$(this).attr("data-prec");
	var descind=parseInt($("#descuento").val());
	var nua=parseInt($("#abnA").val());
	var nub=parseInt($("#abnB").val());
	var nuc=parseInt($("#abnC").val());
	var nud=parseInt($("#valordirecC").val());
	var nue=parseInt($("#insumos").val());
	var nuf=parseInt($("#preciprove").val());
	var restae=precTd-descind-nua-nub-nuc;
	var totalabonose=nua+nub+nuc;
	var sumaotrosd=nud-nue-nuf;
	var restaencajae=sumaotrosd-totalabonose;
	if (restaencajae<0) {
		var quitarne=restaencajae*(-1);
	}
	else{
		var quitarne=restaencajae;
	}
	$("#saldo").val(restae);
	$("#caja").val(quitarne);
}
function nuevoseguimiento (argument) {
	var AA=$("#empresa").val();
	var AB=$("#plans").val();
	var AC=$("#descuento").val();
	var AD=$("#abnA").val();
	var AE=$("#abnB").val();
	var AF=$("#abnC").val();
	var AG=$("#saldo").val();
	var AH=$("#caja").val();
	var Afdi=$("#fdi").val();
	var Afmi=$("#fmesi").val();
	var Afyi=$("#yeari").val();
	var Afdf=$("#fdF").val();
	var Afmf=$("#fmesF").val();
	var Afyf=$("#yearF").val();
	var AI=$("#estdplansg").val();
	var AJ=$("#redirecionador").val();
	var AK=$("#valordirecC").val();
	var AL=$("#insumos").val();
	var AM=$("#estadoisumos").val();
	var AN=$("#proveedor").val();
	var AO=$("#preciprove").val();
	var AP=$("#dominio").val();
	var AQ=$("#ftp").val();
	var AR=$("#usuarioserv").val();
	var AS=$("#passworddom").val();
	var Afdr=$("#fdR").val();
	var Afmr=$("#fmesR").val();
	var Afyr=$("#yearR").val();
	var AT=$("#corrercorreo").val();
	var AU=$("#pasccrrr").val();
	var AV=$("#usface").val();
	var AW=$("#facepass").val();
	var AX=$("#usinst").val();
	var AY=$("#instpass").val();
	var AZ=$("#uspints").val();
	var BA=$("#pintspass").val();
	var BB=$("#uslikind").val();
	var BC=$("#likindpass").val();
	var BD=$("#ustwiter").val();
	var BE=$("#twitterpass").val();
	var BF=$("#estadodirecionseg").val();
	var BG=$("#fechaabonoA").val();
	var BH=$("#fechaabonoB").val();
	var BI=$("#fechaabonoC").val();
	var BJ=$("#estdA").val();
	var BK=$("#estdB").val();
	var BL=$("#estdC").val();
	var BM=$("#estadoprove").val();
	var BN=$("#aafi").val();
	var BO=$("#aaff").val();
	var BP=$("#bbfr").val();
	var BQ=$("#lkurl").val();
	var BR=$("#adurl").val();
	var BS=$("#psurl").val();
	if (AA=="0" || AA=="") {
		$("#mensajeseguimiento").css(normal).text("Selecione la empresa");
		$("#mensajeseguimiento").fadeIn();
	}
	else{
		if (AB=="0" || AB=="") {
			$("#mensajeseguimiento").css(normal).text("Selecione el plan");
			$("#mensajeseguimiento").fadeIn();
		}
		else{
			if (Afdi=="0" || Afdf=="0") {
				$("#mensajeseguimiento").css(normal).text("Selecione el dia");
				$("#mensajeseguimiento").fadeIn();
			}
			else{
				if (Afmi=="0" || Afmf=="0") {
					$("#mensajeseguimiento").css(normal).text("Selecione el mes");
					$("#mensajeseguimiento").fadeIn();
				}
				else{
					if (Afyi=="" || Afyf=="") {
						$("#mensajeseguimiento").css(normal).text("Escribe el año");
						$("#mensajeseguimiento").fadeIn();
					}
					else{
						if (AI=="0") {
							$("#mensajeseguimiento").css(normal).text("Selecione Estado del plan");
							$("#mensajeseguimiento").fadeIn();
						}
						else{
							if (AJ=="0") {
								$("#mensajeseguimiento").css(normal).text("Selecione redirecionador");
								$("#mensajeseguimiento").fadeIn();
							}
							else{
								if (AM=="0") {
									$("#mensajeseguimiento").css(normal).text("Selecione estado Insumo");
									$("#mensajeseguimiento").fadeIn();
								}
								else{
									if (AN=="0") {
										$("#mensajeseguimiento").css(normal).text("Selecione el proveedor");
										$("#mensajeseguimiento").fadeIn();
									}
									else{
										if (BF=="0") {
											$("#mensajeseguimiento").css(normal).text("Selecione el estado direcionador");
											$("#mensajeseguimiento").fadeIn();
										}
										else{
											$("#mensajeseguimiento").css(normal).text("");
											$("#mensajeseguimiento").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
											$("#mensajeseguimiento").fadeIn();
											$.post("ingresoseguimenientosfin.php",{
												aa:AA,ab:AB,ac:AC,ad:AD,ae:AE,af:AF,ag:AG,ah:AH,ai:AI,aj:AJ,
												ak:AK,al:AL,am:AM,an:AN,ao:AO,ap:AP,aq:AQ,ar:AR,as:AS,at:AT,
												au:AU,av:AV,aw:AW,ax:AX,ay:AY,az:AZ,ba:BA,bb:BB,bc:BC,bd:BD,
												be:BE,bf:BF,ca:Afdi,cb:Afmi,cc:Afyi,cd:Afdf,ce:Afmf,cf:Afyf,
												cg:Afdr,ch:Afmr,ci:Afyr,
												bg:BG,bh:BH,bi:BI,bj:BJ,bk:BK,bl:BL,bm:BM,bn:BN,bo:BO,bp:BP,
												bq:BQ,br:BR,bs:BS
											},resultadosseguimientos);
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
function resultadosseguimientos (dsegF) {
	if (dsegF=="2") {
		$("#mensajeseguimiento").css(bien).text("Seguimineto ingresado");
		$("#mensajeseguimiento").fadeIn();$("#mensajeseguimiento").fadeOut(3000);
		$(".blanc").val("");
	}
	else{
		$("#mensajeseguimiento").html(dsegF);
		$("#mensajeseguimiento").css(normal);
		$("#mensajeseguimiento").fadeIn();
	}
}
function verempresas (lka) {
	lka.preventDefault();
	var idPr=$(this).attr("data-id");
	$.post("mostrarempresayclientes.php",{idEa:idPr},ventanaA);
}
function ventanaA (sita) {
	$("#datosf").html(sita);
	$(".miniventana").fadeIn();
}
function verplanes (lkb) {
	lkb.preventDefault();
	var idPLAN=$(this).attr("data-id");
	$.post("nostrarplanes.php",{idEb:idPLAN},ventanaB);
}
function ventanaB (sirb) {
	$("#datosf").html(sirb);
	$(".miniventana").fadeIn();
}
function cerminivent (cerir) {
	cerir.preventDefault();
	$(".miniventana").fadeOut();
}
function cambiarestadoplan () {
	var idsA=$(this).attr("data-id");
	var selA="as_"+idsA;
	var optiona=$("#"+selA).val();
	$.post("modifcarEstadoA.php",{idtda:idsA,jaa:optiona},estadoone);
}
function estadoone (carA) {
	if (carA=="2") {
		alert("Estado plan Modificado");
		location.reload(20);
	}
	else{
		alert(carA);
	}
}
function cambiarestadodirecionador () {
	var idsB=$(this).attr("data-id");
	var selB="bs_"+idsB;
	var optionb=$("#"+selB).val();
	$.post("modifcarEstadoB.php",{idtb:idsB,jab:optionb},estadona);
}
function estadona (carB) {
	if (carB=="2") {
		alert("Estado direcionador modificado");
		location.reload(20);
	}
	else{
		alert(carB);
	}
}
function cambiarestadoinsumos () {
	var idsC=$(this).attr("data-id");
	var selC="cs_"+idsC;
	var optionc=$("#"+selC).val();
	$.post("modificarEstadoC.php",{ikal:idsC,jac:optionc},estadc);
}
function estadc (carC) {
	if (carC=="2") {
		alert("Estado Insumo cambiado");
		location.reload(20);
	}
	else{
		alert(carC);
	}
}
function sliplanbusABb () {
	var idplBBb=$("#plansB").val();
	$("#proveedorB").find('option').removeAttr('selected');
	$.post("busppreciopl.php",{idpA:idplBBb},colocarABb);
	$.post("buspprecdirecionpl.php",{idpB:idplBBb},colocarBBb);
	$.post("buspisumospl.php",{idpC:idplBBb},colocarCBb);
	$.post("buspidproveepl.php",{idpD:idplBBb},colocarDBb);
}
function colocarABb (precBb) {
	var decpBb=precBb*0.05;
	$("#descuentoB").val(decpBb);
	$("#descuentoB,#abnAB,#abnBB,#abnCB").attr('data-prec', precBb);
	var numeroaBb=parseInt($("#abnAB").val());
	var numerobBb=parseInt($("#abnBB").val());
	var numerocBb=parseInt($("#abnCB").val());
	var numerodBb=parseInt($("#valordirecCB").val());
	var numeroeBb=parseInt($("#insumosB").val());
	var numerofBb=parseInt($("#preciproveB").val());
	var restaBb=precBb-decpBb-numeroaBb-numerobBb-numerocBb;
	var totalabonosBb=numeroaBb+numerobBb+numerocBb;
	var sumaotrosBb=numerodBb+numeroeBb+numerofBb;
	var restaencajaBb=sumaotrosBb-totalabonosBb;
	if (restaencajaBb<0) {
		var quitarneBb=restaencajaBb*(-1);
	}
	else{
		var quitarneBb=restaencajaBb;
	}
	$("#saldoB").val(restaBb);
	$("#abnAB").val(0);
	$("#abnBB").val(0);
	$("#abnCB").val(0);
	$("#cajaB").val(quitarneBb);
	$("#precplB").text("$"+decpBb);
	$("#precplB").fadeIn();
}
function colocarBBb (precdirecBb) {
	$("#valordirecCB").val(precdirecBb);
}
function colocarCBb (insuBb) {
	$("#insumosB").val(insuBb);
}
function colocarDBb (proveidBb) {
	$("#proveedorB option[value="+proveidBb+"]").attr('selected', true);
	$.post("coloprecioporve.php",{proveIDev:proveidBb},colocarEBb);
}
function colocarEBb (pricpvrdBb) {
	$("#preciproveB").val(pricpvrdBb);
}
function cambiprcAB () {
	var precTaB=$(this).attr("data-prec");
	var descinaB=parseInt($("#descuentoB").val());
	var numeraB=parseInt($("#abnAB").val());
	var numerbB=parseInt($("#abnBB").val());
	var numercB=parseInt($("#abnCB").val());
	var numerdB=parseInt($("#valordirecCB").val());
	var numereB=parseInt($("#insumosB").val());
	var numerfB=parseInt($("#preciproveB").val());
	var restabB=precTaB-descinaB-numeraB-numerbB-numercB;
	var totalabonosBc=numeraB+numerbB+numercB;
	var sumaotrosBc=numerdB+numereB+numerfB;
	var restaencajaBc=sumaotrosBc-totalabonosBc;
	$("#saldoB").val(restabB);
	$("#cajaB").val(restaencajaBc);
}
function cambiprcBB () {
	var precTbB=$(this).attr("data-prec");
	var descinbB=parseInt($("#descuentoB").val());
	var numeaB=parseInt($("#abnAB").val());
	var numebB=parseInt($("#abnBB").val());
	var numecB=parseInt($("#abnCB").val());
	var numedB=parseInt($("#valordirecCB").val());
	var numeeB=parseInt($("#insumosB").val());
	var numefB=parseInt($("#preciproveB").val());
	var restacB=precTbB-descinbB-numeaB-numebB-numecB;
	var totalabonosBd=numeaB+numebB+numecB;
	var sumaotrosBd=numedB+numeeB+numefB;
	var restaencajaBd=sumaotrosBd-totalabonosBd;
	if (restaencajaBd<0) {
		var quitarneBd=restaencajaBd*(-1);
	}
	else{
		var quitarneBd=restaencajaBd;
	}
	$("#saldoB").val(restacB);
	$("#cajaB").val(quitarneBd);
}
function cambiprcCB () {
	var precTcB=$(this).attr("data-prec");
	var descincB=parseInt($("#descuentoB").val());
	var numaB=parseInt($("#abnAB").val());
	var numbB=parseInt($("#abnBB").val());
	var numcB=parseInt($("#abnCB").val());
	var numdB=parseInt($("#valordirecCB").val());
	var numeB=parseInt($("#insumosB").val());
	var numfB=parseInt($("#preciproveB").val());
	var restadB=precTcB-descincB-numaB-numbB-numcB;
	var totalabonosBbe=numaB+numbB+numcB;
	var sumaotrosBbe=numdB+numeB+numfB;
	var restaencajaBbe=sumaotrosBbe-totalabonosBbe;
	if (restaencajaBe<0) {
		var quitarneBe=restaencajaBe*(-1);
	}
	else{
		var quitarneBe=restaencajaBe;
	}
	$("#saldoB").val(restadB);
	$("#cajaB").val(quitarneBe);
}
function cambiprcDB () {
	var precTdB=$(this).attr("data-prec");
	var descindB=parseInt($("#descuentoB").val());
	var nuaB=parseInt($("#abnAB").val());
	var nubB=parseInt($("#abnBB").val());
	var nucB=parseInt($("#abnCB").val());
	var nudB=parseInt($("#valordirecCB").val());
	var nueB=parseInt($("#insumosB").val());
	var nufB=parseInt($("#preciproveB").val());
	var restaeB=precTdB-descindB-nuaB-nubB-nucB;
	var totalabonosBf=nuaB+nubB+nucB;
	var sumaotrosBf=nudB+nueB+nufB;
	var restaencajaBf=sumaotrosBf-totalabonosBf;
	if (restaencajaBf<0) {
		var quitarneBf=restaencajaBf*(-1);
	}
	else{
		var quitarneBf=restaencajaBf;
	}
	alert(restaeB+"-"+precTdB+"-"+descindB+"-"+nuaB+"-"+nubB+"-"+nucB);
	$("#saldoB").val(restaeB);
	$("#cajaB").val(quitarneBf);
}
function modifcardatoseguimiento (modifc) {
	var idsG=$(this).attr("data-seg");
	var CA=$("#empresaB").val();
	var CB=$("#plansB").val();
	var CC=$("#descuentoB").val();
	var CD=$("#abnAB").val();
	var CE=$("#abnBB").val();
	var CF=$("#abnCB").val();
	var CG=$("#saldoB").val();
	var CH=$("#cajaB").val();
	var Cfdi=$("#fdi").val();
	var Cfmi=$("#fmesi").val();
	var Cfyi=$("#yeari").val();
	var Cfdf=$("#fdF").val();
	var Cfmf=$("#fmesF").val();
	var Cfyf=$("#yearF").val();
	var CI=$("#estdplansgB").val();
	var CJ=$("#redirecionadorB").val();
	var CK=$("#valordirecCB").val();
	var CL=$("#insumosB").val();
	var CM=$("#estadoisumosB").val();
	var CN=$("#proveedorB").val();
	var CO=$("#preciproveB").val();
	var CP=$("#dominioB").val();
	var CQ=$("#ftpB").val();
	var CR=$("#usuarioservB").val();
	var CS=$("#passworddomB").val();
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
	var DF=$("#estadodirecionsegB").val();
	var DG=$("#fechaabonoAB").val();
	var DH=$("#fechaabonoBB").val();
	var DI=$("#fechaabonoCB").val();
	var DJ=$("#estdAB").val();
	var DK=$("#estdBB").val();
	var DL=$("#estdCB").val();
	var DM=$("#etadoproveB").val();
	var DN=$("#lkurlB").val();
	var DO=$("#adurlB").val();
	var DP=$("#psurlB").val();
	if (CA=="0" || CA=="") {
		$("#mensajfinseg").css(normal).text("Selecione la empresa");
		$("#mensajfinseg").fadeIn();
	}
	else{
		if (CB=="0" || CB=="") {
			$("#mensajfinseg").css(normal).text("Selecione el plan");
			$("#mensajfinseg").fadeIn();
		}
		else{
			if (CI=="0") {
				$("#mensajfinseg").css(normal).text("Selecione Estado del plan");
				$("#mensajfinseg").fadeIn();
			}
			else{
				if (CJ=="0") {
					$("#mensajfinseg").css(normal).text("Selecione redirecionador");
					$("#mensajfinseg").fadeIn();
				}
				else{
					if (CM=="0") {
						$("#mensajfinseg").css(normal).text("Selecione estado Insumo");
						$("#mensajfinseg").fadeIn();
					}
					else{
						if (CN=="0") {
							$("#mensajfinseg").css(normal).text("Selecione el proveedor");
							$("#mensajfinseg").fadeIn();
						}
						else{
							if (DF=="0") {
								$("#mensajfinseg").css(normal).text("Selecione el estado direcionador");
								$("#mensajfinseg").fadeIn();
							}
							else{
								$("#mensajfinseg").css(normal).text("");
								$("#mensajfinseg").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
								$("#mensajfinseg").fadeIn();
								$.post("modifcarseguimientodaots.php",{
									ca:CA,cb:CB,cc:CC,cd:CD,ce:CE,cf:CF,cg:CG,ch:CH,ci:CI,cj:CJ,
									ck:CK,cl:CL,cm:CM,cn:CN,co:CO,cp:CP,cq:CQ,cr:CR,cs:CS,ct:CT,
									cu:CU,cv:CV,cw:CW,cx:CX,cy:CY,cz:CZ,da:DA,db:DB,dc:DC,dd:DD,
									de:DE,df:DF,idEEvv:idsG,
									dg:DG,dh:DH,di:DI,dj:DJ,dk:DK,dl:DL,dm:DM,dn:DN,doo:DO,dp:DP
								},resultadosmodificaiones);
							}
						}
					}
				}
			}
		}
	}
}
function resultadosmodificaiones (finb) {
	if (finb=="2") {
		$("#mensajfinseg").css(bien).text("Seguimiento modificado");
		$("#mensajfinseg").fadeIn();$("#mensajfinseg").fadeOut(3000);
		location.reload(50000);
	}
	else{
		$("#mensajfinseg").html(finb);
		$("#mensajfinseg").css(normal);
		$("#mensajfinseg").fadeIn();
	}
}
function modificarfechinicio () {
	var idI=$(this).attr("data-dos");
	var diaI=$("#fdiB").val();
	var mesI=$("#fmesiB").val();
	var yearI=$("#yeariB").val();
	if (diaI=="0" || diaI=="") {
		$("#mesinda").css(normal).text("selecione el dia");
		$("#mesinda").fadeIn();
	}
	else{
		if (mesI=="0" || mesI=="") {
			$("#mesinda").css(normal).text("selecione el mes");
			$("#mesinda").fadeIn();
		}
		else{
			if (yearI=="" || yearI.length!=4) {
				$("#mesinda").css(normal).text("Escribe el año");
				$("#mesinda").fadeIn();
			}
			else{
				$("#mesinda").css(normal).text("");
				$("#mesinda").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesinda").fadeIn();
				$.post("modifcarfechainicio.php",{idfi:idI,di:diaI,mi:mesI,yi:yearI},mesajfinTT);
			}
		}
	}
}
function mesajfinTT (jak) {
	if (jak=="2") {
		$("#mesinda").css(bien).text("Fecha Inicio modifcada");
		$("#mesinda").fadeIn();$("#mesinda").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesinda").html(jak);
		$("#mesinda").css(normal);
		$("#mesinda").fadeIn();
	}
}
function modifcarfechfin () {
	var idF=$(this).attr("data-dos");
	var diaF=$("#fdFB").val();
	var mesF=$("#fmesFB").val();
	var yearF=$("#yearFB").val();
	if (diaF=="0" || diaF=="") {
		$("#mesfinda").css(normal).text("selecione el dia");
		$("#mesfinda").fadeIn();
	}
	else{
		if (mesF=="0" || mesF=="") {
			$("#mesfinda").css(normal).text("selecione el mes");
			$("#mesfinda").fadeIn();
		}
		else{
			if (yearF=="" || yearF.length!=4) {
				$("#mesfinda").css(normal).text("Escribe el año");
				$("#mesfinda").fadeIn();
			}
			else{
				$("#mesfinda").css(normal).text("");
				$("#mesfinda").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesfinda").fadeIn();
				$.post("modifcarfechafin.php",{idff:idF,df:diaF,mf:mesF,yf:yearF},mesajfinUU);
			}
		}
	}
}
function mesajfinUU (jbk) {
	if (jbk=="2") {
		$("#mesfinda").css(bien).text("Fecha Fin modifcada");
		$("#mesfinda").fadeIn();$("#mesfinda").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesfinda").html(jbk);
		$("#mesfinda").css(normal);
		$("#mesfinda").fadeIn();
	}
}
function modifcarfecrenova () {
	var idR=$(this).attr("data-dos");
	var diaR=$("#fdRB").val();
	var mesR=$("#fmesRB").val();
	var yearR=$("#yearRB").val();
	if (diaR=="0" || diaR=="") {
		$("#mesrenda").css(normal).text("selecione el dia");
		$("#mesrenda").fadeIn();
	}
	else{
		if (mesR=="0" || mesR=="") {
			$("#mesrenda").css(normal).text("selecione el mes");
			$("#mesrenda").fadeIn();
		}
		else{
			if (yearR=="" || yearR.length!=4) {
				$("#mesrenda").css(normal).text("Escribe el año");
				$("#mesrenda").fadeIn();
			}
			else{
				$("#mesrenda").css(normal).text("");
				$("#mesrenda").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
				$("#mesrenda").fadeIn();
				$.post("modifcarfecharenovacion.php",{idfr:idR,dr:diaR,mr:mesR,yr:yearR},mesajfinVV);
			}
		}
	}
}
function mesajfinVV (jck) {
	if (jck=="2") {
		$("#mesrenda").css(bien).text("Fecha Inicio modifcada");
		$("#mesrenda").fadeIn();$("#mesrenda").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mesrenda").html(jck);
		$("#mesrenda").css(normal);
		$("#mesrenda").fadeIn();
	}
}
function modifcarfecpublicacion () {
	var idP=$(this).attr("data-dos");
	var diaP=$("#fdPB").val();
	var mesP=$("#fmesPB").val();
	var yearP=$("#yearPB").val();
	if (idP=="") {
		alert("id Seguimiento no disponible");
	}
	else{
		if (diaP=="0" || diaP=="") {
			$("#mespublic").css(normal).text("Selecione día");
			$("#mespublic").fadeIn();
		}
		else{
			if (mesP=="0" || mesP=="") {
				$("#mespublic").css(normal).text("Selecione mes");
				$("#mespublic").fadeIn();
			}
			else{
				if (yearP=="" || yearP.length!=4) {
					$("#mespublic").css(normal).text("Escribe el año");
					$("#mespublic").fadeIn();
				}
				else{
					$("#mespublic").css(normal).text("");
					$("#mespublic").prepend("<center><img src='../imagenes/loading.gif' alt='loading' style='width:10px;' /></center>");
					$("#mespublic").fadeIn();
					$.post("modificarfechapublicacion.php",{idpp:idP,dp:diaP,mp:mesP,yp:yearP},mesafecpulcit);
				}
			}
		}
	}
}
function mesafecpulcit (ivaP) {
	if (ivaP=="2") {
		$("#mespublic").css(bien).text("Fecha publicación Modificada");
		$("#mespublic").fadeIn();$("#mespublic").fadeOut(3000);
		location.reload(5000);
	}
	else{
		$("#mespublic").html(ivaP);
		$("#mespublic").css(normal);
		$("#mespublic").fadeIn();
	}
}
function cambioarestabonoA () {
	var diAbA=$(this).attr("data-kl");
	var nocajaA="modifEsA_"+diAbA;
	var opcionA=$("#"+nocajaA).val();
	//alert(diAbA+"-"+opcionA);
	$.post("cambioAAf.php",{idAss:diAbA,tipoA:opcionA},jankA);
}
function jankA (wA) {
	if (wA=="2") {
		alert("Estado Abono 1 Modificado");
		location.reload(20);
	}
	else{
		alert(wA);
	}
}
function cambioarestabonoB () {
	var diBbB=$(this).attr("data-kl");
	var nocajaB="modifEsB_"+diBbB;
	var opcionB=$("#"+nocajaB).val();
	//alert(diBbB+"-"+opcionB);
	$.post("cambioBBf.php",{idBss:diBbB,tipoB:opcionB},jankB);
}
function jankB (wB) {
	if (wB=="2") {
		alert("Estado Abono 2 Modificado");
		location.reload(20);
	}
	else{
		alert(wB);
	}
}
function cambioarestabonoC () {
	var diCbC=$(this).attr("data-kl");
	var nocajaC="modifEsC_"+diCbC;
	var opcionC=$("#"+nocajaC).val();
	//alert(diCbC+"-"+opcionC);
	$.post("cambioCCf.php",{idCss:diCbC,tipoC:opcionC},jankC);
}
function jankC (wC) {
	if (wC=="2") {
		alert("Estado Abono 3 Modificado");
		location.reload(20);
	}
	else{
		alert(wC);
	}
}
function cambiarestadoprovee () {
	var idpvp=$(this).attr("data-idpv");
	var nocajaD="espov_"+idpvp;
	var opcionD=$("#"+nocajaD).val();
	$.post("cambioDDf.php",{idDss:idpvp,tipoD:opcionD},jankD);
}
function jankD (wD) {
	if (wD=="2") {
		alert("Estado proveedor mnodificado");
		location.reload(20);
	}
	else{
		alert(wD);
	}
}