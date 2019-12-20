<?php

if (isset($_POST['actualizarSICO'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

   
    $iddim_Multaa = $_POST['iddim_Multa'];
    $iddim_Multa = "'$iddim_Multaa'";

    if (empty($_POST['fechaInSICO'])) {
        $fechaInSico = 'NULL';
    } else {
        $fechaInSicoo = $_POST['fechaInSICO'];
        $fechaInSico = "'$fechaInSicoo'";
    }

    if (empty($_POST['NcartaSGCNT'])) {
        $NcartaSGCNT = 'NULL';
    } else {
        $NcartaSGCNTT = $_POST['NcartaSGCNT'];
        $NcartaSGCNT = "'$NcartaSGCNTT'";
    }

    if (empty($_POST['fechaCartaSGCNT'])) {
        $fechaCartaSGCNT = 'NULL';
    } else {
        $fechaCartaSGCNTT = $_POST['fechaCartaSGCNT'];
        $fechaCartaSGCNT= "'$fechaCartaSGCNTT'";
    }

    if (empty($_POST['iddim_usuario'])) {
        $iddim_usuario = 'NULL';
    } else {
        $iddim_usuarioo = $_POST['iddim_usuario'];
        $iddim_usuario = "'$iddim_usuarioo'";
    }


    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

    if (empty($_POST['fechaNMulta'])) {
        $fechaNMulta = 'NULL';
    } else {
        $fechaNMultaa = $_POST['fechaNMulta'];
        $fechaNMulta = "'$fechaNMultaa'";
    }
    
    if (empty($_POST['fcActFirme'])) {
        $fcActFirme = 'NULL';
    } else {
        $fcActFirmee = $_POST['fcActFirme'];
        $fcActFirme = "'$fcActFirmee'";
    }

    if (empty($_POST['fechaNCInicioPSmult'])) {
        $fechaNCInicioPSmult = 'NULL';
    } else {
        $fechaNCInicioPSmultt = $_POST['fechaNCInicioPSmult'];
        $fechaNCInicioPSmult = "'$fechaNCInicioPSmultt'";
    }

    if (empty($_POST['fechaIFinalInstructormult'])) {
        $fechaIFinalInstructormult = 'NULL';
    } else {
        $fechaIFinalInstructormultt = $_POST['fechaIFinalInstructormult'];
        $fechaIFinalInstructormult = "'$fechaIFinalInstructormultt'";
    }

    
     $query = "UPDATE dim_multa
            SET
            fechaInSICO = $fechaInSico,
            fechaNMulta=$fechaNMulta,
            NcartaSGCNT=$NcartaSGCNT,
            fcActFirme=$fcActFirme,
            fechaCartaSGCNT=$fechaCartaSGCNT, 
            idtusuario_Actu=$iddim_usuario,
            fActualizacion=$fecha_hora_update
            WHERE iddim_Multa=$iddim_Multa";


        if ($conexionmysql->query($query)) {
            echo 'Se Actualizo Correctamente.';
            echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        } else {
            echo 'Error al Actualizar registro<br>';
        }
}
?>