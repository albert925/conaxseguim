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
	<script src="../../js/ingresoclientes.js"></script>
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
							<li><a href="../../administrador/clientes" class="selecionado">Clientes</a></li>
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
		<h1>Clientes</h1>
		<article id="menub">
			<div id="Acl">Agregar Cliente</div>
			<div id="Aemp">Agregar Empresa</div>
			<div id="Vcl">Ver Clientes</div>
			<div id="Vempr">Ver Empresas</div>
			<div id="Vsgu">Ver Seguimiento</div>
			<div id="Buscl">Busqueda Clientes</div>
		</article>
		<article id="verdatos">
			<div id="mensclientesr"></div>
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
				$ssql="SELECT * from clientes order by nombre_us";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);

				$mysqlver="SELECT * from clientes order by nombre_us limit $inicio, $tamno_pagina";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$idcl=$ps['id_usuario'];
					$namcl=$ps['nombre_us'];
					$apelcl=$ps['apellido_us'];
					$corcl=$ps['correo_us'];
					$telcl=$ps['telefono_us'];
					$dcl=$ps['diaNcl'];
					$mcl=$ps['mesNcl'];
			?>
			<article id="cajP_<?php echo $idcl ?>" class="disediver">
				<div>
					<input type="text" id="name_<?php echo $idcl ?>" value="<?php echo $namcl ?>" placeholder="Nombre" />
				</div>
				<div>
					<input type="text" id="apel_<?php echo $idcl ?>" value="<?php echo $apelcl ?>" placeholder="Apelldio" />	
				</div>
				<div>
					<input type="email" id="cor_<?php echo $idcl ?>" value="<?php echo $corcl ?>" placeholder="correo@dominio.com" />
				</div>
				<div>
					<input type="tel" id="tel_<?php echo $idcl ?>" value="<?php echo $telcl ?>" placeholder="teléfono" />
				</div>
			</article>
			<article class="disediver">
				<div>
					<select id="fdn_<?php echo $idcl ?>" name="fdFB">
						<option value="0">Dia Nacimiento</option>
						<?php
						for ($s=1; $s <=31 ; $s++) { 
							if ($s==$dcl) {
								$md="selected";
							}
							else{
								$md="";
							}
						?>
						<option value="<?php echo $s ?>" <?php echo $md ?>><?php echo "$s"; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div>
					<select name="fmesFB" id="fmesn_<?php echo $idcl ?>">
						<?php
							for ($ffm=0; $ffm <=12 ; $ffm++) { 
								if ($ffm==$mcl) {
									$mm="selected";
								}
								else{
									$mm="";
								}
								switch ($ffm) {
									case '0':
										$plames="Mes Nacimiento";
										break;
									case '1':
										$plames="Enero";
										break;
									case '2':
										$plames="Febrero";
										break;
									case '3':
										$plames="Marzo";
										break;
									case '4':
										$plames="Abril";
										break;
									case '5':
										$plames="Mayo";
										break;
									case '6':
										$plames="Junio";
										break;
									case '7':
										$plames="Julio";
										break;
									case '8':
										$plames="Agosto";
										break;
									case '9':
										$plames="Septiembre";
										break;
									case '10':
										$plames="Octubre";
										break;
									case '11':
										$plames="Noviembre";
										break;
									case '12':
										$plames="Diciembre";
										break;
									default:
										$plames="Error";
										break;
								}
						?>
						<option value="<?php echo $ffm ?>" <?php echo $mm ?>><?php echo "$plames"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</article>
			<article id="cajP_<?php echo $idcl ?>" class="disediver">
				<div id="averl" class="vierelacion">
					<a href="relacionempre.php?idUS=<?php echo $idcl ?>">Ver Empresa</a>
				</div>
				<div id="averl" class="modficlicent" data-id="<?php echo $idcl ?>">Modificar</div>
				<div id="averl"><a href="borrarcliente.php?idclE=<?php echo $idcl ?>" class="deli">Borrar</a></div>
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