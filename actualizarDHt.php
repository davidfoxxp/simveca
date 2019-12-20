<?php

include ('../SISGASV/conexionesbd/conexion_mysql.php');
if (isset($_POST['registrar'])) {
    
    
$iddim = $_POST['iddim_usuario'];
$iddim_usuario = "'$iddim'";

$iddim_aseguradoindevidoo = $_POST['iddim_aseguradoindevido'];
$iddim_aseguradoindevido = "'$iddim_aseguradoindevidoo'";

date_default_timezone_set('America/Bogota');
$fecha_hora_updateo = date('Y-m-d G:i:s');
$fecha_hora_update = "'$fecha_hora_updateo'";

    
if(isset($_POST['seleccion'])){
$array = $_POST['seleccion'];

if(empty($array[1])){
$array[1] = NULL;
}
if(empty($array[2])){
$array[2] = NULL;
}
if(empty($array[3])){
$array[3] = NULL;
}
if(empty($array[4])){
$array[4] = NULL;
}
if(empty($array[5])){
$array[5] = NULL;
}
if(empty($array[6])){
$array[6] = NULL;
}
if(empty($array[7])){
$array[7] = NULL;
}
if(empty($array[8])){
$array[8] = NULL;
}
if(empty($array[9])){
$array[9] = NULL;
}

$array2 = $array[0]. ',' .$array[1]. ',' .$array[2]. ',' .$array[3]. ',' .$array[4]. ',' .$array[5]. ',' .$array[6]. ',' .$array[7]. ',' .$array[8]. ',' .$array[9];
$derecho = explode(",", $array2);

///DH1
if(empty($derecho[0])){
$derecho[0] = null;
}
if(empty($derecho[1])){
$derecho[1] = null;
}
if(empty($derecho[2])){
$derecho[2] = null;
}
///DH2
if(empty($derecho[3])){
$derecho[3] = NULL;
}
if(empty($derecho[4])){
$derecho[4] = NULL;
}
if(empty($derecho[5])){
$derecho[5] = null;
}
///DH3
if(empty($derecho[6])){
$derecho[6] = null;
}
if(empty($derecho[7])){
$derecho[7] = null;
}
if(empty($derecho[8])){
$derecho[8] = null;
}
///DH4
if(empty($derecho[9])){
$derecho[9] = null;
}
if(empty($derecho[10])){
$derecho[10] = null;
}
if(empty($derecho[11])){
$derecho[11] = null;
}
///DH5
if(empty($derecho[12])){
$derecho[12] = null;
}
if(empty($derecho[13])){
$derecho[13] = null;
}
if(empty($derecho[14])){
$derecho[14] = null;
}
///DH6
if(empty($derecho[15])){
$derecho[15] = null;
}
if(empty($derecho[16])){
$derecho[16] = null;
}
if(empty($derecho[17])){
$derecho[17] = null;
}
///DH7
if(empty($derecho[18])){
$derecho[18] = null;
}
if(empty($derecho[19])){
$derecho[19] = null;
}
if(empty($derecho[20])){
$derecho[20] = null;
}
///DH8
if(empty($derecho[21])){
$derecho[21] = null;
}
if(empty($derecho[22])){
$derecho[22] = null;
}
if(empty($derecho[23])){
$derecho[23] = null;
}
///DH9
if(empty($derecho[24])){
$derecho[24] = null;
}
if(empty($derecho[25])){
$derecho[25] = null;
}
if(empty($derecho[26])){
$derecho[26] = null;
}


$vinculoauto0 = $derecho[0];
$dniauto0 = $derecho[1];
$nombreauto0 = $derecho[2];

$vinculoauto1 = $derecho[3];
$dniauto1 = $derecho[4];
$nombreauto1 = $derecho[5];

$vinculoauto2 = $derecho[6];
$dniauto2 = $derecho[7];
$nombreauto2 = $derecho[8];

$vinculoauto3 = $derecho[9];
$dniauto3 = $derecho[10];
$nombreauto3 = $derecho[11];

$vinculoauto4 = $derecho[12];
$dniauto4 = $derecho[13];
$nombreauto4 = $derecho[14];

$vinculoauto5 = $derecho[15];
$dniauto5 = $derecho[16];
$nombreauto5 = $derecho[17];

$vinculoauto6 = $derecho[18];
$dniauto6 = $derecho[19];
$nombreauto6 = $derecho[20];

$vinculoauto7 = $derecho[21];
$dniauto7 = $derecho[22];
$nombreauto7 = $derecho[23];

$vinculoauto8 = $derecho[24];
$dniauto8 = $derecho[25];
$nombreauto8 = $derecho[26];
}

if(!is_null($dniauto0) && !is_null($dniauto1) && !is_null($dniauto2) && !is_null($dniauto3) && !is_null($dniauto4) && !is_null($dniauto5) && !is_null($dniauto6) && !is_null($dniauto7) && !is_null($dniauto8)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";

$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";

$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";

 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";
 
 $query4 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto4 . "', '" . $dniauto4 . "', '" . $nombreauto4 . "', 
            $fecha_hora_update, $iddim_usuario)";
 
 
  $query5 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto5 . "', '" . $dniauto5 . "', '" . $nombreauto5 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query6 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto6 . "', '" . $dniauto6 . "', '" . $nombreauto6 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query7 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto7 . "', '" . $dniauto7 . "', '" . $nombreauto7 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query8 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto8 . "', '" . $dniauto8 . "', '" . $nombreauto8 . "', 
            $fecha_hora_update, $iddim_usuario)";


// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
if ($conexionmysql->query($query5)) {
if ($conexionmysql->query($query6)) {
if ($conexionmysql->query($query7)) {
if ($conexionmysql->query($query8)) {
    
}
}}}}}}
}
}}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//Cerramos la conexion
// }
} 
else
if(!is_null($dniauto0) && !is_null($dniauto1) && !is_null($dniauto2) && !is_null($dniauto3)&& !is_null($dniauto4) && !is_null($dniauto5) && !is_null($dniauto6) && !is_null($dniauto7)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";

$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";

$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";

 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";
 $query4 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto4 . "', '" . $dniauto4 . "', '" . $nombreauto4 . "', 
            $fecha_hora_update, $iddim_usuario)";
 
 
  $query5 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto5 . "', '" . $dniauto5 . "', '" . $nombreauto5 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query6 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto6 . "', '" . $dniauto6 . "', '" . $nombreauto6 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query7 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto7 . "', '" . $dniauto7 . "', '" . $nombreauto7 . "', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
if ($conexionmysql->query($query5)) {
if ($conexionmysql->query($query6)) {
if ($conexionmysql->query($query7)) {
                        
}                       
}                       
}                       
}                       
}}
}
}}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//Cerramos la conexion
// }
} 
else
if(!is_null($dniauto0) && !is_null($dniauto1) && !is_null($dniauto2)&& !is_null($dniauto3)&& !is_null($dniauto4) && !is_null($dniauto5) && !is_null($dniauto6)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";

$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";

$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";
 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";
 $query4 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto4 . "', '" . $dniauto4 . "', '" . $nombreauto4 . "', 
            $fecha_hora_update, $iddim_usuario)";
 
 
  $query5 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto5 . "', '" . $dniauto5 . "', '" . $nombreauto5 . "', 
            $fecha_hora_update, $iddim_usuario)";
  $query6 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto6 . "', '" . $dniauto6 . "', '" . $nombreauto6 . "', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
if ($conexionmysql->query($query5)) {
if ($conexionmysql->query($query6)) {
                      
}                       
}                       
}                       
}   
}
}
}}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//Cerramos la conexion
// }
} 
else
if(!is_null($dniauto0) && !is_null($dniauto1)&& !is_null($dniauto2)&& !is_null($dniauto3)&& !is_null($dniauto4) && !is_null($dniauto5)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";

$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";
$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";
 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";
 $query4 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto4 . "', '" . $dniauto4 . "', '" . $nombreauto4 . "', 
            $fecha_hora_update, $iddim_usuario)";
 
 
  $query5 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto5 . "', '" . $dniauto5 . "', '" . $nombreauto5 . "', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
if ($conexionmysql->query($query5)) {
                      
}                       
}                       
}   
}  
}
}
}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//Cerramos la conexion
// }
} 
else
if(!is_null($dniauto0)&& !is_null($dniauto1)&& !is_null($dniauto2)&& !is_null($dniauto3)&& !is_null($dniauto4)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";
$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";
$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";
 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";
 $query4 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto4 . "', '" . $dniauto4 . "', '" . $nombreauto4 . "', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
                      
}                       
}   
}  
}
    
}
}

//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//Cerramos la conexion
// }
}
//else aqui empieza validacion
//if(empty ($dniauto0)==TRUE) &&  {
//    
//}

else 
if(!is_null($dniauto0)&& !is_null($dniauto1)&& !is_null($dniauto2)&& !is_null($dniauto3)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";
$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";
$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";
 $query3 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '" . $vinculoauto3 . "', '" . $dniauto3 . "', '" . $nombreauto3 . "', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
                  
}   
}  
}
    
}
}

echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
}

else 
if(!is_null($dniauto0)&& !is_null($dniauto1)&& !is_null($dniauto2)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";
$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";
$query2 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto2."', '".$dniauto2."', '".$nombreauto2."', 
            $fecha_hora_update, $iddim_usuario)";


// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
 
}  
}
    
}
}

echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
}

else 
if(!is_null($dniauto0)&& !is_null($dniauto1)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";
$query1 = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto1."', '".$dniauto1."', '".$nombreauto1."', 
            $fecha_hora_update, $iddim_usuario)";

// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {

}
    
}
}

echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
}

else
if(!is_null($dniauto0)) {

//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($iddim_aseguradoindevido, '".$vinculoauto0."', '".$dniauto0."', '".$nombreauto0."', 
            $fecha_hora_update, $iddim_usuario)";


// $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
    
}
}

echo 'Se Actualizo Correctamente.';
echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
}

else{


echo 'Error al Actualizar registro<br>';

echo '$iddim_usuario', $iddim_usuario, '<br>';
echo '$VINCULO_0: ', $vinculoauto1, '<br>';
echo '$VINCULO_1: ', $vinculoauto1, '<br>';
echo '$VINCULO_2: ', $vinculoauto2, '<br>';
echo '$VINCULO_3: ', $vinculoauto3, '<br>';
echo '$VINCULO_4: ', $vinculoauto4, '<br>';

echo '$dh0: ', $dniauto0, '<br>';
echo '$dh1: ', $dniauto1, '<br>';
echo '$dh2: ', $dniauto2, '<br>';
echo '$dh3: ', $dniauto3, '<br>';
echo '$dh4: ', $dniauto4, '<br>';

echo '$nombreauto0: ', $nombreauto0, '<br>';

echo $fecha_hora_update, '<br>';

}}
?>

<?php
?>