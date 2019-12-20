<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_Verificacion = "'$iddimmm'";    
  
    if (empty($_POST['nuncartaini'])) {
        $nuncartaini = 'NULL';
    } else {
         $nuncartainii = $_POST['nuncartaini'];
         $nuncartaini = "'$nuncartainii'";
   }
 
    if (empty($_POST['fechaNPCInicioPSInh'])) {
        $fechaNPCInicioPSInh = 'NULL';
    } else {
        $fechaNPCInicioPSInhh = $_POST['fechaNPCInicioPSInh'];
        $fechaNPCInicioPSInh = "'$fechaNPCInicioPSInhh'";
    }
   
    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

    $query2 = "ALTER TABLE dim_inhabilitacion AUTO_INCREMENT = 1";

    //resolviendo una consulta con la clausula insert
    $query = "INSERT INTO dim_inhabilitacion 
            (iddim_ResBOficio, iddim_Inhabilitacion, 
            numCartaIni,fechaNPCInicioPSInh,
            idtusuario, fCreacion) 
            VALUES ($iddim_Verificacion,$iddim_Verificacion, 
            $nuncartaini,$fechaNPCInicioPSInh,        
            $iddim_usuario, $fecha_hora_update)";
                       
    
    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query)) {
        echo 'Se Actualizo Correctamente.';
        
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
        
        
        }
       } else {
        echo 'Error al Actualizar registro<br>';      
        echo $fecha_hora_update, '<br>';
    }
}
?>