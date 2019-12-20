<?php //
//$ora_user = "Gaaa";
//$ora_senha = "Gaaa_16";
//
//$ora_bd = "  
//  (DESCRIPTION =
//    (ADDRESS = (PROTOCOL = TCP)(HOST = 10.0.0.49)(PORT = 1521))
//    (CONNECT_DATA =
//      (SERVER = DEDICATED)
//      (SERVICE_NAME = sas)
//    )
//  )";
//
//if($conexionora = oci_connect($ora_user, $ora_senha, $ora_bd)) {
//	echo "";
//}

?>

<?php
$ora_user = "C##VERIFICACION";
$ora_senha = "091004df"; //123456789Df__Df

$ora_bd = "
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 191.0.140.180)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = BBDDORL)
    )
  )";

if($conexionora = oci_connect($ora_user, $ora_senha, $ora_bd,'AL32UTF8')) {
	echo "";
}

?>