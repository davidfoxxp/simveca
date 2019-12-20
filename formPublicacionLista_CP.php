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

$iddim_CPosterior = $_GET['iddim_CPosterior'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.femisionBRegistro, cp.nResBRegistro, cp.fconstanciaAcFirme
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        where cp.iddim_CPosterior='$iddim_CPosterior'";
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
for ($i = 1; $i <= 6; $i++) {
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
                            width: 600,
                            height: 530,
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
                       width: 620,
                       height: 400,
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
//        $ano = utf8_decode($row2['an_verifi']);
//        $num_verifi = utf8_decode($row2['num_verifi']);
//        $ordenV00 = utf8_decode($row2['ordenV']);
//        $numResBOficio = utf8_decode($row2['numResBOficio']);
        $newInicioPFinal = "";
        $newFinPFinal = "";
//        $iddim_Multa;
        $j=0;
        $g=0;
        ?> 

        <?php
        include './conexionesbd/conexion_mysql.php';
        $query = "SELECT ai.idDIM_Oficina,
                    p.iddim_Publicacion,
                    p.fpublicacion_p,
                    p.fpublicacion_e,
                    p.fpublicacion_c,
                    p.resolucionpublicada,
                    p.tipo_registro,
                    p.nombrePDPubli,
                    p.ruta_pdf_publi
                    FROM dim_publicacion p
                    left join dim_aseguradoindevido ai on p.iddim_CPosterior=ai.iddim_aseguradoindevido
                    left join dim_cposterior cp on ai.iddim_aseguradoindevido=cp.iddim_CPosterior                   
                    where cp.iddim_CPosterior='$iddim_CPosterior'";

        $result = $conexionmysql->query($query);
        ?>


        <table id="table_2" border="1">

            <thead id="">
                <tr id="th1" scope="row" class="especial con_estilos" colspan="6" style="text-align: center;">
                    <td id="size_1">FECHA PUBLICACION<br>EN EL PERUANO</td>
                    <td id="size_1">NUMERO DE RESOLUCION <br>PUBLICADA</td>
                    <td id="size_1">TIPO DE<br>REGISTRO</td>
                    <td id="size_1">NOMBRE DEL<br>PDF PUBLICACION</td>                                                                    
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
                        $ruta_pdf_publi = $fila['ruta_pdf_publi'];
                        $iddim_Publicacion = $fila['iddim_Publicacion'];
                        ?>
                        <tr style="background-color: #FFFFFF ; border-color:#87CEFA; text-align: center">
                            <td style="font-size: 10px"><?php echo $fila['fpublicacion_p'] ?></td>
                            <td style="font-size: 9px"><?php echo $fila['resolucionpublicada'] ?></td>
                            <?php  
                            if($fila['tipo_registro'] =='1'){
                                ?>
                                <td style="font-size: 11px">ASEGURADO</td>
                            <?php }
                            else ?>
                                <?php  
                            if($fila['tipo_registro'] =='2'){
                                ?>
                                <td style="font-size: 10px">EMPLEADOR</td>
                            <?php }
                            else if($fila['tipo_registro'] =='3'){ ?>
                                
                                <td style="font-size: 10px">TITULAR</td>
                            <?php }
                            ?>

                            <?php if (is_null($ruta_pdf_publi)) { ?>    
                                <td style="font-size: 9px"><?php echo $fila['nombrePDPubli'] ?></td>
                                <?php
                            } else {
                                ?>  <td style="font-size: 10px">
                                    <a href="<?php echo $fila['ruta_pdf_publi'] ?>" target="_blank"><?php echo $fila['nombrePDPubli'] ?>
                                    </a>                            
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            
                            if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
                            if (empty($ruta_pdf_publi)) {
                                ?>
                                <td>                                               
                                    <a href="#" id="abriPoppup<?php echo $j ?>" style="font-size: 15px" title="Subir PDF"><i class="fa fa-upload"></i>
                                    </a>
                                </td>
                                <div id="dialog<?php echo $j ?>" title="SUBIR PUBLICACION" class="contenido">
                                    <iframe  src="formSubirArchivoPublicacion.php?iddim_Publicacion=<?php echo $fila['iddim_Publicacion'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                        <?php
                    } else{ ?>
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
                         <td>                                               
                             <a href="#" id="abriPoppupp<?php echo $g ?>" style="font-size: 15px" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>

                                <div id="dialogg<?php echo $g ?>" title="DETALLE DE LA PUBLICACION" class="contenido">
                                    <iframe  src="formPublicacion_Visualizar_CP.php?iddim_Publicacion=<?php echo $fila['iddim_Publicacion'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                        
                </tr>
                <?php
            }
            ?>

            <?php
            $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                        
                        where cp.iddim_CPosterior='$iddim_CPosterior' and cp.idTVerificacion='1'";
            //Obteniendo el conjunto de resultados
            $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

            while ($filaoficina = $resultoficina->fetch_assoc()) {
                if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) {
                    ?>
                    <tr> 
                        <td colspan="2"><a href="#" id="abriPoppup10">Ingresar Publicacion</a>
                            <div id="dialog10" title="PUBLICAR" class="contenido">
                                <iframe src="formPublicacion_CP.php?iddim_CPosterior=<?php echo $iddim_CPosterior ?>" style="width: 100%; height: 100%"></iframe>
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