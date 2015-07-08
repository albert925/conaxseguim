<?php
	include '../../config.php';
	$a=$_POST['a'];//mes
	$b=$_POST['b'];//año
	switch ($a) {
		case '0':
			$aa="1";
			break;
		case '':
			$aa="1";
			break;
		default:
			$aa="mes_in='$a'";
			break;
	}
	switch ($b) {
		case '0':
			$bb="";
			break;
		case '':
			$bb="";
			break;
		default:
			$bb="and year_in='$b'";
			break;
	}
?>
<script src="../../js/jquery_2_1_1.js"></script>
<script src="../../js/scripamd.js"></script>
<script src="../../js/ingreingresos.js"></script>
<table border="1" id="segitable" title="la Tabla No es adaptable">
	<tr>
		<td><b>Año</b></td>
		<td><b>Mes</b></td>
		<td><b>Caja</b></td>
	</tr>
	<?php
		$suma=0;
		$cajasql="SELECT * from seguimiento where $aa $bb 
		order by year_in,mes_in asc";
		$ensqlcaja=mysql_query($cajasql,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($ensqlcaja);
		if ($numero>0) {
		while ($cajis=mysql_fetch_array($ensqlcaja)) {
			$idS=$cajis['id_seguimineto'];
			$cajaS=$cajis['en_caja'];
			$mesS=$cajis['mes_in'];
			$yearS=$cajis['year_in'];
			switch ($mesS) {
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
					$nombmes="Error";
					break;
			}
			$suma=$cajaS+$suma;
	?>
	<tr>
		<td><?php echo "$yearS"; ?></td>
		<td><?php echo "$nombmes"; ?></td>
		<td>$<?php echo "$suma"; ?></td>
	</tr>
	<?php
		}
	?>
	<tr id="titol">
		<td colspan="2"></td>
		<td><b>$<?php echo "$suma"; ?></b></td>
	</tr>
	<?php
		}
		else{
			echo "<tr><td colspan='3'>Sin resultados</td></tr>";
		}
	?>
</table>