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
		}
		$idRPT=$_GET['IdDepart'];
		if ($idRPT=="") {
			echo "<script>";
				echo "alert('Id departamento no disponible')";
				echo "var pag='../sectores/departamentoestado.php';";
				echo "document.location.href=pag;";
			echo "</script>";
		}
		else{
			$vitpA="SELECT * from departamento where id_depart='$idRPT'";
			$sqlvip=mysql_query($vitpA,$conexion) or die (mysql_error());
			while ($ragP=mysql_fetch_array($sqlvip)) {
				$namepaisver=$ragP['nam_depart'];
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
	<script src="../../js/ingresectores.js"></script>
</head>
<body>
	<header>
		<article>
			<nav id="mnP">
				<ul>
					<li>
						<a href="../../administrador" class="selecionado">Seguimiento</a>
						<div class="submen" data-num="2"><span class="icon-ctrl"></span></div>
						<ul class="children2">
							<li><a href="../../administrador/clientes">Clientes</a></li>
							<li><a href="../../administrador/direcionador">Direcionador</a></li>
							<li><a href="../../administrador/planes">Planes</a></li>
							<li><a href="../../administrador/proveedores">Proveedores</a></li>
							<li><a href="../../administrador/sectores" class="selecionado">Sectores</a></li>
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
		<hgroup>
			<h1>Departamento <?php echo "$namepaisver"; ?></h1>
			<h2>Relaciones</h2>
		</hgroup>
		<article id="menub">
			<div id="Apais">Agregar País</div>
			<div id="Adep">Agregar Departamneto/Estado</div>
			<div id="Aciud">Agregar ciudad</div>
			<div id="Rpd">Relación Pais-Departamento</div>
			<div id="Rdc">Relación Departamento/Estado Ciudad</div>
		</article>
		<article id="menub">
			<div id="Vpais">Ver Paises</div>
			<div id="Vdpt">Ver Depart/Esta.</div>
			<div id="Vciud">Ver Ciudades</div>
		</article>
		<article id="verdatos">
			<div id="menssectorB"></div>
			<?php
				$tamno_pagina=25;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT depart_ciudad.id_depart_ciud,depart_ciudad.Dpart_id,depart_ciudad.ciudad_id,
					departamento.id_depart,departamento.nam_depart,
					ciudad.id_ciudad,ciudad.nam_ciudad 
					from depart_ciudad 
						inner join departamento on(depart_ciudad.Dpart_id=departamento.id_depart) 
						inner join ciudad on(depart_ciudad.ciudad_id=ciudad.id_ciudad) 
					where depart_ciudad.Dpart_id='$idRPT' 
					order by ciudad.nam_ciudad asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);

				$mysqlver="SELECT depart_ciudad.id_depart_ciud,depart_ciudad.Dpart_id,depart_ciudad.ciudad_id,
					departamento.id_depart,departamento.nam_depart,
					ciudad.id_ciudad,ciudad.nam_ciudad 
					from depart_ciudad 
						inner join departamento on(depart_ciudad.Dpart_id=departamento.id_depart) 
						inner join ciudad on(depart_ciudad.ciudad_id=ciudad.id_ciudad) 
					where depart_ciudad.Dpart_id='$idRPT' 
					order by ciudad.nam_ciudad asc limit $inicio, $tamno_pagina";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($RRPD=mysql_fetch_array($sql)) {
					$idRel_D_C=$RRPD['id_depart_ciud'];
					$idRel_D=$RRPD['Dpart_id'];
					$idRel_C=$RRPD['ciudad_id'];
			?>
			<article id="cajP_<?php echo $idP ?>" class="disediver">
				<div>
					<input type="text" id="nampais" value="<?php echo $namepaisver ?>" required="requried" disabled="disabled" />
				</div>
				<div class="vierelacion">
					<select id="seliCiud_<?php echo $idRel_D_C ?>">
						<?php
							$ciudO="SELECT * from ciudad order by nam_ciudad asc";
							$sqcO=mysql_query($ciudO,$conexion) or die (mysql_error());
							while ($reCO=mysql_fetch_array($sqcO)) {
								$idCO=$reCO['id_ciudad'];
								$namCO=$reCO['nam_ciudad'];
								if ($idCO==$idRel_C) {
									$sol="selected";
								}
								else{
									$sol="";
								}
						?>
						<option value="<?php echo $idCO ?>" <?php echo $sol ?>> <?php echo "$namCO"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div id="averl" class="modficrSliB" data-id="<?php echo $idRel_D_C ?>" data-depart="<?php echo $idRPT ?>">Modificar</div>
				<div id="averl"><a href="QuitarRelacionDepartCiudad.php?idRela=<?php echo $idRel_D_C ?>" class="deli">Borrar</a></div>
			</article>
			<?php
				}
			?>
		</article>
		<br />
			<b>Paginas: </b>
			<?php
			//muestro los distintos indices de las paginas
			if ($total_paginas>1) {
				for ($i=1; $i <=$total_paginas ; $i++) { 
					if ($pagina==$i) {
						//si muestro el indice del la pagina actual, no coloco enlace
			?>
				<b style="color:#00A5D4;"><?php echo $pagina." "; ?></b>
			<?php
					}
					else{
						//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
			?>
						<a href="relacionSeliB.php?IdDepart=<?php echo $idRPT ?>&pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

			<?php
					}
				}
			}
			?>
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
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>