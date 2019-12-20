<?php
session_start();
require './conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA, o.direccion, o.distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

// <link rel="stylesheet" href="/resources/demos/style.css">
//<script type="text/javascript" src="../../../js/jquery-3.1.1.min.js"></script>
//<script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
//<script type="text/javascript" src="../../../js/cambiarPestanna.js"></script>
//<script type="text/javascript" src="../SISGASV/js/jquery-1.4.2.min.js"></script>  
//<script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
?>

<!doctype html>
<html lang="en">
    <head>
<link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
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
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         

        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 

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
            @media screen and (max-width: 900px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }
        </style>



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
                        width: 1200,
                        modal: true,
                    });
                }
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                        height: 600,
                        width: 1200,
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
        </script>

    </head>
    <body> 

        <DIV id="header">
            <ul class="nav">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a href="#">Registros por Iniciativa Propia</a>
                        <ul>
                            <li><a href="formControlPosteriorIniciativaPropia.php">Titulares</a></li>
                            <li><a href="formControlPosteriorIniciativaPropia_dh.php">Derecho Habientes</a></li>
                           <li><a href="formControlPosteriorIniciativaPropia_no_dh.php">Derecho Habientes no Registrado</a></li>
                        </ul>
                    </li>
                        <li><a href="">Registrar Formulario Control Posterior</a>
                            <ul>
                                <li>
                                    <a href="formListarControlPosteriorUsuario.php">Listar Registros de Bajas de la OSPE Actual</a>
                                </li>
                                <li>
                                    <a href="formListarControlPosterior.php">Listar Registros de Bajas de TODAS las OSPE</a>
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
                <li><a href="">Acerca de...</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="logout.php">Cerrar Session</a></li>
            </ul>
        </DIV>       

        <h4><?PHP
            echo 'Bienvenid@<br>' . utf8_decode($row['nombres']);
            echo '<BR>OFICINA: ' . utf8_decode($row['OFICINA']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            ?>  
            <br><a href="logout.php">Cerrar Session</a>
        </h4>                
        <br>
        <br>

        <header>
            <h1>REPORTE</h1>
            <p>DE ORDEN DE VERIFICACION </p>                
        </header>

       <div>
 
           <form name="form" action="" method="POST">          
                FECHA DE INICIO <input type="date" name="dateinicio">    
                <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idOficinaUsuario ?>" readOnly="readOnly">                   
                FECHA DE FIN <input type="date" name='datefin'>                  
                <BR>
                <input type="submit" name="buscar" value="Buscar" maxlength="11">
            </form>           
        </div>
        
        <?php
if (isset($_POST['buscar'])) {
    
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];

            include './conexionesbd/conexion_mysql.php';


           $query3 = "SELECT o.oficina, a.idtusuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ', u.snom) nombres, count(*) total
                FROM dim_cposterior a
                left join dim_usuario u on a.idtusuario=u.iddim_usuario
                left join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
                where (DATE(a.fCreacionTerminado) BETWEEN '$dateinicio' and '$datefin') 
                and o.idDIM_Oficina='$idDIM_Oficina' 
                and not a.idtusuario='1'
                group by idtusuario, oficina";
    


//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query3);
//recorriendo el conjunto de resultados con un bucle
            $i = 0;
            ?>

            <div class="panel-heading" id="panel_1">
                <h2>LISTADO DE BAJAS DE REGISTRO DEL CONTROL POSTERIOR</h2>
            </div>

           
                <table id="table_2" border="1" class="table table-hover table-bordered table-condensed table-striped table-fixed">

                    <div class="table-responsive">                                                      
                        <div align="center">  
                            <thead id="">
                                <tr>
                                    <td id="size_1">oficina</td>
                                    <td id="size_2">nombres</td>
                                    <td id="size_2">total</td>                                    
                                </tr>
                            </thead>

                        </div> 
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
                                                        <td id="size_11"><?php echo $fila3['oficina'] ?></td>
                                                        <td id="size_2"><?php echo $fila3['nombres'] ?></td>
                                                        <td><?php echo $fila3['total'] ?></td>
                                                    </tr>
                                                    
                                                   
                                                    <?php } ?>

       
                                                    
                                                    </table>

                                                  
          <form name="form" action="exportar/reporteExcel_fechas.php" method="POST"> 
              <input type="HIDDEN" name="dateinicio" value="<?php echo $dateinicio ?>">    
                <input id="i1" type="HIDDEN" name="idDIM_Oficina" value="<?php echo $idDIM_Oficina ?>">                   
                <input type="HIDDEN" name='datefin' value="<?php echo $datefin ?>">             
                                                            <input type="submit" name="buscar" value="Exportar" maxlength="11">
          </form>
       
                   <?php
    } else {
        echo 'Error al cargar';
    }//liberando los recursos
    $result->free();
}

      ?>                         
 
        <br>
            <footer>
                <p>
                    &copy; Copyright  by David Espichan Moreno
                </p>
            </footer>

    </body>
</html>





