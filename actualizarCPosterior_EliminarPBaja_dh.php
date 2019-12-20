<?php

if (isset($_POST['eliminar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddimm = $_POST['SCCMVTFT'];
//    $iddim_CPosterior = "$iddimm";
    
    if (!empty($_POST['SCCMVTFT'])) {
    
        $query0="delete FROM dim_pacalificar_new_dh
                where SCCMVTFT in ($iddimm)"; 
    
        $query1="delete FROM dim_paevaluar_new_dh
                where SCCMVTFT in ($iddimm)"; 
        
         if ($conexionmysql->query($query0)) {
    
         if ($conexionmysql->query($query1)) {
          echo 'Se Elimino Correctamente.';
              }} 
      }    
}
?>