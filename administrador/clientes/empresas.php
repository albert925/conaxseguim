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
		<h1>Empresas</h1>
		<article id="menub">
			<div id="Acl">Agregar Cliente</div>
			<div id="Aemp">Agregar Empresa</div>
			<div id="Vcl">Ver Clientes</div>
			<div id="Vempr">Ver Empresas</div>
			<div id="Vsgu">Ver Seguimiento</div>
			<div id="Buscl">Busqueda Clientes</div>
		</article>
		<article id="verdatos">
			<div id="mensempresa"></div>
			<?php
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,
					empresas.direc_emp,empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
					clientes.nombre_us,pais.nam_pais,departamento.nam_depart,ciudad.nam_ciudad 
					from empresas 
						inner join clientes on(empresas.usuario_id=clientes.id_usuario) 
						inner join pais on(empresas.pais_emp=pais.id_pais) 
						inner join departamento on(empresas.depart_emp=departamento.id_depart) 
						inner join ciudad on(empresas.ciudad_emp=ciudad.id_ciudad) 
					order by empresas.name_empr asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);

				$mysqlver="SELECT empresas.id_empresa,empresas.usuario_id,empresas.name_empr,empresas.nit_emp,empresas.tel_emp,
					empresas.direc_emp,empresas.pais_emp,empresas.depart_emp,empresas.ciudad_emp,
					clientes.nombre_us,pais.nam_pais,departamento.nam_depart,ciudad.nam_ciudad 
					from empresas 
						inner join clientes on(empresas.usuario_id=clientes.id_usuario) 
						inner join pais on(empresas.pais_emp=pais.id_pais) 
						inner join departamento on(empresas.depart_emp=departamento.id_depart) 
						inner join ciudad on(empresas.ciudad_emp=ciudad.id_ciudad) 
					order by empresas.name_empr asc limit $inicio, $tamno_pagina";
				$sql=mysql_query($mysqlver,$conexion) or die (mysql_error());
				while ($ps=mysql_fetch_array($sql)) {
					$idemp=$ps['id_empresa'];
					$idclemp=$ps['usuario_id'];
					$clemp=$ps['nombre_us'];
					$namemp=$ps['name_empr'];
					$nitemp=$ps['nit_emp'];
					$drcemp=$ps['direc_emp'];
					$psemp=$ps['nam_pais'];
					$dpemp=$ps['nam_depart'];
					$cdemp=$ps['nam_ciudad'];
					$tlemp=$ps['tel_emp'];
			?>
			<h2 id="cetrhb"><?php echo "$namemp"; ?></h2>
			<article id="cajP_<?php echo $idemp ?>" class="disediver">
				<div>
					<select id="clients_<?php echo $idemp ?>">
						<?php
							$clientfff="SELECT * from clientes order by nombre_us asc";
							$sqlcliefff=mysql_query($clientfff,$conexion) or die (mysql_error());
							while ($ffclcl=mysql_fetch_array($sqlcliefff)) {
								$idclO=$ffclcl['id_usuario'];
								$nameclO=$ffclcl['nombre_us'];
								if ($idclO==$idclemp) {
									$af="selected";
								}
								else{
									$af="";
								}
						?>
						<option value="<?php echo $idclO ?>" <?php echo $af ?>><?php echo "$nameclO"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div>
					<input type="text" id="namEf_<?php echo $idemp ?>" value="<?php echo $namemp ?>" placeholder="Nombre Empresa" />	
				</div>
				<div>
					<input type="text" id="nitEf_<?php echo $idemp ?>" value="<?php echo $nitemp ?>" placeholder="Nit Empresa" />
				</div>
				<div>
					<input type="text" id="dirEf_<?php echo $idemp ?>" value="<?php echo $drcemp ?>" placeholder="Dirección Empresa" />
				</div>
				<div>
					<input type="tel" id="telemF_<?php echo $idemp ?>" value="<?php echo $tlemp ?>" placeholder="Teléfono" />
				</div>
			</article>
			<article id="cajP_<?php echo $idemp ?>" class="disediver">
				<div>
					<input type="text" name="pais" value="<?php echo $psemp ?>" disabled="disabled" />
				</div>
				<div>
					<input type="text" name="depart" value="<?php echo $dpemp ?>" disabled="disabled" />
				</div>
				<div>
					<input type="text" name="ciudad" value="<?php echo $cdemp ?>" disabled="disabled" />
				</div>
			</article>
			<article id="cajP_<?php echo $idemp ?>" class="disediver">
				<div id="averl"><a href="modifsectoresemrpesa.php?idEpmv=<?php echo $idemp ?>">Modificar Sector</a></div>
				<div id="averl" class="modfiempre" data-id="<?php echo $idemp ?>">Modificar</div>
				<div id="averl"><a href="borrarempresa.php?idempE=<?php echo $idemp ?>" class="deli">Borrar</a></div>
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
						<a href="empresas.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

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