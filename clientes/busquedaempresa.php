<?php
	include '../config.php';
	$empreR=$_POST['de'];
	$Admnin=$_POST['df'];
	if ($empreR=="") {
		echo "";
	}
	else{
		$busqueda="SELECT * from empresas where name_empr like '$empreR%'";
		$sql_busqueda=mysql_query($busqueda,$conexion) or die (mysql_error());
		while ($cak=mysql_fetch_array($sql_busqueda)) {
			$idemp=$cak['id_empresa'];
			$namemp=$cak['name_empr'];
?>
<a href="ind2x.php?EMP=<?php echo $idemp ?>&adm=<?php echo $Admnin ?>"><?php echo "$namemp"; ?></a>
<?php
		}
	}
?>