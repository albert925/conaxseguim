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
		<h1>Relación Departamento/Estado a Ciudad</h1>
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
			<select id="DeparRA">
				<option value="0">Departamentos / Estados</option>
				<?php
					$mrDp="SELECT * from departamento order by nam_depart asc";
					$sqlD=mysql_query($mrDp,$conexion) or die (mysql_error());
					while ($rdA=mysql_fetch_array($sqlD)) {
						$idDR=$rdA['id_depart'];
						$namDR=$rdA['nam_depart'];
				?>
				<option value="<?php echo $idDR ?>"><?php echo "$namDR"; ?></option>
				<?php
					}
				?>
			</select>
			<h4>Departamentos / Estados</h4>
			<article class="estrelaicon">
				<?php
					$mrCp="SELECT * from ciudad order by nam_ciudad asc";
					$sqlC=mysql_query($mrCp,$conexion) or die (mysql_error());
					while ($rcA=mysql_fetch_array($sqlC)) {
						$idCR=$rcA['id_ciudad'];
						$namCR=$rcA['nam_ciudad'];
				?>
					<input type="checkbox" class="prc" name="cmn" value="<?php echo $idCR ?>"
						data-id="<?php echo $idCR ?>" /><label><?php echo "$namCR"; ?></label>
				<?php
					}
				?>
			</article>
			<div id="mensajerelacionB"></div>
			<input type="submit" value="Ingresar relación" id="ingrerelDsCt" class="botonstyle" />
		</article>
		<div id="mesaRDCT"></div>
		<article id="verrelaciones">
			<?php
				$tamno_pagina=30;
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
					order by departamento.nam_depart asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);

				$relacionverPD="SELECT depart_ciudad.id_depart_ciud,depart_ciudad.Dpart_id,depart_ciudad.ciudad_id,
					departamento.id_depart,departamento.nam_depart,
					ciudad.id_ciudad,ciudad.nam_ciudad 
					from depart_ciudad 
						inner join departamento on(depart_ciudad.Dpart_id=departamento.id_depart) 
						inner join ciudad on(depart_ciudad.ciudad_id=ciudad.id_ciudad) 
					order by departamento.nam_depart asc limit $inicio, $tamno_pagina";
				$sqlRl=mysql_query($relacionverPD,$conexion) or die (mysql_error());
				while ($RRPD=mysql_fetch_array($sqlRl)) {
					$idRel_D_C=$RRPD['id_depart_ciud'];
					$idRel_D=$RRPD['Dpart_id'];
					$idRel_C=$RRPD['ciudad_id'];
			?>
			<article class="disediver">
				<div>
					<select id="selDs_<?php echo $idRel_D_C ?>">
						<?php
							$deparO="SELECT * from departamento order by nam_depart asc";
							$sqlO=mysql_query($deparO,$conexion) or die (mysql_error());
							while ($reO=mysql_fetch_array($sqlO)) {
								$idDO=$reO['id_depart'];
								$namDO=$reO['nam_depart'];
								if ($idDO==$idRel_D) {
									$selitA="selected";
								}
								else{
									$selitA="";
								}
						?>
						<option value="<?php echo $idDO ?>" <?php echo $selitA ?>><?php echo "$namDO"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div>
					<select id="selCiud_<?php echo $idRel_D_C ?>">
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
				<div id="averl" class="modifrelCD" data-id="<?php echo $idRel_D_C ?>">Modificar</div>
				<div id="averl"><a href="QuitarRelacionDepartCiudad.php?idRela=<?php echo $idRel_D_C ?>" class="deli">Quitar</a></div>
			</article>
			<?php
				}
			?>
		</article>
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
						<a class="paginasinl" href="recionpaisdepart.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

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
	else{
		echo "<script>";
			echo "var pag='../../erroadm.html';";
			echo "document.location.href=pag;";
		echo "</script>";
	}
?>