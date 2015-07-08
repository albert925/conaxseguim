<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['evetid'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmv']['name'];
		$tipfotA=$_FILES['gmv']['type'];
	 	$almfotA=$_FILES['gmv']['tmp_name'];
	 	$tamfotA=$_FILES['gmv']['size'];
	 	$erorfotA=$_FILES['gmv']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/eventos/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen ya tiene el mismo nombre";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$ddf="INSERT into imagenes_event(rut_ev,evet_id) values('$ruta',$idR)";
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