<?php

if (isset($_POST['actualizar'])) {
     $cod_oficinaIni="";
    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    ///////////////////////RECEPCION
    if($_POST['radio']=='2') {        

    

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
  
//    if (empty($_POST['cod_oficinaIni'])) {
//        $cod_oficinaIni = 'NULL';
//    } else {
//        $cod_oficinaInio = $_POST['cod_oficinaIni'];
//        $cod_oficinaIni = "'$cod_oficinaInio'";
//    }
//        if (empty($_POST['ofi'])) {
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
   $query="SELECT ve.iddim_Verificacion,ase.iddim_aseguradoindevido,ov.ordenV,ve.an_verifi,ve.num_verifi,ase.idDIM_Oficina ,ofi.cod_oficinaIni, ofi.codOficina, ofi.oficina,
ase.dni_t,ase.autogenerado_t,ase.paterno_t,ase.materno_t,ase.casada_t,ase.nombre1_t FROM sisgasv.dim_verificacion ve
left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina

left join dim_overificacion ov on ve.iddim_Verificacion=ov.iddim_Overificacion
left join tipoverificacionperfil tpf on ve.idTVerificacion=tpf.idTVerificacion and ve.idTVerificacionPerfil=tpf.idTVerificacionPerfil
where ve.iddim_Verificacion=$cod and ve.idTVerificacion='2'";
    $resultado = $conexionmysql->query($query);
    while ($row = $resultado->fetch_assoc()){
    
        if (empty($row['cod_oficinaIni'])) {
        $cod_oficinaIni = 'NULL';
    } else {
        $cod_oficinaInio = $row['cod_oficinaIni'];
        $cod_oficinaIni = "'$cod_oficinaInio'";
    }
    }
        
  

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

                       
    $query1 ="UPDATE dim_verificacion SET 
    fechaRDerivado=$fechaRDerivado,
    fechaDDerivado=$fechaDDerivado,
    casoDerivado = $cod_oficinaIni,

    iddim_VerificacionDerivado=$cod, 
    fActualizacion=$fecha_hora_update 
    WHERE iddim_Verificacion=$iddim_Verificacion";     
    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";
 
    echo 'caso derivado: ', $cod_oficinaIni, '<br>';
    
    if ($conexionmysql->query($query1)) {
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//        $iddim_CPosterior="'$iddim_PaCalificar'";
//        require("formEditarPCalificar.php?iddim_CPosterior=".$iddim_CPosterior);
        ?><!-- <input type = "button" Value ="REGRESAR" onclick="parent.window.location.reload(true);">  <?php
        //Cerramos la conexion
        // }
        } else {
        echo 'Error al Actualizar registro<br>';
        echo 'idresolucion: ', $idTRRBRegistro, '<br>';
        echo 'estado caso: ', $idTEstadoActual, '<br>';       
        echo 'fecha e: ', $fechaEBO, '<br>';
        echo 'fecha d: ', $fechaDIF, '<br>';
        echo 'numero de reso: ', $numResBOficio, '<br>';       
              
        
        
        echo $fecha_hora_update, '<br>';
    }
    } 
    else /////////////////////ENVIO
        {

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

    
   
    
    
        if (empty($_POST['ofi'])) {
        $ofi = 'NULL';
    } else {
        $ofio = $_POST['ofi'];
        $ofi = "'$ofio'";
    }

    if (empty($_POST['cod'])) {
        $cod = 'NULL';
    } else {
        $codo = $_POST['cod'];
        $cod = "'$codo'";
    }

//        if (empty($_POST['idVerificaDe'])) {
//        $idVerificaDe = 'NULL';
//    } else {
//        $idVerificaDee = $_POST['idVerificaDe'];
//        $idVerificaDe = "'$idVerificaDee'";
//    }


    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";

    $query3="SELECT a.iddim_Verificacion,a.fechaRDerivado,a.fechaDDerivado,a.casoDerivado,a.iddim_VerificacionDerivado 
    FROM sisgasv.dim_verificacion a where a.iddim_Verificacion=$iddim_Verificacion";
    $resultado3 = $conexionmysql->query($query3);
    while ($row3 = $resultado3->fetch_assoc()){
    
        if (is_null($row3['casoDerivado'])) {
     $query1 ="UPDATE dim_verificacion SET 
    fechaRDerivado=$fechaRDerivado,
    fechaDDerivado=$fechaDDerivado,
    casoDerivado = $ofi,
    iddim_VerificacionDerivado=$cod, 
    fActualizacion=$fecha_hora_update 
    WHERE iddim_Verificacion=$iddim_Verificacion";     
        }
        else {
             $query1 ="UPDATE dim_verificacion SET 
    fechaDDerivado=$fechaDDerivado   
    WHERE iddim_Verificacion=$iddim_Verificacion";   
        }
        
    }
     
    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";
    
    if ($conexionmysql->query($query1)) {
        //if ($conexion->query($query1)) {
        echo 'Se Actualizo Correctamente.';
        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
//        $iddim_CPosterior="'$iddim_PaCalificar'";
//        require("formEditarPCalificar.php?iddim_CPosterior=".$iddim_CPosterior);
        ?><!-- <input type = "button" Value ="REGRESAR" onclick="parent.window.location.reload(true);">  <?php
        //Cerramos la conexion
        // }
        } else {
        echo 'Error al Actualizar registro<br>';
        echo 'idresolucion: ', $idTRRBRegistro, '<br>';
        echo 'estado caso: ', $idTEstadoActual, '<br>';       
        echo 'fecha e: ', $fechaEBO, '<br>';
        echo 'fecha d: ', $fechaDIF, '<br>';
        echo 'numero de reso: ', $numResBOficio, '<br>';       
              
        
        
        echo $fecha_hora_update, '<br>';
    }
    }         
 }
?>