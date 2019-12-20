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

$iddim_Multa = $_GET['iddim_Multa'];

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
            h11 {
                font-size:9px;
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
               font-size: 11px;
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
function ShowSelected()
{
/* Para obtener el valor */
var ofi = document.getElementById("unidad").value;
document.getElementById('numRMulta').value=ofi;
/* Para obtener el texto */
//var combo = document.getElementById("casoDerivado");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);
}
        </script>
        
<script>
    var mostrarValor = function(x){
            document.getElementById('textoOAS').value=x;
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
    $iddim_usuario = utf8_decode($row['iddim_usuario']);
    $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
    $codOficina = utf8_decode($row['codOficina']);

    $newInicioPFinal = "";
    $newFinPFinal = "";
    //$max;
    //$iddim_CPosterior="20363";
    ?> 

            <?php
            include './conexionesbd/conexion_mysql.php';
 
            $query = "SELECT t.iddim_Overificacion, t.fechaERMulta, t.num, 
         t.fechaNMulta,
         t.infraccion,
         t.uit,
         case when t.uit='0.5' then 'DE 1 A 50' 
         when t.uit='1' then 'DE 51 A 100' 
         when t.uit='2' then 'DE 101 A MAS'
         end as cantidadT,    
         t.fechaNPCInicioPSmult, t.fechaNCInicioPSmult, t.fechaIFinalInstructormult,         
         t.numRMulta, t.nombrePDFmulta,t.idtusuario, t.fCreacion,
         ti.descripcion
         
FROM dim_multa t
left join tipo_infracciones ti on t.infraccion=ti.idtipo_infracciones
where t.iddim_Multa='$iddim_Multa'";

             $result = $conexionmysql->query($query);
            
              while ($fila = $result->fetch_assoc()) {
                    ?>

                    <?php
                    $hoy = getdate();
                    ?>
 <form id ="pcalificart" name="form2" method="POST" > 
        <table id="t1" border="1" summary="Rellena Formulario">           
                    
                    <input id="i1" type="hidden" name="iddim_usuario" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_Overificacion"  value="<?php echo $iddim_Multa ?>" readOnly="readOnly"> 
                   
                        
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA CARTA DE INICIO DEL PROCESO SANCIONADOR
                            </td>
                            <td id="td1" colspan="2" style="width: 100px"> 
                                <?php echo $fila['fechaNPCInicioPSmult'] ?>                                
                            </TD>                           
                        </tr>                        
                         
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA NOTIFICACION DE LA <BR>CARTA DE INICIO DEL PROCESO SANCIONADOR
                            </td>
                            <td id="td1" colspan="2" style="width: 100px">
                                <?php echo $fila['fechaNCInicioPSmult'] ?>
                                <br>
                                <?php
                                           $inicio = $fila['fechaNCInicioPSmult'];
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
                        </tr>
                        
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA INFORME FINAL DE INSTRUCCIÓN
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px">
                               <?php echo $fila['fechaIFinalInstructormult'] ?>
                            </TD>                            
                        </tr>
                        
  <!----------------------HJASTA ACA SE HICIERON LOS CAMBIOS LUEGO SON DATOS Q SE DEBEN AGREGAR------------------------------------------>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NUMERO DE RESOLUCION <br>DE BAJA DE OFICIO
                            </td>        
                            <td id="td1" colspan="2" style="width: 220px">
                                <?php echo $fila['numRMulta'] ?> 
                            </td>  
                        </tr>
                        
                        <tr>  
                            <td id="tho" class="especial" style="width: 215px" >
                                NOMBRE PDF MULTA
                            </td>   
                            <td id="td1" colspan="2" style="width: 220px">                                
                                <?php echo $fila['nombrePDFmulta'] ?>   
                            </td> 
                        </tr> 
                        
                         <tr>  
                            <td id="tho" class="especial" style="width: 215px" >
                            FECHA EMISION DE <br> RESOLUCION DE MULTA
                            </td> 
                            <td id="td1" colspan="2" style="width: 220px">
                                <?php echo $fila['fechaERMulta'] ?>
                            </td>
                         </tr>
       
<!----------------------HJASTA ACA SE HICIERON LOS CAMBIOS LUEGO SON DATOS Q SE DEBEN AGREGAR------------------------------------------>

                        <tr>                            
                            <td id="tho" class="especial" style="width: 215px" >
                                INFRACCIONES / SANCION
                            </td>

                            <td id="td1" colspan="2" style="width: 100px;text-align: justify">                              
                                    <?php echo $fila['descripcion'] ?>                           
                            </td>                           
                        </tr>    
                        
                        <tr>
                             <td id="tho" class="especial" style="width: 225px" >
                                CANTIDAD DE TRABAJADORES
                            </td>
                            <td style="width: 260px;">
                                <?php echo $fila['cantidadT'] ?>
                            </td>                           
                        </TR>
                        
                        <tr>
                             <td id="tho" class="especial" style="width: 225px" >
                                MONTO
                            </td>                            
                            <td style="width: 260px;">
                                <?php echo $fila['uit']." UIT" ?>
                            </td>
                        </TR>
                                     
                </table>      
            </form>  
    
     <form id ="pcalificart" name="form2" action="actualizarVerificacion_Multa_SICO.php" method="POST"> 
        <table id="t1" border="1" summary="Rellena Formulario">           
                    
                    <input id="i1" type="hidden" name="iddim_usuario" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_Multa"  value="<?php echo $iddim_Multa ?>" readOnly="readOnly"> 
 <!----------------------HJASTA ACA SE HICIERON LOS CAMBIOS LUEGO SON DATOS Q SE DEBEN AGREGAR------------------------------------------>
                                <?php $queryoficina = "SELECT b.idDIM_Oficina, 
                                    t.iddim_Multa,t.fechaInSICO, t.fechaCartaSGCNT, t.fechaNMulta,
                                    t.NcartaSGCNT,t.fechaCartaSGCNT, t.fcActFirme
                    FROM dim_multa t
                    left join tiporrbregistro a on t.idTRRBRegistro=a.idTRRBRegistro
                    left join dim_overificacion b on t.iddim_Overificacion=b.iddim_Overificacion
                    where t.iddim_Multa='$iddim_Multa'";
            //Obteniendo el conjunto de resultados
            $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

            while ($filaoficina = $resultoficina->fetch_assoc()) { ?>
                                        
                    <tr>  
                    <td id="tho" class="especial" style="width: 225px" >
                            FECHA NOTIFICACION DE MULTA
                    </td> 
                    <td id="td1" colspan="2" style="width: 260px">
                        <?php if(is_null($filaoficina['fechaNMulta'])){ ?>
                        <input style="width: 255px;" class="form-control" min="1990-01-01" name="fechaNMulta" type="date" class="form-control">
                        <?php } else { ?>
                        <input style="width: 255px;" name="fechaNMulta" min="1990-01-01" type="date" class="form-control" value="<?php echo $filaoficina['fechaNMulta'] ?>" readonly="">
                        <?php 
                        } ?>
                    </td>
                    </tr>
                    
                    <tr>  
                    <td id="tho" class="especial" style="width: 225px" >
                            FECHA CONSTANCIA DE ACTO FIRME
                    </td> 
                    <td id="td1" colspan="2" style="width: 260px">
                        <?php if(is_null($filaoficina['fcActFirme'])){ ?>
                        <input style="width: 255px;" name="fcActFirme" min="1990-01-01" type="date" class="form-control">
                        <?php } else { ?>
                        <input style="width: 255px;" name="fcActFirme" type="date" class="form-control" value="<?php echo $filaoficina['fcActFirme'] ?>" readonly>
                        <?php 
                        } ?>
                    </td>
                    </tr>
                    
                    <tr>  
                    <td id="tho" class="especial" style="width: 225px" >
                        FECHA DE INGRESO AL SICO<br>
                            <h11>SICO = Sistema de Cobranza</h11>
                    </td> 
                    <td id="td1" colspan="2" style="width: 250px">
                        <?php if(is_null($filaoficina['fechaInSICO'])){ ?>
                        <input style="width: 250px;" name="fechaInSICO" min="1990-01-01" type="date" class="form-control">
                        <?php } else { ?>
                        <input style="width: 250px;" name="fechaInSICO" type="date" class="form-control" value="<?php echo $filaoficina['fechaInSICO'] ?>" readonly>
                        <?php 
                        } ?>
                    </td>
                    </tr>
 
                     <tr>  
                    <td id="tho" class="especial" style="width: 215px" >
                        N° CARTA DIRIGIDA A SGCNT<br>
                            
                    </td> 
                    <td id="td1" colspan="2" style="width: 246px">
                        <?php if(is_null($filaoficina['NcartaSGCNT'])){ ?>
                        <input style="width: 250px;" name="NcartaSGCNT" type="text" maxlength="4" class="form-control">
                        <?php } else { ?>
                        <input style="width: 250px;" name="NcartaSGCNT" type="text" class="form-control" value="<?php echo $filaoficina['NcartaSGCNT'] ?>" readonly>
                        <?php 
                        } ?>
                    </td>
                    </tr>
                    
                    <tr>  
                    <td id="tho" class="especial" style="width: 215px" >
                        FECHA EMISION CARTA A SGCNT<br>
                            <h11>SGCNT = Sub Gerencia de Cobranza no Tributaria</h11>
                    </td> 
                    <td id="td1" colspan="2" style="width: 246px">
                        <?php if(is_null($filaoficina['fechaCartaSGCNT'])){ ?>
                        <input style="width: 250px;" name="fechaCartaSGCNT" min="1990-01-01" type="date" class="form-control">
                       <?php } else { ?>
                        <input style="width: 250px;" name="fechaCartaSGCNT" type="date" class="form-control" value="<?php echo $filaoficina['fechaCartaSGCNT'] ?>" readonly> 
                        <?php 
                        } ?>
                    </td>
                    </tr>                   
                                     
                </table> 
          <?php
                
                if ($filaoficina['idDIM_Oficina'] == $idOficinaUsuario) {
                    if(is_null($filaoficina['fechaCartaSGCNT'])){
                    ?>
                <button type= "submit" name = "actualizarSICO" class="button button2">Actualizar</button>
                    <h5>Se actualizara bajo su responsabilidad.
                    </h5>
                
                    <?php }                     
                    } 
                } ?>
            </form>  
        <?php
                      
                  }
                 
//liberando los recursos
//cerrando los recursos
    $result->free();
    $conexionmysql->close()
    ?>	
</body>
</html>