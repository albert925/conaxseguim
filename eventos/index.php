<?php
	include '../config.php';
	include 'fecha_format.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$usuariounico=$_SESSION['adm'];
		$sacarinform="SELECT * from administrador where usuadmin='$usuariounico'";
		$queryad=mysql_query($sacarinform,$conexion) or die (mysql_error());
		while ($adv=mysql_fetch_array($queryad)) {
			$idad=$adv['id_admin'];
			$correo=$adv['correo_adm'];
			$avatar=$adv['avatar_adm'];
			$tpad=$adv['tip_adm'];
		}
		$dH=date("d");
		$dbH=date("j");
		$mH=date("m");
		$mbH=date("n");
		$yH=date("Y");
		$fein=$yH."-".$mH."-00";
		$feff=$yH."-".$mH."-31";
		$hoy=$yH."-".$mH."-".$dH;
		$nommeses=["Meses","Enero","Febrero","Marzo","Abril",
			"Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Seguimiento</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<link rel="stylesheet" href="../css/eventos.css" />
	<link rel="stylesheet" href="../css/default/default.css" />
	<link rel="stylesheet" href="../css/nivo_slider.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/eventos.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<?php
						if ($tpad=="1") {
					?>
					<li>
						<a href="../administrador">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../administrador/clientes">Clientes</a></li>
							<li><a href="../administrador/direcionador">Direcionador</a></li>
							<li><a href="../administrador/planes">Planes</a></li>
							<li><a href="../administrador/proveedores">Proveedores</a></li>
							<li><a href="../administrador/sectores">Sectores</a></li>
						</ul>
					</li>
					<li>
						<a href="../contabilidad">Contabilidad</a>
						<div class="submen" data-num="1"><span class="icon-ctrl"></span></div>
						<ul class="children1">
							<li><a href="../contabilidad/pendiente">Cuentas por Cobrar</a></li>
							<li><a href="../contabilidad/pagos">Cuentas por Pagar</a></li>
							<li><a href="../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../contabilidad/cajas">Caja</a></li>
						</ul>
					</li>
					<li>
						<a href="../tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../tareas/indicador">Indicadores</a></li>
							<li><a href="../tareas/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../comercial">Comercial</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos" class="selecionado">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
						else{
					?>
					<li><a href="../users">Inicio</a></li>
					<li>
						<a href="../users/mis_tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../users/mis_tareas">Mis tareas</a></li>
							<li><a href="../users/indicador">Indicadores</a></li>
							<li><a href="../users/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../users/metas">Metas</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos" class="selecionado">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
					<?php
						}
					?>
				</ul>
			</nav>
			<div id="mn_mov"><span class="icon-menu"></span></div>
			<div id="ifmorver" class="veradmC">
				<?php 
					// echo "$usuariounico";
					$imagenadv="../".$avatar;
				?>
				<figure style="background-image:url(<?php echo $imagenadv ?>);">
					<!--Imagen-->
				</figure>
			</div>
		</article>
		<div class="botnomenu">
			<center><img src="../imagenes/abajo_b.png" alt="abajo" /></center>
		</div>
	</header><!-- /header -->
	<section>
		<h1>Eventos</h1>
		<article id="menub">
			<?php
				if ($tpad=="1") {
			?>
			<a id="disea" href="nuevo_evento.php">Nuevo Evento</a>
			<a id="disea" href="images_evento.php">Nueva Imagen de evento</a>
			<?php
				}
			?>
			<select id="mesBcb">
				<?php
					for ($mmb=0; $mmb <=12 ; $mmb++) { 
				?>
				<option value="<?php echo $mmb ?>"><?php echo $nommeses[$mmb]; ?></option>
				<?php
					}
				?>
			</select>
			<select id="yearBcb">
				<?php
					for ($yyB=2014; $yyB <=($yH+1) ; $yyB++) {
						if ($yyB==$yH) {
							$selyear="selected";
						}
						else{
							$selyear="";
						}
				?>
				<option value="<?php echo $yyB ?>" <?php echo $selyear ?>><?php echo "$yyB"; ?></option>
				<?php
					}
				?>
			</select>
		</article>
		<article class="eventyconemn">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from evento order by event_id desc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from evento order by event_id desc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idv=$gh['event_id'];
					$nmv=$gh['nam_ev'];
					$textv=$gh['desc_ev'];
					$fecvv=$gh['fec_ev'];
					$forff=fechatraducearray($fecvv);
					if ($tpad=="1") {
			?>
			<h2><?php echo "$nmv"; ?></h2>
			<article id="cajmodfibdell">
				<a class="dosbvh" href="modfi_evento.php?pd=<?php echo $idv ?>">Modificar</a>
				<a class="dosbvh" href="eventos_images.php?pd=<?php echo $idv ?>">Imágenes</a>
				<a class="dell" href="borr_evento.php?br=<?php echo $idv ?>">Borrar</a>
			</article>
			<?php
					}
			?>
			<span><b>Fecha:</b> <?php echo "$forff"; ?></span>
			<figure id="galery">
				<div class="slider-wrapper theme-default">
					<div class="slider nivoSlider">
						<?php
							$Todosimevents="SELECT * from imagenes_event where evet_id=$idv order by id_img_evet asc";
							$sql_todimgev=mysql_query($Todosimevents,$conexion) or die (mysql_error());
							while ($ygm=mysql_fetch_array($sql_todimgev)) {
								$idimgPrd=$ygm['id_img_evet'];
								$rutPp=$ygm['rut_ev'];
						?>
						<img src="../<?php echo $rutPp ?>" alt="<?php echo $nmv ?>_<?php echo $idimgPrd ?>" /><!--title="#caption1"-->
						<?php
							}
						?>
					</div>
					<!--div id="caption1" style="display: none;">
						<h2>
							Guia
						</h2>
					</div><caption-->
				</div>
			</figure>
			<article id="comentarios">
				<article id="nuevcmm" class="columndos">
					<textarea id="tccmm_<?php echo $idv ?>" rows="2"></textarea>
					<div id="wxy_<?php echo $idv ?>"></div>
					<input type="submit" value="Comentar" id="boyonstyle" class="nvcoment" data-us="<?php echo $idad ?>" data-ev="<?php echo $idv ?>" />
				</article>
				<article id="todoComent_<?php echo $idv ?>">
					<?php
						$Comnetevt="SELECT * from comentario_evento where evet_id=$idv order by id_cm desc";
						$sql_commentvt=mysql_query($Comnetevt,$conexion) or die (mysql_error());
						while ($kmk=mysql_fetch_array($sql_commentvt)) {
							$idcmm=$kmk['id_cm'];
							$adcmm=$kmk['aut_id'];
							$txcmm=$kmk['text_cm'];
							$fecmm=$kmk['fec_cm'];
							$forcmfec=fechatraducearray($fecmm);
							$datosAdmin="SELECT * from administrador where id_admin=$adcmm";
							$sql_adminver=mysql_query($datosAdmin,$conexion) or die (mysql_error());
							while ($ycmad=mysql_fetch_array($sql_adminver)) {
								$cocmc=$ycmad['correo_adm'];
								$avcmc=$ycmad['avatar_adm'];
								$tpcmc=$ycmad['tip_adm'];
							}
							$avatcmc="../".$avcmc;
					?>
					<article id="restcommen">
						<article>
							<figure id="avatcomn" style="background-image:url(<?php echo $avatcmc ?>);"></figure>
						</article>
						<article id="texto">
							<div id="parfcmc">
								<?php echo "$txcmm"; ?>
							</div>
							<div id="feccm">
								<?php echo "$forcmfec"; ?>
							</div>
						</article>
					</article>
					<?php
						}
					?>
				</article>
			</article>
			<?php
				}
			?>
		</article>
		<article>
			<br />
			<b>Páginas: </b>
			<?php
				//muestro los distintos indices de las paginas
				if ($total_paginas>1) {
					for ($i=1; $i <=$total_paginas ; $i++) { 
						if ($pagina==$i) {
							//si muestro el indice del la pagina actual, no coloco enlace
				?>
					<b><?php echo $pagina." "; ?></b>
				<?php
						}
						else{
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
				?>
							<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

				<?php
						}
					}
				}
			?>
		</article>
	</section>
	<footer>
		<article id="margen">
			<p>
				Pie de página
			</p>
		</article>
	</footer>
	<script src="../js/nivo_slider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
      $('.slider').nivoSlider({
          effect: 'fade',
          slices: 15,
          boxCols: 8,
          boxRows: 4,
          animSpeed: 500,
          pauseTime: 10000,
          pauseOnHover:true,
          startSlide: 0,
          directionNav: true,
          controlNav: true,
          controlNavThumbs: false,
          pauseOnHover: true,
          manualAdvance: false,
          prevText: 'Prev',
          nextText: 'Next',
          randomStart: false,
      });
   	});
   	// http://web.tursos.com/como-implementar-nivo-slider-en-tu-pagina-web/
	</script>
</body>
</html>
<?php
	}
	else{
		echo "<script>";
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>