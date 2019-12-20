<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura, o.nomenclaturaOSPE,
        o.oficina,o.direccion,o.Distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SIMVECA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>

        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>

        <!-- Beginning of compulsory code below -->

        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>        
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>
        <!-- / END -->
        
        <style type="text/css">
            #th1 { 
                color: #339900;
             
            }
        </style>
        
        
       <script>
            function habilitarbaja(value)
            {
                if (value === '1')
                {
                    // habilitamos
                    
                    document.getElementById("nResBRegistro00").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("ano").disabled = false;

                    document.getElementById("nit").disabled = false;
                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("idTEstadoActual").value = "2";
                    document.getElementById("idTEstadoActual").disabled = false;
                    
                    document.getElementById("fechaemi").style.display="block";
                    document.getElementById("fechaeva").style.display="none";
                    document.getElementById("siesno").style.display="block";
                    document.getElementById("siesno2").style.display="block";
                    document.getElementById("siesno3").style.display="none";
                    document.getElementById("finicali").disabled = true;
                    document.getElementById("ffincali").disabled = true;
                    document.getElementById("finicali").required=false;
                    document.getElementById("ffincali").required=false;
                } else if (value === '2') {
                    // deshabilitamos      
                    
                    document.getElementById("nResBRegistro00").disabled = true;
                    document.getElementById("unidad").disabled = true;
                    document.getElementById("ano").disabled = true;
                    document.getElementById("cbx_perfil").required = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("fnotificacionBRegistro").disabled = true;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTEstadoActual").disabled = true;
                    document.getElementById("idTEstadoActual").value = "3";
                    document.getElementById("idTEstadoActual0").disabled = false;
                    document.getElementById("idTEstadoActual0").value = "3";
                    
                    document.getElementById("fechaemi").style.display="none";
                    document.getElementById("fechaeva").style.display="block";
                    document.getElementById("siesno").style.display="none";
                    document.getElementById("siesno2").style.display="none";
                    document.getElementById("siesno3").style.display="block";
                    document.getElementById("finicali").disabled = false;
                    document.getElementById("ffincali").disabled = false;
                    document.getElementById("finicali").required=true;
                    document.getElementById("ffincali").required=true;

                }
            }
        </script>
        
         <script>
            function habilitarbaja2(value)
            {
                if (value === '2')
                {
                    // habilitamos
                    
                    document.getElementById("nResBRegistro00").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("ano").disabled = false;

                    document.getElementById("nit").disabled = false;
                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;
                    
                    
                    document.getElementById("nResBRegistro00").required = true;
                    document.getElementById("unidad").required = true;
                    document.getElementById("ano").required = true;
                    document.getElementById("cbx_perfil").required = true;
                    document.getElementById("nit").required = true;
//                    document.getElementById("fnotificacionBRegistro").required = true;
                    document.getElementById("femisionBRegistro").required = true;
//                    document.getElementById("idTRRBRegistro").required = true;
                    document.getElementById("cbx_origencp").required = true;
                    
                    
                    
                    

                } else if (value === '1') {
                    // deshabilitamos      
                    
                    document.getElementById("nResBRegistro00").disabled = true;
                    document.getElementById("unidad").disabled = true;
                    document.getElementById("ano").disabled = true;

                    document.getElementById("nit").disabled = true;
                    document.getElementById("fnotificacionBRegistro").disabled = true;
                    document.getElementById("femisionBRegistro").disabled = true;
                    document.getElementById("idTRRBRegistro").disabled = true;
                    //document.getElementById("idTEstadoActual").disabled = true;
                    document.getElementById("idTEstadoActual").value = "1";
                    document.getElementById("idTEstadoActual0").disabled = false;
                    document.getElementById("idTEstadoActual0").value = "1";
                    document.getElementById("cbx_perfil").required = false;

                }
            }
        </script>
        
<script>
    var mostrarValor = function(x){
            document.getElementById('textoOAS').value=x;
            }
</script>
    </head>
    <body class="vimeo-com">

<!--        <h4><img src="imagenes/logo_login.png" alt="" />-->

            <?PHP
            //echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni'] . '-' . utf8_decode($row['oficina']));
            //echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . utf8_decode($row['oficina']);
            //echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
             $nomenclaturaOSPE = $row['nomenclaturaOSPE'];
        $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = utf8_decode($row['oficina']);
            ?>  
<!--        </h4>-->

        <!-- Beginning of compulsory code below -->
        
        <!-- / END -->

        <?php
        $dni = NULL;
        $periodo = NULL;
        $red = NULL;
        $ruc = NULL;
        if (isset($_POST['buscar'])) {
            $dni = $_POST['dni'];
            $ruc = $_POST['ruc'];
        }
        $idtusuario = $_SESSION['usuario'];

        if (empty($_POST['textosino'])) {
            $textosino = NULL;
        } else {
            $textosinoo = $_POST['textosino'];
            $textosino = "$textosino";
        }

        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?>   

        <div class="container" id="advanced-search-form">
            <h2>BUSCAR DATOS DEL ASEGURADO</h2>
            <form name="form" action="" method="POST" class="form-horizontal">   
                <div class="form-group">
                    <label for="first-name">INGRESE EL DNI:</label>
                    <input type="text" class="form-control" id="first-name" name="dni" minLength="8" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                </div>
                <div class="form-group">
                    <label for="last-name">INGRESE RUC</label>
                    <input type="number" class="form-control" id="ruc" name="ruc" readOnly  maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                </div>
                <div class="form-group">
                    <label for="country">HABILITAR</label>                
                    <input type="checkbox" id="check1" value="1" onclick="habilitar()" checked>
                </div>            
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search" name="buscar" value="Buscar"> <span class="glyphicon glyphicon-search"></span> Buscar</button>    
            </form>
        </div> 

        <?php
        include './conexionesbd/conexion_oracle.php';
        $queryT = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut, 
                                            (t.TXT_APEPATERNO|| ' ' ||nvl(t.TXT_APEMATERNO,'')|| ' ' ||nvl(t.TXT_APEMATCASADA,'')|| ' ' ||t.TXT_NOMBRES) as datos,
                                            sc.dgactdi,
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
                                            sc.dgandid as dni, sc.DGACUGD, u.departamento || ' - ' || u.provincia || ' - ' || u.distrito as ubigeo, t.txt_direccion as direccion, 
                                            t.cod_estcivil,       
                                            case when T.cod_sexo='0' then 'MUJER'
                                            when t.cod_sexo='1' then 'HOMBRE' 
                                            end as des_sexo 
                                     from dim_csamreniec t 
                                     LEFT JOIN dim_ubigeo u 
                                     ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                     AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                     AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                     left join dim_SCCMDGAT sc on t.ide_dni=sc.dgandid
                                     WHERE t.ide_dni='$dni'");


        oci_execute($queryT);

        while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
            ?>
            <div class="container" id="advanced-search-form_2">
                <h2>DATOS DEL ASEGURADO - TITULAR</h2>

                <form name="form" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="first-name">APELLIDOS Y NOMBRES</label>                        
                        <input type="text" class="form-control nombres" id="first-name" name="datos" value="<?php echo $row[2] ?>" readonly></input>
                    </div>
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="first-name">DOCUMENTO IDENTIDAD (<?php echo $row[4] ?>)</label>
                        <input class="form-control" type="HIDDEN" name="dgansas" value="<?php echo $row[0] ?>" readOnly="readOnly"></input>
                        <input class="form-control" type="HIDDEN" name="tipodoc"  value="<?php echo $row[3] ?>" readOnly="readOnly"></input>
                        <a href="#" id="abriPoppup1">
                            <input type="text" class="form-control" name="dni" value="<?php echo $row[5] ?>" readOnly></input>
                        </a>
                        <div id="dialog1" title="SGVCA" class="contenido">
                            <iframe src="formularioPersona.php?dni=<?php echo $row[5] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="category">AUTOGENERADO</label>
                        <input type="text" class="form-control" name="dgacaut" value="<?php echo $row[1] ?>" readOnly="readOnly"></input>                            
                    </div>
                    <div class="form-group">
                        <label for="number">UBIGEO</label>
                        <input type="HIDDEN" name="ubigeo" value="<?php echo $row[6] ?>" readOnly="readOnly"></input>   
                        <input type="text" class="form-control" name="dubigeo" value="<?php echo $row[7] ?>" readonly></input>                        
                    </div>
                    <div class="form-group">
                        <label for="sexo">SEXO</label>
                        <input type="text" class="form-control" name="sexo" value="<?php echo $row[10] ?>" readonly></input>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">DOMICILIO</label>
                        <input type="text" class="form-control nombres" name="domicilioA" value="<?php echo $row[8] ?>" readonly></input>                            
                    </div>
                    
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    
                    <div class="form-group">
                        <label for="domicilio">TIPO DE TRABAJADOR</label>
                         <select class="form-control" name = "ttrabajador" id="ttrabajador" required>
                                <option value = "">--</option>                                
                                <option value="1">RG - TRABAJADOR REGULAR</option>
                                <option value="119">TH - TRABAJADOR DEL HOGAR</option>
                                <option value="201">AD - AGRARIO DEPENDIENTE</option>
                                <option value="203">AI - AGRARIO INDEPENDIENTE</option>
                                <option value="805">PP - PESQUERO ARTESANAL</option>                                
                            </select>
                    </div>
                    
                     <div class="form-groupppp">
                        <label for="domicilio">TIPO DE REGISTRO</label>
                         <select class="form-control" name = "tregistro" id="ttrabajador" required>
                                <option value = "">--</option>                                
                                <option value="1">ASEGURADO</option>
                                <option value="2">EMPLEADOR</option>                                
                            </select>
                    </div>

                    <div class="clearfix"></div>
                    <?php
                }

//liberando los recursos
                oci_free_statement($queryT);
                ?> 

                <?php
                $querydh = oci_parse($conexionora, "select
                                            c.vtfcvfa as tipo_vinculo, 
                                            D.DGACAUT AS DGACAUT_dh, 
                                            d.DGANSAS as DGANSAS_dh,
                                            d.dgandid as dgandid_dh,
                                            d.DGATAPA ||  ' ' || d.DGATAMA ||  ' ' || d.DGATPNO ||  ' ' || d.DGATSNO as nombres_dh
                                            from dim_SCCMDGAT a 
                                            inner join dim_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join dim_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            where a.dgandid='$dni'");

                oci_execute($querydh);
                $i = 0;

                while ($row = oci_fetch_array($querydh, OCI_NUM + OCI_RETURN_NULLS)) {
                    $i++;
                    ?> 
                    <h2>DATOS DE LOS ASEGURADOS - DH</h2>

                    <div class="form-group">
                        <label for="first-name">TIPO DE VINCULO DEL DH</label>                        
                        <input type="text" class="form-control" id="first-name" name="vinculo<?php echo $i ?>" value="<?php echo $row[0] ?>" readonly></input>                        
                    </div>
                    <div class="form-group">
                        <label for="last-name">APELLIDOS Y NOMBRES</label>
                        <input type="text" class="form-control" name="DH<?php echo $i ?>" value="<?php echo $row[4] ?>" readonly></input>                        
                    </div>
                    <div class="form-group">
                        <label for="first-name">DOCUMENTO IDENTIDAD</label>                        
                        <input type="text" class="form-control" name="dni_dh<?php echo $i ?>" value="<?php echo $row[3] ?>" readOnly></input>                        
                    </div>  
                    <div class="clearfix"></div>

                    <?php
                }
                //liberando los recursos
                oci_free_statement($querydh);
                ?>

                <?php
                if ($ruc == NULL) {

                    $queryemp = oci_parse($conexionora, "select cc.NOMBRE, cc.NUMRUC, nn.PER_APORTA,
                                            cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion,
                                            cc.UBIGEO, u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO
                                            from dim_cuenta_indiv_01_10_XX nn
                                            left join dim_CONTRIBUYENTES cc on nn.NUM_DOCIDE_EMPL=cc.NUMRUC
                                            left join dim_UBIGEO u 
                                                    on substr(cc.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cc.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cc.UBIGEO, 5, 2)=u.S_DI98
                                            where nn.NUM_DOCIDE_ASEG='$dni' and not nn.COD_TRIBUTO='052101' and not nn.COD_TRIBUTO='052104' and nn.PER_APORTA = 
                                            (select MAX(t.PER_APORTA) from dim_cuenta_indiv_01_10_XX t where t.NUM_DOCIDE_ASEG='$dni' and not t.COD_TRIBUTO='052101' and not t.COD_TRIBUTO='052104')");

                    oci_execute($queryemp);
                    while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {

                        $periodo = $row[2];
                        ?> 

                        <h2>DATOS DE LA EMPRESA</h2>
                        <div class="form-group">
                            <label for="first-name">RAZON SOCIAL</label>                        
                            <input type="text" class="form-control" id="first-name" name="nombreEntidad1" value="<?php echo $row[0] ?>" readonly></input>                        
                        </div>

                        <div class="form-group">
                            <label for="last-name">RUC</label>
                            <input type="text" class="form-control" id="first-name" name="NUMRUC1" value="<?php echo $row[1] ?>" readonly></input>                                                    
                        </div>

                        <div class="form-group">
                            <label for="first-name">DIRECCION</label>                        
                            <input type="HIDDEN" class="form-control" name="ubigeoAE1" value="<?php echo $row[4] ?>" readOnly></input>  
                            <input type="text" class="form-control" name="direccionAE1" value="<?php echo $row[5], ' - ', $row[3] ?>" readOnly></input>                          
                        </div>  

                        <div class="form-group">
                            <label for="first-name">ULTIMO APORTE</label>                        
                            <input type="text" class="form-control" name="APORTE1" value="<?php echo $row[2] ?>" readOnly></input>                         
                        </div>  
                        <div class="clearfix"></div>


                        <?php
                    }
//liberando los recursos
                    oci_free_statement($queryemp);
//$conexion->close()
                    ?> 

                    <?php
                } else {
                    $queryemp2 = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, 
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
                                                    cc.UBIGEO,
                                                    u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO UBIGEO,
                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                                    from dim_CONTRIBUYENTES cc
                                                    left join dim_UBIGEO u 
                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
                                                    where cc.NUMRUC='$ruc'");

                    oci_execute($queryemp2);

                    while ($row = oci_fetch_array($queryemp2, OCI_NUM + OCI_RETURN_NULLS)) {
                        $periodo = $row[2];
                        ?>  

                        <h2>DATOS DE LA EMPRESA</h2>
                        <div class="form-group">
                            <label for="first-name">RAZON SOCIAL</label>                        
                            <input type="text" class="form-control" id="first-name" name="nombreEntidad2" value="<?php echo $row[2] ?>" readonly></input>                        
                        </div>

                        <div class="form-group">
                            <label for="last-name">RUC</label>
                            <input type="text" class="form-control" id="first-name" name="NUMRUC2" value="<?php echo $row[1] ?>" readonly></input>                             
                        </div>

                        <div class="form-group">
                            <label for="first-name">UBIGEO</label>                        
                            <input type="text" class="form-control" id="first-name" name="ubigeoAE2" value="<?php echo $row[6] ?>" readonly></input>                        
                        </div>

                        <div class="form-group">
                            <label for="first-name">DIRECCION</label>                        
                            <input type="HIDDEN" class="form-control" name="ubigeoAE2" value="<?php echo $row[5] ?>" readOnly></input>  
                            <input type="text" class="form-control nombres" name="direccionAE2" value="<?php echo $row[7] ?>" readOnly></input>                          
                        </div>                      

                        <div class="clearfix"></div>

                        <?php
                    }
//liberando los recursos
                    oci_free_statement($queryemp2);
                }
//$conexion->close()               
                ?>     
                <?php
                if ($dni != NULL) {
                    ?>

                    <h2>REGISTRO POR INICIATIVA PROPIA</h2>
<div class="form-group">
                        <br/><label for="first-name">TIPO DE VERIFICACION</label>                   
                            <select class="form-control" name="cbx_tverificacion" id="cbx_tverificacion" value="cbx_tverificacion"  required="">
                                <option value="1">CONTROL POSTERIOR</option>                                        
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <br/><label for="last-name">GENERA BAJA DE REGISTRO</label>                    
                        <select class="form-control" name = "idTGeneraBaja" id="idTGeneraBaja" class="con_estilos" onchange="habilitarbaja(this.value);" required>
                            <option value="">--</option>
                            <option value="1">SI</option>
                            <option value="2">NO</option>                          
                        </select> 
                    </div> 
                    
                    <div class="form-group">
                        <br/><label for="last-name">ESTADO ACTUAL</label>                    
                        <select class="form-control" name = "idTEstadoActual" id = "idTEstadoActual" onchange="habilitarbaja2(this.value);" required>
                            <option value = "2">EN PROCESO</option>
                            <option value = "1">PENDIENTE</option>                         
                            
                        </select> 
                        <input type = "HIDDEN" name = "idTEstadoActual0" id="idTEstadoActual0" maxlength="20" value="3" disabled></input>
                    </div>
                    
                    <?PHP
                    $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM sisgasv.tipoverificacionperfil b 
                                where b.idTVerificacion='1'
                                AND b.idTVerificacionPerfil in ('7', '10')";
                    $resultado = $conexionmysql->query($queryM);
                    ?>
                    <div class="form-group">
                        <label for="last-name">ORIGEN CONTROL POSTERIOR</label>
                        <select class="form-control" name="cbx_origencp" id="cbx_origencp" required>
                            <option value="">----</option>
                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>                                            
                            <?php } ?>
                        </select> 
                    </div>
                    
                    

                    <?PHP
                    $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='1'
                                AND NOT b.idTVerificacionPerfil in ('1', '2', '3', '4', '5', '7', '8','10','12','15')";
                    $resultado = $conexionmysql->query($queryM);
                    ?>
                    <div class="form-group">
                        <br/><label for="last-name">TIPO DE PERFIL</label>
                      

                            <select class="form-control" name="cbx_perfil" id="cbx_perfil" class="con_estilos" required>
                                <option value="">----</option>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>                                            
                                <?php } ?>
                            </select>
                            <div class="form-groupp"></div>

                    </div>

                                                

                    <div class="form-group">
                        <label for="last-name" id="fechaemi" style="display: block">FECHA EMISION DE BAJA REGISTRO</label>
                        <label for="last-name" id="fechaeva" style="display: none">FECHA DE CONFORMIDAD CONTROL POSTERIOR</label>
                        <input type="date" class="form-control date" name = "femisionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                               id="femisionBRegistro" min="1998-01-01" required></input>
                    </div> 
                    <table id="siesno3" style="display: none" >
                        <tr>
                            <td>  
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA: PERIODO INICIO CALIFICADO</label>
                                <input type="date" class="form-control date" name = "finicali" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1998-01-01" id="finicali" required></input>
                            </div>                      

                        </td>
                            <td>
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA: PERIODO FIN CALIFICADO</label>
                                <input type="date" class="form-control date" name = "ffincali" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1998-01-01" id="ffincali" required></input>
                            </div>     
                            </td>
                          
                        </tr>
                    </table>
                    
                    <table id="siesno" >
                        <tr>
                            <td>  
                            <div class="form-grouppp" style="width: 200px" >
                        <label for="first-name" id="th1">
                           Nº RESOLUCION DE BAJA DE REGISTRO (0000)
                        </label>                       
                            <input type="text" class="form-control" id="nResBRegistro00" minlength="4" autocomplete="off" name="nResBRegistro00"
                               maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>                                          
                            </div>
                        </td>
                            <td>
                    <div class="form-grouppp" style="width: 200px">
                        <label for="first-name" id="th1">DESPACHO QUE EMITIO RESOLUCION</label>
                        <select class="form-control" id ="unidad" name = "unidad" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);" required>                                      
                                        <option value="">----</option>
                                        <option value="1">OSPE</option>
                                        <option value="2">UCF</option>
                                        <option value="OASALMENARA">OASALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>       
                                         <option value="OASANMARTIN">OASANMARTIN</option>   
                                    </select>
                        <input type="hidden" id="textoOAS" name="textoOAS" value="" readOnly="readOnly"/>
                    </div>
                            </td>
                            <td>
                                <div class="form-grouppp" style="width: 200px">
                                <br/><label for="first-name" id="th1">AÑO</label>
                                <select class="form-control" name = "ano" id="ano" required>
                                    <option value=""></option>   
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>                                    
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                </div> 
                            </td>
                        </tr>
                    </table>
                   
                    <table id="siesno2">
                        <tr>
                            <td>   
                                <div class="form-groupppp" style="width: 200px">
                                    <br/><label for="first-name">NIT</label>
                                    <input type="text" class="form-control" name="nit" id="nit" required></input> 
                                </div>                   
                            </td>
                            <td>   
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA NOTIFICACION BAJA DE REGISTRO</label>
                                <input type="date" class="form-control date" name = "fnotificacionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1998-01-01" id="fnotificacionBRegistro"></input>
                            </div>
                             
                            </td>
                            <td>    
                                <div class="form-groupppp" style="width: 200px">
                                <label for="last-name">ESTADO / RESPUESTA A LA RESOLUCION DE BAJA</label>                    
                                <select class="form-control" name = "idTRRBRegistro" id="idTRRBRegistro">
                                    <option value = "0"></option>
                                    <option value = "1">FIRME Y CONSENTIDA</option>
<!--                                    <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                                    <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                                    <option value = "4">IMPROCEDENTE - 1RA INSTANCIA</option>
                                    <option value = "5">FUNDADO EN PARTE - 1RA INSTANCIA</option>
                                    <option value = "6">INADMISIBLE - 1RA INSTANCIA</option>
                                    <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                                    <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                                    <option value = "9">PROCESO DE CALIFICACION</option>
                                    <option value = "10">APELACION</option>
                                    <option value = "11">RECONSIDERACION</option>                            -->
                                </select> 
                                </div>
                            </td> 
                        </tr>
                    </table>   

                    <div class="form-groupppp">
                        <label for="first-name">OBSERVACIONES</label>
                        <textarea class="form-control textareaa" placeholder="Solo 200 caracteres" name="observaciones" id="observaciones" maxlength="200" style="margin: 0px -233px 0px 0px; height: 62px; width: 439px;"></textarea>
                    </div>

                    <div class="clearfix"></div>
<!--                    <button type="submit" name="grabar" value="Grabar" class="btn btn-info btn-lg btn-responsive" id="insert"
                            onclick="this.onclick=function(){return false;}"> <span class="glyphicon glyphicon-pencil"></span> Registrar</button>-->

                        <button type= "submit" onclick="return confirm('Estás seguro que desea Grabar?');" value="Grabar" name = "grabar" class="btn btn-info btn-lg btn-responsive" id="insert"
                                onclick="this.onclick=function(){return false;}"> <span class="glyphicon glyphicon-pencil"></span>Grabar</button>    

    <?php
}
?>

            </form>
        </div>

      

        <script>
            //document.getElementById('ruc').readOnly = this.checked
            function habilitar()
            {
                if (document.getElementById('check1').checked === false)
                {
                    document.getElementById('ruc').readOnly = false;
                }
                if (document.getElementById('check1').checked === true)
                {
                    document.getElementById('ruc').value = "";
                    document.getElementById('ruc').readOnly = true;                    
                }
            }

            function habilitar2()
            {
                if (document.getElementById('check2').checked === false)
                {
                    document.getElementById('pevaluarF').readOnly = false;
                }
                if (document.getElementById('check2').checked === true)
                {
                    document.getElementById('pevaluarF').value = "";
                    document.getElementById('pevaluarF').readOnly = true;
                }
            }
        </script>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
            }
        </script>

        <script>
            $(function () {
                $("#dialog1").hide();
                $("#dialog2").hide();
                $("#dialog3").hide();
                $("#dialog4").hide();

                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 600,
                        width: 1200,
                        modal: true,
                    });
                }

                function abrir2() {
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                        height: 600,
                        width: 800,
                        modal: true,
                    });
                }
                function abrir3() {
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                        height: 600,
                        width: 900,
                        modal: true,
                    });
                }
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                        height: 850,
                        width: 850,
                        modal: true,
                    });
                }

                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });
            });
        </script>

<?php
if (isset($_POST['grabar'])) {

    include ('./conexionesbd/conexion_mysql.php');
    include ('./conexionesbd/conexion_oracle.php');

    $dgansas = null;
//            $dgatapa = null;
//            $dgatama = null;
//            $dgatpno = null;
    $sdgatpno = null;
    //guardando datos de reniec

    $apepaterno = null;
    $apematerno = null;
    $apematcasada = null;
    $nombresreniec = null;
    /////////////////////////
    $dgactdi = null;
    $DGAFNAC = null;
    $dni_2 = null;
    $dni_t = null;

    $DGACUGD = null;
    $departamen = null;
    $provincia = null;
    $distrito = null;

    $direccion = null;
    $dni_1 = null;

    $eempleadora = null;
    $iddim_usuario = NULL;
    $TIPO_EMP = null;
    $NUMRUC_EMP = null;
    $NOMBRE_EMP = null;
    $flag22_EMP = null;
    $idTEstadoActual = null;

    $ESTADO_EMP = null;
    $DEPARTAMENTO_EMP = null;
    $PROVINCIA_EMP = null;
    $DISTRITO_EMP = null;
    
        $num_resolucion = 0;

    $direccion_EMP = null;

    if (empty($_POST['dni'])) {
        $dni_1 = 'NULL';
    } else {
        $dnii = $_POST['dni'];
        $dni_1 = "$dnii";
    }

    $queryT = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut,
                                                t.TXT_APEPATERNO,nvl(t.TXT_APEMATERNO,'') as apematerno,nvl(t.TXT_APEMATCASADA,'') as apematcasada, nvl(t.TXT_NOMBRES,'') as TXT_NOMBRES,                                                
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
                                         WHERE t.ide_dni='$dni_1'");


    oci_execute($queryT);
    while ($row2 = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
        $dgansas = $row2[0];
        $dgacaut = $row2[1];
        $apepaterno = $row2[2];
        $apematerno = $row2[3];
        //se modifico el "NULL"
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

        $direccion = addslashes($row2[13]);
    }


    $queryA = "SELECT max(m.iddim_aseguradoindevido) as max FROM dim_aseguradoindevido m";
    //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
    $resultA = $conexionmysql->query($queryA);
    if ($conexionmysql->query($queryA)) {
        while ($fila = $resultA->fetch_assoc()) {
            $ma = $fila['max'];
            $max = $ma + 1;
        }
    }


    if (empty($_POST['NUMRUC1'])) {
        if ($eempleadora == NULL) {
            $eempleadora = $_POST['NUMRUC2'];
        }
    } else {
        $eempleadoraa = $_POST['NUMRUC1'];
        $eempleadora = "$eempleadoraa";
    }

    $dni_eempleadora = substr($eempleadora, 2, 8);

    $queryemp = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, CAST(cc.flag22 AS integer), CAST(cc.ESTADO AS integer), 
                                                    u.DEPARTAMENTO, u.PROVINCIA, u.DISTRITO,
                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                                    from dim_CONTRIBUYENTES cc
                                                    left join dim_UBIGEO u 
                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
                                                    where cc.NUMRUC='$eempleadora'");
    oci_execute($queryemp);

    while ($row1 = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {

        $TIPO_EMP = $row1[0];
        $NUMRUC_EMP = $row1[1];
        $NOMBRE_EMP = addslashes($row1[2]);
        $flag22_EMP = $row1[3];

        $ESTADO_EMP = $row1[4];
        $DEPARTAMENTO_EMP = $row1[5];
        $PROVINCIA_EMP = $row1[6];
        $DISTRITO_EMP = $row1[7];

        $direccion_EMP = addslashes($row1[8]);
    }



    //$idTEstadoActualoo = $_POST['idTEstadoActual'];
    //$idTEstadoActual = "'$idTEstadoActualoo'";



    if (empty($_POST['cbx_tverificacion'])) {
        $idTVerificacion = 'NULL';
    } else {
        $idTVerificacionn = $_POST['cbx_tverificacion'];
        $idTVerificacion = "'$idTVerificacionn'";
    }

    if (empty($_POST['cbx_perfil'])) {
        $idTVerificacionPerfil = 'NULL';
    } else {
        $idTVerificacionPerfill = $_POST['cbx_perfil'];
        $idTVerificacionPerfil = "'$idTVerificacionPerfill'";
    }

    if (empty($_POST['cbx_origencp'])) {
        $cbx_origencp = 'NULL';
    } else {
        $cbx_origencppp = $_POST['cbx_origencp'];
        $cbx_origencp = "'$cbx_origencppp'";
    }

//            if (empty($_POST['idTEstadoActual'])) {
//                $idTEstadoActual = 'NULL';
//            } else {
//                $idTEstadoActualoo = $_POST['idTEstadoActual'];
//                $idTEstadoActual = "'$idTEstadoActualoo'";
//            }

    if (empty($_POST['idTEstadoActual'])) {
        if ($idTEstadoActual == NULL) {
            $idTEstadoActual = $_POST['idTEstadoActual0'];
        }
    } else {
        $idTEstadoActualoo = $_POST['idTEstadoActual'];
        $idTEstadoActual = "$idTEstadoActualoo";
    }
    
       if (empty($_POST['tregistro'])) {
        $tregistro = 'NULL';
        } else {
        $tregistroo = $_POST['tregistro'];
        $tregistro = "$tregistroo";
       } 
    
    if (empty($_POST['ttrabajador'])) {
        $ttrabajador = 'NULL';
        } else {
        $ttrabajadorR = $_POST['ttrabajador'];
                $ttrabajador = "$ttrabajadorR";
       } 


    if (empty($_POST['idTGeneraBaja'])) {
        $idTGeneraBRegistro = 'NULL';
    } else {
        $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
        $idTGeneraBRegistro = "$idTGeneraBRegistroo";
    }

    if (empty($_POST['femisionBRegistro'])) {
        $FEmisionBRegistro = 'NULL';
    } else {
        $FEmisionBRegistroo = $_POST['femisionBRegistro'];
        $FEmisionBRegistro = "'$FEmisionBRegistroo'";
    }

    if (empty($_POST['nResBRegistro'])) {
        $nResBRegistro = 'NULL';
    } else {
        $nResBRegistroo = $_POST['nResBRegistro'];
        $nResBRegistro = "'$nResBRegistroo'";
    }

    if (empty($_POST['idTRRBRegistro'])) {
        $idTRRBRegistro = 'NULL';
    } else {
        $idTRRBRegistroo = $_POST['idTRRBRegistro'];
        $idTRRBRegistro = "'$idTRRBRegistroo'";
    }

    if (empty($_POST['nit'])) {
        $nit = 'NULL';
    } else {
        $nitt = $_POST['nit'];
        $nit = "'$nitt'";
    }

                if (empty($_POST['nResBRegistro00'])) {
                    $numResolucionRegistro00 = 'NULL';
                } else {
                    $numResolucionRegistro0000 = $_POST['nResBRegistro00'];
                    $numResolucionRegistro00 = "$numResolucionRegistro0000";
                }
                
                if (empty($_POST['ano'])) {
                    $ano = 'NULL';
                } else {
                    $anooo = $_POST['ano'];
                    $ano = "$anooo";
                }
                
                   if (empty($_POST['textoOAS'])) {
                    $textoOAS = 'NULL';
                } else {
                    $textoOASS = $_POST['textoOAS'];
                    $textoOAS = "$textoOASS";
                }
                
                                    
    
    if (empty($_POST['fnotificacionBRegistro'])) {
        $FNotificacionPAsegurado = 'NULL';
    } else {
        $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
        $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
    }

    if (empty($_POST['freporteresolutor'])) {
        $freporteresolutor = 'NULL';
    } else {
        $freporteresolutorr = $_POST['freporteresolutor'];
        $freporteresolutor = "'$freporteresolutorr'";
    }

    if (empty($_POST['observaciones'])) {
        $obsOSPE = 'NULL';
    } else {
        $obsOSPEo = $_POST['observaciones'];
        $obsOSPE = "'$obsOSPEo'";
    }

    if (empty($_POST['perfil_otros'])) {
        $perfil_otros = 'NULL';
    } else {
        $perfil_otross = $_POST['perfil_otros'];
        $perfil_otros = "'$perfil_otross'";
    }
    
    
       if (empty($_POST['unidad'])) {
        $unidad = 'NULL';
    } else {
        $unidadd = $_POST['unidad'];
        $unidad = "'$unidadd'";
    }
    
        if (empty($_POST['finicali'])) {
        $finicali = 'NULL';
    } else {
        $finicalii = $_POST['finicali'];
        $finicali = "'$finicalii'";
    }
    if (empty($_POST['ffincali'])) {
        $ffincali = 'NULL';
    } else {
        $ffincalii = $_POST['ffincali'];
        $ffincali = "'$ffincalii'";
    }



    date_default_timezone_set('America/Bogota');
    $fecha_hora_creacione = date('Y-m-d G:i:s');
    $fecha_hora_creacion = "'$fecha_hora_creacione'";

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";
    
     if ($unidad == 'NULL') { 
         $nnnResBRegistro=NULL;
         $numpdf=NULL;
     }
     else {
            
                                
                                 if ($_POST['unidad'] == '1') { 
                                //$nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $cod_oficinaIni.$ano;
                                 }
                                   else if ($_POST['unidad'] == '2') {
                             $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura .  "-". $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                 $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $cod_oficinaIni.$ano;
                                   }
                                     else {
                             $nnnResBRegistro = $numResolucionRegistro00 . "-" . $textoOAS . "-EXSGSA-GAAA-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $cod_oficinaIni.$ano;
                                     }
     }


if ($idTEstadoActual == '1') {
        $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, 
            idTipoTrabajador,
            idTipoAtencion,
            tipoRegistro,
            RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t,materno_t,casada_t, 
            nombre1_t,nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max, 
            '$ttrabajador',
            '1',
            '$tregistro',
            '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_1', '$dgacaut', '$apepaterno', '$apematerno', 
            '$apematcasada', '$nombresreniec','', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion)";

      
        
              $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro, 
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s, fCreacion)             
            VALUES ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual, '$idTGeneraBRegistro', $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro, $FNotificacionPAsegurado, $obsOSPE,             
            $idtusuario,$idtusuario, $fecha_hora_creacion)";
       
            $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values 
            ($max, $max, $idtusuario, $fecha_hora_creacion)";

//            $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,
//            $idtusuario, $fecha_hora_creacion)";
            
            $querynn="SELECT count(*) total, t.nResBRegistro, b.dni_t
                    FROM sisgasv.dim_cposterior t 
                    left join dim_aseguradoindevido b on t.iddim_aseguradoindevido=b.iddim_aseguradoindevido
                    where t.nResBRegistro = '$nnnResBRegistro'
                    group by t.nResBRegistro, b.dni_t";
     
$resultado = $conexionmysql->query($querynn);

while ($row = $resultado->fetch_assoc()) {
    $num_resolucion = $row['total'];
    $dni_t = $row['dni_t'];
}
        
        if($num_resolucion != 0) {
    echo "NO SE PUEDE REGISTRAR POR QUE YA EXISTE EL NUMERO DE RESOLUCION POR EL DNI: ", $dni_t;
}
else { 

                if ($conexionmysql->query($query)) {
        if ($conexionmysql->query($query1)) {
           if ($conexionmysql->query($query2)) {
//               if ($conexionmysql->query($query3)) {
                    //if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';
                    echo 'Error al Actualizar registro: ', $nnnResBRegistro, '<br>W';
                    echo 'Error al Actualizar registro: ', $numpdf;
                }
           }
        }
    }
            
        
    } else 
         if ($idTEstadoActual == '2') {///////// estado actual
        
        $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, 
            idTipoTrabajador,
            idTipoAtencion,
            tipoRegistro,
            RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t,materno_t,casada_t, 
            nombre1_t,nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max,
            '$ttrabajador',
            '1',
            '$tregistro',
            '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_1', '$dgacaut', '$apepaterno', '$apematerno', 
            '$apematcasada', '$nombresreniec','', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion)";

        $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro,nResBRegistro, nombrePDF,
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s, fCreacion)             
            VALUES 
            ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual, $idTGeneraBRegistro, $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro, '$nnnResBRegistro', '$numpdf',
            $FNotificacionPAsegurado, $obsOSPE,             
            $idtusuario,$idtusuario, $fecha_hora_creacion)";

        $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values ($max, $max, $idtusuario, $fecha_hora_creacion)";

//        $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,
//            $idtusuario, $fecha_hora_creacion)";
        
       $querynn="SELECT count(*) total, t.nResBRegistro, b.dni_t
                    FROM sisgasv.dim_cposterior t 
                    left join dim_aseguradoindevido b on t.iddim_aseguradoindevido=b.iddim_aseguradoindevido
                    where t.nResBRegistro = '$nnnResBRegistro'
                    group by t.nResBRegistro, b.dni_t";
     
$resultado = $conexionmysql->query($querynn);

while ($row = $resultado->fetch_assoc()) {
    $num_resolucion = $row['total'];
    $dni_t = $row['dni_t'];
}
        
        if($num_resolucion != 0) {
    echo "NO SE PUEDE REGISTRAR POR QUE YA EXISTE EL NUMERO DE RESOLUCION POR EL DNI: ", $dni_t;
}
else { 
        
            if ($conexionmysql->query($query)) {
        if ($conexionmysql->query($query1)) {
           if ($conexionmysql->query($query2)) {
//               if ($conexionmysql->query($query3)) {
                    //if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';
                    echo 'Error al Actualizar registro: ', $nnnResBRegistro, '<br>W';
                    echo 'Error al Actualizar registro: ', $numpdf;
                }
           }
        }
    }
        
        
    }    
    else
         if ($idTGeneraBRegistro == '2') {//////genera baja
             
             $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, 
            idTipoTrabajador,
            idTipoAtencion,
            tipoRegistro,
            RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t,materno_t,casada_t, 
            nombre1_t,nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion, fCreacionTerminado) 
            VALUES 
            ($max, '$idOficinaUsuario', $max,
            '$ttrabajador',
            '1',
            '$tregistro',
            '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_1', '$dgacaut', '$apepaterno', '$apematerno', 
            '$apematcasada', '$nombresreniec','', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion, $fecha_hora_creacion)";


              $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro, 
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s, fCreacion, fCreacionTerminado)             
            VALUES 
            ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual, '$idTGeneraBRegistro', $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro, $FNotificacionPAsegurado,  $obsOSPE,             
            $idtusuario,$idtusuario, $fecha_hora_creacion, $fecha_hora_creacion)";
       
            $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values ($max, $max, $idtusuario, $fecha_hora_creacion)";

//            $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            InicioPFinal,FinPFinal,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,
//            $finicali,$ffincali,
//            $idtusuario, $fecha_hora_creacion)";
            
            
             $query3 = "INSERT INTO dim_paevaluar_new 
            (iddim_aseguradoindevido,
            InicioPFinal,FinPFinal,
            idtusuario, fCreacion) 
            values 
            ($max,
            $finicali,$ffincali,
            $idtusuario, $fecha_hora_creacion)";
            
            if ($conexionmysql->query($query)) {
        if ($conexionmysql->query($query1)) {
           if ($conexionmysql->query($query2)) {
               if ($conexionmysql->query($query3)) {
                    //if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';
                    echo 'Error al Actualizar registro: ', $nnnResBRegistro, '<br>W';
                    echo 'Error al Actualizar registro: ', $numpdf;
                }
           }
        }
    }
            
         }

    
    //}
}
?>

    </body>
</html>