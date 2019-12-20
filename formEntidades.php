<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conexion con MySQL</title>		

    </head>
    <body>
        <h3>Este listado de empresas es para uso Institucional y no para otros fines.
        </h3>
        <style type="text/css">
            .tg  
            {
                border-collapse:collapse;border-spacing:0;border-color:#999;
            }
            .tg td
            {
                font-family:Arial, sans-serif;
                font-size:14px;padding:10px 5px;

                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#444;
                background-color:#F7FDFA;
            }
            .tg th{
                font-family:Arial, sans-serif;font-size:14px;font-weight:normal;
                padding:10px 5px;
                border-style:solid;

                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            .tg .tg-yw4l{
                vertical-align:top
            }
            th.tg-sort-header::-moz-selection {
                background:transparent; 
            }
            th.tg-sort-header::selection      {
                background:transparent; 
            }
            th.tg-sort-header {
                cursor:pointer; 
            }
            table th.tg-sort-header:after 
            {  content:'';  float:right;  margin-top:7px;  border-width:0 4px 4px;  border-style:solid;  border-color:#404040 transparent;  visibility:hidden;  
            }
            table th.tg-sort-header:hover:after {
                visibility:visible;  
            }
            table th.tg-sort-desc:after,table th.tg-sort-asc:after,table th.tg-sort-asc:hover:after 
            {  visibility:visible;  opacity:0.4;  
            }table th.tg-sort-desc:after {  border-bottom:none;  border-width:4px 4px 0;  }@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
        </style>
        <div>
            <form action="" method="GET">		
                <table id="tg-zYo7u" class="tg">                                        
                    <!--Incrustar php-->
                    <?php
                    include './conexionesbd/conexion_oracle.php';
                    $ruc = $_GET['ruc'];
                    //incluir el archivo de conexion
                    //realizando una consulta usando la clausula select
                    $queryemp = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, 
                                                        case when cc.flag22='00' then 'HABIDO'
                                                        when cc.flag22='01' then 'NO HALLADO SE MUDO DE DOMICILIO'
                                                        when cc.flag22='02' then 'NO HALLADO FALLECIO'
                                                        when cc.flag22='03' then 'NO HALLADO NO EXISTE DOMICILIO'
                                                        when cc.flag22='04' then 'NO HALLADO CERRADO'
                                                        when cc.flag22='05' then 'NO HALLADO NRO.PUERTA NO EXISTE'
                                                        when cc.flag22='06' then 'NO HALLADO DESTINATARIO DESCONOCIDO'
                                                        when cc.flag22='07' then 'NO HALLADO RECHAZADO'
                                                        when cc.flag22='08' then 'NO HALLADO OTROS MOTIVOS'
                                                        when cc.flag22='09' then 'PENDIENTE'
                                                        when cc.flag22='10' then 'NO APLICABLE'
                                                        when cc.flag22='11' then 'POR VERIFICAR'
                                                        when cc.flag22='12' then 'NO HABIDO'
                                                        when cc.flag22='20' then 'NO HALLADO'
                                                        when cc.flag22='21' then 'NO EXISTE LA DIRECCION DECLARADA'
                                                        when cc.flag22='22' then 'DOMICILIO CERRADO'
                                                        when cc.flag22='23' then 'NEGATIVA RECEPCION X PERSONA CAPAZ'
                                                        when cc.flag22='24' then 'AUSENCIA DE PERSONA CAPAZ'
                                                       when cc.flag22='40' then 'DEVUELTO'
                                                        else '-'
                                                   end as cond_domicilio_emp,                                                   
                                                   case when cc.ESTADO='00' then  'ACTIVO'
                                                        when cc.ESTADO='01' then  'BAJA PROVISIONAL'
                                                        when cc.ESTADO='02' then  'BAJA PROV. POR OFICIO'
                                                        when cc.ESTADO='03' then  'SUSPENSION TEMPORAL'
                                                        when cc.ESTADO='04' then  'ANUL.PROVI.-ACTO ILICITO'
                                                        when cc.ESTADO='10' then  'BAJA DEFINITIVA'
                                                        when cc.ESTADO='11' then  'BAJA DE OFICIO'
                                                        when cc.ESTADO='12' then  'BAJA MULT.INSCR. Y OTROS'
                                                        when cc.ESTADO='20' then  'NUM. INTERNO IDENTIF.'
                                                        when cc.ESTADO='21' then  'OTROS OBLIGADOS'
                                                        when cc.ESTADO='22' then  'INHABILITADO-VENT.UNICA'
                                                        when cc.ESTADO='30' then  'ANULACION - ERROR SUNAT'
                                                        when cc.ESTADO='31' then  'ANULACION - ACTO ILICITO'
                                                        else '-'
                                                    end as estado_empresa,
                                                    u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO,
                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                                    from dim_CONTRIBUYENTES cc
                                                    left join dim_UBIGEO u 
                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
                                                    where cc.NUMRUC='$ruc'");
                    oci_execute($queryemp);

                    while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {
                        ?>		
                        <tr>
                            <th class="tg-031e" colspan="2">DETALLE DE LA EMPRESA </th>
                        </tr>

                        <tr>      
                            <td>TIPO EMPRESA</td>
                            <td><?php echo $row[0] ?></td>
                        </tr>
                        <tr>
                            <td>NUMERO DE IDENTIDAD</td>	
                            <td><?php echo $row[1] ?></td>

                        </tr>
                        <tr>
                            <td>NOMBRE DE IDENTIDAD</td>	
                            <td><?php echo $row[2] ?></td>

                        </tr>
                        <tr>
                            <td>CONDICION</td>	
                            <td><?php echo $row[3] ?></td>

                        </tr>
                        <tr>
                            <td>ESTADO</td>	
                            <td><?php echo $row[4] ?></td>

                        </tr>
                        <tr>
                            <td>UBIGEO</td>	
                            <td><?php echo $row[5] ?></td>

                        </tr>                        
                        <tr>
                            <td>DIRECCION</td>	
                            <td><?php echo $row[6] ?></td>
                        </tr>                                                
                        <?php
                    }
                    //liberando los recursos
                    oci_free_statement($queryemp);
                    //cerrando los recursos
                    //$conexion->close()
                    ?>	
                </table>
                <br>
                <?php
                $queryempl = oci_parse($conexionora, "select t.NUMRUC, t.NRODOC, t.NOMBRE, t.CARGO, t.VDESDE
                                                    from dim_REPRESENTANTES_LEGALES t
                                                    where t.NUMRUC='$ruc'");
                oci_execute($queryempl);
                //Obteniendo el conjunto de resultados
                ?>                

                <table id="tg-zYo7u" class="tg">
                    <thead>
                        <tr>
                            <th class="tg-031e" colspan="4">REPRESENTANTE LEGAL </th>
                        </tr>
                        <tr class="centro">
                            <th class="tg-031e">
                                NUMERO DOCUMENTO
                            </th>
                            <th class="tg-031e">
                                NOMBRE
                            </th>
                            <th class="tg-031e">
                                CARGO
                            </th>
                            <th class="tg-031e">
                                VIGENTE DESDE
                            </th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = oci_fetch_array($queryempl, OCI_NUM + OCI_RETURN_NULLS)) {
                            ?>      
                            <TR>
                                <td>
                                    <?php echo $row[1] ?>
                                </td>
                                <td>
                                    <?php echo $row[2] ?>
                                </td>
                                <td>
                                    <?php echo $row[3] ?>
                                </td>
                                <td>
                                    <?php echo $row[4] ?>
                                </td>                                
                            </TR>                    
                            <?php
                        }
                        //liberando los recursos
                        oci_free_statement($queryempl);
                        //cerrando los recursos
                        //$conexion->close()
                        ?>   
                    </tbody>          
                </table>
                <?php
                $querynumtrab = oci_parse($conexionora, "select T.NUM_DOCIDE_EMPL, T.PER_APORTA, COUNT(*) DECLARADOS
                    from DIM_CUENTA_INDIV_01_10_XX t 
                    WHERE T.NUM_DOCIDE_EMPL='$ruc' 
                    and (not T.COD_TRIBUTO='052101' and not T.COD_TRIBUTO='052104')
                    GROUP BY T.NUM_DOCIDE_EMPL, T.PER_APORTA
                    order by T.PER_APORTA DESC");
                oci_execute($querynumtrab);

                //Obteniendo el conjunto de resultados
                ?>
                <BR>
                <div style="width: auto; height: 300px; overflow-y: auto; ">
                    <table id="tg-zYo7u" class="tg">
                        <thead>
                            <tr>
                                <th class="tg-031e" colspan="4">CANTIDAD DE TRABAJADORES </th>
                            </tr>
                            <tr class="centro">
                                <th class="tg-031e">
                                    RUC
                                </th>
                                <th class="tg-031e">
                                    APORTE
                                </th>
                                <th class="tg-031e">
                                    TRABAJADORES DECLARADOS
                                </th>                                                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = oci_fetch_array($querynumtrab, OCI_NUM + OCI_RETURN_NULLS)) {
                                ?>      
                                <TR>
                                    <td>
                                        <?php echo $row[0] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1] ?>                                    
                                    </td>
                                    <td>
                                        <?php echo $row[2] ?>                                    
                                    </td> 

                                </TR>                    
                                <?php
                            }
                            //liberando los recursos
                            oci_free_statement($querynumtrab);
                            //cerrando los recursos
                            //$conexion->close()
                            ?>  

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>