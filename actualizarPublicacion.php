<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_Verificacion = "'$iddimmm'";    
  
    $num_verifi = $_POST['num_verifi'];
    
    $dniait = $_POST['dniait'];
    
    $eempleadora = $_POST['eempleadora'];
    
    $codOficina = $_POST['codOficina'];   
    
                        
    $cod_oficinaIni = $_POST['cod_oficinaIni'];
    
    
    list($publicarr, $fechaemi) = explode(',',$_POST['fecharesoluciones']);
    $publicar="'$publicarr'";
    $fechaemiActo="'$fechaemi'";

//   if (empty($_POST['fechaemiActo'])) {
//        $fechaemiActo = 'NULL';
//    } else {
//        $fechaemiActon = $_POST['fechaemiActo'];
//        $fechaemiActo = "'$fechaemiActon'";
//    }
    
    if (empty($_POST['fechanotiActo'])) {
        $fechanotiActo = 'NULL';
    } else {
        $fechanotiActoh = $_POST['fechanotiActo'];
        $fechanotiActo = "'$fechanotiActoh'";
    }
    
    if (empty($_POST['fechanotiActo2'])) {
        $fechanotiActo2 = 'NULL';
    } else {
        $fechanotiActoh2 = $_POST['fechanotiActo2'];
        $fechanotiActo2 = "'$fechanotiActoh2'";
    }
  
    if (empty($_POST['fechapubliActoP'])) {
        $fechapubliActoP = 'NULL';
    } else {
        $fechapubliActoh = $_POST['fechapubliActoP'];
        $fechapubliActoP = "'$fechapubliActoh'";
    }
    
    if (empty($_POST['fechapubliActoW'])) {
        $fechapubliActoW = 'NULL';
    } else {
        $fechapubliActoWh = $_POST['fechapubliActoW'];
        $fechapubliActoW = "'$fechapubliActoWh'";
    }
    
    if (empty($_POST['fechapubliActoC'])) {
        $fechapubliActoC = 'NULL';
    } else {
        $fechapubliActoCh = $_POST['fechapubliActoC'];
        $fechapubliActoC = "'$fechapubliActoCh'";
    }
    
    
   if(isset($_POST['seleccion'])){
       $array = $_POST['seleccion'];
       if(empty($array[0])){
        $array[0] = NULL;
        }
        if(empty($array[1])){
        $array[1] = NULL;
        }
        $asegurado = $array[0];
        $empleador = $array[1];
        
   }
   
   


    $rest = substr($publicar, -8,3);
    $rest1 = substr($publicar, -4,3);
    if($rest=='084')
    {
       $nombrePDPubli= "P084" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    } 
    else if($rest=='085')
    {
       $nombrePDPubli= "P085" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    }
    else if($rest=='086')
    {
       $nombrePDPubli= "P086" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    }
    else if($rest=='087')
    {
       $nombrePDPubli= "P087" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    }
    else if($rest=='047')
    {
       $nombrePDPubli= "P047" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    }
    else if($rest=='048')
    {
       $nombrePDPubli= "P048" . $num_verifi . $dniait. $eempleadora. $cod_oficinaIni . $rest1; 
    }
    
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
if(!is_null($asegurado) && !is_null($empleador)){
    $nombrePDPubli1=$nombrePDPubli.'01';
    $nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

    $query1 = "INSERT INTO dim_publicacion
         (iddim_Verificacion,
         femision,
         fnotificacion,
         fnotificacion_v,
         fpublicacion_p,
         fpublicacion_e,
         fpublicacion_c,
         resolucionpublicada,
         tipo_registro,
         nombrePDPubli,
         idtusuario, 
         fCreacion) 
         VALUES 
         ($iddim_Verificacion,
         $fechaemiActo,
         $fechanotiActo,
         $fechanotiActo2,
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         $publicar,
         '".$asegurado."',
         '$nombrePDPubli1',
         $iddim_usuario,
         $fecha_hora_update)";
     $query = "INSERT INTO dim_publicacion
         (iddim_Verificacion,
         femision,
         fnotificacion,
         fnotificacion_v,       
         fpublicacion_p,
         fpublicacion_e,
         fpublicacion_c,
         resolucionpublicada,
         tipo_registro,
         nombrePDPubli,
         idtusuario, 
         fCreacion) 
         VALUES 
         ($iddim_Verificacion,
         $fechaemiActo,
         $fechanotiActo,
         $fechanotiActo2,             
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         $publicar,
         '".$empleador."',
         '$nombrePDPubli2',
         $iddim_usuario,
         $fecha_hora_update)";

    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        }
        }
       } else {
        echo 'Error al Actualizar registro<br>'; 
    }
}else if(!is_null($asegurado) && is_null($empleador)){
    $nombrePDPubli1=$nombrePDPubli.'01';
    //$nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

    $query1 = "INSERT INTO dim_publicacion
         (iddim_Verificacion,
         femision,
         fnotificacion,
         fnotificacion_v,    
         fpublicacion_p,
         fpublicacion_e,
         fpublicacion_c,
         resolucionpublicada,
         tipo_registro,
         nombrePDPubli,
         idtusuario, 
         fCreacion) 
         VALUES 
         ($iddim_Verificacion,
         $fechaemiActo,
         $fechanotiActo,
         $fechanotiActo2,             
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         $publicar,
         '".$asegurado."',
         '$nombrePDPubli1',
         $iddim_usuario,
         $fecha_hora_update)";
    
     
         if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        }
       } else {
        echo 'Error al Actualizar registro<br>'; 
    }
}

else if(!is_null($empleador)&& is_null($asegurado)){
    //$nombrePDPubli1=$nombrePDPubli.'01';
    $nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

     $query = "INSERT INTO dim_publicacion
         (iddim_Verificacion,
         femision,
         fnotificacion,
         fnotificacion_v,     
         fpublicacion_p,
         fpublicacion_e,
         fpublicacion_c,
         resolucionpublicada,
         tipo_registro,
         nombrePDPubli,
         idtusuario, 
         fCreacion) 
         VALUES 
         ($iddim_Verificacion,
         $fechaemiActo,
         $fechanotiActo,
         $fechanotiActo2,             
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         $publicar,
         '".$empleador."',
         '$nombrePDPubli2',
         $iddim_usuario,
         $fecha_hora_update)";

                     
    
    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
           echo $publicar;
    echo "<br/>";
    echo $fechaemi; 
        }        
       } else {
              echo $publicar;
    echo "<br/>";
    echo $fechaemi; 
        echo 'Error al Actualizar registro<br>'; 
    }
}
    
    
    
}
?>