  
<?php

$q = $_GET['q'];
include './conexionesbd/conexion_oracle.php';
$queryR = oci_parse($conexionora, "select * from DIM_CSAMRENIEC t where t.ide_dni='$q'");

oci_execute($queryR);

if (oci_fetch_array($queryR, OCI_NUM + OCI_RETURN_NULLS) > 0) {
    echo "1";
} else {
echo "0";
}
?>

