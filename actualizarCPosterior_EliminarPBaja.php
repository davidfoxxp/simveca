<?php

if (isset($_POST['eliminar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddimm = $_POST['iddim_CPosterior'];
//    $iddim_CPosterior = "$iddimm";
    

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
    if (!empty($_POST['iddim_CPosterior'])) {
    
        $query0="delete FROM dim_pacalificar_new
                where iddim_aseguradoindevido in ($iddimm)"; 

    
        $query1="delete FROM dim_paevaluar_new
                where iddim_aseguradoindevido in ($iddimm)"; 

         if ($conexionmysql->query($query0)) {
    
         if ($conexionmysql->query($query1)) {
          echo 'Se Elimino Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
          
              }} 
      }    
}
?>