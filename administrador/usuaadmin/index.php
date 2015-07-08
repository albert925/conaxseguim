<?php
	include '../../config.php';
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../../imagenes/logo.png" />
	<title>Seguimiento</title>
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/menu.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripamd.js"></script>
	<script src="../../js/adminusermd.js"></script>
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
						<a href="../../administrador">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../../administrador/clientes">Clientes</a></li>
							<li><a href="../../administrador/direcionador">Direcionador</a></li>
							<li><a href="../../administrador/planes">Planes</a></li>
							<li><a href="../../administrador/proveedores">Proveedores</a></li>
							<li><a href="../../administrador/sectores">Sectores</a></li>
						</ul>
					</li>
					<li>
						<a href="../../contabilidad">Contabilidad</a>
						<div class="submen" data-num="1"><span class="icon-ctrl"></span></div>
						<ul class="children1">
							<li><a href="../../contabilidad/pendiente">Cuentas por Cobrar</a></li>
							<li><a href="../../contabilidad/pagos">Cuentas por Pagar</a></li>
							<li><a href="../../contabilidad/ingresos">Ingresos</a></li>
							<li><a href="../../contabilidad/cajas">Caja</a></li>
						</ul>
					</li>
					<li>
						<a href="../../tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../../tareas/mis_tareas">Mis tareas</a></li>
							<li><a href="../../tareas/indicador">Indicadores</a></li>
							<li><a href="../../tareas/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../../comercial">Comercial</a></li>
					<li><a href="../../clientes">Clientes</a></li>
					<li><a href="../../eventos">Eventos</a></li>
					<li><a href="../../cerrar">Salir</a></li>
					<?php
						}
						else{
					?>
					<li><a href="../../users">Inicio</a></li>
					<li>
						<a href="../../users/mis_tareas">Tareas</a>
						<div class="submen" data-num="3"><span class="icon-ctrl"></span></div>
						<ul class="children3">
							<li><a href="../../users/mis_tareas">Mis tareas</a></li>
							<li><a href="../../users/indicador">Indicadores</a></li>
							<li><a href="../../users/indicadorTotal">Indicador total</a></li>
						</ul>
					</li>
					<li><a href="../../users/metas">Metas</a></li>
					<li><a href="../../clientes">Clientes</a></li>
					<li><a href="../../eventos">Eventos</a></li>
					<li><a href="../../cerrar">Salir</a></li>
					<?php
						}
					?>
				</ul>
			</nav>
			<div id="mn_mov"><span class="icon-menu"></span></div>
			<div id="ifmorver" class="veradmB">
				<?php 
					// echo "$usuariounico";
					$imagenadv="../../".$avatar;
				?>
				<figure style="background-image:url(<?php echo $imagenadv ?>);">
					<!--Imagen-->
				</figure>
			</div>
		</article>
		<div class="botnomenu">
			<center><img src="../../imagenes/abajo_b.png" alt="abajo" /></center>
		</div>
	</header><!-- /header -->
	<section>
		<h1>Datos de <?php echo "$usuariounico"; ?></h1>
		<article id="verdatos">
			<figure>
				<form action="#" method="post" enctype="multipart/form-data" class="formiav">
					<img src="../../<?php echo $avatar ?>" alt="" />
					<figcaption>
						<input type="text" id="idadminF" name="idadminF" value="<?php echo $idad ?>" style="display:none;" />
						<input type="file" id="iamavatar" name="iamavatar" required="required" />
						<div id="mesajimgavatar"></div>
						<input type="submit" value="Modificar" id="modifavatar" class="botonstyle" />
					</figcaption>
				</form>				
			</figure>
			<article id="inpusrtadmins">
				<input type="text" id="usernamf" value="<?php echo $usuariounico ?>" placeholder="Nombre usuario admin" />
				<div id="adA"></div>
				<input type="submit" value="Modificar" id="modficusaf" class="botonstyle" data-id="<?php echo $idad ?>" value="botonstyle" />
				<input type="email" id="modifcaorad" value="<?php echo $correo ?>" placeholder="Correo" />
				<div id="adB"></div>
				<input type="submit" id="modifcorrF" class="botonstyle" data-id="<?php echo $idad ?>" value="Modificar" />
			</article>
			<article id="inpusrtadmins">
				<input type="password" id="passAnt" placeholder="Contraseña actual" />
				<input type="password" id="passNa"  placeholder="Contraseña Nueva" />
				<input type="password" id="passNb"  placeholder="Repita contraseña Nueva" />
				<div id="adC"></div>
				<input type="submit" id="passcambioF" class="botonstyle" data-id="<?php echo $idad ?>" value="Modificar" />
			</article>
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
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>