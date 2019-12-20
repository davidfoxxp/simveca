<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

    $iddim = $_POST['iddim_CFinanzas'];
    $iddim_CFinanzas = "'$iddim'";

//1
    if (empty($_POST['fecartafinanza1'])) {
        $fecartafinanza1 = 'NULL';
    } else {
        $fecartafinanza11 = $_POST['fecartafinanza1'];
        $fecartafinanza1 = "'$fecartafinanza11'";
    }
//2
    if (empty($_POST['ncartafinanza1'])) {
        $ncartafinanza1 = 'NULL';
    } else {
        $ncartafinanza11 = $_POST['ncartafinanza1'];
        $ncartafinanza1 = "'$ncartafinanza11'";
    }
    if (empty($_POST['valorizacion1'])) {
        $valorizacion1 = 'NULL';
    } else {
        $valorizacion11 = $_POST['valorizacion1'];
        $valorizacion1 = "$valorizacion11";
    }
    
 ///////////////////////////////////////////////
 //
//1
    if (empty($_POST['fecartafinanza2'])) {
        $fecartafinanza2 = 'NULL';
    } else {
        $fecartafinanza22 = $_POST['fecartafinanza2'];
        $fecartafinanza2 = "'$fecartafinanza22'";
    }
//2
    if (empty($_POST['ncartafinanza2'])) {
        $ncartafinanza2 = 'NULL';
    } else {
        $ncartafinanza22 = $_POST['ncartafinanza2'];
        $ncartafinanza2 = "'$ncartafinanza22'";
    }
    if (empty($_POST['valorizacion2'])) {
        $valorizacion2 = 'NULL';
    } else {
        $valorizacion22 = $_POST['valorizacion2'];
        $valorizacion2 = "'$valorizacion22'";
    }

    
    ////////////////////////////////////////

    //1
    if (empty($_POST['fecartafinanza3'])) {
        $fecartafinanza3 = 'NULL';
    } else {
        $fecartafinanza33 = $_POST['fecartafinanza3'];
        $fecartafinanza3 = "'$fecartafinanza33'";
    }
//2
    if (empty($_POST['ncartafinanza3'])) {
        $ncartafinanza3 = 'NULL';
    } else {
        $ncartafinanza33 = $_POST['ncartafinanza3'];
        $ncartafinanza3 = "'$ncartafinanza33'";
    }
    if (empty($_POST['valorizacion3'])) {
        $valorizacion3 = 'NULL';
    } else {
        $valorizacion33 = $_POST['valorizacion3'];
        $valorizacion3 = "'$valorizacion33'";
    }

/////////////////////////////////
    
    //1
    if (empty($_POST['fecartafinanza4'])) {
        $fecartafinanza4 = 'NULL';
    } else {
        $fecartafinanza44 = $_POST['fecartafinanza4'];
        $fecartafinanza4 = "'$fecartafinanza44'";
    }
//2
    if (empty($_POST['ncartafinanza4'])) {
        $ncartafinanza4 = 'NULL';
    } else {
        $ncartafinanza44 = $_POST['ncartafinanza4'];
        $ncartafinanza4 = "'$ncartafinanza44'";
    }
    if (empty($_POST['valorizacion4'])) {
        $valorizacion4 = 'NULL';
    } else {
        $valorizacion44 = $_POST['valorizacion4'];
        $valorizacion4 = "'$valorizacion44'";
    }

    
    ///////////////////////////////////////////
    
    //1
    if (empty($_POST['fecartafinanza5'])) {
        $fecartafinanza5 = 'NULL';
    } else {
        $fecartafinanza55 = $_POST['fecartafinanza5'];
        $fecartafinanza5 = "'$fecartafinanza55'";
    }
//2
    if (empty($_POST['ncartafinanza5'])) {
        $ncartafinanza5 = 'NULL';
    } else {
        $ncartafinanza55 = $_POST['ncartafinanza5'];
        $ncartafinanza5 = "'$ncartafinanza55'";
    }
    if (empty($_POST['valorizacion5'])) {
        $valorizacion5 = 'NULL';
    } else {
        $valorizacion55 = $_POST['valorizacion5'];
        $valorizacion5 = "'$valorizacion55'";
    }
    
    ///////////////////////////////////////////
    
   
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    //resolviendo una consulta con la clausula insert
    $query = "UPDATE dim_cfinanzas SET 
        fecartafinanza1=$fecartafinanza1, ncartafinanza1=$ncartafinanza1, valorizacion1=$valorizacion1, 
        fecartafinanza2=$fecartafinanza2, ncartafinanza2=$ncartafinanza2, valorizacion2=$valorizacion2, 
        fecartafinanza3=$fecartafinanza3, ncartafinanza3=$ncartafinanza3, valorizacion3=$valorizacion3, 
        fecartafinanza4=$fecartafinanza4, ncartafinanza4=$ncartafinanza4, valorizacion4=$valorizacion4, 
        fecartafinanza5=$fecartafinanza5, ncartafinanza5=$ncartafinanza5, valorizacion5=$valorizacion5,         
        idtusuario=$iddim_usuario, fActualizacion= $fecha_hora_update       
        WHERE iddim_CFinanzas=$iddim_CFinanzas";

    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";

    if ($conexionmysql->query($query)) {
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        //Cerramos la conexion
        // }
    } else {
        echo 'Error al Actualizar registro<br>';
        echo 'InicioPCalificar1: ', $InicioPCalificar1, '<br>';
        echo 'FinPCalificar1: ', $FinPCalificar1, '<br>';
        
        
        echo 'InicioPCalificar2: ', $InicioPCalificar2, '<br>';
        echo 'FinPCalificar2: ', $FinPCalificar2, '<br>';
       
        
        echo 'InicioPCalificar3: ', $InicioPCalificar3, '<br>';
        echo 'FinPCalificar3: ', $FinPCalificar3, '<br>';
       
        
        echo 'InicioPCalificar4: ', $InicioPCalificar4, '<br>';
        echo 'FinPCalificar4: ', $FinPCalificar4, '<br>';
        
        
        echo 'InicioPCalificar5: ', $InicioPCalificar5, '<br>';
        echo 'FinPCalificar5: ', $FinPCalificar5, '<br>';
        
        
        
        echo $fecha_hora_update, '<br>';
    }
}
?>