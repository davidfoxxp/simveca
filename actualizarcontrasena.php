<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
              
    $iddim_usuario = $_POST['iddim_usuario'];
    
    ////////////////////////////////////////////1
    $CONTRAANTE=$_POST['contrasenaante'];
    $CONTRAANTEE="'$CONTRAANTE'";
    $NUEVACONTRA= $_POST['nuevacontrasena'];
    //resolviendo una consulta con la clausula insert
    $query = "UPDATE dim_usuario SET 
              pass='".$NUEVACONTRA."'
              WHERE iddim_usuario=$iddim_usuario and pass=$CONTRAANTEE";

   // $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";
 
    if ($conexionmysql->query($query)){
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        //Cerramos la conexion
        // }
    } else {
                
        echo 'Error al Actualizar registro<br>';
        echo '$iddim_usuario', $iddim_usuario, '<br>';
        echo '$NUEVACONTRA', $pass, '<br>';
        
    }
}
?>