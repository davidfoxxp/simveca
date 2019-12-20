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

$iddim_Overificacion = $_GET['iddim_Overificacion'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi, cp.num_verifi,
                        don.ordenV, dr.numResBOficio
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join dim_overificacion don on cp.iddim_Verificacion=don.iddim_Verificacion
                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
                        where cp.iddim_Verificacion='$iddim_Overificacion'";
$resultsql2 = $conexionmysql->query($sql2);
$row2 = $resultsql2->fetch_assoc();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <title></title>	
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
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
                font-size: 11px;
                font-weight:bold;
                color: #0060C0;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;               
                  background-color: #B0C4DE;
                  text-align: left;
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
<?php
for ($i = 1; $i <= 5; $i++) {
    ?>
                    $("#dialog<?php echo $i ?>").hide();
                    function abrir<?php echo $i ?>() {
                        $("#dialog<?php echo $i ?>").show();
                        $("#dialog<?php echo $i ?>").dialog({
                            resizable: true,
//                            width: 600,
//                            height: 530,
                            
                             width: 500,
                        height: 300,
                            modal: true,
                        });
                    }
                    $("#abriPoppup<?php echo $i ?>").click(
                            function () {
                                abrir<?php echo $i ?>();
                            });
                            
                            
                    $("#dialogg<?php echo $i ?>").hide();
                    function abrirr<?php echo $i ?>() {
                        $("#dialogg<?php echo $i ?>").show();
                        $("#dialogg<?php echo $i ?>").dialog({
                            resizable: true,
                            width: 700,
                            height: 500,
                            modal: true
                        });
                    }
                    $("#abriPoppupp<?php echo $i ?>").click(
                            function () {
                                abrirr<?php echo $i ?>();
                            });
                            

    <?php
}
?>
        
        $("#dialog10").hide();
                function abrir10() {
                    $("#dialog10").show();
                    $("#dialog10").dialog({
                       resizable: false,                        
                       width: 600,
                       height: 530,
                       modal: true
                       
                    });
                }

                $("#abriPoppup10").click(
                        function () {
                            abrir10();
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
        $hoy = getdate();
        $newFinPFinal = "";
        $iddim_Multa;
        $j=0;
        $g=0;
        ?> 

        <?php
        //$iddim_Overificacion = $_GET['iddim_Overificacion'];
        //incluir el archivo de conexion
        include './conexionesbd/conexion_mysql.php';

        $query = "SELECT b.idDIM_Oficina, t.*, a.rrbregistro
                    FROM dim_multa t
                    left join tiporrbregistro a on t.idTRRBRegistro=a.idTRRBRegistro
                    left join dim_overificacion b on t.iddim_Overificacion=b.iddim_Overificacion
                    where t.iddim_Overificacion='$iddim_Overificacion'";

        $result = $conexionmysql->query($query);
        ?>


        <table id="table_2" border="1">

            <thead id="">
                <tr id="th1" scope="row" class="especial" colspan="6" style="text-align: center;">
                    <td id="size_1">NUMERO CARTA<br>INI. PROC. SANCIONADOR</td>
                    <td id="size_1">FECHA EMISION CARTA<br>INI. PROC. SANCIONADOR</td>
                    <td id="size_1">FECHA EMISION<br>RESOLUCION DE MULTA</td>
                    <td id="size_1">NUMERO DE RESOLUCION<br>DE BAJA DE OFICIO</td>
                    <td id="size_1">FECHA DE NOTIFICACION<br> DE LA MULTA</td>
                    <td id="size_1">NOMBRE DEL<br>PDF MULTA</td>                                                                    
                    <td id="size_1">PDF</td>
                    <td id="size_1">DETALLE</td> 
                </tr>
            </thead>


            <tbody id="">                    

                <?php
                if ($conexionmysql->query($query)) {
                    while ($fila = $result->fetch_assoc()) {
                        $j++;
                        $g++;
                        $ruta_pdf_multa = $fila['ruta_pdf_multa'];
                        $iddim_Multa = $fila['iddim_Multa'];
                        ?>
                        <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                            <td style="font-size: 11px"><?php echo $fila['numCInicioPSMulta'] ?></td>
                            <td style="font-size: 13px"><?php echo $fila['fechaNPCInicioPSmult'] ?></td>
                            <td style="font-size: 13px"><?php echo $fila['fechaERMulta'] ?></td>
                            <td style="font-size: 11px"><?php echo $fila['numRMulta'] ?></td>
                            <td style="font-size: 13px"><?php echo $fila['fechaNMulta'] ?></td>


                            <?php if (is_null($ruta_pdf_multa)) { ?>    
                                <td style="font-size: 11px"><?php echo $fila['nombrePDFmulta'] ?></td>
                                <?php
                            } else {
                                ?>      <td style="font-size: 11px">
                                    <a href="<?php echo $fila['ruta_pdf_multa'] ?>" target="_blank"><?php echo $fila['nombrePDFmulta'] ?>
                                    </a>                            
                                </TD>
                                <?php
                            }
                            ?>

                            <?php
                            if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
                            if (empty($ruta_pdf_multa)) {
                                ?>

                                <td>                                               
                                    <a href="#" id="abriPoppup<?php echo $j ?>" style="font-size: 15px" title="Subir PDF"><i class="fa fa-upload"></i>
                                    </a>
                                </td>

                                <div id="dialog<?php echo $j ?>" title="SUBIR MULTAS" class="contenido">
                            <iframe src="formSubirArchivoVMulta.php?iddim_Multa=<?php echo $fila['iddim_Multa'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>

                        <?php
                            }else{ ?>
                        <td>
                            <span class="glyphicon glyphicon-ok"></span>
                        </td>
                        
                    <?php }} else { ?>
                            <td>                                               
                                    <a style="font-size: 15px"><i class="fa fa-upload"></i>
                                    </a>
                            </td>
                        
                    <?php }
                    ?>      

                                <?php if(is_null($fila['nombrePDFmulta'])){ ?>
                                                    
                                <td>                                               
                                    <a href="#" id="abriPoppupp<?php echo $g ?>" style="font-size: 15px" title="Ingresar Multa"><span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>

                                <div id="dialogg<?php echo $g ?>" title="INGRESAR MULTA" class="contenido">
                                    <!--<iframe src="formMulta_inserta.php?iddim_Overificacion=<?php echo $iddim_Overificacion ?>" style="width: 100%; height: 100%"></iframe>-->
                                    <iframe src="formMulta_inserta.php?iddim_Multa=<?php echo $fila['iddim_Multa'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                <?php } else {?>
                                <td>                                               
                                    <a href="#" id="abriPoppupp<?php echo $g ?>" style="font-size: 15px" title="Ingresar SICO o Ver Detalle Multa"><span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                   <div id="dialogg<?php echo $g ?>" title="DETALLE DE LA MULTA" class="contenido">
                                    <!--<iframe src="formMulta_inserta.php?iddim_Overificacion=<?php echo $iddim_Overificacion ?>" style="width: 100%; height: 100%"></iframe>-->
                                       <iframe src="formMulta_Visualizar.php?iddim_Multa=<?php echo $fila['iddim_Multa'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                <?php } ?>
                        
                </tr>
                <?php
            }
            ?>

            <?php
            $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                        
                        where cp.iddim_Verificacion='$iddim_Overificacion' and cp.idTVerificacion='2'";
            //Obteniendo el conjunto de resultados
            $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

            while ($filaoficina = $resultoficina->fetch_assoc()) {
                if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) {
                    ?>
                    <tr> 
                        <td colspan="2"><a href="#" id="abriPoppup10">Ingresar Carta Ini. Proceso Sancionador</a>
                            <div id="dialog10" title="CARTA INICIO DE PROCESO SANCIONADOR" class="contenido">
                                <!--<iframe src="formMulta_inserta.php?iddim_Overificacion=<?php echo $iddim_Overificacion ?>" style="width: 100%; height: 100%"></iframe>-->
                                <iframe src="formMulta_insertaCartaIni.php?iddim_Overificacion=<?php echo $iddim_Overificacion ?>" style="width: 100%; height: 100%"></iframe>
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <h5>Se actualizara bajo su responsabilidad.</h5>  
                        </td>
                    </tr>        
                    <?php
                }
                ?>

            </tbody>
        </table>
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