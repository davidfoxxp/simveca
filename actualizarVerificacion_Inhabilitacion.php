<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_Verificacion = "'$iddimmm'";    
  
    if (empty($_POST['numResBOficio'])) {
        $nResInhabilitacion = 'NULL';
    } else {
         $nResInhabilitacionn = $_POST['numResBOficio'];
         $nResInhabilitacion = "'$nResInhabilitacionn'";
   }
   
   if (empty($_POST['fechaEmiRInh'])) {
        $fechaEmiRInh = 'NULL';
    } else {
        $fechaEmiRInhn = $_POST['fechaEmiRInh'];
        $fechaEmiRInh = "'$fechaEmiRInhn'";
    }
    
       if (empty($_POST['fechaNotRInh'])) {
        $fechaNotRInh = 'NULL';
    } else {
        $fechaNotRInhh = $_POST['fechaNotRInh'];
        $fechaNotRInh = "'$fechaNotRInhh'";
    }
    
//    $fechaNotRInh = $_POST['fechaNotRInh'];
    //$fechaEmiRInh = date("Y-m-d",strtotime($fechaNotRInh."+ 1 days")); 
    
//    if (empty($_POST['fechaNotRInh'])) {
//        $fechaNotRInh = 'NULL';
//    } else {
//        $fechaNotRInhh = $_POST['fechaNotRInh'];
//        $fechaNotRInh = "'$fechaNotRInhh'";
//    }
  
    /*******************************************************/
//    if (empty($_POST['fechaInicioPInh'])) {
//        $fechaInicioPInh = 'NULL';
//    } else {
//        $fechaInicioPInhh = $_POST['fechaInicioPInh'];
//        $fechaInicioPInh = "'$fechaInicioPInhh'";
//    }
    
        
//    if (empty($_POST['fechaFinPInh'])) {
//        $fechaFinPInh = 'NULL';
//    } else {
//        $fechaFinPInhh = $_POST['fechaFinPInh'];
//        $fechaFinPInh = "'$fechaFinPInhh'";
//    }
    
    if (empty($_POST['fechaNPCInicioPSInh'])) {
        $fechaNPCInicioPSInh = 'NULL';
    } else {
        $fechaNPCInicioPSInhh = $_POST['fechaNPCInicioPSInh'];
        $fechaNPCInicioPSInh = "'$fechaNPCInicioPSInhh'";
    }
    
    if (empty($_POST['fechaIFinalInstructor'])) {
        $fechaIFinalInstructor = 'NULL';
    } else {
        $fechaIFinalInstructorr = $_POST['fechaIFinalInstructor'];
        $fechaIFinalInstructor = "'$fechaIFinalInstructorr'";
    }
        if (empty($_POST['nombrePDFinhabi'])) {
        $nombrePDFinhabi = 'NULL';
    } else {
        $nombrePDFinhabir = $_POST['nombrePDFinhabi'];
        $nombrePDFinhabi = "'$nombrePDFinhabir'";
    }
    
   
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

    
    if (empty($_POST['checkbox1'])) {
        $checkbox1 = 'NULL';
    } else {
        $checkbox11 = $_POST['checkbox1'];
        $checkbox1 = "'$checkbox11'";
    }
    
    if (empty($_POST['cbx_simu'])) {
        $cbx_simu = 'NULL';
    } else {
        $cbx_simuU = $_POST['cbx_simu'];
        $cbx_simu = "'$cbx_simuU'";
    }
    
    if (empty($_POST['fechaNCInicioPSInh'])) {
        $fechaNCInicioPSInh = 'NULL';
    } else {
        $fechaNCInicioPSInhH = $_POST['fechaNCInicioPSInh'];
        $fechaNCInicioPSInh = "'$fechaNCInicioPSInhH'";
    }
     
    //resolviendo una consulta con la clausula insert
//    $query = "UPDATE dim_inhabilitacion 
//            SET
//            fechaEmiRInh = $fechaEmiRInh,
//            idTActosverificacion='087',
//            nResInhabilitacion=$nResInhabilitacion,
//            nombrePDFinhabi=$nombrePDFinhabi,
//            fechaNotRInh=$fechaNotRInh,
//            supuesto_1=$cbx_simu,
//            supuesto_2=$checkbox1,
//            fechaInicioPInh=$fechaInicioPInh, 
//            fechaFinPInh=$fechaFinPInh,
//            fechaNCInicioPSInh=$fechaNCInicioPSInh, 
//            fechaIFinalInstructor=$fechaIFinalInstructor,
//            idtusuario_Actu=$iddim_usuario,
//            fActualizacion=$fecha_hora_update
//            WHERE iddim_Inhabilitacion=$iddim_Verificacion";
    
    
//    $query = "UPDATE dim_inhabilitacion 
//            SET
//            fechaEmiRInh = $fechaEmiRInh,
//            idTActosverificacion='087',
//            nResInhabilitacion=$nResInhabilitacion,
//            nombrePDFinhabi=$nombrePDFinhabi,
//            
//            supuesto_1=$cbx_simu,
//            supuesto_2=$checkbox1,
//            fechaInicioPInh=$fechaInicioPInh, 
//            fechaFinPInh=$fechaFinPInh,
//            fechaNCInicioPSInh=$fechaNCInicioPSInh, 
//            fechaIFinalInstructor=$fechaIFinalInstructor,
//            idtusuario_Actu=$iddim_usuario,
//            fActualizacion=$fecha_hora_update
//            WHERE iddim_Inhabilitacion=$iddim_Verificacion";
    
    
//    $fechaInicioPInh = date("Y-m-d",strtotime($fechaNotRInh."+ 1 days")); 
//        
//        $fechaFinPInh = date("Y-m-d",strtotime($fechaInicioPInh."+ 1 years")); 
    
    $query = "UPDATE dim_inhabilitacion 
            SET
            fechaEmiRInh = $fechaEmiRInh,
            idTActosverificacion='087',
            fechaNotRInh=$fechaNotRInh,
            nResInhabilitacion=$nResInhabilitacion,
            nombrePDFinhabi=$nombrePDFinhabi,            
            supuesto_1=$cbx_simu,
            supuesto_2=$checkbox1, 
            fechaNCInicioPSInh=$fechaNCInicioPSInh,                  
            fechaIFinalInstructor=$fechaIFinalInstructor,
            idtusuario_Actu=$iddim_usuario,
            fActualizacion=$fecha_hora_update
            WHERE iddim_Inhabilitacion=$iddim_Verificacion";
    
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente.';
         echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        } else {
        echo 'Error al Actualizar registro<br>';     
        echo $fechaEmiRInh, '<br>';
        echo $nResInhabilitacion, '<br>';
                echo $nombrePDFinhabi, '<br>';
                echo $fechaNotRInh, '<br>';
                echo $cbx_simu, '<br>';
                echo $checkbox1, '<br>';              
                echo $fechaNCInicioPSInh, '<br>';
                echo $fechaIFinalInstructor, '<br>';
                echo $iddim_usuario, '<br>';
                echo $iddim_Verificacion, '<br>';
    }
}
?>