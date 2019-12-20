
<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <title>Conexion con MySQL</title>	
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

        <script>
            function habilitar11(value)
            {
                if (value === "3")
                {
                    // habilitamos
                    document.getElementById("nit").required = true;
                    document.getElementById("femisionBRegistro").required = true;
                    document.getElementById("nResBRegistro").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    //document.getElementById("nResBRegistro").required = true;
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true;                   
                } else {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;
                    document.getElementById("femisionBRegistro").required = false;
                    document.getElementById("nResBRegistro").required = false;
                    //document.getElementById("idTGeneraBaja").value = "0";
                    //document.getElementById("nResBRegistro").required = false;
                    // document.getElementById("idTGeneraBaja").disabled = false;
                }
            }
        </script>

        <script>
            function habilitar22(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("nit").disabled = false;

                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("nResBRegistro00").disabled = false;

                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("fecartafinanza").disabled = false;



                    document.getElementById("fechaenvioOSPE").disabled = false;


                    //document.getElementById("fcorreo").disabled = false;

                } else if (value === "2") {
                    // deshabilitamos                    
                    document.getElementById("idTEstadoActual").value = "3";
                    //document.getElementById("idTEstadoActual").disabled = true;
                    //document.getElementById("idTEstadoActual").value = "3";

                    document.getElementById("idTRRBRegistro00").value = "";
                    document.getElementById("idTRRBRegistro00").disabled = true;
                    document.getElementById("nit").value = "";
                    document.getElementById("nit").disabled = true;

                    document.getElementById("femisionBRegistro").value = "";
                    document.getElementById("femisionBRegistro").disabled = true;
                    document.getElementById("nResBRegistro").value = "";
                    document.getElementById("nResBRegistro").disabled = true;

                    document.getElementById("fnotificacionBRegistro").value = "";
                    document.getElementById("fnotificacionBRegistro").disabled = true;


                    document.getElementById("fechaenvioOSPE").value = "";
                    document.getElementById("fechaenvioOSPE").disabled = true;


                    document.getElementById("observaciones").value = "";

                    //document.getElementById("fcorreo").disabled = true;
                }
            }
        </script>

        <script>
            function habilitar3A(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("nit").required = true;

                    document.getElementById("nResBRegistro00").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true; 
                    document.getElementById("dialog44").readonly = true;

                } else {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;

                    document.getElementById("nResBRegistro00").required = false;
                    document.getElementById("idTGeneraBaja").value = "0";
                    // document.getElementById("idTGeneraBaja").disabled = false;
                    document.getElementById("dialog44").readonly = false;
                }
            }
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

        <h1>Mantenimiento de las Bajas de Registro</h1>
        <h5>Se actualizara bajo su responsabilidad.
        </h5>
        
        <div>
            <?php
            
            $iddim_CPosterior = $_GET['iddim_CPosterior'];
            
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
        
    
        <?php
                       
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query000 = "SELECT 
                        vinculo_0, dni_dh_0, apellido_nombre_0,
                        vinculo_1, dni_dh_1, apellido_nombre_1,
                        vinculo_2, dni_dh_2, apellido_nombre_2,
                        vinculo_3, dni_dh_3, apellido_nombre_3,
                        vinculo_4, dni_dh_4, apellido_nombre_4 
                        FROM sisgasv.dim_sccmvtft t where t.iddim_aseguradoindevido='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result000 = $conexionmysql->query($query000);
//recorriendo el conjunto de resultados con un bucle
            ?>
                <table id="t1" border="1" summary=""> 
                      <th id="th1" colspan="3">DATOS PERSONALES DE LOS DERECHOHABIENTES</th>
                      <tr>
                          <th id="td1" style="text-align: center">DNI </th> 
                          <th id="td1" style="text-align: center">VINCULO </th> 
                          <th id="td1" style="text-align: center">APELLIDOS Y NOMBRES</th> 
                      </tr>
            <?php
            while ($fila = $result000->fetch_assoc()) {
                    ?> 
                

                    
                    <?php for ($i = 0; $i <= 4; $i++) { ?>  
       
                    <tr> 
                        <th id="td1"> 
                        <?php echo $fila['dni_dh_'.$i] ?>
                        </th>   
                        <th id="td1">                           
                            <?php echo $fila['vinculo_'.$i] ?>
                        </th>     
                        <th id="td1">
                            <?php echo $fila['apellido_nombre_'.$i] ?>
                        </th>                                                             
                    </tr>
                    
                    <?php
                    }
                    ?>
                
                </table>
            <br>
        
                    <?php
                }
                //liberando los recursos
               $result000->free();
                ?>
    
        <div>                                   
            <!--Incrustar php-->
            <?php
           

//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query = "SELECT ai.idDIM_Oficina as idDIM_OficinaII, ai.dni_t, ai.RUC,
                        cp.iddim_CPosterior, 
                        tp.Verificacion,
                        tpf.idTVerificacionPerfil,
                        tpf.VerificacionPerfil,
                        cp.perfil_otros,
                        cp.iddim_aseguradoindevido, 
                        tea.idTEstadoActual,
                        tea.EstadoActual, 
                        cp.idTGeneraBaja,
                        case 
                        when cp.idTGeneraBaja='1' then 'SI'
                        when cp.idTGeneraBaja='2' then 'NO'
                        when cp.idTGeneraBaja='4' then '--'
                        end as GeneraBaja,
                        trr.idTRRBRegistro,
                        trr.RRBRegistro,
                        cp.nit, cp.femisionBRegistro, cp.nResBRegistro, 
                        cp.nombrePDF,
                        cp.fnotificacionBRegistro, cp.respuestaBRegistro,
                        cp.respuestaBRegistro, cp.observaciones
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                        left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                        left join tiporrbregistro trr on cp.idTRRBRegistro=trr.idTRRBRegistro
                        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                        where cp.iddim_CPosterior='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result->fetch_assoc()) {
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

                    <tr> <td id="td1">
                            ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
                        <td id="td1"><?php echo $fila['RRBRegistro'] ?><br></td>

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
                $query1 = "SELECT ai.idDIM_Oficina, ai.autogenerado_t,
                        dc.InicioPEvaluar, dc.FinPEvaluar,
                        dc.iddim_CPosterior, dc.iddim_PaCalificar, 
                        dc.InicioPCalificar1, dc.FinPCalificar1, 
                        dc.InicioPCalificar2, dc.FinPCalificar2, 
                        dc.InicioPCalificar3, dc.FinPCalificar3,
                        dc.InicioPCalificar4, dc.FinPCalificar4, 
                        dc.InicioPCalificar5, dc.FinPCalificar5, 
                        dc.InicioPFinal, dc.FinPFinal,
                        dc.idtusuario, dc.fCreacion, dc.fActualizacion
                        FROM dim_pacalificar dc 
                        left join dim_aseguradoindevido ai on dc.iddim_CPosterior=ai.iddim_aseguradoindevido
                        where dc.iddim_CPosterior='$iddim_CPosterior'";

                //Obteniendo el conjunto de resultados
                $result1 = $conexionmysql->query($query1);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila1 = $result1->fetch_assoc()) {
                    ?>

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="5">
                            DETALLE DONDE INICIA Y DONDE ACABA EL PERIODO A EVALUAR (PERIODO COMPLETO)
                        </th>

                    </tr>
                    <tr>                                           
                        <td id="td1">PERIODO A EVULUAR INICIO</td>
                        <td id="td1"><?php echo $fila1["InicioPEvaluar"] ?><br></td>
                    </tr>
                    <tr>
                        <td id="td1">PERIODO A EVALUAR FIN</td>
                        <td id="td1"><?php echo $fila1["FinPEvaluar"] ?><br></td>

                    </tr>
                    
                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="3">
                            PERIODOS DE BAJA
                        </th>

                        <?php
                        $hoy = getdate();
                        //echo $hoy = date("d/m/Y");
                        ?>
                    </tr>
    <?php for ($i = 1; $i <= 5; $i++) { ?>  

                        <tr> 

                            <td id="td1">
                                Inicio <?php echo $i ?>º  Periodo de Baja
                            </td>
                            <td id="td1"><?php echo $fila1["InicioPCalificar$i"] ?><br></td>
                            
                        </tr>
                        <tr>
                            <td id="td1">
                                Fin del <?php echo $i ?>º Periodo a Baja
                            </td>
                            <td id="td1"><?php echo $fila1["FinPCalificar$i"] ?><br></td>
                            
                        </tr>            
    <?php } ?>
                    <th id="th1" scope="row" class="especial" colspan="3">
                        DETALLE DONDE INICIA Y DONDE ACABA EL PERIODO DE BAJA (PERIODO COMPLETO)
                    </th>
                    <tr>
                        <td id="td1">
                            Inicio del Periodo a Baja
                        </td>

                        <td id="td1"><?php echo $fila1["InicioPFinal"] ?><br></td>
                        
                    </tr>
                    <tr>
                        <td id="td1">
                            Fin del Periodo a Baja
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
                            
            <?php

$conexionmysql->close()
?>            
        </div>


    </body>
</html>