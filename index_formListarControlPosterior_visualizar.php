<?php
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];
//$os=[];
$sql = "SELECT u.iddim_usuario, u.login, a.idDIM_Oficina FROM dim_usuario u 
left join dim_sectoristas a on u.login=a.dni
where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

//$row = $resultsql->fetch_assoc();


?>

<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <title>CONTROL POSTERIOR</title>	
        <style type="text/css">
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
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 

        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>   

        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
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
            tr td {
                vertical-align:left;
            }
            @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }           
        </style>

        <script>
            $(function () {
                $("#dialog1").hide();
                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        width: 890,
                        height: 700,
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
                        width: 700,
                        height: 650,
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
                        height: 700,
                        width: 680,
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
                        height: 350,
                        width: 650,
                        modal: true
                    });
                }
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });


            });
        </script> 

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

    </head>
    <body> 
       
        <div>
            <?php
            
            $iddim_CPosterior = $_GET['iddim_CPosterior'];
            $idDIM_Oficina="";
            
//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query00 = "SELECT m.dni_t, m.autogenerado_t, concat(m.paterno_t, ' ', m.materno_t, ' ', m.nombre1_t, ' ', coalesce(m.nombre2_t,'')) as nombres, m.fechanacimiento 
                        FROM sisgasv.dim_aseguradoindevido m where m.iddim_aseguradoindevido='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result00 = $conexionmysql->query($query00);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result00->fetch_assoc()) {
                ?>
          
                <table id="t1" border="1" summary="Rellena Formulario">

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="4">
                            DATOS PERSONALES
                        </th>
                    </tr> 
                    <tr> <td id="td1">
                            DOCUMENTO IDENTIDAD (DNI)
                        </td>
                        <td id="td1" style="font-size:12px; font-style: normal;"><?php echo $fila['dni_t'] ?> </td>                                                             
                    </tr>
                    <tr> <td id="td1">
                            APELLIDOS Y NOMBRES
                        </td>
                        <td id="td1" style="font-size:12px; font-style: normal;"><?php echo $fila['nombres'] ?></td>                                                             
                    </tr>
                    <tr> <td id="td1" >
                            AUTOGENERADO
                        </td>
                        <td id="td1" style="font-size:12px; font-style: normal;"><?php echo $fila['autogenerado_t'] ?></td>                                                             
                    </tr>
                    <tr> <td id="td1">
                            FECHA DE NACIMIENTO
                        </td>
                        <td id="td1" style="font-size:12px; font-style: normal;"><?php echo $fila['fechanacimiento'] ?></td>                                                             
                    </tr>
                
                </table>
            <br>                
                   
                    <?php
                }
$result00->free();
//liberando los recursos
                
                ?> 
      
        </div>
        <div>                                   
            <!--Incrustar php-->
            <?php
           

//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query = "SELECT ai.idDIM_Oficina as idDIM_OficinaII, ai.dni_t, ai.RUC,
                        cp.iddim_CPosterior, 
                        'CONTROL POSTERIOR' AS Verificacion,
                        tpf.idTVerificacionPerfil,
                        tpf.VerificacionPerfil,
                        cp.perfil_otros,
                        cp.iddim_aseguradoindevido, 
                        tea.idTEstadoActual,
                        tea.EstadoActual, 
                        cp.sunat,
                        cp.remesas,
                        cp.idTGeneraBaja,
                        case 
                        when cp.idTGeneraBaja='1' then 'SI'
                        when cp.idTGeneraBaja='2' then 'NO'
                        when cp.idTGeneraBaja='4' then '--'
                        end as GeneraBaja,
                        trr.idTRRBRegistro,
                        trr.RRBRegistro,
                        cp.fconstanciaAcFirme,
                        cp.factofirme,
                        cp.nit, cp.femisionBRegistro, cp.nResBRegistro, 
                        cp.nombrePDF,
                        cp.fnotificacionBRegistro, cp.respuestaBRegistro,
                        cp.respuestaBRegistro, cp.observaciones
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacionperfil tpf on tpf.idTVerificacion='1' and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                        left join tiporrbregistro trr on cp.idTRRBRegistro=trr.idTRRBRegistro
                        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                        where cp.iddim_CPosterior='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result->fetch_assoc()) {
                $idDIM_Oficina=$fila['idDIM_OficinaII'];
                //echo $idDIM_Oficina;
                ?>		                
                <table id="t1" border="1" summary="Rellena Formulario">

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="4">
                            DETALLE DE LA INFORMACION DEL CONTROL POSTERIOR
                        </th>
                    </tr> 
                    <tr> <td id="td1">
                            DESCRIPCION
                        </td>
                        <td id="td1">
                            DATOS ANTERIORES
                        </td>                                                             
                    </tr>
                    <tr>
                        <?php
                        $dni_t = $fila['dni_t'];
                        $ruc = $fila['RUC'];
                        ?>                        
                    </tr>
                    <TR>
                        <td id="td1">
                            ESTADO ACTUAL
                        </td>
                        <td id="td1"><?php echo $fila['EstadoActual'] ?><br></td>

                    </TR>

                    <TR>
                        <td class="especial" id="td1">
                            SELECCION EL TIPO DE PERFIL
                        </td>
                        <td id="td1"><?php echo $fila['VerificacionPerfil'] . " - " . $fila['perfil_otros'] ?><br></td>                            
                    </TR>
                    
                    <tr> <td id="td1">
                            GENERA BAJA DE REGISTRO
                        </td>
                        <td id="td1"><?php echo $fila['GeneraBaja'] ?><br></td>

                    </tr>

                    <tr>
                        <td id="td1">NIT</td>                            
                        <td id="td1"><?php echo $fila['nit'] ?><br></td>

                    </tr>

                    <tr><td id="td1">
                            FECHA DE EMISION DE BAJA DE REGISTRO
                        </td>
                        <TD id="td1">
                            <?php echo $fila['femisionBRegistro'] ?><br></td>
                    </tr>

                    <tr>
                        <td id="td1">Nº RESOLUCION DE BAJA DE REGISTRO GENERADA</td> 
                        <td id="td1"><?php echo $fila['nResBRegistro'] ?><br></td>

                    </tr>

                    <tr>
                        <td id="td1">NOMBRE DEL PDF</td> 
                        <td id="td1"><?php echo $fila['nombrePDF'] ?><br></td>
                    </tr>


                    <tr>
                        <td id="td1">FECHA NOTIFICACION BAJA DE REGISTRO</td>
                        <td id="td1"><?php echo $fila['fnotificacionBRegistro'] ?><br></td>

                    </tr> 
                    
                     <tr>
                        <td id="td1">FECHA DEL ACTO FIRME</td> 
                        <td id="td1"><?php echo $fila['factofirme'] ?><br></td>
                    </tr>
                    
                     <tr>
                        <td id="td1">CONSTANCIA DE ACTO FIRME</td> 
                        <td id="td1"><?php echo $fila['fconstanciaAcFirme'] ?><br></td>
                    </tr>
                    
                    <tr> <td id="td1">
                            ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
                        <td id="td1"><?php echo $fila['RRBRegistro'] ?><br></td>

                    </tr>
                    
                    <tr>
                            <td id="td1" style="color:#F80000 ;font-size: 12px">REPORTADO A SUNAT</td> 
                                                       
                            <?php if (is_null($fila['sunat'])) { ?>                                  
                                <td >        
                                    <b><?php echo "NO REPORTADO A SUNAT" ?></b><br></td></b>
                                </td>

                                </td>
                                <?php
                            } else {
                                if ($fila['sunat']=='1') {
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO A SUNAT" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                                    
                                } else {
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                                    }                            
                                }
                            ?>
                        </tr>
                        
                        <tr> <td id="td1">
                            REMESA REPORTADO</td>
                        <td id="td1"><?php echo $fila['remesas'] ?><br></td>

                    </tr>

                    <tr>
                        <td id="td1">
                            OBSERVACIONES
                        </td>
                        <td id="td1"><?php echo $fila['observaciones'] ?><br></td>                            
                    </tr>     
                </table>   
            <br>

                <?php
            }
//liberando los recursos
            $result->free();
//cerrando los recursos
            
            ?>	
        </div>

        <div>
            <table id="t1" border="1" summary="Rellena Formulario">

                <!--Incrustar php-->
                <?php
                //realizando una consulta usando la clausula select
                $query1 = "SELECT dc.iddim_aseguradoindevido, 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,                        
                        dc.InicioPCalificar1, dc.FinPCalificar1
                        FROM dim_aseguradoindevido ai 
                        left join dim_pacalificar_new dc on ai.iddim_aseguradoindevido=dc.iddim_aseguradoindevido
                        where ai.iddim_aseguradoindevido='$iddim_CPosterior' 
                        order by ai.iddim_aseguradoindevido, dc.InicioPCalificar1 asc";


                //Obteniendo el conjunto de resultados
                $result1 = $conexionmysql->query($query1);
                //recorriendo el conjunto de resultados con un bucle

               
                    ?>
                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="3">
                            PERIODOS DE BAJA
                        </th>
                    </tr>
                    <?php
                     while ($fila1 = $result1->fetch_assoc()) {
                         ?>
                    <tr>                                           
                        <td id="td1">                            
                            Inicio del Periodo a Baja
                        </td>
                        <td id="td1"><?php echo $fila1["InicioPCalificar1"] ?><br></td>
                    </tr>
                    <tr>
                        <td id="td1">
                            Fin del Periodo a Baja                            
                        </td>
                        <td id="td1"><?php echo $fila1["FinPCalificar1"] ?><br></td>

                    </tr>    
                        <?php
                }
                
                //realizando una consulta usando la clausula select
                $query2 = "SELECT ai.iddim_aseguradoindevido, 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,                        
                        dcd.InicioPFinal, dcd.FinPFinal                        
                        FROM dim_aseguradoindevido ai 
                        left join dim_paevaluar_new dcd on ai.iddim_aseguradoindevido=dcd.iddim_aseguradoindevido
                        where ai.iddim_aseguradoindevido='$iddim_CPosterior'";


                //Obteniendo el conjunto de resultados
                $result2 = $conexionmysql->query($query2);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila1 = $result2->fetch_assoc()) {
                    ?>
                    <tr>
                    <th id="th1" scope="row" class="especial" colspan="3">
                        PERIODO EVALUADO
                    </th>
                    </tr>
                    <tr>
                        <td id="td1">
                            PERIODO A EVULUAR INICIO
                        </td>

                        <td id="td1"><?php echo $fila1["InicioPFinal"] ?><br></td>
                        
                    </tr>
                    <tr>
                        <td id="td1">
                            PERIODO A EVALUAR FIN
                        </td>
                        <td id="td1"><?php echo $fila1["FinPFinal"] ?><br></td>                        
                    </tr>    
            </table> 
                <?php
}
?>            
        </div>
        <br>
        <div>
            
            <table id="t1" border="1" summary="Rellena Formulario">

                <tr>
                    <th id="th1" scope="row" class="especial" colspan="3">
                        ACTUALIZACION DE LA INFORMACION DEL CONTROL POSTERIOR
                    </th>

                    <?php
                    $hoy = getdate();
                    //echo $hoy = date("d/m/Y");
                    ?>
                </tr>
                <!--Incrustar php-->
                <?php

                //realizando una consulta usando la clausula select
                $query2 = "SELECT ai.idDIM_Oficina, 
                            dc.iddim_CFinanzas, dc.iddim_CPosterior, 
                            dc.fecartafinanza1, dc.ncartafinanza1, dc.valorizacion1,
                            dc.fecartafinanza2, dc.ncartafinanza2, dc.valorizacion2,
                            dc.fecartafinanza3, dc.ncartafinanza3, dc.valorizacion3,
                            dc.fecartafinanza4, dc.ncartafinanza4, dc.valorizacion4,
                            dc.fecartafinanza5, dc.ncartafinanza5, dc.valorizacion5,
                            dc.fCreacion, dc.fActualizacion
                            FROM dim_cfinanzas dc 
                            left join dim_aseguradoindevido ai on dc.iddim_CPosterior=ai.iddim_aseguradoindevido
                            where dc.iddim_CPosterior='$iddim_CPosterior'";

                //Obteniendo el conjunto de resultados
                $result2 = $conexionmysql->query($query2);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila2 = $result2->fetch_assoc()) {
                    ?>                 
    <?php for ($i = 1; $i <= 5; $i++) { ?>                         

                        <tr> 

                            <td id="td1">
        <?php echo $i ?>º  FECHA CARTA A FINANZA
                            </td>
                            <td><?php echo $fila2["fecartafinanza$i"] ?><br></td>
                            
                        </tr>
                        <tr>
                            <td id="td1">
        <?php echo $i ?>º NUMERO CARTA A FINANZA
                            </td>
                            <td><?php echo $fila2["ncartafinanza$i"] ?><br></td>
                           
                        </tr> 
                        <tr>
                            <td id="td1">
        <?php echo $i ?>º VALORIZACION
                            </td>
                            <td><?php echo $fila2["valorizacion$i"] ?><br></td>
                         
                        </tr>  
                    <?php } 
                    
                }
                ?>

            </table> 
            <br>
            <div>
        <?php
                       
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query000 = "select 
                t.SCCMVTFT,          
                case 
                when t.VINCULO_0='C' then 'CONYUGE'
                when t.VINCULO_0='G' then 'MADRE GESTANTE DE HIJO EXTRAMATRIMONIAL'  
                when t.VINCULO_0='H' then 'HIJO'
                when t.VINCULO_0='I' then 'HIJO MAYOR DE EDAD INCAPACITADO'  
                when t.VINCULO_0='N' then 'CONCUBINA'
                when t.VINCULO_0='T' then 'TITULAR'  
                end as VINCULO_0_DES, 
                t.DNI_DH_0, t.APELLIDO_NOMBRE_0,                     
                dc.InicioPCalificar1, dc.FinPCalificar1
                FROM dim_sccmvtft t 
                left join dim_pacalificar_new_dh dc on t.SCCMVTFT=dc.SCCMVTFT
                where t.iddim_aseguradoindevido='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result000 = $conexionmysql->query($query000);
//recorriendo el conjunto de resultados con un bucle
            ?>
                <table id="t1" border="1" summary="">                 

                <th id="th1" colspan="3" >LISTA ACTUAL DE DERECHOHABIENTES REGISTRADOS</th>
                <tr>
                    <th id="td1" style="text-align: center">DNI </th> 
                    <th id="td1" style="text-align: center">VINCULO </th> 
                    <th id="td1" style="text-align: center">APELLIDOS Y NOMBRES</th> 
                </tr>
<?php
    while ($fila = $result000->fetch_assoc()) {
    ?>

                    <tr>
                          <td id="td1">                           
                        <?php echo $fila['DNI_DH_0'] ?>
                        </td>    
                       <td id="td1">                           
                        <?php echo $fila['VINCULO_0_DES'] ?>
                        </td>     
                        <td id="td1">
                            <?php echo $fila['APELLIDO_NOMBRE_0'] ?>
                        </td>  
                    </tr>
                    
                                       
                    <tr>
                        <th id="th1" colspan="3" >
                            PERIODOS DE BAJA
                        </th>

                        <?php
                        $hoy = getdate();
                        //echo $hoy = date("d/m/Y");
                        ?>


                        <tr> 

                            <td id="td1" colspan="2">
                                Inicio  Periodo de Baja
                            </td>
                            <td id=""><?php echo $fila["InicioPCalificar1"] ?><br></td>
                            
                        </tr>
                        <tr>
                            <td id="td1" colspan="2">
                                Fin Periodo a Baja
                            </td>
                            <td id=""><?php echo $fila["FinPCalificar1"] ?><br></td>
                            
                        </tr>         
                        <?php } ?>
                         <tr>
     </tr>    
            </table>
            <br>
        
                    <?php
               
                //liberando los recursos
               $result000->free();
                ?>
            </div>
                            
            <?php

$conexionmysql->close()
?>            
        </div>
        
        <div>                                   
            <!--Incrustar php-->
            <?php
           

//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query4 = "SELECT 
                        pu.resolucionpublicada,
                        pu.femision,
                        pu.fnotificacion,
                        pu.fnotificacion_v,
                        pu.fpublicacion_p,
                        pu.fpublicacion_e,
                        pu.fpublicacion_c,
                        pu.tipo_registro,
                        pu.nombrePDPubli,
                        pu.ruta_pdf_publi,
                        case when pu.tipo_registro='1' then 'ASEGURADO' 
                        when pu.tipo_registro='2' then 'EMPLEADOR' 
                        end as Tipo                        
                        FROM dim_publicacion pu                                   
                        WHERE pu.iddim_CPosterior='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result4 = $conexionmysql->query($query4);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result4->fetch_assoc()) {
                ?>		                
                <table id="t1" border="1" summary="Rellena Formulario">

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="4">
                            DETALLE DE LA PUBLICACION
                        </th>
                    </tr> 
                    <tr> <td id="td1">
                            DESCRIPCION
                        </td>
                        <td id="td1">
                            INFORMACION
                        </td>                                                             
                    </tr>
                    <tr>
                        <?php
//                        $dni_t = $fila['dni_t'];
//                        $ruc = $fila['RUC'];
                        ?>                        
                    </tr>
                   
                    <tr><td id="td1">
                            FECHA DE EMISION DE LA PUBLICACION
                        </td>
                        <TD id="td1">
                            <?php echo $fila['femision'] ?><br></td>
                    </tr>

                    <tr>
                        <td id="td1">Nº RESOLUCION A PUBLICAR</td> 
                        <td id="td1"><?php echo $fila['resolucionpublicada'] ?><br></td>
                    </tr>


                    <tr>
                         <td id="td1">FECHA QUE LA OSPE ENVIA A PUBLICAR</td>
                        <td id="td1"><?php echo $fila['fnotificacion'] ?><br></td>

                    </tr> 
                    
                    <tr>
                        <td id="td1">FECHA DE NOTIFICACION R DEL ACTO - PERSONAL</td>
                        <td id="td1"><?php echo $fila['fnotificacion_v'] ?><br></td>

                    </tr> 

                    <tr>
                        <td id="td1">PUBLICACION EL PERUANO</td> 
                        <td id="td1"><?php echo $fila['fpublicacion_p'] ?><br></td>
                    </tr>
                    
                     <tr>
                        <td id="td1">PUBLICACION PAGINA WEB ESSALUD</td> 
                        <td id="td1"><?php echo $fila['fpublicacion_e'] ?><br></td>
                    </tr>
                    
                    <tr> <td id="td1">
                            PUBLICACION DIARIO DE MAYOR CIRCULACION</td>
                        <td id="td1"><?php echo $fila['fpublicacion_c'] ?><br></td>
                    </tr>
                    
                    <tr> <td id="td1">
                            TIPO</td>
                        <td id="td1"><?php echo $fila['Tipo'] ?><br></td>

                    </tr>
                    
                    <?php
        if (is_null($fila['ruta_pdf_publi'])) {
            ?><tr> <td id="td1">NOMBRE PDF</td>
                        
            <td id="tds1"style="width: 75px"><?php echo $fila['nombrePDPubli'] ?></td> 
            <?php
        } else {
            ?>
            <tr> <td id="td1">NOMBRE PDF</td>
                        
            <td id="tds1" style="width: 75px">
                <a href="<?php echo $fila['ruta_pdf_publi'] ?>" target="_blank"><?php echo $fila['nombrePDPubli'] ?></a>                
            </td> 
                <?php
                }
            ?>                     
                </table>              
            <br>

                <?php
            }
//liberando los recursos
            $result4->free();
//cerrando los recursos
            
            ?>	
        </div>
        
        <?php
        
        while ($fila = $resultsql->fetch_assoc()) {
        
        $os = array($fila['idDIM_Oficina']);    

if (in_array($idDIM_Oficina, $os)) {
    
        $query6 = "select a.ob_habilitar, a.ob_re_correo, a.f_ob_re_correo_sect, t_observacion,
                    a.f_ob_re_correo, a.ob_sectorista, a.ob_fecha
                    from dim_cposterior a where a.iddim_CPosterior='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result6 = $conexionmysql->query($query6);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result6->fetch_assoc()) {              
            
        ?>
        <div id="product1" style="background-color: #e5e5e5">
           <h4>VALIDACIÓN DEL SECTORISTA CON RESPECTO A LA <br>RESOLUCIÓN DE BAJA DE CONTROL POSTERIOR.</h4>
            <form name="form" action="" method="POST">   
                
                <div class="form-group">
                        <label for="first-name">SECTORISTA RECIBIO EL CORREO </label>  
                        <?php                         
                        if($fila['ob_re_correo']==1 || $fila['ob_habilitar']==NULL) {                        
                        ?>
                        <select name = "ob_re_correo" id="ob_re_correo" class="con_estilos" required="" onchange="habilitarbaja(this.value);">                            
                            <option value="1">NO</option>
                            <option value="2">SI</option>                          
                        </select> 
                        <input type="date" class="nombres" name="f_ob_re_correo_sect" id="f_ob_re_correo_sect" disabled="" required=""></input>    
                        <?php                         
                        } else {                        
                        ?>
                        <select name = "ob_re_correo" id="ob_re_correo" class="con_estilos" required="" onchange="habilitarbaja(this.value);">                            
                            <option value="2">SI</option>                          
                        </select> 
                        <input type="date" class="nombres" name="f_ob_re_correo_sect" id="f_ob_re_correo_sect" readonly="" value="<?php echo $fila['f_ob_re_correo_sect'] ?>"></input>              
                    <?php                         
                        }                         
                        ?>
                        </div> 
                
                <div class="form-group">
                        <br/><label for="last-name">ESTADO DE LA OBSERVACION</label>                          
                        <?php                         
                        if($fila['ob_habilitar']==1 || $fila['ob_habilitar']==NULL) {                        
                        ?>
                        
                        <select name = "ob_habilitar" id="ob_habilitar" class="con_estilos" required="">                            
                            <option value="1">OBSERVADO</option>
                            <option value="2">VALIDADO</option>                          
                        </select>                    
                
                        <?php                         
                        } else {                        
                        ?>
                
                        <select name = "ob_habilitar" id="ob_habilitar" class="con_estilos" readline>                            
                            <option value="2">VALIDADO</option>                          
                        </select> 
                
                        <?php                         
                        }                         
                        ?>
                        </div>
                
                 <div class="form-group">
                        <label for="first-name">TIPO DE OBSERVACION</label>  
                        <?php                         
                        if($fila['t_observacion']!=1) {                        
                        ?>
                        <select name = "t_observacion" id="t_observacion" class="con_estilos" required="">
                            <option value=""></option> 
                            <option value="2">INCONGRUENCIA DE FECHAS</option>  
                             <option value="3">ERRORES DE DIGITACION</option>  
                              <option value="4">CAMPOS INCOMPLETOS</option> 
                               <option value="1">SUBSANADO</option>
                        </select>                         
                        <?php                         
                        } else {                        
                        ?>
                        <select name = "t_observacion" id="t_observacion" class="con_estilos" required="">                            
                             <option value="1">SUBSANADO</option>                       
                        </select>                         
                    <?php                         
                        }                         
                        ?>
                        </div>              
              
                
                <div class="form-groupppp">
                        <label for="first-name">OBSERVACIONES</label>
                        <textarea class="form-control textareaa" placeholder="Solo 200 caracteres" name="ob_sectorista" 
                                  id="observaciones" maxlength="200"
                                  style="margin: 0px -233px 0px 0px; height: 62px; width: 439px;"><?php echo $fila['ob_sectorista'] ?></textarea>
                    </div>
                
                <div class="clearfix"></div>     
                    <button type= "submit" onclick="return confirm('Estás seguro que desea Grabar?');" value="Grabar" name = "grabar" class="btn btn-info btn-lg btn-responsive" id="insert"
                            onclick="this.onclick=function(){return false;}"> <span class="glyphicon glyphicon-pencil"></span>Grabar</button>       
            </form>            
        </div>
        
        <?php
            }
       }
       
       
else {
    
}
       } 
        ?>
        
        <script>
            function habilitarbaja(value)
            {
                if (value === '1')
                {
                    // habilitamos
                    document.getElementById("f_ob_re_correo_sect").disabled = true;
                    document.getElementById("ob_habilitar").disabled = true;
                    document.getElementById("ob_re_correo_date").required=false;                   
                    document.getElementById("ob_re_correo_date").value="";
                     document.getElementById("t_observacion").disabled = true;
                    
//                    
                } else if (value === '2') {
                    // deshabilitamos      
                    document.getElementById("f_ob_re_correo_sect").disabled = false;
                    document.getElementById("ob_habilitar").disabled = false;
                    document.getElementById("t_observacion").disabled = false;
                    document.getElementById("ob_re_correo_date").value="";
                    document.getElementById("ob_re_correo_date").required=true;  
//                    
                }
            }
        </script>


    </body>
</html>


<?php
if (isset($_POST['grabar'])) {

    include ('./conexionesbd/conexion_mysql.php');

    $dgansas = null;
    $sdgatpno = null;

    
    if (empty($_POST['ob_habilitar'])) {
        $ob_habilitar = 'NULL';
    } else {        
        $ob_habilitar = $_POST['ob_habilitar'];
    }
    
            if (empty($_POST['ob_re_correo_date'])) {
        $ob_re_correo_date = 'NULL';
    } else {
        $ob_re_correo_datee = $_POST['ob_re_correo_date'];
        $ob_re_correo_date = "'$ob_re_correo_datee'";
    }
    
                if (empty($_POST['t_observacion'])) {
        $t_observacion = 'NULL';
    } else {
        $t_observacionn = $_POST['t_observacion'];
        $t_observacion = "'$t_observacionn'";
    }
    
        if (empty($_POST['ob_re_correo'])) {
        $ob_re_correo = 'NULL';
    } else {
        $ob_re_correo = $_POST['ob_re_correo'];
    }
    
    if (empty($_POST['f_ob_re_correo_sect'])) {
        $f_ob_re_correo_sect = 'NULL';
    } else {
        $f_ob_re_correo_sectt = $_POST['f_ob_re_correo_sect'];
        $f_ob_re_correo_sect = "'$f_ob_re_correo_sectt'";
    }
    
    
    
            if (empty($_POST['ob_sectorista'])) {
        $ob_sectorista = 'NULL';
    } else {
        $ob_sectoristaa = $_POST['ob_sectorista'];
        $ob_sectorista = "'$ob_sectoristaa'";
    }
    
    
    
    date_default_timezone_set('America/Bogota');
    $fecha_hora_creacione = date('Y-m-d G:i:s');
    $fecha_hora_creacion = "'$fecha_hora_creacione'";
    
    //UPDATE dim_cposterior SET ob_habilitar='1', ob_sectorista='aaaa', ob_fecha='2018-07-26 09:30:00', ob_re_correo='1', f_ob_re_correo='2018-07-26 09:30:00' WHERE iddim_CPosterior='1';
    
//    $query1="UPDATE dim_cposterior SET 
//            ob_habilitar='1', 
//            ob_sectorista='aaaa', 
//            ob_fecha='2018-07-26 09:30:00', 
//            ob_re_correo='1', 
//            f_ob_re_correo='2018-07-26 09:30:00' 
//            WHERE iddim_CPosterior='1'";
    
    if($ob_habilitar==1) {
        $query1="UPDATE dim_cposterior SET 
            ob_habilitar='$ob_habilitar', 
            f_ob_habilitar_1=$fecha_hora_creacion, 
            ob_re_correo='$ob_re_correo',
            f_ob_re_correo_sect=$f_ob_re_correo_sect,
            f_ob_re_correo=$fecha_hora_creacion,  
            t_observacion=$t_observacion,
            ob_sectorista=$ob_sectorista, 
            ob_fecha=$fecha_hora_creacion
            WHERE iddim_CPosterior='$iddim_CPosterior'";
    }
    else if($ob_habilitar==2 && $ob_re_correo==1) {
        $query1="UPDATE dim_cposterior SET 
            ob_habilitar='$ob_habilitar', 
            f_ob_habilitar_2=$fecha_hora_creacion, 
            ob_re_correo='$ob_re_correo',
            t_observacion=$t_observacion,
            f_ob_re_correo_sect=$f_ob_re_correo_sect,
            f_ob_re_correo=$fecha_hora_creacion,            
            ob_sectorista=$ob_sectorista, 
            ob_fecha=$fecha_hora_creacion
            WHERE iddim_CPosterior='$iddim_CPosterior'";
        
    }
     else if($ob_habilitar==2 && $ob_re_correo==2) {
         $query1="UPDATE dim_cposterior SET    
             ob_habilitar='$ob_habilitar', 
            ob_re_correo='$ob_re_correo',
            t_observacion=$t_observacion,
            f_ob_re_correo_sect=$f_ob_re_correo_sect,
            f_ob_re_correo=$fecha_hora_creacion,            
            ob_sectorista=$ob_sectorista, 
            ob_fecha=$fecha_hora_creacion
            WHERE iddim_CPosterior='$iddim_CPosterior'";
     }
        
        

    
    if ($conexionmysql->query($query1)) {
                    echo 'Se Actualizo Correctamente.';
                    echo ' '.$ob_habilitar;
                } else {
                    echo 'Error al Actualizar registro<br>';
                }
            
    
}