<?php

include "../conexionesbd/conexion_mysql.php";

$iddim_Verificadores1 = $_POST['iddim_Verificadores'];
	
	$query2 = "SELECT dv.idDIM_Oficina, dv.iddim_Verificadores, dv.nomyApellidos, dv.dni FROM dim_verificadores dv where dv.idDIM_Oficina='$idOficinaUsuario' and (not iddim_Verificadores in ('$iddim_Verificadores1', '', '', '')) ";
	$resultadoM = $conexionmysql->query($queryM);
	
	$html= "<option value=''>Seleccionar Centro Atencion</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['cas']."'>".$rowM['centroA']."</option>";
	}
	
	echo $html;
        
        
        
        
        
?>