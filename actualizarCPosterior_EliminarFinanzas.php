<?php

if (isset($_POST['eliminarF'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddimm = $_POST['iddim_CPosterior'];
//    $iddim_CPosterior = "$iddimm";

    
    if (!empty($_POST['iddim_CPosterior'])) {
        
        $query1 = "SELECT count(*) total FROM dim_cfinanzas a where a.iddim_CPosterior='$iddimm'";
        
        $result1 = $conexionmysql->query($query1);
            //recorriendo el conjunto de resultados con un bucle
            while ($fila1 = $result1->fetch_assoc()) {
                $existe = $fila1['total'];
            }
            
            if($existe==1) {
        
            $query0="UPDATE dim_cfinanzas SET 
                fecartafinanza1=NULL, ncartafinanza1=NULL, valorizacion1=NULL, 
                fecartafinanza2=NULL, ncartafinanza2=NULL, valorizacion2=NULL, 
                fecartafinanza3=NULL, ncartafinanza3=NULL, valorizacion3=NULL, 
                fecartafinanza4=NULL, ncartafinanza4=NULL, valorizacion4=NULL, 
                fecartafinanza5=NULL, ncartafinanza5=NULL, valorizacion5=NULL 
                WHERE iddim_CFinanzas='$iddimm'";         
            }
            else
            {
                $query0 = "INSERT dim_cfinanzas (`iddim_CPosterior`) VALUES ('$iddimm')";
            }


         if ($conexionmysql->query($query0)) {

          echo 'Se Elimino Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
              }
      }   
}
?>