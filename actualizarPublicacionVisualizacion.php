<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $iddimmm = $_POST['iddim_Publicacion'];
    $iddim_Publicacion = "'$iddimmm'";    
  

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
    
       
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');    
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
    $query = "UPDATE dim_publicacion SET 
              fnotificacion=$fechanotiActo,
              fnotificacion_v=$fechanotiActo2,
              fpublicacion_p=$fechapubliActoP,
              fpublicacion_e=$fechapubliActoW,
              fpublicacion_c=$fechapubliActoC,
              idtusuarioActu=$iddim_usuario,
              fActualizacion=$fecha_hora_update
              WHERE iddim_Publicacion=$iddim_Publicacion";

    
  
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        }        
       else {
        echo 'Error al Actualizar registro<br>'; 
    }
}
    
    
   
?>