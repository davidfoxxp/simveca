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

                    if (empty($_POST['dni1'])) {
                        $dni1 = 'NULL';
                    } else {
                        $dni11 = $_POST['dni1'];
                        $dni1 = "'$dni11'";
                    }
                    
                     if (empty($_POST['sistema11'])) {
                        $sistema11 = 'NULL';
                    } else {
                        $sistema111 = $_POST['sistema11'];
                        $sistema11 = "'$sistema111'";
                    }
                    
                     if (empty($_POST['dp1'])) {
                        $dp1 = 'NULL';
                    } else {
                        $dp11 = $_POST['dp1'];
                        $dp1 = "'$dp11'";
                    }
                    
                    if (empty($_POST['p1'])) {
                        $p1 = 'NULL';
                    } else {
                        $p11 = $_POST['d1'];
                        $p1 = "'$p11'";
                    }
                    
                    if (empty($_POST['d1'])) {
                        $d1 = 'NULL';
                    } else {
                        $d11 = $_POST['d1'];
                        $d1 = "'$d11'";
                    }
                    
                     if (empty($_POST['dd1'])) {
                        $dd1 = 'NULL';
                    } else {
                        $dd11 = $_POST['dd1'];
                        $dd1 = "'$dd11'";
                    }
                    
                     if (empty($_POST['ch1'])) {
                        $ch1 = 'NULL';
                    } else {
                        $ch1 = $_POST['ch1'];
                    }
                    
                    ////////////////////////////////////
                    
                    if (empty($_POST['dni2'])) {
                        $dni2 = 'NULL';
                    } else {
                        $dni22 = $_POST['dni2'];
                        $dni2 = "'$dni22'";
                    }
                    
                     if (empty($_POST['sistema22'])) {
                        $sistema22 = 'NULL';
                    } else {
                        $sistema222 = $_POST['sistema22'];
                        $sistema22 = "'$sistema222'";
                    }
                    
                     if (empty($_POST['dp2'])) {
                        $dp2 = 'NULL';
                    } else {
                        $dp22 = $_POST['dp2'];
                        $dp2 = "'$dp22'";
                    }
                    
                    if (empty($_POST['p2'])) {
                        $p2 = 'NULL';
                    } else {
                        $p22 = $_POST['d2'];
                        $p2 = "'$p22'";
                    }
                    
                    if (empty($_POST['d2'])) {
                        $d2 = 'NULL';
                    } else {
                        $d22 = $_POST['d2'];
                        $d2 = "'$d22'";
                    }
                    
                     if (empty($_POST['dd2'])) {
                        $dd2 = 'NULL';
                    } else {
                        $dd22 = $_POST['dd2'];
                        $dd2 = "'$dd22'";
                    }
                    
                     if (empty($_POST['ch2'])) {
                        $ch2 = 'NULL';
                    } else {
                        $ch2 = $_POST['ch2'];
                    }
                    
                    
                    ///////////////////////////////
                    
                    if (empty($_POST['dni3'])) {
                        $dni3 = 'NULL';
                    } else {
                        $dni33 = $_POST['dni3'];
                        $dni3 = "'$dni33'";
                    }
                    
                     if (empty($_POST['sistema33'])) {
                        $sistema33 = 'NULL';
                    } else {
                        $sistema333 = $_POST['sistema33'];
                        $sistema33 = "'$sistema333'";
                    }
                    
                     if (empty($_POST['dp3'])) {
                        $dp3 = 'NULL';
                    } else {
                        $dp33 = $_POST['dp3'];
                        $dp3 = "'$dp33'";
                    }
                    
                    if (empty($_POST['p3'])) {
                        $p3 = 'NULL';
                    } else {
                        $p33 = $_POST['d3'];
                        $p3 = "'$p33'";
                    }
                    
                    if (empty($_POST['d3'])) {
                        $d3 = 'NULL';
                    } else {
                        $d33 = $_POST['d3'];
                        $d3 = "'$d33'";
                    }
                    
                     if (empty($_POST['dd3'])) {
                        $dd3 = 'NULL';
                    } else {
                        $dd33 = $_POST['dd3'];
                        $dd3 = "'$dd33'";
                    }
                    
                     if (empty($_POST['ch3'])) {
                        $ch3 = 'NULL';
                    } else {
                        $ch3 = $_POST['ch3'];
                    }
                    
                    //$ch1 = $_POST['ch1'];
                        
if($ch1==1 && $ch2==1) {
    $query9 = "ALTER TABLE dim_domicilios AUTO_INCREMENT = 1";
    $query1 = "INSERT INTO dim_domicilios (iddim_aseguradoindevido, prioridad, dni, 
        tipo_sistema, departamento, provincia, distrito, direccion, 
        fCreacion, idtusuario) VALUES ($iddim_aseguradoindevido, '0', $dni1, 
                $sistema11, $dp1, $p1, $d1, $dd1, 
                $fecha_hora_update, $iddim_usuario)";
    $query2 = "INSERT INTO dim_domicilios (iddim_aseguradoindevido, prioridad, dni, 
        tipo_sistema, departamento, provincia, distrito, direccion, 
        fCreacion, idtusuario) VALUES ($iddim_aseguradoindevido, '0', $dni2, 
                $sistema22, $dp2, $p2, $d2, $dd2, 
                $fecha_hora_update, $iddim_usuario)";
    
    if ($conexionmysql->query($query9)) {
        if ($conexionmysql->query($query1)) {
            if ($conexionmysql->query($query2)) {
   echo 'Se Actualizo Correctamente.<BR>'; 
            echo '<a href="formDomiliosTitular.php?iddim_aseguradoindevido='.$iddim_aseguradoindevidoo.'">ATRAS</a>';
            }
        }
    }
}
else
if($ch1==1) {
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20063', 'H', '45955659', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');
//INSERT INTO `sisgasv2`.`dim_sccmvtft` (`iddim_aseguradoindevido`, `SCCMVTFT`, `VINCULO_0`, `DNI_DH_0`, `APELLIDO_NOMBRE_0`, `fCreacion`, `idtusuario`) VALUES ('20063', '20064', 'H', '45955658', 'SALAZAR MAGALLANES OMAR GIANCARLO', '2018-07-26 09:30:00', '1');

$query9 = "ALTER TABLE dim_domicilios AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_domicilios (iddim_aseguradoindevido, prioridad, dni, 
        tipo_sistema, departamento, provincia, distrito, direccion, 
        fCreacion, idtusuario) VALUES ($iddim_aseguradoindevido, '0', $dni1, 
                $sistema11, $dp1, $p1, $d1, $dd1, 
                $fecha_hora_update, $iddim_usuario)";

if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
   echo 'Se Actualizo Correctamente.<BR>'; 
   echo '<a href="formDomiliosTitular.php?iddim_aseguradoindevido='.$iddim_aseguradoindevidoo.'">ATRAS</a>';
}
 }}
 else
if($ch2==1) {
$query9 = "ALTER TABLE dim_domicilios AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_domicilios (iddim_aseguradoindevido, prioridad, dni, 
        tipo_sistema, departamento, provincia, distrito, direccion, 
        fCreacion, idtusuario) VALUES ($iddim_aseguradoindevido, '0', $dni2, 
                $sistema22, $dp2, $p2, $d2, $dd2, 
                $fecha_hora_update, $iddim_usuario)";

if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
   echo 'Se Actualizo Correctamente.<BR>'; 
      echo '<a href="formDomiliosTitular.php?iddim_aseguradoindevido='.$iddim_aseguradoindevidoo.'">ATRAS</a>';
}
 }}
else
    
    if($ch3==1) {
$query9 = "ALTER TABLE dim_domicilios AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_domicilios (iddim_aseguradoindevido, prioridad, dni, 
        tipo_sistema, departamento, provincia, distrito, direccion, 
        fCreacion, idtusuario) VALUES ($iddim_aseguradoindevido, '0', $dni3, 
                '3', $dp3, $p3, $d3, $dd3, 
                $fecha_hora_update, $iddim_usuario)";

if ($conexionmysql->query($query9)) {
if ($conexionmysql->query($query)) {
   echo 'Se Actualizo Correctamente.<BR>';  
      echo '<a href="formDomiliosTitular.php?iddim_aseguradoindevido='.$iddim_aseguradoindevidoo.'">ATRAS</a>';
}
 }}
else
    {
      echo 'ERROR, NO SELECCIONO UN DOMICILIO.<BR>'; 
      echo '<a href="formDomiliosTitular.php?iddim_aseguradoindevido='.$iddim_aseguradoindevidoo.'">ATRAS</a>';
}
?>
<?php
 }
?>