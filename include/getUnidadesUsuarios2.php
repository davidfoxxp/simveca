<?php

include "../conexionesbd/conexion_mysql.php";

$oficina = $_POST['oficina'];	     
     	
	$queryN = "SELECT O.idDIM_Oficina, concat(O.nomenclatura, ' - ', O.oficina) OficinaA FROM dim_oficina_2 O
                where (not O.tipoOficina='0') AND O.oficina='$oficina'
                order by O.tipoOficina asc";
        
       // $queryN = "SELECT O.idDIM_Oficina FROM dim_oficina O";
        
	$resultadoN = $conexionmysql->query($queryN);
	
	$html= "<option value=".'1'.','.'2'.','.'3'.','.'4'.','.'6'.','.'7'.','.'8'.','.'10'.','.'11'.','.'12'.
                ','.'14'.','.'15'.','.'16'.','.'17'.','.'19'.','.'20'.','.'21'.','.'22'.','.'23'.','.'25'.
                ','.'26'.','.'27'.','.'28'.','.'29'.','.'30'.','.'31'.','.'32'.','.'33'.','.'34'.','.'35'.
                ','.'36'.','.'37'.','.'39'.','.'40'.','.'42'.','.'43'.','.'44'.','.'45'.','.'46'.','.'47'.
                ','.'48'.','.'50'.','.'51'.','.'52'.','.'53'.','.'54'.">TODOS</option>";
	while($rowN = $resultadoN->fetch_assoc())
	{
		$html.= "<option value='".$rowN['idDIM_Oficina']."'>".$rowN['OficinaA']."</option>";
	}
	
	echo $html;
?>