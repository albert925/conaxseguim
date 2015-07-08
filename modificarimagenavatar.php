<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idusuarior=$_POST['idadminF'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['iamavatar']['name'];
		$tipfotA=$_FILES['iamavatar']['type'];
	 	$almfotA=$_FILES['iamavatar']['tmp_name'];
	 	$tamfotA=$_FILES['iamavatar']['size'];
	 	$erorfotA=$_FILES['iamavatar']['error'];
		//----------------------------------------
		if ($idusuarior=="" || $fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/usuario/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "La Imagen ya esxiste es logico porque un imagen A y el imagen B no pueden tener la misma imagen
							y si son dos imagenes diferentes y tiene el mismo nombre lo que hace es reemplazar el archivo eso es logico tambien  
							es lo mismo cuando usted esta copiando un archivo de su pc de una carpeta  otra y entonces quedara la misma imagen del Porducto A como el imagen B";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						//MARCA DE AGUA
						/*$marcadeagua="imagenes/logo.png";
						$trozosimagenorig=explode(".",$ruta);
						$extensionimagenorig=$trozosimagenorig[count($trozosimagenorig)-1];
						if (preg_match("/jpg|jpeg|JPG|JPEG/", $extensionimagenorig)) {
							$imgm=imagecreatefromjpeg($ruta);
						}
						if (preg_match("/png|PNG/", $extensionimagenorig)) {
							$imgm=imagecreatefrompng($ruta);
						}
						if (preg_match("/gif|GIF/", $extensionimagenorig)) {
							$imgm=imagecreatefromgif($ruta);
						}
						//declaramos el fondo como transparente	
						//imagealphablending($ruta, true);
						//Creamos la imagen de la marca de agua
						$marcadeagua= imagecreatefrompng($marcadeagua);
						//hallamos las dimensiones de ambas imágnes para linearlas
						$xmarcaagua= imagesx($marcadeagua);
						$ymarcaagua= imagesy($marcadeagua);
						$ximagen= imagesx($imgm);
						$yimagen=imagesy($imgm);
						//Copiamos la marca de agua encima de la imagen (alineada abajo a la derecha)
						imagecopy($imgm, $marcadeagua, $ximagen-$xmarcaagua-20, $yimagen-$ymarcaagua-20,
						 0, 0, $xmarcaagua, $ymarcaagua);
						////Guardamos la imagen sustituyendo a la original, en este caso con calidad 100
						imagejpeg($imgm,$ruta,100);
						//Eliminamos de memoria las imágenes que habíamos creado
						imagedestroy($imgm);
						imagedestroy($marcadeagua);
						//MARCA DE AGUA----*/
						if ($subiendo) {
							/*$nueva_imagen= imagecreatetruecolor(865, 435); //Crea una nueva imagen en blanco 250x250
							$Origen= imagecreatefromjpeg($ruta);
							imagecopyresized($nueva_imagen, $Origen, 0, 0, 0, 0, 865, 435, $ancho, $alto);//Modifica la imagen y la agrga a la imagen
							imagejpeg($nueva_imagen, $ruta, 80); //reemplaza la imagen*/
							$ddf="UPDATE administrador set avatar_adm='$ruta' where id_admin='$idusuarior'";
							mysql_query($ddf,$conexion) or die (mysql_error());
							echo "5";
						}
						else{
							echo "4";
						}
					}
				}
				else{
					echo "3";
				}
			}
		}
	}
	else{
		echo "error";
	}
?>