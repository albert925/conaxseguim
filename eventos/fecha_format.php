<?php
function fechatraducearray($fecha)
{
  $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo
  $diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo
  $arrSemana=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
  $DS=$arrSemana[$diasemana];
  $dia=date("d",$fecha); // día del mes en número
  $mes=date("n",$fecha); // número del mes de 1 a 12
  $arrMese=["Meses",
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Dic"];
  $MS=$arrMese[$mes];
  $ano=date("Y",$fecha); // optenemos el año en formato 4 digitos
  //$fecha= $DS.", ".$dia." de ".$MS." de ".$ano; // unimos el resultado en una unica cadena
  $fecha=$dia."-".$MS."-".$ano;
  return $fecha; //enviamos la fecha al programa
}
?>