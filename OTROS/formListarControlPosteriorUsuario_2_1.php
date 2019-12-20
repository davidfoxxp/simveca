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
        <!--<link rel="stylesheet" type="text/css" href="css/tablas.css"/>-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"/>

        <!-- Beginning of compulsory code below -->

        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/> 
        
        <!--PARA LA GRILLA-->
        <script src="../SISGASV/js/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="../SISGASV/js/jquery.jqGrid.min.js" type="text/javascript"></script>
        <script src="../SISGASV/js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="../SISGASV/css/redmond/jquery-ui-1.8.13.custom.css"></link>
        <link rel="stylesheet" type="text/css" media="screen" href="../SISGASV/css/ui.jqgrid.css"></link>
        <!--FIN DE LA GRILLA-->
        
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

        </script>
        
          <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
        <style>
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
    max-width: 700px;
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
            echo '<br>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni'] . '-' . utf8_decode($row['oficina']));
            echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . utf8_decode($row['oficina']);
            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = utf8_decode($row['oficina']);
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
                    <li><a href="formListarControlPosteriorUsuario.php">Registros de Bajas de la OSPE Actual</a></li>
                    <li><a href="formListarControlPosterior.php">Registros de Bajas de TODAS las OSPE</a></li>
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
                            <li><a href="formListarVerificacionUsuario.php">Registros de Bajas de la OSPE Actual</a></li>
                            <li><a href="formListarVerificacion.php">Registros de Bajas de TODAS las OSPE</a></li>
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
            <li><a href="#">Videos</a>
                <ul>
                    <li><a href="#">CONTROL POSTERIOR</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\1.mp4" target="_blank">DIA 1</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\2.mp4" target="_blank">DIA 2</a></li>                            
                        </ul>
                        </li>                    
                </ul>
            </li>
    <li><a href="logout.php">Salir</a></li>
</ul>
</div>
<!-- / END -->

<!--            .button3 {
                border-radius: 8px;
                padding: 10px 10px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                background-color: white; 
                color: black; 
                border: 2px solid #008CBA;
            }

            .button3:hover {
                background-color: #008CBA;
                color: white;
            }-->
<!-- Tab links -->
<div class="tab" style="border-radius: 8px;  border: 2px solid #008CBA; width: 100%;" >
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'TODOINGRESADO')">TODO LO INGRESADO</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'FECHAS')">TIPO DE ESTADO</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'ESTADISTICO')">ESTADISTICO</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'FINALIZADOS')">FINALIZADOS</button>
<button style="border-radius: 8px;border: 0px solid #008CBA;background-color: #F1F1F1;color: black;" onmouseover="this.style.color='white',this.style.backgroundColor='#008CBA'" onmouseout="this.style.color='black',this.style.backgroundColor='#F1F1F1'" onclick="openCity(event, 'DNIRUC')">DNI/RUC</button>
</div>



         <!-- Tab content -->
        <div class="tabcontent" id="TODOINGRESADO">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post">        
                        <div>

                FECHA DE INICIO <input type="date" name="dateiniciot"/>  
                FECHA DE FIN <input type="date" name='datefint' />                  
                <br/>
                    <div class="formleyenda">
                        <button type="submit" class="button button1" name="buscartodoloingresado">BUSCAR</button>
            
                    </div>
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
        
        $queryte="SELECT distinct cp.idTEstadoActual,te.EstadoActual FROM sisgasv.dim_cposterior cp 
                    left join tipoestadoactual te on cp.idTEstadoActual= te.idTEstadoActual";
        $resultado1 = $conexionmysql->query($queryte);
        ?>

        <div class="control">
            <label>SELECCIONE EL TIPO DE PROCESO</label>            
            <select name="cbx_estadoActual" class="con_estilos" value="cbx_estadoActual"  required="">
            <option value="'1','2','3'">TODOS</option>
            <?php while ($row = $resultado1->fetch_assoc()) { ?>
                <option value="<?php echo $row['idTEstadoActual']; ?>"><?php echo $row['EstadoActual']; ?></option>
            <?php } ?>
            </select>
        </div>
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
                 FECHA DE INICIO <input type="date" name="dateinicio">  
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

<div class="formleyenda" >
    
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

<div id="DNIRUC" class="tabcontent">
<div class="contieneportafolio" id="contieneportafolio_1">
<div class="formleyenda" id="check">
<form action="" method="post">
<div class="formleyenda">INGRESE DNI</div>
<input type="text" name="cbx_dni" id="cbx_dni" class="con_estilos" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" required=""/>
    <button type="submit" class="button button1">Filtro 1</button>             
</form>
</div>

<div class="formleyenda" id="check">
<form action="" method="post">
<div class="formleyenda">INGRESE RUC</div>
<input type="text" name="cbx_ruc" id="cbx_ruc" class="con_estilos" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="11" required=""/>
    <button type="submit" class="button button1">Filtro 2</button>        
</form>
</div>
</div>
</div>

         
        <?php
        /* ------------INICIO---------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */

        if (isset($_POST['buscartodoloingresado'])) {

    $dateiniciot = $_POST['dateiniciot']; //1
    $datefint = $_POST['datefint'];
    
            include './conexionesbd/conexion_mysql.php';


$query = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        cp.femisionBRegistro,
        cp.nombrePDF,
        cp.ruta_pdf,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, concat(ai.paterno_t,' ',ai.materno_t,' ',ai.nombre1_t,' ',ai.nombre2_t)as nombres,
        cp.observaciones,
        concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
        cp.fCreacion 
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        

        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario   
        where (DATE(cp.fCreacion) BETWEEN '$dateiniciot' and '$datefint') 
        and ai.idDIM_Oficina='$idOficinaUsuario'
        order by cp.iddim_CPosterior ASC";
//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
//
?>  
<div class="panel-heading" id="panel_1">
<h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
</div>

<table class="titulos" id="tables2">     
                <tr class="headers" style="text-align: center">
                        <th id="ths1"style="width: 65px">OFICINA</th>
                        <th id="ths1"style="width: 20px">PROC.</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 30px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 30px">GENERA BAJA</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 150px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 40px">DNI</th>
                        <th id="ths1"style="width: 200px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 150px">NOMBRE DEL PDF</th>                        
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 100px">REGISTRADO POR</th>                        
                        <th id="ths1">FECHA DE REGISTRO</th>
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
                            <td id="tds1"style="width: 65px"><?php echo $fila['OFICINA'] ?></td>
                            <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                            <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila['idTVerificacionPerfil'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['GeneraBaja'] ?></td> 
                            <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>
                            <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
                            <td id="tds1"style="width: 150px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                            <td id="tds1"style="width: 40px"><?php echo $fila['dni_t'] ?></td> 
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
}
?>
                <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td> 
                <td id="tds1"style="width: 100px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"><?php echo $fila['fCreacion'] ?></td> 
            </tr>

         <?php } ?>
         </table>
      </div> 
         <br/>
         <form name="form" action="exportar/reporteExcel_fechastipoestadoCP_1.php" method="POST"> 
              <input type="HIDDEN" name="dateiniciot" value="<?php echo $dateiniciot ?>"/>    
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefint' value="<?php echo $datefint ?>"/>  
              <button type="submit" name="buscartodoingresadoCP" class="button button2">Exportar Excel</button> 
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
             </table>

         
         


        <?php
        /* ------------INICIO---------------------SEGUNDA BUSQUEDA-------------------------------------------------------------------------- */

        if (isset($_POST['buscartipoestado'])) {
            $cbx_estadoActual = $_POST['cbx_estadoActual'];
            $dateinicioe = $_POST['dateinicioE']; //1
            $datefine = $_POST['datefinE'];
       
            include './conexionesbd/conexion_mysql.php';


$query = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        cp.femisionBRegistro,
        cp.nombrePDF,
        cp.ruta_pdf,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, concat(ai.paterno_t,' ',ai.materno_t,' ',ai.nombre1_t,' ',ai.nombre2_t)as nombres,
        
        cp.observaciones,
        concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
        cp.fCreacion 
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        

        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
        
        where (DATE(cp.fCreacion) BETWEEN '$dateinicioe' and '$datefine') 
        and tea.idTEstadoActual in ($cbx_estadoActual)
        and ai.idDIM_Oficina='$idOficinaUsuario'
        order by cp.iddim_CPosterior ASC";

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
                        <th id="ths1"style="width: 65px">OFICINA</th>
                        <th id="ths1"style="width: 20px">PROC.</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 30px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 30px">GENERA BAJA</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 150px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 40px">DNI</th>
                        <th id="ths1"style="width: 200px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 150px">NOMBRE DEL PDF</th>                        
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 100px">REGISTRADO POR</th>                        
                        <th id="ths1">FECHA DE REGISTRO</th>
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
                            <td id="tds1"style="width: 65px"><?php echo $fila['OFICINA'] ?></td>
                            <td id="tds1"style="width: 20px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
                            <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila['idTVerificacionPerfil'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['idTEstadoActual'] ?></td>
                            <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['GeneraBaja'] ?></td> 
                            <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>
                            <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
                            <td id="tds1"style="width: 150px"><?php echo $fila['nomEmpresa'] ?></td>                                                  
                            <td id="tds1"style="width: 40px"><?php echo $fila['dni_t'] ?></td> 
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
}
?>
                <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td> 
                <td id="tds1"style="width: 100px"><?php echo $fila['usuarioase'] ?></td>
                <td id="tds1"><?php echo $fila['fCreacion'] ?></td> 
            </tr>

         <?php } ?>
         </table>
      </div>                      
         <br/>
         <form name="form" action="exportar/reporteExcel_fechastipoestadoCP_2.php" method="POST"> 
             <input type="hidden" name="dateinicioe" value="<?php echo $dateinicioe ?>"/>    
             <input type="hidden" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
             <input type="hidden" name='datefine' value="<?php echo $datefine ?>"/> 
             <input type="hidden" name="cbx_estadoActual" value="<?php echo $cbx_estadoActual ?>"></input>
              <button type="submit" name="buscartipoestadocp" class="button button2">Exportar Excel</button> 
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
            /* ---------FIN------------------------SEGUNDA BUSQUEDA-------------------------------------------------------------------------- */
            ?>
             </table>

         
         <?php
         /*------------------------------------------------------------------TERCERA BUSQUEDA*/
         ?>
        
        <section>
        <?php
         if (isset($_POST['buscar'])) {
    
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    
    //$cbx_ucf = $_POST['cbx_ucf'];

            include './conexionesbd/conexion_mysql.php';


           $query3 = "SELECT dof.oficina, cp.idtusuario, concat(du.pape, ' ', du.sape, ' ', du.pnom, ' ', du.snom) nombres, tea.EstadoActual, count(*) total
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_sccmvtft vf on ai.iddim_aseguradoindevido=vf.iddim_aseguradoindevido
        left join dim_pacalificar_dh pvf on vf.SCCMVTFT=pvf.dim_SCCMVTFT
        left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido        
        left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil    
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario=du.iddim_usuario
                where (DATE(cp.fCreacionTerminado) BETWEEN '$dateinicio' and '$datefin') 
                and ai.idDIM_Oficina='$idOficinaUsuario' 
                and not cp.idtusuario='1'
                GROUP BY tea.EstadoActual, cp.idtusuario, dof.oficina";
    


//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>ESTADISTICA DE TRANSACCIONES DEL CONTROL POSTERIOR</h2>
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

           <form name="form" action="exportar/reporteExcel_fechas.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
                <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
                <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
                 <button type="submit" name="buscar" class="button button1">Exportar Estadistico</button> 
          </form>
            
            <form name="form" action="exportar/reporteExcelOspes_fechas.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>"/>    
                <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
                <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>"/>  
                 <button type="submit" name="buscar" class="button button1">Exportar Data</button>    
             
          </form>
       
                   <?php
    } else {
        echo 'Error al cargar';
    }//liberando los recursos
    $result->free();
}
?>
</section>

<?php
/* --------------INICIO-------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
if (isset($_POST['buscarfinalizados'])) {
$dateinicioF = $_POST['dateinicioF']; //1
    $datefinF = $_POST['datefinF'];

//    $ano = $_POST['cbx_ano_t'];
//
//    if (empty($_POST['enero'])) {
//        $enero = 'NULL';
//    } else {
//        $eneroo = $_POST['enero'];
//        $enero = "'$eneroo'";
//    }
//
//    if (empty($_POST['febrero'])) {
//        $febrero = 'NULL';
//    } else {
//        $febreroo = $_POST['febrero'];
//        $febrero = "'$febreroo'";
//    }
//
//    if (empty($_POST['marzo'])) {
//        $marzo = 'NULL';
//    } else {
//        $marzoo = $_POST['marzo'];
//        $marzo = "'$marzoo'";
//    }
//
//    if (empty($_POST['abril'])) {
//        $abril = 'NULL';
//    } else {
//        $abrill = $_POST['abril'];
//        $abril = "'$abrill'";
//    }
//
//    if (empty($_POST['mayo'])) {
//        $mayo = 'NULL';
//    } else {
//        $mayoo = $_POST['mayo'];
//        $mayo = "'$mayoo'";
//    }
//
//    if (empty($_POST['junio'])) {
//        $junio = 'NULL';
//    } else {
//        $junioo = $_POST['junio'];
//        $junio = "'$junioo'";
//    }
//
//    if (empty($_POST['julio'])) {
//        $julio = 'NULL';
//    } else {
//        $julioo = $_POST['julio'];
//        $julio = "'$julioo'";
//    }
//
//    if (empty($_POST['agosto'])) {
//        $agosto = 'NULL';
//    } else {
//        $agostoo = $_POST['agosto'];
//        $agosto = "'$agostoo'";
//    }
//
//    if (empty($_POST['setiembre'])) {
//        $setiembre = 'NULL';
//    } else {
//        $setiembree = $_POST['setiembre'];
//        $setiembre = "'$setiembree'";
//    }
//
//    if (empty($_POST['octubre'])) {
//        $octubre = 'NULL';
//    } else {
//        $octubree = $_POST['octubre'];
//        $octubre = "'$octubree'";
//    }
//
//    if (empty($_POST['noviembre'])) {
//        $noviembre = 'NULL';
//    } else {
//        $noviembree = $_POST['noviembre'];
//        $noviembre = "'$noviembree'";
//    }
//
//    if (empty($_POST['diciembre'])) {
//        $diciembre = 'NULL';
//    } else {
//        $diciembree = $_POST['diciembre'];
//        $diciembre = "'$diciembree'";
//    }

    include './conexionesbd/conexion_mysql.php';
    $query = "SELECT cp.iddim_CPosterior,
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
                ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,                
                cp.observaciones,
                concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                cp.fCreacion,
                cp.fCreacionTerminado,
                cp.fActualizacion
                FROM dim_cposterior cp
                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
                where (DATE(cp.fCreacionTerminado) BETWEEN '$dateinicioF' and '$datefinF')
                and tea.idTEstadoActual='03' 
                and ai.idDIM_Oficina='$idOficinaUsuario'
                order by cp.iddim_CPosterior desc";


//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>

<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
</div>
            
         <!--<div>-->
         <table class="titulos" id="tables2">                                     
        
            <!--<thead>-->
             <tr class="headers" style="text-align: center">
                        <th id="ths1"style="width: 63px">OFICINA</th>
                        <th id="ths1"style="width: 30px">PROC</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 60px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 42px">GENERA BAJA <br>REGIST</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 95px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 50px">DNI</th>
                        <th id="ths1"style="width: 120px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 135px">NOMBRE DEL PDF</th>
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 82px">REGISTRADO POR</th>                        
                        <th id="ths1">FECHA CREACION</th>
                        <th id="ths1"style="width: 50px">FECHA DE TERMINO</th>
                        <th id="ths1">FECHA ULTIMA ACTU.</th>
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
        <td id="tds1"style="width: 63px"><?php echo $fila['OFICINA'] ?></td>
        <td id="tds1"style="width: 30px;text-align: center"><?php echo $fila['idTVerificacion'] ?></td>
        <td id="tds1"style="width: 32px;text-align: center"><?php echo $fila['idTVerificacionPerfil'] ?></td>        
        <td id="tds1"style="width: 60px;text-align: center"><?php echo $fila['EstadoActual'] ?></td>
        <td id="tds1"style="width: 42px;text-align: center"><?php echo $fila['GeneraBaja'] ?></td> 
        <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>
        <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
        <td id="tds1"style="width: 95px"><?php echo $fila['nomEmpresa'] ?></td>         
        <td id="tds1" style="width: 50px;text-align: center">
                <a href="formControlPosteriorAsegurados.php?dni=<?php echo $fila['dni_t'] ?>" target="_blank"><?php echo $fila['dni_t'] ?></a>
        </td> 
        <td id="tds1"style="width: 120px">
            <?php echo $fila['nombres'] ?>
        </td>        
        <?php
        if (is_null($fila['ruta_pdf'])) {
            ?>
            <td id="tds1"style="width: 135px"><?php echo $fila['nombrePDF'] ?></td> 
            <?php
        } else {
            ?>
            <td id="tds1" style="width: 135px">
                <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?></a>                
            </td> 
<?php
}
?>   
    <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td>    
    <td id="tds1"style="width: 82px"><?php echo $fila['usuarioase'] ?></td>    
    <td id="tds1"><?php echo $fila['fCreacion'] ?></td>  
    <td id="tds1"style="width: 50px"><?php echo $fila['fCreacionTerminado'] ?></td>      
    <td id="tds1"><?php echo $fila['fActualizacion'] ?></td>  
    
</tr>
        <?php } ?>                
            <!--</tbody>-->            
    </table>   
             
         </div>
          <form name="form" action="exportar/reporteExcel_fechasTerminadoCP.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicioF ?>"/>    
              <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>"/>                   
              <input type="HIDDEN" name='datefin' value="<?php echo $datefinF ?>"/>  
              <button type="submit" name="buscarterminadoCP" class="button button2">Exportar Excel</button> 
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
        /* ----------FIN-----------------------CUARTA BUSQUEDA-------------------------------------------------------------------------- */
        ?>
<?php
/* --------------INICIO-------------------QUINTA BUSQUEDA-------------------------------------------------------------------------- */

if (isset($_POST['cbx_dni'])) {
    $cbx_dni = $_POST['cbx_dni'];
    include './conexionesbd/conexion_mysql.php';
    $query00 = "SELECT count(*) total
                FROM dim_aseguradoindevido ai 
                inner JOIN dim_cposterior aa on ai.iddim_aseguradoindevido=aa.iddim_aseguradoindevido
                where ai.dni_t='$cbx_dni' and ai.idDIM_Oficina='$idOficinaUsuario'";
    $result00 = $conexionmysql->query($query00);
    while ($fila00 = $result00->fetch_assoc()) {
        if ($fila00['total'] == '0') {
            ECHO 'ASEGURADO NO SE ENCONTRO <BR>';
            ?>
            <td><a href="#" id="abriPoppup1"><i class="fas fa-at"></i>CREAR ASEGURADO MONOCONDUCTOR</a>

                <div id="dialog1" title="REGISTRO DE CONTROL POSTERIOR INICIATIVA PROPIA" class="contenido">
                    <iframe src="formControlPosteriorIniciativaPropia_insert.php" style="width: 100%; height: 100%"></iframe>
                </div>
            </td> 

            <?php
        } else {
    $query = "SELECT cp.iddim_CPosterior,
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
                ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,
                
                cp.observaciones,
                concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                cp.fCreacion,
                cp.fCreacionTerminado,
                cp.fActualizacion
                FROM dim_cposterior cp
                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                
                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
                where ai.dni_t='$cbx_dni' and ai.idDIM_Oficina='$idOficinaUsuario'
                order by cp.iddim_CPosterior ASC";


//Obteniendo el conjunto de resultados
$result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
$i = 0;
?>
<form action="extraer_pdf_fc.php" method="post"> 
<div class="panel-heading" id="panel_1">
    <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
</div>
             
             <table>
                 <td id="td1"><a href="#" id="abriPoppup0"><i class="fas fa-at"></i>CREAR ASEGURADO MONOCONDUCTOR<br></br></a>                                                                                           </td>
             </table>
         <!--<div>-->
         <table class="titulos" id="tables2">                                     
        
            <!--<thead>-->
             <tr class="headers" style="text-align: center">
                        <th id="ths1"style="width: 60px">OFICINA</th>
                        <th id="ths1"style="width: 32px">VERIF</th>
                        <th id="ths1"style="width: 32px">T DE VERIF</th>
                        <th id="ths1"style="width: 60px">EST<br>ACTUAL</th>
                        <th id="ths1"style="width: 42px">GENERA BAJA <br>REGIST</th>
                        <th id="ths1"style="width: 165px">Nº RESOLUCION DE BAJA REGISTRO</th>
                        <th id="ths1"style="width: 62px">RUC</th>
                        <th id="ths1"style="width: 82px">RAZON SOCIAL</th>
                        <th id="ths1"style="width: 72px">DNI_TITULAR</th>
                        <th id="ths1"style="width: 90px">APELLIDOS Y NOMBRES</th>
                        <th id="ths1"style="width: 150px">NOMBRE DEL PDF</th>
                        <th id="ths1"style="width: 20px">SELEC</th>  
                        <th id="ths1" style="width: 156px">OBSERVACIONES</th>                        
                        <th id="ths1"style="width: 82px">REGISTRADO POR</th>                        
                        <th id="ths1">FECHA CREACION</th>
                        <th id="ths1"style="width: 50px">FECHA DE TERMINO</th>
                        <th id="ths1">FECHA ULTIMA ACTU.</th>
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
        <td id="tds1"style="width: 60px"><?php echo $fila['OFICINA'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacion'] ?></td>
        <td id="tds1"style="width: 32px"><?php echo $fila['idTVerificacionPerfil'] ?></td>

        <td id="tds1"style="width: 60px"><a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila['EstadoActual'] ?></a>

            <div id="dialog<?php echo $i ?>" title="ACTUALIZACION DEL ESTADO DE BAJA DE REGISTRO - CONTROL POSTERIOR" class="contenido">
                <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
            </div>
        </td> 


        <td id="tds1"style="width: 42px"><?php echo $fila['GeneraBaja'] ?></td> 
        <td id="tds1"style="width: 165px"><?php echo $fila['nResBRegistro'] ?></td>

        <td id="tds1"style="width: 62px"><?php echo $fila['RUC'] ?></td>
        <td id="tds1"style="width: 82px"><?php echo $fila['nomEmpresa'] ?></td>                                                  


        <td id="tds1"style="width: 72px">
            <a href="#" id="abriPoppupo<?php echo $i ?>"><?php echo $fila['dni_t'] ?></a>
        </td>

        <div id="dialogo<?php echo $i ?>" title="SGVCA" class="contenido">
            <iframe src="formControlPosteriorAsegurados.php?dni=<?php echo $fila['dni_t']?>" style="width: 100%; height: 90%"></iframe>
        </div>  


        <td id="tds1"style="width: 90px">
            <?php echo $fila['nombres'] ?></td>
        


        <?php
        if (is_null($fila['ruta_pdf'])) {
            ?>

            <td id="tds1"style="width: 150px"><?php echo $fila['nombrePDF'] ?></td> 

            <?php
        } else {
            ?>


            <td id="tds1" style="width: 150px">
                <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?></a>
                <!--<input name="nombrePDF" type="hidden" value=" <?php echo $fila['nombrePDF'] ?>"> </input>-->
            </td> 
<?php
}
?>
    <td id="tds1" style="text-align: center;width: 20px">
        <input id="" type="checkbox" style="text-align: center" name="seleccion[]" 
               value="<?php echo $fila['nombrePDF']?>" readonly=""></input>
        <input name="oficinaa" type="hidden" value="<?php echo $oficina ?>"></input>
            <?PHP
            
            //$oficina = utf8_decode($row['oficina']);
            ?>
       
    </td>
    <td id="tds1" style="width: 156px"><?php echo $fila['observaciones'] ?></td>
    
    <td id="tds1"style="width: 82px"><?php echo $fila['usuarioase'] ?></td>
    
    <td id="tds1"><?php echo $fila['fCreacion'] ?></td>  

    <td id="tds1"style="width: 50px"><?php echo $fila['fCreacionTerminado'] ?></td>  
    
    <td id="tds1"><?php echo $fila['fActualizacion'] ?></td>  
    
</tr>
        <?php } ?>
                
            <!--</tbody>-->
            
            </table>
             <button type="submit" name="submit" value = "descargar" class="button button1">Exportar PDF</button>   
<!--             <input type = "submit"  action="submit" value = "descargar"/>  -->
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
}
}
else {
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

cp.observaciones                                                   
FROM dim_cposterior cp
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido

left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
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
                <tr style="background-color: #d1e4f3; border-color:#87CEFA;">
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

    <td><a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila3['EstadoActual'] ?></a>

        <div id="dialog<?php echo $i ?>" title="SGVCA" class="contenido">
            <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila3['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
        </div>
    </td> 


    <td><?php echo $fila3['GeneraBaja'] ?></td> 
    <td><?php echo $fila3['nResBRegistro'] ?></td>

    <td><?php echo $fila3['RUC'] ?></td>
    <td><?php echo $fila3['nomEmpresa'] ?></td>                                                  


    <td>
        <a href="#" id="abriPoppupo<?php echo $i ?>"><?php echo $fila3['dni_t'] ?>
        </a>
    </td>

    <div id="dialogo<?php echo $i ?>" title="SGVCA" class="contenido">
        <iframe src="formControlPosteriorAsegurados.php?dni=<?php echo $fila3['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
    </div>  


    <td><?php echo $fila3['nombres'] ?></td>

    <td>
        <a href="<?php echo $fila3['ruta_pdf'] ?>" target="_blank"><?php echo $fila3['nombrePDF'] ?>
        </a>

    </td>                                              

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
                $.post("include/getFecha.php", {ano: ano}, function (data) {
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
                    dialogClass: "no-close",
                    resizable: true,
                    width: 850,
                    height: 750,
                    modal: true,
                    buttons: [{
        text: "CERRAR",
        click: function() {
            $( this ).dialog( "close" );
        }
    }]


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
        
         
         
         <?php 

         ?>
    </body>
    </html>
