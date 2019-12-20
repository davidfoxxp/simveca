<?php

include "../conexionesbd/conexion_mysql.php";

$ano = $_POST['ano'];

/*$queryM = "SELECT DISTINCT(tea.idTEstadoActual) num, tea.EstadoActual
            FROM dim_cposterior f
            left join tipoestadoactual tea on f.idTEstadoActual=tea.idTEstadoActual
            left join dim_aseguradoindevido ai on f.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
            where not tea.idTEstadoActual='4' and  substr(f.fCreacion,1,4)='$ano' and
            tea.idTEstadoActual order by tea.idTEstadoActual asc";*/

$queryM= "SELECT DISTINCT(tea.idTEstadoActual) num, tea.EstadoActual
            FROM dim_verificacion f
            left join tipoestadoactual tea on f.idTEstadoActual=tea.idTEstadoActual
            left join dim_aseguradoindevido ai on f.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
            where not tea.idTEstadoActual in ('1','5') and  substr(f.fCreacion,1,4)='$ano' and
            tea.idTEstadoActual order by tea.idTEstadoActual asc";


$resultadoM = $conexionmysql->query($queryM);

$html = "<option value=''>TIPO</option>";

while ($rowM = $resultadoM->fetch_assoc()) {
    $html.= "<option value='" . $rowM['num'] . "'>" . $rowM['EstadoActual'] . "</option>";
}

echo $html;
?>