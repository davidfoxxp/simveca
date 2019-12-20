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
?>

<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" href="../SISGASV/css/bootstrapform.css" media="screen">

        
        <style type="text/css">
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
                
            header {
                background-color: #0685C4;
                color: #ffffff;
                padding: 25px;
                margin-bottom: 20px;
            }

            footer {
                margin-top: 20px;
            }
        </style>
        <style type="text/css">
            /*programando con css*/
            body {               
                background-repeat: repeat-x;
                background-attachment: fixed;
            }    
            #td1 {
                font-size: 10px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }
            
            #td2 {
                font-size: 10px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
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
            #th1 {
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
            #tho
            {
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-weight:normal;

                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                  background-color: #B0C4DE;
            }
            tr td {
                vertical-align:left;
            }
            @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }           
        </style>
        <style type="text/css">
            .con_estilos {
                width: auto;
                padding: 5px;
                font-size: 14px;
                border: 1px solid #ccc;
                height: 26px;                
            }
            
           #dp1, #dp3, #p3, #dp2, #p2, #p1, #d1, #d2, #d3, #dd1, #dd2, #dd3, #dni1, #dni2, #dni3, #sistema1, #sistema2, #sistema3 {
                border: 0;
            }  
            
            
        </style>
        
        <script>
 
function validarchk(){
var chk = document.getElementById('ch3');
var txt1 = document.getElementById('ch1');
var txt2 = document.getElementById('ch2');
if(chk.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt2.value='';
    txt2.disabled='disabled';
    
    document.getElementById("dp3").required = true;
    document.getElementById("p3").required = true;
    document.getElementById("d3").required = true;
    document.getElementById("dd3").required = true;
    
    document.getElementById("ch1").checked = false;
    document.getElementById("ch2").checked = false;
    
}else{
    txt1.disabled='';
    txt2.disabled='';
    document.getElementById("dp3").required = false;
    document.getElementById("p3").required = false;
    document.getElementById("d3").required = false;
    document.getElementById("dd3").required = false;
    
}
}
</script>

        <script> 
function validarchk1(){
var chk1 = document.getElementById('chx1');
var txt2 = document.getElementById('chx2');
var txt3 = document.getElementById('chx3');
var txt4 = document.getElementById('chx4');
var txt5 = document.getElementById('chx5');
if(chk1.checked){       
    txt2.value='';
    txt2.disabled='disabled';
    
    txt3.value='';
    txt3.disabled='disabled';
    
    txt4.value='';
    txt4.disabled='disabled';
    
    txt5.value='';
    txt5.disabled='disabled';
    
    document.getElementById("chx2").checked = false;
    document.getElementById("chx3").checked = false;
    document.getElementById("chx4").checked = false;
    document.getElementById("chx5").checked = false;
}else{    
    txt2.disabled='';    
    txt3.disabled='';
    txt4.disabled='';
    txt5.disabled='';
    }
};

function validarchk2(){
var chk2 = document.getElementById('chx2');
var txt1 = document.getElementById('chx1');
var txt3 = document.getElementById('chx3');
var txt4 = document.getElementById('chx4');
var txt5 = document.getElementById('chx5');
if(chk2.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt3.value='';
    txt3.disabled='disabled';
    
    txt4.value='';
    txt4.disabled='disabled';
    
    txt5.value='';
    txt5.disabled='disabled';
    
    document.getElementById("chx1").checked = false;
    document.getElementById("chx3").checked = false;
    document.getElementById("chx4").checked = false;
    document.getElementById("chx5").checked = false;
    
}else{
    txt1.disabled='';    
    txt3.disabled='';
    txt4.disabled='';
    txt5.disabled='';  
}
};

function validarchk3(){
var chk3 = document.getElementById('chx3');
var txt1 = document.getElementById('chx1');
var txt2 = document.getElementById('chx2');
var txt4 = document.getElementById('chx4');
var txt5 = document.getElementById('chx5');
if(chk3.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt2.value='';
    txt2.disabled='disabled';
    
    txt4.value='';
    txt4.disabled='disabled';
    
    txt5.value='';
    txt5.disabled='disabled';
    
    document.getElementById("chx2").checked = false;
    document.getElementById("chx1").checked = false;
    document.getElementById("chx4").checked = false;
    document.getElementById("chx5").checked = false;
    
}else{
    txt1.disabled='';
    txt2.disabled='';   
    txt4.disabled='';
    txt5.disabled=''; 
}
};

function validarchk4(){
var chk4 = document.getElementById('chx4');
var txt1 = document.getElementById('chx1');
var txt2 = document.getElementById('chx2');
var txt3 = document.getElementById('chx3');
var txt5 = document.getElementById('chx5');

if(chk4.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt2.value='';
    txt2.disabled='disabled';
    
    txt3.value='';
    txt3.disabled='disabled';
    
    txt5.value='';
    txt5.disabled='disabled';
    
    document.getElementById("chx1").checked = false;
    document.getElementById("chx2").checked = false;    
    document.getElementById("chx3").checked = false;
    document.getElementById("chx5").checked = false;
    
}else{
    txt1.disabled='';
    txt2.disabled=''; 
    txt3.disabled='';
    txt5.disabled='';      
}
};

function validarchk5(){
var chk5 = document.getElementById('chx5');
var txt1 = document.getElementById('chx1');
var txt2 = document.getElementById('chx2');
var txt3 = document.getElementById('chx3');
var txt4 = document.getElementById('chx4');
if(chk5.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt2.value='';
    txt2.disabled='disabled';
    
    txt3.value='';
    txt3.disabled='disabled';
    
    txt4.value='';
    txt4.disabled='disabled';
    
    document.getElementById("chx1").checked = false;
    document.getElementById("chx2").checked = false;
    document.getElementById("chx3").checked = false;
    document.getElementById("chx4").checked = false;
    
}else{
    txt1.disabled='';
    txt2.disabled='';
    txt3.disabled='';
    txt4.disabled=''; 
}
};
</script>

    </head>
    <body> 
        

<?php
$iddim_usuario = utf8_decode($row['iddim_usuario']);
$idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
$codOficina = utf8_decode($row['codOficina']);

$iddim_aseguradoindevido = $_GET['iddim_aseguradoindevido'];
$vacio="";
$TOTAL=1;
?>
            <?php
            $query000 = "SELECT *
                        FROM dim_domicilios t
                        where t.iddim_aseguradoindevido='$iddim_aseguradoindevido'";
            
            $query001 = "SELECT COUNT(*) TOTAL
                        FROM dim_domicilios t
                        where t.iddim_aseguradoindevido='$iddim_aseguradoindevido'";

//Obteniendo el conjunto de resultados
            $result000 = $conexionmysql->query($query000);
            $result001 = $conexionmysql->query($query001);
            
             while ($fila1 = $result001->fetch_assoc()) {
                 $TOTAL = $fila1['TOTAL'];
             }
            
            $i = 0;
//recorriendo el conjunto de resultados con un bucle
            ?>
        
            <form name="form" method="POST">
            <table id="i1" border="1" summary="">    
                <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  

                <th id="th1" colspan="8" >LISTA ACTUAL DOMICILIOS REGISTRADOS EN EL SIMVECA</th>
                <tr>
                    <th id="td1" style="text-align: center">DNI </th> 
                    <th id="td1" style="text-align: center">SISTEMA </th> 
                    <th id="td1" style="text-align: center; width: 100px">DEPARTAMENTO</th> 
                     <th id="td1" style="text-align: center; width: 100px">PROVINCIA</th> 
                    <th id="td1" style="text-align: center; width: 100px">DISTRITO </th> 
                    <th id="td1" style="text-align: center; width: 200px">DIRECCION</th> 
                     <th id="td1" style="text-align: center">PRIORIDAD</th>    
                     <th id="td1" style="text-align: center">PRIORIDAD</th> 
                </tr>
               
<?php
    while ($fila = $result000->fetch_assoc()) {
    $i++;
    ?>
                    <tr>
                        <th id="td1">                           
                        <?php echo $fila['dni'] ?>
                        </th> 
                        <th id="td1">                           
                        <?php echo $fila['tipo_sistema'] ?>
                        </th>     
                        <th id="td1">
                            <?php echo $fila['departamento'] ?>
                        </th>  
                        <th id="td1">                           
                        <?php echo $fila['provincia'] ?>
                        </th> 
                        <th id="td1">                           
                        <?php echo $fila['distrito'] ?>
                        </th>     
                        <th id="td1" style="width: 200px">
                            <?php echo $fila['direccion'] ?>
                        </th>  
                        <th id="td1">                           
                        <?php echo $fila['prioridad'] ?>
                        </th>  
                   
                        <th id="td1" style="text-align: center">
                          
                            <input type="hidden" name="id<?php echo $i ?>" value="<?php echo $fila['iddim_domicilios'] ?>"/>
                            <input id="chx<?php echo $i ?>" type="checkbox" style="text-align: center" value="1" name="chx<?php echo $i ?>" onChange="validarchk<?php echo $i ?>();"/>
                            
                        </th>
                    
                         <?php
                            } 
                           ?>
                        
                    </tr>
               
                        <tr id="i1">
                            <td id="i1">
                        <button type= "submit" class="button button2" onclick="return confirm('Estás seguro que desea Actualizar la Prioridad?');" value="actualizar" name = "actualizar" id="actualizar"
                            onclick="this.onclick=function(){return false;}"> Actualizar Prioridad</button>       
                                </td>
                        </tr>
            </table>
            </form>
          
            
            <?php
if (isset($_POST['actualizar'])) {
}
?>
        <br><br>

                <?php
//liberando los recursos
                $result000->free();
                ?>
            <?php
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query0000 = "SELECT t.autogenerado_t, t.dni_t, t.idDIM_Oficina      
                        FROM dim_aseguradoindevido t 
                        where t.iddim_aseguradoindevido='$iddim_aseguradoindevido'";
//Obteniendo el conjunto de resultados
            $result0000 = $conexionmysql->query($query0000);
            $row2 = $result0000->fetch_assoc();
//recorriendo el conjunto de resultados con un bucle
            ?>

            <p>DATOS DEL ASEGURADO SEGUN ACREDITA
          
            <form name="form" action="actualizar_domicilio_t.php" method="POST">
                
            <?php
            $dni = utf8_decode($row2['dni_t']);
            $idDIM_Oficina_0 = utf8_decode($row2['idDIM_Oficina']);
//        $dni = $_GET['dni'];
            ?>  
                
            <table id="i1" border="1" summary="Descripcion de la tabla y su contenido">                  
                
                <?php
                include './conexionesbd/conexion_oracle.php';

                $querydh = oci_parse($conexionora, "select sc.ide_dni, 'RENIEC' SISTEMA_1, '1' SISTEMA_11,                                            
u.DEPARTAMENTO AS DEP_r, u.PROVINCIA AS PRO_r, u.DISTRITO DIST_r,
sc.txt_direccion as direccion_r,
a.dgandid,
'ACREDITA' SISTEMA_2, '2' SISTEMA_22, 
sg.departamen DEP_ac, sg.provincia PRO_ac, sg.distrito as DIST_ac,
a.DGATCAL || ' ' || a.DGANILO || ' ' || a.DGANNMK || ' ' || a.DGATURB as direccion_ac
from dim_csamreniec sc                                                                                    
left join dim_UBIGEO u 
on substr(sc.cod_ubg_dom, 1, 2)=u.R_DD98 
and substr(sc.cod_ubg_dom, 3, 2)=u.R_PP98 
and substr(sc.cod_ubg_dom, 5, 2)=u.R_DI98
left join dim_sccmdgat a on a.dgandid=sc.IDE_DNI
left join dim_SGAD_HIS_ADSCRIPCION_LOCAL sg on a.DGACUGD=sg.ubigeo and sg.periodo='201901'
where sc.ide_dni='$dni'");

                oci_execute($querydh);
                ?>
                <input type="hidden" name="iddim_aseguradoindevido" size="50" value="<?php echo $iddim_aseguradoindevido ?>" readOnly="readOnly">  
                <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                
                <tr id="i1">
                    <th id="th1" scope="row" class="especial" colspan="7">
                        DOMICILIOS DE SISTEMA
                    </th>  
                </tr>
                <tr id="i1">
<!--                    <th class="especial">
                        EDICION
                    </th>-->
                    <th class="especial">
                        DNI
                    </th>  
                    <th class="especial">
                        SISTEMA
                    </th>
                    <th class="especial">
                        DEPARTAMENTO
                    </th>
                    <th class="especial">
                        PROVINCIA
                    </th>
                    <th class="especial">
                        DISTRITO
                    </th>
                    <th class="especial">
                        DIRECCION
                    </th>
                    <th class="especial">
                        REGISTRO
                    </th>
                </tr>
<?php

while ($row = oci_fetch_array($querydh, OCI_NUM + OCI_RETURN_NULLS)) {
      if($TOTAL<2) {
    ?> 

                <tr id="i1">                               
<!--                        <td>
                            
                        </td>-->
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" name="dni1" id="dni1" size="8" value="<?php echo $row[0] ?>" readonly>                         

                        <td id="td1">
                            <input type="text" name="sistema1" id="sistema1" value="<?php echo $row[1] ?>" readonly> 
                            <input type="hidden" name="sistema11" value="<?php echo $row[2] ?>" readonly> 
                            
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" name="dp1" id="dp1" value="<?php echo $row[3] ?>" readonly>   

                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="15" name="p1" id="p1" value="<?php echo $row[4] ?>" readonly> 
                        
                        <td id="td1" style="text-align: center">
                            <input  type="text" style="text-align: center" size="15" name="d1" id="d1" value="<?php echo $row[5] ?>" readonly> 
                            
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="50" name="dd1" id="dd1" value="<?php echo $row[6] ?>" readonly> 

                        <td id="td1" style="text-align: center">
                            <input type="checkbox" style="text-align: center" name="ch1" id="ch1" value="1">
                    </tr>
                    
                    <tr id="i1">                               
<!--                        <td>
                            
                        </td>-->
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" name="dni2" id="dni2" size="8" value="<?php echo $row[7] ?>" readonly>                         

                        <td id="td1">
                            <input type="text" name="sistema2" id="sistema2" value="<?php echo $row[8] ?>" readonly>      
                            <input type="hidden" name="sistema22" value="<?php echo $row[9] ?>" readonly>      

                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="8" name="dp2" id="dp2" value="<?php echo $row[10] ?>" readonly> 
                        
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="15" name="p2" id="p2" value="<?php echo $row[11] ?>" readonly> 
                            
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="15" name="d2" id="d2" value="<?php echo $row[12] ?>" readonly> 

                        <td id="td1" style="text-align: center">
                            <input  type="text" style="text-align: center" size="50" name="dd2" id="dd2" value="<?php echo $row[13] ?>" readonly> 
    
                       <td id="td1" style="text-align: center">
                            <input type="checkbox" style="text-align: center" name="ch2" id="ch2" value="1">
                    </tr>
                    
                    <?php 
      }
                    ?>
                    
                    <tr id="i1">                               
<!--                        <td>
                            
                        </td>-->
                        <td id="td1" style="text-align: center">
                            <input id="i1" type="text" style="text-align: center" name="dni3" id="dni3" size="8" value="<?php echo $row[0] ?>" readonly>                         

                        <td id="td1">
                            <input type="text" name="sistema3" id="sistema3" value="OTRO" readonly>      

                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="8" id="dp3" 
                                   name="dp3" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                        
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="15" name="p3" id="p3" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                            
                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="15" name="d3" id="d3" onkeyup="javascript:this.value=this.value.toUpperCase();"> 

                        <td id="td1" style="text-align: center">
                            <input type="text" style="text-align: center" size="50" name="dd3" id="dd3" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                                
                         <td id="td1" style="text-align: center">
                            <input type="checkbox" style="text-align: center" name="ch3" value="1" id="ch3" onChange="validarchk();">
                    </tr>
            
    <?php
     
} 
//ECHO $TOTAL;
if($TOTAL>4) {
    
}
else {
//}
//ULTIMOOOOOO CAMBIO
    if(empty($vacio)) { 
        if ($idDIM_Oficina_0 == $idOficinaUsuario) {    
        ?>                
                    <tr id="i1">
                        <td id="i1" colspan="3">
    <input  id="botonregistrar" class="button button2" type = "submit" onclick="return confirm('Estas seguro que desea Registrar?');" name = "registrar" value = "Registrar">        
    <h5 id="i1">Se actualizara bajo su responsabilidad.</h5>  
     </td>
     </tr>
     
    <?php }
    }//if($row[0]!=null) { 
    
}
    //liberando los recursos
            oci_free_statement($querydh);
            // }
            ?>
    </table>
     </form>
                       
            
        
    </body>
</html>






