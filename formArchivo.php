<?php
session_start();
require './conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura, o.nomenclaturaOSPE,
        o.oficina,o.direccion,o.Distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

//$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
//        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
//        FROM dim_usuario u 
//        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
//        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Verificacion = $_GET['iddim_Verificacion'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi,cp.num_verifi,don.numero,
                        don.ordenV, dr.numResBOficio, dr.ruta_pdf_reso,
                        ai.RUC
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join dim_overificacion don on don.iddim_Overificacion=cp.iddim_Verificacion
                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
                        where cp.iddim_Verificacion='$iddim_Verificacion'";
$resultsql2 = $conexionmysql->query($sql2);
$row2 = $resultsql2->fetch_assoc();

// <link rel="stylesheet" href="/resources/demos/style.css">
//<script type="text/javascript" src="../../../js/jquery-3.1.1.min.js"></script>
//<script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
//<script type="text/javascript" src="../../../js/cambiarPestanna.js"></script>
?>

<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <title>Conexion con MySQL</title>	
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="../SISGASV/css/bootstrapform.css" media="screen">
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script> 

        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 



        <style type="text/css">
            .button2 {
                border-radius: 8px;
                padding: 5px 5px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                background-color: white; 
                color: black; 
                border: 2px solid #008CBA;
                font-size: 12px;
            }

            .button2:hover {
                background-color: #008CBA;
                color: white;
            }


            /*programando con css*/
            body {               
                background-repeat: repeat-x;
                background-attachment: fixed;
            }    
            #td1 {
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }
            #t1 {
                text-align:center;
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
                font-size:12px;
                font-weight:normal;
                padding:3px 2px;
                border-style:solid;border-width:0.5px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }

            #th2 {
                font-family:Arial, sans-serif;
                font-size:10px;
                font-weight:normal;
                padding:3px 2px;
                border-style:solid;border-width:0.5px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#306593;
                background-color:#E3F2E1;
            }

            #td2 {
                font-family:Arial, sans-serif;
                font-size:8px;
                font-weight:normal;
                padding:3px 2px;
                border-style:solid;border-width:0.5px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#306593;
            }

            #th11 {
                font-family:Arial, sans-serif;
                font-size:10px;
                font-weight:normal;

                overflow:hidden;
                word-break:normal;        
            }
            tr td {
                vertical-align:left;
            }
            @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }
            #tho
            {
                font-family:Arial, sans-serif;
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                text-align: left;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;

                background-color: #B0C4DE;
            }


        </style>
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
        <script>
            $(function () {
                $("#dialog1").hide();
                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 260,
                        width: 450,
                        scrollbars: false,
                        toolbar: false,
                        modal: true
                    });
                }
                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });
            });
        </script>

        <style type="text/css">
            .con_estilos {
                width: auto;
                padding: 5px;
                font-size: 14px;
                border: 1px solid #ccc;
                height: 26px;                
            }

            .tooltip {
                position: relative;
                display: inline-block;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 140px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -75px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }

        </style>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 390,top = 50');
            }
        </script>   

        <script language="JavaScript">

            function pregunta(e) {
                if (confirm('Se buscara los periodos ya guardados')) {
                } else {
                    e.preventDefault();
                }
            }
            function ShowSelected()
            {
                /* Para obtener el valor */
                var ofi = document.getElementById("unidad").value;
                document.getElementById('numResBOficio').value = ofi;
                /* Para obtener el texto */
//var combo = document.getElementById("casoDerivado");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);
            }
        </script>
        <script>
            var mostrarValor = function (x) {
                document.getElementById('textoOAS').value = x;
            }
        </script>



    </head>
    <body>  
        <?PHP
        $nomenclaturaOSPE = utf8_decode($row['nomenclaturaOSPE']);
        $nomenclatura = utf8_decode($row['nomenclatura']);
        $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
        $oficinaIni = utf8_decode($row['oficinaIni']);
        $oficina = utf8_decode($row['oficina']);
        $direccion = utf8_decode($row['direccion']);
        $Distrito = utf8_decode($row['Distrito']);
        $nombreai = utf8_decode($row2['nombreai']);
        $dniait = utf8_decode($row2['dni_t']);
        $direccionait = utf8_decode($row2['DIRECCION_t']);
        $distritoait = utf8_decode($row2['DISTRITO_t']);
        $provinciaait = utf8_decode($row2['PROVINCIA_t']);
        $eempleadora = utf8_decode($row2['RUC']);

        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        $ano = utf8_decode($row2['an_verifi']);
        $num_verifi = utf8_decode($row2['num_verifi']);
        $numero = utf8_decode($row2['numero']);
        $ordenV00 = utf8_decode($row2['ordenV']);
        $numResBOficio = utf8_decode($row2['numResBOficio']);

        $numeroConCeros = str_pad($numero, 3, "0", STR_PAD_LEFT);

        $newInicioPFinal = "";
        $newFinPFinal = "";
        //$iddim_CPosterior="20363";

        $nombre_pdf_multa = $num_verifi . $dniait . $eempleadora . $cod_oficinaIni;
        ?> 

        <form id ="pcalificart" name="form2" action="actualizarVerificacion_ResBOficio.php" method="POST" > 
            <table id="t1" border="1" summary="Rellena Formulario">

                <!--Incrustar php-->
                <?php
                // $iddim_Verificacion = $_GET['iddim_Verificacion'];
                //incluir el archivo de conexion
                include './conexionesbd/conexion_mysql.php';
                //realizando una consulta usando la clausula select
                $query = "SELECT dr.iddim_ResBOficio,
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,

                        dr.fechaEmiBOficio,
                        
                        trr.idTRRBRegistro,
                        trr.RRBRegistro,
                        dr.numResBoficio,
                        est.idTEstadoActual,
                        est.EstadoActual,
                        ve.fechaDevInfFinalJOSPE,
                        dr.nombre_PDF_reso,
                        dr.ruta_pdf_reso,
                        dr.fechaNAsegurado,
                        dr.fechaNEmpleador,
                        dr.fechaActFirme, 
                        dr.fechaApelacion,
                        dr.fechaResultado
                        
                        FROM dim_resboficio dr
                        left join dim_aseguradoindevido ai on dr.iddim_Overificacion=ai.iddim_aseguradoindevido
                        left join tiporrbregistro trr on dr.idTRRBRegistro=trr.idTRRBRegistro
                        left join tipoestadoactual  est on dr.id_EstadoReso = est.idTEstadoActual
                        left join dim_verificacion ve on dr.iddim_Overificacion=ve.iddim_Verificacion
                        where ai.iddim_aseguradoindevido='$iddim_Verificacion'";


                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila = $result->fetch_assoc()) {
                    ?>

                    <?php
                    $hoy = getdate();
                    //echo $hoy = date("m/Y"); 
                    ?>

                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                    <!--///NUMERO 1 //-->



<!--                    <tr>
                        <td id="tho" class="especial" style="width: 215px" >
                            NUMERO DE RESOLUCION <br>DE BAJA DE OFICIO ***
                        </td>    

    <?php if (is_null($fila['numResBoficio'])) { ?>    
                            <td id="td1" colspan="3" style="width: 220px">
                                <select name="unidad" id="unidad" class="especial" onchange="ShowSelected();">
                                    <option value="">----</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE</option>
                                    <option value="<?php echo $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">UCF</option>
                                    <option value="<?php echo "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OAALMENARA</option>
                                    <option value="<?php echo "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OAREBAGLIATI</option>
                                    <option value="<?php echo "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OASABOGAL</option>

                                    <option value="<?php echo $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">UCF/OAALMENARA</option>
                                    <option value="<?php echo $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">UCF/OAREBAGLIATI</option>
                                    <option value="<?php echo $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">UCF/OASABOGAL</option>  

                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/UCF</option>

                                    <option value="<?php echo $cod_oficinaIni . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/OAALMENARA</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/OAREBAGLIATI</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/OASABOGAL</option>

                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/UCF/OAALMENARA</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/UCF/OAREBAGLIATI</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-085-$numeroConCeros"; ?>">OSPE/UCF/OASABOGAL</option>

                                </select>
                                <input  style="width: 315px;" readonly class="form-control" id="numResBOficio" name="numResBOficio" value="<?php echo $fila['numResBoficio'] ?>" />   

                            </TD>
        <?php
    } else {
        ?>
                            <td id="td1" colspan="3" style="width: 190px">

                                <input  style="width: 250px;" readonly class="form-control" id="numResBOficio" name="numResBOficio" value="<?php echo $fila['numResBoficio'] ?>" />                               

                            </TD>

        <?php
    }
    ?>
                    </tr> -->


                    <!--///NUMERO 3 //-->
<!--                    <tr>
    <?php
    if (is_null($fila['ruta_pdf_reso'])) {
        ?>
                        
                        <?php
    if (is_null($fila['numResBoficio'])) {
        ?>
                        
                            <td id="tho" class="especial" style="width: 200px">
                                NOMBRE DEL PDF
                            </td> 
                            <td>
                                <input type = "text" name = "nombre_PDF_reso" style="width: 250px; border: 0px;" id="myInput" value="<?php echo $nombre_pdf_multa ?>" readOnly="">
                                <button onclick="myFunction22()"><i class="fas fa-copy"></i></button>
                            </td> 
                            
                             <?php
    } else {
        ?>
                            <td id="tho" class="especial" style="width: 200px">
                                NOMBRE DEL PDF
                            </td> 
                            <td id="td1" colspan="2" >                              
                                
                                <input type = "text" name = "nombre_PDF_reso" style="width: 250px; border: 0px; text-align: center" id="myInput" value="<?php echo $fila['nombre_PDF_reso'] ?>" readOnly="">
                            </td> 
                            
                             <?php
    }
        ?>

        <?php
    } else {
        ?>
                            <td id="tho" class="especial" style="width: 200px">
                                NOMBRE DEL PDF
                            </td> 
                            <td id="td1" colspan="2" >                               
                                
                                <a href="<?php echo $fila['ruta_pdf_reso'] ?>"  target="_blank"><input style="width: 250px;text-align: center" name="nombre_PDF_reso" value="<?php echo $fila['nombre_PDF_reso'] ?>"></a>
                       
                            </td> 
        <?php
    }
    ?>
                    </tr>        -->

                    <!--///NUMERO 3 //-->
                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                           <label style="color: #F80000">FECHA DE ENVIO AL ARCHIVO</label>
                        </td>                          

    <?php if (is_null($fila['fechaEmiBOficio'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaEBO" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaEmiBOficio'] ?>" required=""><br>
                            </TD>
                            <?php
                        } else {
                            ?>
                            <td id="td1" colspan="2" >
                            <?php echo $fila['fechaEmiBOficio'] ?>
                                <input type = "HIDDEN" name = "fechaEBO" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaEmiBOficio'] ?>" readOnly><br>
                            </TD>
                                <?php
                            }
                            ?>
                    </tr>
                    
                                        <!--///NUMERO 3 //-->
<!--                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA NOTIFICACION DE LA RESOLUCION (ASEG.)***
                        </td>                          

                        <?php if (is_null($fila['fechaNAsegurado'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaNAsegurado" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaNAsegurado'] ?>"><br>
                            </TD>
                            <?php
                        } else {
                            ?>
                            <td style="font-size: 12px" colspan="2" >
                            <?php echo $fila['fechaNAsegurado'] ?>
                                <input type = "HIDDEN" name = "fechaNAsegurado" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaNAsegurado'] ?>" readOnly><br>
                            <?php
                                           $inicio = $fila['fechaNAsegurado'];
                                           $fin = date("Y-m-d");

                                           function diferenciaDias($inicio, $fin) {
                                               $inicio = strtotime($inicio);
                                               $fin = strtotime($fin);
                                               $dif = $fin - $inicio;
                                               $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
                                               return ceil($diasFalt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias($inicio, $fin)
                                    ?>
                            
                            </TD>
                                <?php
                            }
                            ?>
                    </tr>
                    
                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA NOTIFICACION DE LA RESOLUCION (EMPLEADOR)***
                        </td>                          

                        <?php if (is_null($fila['fechaNEmpleador'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaNEmpleador" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaNEmpleador'] ?>"><br>
                            </TD>
                            <?php
                        } else {
                            ?>
                            <td style="font-size: 12px" colspan="2" >
                            <?php echo $fila['fechaNEmpleador'] ?>
                                <input type = "HIDDEN" name = "fechaNEmpleador" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaNEmpleador'] ?>" readOnly><br>
                            <?php
                                           $inicioo = $fila['fechaNEmpleador'];
                                           $finn = date("Y-m-d");

                                           function diferenciaDias2($inicioo, $finn) {
                                               $inicioo = strtotime($inicioo);
                                               $finn = strtotime($finn);
                                               $diff = $finn - $inicioo;
                                               $diasFaltt = (( ( $diff / 60 ) / 60 ) / 24);
                                               return ceil($diasFaltt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias2($inicioo, $finn)
                                    ?>
                            
                            </TD>
                                <?php
                            }
                            ?>
                    </tr>-->


                </table>
                <table id="t1" border="1" summary="Rellena Formulario">
                    <!--NUMERO 5-->
                    <TR>                           
                        <td id="tho" class="especial"style="width: 200px">
                            ESTADO DEL CASO
                        </td>
                        <td id="td1"style="width: 190px"><?php echo $fila['EstadoActual'] ?>
                        </td>

    <?php if ($fila['idTEstadoActual'] == '6') { ?> 
                        <td style="width: 200px"><input type="HIDDEN" name="idTEstadoActual" size="50" value="6" readOnly="readOnly">  
                            <select name = "idTEstadoActual" id = "idTEstadoActual" disabled>                                    
                                <option value = '2'>EN PROCESO</option>
                                <option value = '6' selected>BAJA EMITIDA</option>
                                <option value = '4'>ARCHIVO</option>
                            </select>
                        </td>
    <?php } else if ($fila['idTEstadoActual'] == '4') { ?> 
                        <td style="width: 200px"><input type="HIDDEN" name="idTEstadoActual" size="50" value="4" readOnly="readOnly">  
                            <select name = "idTEstadoActual" id = "idTEstadoActual" disabled>                                    
                                <option value = '2'>EN PROCESO</option>
                                <option value = '6'>BAJA EMITIDA</option>
                                <option value = '4' selected>ARCHIVO</option>
                            </select>
                        </td>
    <?php } else {
        ?>
                        <td id="td1"style="width: 200px"><select name = "idTEstadoActual" id = "idTEstadoActual" required="">                                    
<!--                                <option value = '2'>EN PROCESO</option>
                                <option value = '6'>BAJA EMITIDA</option>-->
                                <option value = '4' selected>ARCHIVO</option>
        <?php
    }
    ?>                                        
                        </select>
                    </td>
                    </TR>
                </table> 
<!--                &nbsp;
                <table id="t1" border="1" summary="Rellena Formulario">
                    NUMERO 5
                    
                    
                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA DE ACTO FIRME / RECONSIDERACION / APELACION***
                        </td>                          

                        <?php if (is_null($fila['fechaActFirme'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaActFirme" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaActFirme'] ?>"><br>
                            </TD>
                            <?php
                        } else {
                            ?>
                            <td style="font-size: 12px" colspan="2" >
                            <?php echo $fila['fechaActFirme'] ?>
                                <input type = "HIDDEN" name = "fechaActFirme" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaActFirme'] ?>" readOnly><br>
                            <?php
                                           $iniciooo = $fila['fechaActFirme'];
                                           $finnn = date("Y-m-d");

                                           function diferenciaDias3($iniciooo, $finnn) {
                                               $iniciooo = strtotime($iniciooo);
                                               $finnn = strtotime($finnn);
                                               $difff = $finnn - $iniciooo;
                                               $diasFalttt = (( ( $difff / 60 ) / 60 ) / 24);
                                               return ceil($diasFalttt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias3($iniciooo, $finnn)
                                    ?>
                            
                            </TD>
                                <?php
                            }
                            ?>
                    </tr>
                    
                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA APELACION 
                        </td>                          

                        <?php //if (is_null($fila['fechaApelacion'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaApelacion" min="0001-01-01" id="fechaEBO" value="<?php //echo $fila['fechaApelacion'] ?>"><br>
                            </TD>
                            <?php
                       // } else {
                            ?>
                            <td style="font-size: 12px" colspan="2" >
                            <?php //echo $fila['fechaApelacion'] ?>
                                <input type = "HIDDEN" name = "fechaApelacion" min="0001-01-01" id="fechaEBO" value="<?php //echo $fila['fechaApelacion'] ?>" readOnly><br>
                            <?php
                                       /*    $inicioo = $fila['fechaApelacion'];
                                           $finn = date("Y-m-d");

                                           function diferenciaDias2($inicioo, $finn) {
                                               $inicioo = strtotime($inicioo);
                                               $finn = strtotime($finn);
                                               $diff = $finn - $inicioo;
                                               $diasFaltt = (( ( $diff / 60 ) / 60 ) / 24);
                                               return ceil($diasFaltt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias2($inicioo, $finn)
                                    ?>
                            
                            </TD>
                                <?php
                            }*/
                            ?>
                    </tr>
                    
                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA RESULTADO 
                        </td>                          

                        <?php //if (is_null($fila['fechaResultado'])) { ?>    
                            <td id="td1" colspan="2">
                                <input type = "date" name = "fechaResultado" min="0001-01-01" id="fechaEBO" value="<?php //echo $fila['fechaResultado'] ?>"><br>
                            </TD>
                            <?php
                       /* } else {
                            ?>
                            <td style="font-size: 12px" colspan="2" >
                            <?php echo $fila['fechaResultado'] ?>
                                <input type = "HIDDEN" name = "fechaResultado" min="0001-01-01" id="fechaEBO" value="<?php echo $fila['fechaResultado'] ?>" readOnly><br>
                            <?php
                                           $inicioo = $fila['fechaResultado'];
                                           $finn = date("Y-m-d");

                                           function diferenciaDias2($inicioo, $finn) {
                                               $inicioo = strtotime($inicioo);
                                               $finn = strtotime($finn);
                                               $diff = $finn - $inicioo;
                                               $diasFaltt = (( ( $diff / 60 ) / 60 ) / 24);
                                               return ceil($diasFaltt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias2($inicioo, $finn)
                                    ?>
                            
                            </TD>
                                <?php
                            }*/
                            ?>
                    </tr>
                    
    <?php if (isset($fila["RRBRegistro"])) { ?>
                        <tr> 
                            <td id="tho" class="especial"style="width: 200px">
                                ESTADO DE LA RESOLUCION***
                            </td>
                            <td id="td1" style="width: 190px">                                
        <?php echo $fila['RRBRegistro'] ?>

        <input type = "hidden" name = "idTRRBRegistro" id="idTRRBRegistro" value = "<?php echo $fila['idTRRBRegistro'] ?>" readonly>

                            </td>
                        </tr>

    <?php } else { ?> 
                        <td id="tho" class="especial"style="width: 200px">
                            ESTADO DE LA RESOLUCION*** 
                        </td>
                        <td id="td1" colspan="2">
                            <select name = "idTRRBRegistro" id="idTRRBRegistro" style="font-size:9px">
                                <option value = "0"></option>
                                <option value = "1">FIRME Y CONSENTIDA</option>
                                <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                                <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                                <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                                <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                                <option value = "9">PROCESO DE CALIFICACION</option>
                                <option value = "10">APELACION</option>
                                <option value = "11">RECONSIDERACION EXTEMPORANEA</option>
                                <option value = "12">PROCESO SANCIONADOR</option>
                                <option value = "13">EN PROCESO</option>
                                <option value = "14">IMPUGNADO</option>
                                <option value = "15">RECONSIDERACION INFUNDADA</option>
                                <option value = "16">RECURSO DE RECONSIDERACION</option>
                                <option value = "17">RECURSO IMPUGNATORIO</option>
                                <option value = "18">SE VALORIZO POR MOROSIDAD</option>

                            </select>
                        </td>
    <?php } ?>
                </table> -->


                <table>
    <?php
    if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
        if (!is_null($fila['numResBoficio'])) {
            if (is_null($fila['ruta_pdf_reso'])) {
                ?>
                                <tr>
                                    <td>                                               
                                        <a href="#" id="abriPoppup1" style="font-size: 15px">SUBIR PDF *
                                        </a>
                                    </td>

                                <div id="dialog1" title="SUBIR PDF RESOL. BAJA">
                                    <iframe src="formSubirArchivoVreso.php?iddim_ResBOficio=<?php echo $iddim_Verificacion ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>
                <?php
            }
        }


        if (isset($fila['idTRRBRegistro'])) {
            ?>
            <!--<input type = "hidden"  name = "actualizar" value = "Actualizar">-->
                            <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                        <?php } else { ?>
                            <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                            <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                            <h5>Se actualizara bajo su responsabilidad.
                            </h5>

                        </table>
                <!--<label>NO SE LLENA SI SE MANDA AL ARCHIVO LAS QUE TENGAN ***</label>-->
                    </form>
            <?php
        }
    }
}


//liberando los recursos
//cerrando los recursos
$result->free();
$conexionmysql->close()
?>
        <script>
            function myFunction22() {
                var copyText = document.getElementById("myInput");
                copyText.select();
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }
        </script>


    </body>
</html>