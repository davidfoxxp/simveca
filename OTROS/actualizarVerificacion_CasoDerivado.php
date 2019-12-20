<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

    $iddimmm = $_POST['iddim_Verificacion'];
    $iddim_Verificacion = "'$iddimmm'";
    
        
    
    if (empty($_POST['fechaRDerivado'])) {
        $fechaRDerivado = 'NULL';
    } else {
         $fechaRDerivadoo = $_POST['fechaRDerivado'];
         $fechaRDerivado = "'$fechaRDerivadoo'";
   }
   
   if (empty($_POST['fechaDDerivado'])) {
        $fechaDDerivado = 'NULL';
    } else {
        $fechaDDerivadoo = $_POST['fechaDDerivado'];
        $fechaDDerivado = "'$fechaDDerivadoo'";
    }
  
    
    
//    if (empty($_POST['ofi'])) {
//        $ofi = 'NULL';
//    } else {
//        $ofio = $_POST['ofi'];
//        $ofi = "'$ofio'";
//    }
    
    if (empty($_POST['cod'])) {
        $cod = 'NULL';
    } else {
        $codo = $_POST['cod'];
        $cod = "'$codo'";
    }
    
    $query0 = "SELECT ve.iddim_Verificacion, ase.iddim_aseguradoindevido, ov.ordenV, 
                ve.an_verifi, ve.num_verifi, ase.idDIM_Oficina, 
                ofi.cod_oficinaIni, ofi.codOficina, ofi.oficina,
                ase.dni_t,ase.autogenerado_t, ase.paterno_t,ase.materno_t, 
                ase.casada_t,ase.nombre1_t, ve.fechaDDerivado, ve.casoDerivado
                FROM sisgasv.dim_verificacion ve
                left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
                left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina
                left join dim_overificacion ov on ve.idTOverificacion=ov.iddim_Overificacion
                where ve.iddim_Verificacion=$iddim_Verificacion";
    
    $resultado0 = $conexionmysql->query($query0);
        
 while ($row0 = $resultado0->fetch_assoc()){
     $ordenV = $row0['ordenV'];
     $idDIM_Oficina = $row0['idDIM_Oficina'];    
     
    // $fechaDDerivado = $row0['fechaDDerivado'];
     
      if (empty($row0['fechaDDerivado'])) {
        $fechaDDerivado = 'NULL';
    } else {
        $fechaDDerivadoo = $row0['fechaDDerivado'];
        $fechaDDerivado = "'$fechaDDerivadoo'";
    }
     
   // $casoDerivado = $row0['casoDerivado'];  
    if (empty($row0['casoDerivado'])) {
        $casoDerivado = 'NULL';
    } else {
        $casoDerivadoo = $row0['casoDerivado'];
        $casoDerivado = "'$casoDerivadoo'";
    }
     
  
     
 
    
    

//    $idtusuarioo = $_POST['idtusuario'];
//    $idtusuario = "'$idtusuarioo'";

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

                       
    $query1 ="UPDATE dim_verificacion SET fechaDDerivado='2018-01-22', 
        casoDerivado='1044' 
        WHERE iddim_Verificacion='33683'";
  
    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";

    
    if ($conexionmysql->query($query1)) {
        //if ($conexion->query($query1)) {
        
        echo 'Se Actualizo Correctamente.';
//        $iddim_CPosterior="'$iddim_PaCalificar'";
//        require("formEditarPCalificar.php?iddim_CPosterior=".$iddim_CPosterior);
        ?><!-- <input type = "button" Value ="REGRESAR" onclick="parent.window.location.reload(true);">  <?php
        //Cerramos la conexion
        // }
        } else {
        echo 'Error al Actualizar registro<br>';
        echo 'idresolucion: ', $fechaRDerivado, '<br>';
        echo 'estado caso: ', $fechaDDerivado, '<br>';       
        //echo 'fecha e: ', $ofi, '<br>';
        echo 'fecha d: ', $cod, '<br>';
        echo 'numero de reso: ', $iddim_Verificacion, '<br>';       
              
        
        
        echo $fecha_hora_update, '<br>';
    }
        
 }
}
?>