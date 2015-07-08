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
		}
		$idMR=$_GET['idmet'];
		if ($idMR=="") {
			echo "<script>";
				echo "alert('id de meta no disponibñe');";
				echo "var pag='../comercial';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$metassql="SELECT * from metas where id_meta='$idMR'";
			$dentrosql=mysql_query($metassql,$conexion) or die (mysql_error());
			while ($mt=mysql_fetch_array($dentrosql)) {
				$idM=$mt['id_meta'];
				$prM=$mt['precio_meta'];
				$resM=$mt['restante_meta'];
				$mesM=$mt['mes_mt'];
				$yearM=$mt['year_mt'];
				$dpM=$mt['depart_metas'];
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<link rel="icon" href="../imagenes/logo.png" />
	<title>Comercial</title>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/menu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripamd.js"></script>
	<script src="../js/metas.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
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
					<li><a href="../comercial" class="selecionado">Comercial</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../eventos">Eventos</a></li>
					<li><a href="../cerrar">Salir</a></li>
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
		<h1>Modificación Meta</h1>
		<article id="menub">
			<div id="vermet">Ver metas</div>
			<div id="NuvMet">Nuevo Meta</div>
		</article>
		<article id="verdatos">
			<select id="mesttf">
				<?php
					for ($i=0; $i <=12 ; $i++) { 
						if ($i==$mesM) {
							$selim="selected";
						}
						else{
							$selim="";
						}
						switch ($i) {
							case '1':
								$nombmes="Enero";
								break;
							case '2':
								$nombmes="Febrero";
								break;
							case '3':
								$nombmes="Marzo";
								break;
							case '4':
								$nombmes="Abril";
								break;
							case '5':
								$nombmes="Mayo";
								break;
							case '6':
								$nombmes="Junio";
								break;
							case '7':
								$nombmes="Julio";
								break;
							case '8':
								$nombmes="Agosto";
								break;
							case '9':
								$nombmes="Septiembre";
								break;
							case '10':
								$nombmes="Octubre";
								break;
							case '11':
								$nombmes="Noviembre";
								break;
							case '12':
								$nombmes="Diciembre";
								break;
							default:
								$nombmes="Meses";
								break;
						}
				?>
				<option value="<?php echo $i ?>" <?php echo $selim ?>><?php echo "$nombmes"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="dptTF">
				<option value="0">Departamento/Estado</option>
				<?php
					$tdos_dpt="SELECT * from departamento order by nam_depart asc";
					$sql_col=mysql_query($tdos_dpt,$conexion) or die (mysql_error());
					while ($TpT=mysql_fetch_array($sql_col)) {
						$idDT=$TpT['id_depart'];
						$nbDT=$TpT['nam_depart'];
						if ($idDT==$dpM) {
							$depsele="selected";
						}
						else{
							$depsele="";
						}
				?>
				<option value="<?php echo $idDT ?>" <?php echo $depsele ?>><?php echo "$nbDT"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="number" id="valmetaf" value="<?php echo $prM ?>" placeholder="Valor meta" />
			<div id="mesjmmodifmetas"></div>
			<input type="submit" id="imodfimeta" class="botonstyle" value="Modificar" data-id="<?php echo $idMR ?>" />
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