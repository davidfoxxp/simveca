<?php
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura, o.oficina
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

            #loading{
                width:100%;
                height:100%;
                background-color:#ccc;
                position:fixed;
                top:0;
                left:0;
                z-index:9999;
                opacity: 0.8;
                filter: alpha(opacity=80);
            }
        </style>

        <link rel="stylesheet" href="../SISGASV/include/bootstrapform.css" media="screen"/>
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>        
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
            #th2 {
               
                font-weight:bold;                
                
                border-style:solid;
                overflow:hidden;
                

                background-color:#E3F2E1;
                
            }
            tr td {
                vertical-align:left
            }
            @media screen and (max-width: 900px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }
        </style>

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

        <style type="text/css">
            .con_estilos {
                width: auto;
                padding: 5px;
                font-size: 10px;
                border: 1px solid #ccc;
                height: 26px;                
            }
        </style>

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
        
        <script>
            function habilitar_control(value)
            {
                if (value === "1")
                {
                    // habilitamos.
                    // 
                    document.getElementById("Nsubfijo").disabled = true;
                    document.getElementById("doc").disabled = true; 
                    document.getElementById("numm").disabled = false;
                    document.getElementById("ano").disabled = false;
                   document.getElementById("doc").value = "";
                    //document.getElementById("nit").required = true;
                    //document.getElementById("fecartafinanza").required = true;
                    //document.getElementById("ncartafinanza").required = true;
                    // document.getElementById("nResBRegistro").required = true;
                    //document.getElementById("idTGeneraBaja").value = "1";
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true;                   
                } else {
                    // deshabilitamos 
                    
                    document.getElementById("Nsubfijo").disabled = false;
                    document.getElementById("doc").disabled = false; 
                    document.getElementById("numm").disabled = false;
                    document.getElementById("ano").disabled = false;
                    //   
                    //document.getElementById("nit").required = false;
                    //document.getElementById("fecartafinanza").required = false;
                    //document.getElementById("ncartafinanza").required = false;
                    //document.getElementById("nResBRegistro").required = false;
                    //document.getElementById("idTGeneraBaja").value = "0";
                    // document.getElementById("idTGeneraBaja").disabled = false;
                }
            }
        </script>

      <!--  <script language="javascript">
            $(document).ready(function () {
                $("#cbx_tverificacion").change(function () {

                    $("#cbx_tverificacion option:selected").each(function () {
                        idTVerificacion = $(this).val();
                        $.post("include/getTVerificacion.php", {idTVerificacion: idTVerificacion}, function (data) {
                            $("#cbx_perfil").html(data);
                        });
                    });
                })
            });
        </script>
      -->
    </head>
    <body>  

        <DIV id="header">
            <ul class="nav">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a href="">Registrar Formulario Control Posterior</a>
                            <ul>
                                <li>
                                    <a href="formListarControlPosteriorUsuario.php">Listar Registros de Bajas de la OSPE Actual</a>
                                </li>
                                <li>
                                    <a href="formListarControlPosterior.php">Listar Registros de Bajas de TODAS las OSPE</a>
                                </li>
                                <li>
                                    <a href="formControlPosteriorIniciativaPropia.php">Registros por Iniciativa Propia</a>
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
            
            echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' .utf8_decode($row['oficinaIni']. '-' .utf8_decode($row['oficina']));
            echo '<BR>UCF: ' . utf8_decode($row['codOficina']) . '-' .utf8_decode($row['oficina']);
            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = utf8_decode($row['oficina']);
            ?>  
            <br><a href="logout.php">Cerrar Session</a>
        </h4>                
        <br>

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
        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?>            

        <form name="form" action="" method="POST">          
            INGRESE EL DNI: <input type="number" name="dni" required>        
            <input type="checkbox" id="check1" value="1" onclick="habilitar()" checked>            
            INGRESE EL RUC: <input type="number" name='ruc' id='ruc' readOnly>       
            <input type="submit" name="buscar" value="Buscar" maxlength="11">
        </form>
        <h5>
            DATOS DEL REGISTRO SOLICITADO
        </h5> 
        <div>
            <form name="form" method="POST" onSubmit="window.location.reload()">

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
                                                     sc.dgandid as dni, sc.DGACUGD, sg.departamen || ' - ' || sg.provincia || ' - ' || sg.distrito, sc.DGATCAL || ' ' || sc.DGANILO || ' ' || sc.DGANNMK || ' ' || sc.DGATURB as direccion 
                                                FROM dim_SCCMDGAT sc 
                                                left join DIM_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
                                                where sc.dgandid='$dni' and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from DIM_CUENTA_INDIV_00_161718 t where t.NUM_DOCIDE_ASEG='$dni')");

                    oci_execute($queryT);

                    while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                        ?> 

                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="2">
                                TITULAR
                            </th>  
                        </tr>
                        <tr>
                            <th class="especial">
                                DOCUMENTO IDENTIDAD( <?php echo $row[3] ?> )
                            </th>
                            <td colspan="1" id="td1">
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
                        <tr>
                            <th class="especial">
                                APELLIDOS Y NOMBRES
                            </th>
                            <td colspan="1" id="td1"><input id="i1" type="text" name="datos" size="100" value="<?php echo $row[1] ?>" readonly></td>                            
                        </tr> 
                        <tr>
                            <th class="especial">
                                UBIGEO
                            </th>
                        <input id="i1" type="HIDDEN" name="ubigeo" size="50" value="<?php echo $row[5] ?>" readOnly="readOnly">   
                        <td colspan="1" id="td1"><input id="i1" type="text" name="dubigeo" size="100" value="<?php echo $row[6] ?>" readonly></td>                            
                        </tr> 
                        <tr>
                            <th class="especial">
                                DOMICILIO
                            </th>                        
                            <td colspan="1" id="td1"><input id="i1" type="text" name="domicilioA" size="100" value="<?php echo $row[7] ?>" readonly></td>                            
                        </tr> 
                        

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
                            <th id="th1" scope="row" class="especial" colspan="2">
                                DERECHO HABIENTE
                            </th>                                               
                        </tr>

                        <tr>                               
                            <th class="especial">
                                TIPO DE VINCULO DEL DH
                            </th>      
                            <td colspan="1" id="td1"><input id="i1" type="text" name="vinculo" size="50" value="<?php echo $row[0] ?>" readonly></td>       
                        </tr>

                        <tr>
                            <th class="especial">
                                APELLIDOS Y NOMBRES
                            </th>
                            <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="DH" value="<?php echo $row[4] ?>" readonly></td>
                        </tr>
                        <tr>
                            <th class="especial">
                                DOCUMENTO IDENTIDAD
                            </th>
                            <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="DH" value="<?php echo $row[3] ?>" readonly>                                                      
                            </td>
                        </tr>

                        <?php
                    }
                    //liberando los recursos
                    oci_free_statement($querydh);
                    ?> 

                    <?php
                    if ($ruc != NULL) {
                        
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
                                <th id="th1" scope="row" class="especial" colspan="2">
                                    EMPRESA
                                </th>                                               
                            </tr>
                            <tr>
                                <th class="especial">
                                    NOMBRE FISCAL
                                </th>
                                <td colspan="1" id="td1"><input id="i1" type="text" size="50" name="nombreEntidad2" value="<?php echo $row[2] ?>" readonly></td>                              
                            </tr>

                            <tr>
                                <th class="especial">
                                    RUC
                                </th>                    
                                <td colspan="1" id="td1">
                                    <a href="#" id="abriPoppup4">
                                        <input id="i1" type="text" name="NUMRUC2" size="50" value="<?php echo $row[1] ?>" readOnly="readOnly"></a> 
                                </td>
                            </tr>

                            <tr>
                                <th class="especial">
                                    DIRECCION
                                </th>
                                <td colspan="1" id="td1">
                                    <input id="i1" type="HIDDEN" name="ubigeoAE2" size="50" value="<?php echo $row[5] ?>" readOnly="readOnly">
                                    <input id="i1" type="text" name="direccionAE2" size="50" value="<?php echo $row[6], ' - ', $row[7] ?>" readOnly="readOnly"></td> 
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
                    <?php
                    if ($dni != NULL) {
                        ?>
                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="4">
                                REGISTRO POR INICIATIVA PROPIA
                            </th>
                        </tr> 

                        <TR>
                            <th class="especial">
                                SELECCIONE EL TIPO DE VERIFICACION
                            </th>

                            <td>
                                <?PHP
                                $query = "SELECT a.idTVerificacion, a.Verificacion FROM tipoverificacion a";
                                $resultado = $conexionmysql->query($query);
                                ?>

                                <div>
                                    <select name="cbx_tverificacion" id="cbx_tverificacion" class="con_estilos" value="cbx_tverificacion"  required="" onchange="habilitar_control(this.value);">
                                        <option value="">----</option>
                                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['idTVerificacion']; ?>"><?php echo $row['Verificacion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </TR>
<!--
                        <TR>
                            <th class="especial">
                                SELECCION EL TIPO DE PERFIL
                            </th>
                            <td>
                                <div>
                                    <?PHP
                                    //echo '<select name="cbx_perfil" id="cbx_perfil" class="con_estilos" value="cbx_perfil" required></select>'
                                    ?>
                                </div>
                            </td>
                        </TR>
-->
<!--
                        <TR>
                            <th class="especial">
                                ESTADO ACTUAL
                            </th>

                            <td><select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual">                                    
                                    <option value = "1">PENDIENTE</option>
                                    <option value = "2">EN PROCESO</option>
                                    <option value = "3">TERMINADO</option>  >
                                </select>
                            </td>
                        </TR>

                        <tr>
                            <th class="especial">
                                Nº RESOLUCION DE BAJA DE REGISTRO
                            </th>

                            <td>        
                                <input type = "text" name = "nResBRegistro" id="nResBRegistro" maxlength="20" 
                                            event.returnValue = false;" value="">
                            </td>
                        </tr>
-->

                        <tr>
                        
                            <th class="especial" id="th2">    
                                     Nº SUB 
                            </th>
                        
                            <td>        
                                <input type = "text" name = "Nsubfijo" id="Nsubfijo" maxlength="10" 
                                            event.returnValue = false;" value="">
                            </td>
                            <th class="especial" id="th2">
                                ACA VA LA NUMERACION DEL DOCUMENTO<BR>                                
                            </th>

                             <td><select name = "doc" id="doc">
                                    <option value="">---</option>
                                    <option value="023">023 - Informe Final de Verificación</option>
                                    <option value="026">026 - Acta de Verificación</option>
                                    <option value="084">084 - Orden de Verificación</option>
                                    <option value="085">085 - Resolución de Baja de Oficio</option>
                                    <option value="086">086 - Resolución de Multa</option>
                                    <option value="087">087 - Resolución de Inhabilitación</option>
                                    
                                </select>
                            </td>
                        </tr>
                        

                        <tr>
                            
                        </tr>
                        
                        <tr>
                            <th class="especial" id="th2">
                                Nº RESOLUCION (ACOMPAÑADO DE CEROS ADELANTE)
                            </th>

                            <td>        
                                <input type = "text" name = "numm" id="numm" maxlength="4" 
                                            event.returnValue = false;">
                            </td>
                            <th class="especial" id="th2">
                                AÑO
                            </th>                            
                            <td><select name = "ano" id="ano">
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                </select>
                            </td>
                        </tr>


                        <tr> 
                        </tr>
<!--
                        <tr> <th class="especial">
                                ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA
                            </th>

                            <td><select name = "idTRRBRegistro" id="idTRRBRegistro" onchange="habilitar33(this.value);">
                                    <option value = "0"></option>
                                    <option value = "1">FIRME Y CONSENTIDA</option>
                                    <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                                    <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                                    <option value = "4">IMPROCEDENTE - 1RA INSTANCIA</option>
                                    <option value = "5">FUNDADO EN PARTE - 1RA INSTANCIA</option>
                                    <option value = "6">INADMISIBLE - 1RA INSTANCIA</option>
                                    <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                                    <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                                    <option value = "9">PROCESO DE CALIFICACION</option>
                                    <option value = "10">APELACION</option>
                                    <option value = "11">RECONSIDERACION</option>
                                </select>
                            </td>
                        </tr>



                        <tr>
                            <th class="especial">
                                NIT
                            </th>

                            <td>        
                                <input type = "text" name = "nit" id="nit" maxlength="50" value=""></td>
                        </tr>
-->
                        <tr><th class="especial">
                                FECHA DE EMISION DE BAJA DE REGISTRO
                            </th>
                            <td><input type = "date" name = "femisionBRegistro" min="0001-01-01" id="femisionBRegistro" value=""><br>
                            </TD>
                            <th class="especial">
                                FECHA NOTIFICACION BAJA DE REGISTRO
                            </th>

                            <td><input type = "date" name = "fnotificacionBRegistro" id="fnotificacionBRegistro"
                                       min="0001-01-01" value=""><br>
                            </TD>
                        </tr>
                        
                         <tr>
                        </tr>   
                        
                        <tr><th class="especial">
                                FECHA DE PUBLICACION RES BAJA - EL PERUANO
                            </th>
                            <td><input type = "date" name = "fpubPeruano" min="0001-01-01" id="fpubPeruano" value=""><br>
                            </TD>
                            <th class="especial">
                                FECHA PUBLICACION RES BAJA - WEB ESSALUD
                            </th>

                            <td><input type = "date" name = "fpubweb" id="fpubweb"
                                       min="0001-01-01" value=""><br>
                            </TD>
                        </tr>
                        
                         <tr>
                        </tr> 
                        
                        <tr><th class="especial">
                                FECHA PUBLICACION RES BAJA - DIARIO MAYOR CIRCULACION
                            </th>

                            <td><input type = "date" name = "fpubdiario" id="fpubdiario"
                                       min="0001-01-01" value=""><br></TD>
                        </tr> 

                        <tr><th class="especial">
                                FECHA ENVIO DE CARTA A <br>FINANZAS POR RECUPERO DE BAJA
                            </th>

                            <td><input type = "date" name = "fecartafinanza" id="fecartafinanza"
                                       min="0001-01-01" value=""><br></TD>
                            <th class="especial">
                                NUMERO DE CARTA A <br>FINANZAS POR RECUPERO BAJA
                            </th>

                            <td><input type = "text" name = "ncartafinanza" id="ncartafinanza" maxlength="20" value=""><br></TD>
                        </tr> 

                        <tr>
                        </tr>

<!--
                        <tr><th class="especial">
                                FECHA DE ENVIO A LA OSPE
                            </th>

                            <td><input type = "date" name = "fechaenvioOSPE" id="fechaenvioOSPE" value=""
                                       min="0001-01-01"><br></TD>
                        </tr> 

                        <tr><th class="especial">
                                CORREO DONDE SE COMUNICO A LA SUBGERENCIA
                            </th>

                            <td><input type = "date" name = "correo" id="correo" value=""><br></TD>
                        </tr>



                        <tr><th class="especial">
                                OPERATIVO
                            </th>

                            <td><input type = "text" name = "operativo" id="operativo" maxlength="100" value=""><br></td>
                        </tr> 
-->
                        <tr>
                            <th class="especial">
                                OBSERVACIONES
                            </th>

                            <td><textarea rows = "4" cols = "20" placeholder="Solo 200 caracteres" name = "observaciones" id="observaciones" maxlength="200"></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="grabar" value="Grabar" class="btn btn-info"/>
                            </td>
                        </tr>
                        <br><br>
                        <?php
                    }
                    ?>
                </table>  

            </form>	
        </div>

        <?php
        if (isset($_POST['grabar'])) {
            if ($_POST['cbx_tverificacion']==1) {

            include ('./conexionesbd/conexion_mysql.php');
            include ('./conexionesbd/conexion_oracle.php');

            $dgansas = null;
            $dgatapa = null;
            $dgatama = null;
            $dgatpno = null;
            $sdgatpno = null;
            $dgactdi = null;
            $DGAFNAC = null;
            $dni_2 = null;

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

            $ESTADO_EMP = null;
            $DEPARTAMENTO_EMP = null;
            $PROVINCIA_EMP = null;
            $DISTRITO_EMP = null;

            $direccion_EMP = null;

            if (empty($_POST['dni'])) {
                $dni_1 = 'NULL';
            } else {
                $dnii = $_POST['dni'];
                $dni_1 = "'$dnii'";
            }


            $queryT = oci_parse($conexionora, "SELECT sc.dgansas, sc.dgatapa, sc.dgatama, sc.dgatpno, nvl(sc.dgatsno, '') as sdgatpno, sc.dgactdi,                                               
                                                     TO_CHAR(sc.DGAFNAC, 'YYYY-MM-DD'),
                                                     sc.dgandid as dni, sc.DGACUGD, sg.departamen, sg.provincia, sg.distrito, 
                                                     sc.DGATCAL || ' ' || sc.DGANILO || ' ' || sc.DGANNMK || ' ' || sc.DGATURB as direccion 
                                                FROM dim_SCCMDGAT sc 
                                                left join dim_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
                                                where sc.dgandid=$dni_1 and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from DIM_CUENTA_INDIV_00_161718 t where t.NUM_DOCIDE_ASEG=$dni_1)");
            oci_execute($queryT);
            while ($row2 = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                $dgansas = $row2[0];
                $dgatapa = $row2[1];
                $dgatama = $row2[2];
                $dgatpno = $row2[3];

                IF ($row2[4] == NULL) {
                    $sdgatpno = "NULL";
                } else {
                    $sdgatpno = $row2[4];
                }

                $dgactdi = $row2[5];
                $DGAFNAC = $row2[6];
                $dni_2 = $row2[7];

                $DGACUGD = $row2[8];
                $departamen = $row2[9];
                $provincia = $row2[10];
                $distrito = $row2[11];

                $direccion = $row2[12];
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
                $NOMBRE_EMP = $row1[2];
                $flag22_EMP = $row1[3];

                $ESTADO_EMP = $row1[4];
                $DEPARTAMENTO_EMP = $row1[5];
                $PROVINCIA_EMP = $row1[6];
                $DISTRITO_EMP = $row1[7];

                $direccion_EMP = $row1[8];
            }


            if (empty($_POST['cbx_tverificacion'])) {
                $idTVerificacion = 'NULL';
            } else {
                $idTVerificacionn = $_POST['cbx_tverificacion'];
                $idTVerificacion = "'$idTVerificacionn'";
            }
            
            if (empty($_POST['femisionBRegistro'])) {
                $FEmisionBRegistro = 'NULL';
            } else {
                $FEmisionBRegistroo = $_POST['femisionBRegistro'];
                $FEmisionBRegistro = "'$FEmisionBRegistroo'";
            }
            
            
            
            
            if (empty($_POST['Nsubfijo'])) {
                $Nsubfijo = 'NULL';
            } else {
                $Nsubfijooo = $_POST['Nsubfijo'];
                $Nsubfijo = "'$Nsubfijooo'";
            }
            if (empty($_POST['doc'])) {
                $doc = 'NULL';
            } else {
                $docoo = $_POST['doc'];
                $doc = "'$docoo'";
            }
            if (empty($_POST['numm'])) {
                $numm = 'NULL';
            } else {
                $nummoo = $_POST['numm'];
                $numm = "$nummoo";
            }
            if (empty($_POST['ano'])) {
                $ano = 'NULL';
            } else {
                $anooo = $_POST['ano'];
                $ano = "$anooo";
            }
            
           
            


            if (empty($_POST['nResBRegistro'])) {
                $nResBRegistro = 'NULL';
            } else {
                $nResBRegistroo = $_POST['nResBRegistro'];
                $nResBRegistro = "'$nResBRegistroo'";
            }
            
            
            if (empty($_POST['fpubPeruano'])) {
                $fpubPeruano = 'NULL';
            } else {
                $fpubPeruanooo = $_POST['fpubPeruano'];
                $fpubPeruano = "'$fpubPeruanooo'";
            }
                        
            
            if (empty($_POST['fpubweb'])) {
                $fpubweb = 'NULL';
            } else {
                $fpubweboo = $_POST['fpubweb'];
                $fpubweb = "'$fpubweboo'";
            }
            
            
            
            if (empty($_POST['fpubdiario'])) {
                $fpubdiario = 'NULL';
            } else {
                $fpubdiariooo = $_POST['fpubdiario'];
                $fpubdiario = "'$fpubdiariooo'";
            }
            
       
            if (empty($_POST['fnotificacionBRegistro'])) {
                $FNotificacionPAsegurado = 'NULL';
            } else {
                $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
                $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
            }

            if (empty($_POST['fecartafinanza'])) {
                $FEnvioCFinanzasBRegistro = 'NULL';
            } else {
                $FEnvioCFinanzasBRegistroo = $_POST['fecartafinanza'];
                $FEnvioCFinanzasBRegistro = "'$FEnvioCFinanzasBRegistroo'";
            }

            if (empty($_POST['ncartafinanza'])) {
                $numCartaFinanzasBRegistro = 'NULL';
            } else {
                $numCartaFinanzasBRegistroo = $_POST['ncartafinanza'];
                $numCartaFinanzasBRegistro = "'$numCartaFinanzasBRegistroo'";
            }

            if (empty($_POST['observaciones'])) {
                $obsOSPE = 'NULL';
            } else {
                $obsOSPEo = $_POST['observaciones'];
                $obsOSPE = "'$obsOSPEo'";
            }

            $nnnResBRegistro = $numm ."-" .$nomenclatura ."-".$oficinaIni .$oficina."-GCSPE-ESSALUD" ."-".$ano;
                       
            
            date_default_timezone_set('America/Bogota');
            $fecha_hora_creacione = date('Y-m-d G:i:s');
            $fecha_hora_creacion = "'$fecha_hora_creacione'";

            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";


            //resolviendo una consulta con la clausula insert, fcorreo=$fcorreo,
            /* $query = "INSERT INTO dim_aseguradoindevido
              (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo)
              VALUES ('$max', '45', '$max')"; */


            $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, paterno_t, materno_t, 
            nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion, fActualizacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max, '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', $dni_1, '$dgatapa', '$dgatama', 
            '$dgatpno', '$sdgatpno', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion, $fecha_hora_update)";


            $query1 = "INSERT INTO dim_cposterior (
            iddim_CPosterior, idTVerificacion, iddim_aseguradoindevido,  
            idTEstadoActual,
            femisionBRegistro, nResBRegistro, fnotificacionBRegistro, 
            fecartafinanza, ncartafinanza, 
            felperuano, fweb, fdiario,
            observaciones,             
            idtusuario, fCreacion, fActualizacion)             
            VALUES (
            $max, $idTVerificacion, $max,   
            '3',    
            $FEmisionBRegistro, '$nnnResBRegistro', $FNotificacionPAsegurado,
            $FEnvioCFinanzasBRegistro, $numCartaFinanzasBRegistro,
            $fpubPeruano, $fpubweb, $fpubdiario,
            $obsOSPE,            
            $idtusuario, $fecha_hora_creacion, $fecha_hora_update)";

            
            $query2 = "INSERT INTO dim_pacalificar ( 
            iddim_PaCalificar, iddim_CPosterior,
            idtusuario, fCreacion
            ) 
            values (
            $max, $max,
            $idtusuario, $fecha_hora_creacion    
            )";

            
            /*
             $query2 = "INSERT INTO dim_pacalificar ( 
            iddim_PaCalificar, iddim_CPosterior,
            InicioPCalificar1, FinPCalificar1, 
            InicioPCalificar2, FinPCalificar2, 
            InicioPCalificar3, FinPCalificar3, 
            InicioPCalificar4, FinPCalificar4, 
            InicioPCalificar5, FinPCalificar5,
            InicioPFinal, FinPFinal,
            idtusuario, fCreacion, fActualizacion) 
            values (
            $max, $max,
            $InicioPCalificar1, $FinPCalificar1,
            $InicioPCalificar2, $FinPCalificar2,
            $InicioPCalificar3, $FinPCalificar3,
            $InicioPCalificar4, $FinPCalificar4,
            $InicioPCalificar5, $FinPCalificar5,
            $InicioPFinal, $FinPFinal,
            $idtusuario, $fecha_hora_creacion, $fecha_hora_update)";
             */
            
            

            if ($conexionmysql->query($query)) {
                if ($conexionmysql->query($query1)) {
                    if ($conexionmysql->query($query2)) {
                        
                        echo 'Se Actualizo Correctamente.',$nnnResBRegistro;
                    } else {
                        echo 'Error al Actualizar registro<br>';
                        echo '$MAX: ', $max, '<br><br>';
                        echo '$idOficinaUsuario: ', $idOficinaUsuario, '<br>';

                        echo '$eempleadora: ', $eempleadora, '<br><br>';
                        echo '$dni_eempleadora: ', $dni_eempleadora, '<br><br>';

                        echo '$NOMBRE_EMP: ', $NOMBRE_EMP, '<br>';
                        echo '$flag22_EMP: ', $flag22_EMP, '<br>';
                        echo '$ESTADO_EMP: ', $ESTADO_EMP, '<br>';
                        echo '$DEPARTAMENTO_EMP: ', $DEPARTAMENTO_EMP, '<br>';
                        echo '$PROVINCIA_EMP: ', $PROVINCIA_EMP, '<br><br>';

                        echo '$DISTRITO_EMP: ', $DISTRITO_EMP, '<br>';
                        echo '$direccion_EMP: ', $direccion_EMP, '<br>';
                        echo '$dni_1: ', $dni_1, '<br><br>';
                        echo '$dgatapa: ', $dgatapa, '<br><br>';
                        echo '$dgatama: ', $dgatama, '<br>';

                        echo '$dgatpno: ', $dgatpno, '<br>';
                        echo '$sdgatpno: ', $sdgatpno, '<br>';
                        echo '$DGAFNAC: ', $DGAFNAC, '<br>';
                        echo '$departamen: ', $departamen, '<br>';
                        echo '$provincia: ', $provincia, '<br>';
                        echo '$distrito: ', $distrito, '<br>';

                        echo '$direccion: ', $direccion, '<br>';
                        echo '$fecha_hora_update: ', $fecha_hora_update, '<br>';
                        echo '$iddim_usuario: ', $idtusuario, '<br><br>';
                        echo '$idTVerificacion: ', $idTVerificacion, '<br>';
                        echo '$idTVerificacionPerfil: ', $idTVerificacionPerfil, '<br><br>';
                    }
                }
            }
        }
        else 
            if ($_POST['cbx_tverificacion']==2) {
                
            }
        }
        ?>

    </body>
</html>

