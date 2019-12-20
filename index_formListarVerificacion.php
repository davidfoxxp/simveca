<?php

session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni, u.idTperfiles,
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
        <title>SISGASV</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical 
              right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
        <meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/tablas.css"/>

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

            #panel_leyenda {
            position:fixed;
            left:50px;
            bottom:240px;
            height:0px;
            width:100%;
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
         <style>
            div.contiene_tabla, div.contiene_tabla2 { 
height: 220px; 
overflow: auto; 
overflow-y: auto; 
overflow-x: hidden; 
width: 1405px; /*TAMAÑO ASTA DONDE SE PROYECTA PARA SALIR EL SCROLL*/
/*border-bottom: solid 1px #87CEFA; 
border-right: solid 1px #87CEFA; */
} 
 div.contiene_tablaX1, div.contiene_tabla2X1 { 
height: 70px; 
overflow: auto; 
overflow-y: auto; 
overflow-x: hidden; 
width: 720px; /*TAMAÑO ASTA DONDE SE PROYECTA PARA SALIR EL SCROLL*/
/*border-bottom: solid 1px #87CEFA; 
border-right: solid 1px #87CEFA; */
} 
#tables2 { 
background-color: #FFFFFF; /*COLOR FONDO DE LA TABLA MENOS TH*/
color: black; /*color de letras*/
table-layout: fixed; 
width: 1390px; /*TAMAÑO DE LA CABEZERA Y CUERPO DE LA TABLA*/
} 
 #tablesX1 { 
background-color: #FFFFFF; /*COLOR FONDO DE LA TABLA MENOS TH*/
color: black; /*color de letras*/
table-layout: fixed; 
width: 700px; /*TAMAÑO DE LA CABEZERA Y CUERPO DE LA TABLA*/
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
    max-width: 1200px;
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
<script language="javascript">

$(document).ready(function () {
                $("#cbx_ospe2").change(function () {
                    $("#cbx_ospe2 option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucf2").html(data);
                        });
                    });
                });
            });
            $(document).ready(function () {
                $("#cbx_ospe3").change(function () {
                    $("#cbx_ospe3 option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucf3").html(data);
                        });
                    });
                });
            });

           
            $(document).ready(function () {
                $("#cbx_ospe").change(function () {
                    $("#cbx_ospe option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucf").html(data);
                        });
                    });
                });
            });
            
            
             $(document).ready(function () {
                $("#cbx_ospee").change(function () {
                    $("#cbx_ospee option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucff").html(data);
                        });
                    });
                });
            });
            
            $(document).ready(function () {
                $("#cbx_ospeee").change(function () {
                    $("#cbx_ospeee option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucfff").html(data);
                        });
                    });
                });
            });

            $(document).ready(function () {
                $("#cbx_ospeeee").change(function () {
                    $("#cbx_ospeeee option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios2.php", {oficina: oficina}, function (data) {
                            $("#cbx_ucffff").html(data);
                        });
                    });
                });
            });
        </script>


    </head>
    <body class="vimeo-com">

<h4><img src="imagenes/logo_login.png" alt="" />

            <?PHP
            echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni'] . '-' . utf8_decode($row['oficina']));
            echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . utf8_decode($row['oficina']);
            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = utf8_decode($row['oficina']);
            $idTperfiles = utf8_decode($row['idTperfiles']);
            ?>  
        </h4>
        <!-- Beginning of compulsory code below -->
        <div class="panel-heading" id="panel_1">
            <ul id="nav" class="dropdown dropdown-horizontal">
                
                 <li ><a href="#">Listar</a>
                <ul>
                    <li class="first"><a href="index_formListarControlPosterior.php">Listar Control Posterior de todas las OSPES</a></li>
                    <li class="first"><a href="index_formListarVerificacion.php">Listar Verificacion de todas las OSPES</a></li>
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
        </div>
        <!-- / END -->


        <!-- Tab links -->

       <div class="tab" style="border-radius: 8px;  border: 2px solid #008CBA; width: 100%;" >
            <?PHP
            if($idTperfiles<>1) {
            ?>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'TODOINGRESADO')">BAJA EMITIDA Y ARCHIVO</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'ESTADISTICO')">ESTADISTICO</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" title="SOLO SE MOSTRARAN LAS QUE TIENEN PDF"onclick="openCity(event, 'firmesyconsentidasve')">FIRMES Y CONSENTIDAS</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'INHABILITACIONES')">INHABILITACIONES</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'MULTAS')">MULTAS</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'PUBLICACIONES')">PUBLICACIONES</button>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'POWER_BI')">POWER BI</button>
            <?PHP
            }
            ?>
            <button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'DNIRUC')">DNI/RUC</button>
        </div>
        <!-- Tab content -->
       <div class="tabcontent" id="TODOINGRESADO">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';
                        $query = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
                    where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
                    order by o.oficina asc";
                        $resultado = $conexionmysql->query($query);
                        ?>
                         <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                            <select name="cbx_oficina" id="cbx_oficina" class="con_estilos" required="">
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                                <?php } ?>
                            </select>
                        </div>                       
                        <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                            <select name="cbx_OficinaAA" id="cbx_OficinaAA" required="" class="con_estilos"></select>
                        </div>  
                        
                    <div class="formleyenda">
                        <label>AÑO</label>
                        <select name="cbx_ano" id="cbx_ano" required=""></select>
                        <?PHP
                        ?>
                    </div>
                        
<!--                          <?PHP
                        $query1 = "SELECT DISTINCT(tea.idTEstadoActual), tea.EstadoActual
                            FROM tipoestadoactual tea
                            where tea.idTEstadoActual 
                            and not tea.idTEstadoActual in ('1','5')
                            order by tea.idTEstadoActual asc";
                        $resultado1 = $conexionmysql->query($query1);
                        ?>

                        <div class="formleyenda">SELECCIONE TIPO DE ESTADO 
                            <select name="cbx_estadoActual" id="cbx_estadoActual" class="con_estilos" >
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTEstadoActual']; ?>"><?php echo $row['EstadoActual']; ?></option>
                                <?php } ?>

                            </select>
                        </div> -->
                        
                                <div class="control" >
                        <label for="meses">MESES A FILTRAR</label>  
            <div id="check" >
                <td><input type="checkbox" name="enero" value="1"><label id="check_td">ENERO</label></input>
                </td>
                <td><input type="checkbox" name="febrero" value="2"><label id="check_td">FEBRERO</label></input>
                </td>
                <td><input type="checkbox" name="marzo" value="3"><label id="check_td">MARZO</label></input>
                </td>
                <td><input type="checkbox" name="abril" value="4"><label id="check_td">ABRIL</label></input>
                </td>
                <td><input type="checkbox" name="mayo" value="5"><label id="check_td">MAYO</label></input>
                </td>
                <td><input type="checkbox" name="junio" value="6"><label id="check_td">JUNIO</label></input> 
                </td><br>                                
            </div>
            <div id="check">
                <td><input type="checkbox" name="julio" value="7"><label id="check_td">JULIO</label></input>
                </td>
                <td><input type="checkbox" name="agosto" value="8"><label id="check_td">AGOSTO</label></input>
                </td>
                <td><input type="checkbox" name="setiembre" value="9"><label id="check_td">SETIEMBRE</label></input>
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
                            <button type="submit" class="button button1">Filtrar</button>
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>
     <div class="tabcontent" id="ESTADISTICO">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';
                        $query = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
                    where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
                    order by o.oficina asc";
                        $resultado = $conexionmysql->query($query);
                        ?>

                        <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                            <select name="cbx_ospe" id="cbx_ospe" class="con_estilos" required="">
                                <option value="">LISTA</option>
                                <option value="">TODOS</option>  
                                <?php while ($row = $resultado->fetch_assoc()) { ?>                                    
                                    <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                            <select name="cbx_ucf" id="cbx_ucf" required="" class="con_estilos"></select>
                        </div>  
                       
                                            
                        <div>
                         FECHA DE INICIO <input type="date" name="dateinicio" value="2018-07-26" >    
                                 
                FECHA DE FIN <input type="date" name='datefin'>                  
                <BR>
                    <div class="formleyenda">
                        <button type="submit" class="button button1" name="buscar">Filtrar</button>
            
                    </div>
</div>
                    </form>
                </fieldset>
            </div>
        </div>
              <div id="firmesyconsentidasve" class="tabcontent">
<div class="contieneportafolio" id="contieneportafolio_1">
<fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';
                        $query = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
                    where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
                    order by o.oficina asc";
                        $resultado = $conexionmysql->query($query);
                        ?>

                        <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                            <select name="cbx_ospe3" id="cbx_ospe3" class="con_estilos" required="">
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                            <select name="cbx_ucf3" id="cbx_ucf3" required="" class="con_estilos"></select>
                        </div>  
                       
                                            
                        <div>
                         FECHA DE INICIO <input type="date" name="dateinicioF"/>    
                                 
                FECHA DE FIN <input type="date" name='datefinF'/>                  
                <BR>
                    <div class="formleyenda">
                        <button type="submit" class="button button1" name="buscarfirmesyconsentidasve">Filtrar</button>
            
                    </div>
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
         <?PHP
                include './conexionesbd/conexion_mysql.php';
                $queryin = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
            where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
            order by o.oficina asc";
                $resultadoin = $conexionmysql->query($queryin);
                ?>

                <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                    <select name="cbx_ospee" id="cbx_ospee" class="con_estilos" required="">
                        <option value="">TIPO</option>
                        <!--<option value="">TODOS</option>-->  
                        <?php while ($row = $resultadoin->fetch_assoc()) { ?>                                    
                            <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                    <select name="cbx_ucff" id="cbx_ucff" required="" class="con_estilos"></select>
                </div>  
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
         <?PHP
                include './conexionesbd/conexion_mysql.php';
                $queryin = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
            where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
            order by o.oficina asc";
                $resultadoin = $conexionmysql->query($queryin);
                ?>

                <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                    <select name="cbx_ospeee" id="cbx_ospeee" class="con_estilos" required="">
                        <option value="">TIPO</option>
                        <!--<option value="">TODOS</option>-->  
                        <?php while ($row = $resultadoin->fetch_assoc()) { ?>                                    
                            <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                    <select name="cbx_ucfff" id="cbx_ucfff" required="" class="con_estilos"></select>
                </div>  
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
         <?PHP
                include './conexionesbd/conexion_mysql.php';
                $queryin = "SELECT DISTINCT(O.oficina) FROM dim_oficina O 
            where (not o.tipoOficina='0') and O.nomenclatura='OSPE'
            order by o.oficina asc";
                $resultadoin = $conexionmysql->query($queryin);
                ?>

                <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                    <select name="cbx_ospeeee" id="cbx_ospeeee" class="con_estilos" required="">
                        <option value="">TIPO</option>
                        <!--<option value="">TODOS</option>-->  
                        <?php while ($row = $resultadoin->fetch_assoc()) { ?>                                    
                            <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                    <select name="cbx_ucffff" id="cbx_ucffff" required="" class="con_estilos"></select>
                </div>  
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
                  
        
        <div id="DNIRUC" class="tabcontent">
            <div class="contieneportafolio" id="contieneportafolio_1">
                <div class="formleyenda" id="check">
                    <form action="" method="post">
                        <div class="formleyenda">INGRESE DNI</div>
                        <input type="text" name="cbx_dni" id="cbx_dni" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                    event.returnValue = false;" maxlength="11" required="">
                            <button type="submit" class="button button1">Filtro 1</button>             
                    </form>
                </div>

                <div class="formleyenda" id="check">
                    <form action="" method="post">
                        <div class="formleyenda">INGRESE RUC</div>
                        <input type="text" name="cbx_ruc" id="cbx_ruc" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                    event.returnValue = false;" maxlength="11" required="">
                            <button type="submit" class="button button1">Filtro 2</button>        
                    </form>
                </div>
            </div>
        </div>

        <div class="tabcontent" id="POWER_BI">            
        <iframe width="1300" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiMmUwZWZjZWEtZmQwZi00ZDFkLTgwOWYtMzZiYjRkNzg1NDYzIiwidCI6IjM0ZjMyNDE5LTFjMDUtNDc1Ni04OTZlLTQ1ZDYzMzcyNjU5YiIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>
        </div>
        
        <?php
        /* ------------INICIO---------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */

         if (isset($_POST['cbx_oficina'])) {
            $cbx_OficinaAA = $_POST['cbx_OficinaAA'];    //id oficina   
            $ano = $_POST['cbx_ano']; 
//            $cbx_estadoActual = $_POST['cbx_estadoActual'];

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
concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t) as asegurado,
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
        and b.idDIM_Oficina='$cbx_OficinaAA'
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion asc"; 
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            
            
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
concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t) as asegurado,
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
        left join dim_oficina_2 doff on a.casoDerivado=doff.codOficina
        where month(a.fechaDDerivado) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(a.fechaDDerivado)='$ano'        
        and b.idDIM_Oficina='$cbx_OficinaAA'
        and a.idTEstadoActual in ('3','4')
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion asc";

//Obteniendo el conjunto de resultados
$result_der = $conexionmysql->query($query_der);

            
            
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO VERIFICACION BAJAS EMITIDAS Y/O ARCHIVO</h2>
            </div>
        
         <table>
            <tr>
            <td>
        <form name="form" action="exportar/reporteExcelGestores_BajasEmitidasVerifi.php" method="POST">
                    <input id="i2" type="hidden" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly"></input>
                    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
                    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
                    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
                    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
                    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
                    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
                    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
                    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
                    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
                    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
                    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
                    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
                    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
                    <input type="submit" name="buscar" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input>
            </form>
         </td>
            <td>
                <form name="form" action="exportar/reporteExcelGestores_BajasEmitidasVerifi_1.php" method="POST">
<input id="i2" type="hidden" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly"></input>
                    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
                    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
                    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
                    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
                    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
                    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
                    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
                    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
                    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
                    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
                    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
                    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
                    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
                    <input type="submit" name="buscar" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input>
            </form>
                </td>
                </tr>
            </table>
        
        
        
<!--        <form name="form" action="exportar/reporteExcelGestores_BajasEmitidasVerifi.php" method="POST">                     
                        <input id="i2" type="hidden" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly"></input>
                    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
                    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
                    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
                    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
                    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
                    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
                    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
                    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
                    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
                    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
                    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
                    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
                    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
                    <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"></input>
                </form>-->
           
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

        <form name="form" action="exportar/reporteExcelGestores_BajasEmitidasVerifi_der.php" method="POST">                     
                        <input id="i2" type="hidden" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly"></input>
                    <input id="i3" type="hidden" name="cbx_ano" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
                    <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
                    <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
                    <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
                    <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
                    <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
                    <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
                    <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
                    <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
                    <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
                    <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
                    <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
                    <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
                    <input type="submit" name="buscar" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input>
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
if (isset($_POST['buscar'])) {

    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $cbx_ucf = $_POST['cbx_ucf'];
    include './conexionesbd/conexion_mysql.php';                                                
                                                
   $query3="SELECT  
		dof.oficina, 
		tea.EstadoActual,
                CASE 
                WHEN ve.idTEstadoActual='3' THEN 'SI'
                WHEN ve.idTEstadoActual='4' THEN 'NO'
                END AS GENERABAJA,
                 CASE 
                WHEN ve.idTEstadoActual='3' THEN 'N° BAJAS EMITIDAS'
                WHEN ve.idTEstadoActual='4' THEN 'N° CASOS EN CONFORMIDAD'
                END AS ACTO,
                count(distinct ove.iddim_Overificacion) total
                FROM dim_overificacion ove
                left join dim_resboficio rb on ove.iddim_Overificacion=rb.iddim_Overificacion
                left join dim_verificacion ve on ove.iddim_Overificacion= ve.iddim_Verificacion
                left join tipoverificacionperfil tvp on ve.idTVerificacion=tvp.idTVerificacion and ve.idTVerificacionPerfil=tvp.idTVerificacionPerfil   
                LEFT JOIN TIPOVERIFICACIONPERFIL TPFF ON ve.origenverif=TPFF.IDTVERIFICACIONPERFIL AND tpff.idTVerificacion='2'         
                left join dim_oficina dof on ove.idDIM_Oficina=dof.idDIM_Oficina
                left join tipoestadoactual tea on ve.idTEstadoActual=tea.idTEstadoActual
		where (DATE(rb.fechaEmiBOficio) BETWEEN '$dateinicio' and '$datefin') 
		and ove.idDIM_Oficina in ($cbx_ucf)
		GROUP BY tea.EstadoActual,GENERABAJA, ACTO,dof.oficina";
   
 
   
   

    $query4="SELECT  
		dof.oficina, 
		tea.EstadoActual,
		CASE 
        WHEN ve.idTEstadoActual='3' THEN 'SI'
        WHEN ve.idTEstadoActual='4' THEN 'NO'
        WHEN ve.idTEstadoActual='2' THEN '--'
        END AS GENERABAJA,
  
        count(distinct ove.iddim_Overificacion) total
        FROM dim_overificacion ove
        left join dim_resboficio rb on ove.iddim_Overificacion=rb.iddim_Overificacion
        left join dim_verificacion ve on ove.iddim_Overificacion= ve.iddim_Verificacion
        left join tipoverificacionperfil tvp on ve.idTVerificacion=tvp.idTVerificacion and ve.idTVerificacionPerfil=tvp.idTVerificacionPerfil   
        LEFT JOIN TIPOVERIFICACIONPERFIL TPFF ON ve.origenverif=TPFF.IDTVERIFICACIONPERFIL AND tpff.idTVerificacion='2'         
        left join dim_oficina dof on ove.idDIM_Oficina=dof.idDIM_Oficina
        left join tipoestadoactual tea on ve.idTEstadoActual=tea.idTEstadoActual
		where (DATE(ove.fCreacion) BETWEEN '$dateinicio' and '$datefin') 
                and ve.idTEstadoActual=2
		and ove.idDIM_Oficina in ($cbx_ucf)
		GROUP BY tea.EstadoActual,GENERABAJA,dof.oficina";
    

    
                date_default_timezone_set('America/Bogota');
                $fecha_hora_updateo = date('Y-m-d G:i:s');
                $result = $conexionmysql->query($query3);
                $result1 = $conexionmysql->query($query4);
                
                $i = 0;
                ?>
                    <div class="panel-heading" id="panel_1">
                        <?php 
                        $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
                        $fin = strftime("%d-%m-%Y", strtotime($datefin));
                        $fechahoy=strftime("%d-%m-%Y", strtotime($fecha_hora_updateo));
                        ?>
<h2>ESTADISTICA DE TRANSACCIONES DE VERIFICACION <?php echo "DESDE ".$inicio." HASTA ".$fin; ?>  </h2>
                    </div>
<h4>TOTAL DE TERMINANDOS CON FECHA DE EMISION DE BAJA Y/O ARCHIVADAS DENTRO DEL PERIODO SELECCIONADO</h4>  
<table class="titulos" id="tablesX1">
    <tr class="headers" style="text-align: center">
        
        <th id="ths1"style="width: 40px">OSPE</th>
        <th id="ths1"style="width: 40px">PROCESO</th>
        <th id="ths1"style="width: 32px">ESTADO ACTUAL</th>
        <!--<th colspan="2" id="ths1"style="width: 23px">GENERA BAJA</th>-->
        <th colspan="2" id="ths1"style="width: 120px">GENERA ACTO ADMINISTRATIVO</th>
        <th id="ths1"style="width: 20px">TOTAL</th>
    </tr>
</table>  
<div class="contiene_tablaX1">
     <table id="tablesX1">  
        <?php
        if ($conexionmysql->query($query3)) {
            while ($fila3 = $result->fetch_assoc()) {
                $i++;
                ?>                                       
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                    
                    <td id="tds1"style="width: 40px;text-align: center"><?php echo $fila3['oficina'] ?></td>
                    <td id="tds1"style="width: 40px;text-align: center">VERIFICACION</td> 
                    <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila3['EstadoActual'] ?></td>
                    <td id="tds1"style="width: 23px;text-align: center"><?php echo $fila3['GENERABAJA'] ?></td>
                    <td id="tds1"style="width: 90px;text-align: left"><?php echo $fila3['ACTO'] ?></td>
                    <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila3['total'] ?></td>
                </tr>
            <?php } ?>
     </table>
</div> 
 <form name="form" action="exportar/reporteExcelVspes_fechas_estadistico_veriGesto.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscar" title="SE LISTARA"class="button button1">Exportar Terminados</button> 
</form>
<br></br>
<h4>TOTAL EN PROCESOS CREADOS EN EL RANGO DE FECHAS SELECCIONADOS</h4>            
<table class="titulos" id="tablesX1">
    <tr class="headers" style="text-align: center">
            <th id="ths1"style="width: 40px">OSPE</th>
            <th id="ths1"style="width: 32px">ESTADO ACTUAL</th>
            <th id="ths1"style="width: 23px">GENERA BAJA</th>
            <th id="ths1"style="width: 20px">TOTAL</th>
            <th id="ths1"style="width: 120px">POR FECHA</th>
        </tr>
</table>  
<div class="contiene_tablaX1">
    <table id="tablesX1">                
        <?php
        if ($conexionmysql->query($query4)) {
            while ($fila4 = $result1->fetch_assoc()) {
                $i++;
                ?>                                       
                    <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                        <td id="tds1"style="width: 40px;text-align: center"><?php echo $fila4['oficina'] ?></td>
                        <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila4['EstadoActual'] ?></td>
                        <td id="tds1"style="width: 23px;text-align: center"><?php echo $fila4['GENERABAJA'] ?></td>
                        <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila4['total'] ?></td>
                        <td id="tds1"style="width: 120px;text-align: center">CREACION DEL RANGO SELECCIONADO</td> 
                    </tr>
        <?php } ?>
    </table>
</div> 
<form name="form" action="exportar/reporteExcelVspes_fechas_veriGestoProces.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscar" title="SE LISTARA"class="button button1">Exportar En Proceso</button> 
</form>    

    <?php
                     } }else {
        echo 'Error al cargar';
    }//liberando los recursos
    $result->free();
}
?>
       
   <?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarfirmesyconsentidasve'])) {
$dateinicioF = $_POST['dateinicioF']; //1
    $datefinF = $_POST['datefinF'];
    
    $cbx_ospeF = $_POST['cbx_ospe3'];
        $cbx_ucfF = $_POST['cbx_ucf3'];
        
    include './conexionesbd/conexion_mysql.php';
    
    $query = "SELECT cp.iddim_Verificacion,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
cp.idTVerificacion,
cp.idTVerificacionPerfil,
cp.idTEstadoActual,  
ov.ordenV,                   
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, 
concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombres,
re.fechaEmiBOficio,
re.numResBOficio,
re.ruta_pdf_reso,
re.nombre_PDF_reso,
re.fechaActFirme fechaconstanciaActFirme,
re.factofirme,
re.sunat,
case 
when re.sunat='1' then 'SI'
when re.sunat IS NULL then 'NO'                
end as SUNAT_S, 
cp.observaciones,
usu.numDocIdentidad usuarioase_dni,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
cp.fCreacion,
tvp.VerificacionPerfil
FROM dim_verificacion cp   
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario 
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil =tvp.idTVerificacionPerfil                
where (DATE(re.fechaActFirme) BETWEEN '$dateinicioF' and '$datefinF') 
and tea.idTEstadoActual='3' 
and cp.idTVerificacion='2'
and ai.idDIM_Oficina='$cbx_ucfF' and re.ruta_pdf_reso is not null
and re.sunat is null or not re.sunat=1    
order by cp.iddim_Verificacion ASC";
      
        $query1 = "SELECT cp.iddim_Verificacion,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
cp.idTVerificacion,
cp.idTVerificacionPerfil,
cp.idTEstadoActual,  
ov.ordenV,                   
ai.RUC, ai.nomEmpresa,                                                     
ai.dni_t, 
concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombres,
re.fechaEmiBOficio,
re.numResBOficio,
re.ruta_pdf_reso,
re.nombre_PDF_reso,
re.sunat,
case 
when re.sunat='1' then 'SI'
when re.sunat IS NULL then 'NO'                
end as SUNAT_S, 
re.fechaActFirme fechaconstanciaActFirme,
re.factofirme,
cp.observaciones,
usu.numDocIdentidad usuarioase_dni,
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
cp.fCreacion,
tvp.VerificacionPerfil
FROM dim_verificacion cp   
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario 
left join dim_overificacion ov on cp.iddim_Verificacion=ov.iddim_Overificacion
left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil =tvp.idTVerificacionPerfil                
where (DATE(re.factofirme) BETWEEN '$dateinicioF' and '$datefinF') 
and tea.idTEstadoActual='03' 
and cp.idTVerificacion='2'
and ai.idDIM_Oficina='$cbx_ucfF' and re.ruta_pdf_reso is not null
and re.sunat is null or not re.sunat=1
order by cp.iddim_Verificacion ASC";
  

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
$result1 = $conexionmysql->query($query1);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE FIRMES Y CONSENTIDAS DE VERIFICACION</h2>
    <h6>* Fecha de Acto Firme</h6>   
</div>
            
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
            <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 100px">Nº DE LA RESOLUCION</th>
            <th id="ths1"style="width: 30px">RUC</th>
            <th id="ths1"style="width: 60px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 30px">DNI TIT</th>
            <th id="ths1"style="width: 60px">APELLIDOS Y NOMBRES</th>
            
            <th id="ths1"style="width: 40px">F ACTO FIRME</th>
            <th id="ths1"style="width: 40px">F CONST ACT F</th>
            
            <th id="ths1"style="width: 90px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 15px">SELEC</th>
<!--             <th id="ths1"style="width: 18px">REP. SUNAT</th>  -->
            <th id="ths1" style="width: 80px">OBSERVACIONES</th>     
            <th id="ths1"style="width: 28px">REGISTRADO</th>
            <th id="ths1"style="width: 40px">FECHA CREACION</th>
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
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 100px"><?php echo $fila['numResBOficio'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 60px"><?php echo $fila['nomEmpresa'] ?></td>   
                
                
               <td id="tds1" style="width: 30px">
                <a href="index_formListarVerificacion_visualizar.php?iddim_Verificacion=<?php echo $fila['iddim_Verificacion'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a>
               
            </td>
                <td id="tds1"style="width: 60px"><?php echo $fila['nombres'] ?></td>
                
                
                        <td id="tds1"style="width: 40px">
            <?php echo $fila['factofirme'] ?></td>
        
        
        <td id="tds1"style="width: 40px">
            <?php echo $fila['fechaconstanciaActFirme'] ?></td>
                
                  <?php
        if (is_null($fila['ruta_pdf_reso'])) {
            ?>
            <td id="tds1"style="width: 90px"><?php echo $fila['nombre_PDF_reso'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 90px">
                <a href="<?php echo $fila['ruta_pdf_reso'] ?>" target="_blank"><?php echo $fila['nombre_PDF_reso'] ?></a>                
            </td> 
<?php
}
?>            
             <td id="tds1" style="text-align: center;width: 15px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombre_PDF_reso']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $cbx_ospeF ?>"></input>
            <?PHP
            
            //$oficina = utf8_decode($row['oficina']);
            ?>
       
<!--           <td id="tds1"style="width: 18px">
            <?php echo $fila['SUNAT_S'] ?></td>-->
        
    </td>
                <td id="tds1"style="width: 80px"><?php echo $fila['observaciones'] ?></td> 
                <td id="tds1"style="width: 28px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioase'] ?>"> <?php echo $fila['usuarioase_dni'] ?></a></td>                
                <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
       <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>         
         </form>
         
<!--        <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasVE" class="button button2">Exportar Excel</button> 
          </form>-->

<div id="div_1">
        <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores_2.php" method="POST">               
           <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
            <input type="submit" name="buscarfirmesyconsentidasVE" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input> 
          </form> 
    </div>
<div>
         <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>   
               <input type="submit" name="buscarfirmesyconsentidasVE" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input> 
          </form>
</div>

<!--<form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE FIRMES Y CONSENTIDAS DE VERIFICACION</h2>
    <h6>* Fecha de Constancia de Acto Firme</h6>
</div>
            
        <table class="titulos" id="tables2">
            <tr class="headers" style="text-align: center">
             <th id="ths1" style="width: 10px">N</th>
            <th id="ths1"style="width: 40px">OFICINA</th>
            <th id="ths1"style="width: 8px">PROC</th>
            <th id="ths1"style="width: 8px">T DE<br/>VERIF</th>    
            <th id="ths1"style="width: 14px">EST<br/>ACTUAL</th>
            <th id="ths1"style="width: 90px">Nº DE LA RESOLUCION</th>
            <th id="ths1"style="width: 30px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 20px">DNI TIT</th>
            <th id="ths1"style="width: 60px">APELLIDOS Y NOMBRES</th>
            
            <th id="ths1"style="width: 40px">F ACTO FIRME</th>
            <th id="ths1"style="width: 40px">F CONST ACT F</th>
            
            <th id="ths1"style="width: 70px">NOMBRE DEL PDF</th>
            <th id="ths1"style="width: 15px">SELEC</th>
            <th id="ths1"style="width: 45px">OBSERVACIONES</th>
            <th id="ths1"style="width: 28px">REGISTRADO</th>
            <th id="ths1"style="width: 40px">FECHA CREACION</th>
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
                <td id="tds1"style="width: 8px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                <td id="tds1"style="width: 8px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['VerificacionPerfil'] ?>"> <?php echo $fila['idTVerificacionPerfil'] ?></a></td>
                <td id="tds1"style="width: 14px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                <td id="tds1"style="width: 90px"><?php echo $fila['numResBOficio'] ?></td>
                <td id="tds1"style="width: 30px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>   
                
                
               <td id="tds1" style="width: 20px">
                <a href="index_formListarVerificacion_visualizar.php?iddim_Verificacion=<?php echo $fila['iddim_Verificacion'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a>
               
            </td>
                <td id="tds1"style="width: 60px"><?php echo $fila['nombres'] ?></td>
                
                <td id="tds1"style="width: 40px">
            <?php echo $fila['factofirme'] ?></td>
        
        
        <td id="tds1"style="width: 40px">
            <?php echo $fila['fechaconstanciaActFirme'] ?></td>
                
                  <?php
        if (is_null($fila['ruta_pdf_reso'])) {
            ?>
            <td id="tds1"style="width: 70px"><?php echo $fila['nombre_PDF_reso'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 70px">
                <a href="<?php echo $fila['ruta_pdf_reso'] ?>" target="_blank"><?php echo $fila['nombre_PDF_reso'] ?></a>                
            </td> 
<?php
}
?>            
             <td id="tds1" style="text-align: center;width: 15px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombre_PDF_reso']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $cbx_ospeF ?>"></input>
            <?PHP
            
            //$oficina = utf8_decode($row['oficina']);
            ?>
       
    </td>
                <td id="tds1"style="width: 45px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1"style="width: 28px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioase'] ?>"> <?php echo $fila['usuarioase_dni'] ?></a></td>                
                <td id="tds1"style="width: 40px"><?php echo $fila['fCreacion'] ?></td>  
                </tr>
                <?php } ?>
            </table>
       <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button> 
        </div>         
         </form>-->
         
<!--        <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasVE" class="button button2">Exportar Excel</button> 
          </form>-->

<!--<div id="div_1">
        <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores_12.php" method="POST">               
           <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
            <input type="submit" name="buscarfirmesyconsentidasVE" value="Exportar Excel C/DH" maxlength="11" class="button button2"></input> 
          </form> 
    </div>
<div>
         <form name="form" action="exportar/reporteExcel_firmesyconsentidasVerifi_Gestores_1.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>   
               <input type="submit" name="buscarfirmesyconsentidasVE" value="Exportar Excel S/DH" maxlength="11" class="button button2"></input> 
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
$cbx_ospeI = $_POST['cbx_ospee'];
$cbx_ucfI = $_POST['cbx_ucff'];                                                                                                       
include './conexionesbd/conexion_mysql.php';

//$query = "SELECT 
//concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
//a.iddim_aseguradoindevido, 
//a.idTVerificacion,
//a.idTVerificacionPerfil,
//a.idTEstadoActual,
//b.RUC, b.nomEmpresa,                                                     
//b.dni_t, 
//concat_ws(' ',b.paterno_t, b.materno_t,b.nombre1_t,b.nombre2_t) nombres,
//c.ordenV,
//i.dia_pdf,
//i.fechaECInicioPSInh,
//i.fechaEmiRInh, 
//i.fechaFinPInh, i.fechaIFinalInstructor, i.fechaInicioPInh, i.fechaNCInicioPSInh,
//i.fechaNMCirculacion, i.fechaNotRInh, i.fechaNPCInicioPSInh, i.fechaNPeruano, i.fechaNWebEssalud, i.iddim_Inhabilitacion, i.iddim_ResBOficio,
//i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
//i.usuario_pdf, i.validacion,              
//a.observaciones,
//concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
//a.fCreacion,
//tvp.VerificacionPerfil
//
//        FROM dim_verificacion a
//      
//        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
//        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
//	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
//        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
//        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
//        left join dim_inhabilitacion i on d.iddim_ResBOficio=i.iddim_ResBOficio
//        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
//        where (DATE(i.fechaEmiRInh) BETWEEN '$dateinicio' and '$datefin')         
//        and a.idTVerificacion='2' 
//        AND i.nResInhabilitacion is not null
//        and i.ruta_pdf_inhabi is not null
//        and b.idDIM_Oficina in ($cbx_ucfI)
//        order by a.iddim_Verificacion desc";


$query = "SELECT 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
b.dni_t, 
concat_ws(' ',b.paterno_t, b.materno_t,b.nombre1_t,b.nombre2_t) nombres,
c.ordenV,
i.dia_pdf,
i.fechaECInicioPSInh,
i.fechaEmiRInh, 
i.fechaFinPInh, i.fechaIFinalInstructor, i.fechaInicioPInh, i.fechaNCInicioPSInh,
i.fechaNMCirculacion, i.fechaNotRInh, i.fechaNPCInicioPSInh, i.fechaNPeruano, i.fechaNWebEssalud, i.iddim_Inhabilitacion, i.iddim_ResBOficio,
i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
i.usuario_pdf, i.validacion,              
i.observaciones_inh,
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
        and b.idDIM_Oficina in ($cbx_ucfI)
        order by a.iddim_Verificacion asc";


$query1 = "SELECT 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
b.dni_t, 
concat_ws(' ',b.paterno_t, b.materno_t,b.nombre1_t,b.nombre2_t) nombres,
c.ordenV,
i.dia_pdf,
i.fechaECInicioPSInh,
i.fechaEmiRInh, 
i.fechaFinPInh, i.fechaIFinalInstructor, i.fechaInicioPInh, i.fechaNCInicioPSInh,
i.fechaNMCirculacion, i.fechaNotRInh, i.fechaNPCInicioPSInh, i.fechaNPeruano, i.fechaNWebEssalud, i.iddim_Inhabilitacion, i.iddim_ResBOficio,
i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
i.usuario_pdf, i.validacion,              
i.observaciones_inh,
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
        and b.idDIM_Oficina in ($cbx_ucfI)
        order by a.iddim_Verificacion asc";


$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE RESOLUCIONES DE INHABILITACION</h2>
<h6>*Segun Fecha de Emision</h6>
</div>
         
         <form name="form" action="exportar/reporteExcelVspes_fechas_inhabilitacionesGestores.php" method="POST">               
            <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucfI ?>"/>
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
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
            <th id="ths1"style="width: 60px">Nº ORDEN DE VERIFICACION</th>
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
                <td id="tds1"style="width: 60px"><?php echo $fila['ordenV'] ?></td>
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
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones_inh'] ?></td>  
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
         
         <form name="form" action="exportar/reporteExcelVspes_fechas_inhabilitacionesGestores_2.php" method="POST">               
            <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucfI ?>"/>
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
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
            <th id="ths1"style="width: 60px">Nº ORDEN DE VERIFICACION</th>
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
                <td id="tds1"style="width: 60px"><?php echo $fila['ordenV'] ?></td>
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
                <td id="tds1"style="width: 40px"><?php echo $fila['observaciones_inh'] ?></td>  
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
$cbx_ospeM = $_POST['cbx_ospeee'];
$cbx_ucfM = $_POST['cbx_ucfff'];                                                                                                       
include './conexionesbd/conexion_mysql.php';


//                                                                                                          
include './conexionesbd/conexion_mysql.php';



//$query = "SELECT  
//b.dni_t, 
//concat_ws(' ',b.paterno_t,b.materno_t, b.nombre1_t,b.nombre2_t) nombres,
//b.fechanacimiento,
//concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
//a.iddim_aseguradoindevido, 
//a.idTVerificacion,
//tvv.Verificacion,
//a.idTVerificacionPerfil,
//a.idTEstadoActual,
//b.RUC, b.nomEmpresa,                                                     
//c.ordenV,
//m.dia_pdf dia_pdfM,
//b.RUC, 
//b.nomEmpresa, 
//b.idTipoTrabajador,
//tptra.descripcionTTrabajador,
//m.iddim_Overificacion,
//m.fechaCartaSGCNT, m.fechaECFiReMulta,m.fechaERMulta, m.fechaIFinalInstructor fechaIFinalInstructor_M, m.fechaIFinalInstructormult, 
//m.fechaInSICO, m.fechaNCInicioPSmult, m.fechaNMulta, 
//m.fechaNPCInicioPSmult, m.iddim_Multa, m.idTRRBRegistro idTRRBRegistro_M, m.infraccion,
//m.montoMulta, m.NcartaSGCNT, m.nombrePDFmulta, m.num num_m, m.numCFiReMulta, m.numCInicioPSMulta,
//m.numRMulta,
//m.ruta_pdf_multa, m.uit, m.validacion validacion_M,         
//a.observaciones,
//concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
//a.fCreacion,
//tvp.VerificacionPerfil
//        FROM dim_verificacion a      
//        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
//        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
//	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
//        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
//        left join dim_multa m on c.iddim_Overificacion =m.iddim_Overificacion
//        left join dim_publicacion p on m.numRMulta = p.resolucionpublicada
//        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
//        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
//        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
//        where (DATE(m.fechaERMulta) BETWEEN '$dateinicio' and '$datefin')        
//        and a.idTVerificacion='2' 
//        and m.numRMulta is not null
//        and m.ruta_pdf_multa is not null
//        and b.idDIM_Oficina in ($cbx_ucfM)
//        order by a.iddim_Verificacion desc";

$query = "SELECT  
b.dni_t, 

concat_ws(' ',b.paterno_t,b.materno_t, b.nombre1_t,b.nombre2_t) nombres,
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
        and b.idDIM_Oficina in ($cbx_ucfM)
        order by a.iddim_Verificacion asc";

$query1 = "SELECT  
b.dni_t, 

concat_ws(' ',b.paterno_t,b.materno_t, b.nombre1_t,b.nombre2_t) nombres,
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
        and b.idDIM_Oficina in ($cbx_ucfM)
        order by a.iddim_Verificacion asc";

             
$i = 0;
?>
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE MULTAS</h2>
<h6>*Segun Fecha de Emision</h6>
</div>
        
          
         <form name="form" action="exportar/reporteExcelVspes_fechas_multas_verif.php" method="POST">               
             <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $cbx_ucfM ?>"/>
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
            <th id="ths1"style="width: 45px">Nº ORDEN DE VERIFICACION</th>
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
                <td id="tds1"style="width: 45px"><?php echo $fila['ordenV'] ?></td>
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
        
          
             <form name="form" action="exportar/reporteExcelVspes_fechas_multas_verif_2.php" method="POST">               
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $cbx_ucfM ?>"/>
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
            <th id="ths1"style="width: 45px">Nº ORDEN DE VERIFICACION</th>
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
                <td id="tds1"style="width: 45px"><?php echo $fila['ordenV'] ?></td>
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
$cbx_ospeP = $_POST['cbx_ospeeee'];
$cbx_ucfP = $_POST['cbx_ucffff'];  

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
b.materno_t,
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,
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
        where (DATE(p.femision) BETWEEN '$dateinicio' and '$datefin')  
        and a.idTVerificacion='2'
        and p.nombrePDPubli is not null
        and p.ruta_pdf_publi is not null
        and b.idDIM_Oficina in ($cbx_ucfP)
        order by a.iddim_Verificacion desc";

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
            <th id="ths1"style="width: 60px">RESOLUCION PUBLICADA</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 60px">NOMBRE DEL PDF</th>
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
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_publi'])) {
            ?>
            <td id="tds1"style="width: 60px"><?php echo $fila['nombrePDPubli'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 60px">
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
         <form name="form" action="exportar/reporteExcelVspes_fechas_publicaciones_verif.php" method="POST">               
            <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
            <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $cbx_ucfP ?>"/>
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
        /* --------------INICIO-------------------TERCERO BUSQUEDA-------------------------------------------------------------------------- */

        if (isset($_POST['cbx_dni'])) {
            $cbx_dni = $_POST['cbx_dni'];

            include './conexionesbd/conexion_mysql.php';


            $query = "SELECT cp.iddim_Verificacion,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        tea.EstadoActual,
 
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.casada_t,ai.nombre1_t,ai.nombre2_t)as nombres,   
        cp.observaciones,
        concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
        cp.fCreacion 
        FROM dim_verificacion cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido        
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario where ai.dni_t='$cbx_dni'
        order by cp.iddim_Verificacion ASC";



//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
            <h2>LISTADO POR DNI/RUC DE VERIFICACION</h2>
            </div>

            <section>
                <table class="titulos" id="tables2">   
                   <tr class="headers" style="text-align: center">    
                       <th id="ths1" style="width: 10px">N</th>
                                        <th id="ths1"style="width: 63px">OFICINA</th>
                                        <th id="ths1"style="width: 30px">VERIF</th>
                                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                                         <th id="ths1"style="width: 60px">EST<br>ACTUAL</th>
                                      

                                       <th id="ths1"style="width: 62px">RUC</th>

                                        <th id="ths1"style="width: 130px">RAZON SOCIAL</th>

                                        <th id="ths1"style="width: 50px">DNI_TITULAR</th>

                                        <th id="ths1"style="width: 120px">APELLIDOS Y NOMBRES</th>

                                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>
                                        
                                        <th id="ths1"style="width: 82px">REGISTRADO POR</th>                             

                                     <th id="ths1"style="width: 90px">FECHA CREACION</th>
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
                                                            <td id="tds1"style="width: 63px"><?php echo $fila['OFICINA'] ?></td>
                                                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                                                            <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila['idTVerificacionPerfil'] ?></td>

                                                            <td id="tds1"style="width: 60px;text-align: center"><a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila['EstadoActual'] ?></a>

                                                                <div id="dialog<?php echo $i ?>" title="DETALLE DEL REGISTRO DE VERIFICACION" class="contenido">
                                                                    <iframe src="index_formListarVerificacion_visualizar.php?iddim_Verificacion=<?php echo $fila['iddim_Verificacion'] ?>" style="width: 100%; height: 90%"></iframe>
                                                                </div>
                                                            </td> 
                                                             <!--
                                                            <td id="size_2"><?//php echo $fila['EstadoActual'] ?></td>
                                                            -->
                                                       
                                                            <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
                                                             <td id="tds1"style="width: 130px"><?php echo $fila['nomEmpresa'] ?></td>     
                                                            
                                                           <td id="tds1"style="width: 50px"><?php echo $fila['dni_t'] ?></td>    
                                                           
                                                          <td id="tds1"style="width: 120px"><?php echo $fila['nombres'] ?></td>
                                                            <!--
                                                            <td>
                                                                <a href="#" id="abriPoppupo<?//php echo $i ?>"><?//php echo $fila['dni_t'] ?>
                                                                </a>
                                                            </td>

                                                            <div id="dialogo<?//php echo $i ?>" title="DATOS ACREDITA" class="contenido">
                                                                <iframe src="formControlPosteriorAsegurados.php?dni=<?//php echo $fila['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                            </div>  
                                                            -->

                                                            <!--<td><?php// echo $fila['nombres'] ?></td>-->

                                                          <?php
//        if (is_null($fila['ruta_pdf_reso'])) {
//            ?>

<!--            <td>
                //<?php //echo $fila['nombre_PDF_reso'] ?>                                                                                                                

            </td> -->

            <?php
//        } else {
//            ?>


<!--            <td>
                <a href="<?php// echo $fila['ruta_pdf_reso'] ?>" target="_blank"><?php //echo $fila['nombre_PDF_reso'] ?>
                </a>

            </td> -->

<?php
//}
//?>                                                

                                                            <td id="tds1"style="width: 156px"><?php echo $fila['observaciones'] ?></td>  
                                                            
                                                               <td id="tds1"style="width: 82px"><?php echo $fila['fCreacion'] ?></td>                                              

                                                            <td id="tds1"style="width: 90px"id="tds1"><?php echo $fila['usuarioase'] ?></td>     

                                                        </tr>

                                                    <?php } ?>
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
                        <li style="list-style-type: none;"><label style="font-weight: bold; color: #FDFEFE; font-size: 12px;">TIPO DE VERIFICACION </label></li>
                        <li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">01. CC01</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">02. CC03</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">03. CC11</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">04. CC25</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">05. CC19</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">06. T CASADO DECL CONC, S, V, D</label></li>
			<li style="list-style-type: none;"><label style="color: #FDFEFE; font-size: 10px;">07. Iniciativa Propia</label></li>
                                                       </td>                                                       
                                                       <td>
                        <li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">08. Conductor Unico Trabaj-852 </label></li>
			<li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">09. Monoconductor Lima y Provincia</label></li>
			<li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">10. Orden Superior</label></li>
			<li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">11. Conyugue Unico Trabajador</label></li>
                        <li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">12. Otros</label></li>
			<li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">13. Mype - Monoconductor</label></li>
                        <li style="list-style-type: none;"><label style=" color: #FDFEFE; font-size: 10px;">14. T Soltero, V o D Decl Conc Casado</label></li>
                                                       </td>  
                                                    </tr>
                                                 </table>

                                                    <?php
                                                } else {
                                                    echo 'Error al cargar';
                                                }//liberando los recursos
                                                $result->free();
                                            }
                                            ?>
                    </table>
                                        </div>
                              
             
        </section>

        <?php
        if (isset($_POST['cbx_ruc'])) {
            $cbx_ruc = $_POST['cbx_ruc'];

            include './conexionesbd/conexion_mysql.php';


            $query3 = "SELECT cp.iddim_Verificacion,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        tea.EstadoActual,
       
        cp.nombrePDF,
        cp.ruta_pdf,
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, concat(ai.paterno_t,' ',ai.materno_t,' ',ai.nombre1_t,' ',ai.nombre2_t)as nombres,
        
        cp.observaciones,
        concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
        cp.fCreacion                              
        FROM dim_verificacion cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido        
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
                                                    where ai.RUC='$cbx_ruc'
                                                    order by cp.iddim_Verificacion ASC";


//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO POR TIPO DE BUSQUEDA</h2>
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
                                   
                                    <td id="size_1">RUC</td>

                                    <td id="size_1">RAZON SOCIAL</td>

                                    <td id="size_1">DNI_TITULAR</td>

                                    <td id="size_1">APELLIDOS Y NOMBRES</td>

                                    <td id="size_1">NOMBRE DEL PDF</td>                                       

                                    <td id="size_3">OBSERVACIONES</td>
                                     <td id="size_1">F CREACION</td>                                       

                                        <td id="size_3">USUARIO</td>
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

                                                         <!--<td><a href="#" id="abriPoppup<?php //echo $i ?>"><?php //echo $fila3['EstadoActual'] ?></a>

                                                        <div id="dialog<?php //echo $i ?>" title="SGVA" class="contenido">
                                                                <iframe src="index_formListarOrdenVerificacion_visualizar.php?iddim_CPosterior=<?php //echo $fila3['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                            </div>
                                                        </td> --> 

                                                        <td id="size_2"><?php echo $fila3['EstadoActual'] ?></td>

                                                   

                                                        <td><?php echo $fila3['RUC'] ?></td>
                                                        <td><?php echo $fila3['nomEmpresa'] ?></td>                                                  

                                                        <td><?php echo $fila3['dni_t'] ?></td>    
                                                        
                                                        <!--
                                                        <td>
                                                            <a href="#" id="abriPoppupo<?//php echo $i ?>"><?//php echo $fila3['dni_t'] ?>
                                                            </a>
                                                        </td>

                                                        <div id="dialogo<?//php echo $i ?>" title="SGVA" class="contenido">
                                                            <iframe src="formControlPosteriorAsegurados.php?dni=<?//php echo $fila3['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                        </div>  
                                                        -->

                                                        <td><?php echo $fila3['nombres'] ?></td>

                                                        <?php
        if (is_null($fila3['ruta_pdf'])) {
            ?>

            <td>
                <?php echo $fila3['nombrePDF'] ?>                                                                                                                

            </td> 

            <?php
        } else {
            ?>


            <td>
                <a href="<?php echo $fila3['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?>
                </a>

            </td> 

<?php
}
?>                                                     

                                                        <td><?php echo $fila3['observaciones'] ?></td>   
                                                           <td><?php echo $fila3['fCreacion'] ?></td>                                              

                                                            <td><?php echo $fila3['usuarioase'] ?></td>     

                                                    </tr>

        <?php } ?>


        <?php
    } else {
        echo 'Error al cargar';
    }//liberando los recursos
    $result->free();
}


/* ----------FIN-----------------------TERCERA BUSQUEDA-------------------------------------------------------------------------- */
?>
                                    </div></div></div></div> 
                    </tbody>
                </div>
            </table>
        </section>

         <script language="javascript">
                     
            $(document).ready(function () {
                $("#cbx_oficina").change(function () {
                    $("#cbx_oficina option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidadesUsuarios.php", {oficina: oficina}, function (data) {
                            $("#cbx_OficinaAA").html(data);
                        });
                    });
                })
            });
       
             $(document).ready(function () {
                $("#cbx_OficinaAA").change(function () {

                  //  $('#cbx_ano').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    $("#cbx_OficinaAA option:selected").each(function () {
                        ano = $(this).val();
                        $.post("include/getAno.php", {ano: ano}, function (data) {
                            $("#cbx_ano").html(data);
                        });
                    });
                })
            });        
    
        </script>


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

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
            }
        </script>

    </body>
</html>
