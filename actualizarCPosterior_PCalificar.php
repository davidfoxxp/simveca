<?php

if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');
    
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

    $iddimm = $_POST['iddim_PaCalificar'];
    $iddim_PaCalificar = "'$iddimm'";
    


        $InicioPCalificar1 = $_POST['InicioPCalificar1'];
        $FinPCalificar1 = $_POST['FinPCalificar1'];

 ///////////////////////////////////////////////


        $InicioPCalificar2 = $_POST['InicioPCalificar2'];
        $FinPCalificar2= $_POST['FinPCalificar2'];

    
    ////////////////////////////////////////

        

        $InicioPCalificar3 = $_POST['InicioPCalificar3'];
        $FinPCalificar3 = $_POST['FinPCalificar3'];


/////////////////////////////////
  

        $InicioPCalificar4 = $_POST['InicioPCalificar4'];
        $FinPCalificar4 = $_POST['FinPCalificar4'];

    
    ///////////////////////////////////////////
    


        $InicioPCalificar5 = $_POST['InicioPCalificar5'];
        $FinPCalificar5 = $_POST['FinPCalificar5'];

    
    ///////////////////////////////////////////
        
            ///////////////////////////////////////////
    


        $InicioPCalificar6 = $_POST['InicioPCalificar6'];
        $FinPCalificar6 = $_POST['FinPCalificar6'];

    
        $InicioPCalificar7 = $_POST['InicioPCalificar7'];
        $FinPCalificar7 = $_POST['FinPCalificar7'];

    
    ///////////////////////////////////////////
        
            ///////////////////////////////////////////
    


        $InicioPCalificar8 = $_POST['InicioPCalificar8'];
        $FinPCalificar8 = $_POST['FinPCalificar8'];
    ///////////////////////////////////////////
        
            ///////////////////////////////////////////
    


        $InicioPCalificar9 = $_POST['InicioPCalificar9'];
        $FinPCalificar9 = $_POST['FinPCalificar9'];

    
    ///////////////////////////////////////////
        
            ///////////////////////////////////////////
    


        $InicioPCalificar10 = $_POST['InicioPCalificar10'];
        $FinPCalificar10 = $_POST['FinPCalificar10'];

    
    ///////////////////////////////////////////

    
        $FinPFinal = $_POST['FinPFinal'];
        $InicioPFinal = $_POST['InicioPFinal'];

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
    
    if (!empty($_POST['InicioPCalificar10'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";      
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query6="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar6', '$FinPCalificar6',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query7="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar7', '$FinPCalificar7',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query8="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar8', '$FinPCalificar8',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query9="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar9', '$FinPCalificar9',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query10="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar10', '$FinPCalificar10',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($query6)) {
                              if ($conexionmysql->query($query7)) {
                                  if ($conexionmysql->query($query8)) {
                                       if ($conexionmysql->query($query9)) {
                                           if ($conexionmysql->query($query10)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                                           }}}
    }}}}}}}}}}
    }
    else 
     if (!empty($_POST['InicioPCalificar9'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";      
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query6="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar6', '$FinPCalificar6',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query7="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar7', '$FinPCalificar7',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query8="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar8', '$FinPCalificar8',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query9="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar9', '$FinPCalificar9',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($query6)) {
                              if ($conexionmysql->query($query7)) {
                                  if ($conexionmysql->query($query8)) {
                                       if ($conexionmysql->query($query9)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                      }}
    }}}}}}}}}}
    }
    else 
    if (!empty($_POST['InicioPCalificar8'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";      
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query6="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar6', '$FinPCalificar6',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query7="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar7', '$FinPCalificar7',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query8="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar8', '$FinPCalificar8',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($query6)) {
                              if ($conexionmysql->query($query7)) {
                                  if ($conexionmysql->query($query8)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                      }}
    }}}}}}}}}
    }
    else
    if (!empty($_POST['InicioPCalificar7'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";      
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query6="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar6', '$FinPCalificar6',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query7="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar7', '$FinPCalificar7',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($query6)) {
                              if ($conexionmysql->query($query7)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                      }}
    }}}}}}}}
    }
    else 
    if (!empty($_POST['InicioPCalificar6'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
     
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query6="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar6', '$FinPCalificar6',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($query6)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                      }}
    }}}}}}}
    }
    else 
if (!empty($_POST['InicioPCalificar5'])) {
        
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";   
      
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
     
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar5', '$FinPCalificar5',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 

    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($query5)) {
                          if ($conexionmysql->query($querynn)) {
                          if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                      }}
    }}}}}}
    }
    else    
    
    if (!empty($_POST['InicioPCalificar4'])) {
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";
        
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
    $query4="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar4', '$FinPCalificar4',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($query4)) {
                      if ($conexionmysql->query($querynn)) {
                      if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
      }
    }}}}}}
    }
    else
    if (!empty($_POST['InicioPCalificar3'])) {
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";
        
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
        
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
                
    $query3="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar3', '$FinPCalificar3',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";   
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
     
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal','$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
          if ($conexionmysql->query($query2)) {
              if ($conexionmysql->query($query3)) {
                  if ($conexionmysql->query($querynn)) {
                  if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
          }}}}
      }}
    }
    else 
if (!empty($_POST['InicioPCalificar2'])) {
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";
        
        $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    $query2="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar2', '$FinPCalificar2',        
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";  
    
     $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
           if ($conexionmysql->query($query2)) {
               if ($conexionmysql->query($querynn)) {
         if ($conexionmysql->query($query0)) {
         
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
         }}
    }}}
    }
    else    
    if (!empty($_POST['InicioPCalificar1'])) {
    $queryn = "ALTER TABLE dim_pacalificar_new AUTO_INCREMENT = 1";
   
    $query1="INSERT INTO dim_pacalificar_new 
        (`iddim_aseguradoindevido`, 
        `InicioPCalificar1`, `FinPCalificar1`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar, 
        '$InicioPCalificar1', '$FinPCalificar1', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    if ($conexionmysql->query($queryn)) {
      if ($conexionmysql->query($query1)) {
              if ($conexionmysql->query($querynn)) {
         if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
              }}
    }}
    
      }      
    else    
    if (!empty($_POST['InicioPFinal'])) {
    
    $querynn = "ALTER TABLE dim_paevaluar_new AUTO_INCREMENT = 1";
    
        $query0="INSERT INTO dim_paevaluar_new 
        (`iddim_aseguradoindevido`,         
        `InicioPFinal`, `FinPFinal`, 
        `idtusuario`, `fCreacion`, `fActualizacion`) 
        VALUES ($iddim_PaCalificar,       
        '$InicioPFinal', '$FinPFinal', 
        $iddim_usuario, $fecha_hora_update, $fecha_hora_update)"; 
    
    
              if ($conexionmysql->query($querynn)) {
         if ($conexionmysql->query($query0)) {
          echo 'Se Actualizo Correctamente.';
          echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
              }}
 
    
      }
    
    

    //$query1 = "UPDATE tmaestra SET idTCPosterior=$idCP , idtusuario=$idtusuario,fActualizacion=$fecha_hora_update WHERE idTMaestra=$idCP";

    
}
?>