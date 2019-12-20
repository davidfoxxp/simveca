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
        inner join dim_oficina_2 o on u.idDIM_Oficina=o.idDIM_Oficina
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
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/> 
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
       
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>
        <!-- / END -->

        <style>
            #td1 {
                font-size: 10px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }  
            
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
                overflow-y: auto; /**El scroll verticalmente cuando sea necesario*/
                /*overflow: scroll;*/
                height: 200px;
                display: block;
            }

            tbody {
                text-align: left;
                z-index: 2;
                font-size: 10px;
            }
            
            .no-close .ui-dialog-titlebar-close {
            display: none;
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

        <style>
div.contiene_tabla, div.contiene_tabla2 { 
height: 220px; 
overflow: auto; 
overflow-y: auto; 
overflow-x: hidden; 
width: 1580px; /*TAMAÑO ASTA DONDE SE PROYECTA PARA SALIR EL SCROLL*/
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
    max-width: 1000px;
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
            if($idTperfiles>1) {
                if($idTperfiles==12) {
         ?>           
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'ESPECIAL')">REPORTE ESPECIAL</button>                
    <?PHP
    }
    ?>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'OSPE')">BAJAS EMITIDAS</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'ESTADISTICO')">ESTADISTICO</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" title="SOLO SE MOSTRARAN LAS QUE TIENEN PDF"onclick="openCity(event, 'FINALIZADOS')">FIRMES Y CONSENTIDAS</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'PUBLICACIONES')">PUBLICACIONES</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color = 'white', this.style.backgroundColor = '#008CBA'" onmouseout="this.style.color = 'black', this.style.backgroundColor = '#F1F1F1'" onclick="openCity(event, 'POWER_BI')">POWER BI</button>
<?PHP
            }
    ?>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'DNIRUC')">DNI/RUC</button>
        </div>

        <!-- Tab content -->
        <div class="tabcontent" id="OSPE">            
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
                            <?PHP
//echo 'UNIDADES', '<select name="OficinaA" id="OficinaA" class="con_estilos" required></select>';
                            ?>
                        </div>  

                        <div class="formleyenda">
                            <label>AÑO</label>
                            <select name="cbx_ano" id="cbx_ano" required=""></select>
                            <?PHP ?>
                        </div>

                        <?PHP
                        $query1 = "SELECT DISTINCT(tea.idTEstadoActual), tea.EstadoActual
                            FROM tipoestadoactual tea
                            where tea.idTEstadoActual 
                            and not tea.idTEstadoActual in ('4','5')
                            order by tea.idTEstadoActual asc";
                        $resultado1 = $conexionmysql->query($query1);
                        ?>

<!--                        <div class="formleyenda">SELECCIONE TIPO DE ESTADO 
                            <select name="cbx_estadoActual" id="cbx_estadoActual" class="con_estilos" >
                                <option value="'1','2','3'">TODOS</option>
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

        <!-- Tab content -->
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
        
        
        <div id="FINALIZADOS" class="tabcontent">
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
                            <select name="cbx_ospe2" id="cbx_ospe2" class="con_estilos" required="">
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['oficina']; ?>"><?php echo $row['oficina']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                            <select name="cbx_ucf2" id="cbx_ucf2" required="" class="con_estilos"></select>
                            <?PHP
//echo 'UNIDADES', '<select name="OficinaA" id="OficinaA" class="con_estilos" required></select>';
                            ?>
                        </div>  
                       
                                            
                        <div>
                         FECHA DE INICIO <input type="date" name="dateinicioF"/>    
                                 
                FECHA DE FIN <input type="date" name='datefinF'/>                  
                <BR>
                    <div class="formleyenda">
                        <button type="submit" class="button button1" name="buscarfirmesyconsentidas">Filtrar</button>
            
                    </div>
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
        <iframe width="1300" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiYjQ5OTM3MTYtNTgxNC00Mzg1LWJhZDktZTdmZmQzZWE4M2ViIiwidCI6IjM0ZjMyNDE5LTFjMDUtNDc1Ni04OTZlLTQ1ZDYzMzcyNjU5YiIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>            
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


            $query = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        cp.ruta_pdf,
        cp.nombrePDF,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, 
        concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,
        
        cp.observaciones,
              concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                concat_ws(' ',usua.pape,usua.sape,usua.pnom,usua.snom)as usuarioaseac,
                cp.fCreacion,
                cp.fCreacionTerminado,
                cp.fActualizacion
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido        

        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
        left join dim_usuario usua on cp.idtusuario_s=usua.iddim_usuario
        where month(cp.femisionBRegistro) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(cp.femisionBRegistro)='$ano'  
        and cp.idTEstadoActual=3
        and ai.idDIM_Oficina='$cbx_OficinaAA'        
               
        order by cp.iddim_CPosterior desc";
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
        
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
            </div>

        
        
        <table class="titulos" id="tables2"> 
                                               
                <tr class="headers" style="text-align: center">
                        <th id="ths1"style="width: 20px">N</th>
                        <th id="ths1"style="width: 65px">OFICINA</th>
                        <th id="ths1"style="width: 20px">PROC.</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 30px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 30px">GENERA BAJA</th>
                        <th id="ths1"style="width: 120px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 130px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 50px">DNI</th>
                        <th id="ths1"style="width: 200px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 150px">NOMBRE DEL PDF</th>                        
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th> 
                        <th id="ths1"style="width: 82px">REGISTRADO POR</th>                        
                        <th id="ths1"style="width: 55px">FECHA CREACION</th>
                        <th id="ths1"style="width: 50px">FECHA TERMINO</th>
                        <th id="ths1"style="width: 82px">ACTUALIZADO POR</th> 
                        <th id="ths1"style="width: 50px">FECHA ULTIMA ACTU.</th>
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
                            <td id="tds1"style="width: 65px"><?php echo $fila['OFICINA'] ?></td>
                            <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                            <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila['idTVerificacionPerfil'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['GeneraBaja'] ?></td> 
                            <td id="tds1"style="width: 120px"><?php echo $fila['nResBRegistro'] ?></td>
                            <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
                            <td id="tds1"style="width: 130px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                            <td id="tds1"style="width: 50px"><?php echo $fila['dni_t'] ?></td> 
                            <td id="tds1"style="width: 200px"><?php echo $fila['nombres'] ?></td>

                            <?php
                            if (is_null($fila['ruta_pdf'])) {
                                ?>
                                <td id="tds1"style="width: 150px">
                                    <?php echo $fila['nombrePDF'] ?>      
                                </td> 
                                <?php
                            } else {
                                ?>
                                <td id="tds1" style="width: 150px">
                                    <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?>
                                    </a>
                                </td> 
                                <?php
                            } ?>                                            

                            <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td>  
                <td id="tds1" style="width: 82px"><?php echo $fila['usuarioase'] ?></td>
    
    <td id="tds1" style="width: 55px"><?php echo $fila['fCreacion'] ?></td>  

    <td id="tds1"style="width: 50px"><?php echo $fila['fCreacionTerminado'] ?></td>  
    
    <td id="tds1"style="width: 82px"><?php echo $fila['usuarioaseac'] ?></td>
    
    <td id="tds1" style="width: 50px"><?php echo $fila['fActualizacion'] ?></td>       

                        </tr>

                    <?php } ?>
                 </table>
      </div> 
         <br/>
        
                <form name="form" action="exportar/reporteExcel_s_1.php" method="POST">
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

                    <input type="submit" name="buscar" value="Exportar EXCEL S/DH" maxlength="11" class="button button2"></input> 
                </form>
         
         <form name="form" action="exportar/reporteExcel_s_2.php" method="POST">
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

                    <input type="submit" name="buscar" value="Exportar EXCEL C/DH" maxlength="11" class="button button2"></input> 
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
                                            /* ---------FIN------------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */
                                            ?>
         <?php
         /*------------------------------------------------------------------SEGUNDA BUSQUEDA*/
         ?>
        
        <section>
<?php
if (isset($_POST['buscar'])) {

    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $cbx_ucf = $_POST['cbx_ucf'];
    include './conexionesbd/conexion_mysql.php';                                                
                                                
   $query3="SELECT dof.oficina, 
         tea.EstadoActual,
        CASE 
        WHEN CP.IDTGENERABAJA='1' THEN 'SI'
        WHEN CP.IDTGENERABAJA='2' THEN 'NO'
        WHEN CP.IDTGENERABAJA='4' THEN '--'
        END AS GENERABAJA,
        count(distinct cp.iddim_CPosterior) total
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido           
        left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil   
        LEFT JOIN TIPOVERIFICACIONPERFIL TPFF ON CP.origencp=TPFF.IDTVERIFICACIONPERFIL AND tpff.idTVerificacion='1' 
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario_s=du.iddim_usuario
        where (DATE(cp.femisionBRegistro) BETWEEN '$dateinicio' and '$datefin') 
         and ai.idDIM_Oficina in ($cbx_ucf)
         and cp.idTEstadoActual=3
         GROUP BY tea.EstadoActual,GENERABAJA,dof.oficina";

    $query4="SELECT dof.oficina, 
        tea.EstadoActual, 
        CASE 
        WHEN CP.IDTGENERABAJA='1' THEN 'SI'
        WHEN CP.IDTGENERABAJA='2' THEN 'NO'
        WHEN CP.IDTGENERABAJA='4' THEN '--'
        END AS GENERABAJA,
        count(distinct cp.iddim_CPosterior) total
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido        
        left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil   
        LEFT JOIN TIPOVERIFICACIONPERFIL TPFF ON CP.origencp=TPFF.IDTVERIFICACIONPERFIL AND tpff.idTVerificacion='1' 
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario_s=du.iddim_usuario
        where (DATE(cp.fCreacion) BETWEEN '$dateinicio' and '$datefin')
        and ai.idDIM_Oficina in ($cbx_ucf)
        and not cp.idTEstadoActual=3
        GROUP BY tea.EstadoActual,GENERABAJA,dof.oficina";
    

     $query5="SELECT dof.oficina, 
        tea.EstadoActual, 
        CASE 
        WHEN CP.IDTGENERABAJA='1' THEN 'SI'
        WHEN CP.IDTGENERABAJA='2' THEN 'NO'
        WHEN CP.IDTGENERABAJA='4' THEN '--'
        WHEN CP.IDTGENERABAJA is null THEN 'NO REGISTRA'
        END AS GENERABAJA,
        count(distinct cp.iddim_CPosterior) total
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido    
        left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil   
        LEFT JOIN TIPOVERIFICACIONPERFIL TPFF ON CP.origencp=TPFF.IDTVERIFICACIONPERFIL AND tpff.idTVerificacion='1' 
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario_s=du.iddim_usuario
        where ai.idDIM_Oficina in ($cbx_ucf)
        and cp.idTEstadoActual=1
        GROUP BY tea.EstadoActual,GENERABAJA,dof.oficina";
     
     
     $query6="SELECT concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, RRBRegistro, 	
concat_ws(' ',usua.pape,usua.sape,usua.pnom,usua.snom)as usuarioaseac, 
				case 
                when ai.idTipoAtencion='1' then 'TITULAR'
                when ai.idTipoAtencion='2' then 'DERECHO HABIENTE'                
                end as TipoAtencion_des, 
                count(*) TOTAL
                FROM dim_cposterior cp
                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
                left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
                left join dim_usuario usua on cp.idtusuario_s=usua.iddim_usuario
                where (DATE(cp.factofirme) BETWEEN '$dateinicio' and '$datefin') 
                and tea.idTEstadoActual='3'
                and cp.idTRRBRegistro=1
                and ai.idDIM_Oficina in ($cbx_ucf) and cp.ruta_pdf is not null
                and not cp.idtusuario_s=1
                GROUP BY OFICINA, RRBRegistro, usuarioaseac, TipoAtencion_des";

                             date_default_timezone_set('America/Bogota');
                    $fecha_hora_updateo = date('Y-m-d G:i:s');
                $result = $conexionmysql->query($query3);
                $result1 = $conexionmysql->query($query4);
                $result2 = $conexionmysql->query($query5);
                $result3 = $conexionmysql->query($query6);
                $i = 0;
                ?>
                    <div class="panel-heading" id="panel_1">
                        <?php 
                        $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
                        $fin = strftime("%d-%m-%Y", strtotime($datefin));
                        $fechahoy=strftime("%d-%m-%Y", strtotime($fecha_hora_updateo));
                        ?>
<h2>ESTADISTICA DE TRANSACCIONES DEL CONTROL POSTERIOR <?php echo "DESDE ".$inicio." HASTA ".$fin; ?>  </h2>
                    </div>
<h4>TOTAL DE TERMINANDOS CON FECHA DE EMISION DE BAJA Y/O ARCHIVADAS DENTRO DEL PERIODO SELECCIONADO</h4>  
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
        if ($conexionmysql->query($query3)) {
            while ($fila3 = $result->fetch_assoc()) {
                $i++;
                ?>                                       
                <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                    <td id="tds1"style="width: 40px;text-align: center"><?php echo $fila3['oficina'] ?></td>
                    <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila3['EstadoActual'] ?></td>
                    <td id="tds1"style="width: 23px;text-align: center"><?php echo $fila3['GENERABAJA'] ?></td>
                    <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila3['total'] ?></td>
                    <td id="tds1"style="width: 120px;text-align: center">EMISION DE BAJA DEL RANGO SELECCIONADO</td> 
                </tr>
            <?php } ?>
     </table>
</div> 
 <form name="form" action="exportar/reporteExcelOspes_fechasgestores.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscar" title="SE LISTARA"class="button button1">Exportar Terminados</button> 
</form>
<br></br>
<h4>TOTAL EN PROCESOS Y PENDIENTES CREADOS EN EL RANGO DE FECHAS SELECCINADOS</h4>            
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
<form name="form" action="exportar/reporteExcelOspes_EstadisticoProcesoPendi.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscar" title="SE LISTARA"class="button button1">Exportar En Proceso y Pendientes</button> 
</form>    
<br></br>
<h4>TOTAL DE PENDIENTES DESDE LA FECHA DE CREACION DEL SIMVECA HASTA <?php echo "HOY ".$fechahoy ?></h4>
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
            if ($conexionmysql->query($query5)) {
                while ($fila5 = $result2->fetch_assoc()) {
                    $i++;
                    ?>                                       
                    <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                        <td id="tds1"style="width: 40px;text-align: center"><?php echo $fila5['oficina'] ?></td>
                        <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila5['EstadoActual'] ?></td>
                        <td id="tds1"style="width: 23px;text-align: center"><?php echo $fila5['GENERABAJA'] ?></td>
                        <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila5['total'] ?></td>
                        <td id="tds1"style="width: 120px;text-align: center">TOTAL DE PENDIENTES A LA FECHA</td> 
                    </tr>
                <?php } ?>
    </table>
</div> 
<form name="form" action="exportar/reporteExcelOspes_EstadisticoPendientesTo.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscar" title="SE LISTARA"class="button button1">Exportar Pendientes Totales</button> 
</form>
<br></br>
<h4>TOTAL DE FIRMES Y CONSENTIDAS DE LA OSPE SELECCIONADA</h4>
<table class="titulos" id="tablesX1">
    <tr class="headers" style="text-align: center">
            <th id="ths1"style="width: 40px">OSPE</th>
            <th id="ths1"style="width: 32px">ESTADO RESOLUCION</th>
            <th id="ths1"style="width: 53px">USUARIO</th>
            <th id="ths1"style="width: 20px">TIPO DE ASEGURADO</th>
            <th id="ths1"style="width: 100px">TOTAL</th>
        </tr>
</table>  
<div class="contiene_tablaX1">
    <table id="tablesX1">             
            <?php
            if ($conexionmysql->query($query6)) {
                while ($fila6 = $result3->fetch_assoc()) {
                    $i++;
                    ?>                                       
                    <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                        <td id="tds1"style="width: 40px;text-align: center"><?php echo $fila6['OFICINA'] ?></td>
                        <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila6['RRBRegistro'] ?></td>
                        <td id="tds1"style="width: 53px;text-align: center"><?php echo $fila6['usuarioaseac'] ?></td>
                        <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila6['TipoAtencion_des'] ?></td>
                        <td id="tds1"style="width: 100px;text-align: center"><?php echo $fila6['TOTAL'] ?></td>
                    </tr>
                <?php } ?>
    </table>
</div> 
<form name="form" action="exportar/reporteExcelOspes_fConsentidasTo.php" method="POST"> 
  <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
  <input id="i1" type="hidden" name="idDIM_Oficina" value="<?php echo $cbx_ucf ?>"/>   
  <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
  <button type="submit" name="buscarfirmesyconsentidas" title="SE LISTARA"class="button button1">Exportar Firmes y Consentidas Totales</button> 
</form>

                   <?php
        } } } }else {
        echo 'Error al cargar';
    }//liberando los recursos
    $result->free();
}
?>
</section>

        <?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarfirmesyconsentidas'])) {
$dateinicioF = $_POST['dateinicioF']; //1
    $datefinF = $_POST['datefinF'];
    
    
    $cbx_ospeF = $_POST['cbx_ospe2'];
        $cbx_ucfF = $_POST['cbx_ucf2'];


    include './conexionesbd/conexion_mysql.php';
    $query = "SELECT cp.iddim_CPosterior,
                concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                cp.idTVerificacion,
                tbr.RRBRegistro,
                cp.idTVerificacionPerfil,
                tea.EstadoActual,
                cp.nResBRegistro,
                cp.fconstanciaAcFirme,
                cp.factofirme,
                cp.nombrePDF,
                cp.ruta_pdf,
                cp.sunat,
                case 
                when cp.sunat='1' then 'SI'
                when cp.sunat IS NULL then 'NO'                
                end as SUNAT_S, 
                case 
                when cp.idTGeneraBaja='1' then 'SI'
                when cp.idTGeneraBaja='2' then 'NO'
                when cp.idTGeneraBaja='4' then '--'
                end as GeneraBaja,                     
                ai.RUC, ai.nomEmpresa,                                                     
                ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,                
                cp.observaciones,
                usu.numDocIdentidad usuarioase_dni,
                concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                concat_ws(' ',usua.pape,usua.sape,usua.pnom,usua.snom)as usuarioaseac,
                usua.numDocIdentidad usuarioaseac_dni,
                cp.fCreacion,
                cp.fCreacionTerminado,
                cp.fActualizacion
                FROM dim_cposterior cp
                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
       
        LEFT JOIN TIPOVERIFICACIONPERFIL tvp ON CP.IDTVERIFICACIONPERFIL=tvp.IDTVERIFICACIONPERFIL AND tvp.idTVerificacion='1' 
        left join dim_oficina_2 dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
        left join dim_usuario usua on cp.idtusuario_s=usua.iddim_usuario
                where (DATE(cp.factofirme) BETWEEN '$dateinicioF' and '$datefinF')
                and cp.idTEstadoActual='3' 
                and not cp.idtusuario_s='1'
                and cp.idTRRBRegistro=1
                and ai.idDIM_Oficina='$cbx_ucfF' and cp.ruta_pdf is not null
                and cp.sunat is null or not cp.sunat in ('1', '2')
                order by cp.iddim_CPosterior asc";
    
//    $query1 = "SELECT cp.iddim_CPosterior,
//                concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
//                cp.idTVerificacion,
//                tbr.RRBRegistro,
//                cp.idTVerificacionPerfil,
//                cp.fconstanciaAcFirme,
//                cp.factofirme,
//                tea.EstadoActual,
//                cp.nResBRegistro,
//                cp.nombrePDF,
//                cp.ruta_pdf,
//                cp.sunat,
//                case 
//                when cp.sunat='1' then 'SI'
//                when cp.sunat IS NULL then 'NO'                
//                end as SUNAT_S, 
//                case 
//                when cp.idTGeneraBaja='1' then 'SI'
//                when cp.idTGeneraBaja='2' then 'NO'
//                when cp.idTGeneraBaja='4' then '--'
//                end as GeneraBaja,                     
//                ai.RUC, ai.nomEmpresa,                                                     
//                ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,                
//                cp.observaciones,
//                usu.numDocIdentidad usuarioase_dni,
//                concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
//                concat_ws(' ',usua.pape,usua.sape,usua.pnom,usua.snom)as usuarioaseac,
//                usua.numDocIdentidad usuarioaseac_dni,
//                cp.fCreacion,
//                cp.fCreacionTerminado,
//                cp.fActualizacion
//                FROM dim_cposterior cp
//                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
//       
//        LEFT JOIN TIPOVERIFICACIONPERFIL tvp ON CP.IDTVERIFICACIONPERFIL=tvp.IDTVERIFICACIONPERFIL AND tvp.idTVerificacion='1' 
//        left join dim_oficina_2 dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
//        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
//        left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
//        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
//        left join dim_usuario usua on cp.idtusuario_s=usua.iddim_usuario
//                where (DATE(cp.fconstanciaAcFirme) BETWEEN '$dateinicioF' and '$datefinF')
//                and cp.idTEstadoActual='3' 
//                and not cp.idtusuario_s='1'
//                and cp.idTRRBRegistro=1
//                and ai.idDIM_Oficina='$cbx_ucfF' and cp.ruta_pdf is not null
//                order by cp.iddim_CPosterior asc";
//    
//    
  

//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//$result1 = $conexionmysql->query($query1);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
             
<form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE FIRMES Y CONSENTIDAS DEL CONTROL POSTERIOR</h2>
    <h6>* Fecha de Acto Firme</h6>
</div>
            
         <!--<div>-->
         <table class="titulos" id="tables2">   
            <!--<thead>-->
             <tr class="headers" style="text-align: center">
                        <th id="ths1" style="width: 10px">N</th>
                        <th id="ths1"style="width: 60px">OFICINA</th>
                        <th id="ths1"style="width: 32px">VERIF</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 60px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 42px">GENERA BAJA <br>REGIST</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 82px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 77px">DNI_TITULAR</th>
                        <th id="ths1"style="width: 110px">APELLIDOS Y NOMBRES</th>
                        
                        <th id="ths1"style="width: 60px">F ACTO FIRME</th>
                        <th id="ths1"style="width: 60px">F CONST ACT F</th>
                        
                        <th id="ths1"style="width: 160px">NOMBRE DEL PDF</th>
                        <th id="ths1"style="width: 20px">SELEC</th>  
                        <!--<th id="ths1"style="width: 35px">REP. SUNAT</th>-->  
                        <th id="ths1" style="width: 140px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 45px">REGISTRADO</th>                        
                        <th id="ths1"style="width: 55px">FECHA CREACION</th>
                        <th id="ths1"style="width: 45px">ACTUALIZADO</th> 
                        <th id="ths1"style="width: 50px">FECHA ULTIMA ACTU.</th>
                    </tr>
            <!--</thead>-->
    </table>
         <div class="contiene_tabla">
             <table id="tables2">
                <!--<tbody>-->               
                                  
<?php
if ($conexionmysql->query($query)) {
while ($fila = $result->fetch_assoc()) {
    $i++;
    ?>                  
    <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
        <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
        <td id="tds1"style="width: 60px"><?php echo $fila['OFICINA'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacion'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacionPerfil'] ?></td>        
        <td id="tds1"style="width: 60px"><?php echo $fila['EstadoActual'] ?></td>
        <td id="tds1"style="width: 42px"><?php echo $fila['GeneraBaja'] ?></td> 
        <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>
        <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
        <td id="tds1"style="width: 82px"><?php echo $fila['nomEmpresa'] ?></td> 
        
        <td id="tds1" style="width: 77px">
                <a href="index_formListarControlPosterior_visualizar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a>               
            </td> 

        <td id="tds1"style="width: 110px">
            <?php echo $fila['nombres'] ?></td>
        
        <td id="tds1"style="width: 60px">
            <?php echo $fila['factofirme'] ?></td>
        
        
        <td id="tds1"style="width: 60px">
            <?php echo $fila['fconstanciaAcFirme'] ?></td>
        
        <?php
        if (is_null($fila['ruta_pdf'])) {
            ?>

            <td id="tds1"style="width: 160px"><?php echo $fila['nombrePDF'] ?></td> 

            <?php
        } else {
            ?>

            <td id="tds1" style="width: 160px">
                <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?></a>
                <!--<input name="nombrePDF" type="hidden" value=" <?php echo $fila['nombrePDF'] ?>"> </input>-->
            </td> 
<?php
}
?>
    <td id="tds1" style="text-align: center;width: 20px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombrePDF']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $cbx_ospeF ?>"></input>       
    </td>
<!--             <td id="tds1"style="width: 35px">
            <?php echo $fila['SUNAT_S'] ?></td>-->
            
    <td id="tds1" style="width: 140px"><?php echo $fila['observaciones'] ?></td>
    <td id="tds1"style="width: 45px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioase'] ?>"> <?php echo $fila['usuarioase_dni'] ?></a></td>
    <td id="tds1" style="width: 55px"><?php echo $fila['fCreacion'] ?></td>  
    <!--<td id="tds1"style="width: 50px"><?php // echo $fila['fCreacionTerminado'] ?></td>-->      
    <td id="tds1"style="width: 45px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioaseac'] ?>"> <?php echo $fila['usuarioaseac_dni'] ?></a></td> 
    <td id="tds1" style="width: 50px"><?php echo $fila['fActualizacion'] ?></td>  
    
</tr>
        <?php } ?>                
            <!--</tbody>-->            
    </table>   
             <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button>              
         </div>
         
         </form>
                  <div id="div_1">
        <form name="form" action="exportar/reporteExcel_fechasTerminadoCP_Gestores.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
              <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasCP" class="button button2 linea">Exportar Excel C/DH</button> 
          </form>
             </div>
         <div>
         <form name="form" action="exportar/reporteExcel_fechasTerminadoCP_Gestores_2.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
              <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasCP" class="button button2 linea">Exportar Excel S/DH</button> 
          </form>
</div>
         
         <form action="extraer_pdf_fc.php" method="post"> 
<!--<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE FIRMES Y CONSENTIDAS DEL CONTROL POSTERIOR</h2>
    <h6>* Fecha de Constancia de Acto Firme</h6>
</div>-->
            
<!--         <div>
         <table class="titulos" id="tables2">                                     
        
            <thead>
             <tr class="headers" style="text-align: center">
                        <th id="ths1" style="width: 10px">N</th>
                        <th id="ths1"style="width: 60px">OFICINA</th>
                        <th id="ths1"style="width: 32px">VERIF</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 60px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 42px">GENERA BAJA <br>REGIST</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 82px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 77px">DNI_TITULAR</th>
                        <th id="ths1"style="width: 110px">APELLIDOS Y NOMBRES</th>
                        
                        <th id="ths1"style="width: 60px">F ACTO FIRME</th>
                        <th id="ths1"style="width: 60px">F CONST ACT F</th>
                        
                        <th id="ths1"style="width: 160px">NOMBRE DEL PDF</th>
                        <th id="ths1"style="width: 20px">SELEC</th>  
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 45px">REGISTRADO</th>                        
                        <th id="ths1"style="width: 55px">FECHA CREACION</th>

                        <th id="ths1"style="width: 45px">ACTUALIZADO</th> 
                        <th id="ths1"style="width: 50px">FECHA ULTIMA ACTU.</th>
                    </tr>
            </thead>
    </table>-->
<!--         <div class="contiene_tabla">
             <table id="tables2">
                <tbody>               
                                  
<?php
$i=0;
//if ($conexionmysql->query($query1)) {
//while ($fila = $result1->fetch_assoc()) {
  //  $i++;
    ?>                  
    <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
        <td id="tds1" style="width: 10px;text-align: center"><?php echo $i ?></td>
        <td id="tds1"style="width: 60px"><?php echo $fila['OFICINA'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacion'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacionPerfil'] ?></td>        
        <td id="tds1"style="width: 60px"><?php echo $fila['EstadoActual'] ?></td>
        <td id="tds1"style="width: 42px"><?php echo $fila['GeneraBaja'] ?></td> 
        <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>
        <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
        <td id="tds1"style="width: 82px"><?php echo $fila['nomEmpresa'] ?></td> 
        
        <td id="tds1" style="width: 77px">
                <a href="index_formListarControlPosterior_visualizar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a>               
            </td> 

        <td id="tds1"style="width: 110px">
            <?php echo $fila['nombres'] ?></td>
        
        <td id="tds1"style="width: 60px">
            <?php echo $fila['factofirme'] ?></td>
        
        
        <td id="tds1"style="width: 60px">
            <?php echo $fila['fconstanciaAcFirme'] ?></td>
        
        <?php
        if (is_null($fila['ruta_pdf'])) {
            ?>

            <td id="tds1"style="width: 160px"><?php echo $fila['nombrePDF'] ?></td> 

            <?php
        } else {
            ?>

            <td id="tds1" style="width: 160px">
                <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?></a>
                <input name="nombrePDF" type="hidden" value=" <?php echo $fila['nombrePDF'] ?>"> </input>
            </td> 
<?php
}
?>
    <td id="tds1" style="text-align: center;width: 20px">
        <input id="" type="checkbox" style="text-align: center" checked name="seleccion[]" 
               value="<?php echo $fila['nombrePDF']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $cbx_ospeF ?>"></input>       
    </td>
    <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td>
                <td id="tds1" style="width: 82px"><?php echo $fila['usuarioase'] ?></td>    
    <td id="tds1" style="width: 55px"><?php echo $fila['fCreacion'] ?></td>  
    <td id="tds1"style="width: 50px"><?php echo $fila['fCreacionTerminado'] ?></td>      
    <td id="tds1"style="width: 82px"><?php echo $fila['usuarioaseac'] ?></td>    
    <td id="tds1" style="width: 50px"><?php echo $fila['fActualizacion'] ?></td>  
    
    
    <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td>
    <td id="tds1"style="width: 45px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioase'] ?>"> <?php echo $fila['usuarioase_dni'] ?></a></td>
    <td id="tds1" style="width: 55px"><?php echo $fila['fCreacion'] ?></td>  
    <td id="tds1"style="width: 50px"><?php // echo $fila['fCreacionTerminado'] ?></td>      
    <td id="tds1"style="width: 45px;text-align: center"><a href="#" style="text-decoration:none" title="<?php echo $fila['usuarioaseac'] ?>"> <?php echo $fila['usuarioaseac_dni'] ?></a></td> 
    <td id="tds1" style="width: 50px"><?php echo $fila['fActualizacion'] ?></td>  
    
</tr>
<?php //} ?>                
            </tbody>            
    </table>   
             <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button>              
         </div>
         
         </form>
                 <form name="form" action="exportar/reporteExcel_fechasTerminadoCP_Gestores_12.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
              <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasCP" class="button button2">Exportar Excel C/DH</button> 
          </form>
         <form name="form" action="exportar/reporteExcel_fechasTerminadoCP_Gestores_22.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/> 
              <input id="i1" type="HIDDEN" name="iddimoficina" value="<?php echo $cbx_ucfF ?>"/> 
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>
              <input type="HIDDEN" name='oficinano' value="<?php echo $oficina ?>"/>
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarfirmesyconsentidasCP" class="button button2">Exportar Excel S/DH</button> 
          </form>-->

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
//} 

        }else {
                echo 'Error al cargar';
            }//liberando los recursos
            $result->free();
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
a.iddim_CPosterior,
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
a.idTVerificacion,
a.idTVerificacionPerfil,
tvp.VerificacionPerfil,
a.idTEstadoActual,  
b.paterno_t, 
concat_ws(' ',b.materno_t,b.casada_t) as materno_t, 
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,
p.nombrePDPubli,
concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t) nombres,                                           
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
p.fCreacion,
tvp.VerificacionPerfil,
p.ruta_pdf_publi,
p.nombrePDPubli

        FROM dim_cposterior a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   	
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_publicacion p on a.iddim_aseguradoindevido = p.iddim_CPosterior
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(p.femision) BETWEEN '$dateinicio' and '$datefin')  
        and a.idTVerificacion='1'
        and p.nombrePDPubli is not null
        and p.ruta_pdf_publi is not null
        and b.idDIM_Oficina in ($cbx_ucfP)
        order by a.iddim_CPosterior desc";

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
            <th id="ths1"style="width: 80px">RESOLUCION PUBLICADA</th>
            <th id="ths1"style="width: 20px">RUC</th>
            <th id="ths1"style="width: 40px">RAZON SOCIAL</th>
            <th id="ths1"style="width: 15px">DNI TIT</th>
            <th id="ths1"style="width: 40px">APELLIDOS Y NOMBRES</th>
            <th id="ths1"style="width: 75px">NOMBRE DEL PDF</th>
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
                <td id="tds1"style="width: 80px"><?php echo $fila['resolucionpublicada'] ?></td>
                <td id="tds1"style="width: 20px"><?php echo $fila['RUC'] ?></td>
                <td id="tds1"style="width: 40px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                <td id="tds1"style="width: 15px"><?php echo $fila['dni_t'] ?></td> 
                <td id="tds1"style="width: 40px"><?php echo $fila['nombres'] ?></td>
                  <?php
        if (is_null($fila['ruta_pdf_publi'])) {
            ?>
            <td id="tds1"style="width: 75px"><?php echo $fila['nombrePDPubli'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 75px">
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
         <form name="form" action="exportar/reporteExcelVspes_fechas_publicacionesCP_verif.php" method="POST">               
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


$query = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,                           
        cp.nResBRegistro,
        tea.EstadoActual, 
        cp.nResBRegistro,
        cp.nombrePDF,
        cp.ruta_pdf,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,                                                     
        ai.dni_t, 
        concat_ws(' ',ai.paterno_t, ai.materno_t,ai.nombre1_t, ai.nombre2_t) nombres,

        cp.observaciones,
        concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
        cp.fCreacion                                                   
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario                                             
        left join dim_oficina_2 dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        where ai.dni_t='$cbx_dni'
        order by cp.iddim_CPosterior ASC";



//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO POR DNI/RUC DEL CONTROL POSTERIOR</h2>
            </div>
            <table class="titulos" id="tables2">                                    
        
             <tr class="headers" style="text-align: center">                 
                        <th id="ths1" style="width: 10px">N</th>
                        <th id="ths1"style="width: 63px">OFICINA</th>
                        <th id="ths1"style="width: 30px">PROC</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 60px">EST<br>ACT.</th>
                        <th id="ths1"style="width: 42px">GENERA BAJA</th>
                        <th id="ths1"style="width: 130px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 130px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 50px">DNI</th>
                        <th id="ths1"style="width: 120px">APELLIDOS Y NOMBRES</th>
                         <?php
                            if($idTperfiles==1) {
                                ?>
                        <th id="ths1"style="width: 20px">E</th>
                         <?php
                            }
                            ?>
                        <th id="ths1"style="width: 150px">NOMBRE DEL PDF</th>
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
                                <div id="dialog<?php echo $i ?>" title="DETALLE DEL REGISTRO DE CONTROL POSTERIOR " class="contenido">
                                    <iframe src="index_formListarControlPosterior_visualizar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                </div>
                            </td>
                            <td id="ths1"style="width: 42px;text-align: center"><?php echo $fila['GeneraBaja'] ?></td> 
                            <td id="ths1"style="width: 130px"><?php echo $fila['nResBRegistro'] ?></td>
                            <td id="tds1"style="width: 62px"> <?php echo $fila['RUC'] ?></td>
                            <td id="tds1"style="width: 130px"><?php echo $fila['nomEmpresa'] ?></td>     
                            <td id="tds1"style="width: 50px"><?php echo $fila['dni_t'] ?></td>   
                            <td id="tds1"style="width: 120px"><?php echo $fila['nombres'] ?></td>
                            <?php 
                            if($idTperfiles==1) {
                                ?>
                                <td id="tds1"style="width: 20px">                                    
                                    <a href="../sisgasv/index_formListarControlPosterior_visualizar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" target="_blank" id="abriPoppupp<?php echo $i ?>" style="font-size: 15px" title="EDITAR">@
                                    </a>
                                </td> 
                                <?php
                            }
                            ?>
                            <?php
                            if (is_null($fila['ruta_pdf'])) {
                                ?>
                                <td id="tds1"style="width: 150px">
                                    <?php echo $fila['nombrePDF'] ?>   
                                </td> 
                                <?php
                            } else {
                                ?>
                                <td id="tds1"style="width: 150px">
                                    <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?>
                                    </a>
                                </td> 
                                <?php
                            }
                            ?>                             
                            <td id="tds1"style="width: 156px"><?php echo $fila['observaciones'] ?></td>  
                            <td id="tds1"style="width: 82px"><?php echo $fila['usuarioase'] ?></td>  
                            <td id="tds1"style="width: 90px"id="tds1"><?php echo $fila['fCreacion'] ?></td>   

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

        <?php
        if (isset($_POST['cbx_ruc'])) {
            $cbx_ruc = $_POST['cbx_ruc'];

            include './conexionesbd/conexion_mysql.php';


            $query3 = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    cp.idTVerificacion,
                                                    cp.idTVerificacionPerfil,                                                    
                                                    tea.EstadoActual,    
                                                    cp.nResBRegistro,
                                                        cp.nombrePDF,
                                                        cp.ruta_pdf,
                                                    case 
                                                    when cp.idTGeneraBaja='1' then 'SI'
                                                    when cp.idTGeneraBaja='2' then 'NO'
                                                    when cp.idTGeneraBaja='4' then '--'
                                                    end as GeneraBaja,                     
                                                    ai.RUC, ai.nomEmpresa,                                                     
                                                    ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
                                                    
                                                   
                                                    
                                                    cp.observaciones,
                                                    concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                                                    cp.fCreacion   

                                                    FROM dim_cposterior cp
                                                    left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                                    left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario 
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                                                    left join dim_oficina_2 dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where ai.RUC='$cbx_ruc'
                                                    order by cp.iddim_CPosterior ASC";


//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
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
                                    <td id="size_2">GENERA BAJA <br>REGIST</td>

                                    <td id="size_3">Nº RESOLUCION DE BAJA REGISTRO</td>

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
                                                     <tr style="background-color: #FFFFFF ; border-color:#87CEFA;">
                                                        <td id="size_11"><?php echo $fila3['OFICINA'] ?></td>
                                                        <td id="size_2"><?php echo $fila3['idTVerificacion'] ?></td>
                                                        <td><?php echo $fila3['idTVerificacionPerfil'] ?></td>

                                                                                                         <!--<td><a href="#" id="abriPoppup<?php //echo $i     ?>"><?php //echo $fila3['EstadoActual']     ?></a>

                                                                                                        <div id="dialog<?php //echo $i     ?>" title="SGVA" class="contenido">
                                                                                                                <iframe src="index_formListarOrdenVerificacion_visualizar.php?iddim_CPosterior=<?php //echo $fila3['iddim_CPosterior']     ?>" style="width: 100%; height: 90%"></iframe>
                                                                                                            </div>
                                                                                                        </td> --> 

                                                        <td id="size_2"><?php echo $fila3['EstadoActual'] ?></td>

                                                        <td><?php echo $fila3['GeneraBaja'] ?></td> 
                                                        <td><?php echo $fila3['nResBRegistro'] ?></td>

                                                        <td><?php echo $fila3['RUC'] ?></td>
                                                        <td><?php echo $fila3['nomEmpresa'] ?></td>                                                  

                                                        <td><?php echo $fila3['dni_t'] ?></td>     

                                                        <!--
                                                        <td>
                                                            <a href="#" id="abriPoppupo<?//php echo $i ?>"><?//php echo $fila['dni_t'] ?>
                                                            </a>
                                                        </td>

                                                        <div id="dialogo<?//php echo $i ?>" title="DATOS ACREDITA" class="contenido">
                                                            <iframe src="formControlPosteriorAsegurados.php?dni=<?//php echo $fila['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
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
                                                                <a href="<?php echo $fila3['ruta_pdf'] ?>" target="_blank"><?php echo $fila3['nombrePDF'] ?>
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
                });
            });


            $(document).ready(function () {
                $("#cbx_OficinaAA").change(function () {
                    //  $('#cbx_ano').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    $("#cbx_OficinaAA option:selected").each(function () {
                        ano = $(this).val();
                        $.post("include/getAno_baja.php", {ano: ano}, function (data) {
                            $("#cbx_ano").html(data);
                        });
                    });
                });
            });

//            $(document).ready(function () {
//                $("#cbx_ano").change(function () {
//
//                    //$('#cbx_OficinaAA').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
//
//                    $("#cbx_ano option:selected").each(function () {
//                        ano = $(this).val();
//                        $.post("include/getFecha.php", {ano: ano}, function (data) {
//                            $("#cbx_estadoActual").html(data);
//                        });
//                    });
//                });
//            });

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
