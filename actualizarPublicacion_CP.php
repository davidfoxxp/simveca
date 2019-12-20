<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $seleccion1=0;
    $seleccion2=0;
    $seleccion3=0;
     
            
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $iddimmm = $_POST['iddim_CPosterior'];
    $iddim_CPosterior = "'$iddimmm'";    
  
//    $num_verifi = $_POST['num_verifi'];
    
    $dniait = $_POST['dniait'];
    
    $eempleadora = $_POST['eempleadora'];
    
    $codOficina = $_POST['codOficina'];   
    
     $resolucion = $_POST['publicar'];  
     
     $nResBRegistro = $_POST['nResBRegistro'];  
     
    $cod_oficinaIni = $_POST['cod_oficinaIni'];
    

   if (empty($_POST['femisionBRegistro'])) {
        $femisionBRegistro = 'NULL';
    } else {
        $femisionBRegistroo = $_POST['femisionBRegistro'];
        $femisionBRegistro = "'$femisionBRegistroo'";
    }
    
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
    
    /*********************************/
    if (!empty($_POST['seleccion1'])) {       
        $seleccion1 = $_POST['seleccion1'];
        
    }  
    if (!empty($_POST['seleccion2'])) {
        $seleccion2 = $_POST['seleccion2'];
    }
    if (!empty($_POST['seleccion3'])) {
        $seleccion3 = $_POST['seleccion3'];
    }
    
    /******************************  
     */
    
//    echo $seleccion1;
//    echo $seleccion2;
//    echo $seleccion3;
        
    if (empty($_POST['titularAcredita_dni'])) {
        $titularAcredita_dni = 'NULL';
    } else {
        $titularAcredita_dnii = $_POST['titularAcredita_dni'];
        $titularAcredita_dni = "$titularAcredita_dnii";
    }
    
    if (empty($_POST['titularAcredita_nombres'])) {
        $titularAcredita_nombres = 'NULL';
    } else {
        $titularAcredita_nombress = $_POST['titularAcredita_nombres'];
        $titularAcredita_nombres = "$titularAcredita_nombress";
    }
    
    if (empty($_POST['titularAcredita_vinculo'])) {
        $titularAcredita_vinculo = 'NULL';
    } else {
        $titularAcredita_vinculoo = $_POST['titularAcredita_vinculo'];
        $titularAcredita_vinculo = "$titularAcredita_vinculoo";
    }
  
        
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
    $nombrePDPubli= "P" . $resolucion . $dniait. $eempleadora. $cod_oficinaIni . "001"; 
    
    
    if($seleccion1==1 && $seleccion2==2){
    $nombrePDPubli1=$nombrePDPubli.'01';
    $nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

    $query1 = "INSERT INTO dim_publicacion
         (iddim_CPosterior,
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
         ($iddim_CPosterior,
         $femisionBRegistro,
         $fechanotiActo,
         $fechanotiActo2,
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         '$nResBRegistro',
        '1',
        '$nombrePDPubli1',
         $iddim_usuario,
         $fecha_hora_update)";
     $query = "INSERT INTO dim_publicacion
         (iddim_CPosterior,
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
         ($iddim_CPosterior,
         $femisionBRegistro,
         $fechanotiActo,
         $fechanotiActo2,
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         '$nResBRegistro',
        '2',
        '$nombrePDPubli2',
         $iddim_usuario,
         $fecha_hora_update)";

    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente. 12';
        }
        }
       } else {
        echo 'Error al Actualizar registro<br>'; 
    }
}
else
   if($seleccion1==1 && $seleccion2==0 && $seleccion3==0){
    $nombrePDPubli1=$nombrePDPubli.'01';
//    $nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

     $query1 = "INSERT INTO dim_publicacion
         (iddim_CPosterior,
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
         ($iddim_CPosterior,
         $femisionBRegistro,
         $fechanotiActo,
         $fechanotiActo2,             
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         '$nResBRegistro',
        '1',
        '$nombrePDPubli1',
         $iddim_usuario,
         $fecha_hora_update)";

                     
    
    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
       echo 'Se Actualizo Correctamente. 1';
//           echo $publicar;
//    echo "<br/>";
//    echo $fechaemi; 
        }        
       } else {
//              echo $publicar;
//    echo "<br/>";
//    echo $fechaemi; 
        echo 'Error al Actualizar registro<br>'; 
    }
}

if($seleccion1==0 && $seleccion2==2 && $seleccion3==0){
    //$nombrePDPubli1=$nombrePDPubli.'01';
    $nombrePDPubli2=$nombrePDPubli.'02';
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

     $query1 = "INSERT INTO dim_publicacion
         (iddim_CPosterior,
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
         ($iddim_CPosterior,
         $femisionBRegistro,
         $fechanotiActo,
         $fechanotiActo2,             
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         '$nResBRegistro',
        '2',
        '$nombrePDPubli2',
         $iddim_usuario,
         $fecha_hora_update)";

                     
    
    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
       echo 'Se Actualizo Correctamente. 2: ';
//           echo $publicar;
//    echo "<br/>";
//    echo $fechaemi; 
        }        
       } else {
//              echo $publicar;
//    echo "<br/>";
//    echo $fechaemi; 
        echo 'Error al Actualizar registro<br>'; 
    }
}
else
if($seleccion1==0 && $seleccion2==0 && $seleccion3==3){
//    if (isset($seleccion3)) {
//    $nombrePDPubli1=$nombrePDPubli.$titularAcredita_vinculo.$titularAcredita_dni.'03';
//    $nombrePDPubli1=$nombrePDPubli.'01';
    $nombrePDPubli1= "P" . $titularAcredita_vinculo . $resolucion .$titularAcredita_dni. $dniait. $cod_oficinaIni . "00103"; 
    $query2 = "ALTER TABLE dim_publicacion AUTO_INCREMENT = 1";

    $query1 = "INSERT INTO dim_publicacion
         (iddim_CPosterior,
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
         ($iddim_CPosterior,
         $femisionBRegistro,
         $fechanotiActo,
         $fechanotiActo2, 
         $fechapubliActoP,
         $fechapubliActoW,
         $fechapubliActoC,
         '$nResBRegistro',
        '3',
        '$nombrePDPubli1',
         $iddim_usuario,
         $fecha_hora_update)";
    
     
         if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query1)) {
        echo 'Se Actualizo Correctamente. 3 ';
        }
       } else {
        echo 'Error al Actualizar registro<br>'; 
    }
}

 
    
    
}
?>