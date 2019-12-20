<?php
session_start();
require './conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

// <link rel="stylesheet" href="/resources/demos/style.css">
//<script type="text/javascript" src="../../../js/jquery-3.1.1.min.js"></script>
//<script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
//<script type="text/javascript" src="../../../js/cambiarPestanna.js"></script>
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!DOCTYPE html>
<html>
<head>
        <style>
            .button2 {
                    border-radius: 8px;
                    padding: 5px 5px;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                    background-color: white; 
                    color: black; 
                    border: 2px solid #008CBA;
                    font-size: 12px;
                }

                .button2:hover {
                    background-color: #008CBA;
                    color: white;
                }

                
            #th1 {
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-weight:normal;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            #td1 {
                font-size: 12px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }
             #tho
            {
               font-family:Arial, sans-serif;
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
               
                  background-color: #B0C4DE;
            }
            #h5
            {
                font-family:Arial, sans-serif;
                font-size: 16px;
                font-weight:normal;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color: #B0C4DE;
                width: 400px;
                height: 25px;
                text-align: center;
                
            }
            th
            {
                font-family:Arial, sans-serif;
                font-size:14px;
                padding:2px 5px;
                text-align:left;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#444;
                background-color:#F7FDFA;
            }
            table {
                width: 50%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 2px;
            }
            #tablaleyenda{
                border: 0px;
            }
            #trleyenda{
                border: 0px;
            }
            #tdleyenda{
                font-family:Arial, sans-serif;
                font-size:12px;
                border: 0px;
                color:#01A9DB;
            }

            th {text-align: left;}

        </style>
        
<script>
function showUser1(str) {
  if (str==="") {
    document.getElementById("txtHint0").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint0").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=0",true);
  xmlhttp.send();
}

function showUser2(str) {
  if (str==="") {
    document.getElementById("txtHint1").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint1").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=1",true);
  xmlhttp.send();
}
function showUser3(str) {
  if (str==="") {
    document.getElementById("txtHint2").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint2").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=2",true);
  xmlhttp.send();
}
function showUser4(str) {
  if (str==="") {
    document.getElementById("txtHint3").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint3").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=3",true);
  xmlhttp.send();
}
function showUser5(str) {
  if (str==="") {
    document.getElementById("txtHint4").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint4").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=4",true);
  xmlhttp.send();
}


</script>

</head>
<body>  
    
    <form name="form" action="#" method="POST">
        <?php        
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        $iddim_aseguradoindevido = $_GET['iddim_aseguradoindevido'];     
        ?>
        
        <table>                                
           
            <tr>
                <td id='tho'colspan="4">
                    INGRESAR TITULARES ADICIONALES
                </td>
            </tr>
            
                      
        <Tr>                          
                <td id='tho'>DNI</td>
                <td>
    <input type="hidden" name="iddim_aseguradoindevido" value="<?php echo $iddim_aseguradoindevido ?>" > 
    <input type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly" >
    
    <input id="txt0" name="dh0" type=text value= "<?php //echo $fila['dni_dh_0'] ?>" disabled="" onkeyup="showUser1(this.value)" size='8' minlength="8" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)event.returnValue = false;"> 
 
                </td>
                <td>
                    <div id="ape0" style="width: 300px; display: block"> <?php// echo $fila['apellido_nombre_0'] ?> </div>
    <div id="txtHint0"></div>
    
    </td>
     
    <td>
                                  
        <input id="botoneditar1" type="button" class="button button1" onclick="botonregistrar.disabled=false;txt0.disabled=false; vinculo0.disabled=false; document.getElementById('ape0').style.display='none';document.getElementById('txtHint0').style.display='block'" name="Editar" value="Editar"/>
        
    </td>   
    
        </Tr>
                                   
     <?php
     
     $query = "SELECT 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina                       
                        FROM dim_aseguradoindevido ai                        
                        where ai.iddim_aseguradoindevido='$iddim_aseguradoindevido'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila = $result->fetch_assoc()) {
        
     
                                 //ULTIMOOOOOO CAMBIO
                            if ($fila['idDIM_Oficina'] == $idOficinaUsuario) { 
                                ?>
    <tr>
        <td colspan="4">
        <input  id="botonregistrar" class="button button2" type = "submit" disabled="" onclick="return confirm('Estas seguro que desea Registrar?');" name = "registrar" value = "Registrar">
        <!--<input type = "button" class="button button1" onclick="txt0.disabled = false;txt1.disabled = false;txt2.disabled = false; txt3.disabled = false;txt4.disabled = false; botonregistrar.disabled=false;vinculo0.disabled=false;vinculo1.disabled=false;vinculo2.disabled=false;vinculo3.disabled=false;vinculo4.disabled=false; " name = "editar" value = "Editar" >-->
<!--        <input type="button" class="button button1" onclick="botonregistrar.disabled=false;txt0.disabled=false; vinculo0.disabled=false; document.getElementById('ape0').style.display='none';" name="Editar" value="Editar">-->
        <input type="button" class="button button2" onclick="txt0.disabled=true; vinculo0.disabled=true; document.getElementById('ape0').style.display='block'; document.getElementById('txtHint0').style.display='none'; 
                                                             txt1.disabled=true; vinculo1.disabled=true; document.getElementById('ape1').style.display='block'; document.getElementById('txtHint1').style.display='none'; 
                                                             txt2.disabled=true; vinculo2.disabled=true; document.getElementById('ape2').style.display='block'; document.getElementById('txtHint2').style.display='none'"
                                                                                                              name="Cancelar" value="Cancelar">
<!--//                                                             txt3.disabled=true; vinculo3.disabled=true; document.getElementById('ape3').style.display='block'; document.getElementById('txtHint3').style.display='none'; 
//                                                             txt4.disabled=true; vinculo4.disabled=true; document.getElementById('ape4').style.display='block'; document.getElementById('txtHint4').style.display='none'"-->
                                                             
        <!--<input id="botoneliminar" class="button button1" type="submit"  onclick="return confirm('Estas seguro que desea Eliminar Todo?');"  name="eliminar" value="Eliminar">-->
        </td>
    </tr>
     <?php
     
     
     
                } }
                //liberando los recursos
               //$result000->free();
                ?>
</tbody>
</table>         
           
      </form>
    
</body>
</html>


<?php

if (isset($_POST['registrar'])) {

       include ('./conexionesbd/conexion_mysql.php');
       include ('./conexionesbd/conexion_oracle.php');
              
    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";
    
    $dh0 = $_POST['dh0'];
    
    $iddim_aseguradoindevidoo = $_POST['iddim_aseguradoindevido'];
    $iddim_aseguradoindevido = "'$iddim_aseguradoindevidoo'";
      
   date_default_timezone_set('America/Bogota');
$fecha_hora_updateo = date('Y-m-d G:i:s');
$fecha_hora_update = "'$fecha_hora_updateo'";

$queryA = "SELECT iddim_aseguradoindevido, idDIM_Oficina, RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp 
            FROM sisgasv.dim_aseguradoindevido t 
            where t.iddim_aseguradoindevido in ($iddim_aseguradoindevido)";  

 $resultadoA = $conexionmysql->query($queryA);
 
 while ($row = $resultadoA->fetch_assoc()) {     
             
            $max = $row['iddim_aseguradoindevido'];
            $idOficinaUsuario = $row['idDIM_Oficina'];           
            $eempleadora = $row['RUC'];    
            $dni_eempleadora = $row['dni_empresa'];    
            $NOMBRE_EMP = $row['nomEmpresa']; 
            $flag22_EMP = $row['idTCondicion']; 
            $ESTADO_EMP = $row['idTEstado']; 
            $DEPARTAMENTO_EMP = $row['DEPARTAMENT_emp']; 
            $PROVINCIA_EMP = $row['PROVINCIA_emp']; 
            $DISTRITO_EMP = $row['DISTRITO_emp']; 
            $direccion_EMP = $row['DIRECCION_emp']; 
//            $dni_1, 
//            $dgacaut, 
//            $dgatapa, 
//            $dgatama, 
//            $dgatpno, 
//            $sdgatpno,
//            $DGAFNAC, 
//            $departamen, 
//            $provincia, 
//            $distrito, 
//            $direccion, 
                         
 }
 
 $queryT = oci_parse($conexionora, "select 
                                                sc.dgansas, sc.dgacaut,
                                                t.TXT_APEPATERNO,nvl(t.TXT_APEMATERNO,'')as apematerno,
                                                nvl(t.TXT_APEMATCASADA,'')as apematcasada,t.TXT_NOMBRES, 

                                                sc.dgactdi, TO_CHAR(sc.DGAFNAC, 'YYYY-MM-DD') fnac, sc.dgandid as dni,
                                                t.cod_ubg_dom DGACUGD,
                                                u.departamento,
                                                u.provincia,
                                                u.distrito,     
                                                t.txt_direccion direccion,
                                                t.cod_estcivil,       
                                                t.cod_sexo       
                                         from dim_csamreniec t 
                                         LEFT JOIN dim_ubigeo u 
                                         ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                         AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                         AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                         left join dim_SCCMDGAT sc on t.ide_dni=sc.dgandid
                                         WHERE t.ide_dni='$dh0'");
            oci_execute($queryT);
            while ($row2 = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                $dgansas = $row2[0];
                $dgacaut = $row2[1];
                $apepaterno = $row2[2];
                $apematerno = $row2[3];
                
                if ($row2[4] == NULL) {
                    $apematcasada = NULL;
                } else {
                    $apematcasada = $row2[4];
                }

                $nombresreniec = $row2[5]; 

                $dgactdi = $row2[6];
                $DGAFNAC = $row2[7];
                $dni_2 = $row2[8];

                $DGACUGD = $row2[9];
                $departamen = $row2[10];
                $provincia = $row2[11];
                $distrito = $row2[12];

                $direccion = $row2[13];
            }
            
            $queryB = "SELECT max(m.iddim_aseguradoindevido) as max FROM dim_aseguradoindevido m";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultB = $conexionmysql->query($queryB);
            if ($conexionmysql->query($queryB)) {
                while ($fila = $resultB->fetch_assoc()) {
                    $ma = $fila['max'];
                    $max = $ma + 1;
                }
            }
            
            $queryD = "SELECT max(a.numero) as maxx FROM dim_overificacion a WHERE a.iddim_Verificacion=$iddim_aseguradoindevido";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultD = $conexionmysql->query($queryD);
            if ($conexionmysql->query($queryD)) {
                while ($fila = $resultD->fetch_assoc()) {
                    $numero = $fila['maxx'];
                    $numero_mas = $numero + 1;
                    
                }
            }
            
            $queryE = "SELECT iddim_Verificacion, an_verifi, num_verifi, ospe_verifi, origenverif, idTVerificacionPerfil FROM dim_verificacion a WHERE a.iddim_Verificacion=$iddim_aseguradoindevido";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultE = $conexionmysql->query($queryE);
            if ($conexionmysql->query($queryE)) {
                while ($fila = $resultE->fetch_assoc()) {
                    $iddim_Verificacion = $fila['iddim_Verificacion'];
                    $an_verifi = $fila['an_verifi'];
                    $num_verifi = $fila['num_verifi'];
                    $ospe_verifi = $fila['ospe_verifi'];
                    
                    $origenverif = $fila['origenverif'];
                    $idTVerificacionPerfil = $fila['idTVerificacionPerfil'];
                    
                    $cod_caso = $dni_2 . $eempleadora . $ospe_verifi . $an_verifi;
                    $nombre_pdf= $num_verifi.$eempleadora.$dni_2.$ospe_verifi;
                }
            }
            
             $queryC = "SELECT a.iddim_Overificacion, a.idDIM_Oficina, a.ordenV, numero FROM dim_overificacion a WHERE a.iddim_Overificacion=$iddim_aseguradoindevido";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultC = $conexionmysql->query($queryC);
            if ($conexionmysql->query($queryC)) {
                while ($fila = $resultC->fetch_assoc()) {
                    $iddim_Overificacion = $fila['iddim_Overificacion'];
                    $idDIM_Oficina = $fila['idDIM_Oficina'];
                    $ordenV = $fila['ordenV'];
                    //$numero = $fila['numero'];
                                                            
                    $numeroConCeros = str_pad($numero_mas, 3, "0", STR_PAD_LEFT);
                                        
                    $new_ordenV = substr($ordenV, 0, -3);
                    
                    $new_new_ordenV=$new_ordenV.$numeroConCeros;
                }
            }
                                  
            
            date_default_timezone_set('America/Bogota');
            $fecha_hora_creacione = date('Y-m-d G:i:s');
            $fecha_hora_creacion = "'$fecha_hora_creacione'";
            
            $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t, materno_t, 
            casada_t,nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max, '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_2', '$dgacaut', '$apepaterno', '$apematerno', 
            '$apematcasada','$nombresreniec', '', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion)";
            
             $query00 = "ALTER TABLE dim_overificacion AUTO_INCREMENT = 1";
            
            $query1 = "INSERT INTO 
                    dim_overificacion (iddim_Verificacion, iddim_Overificacion, idDIM_Oficina, 
                    idTActosverificacion, ordenV, numero,
                    idtusuario, fCreacion) 
                    VALUES ($iddim_aseguradoindevido, $max, '$idOficinaUsuario', 
                    '084', '$new_new_ordenV', $numero_mas,
                    $idtusuario, $fecha_hora_creacion)";

            $query2 = "INSERT INTO 
                    dim_resboficio (iddim_Overificacion, iddim_ResBOficio,
                    idtusuario, fCreacion) 
                    VALUES ($max, $max,                      
                     
                    $idtusuario, $fecha_hora_creacion)";

             $query3 = "INSERT INTO dim_actaverificacion 
                    (iddim_Verificacion,
                    iddim_ActaVerificacion, idTActosverificacion, idTusuario, fCreacion) 
                    VALUES 
                    ($max,
                     $max,'026', $idtusuario, $fecha_hora_creacion)";

             
             
            $query5 = "INSERT INTO dim_verificacion (iddim_Verificacion, idTVerificacion, iddim_aseguradoindevido,
                      origenverif, idTVerificacionPerfil,
                      idTEstadoActual, an_verifi, num_verifi, ospe_verifi, codigocaso, 
                     idtusuario, fCreacion) 
                     VALUES 
                     ($max, '2', $max,
                      $origenverif, $idTVerificacionPerfil,
                      2, '$an_verifi', '$num_verifi', '$ospe_verifi', '$cod_caso',
                     $idtusuario, $fecha_hora_creacion)";
           
            $query6 = "INSERT INTO dim_pacalificar ( 
            iddim_PaCalificar, iddim_aseguradoindevido,
            idtusuario, fCreacion
            ) 
            values (
            $max, $max,
            $idtusuario, $fecha_hora_creacion    
            )";

            $query7 = "INSERT INTO dim_cfinanzas ( 
            iddim_CFinanzas, iddim_Verificacion,
            idtusuario, fCreacion
            ) 
            values (
            $max, $max,
            $idtusuario, $fecha_hora_creacion    
            )";
            
            
            

if ($conexionmysql->query($query)) {
    if ($conexionmysql->query($query00)) {
if ($conexionmysql->query($query1)) {
    if ($conexionmysql->query($query2)) {
        if ($conexionmysql->query($query3)) {
            if ($conexionmysql->query($query5)) {
                if ($conexionmysql->query($query6)) {
                    if ($conexionmysql->query($query7)) {
    echo 'SE ACTUALIZO CORRECTAMENTE<br>';
 }
}
            }
}}}}}
//if ($conexion->query($query1)) {
else {
            
        echo $fecha_hora_update, '<br>';
        echo $apepaterno, '<br>';
        echo $apematerno, '<br>';
        echo $apematcasada, '<br>';
        echo $nombresreniec;
    }
}
?>