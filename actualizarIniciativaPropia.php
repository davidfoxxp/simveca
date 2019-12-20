<?php

if (isset($_POST['grabar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $queryA = "SELECT max(m.iddim_aseguradoindevido) as max FROM dim_aseguradoindevido m";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultA = $conexionmysql->query($queryA);
            if ($conexionmysql->query($queryA)) {
                while ($fila = $resultA->fetch_assoc()) {
                    $ma = $fila['max'];
                    $max = $ma + 1;
                }
            }
            
    $queryA = "SELECT max(m.iddim_aseguradoindevido) as max FROM dim_aseguradoindevido m";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultA = $conexionmysql->query($queryA);
            if ($conexionmysql->query($queryA)) {
                while ($fila = $resultA->fetch_assoc()) {
                    $ma = $fila['max'];
                    $max = $ma + 1;
                }
            }        
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

    //$idTEstadoActualoo = $_POST['idTEstadoActual'];
    //$idTEstadoActual = "'$idTEstadoActualoo'";
    
    if (empty($_POST['idTEstadoActual'])) {
        $idTEstadoActual = 'NULL';
    } else {
        $idTEstadoActualoo = $_POST['idTEstadoActual'];
        $idTEstadoActual = "'$idTEstadoActualoo'";
    }

    if (empty($_POST['idTGeneraBaja'])) {
        $idTGeneraBRegistro = 'NULL';
    } else {
        $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
        $idTGeneraBRegistro = "'$idTGeneraBRegistroo'";
    }
    
    if (empty($_POST['femisionBRegistro'])) {
        $FEmisionBRegistro = 'NULL';
    } else {
        $FEmisionBRegistroo = $_POST['femisionBRegistro'];
        $FEmisionBRegistro = "'$FEmisionBRegistroo'";
    }
    
    if (empty($_POST['idTRRBRegistro'])) {
        $idTRRBRegistro = 'NULL';
    } else {
        $idTRRBRegistroo = $_POST['idTRRBRegistro'];
        $idTRRBRegistro = "'$idTRRBRegistroo'";
    }
    
    if (empty($_POST['nit'])) {
        $nit = 'NULL';
    } else {
        $nitt = $_POST['nit'];
        $nit = "'$nitt'";
    }
    
    
   if (empty($_POST['fcarga'])) {
        $datecorreo = 'NULL';
    } else {
        $datecorreoo = $_POST['fcarga'];
        $datecorreo = "'$datecorreoo'";
    }

//    if (empty($_POST['piniciobaja'])) {
//        $piniciobaja = 'NULL';
//    } else {
//        $piniciobajao = $_POST['piniciobaja'];
//        $piniciobaja = "'$piniciobajao'";
//    }
//
//    if (empty($_POST['pfinbaja'])) {
//        $pfinbaja = 'NULL';
//    } else {
//        $pfinbajao = $_POST['pfinbaja'];
//        $pfinbaja = "'$pfinbajao'";
//    }


    if (empty($_POST['nResBRegistro'])) {
        $numResolucionRegistro = 'NULL';
    } else {
        $numResolucionRegistroo = $_POST['nResBRegistro'];
        $numResolucionRegistro = "'$numResolucionRegistroo'";
    }
    if (empty($_POST['fnotificacionBRegistro'])) {
        $FNotificacionPAsegurado = 'NULL';
    } else {
        $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
        $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
    }
    
    if (empty($_POST['fecartafinanza'])) {
        $FEnvioCFinanzasBRegistro = 'NULL';
    } else {
        $FEnvioCFinanzasBRegistroo = $_POST['fecartafinanza'];
        $FEnvioCFinanzasBRegistro = "'$FEnvioCFinanzasBRegistroo'";
    }
    
    if (empty($_POST['ncartafinanza'])) {
        $numCartaFinanzasBRegistro = 'NULL';
    } else {
        $numCartaFinanzasBRegistroo = $_POST['ncartafinanza'];
        $numCartaFinanzasBRegistro = "'$numCartaFinanzasBRegistroo'";
    }
    
    if (empty($_POST['freporteresolutor'])) {
        $freporteresolutor = 'NULL';
    } else {
        $freporteresolutorr = $_POST['freporteresolutor'];
        $freporteresolutor = "'$freporteresolutorr'";
    }
    
    if (empty($_POST['fechaenvioOSPE'])) {
        $fechaenvioOSPE = 'NULL';
    } else {
        $fechaenvioOSPEE = $_POST['fechaenvioOSPE'];
        $fechaenvioOSPE = "'$fechaenvioOSPEE'";
    }
    
    if (empty($_POST['correo'])) {
        $correo = 'NULL';
    } else {
        $correoo = $_POST['correo'];
        $correo = "'$correoo'";
    }
    
    /*
    if (empty($_POST['fcorreo'])) {
        $fcorreo = 'NULL';
    } else {
        $fcorreoo = $_POST['fcorreo'];
        $fcorreo = "'$fcorreoo'";
    }
    */
    if (empty($_POST['operativo'])) {
        $operativo = 'NULL';
    } else {
        $operativoo = $_POST['operativo'];
        $operativo = "'$operativoo'";
    }
    
    if (empty($_POST['observaciones'])) {
        $obsOSPE = 'NULL';
    } else {
        $obsOSPEo = $_POST['observaciones'];
        $obsOSPE = "'$obsOSPEo'";
    }
    
//    $obsOSPEo = $_POST['observaciones'];
//    $obsOSPE = "'$obsOSPEo'";

//    $idtusuarioo = $_POST['idtusuario'];
//    $idtusuario = "'$idtusuarioo'";

    date_default_timezone_set('America/Bogota'); 
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    //resolviendo una consulta con la clausula insert, fcorreo=$fcorreo,
    $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, idTGeneraBaja=$idTGeneraBRegistro, idTRRBRegistro=$idTRRBRegistro, nit=$nit, femisionBRegistro=$FEmisionBRegistro, 
                nResBRegistro=$numResolucionRegistro, fnotificacionBRegistro=$FNotificacionPAsegurado, fecartafinanza=$FEnvioCFinanzasBRegistro, ncartafinanza=$numCartaFinanzasBRegistro, 
                observaciones=$obsOSPE, fechaenvioOSPE=$fechaenvioOSPE, correo=$correo, fcorreo=$datecorreo,                
                operativo=$operativo,
                idtusuario=$iddim_usuario, fActualizacion=$fecha_hora_update
                WHERE iddim_CPosterior=$iddim_CPosterior";
    
    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";

    if ($conexionmysql->query($query)) {
       //if ($conexion->query($query1)) {
        
            echo 'Se Actualizo Correctamente.';
            //echo "<meta http-equiv='refresh' content='2'>"; ACTUALIZA PAGINA PERO FALTA PERFECCIONAR
            
            //Cerramos la conexion
       // }
    } else {
        echo 'Error al Actualizar registro<br>';
        echo '$iddim_usuario: ', $iddim_usuario, '<br><br>';
        
        echo '$idTEstadoActual: ', $idTEstadoActual, '<br>';
        echo '$idTGeneraBRegistro: ',$idTGeneraBRegistro, '<br>';
        echo '$idTRRBRegistro: ', $idTRRBRegistro, '<br>';
        echo '$nit: ', $nit,'<br>';
        echo '$FEmisionBRegistro: ', $FEmisionBRegistro, '<br>';
        echo '$numResolucionRegistro: ', $numResolucionRegistro, '<br><br>';

//        echo $piniciobaja, '<br>';
//        echo $pfinbaja, '<br>';

        echo '$FNotificacionPAsegurado: ', $FNotificacionPAsegurado, '<br>';       
        echo '$FEnvioCFinanzasBRegistro: ', $FEnvioCFinanzasBRegistro, '<br>';
        echo '$numCartaFinanzasBRegistro: ', $numCartaFinanzasBRegistro, '<br>';
        echo '$obsOSPE: ', $obsOSPE, '<br><br>';
        
        echo '$freporteresolutor: ', $freporteresolutor, '<br>';       
        echo '$fechaenvioOSPE: ', $fechaenvioOSPE, '<br>';
        echo '$correo: ', $correo, '<br>';
       // echo '$fcorreo: ', $fcorreo, '<br>';
        echo '$operativo: ', $operativo, '<br>';
//        echo $idCP, '<br>';
//        echo $idtusuario, '<br>';
        echo '$fecha_hora_update: ', $fecha_hora_update, '<br>';
    }
}
?>