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
        <link rel="stylesheet" href="../SISGASV/include/bootstrapform.css" media="screen">

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>   
        <!-- <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> -->
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>

        <script type='text/javascript'>
            $(document).ready(function () {
                $('#loading').css("display", "none");
            });

            $(".load").click(function (event) {
                $('#loading').css("display", "block");
            });
        </script>

        <style type="text/css">
            /*programando con css*/
            body {
                background-image: url("imagenes/fondo2.jpg");
                background-repeat: repeat-x;
                background-attachment: fixed;
                font-size: 10px;
            }

            #td1 {
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
                font-size:10px;
            }

            th {
                font-family:Arial, sans-serif;
                font-size:11px;
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
                font-size:11px;
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
                vertical-align: left;
            }

            @media screen and (max-width: 767px) {
                .tg {width: auto !important;}
                .tg col {width: auto !important;}
                .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
            }

            #i1 {
                border: 0;
            }

            header {
                background-color: #0685C4;
                color: #ffffff;
                padding: 25px;
                margin-bottom: 20px;
                margin: auto;
                width: 500px;
                font-family: Arial, Helvetica, sans-serif;
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

            .size{
                width: auto;
                text-align: center;
                font-weight: bold;
                font-size: 0.675em;
            }

            .size2{
                width: auto;
                text-align: center;                
                font-size: 0.25em;
            }

            .sizetexto{
                text-align: center;
                width: 200px;
                font-weight: bold;
                font-size: 0.675em;
            }

            .sizetexto2{
                text-align: center;
                font-size: 0.675em;
            }

            .sizeperiodos{
                text-align: center;
                width: 220px;
            }

            #div1 {
                overflow:scroll;
                height:300px;
                width:auto;
                padding:10px;
                box-shadow:0px 10px 25px rgba(0,0,0,0.3);
                margin-top:5px;
            }

            #div2 {
                overflow:scroll;                
                width:auto;
            }

            #div1 table {
                width:500px;
                background-color:lightgray;
            }

            .con_estilos {
                width: auto;
                padding: 5px;
                font-size: 10px;
                border: 1px solid #ccc;
                height: 26px;                
            }

            * {
                padding: 0px;
                margin: 0px;
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

            .formleyenda{
                font-size: 12px;
                padding:2px;

            }

            .contieneportafolio {
                border:1px solid #ccc;
                margin:2px 5px 5px 5px;
                padding:2px;
                width:500px;
            }

            .button1 {
                border-radius: 8px;
                padding: 10px 10px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                background-color: white; 
                color: black; 
                border: 2px solid #008CBA;
            }

            .button1:hover {
                background-color: #008CBA;
                color: white;
            }

            #h55 {
                font-weight: bold; 
            }
            
            #h56 {
                font-size: 10px;
            }


        </style>


        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
            }
        </script>

        <script>
            $(function () {
<?php
for ($i = 0; $i <= 100; $i++) {
    ?>
                    $("#dialog<?php echo $i ?>").hide();
                    function abrir<?php echo $i ?>() {
                        $("#dialog<?php echo $i ?>").show();
                        $("#dialog<?php echo $i ?>").dialog({
                            resizable: true,
                            width: 1000,
                            height: 750,
                            modal: true,
                        });
                    }
                    $("#abriPoppup<?php echo $i ?>").click(
                            function () {
                                abrir<?php echo $i ?>();
                            });
                    $("#dialogo<?php echo $i ?>").hide();
                    function abriro<?php echo $i ?>() {
                        $("#dialogo<?php echo $i ?>").show();
                        $("#dialogo<?php echo $i ?>").dialog({
                            resizable: true,
                            height: 900,
                            width: 1300,
                            modal: true,
                        });
                    }
                    $("#abriPoppupo<?php echo $i ?>").click(
                            function () {
                                abriro<?php echo $i ?>();
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
            })
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

        <script language="javascript">
            $(document).ready(function () {
                $("#cbx_ano").change(function () {

                    //$('#cbx_OficinaAA').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

                    $("#cbx_ano option:selected").each(function () {
                        ano = $(this).val();
                        $.post("include/getFecha.php", {ano: ano}, function (data) {
                            $("#cbx_estadoActual").html(data);
                        });
                    });
                });
            });
        </script>

    </head>
    <body> 

        <div id="header">
            <ul class="nav">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a href="formFyConsentidas.php">REGISTRO FIRMES Y CONSENTIDAS</a>

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
            echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni'] . '-' . utf8_decode($row['oficina']));
            echo '<BR>UCF: ' . utf8_decode($row['codOficina']) . '-' . utf8_decode($row['oficina']);
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

        <div class="contieneportafolio">
            <fieldset>
                <legend><h5 id="h55">PRIMERA BUSQUEDA</h5></legend>
                <form action="" method="post">   
                    <table width="450">
                        <tr>
                            <td>
                                <?PHP
                                include './conexionesbd/conexion_mysql.php';
                                $query1 = "SELECT distinct(substr(f.fCreacion,1,4)) ano FROM dim_cposterior f";
                                $resultado1 = $conexionmysql->query($query1);
                                ?>

                                <div class="formleyenda">
                                    <label>SELECCIONE EL AÑO DE BAJA REGISTRO</label>
                                    <select name="cbx_ano" id="cbx_ano">
                                        <option value="*">AÑO</option>
                                        <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['ano']; ?>"><?php echo $row['ano']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group has-success has-feedback">
                                    <label for="meses"> Indique los Meses que se desea Buscar</label>
                                    <br>
                                    <table>                                       
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="enero" value="01"> ENERO
                                                </label>
                                            </td>  
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="febrero" value="02"> FEBRERO
                                                </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="marzo" value="03"> MARZO
                                                </label>    
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="abril" value="04"> ABRIL
                                                </label> 
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="mayo" value="05"> MAYO
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="junio" value="06"> JUNIO
                                                </label>  

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="julio" value="07"> JULIO
                                                </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="agosto" value="08"> AGOSTO
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="setiembre" value="09"> SETIEMBRE
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="octubre" value="10"> OCTUBRE
                                                </label> 
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="noviembre" value="11"> NOVIEMBRE
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="diciembre" value="12"> DICIEMBRE
                                                </label>  
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="formleyenda">
                                    <label>SELECCIONE EL TIPO DE PROCESO</label>
                                    <select name="cbx_estadoActual" id="cbx_estadoActual" required=""></select>
                                    <?PHP
                                    ?>
                                </div>
                               
                            </td>       
                            <td align="justify">
                                <button type="submit" class="button button1">Filtrar Periodo</button>         
                            </td>
                        </tr>                    
                    </table>
                </form>
            </fieldset>
        </div>
        
        <div style="clear:both"></div>        
        <br>
        
        <div class="contieneportafolio">
            <fieldset>
                <legend><h5 id="h55">SEGUNDA BUSQUEDA</h5>
                    
                    <h6 id="h56">
                        BUSQUEDA SOLO TERMINADOS
                    </h6>
                </legend>
                <form action="" method="post">   
                    <table width="450">
                        <tr>
                            <td>
                                <?PHP
                                include './conexionesbd/conexion_mysql.php';
                                $query2 = "SELECT distinct(substr(f.fCreacionTerminado,1,4)) ano_t FROM dim_cposterior f where f.fCreacionTerminado is not null;";
                                $resultado2 = $conexionmysql->query($query2);
                                ?>

                                <div class="formleyenda">
                                    <label>SELECCIONE EL AÑO DE BAJA REGISTRO</label>
                                    <select name="cbx_ano_t" id="cbx_ano_t">
                                        <option value="*">AÑO</option>
                                        <?php while ($row = $resultado2->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['ano_t']; ?>"><?php echo $row['ano_t']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group has-success has-feedback">
                                    <label for="meses"> Indique los Meses que se desea Buscar</label>
                                    <br>
                                    <table>                                       
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="enero" value="01"> ENERO
                                                </label>
                                            </td>  
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="febrero" value="02"> FEBRERO
                                                </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="marzo" value="03"> MARZO
                                                </label>    
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="abril" value="04"> ABRIL
                                                </label> 
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="mayo" value="05"> MAYO
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="junio" value="06"> JUNIO
                                                </label>  

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="julio" value="07"> JULIO
                                                </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="agosto" value="08"> AGOSTO
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="setiembre" value="09"> SETIEMBRE
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="octubre" value="10"> OCTUBRE
                                                </label> 
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="noviembre" value="11"> NOVIEMBRE
                                                </label>  
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="diciembre" value="12"> DICIEMBRE
                                                </label>  
                                            </td>
                                        </tr>
                                    </table>
                                </div>                                
                                
                            </td>       
                            <td align="justify">
                                <button type="submit" class="button button1">Filtrar Periodo</button>         
                            </td>
                        </tr>                    
                    </table>
                </form>
            </fieldset>
        </div>


        <div style="clear:both"></div>        
        <br>

        <div class="contieneportafolio">
            <fieldset>
                <legend><h5 id="h55">TERCERA BUSQUEDA</h5></legend>
                <table width="500">
                    <tr>
                        <td>
                            <section>
                                <div class="form-group" id="contieneportafolio">
                                    <form action="" method="post">
                                        <div class="formleyenda">INGRESE DNI</div>
                                        <input type="text" name="cbx_dni" id="cbx_dni" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                                    event.returnValue = false;" maxlength="11" required="">
                                        <button type="submit" class="button button1">Filtro 1</button>             
                                    </form>
                                </div>
                                <div class="form-group" id="contieneportafolio">
                                    <form action="" method="post">
                                        <div class="formleyenda">INGRESE RUC</div>
                                        <input type="text" name="cbx_ruc" id="cbx_ruc" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                                    event.returnValue = false;" maxlength="11" required="">
                                        <button type="submit" class="button button1">Filtro 2</button>        
                                    </form>
                                </div>
                            </section>

                            <div style="clear:both"></div>
                            <br>


                        </td>
                        <td>
                            <section>
                                <div class="form-group" id="contieneportafolio">
                                    <form action="" method="post">
                                        <div class="formleyenda">INGRESE RUC</div>
                                        <input type="text" name="cbx_ruc" id="cbx_ruc" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                                    event.returnValue = false;" maxlength="11" required="">
                                        <button type="submit" class="button button1">Filtro 2</button>        
                                    </form>
                                </div>
                            </section> 
                            <div style="clear:both"></div>
                            <br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>



        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h4>
                        </div>
                        <div class="table-responsive">
                            <h5>Datos Distribuidos a nivel Nacional dirigido a cada OSPE.
                            </h5>                           
                            <div id="div1" align="center">  
                                <table id="t1" border="1" class="table table-hover table-bordered table-condensed table-striped table-fixed">
                                    <tr>
                                        <td><div class="size">OFICINA</div></td>
                                        <td><div class="size">VERIFICACION</div></td>
                                        <td><div class="size">TIPO DE VERIFICACION</div></td>
                                        <td><div class="size">ESTADO ACTUAL</div></td>
                                        <td><div class="size">GENERA BAJA <br>REGISTRO</div></td>
                                     <!--   <th><div class="size">TIPO DE BAJA <br>DE REGISTRO</div></th>
    
                                        <th><div class="sizetexto">NIT</div></th>
                                        <th><div class="size">FECHA EMISION DE BAJA REGISTRO</div></th>
                                        -->
                                        <td><div class="sizetexto">Nº RESOLUCION DE BAJA REGISTRO</div></td>
                                        <!--
                                           <th><div class="size">FECHA DE NOTIFICACION DE BAJA REGISTRO</div></th>
                                           <th><div class="sizetexto">RESPUESTA DE LA BAJA DE REGISTRO</div></th>
    
                                           <th><div class="size">FECHA CARTA A FINANZA</div></th>
                                           <th><div class="size">NUMERO CARTA A FINANZA</div></th>
                                           <th><div class="size">CORREO</div></th>
                                           <th><div class="size">FECHA DE CORREO</div></th>        -->

                                        <td><div class="size">RUC</div></td>


                                        <td><div class="sizetexto">RAZON SOCIAL</div></td>


                                <!--        <th><div class="sizetexto">DEPARTAMENTO EMPRESA</div></th>
                                        <th><div class="sizetexto">PROVINCIA EMPRESA</div></th>
                                        <th><div class="sizetexto">DISTRITO EMPRESA</div></th>
                                        <th><div class="sizetexto">DIRECCION EMPRESA</div></th>     -->
                                        <td><div class="size">DNI_TITULAR</div></td>

                                        <td><div class="sizetexto">APELLIDOS Y NOMBRES</div></td>
                                <!--        <th><div class="sizetexto">RED ASISTENCIAL TITULAR</div></th> 
    
                                        <th><div class="size">INICIO 1º PERIODO A CALIFICAR</div></th>
                                        <th><div class="size">FIN DEL 1º PERIODO A CALIFICAR</div></th>
    
                                        <th><div class="size">INICIO 2º PERIODO A CALIFICAR</div></th>
                                        <th><div class="size">FIN DEL 2º PERIODO A CALIFICAR</div></th>
    
                                        <th><div class="size">INICIO 3º PERIODO A CALIFICAR</div></th>
                                        <th><div class="size">FIN DEL 3º PERIODO A CALIFICAR</div></th>                                        
    
                                        <th><div class="size">INICIO 4º PERIODO A CALIFICAR</div></th>
                                        <th><div class="size">FIN DEL 4º PERIODO A CALIFICAR</div></th>                                        
    
                                        <th><div class="size">INICIO 5º PERIODO A CALIFICAR</div></th>--> 
                                        <td><div class="size">NOMBRE DEL PDF</div></td>                                       

                                        <td><div class="sizetexto">OBSERVACIONES</div></td>
                                    </tr>
                                    
                                    <?php
                                    if (isset($_POST['cbx_estadoActual'])) {
                                        $cbx_estadoActual = $_POST['cbx_estadoActual'];
                                        $ano = $_POST['cbx_ano'];

                                        if (empty($_POST['enero'])) {
                                            $enero = 'NULL';
                                        } else {
                                            $eneroo = $_POST['enero'];
                                            $enero = "'$eneroo'";
                                        }

                                        if (empty($_POST['febrero'])) {
                                            $febrero = 'NULL';
                                        } else {
                                            $febreroo = $_POST['febrero'];
                                            $febrero = "'$febreroo'";
                                        }

                                        if (empty($_POST['marzo'])) {
                                            $marzo = 'NULL';
                                        } else {
                                            $marzoo = $_POST['marzo'];
                                            $marzo = "'$marzoo'";
                                        }

                                        if (empty($_POST['abril'])) {
                                            $abril = 'NULL';
                                        } else {
                                            $abrill = $_POST['abril'];
                                            $abril = "'$abrill'";
                                        }

                                        if (empty($_POST['mayo'])) {
                                            $mayo = 'NULL';
                                        } else {
                                            $mayoo = $_POST['mayo'];
                                            $mayo = "'$mayoo'";
                                        }

                                        if (empty($_POST['junio'])) {
                                            $junio = 'NULL';
                                        } else {
                                            $junioo = $_POST['junio'];
                                            $junio = "'$junioo'";
                                        }

                                        if (empty($_POST['julio'])) {
                                            $julio = 'NULL';
                                        } else {
                                            $julioo = $_POST['julio'];
                                            $julio = "'$julioo'";
                                        }

                                        if (empty($_POST['agosto'])) {
                                            $agosto = 'NULL';
                                        } else {
                                            $agostoo = $_POST['agosto'];
                                            $agosto = "'$agostoo'";
                                        }

                                        if (empty($_POST['setiembre'])) {
                                            $setiembre = 'NULL';
                                        } else {
                                            $setiembree = $_POST['setiembre'];
                                            $setiembre = "'$setiembree'";
                                        }

                                        if (empty($_POST['octubre'])) {
                                            $octubre = 'NULL';
                                        } else {
                                            $octubree = $_POST['octubre'];
                                            $octubre = "'$octubree'";
                                        }

                                        if (empty($_POST['noviembre'])) {
                                            $noviembre = 'NULL';
                                        } else {
                                            $noviembree = $_POST['noviembre'];
                                            $noviembre = "'$noviembree'";
                                        }

                                        if (empty($_POST['diciembre'])) {
                                            $diciembre = 'NULL';
                                        } else {
                                            $diciembree = $_POST['diciembre'];
                                            $diciembre = "'$diciembree'";
                                        }



                                        //$dni = 0;
                                        //if (isset($_POST['buscar'])) {
                                        //    $dni = $_POST['dni'];
                                        //}
                                        //incluir el archivo de conexion
                                        include './conexionesbd/conexion_mysql.php';
                                        //realizando una consulta usando la clausula select

                                        $query = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    tp.Verificacion, 
                                                    tpf.VerificacionPerfil, 
                                                    tea.EstadoActual,  
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
                                                    case 
                                                    when cp.idTGeneraBaja='1' then 'SI'
                                                    when cp.idTGeneraBaja='2' then 'NO'
                                                    when cp.idTGeneraBaja='4' then '--'
                                                    end as GeneraBaja,                     
                                                    ai.RUC, ai.nomEmpresa,                                                     
                                                    ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
                                                    pc.InicioPCalificar1, pc.FinPCalificar1,  
                                                    pc.InicioPCalificar2, pc.FinPCalificar2, 
                                                    pc.InicioPCalificar3, pc.FinPCalificar3, 
                                                    pc.InicioPCalificar4, pc.FinPCalificar4, 
                                                    pc.InicioPCalificar5, pc.FinPCalificar5, 
                                                    cp.observaciones
                                                    FROM dim_cposterior cp
                                                    left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                                    left join dim_pacalificar pc on cp.iddim_CPosterior=pc.iddim_CPosterior
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where month(cp.fCreacion) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
                                                    year(cp.fCreacion)='$ano' 
                                                    and tea.idTEstadoActual='$cbx_estadoActual' 
                                                    and ai.idDIM_Oficina='$idOficinaUsuario'
                                                    order by cp.iddim_CPosterior ASC";

//Obteniendo el conjunto de resultados
                                        $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
                                        $i = 0;
                                        if ($conexionmysql->query($query)) {
                                            while ($fila = $result->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><div class="size2"><?php echo $fila['OFICINA'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['Verificacion'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['VerificacionPerfil'] ?></div></td>


                                                    <td><div class="size2"><?php echo $fila['EstadoActual'] ?></div></td>

                                                                                                                                                                                           <!--         <td>
                                                                                                                                                                                                        <a href="#" id="abriPoppup<//?php echo $i ?>"><//?php echo $fila['EstadoActual'] ?>
                                                                                                                                                                                                        </a>

                                                                                                                                                                                                        <div id="dialog<//?php echo $i ?>" title="SGVCA" class="contenido">
                                                                                                                                                                                                            <iframe src="formEditarCPosterior.php?iddim_CPosterior=<//?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </td> 
                                                    -->

                                                    <td><div class="size2"><?php echo $fila['GeneraBaja'] ?></div></td> 
                                                    <td><div class="size2"><?php echo $fila['nResBRegistro'] ?></div></td>
                                                   <!--      <td><//?php echo $fila['idTRRBRegistro'] ?></td>

                                                    <td><//?php echo $fila['nit'] ?></td>
                                               <td><//?php echo $fila['femisionBRegistro'] ?></td>
                                                    <td class="success"><//?php echo $fila['nResBRegistro'] ?></td>                                
                                                    <td><//?php echo $fila['fnotificacionBRegistro'] ?></td>
                                                    <td><//?php echo $fila['respuestaBRegistro'] ?></td>

                                                    <td><//?php echo $fila['fecartafinanza'] ?></td>
                                                    <td><//?php echo $fila['ncartafinanza'] ?></td>
                                                    <td><//?php echo $fila['correo'] ?></td>                                
                                                    <td><//?php echo $fila['fcorreo'] ?></td>  -->                                              
                                                    <td><div class="size2"><?php echo $fila['RUC'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['nomEmpresa'] ?></div></td>                                                  
                                                    <td><div class="size2"><?php echo $fila['dni_t'] ?></div></td> 
                                                    <td><div class="size2"><?php echo $fila['nombres'] ?></div></td>
                                                   <!-- <td><//?php echo $fila['RED_ASISTENCIAL_t'] ?></td>

                                                    <td><//?php echo $fila['InicioPCalificar1'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar1'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar2'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar2'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar3'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar3'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar4'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar4'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar5'] ?></td>    -->                              
                                                    <td><div class="size2"><?php echo $fila['nombrePDF'] ?></div></td>                                              

                                                    <td><div class="size2"><?php echo $fila['observaciones'] ?></div></td>                                

                                                </tr>

                                            <?php } ?>


                                            <?php
                                        } else {
                                            echo 'Error al cargar';
                                        }//liberando los recursos
                                        $result->free();
                                    }
                                    ?>

                                    <?php
                                    if (isset($_POST['cbx_ano_t'])) {
                                        
                                        $ano = $_POST['cbx_ano_t'];

                                        if (empty($_POST['enero'])) {
                                            $enero = 'NULL';
                                        } else {
                                            $eneroo = $_POST['enero'];
                                            $enero = "'$eneroo'";
                                        }

                                        if (empty($_POST['febrero'])) {
                                            $febrero = 'NULL';
                                        } else {
                                            $febreroo = $_POST['febrero'];
                                            $febrero = "'$febreroo'";
                                        }

                                        if (empty($_POST['marzo'])) {
                                            $marzo = 'NULL';
                                        } else {
                                            $marzoo = $_POST['marzo'];
                                            $marzo = "'$marzoo'";
                                        }

                                        if (empty($_POST['abril'])) {
                                            $abril = 'NULL';
                                        } else {
                                            $abrill = $_POST['abril'];
                                            $abril = "'$abrill'";
                                        }

                                        if (empty($_POST['mayo'])) {
                                            $mayo = 'NULL';
                                        } else {
                                            $mayoo = $_POST['mayo'];
                                            $mayo = "'$mayoo'";
                                        }

                                        if (empty($_POST['junio'])) {
                                            $junio = 'NULL';
                                        } else {
                                            $junioo = $_POST['junio'];
                                            $junio = "'$junioo'";
                                        }

                                        if (empty($_POST['julio'])) {
                                            $julio = 'NULL';
                                        } else {
                                            $julioo = $_POST['julio'];
                                            $julio = "'$julioo'";
                                        }

                                        if (empty($_POST['agosto'])) {
                                            $agosto = 'NULL';
                                        } else {
                                            $agostoo = $_POST['agosto'];
                                            $agosto = "'$agostoo'";
                                        }

                                        if (empty($_POST['setiembre'])) {
                                            $setiembre = 'NULL';
                                        } else {
                                            $setiembree = $_POST['setiembre'];
                                            $setiembre = "'$setiembree'";
                                        }

                                        if (empty($_POST['octubre'])) {
                                            $octubre = 'NULL';
                                        } else {
                                            $octubree = $_POST['octubre'];
                                            $octubre = "'$octubree'";
                                        }

                                        if (empty($_POST['noviembre'])) {
                                            $noviembre = 'NULL';
                                        } else {
                                            $noviembree = $_POST['noviembre'];
                                            $noviembre = "'$noviembree'";
                                        }

                                        if (empty($_POST['diciembre'])) {
                                            $diciembre = 'NULL';
                                        } else {
                                            $diciembree = $_POST['diciembre'];
                                            $diciembre = "'$diciembree'";
                                        }



                                        //$dni = 0;
                                        //if (isset($_POST['buscar'])) {
                                        //    $dni = $_POST['dni'];
                                        //}
                                        //incluir el archivo de conexion
                                        include './conexionesbd/conexion_mysql.php';
                                        //realizando una consulta usando la clausula select

                                        $query = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    tp.Verificacion, 
                                                    tpf.VerificacionPerfil, 
                                                    tea.EstadoActual,  
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
                                                    case 
                                                    when cp.idTGeneraBaja='1' then 'SI'
                                                    when cp.idTGeneraBaja='2' then 'NO'
                                                    when cp.idTGeneraBaja='4' then '--'
                                                    end as GeneraBaja,                     
                                                    ai.RUC, ai.nomEmpresa,                                                     
                                                    ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
                                                    pc.InicioPCalificar1, pc.FinPCalificar1,  
                                                    pc.InicioPCalificar2, pc.FinPCalificar2, 
                                                    pc.InicioPCalificar3, pc.FinPCalificar3, 
                                                    pc.InicioPCalificar4, pc.FinPCalificar4, 
                                                    pc.InicioPCalificar5, pc.FinPCalificar5, 
                                                    cp.observaciones
                                                    FROM dim_cposterior cp
                                                    left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                                    left join dim_pacalificar pc on cp.iddim_CPosterior=pc.iddim_CPosterior
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where month(cp.fCreacion) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
                                                    year(cp.fCreacion)='$ano' 
                                                    and tea.idTEstadoActual='03' 
                                                    and ai.idDIM_Oficina='$idOficinaUsuario'
                                                    order by cp.iddim_CPosterior ASC";

//Obteniendo el conjunto de resultados
                                        $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
                                        $i = 0;
                                        if ($conexionmysql->query($query)) {
                                            while ($fila = $result->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><div class="size2"><?php echo $fila['OFICINA'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['Verificacion'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['VerificacionPerfil'] ?></div></td>


                                                    <td><div class="size2"><?php echo $fila['EstadoActual'] ?></div></td>

                                                                                                                                                                                           <!--         <td>
                                                                                                                                                                                                        <a href="#" id="abriPoppup<//?php echo $i ?>"><//?php echo $fila['EstadoActual'] ?>
                                                                                                                                                                                                        </a>

                                                                                                                                                                                                        <div id="dialog<//?php echo $i ?>" title="SGVCA" class="contenido">
                                                                                                                                                                                                            <iframe src="formEditarCPosterior.php?iddim_CPosterior=<//?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </td> 
                                                    -->

                                                    <td><div class="size2"><?php echo $fila['GeneraBaja'] ?></div></td> 
                                                    <td><div class="size2"><?php echo $fila['nResBRegistro'] ?></div></td>
                                                   <!--      <td><//?php echo $fila['idTRRBRegistro'] ?></td>

                                                    <td><//?php echo $fila['nit'] ?></td>
                                               <td><//?php echo $fila['femisionBRegistro'] ?></td>
                                                    <td class="success"><//?php echo $fila['nResBRegistro'] ?></td>                                
                                                    <td><//?php echo $fila['fnotificacionBRegistro'] ?></td>
                                                    <td><//?php echo $fila['respuestaBRegistro'] ?></td>

                                                    <td><//?php echo $fila['fecartafinanza'] ?></td>
                                                    <td><//?php echo $fila['ncartafinanza'] ?></td>
                                                    <td><//?php echo $fila['correo'] ?></td>                                
                                                    <td><//?php echo $fila['fcorreo'] ?></td>  -->                                              
                                                    <td><div class="size2"><?php echo $fila['RUC'] ?></div></td>
                                                    <td><div class="size2"><?php echo $fila['nomEmpresa'] ?></div></td>                                                  
                                                    <td><div class="size2"><?php echo $fila['dni_t'] ?></div></td> 
                                                    <td><div class="size2"><?php echo $fila['nombres'] ?></div></td>
                                                   <!-- <td><//?php echo $fila['RED_ASISTENCIAL_t'] ?></td>

                                                    <td><//?php echo $fila['InicioPCalificar1'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar1'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar2'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar2'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar3'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar3'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar4'] ?></td>                                
                                                    <td><//?php echo $fila['FinPCalificar4'] ?></td>                                                

                                                    <td><//?php echo $fila['InicioPCalificar5'] ?></td>    -->                              
                                                    <td><div class="size2"><?php echo $fila['nombrePDF'] ?></div></td>                                              

                                                    <td><div class="size2"><?php echo $fila['observaciones'] ?></div></td>                                

                                                </tr>

                                            <?php } ?>


                                            <?php
                                        } else {
                                            echo 'Error al cargar';
                                        }//liberando los recursos
                                        $result->free();
                                    }
                                    ?>  

                                    <?php
                                    if (isset($_POST['cbx_dni'])) {
                                        $cbx_dni = $_POST['cbx_dni'];

                                        //$dni = 0;
                                        //if (isset($_POST['buscar'])) {
                                        //    $dni = $_POST['dni'];
                                        //}
                                        //incluir el archivo de conexion
                                        include './conexionesbd/conexion_mysql.php';
                                        //realizando una consulta usando la clausula select

                                        $query2 = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    tp.Verificacion, 
                                                    tpf.VerificacionPerfil, 
                                                    tea.EstadoActual,
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
                                                    case 
                                                    when cp.idTGeneraBaja='1' then 'SI'
                                                    when cp.idTGeneraBaja='2' then 'NO'
                                                    when cp.idTGeneraBaja='4' then '--'
                                                    end as GeneraBaja,                     
                                                    ai.RUC, ai.nomEmpresa,                                                     
                                                    ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
                                                    pc.InicioPCalificar1, pc.FinPCalificar1,  
                                                    pc.InicioPCalificar2, pc.FinPCalificar2, 
                                                    pc.InicioPCalificar3, pc.FinPCalificar3, 
                                                    pc.InicioPCalificar4, pc.FinPCalificar4, 
                                                    pc.InicioPCalificar5, pc.FinPCalificar5, 
                                                    cp.observaciones
                                                    FROM dim_cposterior cp
                                                    left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                                    left join dim_pacalificar pc on cp.iddim_CPosterior=pc.iddim_CPosterior
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where ai.dni_t='$cbx_dni' and ai.idDIM_Oficina='$idOficinaUsuario'
                                                    order by cp.iddim_CPosterior ASC";

//Obteniendo el conjunto de resultados
                                        $result2 = $conexionmysql->query($query2);
//recorriendo el conjunto de resultados con un bucle
                                        $i = 0;
                                        if ($conexionmysql->query($query2)) {
                                            while ($fila2 = $result2->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $fila2['OFICINA'] ?></td>
                                                    <td><?php echo $fila2['Verificacion'] ?></td>
                                                    <td><?php echo $fila2['VerificacionPerfil'] ?></td>    


                                                    <td>
                                                        <a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila2['EstadoActual'] ?>
                                                        </a>

                                                        <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
                                                            <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila2['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                        </div>
                                                    </td> 



                                                    <td><?php echo $fila2['GeneraBaja'] ?></td> 
                                                    <td><?php echo $fila2['nResBRegistro'] ?></td>
                                                 <!--    <td><//?php echo $fila2['idTRRBRegistro'] ?></td>

                                                    <td><//?php echo $fila2['nit'] ?></td>
                                                   <td><//?php echo $fila['femisionBRegistro'] ?></td>
                                                    <td class="success"><//?php echo $fila['nResBRegistro'] ?></td>                                
                                                    <td><//?php echo $fila['fnotificacionBRegistro'] ?></td>
                                                    <td><//?php echo $fila['respuestaBRegistro'] ?></td>

                                                    <td><//?php echo $fila['fecartafinanza'] ?></td>
                                                    <td><//?php echo $fila['ncartafinanza'] ?></td>
                                                    <td><//?php echo $fila['correo'] ?></td>                                
                                                    <td><//?php echo $fila['fcorreo'] ?></td>  -->                                              
                                                    <td><?php echo $fila2['RUC'] ?></td>

                                                                                                                                                                                                                                                                                                                                                            <!-- <td><//?php echo $fila2['dni_empresa'] ?></td>      -->                          
                                                    <td><?php echo $fila2['nomEmpresa'] ?></td>
                                                   <!--< <td><//?php echo $fila2['descripcionContribuyente'] ?></td>
                                                    <td><//?php echo $fila2['condicion'] ?></td>
                                                    <td><//?php echo $fila2['estado'] ?></td>

                                                                                        td><//?php echo $fila['DEPARTAMENT_emp'] ?></td>
                                                                                        <td><//?php echo $fila['PROVINCIA_emp'] ?></td>
                                                                                        <td><//?php echo $fila['DISTRITO_emp'] ?></td>
                                                                                        <td><//?php echo $fila['DIRECCION_emp'] ?></td> -->   

                                                    <td>
                                                        <a href="#" id="abriPoppupo<?php echo $i ?>"><?php echo $fila2['dni_t'] ?>
                                                        </a>
                                                    </td>

                                                <div id="dialogo<?php echo $i ?>" title="SGVCA" class="contenido">
                                                    <iframe src="formControlPosteriorAsegurados.php?dni=<?php echo $fila2['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                </div>  
                                              <!--   <td><?//php echo $fila2['dni_t'] ?></td>-->  

                                                <td><?php echo $fila2['nombres'] ?></td>
                                               <!-- <td><//?php echo $fila['RED_ASISTENCIAL_t'] ?></td>

                                                <td><//?php echo $fila2['InicioPCalificar1'] ?></td>                                
                                                <td><//?php echo $fila2['FinPCalificar1'] ?></td>                                                

                                                <td><//?php echo $fila2['InicioPCalificar2'] ?></td>                                
                                                <td><//?php echo $fila2['FinPCalificar2'] ?></td>                                                

                                                <td><//?php echo $fila2['InicioPCalificar3'] ?></td>                                
                                                <td><//?php echo $fila2['FinPCalificar3'] ?></td>                                                

                                                <td><//?php echo $fila2['InicioPCalificar4'] ?></td>                                
                                                <td><//?php echo $fila2['FinPCalificar4'] ?></td>                                                

                                                <td><//?php echo $fila2['InicioPCalificar5'] ?></td> -->                               
                                                <td><?php echo $fila2['nombrePDF'] ?></td>                                                

                                                <td><?php echo $fila2['observaciones'] ?></td>                                

                                                </tr>

                                            <?php } ?>


                                            <?php
                                        } else {
                                            echo 'Error al cargar';
                                        }
//liberando los recursos
                                        $result2->free();
                                    } else {
                                        if (isset($_POST['cbx_ruc'])) {
                                            $cbx_ruc = $_POST['cbx_ruc'];

                                            //$dni = 0;
                                            //if (isset($_POST['buscar'])) {
                                            //    $dni = $_POST['dni'];
                                            //}
                                            //incluir el archivo de conexion
                                            include './conexionesbd/conexion_mysql.php';
                                            //realizando una consulta usando la clausula select

                                            $query3 = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    tp.Verificacion, 
                                                    tpf.VerificacionPerfil, 
                                                    tea.EstadoActual, 
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
                                                    case 
                                                    when cp.idTGeneraBaja='1' then 'SI'
                                                    when cp.idTGeneraBaja='2' then 'NO'
                                                    when cp.idTGeneraBaja='4' then '--'
                                                    end as GeneraBaja,                     
                                                    ai.RUC, ai.nomEmpresa,                                                     
                                                    ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
                                                    pc.InicioPCalificar1, pc.FinPCalificar1,  
                                                    pc.InicioPCalificar2, pc.FinPCalificar2, 
                                                    pc.InicioPCalificar3, pc.FinPCalificar3, 
                                                    pc.InicioPCalificar4, pc.FinPCalificar4, 
                                                    pc.InicioPCalificar5, pc.FinPCalificar5, 
                                                    cp.observaciones                                                   
                                                    FROM dim_cposterior cp
                                                    left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                                    left join dim_pacalificar pc on cp.iddim_CPosterior=pc.iddim_CPosterior
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where ai.RUC='$cbx_ruc'
                                                    order by cp.iddim_CPosterior ASC";

//Obteniendo el conjunto de resultados
                                            $result3 = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
                                            $i = 0;
                                            if ($conexionmysql->query($query3)) {
                                                while ($fila3 = $result3->fetch_assoc()) {
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $fila3['OFICINA'] ?></td>
                                                        <td><?php echo $fila3['Verificacion'] ?></td>
                                                        <td><?php echo $fila3['VerificacionPerfil'] ?></td>
                                                        <?php
                                                        /*
                                                          if ($fila['idTEstadoActual'] != '3') {
                                                          ?>

                                                          <td>
                                                          <a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila['EstadoActual'] ?>
                                                          </a>
                                                          </td>

                                                          <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
                                                          <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                          </div>
                                                          <?php
                                                          } else
                                                          if ($fila['idTEstadoActual'] == '3') {
                                                          ?>
                                                          <td><?php echo $fila['EstadoActual'] ?></td>
                                                          <?php
                                                          } */
                                                        ?>     

                                                        <td>
                                                            <a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila3['EstadoActual'] ?>
                                                            </a>

                                                            <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
                                                                <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila3['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                            </div>
                                                        </td>

                                                        <td><?php echo $fila3['GeneraBaja'] ?></td> 
                                                        <td><?php echo $fila3['nResBRegistro'] ?></td>
                                                    <!--    <td><//?php echo $fila2['idTRRBRegistro'] ?></td>

                                                        <td><//?php echo $fila2['nit'] ?></td>
                                                        <td><//?php echo $fila['femisionBRegistro'] ?></td>
                                                        <td class="success"><//?php echo $fila['nResBRegistro'] ?></td>                                
                                                        <td><//?php echo $fila['fnotificacionBRegistro'] ?></td>
                                                        <td><//?php echo $fila['respuestaBRegistro'] ?></td>

                                                        <td><//?php echo $fila['fecartafinanza'] ?></td>
                                                        <td><//?php echo $fila['ncartafinanza'] ?></td>
                                                        <td><//?php echo $fila['correo'] ?></td>                                
                                                        <td><//?php echo $fila['fcorreo'] ?></td>  -->                                              
                                                        <td><?php echo $fila3['RUC'] ?></td>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <!--   <td><//?php echo $fila2['dni_empresa'] ?></td>  -->                              
                                                        <td><?php echo $fila3['nomEmpresa'] ?></td>
                                                      <!--  <td><//?php echo $fila2['descripcionContribuyente'] ?></td>
                                                        <td><//?php echo $fila2['condicion'] ?></td>
                                                        <td><//?php echo $fila2['estado'] ?></td>

                                                                                            <td><//?php echo $fila['DEPARTAMENT_emp'] ?></td>
                                                                                            <td><//?php echo $fila['PROVINCIA_emp'] ?></td>
                                                                                            <td><//?php echo $fila['DISTRITO_emp'] ?></td>
                                                                                            <td><//?php echo $fila['DIRECCION_emp'] ?></td>                              
                                                        <td><//?php echo $fila2['dni_t'] ?></td>-->
                                                        <td>
                                                            <a href="#" id="abriPoppupo<?php echo $i ?>"><?php echo $fila3['dni_t'] ?>
                                                            </a>
                                                        </td>

                                                    <div id="dialogo<?php echo $i ?>" title="SGVCA" class="contenido">
                                                        <iframe src="formControlPosteriorAsegurados.php?dni=<?php echo $fila3['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                    </div>

                                                    <td><?php echo $fila3['nombres'] ?></td>
                                                   <!-- <td><//?php echo $fila['RED_ASISTENCIAL_t'] ?></td>

                                                    <td><//?php echo $fila2['InicioPCalificar1'] ?></td>                                
                                                    <td><//?php echo $fila2['FinPCalificar1'] ?></td>                                                

                                                    <td><//?php echo $fila2['InicioPCalificar2'] ?></td>                                
                                                    <td><//?php echo $fila2['FinPCalificar2'] ?></td>                                                

                                                    <td><//?php echo $fila2['InicioPCalificar3'] ?></td>                                
                                                    <td><//?php echo $fila2['FinPCalificar3'] ?></td>                                                

                                                    <td><//?php echo $fila2['InicioPCalificar4'] ?></td>                                
                                                    <td><//?php echo $fila2['FinPCalificar4'] ?></td>                                                

                                                    <td><//?php echo $fila2['InicioPCalificar5'] ?></td>  -->  
                                                    <td><?php echo $fila3['nombrePDF'] ?></td>                 

                                                    <td><?php echo $fila3['observaciones'] ?></td>                                

                                                    </tr>

                                                <?php } ?>


                                                <?php
                                            } else {
                                                echo 'Error al cargar';
                                            }
//liberando los recursos
                                            $result3->free();
                                        }
                                    }
                                    ?>
                                </table>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>






