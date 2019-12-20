<?php

include "../conexionesbd/conexion_mysql.php";

$oficina = $_POST['oficina'];	     
     	
	$queryN = "SELECT distinct(substr(f.femisionBRegistro,1,4)) ano FROM dim_cposterior f where NOT f.femisionBRegistro  IS NULL GROUP BY f.femisionBRegistro DESC";
        
       // $queryN = "SELECT O.idDIM_Oficina FROM dim_oficina O";
        
	$resultadoN = $conexionmysql->query($queryN);
	
	$html= "<option value=''>AÑO</option>";
	
	while($rowN = $resultadoN->fetch_assoc())
	{
		$html.= "<option value='".$rowN['ano']."'>".$rowN['ano']."</option>";
	}
	
	echo $html;
?>