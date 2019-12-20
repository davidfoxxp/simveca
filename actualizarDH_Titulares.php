<?php

if (isset($_POST['registrar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
              
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $SCCMVTFTT = $_POST['SCCMVTFT'];
    $SCCMVTFT = "'$SCCMVTFTT'";
      
   date_default_timezone_set('America/Bogota');
$fecha_hora_updateo = date('Y-m-d G:i:s');
$fecha_hora_update = "'$fecha_hora_updateo'";
  


 if(empty($_POST['vinculo0'])){
$_POST['vinculo0'] = null;
} 
    
   
 if(empty($_POST['dh0'])){
$_POST['dh0'] = null;
} 



 if(empty($_POST['nom0'])){
$_POST['nom0'] = null;
} 

    $VINCULO_0 =$_POST['vinculo0'];
    
    $dh0 = $_POST['dh0'];
    
    $nom0 = $_POST['nom0'];
    
 
} 

if (!is_null($dh0)){
      $query5 = "ALTER TABLE dim_sccmvtft AUTO_INCREMENT = 1";

$query = "INSERT INTO dim_sccmvtft (iddim_aseguradoindevido, VINCULO_0, DNI_DH_0, APELLIDO_NOMBRE_0,
            fCreacion, idtusuario) 
            VALUES ($SCCMVTFT, '".$VINCULO_0."', '".$dh0."', '".$nom0."', 
            $fecha_hora_update, $iddim_usuario)";

if ($conexionmysql->query($query5)) {
if ($conexionmysql->query($query)) {
 }
}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}  


?>









<?php

if (isset($_POST['eliminar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
              
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $SCCMVTFTT = $_POST['SCCMVTFT'];
    $SCCMVTFT = "'$SCCMVTFTT'";
        
    ////////////////////////////////////////////1
      
     if (empty($_POST['vinculo'])) {
        $VINCULO_0 = 'NULL';
    } else{
        $VINCULO_00 = $_POST['vinculo0'];
        $VINCULO_0 = 'NULL';
    }
    
    if (empty($_POST['dh0'])) {
        $dh0 = 'NULL';
    } else {
        $dh00 = $_POST['dh0'];
        $dh0 = 'NULL';
    }
    
    if (empty($_POST['nom0'])) {
        $nom0 = 'NULL';
    } else {
        $nom00 = $_POST['nom0'];
        $nom0 = 'NULL';
    }
    
    //////////////////////////////////////////////2
        
     if (empty($_POST['vinculo1'])) {
        $VINCULO_1 = 'NULL';
    } else {
        $VINCULO_11 = $_POST['vinculo1'];
        $VINCULO_1 = 'NULL';
    }
    
    if (empty($_POST['dh1'])) {
        $dh1 = 'NULL';
    } else {
        $dh11 = $_POST['dh1'];
        $dh1 = 'NULL';
    }
    
    if (empty($_POST['nom1'])) {
        $nom1 = 'NULL';
    } else {
        $nom11 = $_POST['nom1'];
        $nom1 = 'NULL';
    }

/////////////////////////////////////////3
    if (empty($_POST['vinculo2'])) {
        $VINCULO_2 = 'NULL';
    } else {
        $VINCULO_22 = $_POST['vinculo2'];
        $VINCULO_2 = 'NULL';
    }
    
    if (empty($_POST['dh2'])) {
        $dh2 = 'NULL';
    } else {
        $dh22 = $_POST['dh2'];
        $dh2 = 'NULL';
    }
    
    if (empty($_POST['nom2'])) {
        $nom2 = 'NULL';
    } else {
        $nom22 = $_POST['nom2'];
        $nom2 = 'NULL';
    }
    
 //////////////////////////////////////4   

    if (empty($_POST['vinculo3'])) {
        $VINCULO_3 ='NULL';
    } else {
        $VINCULO_33 = $_POST['vinculo3'];
        $VINCULO_3 = 'NULL';
    }
    
    if (empty($_POST['dh3'])) {
        $dh3 = 'NULL';
    } else {
        $dh33 = $_POST['dh3'];
        $dh3 = 'NULL';
    }
    
    if (empty($_POST['nom3'])) {
        $nom3 = 'NULL';
    } else {
        $nom33 = $_POST['nom3'];
        $nom3 = 'NULL';
    }
    
/////////////////////////////////////////////////////5
    if (empty($_POST['vinculo4'])) {
        $VINCULO_4 = 'NULL';
    } else {
        $VINCULO_44 = $_POST['vinculo4'];
        $VINCULO_4 = 'NULL';
    }
    
    if (empty($_POST['dh4'])) {
        $dh4 = 'NULL';
    } else {
        $dh44 = $_POST['dh4'];
        $dh4 = 'NULL';
    }
    
    if (empty($_POST['nom4'])) {
        $nom4 = 'NULL';
    } else {
        $nom44 = $_POST['nom4'];
        $nom4 = 'NULL';
    }


//    $idtusuarioo = $_POST['idtusuario'];
//    $idtusuario = "'$idtusuarioo'";

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    //resolviendo una consulta con la clausula insert
    $query = "UPDATE dim_sccmvtft SET 
              VINCULO_0=$VINCULO_0, DNI_DH_0=$dh0, APELLIDO_NOMBRE_0=$nom0,
              VINCULO_1=$VINCULO_1, DNI_DH_1=$dh1, APELLIDO_NOMBRE_1=$nom1,
              VINCULO_2=$VINCULO_2, DNI_DH_2=$dh2, APELLIDO_NOMBRE_2=$nom2,
              VINCULO_3=$VINCULO_3, DNI_DH_3=$dh3, APELLIDO_NOMBRE_3=$nom3,
              VINCULO_4=$VINCULO_4, DNI_DH_4=$dh4, APELLIDO_NOMBRE_4=$nom4,
              fCreacion=$fecha_hora_update, idtusuario=$iddim_usuario
              WHERE SCCMVTFT=$SCCMVTFT";

   // $query = "UPDATE `sisgasv`.`dim_sccmvtft` SET `APELLIDO_NOMBRE_0`='ESPICHAN MORENO DAVID', `VINCULO_1`=$VINCULO_0, `DNI_DH_1`=$dh0, `APELLIDO_NOMBRE_1`='$nom0', `VINCULO_2`='C' WHERE `SCCMVTFT`='7817'";

    if ($conexionmysql->query($query)) {
        //if ($conexion->query($query1)) {
        echo 'Se Eliminaron todos los Dechohabientes Correctamente.';
        //Cerramos la conexion
        // }
    } else {
        
        
        echo 'Error al Actualizar registro<br>';
        
        echo '$iddim_usuario', $iddim_usuario, '<br>';
        echo '$VINCULO_0: ', $VINCULO_0, '<br>';
        echo '$VINCULO_1: ', $VINCULO_1, '<br>';
        echo '$VINCULO_0: ', $VINCULO_2, '<br>';
        echo '$VINCULO_1: ', $VINCULO_4, '<br>';
        
        
        echo '$dh0: ', $dh0, '<br>';
        echo '$dh1: ', $dh1, '<br>';
        echo '$dh2: ', $dh2, '<br>';
        echo '$dh3: ', $dh3, '<br>';
        
    
        echo $fecha_hora_update, '<br>';
    }
}
?>