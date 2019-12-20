<?php

include "../conexionesbd/conexion_mysql.php";

$tipoOficina = $_POST['tipoOficina'];

$queryM = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
                    where (not o.tipoOficina='0') AND O.tipoOficina='$tipoOficina' and O.nomenclatura='OSPE'
                    order by o.tipoOficina asc";
$resultadoM = $conexionmysql->query($queryM);

$html = "<option value=''>OSPES</option>";

while ($rowM = $resultadoM->fetch_assoc()) {
    $html.= "<option value='" . $rowM['oficina'] . "'>" . $rowM['oficina'] . "</option>";
}

echo $html;
?>