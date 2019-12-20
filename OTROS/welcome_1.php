<?php
session_start();
require "../SISGASV/conexionesbd/conexion_mysql.php";

if(!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";
        
        $result = $conexionmysql->query($sql);
        
        $row = $result->fetch_assoc();

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            :::: BIENVENIDO ::::            
        </title>
        <style type="text/css">
            body {
                background-image: url("imagenes/fondo2.jpg");
                background-repeat: repeat-x;
                background-attachment: fixed;
                font-size: 12px;
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
                vertical-align:left;
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
                font-size: 0.50em;
                padding: 0.1px;
            }

            .sizetexto{
                text-align: center;
                width: 200px;
                font-weight: bold;
            }

            .sizetexto2{
                text-align: center;

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


        </style>
    </head>
    
    <body bgcolor='#A9D0F5'>
        <H2>
        <span style="color: #FFFFFF">SISTEMA DE LA GERENCIA DE AUDITORIA DE SEGUROS Y VERIFICACION - SIGASV</span>
            </H2>
        <br>
        <h1><?PHP
        echo 'Bienvenido<br>' .  utf8_decode($row['nombres']);
         echo '<BR>OFICINA: ' . utf8_decode($row['OFICINA']);?></h1>
        
    <?php
        if($_SESSION['perfil']>=0) {
            $_SESSION['usuario'] = $row['iddim_usuario'];
           
    ?>
        
        <br>
        <DIV id="header">
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
                        <li><a href="formOVEntrevistaAsegurado.php">Registrar Orden de Verificacion/<br>Entrevista al Asegurado</a>
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
       
        <?php
        }
        ?>
           
        <div>
            
        </div>
        
        
    </body>    
</html>