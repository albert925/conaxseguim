<?php
	include '../../config.php';
	$a=$_POST['Ta'];//id Seguimiento
	$b=$_POST['Tb'];//responsable
	$c=$_POST['Tc'];//Tarea
	$d=$_POST['Td'];//Dia inicio
	$e=$_POST['Te'];//Mes inicio
	$f=$_POST['Tf'];//Año inicio
	$g=$_POST['Tg'];//Dia fin
	$h=$_POST['Th'];//Mes fin
	$i=$_POST['Ti'];//año fin
	$j=$_POST['Tj'];//Fecha inicio
	$k=$_POST['Tk'];//Fecha Fin
	$l=$_POST['Tl'];//descripcion
	$m=$_POST['Tm'];//Area
	$hoy=date("Y-m-d");
	$fecha_inicio=$f."-".$e."-".$d;
	$fecha_fin=$i."-".$h."-".$g;
	if ($a=="0" || $a=="" || $b=="0" || $b=="" || $c=="") {
		echo "1";
	}
	else{
		if ($b=="9" || $m=="") {
			$existe_tarea_dia="SELECT * from tareas where admin_id=$b and fechain_tar='$j'";
			$sql_existe=mysql_query($existe_tarea_dia,$conexion) or die (mysql_error());
			$numexiste=mysql_num_rows($sql_existe);
			if ($numexiste>0) {
				echo "Ya tiene una tarea para ese dia (Sumar 5 dias para que pueda ingresar)";//5
			}
			else{
				$ingresar="INSERT into tareas(segui_id,admin_id,tare_nam,DI,MI,AI,fechain_tar,DF,MF,AF,fechafin_tar,esta_tar,descrip_tarea,area_tarea,fecha_ing) 
					values('$a','$b','$c','$d','$e','$f','$j','$g','$h','$i','$k','1','$l','$m','$hoy')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				$busquedacorres="SELECT * from administrador where id_admin='$b'";
				$rag=mysql_query($busquedacorres,$conexion) or die (mysql_error());
				while ($usm=mysql_fetch_array($rag)) {
					$nombreus=$usm['usuadmin'];
					$correous=$usm['correo_adm'];
				}
				include '../../miler/class.phpmailer.php';
				$mail=new PHPMailer();
				$body="<header>
							<figure>
								<img src='http://conaxport.com/seguimiento/imagenes/banner.png' alt='logo' width='100%' />
							</figure>
							<h1>Nueva Tarea</h1>
						</header>
						<section style='background: url(http://conaxport.com/seguimiento/imagenes/fonodo.jpg) repeat left top scroll;
							color: #F7F7F7;
							font-family: 'Cabin', sans-serif;
							font-size: 16px;'>
						<article>
							<p>
								Hola $nombreus le han asignado una nueva Tarea <b>$c</b> desde de la fecha $fecha_inicio 
								hasta la fecha $fecha_fin, ingresando la siguiente pagina:
							</p>
							<p> 
								<a href='http://conaxport.com/seguimiento/' target='_blank' 
								style='background:#00A5D4;color: #F7F7F7;padding: 0.5em 1em;text-decoration: underline;'>
									Pagina Conaxport
								</a>
							</p>
						</article>
					</section>
					<footer style='text-align: center;'>
						<p>
							<b>Contáctenos</b><br/>
							<b>Teléfono:</b> +57 -7  5947018<br/>
							<b>Móvil:</b>  +57  316 617 5099<br/>
											+ 57 320 375 4229<br/>
							contacto@conaxport.com<br/>
							Av 11 # 16-14 b. Libertad<br/>
							Cúcuta - Colombia
						</p>
					</footer>";
				$mail->SetFrom('contacto@conaxport.com','Conaxport');
				$mail->From = "contacto@conaxport.com";
				$mail->FromName = "Conaxport";
				$mail->AddReplyTo('contacto@conaxport.com','Conaxport');
				$address="$correous";
				$mail->AddAddress($address, "$nombreus");
				$mail->Subject = "Nueva Tarea";
				$mail->AltBody = "Cuerpo alternativo del mensaje";
				$mail->MsgHTML($body);
				if(!$mail->Send()) {
					echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
				} 
				else {
					echo "2";
				}
			}
		}
		else{
			$ingresar="INSERT into tareas(segui_id,admin_id,tare_nam,DI,MI,AI,fechain_tar,DF,MF,AF,fechafin_tar,esta_tar,descrip_tarea,area_tarea,fecha_ing) 
				values('$a','$b','$c','$d','$e','$f','$j','$g','$h','$i','$k','1','$l','$m','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			$busquedacorres="SELECT * from administrador where id_admin='$b'";
			$rag=mysql_query($busquedacorres,$conexion) or die (mysql_error());
			while ($usm=mysql_fetch_array($rag)) {
				$nombreus=$usm['usuadmin'];
				$correous=$usm['correo_adm'];
			}
			include '../../miler/class.phpmailer.php';
			$mail=new PHPMailer();
			$body="<header>
						<figure>
							<img src='http://conaxport.com/seguimiento/imagenes/banner.png' alt='logo' width='100%' />
						</figure>
						<h1>Nueva Tarea</h1>
					</header>
					<section style='background: url(http://conaxport.com/seguimiento/imagenes/fonodo.jpg) repeat left top scroll;
						color: #F7F7F7;
						font-family: 'Cabin', sans-serif;
						font-size: 16px;'>
					<article>
						<p>
							Hola $nombreus le han asignado una nueva Tarea <b>$c</b> desde de la fecha $j 
							hasta la fecha $k, ingresando la siguiente pagina:
						</p>
						<p> 
							<a href='http://conaxport.com/seguimiento/' target='_blank' 
							style='background:#00A5D4;color: #F7F7F7;padding: 0.5em 1em;text-decoration: underline;'>
								Pagina Conaxport
							</a>
						</p>
					</article>
				</section>
				<footer style='text-align: center;'>
					<p>
						<b>Contáctenos</b><br/>
						<b>Teléfono:</b> +57 -7  5947018<br/>
						<b>Móvil:</b>  +57  316 617 5099<br/>
										+ 57 320 375 4229<br/>
						contacto@conaxport.com<br/>
						Av 11 # 16-14 b. Libertad<br/>
						Cúcuta - Colombia
					</p>
				</footer>";
			$mail->SetFrom('contacto@conaxport.com','Conaxport');
			$mail->From = "contacto@conaxport.com";
			$mail->FromName = "Conaxport";
			$mail->AddReplyTo('contacto@conaxport.com','Conaxport');
			$address="$correous";
			$mail->AddAddress($address, "$nombreus");
			$mail->Subject = "Nueva Tarea";
			$mail->AltBody = "Cuerpo alternativo del mensaje";
			$mail->MsgHTML($body);
			if(!$mail->Send()) {
				echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
			} 
			else {
				echo "2";
			}
		}
	}
?>