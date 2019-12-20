<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

    $iddimm = $_POST['iddim_PaCalificar'];
    $iddim_PaCalificar = "'$iddimm'";
    
    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_Verificacion = "'$iddimmm'";
    
        //1
    if (empty($_POST['InicioPEvaluar'])) {
        $InicioPEvaluar = 'NULL';
    } else {
        $InicioPEvaluarr = $_POST['InicioPEvaluar'];
        $InicioPEvaluar = "'$InicioPEvaluarr'";
    }
//2
    if (empty($_POST['FinPEvaluar'])) {
        $FinPEvaluar = 'NULL';
    } else {
        $FinPEvaluarr = $_POST['FinPEvaluar'];
        $FinPEvaluar = "'$FinPEvaluarr'";
    }

//1
    if (empty($_POST['InicioPCalificar1'])) {
        $InicioPCalificar1 = 'NULL';
    } else {
        $InicioPCalificar11 = $_POST['InicioPCalificar1'];
        $InicioPCalificar1 = "'$InicioPCalificar11'";
    }
//2
    if (empty($_POST['FinPCalificar1'])) {
        $FinPCalificar1 = 'NULL';
    } else {
        $FinPCalificar11 = $_POST['FinPCalificar1'];
        $FinPCalificar1 = "'$FinPCalificar11'";
    }

    
 ///////////////////////////////////////////////
 //
//1
    if (empty($_POST['InicioPCalificar2'])) {
        $InicioPCalificar2 = 'NULL';
    } else {
        $InicioPCalificar22 = $_POST['InicioPCalificar2'];
        $InicioPCalificar2 = "'$InicioPCalificar22'";
    }
//2
    if (empty($_POST['FinPCalificar2'])) {
        $FinPCalificar2 = 'NULL';
    } else {
        $FinPCalificar22 = $_POST['FinPCalificar2'];
        $FinPCalificar2 = "'$FinPCalificar22'";
    }

    
    ////////////////////////////////////////

    //1
    if (empty($_POST['InicioPCalificar3'])) {
        $InicioPCalificar3 = 'NULL';
    } else {
        $InicioPCalificar33 = $_POST['InicioPCalificar3'];
        $InicioPCalificar3 = "'$InicioPCalificar33'";
    }
//2
    if (empty($_POST['FinPCalificar3'])) {
        $FinPCalificar3 = 'NULL';
    } else {
        $FinPCalificar33 = $_POST['FinPCalificar3'];
        $FinPCalificar3 = "'$FinPCalificar33'";
    }

/////////////////////////////////
    
    //1
    if (empty($_POST['InicioPCalificar4'])) {
        $InicioPCalificar4 = 'NULL';
    } else {
        $InicioPCalificar44 = $_POST['InicioPCalificar4'];
        $InicioPCalificar4 = "'$InicioPCalificar44'";
    }
//2
    if (empty($_POST['FinPCalificar4'])) {
        $FinPCalificar4 = 'NULL';
    } else {
        $FinPCalificar44 = $_POST['FinPCalificar4'];
        $FinPCalificar4 = "'$FinPCalificar44'";
    }

    
    ///////////////////////////////////////////
    
    //1
    if (empty($_POST['InicioPCalificar5'])) {
        $InicioPCalificar5 = 'NULL';
    } else {
        $InicioPCalificar55 = $_POST['InicioPCalificar5'];
        $InicioPCalificar5 = "'$InicioPCalificar55'";
    }
//2
    if (empty($_POST['FinPCalificar5'])) {
        $FinPCalificar5 = 'NULL';
    } else {
        $FinPCalificar55 = $_POST['FinPCalificar5'];
        $FinPCalificar5 = "'$FinPCalificar55'";
    }
    
    ///////////////////////////////////////////
    
    
    
    //1
    if (empty($_POST['InicioPCalificar6'])) {
        $InicioPCalificar6 = 'NULL';
    } else {
        $InicioPCalificar66 = $_POST['InicioPCalificar6'];
        $InicioPCalificar6 = "'$InicioPCalificar66'";
    }
//2
    if (empty($_POST['FinPCalificar6'])) {
        $FinPCalificar6 = 'NULL';
    } else {
        $FinPCalificar66 = $_POST['FinPCalificar6'];
        $FinPCalificar6 = "'$FinPCalificar66'";
    }

    
 ///////////////////////////////////////////////
 //
//1
    if (empty($_POST['InicioPCalificar7'])) {
        $InicioPCalificar7 = 'NULL';
    } else {
        $InicioPCalificar77 = $_POST['InicioPCalificar7'];
        $InicioPCalificar7 = "'$InicioPCalificar77'";
    }
//2
    if (empty($_POST['FinPCalificar7'])) {
        $FinPCalificar7 = 'NULL';
    } else {
        $FinPCalificar77 = $_POST['FinPCalificar7'];
        $FinPCalificar7 = "'$FinPCalificar77'";
    }

    
    ////////////////////////////////////////

    //1
    if (empty($_POST['InicioPCalificar8'])) {
        $InicioPCalificar8 = 'NULL';
    } else {
        $InicioPCalificar88 = $_POST['InicioPCalificar8'];
        $InicioPCalificar8 = "'$InicioPCalificar88'";
    }
//2
    if (empty($_POST['FinPCalificar8'])) {
        $FinPCalificar8 = 'NULL';
    } else {
        $FinPCalificar88 = $_POST['FinPCalificar8'];
        $FinPCalificar8 = "'$FinPCalificar88'";
    }

/////////////////////////////////
    
    //1
    if (empty($_POST['InicioPCalificar9'])) {
        $InicioPCalificar9 = 'NULL';
    } else {
        $InicioPCalificar99 = $_POST['InicioPCalificar9'];
        $InicioPCalificar9 = "'$InicioPCalificar99'";
    }
//2
    if (empty($_POST['FinPCalificar9'])) {
        $FinPCalificar9 = 'NULL';
    } else {
        $FinPCalificar99 = $_POST['FinPCalificar9'];
        $FinPCalificar9 = "'$FinPCalificar99'";
    }

    
    ///////////////////////////////////////////
    
    //1
    if (empty($_POST['InicioPCalificar10'])) {
        $InicioPCalificar10 = 'NULL';
    } else {
        $InicioPCalificar101 = $_POST['InicioPCalificar10'];
        $InicioPCalificar10 = "'$InicioPCalificar101'";
    }
//2
    if (empty($_POST['FinPCalificar10'])) {
        $FinPCalificar10 = 'NULL';
    } else {
        $FinPCalificar101 = $_POST['FinPCalificar101'];
        $FinPCalificar10 = "'$FinPCalificar101'";
    }
    
    ///////////////////////////////////////////
    
    
    
    
    ///////////////////////////////////////////
    //1
    if (empty($_POST['InicioPFinal'])) {
        $InicioPFinal = 'NULL';
    } else {
        $InicioPFinall = $_POST['InicioPFinal'];
        $InicioPFinal = "'$InicioPFinall'";
    }
//2
    if (empty($_POST['FinPFinal'])) {
        $FinPFinal = 'NULL';
    } else {
        $FinPFinall = $_POST['FinPFinal'];
        $FinPFinal = "'$FinPFinall'";
    }
    
//    $idtusuarioo = $_POST['idtusuario'];
//    $idtusuario = "'$idtusuarioo'";

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    //resolviendo una consulta con la clausula insert
    $query = "UPDATE dim_pacalificar SET 
        InicioPEvaluar=$InicioPEvaluar, FinPEvaluar=$FinPEvaluar,
        InicioPCalificar1=$InicioPCalificar1, FinPCalificar1=$FinPCalificar1, 
        InicioPCalificar2=$InicioPCalificar2, FinPCalificar2=$FinPCalificar2, 
        InicioPCalificar3=$InicioPCalificar3, FinPCalificar3=$FinPCalificar3, 
        InicioPCalificar4=$InicioPCalificar4, FinPCalificar4=$FinPCalificar4, 
        InicioPCalificar5=$InicioPCalificar5, FinPCalificar5=$FinPCalificar5,
            
        InicioPCalificar6=$InicioPCalificar6, FinPCalificar6=$FinPCalificar6, 
        InicioPCalificar7=$InicioPCalificar7, FinPCalificar7=$FinPCalificar7, 
        InicioPCalificar8=$InicioPCalificar8, FinPCalificar8=$FinPCalificar8, 
        InicioPCalificar9=$InicioPCalificar9, FinPCalificar9=$FinPCalificar9, 
        InicioPCalificar10=$InicioPCalificar10, FinPCalificar10=$FinPCalificar10,
            
        InicioPFinal=$InicioPFinal, FinPFinal=$FinPFinal,
        idtusuario=$iddim_usuario, fActualizacion= $fecha_hora_update       
        WHERE iddim_PaCalificar=$iddim_PaCalificar";

    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";

    if ($conexionmysql->query($query)) {
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
//        $iddim_CPosterior="'$iddim_PaCalificar'";
//        require("formEditarPCalificar.php?iddim_CPosterior=".$iddim_CPosterior);
        ?><!-- <input type = "button" Value ="REGRESAR" onclick="parent.window.location.reload(true);">  <?php
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
        echo 'numeor de re: ', $num_reso, '<br>';
        
        
        
        echo $fecha_hora_update, '<br>';
    }
}
?>