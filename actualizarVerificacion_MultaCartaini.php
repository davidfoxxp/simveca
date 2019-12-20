<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

    $iddimmm = $_POST['iddim_Overificacion'];
    $iddim_Overificacion = "'$iddimmm'";


    if (empty($_POST['max'])) {
        $max = 'NULL';
    } else {
        $maxx = $_POST['max'];
        $max = "'$maxx'";
    }


    if (empty($_POST['iddim_usuario'])) {
        $iddim_usuario = 'NULL';
    } else {
        $iddim_usuarioo = $_POST['iddim_usuario'];
        $iddim_usuario = "'$iddim_usuarioo'";
    }


    if (empty($_POST['nuncartaini'])) {
        $nuncartaini = 'NULL';
    } else {
        $nuncartainii = $_POST['nuncartaini'];
        $nuncartaini = "'$nuncartainii'";
    }

    if (empty($_POST['fechaNPCInicioPSmult'])) {
        $fechaNPCInicioPSmult = 'NULL';  
    } else {
        $fechaNPCInicioPSmultt = $_POST['fechaNPCInicioPSmult'];
        $fechaNPCInicioPSmult = "'$fechaNPCInicioPSmultt'";
    }


    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    $query2 = "ALTER TABLE dim_multa AUTO_INCREMENT = 1";

    $query = "INSERT INTO dim_multa 
         (iddim_Overificacion, 
         num, 
         numCInicioPSMulta,
         fechaNPCInicioPSmult,
         idtusuario, 
         fCreacion) 
         VALUES 
         ($iddim_Overificacion,
         $max, 
         $nuncartaini, 
         $fechaNPCInicioPSmult,
         $iddim_usuario,
         $fecha_hora_update)";


    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query)) {
            echo 'Se Actualizo Correctamente.';
            echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        } else {
            echo 'Error al Actualizar registro<br>';
            echo $iddim_Overificacion;
                    echo $max;
                    echo $fechaNPCInicioPSmult;
                    echo $nuncartaini;
                    echo $iddim_usuario;
        }
    }
}
?>