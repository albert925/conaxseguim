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
	<script src="../../js/ingresoplanes.js"></script>
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
							<li><a href="../../administrador/planes" class="selecionado">Planes</a></li>
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
		<h1>Planes</h1>
		<article id="menub">
			<div id="Apl">Agregar Plan</div>
			<div id="Vpl">Ver Planes</div>
		</article>
		<article id="verdatos">
			<div id="mensplanesv"></div>
			<?php
				$tamno_pagina=20;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from planes order by id_plan asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);

				$mysqlver="SELECT * from planes order by id_plan asc limit $inicio, $tamno_pagina";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$idplan=$ps['id_plan'];
					$nampl=$ps['nombre_plan'];
					$esppl=$ps['espacio_plan'];
					$transpl=$ps['transferencia_plan'];
					$corrpl=$ps['cuentas_correo'];
					$precpl=$ps['precio_plan'];
					$precdrpl=$ps['precio_direcion'];
					$iuspl=$ps['insumos_pl'];
					$idprovvpl=$ps['proveedor_idpl'];
			?>
			<article id="cajP_<?php echo $idplan ?>" class="disediver">
				<div>
					<input type="text" id="name_<?php echo $idplan ?>" value="<?php echo $nampl ?>" placeholder="Nombre Direcionador" />
				</div>
				<div>
					<input type="text" id="epc_<?php echo $idplan ?>" value="<?php echo $esppl ?>" placeholder="Espacio del plan" />
				</div>
				<div>
					<input type="text" id="trans_<?php echo $idplan ?>" value="<?php echo $transpl ?>" placeholder="Transferencia del plan" />
				</div>
				<div>
					<input type="text" id="corrcnt_<?php echo $idplan ?>" value="<?php echo $corrpl ?>" placeholder="Cuentas de correo" />
				</div>
				<div>
					<input type="number" id="precf_<?php echo $idplan ?>" value="<?php echo $precpl ?>" placeholder="Precio del plan" required="required" />
				</div>
				<div>
					<input type="number" id="precdrf_<?php echo $idplan ?>" value="<?php echo $precdrpl ?>" placeholder="Precion direcionador" />
				</div>
			</article>
			<article id="cajP_<?php echo $idplan ?>" class="disediver">
				<div>
					<input type="number" id="insuf_<?php echo $idplan ?>" value="<?php echo $iuspl ?>" placeholder="Insumos" />
				</div>
				<div>
					<select id="proveedorFF_<?php echo $idplan ?>">
						<option value="0">Proveedor</option>
						<?php
							$prove="SELECT * from proveedores order by name_prove asc";
							$sqlprove=mysql_query($prove,$conexion) or die (mysql_error());
							while ($pv=mysql_fetch_array($sqlprove)) {
								$idPV=$pv['id_proveedor'];
								$naPV=$pv['name_prove'];
								if ($idPV==$idprovvpl) {
									$sip="selected";
								}
								else{
									$sip="";
								}
						?>
						<option value="<?php echo $idPV ?>" <?php echo $sip ?>><?php echo "$naPV"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</article>
			<article id="cajP_<?php echo $idplan ?>" class="disediver">
				<div id="averl" class="modfiplanes" data-id="<?php echo $idplan ?>">Modificar</div>
				<div id="averl">
					<a href="borrarplanes.php?idclE=<?php echo $idplan ?>" class="deli">Borrar</a>
				</div>
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
						<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

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