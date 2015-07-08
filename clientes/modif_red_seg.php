<?php
	include '../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$usuariounico=$_SESSION['adm'];
		$sacarinform="SELECT * from administrador where usuadmin='$usuariounico'";
		$queryad=mysql_query($sacarinform,$conexion) or die (mysql_error());
		while ($adv=mysql_fetch_array($queryad)) {
			$idad=$adv['id_admin'];
			$correo=$adv['correo_adm'];
			$avatar=$adv['avatar_adm'];
			$tipoad=$adv['tip_adm'];
		}
		$idR=$_GET['is'];
		if ($idR=="") {
			echo "<script>";
				echo "alert('id de seguimiento no disponible');";
				echo "var pag='../clientes';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from seguimiento where id_seguimineto=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			while ($dt=mysql_fetch_array($sql_datos)) {
				$cax=$dt['correo_correo'];
				$cay=$dt['pass_correo'];
				$caz=$dt['usuario_face'];
				$cba=$dt['pass_face'];
				$cbb=$dt['usuario_inst'];
				$cbc=$dt['pass_inst'];
				$cbd=$dt['usuario_pinters'];
				$cbe=$dt['pass_pinters'];
				$cbf=$dt['usuario_likind'];
				$cbg=$dt['pass_likind'];
				$cbh=$dt['usuario_twitter'];
				$cbi=$dt['pass_twitter'];
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Clientes</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/cambiotwoseg.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<?php
						if ($tipoad=="1") {
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
					<li><a href="../clientes" class="selecionado">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
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
					<li><a href="../clientes" class="selecionado">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
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
		<h1>Modificación datos redes del id "<?php echo "$idR"; ?>" seguimiento</h1>
		<article id="menub">
		</article>
		<article id="verdatos">
			<article id="fechas" class="redecl">
				<figure data-red="1">
					<img src="../imagenes/Email.png" alt="Correo" />
				</figure>
				<figure data-red="2">
					<img src="../imagenes/Facebook.png" alt="Facebook" />
				</figure>
				<figure data-red="3">
					<img src="../imagenes/Instagram.png" alt="Instagram" />
				</figure>
				<figure data-red="4">
					<img src="../imagenes/Pinterest.png" alt="Pinterest" />
				</figure>
				<figure data-red="5">
					<img src="../imagenes/Linkedin.png" alt="Linkedin" />
				</figure>
				<figure data-red="6">
					<img src="../imagenes/Twitter.png" alt="Twitter" />
				</figure>
			</article>
			<input style="display:none;" type="email" value="<?php echo $cax ?>" class="blanc" id="corrercorreoB" placeholder="Correo" />
			<input style="display:none;" type="text" value="<?php echo $cay ?>" class="blanc" id="pasccrrrB" placeholder="Cotraseña" />
			<input style="display:none;" type="email" value="<?php echo $caz ?>" class="blanc" id="usfaceB" placeholder="Usuario Facebook" />
			<input style="display:none;" type="text" value="<?php echo $cba ?>" class="blanc" id="facepassB" placeholder="Contraseña Facebook" />
			<input style="display:none;" type="email" value="<?php echo $cbb ?>" class="blanc" id="usinstB" placeholder="Usuario Instagram" />
			<input style="display:none;" type="text" value="<?php echo $cbc ?>" class="blanc" id="instpassB" placeholder="Contraseña Instagram" />
			<input style="display:none;" type="email" value="<?php echo $cbd ?>" class="blanc" id="uspintsB" placeholder="Usuario Pinters" />
			<input style="display:none;" type="text" value="<?php echo $cbe ?>" class="blanc" id="pintspassB" placeholder="Contraseña Pinters" />
			<input style="display:none;" type="text" value="<?php echo $cbf ?>" class="blanc" id="uslikindB" placeholder="Usuario Likind" />
			<input style="display:none;" type="text" value="<?php echo $cbg ?>" class="blanc" id="likindpassB" placeholder="Contraseña Likind" />
			<input style="display:none;" type="text" value="<?php echo $cbh ?>" class="blanc" id="ustwiterB" placeholder="Usuario Twitter" />
			<input style="display:none;" type="text" value="<?php echo $cbi ?>" class="blanc" id="twitterpassB" placeholder="Contraseña Twitter" />
			<div id="txmjsredes"></div>
			<input type="submit" value="Modificar" id="cambreds" class="botonstyle" data-sg="<?php echo $idR ?>" />
		</article>
	</section>
	<footer>
		<article id="margen">
			<p>
				Pie de página
			</p>
		</article>
	</footer>
</body>
</html>
<?php
		}
	}
	else{
		echo "<script>";
			echo "var pag='../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>