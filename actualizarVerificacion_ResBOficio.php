<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_verificacion = "'$iddimmm'";
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

   if (empty($_POST['fechaEBO'])) {
        $fechaEBO = 'NULL';
    } else {
        $fechaEBO0 = $_POST['fechaEBO'];
        $fechaEBO = "'$fechaEBO0'";
    }
    
    if (empty($_POST['fechaActFirme'])) {
        $fechaActFirme = 'NULL';
    } else {
        $fechaActFirmee = $_POST['fechaActFirme'];
        $fechaActFirme = "'$fechaActFirmee'";
    }    
    
     if (empty($_POST['factofirme'])) {
                        $factofirme = 'NULL';
    } else {
                        $factofirmee = $_POST['factofirme'];
                        $factofirme = "'$factofirmee'";
    }
    
    if (empty($_POST['numResBOficio'])) {
        $numResBOficio = 'NULL';
    } else {
        $numResBOficio0 = $_POST['numResBOficio'];
        $numResBOficio = "'$numResBOficio0'";
    }
    
    if (empty($_POST['idTRRBRegistro'])) {
        $idTRRBRegistro = 'NULL';
    } else {
        $idTRRBRegistro0 = $_POST['idTRRBRegistro'];
        $idTRRBRegistro = "'$idTRRBRegistro0'";
    }
    
    if (empty($_POST['idTEstadoActual'])) {
        $idTEstadoActual = 'NULL';
    } else {
        $idTEstadoActual0 = $_POST['idTEstadoActual'];
        $idTEstadoActual = "'$idTEstadoActual0'";
    }    
 
        if (empty($_POST['nombre_PDF_reso'])) {
        $nombre_PDF_reso = 'NULL';
    } else {
        $nombre_PDF_reso0 = $_POST['nombre_PDF_reso'];
        $nombre_PDF_reso = "'$nombre_PDF_reso0'";
    }
    
            if (empty($_POST['fechaNAsegurado'])) {
        $fechaNAsegurado = 'NULL';
    } else {
        $fechaNAsegurado0 = $_POST['fechaNAsegurado'];
        $fechaNAsegurado = "'$fechaNAsegurado0'";
    }
        
    if (empty($_POST['fechaNEmpleador'])) {
        $fechaNEmpleador = 'NULL';
    } else {
        $fechaNEmpleadorr = $_POST['fechaNEmpleador'];
        $fechaNEmpleador = "'$fechaNEmpleadorr'";
    }
    
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

      $query = "UPDATE dim_resboficio SET                
                fechaEmiBOficio=$fechaEBO,
                fechaNAsegurado=$fechaNAsegurado,
                fechaNEmpleador=$fechaNEmpleador,
                fechaActFirme=$fechaActFirme,
                factofirme=$factofirme,
                idTActosverificacion='085',
                numResBOficio=$numResBOficio,
                nombre_PDF_reso= $nombre_PDF_reso,
                id_EstadoReso=$idTEstadoActual,
                idTRRBRegistro=$idTRRBRegistro,
                idtusuario=$iddim_usuario,
                fActualizacion=$fecha_hora_update
                WHERE iddim_ResBOficio=$iddim_verificacion";

    
    if ($conexionmysql->query($query)) {
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//        $iddim_CPosterior="'$iddim_PaCalificar'";
//        require("formEditarPCalificar.php?iddim_CPosterior=".$iddim_CPosterior);
        ?><!-- <input type = "button" Value ="REGRESAR" onclick="parent.window.location.reload(true);">  <?php
        //Cerramos la conexion
        // }
        } else {
        echo 'Error al Actualizar registro<br>';
        echo 'idresolucion: ', $idTRRBRegistro, '<br>';
        echo 'estado caso: ', $idTEstadoActual, '<br>';       
        echo 'fecha e: ', $fechaEBO, '<br>';
        echo '$fechaNAsegurado ', $fechaNAsegurado, '<br>';
        echo 'numero de reso: ', $numResBOficio, '<br>'; 
        
         echo '$nombre_PDF_reso: ', $nombre_PDF_reso, '<br>';
        echo '$iddim_usuario ', $iddim_usuario, '<br>';       
        echo '$fecha_hora_update ', $fecha_hora_update, '<br>';
        echo '$fechaNAsegurado ', $fechaNAsegurado, '<br>';
        echo '$iddim_verificacion ', $iddim_verificacion, '<br>'; 
              
        
        
        //echo $fechaNEmpleador, '<br>';
    }
}
?>