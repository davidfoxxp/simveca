<?php
/*
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
 * 
 */
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



    </head>
    <body class="vimeo-com">


        <h4><img src="imagenes/logo_login.png" alt="" />
        

        </h4>

        <!-- Beginning of compulsory code below -->
        <div class="panel-heading" id="panel_1">
            <ul id="nav" class="dropdown dropdown-horizontal">
                
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
                    <li><a href="#">CONTROL POSTERIOR NUEVOS VIDEOS</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_SI_Terminado.mp4" target="_blank">Reg_SI_Terminado</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_NO_Terminado.mp4" target="_blank">Reg_NO_Terminado</a></li>                            
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\FIRMES_Y_CONSENTIDAS.mp4" target="_blank">FIRM_Y_CONSENT</a></li>                            
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
                </ul>
            </li>
                <li><a href="logout.php">Salir</a></li>
            </ul>
        </div>
        <!-- / END -->


        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'OSPE')">TIPOS DE OSPE</button>
            <button class="tablinks" onclick="openCity(event, 'ESTADO')">ESTADOS</button>
            <button class="tablinks" onclick="openCity(event, 'DNIRUC')">DNI/RUC</button>
        </div>

        <!-- Tab content -->
        <div class="tabcontent" id="OSPE">            
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        include './conexionesbd/conexion_mysql.php';
                        $query = "SELECT DISTINCT(o.tipoOficina) tipoOficina FROM dim_oficina o
                            where not o.tipoOficina='0'
                            order by o.tipoOficina asc";
                        $resultado = $conexionmysql->query($query);
                        ?>

                        <div class="formleyenda">SELECCIONE TIPO DE OSPE 
                            <select name="cbx_tipoOficina" id="cbx_tipoOficina" class="con_estilos" required="">
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['tipoOficina']; ?>"><?php echo $row['tipoOficina']; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="formleyenda">SELECCIONE UNA OSPE 
                            <select name="cbx_oficina" id="cbx_oficina" required="" class="con_estilos"></select>
                            <?PHP
//echo 'OSPE ', '<select name="oficina" id="oficina" class="con_estilos" required></select>';
                            ?>
                        </div>


                        <div class="formleyenda">SELECCIONE UNA UNIDAD/OSPE 
                            <select name="cbx_OficinaAA" id="cbx_OficinaAA" required="" class="con_estilos"></select>
                            <?PHP
                            //echo 'UNIDADES', '<select name="OficinaA" id="OficinaA" class="con_estilos" required></select>';
                            ?>
                        </div>  
                        <div class="formleyenda">
                            <button type="submit" class="button button1">Filtrar</button>
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>

        
        <div id="ESTADO" class="tabcontent">
            <div class="contieneportafolio" id="contieneportafolio_1">
                <fieldset>                    
                    <form action="" method="post"> 
                        <?PHP
                        $query1 = "SELECT DISTINCT(tea.idTEstadoActual), tea.EstadoActual
                            FROM tipoestadoactual tea
                            where tea.idTEstadoActual order by tea.idTEstadoActual asc";
                        $resultado1 = $conexionmysql->query($query1);
                        ?>

                        <div class="formleyenda">SELECCIONE TIPO DE ESTADO 
                            <select name="cbx_estadoActual" id="cbx_estadoActual" class="con_estilos" >
                                <option value="">TIPO</option>
                                <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTEstadoActual']; ?>"><?php echo $row['EstadoActual']; ?></option>
                                <?php } ?>

                            </select>
                        </div>    

                        <td>
                            
                                <button type="submit" class="button button1" onclick="document.getElementById('oculto').style.visibility='visible'"> Filtrar</button>
                        </td>



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



        <?php
        /* ------------INICIO---------------------PRIMERA BUSQUEDA-------------------------------------------------------------------------- */

        if (isset($_POST['cbx_OficinaAA'])) {
            $cbx_OficinaAA = $_POST['cbx_OficinaAA'];


            include './conexionesbd/conexion_mysql.php';


            $query = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    cp.idTVerificacion,
                                                    cp.idTVerificacionPerfil,
                                                    cp.idTEstadoActual,  
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
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
                                                    /*left join dim_pacalificar pc on cp.iddim_CPosterior=pc.iddim_CPosterior*/
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    where ai.idDIM_Oficina='$cbx_OficinaAA'
                                                    order by cp.iddim_CPosterior ASC";
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
            </div>

            <section>
                <form name="form" action="exportar/reporteExcel1.php" method="POST">
                    <input id="i1" type="HIDDEN" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly" >   
                                <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2">  
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
                                    </tr>
                                </thead>

                            </div>             

                            <tbody id="">                    
                                <div class="col-md-1">
                                    <div class="panel panel-default">                        
                                        <div class="table-responsive">                                                      
                                            <div align="center">  
                                                <?php
                                                if ($conexionmysql->query($query)) {
                                                    while ($fila = $result->fetch_assoc()) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td id="size_11"><?php echo $fila['OFICINA'] ?></td>
                                                            <td id="size_2"><?php echo $fila['idTVerificacion'] ?></td>
                                                            <td><?php echo $fila['idTVerificacionPerfil'] ?></td>

                                                            <td><?php echo $fila['idTEstadoActual'] ?></td>


                                                            <td><?php echo $fila['GeneraBaja'] ?></td> 
                                                            <td><?php echo $fila['nResBRegistro'] ?></td>

                                                            <td><?php echo $fila['RUC'] ?></td>
                                                            <td><?php echo $fila['nomEmpresa'] ?></td>                                                  
                                                            <td><?php echo $fila['dni_t'] ?></td> 
                                                            <td><?php echo $fila['nombres'] ?></td>

                                                            <td><?php echo $fila['nombrePDF'] ?></td>                                              

                                                            <td><?php echo $fila['observaciones'] ?></td>                                

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </div>
                </table>
            </form>
        </section>

        <?php
        /* --------------INICIO-------------------SEGUNDA BUSQUEDA-------------------------------------------------------------------------- */
        if (isset($_POST['cbx_estadoActual'])) {
            $cbx_estadoActual = $_POST['cbx_estadoActual'];

            include './conexionesbd/conexion_mysql.php';


            $query = "SELECT cp.iddim_CPosterior,
                                                    concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                                                    cp.idTVerificacion,
                                                    cp.idTVerificacionPerfil,
                                                    cp.idTEstadoActual,  
                                                    cp.nResBRegistro,
                                                    cp.nombrePDF,
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
                                                    where tea.idTEstadoActual='$cbx_estadoActual'
                                                    order by cp.iddim_CPosterior ASC";


//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>
            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>

            </div>  

           
            <section>
                <form name="form" action="exportar/reporteExcel1.php" method="POST"> 
                    <input id="i1" type="HIDDEN" name="cbx_estadoActual" value="<?php echo $cbx_estadoActual; ?>" readOnly="readOnly">    
                    <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2"> 
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
                                    </tr>
                                </thead>

                            </div>             

                            <tbody id=""> 
                                
                                <div class="col-md-1">
                                    
                                    <div class="panel panel-default">     
                                        
                                        <div class="table-responsive"> 
                                            
                                            <div align="center">                                 
                                                
                                                <?php
                                                if ($conexionmysql->query($query)) {
                                                    while ($fila = $result->fetch_assoc()) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td id="size_11"><?php echo $fila['OFICINA'] ?></td>
                                                            <td id="size_2"><?php echo $fila['idTVerificacion'] ?></td>
                                                            <td><?php echo $fila['idTVerificacionPerfil'] ?></td>

                                                            <td><?php echo $fila['idTEstadoActual'] ?></td>


                                                            <td><?php echo $fila['GeneraBaja'] ?></td> 
                                                            <td><?php echo $fila['nResBRegistro'] ?></td>

                                                            <td><?php echo $fila['RUC'] ?></td>
                                                            <td><?php echo $fila['nomEmpresa'] ?></td>                                                  
                                                            <td><?php echo $fila['dni_t'] ?></td> 
                                                            <td><?php echo $fila['nombres'] ?></td>

                                                            <td><?php echo $fila['nombrePDF'] ?></td>                                              

                                                            <td><?php echo $fila['observaciones'] ?></td>                                

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
                                            
                                            /* ----------FIN-----------------------SEGUNDA BUSQUEDA-------------------------------------------------------------------------- */
                                            ?>

                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                          </tbody>                          
                     </div>
                </table>      

             </form>
          </section>



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
                                                    cp.nombrePDF,
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
                                                    where ai.dni_t='$cbx_dni'
                                                    order by cp.iddim_CPosterior ASC";



//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
            </div>

            <section>
                <form name="form" action="exportar/reporteExcel1.php" method="POST"> 
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
                                    </tr>
                                </thead>

                            </div>             

                            <tbody id="">                    
                                <div class="col-md-1">
                                    <div class="panel panel-default">                        
                                        <div class="table-responsive">                                                      
                                            <div align="center">  
                                                <?php
                                                if ($conexionmysql->query($query)) {
                                                    while ($fila = $result->fetch_assoc()) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td id="size_11"><?php echo $fila['OFICINA'] ?></td>
                                                            <td id="size_2"><?php echo $fila['idTVerificacion'] ?></td>
                                                            <td><?php echo $fila['idTVerificacionPerfil'] ?></td>

                                                           <!-- <td><a href="#" id="abriPoppup<?php //echo $i ?>"><?php //echo $fila['EstadoActual'] ?></a>

                                                                <div id="dialog<?php //echo $i ?>" title="DETALLE DEL REGISTRO DE CONTROL POSTERIOR " class="contenido">
                                                                    <iframe src="index_formListarOrdenVerificacion_visualizar.php?iddim_CPosterior=<?php //echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                                </div>
                                                            </td> -->

                                                            <td id="size_2"><?php echo $fila['EstadoActual'] ?></td>

                                                            <td><?php echo $fila['GeneraBaja'] ?></td> 
                                                            <td><?php echo $fila['nResBRegistro'] ?></td>

                                                            <td><?php echo $fila['RUC'] ?></td>
                                                            <td><?php echo $fila['nomEmpresa'] ?></td>     
                                                            
                                                            <td><?php echo $fila['dni_t'] ?></td>     

                                                            <!--
                                                            <td>
                                                                <a href="#" id="abriPoppupo<?//php echo $i ?>"><?//php echo $fila['dni_t'] ?>
                                                                </a>
                                                            </td>

                                                            <div id="dialogo<?//php echo $i ?>" title="DATOS ACREDITA" class="contenido">
                                                                <iframe src="formControlPosteriorAsegurados.php?dni=<?//php echo $fila['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                            </div>  
                                                            -->

                                                            <td><?php echo $fila['nombres'] ?></td>

                                                            <td><?php echo $fila['nombrePDF'] ?></td>                                              

                                                            <td><?php echo $fila['observaciones'] ?></td>                                

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </div>
                </table>
            </form>
        </section>

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
                                                    
                                                    left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
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

                                                        <td><?php echo $fila3['GeneraBaja'] ?></td> 
                                                        <td><?php echo $fila3['nResBRegistro'] ?></td>

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

                                                        <td><?php echo $fila3['nombrePDF'] ?></td>                                              

                                                        <td><?php echo $fila3['observaciones'] ?></td>                                

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
                $("#cbx_tipoOficina").change(function () {

                    $('#cbx_OficinaAA').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    $("#cbx_tipoOficina option:selected").each(function () {
                        tipoOficina = $(this).val();
                        $.post("include/getOSPES.php", {tipoOficina: tipoOficina}, function (data) {
                            $("#cbx_oficina").html(data);
                        });
                    });
                })
            });
            $(document).ready(function () {
                $("#cbx_oficina").change(function () {
                    $("#cbx_oficina option:selected").each(function () {
                        //tipoOficina = $(this).val();
                        oficina = $(this).val();
                        $.post("include/getUnidades.php", {oficina: oficina}, function (data) {
                            $("#cbx_OficinaAA").html(data);
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
