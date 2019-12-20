<?php

include "../conexionesbd/conexion_mysql.php";

$idTVerificacion = $_POST['idTVerificacion'];
	
	$queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                   FROM sisgasv.tipoverificacionperfil b 
                   where b.idTVerificacion='$idTVerificacion'
                   AND NOT b.idTVerificacionPerfil in ('1', '2', '3', '4', '5')";
	$resultadoM = $conexionmysql->query($queryM);
	
	$html= "<option value=''>Seleccionar Tipo de Perfil</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idTVerificacionPerfil']."'>".$rowM['VerificacionPerfil']."</option>";
	}
	
	echo $html;
?>