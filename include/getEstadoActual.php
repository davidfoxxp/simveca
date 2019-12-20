<?php

include "../conexionesbd/conexion_mysql.php";

$tipoOficina = $_POST['tipoOficina'];
$oficina = $_POST['oficina'];	     
     	
	$queryN = "SELECT O.idDIM_Oficina, concat(O.nomenclatura, ' - ', O.oficina) OficinaA FROM dim_oficina O
                where (not O.tipoOficina='0') AND O.oficina='$oficina' and O.idTperfiles in ('1', '2', '9')
                order by O.tipoOficina asc";
        
       // $queryN = "SELECT O.idDIM_Oficina FROM dim_oficina O";
        
	$resultadoN = $conexionmysql->query($queryN);
	
	$html= "<option value=''>ESTADO</option>";
	
	while($rowN = $resultadoN->fetch_assoc())
	{
		$html.= "<option value='".$rowN['idDIM_Oficina']."'>".$rowN['OficinaA']."</option>";
	}
	
	echo $html;
?>