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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SIMVECA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical 
              right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
        <meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/tablas.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
            <!-- Beginning of compulsory code below -->

            <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/> 
            <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
            <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
            <script>var $j = jQuery.noConflict();</script>
            <!-- / END -->

            <style>
                table.tabs {
                    border-collapse: separate;
                    border-spacing: 0;
                    background-color: transparent;
                    font-size: 0.9em;
                }
                th.tabck {
                    border: gray solid 1px;
                    border-bottom: 0;
                    border-radius: 0.5em 0.5em 0 0;
                    background-color: transparent;
                    padding: 0.3em;
                    text-align: center;
                    cursor: pointer;
                }
                th.tabcks {
                    border: 0;
                    border-bottom: gray solid 1px;
                }
                th.tabcks:first-child {
                    border-left: gray solid 1px;
                }
                th.tabcks:last-child {
                    border-right: gray solid 1px;
                }
                table.tabs tr:first-child th.tabcks {
                    border-left: none;
                    border-right: none;
                }
                table.tabs[data-filas] th.tabck {
                    box-shadow: 0 -0.15em 0.1em 0 white;
                }
                table.tabs td {
                    border: gray solid 1px;
                    border-top: 0;
                }
                tr.filadiv {
                    background-color: rgb(235, 235, 225);
                }
                /* El ancho y alto de los div.tabdiv se configuran
                en cada aplicación */
                div.tabdiv {
                    background-color: rgb(235, 235, 225);
                    border: 0;
                    padding: 0.5em;
                    overflow: auto;
                    display: none;
                    width: 100%;
                    height: auto;
                }  

                /* Anchos y altos para varios contenedores en la misma página.
                Esta parte se particulariza para cada contenedor. (IE8 necesita
                !important) */
                td#tab-0 > div {
                    width: 20em!important;
                    height: 10em!important;
                }

                #contieneportafolio_1 {
                    max-width: 710px;
                    padding: 5px;
                    border: 1px solid #ccc;
                }

                #check {
                    padding: 5px;
                }

                #check_td{
                    margin: 5px;
                }

                .formleyenda{
                    font-size: 12px;
                    padding:2px;

                }

                /*BOTONES*/
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
                .button2 {
                    border-radius: 8px;
                    padding: 10px 20px;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                    background-color: white; 
                    color: black; 
                    border: 2px solid #4CAF50;
                }

                .button2:hover {
                    background-color: #4CAF50;
                    color: white;
                }
                #panel_1 {
                    padding-top: 15px;
                }


                thead {
                    background: gainsboro;
                    text-align: center;
                    z-index: 2;
                    font-size: 11px;
                }

                #table_2 {  
                    /*table-layout: fixed;*/
                    margin: 1rem auto;
                    width: 95%;
                    box-shadow: 0 0 4px 2px rgba(0,0,0,.4);
                    border-collapse: collapse;
                    border: 1px solid rgba(0,0,0,.5);
                    border-top: 0 none;
                    overflow: scroll;
                    height: 200px;
                    display: block;
                }

                tbody {

                    text-align: left;
                    z-index: 2;
                    font-size: 10px;
                }

                div.contiene_tabla, div.contiene_tabla2 { 
                    height: 220px; 
                    overflow: auto; 
                    overflow-y: auto; 
                    overflow-x: hidden; 
                    width: 1395px; /*TAMAÑO ASTA DONDE SE PROYECTA PARA SALIR EL SCROLL*/
                    /*border-bottom: solid 1px #87CEFA; 
                    border-right: solid 1px #87CEFA; */
                } 

                #tables2 { 
                    background-color: #FFFFFF; /*COLOR FONDO DE LA TABLA MENOS TH*/
                    color: black; /*color de letras*/
                    table-layout: fixed; 
                    width: 1380px; /*TAMAÑO DE LA CABEZERA Y CUERPO DE LA TABLA*/
                } 

                /*table.titulos { 
                width: 700px; 
                } */

                #ths1, #tds1 { 
                    border: 1px solid #87CEFA; 
                    padding: 2px; 
                    white-space: pre; /* CSS 2.0 */ 
                    white-space: pre-wrap; /* CSS 2.1 */ 
                    white-space: pre-line; /* CSS 3.0 */ 
                    white-space: -pre-wrap; /* Opera 4-6 */ 
                    white-space: -o-pre-wrap; /* Opera 7 */ 
                    white-space: -moz-pre-wrap; /* Mozilla */ 
                    white-space: -hp-pre-wrap; /* HP */ 
                    word-wrap: break-word; /* IE 5+ */ 
                } 

                tr.headers { 
                    background-color: #d1e4f3; /* COLO DE LOS TH CABEZERA */ 
                } 

                /* extendemosel ancho para .contiene_tabla2 
                para colocar el scroll por fuera */ 
                /*div.contiene_tabla2 { 
                width: 715px; 
                } */

                /* Fix para listas */ 
                div.contiene_tabla ul li, div.contiene_tabla2 ul li{ 
                    list-style-type: square; 
                    list-style-position: inside; 
                }

                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                    margin-top: 60px;
                    max-width: 1150px;
                    padding: 6px 12px;
                }

                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;  
                    border-top: none;
                }   
            </style>
<script>
    function enterdni(ele){
        if(event.key=== 'Enter'){
            document.test.submit();
        }
        
    }
</script>


    </head>
    <body class="vimeo-com">


        <h4><img src="imagenes/logo_login.png" alt="" />

            <?PHP
            echo '<br>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . ($row['oficinaIni']) . '-' . ($row['oficina']);
            echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . ($row['oficina']);
            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = ($row['oficina']);
            ?>  

        </h4>

        <!-- Beginning of compulsory code below -->
        <div class="panel-heading" id="panel_1">
            <ul id="nav" class="dropdown dropdown-horizontal">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="#">Control Posterior</a>
                    <ul>		
                        <li><a href="#">Registros por Iniciativa Propia</a>
                            <ul>
                                <li><a href="formControlPosteriorIniciativaPropia.php">Titulares</a></li>
                                <li><a href="formControlPosteriorIniciativaPropia_dh.php">Derecho Habientes</a></li>
                                <li><a href="formControlPosteriorIniciativaPropia_no_dh.php">Derecho Habientes no Registrado</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Listar</a>
                            <ul>
                                <li><a href="formListarControlPosteriorUsuario.php">Registros de Bajas</a></li>
                                <!--<li><a href="formListarControlPosterior.php">Registros de Bajas de TODAS las OSPE</a></li>-->
                            </ul>
                        </li>			
                    </ul>
                </li>
                <li><a href="#">Verificacion</a>
                    <ul>		
                        <li><a href="#">Registros por Iniciativa Propia</a>
                            <ul>
                                <li><a href="formVerificacionIniciativaPropia.php">Titulares</a></li>
                                <li><a href="formVerificacionIniciativaPropia_n_ruc.php">Titular sin Empresa</a></li>     
                            </ul>
                        </li>
                        <li><a href="#">Listar</a>
                            <ul>
                                <li><a href="formListarVerificacionUsuario.php">Registros de Bajas</a></li>
                                <!--<li><a href="formListarVerificacion.php">Registros de Bajas de TODAS las OSPE</a></li>-->
                            </ul>
                        </li>				
                    </ul>
                </li>
                <li><a href="#">Videos</a>
                <ul>
                    <li><a href="#">CONTROL POSTERIOR</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\1.mp4" target="_blank">DIA 1</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\2.mp4" target="_blank">DIA 2</a></li>                            
                        </ul>
                    </li>
                    <li><a href="#">CONTROL POSTERIOR NUEVOS VIDEOS</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_SI_Terminado.mp4" target="_blank">Reg_SI_Terminado</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_NO_Terminado.mp4" target="_blank">Reg_NO_Terminado</a></li>                            
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\FIRMES_Y_CONSENTIDAS.mp4" target="_blank">FIRM_Y_CONSENT</a></li>                            
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Exportar_pdf_SIMVECA.mp4" target="_blank">EXTRACCION PDF</a></li>
                        </ul>
                    </li>
                    <li><a href="#">VERIFICACION</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\SIMVECA_VERIFICACION_1.mp4" target="_blank">Verificacion</a></li>                           
                        </ul>
                    </li> 
                </ul>
            </li>            <li><a href="#">CONSULTAS BAJ F Y CONS</a>
                <ul>
                    <li><a href="#">Remesas SUNAT</a>
                     <ul>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_01.xlsx" target="_blank">2018_Remesa_01</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_02.xlsx" target="_blank">2018_Remesa_02</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_03.xlsx" target="_blank">2018_Remesa_03</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_04.xlsx" target="_blank">2018_Remesa_04</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_05.xlsx" target="_blank">2018_Remesa_05</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2019_Remesa_01.xlsx" target="_blank">2019_Remesa_01</a></li>
                         
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_01.xlsx" target="_blank">Pasivo_Remesa_01</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_02.xlsx" target="_blank">Pasivo_Remesa_02</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_03.xlsx" target="_blank">Pasivo_Remesa_03</a></li>
                  
                        </ul>
                        </li>                    
                </ul>
            </li>
            <li><a href="#">MANUALES</a>
                <ul>
                    <li><a href="#">AGREG_+_TIT_OV</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\AGREGAR_MAS_TITULARES_CON_EL_MISMO_NUMERO_OV.pptx" target="_blank">OV</a></li>
                                                                    
                        </ul>
                        </li> 
                    <li><a href="#">ARCHIVO Y DERIVADO</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ARCHIVO_Y_DERIVADO.pptx" target="_blank">ARCHIVO Y DERIVADO</a></li>                                                                    
                        </ul>
                        </li> 
                    <li><a href="#">ELIMINAR CAMPOS</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ELIMINAR_CAMPOS_EN_EL_SIMVECA.pptx" target="_blank">PERIODOS DE BAJA Y CARTA A FINANZA</a></li>                                                                    
                        </ul>
                        </li> 
                     <li><a href="#">ESTADOS RES Y REGISTRO DE C.E.</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ESTADOS_RESOLUCION_SIMVECA_FINAL.pptx" target="_blank">MODULO ESTADO DE LA RESOLUCION</a></li>                                                                    
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Extranjeros_en_el_SIMVECA.pptx" target="_blank">MODULO REGISTRO DE EXTRANJEROS (C.E.)</a></li>                                                                    
                        </ul>
                        </li> 
                </ul>
            </li>
                <li><a href="logout.php">Salir</a></li>
            </ul>
        </div>
        <!-- / END -->


        <!-- Tab links -->
        <div class="tab" style="border-radius: 8px;  border: 2px solid #008CBA; width: 100%;" >
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'TODOINGRESADO')">BAJA EMITIDA Y ARCHIVO</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'FECHAS')">TIPO DE ESTADO</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'ESTADISTICO')">ESTADISTICO</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'FINALIZADOS')">FIRMES Y CONSENTIDAS</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'INHABILITACIONES')">INHABILITACIONES</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'MULTAS')">MULTAS</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'PUBLICACIONES')">PUBLICACIONES</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'DNIRUC')">DNI/RUC</button>
        </div>

        <!-- Tab content -->

        <!-- Tab content -->
        <div class="tabcontent" id="TODOINGRESADO">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';
                        $query1 = "SELECT distinct(substr(f.fechaDevInfFinalJOSPE,1,4)) ano 
                    FROM dim_verificacion f
                    left join dim_aseguradoindevido ai on f.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                    where not f.fechaDevInfFinalJOSPE='null' and ai.idDIM_Oficina='$idOficinaUsuario'
                    ORDER BY ano DESC";
                        $resultado1 = $conexionmysql->query($query1);
                        ?>

                        <div class="control">
                            <label>SELECCIONE EL AÑO DE BAJA REGISTRO</label>
                            <select name="cbx_ano" id="cbx_ano">
                                <option value="*">AÑO</option>
                                <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['ano']; ?>"><?php echo $row['ano']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!--                        <div class="control">
                                                    <label>SELECCIONE EL TIPO DE PROCESO</label>
                                                    <select name="cbx_estadoActual" id="cbx_estadoActual" required=""></select>
                        <?PHP
                        ?>
                                                </div>-->

                        <div class="control" >
                            <label for="meses">MESES A FILTRAR</label>  
                            <div id="check" >
                                <td><input type="checkbox" name="enero" value="01"><label id="check_td">ENERO</label></input>
                                </td>
                                <td><input type="checkbox" name="febrero" value="02"><label id="check_td">FEBRERO</label></input>
                                </td>
                                <td><input type="checkbox" name="marzo" value="03"><label id="check_td">MARZO</label></input>
                                </td>
                                <td><input type="checkbox" name="abril" value="04"><label id="check_td">ABRIL</label></input>
                                </td>
                                <td><input type="checkbox" name="mayo" value="05"><label id="check_td">MAYO</label></input>
                                </td>
                                <td><input type="checkbox" name="junio" value="06"><label id="check_td">JUNIO</label></input> 
                                </td><br>                                
                            </div>
                            <div id="check">
                                <td><input type="checkbox" name="julio" value="07"><label id="check_td">JULIO</label></input>
                                </td>
                                <td><input type="checkbox" name="agosto" value="08"><label id="check_td">AGOSTO</label></input>
                                </td>
                                <td><input type="checkbox" name="setiembre" value="09"><label id="check_td">SETIEMBRE</label></input>
                                </td>
                                <td><input type="checkbox" name="octubre" value="10"><label id="check_td">OCTUBRE</label></input>
                                </td>
                                <td><input type="checkbox" name="noviembre" value="11"><label id="check_td">NOVIEMBRE</label></input>
                                </td>
                                <td><input type="checkbox" name="diciembre" value="12"><label id="check_td">DICIEMBRE</label></input> 
                                </td><br>                                
                            </div>

                        </div>
                        <div class="formleyenda">
                            <button type="submit" class="button button1">Filtrar Periodo</button>
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>

        <!-- Tab content -->

        <div class="tabcontent" id="FECHAS">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset >                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';

                        $queryte = "SELECT distinct cp.idTEstadoActual,te.EstadoActual 
                    FROM dim_verificacion cp 
                    left join tipoestadoactual te on cp.idTEstadoActual= te.idTEstadoActual";
                        $resultado1 = $conexionmysql->query($queryte);
                        ?>



                        <div class="control">
                            <label>SELECCIONE EL TIPO DE PROCESO</label>            
                            <select name="cbx_estadoActual" class="con_estilos" value="cbx_estadoActual"  required="">
                                <option value="'2','3','4'">TODOS</option>
                                <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTEstadoActual']; ?>"><?php echo $row['EstadoActual']; ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <label>*Por Fecha de Creacion</label>
                        <div>
                            FECHA DE INICIO <input type="date" name="dateinicioE"/>  
                            FECHA DE FIN <input type="date" name='datefinE' />                  
                            <br/>
                            <div class="formleyenda">
                                <button type="submit" class="button button1" name="buscartipoestado">Filtrar Periodo</button>

                            </div>
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>

        <!-- Tab content -->

        <div class="tabcontent" id="ESTADISTICO">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post">                                       

                        <div>
                            <label>*Por Fecha de Emision Baja</label>
                                                                <BR>

                            FECHA DE INICIO <input type="date" name="dateinicio"/>    

                                FECHA DE FIN <input type="date" name='datefin'/>                  
                                    <BR>
                          <div class="formleyenda">
                           <button type="submit" class="button button1" name="buscar">Filtrar</button>

                         </div>
                        </div>
                    </form>
                </fieldset>
        </div>
        </div>

        <!-- Tab content -->        

        <div id="FINALIZADOS" class="tabcontent">
        <div class="contieneportafolio" id="contieneportafolio_1">
        <fieldset>                    
        <form action="" method="post"> 
            <div class="formleyenda" >
               <label>Este campo funciona con las seguientes variables:</label><br>
        <label style="font-weight: bold;">Fecha de Acto Firme, Estado (Terminado), Subio PDF, Estado Resolucion (Firme y Consentida)</label><br>
            <label>Si no cumple una de todas estas no figurara en el siguiente listado.</label><br>
            <label style="color:#F80000 ;font-size: 12px;font-weight: bold;">Si el PDF de la Resolucion ya fue enviado a la SUNAT, este no aparecera en el listado de Actos Firmes</label><br><br>
            <div>
            FECHA DE INICIO <input type="date" name="dateinicioF"/>
            FECHA DE FIN <input type="date" name='datefinF'/>    
            </div>

            </div>
            <div class="formleyenda">
            <button type="submit" class="button button1" name="buscarfinalizados">Filtrar Periodo</button>
            </div>

        </form>
        </fieldset>
        </div>
        </div>
        
        <div id="INHABILITACIONES" class="tabcontent">
        <div class="contieneportafolio" id="contieneportafolio_1">
        <fieldset>                    
        <form action="" method="post"> 
            <div class="formleyenda" >
                <label>Se busca por fecha de EMISION de INHABILITACION</label><br>
            <div>
            FECHA DE INICIO <input type="date" name="dateinicioI"/>
            FECHA DE FIN <input type="date" name='datefinI'/>    
            </div>

            </div>
            <div class="formleyenda">
            <button type="submit" class="button button1" name="buscarinhabilitaciones">BUSCAR</button>
            </div>

        </form>
        </fieldset>
        </div>
        </div>
        
        <div id="MULTAS" class="tabcontent">
        <div class="contieneportafolio" id="contieneportafolio_1">
        <fieldset>                    
        <form action="" method="post"> 
            <div class="formleyenda" >

            <div>
            FECHA DE INICIO <input type="date" name="dateinicioM"/>
            FECHA DE FIN <input type="date" name='datefinM'/>    
            </div>

            </div>
            <div class="formleyenda">
            <button type="submit" class="button button1" name="buscarMultas">BUSCAR</button>
            </div>

        </form>
        </fieldset>
        </div>
        </div>
        
                <div id="PUBLICACIONES" class="tabcontent">
        <div class="contieneportafolio" id="contieneportafolio_1">
        <fieldset>                    
        <form action="" method="post"> 
            <div class="formleyenda" >
                <label>*Por Fecha de Envio a Publicar</label>
            <div>
            FECHA DE INICIO <input type="date" name="dateinicioP"/>
            FECHA DE FIN <input type="date" name='datefinP'/>    
            </div>

            </div>
            <div class="formleyenda">
            <button type="submit" class="button button1" name="buscarPublicaciones">BUSCAR</button>
            </div>

        </form>
        </fieldset>
        </div>
        </div>
        <!-- Tab content -->

        <div id="DNIRUC" class="tabcontent">
        <div class="contieneportafolio" id="contieneportafolio_1">
        <div class="formleyenda" id="check">
            <form name="test" action="" method="post">
            <div class="formleyenda">INGRESE DNI</div>
            <input type="text" name="cbx_dni" id="cbx_dni" class="enterdni" onkeydown="enterdni(this)"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                event.returnValue = false;" maxlength="11" required=""/>
                <button type="submit" class="button button1">Filtro 1</button>             
            </form>
        </div>

        <div class="formleyenda" id="check">
        <form action="" method="post">
        <div class="formleyenda">INGRESE RUC</div>
        <input type="text" name="cbx_ruc" id="cbx_ruc" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
            event.returnValue = false;" maxlength="11" required=""/>
            <button type="submit" class="button button1">Filtro 2</button>        
        </form>
        </div>
        </div>
        </div>

        <!-- Tab content -->

        <?php
        /* ------------INICIO---------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */

        if (isset($_POST['cbx_ano'])) {
        //$cbx_estadoActual = $_POST['cbx_estadoActual'];
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

            include './conexionesbd/conexion_mysql.php';


        $query = "SELECT 
a.iddim_Verificacion, 
a.idTVerificacion, 
'VERIFICACION' as VERIFICACION,
a.idTVerificacionPerfil, 
tp.VerificacionPerfil,
a.iddim_aseguradoindevido, 
a.idTEstadoActual, 
tea.EstadoActual,
a.fechateinfoFinalVe, 
a.fechaEIFinalJOSPE, 
a.fechaDevInfFinalJOSPE, 
a.nit, 
a.fechaRDerivado, 
a.fechaDDerivado, 
a.casoDerivado, 
a.iddim_VerificacionDerivado, 
a.codigocaso, 
a.observaciones, 
a.idTusuario, 
concat_ws(' ', du.pape,du.sape,du.pnom,du.snom)as nombresUsuario,
a.fCreacion,
b.idDIM_Oficina,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
b.RUC, 
b.nomEmpresa, 
b.dni_t, 
b.autogenerado_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as asegurado,  
b.fechanacimiento,
c.ordenV, c.numero, 
c.fechaEmision, 
c.fechanotificacionOV,
d.fechaEmiBOficio, 
d.numResBOficio, 
d.nombre_PDF_reso, 
d.idTRRBRegistro, 
dt.RRBRegistro,
d.fechaNAsegurado,
e.fultimaActaVe, 
e.iddim_Verificadores1,
dofxx.apellidonombre, 

b.titularAcredita_dni, 
b.titularAcredita_nombres,
b.titularAcredita_vinculo

        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_actaverificacion e on a.iddim_Verificacion=e.iddim_Verificacion
      
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on a.idtusuario=du.iddim_usuario
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join dim_actaverificacion dofx on a.iddim_Verificacion=dofx.iddim_Verificacion
        left join dim_oficina dofxx on dofx.iddim_verificadores1=dofxx.idDIM_Oficina  
        left join tiporrbregistro dt on e.iddim_Verificadores1=dt.idTRRBRegistro  
        where month(d.fechaEmiBOficio) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(d.fechaEmiBOficio)='$ano'        
        and b.idDIM_Oficina='$idOficinaUsuario'
        and a.idTVerificacion='2'
        order by a.iddim_Verificacion ASC";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle



$query_der = "SELECT 
a.iddim_Verificacion, 
a.idTVerificacion, 
'VERIFICACION' as VERIFICACION,
a.idTVerificacionPerfil, 
tp.VerificacionPerfil,
a.iddim_aseguradoindevido, 
a.idTEstadoActual, 
tea.EstadoActual,
a.fechateinfoFinalVe, 
a.fechaEIFinalJOSPE, 
a.fechaDevInfFinalJOSPE, 
a.nit, 
a.fechaRDerivado, 
a.fechaDDerivado, 
a.casoDerivado, 
doff.oficina oficinaDerivado,
a.iddim_VerificacionDerivado, 
a.codigocaso, 
a.observaciones, 
a.idTusuario, 
concat_ws(' ', du.pape,du.sape,du.pnom,du.snom)as nombresUsuario,
a.fCreacion,
b.idDIM_Oficina,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
b.RUC, 
b.nomEmpresa, 
b.dni_t, 
b.autogenerado_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as asegurado,  
b.fechanacimiento,
c.ordenV, c.numero, 
c.fechaEmision, 
c.fechanotificacionOV,
d.fechaEmiBOficio, 
d.numResBOficio, 
d.nombre_PDF_reso, 
d.idTRRBRegistro, 
dt.RRBRegistro,
d.fechaNAsegurado,
e.fultimaActaVe, 
e.iddim_Verificadores1,
dofxx.apellidonombre, 

b.titularAcredita_dni, 
b.titularAcredita_nombres,
b.titularAcredita_vinculo

        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_actaverificacion e on a.iddim_Verificacion=e.iddim_Verificacion
        
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on a.idtusuario=du.iddim_usuario
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join dim_actaverificacion dofx on a.iddim_Verificacion=dofx.iddim_Verificacion
        left join dim_oficina dofxx on dofx.iddim_verificadores1=dofxx.idDIM_Oficina  
        left join dim_oficina_2 doff on a.casoDerivado=doff.codOficina
        left join tiporrbregistro dt on e.iddim_Verificadores1=dt.idTRRBRegistro  
        where month(a.fechaDDerivado) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(a.fechaDDerivado)='$ano'        
        and b.idDIM_Oficina='$idOficinaUsuario'
        and a.idTEstadoActual in ('4')
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion ASC";

//Obteniendo el conjunto de resultados
$result_der = $conexionmysql->query($query_der);


$i = 0;
//
//$cadena = $enero . " " . $febrero. " ". $marzo . " " . $abril . " " . $mayo . " " . $junio . " " . $julio . " " . $agosto . " " . $setiembre . " " . $octubre . " " . $noviembre . " " . $diciembre;
?>

    <div class="panel-heading" id="panel_1">
        <h2>LISTADO DE BAJAS DE REGISTRO DE VERIFICACION</h2>
    </div>
        <table>
            <tr>
            <td>
        <form name="form" action="exportar/reporteExcelVspes_fechas_mesbaja.php" method="POST">
    <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>   
    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
    <!--<a href="reporteExcel.php"></a>-->
    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
    <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
    <input type="submit" name="buscar" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input> 
            </form>
         </td>
            <td>
                <form name="form" action="exportar/reporteExcelVspes_fechas_mesbaja_2.php" method="POST">
    <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>   
    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
    <!--<a href="reporteExcel.php"></a>-->
    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
    <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
    <input type="submit" name="buscar" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input> 
            </form>
                </td>
                </tr>
            </table>
        
    <table class="titulos" id="tables2">
        <tr class="headers" style="text-align: center">
            <th id="ths1"style="width: 20px">N</th>
            <th id="ths1"style="width: 25px">OFICINA</th>
            <th id="ths1"style="width: 12px">T DE VERIF</th>
            <th id="ths1"style="width: 10px">EST<br>ACT.</th>
            <th id="ths1"style="width: 50px">Nº ORDEN DE VERIFICACION</th>
            <th id="ths1"style="width: 25px">RUC</th>
            <th id="ths1"style="width: 50px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 18px">DNI</th>
            <th id="ths1"style="width: 75px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 30px">NIT</th>
            <th id="ths1"style="width: 50px">numResBOficio</th>
            <th id="ths1"style="width: 50px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO POR</th>
            <th id="ths1"style="width: 20px">FECHA DE REGISTRO</th>
            </tr>
    </table>

        <div class="contiene_tabla">
            <table id="tables2">
                  <?php
            if ($conexionmysql->query($query)) {
            while ($fila = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1"style="width: 20px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 25px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 12px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 10px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['ordenV'] ?></td>
                <td id="tds1"style="width: 25px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 18px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 75px"><?php echo $fila['asegurado'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['nit'] ?></td>       
                <td id="tds1"style="width: 50px"><?php echo $fila['numResBOficio'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['observaciones'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombresUsuario'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['fCreacion'] ?></td> 
            </tr>
            <?php } }?>
            </table>
        </div>
        
        <div class="panel-heading" id="panel_1">
        <h2>LISTADO DE BAJAS DE REGISTRO DE VERIFICACION DERIVADOS</h2>
    </div>

        <form name="form" action="exportar/reporteExcelVspes_fechas_mesbaja_der.php" method="POST">
    <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>   
    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
    <!--<a href="reporteExcel.php"></a>-->
    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
    <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
    <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 

            </form>
        <table class="titulos" id="tables2">
        <tr class="headers" style="text-align: center">
           <th id="ths1"style="width: 20px">N</th>
            <th id="ths1"style="width: 25px">OFICINA</th>
            <th id="ths1"style="width: 12px">T DE VERIF</th>
            <th id="ths1"style="width: 10px">EST<br>ACT.</th>
            <th id="ths1"style="width: 50px">Nº ORDEN DE VERIFICACION</th>
            <th id="ths1"style="width: 25px">RUC</th>
            <th id="ths1"style="width: 50px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 18px">DNI</th>
            <th id="ths1"style="width: 75px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 30px">FECHA DERIVADO</th>
            <th id="ths1"style="width: 50px">OSPE DERIVADO</th>
            <th id="ths1"style="width: 50px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO POR</th>
            <th id="ths1"style="width: 20px">FECHA DE REGISTRO</th>
            </tr>
    </table>

        <div class="contiene_tabla">
            <table id="tables2">
                  <?php
            if ($conexionmysql->query($query_der)) {
            while ($fila = $result_der->fetch_assoc()) {
            $i++;
            ?>
            <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1"style="width: 20px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 25px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 12px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 10px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['ordenV'] ?></td>
                <td id="tds1"style="width: 25px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 18px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 75px"><?php echo $fila['asegurado'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['fechaDDerivado'] ?></td>       
                <td id="tds1"style="width: 50px"><?php echo $fila['oficinaDerivado'] ?></td>
                <td id="tds1"style="width: 50px"><?php echo $fila['observaciones'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombresUsuario'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['fCreacion'] ?></td> 
            </tr>
            <?php } }?>
            </table>
        </div>
          
            <table cellspacing="8"> 
            <tr>
            <td>    
            <li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
            <br></br>
            <br></br>
            <p></p>
            </td>
            <td>
            <li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">ESTADO ACTUAL </label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. PENDIENTE</label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. EN PROCESO</label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. TERMINADO</label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. ARCHIVO</label></li>
            <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. NO CORRESPONDE</label></li>
            <br></br>
            <p></p>
            </td>
            </tr>
            </table>

            <?php
            
            
            
            $result->free();
            }
            /* ---------FIN------------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */
            ?>


            <?php
            /* ------------------------------------------------------------------SEGUNDA BUSQUEDA */
            ?>                            

            <section>
            <?php
            if (isset($_POST['buscartipoestado'])) {

            $dateinicio = $_POST['dateinicioE']; //1
            $datefin = $_POST['datefinE'];
            $cbx_estadoActual = $_POST['cbx_estadoActual'];

            include './conexionesbd/conexion_mysql.php';
            
$query3 = "SELECT 
a.iddim_Verificacion, 
a.idTVerificacion, 
a.idTVerificacionPerfil, 
tp.VerificacionPerfil,
a.iddim_aseguradoindevido, 
a.idTEstadoActual, 
tea.EstadoActual,
a.fechateinfoFinalVe, 
a.fechaEIFinalJOSPE, 
a.fechaDevInfFinalJOSPE, 
a.nit, 
a.fechaRDerivado, 
a.fechaDDerivado, 
a.casoDerivado, 
a.iddim_VerificacionDerivado, 
a.codigocaso, 
a.observaciones, 
a.idTusuario, 
concat_ws(' ', du.pape,du.sape,du.pnom,du.snom)as nombresUsuario,
a.fCreacion,
b.idDIM_Oficina,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
b.RUC, 
b.nomEmpresa, 
b.dni_t, 
b.autogenerado_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as asegurado,  
b.fechanacimiento,
c.ordenV, c.numero, 
c.fechaEmision, 
c.fechanotificacionOV,
d.fechaEmiBOficio, 
d.numResBOficio, 
d.nombre_PDF_reso, 
d.idTRRBRegistro, 
dt.RRBRegistro,
d.fechaNAsegurado,
e.fultimaActaVe, 
e.iddim_Verificadores1,
dofxx.apellidonombre, 

b.titularAcredita_dni, 
b.titularAcredita_nombres,
b.titularAcredita_vinculo
        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_actaverificacion e on a.iddim_Verificacion=e.iddim_Verificacion
        
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on a.idtusuario=du.iddim_usuario
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join dim_actaverificacion dofx on a.iddim_Verificacion=dofx.iddim_Verificacion
        left join dim_oficina dofxx on dofx.iddim_verificadores1=dofxx.idDIM_Oficina  
        left join tiporrbregistro dt on e.iddim_Verificadores1=dt.idTRRBRegistro          
        where (DATE(a.fCreacion) BETWEEN '$dateinicio' and '$datefin')              
        and b.idDIM_Oficina='$idOficinaUsuario'
        and a.idTEstadoActual in ($cbx_estadoActual)
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion asc";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
//
//$cadena = $enero . " " . $febrero. " ". $marzo . " " . $abril . " " . $mayo . " " . $junio . " " . $julio . " " . $agosto . " " . $setiembre . " " . $octubre . " " . $noviembre . " " . $diciembre;
?>

    <div class="panel-heading" id="panel_1">
    <h2>LISTADO DE BAJAS DE REGISTRO DE VERIFICACION</h2>
    </div> 
    
                <table class="titulos" id="tables2">
                    <tr class="headers" style="text-align: center">
                        <th id="ths1"style="width: 5px">N°</th>
                        <th id="ths1"style="width: 30px">OFICINA</th>
                        <th id="ths1"style="width: 15px">PROC.</th>
                        <th id="ths1"style="width: 15px">TIP. VERIF</th>
                        <th id="ths1"style="width: 15px">EST<br>ACT.</th>
                        <th id="ths1"style="width: 30px">Nº ORDEN DE VERIFICACION</th>
                        <th id="ths1"style="width: 25px">RUC</th>
                        <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 15px">DNI TIT</th>
                        <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 40px">NIT</th>
                        <th id="ths1"style="width: 30px">NUMERO DE RESOLUCION</th>
                        <th id="ths1"style="width: 40px">NOMBRE DEL PDF</th>
                        <th id="ths1"style="width: 40px">OBSERVACIONES</th>
                        <th id="ths1"style="width: 40px">REGISTRADO POR</th>
                        <th id="ths1"style="width: 40px">FECHA DE REGISTRO</th>
                    </tr>   
                </table>
                <div class="contiene_tabla">
                    <table id="tables2">
                     <?php
                        if ($conexionmysql->query($query3)) {
                        while ($fila = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                            <td id="tds1"style="width: 5px"><?php echo $i ?></td>
                            <td id="tds1"style="width: 30px"><?php echo $fila['OFICINA'] ?></td>
                            <td id="tds1"style="width: 15px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                            <td id="tds1"style="width: 15px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                            <td id="tds1"style="width: 15px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                            <td id="tds1"style="width: 30px"><?php echo $fila['ordenV'] ?></td>
                            <td id="tds1"style="width: 25px"><?php echo $fila['RUC'] ?></td>
                            <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                            <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                            <td id="tds1"style="width: 40px"><?php echo $fila['asegurado'] ?></td>
                            <td id="tds1"style="width: 40px"><?php echo $fila['nit'] ?></td>         
                            <td id="tds1"style="width: 30px"><?php echo $fila['numResBOficio'] ?></td>
                            <td id="tds1"style="width: 40px"><?php echo $fila['nombre_PDF_reso'] ?></td>
                            <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td> 
                            <td id="tds1"style="width: 40px"><?php echo $fila['nombresUsuario'] ?></td>
                            <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td> 
                        </tr> 
                                <?php } ?>
                    </table>                       
                </div>        

            <form name="form" action="exportar/reporteExcelVspes_fechas_est.php" method="POST">    
                <input type="HIDDEN" name="cbx_estadoActual" value="<?php echo $cbx_estadoActual ?>"/>    
                <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
                <input type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
                <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>
                <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
                <input type="submit" name="buscar" value="Exportar Excel S/DH" class="button button2"></input> 
            </form>
        <table cellspacing="8"> 
        <tr>
        <td>    
        <li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
        <br></br>
        <br></br>
        <p></p>
        </td>
        <td>
        <li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">ESTADO ACTUAL </label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. PENDIENTE</label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. EN PROCESO</label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. TERMINADO</label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. ARCHIVO</label></li>
        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. NO CORRESPONDE</label></li>
        <br></br>
        <p></p>
        </td>
        </tr>
        </table>

        <?php
        } else {
        echo 'Error al cargar';
        }//liberando los recursos
        $result->free();
        }
        /* ---------FIN------------------------SEGUNDA BUSQUEDA-------------------------------------------------------------------------- */
        ?>

        </tbody>
        </table>

        <?php
        /* ------------------------------------------------------------------TERCERA BUSQUEDA */
        ?>

        <section>
        <?php
        if (isset($_POST['buscar'])) {

        $dateinicio = $_POST['dateinicio']; //1
        $datefin = $_POST['datefin'];

        //$cbx_ucf = $_POST['cbx_ucf'];

        include './conexionesbd/conexion_mysql.php';

        $query3 = "SELECT dof.oficina, a.idtusuario, concat_ws(' ',u.pape, u.sape, u.pnom, u.snom) nombres, tea.EstadoActual, count(*) total
        FROM dim_verificacion a    
	left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion     
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil        
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
	left join dim_usuario u on a.idtusuario=u.iddim_usuario
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_resboficio rb on c.iddim_Overificacion=rb.iddim_Overificacion
        where (DATE(rb.fechaEmiBOficio) BETWEEN '$dateinicio' and '$datefin')              
        and b.idDIM_Oficina='$idOficinaUsuario'
        and a.idTEstadoActual in ('2','3','4')
        and a.idTVerificacion='2'        
        group by dof.oficina, a.idtusuario, nombres, tea.EstadoActual
        order by a.idtusuario, total asc";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>ESTADISTICA DE TRANSACCIONES DE VERIFICACION</h2>
</div>

<table id="table_2" border="1" class="table table-hover table-bordered table-condensed table-striped table-fixed">
<div class="table-responsive">                                                      
<div align="center">  
<thead id="">
<tr>
<td id="size_1">OSPE</td>
<td id="size_1">USUARIO</td>
<td id="size_1">ESTADO ACTUAL</td>
<td id="size_1">TOTAL</td>                                    
</tr>
</thead>
</div> 
</div>

<div align="center">  
<div class="panel panel-default">                        
<div class="table-responsive">                                                      
<div align="center">  
<tbody id="">                    
<?php
if ($conexionmysql->query($query3)) {
while ($fila3 = $result->fetch_assoc()) {
$i++;
?>
<tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
<td id="size_2"><?php echo $fila3['oficina'] ?></td>
<td id="size_2"><?php echo $fila3['nombres'] ?></td>
<td id="size_2"><?php echo $fila3['EstadoActual'] ?></td>
<td id="size_2"><?php echo $fila3['total'] ?></td>
</tr>

<?php } ?>
</tbody>
</div></div></div></div>
</table>

<form name="form" action="exportar/reporteExcel_fechasV.php" method="POST"> 
<input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
<input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
<input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
<button type="submit" name="buscar" class="button button1">Exportar Estadistico</button> 
</form>

<form name="form" action="exportar/reporteExcelVspes_fechas_estadistico.php" method="POST"> 
<input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
<input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
<input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
<input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
<button type="submit" name="buscar" class="button button1">Exportar Data S/DH</button>    

</form>

<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();
}
/* --------------INICIO-------------------TERCERA BUSQUEDA-------------------------------------------------------------------------- */
?>
</section>





<?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarfinalizados'])) {
                                                                                                                
$dateinicio = $_POST['dateinicioF']; //1
$datefin = $_POST['datefinF'];
//                                                                                                          
include './conexionesbd/conexion_mysql.php';

$query = "SELECT cp.iddim_Verificacion,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
cp.idTVerificacion,
cp.idTVerificacionPerfil,
cp.idTEstadoActual,  
ov.ordenV,                   
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, 
concat_ws(' ',ai.paterno_t,ai.materno_t,ai.casada_t,ai.nombre1_t,ai.nombre2_t)as nombres,  
ai.idDIM_Oficina,
re.fechaActFirme,
re.ruta_pdf_reso,
re.nombre_PDF_reso,
re.numResBOficio,
cp.observaciones,
re.sunat,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
cp.fCreacion,
cp.fActualizacion,
tvp.VerificacionPerfil
FROM dim_verificacion cp 
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario 
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
left join tipoverificacionperfil tvp on cp.idTVerificacion='2' and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil                    
where (DATE(re.fechaActFirme) BETWEEN '$dateinicio' and '$datefin') 
and tea.idTEstadoActual='3' 
and cp.idTVerificacion='2'
and ai.idDIM_Oficina='$idOficinaUsuario' and re.ruta_pdf_reso is not null
and re.sunat is null or not re.sunat=1
order by cp.iddim_Verificacion asc";


$query1 = "SELECT cp.iddim_Verificacion,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
cp.idTVerificacion,
cp.idTVerificacionPerfil,
cp.idTEstadoActual,  
ov.ordenV,                   
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, 
concat_ws(' ',ai.paterno_t,ai.materno_t,ai.casada_t,ai.nombre1_t,ai.nombre2_t)as nombres,  
ai.idDIM_Oficina,
re.fechaActFirme,
re.ruta_pdf_reso,
re.numResBOficio,
re.nombre_PDF_reso,
cp.observaciones,
re.sunat,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
cp.fCreacion,
cp.fActualizacion,
tvp.VerificacionPerfil
FROM dim_verificacion cp 
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario 
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
left join tipoverificacionperfil tvp on cp.idTVerificacion='2' and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil                    
where (DATE(re.factofirme) BETWEEN '$dateinicio' and '$datefin') 
and tea.idTEstadoActual='3' 
and cp.idTVerificacion='2'
and ai.idDIM_Oficina='$idOficinaUsuario' and re.ruta_pdf_reso is not null
order by cp.iddim_Verificacion asc";


//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
$result1 = $conexionmysql->query($query1);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>

        <form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE FIRMES Y CONSENTIDAS</h2>
    <h6>* Fecha de Acto Firme</h6>    
</div>

        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 10px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 16px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 60px">RESOLUCION BAJA</th>
            <th id="ths1"style="width: 22px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 16px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 10px">SELEC</th>  
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO</th>
            <th id="ths1"style="width: 30px">FECHA CREACION</th>
            <th id="ths1"style="width: 30px">FECHA ACTUALIZACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                if ($conexionmysql->query($query1)) {
   
                while ($fila = $result1->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 10px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 16px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['numResBOficio'] ?></td>
                <td id="tds1"style="width: 22px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 16px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_reso'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombre_PDF_reso'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_reso'] ?>" target="_blank"><?php echo $fila['nombre_PDF_reso'] ?></a>                
            </td> 
<?php
}
?>   
     <td id="tds1" style="text-align: center;width: 10px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombre_PDF_reso']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 40px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['fCreacion'] ?></td>  
                <td id="tds1"style="width: 30px"><?php echo $fila['fActualizacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            
        <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
             
         </div>
         </form>
        <div id="div_1">
         <form name="form" action="exportar/reporteExcelVspes_fechas_terminados_1.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
            <input type="submit" name="buscar" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input> 
          </form> 
            </div>
        <div>
         <form name="form" action="exportar/reporteExcelVspes_fechas_terminados_12.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input> 
          </form>
            </div>
        
<!--        <form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE FIRMES Y CONSENTIDAS</h2>
<h6>* Fecha de Constancia de Acto Firme</h6>
</div>

        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 10px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 16px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 60px">Nº ORDEN DE VERIFICACION</th>
            <th id="ths1"style="width: 22px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 16px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 10px">SELEC</th>  
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO</th>
            <th id="ths1"style="width: 30px">FECHA CREACION</th>
            <th id="ths1"style="width: 30px">FECHA ACTUALIZACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                if ($conexionmysql->query($query)) {
                                     $i = 0;
                while ($fila = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 10px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 16px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['ordenV'] ?></td>
                <td id="tds1"style="width: 22px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 16px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_reso'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombre_PDF_reso'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_reso'] ?>" target="_blank"><?php echo $fila['nombre_PDF_reso'] ?></a>                
            </td> 
<?php
}
?>   
     <td id="tds1" style="text-align: center;width: 10px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombre_PDF_reso']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 40px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['fCreacion'] ?></td>  
                <td id="tds1"style="width: 30px"><?php echo $fila['fActualizacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            
        <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
             
         </div>
         </form>
        <div id="div_1">
         <form name="form" action="exportar/reporteExcelVspes_fechas_terminados.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
            <input type="submit" name="buscar" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input> 
          </form> 
            </div>
        <div>
         <form name="form" action="exportar/reporteExcelVspes_fechas_terminados_2.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input> 
          </form>
            </div>-->
        
            
<table cellspacing="8"> 
<tr>
<td>    
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
<br></br>
<br></br>
<p></p>
</td>
<td>
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">ESTADO ACTUAL </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. PENDIENTE</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. EN PROCESO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. TERMINADO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. ARCHIVO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. NO CORRESPONDE</label></li>
<br></br>
<p></p>
</td>
</tr>
</table>
<?php
} }else {
                echo 'Error al cargar';
            }//liberando los recursos
            $result->free();
        }
        /* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
        ?>
<?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarinhabilitaciones'])) {
                                                                                                                
$dateinicio = $_POST['dateinicioI']; //1
$datefin = $_POST['datefinI'];
//                                                                                                          
include './conexionesbd/conexion_mysql.php';

$query = "SELECT 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
b.dni_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as nombres, 
c.ordenV,
i.dia_pdf,
i.fechaECInicioPSInh,
i.fechaEmiRInh, 
i.fechaFinPInh, i.fechaIFinalInstructor, i.fechaInicioPInh, i.fechaNCInicioPSInh,
i.fechaNMCirculacion, i.fechaNotRInh, i.fechaNPCInicioPSInh, i.fechaNPeruano, i.fechaNWebEssalud, i.iddim_Inhabilitacion, i.iddim_ResBOficio,
i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
i.usuario_pdf, i.validacion,    
i.observaciones_inh observaciones, i.f_despacho, i.carta_despacho, 
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
a.fCreacion,
tvp.VerificacionPerfil

        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_inhabilitacion i on d.iddim_ResBOficio=i.iddim_ResBOficio
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(i.fechaEmiRInh) BETWEEN '$dateinicio' and '$datefin')         
        and a.idTVerificacion='2' 
        AND i.nResInhabilitacion is not null
        and b.idDIM_Oficina='$idOficinaUsuario'
        order by a.iddim_Verificacion asc";


$query1 = "SELECT 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
b.dni_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as nombres, 
c.ordenV,
i.dia_pdf,
i.fechaECInicioPSInh,
i.fechaEmiRInh, 
i.fechaFinPInh, i.fechaIFinalInstructor, i.fechaInicioPInh, i.fechaNCInicioPSInh,
i.fechaNMCirculacion, i.fechaNotRInh, i.fechaNPCInicioPSInh, i.fechaNPeruano, i.fechaNWebEssalud, i.iddim_Inhabilitacion, i.iddim_ResBOficio,
i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
i.usuario_pdf, i.validacion,              
i.observaciones_inh observaciones, i.f_despacho, i.carta_despacho, 
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
a.fCreacion,
tvp.VerificacionPerfil
        FROM dim_verificacion a      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_inhabilitacion i on d.iddim_ResBOficio=i.iddim_ResBOficio
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(i.fechaNotRInh) BETWEEN '$dateinicio' and '$datefin')         
        and a.idTVerificacion='2' 
        AND i.nResInhabilitacion is not null
        and i.ruta_pdf_inhabi is not null
        and i.f_despacho is null
        and b.idDIM_Oficina='$idOficinaUsuario'
        order by a.iddim_Verificacion asc";

//Obteniendo el conjunto de resultados

//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE RESOLUCIONES DE INHABILITACION</h2>
<h6>*Segun Fecha de Emision</h6>
</div>
         
         <form name="form" action="exportar/reporteExcelVspes_fechas_inhabilitaciones.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 
         </form>  <br>


<!--<form action="extraer_pdf_Inhabi.php" method="post">--> 
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 60px">Nº RES DE INHABILITACION</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
<!--            <th id="ths1"style="width: 10px">SELEC</th>  -->
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO POR</th>
            <th id="ths1"style="width: 40px">FECHA DE CREACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                $result = $conexionmysql->query($query);
                if ($conexionmysql->query($query)) {
                while ($fila = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['nResInhabilitacion'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_inhabi'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombrePDFinhabi'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_inhabi'] ?>" target="_blank"><?php echo $fila['nombrePDFinhabi'] ?></a>                
            </td> 
<?php
}
?>
<!--    <td id="tds1" style="text-align: center;width: 10px">
      <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" value="<?php echo $fila['nombrePDFinhabi']?>" readonly=""></input>
      <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>-->
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 40px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            <!--<button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button>--> 
        </div>
    <!--</form>-->
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();

/* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
?> 
             
             
             
             
             <div class="panel-heading" id="panel_1">
<h2>LISTADO DE RESOLUCIONES DE INHABILITACION</h2>
<h6>*Segun Fecha de Notificacion</h6>
</div>
         
         <form name="form" action="exportar/reporteExcelVspes_fechas_inhabilitaciones_2.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 
         </form>  <br>


<form action="extraer_pdf_Inhabi.php" method="post"> 
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 60px">Nº RES DE INHABILITACION</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 10px">SELEC</th>  
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 40px">REGISTRADO POR</th>
            <th id="ths1"style="width: 40px">FECHA DE CREACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                $i = 0;
                $result1 = $conexionmysql->query($query1);

                if ($conexionmysql->query($query1)) {

                while ($fila = $result1->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['nResInhabilitacion'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_inhabi'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombrePDFinhabi'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_inhabi'] ?>" target="_blank"><?php echo $fila['nombrePDFinhabi'] ?></a>                
            </td> 
<?php
}
?>
    <td id="tds1" style="text-align: center;width: 10px">
      <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" value="<?php echo $fila['nombrePDFinhabi']?>" readonly=""></input>
      <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 40px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>
    </form>


<table cellspacing="8"> 
<tr>
<td>    
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
<br></br>
<p></p>
</td>
</tr>
</table>
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result1->free();
}
/* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
?> 



         
<?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarMultas'])) {
                                                                                                                
$dateinicio = $_POST['dateinicioM']; //1
$datefin = $_POST['datefinM'];
//                                                                                                          
include './conexionesbd/conexion_mysql.php';



$query = "SELECT  
b.dni_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as nombres, 
b.fechanacimiento,

concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
tvv.Verificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
c.ordenV,

m.dia_pdf dia_pdfM,

b.RUC, 
b.nomEmpresa, 
b.idTipoTrabajador,
tptra.descripcionTTrabajador,

m.iddim_Overificacion,
m.fechaCartaSGCNT, m.fechaECFiReMulta,m.fechaERMulta, m.fechaIFinalInstructor fechaIFinalInstructor_M, m.fechaIFinalInstructormult, 
m.fechaInSICO, m.fechaNCInicioPSmult, m.fechaNMulta, 
m.fechaNPCInicioPSmult, m.iddim_Multa, m.idTRRBRegistro idTRRBRegistro_M, m.infraccion,
m.montoMulta, m.NcartaSGCNT, m.nombrePDFmulta, m.num num_m, m.numCFiReMulta, m.numCInicioPSMulta,
m.numRMulta,
m.ruta_pdf_multa, m.uit, m.validacion validacion_M,

         
a.observaciones,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
a.fCreacion,
tvp.VerificacionPerfil

        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_multa m on c.iddim_Overificacion =m.iddim_Overificacion
        left join dim_publicacion p on m.numRMulta = p.resolucionpublicada
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(m.fechaERMulta) BETWEEN '$dateinicio' and '$datefin')        
        and a.idTVerificacion='2' 
        and m.numRMulta is not null
        and b.idDIM_Oficina='$idOficinaUsuario'
        order by a.iddim_Verificacion asc";

$query1 = "SELECT  
b.dni_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as nombres, 
b.fechanacimiento,

concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
tvv.Verificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
c.ordenV,

m.dia_pdf dia_pdfM,

b.RUC, 
b.nomEmpresa, 
b.idTipoTrabajador,
tptra.descripcionTTrabajador,

m.iddim_Overificacion,
m.fechaCartaSGCNT, m.fechaECFiReMulta,m.fechaERMulta, m.fechaIFinalInstructor fechaIFinalInstructor_M, m.fechaIFinalInstructormult, 
m.fechaInSICO, m.fechaNCInicioPSmult, m.fechaNMulta, 
m.fechaNPCInicioPSmult, m.iddim_Multa, m.idTRRBRegistro idTRRBRegistro_M, m.infraccion,
m.montoMulta, m.NcartaSGCNT, m.nombrePDFmulta, m.num num_m, m.numCFiReMulta, m.numCInicioPSMulta,
m.numRMulta,
m.ruta_pdf_multa, m.uit, m.validacion validacion_M,
a.observaciones,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
a.fCreacion,
tvp.VerificacionPerfil

        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_multa m on c.iddim_Overificacion =m.iddim_Overificacion
        left join dim_publicacion p on m.numRMulta = p.resolucionpublicada
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(m.fechaNMulta) BETWEEN '$dateinicio' and '$datefin')        
        and a.idTVerificacion='2' 
        and m.numRMulta is not null
        and m.ruta_pdf_multa is not null
        and b.idDIM_Oficina='$idOficinaUsuario'
        order by a.iddim_Verificacion asc";
             
//Obteniendo el conjunto de resultados

//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE MULTAS</h2>
<h6>*Segun Fecha de Emision</h6>
</div>
        
          
         <form name="form" action="exportar/reporteExcelVspes_fechas_multas.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 
          </form>  
<form action="extraer_pdf_Multa.php" method="post"> 
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 45px">Nº RES. DE MULTA</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
<!--            <th id="ths1"style="width: 10px">SELEC</th>  -->
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 30px">REGISTRADO POR</th>
            <th id="ths1"style="width: 20px">FECHA DE CREACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                $result = $conexionmysql->query($query);
                if ($conexionmysql->query($query)) {
                while ($fila = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 45px"><?php echo $fila['numRMulta'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_multa'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombrePDFmulta'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_multa'] ?>" target="_blank"><?php echo $fila['nombrePDFmulta'] ?></a>                
            </td> 
<?php
}
?>
<!--     <td id="tds1" style="text-align: center;width: 10px">
      <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" value="<?php echo $fila['nombrePDFmulta']?>" readonly=""></input>
      <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>-->
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 30px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            
            <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>
    </form>

<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();

/* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
?>   
             
             
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE MULTAS </h2>
<h6>*Segun Fecha de Notificacion</h6>
</div>
        
          
             <form name="form" action="exportar/reporteExcelVspes_fechas_multas_2.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 
          </form>  
<form action="extraer_pdf_Multa.php" method="post"> 
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 45px">Nº RES. DE MULTA</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 10px">SELEC</th>  
            <th id="ths1"style="width: 40px">OBSERVACIONES</th>
            <th id="ths1"style="width: 30px">REGISTRADO POR</th>
            <th id="ths1"style="width: 20px">FECHA DE CREACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                $i=0;
                $result1 = $conexionmysql->query($query1);
                if ($conexionmysql->query($query1)) {
                while ($fila = $result1->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 45px"><?php echo $fila['numRMulta'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_multa'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombrePDFmulta'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
                <a href="<?php echo $fila['ruta_pdf_multa'] ?>" target="_blank"><?php echo $fila['nombrePDFmulta'] ?></a>                
            </td> 
<?php
}
?>
     <td id="tds1" style="text-align: center;width: 10px">
      <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" value="<?php echo $fila['nombrePDFmulta']?>" readonly=""></input>
      <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 30px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            
            <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>
    </form>


<table cellspacing="8"> 
<tr>
<td>    
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
<br></br>
<br></br>
<p></p>
</td>
<td>
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">ESTADO ACTUAL </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. PENDIENTE</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. EN PROCESO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. TERMINADO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. ARCHIVO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. NO CORRESPONDE</label></li>
<br></br>
<p></p>
</td>
</tr>
</table>
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result1->free();
}
/* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
?>   

         
<?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarPublicaciones'])) {
                                                                                                                
$dateinicio = $_POST['dateinicioP']; //1
$datefin = $_POST['datefinP'];
//                                                                                                          
include './conexionesbd/conexion_mysql.php';

$query = "SELECT
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,
a.idTVerificacion,
tvv.Verificacion,
p.resolucionpublicada,
p.femision,
p.fnotificacion,
p.fpublicacion_p,
p.fpublicacion_e,
p.fpublicacion_c,
p.tipo_registro, 
b.RUC, 
b.nomEmpresa,    
b.idTipoTrabajador,
tptra.descripcionTTrabajador,
b.dni_t, 
b.paterno_t, 
concat_ws(' ',b.materno_t,b.casada_t) as materno_t, 
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,
p.nombrePDPubli,
concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t) nombres,
a.idTVerificacionPerfil,
a.iddim_aseguradoindevido, 
a.idTEstadoActual,                                                 
c.ordenV,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
p.fCreacion,
tvp.VerificacionPerfil,
p.ruta_pdf_publi,
p.nombrePDPubli
        FROM dim_verificacion a      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_publicacion p on a.iddim_Verificacion = p.iddim_Verificacion
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(p.fnotificacion) BETWEEN '$dateinicio' and '$datefin')  
        and a.idTVerificacion='2'
        and p.nombrePDPubli is not null
        and p.ruta_pdf_publi is not null
        and b.idDIM_Oficina='$idOficinaUsuario'
        order by a.iddim_Verificacion asc";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<form action="extraer_pdf_Publica.php" method="post"> 
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE PUBLICACIONES</h2>
</div>

        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 60px">Nº RES A PUBLICAR</th>
            <th id="ths1"style="width: 19px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 62px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 10px">SELEC</th>  
            <th id="ths1"style="width: 40px">REGISTRADO POR</th>
            <th id="ths1"style="width: 40px">FECHA DE CREACION</th>
            </tr>  
        </table>             

        <div class="contiene_tabla">
            <table id="tables2">       
                <?php
                if ($conexionmysql->query($query)) {
                while ($fila = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['OFICINA'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['resolucionpublicada'] ?></td>
                <td id="tds1"style="width: 19px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_publi'])) {
            ?>
            <td id="tds1"style="width: 62px"><?php echo $fila['nombrePDPubli'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 62px">
                <a href="<?php echo $fila['ruta_pdf_publi'] ?>" target="_blank"><?php echo $fila['nombrePDPubli'] ?></a>                
            </td> 
<?php
}
?>  
    <td id="tds1" style="text-align: center;width: 10px">
      <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" value="<?php echo $fila['nombrePDPubli']?>" readonly=""></input>
      <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>            
    </td>
                <td id="tds1"style="width: 40px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
            
            <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>
    </form>
         <br/>
         <form name="form" action="exportar/reporteExcelVspes_fechas_publicaciones.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
            <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
            <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
               <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input> 
          </form>  

<table cellspacing="8"> 
<tr>
<td>    
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
<br></br>
<br></br>
<p></p>
</td>
<td>
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">ESTADO ACTUAL </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. PENDIENTE</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. EN PROCESO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. TERMINADO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. ARCHIVO</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. NO CORRESPONDE</label></li>
<br></br>
<p></p>
</td>
</tr>
</table>
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();
}
/* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
?>         
         
         
         
         
<?php
/* --------------INICIO-------------------QUINTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['cbx_dni'])) {
$cbx_dni = $_POST['cbx_dni'];
include './conexionesbd/conexion_mysql.php';
$query00 = "SELECT count(*) total
FROM dim_aseguradoindevido ai 
inner JOIN dim_verificacion aa on ai.iddim_aseguradoindevido=aa.iddim_aseguradoindevido
where ai.dni_t='$cbx_dni'";

$result00 = $conexionmysql->query($query00);

while ($fila00 = $result00->fetch_assoc()) {
if ($fila00['total'] == '0') {
ECHO 'ASEGURADO NO SE ENCONTRO <BR>';
?>
<td><a href="#" id="abriPoppup1"><i class="fas fa-at"></i>CREAR ASEGURADO INDEBIDO</a>
<div id="dialog1" title="REGISTRO DE VERIFICACION INICIATIVA PROPIA" class="contenido">
<iframe src="formVerificacionIniciativaPropia_insert.php" style="width: 100%; height: 90%"></iframe>
</div>
</td> 
<?php
} else {
$query = "SELECT 
ai.iddim_aseguradoindevido,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
cp.idTVerificacion,
cp.idTVerificacionPerfil,
tvp.verificacionperfil,
tea.EstadoActual,
ov.ordenV,                  
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.casada_t,ai.nombre1_t,ai.nombre2_t)as nombres,             
cp.observaciones, 
ai.idTusuario,   
concat_ws(' ',dd.pape,dd.sape, dd.pnom, dd.snom) as nombresusu,         
cp.fCreacion,
cp.fActualizacion       
FROM dim_aseguradoindevido ai 
left join dim_verificacion cp on ai.iddim_aseguradoindevido=cp.iddim_aseguradoindevido
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual   
left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil =tvp.idTVerificacionPerfil
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina   
left join dim_usuario dd on ai.idTusuario=dd.iddim_usuario    
where ai.dni_t='$cbx_dni' 
and cp.idTVerificacion='2'
order by ai.iddim_aseguradoindevido DESC";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<td>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE BAJAS DE REGISTRO DE VERIFICACION</h2>
</div>
</td>
<td><a href="#" id="abriPoppup0"><i class="fas fa-at"></i>CREAR ASEGURADO INDEBIDO</a>
<div id="dialog0" title="REGISTRO DE VERIFICACION INICIATIVA PROPIA" class="contenido">
<iframe src="formVerificacionIniciativaPropia_insert.php" style="width: 100%; height: 90%"></iframe>
</div>
</td> 

         <table class="titulos" id="tables2">
             <tr class="headers" style="text-align: center">
                <th id="ths1"style="width: 30px">OFICINA</th>
                <th id="ths1"style="width: 10px">PROC</th>
                <th id="ths1"style="width: 10px">TIP VERIF</th>
                <th id="ths1"style="width: 25px">EST<br>ACTUAL</th>
                <th id="ths1"style="width: 40px">Nº ORDEN DE VERIFICACION</th>
                <th id="ths1"style="width: 20px">RUC</th>
                <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
                <th id="ths1"style="width: 15px">DNI TIT</th>
                <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
                <th id="ths1"style="width: 40px">OBSERVACIONES</th>
                <th id="ths1"style="width: 40px">REGISTRADO POR</th>
                <th id="ths1"style="width: 15px">FECHA CREACION</th>
                <th id="ths1"style="width: 15px">FECHA ACTUALI.</th>
             </tr>
         </table>
         <div class="contiene_tabla">
             <table id="tables2">
                 <?php
            if ($conexionmysql->query($query)) {
            while ($fila = $result->fetch_assoc()) {
            $i++;
            ?>
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                    <td id="tds1"style="width: 30px"><?php echo $fila['OFICINA'] ?></td>
                    <td id="tds1"style="width: 10px"><?php echo $fila['idTVerificacion'] ?></td>
                    <td id="tds1"style="width: 10px"><a href="#" style="text-decoration:none" title="<?php echo $fila['verificacionperfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                    <td id="tds1"style="width: 25px"><a href="#"  id="abriPoppup<?php echo $i ?>"><?php echo $fila['EstadoActual'] ?></a><div id="dialog<?php echo $i ?>" title="ACTUALIZAR VERIFICACION" class="contenido"><iframe src="formEditarVerificacion.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe></div></td> 
                    <td id="tds1"style="width: 40px"><?php echo $fila['ordenV'] ?></td>
                    <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                    <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>
                    <td id="tds1"style="width: 15px"> <a href="formControlPosteriorAsegurados.php?dni=<?php echo $fila['dni_t'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a></td>
                    <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                    <td id="tds1"style="width: 40px"><?php echo $fila['observaciones'] ?></td>
                    <td id="tds1"style="width: 40px"><?php echo $fila['nombresusu'] ?></td>
                    <td id="tds1"style="width: 15px"><?php echo $fila['fCreacion'] ?></td> 
                    <td id="tds1"style="width: 15px"><?php echo $fila['fActualizacion'] ?></td>  
                </tr>
            <?php } ?>
             </table>
         </div>                

<table cellspacing="8"> 
<tr>
<td>    
<li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">PROCESO DE: </label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CONTROL POSTERIOR</label></li>
<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. VERIFICACION</label></li>
<br></br>
<br></br>
<p></p>
</td>
</tr>
</table>
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();
}
}
} else {
if (isset($_POST['cbx_ruc'])) {
$cbx_ruc = $_POST['cbx_ruc'];
include './conexionesbd/conexion_mysql.php';
$query3 = "SELECT 
ai.iddim_aseguradoindevido,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
cp.idTVerificacion,
cp.idTVerificacionPerfil,
tvp.verificacionperfil,
tea.EstadoActual,
ov.ordenV,                   
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.casada_t,ai.nombre1_t,ai.nombre2_t)as nombres,           
cp.observaciones, 
ai.idTusuario,   
concat_ws(' ',dd.pape,dd.sape, dd.pnom, dd.snom) as nombresusu,         
cp.fCreacion,
cp.fActualizacion       
FROM dim_aseguradoindevido ai 
left join dim_verificacion cp on ai.iddim_aseguradoindevido=cp.iddim_aseguradoindevido
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual   
left join tipoverificacionperfil tvp on cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil and tvp.idTVerificacion='1'
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina   
left join dim_usuario dd on ai.idTusuario=dd.iddim_usuario      
where ai.RUC='$cbx_ruc' 
order by ai.iddim_aseguradoindevido DESC";

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE BAJAS DE REGISTRO DE VERIFICACION</h2>
</div>
<section>
<table id="table_2" border="1" class="table table-hover table-bordered table-condensed table-striped table-fixed">
<div class="table-responsive">                                                      
<div align="center">  
<thead id="">
<tr>
<td id="size_1">OFICINA</td>
<td id="size_2">VERIF</td>
<td id="size_2">T DE VERIF</td>
<td id="size_2">EST<br>ACTUAL</td>
<td id="size_3">Nº ORDEN DE VERIFICACION</td>
<td id="size_1">RUC</td>
<td id="size_1">RAZON SOCIAL</td>
<td id="size_1">DNI_TITULAR</td>
<td id="size_1">APELLIDOS Y NOMBRES</td>
<td id="size_3">OBSERVACIONES</td>
</tr>
</thead>
</div>             

    <tbody id="">                    
    <div class="col-md-1">
    <div class="panel panel-default">                        
    <div class="table-responsive">                                                      
    <div align="center">  
    <?php
    if ($conexionmysql->query($query3)) {
    while ($fila3 = $result->fetch_assoc()) {
    $i++;
    ?>
    <tr>
    <td id="size_11"><?php echo $fila3['OFICINA'] ?></td>
    <td id="size_2"><?php echo $fila3['idTVerificacion'] ?></td>
    <td><?php echo $fila3['idTVerificacionPerfil'] ?></td>
<!--    <td><a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila3['EstadoActual'] ?></a>
    <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
    <iframe src="formEditarVerificacion.php?iddim_CPosterior=<?php echo $fila3['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
    </div>
    </td> -->
    <td id="size_2"><a href="#"  id="abriPoppup<?php echo $i ?>"><?php echo $fila3['EstadoActual'] ?></a><div id="dialog<?php echo $i ?>" title="ACTUALIZAR VERIFICACION" class="contenido"><iframe src="formEditarVerificacion.php?iddim_Verificacion=<?php echo $fila3['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe></div></td> 
    
    <td><?php echo $fila3['ordenV'] ?></td>
    <td><?php echo $fila3['RUC'] ?></td>
    <td><?php echo $fila3['nomEmpresa'] ?></td>  
    
    <td><?php echo $fila3['dni_t'] ?></td>       
    
<!--    <td>
    <a href="#" id="abriPoppupo<?php //echo $i ?>"><?php// echo $fila3['dni_t'] ?>
    </a>
    </td>
    <div id="dialogo<?php// echo $i ?>" title="SGVCA" class="contenido">
    <iframe src="formControlPosteriorAsegurados.php?dni=<?php // echo $fila3['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
    </div>  -->
    <td><?php echo $fila3['nombres'] ?></td>
<td><?php echo $fila3['observaciones'] ?></td>                                
</tr>
<?php } ?>
<?php
} else {
echo 'Error al cargar';
}//liberando los recursos
$result->free();
}
}
/* ----------FIN-----------------------QUINTA BUSQUEDA-------------------------------------------------------------------------- */
?>
</tbody>
</div>
</table>
</section>
<script language="javascript">
$(document).ready(function () {
$("#cbx_ano").change(function () {
//$('#cbx_OficinaAA').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
$("#cbx_ano option:selected").each(function () {
ano = $(this).val();
$.post("include/getFechaV.php", {ano: ano}, function (data) {
$("#cbx_estadoActual").html(data);
});
});
});
});
</script>
<script type='text/javascript'>
function openCity(evt, cityName) {
// Declare all variables
var i, tabcontent, tablinks;
// Get all elements with class="tabcontent" and hide them
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
// Get all elements with class="tablinks" and remove the class "active"
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
// Show the current tab, and add an "active" class to the button that opened the tab
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";
}
</script>
                                                                                                                                                                    <script>
$(function () {
<?php
for ($i = 0; $i <= 200; $i++) {
    ?>
$("#dialog<?php echo $i ?>").hide();
function abrir<?php echo $i ?>() {
$("#dialog<?php echo $i ?>").show();
$("#dialog<?php echo $i ?>").dialog({
resizable: true,
width: 1200,
height: 800,
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
<script type="text/javascript">
function popUp(URL) {
window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
}
</script>
</body>
</html>