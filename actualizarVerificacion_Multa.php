<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

   
    $iddim_Multaa = $_POST['iddim_Multa'];
    $iddim_Multa = "'$iddim_Multaa'";

    if (empty($_POST['fechaDIF'])) {
        $fechaDIF = 'NULL';
    } else {
        $fechaDIF0 = $_POST['fechaDIF'];
        $fechaDIF = "'$fechaDIF0'";
    }

    if (empty($_POST['max'])) {
        $max = 'NULL';
    } else {
        $maxx = $_POST['max'];
        $max = "'$maxx'";
    }

//    if (empty($_POST['fechaNMulta'])) {
//        $fechaNMulta = 'NULL';
//    } else {
//        $fechaNMultaa = $_POST['fechaNMulta'];
//        $fechaNMulta = "'$fechaNMultaa'";
//    }

    if (empty($_POST['iddim_usuario'])) {
        $iddim_usuario = 'NULL';
    } else {
        $iddim_usuarioo = $_POST['iddim_usuario'];
        $iddim_usuario = "'$iddim_usuarioo'";
    }


    if (empty($_POST['numRMulta'])) {
        $numRMulta = 'NULL';
    } else {
        $numRMultaa = $_POST['numRMulta'];
        $numRMulta = "'$numRMultaa'";
    }


    if (empty($_POST['nombre_pdf_multa'])) {
        $nombre_pdf_multa = 'NULL';
    } else {
        $nombre_pdf_multa0 = $_POST['nombre_pdf_multa'];
        $nombre_pdf_multa = "'$nombre_pdf_multa0'";
    }


    if (empty($_POST['cbx_infraccion'])) {
        $cbx_infraccion = 'NULL';
    } else {
        $cbx_infraccionn = $_POST['cbx_infraccion'];
        $cbx_infraccion = "'$cbx_infraccionn'";
    }

    if (empty($_POST['cbx_uit'])) {
        $cbx_uit = 'NULL';
    } else {
        $cbx_uitt = $_POST['cbx_uit'];
        $cbx_uit = "'$cbx_uitt'";
    }


    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";



    if (empty($_POST['fechaNCInicioPSmult'])) {
        $fechaNCInicioPSmult = 'NULL';
    } else {
        $fechaNCInicioPSmultt = $_POST['fechaNCInicioPSmult'];
        $fechaNCInicioPSmult = "'$fechaNCInicioPSmultt'";
    }

    
    //$chklist=$_POST['chklist'];
    if (!isset($_POST['chklist'])) {
        $chklist='1';
    
    if (empty($_POST['fechaIFinalInstructormult'])) {
        $fechaIFinalInstructormult = 'NULL';
    } else {
        $fechaIFinalInstructormultt = $_POST['fechaIFinalInstructormult'];
        $fechaIFinalInstructormult = "'$fechaIFinalInstructormultt'";
    }
    }
    else {
        $chklist='0';
        if (empty($_POST['fechaIFinalInstructormult'])) {
        $fechaIFinalInstructormult = 'NULL';
    } else {
        
        $fechaIFinalInstructormultt = $_POST['fechaIFinalInstructormult'];
        $fechaIFinalInstructormult = "'$fechaIFinalInstructormultt'";
    }
    }
    
//     $query = "UPDATE dim_multa
//            SET
//            fechaERMulta = $fechaDIF,
//            fechaNMulta=$fechaNMulta,
//            infraccion=$cbx_infraccion,
//            uit=$cbx_uit,
//            fechaNCInicioPSmult=$fechaNCInicioPSmult,
//            fechaIFinalInstructormult=$fechaIFinalInstructormult,
//            idTActosverificacion='086',
//            numRMulta=$numRMulta, 
//            nombrePDFmulta=$nombre_pdf_multa,
//            idtusuario_Actu=$iddim_usuario,
//            fActualizacion=$fecha_hora_update
//            WHERE iddim_Multa=$iddim_Multa";
     
        $query = "UPDATE dim_multa
            SET
            fechaERMulta = $fechaDIF,
            infraccion=$cbx_infraccion,
            uit=$cbx_uit,
            fechaNCInicioPSmult=$fechaNCInicioPSmult,
            fechaIFinalInstructormult=$fechaIFinalInstructormult,
            id_ffinalinstruc=$chklist,
            idTActosverificacion='086',
            numRMulta=$numRMulta, 
            nombrePDFmulta=$nombre_pdf_multa,
            idtusuario_Actu=$iddim_usuario,
            fActualizacion=$fecha_hora_update
            WHERE iddim_Multa=$iddim_Multa";


        if ($conexionmysql->query($query)) {
            echo 'Se Actualizo Correctamente.<br>';
            echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
            //echo $chklist;
        } else {
            echo 'Error al Actualizar registro<br>';
        }
}
?>