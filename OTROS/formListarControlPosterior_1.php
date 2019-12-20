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
        <link rel="stylesheet" type="text/css" href="css/tablas.css"/>

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
        
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/> 
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>   
        
        <script>var $j = jQuery.noConflict();</script>
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>-->
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
<!--<div class="cargando"><h3>Cargando página ...</h3> Sea paciente, los datos demoran en ser importados.</div>-->
<!--<div class="loader"><h3>Cargando página ...</h3> Sea paciente, los datos demoran por ser importados.</div>-->
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
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\SIMVECA_FCONSENTIDA.mp4" target="_blank">EXTRACCION PDF</a></li>
                        </ul>
                    </li>
                    <li><a href="#">VERIFICACION</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\SIMVECA_VERIFICACION_1.mp4" target="_blank">Verificacion</a></li>                           
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
                            where tea.idTEstadoActual in(1,2,3) order by tea.idTEstadoActual asc";
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
                        <?php 
                        $queryano = "SELECT distinct(substr(f.fCreacionTerminado,1,4)) ano_t FROM dim_cposterior f where f.fCreacionTerminado is not null";
            $resultadoano = $conexionmysql->query($queryano);
            ?>

            <div class="formleyenda">
                <label>SELECCIONE EL AÑO DE BAJA REGISTRO</label>
                <select name="cbx_ano_t" id="cbx_ano_t">
                    <option value="*">AÑO</option>
                    <?php while ($row = $resultadoano->fetch_assoc()) { ?>
                        <option value="<?php echo $row['ano_t']; ?>"><?php echo $row['ano_t']; ?></option>
                    <?php } ?>
                </select>
            </div>  
                        <div class="formleyenda" >
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

                        <td>
                            <button type="submit" class="button button1">Filtrar</button> 
                        </td>

                    </form>
                </fieldset>
            </div>
        </div>

        <div  id="DNIRUC" class="tabcontent">
            <div class="contieneportafolio" id="contieneportafolio_1">
                <div class="formleyenda" id="check">
                    <form  action="" method="post">
                        <div class="formleyenda">INGRESE DNI</div>
                        <input type="text" name="cbx_dni" id="cbx_dni" class="con_estilos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                    event.returnValue = false;" maxlength="11" required="">
                            <button  type="submit" class="button button1">Filtro 1</button>             
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
                    <input id="i1" type="HIDDEN" name="cbx_OficinaAA" value="<?php echo $cbx_OficinaAA; ?>" readOnly="readOnly">   
                                <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2">  
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
                                                if ($conexionmysql->query($query)) {
                                                    while ($fila = $result->fetch_assoc()) {
                                                        $i++;
                                                        ?>
                                                        <tr style="background-color: #FFFFFF; border-color:#87CEFA;" >
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
                                                    where month(cp.fCreacion) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
                                                    year(cp.fCreacion)='$ano' and
                                                    tea.idTEstadoActual='$cbx_estadoActual'
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
        <input id="i1" type="hidden" name="cbx_estadoActual" value="<?php echo $cbx_estadoActual; ?>" readOnly="readOnly"></input>
        <input id="i3" type="hidden" name="cbx_ano_t" value="<?php echo $ano; ?>" readOnly="readOnly"></input>
        <input id="i4" type="hidden" name="cbx_enero" value="<?php echo $enero; ?>" readOnly="readOnly"></input>
        <input id="i5" type="hidden" name="cbx_febrero" value="<?php echo $febrero; ?>" readOnly="readOnly"></input> 
        <input id="i6" type="hidden" name="cbx_marzo" value="<?php echo $marzo; ?>" readOnly="readOnly"></input> 
        <a href="reporteExcel.php"></a>
        <input id="i7" type="hidden" name="cbx_abril" value="<?php echo $abril; ?>" readOnly="readOnly"></input> 
        <input id="i8" type="hidden" name="cbx_mayo" value="<?php echo $mayo; ?>" readOnly="readOnly"></input> 
        <input id="i9" type="hidden" name="cbx_junio" value="<?php echo $junio; ?>" readOnly="readOnly"></input> 
        <input id="i10" type="hidden" name="cbx_julio" value="<?php echo $julio; ?>" readOnly="readOnly"></input>
        <input id="i11" type="hidden" name="cbx_agosto" value="<?php echo $agosto; ?>" readOnly="readOnly"></input> 
        <input id="i12" type="hidden" name="cbx_setiembre" value="<?php echo $setiembre; ?>" readOnly="readOnly"></input> 
        <input id="i13" type="hidden" name="cbx_octubre" value="<?php echo $octubre; ?>" readOnly="readOnly"></input> 
        <input id="i14" type="hidden" name="cbx_noviembre" value="<?php echo $noviembre; ?>" readOnly="readOnly"></input> 
        <input id="i15" type="hidden" name="cbx_diciembre" value="<?php echo $diciembre; ?>" readOnly="readOnly"></input>
                   
                   <input type="submit" name="buscar" value="Exportar Excel" maxlength="11" class="button button2">  
                       
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
                                                if ($conexionmysql->query($query)) {
                                                    while ($fila = $result->fetch_assoc()) {
                                                        $i++;
                                                        ?>
                                                        <tr style="background-color: #FFFFFF; border-color:#87CEFA;" >
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
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil AND tpf.idTVerificacion='1' 
                                                    left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
                                                    left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                                                    left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
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
                                    <tr style="background-color: #d1e4f3; border-color:#87CEFA;">
                                        <td id="size_1">OFICINA</td>
                                        <td id="size_2">VERIF</td>
                                        <td id="size_2">T DE VERIF</td>
                                        <td id="size_2">EST<br>ACTUALaaaa</td>
                                        <td id="size_2">GENERA BAJA <br>REGIST</td>

                                        <td id="size_3">Nº RESOLUCION DE BAJA REGISTRO</td>

                                        <td id="size_1">RUC</td>

                                        <td id="size_1">RAZON SOCIAL</td>

                                        <td id="size_1">DNI_TITULAR</td>

                                        <td id="size_1">APELLIDOS Y NOMBRES</td>

                                      <td id="size_1">NOMBRE DEL PDF</td>                                       

                        <td id="size_3">OBSERVACIONES</td>
                        
                        <td id="size_3">REGISTRADO POR</td>
                        
                        <td id="size_3">FECHA DE CREACION</td>
                        <td id="size_3">FECHA DE TERMINO</td>
                        <td id="size_3">FECHA ULTIMA ACTUALIZACION</td>
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
                                                        <tr style="background-color: #FFFFFF; border-color:#87CEFA;" >
                                                            <td id="size_11"><?php echo $fila['OFICINA'] ?></td>
                                                            <td id="size_2"><?php echo $fila['idTVerificacion'] ?></td>
                                                            <td><?php echo $fila['idTVerificacionPerfil'] ?></td>

                                                            <td>
                                                                <a href="#" id="abriPoppup<?php echo $i ?>"><?php echo $fila['EstadoActual'] ?>
                                                                </a>

                                                                <div id="dialog<?php echo $i ?>" title="VISUALIZACION DEL REGISTRO DE CONTROL POSTERIOR" class="contenido">
                                                                    <iframe src="formEditarCPosterior.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                                                </div>
                                                            </td> 
       

                                                            <td><?php echo $fila['GeneraBaja'] ?></td> 
                                                            <td><?php echo $fila['nResBRegistro'] ?></td>

                                                            <td><?php echo $fila['RUC'] ?></td>
                                                            <td><?php echo $fila['nomEmpresa'] ?></td>                                                  


                                                            <td>
                                                                <a href="#" id="abriPoppupo<?php echo $i ?>"><?php echo $fila['dni_t'] ?>
                                                                </a>
                                                            </td>

                                                            <div id="dialogo<?php echo $i ?>" title="SGVCA" class="contenido">
                                                                <iframe src="formControlPosteriorAsegurados.php?dni=<?php echo $fila['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>
                                                            </div>  


                                                            <td><?php echo $fila['nombres'] ?></td>

                                                             <?php
        if (is_null($fila['ruta_pdf'])) {
            ?>

            <td>
                <?php echo $fila['nombrePDF'] ?>                                                                                                                

            </td> 

            <?php
        } else {
            ?>


            <td>
                <a href="<?php echo $fila['ruta_pdf'] ?>" target="_blank"><?php echo $fila['nombrePDF'] ?>
                </a>

            </td> 

<?php
}
?>

    <td><?php echo $fila['observaciones'] ?></td>
    
    <td><?php echo $fila['usuarioase'] ?></td>
    
    <td><?php echo $fila['fCreacion'] ?></td>  

    <td><?php echo $fila['fCreacionTerminado'] ?></td>  
    
    <td><?php echo $fila['fActualizacion'] ?></td>                           

                                                        </tr>

                                                    <?php } ?>


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
                                                    left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil AND tpf.idTVerificacion='1' 
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

            <section >
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
                                                    <tr style="background-color: #FFFFFF; border-color:#87CEFA;" >
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
                });
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
                            modal: true
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
