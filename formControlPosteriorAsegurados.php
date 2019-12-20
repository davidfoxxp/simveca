

<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>        
       <!-- <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> -->
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         

        <script>var $j = jQuery.noConflict();</script>
        
        <style type="text/css">
            /*programando con css*/
            body {
                background-image: url("imagenes/fondo2.jpg");
                background-repeat: repeat-x;
                background-attachment: fixed;
            }    
            #td1 {
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
                font-size:14px;
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
                vertical-align:left
            }

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

        <script type="text/javascript">
        function popUp(URL) {
            window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
        }
    </script>
        
        <script>
    $(function () {
<?php
for ($i = 0; $i <= 5; $i++) {
?>
            $("#dialog<?php echo $i ?>").hide();
            function abrir<?php echo $i ?>() {
                $("#dialog<?php echo $i ?>").show();
                $("#dialog<?php echo $i ?>").dialog({
                    resizable: true,
                    width: 1000,
                    height: 750,
                    modal: true
                });
            }
            $("#abriPoppup<?php echo $i ?>").click(
                    function () {
                        abrir<?php echo $i ?>();
                    });                    
         
                   
<?php
}
?>
    });
</script>

        <script>
            $(function () {
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional1").on('click', function () {
                    $("#tabla1 tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla1");
                });

                // Evento que selecciona la fila y la elimina 
                $(document).on("click", ".eliminar1", function () {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });

        </script>

        <script>
            $(function () {
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional2").on('click', function () {
                    $("#tabla2 tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla2");
                });

                // Evento que selecciona la fila y la elimina 
                $(document).on("click", ".eliminar2", function () {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });
        </script>

        <script type="text/javascript">
            function showContent() {
                element1 = document.getElementById("content1");
                element2 = document.getElementById("content2");
                element3 = document.getElementById("content3");
                element4 = document.getElementById("content4");
                element5 = document.getElementById("content5");
                element6 = document.getElementById("content6");
                check1 = document.getElementById("check1");
                check2 = document.getElementById("check2");
                check3 = document.getElementById("check3");
                check4 = document.getElementById("check4");
                check5 = document.getElementById("check5");
                check6 = document.getElementById("check6");

                if (check1.checked) {
                    element1.style.display = 'block';
                } else {
                    element1.style.display = 'none';
                }

                if (check2.checked) {
                    element2.style.display = 'block';
                } else {
                    element2.style.display = 'none';
                }

                if (check3.checked) {
                    element3.style.display = 'block';
                } else {
                    element3.style.display = 'none';
                }

                if (check4.checked) {
                    element4.style.display = 'block';
                } else {
                    element4.style.display = 'none';
                }

                if (check5.checked) {
                    element5.style.display = 'block';
                } else {
                    element5.style.display = 'none';
                }

                if (check6.checked) {
                    element6.style.display = 'block';
                } else {
                    element6.style.display = 'none';
                }

            }
        </script>

        <script language="javascript">
            $(document).ready(function () {
                $("#cbx_red").change(function () {

                    $("#cbx_red option:selected").each(function () {
                        codTCentroAtencion = $(this).val();
                        $.post("include/getCentrosAsistenciales.php", {codTCentroAtencion: codTCentroAtencion}, function (data) {
                            $("#cbx_centroA").html(data);
                        });
                    });
                })
            });
        </script>

        <style type="text/css">
            
            * {
                padding: 0px;
                margin: 0px;
            }
            
            #header {
                margin:auto;
                width: 500px;
                font-family: Arial, Helvetica, sans-serif;
            }
            
            ul, ol {
                list-style: none;
            }
            
            .nav li a {
                background: #000;
                color:#fff;
                text-decoration: none;
                padding: 10px 15px;
                display: block;
            }
            
            .nav li a:hover {
                background-color: #0685C4;
            }
            
            .nav > li {
                float: left;
            }
            
            .nav li ul {
                display:none;
                position:absolute;
                min-width: 387px;
            }
            
            .nav li:hover > ul {
                display:block;
            }
           
            .nav li ul li {
                position:relative;
            }
            
            .nav li ul li ul {
                right: -387px;
                top: 0px;
            }
        </style>

    </head>
    <body>   
        <header>
            <h3>MINI ACREDITA</h3>
            <p>DATOS DEL ASEGURADO SEGUN ACREDITA
                
        </header>

        <?php
        $dni = $_GET['dni'];
        ?>            
        
        <h5>
            DATOS DEL REGISTRO SOLICITADO
        </h5>       
            <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">                  

                <?php
                include './conexionesbd/conexion_oracle.php';
                $queryT = oci_parse($conexionora, "SELECT sc.dgansas, sc.dgatapa || ' ' ||  sc.dgatama || ' ' ||sc.dgatpno || ' ' || nvl(sc.dgatsno, '') as datos, sc.dgactdi,
                                                case when sc.dgactdi='1' then 'LE/DNI'
                                                     when sc.dgactdi='2' then 'Carné de Extranjería'
                                                     when sc.dgactdi='3' then 'Partida de Nacimiento'
                                                     when sc.dgactdi='4' then 'RUC'
                                                     when sc.dgactdi='5' then 'Identificacion Militar'
                                                     when sc.dgactdi='6' then 'Doc.Prov.de Identidad'
                                                     when sc.dgactdi='7' then 'Nro Documento'
                                                     when sc.dgactdi='8' then 'Doc.Educacion Superior'
                                                     when sc.dgactdi='9' then 'Trabajador Menor de Edad'
                                                     end as dgactdi_des,
                                                     sc.dgandid as dni, sc.DGACUGD, sg.departamen || ' - ' || sg.provincia || ' - ' || sg.distrito, sc.DGATCAL || ' ' || sc.DGANILO || ' ' || sc.DGANNMK || ' ' || sc.DGATURB as direccion,
                                                     sg.nombrered, sg.nivel || ' ' || sg.desccaa as CENTRO,
                                                     --SUBSTR(sc.DGACAUT,7,1) AS SEXO,
                                                     case when SUBSTR(sc.DGACAUT,7,1)='1' then 'MASCULINO'
                                                     when SUBSTR(sc.DGACAUT,7,1)='0' then 'FEMENINO'                                                     
                                                     end as SEXO,
                                                     sc.dgafnac,
                                                    TRUNC(MONTHS_BETWEEN(TO_DATE(TO_CHAR(SYSDATE, 'DD/MM/YYYY'),'DD/MM/YYYY'),  sc.dgafnac) / 12, 0) as edad
                                                FROM dim_SCCMDGAT sc 
                                                left join dim_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
                                                where sc.dgandid='$dni' and sg.periodo = '201808'");

                oci_execute($queryT);
                $i = 0;
                while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                    $i++;
                    ?> 

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="4">
                            TITULAR
                        </th>  
                    </tr>
                    <tr>
                        <th class="especial">
                            APELLIDOS Y NOMBRES
                        </th>
                    <input id="i1" type="HIDDEN" name="dgansas" size="50" value="<?php echo $row[0] ?>" readOnly="readOnly">   
                    <td colspan="1" id="td1"><input id="i1" type="text" name="datos" size="50" value="<?php echo $row[1] ?>" readonly> 

                    <th class="especial">
                        DOCUMENTO IDENTIDAD
                    </th>
                    <td colspan="1" id="td1">
                        <a href="#" id="abriPoppup<?php echo $i ?>">
                            <input id="i1" type="HIDDEN" name="tipodoc" size="50" value="<?php echo $row[3] ?>" readOnly="readOnly">   
                            <input id="i1" type="text" name="dni" size="50" value="<?php echo $row[4] ?>" readOnly="readOnly">                                  
                        </a>    
                    </td>
                    </tr>  
                    <tr>

                    </tr> 
                    <tr>
                        <th class="especial">
                            UBIGEO
                        </th>
                    <input id="i1" type="HIDDEN" name="ubigeo" size="50" value="<?php echo $row[5] ?>" readOnly="readOnly">   
                    <td colspan="1" id="td1"><input id="i1" type="text" name="dubigeo" size="50" value="<?php echo $row[6] ?>" readonly></td>     

                    <th class="especial">
                        DOMICILIO
                    </th>                        
                    <td colspan="1" id="td1"><input id="i1" type="text" name="domicilioA" size="50" value="<?php echo $row[7] ?>" readonly></td>                            
                    </tr> 
                    <tr>

                    </tr> 
                    <tr>
                        <th class="especial">
                            RED ASISTENCIAL
                        </th>                        
                        <td colspan="1" id="td1"><input id="i1" type="text" name="redA" size="50" value="<?php echo $row[8] ?>" readonly></td>                            
                        <th class="especial">
                            CENTRO ASISTENCIAL
                        </th>                        
                        <td colspan="1" id="td1"><input id="i1" type="text" name="centroA" size="50" value="<?php echo $row[9] ?>" readonly></td>                            
                    </tr> 
                    <tr>
                        <th class="especial">
                            SEXO
                        </th>                        
                        <td colspan="1"><input id="i1" type="text" name="sexo" value="<?php echo $row[10] ?>" readonly></td> 
                        <th class="especial">
                            FECHA NACIMIENTO
                        </th>  
                        <td colspan="1"><input id="i1" type="text" name="sexo" size="20" value="<?php echo $row[11] ?>" readonly></td> 
                    </tr> 
                    <tr> 

                        <th class="especial">
                            EDAD
                        </th>                        
                        <td colspan="1"><input id="i1" type="text" name="sexo" size="10" value="<?php echo $row[12] ?>" readonly></td> 
                    </tr> 
                    <tr>

                    </tr>
                    <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
                        <iframe src="formularioPersona.php?dni=<?php echo $row[4] ?>" style="width: 100%; height: 90%"></iframe>
                    </div>
                    <?php
                }

//liberando los recursos
                oci_free_statement($queryT);
                ?> 

                <?php
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
                                            where a.dgandid='$dni' and sg.periodo = '201808'");

                oci_execute($querydh);

                while ($row = oci_fetch_array($querydh, OCI_NUM + OCI_RETURN_NULLS)) {
                    ?> 

                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="4">
                            DERECHO HABIENTE
                        </th>                                               
                    </tr>
                    <tr>                               
                        <th class="especial">
                            TIPO DE VINCULO DEL DH
                        </th>      
                        <td colspan="1" id="td1"><input id="i1" type="text" name="vinculo_dh" size="50" value="<?php echo $row[0] ?>" readonly>       

                        <th class="especial">
                            SEXO
                        </th>                        
                        <td colspan="1" id="td1"><input id="i1" type="text" name="sexo_dh" size="50" value="<?php echo $row[7] ?>" readonly></td>    
                    </tr>
                    <tr>                               
                        <th class="especial">
                            FECHA DE NACIMIENTO
                        </th>      
                        <td colspan="1" id="td1"><input id="i1" type="text" name="fnac_dh" size="50" value="<?php echo $row[3] ?>" readonly>       

                        <th class="especial">
                            EDAD
                        </th>      
                        <td colspan="1" id="td1"><input id="i1" type="text" name="edad_dh" size="50" value="<?php echo $row[4] ?>" readonly>           
                    </tr>
                    <tr>                               

                    </tr>
                    <tr>

                    </tr> 
                    <tr>
                        <th class="especial">
                            APELLIDOS Y NOMBRES
                        </th>
                        <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="nom_dh" value="<?php echo $row[6] ?>" readonly>                            

                        <th class="especial">
                            DOCUMENTO IDENTIDAD
                        </th>
                        <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="dni_dh" value="<?php echo $row[5] ?>" readonly>                                                           
                        </td>    
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <th class="especial">
                            UBIGEO
                        </th>
                    <input id="i1" type="HIDDEN" name="ubigeo" size="50" value="<?php echo $row[8] ?>" readOnly="readOnly">   
                    <td colspan="1" id="td1"><input id="i1" type="text" name="dubigeo_dh" size="50" value="<?php echo $row[9] ?>" readonly></td>                            

                    <th class="especial">
                        DOMICILIO
                    </th>                        
                    <td colspan="1" id="td1"><input id="i1" type="text" name="domicilioA_dh" size="50" value="<?php echo $row[10] ?>" readonly></td>                            
                    </tr> 
                    <tr>

                    </tr> 
                    <tr>
                        <th class="especial">
                            RED ASISTENCIAL
                        </th>                        
                        <td colspan="1" id="td1"><input id="i1" type="text" name="redA_dh" size="50" value="<?php echo $row[11] ?>" readonly></td>                            

                        <th class="especial">
                            CENTRO ASISTENCIAL
                        </th>                        
                        <td colspan="1" id="td1"><input id="i1" type="text" name="centroA_dh" size="50" value="<?php echo $row[12] ?>" readonly></td>                            
                    </tr> 
                    <tr>

                    </tr> 

                    <?php
                }
                //liberando los recursos
                oci_free_statement($querydh);
                ?> 

                <?php
                $queryemp = oci_parse($conexionora, "select cc.NOMBRE, cc.NUMRUC, nn.PER_APORTA,
                                            case when NN.TIP_TRABAJADOR='19' then 'Ejecutivo'
                                                     when NN.TIP_TRABAJADOR='20' then 'Obrero'
                                                     when NN.TIP_TRABAJADOR='21' then 'Empleado'
                                                     when NN.TIP_TRABAJADOR='22' then 'Trabajador Portuario o Panificador'   
                                                       when NN.TIP_TRABAJADOR='23' then 'Practicante Senati'
                                                     when NN.TIP_TRABAJADOR='24' then 'Pensionista o Cesante'
                                                     when NN.TIP_TRABAJADOR='26' then 'Pensionistas 28320 CBSSP'
                                                       when NN.TIP_TRABAJADOR='27' then 'Construccion Civil'
                                                     when NN.TIP_TRABAJADOR='28' then 'Piloto y Copiloto de Aviación Comercial'
                                                     when NN.TIP_TRABAJADOR='29' then 'Marítimo, Fluvial o lacustre'   
                                                       when NN.TIP_TRABAJADOR='30' then 'Periodista'
                                                     when NN.TIP_TRABAJADOR='31' then 'Trab. de la industria de cuero'
                                                     when NN.TIP_TRABAJADOR='32' then 'Mineros'   
                                                       when NN.TIP_TRABAJADOR='33' then 'Pescador'
                                                     when NN.TIP_TRABAJADOR='34' then 'Trabajador del Hogar'
                                                     when NN.TIP_TRABAJADOR='35' then 'Opción Pensionista Trabajador'   
                                                       when NN.TIP_TRABAJADOR='36' then 'Pescador 28320 CBSSP'
                                                     when NN.TIP_TRABAJADOR='37' then 'Minero de Tajo Abierto'
                                                     when NN.TIP_TRABAJADOR='38' then 'Minero de Industria Minera Metalúrgica'  
                                                       when NN.TIP_TRABAJADOR='51' then 'Ex Ama de casa'
                                                     when NN.TIP_TRABAJADOR='52' then 'Ex Chofer profesional Ind.'
                                                     when NN.TIP_TRABAJADOR='53' then 'Ex Facultativo Ind.'   
                                                       when NN.TIP_TRABAJADOR='54' then 'Ex Continuación Facultativa'
                                                     when NN.TIP_TRABAJADOR='56' then 'Artistas'
                                                     when NN.TIP_TRABAJADOR='64' then 'Agrario Dependiente D.Leg. 885'   
                                                       when NN.TIP_TRABAJADOR='65' then 'Trabajador Actividad Acuícula'
                                                     when NN.TIP_TRABAJADOR='66' then 'Pescador y Procesador artesanal ind.'
                                                     when NN.TIP_TRABAJADOR='67' then 'Contratacion Administrativa de Servicios (CAS) - DL N 1057'   
                                                       when NN.TIP_TRABAJADOR='70' then 'Conductor de Microempresa'
                                                     when NN.TIP_TRABAJADOR='80' then 'Persona con Ing.de 4ta'
                                                     when NN.TIP_TRABAJADOR='81' then 'Conv. Modalidad Formati.'   
                                                        when NN.TIP_TRABAJADOR='82' then 'Personal de Terceros'
                                                     when NN.TIP_TRABAJADOR='83' then 'Empleado de Confianza'   
                                                       when NN.TIP_TRABAJADOR='84' then 'Servidor Publico - Directivo Superior'
                                                     when NN.TIP_TRABAJADOR='85' then 'Servidor Publico - Ejecutivo'
                                                     when NN.TIP_TRABAJADOR='86' then 'Servidor Publico - Especialista'  
                                                        when NN.TIP_TRABAJADOR='87' then 'Servidor Publico - de Apoyo'
                                                     when NN.TIP_TRABAJADOR='88' then 'Personal de la Administracion Publica'   
                                                       when NN.TIP_TRABAJADOR='95' then 'Cuarta-Quinta Enciso F'
                                                     when NN.TIP_TRABAJADOR='98' then 'Cuarta-Quinta sin Relacion de Dependencia'
                                                     when NN.TIP_TRABAJADOR='99' then 'Solo para SCTR'                                                                                                            
                                                     end as TIPOTRABAJADOR
                                            --cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                            from DIM_CUENTA_INDIV_01_10_XX nn
                                            left join dim_CONTRIBUYENTES cc on nn.NUM_DOCIDE_EMPL=cc.NUMRUC
                                            where nn.NUM_DOCIDE_ASEG='$dni' and not nn.COD_TRIBUTO='052101' and not nn.COD_TRIBUTO='052104' 
                                                and nn.PER_APORTA = '201808'");

                oci_execute($queryemp);

                while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {
                    $i++;
                    $periodo = $row[2];
                    ?>   
                    <tr>
                        <th id="th1" scope="row" class="especial" colspan="5">
                            EMPRESA
                        </th>                                               
                    </tr>
                    <tr>
                        <th class="especial">
                            NOMBRE FISCAL
                        </th>
                        <td colspan="1" id="td1"><input id="i1" type="text" size="80" name="nombreEntidad" value="<?php echo $row[0] ?>" readonly>                              

                        <th class="especial">
                            RUC
                        </th>                    
                        <td colspan="1" id="td1">
                            <a href="#" id="abriPoppup<?php echo $i ?>">
                            <input id="i1" type="text" name="NUMRUC" size="50" value="<?php echo $row[1] ?>" readOnly="readOnly"> 
                    </tr>

                    <tr>
                    <th class="especial">
                           TIPO DE TRABAJADOR
                    </th>
                    <td colspan="1" id="td1"><input id="i1" type="text" size="80" name="tipotrabajador" value="<?php echo $row[3] ?>" readonly>                              
                    <th class="especial">
                           ULTIMO APORTE
                    </th>
                    <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="APORTE" value="<?php echo $row[2] ?>" readonly>
                    </tr>
                    <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
                    <iframe src="formEntidades.php?ruc=<?php echo $row[1] ?>" style="width: 100%; height: 100%"></iframe>
                    </div>
                   <?php
                            }
//liberando los recursos
                            oci_free_statement($queryemp);
//$conexion->close()
                            ?> 
            </table>            
    </body>
</html>





