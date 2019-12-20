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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                
                .button3 {
                    border-radius: 8px;
                    padding: 5px 5px;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                    background-color: white; 
                    color: black; 
                    border: 0px solid #008CBA;
                    font-size: 12px;
                }

                .button3:hover {
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
        <link rel="stylesheet" href="../SISGASV/css/bootstrapform.css" media="screen">

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>   

        <script>var $j = jQuery.noConflict();</script>

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
        </style>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 390,top = 50');
            }
        </script>

        <script>
            $(function () {
                $("#dialog1").hide();
                function abrir1() {     //formEditarPCalificar_dh
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });


                $("#dialog2").hide();
                function abrir2() {
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                       width: 600,
                          height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });


                $("#dialog3").hide();
                function abrir3() {
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                   width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });

                $("#dialog4").hide();
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                     width: 600,
                          height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });

                $("#dialog5").hide();
                function abrir5() {
                    $("#dialog5").show();
                    $("#dialog5").dialog({
                        resizable: false,
                    width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup5").click(
                        function () {
                            abrir5();
                        });
                        
                        $("#dialog6").hide();
                function abrir6() {
                    $("#dialog6").show();
                    $("#dialog6").dialog({
                        resizable: false,
                    width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup6").click(
                        function () {
                            abrir6();
                        });
                        
                        $("#dialog7").hide();
                function abrir7() {
                    $("#dialog7").show();
                    $("#dialog7").dialog({
                        resizable: false,
                     width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup7").click(
                        function () {
                            abrir7();
                        });
                        
                        $("#dialog8").hide();
                function abrir8() { //formEditarPDH
                    $("#dialog8").show();
                    $("#dialog8").dialog({
                        resizable: false,
                     width: 750,
                         height: 310,
                        modal: true
                    });
                }
                $("#abriPoppup8").click(
                        function () {
                            abrir8();
                        });
                function abrir9() {
                    $("#dialog9").show();
                    $("#dialog9").dialog({
                        resizable: false,
                      width: 600,
                         height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup9").click(
                        function () {
                            abrir9();
                        });
                        
                function abrir10() {
                    $("#dialog10").show();
                    $("#dialog10").dialog({
                        resizable: false,
                       width: 890,
                         height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup10").click(
                        function () {
                            abrir10();
                        });

            });
        </script>

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

function showUser6(str) {
  if (str==="") {
    document.getElementById("txtHint5").innerHTML="";
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
      document.getElementById("txtHint5").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=5",true);
  xmlhttp.send();
}

function showUser7(str) {
  if (str==="") {
    document.getElementById("txtHint6").innerHTML="";
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
      document.getElementById("txtHint6").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=6",true);
  xmlhttp.send();
}


</script>

    </head>
    <body> 
        
 
            <?php
$iddim_usuario = utf8_decode($row['iddim_usuario']);
$idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
$codOficina = utf8_decode($row['codOficina']);

$iddim_aseguradoindevido = $_GET['iddim_aseguradoindevido'];
$vacio="";

$query0000 = "SELECT t.autogenerado_t, t.dni_t, t.idDIM_Oficina      
                        FROM dim_aseguradoindevido t 
                        where t.iddim_aseguradoindevido='$iddim_aseguradoindevido'";
//Obteniendo el conjunto de resultados
            $result0000 = $conexionmysql->query($query0000);
            $row2 = $result0000->fetch_assoc();

                        $dni = utf8_decode($row2['dni_t']);
            $idDIM_Oficina_0 = utf8_decode($row2['idDIM_Oficina']);
            
?>
            <?php
            $query000 = "SELECT t.SCCMVTFT, 
                        t.DNI_DH_0, VINCULO_0, t.APELLIDO_NOMBRE_0 
                        FROM dim_sccmvtft t
                        where t.iddim_aseguradoindevido='$iddim_aseguradoindevido'";

//Obteniendo el conjunto de resultados
            $result000 = $conexionmysql->query($query000);
            $i = 0;
//recorriendo el conjunto de resultados con un bucle
            ?>
            
            <table id="t1" border="1" summary="">                 

                <th id="th1" colspan="4" >LISTA ACTUAL DE DERECHOHABIENTES REGISTRADOS</th>
                <tr>
                    <th id="td1" style="text-align: center">DNI </th> 
                    <th id="td1" style="text-align: center">VINCULO </th> 
                    <th id="td1" style="text-align: center">APELLIDOS Y NOMBRES</th> 
                    <th id="td1" style="text-align: center">ELIMINAR <BR>P DE BAJA</th> 
                </tr>
<?php
    while ($fila = $result000->fetch_assoc()) {
    $i++;
    $vacio =  $fila['DNI_DH_0'];
    ?>

                    <tr>
                        <td id="td1">
                            <a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila['DNI_DH_0'] ?>
                            </a>
                            <div id="dialog<?php echo $i ?>" title="PERIODOS EVALUADOS Y DE BAJA DEL DERECHOHABIENTE" class="contenido">
                                <iframe src="formEditarPCalificar_dh.php?SCCMVTFT=<?php echo $fila['SCCMVTFT'] ?>" style="width: 100%; height: 90%"></iframe>
                            </div>
                        </td>

                        <th id="td1">                           
                        <?php echo $fila['VINCULO_0'] ?>
                        </th>     
                        <th id="td1">
                            <?php echo $fila['APELLIDO_NOMBRE_0'] ?>
                        </th>  
                        <th id="td1">
                            <?php
                            if ($idDIM_Oficina_0 == $idOficinaUsuario) {    
                                ?>
                            
                            <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarPBaja_dh.php" method="POST" >  
                <input type="HIDDEN" name="SCCMVTFT" size="50" value="<?php echo $fila['SCCMVTFT'] ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminar" onclick="ConfirmDemo2()" class="button button3" value="Eliminar"><i class="fa fa-trash"></i></button>
                                </form>
                            <?php
                            }
                            ?>
                        </th> 
                    </tr>

                        <?php } ?>
                         <tr>
         <td colspan="2" style="font-size: 10px">
                 <a href="#" id="abriPoppup8" style="">INGRESAR MANUALMENTE DH
                                </a>
                            </td>

                        <div id="dialog8" title="LISTA DERECHOHABIENTES A VERIFICAR" class="contenido">
                            <iframe src="formEditarPDH.php?iddim_aseguradoindevido=<?php echo $iddim_aseguradoindevido ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
     </tr>    
            </table>
            
            <br>

                <?php
//liberando los recursos
                $result000->free();
                ?>
            <?php
//realizando una consulta usando la clausula select, cp.fcorreo, 
            
//recorriendo el conjunto de resultados con un bucle
            ?>

            <p>DATOS DEL ASEGURADO SEGUN ACREDITA
            <?php

//        $dni = $_GET['dni'];
            ?>            

                    <form name="form" action="actualizarDHt.php" method="POST"> 
            <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">                  
                
                <?php
                include './conexionesbd/conexion_oracle.php';

                $querydh = oci_parse($conexionora, "select
                                            c.vtfcvfa as tipo_vinculo, 
                                            D.DGACAUT AS DGACAUT_dh,  
                                            d.DGANSAS as DGANSAS_dh, d.DGAFNAC,
                                            TRUNC(MONTHS_BETWEEN(TO_DATE(TO_CHAR(SYSDATE, 'DD/MM/YYYY'),'DD/MM/YYYY'), d.DGAFNAC) / 12, 0) as EDAD,
                                            d.dgandid as dgandid_dh,
                                            d.DGATAPA ||  ' ' || d.DGATAMA ||  ' ' || d.DGATPNO ||  ' ' || d.DGATSNO as nombres_dh,
                                            --SUBSTR(D.DGACAUT,7,1) AS SEXO,
                                            case when SUBSTR(D.DGACAUT,7,1)='1' then 'MACULINO'
                                                     when SUBSTR(D.DGACAUT,7,1)='0' then 'FEMENINO'                                                     
                                                     end as SEXO, d.DGACUGD,
                                            sg.departamen || ' - ' || sg.provincia || ' - ' || sg.distrito, d.DGATCAL || ' ' || d.DGANILO || ' ' || d.DGANNMK || ' ' || d.DGATURB as direccion,
                                            sg.nombrered, sg.nivel || ' ' || sg.desccaa as CENTRO
                                            from dim_sccmdgat a 
                                            inner join dim_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join dim_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            left join dim_SGAD_HIS_ADSCRIPCION_LOCAL sg on d.DGACUGD=sg.ubigeo 
                                            where a.dgandid='$dni' and sg.periodo = (select max(a.periodo) from DIM_SGAD_HIS_ADSCRIPCION_LOCAL a)");

                oci_execute($querydh);
                ?>
                <input type="hidden" name="iddim_aseguradoindevido" size="50" value="<?php echo $iddim_aseguradoindevido ?>" readOnly="readOnly">  
                <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                
                <tr>
                    <th id="th1" scope="row" class="especial" colspan="4">
                        DERECHOHABIENTES
                    </th>  
                </tr>
                <tr>
<!--                    <th class="especial">
                        EDICION
                    </th>-->
                    <th class="especial">
                        VINCULO
                    </th>  
                    <th class="especial">
                        APELLIDOS Y NOMBRES
                    </th>
                    <th class="especial">
                        DNI
                    </th>
                    <th class="especial">
                        SELECCIONE
                    </th>
                </tr>
<?php

while ($row = oci_fetch_array($querydh, OCI_NUM + OCI_RETURN_NULLS)) {
      if(empty($vacio)) {
    ?> 

                    <tr>                               
<!--                        <td>
                            
                        </td>-->
                        <td id="td1" style="text-align: center">
                            <input id="i1" type="text" style="text-align: center"name="vinculo_dh" size="8" value="<?php echo $row[0] ?>" readonly>                         

                        <td id="td1">
                            <input id="i1" type="text" size="50" name="nom_dh" value="<?php echo $row[6] ?>" readonly>      

                        <td id="td1" style="text-align: center">
                            <input id="i1" type="text" style="text-align: center" size="8" name="dni_dh" value="<?php echo $row[5] ?>" readonly> 

                        <td id="td1" style="text-align: center">
                            <input id="i1" type="checkbox" style="text-align: center" name="seleccion[]" 
                                   value="<?php echo $row[0] ?>,<?php echo $row[5] ?>,<?php echo $row[6] ?>" readonly="">
                    </tr>
            
    <?php
     }
} 

//}
//ULTIMOOOOOO CAMBIO
    if(empty($vacio)) { 
        if ($idDIM_Oficina_0 == $idOficinaUsuario) {    
        ?>                
     <tr>
     <td>
    <input  id="botonregistrar" class="button button2" type = "submit" onclick="return confirm('Estas seguro que desea Registrar?');" name = "registrar" value = "Registrar">        
    
     </td>
     </tr>
     
    <?php }
    }//if($row[0]!=null) {   ?>

           
            
           
        <?php
            
            //liberando los recursos
            oci_free_statement($querydh);
            // }
            ?>
    </table>
     </form>
            <BR>
            <table id="tablaleyenda" cellspacing="8"> 
                <tr id="trleyenda">
        <td id="tdleyenda" > 
          <h5>Se actualizara bajo su responsabilidad.</h5>  
     </td>
     </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda" > 
                        <u><b> TIPO VINCULO</b></u>
                    </td>
                </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda">C. Conyuge</td>
                </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda">N. Concubino(a)</td>
                </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda">G. Gestante</td>
                </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda">H. Hijo(a)</td>
                </tr>
                <tr id="trleyenda">
                    <td id="tdleyenda">O. Otros</td>
                </tr>
            </table>  
        
    </body>
</html>





