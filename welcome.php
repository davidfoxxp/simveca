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
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical 
right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
        <meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
       
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />

        <!-- Beginning of compulsory code below -->

        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        
               
     
        <link rel="stylesheet" type="text/css" href="css/tablas.css"/>


        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/> 
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>
        
        
        
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
                max-width: 600px;
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

        </style>
        <!-- / END -->
        

    
    </head>
    <body class="vimeo-com">


        <h4><img src="imagenes/logo_login.png" alt="" />

            <?PHP
            echo '<br>OSPE: ' . $row['cod_oficinaIni'] . '-' . $row['oficinaIni'] . '-' . ($row['oficina']);
            echo '<br>UCF: ' . $row['codOficina'] . '-' . ($row['oficina']);
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
                            <!--<li><a href="formListarControlPosterior">Registros de Bajas de TODAS las OSPE</a></li>-->
                        </ul>
                    </li>			
                </ul>
            </li>
<!--            <li><a href="#">Control Posterior AJAX</a>
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
                            <li><a href="formListarControlPosteriorUsuario_1.php">Registros de Bajas</a></li>
                            <li><a href="formListarControlPosterior">Registros de Bajas de TODAS las OSPE</a></li>
                        </ul>
                    </li>			
                </ul>
            </li>-->
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
            </li>
            
            <li><a href="#">CONSULTAS BAJ F Y CONS</a>
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
            <li class="dir">Otros Aplicativos
                <ul>
                    <li class="first"><a href="./" class="dir">Institucionales</a>
                        <ul>
                            <li class="first"><a href="./">Corporate Use</a></li>
                            <li class="last"><a href="./">Private Use</a></li>
                        </ul>
                    </li>
                    <li><a href="./" class="dir">Externos</a>
                        <ul>
                            <li class="first"><a href="./">Corporate Use</a></li>
                            <li class="last"><a href="./">Private Use</a></li>
                        </ul>			
                </ul>
            </li>
            <li><a href="logout.php">Salir</a></li>
            <li>
                    <form action="" method="post" >
                        <?php 
                            $i=0;
                            ?>
                            <tr>
                                 <td id="ok"><a href="#" id="abriPoppup<?php echo $i ?>">Cambiar Contraseña</a>
                                     
                                     <div id="dialog<?php echo $i ?>"  title="CAMBIAR CONTRASEÑA"  class="contenido"> 
                                         <iframe src="cambiarcontrasena.php" style="width: 100%; height: 90%"></iframe>
                                    </div>
                                 </td>
                            </tr>
                        
                    </form>
                </li>
        </ul>
        <!-- / END -->


        <!-- Tab links -->
       

        
<script type='text/javascript'>
            function openCity(evt, cityName){
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++){
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
for ($i = 0; $i <= 100; $i++) {
    ?>
                    $("#dialog<?php echo $i ?>").hide();
                    function abrir<?php echo $i ?>() {
                        $("#dialog<?php echo $i ?>").show();
                        $("#dialog<?php echo $i ?>").dialog({
                            resizable: false,
                            width: 400,
                            height: 265,
                            modal: true
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
