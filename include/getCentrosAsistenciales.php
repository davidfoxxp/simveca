<?php

include "../conexionesbd/conexion_mysql.php";

$id_estado = $_POST['codTCentroAtencion'];
	
	$queryM = "SELECT a.cas, a.centroA FROM tipocentroatencion a where a.codTCentroAtencion='$id_estado'";
	$resultadoM = $conexionmysql->query($queryM);
	
	$html= "<option value=''>Seleccionar Centro Atencion</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['cas']."'>".$rowM['centroA']."</option>";
	}
	
	echo $html;
?>