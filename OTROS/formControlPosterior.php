<?php
session_start();
require "../conexionesbd/conexion_mysql.php";

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
          
        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
        
        
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script> 
        
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

        <script>
            function habilitar(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("rptasi").readOnly = false;
                    document.getElementById("rptasi").type = "text";
                    document.getElementById("rptasi").value = "";

                    document.getElementById("idTRRBRegistro").disabled = false;

                } else if (value === "0") {
                    // deshabilitamos                    
                    document.getElementById("rptasi").type = "text";
                    document.getElementById("rptasi").value = "";
                    document.getElementById("rptasi").readOnly = true;

                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTRRBRegistro").value = "0";
                    document.getElementById("idTRRBRegistro").readOnly = true;
                }
            }
        </script>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 390,top = 50');
            }
        </script>

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

        <script type="text/javascript">
            function startTime() {
                today = new Date();
                h = today.getHours();
                m = today.getMinutes();
                s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('reloj').innerHTML = h + ":" + m + ":" + s;
                t = setTimeout('startTime()', 500);
            }
            function checkTime(i)
            {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            window.onload = function () {
                startTime();
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

    </head>
    <body> 

        <DIV id="header">
            <ul class="nav">
                <li><a href="index.php">Inicio</a></li>
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
                                <li><a href="formListarOV.php">Consultas</a></li>
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
            $Oficina_a = utf8_decode($row['OFICINA']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            ?>  
            <br><a href="logout.php">Cerrar Session</a>
        </h4>                
        <br>
        <br>

        <header>
            <h1>CONTROL POSTERIOR</h1>
            <p>ASEGURADOS QUE NO CUMPLEN LA LEY N&ordm; 

                <?php
                echo '';
                ?>

        </header>

        <?php
        $dni = NULL;
        $periodo = NULL;
        $red = NULL;

        if (isset($_POST['buscar'])) {
            $dni = $_POST['dni'];
        }
        $idtusuario = $_SESSION['usuario'];
        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?>            

        <form name="form" action="" method="POST">
            INGRESE EL DNI: <input type="text" name="dni">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <h5>
            DATOS DEL REGISTRO SOLICITADO
        </h5> 
        <form method="post">
            <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">                  

                <?php
                include '../conexionesbd/conexion_oracle.php';
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
                                                FROM V_SCCMDGAT sc 
                                                left join V_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
                                                where sc.dgandid='$dni' and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from V_CUENTA_INDIVIDUAL t where t.NUM_DOCIDE_ASEG='$dni')");

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
                    <input id="i1" type="HIDDEN" name="dgansas" size="50" value="<?php echo $row[0] ?>" readOnly="readOnly">   
                    <td colspan="1" id="td1"><input id="i1" type="text" name="datos" size="50" value="<?php echo $row[1] ?>" readonly> 

                    <th class="especial">
                        DOCUMENTO IDENTIDAD
                    </th>
                    <td colspan="1" id="td1">
                        <a href="#" id="abriPoppup1">
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
                    <div id="dialog1" title="SGVCA" class="contenido">
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
                                            from V_sccmdgat a 
                                            inner join V_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join V_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            left join V_SGAD_HIS_ADSCRIPCION_LOCAL sg on d.DGACUGD=sg.ubigeo 
                                            where a.dgandid='$dni' and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from V_CUENTA_INDIVIDUAL t where t.NUM_DOCIDE_ASEG='$dni')");

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
                                            from V_CUENTA_INDIVIDUAL nn
                                            left join V_CONTRIBUYENTES cc on nn.NUM_DOCIDE_EMPL=cc.NUMRUC
                                            where nn.NUM_DOCIDE_ASEG='$dni' and not nn.COD_TRIBUTO='052101' and not nn.COD_TRIBUTO='052104' and nn.PER_APORTA = 
                                            (select MAX(t.PER_APORTA) from V_CUENTA_INDIVIDUAL t where t.NUM_DOCIDE_ASEG='$dni')");

                oci_execute($queryemp);

                while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {
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
                            <a href="#" id="abriPoppup3">
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
                    <div id="dialog3" title="SGVCA" class="contenido">
                    <iframe src="formEntidades.php?ruc=<?php echo $row[1] ?>" style="width: 100%; height: 100%"></iframe>
                    </div>
                   <?php
                            }
//liberando los recursos
                            oci_free_statement($queryemp);
//$conexion->close()
                            ?> 
            </table>
            <br>  
            
            <?php
                $queryindividos = oci_parse($conexionora, "select
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
                                            from V_sccmdgat a 
                                            inner join V_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join V_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            left join V_SGAD_HIS_ADSCRIPCION_LOCAL sg on d.DGACUGD=sg.ubigeo 
                                            where a.dgandid='$dni' and sg.periodo = 
                                            (select MAX(t.PER_APORTA) from V_CUENTA_INDIVIDUAL t where t.NUM_DOCIDE_ASEG='$dni')");

                oci_execute($queryindividos);

                while ($row = oci_fetch_array($queryindividos, OCI_NUM + OCI_RETURN_NULLS)) {
                    ?> 


            <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">          
                <tr>
                    <th id="th1" scope="row" class="especial" colspan="8">
                        Control Posterior
                    </th>                                               
                </tr>

                <tr>

                    <th class="especial">
                        Estado Actual
                    </th>
                    <td colspan="2" id="td1"> 
                        <?php //echo $fila['EstadoActual'] ?>
                    </td>  
                    <th class="especial">
                        Genera Baja
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['GeneraBaja'] ?>
                    </td>
                    <th class="especial">
                        NIT
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['GeneraBaja'] ?>
                    </td>
                </tr>
                <tr>
                    <th class="especial">
                        Numero Resolucion Registro
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['numResolucionRegistro'] ?>
                    </td>
                    <th class="especial">
                        RRBRegistro
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['RRBRegistro'] ?>
                    </td>
                </tr>
                <tr>
                    <th class="especial">
                        Fecha de Emision Baja de Registro
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['FEmisionBRegistro'] ?>
                    </td>
                    <th class="especial">
                        Fecha Notificacion P Asegurado
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['FNotificacionPAsegurado'] ?>
                    </td>
                </tr>
                <tr>
                    <th class="especial">
                        Fecha Envio Carta a Finanzas Baja Registro
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['FEnvioCFinanzasBRegistro'] ?>
                    </td>
                </tr>
                <tr>
                    <th class="especial">
                        Numero Carta Finanzas Baja Registro
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['numCartaFinanzasBRegistro'] ?>
                    </td>
                </tr>
                <tr>
                    <th class="especial">
                        Observaciones OSPE
                    </th>
                    <td colspan="2" id="td1">                             
                        <?php //echo $fila['obsOSPE'] ?>
                    </td>
                </tr>                    
            </table>
            <input type="submit" name="grabar" value="Grabar" class="btn btn-info"/>
        </form>

        <?php
                            }
//liberando los recursos
                            oci_free_statement($queryindividos);
//$conexion->close()
                            ?>

        <?php
        require_once dirname(__FILE__) . '/PHPWord-master/src/PhpWord/Autoloader.php';
        \PhpOffice\PhpWord\Autoloader::register();

        use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('../SISGASV/doc/ANEXO19.docx');
        $lugar = NULL;
        $fecha_hora_actual = NULL;
        $dias = NULL;
        $periodopago = NULL;
        $dormir = NULL;
        $max = NULL;
        $nfechater = NULL;
        $fecha_hora_actuall = NULL;
        if (isset($_POST['grabar'])) {
            include ('../conexionesbd/conexion_mysql.php');
            $lugar = $_POST['cbx_centroA']; //1
            $datos = $_POST['datos'];
            $dni = $_POST['dni'];
            $idTPersona = $_POST['dgansas'];
            $eempleadora = $_POST['NUMRUC']; //3
            $nombreeempleadora = $_POST['eempleadora'];
            $domicilio = $_POST['domicilio']; //4
            $direempleadora = $_POST['direempleadora']; //5
            $celular = $_POST['celular']; //6

            $respuesta3 = $_POST['respuesta3']; //8                                                    

            $tipodoc = $_POST['tipodoc'];

            //$fijo = $_POST['fijo']; //7
            if (empty($_POST['fijo'])) {
                $fijo = 'NULL';
            } else {
                $fijoo = $_POST['fijo'];
                $fijo = "'$fijoo'";
            }

            if (empty($_POST['rptasi'])) {
                $rptasi = 'NULL';
            } else {
                $rptasii = $_POST['rptasi'];
                $rptasi = "'$rptasii'";
            }

            $tiempolabora = $_POST['tiempolabora']; //10
            // $fechater = $_POST['fechater']; //11
            if (empty($_POST['fechater'])) {
                $fechater = 'NULL';
            } else {
                $fechaterr = $_POST['fechater'];
                $fechater = "'$fechaterr'";
            }
            $monto = $_POST['monto']; //12
            if (!empty($_POST['check1'])) {
                foreach ($_POST['check1'] as $check1) {
                    //  $check0 = $check1;
                    $dias = "$dias, $check1"; //13
                }
            }
            $horariotrabajo = $_POST['horariotrabajo']; //14
            $desclugartrab = $_POST['desclugartrab']; //15
            $familiar1 = $_POST['familiar1']; //16
            $familiar2 = $_POST['familiar2']; //17
            $familiar3 = $_POST['familiar3']; //18
            //$periodopago = $_POST['periodopago']; //19
            if (!empty($_POST['check2'])) {
                foreach ($_POST['check2'] as $check2) {
                    //  $check0 = $check1;
                    $periodopago = "$periodopago, $check2"; //13
                }
            }
            //$dormir = $_POST['dormir']; //20
            if (!empty($_POST['check3'])) {
                foreach ($_POST['check3'] as $check3) {
                    //  $check0 = $check1;
                    $dormir = "$dormir, $check3"; //13
                }
            }
            $constanciapago = $_POST['constanciapago']; //21
            $funcionestrabajo = $_POST['funcionestrabajo']; //22
            $aportes = $_POST['aportes']; //23
            $aporteafponp = $_POST['aporteafponp']; //24
            $descansomedico = $_POST['descansomedico']; //25
            $obs = $_POST['obs']; //26                        
            date_default_timezone_set('America/Bogota');
            $fecha_hora_actualo = date('Y-m-d G:i:s');
            $fecha_hora_actual = "'$fecha_hora_actualo'";
            $fecha = date('Y-m-d');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";

            $queryA = "SELECT max(m.idTMaestra) as max FROM dim_Maestra m";
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

            $query2 = "SELECT a.centroA FROM tipocentroatencion a where a.cas='$lugar'";
            $result2 = $conexionmysql->query($query2);
            if ($conexionmysql->query($query2)) {
                while ($fila1 = $result2->fetch_assoc()) {
                    $centroA = $fila1['centroA'];
                }
            }

            $query = "INSERT INTO dim_entrevista 
                 VALUES ($max, $idOficinaUsuario, $maxx, '$lugar', '245', '$idTPersona', $fecha_hora_actual,'$eempleadora', '$nombreeempleadora','$domicilio','$direempleadora', '$celular', $fijo,
                        $respuesta3,$rptasi,'$tiempolabora',$fechater, '$monto','$dias','$horariotrabajo','$desclugartrab','$familiar1','$familiar2',
                        '$familiar3', '$periodopago','$dormir','$constanciapago','$funcionestrabajo','$aportes','$aporteafponp', '$descansomedico', '$obs',                
                        $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query3 = "INSERT INTO dim_Overificacion 
                 VALUES ($max, $idOficinaUsuario, $maxx, '084', $eempleadora, '$idTPersona', null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query4 = "INSERT INTO dim_cartapverificacion 
                 VALUES ($max, '237', null, null, null, null, null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query5 = "INSERT INTO dim_actacimpedimentodemora 
                 VALUES ($max, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query6 = "INSERT INTO dim_CAOVerificacion 
                 VALUES ($max, '142', null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query7 = "INSERT INTO dim_actaverificacion  
                 VALUES ($max, '026', null, null, null, null, null,null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query8 = "INSERT INTO dim_CNotificacionAA  
                 VALUES ($max, '145', null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            $query9 = "INSERT INTO dim_verificacion 
                 VALUES ($max, $max, $max, $max, $max, $max, $max, $max, null, null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";

            //$query10 = "INSERT INTO dim_Maestra
            //     VALUES ($max, null, null, null, null, null, null, null, $idtusuario, $fecha_hora_actual, $fecha_hora_update)";


            $templateWord->setValue('direempleadora', $direempleadora);
            $templateWord->setValue('idArea', $centroA);
            $templateWord->setValue('date1', $fecha_hora_actual);
            $templateWord->setValue('date2', $fecha);
            $templateWord->setValue('newmax', $newmax);
            $templateWord->setValue('codOficina', $codOficina);
            $templateWord->setValue('datos', $datos);
            $templateWord->setValue('eempleadora', $eempleadora);
            $templateWord->setValue('tipodoc', $tipodoc);
            $templateWord->setValue('dni', $dni);
            $templateWord->setValue('domicilio', $domicilio);
            $templateWord->setValue('nombreeempleadora', $nombreeempleadora);
            $templateWord->setValue('domicilio', $domicilio);
            $templateWord->setValue('celular', $celular);
            $templateWord->setValue('Oficina_a', $Oficina_a);


            if ($fijo == 'NULL') {
                $templateWord->setValue('fijo', '');
            } else {
                $templateWord->setValue('fijo', $fijo);
            }
            //$templateWord->setValue('fijo', $fijo);

            if ($respuesta3 == '1') {
                $nrespuesta3 = 'SI';
            } else {
                if ($respuesta3 == '0') {
                    $nrespuesta3 = 'NO';
                }
            }
            $templateWord->setValue('nrespuesta3', $nrespuesta3);

            if ($rptasi == 'NULL') {
                $templateWord->setValue('rptasi', '');
            } else {
                $templateWord->setValue('rptasi', $rptasi);
            }

            $templateWord->setValue('tiempolabora', $tiempolabora);

            if ($fechater == 'NULL') {
                $templateWord->setValue('fechater', '');
            } else {
                $templateWord->setValue('fechater', $fechater);
            }

            $templateWord->setValue('monto', $monto);
            $templateWord->setValue('horariotrabajo', $horariotrabajo);
            $templateWord->setValue('desclugartrab', $desclugartrab);
            $templateWord->setValue('dias', $dias);
            $templateWord->setValue('familiar1', $familiar1);
            $templateWord->setValue('familiar2', $familiar2);
            $templateWord->setValue('familiar3', $familiar3);
            $templateWord->setValue('periodopago', $periodopago);
            $templateWord->setValue('dormir', $dormir);
            $templateWord->setValue('constanciapago', $constanciapago);
            $templateWord->setValue('funcionestrabajo', $funcionestrabajo);
            $templateWord->setValue('aportes', $aportes);
            $templateWord->setValue('aporteafponp', $aporteafponp);
            $templateWord->setValue('descansomedico', $descansomedico);
            $templateWord->setValue('obs', $obs);

// --- Guardamos el documento
//header("Content-Disposition: attachment; filename=Documento1.docx; charset=iso-8859-1");

            if ($conexionmysql->query($query)) {
                if ($conexionmysql->query($query3)) {
                    if ($conexionmysql->query($query4)) {
                        if ($conexionmysql->query($query5)) {
                            if ($conexionmysql->query($query6)) {
                                if ($conexionmysql->query($query7)) {
                                    if ($conexionmysql->query($query8)) {
                                        if ($conexionmysql->query($query9)) {
                                            //if ($conexionmysql->query($query10)) {
                                            echo '<div class="alert alert-success">Se grabo Correctamente</div>';
                                            $templateWord->saveAs('Documento1.docx');
                                            echo '<a href="../SISGASV/Documento1.docx">DESCARGAR ARCHIVO WORD</a><br><br>';
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
                ECHO $max, '<br>';
                echo $newmax, '<br>';
                echo $datos, '<br>';
                echo $lugar, '<br>';
                echo $centroA, '<br>';
                ECHO 'NULL', '<br>';
                echo $idTPersona, '<br>';
                echo $fecha_hora_actual, '<br>';
                echo $eempleadora, '<br>';
                echo $domicilio, '<br>';
                echo $direempleadora, '<br>';
                echo $celular, '<br>';
                echo 'fijo: ', $fijo, '<br>';
                echo $respuesta3, '<br>';
                echo $rptasi, '<br>';
                echo $tiempolabora, '<br>';
                echo $fechater, '<br>';
                echo $monto, '<br>';
                echo $dias, '<br>';
                echo $horariotrabajo, '<br>';
                echo $desclugartrab, '<br>';
                echo $familiar1, '<br>';
                echo $familiar2, '<br>';
                echo $familiar3, '<br>';
                echo $periodopago, '<br>';
                echo $dormir, '<br>';
                echo $constanciapago, '<br>';
                echo $funcionestrabajo, '<br>';
                echo $aportes, '<br>';
                echo $aporteafponp, '<br>';
                echo $descansomedico, '<br>';
                echo $obs, '<br>';
                echo $idtusuario, '<br>';
                echo $codOficina, '<br>';
                echo $fecha_hora_actual, '<br>';
                echo $fecha_hora_update, '<br>';
            }
        }
        ?>
    </body>
</html>





