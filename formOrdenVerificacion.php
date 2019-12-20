<?php
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA, o.direccion, o.distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

// <link rel="stylesheet" href="/resources/demos/style.css">
//<script type="text/javascript" src="../../../js/jquery-3.1.1.min.js"></script>
//<script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
//<script type="text/javascript" src="../../../js/cambiarPestanna.js"></script>
//<script type="text/javascript" src="../SISGASV/js/jquery-1.4.2.min.js"></script>  
//<script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
?>

<!doctype html>
<html lang="en">
    <head>

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
        <link rel="stylesheet" href="../SISGASV/include/bootstrapform.css" media="screen">    

        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 

        <link rel="stylesheet" href="../SISGASV/include/bootstrapform.css" media="screen">
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script> 
        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
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
            @media screen and (max-width: 900px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }
        </style>



        <script>
            $(function () {
                $("#dialog1").hide();
                $("#dialog11").hide();
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
                function abrir11() {
                    $("#dialog11").show();
                    $("#dialog11").dialog({
                        resizable: false,
                        height: 600,
                        width: 800,
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
                        width: 1200,
                        modal: true,
                    });
                }
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                        height: 600,
                        width: 1200,
                        modal: true,
                    });
                }

                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });
                $("#abriPoppup11").click(
                        function () {
                            abrir11();
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
                width: 500 px;
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

    </head>
    <body> 

        <DIV id="header">
            <ul class="nav">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a href="formFyConsentidas.php">REGISTRO FIRMES Y CONSENTIDAS</a>

                        <li><a href="#">Registros por Iniciativa Propia</a>
                            <ul>
                                <li><a href="formControlPosteriorIniciativaPropia.php">Titulares</a></li>
                                <li><a href="formControlPosteriorIniciativaPropia_dh.php">Derecho Habientes</a></li>
                               <li><a href="formControlPosteriorIniciativaPropia_no_dh.php">Derecho Habientes no Registrado</a></li>
                            </ul>
                        </li>

                        <li><a href="">Registrar Formulario Control Posterior</a>
                            <ul>
                                <li>
                                    <a href="formListarControlPosteriorUsuario.php">Listar Registros de Bajas de la OSPE Actual</a>
                                </li>
                                <li>
                                    <a href="formListarControlPosterior.php">Listar Registros de Bajas de TODAS las OSPE</a>
                                </li>
                               
                            </ul>                             
                        </li>
                        <li><a href="formOVEntrevistaAsegurado.php">Registrar Orden de Verificacion/Entrevista al Asegurado</a>
                            <ul>
                                <li><a href="">Consultas</a></li>
                                <li><a href="">Buscar</a></li>
                            </ul>
                        </li>                       
                        <li><a href="formOrdenVerificacion.php">Registrar Orden de Verificacion</a>
                            <ul>
                                <li><a href="formListarOV.php">CONSULTAS/REPORTES</a></li>
                                <li><a href="">Buscar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>                
                <li><a href="">Acerca de...</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="logout.php">Cerrar Session</a></li>
            </ul>
        </DIV>       

        <h4><?PHP
            echo 'Bienvenid@<br>' . utf8_decode($row['nombres']);
            echo '<BR>OFICINA: ' . utf8_decode($row['OFICINA']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            ?>  
            <br><a href="logout.php">Cerrar Session</a>
        </h4>                
        <br>
        <br>

        <header>
            <h1>Orden de Verificacion</h1>
            <p>ORDEN DE VERIFICACION N&ordm; 

                <?php
                //echo codigostr_pad($input, 10, "-=", STR_PAD_LEFT); 
                echo 'XXXX-2017-VCA-XXXXXXX-084-001';
                ?>
        </header>

        <!--Incrustar php
        <form action="" method="GET">-->

        <?php
        $dni = NULL;
        $periodo = NULL;
        $red = NULL;
        $ruc = NULL;
        $oficina = utf8_decode($row['OFICINA']);
        $oficinadireccion = utf8_decode($row['direccion']);
        $distritoOSPE = utf8_decode($row['distrito']);
        if (isset($_POST['buscar'])) {
            $dni = $_POST['dni'];
            $ruc = $_POST['ruc'];
        }
        $idtusuario = $_SESSION['usuario'];
        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?> 

        <h3>

            <?PHP
            echo 'Se asignara el siguiente caso de Orden de Verificacion, Carta de Presentacion, Orden Ampliatoria, Acta de Verificacion al siguiente titular: ';
            ?> 
        </h3>

        <form name="form" action="" method="POST">          
            INGRESE EL DNI: <input type="number" name="dni">        
            <input type="checkbox" id="check1" value="1" onclick="habilitar()" checked>            
            INGRESE EL RUC: <input type="number" name='ruc' id='ruc' readOnly>       
            <input type="submit" name="buscar" value="Buscar" maxlength="11">
        </form>

        <h5>
            DATOS DEL REGISTRO SOLICITADO
        </h5> 
        <form method="post">
            <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">                  

                <?php
                include '../SISGASV/conexionesbd/conexion_oracle.php';
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
                                                     sc.dgandid as dni, sc.DGACUGD, sg.departamen || ' - ' || sg.provincia || ' - ' || sg.distrito, sc.DGATCAL || ' ' || sc.DGANILO || ' ' || sc.DGANNMK || ' ' || sc.DGATURB as direccion 
                                                FROM dim_SCCMDGAT sc 
                                                left join dim_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
                                                where sc.dgandid='$dni' and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from DIM_CUENTA_INDIV_00_161718 t where t.NUM_DOCIDE_ASEG='$dni')");

                oci_execute($queryT);

                while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
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
                        <td colspan="2" id="td1"><input id="i1" type="text" name="datos" size="100" value="<?php echo $row[1] ?>" readonly></td>                            
                    </tr> 
                    <tr>
                        <th class="especial">
                            UBIGEO
                        </th>
                    <input id="i1" type="HIDDEN" name="ubigeo" size="100" value="<?php echo $row[5] ?>" readOnly="readOnly">   
                    <td colspan="2" id="td1"><input id="i1" type="text" name="dubigeo" size="100" value="<?php echo $row[6] ?>" readonly></td>                            
                    </tr> 
                    <tr>
                        <th class="especial">
                            DOMICILIO
                        </th>                        
                        <td colspan="2" id="td1"><input id="i1" type="text" name="domicilioA" size="100" value="<?php echo $row[7] ?>" readonly></td>                            
                    </tr> 
                    <tr>
                        <th class="especial">
                            DOCUMENTO IDENTIDAD( <?php echo $row[3] ?> )
                        </th>
                        <td colspan="2" id="td1">
                            <a href="#" id="abriPoppup1">
                                <input id="i1" type="HIDDEN" name="dgansas" size="100" value="<?php echo $row[0] ?>" readOnly="readOnly">   
                                <input id="i1" type="HIDDEN" name="tipodoc" size="100" value="<?php echo $row[2] ?>" readOnly="readOnly">   
                                <input id="i1" type="text" name="dni" size="50" value="<?php echo $row[4] ?>" readOnly="readOnly">                                  
                            </a>    
                        </td>                               
                    </tr>
                    <div id="dialog1" title="SGVCA" class="contenido">
                        <iframe src="formularioPersona.php?dni=<?php echo $row[4] ?>" style="width: 100%; height: 100%"></iframe>
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
                                            d.DGANSAS as DGANSAS_dh,
                                            d.dgandid as dgandid_dh,
                                            d.DGATAPA ||  ' ' || d.DGATAMA ||  ' ' || d.DGATPNO ||  ' ' || d.DGATSNO as nombres_dh
                                            from dim_SCCMDGAT a 
                                            inner join dim_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join dim_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            where a.dgandid='$dni'");

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
                        <td colspan="2" id="td1"><input id="i1" type="text" name="vinculo" size="100" value="<?php echo $row[0] ?>" readonly></td>       
                    </tr>

                    <tr>
                        <th class="especial">
                            APELLIDOS Y NOMBRES
                        </th>
                        <td colspan="2" id="td1"><input id="i1" type="text" size="100" name="DH" value="<?php echo $row[4] ?>" readonly></td>
                    </tr>
                    <tr>
                        <th class="especial">
                            DOCUMENTO IDENTIDAD
                        </th>
                        <td colspan="2" id="td1"><input id="i1" type="text" size="100" name="DH" value="<?php echo $row[3] ?>" readonly>                                                      
                        </td>
                    </tr>

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
                                            from DIM_CUENTA_INDIV_00_161718 nn
                                            left join dim_CONTRIBUYENTES cc on nn.NUM_DOCIDE_EMPL=cc.NUMRUC
                                            left join dim_UBIGEO u 
                                                    on substr(cc.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cc.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cc.UBIGEO, 5, 2)=u.S_DI98
                                            where nn.NUM_DOCIDE_ASEG='$dni' and not nn.COD_TRIBUTO='052101' and not nn.COD_TRIBUTO='052104' and nn.PER_APORTA = 
                                            (select MAX(t.PER_APORTA) from DIM_CUENTA_INDIV_00_161718 t where t.NUM_DOCIDE_ASEG='$dni')");

                    oci_execute($queryemp);

                    while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {
                        $periodo = $row[2];
                        ?>   
                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="4">
                                EMPRESA
                            </th>                                               
                        </tr>
                        <tr>
                            <th class="especial">
                                NOMBRE FISCAL
                            </th>
                            <td colspan="2" id="td1"><input id="i1" type="text" size="100" name="nombreEntidad1" value="<?php echo $row[0] ?>" readonly></td>                              
                        </tr>

                        <tr>
                            <th class="especial">
                                RUC
                            </th>                    
                            <td colspan="2" id="td1">
                                <a href="#" id="abriPoppup3">
                                    <input id="i1" type="text" name="NUMRUC1" size="100" value="<?php echo $row[1] ?>" readOnly="readOnly"></a> 
                            </td>
                        </tr>
                        <tr>
                            <th class="especial">
                                DIRECCION
                            </th>
                            <td colspan="2" id="td1">
                                <input id="i1" type="HIDDEN" name="ubigeoAE1" size="100" value="<?php echo $row[4] ?>" readOnly="readOnly">
                                <input id="i1" type="text" name="direccionAE1" size="100" value="<?php echo $row[5], ' - ', $row[3] ?>" readOnly="readOnly"></td> 
                        </tr>   

                        <tr>
                            <th class="especial">
                                ULTIMO APORTE
                            </th>
                            <td colspan="2" id="td1"><input id="i1" type="text" size="100" name="APORTE1" value="<?php echo $row[2] ?>" readonly></td>                              
                        </tr>


                        <div id="dialog3" title="SGVCA" class="contenido">
                            <iframe src="formEntidades.php?ruc=<?php echo $row[1] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
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
                                                    u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO,
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
                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="4">
                                EMPRESA
                            </th>                                               
                        </tr>
                        <tr>
                            <th class="especial">
                                NOMBRE FISCAL
                            </th>
                            <td colspan="2" id="td1"><input id="i1" type="text" size="100" name="nombreEntidad2" value="<?php echo $row[2] ?>" readonly></td>                              
                        </tr>

                        <tr>
                            <th class="especial">
                                RUC
                            </th>                    
                            <td colspan="2" id="td1">
                                <a href="#" id="abriPoppup4">
                                    <input id="i1" type="text" name="NUMRUC2" size="100" value="<?php echo $row[1] ?>" readOnly="readOnly"></a> 
                            </td>
                        </tr>

                        <tr>
                            <th class="especial">
                                DIRECCION
                            </th>
                            <td colspan="2" id="td1">
                                <input id="i1" type="HIDDEN" name="ubigeoAE2" size="100" value="<?php echo $row[5] ?>" readOnly="readOnly">
                                <input id="i1" type="text" name="direccionAE2" size="100" value="<?php echo $row[6], ' - ', $row[7] ?>" readOnly="readOnly"></td> 
                        </tr>  

                        <div id="dialog4" title="SGVCA" class="contenido">
                            <iframe src="formEntidades.php?ruc=<?php echo $row[1] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        <?php
                    }
//liberando los recursos
                    oci_free_statement($queryemp2);
                }
//$conexion->close()
                ?>     

                <br>   
                <tr>
                    <th id="th1" scope="row" class="especial" colspan="4">
                        GENERAR ORDEN DE VERIFICACION
                    </th>                                               
                </tr>
                <tr>
                    <th class="especial">
                        &iquest;PERIODO A EVALAR?(Desde)?
                    </th>                   
                    <td colspan="2" id="td1">
                        <div class="">                            
                            <input id="i1" type="text" name="pevaluarI" value="" maxlength="6" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                        event.returnValue = false;" placeholder="AAAAMM" required>  
                        </div>
                    </td> 
                </tr> 
                <tr>
                    <th class="especial">
                        &iquest;PERIODO A EVALAR?(Hasta)?
                        <input type="checkbox" id="check2" value="1" onclick="habilitar2()" checked>
                    </th>                   
                    <td colspan="2" id="td1">
                        <div class="">  

                            <input id="pevaluarF" type="text" name="pevaluarF" value="" maxlength="6" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                        event.returnValue = false;" placeholder="AAAAMM" readOnly>  
                        </div>
                    </td> 
                </tr> 
                <tr>
                    <th class="especial">
                        Listado de Verificadores segun la OSPE O UCF:
                    </th>
                    <td  id="td1">
                        <?PHP
                        $queryVV = "SELECT dv.idDIM_Oficina, dv.apellidonombre FROM dim_oficina dv where dv.codOficina ='$codOficina' and not dv.idtperfiles='3'";
                        $resultado1 = $conexionmysql->query($queryVV);
                        $i = 0;
                        if ($conexionmysql->query($queryVV)) {
                            while ($fila = $resultado1->fetch_assoc()) {
                                $i++;
                                ?>
                                <div class="input-group">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="check<?php echo $i ?>" value="<?php echo $fila['idDIM_Oficina'] ?>" > <?php echo $fila['apellidonombre'] ?><br>    
                                    </label>                        
                                </div><BR>

                                <?PHP
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th id="th1" scope="row" class="especial" colspan="4">
                        OBSERVACIONES
                    </th>                                               
                </tr>
                <td colspan="2" id="td1">
                    <div id="container">
                        <textarea name="obs" id="obs" rows="10" cols="50" class="form-control" maxlength="200"></textarea>                        
                    </div>
                    <div id="contador">
                    </div>
                </td> 

                <tr>

                    <th class="especial" colspan="4">
                        <div class="">
                            <input type="submit" name="grabar" value="Grabar" class="btn btn-info"/>
                        </div>
                    </th>
                </tr> 
            </table>
            <br>
        </form>


        <?php
        require_once dirname(__FILE__) . '/PHPWord-master/src/PhpWord/Autoloader.php';
        \PhpOffice\PhpWord\Autoloader::register();

        use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('../SISGASV/doc/ANEXON.docx');

        if (isset($_POST['grabar'])) {
            $eempleadora = null;
            $nombreEntidad = NULL;
            $ubigeoAE = null;
            $direccionAE = null;
            $numRL = null;
            $nomRL = null;
            $cargoRL = null;

            $vv1 = null;
            $vv2 = null;
            $vv3 = null;
            $vv4 = null;
            $vv5 = null;

            $vvn1 = null;
            $vvn2 = null;
            $vvn3 = null;
            $vvn4 = null;
            $vvn5 = null;

            $vv6 = null;
            $vv7 = null;
            $vv8 = null;
            $vv9 = null;
            $vv10 = null;
            $vv11 = null;

            $vvn6 = null;
            $vvn7 = null;
            $vvn8 = null;
            $vvn9 = null;
            $vvn10 = null;
            $vvn11 = null;


            include ('../SISGASV/conexionesbd/conexion_mysql.php');
            $domicilioA = $_POST['domicilioA']; //1
            $ubigeo = $_POST['ubigeo'];
            $dni = $_POST['dni'];
            $idTPersona = $_POST['dgansas']; //dgansas
            $pevaluarI = $_POST['pevaluarI'];
            $pevaluarF = $_POST['pevaluarF'];
            $dubigeo = $_POST['dubigeo']; //3
            $datos = $_POST['datos']; //3            

            if (empty($_POST['nombreEntidad1'])) {
                if ($nombreEntidad == NULL) {
                    $nombreEntidad = $_POST['nombreEntidad2'];
                }
            } else {
                $nombreEntidadd = $_POST['nombreEntidad1'];
                $nombreEntidad = "$nombreEntidadd";
            }

            if (empty($_POST['NUMRUC1'])) {
                if ($eempleadora == NULL) {
                    $eempleadora = $_POST['NUMRUC2'];
                }
            } else {
                $eempleadoraa = $_POST['NUMRUC1'];
                $eempleadora = "$eempleadoraa";
            }

            if (empty($_POST['ubigeoAE1'])) {
                if ($ubigeoAE == NULL) {
                    $ubigeoAE = $_POST['ubigeoAE2'];
                }
            } else {
                $ubigeoAEE = $_POST['ubigeoAE1'];
                $ubigeoAE = "$ubigeoAEE";
            }

            if (empty($_POST['direccionAE1'])) {
                if ($direccionAE == NULL) {
                    $direccionAE = $_POST['direccionAE2'];
                }
            } else {
                $direccionAEE = $_POST['direccionAE1'];
                $direccionAE = "$direccionAEE";
            }

            if (empty($_POST['check1'])) {
                $verificador1 = 'NULL';
            } else {
                $verificador11 = $_POST['check1'];
                $verificador1 = "$verificador11";
            }

            if (empty($_POST['check2'])) {
                $verificador2 = 'NULL';
            } else {
                $verificador22 = $_POST['check2'];
                $verificador2 = "$verificador22";
            }

            if (empty($_POST['check3'])) {
                $verificador3 = 'NULL';
            } else {
                $verificador33 = $_POST['check3'];
                $verificador3 = "$verificador33";
            }

            if (empty($_POST['check4'])) {
                $verificador4 = 'NULL';
            } else {
                $verificador44 = $_POST['check4'];
                $verificador4 = "$verificador44";
            }

            if (empty($_POST['check5'])) {
                $verificador5 = 'NULL';
            } else {
                $verificador55 = $_POST['check5'];
                $verificador5 = "$verificador55";
            }

            if (empty($_POST['check6'])) {
                $verificador6 = 'NULL';
            } else {
                $verificador66 = $_POST['check6'];
                $verificador6 = "$verificador66";
            }

            if (empty($_POST['check7'])) {
                $verificador7 = 'NULL';
            } else {
                $verificador77 = $_POST['check7'];
                $verificador7 = "$verificador77";
            }

            if (empty($_POST['check8'])) {
                $verificador8 = 'NULL';
            } else {
                $verificador88 = $_POST['check8'];
                $verificador8 = "$verificador88";
            }

            if (empty($_POST['check9'])) {
                $verificador9 = 'NULL';
            } else {
                $verificador99 = $_POST['check9'];
                $verificador9 = "$verificador99";
            }

            if (empty($_POST['check10'])) {
                $verificador10 = 'NULL';
            } else {
                $verificador1010 = $_POST['check10'];
                $verificador10 = "$verificador1010";
            }

            if (empty($_POST['check11'])) {
                $verificador11 = 'NULL';
            } else {
                $verificador1111 = $_POST['check11'];
                $verificador11 = "$verificador1111";
            }

            $obs = $_POST['obs']; //26            
            date_default_timezone_set('America/Bogota');
            $fecha_hora_actualo = date('Y-m-d G:i:s');
            $fecha_hora_actual = "'$fecha_hora_actualo'";
            $fecha = date('Y-m-d');

            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";

            $queryA = "SELECT max(m.iddim_Verificacion) as max FROM dim_verificacion m";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultA = $conexionmysql->query($queryA);
            if ($conexionmysql->query($queryA)) {
                while ($fila = $resultA->fetch_assoc()) {
                    $ma = $fila['max'];
                    $max = $ma + 1;
                }
            }


            //$query1 = "SELECT max(m.idTMaestra) as max FROM dim_Maestra m";
            $queryB = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultB = $conexionmysql->query($queryB);
            if ($conexionmysql->query($queryB)) {
                while ($fila = $resultB->fetch_assoc()) {
                    $maa = $fila['max'];
                    $maxx = $maa + 1;
                }
            }


            $newmax = str_pad($maxx, 7, "0", STR_PAD_LEFT);

            $queryRR = oci_parse($conexionora, "select t.NUMRUC, t.NRODOC, t.NOMBRE, t.CARGO, t.VDESDE
                                                    from dim_REPRESENTANTES_LEGALES t
                                                    where t.NUMRUC='$eempleadora'");

            oci_execute($queryRR);
            while ($row = oci_fetch_array($queryRR, OCI_NUM + OCI_RETURN_NULLS)) {
                $numRL = $row[1];
                $nomRL = $row[2];
                $cargoRL = $row[3];
            }

            $query = "INSERT INTO dim_Overificacion 
                 VALUES ($max, $idOficinaUsuario, $maxx, '084', '$eempleadora', '$idTPersona', '$pevaluarI', '$pevaluarF', '$direccionAE', '$ubigeoAE', '$domicilioA', '$ubigeo', '$obs', 
                        $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query2 = "INSERT INTO dim_cartapverificacion 
                 VALUES ($max, '237', '$nombreEntidad', '$eempleadora', '$direccionAE', '$numRL', '$nomRL', $verificador1, $verificador2, $verificador3, $verificador4, $verificador5, $verificador6, $verificador7, $verificador8, $verificador9, $verificador10, $verificador11, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query3 = "INSERT INTO dim_actacimpedimentodemora 
                 VALUES ($max, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query4 = "INSERT INTO dim_CAOVerificacion 
                 VALUES ($max, '142', '$nombreEntidad', '$eempleadora', '$direccionAE', '$numRL', '$nomRL', $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query5 = "INSERT INTO dim_actaverificacion  
                 VALUES ($max, '026', $verificador1, $verificador2, $verificador3, $verificador4, $verificador5, $verificador6, $verificador7, $verificador8, $verificador9, $verificador10, $verificador11, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query6 = "INSERT INTO dim_cnotificacionaa  
                 VALUES ($max, '145', '$nombreEntidad', '$eempleadora', '$direccionAE', $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query7 = "INSERT INTO dim_entrevista 
                 VALUES ($max, $idOficinaUsuario, $maxx, null, '245', '$idTPersona', $fecha_hora_actual, '$eempleadora', null, null, null, null, null,
                        null, null, null, null, null, null, null, null, null, null,
                        null, null, null, null, null, null, null, null, null,                
                        $idtusuario, $fecha_hora_actual, $fecha_hora_update)"; //35

            $query8 = "INSERT INTO dim_verificacion 
                 VALUES ($max, null, null, $max, $max, $max, $max, $max, $max, $max, null, null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)"; //21
            //$query9 = "INSERT INTO dim_Maestra
            //     VALUES ($max, $idOficinaUsuario, $maxx, null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";//13

            $templateWord->setValue('distritoOSPE', $distritoOSPE);
            $templateWord->setValue('oficinadireccion', $oficinadireccion);
            $templateWord->setValue('oficina', $oficina);
            $templateWord->setValue('codOficina', $codOficina);
            $templateWord->setValue('newmax', $newmax);
            $templateWord->setValue('nombreEntidad', $nombreEntidad);
            $templateWord->setValue('eempleadora', $eempleadora);
            $templateWord->setValue('direccionAE', $direccionAE);
            $templateWord->setValue('nomRL', $nomRL);
            $templateWord->setValue('numRL', $numRL);


            $query_v1 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador1'";
            $result_v1 = $conexionmysql->query($query_v1);
            if ($conexionmysql->query($query_v1)) {
                while ($fila = $result_v1->fetch_assoc()) {
                    $vv1 = $fila['nomyApellidos'];
                    $vvn1 = $fila['dni_verificador'];
                }
            }

            $query_v2 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador2'";
            $result_v2 = $conexionmysql->query($query_v2);
            if ($conexionmysql->query($query_v2)) {
                while ($fila = $result_v2->fetch_assoc()) {
                    $vv2 = $fila['nomyApellidos'];
                    $vvn2 = $fila['dni_verificador'];
                }
            }

            $query_v3 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador3'";
            $result_v3 = $conexionmysql->query($query_v3);
            if ($conexionmysql->query($query_v3)) {
                while ($fila = $result_v3->fetch_assoc()) {
                    $vv3 = $fila['nomyApellidos'];
                    $vvn3 = $fila['dni_verificador'];
                }
            }

            $query_v4 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador4'";
            $result_v4 = $conexionmysql->query($query_v4);
            if ($conexionmysql->query($query_v4)) {
                while ($fila = $result_v4->fetch_assoc()) {
                    $vv4 = $fila['nomyApellidos'];
                    $vvn4 = $fila['dni_verificador'];
                }
            }

            $query_v5 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador5'";
            $result_v5 = $conexionmysql->query($query_v5);
            if ($conexionmysql->query($query_v5)) {
                while ($fila = $result_v5->fetch_assoc()) {
                    $vv5 = $fila['nomyApellidos'];
                    $vvn5 = $fila['dni_verificador'];
                }
            }

            $query_v6 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador6'";
            $result_v6 = $conexionmysql->query($query_v6);
            if ($conexionmysql->query($query_v6)) {
                while ($fila = $result_v6->fetch_assoc()) {
                    $vv6 = $fila['nomyApellidos'];
                    $vvn6 = $fila['dni_verificador'];
                }
            }

            $query_v7 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador7'";
            $result_v7 = $conexionmysql->query($query_v7);
            if ($conexionmysql->query($query_v7)) {
                while ($fila = $result_v7->fetch_assoc()) {
                    $vv7 = $fila['nomyApellidos'];
                    $vvn7 = $fila['dni_verificador'];
                }
            }

            $query_v8 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador8'";
            $result_v8 = $conexionmysql->query($query_v8);
            if ($conexionmysql->query($query_v8)) {
                while ($fila = $result_v8->fetch_assoc()) {
                    $vv8 = $fila['nomyApellidos'];
                    $vvn8 = $fila['dni_verificador'];
                }
            }

            $query_v9 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador9'";
            $result_v9 = $conexionmysql->query($query_v9);
            if ($conexionmysql->query($query_v9)) {
                while ($fila = $result_v9->fetch_assoc()) {
                    $vv9 = $fila['nomyApellidos'];
                    $vvn9 = $fila['dni_verificador'];
                }
            }

            $query_v10 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador10'";
            $result_v10 = $conexionmysql->query($query_v10);
            if ($conexionmysql->query($query_v10)) {
                while ($fila = $result_v10->fetch_assoc()) {
                    $vv10 = $fila['nomyApellidos'];
                    $vvn10 = $fila['dni_verificador'];
                }
            }

            $query_v11 = "SELECT dv.idDIM_Oficina, dv.codOficina, dv.dni as dni_verificador, dv.apellidonombre as nomyApellidos FROM dim_oficina dv where dv.codOficina ='$codOficina' and dv.idDIM_Oficina='$verificador11'";
            $result_v11 = $conexionmysql->query($query_v11);
            if ($conexionmysql->query($query_v11)) {
                while ($fila = $result_v11->fetch_assoc()) {
                    $vv11 = $fila['nomyApellidos'];
                    $vvn11 = $fila['dni_verificador'];
                }
            }


            $templateWord->setValue('vv1', $vv1);
            $templateWord->setValue('vvn1', $vvn1);
            $templateWord->setValue('vv2', $vv2);
            $templateWord->setValue('vvn2', $vvn2);
            $templateWord->setValue('vv3', $vv3);
            $templateWord->setValue('vvn3', $vvn3);
            $templateWord->setValue('vv4', $vv4);
            $templateWord->setValue('vvn4', $vvn4);
            $templateWord->setValue('vv5', $vv5);
            $templateWord->setValue('vvn5', $vvn5);
            $templateWord->setValue('vv6', $vv6);
            $templateWord->setValue('vvn6', $vvn6);
            $templateWord->setValue('vv7', $vv7);
            $templateWord->setValue('vvn7', $vvn7);
            $templateWord->setValue('vv8', $vv8);
            $templateWord->setValue('vvn8', $vvn8);
            $templateWord->setValue('vv9', $vv9);
            $templateWord->setValue('vvn9', $vvn9);
            $templateWord->setValue('vv10', $vv10);
            $templateWord->setValue('vvn10', $vvn10);
            $templateWord->setValue('vv11', $vv11);
            $templateWord->setValue('vvn11', $vvn11);

            $templateWord->setValue('datos', $datos);
            $templateWord->setValue('dni', $dni);
            $templateWord->setValue('pevaluar1', $pevaluarI);
            $templateWord->setValue('pevaluar1', $pevaluarF);
            $templateWord->setValue('domicilioA', $domicilioA);
            $templateWord->setValue('dubigeo', $dubigeo);

            if ($conexionmysql->query($query)) {
                if ($conexionmysql->query($query2)) {
                    if ($conexionmysql->query($query3)) {
                        if ($conexionmysql->query($query4)) {
                            if ($conexionmysql->query($query5)) {
                                if ($conexionmysql->query($query6)) {
                                    if ($conexionmysql->query($query7)) {
                                        if ($conexionmysql->query($query8)) {
                                            //if ($conexionmysql->query($query9)) {
                                            echo '<div class="alert alert-success">Se grabo Correctamente</div>';
                                            $templateWord->saveAs('Documento2.docx');
                                            echo '<a href="../SISGASV/Documento2.docx">DESCARGAR ARCHIVO WORD</a>';
                                            //}
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                echo 'Error al grabar registro<br>';
                ECHO 'max: ', $max, '<br>';
                echo 'newmax: ', $newmax, '<br>';
                echo '$direccionAE: ', $direccionAE, '<br>';
                echo '$nombreEntidad: ', $nombreEntidad, '<br>';
                ECHO 'max: ', 'NULL', '<br>';
                echo '$idTPersona: ', $idTPersona, '<br>';
                echo '$fecha_hora_actual: ', $fecha_hora_actual, '<br>';
                echo 'dni: ', $dni, '<br>';
                echo '$dubigeo: ', $dubigeo, '<br>';
                ECHo '$ubigeo: ', $ubigeo, '<br>';
                echo '$domicilioA: ', $domicilioA, '<br>';
                echo '$eempleadora: ', $eempleadora, '<br>';
                echo '$ubigeoAE: ', $ubigeoAE, '<br>';
                echo '$pevaluar1: ', $pevaluarI, '<br>';
                echo '$pevaluar1: ', $pevaluarF, '<br>';
                echo '$datos: ', $datos, '<br>';
                echo $verificador1, '<br>';
                echo $verificador2, '<br>'; //
                echo $verificador3, '<br>';
                echo $verificador4, '<br>';
                echo $verificador5, '<br>';
                echo '$numRL: ', $numRL, '<br>';
                echo '$nomRL: ', $nomRL, '<br>';
                echo '$cargoRL: ', $cargoRL, '<br>';
                echo '$obs: ', $obs, '<br>';
                echo '$idtusuario: ', $idtusuario, '<br>';
                echo '$fecha_hora_actual: ', $fecha_hora_actual, '<br>';
                echo '$fecha_hora_update: ', $fecha_hora_update, '<br>';
                echo '$vv1: ', $vv1, '<br>';
                echo '$vvn1: ', $vvn1, '<br>';
            }
        }
        ?>

    </body>
</html>





