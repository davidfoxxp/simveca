<?php
session_start();
require './conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Verificacion = $_GET['iddim_Verificacion'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi,cp.num_verifi,
                        don.ordenV, dr.numResBOficio
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
        <link rel="stylesheet" href="../SISGASV/css/bootstrapform.css" media="screen">
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 
        <script>var $j = jQuery.noConflict();</script>
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script> 
       
        <style type="text/css">
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
                font-size: 10px;
                font-weight:normal;
                text-align: left;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }


        </style>

        <script>
            $(function () {
                $("#dialog1").hide();

                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 600,
                        width: 600,
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

        </script>

    </script>

</head>
<body>  
    <?PHP
    $iddim_usuario = utf8_decode($row['iddim_usuario']);
    $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
    $codOficina = utf8_decode($row['codOficina']);
    $ano = utf8_decode($row2['an_verifi']);
    $num_verifi = utf8_decode($row2['num_verifi']);
    $ordenV00 = utf8_decode($row2['ordenV']);
    $numResBOficio = utf8_decode($row2['numResBOficio']);
    $newInicioPFinal = "";
    $newFinPFinal = "";
    //$iddim_CPosterior="20363";
    ?> 

    <h3>ACTUALIZACION DE LOS PERIODOS A EVALUAR Y DE BAJA</h3>
    <h5>Se actualizara bajo su responsabilidad.
    </h5>        

    <form id ="pcalificart" name="form2" action="actualizarVerificacion_PCalificarOV.php" method="POST" > 
        <table id="t1" border="1" summary="Rellena Formulario">

            <!--Incrustar php-->
            <?php
            //$iddim_Verificacion = $_GET['iddim_Verificacion'];

            //incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
            //realizando una consulta usando la clausula select
            $query = "SELECT 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,
                        dc.iddim_PaCalificar, dc.iddim_aseguradoindevido,
                        dc.InicioPEvaluar, dc.FinPEvaluar,                        
                        dc.InicioPCalificar1, dc.FinPCalificar1, 
                        dc.InicioPCalificar2, dc.FinPCalificar2, 
                        dc.InicioPCalificar3, dc.FinPCalificar3, 
                        dc.InicioPCalificar4, dc.FinPCalificar4, 
                        dc.InicioPCalificar5, dc.FinPCalificar5,   
                        
                        dc.InicioPCalificar6, dc.FinPCalificar6, 
                        dc.InicioPCalificar7, dc.FinPCalificar7, 
                        dc.InicioPCalificar8, dc.FinPCalificar8, 
                        dc.InicioPCalificar9, dc.FinPCalificar9, 
                        dc.InicioPCalificar10, dc.FinPCalificar10,   

                        dc.InicioPFinal, dc.FinPFinal,
                        dc.idtusuario, dc.fCreacion, dc.fActualizacion,
                        dr.fechaEmiBOficio,
                        dr.fechaDevInfFinal,
                        trr.idTRRBRegistro,
                        trr.RRBRegistro,
                        dr.numResBoficio
                        
                        FROM dim_pacalificar dc 
                        left join dim_aseguradoindevido ai on dc.iddim_PaCalificar=ai.iddim_aseguradoindevido
                        left join dim_resboficio dr on  ai.iddim_aseguradoindevido=dr.iddim_Overificacion
                        left join tiporrbregistro trr on dr.idTRRBRegistro=trr.idTRRBRegistro
                        where dc.iddim_aseguradoindevido='$iddim_Verificacion'";


            //Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
            //recorriendo el conjunto de resultados con un bucle

            while ($fila = $result->fetch_assoc()) {

               
                    ?>

                    <?php
                    $hoy = getdate();
                    //echo $hoy = date("m/Y"); 
                    ?>
                    <input id="i1" type="hidden" name="iddim_PaCalificar" size="50" value="<?php echo $fila['iddim_PaCalificar'] ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 

                </table>

                <br>

                <table id="t1" border="1" summary="Rellena Formulario">
                    <!--///NUMERO 4 //-->
                    <th id="th1" scope="row" class="especial" colspan="3">
                        PERIODOS DE BAJA
                    </th>  

        <?php if ($fila['InicioPCalificar1'] == NULL) { ?>

                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <tr>
                                <td id="th11">
                                    Inicio <?php echo $i ?>º Periodo de Baja
                                </td>

                                <td id="th11">
                                   
                                    <input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           name = "InicioPCalificar<?php echo $i ?>" 
                                           min="1990-01-01" id="InicioPCalificar<?php echo $i ?>" 
                                           value = "<?php echo $fila["InicioPCalificar$i"] ?>">
                                </TD>

                                <td id="th11">
                                   
                                    <input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           name = "FinPCalificar<?php echo $i ?>" 
                                           min="1990-01-01" id="FinPCalificar<?php echo $i ?>" 
                                           value = "<?php echo $fila["FinPCalificar$i"]; ?>">
                                </TD>
                            </tr>                         
                            <?php
                        }
                        ?>
                        <th id="th1" scope="row" class="especial" colspan="5">
                            INDICAR DONDE INICIA Y DONDE ACABA EL PERIODO A EVALUAR (PERIODO COMPLETO)
                        </th>
                        <tr>
                            <td id="th11">
                                Periodo de Baja
                            </td>                        
                            <td id="th11">
                                <input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       name = "InicioPFinal" id="InicioPFinal" value = "<?php echo $fila["InicioPFinal"]; ?>"
                                       min="1990-01-01" required="">
                            </TD>

                            <td id="th11">
                                <input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       name = "FinPFinal" id="FinPFinal" value = "<?php echo $fila["FinPFinal"]; ?>"
                                       min="1990-01-01" required="">
                            </TD>
                        </tr>
                        <?php
                    } else {
                        ?>                                               
                        <tr>    
                            <TD style="width:200px;">PERIODOS</TD>
                            <td style="width:150px;">INICIO</td>                            
                            <td style="width:150px;">FIN</td>
                        </tr>  

                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <tr>                            

                                <td id="th11">
                                    Inicio <?php echo $i ?>º Periodo de Baja
                                </td>

                                <td id="th11"> <?php echo $fila["InicioPCalificar$i"] ?>                                    
                                    <input type = "hidden" 
                                           name = "InicioPCalificar<?php echo $i ?>" 
                                           id="InicioPCalificar<?php echo $i ?>" 
                                           value = "<?php echo $fila["InicioPCalificar$i"] ?>" readonly="">
                                    
                                </td>

                                <td id="th11"> <?php echo $fila["FinPCalificar$i"]; ?>                           
                                    <input type = "hidden" 
                                           name = "FinPCalificar<?php echo $i ?>" 
                                           id="FinPCalificar<?php echo $i ?>" 
                                           value = "<?php echo $fila["FinPCalificar$i"] ?>" readonly="">
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        <TD style="width:200px;"id="th1" scope="row" class="especial">PERIODOS A EVALUAR</TD>
                        <td style="width:150px;"id="th1" scope="row" class="especial">INICIO</td>                            
                        <td style="width:150px;"id="th1" scope="row" class="especial">FIN</td>
                        <tr>
                            <td id="th11">
                            Periodo de Baja
                            </td>
                            <td id="th11"> <?php echo $fila["InicioPFinal"]; ?>                         
                                <input type = "hidden" 
                                       name = "InicioPFinal" id="InicioPFinal" value = "<?php echo $fila["InicioPFinal"]; ?>" readonly="">
                            </td>

                            <td id="th11"> <?php echo $fila["FinPFinal"]; ?>                           
                            <input type = "hidden" 
                                       name = "FinPFinal" id="FinPFinal" value = "<?php echo $fila["FinPFinal"]; ?>" readonly>
                            </td>
                        </tr>       

                    <?php } 
                    
                     if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
                         ?>

                        

                </table>
                <br>               
                <input type = "submit"  name = "actualizar" value = "Actualizar">
            </form>
        <?php
        }
    }
//liberando los recursos
//cerrando los recursos
    $result->free();
    $conexionmysql->close()
    ?>	
</body>
</html>