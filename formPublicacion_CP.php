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

$iddim_CPosterior = $_GET['iddim_CPosterior'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.idTipoAtencion,
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,ai.RUC,
                        ai.titularAcredita_dni, ai.titularAcredita_nombres,titularAcredita_vinculo,
                        cp.femisionBRegistro, cp.nResBRegistro, SUBSTRING(cp.nResBRegistro,1,4) numres,
                        cp.fconstanciaAcFirme
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        where cp.iddim_CPosterior='$iddim_CPosterior'";
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
            td {
                border-style:solid;
                border-width:0.5px;
                border-color:#999;
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
        
                <script>
 
function validarchk(){
var chk = document.getElementById('seleccion3');
var txt1 = document.getElementById('seleccion1');
var txt2 = document.getElementById('seleccion2');
if(chk.checked){    
    txt1.value='';
    txt1.disabled='disabled';
    
    txt2.value='';
    txt2.disabled='disabled';
    
    document.getElementById("seleccion1").checked = false;
    document.getElementById("seleccion2").checked = false;
    
}else{
    txt1.disabled='';
    txt2.disabled='';
    
}
}
</script>


    </head>
    <body>  
        <?PHP
        $nomenclaturaOSPE = $row['nomenclaturaOSPE'];
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
        $femisionBRegistro=$row2['femisionBRegistro'];

        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        
        $nResBRegistro = utf8_decode($row2['nResBRegistro']);
//        $num_verifi = utf8_decode($row2['num_verifi']);
//        $ordenV00 = utf8_decode($row2['ordenV']);
        $numres = utf8_decode($row2['numres']);
        $numero = utf8_decode("1");
        $numeroConCeros = str_pad($numero, 3, "0", STR_PAD_LEFT);
        $titularAcredita_vinculo=$row2['titularAcredita_vinculo'];
        $titularAcredita_dni = utf8_decode($row2['titularAcredita_dni']);
        $titularAcredita_nombres = utf8_decode($row2['titularAcredita_nombres']);
        $idTipoAtencion=$row2['idTipoAtencion'];

        //$iddim_CPosterior="20363";
        ?> 


        <form id ="pcalificart" name="form2" action="actualizarPublicacion_CP.php" method="POST" > 
            <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CPosterior ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="nResBRegistro" size="50" value="<?php echo $nResBRegistro ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="dniait" size="50" value="<?php echo $dniait ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="eempleadora" size="50" value="<?php echo $eempleadora ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="femisionBRegistro" size="50" value="<?php echo $femisionBRegistro ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="codOficina" size="50" value="<?php echo $codOficina ?>" readOnly="readOnly">                    
                    <input id="i1" type="hidden" name="cod_oficinaIni" size="50" value="<?php echo $cod_oficinaIni ?>" readOnly="readOnly"> 
                    
                    <input id="i1" type="hidden" name="titularAcredita_dni" size="50" value="<?php echo $titularAcredita_dni ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="titularAcredita_nombres" size="50" value="<?php echo $titularAcredita_nombres ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="titularAcredita_vinculo" size="50" value="<?php echo $titularAcredita_vinculo ?>" readOnly="readOnly"> 

                    <table>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NUMERO DE ACTO<BR>ADMINISTRATIVO O ACTO DE LA<BR>ADMINISTRACION A PUBLICAR
                            </td>
                            <td id="td1" colspan="2" style="width: 400px">
                               <?PHP
                                include './conexionesbd/conexion_mysql.php';
                                $queryP = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                                            ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                                           
                                            cp.femisionBRegistro, cp.nResBRegistro, cp.fconstanciaAcFirme
                                            FROM dim_cposterior cp
                                            left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                                            where cp.iddim_CPosterior='$iddim_CPosterior'";                        
                                
                                $resultado = $conexionmysql->query($queryP);                                             
                                ?>
                                <select name="publicar" id="publicar" class="form-control">
                                    <option value="">----</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                                                        
                                    <option value="<?php echo $numres ?>">RES: <?php echo $row['nResBRegistro'] ?></option>
                                    
                                    
                                <?php } ?>
                                    
                                </select>                                
                            </td>                         
                        </tr>                        
                        <!--<tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE EMISION DEL ACTO
                            </td>
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechaemiActo" min="0001-01-01" >
                            </TD>                           
                        </tr>-->
                        <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA QUE LA OSPE ENVIO A PUBLICAR
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechanotiActo" min="1990-01-01" >
                            </TD>                            
                        </tr>
                        
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE NOTIFICACION R DEL ACTO - PERSONAL
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechanotiActo2" min="1990-01-01" >
                            </TD>                            
                        </tr>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> EN EL PERUANO
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoP" min="1990-01-01" >
                            </TD>    
                        </tr>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> WEB DE ESSALUD
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoW" min="1990-01-01">
                            </TD>    
                        </tr>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> DIARIO DE MAYOR CIRCULACION
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoC" min="1990-01-01" >
                            </TD>    
                        </tr>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                TIPO DE REGISTRO
                            </td>                             
                             <td>                               
                                 <input type="checkbox" name="seleccion1" id="seleccion1" value="1" checked=""><label>ASEGURADO</label><br/>
                                
                                <input type="checkbox" name="seleccion2" id="seleccion2" value="2"><label>EMPLEADOR</label><br/>
                                
                                
                                <?php if($idTipoAtencion==2) { ?>
                                <label><input type="checkbox" name="seleccion3" id="seleccion3" value="3" onChange="validarchk();">TITULAR QUE OTORGO DERECHO<h6>Para las opciones de Registro por Iniciativa Propia de Control Posterior: "Derecho Habiente" y "Derecho Habiente no Registrado"</h6></label>
                                <?php } ?> 
                                 
<!--                                 &nbsp;&nbsp;&nbsp;<input type="checkbox" name="seleccion[]" value="1"><label>ASEGURADO</label><br/>
                                
                                &nbsp;&nbsp;&nbsp;<input type="checkbox" name="seleccion[]" value="2"><label>EMPLEADOR</label><br/>
                               
                               <label>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="seleccion[]" value="3">TITULAR QUE OTORGO DERECHO<h6>Para las opciones de Registro por Iniciativa Propia de Control Posterior: "Derecho Habiente" y "Derecho Habiente no Registrado"</h6></label>-->
                            </td>
                        </tr>   

                    </table>  
                 
                    <?php
                    $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                        
                        where cp.iddim_CPosterior='$iddim_CPosterior' and cp.idTVerificacion='1'";
                    
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


//liberando los recursos
//cerrando los recursos
$resultado->free();
$conexionmysql->close()
?>	
</body>
</html>