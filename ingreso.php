<?php

include '../SISGASV/conexionesbd/conexion_mysql.php';

$conexionmysql = oci_logon($usuario, $password);

if(!$conexion) {
    echo "Conexion es invalida".var_dump(oci_error());
    die();
}

$var1 = $_POST["usuario"];
$var2 = $_POST["password"];

$sql = oci_parse($conexionmysql, "SELECT u.iddim_usuario, u.idtperfiles FROM DIM_USUARIO u where u.login='$usuario' and u.pass='$password' and u.estado='1'");
$result = oci_execute($sql);

//while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {