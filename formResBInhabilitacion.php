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

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Verificacion = $_GET['iddim_Verificacion'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi,cp.num_verifi, don.numero,
                        don.ordenV, dr.numResBOficio,
                        ai.RUC,inh.iddim_ResBOficio
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join dim_overificacion don on don.iddim_Overificacion=cp.iddim_Verificacion
                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
                        left join dim_inhabilitacion inh on dr.iddim_ResBOficio=inh.iddim_ResBOficio
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
                font-size: 11px;
                font-weight:bold;
                color: #0060C0;
                padding:1px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;               
                  background-color: #B0C4DE;
                  text-align: left;
            }

            input[type=checkbox]
            {
                /* Double-sized Checkboxes */
                -ms-transform: scale(2); /* IE */
                -moz-transform: scale(2); /* FF */
                -webkit-transform: scale(2); /* Safari and Chrome */
                -o-transform: scale(2); /* Opera */
                padding: 2px;
            }

            /* Might want to wrap a span around your checkbox text */
            .checkboxtext
            {
                /* Checkbox text */
                font-size: 110%;
                display: inline;
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


                $("#dialog4").hide();
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,

                        width: 500,
                        height: 300,
                        modal: true
                    });
                }

                $("#abriPoppup4").click(
                        function () {
                            abrir4();
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
            function ShowSelectedcarta()
            {
                /* Para obtener el valor */
                var ofi = document.getElementById("nuncarta").value;
                document.getElementById('nuncartaini').value = ofi;

            }
        </script>
        <script>
            var mostrarValor = function (x) {
                document.getElementById('textoOAS').value = x;
            }
        </script>
<!--        <script>
        
        function habilitar()
            {
                if (document.getElementById('check1').checked === false)
                {
                    document.getElementById("mensaje").style.display="none";
                    document.getElementById("mensaje1").style.display="block";
                
                } 
                if (document.getElementById('check1').checked === true)
                {
                    document.getElementById("mensaje").style.display="block";
                    document.getElementById("mensaje1").style.display="none";                  
                }
        </script>-->
<script>
function cambiarDisplay(id) 
{
	if (!document.getElementById) 
		return false;
	fila = document.getElementById(id);
	if (fila.style.display != "none") 
		fila.style.display = "none"; //ocultar
	else 
		fila.style.display = ""; //mostrar
}

function enviarfecha() {
    var fecha=document.getElementById("fechaNotRInh").value;    
    document.getElementById("fechaEmiRInh").value=fecha;
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
        $hoy = getdate();

        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        $ano = utf8_decode($row2['an_verifi']);
        $num_verifi = utf8_decode($row2['num_verifi']);
        $ordenV00 = utf8_decode($row2['ordenV']);
        $numResBOficio = utf8_decode($row2['numResBOficio']);
        $numero = utf8_decode($row2['numero']);
        $numeroConCeros = str_pad($numero, 3, "0", STR_PAD_LEFT);
        $iddim_ResBOficio= utf8_decode($row2['iddim_ResBOficio']);
        $fechaEmiRI="";
        //$iddim_CPosterior="20363";
        ?> 

            <?php if (is_null($row2['iddim_ResBOficio'])) { ?> 
        <form action="actualizarVerificacion_InhabilitacionCartaini.php" method="POST">
            <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly"> 
            <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly">
            <h4>INGRESO DE CARTA INICIO DE PROCESO SANCIONADOR</h4> 
            <table>
                <tr>
                <td id="tho" class="especial" style="width: 215px" >
                    NUMERO DE CARTA<br>INI. PROC. SANCIONADOR
                </td>   
                <td id="td1" colspan="2" style="width: 220px">
                    <select name="nuncarta" id="nuncarta" class="form-control" onchange="ShowSelectedcarta();" required="">
                        <option value="">----</option>
                        <option value="<?php echo $cod_oficinaIni . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE</option>
                        <option value="<?php echo $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">UCF</option>
                        <option value="<?php echo "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OAALMENARA</option>
                        <option value="<?php echo "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OAREBAGLIATI</option>
                        <option value="<?php echo "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OASABOGAL</option>

                        <option value="<?php echo $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">UCF/OAALMENARA</option>
                        <option value="<?php echo $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">UCF/OAREBAGLIATI</option>
                        <option value="<?php echo $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">UCF/OASABOGAL</option>  

                        <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/UCF</option>

                        <option value="<?php echo $cod_oficinaIni . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/OAALMENARA</option>
                        <option value="<?php echo $cod_oficinaIni . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/OAREBAGLIATI</option>
                        <option value="<?php echo $cod_oficinaIni . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/OASABOGAL</option>

                        <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/UCF/OAALMENARA</option>
                        <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/UCF/OAREBAGLIATI</option>
                        <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-048-$numeroConCeros"; ?>">OSPE/UCF/OASABOGAL</option>

                    </select>
                    <input  style="width: 320px;" readonly class="form-control" id="nuncartaini" name="nuncartaini" value="" />   
                </td>
            </tr>
              <tr>
                    <td id="tho" class="especial" style="width: 215px" >
                        FECHA CARTA DE INICIO DEL PROCESO SANCIONADOR
                    </td>
                    <td id="td1" colspan="2" style="width: 100px">
                        <input type = "date" name = "fechaNPCInicioPSInh" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  class="form-control" placeholder="date" required="">
                    </TD>                           
                </tr>
            </table> 
                                <?php
                    $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_verificacion cp  
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido   
                        where cp.iddim_Verificacion='$iddim_Verificacion' and cp.idTVerificacion='2'";
                    $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

                    while ($filaoficina = $resultoficina->fetch_assoc()) {

                        if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) {
                            ?>                    
                            <div class="form-group row col-sm-10">
                                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                                 <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                                <h5>Se actualizara bajo su responsabilidad.</h5>   
                            </div>
                            <?php
                        }
                    }
                    ?>  
            
        </form>
            <?php } else if (!is_null($row2['iddim_ResBOficio'])) { ?>
        
        
                <?php
        $query111 = "SELECT p.numCartaIni, p.fechaNCInicioPSInh, p.fActualizacion,p.fechaNPCInicioPSInh, p.fechaNotRInh FROM dim_inhabilitacion p where p.iddim_Inhabilitacion='$iddim_Verificacion'";
        $resultado = $conexionmysql->query($query111);
        $nombre_pdf_inhabi = "I" . $num_verifi . $dniait . $eempleadora . $cod_oficinaIni.$ano;
        while ($fila2 = $resultado->fetch_assoc()) {           

            if(!is_null($fila2['numCartaIni']) && is_null($fila2['fActualizacion'])) {
                ?>
        
                <form id ="pcalificart" name="form2" action="actualizarVerificacion_Inhabilitacion.php" method="POST" > 
                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                    <table>
            <tr>
                <td id="tho" class="especial" style="width: 215px" >
                    NUMERO DE CARTA<br>INI. PROC. SANCIONADOR
                </td>   
                <td id="td1" colspan="2" style="width: 220px; text-align: center; border: solid 1px #000">
                      <?php echo $fila2['numCartaIni'] ?>
                </td>
            </tr>
            <tr>
                <td id="tho" class="especial" style="width: 215px" >
                     FECHA CARTA DE INICIO DEL PROCESO SANCIONADOR
                </td>   
                <td id="td1" colspan="2" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  style="width: 220px; text-align: center; border: solid 1px #000">
                      <?php echo $fila2['fechaNPCInicioPSInh'] ?>
                </td>
            </tr>
            
            <tr>
                            <td id="tho" class="especial" >
                                FECHA NOTIFICACION DE LA <BR>CARTA DE INICIO DEL PROCESO SANCIONADOR
                            </td>

                            <?php if (is_null($fila2['fechaNCInicioPSInh'])) { ?>       
                                <TD id="td1" colspan="2" style="width: 100px">
                                    <input type="date" class="form-control" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  name = "fechaNCInicioPSInh" id="nResInhabilitacion" value="<?php echo $fila2['fechaNCInicioPSInh'] ?>">                                
                                </td>

                                <?php
                            } else {
                                ?>

                                <TD style="font-size: 12px" colspan="3">
                                    <?php echo $fila2['fechaNCInicioPSInh']; ?><br>
                                    <input type = "hidden" name = "fechaNCInicioPSInh" class="form-control" id="nResInhabilitacion" value="<?php echo $fila2['fechaNCInicioPSInh']; ?>" readonly="">                                
                                <?php
                                           $inicio = $fila2['fechaNCInicioPSInh'];
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
                                </td>

                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE EMISION DE <br>RESOLUCION DE INHABILITACION 
                            </td>  
                            <td id="td1" colspan="2" style="width: 100px">
                                <input type="date" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  class="form-control" placeholder="date" required name="fechaEmiRInh" id="fechaEmiRInh">
                            </td>
                        </tr>
                        
                         <tr>
                            <td id="tho" class="especial" >
                                FECHA DE NOTIFICACION DE <br>RESOLUCION DE INHABILITACION
                            </td>

                            <?php if (is_null($fila2['fechaNotRInh'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" name = "fechaNotRInh" class="form-control" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaNotRInh" value="<?php echo $fila2['fechaNotRInh'] ?>">                                    
                                    </TD>

                                <?php
                            } else {
                                ?>
                                <td style="font-size: 12px"colspan="2">
                                    <?php echo $fila2['fechaNotRInh'] ?> <br>
                                    <input type = "HIDDEN" name = "fechaNotRInh" min="1990-01-01" id="fechaNotRInh" value="<?php echo $fila2['fechaNotRInh'] ?>" readOnly>
                                <?php
                                           $inicio = $fila2['fechaNotRInh'];
                                           $fin = date("Y-m-d");

                                           function diferenciaDias1($inicio, $fin) {
                                               $inicio = strtotime($inicio);
                                               $fin = strtotime($fin);
                                               $dif = $fin - $inicio;
                                               $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
                                               return ceil($diasFalt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias1($inicio, $fin)
                                    ?>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>
            
            <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NUMERO DE RESOLUCION <br>DE INHABILITACION
                            </td>                           

                            <td id="td1" colspan="2" style="width: 220px">
                                <select name="unidad" id="unidad" class="form-control" onchange="ShowSelected();" required="">
                                    <option value="">----</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE</option>
                                    <option value="<?php echo $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">UCF</option>
                                    <option value="<?php echo "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OAALMENARA</option>
                                    <option value="<?php echo "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OAREBAGLIATI</option>
                                    <option value="<?php echo "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OASABOGAL</option>

                                    <option value="<?php echo $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">UCF/OAALMENARA</option>
                                    <option value="<?php echo $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">UCF/OAREBAGLIATI</option>
                                    <option value="<?php echo $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">UCF/OASABOGAL</option>  

                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/UCF</option>

                                    <option value="<?php echo $cod_oficinaIni . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/OAALMENARA</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/OAREBAGLIATI</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/OASABOGAL</option>

                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/UCF/OAALMENARA</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/UCF/OAREBAGLIATI</option>
                                    <option value="<?php echo $cod_oficinaIni . "-" . $codOficina . "-" . "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-087-$numeroConCeros"; ?>">OSPE/UCF/OASABOGAL</option>

                                </select>
                                <input  style="width: 320px;" readonly class="form-control" id="numResBOficio" name="numResBOficio" value="" />   
                            </td>
                        </tr>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NOMBRE PDF INHABILITACION
                            </td>   
                            <td id="td1" colspan="2" style="width: 220px">

                                <input  style="width: 320px;"  name="nombrePDFinhabi"class="form-control" value="<?php echo $nombre_pdf_inhabi; ?>" readonly/>   
                            </td>   
                        </tr>   

                                               
                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA INFORME FINAL DE INSTRUCCIÓN
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px">
                                <input type = "date" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  name = "fechaIFinalInstructor" min="0001-01-01" class="form-control"  placeholder="date">
                            </TD>                            
                        </tr>

                    </table>  
                    <br>
                    <table>                   
                        <TR> 
                            <TD colspan="2">
                                Articulo 27: SUPUESTOS DE INHABILITACION <br>
                                <p style="font-size: 10px;">
                                    De conformidad con lo establecido en el Articulo 4° de la Ley, serán considerados supuestos de inhabilitación:
                                </p>
                            </TD>
                        </tr>

                        <TR>                            
                            <td id="tho" class="especial" style="width: 215px" colspan="3">
                                1.- CUANDO SE NOTIFIQUE LA RESOLUCIÓN DE BAJA DE OFICIO POR LOS SIGUIENTES CASOS                                
                            </td>


                            <td id="td1" colspan="2" style="width: 100px">
                                <?PHP
                                $queryM = "SELECT * FROM sisgasv.tipo_simulacion_inh";
                                $resultado2 = $conexionmysql->query($queryM);
                                ?>

                                <div>
                                    <select name="cbx_simu" id="cbx_perfil" style="width:320px;" class="form-control" value="cbx_simu"  required="">
                                        <option class="form-control" value="">SELECCIONE PERFIL</option>

                                        <?php while ($row = $resultado2->fetch_assoc()) { ?>
                                            <option class="form-control" value="<?php echo $row['idtipo_simulacion_inh']; ?>"><?php echo $row['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php
                                ?>
                            </td>
                        </tr>
                        <TR>
                            <td id="tho" class="especial" style="width: 210px" colspan="3">
                                2.- CUANDO SE OBTENGAN PRESTACIONES INDEBIDAS O SUPERIORES A LA QUE CORRESPONDAN O SE PROLONGUE INDEBIDAMENTE SU DISFRUTE MEDIANTE LA PRESENTACIÓN DE DATOS O DOCUMENTOS FALSOS O INCUMPLIMIENTOS CON EL MISMO FIN.
                            </td>
                            <?php   ?>
                            <TD style="text-align: center;">
                                <input type="checkbox" value="2" name="checkbox1"  onclick="cambiarDisplay('oculto')" />                                                                 
                                <!--<input type="checkbox" id="check1" value="2" name="checkbox1" onclick="habilitar()" >-->
                                <label name="mensaje"id="oculto"style="display:none;">*SI APLICA</label>
                                <!--<label name="mensaje1"id="mensaje1"style="display:none;">*NO APLICA</label>-->

                            </TD>
                        </TR>
                    </table>

                    <?php
                    $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_verificacion cp  
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido   
                        where cp.iddim_Verificacion='$iddim_Verificacion' and cp.idTVerificacion='2'";
                    $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

                    while ($filaoficina = $resultoficina->fetch_assoc()) {

                        if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) {
                            ?>                    
                            <div class="form-group row col-sm-10">
                                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                                 <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                                <h5>Se actualizara bajo su responsabilidad.</h5>   
                            </div>
                            <?php
                        }
                    }
                    ?>             
                </form>
                <?PHP
            } else if(!is_null($fila2['fActualizacion']))  {
                ?>

                <form action="#" method="POST">
                <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                <table id="t1" border="1" summary="Rellena Formulario">
                    
                    <!--Incrustar php-->
                    <?php
                    //$iddim_Verificacion = $_GET['iddim_Verificacion'];
                    //incluir el archivo de conexion
                    include './conexionesbd/conexion_mysql.php';
                    $query1 = "SELECT a.idDIM_Oficina, t.*, 
                                CASE 
                                WHEN t.supuesto_2='2' THEN 'SI APLICA'        
                                END AS APLICAA,
                                b.descripcion as supuesto_1D, c.descripcion as supuesto_2D
                                FROM dim_inhabilitacion t 
                                left join dim_aseguradoindevido a on t.iddim_Inhabilitacion=a.iddim_aseguradoindevido
                                left join tipo_simulacion_inh 			b on t.supuesto_1=b.idtipo_simulacion_inh	
                                left join tipo_inhabilitacion_supuestos	c on t.supuesto_2=c.idtipo_inhabilitacion_supuestos
                                where t.iddim_ResBOficio='$iddim_Verificacion'";

                    $result1 = $conexionmysql->query($query1);

                    while ($fila = $result1->fetch_assoc()) {
                        $fechaEmiRI = $fila['fechaEmiRInh'];
                        ?>

                        <?php
                        $hoy = getdate();
                        //echo $hoy = date("m/Y"); 
                        ?>                    

                        <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                        <!--///NUMERO 1 //-->                        
            <tr>
                <td id="tho" class="especial" style="width: 350px" >
                    NUMERO DE CARTA<br>INI. PROC. SANCIONADOR
                </td>   
                <td id="td1" colspan="2" style="width: 220px; text-align: center">
                    <?php echo $fila['numCartaIni'] ?>                     
                </td>
            </tr>            
                        <tr>
                            <td id="tho" class="especial" >
                                FECHA CARTA DE INICIO DEL PROCESO SANCIONADOR
                            </td>

                            <?php if (is_null($fila['fechaNPCInicioPSInh'])) { ?>       
                                <TD id="td1" colspan="3">                                   
                                    <input type = "text" name = "fechaNPCInicioPSInh" min="1990-01-01" id="nResInhabilitacion" value="<?php echo $fila['fechaNPCInicioPSInh'] ?>" readonly="">                                
                                </td>

                                <?php
                            } else {
                                ?>

                                <TD id="td1" colspan="3">
                                    <?php echo $fila['fechaNPCInicioPSInh']; ?>
                                    <input type = "hidden" name = "fechaNPCInicioPSInh" min="1990-01-01" id="nResInhabilitacion" value="<?php echo $fila['fechaNPCInicioPSInh']; ?>" readonly="">                                
                                </td>

                                <?php
                            }
                            ?>
                        </tr>                                              

                             <tr>
                            <td id="tho" class="especial" >
                                FECHA NOTIFICACION DE LA <BR>CARTA DE INICIO DEL PROCESO SANCIONADOR
                            </td>

                            <?php if (is_null($fila2['fechaNCInicioPSInh'])) { ?>       
                                <TD id="td1" colspan="3">
                                    <input type="date" name = "fechaNCInicioPSInh" min="1990-01-01" id="nResInhabilitacion" value="<?php echo $fila2['fechaNCInicioPSInh'] ?>">                                
                                </td>

                                <?php
                            } else {
                                ?>

                                <TD style="font-size: 12px" colspan="3">
                                    <?php echo $fila2['fechaNCInicioPSInh']; ?><br>
                                    <input type = "hidden" name = "fechaNCInicioPSInh" id="nResInhabilitacion" value="<?php echo $fila2['fechaNCInicioPSInh']; ?>" readonly="">                                
                                <?php
                                           $inicio = $fila2['fechaNCInicioPSInh'];
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
                                </td>

                                <?php
                            }
                            ?>
                        </tr>                                         

                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" >
                                FECHA INFORME FINAL DE INSTRUCCIÓN
                            </td>

                            <?php if (is_null($fila['fechaIFinalInstructor'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" name = "fechaIFinalInstructor" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaIFinalInstructor" value="<?php echo $fila['fechaIFinalInstructor'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1" colspan="2">
                                    <?php echo $fila['fechaIFinalInstructor'] ?>
                                    <input type = "HIDDEN" name = "fechaIFinalInstructor" min="1990-01-01" id="fechaIFinalInstructor" value="<?php echo $fila['fechaIFinalInstructor'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td id="tho" class="especial" >
                                NUMERO DE RESOLUCION <br>DE INHABILITACION
                            </td>

                            <?php if (is_null($fila['nResInhabilitacion'])) { ?>       
                                <TD id="td1" colspan="3">
                                    <?php $numResBOficio = $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-087-001"; ?>
                                    <input type = "text" name = "nResInhabilitacion" id="nResInhabilitacion" value="<?php echo $numResBOficio ?>" readonly="">                                
                                </td>

                                <?php
                            } else {
                                ?>

                                <TD id="td1" colspan="3">
                                    <?php echo $fila['nResInhabilitacion']; ?>
                                    <input type = "hidden" name = "nResInhabilitacion" id="nResInhabilitacion" value="<?php echo $fila['nResInhabilitacion']; ?>" readonly="">                                
                                </td>

                                <?php
                            }
                            ?>
                        </tr>

                        <!--///NUMERO 1 //-->
                        <tr>
                            <td id="tho" class="especial" >
                                NOMBRE DEL PDF INHABILITACION
                            </td>

                            <?php if (is_null($fila['ruta_pdf_inhabi'])) { ?>       
                                <TD id="td1" colspan="3" style="width: 250px">                                   
                                    <?php echo $fila['nombrePDFinhabi'] ?>
                                </td>

                                <?php
                            } else {
                                ?>                               
                                <td id="td1" colspan="3" style="width: 250px">
                                    <a href="<?php echo $fila['ruta_pdf_inhabi'] ?>" target="_blank"><?php echo $fila['nombrePDFinhabi'] ?></a>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>     
                        
                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" >
                                FECHA DE EMISION DE <br>RESOLUCION DE INHABILITACION
                            </td>

                            <?php if (is_null($fila['fechaEmiRInh'])) { 
                                ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" name = "fechaEmiRInh" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaEmiRInh" value="<?php echo $fila['fechaEmiRInh'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1" colspan="2">
                                    <?php echo $fila['fechaEmiRInh'] ?>
                                    <input type = "HIDDEN" name = "fechaEmiRInh" min="1990-01-01" id="fechaEmiRInh" value="<?php echo $fila['fechaEmiRInh'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>   
                        
                        <tr>
                            <td id="tho" class="especial" >
                                FECHA DE NOTIFICACION DE <br>RESOLUCION DE INHABILITACION
                            </td>

                            <?php if (is_null($fila['fechaNotRInh'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" name = "fechaNotRInh" class="form-control" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaNotRInh" value="<?php echo $fila['fechaNotRInh'] ?>" required>                                    
                                    </TD>

                                <?php
                            } else {
                                ?>
                                <td style="font-size: 12px"colspan="2">
                                    <?php echo $fila['fechaNotRInh'] ?> <br>
                                    <input type = "HIDDEN" name = "fechaNotRInh" min="1990-01-01" id="fechaNotRInh" value="<?php echo $fila['fechaNotRInh'] ?>" readOnly>
                                <?php
                                           $inicio = $fila['fechaNotRInh'];
                                           $fin = date("Y-m-d");

                                           function diferenciaDias1($inicio, $fin) {
                                               $inicio = strtotime($inicio);
                                               $fin = strtotime($fin);
                                               $dif = $fin - $inicio;
                                               $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
                                               return ceil($diasFalt);
                                           }
                                           ?>
                                    <label>Dias de notificado</label>
                                    <?php
                                    echo diferenciaDias1($inicio, $fin)
                                    ?>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>

                        
                        
                        
                        <tr>
                            <td id="tho" style="color:#F80000 ;font-size: 12px">REPORTADO A SGCIS</td> 
                                                       
                            <?php if (is_null($fila['f_despacho'])) { ?>                                  
                                <td >        
                                    <b><?php echo "NO REPORTADO A DESPACHO" ?></b><br></td></b>
                                </td>

                                </td>
                                <?php
                            } else {
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO A DESPACHO" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        
                         <tr>
                            <td id="tho" style="color:#F80000 ;font-size: 12px">
                                FECHA DE CORREO QUE SE ENVIO A LA SGCIS
                            </td>
                           
                                <TD id="td1" colspan="3" style="width: 250px"> 
                                    <?php echo $fila['f_despacho'] ?>
                                </TD>
                               
                        </tr>
                                                                     
                        <tr>
                            <td id="tho" style="color:#F80000 ;font-size: 12px">
                                CORREO QUE SE ENVIO A LA SGCIS
                            </td>
                           
                                <TD id="td1" colspan="3" style="width: 250px"> 
                                    <?php echo $fila['carta_despacho'] ?>
                                </TD>
                               
                        </tr>   

                        
                        <?php if (is_null($fila['supuesto_2'])) { ?>    
                            <!--///SUPUESTOS 1 //-->
                            <tr>
                                <td id="tho" class="especial" >
                                    SUPUESTOS DE INHABILITACION 1                               
                                </td>

                               <td id="tho" colspan="2" style="text-align: justify;">
                                    CUANDO SE NOTIFIQUE LA RESOLUCION DE BAJA DE OFICIO POR LOS SIGUIENTES CASOS:                        
                                </td>                                                        
                            </tr>

                            <tr>
                                <td id="tho" class="especial" >
                                    DETALLE DEL SUPUESTO DE INHABILITACION 1<BR>
                                </td>

                                <?php if (is_null($fila['supuesto_1D'])) { ?>    
                                    <td id="td1" colspan="2" style="width: 250px">
                                        <input type = "TEXT" name = "supuesto_1D" id="fechaFinPInh" value="<?php echo $fila['supuesto_1D'] ?>"><br>
                                    </TD>
                                    <?php
                                } else {
                                    ?>
                                    <td id="td1" colspan="2" style="width: 250px; text-align: justify;">
                                        <?php echo $fila['supuesto_1D'] ?>
                                        <input type = "HIDDEN" name = "supuesto_1D" id="fechaFinPInh" value="<?php echo $fila['supuesto_1D'] ?>" readOnly><br>
                                    </TD>
                                    <?php
                                }
                                ?>
                            </tr>
                        <?php
                        } else {
                            ?>

                            <tr>
                                <td id="tho" class="especial" >
                                    SUPUESTOS DE INHABILITACION 1                               
                                </td>
                                <td id="tho" colspan="2" style="text-align: justify;">
                                    CUANDO SE NOTIFIQUE LA RESOLUCION DE BAJA DE OFICIO POR LOS SIGUIENTES CASOS:                       
                                </td>                          
                            </tr>

                            <tr>
                                <td id="tho" class="especial" >
                                    DETALLE DEL SUPUESTO DE INHABILITACION 1
                                </td>

                <?php if (is_null($fila['supuesto_1D'])) { ?>    
                                    <td id="td1" colspan="2" style="width: 250px; font-weight: bold">
                                        <input type = "TEXT" name = "supuesto_1D" id="fechaFinPInh" value="<?php echo $fila['supuesto_1D'] ?>"><br>
                                    </TD>
                    <?php
                } else {
                    ?>
                                    <td id="td1" colspan="2" style="width: 250px; font-weight: bold; text-align: justify">
                                    <?php echo $fila['supuesto_1D'] ?>
                                        <input type = "HIDDEN" name = "supuesto_1D" id="fechaFinPInh" value="<?php echo $fila['supuesto_1D'] ?>" readOnly><br>
                                    </TD>
                    <?php
                }
                ?>
                            </tr>

                            <!--///SUPUESTO 2 //-->
                            <tr>
                                <td id="tho" class="especial" >
                                    SUPUESTOS DE INHABILITACION 2                             
                                </td>                            

                                <td id="tho" colspan="2" style="width: 250px; text-align: justify ">
                <?php echo $fila['supuesto_2D'] ?>
                                </TD>                                                              
                            </tr>    

                            <tr>
                                <td id="tho" class="especial" >
                                    DETALLE DEL SUPUESTO DE INHABILITACION 2
                                </td>                           

                                <td colspan="2" style="width: 250px; font-weight: bold;text-align: left">
                                     <?php echo $fila['APLICAA'] ?>
                                </TD>                              
                            </tr>   
                <?php
            }
            ?>  
                            <?php
                            if($fechaEmiRI <= "2019-01-01") {
                            ?>
                            <tr>
                                <td id="tho" class="especial" style="width: 250px; font-weight: bold;text-align: left;color: red">
                                    NUMERO DE RESOLUCIÓN DE INHABILITACIÓN EN CASO QUE SEA PASIVO Y NO CONCUERDE CON SIMVECA<br>
                                    Ejemplo: 0949-2016-VCA-0099-087-001<br>
                                    Se actualizara bajo la responsabilidad de la OSPE
                            </td>

                            <?php if (is_null($fila['nResInhabilitacion_new'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "text" name = "nResInhabilitacion_new" class="form-control" min="1990-01-01" id="nResInhabilitacion_new" value="<?php echo $fila['nResInhabilitacion_new'] ?>">
                                
                                    </TD>

                                <?php
                            } else {
                                ?>
                                <td style="font-size: 12px"colspan="2">
                                    <?php echo $fila['nResInhabilitacion_new'] ?> <br>
                                    <input type = "HIDDEN" name = "nResInhabilitacion_new" min="1990-01-01" id="nResInhabilitacion_new" value="<?php echo $fila['nResInhabilitacion_new'] ?>" readOnly>
                                </td>
                                <?php
                            }
                            }
                            ?>
                        </tr>
                            
                            
                           

                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" >FECHA INICIO <br>INHABILITACIÓN ASEGURADO</td>

                            <?php if (is_null($fila['fechaInicioPInh'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" class="form-control" name = "fechaInicioPInh" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" id="fechaInicioPInh" value="<?php echo $fila['fechaInicioPInh'] ?>" required>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1" colspan="2">
                                    <?php echo $fila['fechaInicioPInh'] ?>
                                    <input type = "HIDDEN" name = "fechaInicioPInh" min="1990-01-01" id="fechaInicioPInh" value="<?php echo $fila['fechaInicioPInh'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>

                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" >
                                FECHA FIN <br>INHABILITACIÓN ASEGURADO
                            </td>

                            <?php if (is_null($fila['fechaFinPInh'])) { ?>    
                                <td id="td1" colspan="2">
                                    <input type = "date" class="form-control" name = "fechaFinPInh" min="1990-01-01" id="fechaFinPInh" value="<?php echo $fila['fechaFinPInh'] ?>" required readonly="">
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1" colspan="2">
                                    <?php echo $fila['fechaFinPInh'] ?>                                    
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <tr>
                            <td id="tho" class="especial" >
                                OBSERVACIONES
                            </td>
                        
                            <td>
                            <textarea class="form-control textareaa" placeholder="Solo 200 caracteres" name="observaciones_inh" 
                                  id="observaciones_inh" maxlength="200"
                                  style="margin: 0px -233px 0px 0px; height: 62px; width: 439px;"><?php echo $fila['observaciones_inh'] ?></textarea>
                        </td>
                        </tr>
                        <?php
                    $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII, o.fechaNotRInh, observaciones_inh                        
                        FROM dim_verificacion cp  
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido  
                        left join dim_inhabilitacion o on cp.iddim_aseguradoindevido=o.iddim_Inhabilitacion
                        where cp.iddim_Verificacion='$iddim_Verificacion' and cp.idTVerificacion='2'";
                    $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

                    while ($filaoficina = $resultoficina->fetch_assoc()) {

                        if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) {
                            ?>                    
                        <tr>
                            <td colspan="2">
                                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                                 <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                            </td>
                        </tr>
                           
                            <?php
                        }
                    }
                    ?>   
                            
            <?php
            if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
            if (is_null($fila['ruta_pdf_inhabi'])) {
            ?>
            <tr>
                    <td colspan="3" id="td1">                                               
                        <a href="#" id="abriPoppup4" style="font-size: 15px">SUBIR PDF *
                        </a>
                    </td>

                <div id="dialog4" title="SGVCA" class="contenido">
                    <iframe src="formSubirArchivoVInh.php?$iddim_Verificacion=<?php echo $iddim_Verificacion ?>" style="width: 100%; height: 100%"></iframe>
                </div>
            </tr>

                <?php
            }
            }
            ?>

                </table>
                    </form>

            <?php
        }
    }
}
}
?>	
        
<!--        <script>
            
function enviarfecha() {   
    var fecha=document.getElementById("fechaNotRInh").value;    
    document.getElementById("fechaEmiRInh").disabled = false;
    document.getElementById("fechaEmiRInh").value=fecha;
    document.getElementById("fechaEmiRInh").readonly = true;
}

</script>-->
        
        <?php
            if (isset($_POST['actualizar'])) {                

    require '../SISGASV/conexionesbd/conexion_mysql.php';
                    
    $iddimmm = $_POST['iddim_Verificacion'];
        
        $fechaInicioPInh = $_POST['fechaInicioPInh'];          
        
        $fechaNotRInh = $_POST['fechaNotRInh'];
        
         $fechaFinPInh = date("Y-m-d",strtotime($fechaInicioPInh."+ 1 years")); 
    
        
//        $fechaFinPInh = $_POST['fechaFinPInh'];
        
        $observaciones_inh = $_POST['observaciones_inh'];
        
//        $fechaInicioPInhh = date("Y-m-d",strtotime($fechaInicioPInh."+ 1 days"));         
        
                        
        if (empty($_POST['nResInhabilitacion_new'])) {
        $nResInhabilitacion_new = 'NULL';
            } else {        
        $nResInhabilitacion_neww = $_POST['nResInhabilitacion_new'];
         $nResInhabilitacion_new = "'$nResInhabilitacion_neww'";
            }
 
    $query = "UPDATE dim_inhabilitacion SET
           fechaNotRInh='$fechaNotRInh',
            fechaInicioPInh='$fechaInicioPInh',
            fechaFinPInh='$fechaFinPInh',
            observaciones_inh='$observaciones_inh'
            WHERE 
            iddim_Inhabilitacion='$iddimmm'";

    
                    if ($conexionmysql->query($query)) {
                        //if ($conexion->query($query1)) {

                        echo 'Se Actualizo Correctamente.';
                         echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                        //echo window.opener.location.reload(); window.close();
                        //echo "<meta http-equiv='refresh' content='2'>"; ACTUALIZA PAGINA PERO FALTA PERFECCIONAR
                        //Cerramos la conexion
                        // }
            }
            else {
                 echo 'incorrectamente.';
                 echo 'Error al Actualizar registro: ', $fechaFinPInh, $fechaInicioPInh, '<br>';
//                    echo 'Error al Actualizar registro: ', $fechaNotRInh;
            }            
                    }
                    
                    ?>
</body>
</html>


