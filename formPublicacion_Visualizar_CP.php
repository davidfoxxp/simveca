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

//$iddim_Verificacion = $_GET['iddim_Verificacion'];
//$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
//                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
//                        cp.an_verifi,cp.num_verifi, don.numero,
//                        don.ordenV, dr.numResBOficio,
//                        ai.RUC
//                        FROM dim_verificacion cp
//                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
//                        left join dim_overificacion don on don.iddim_Overificacion=cp.iddim_Verificacion
//                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
//                        where cp.iddim_Verificacion='$iddim_Verificacion'";
//$resultsql2 = $conexionmysql->query($sql2);
//$row2 = $resultsql2->fetch_assoc();

$iddim_Publicacion = $_GET['iddim_Publicacion'];
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
</script>
        <script>
    var mostrarValor = function(x){
            document.getElementById('textoOAS').value=x;
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
//        $nombreai = utf8_decode($row2['nombreai']);
//        $dniait = utf8_decode($row2['dni_t']);
//        $direccionait = utf8_decode($row2['DIRECCION_t']);
//        $distritoait = utf8_decode($row2['DISTRITO_t']);
//        $provinciaait = utf8_decode($row2['PROVINCIA_t']);
//        $eempleadora = utf8_decode($row2['RUC']);


        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);

        
        
                include './conexionesbd/conexion_mysql.php';
                    $queryP = "SELECT 
                        pu.resolucionpublicada,
                        pu.femision,
                        pu.fnotificacion,
                        pu.fnotificacion_v,
                        pu.fpublicacion_p,
                        pu.fpublicacion_e,
                        pu.fpublicacion_c,
                        pu.tipo_registro,
                        case when pu.tipo_registro='1' then 'ASEGURADO' 
                        when pu.tipo_registro='2' then 'EMPLEADOR' 
                        end as Tipo                        
                        FROM dim_publicacion pu                                   
                        WHERE pu.iddim_Publicacion='$iddim_Publicacion'";

                    $resultado = $conexionmysql->query($queryP);                 
                    while ($fila = $resultado->fetch_assoc()) {?>
        <form name="form2" method="POST" action="actualizarPublicacionVisualizacion.php" > 
                    <table>
                        <input id="i1" type="hidden" name="iddim_usuario" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                        <input id="i1" type="hidden" name="iddim_Publicacion"  value="<?php echo $iddim_Publicacion ?>" readOnly="readOnly"> 
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NUMERO DE ACTO<BR>ADMINISTRATIVO O ACTO DE LA<BR>ADMINISTRACION A PUBLICAR
                            </td>
                            <td id="td1" colspan="2" style="width: 400px">
                             <?php echo $fila['resolucionpublicada'] ?>
                            </td>                         
                        </tr>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE EMISION DEL ACTO
                            </td>
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <?php echo $fila['femision'] ?>
                            </TD>                           
                        </tr>
                        
                        <?php if (is_null($fila['fnotificacion'])) { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                 FECHA QUE LA OSPE ENVIO A PUBLICAR
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechanotiActo" min="0001-01-01" >
                            </TD>                             
                        </tr>
                        <?php } else{ ?>                                                
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA QUE LA OSPE ENVIO A PUBLICAR
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type="date" name="fechanotiActo" value="<?php echo $fila['fnotificacion'] ?>" readonly/>
                            </TD>                            
                        </tr>
                        <?php } ?>
                        
                        <?php if (is_null($fila['fnotificacion_v'])) { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                 FECHA DE NOTIFICACION R DEL ACTO - PERSONAL
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechanotiActo2" min="0001-01-01" >
                            </TD>                             
                        </tr>
                        <?php } else{ ?>                                                
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                 FECHA DE NOTIFICACION R DEL ACTO - PERSONAL
                                <!--SE GUARDA EN EL CAMPO DE NOTIFICACION <BR> DEL ACTO - PERSONAL-->
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type="date" name="fechanotiActo2" value="<?php echo $fila['fnotificacion_v'] ?>" readonly/>
                            </TD>                            
                        </tr>
                        <?php } ?>

                        <?php if (is_null($fila['fpublicacion_p'])) { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> EN EL PERUANO
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoP" min="0001-01-01" >
                            </TD>   
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> EN EL PERUANO
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type="date" name="fechapubliActoP" value="<?php echo $fila['fpublicacion_p'] ?>" readonly/>
                            </TD>    
                        </tr>
                    <?php } ?>
                        
                        
                        
                        <?php if (is_null($fila['fpublicacion_e'])) { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> WEB DE ESSALUD
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoW" min="0001-01-01" >
                            </TD>     
                        </tr>
                        <?php }else { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> WEB DE ESSALUD
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type="date" name="fechapubliActoW" value="<?php echo $fila['fpublicacion_e'] ?>" readonly/>
                            </TD>    
                        </tr>
                        <?php } ?>
                        
                        
                        <?php if (is_null($fila['fpublicacion_c'])) { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> DIARIO DE MAYOR CIRCULACION
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">
                                <input type = "date" name = "fechapubliActoC" min="0001-01-01" >
                            </TD>   
                        </tr>
                        <?php }else { ?>
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA DE PUBLICACION <BR> DIARIO DE MAYOR CIRCULACION
                            </td>                           
                            <td id="td1" colspan="2" style="width: 100px;text-align: center">                                
                                <input type="date"  name="fechapubliActoC" value="<?php echo $fila['fpublicacion_c'] ?>" readonly=""/>
                            </TD>    
                        </tr>
                         <?php } ?>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                TIPO DE REGISTRO
                            </td>                             
                             <td>
                                 <?php echo $fila['Tipo'] ?>
                            </td>
                        </tr>   

                    </table> 
            
                                <?php
                    $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII ,pu.fnotificacion,pu.fnotificacion_v,
                        pu.fpublicacion_p,pu.fpublicacion_e,pu.fpublicacion_c
                        FROM dim_cposterior cp                        
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                        
			left join dim_publicacion pu on cp.iddim_CPosterior=pu.iddim_CPosterior
                        where pu.iddim_Publicacion='$iddim_Publicacion' and cp.idTVerificacion='1'";                    
                        
                    
                    $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

                    while ($filaoficina = $resultoficina->fetch_assoc()) {

                       if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario){ 
                            if (is_null($filaoficina['fnotificacion']) || is_null($filaoficina['fpublicacion_p'])||
                                is_null($filaoficina['fpublicacion_e']) || is_null($filaoficina['fpublicacion_c'])){
                            
                            ?>                    
                            <div class="form-group row col-sm-10">
                                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                                 <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                                <h5>Se actualizara bajo su responsabilidad.</h5>   
                            </div>
                            <?php
                        
                                }else { ?>
                            <div class="form-group row col-sm-10">

                            </div>
                                <?php } 
                            
                        }
                    }
                    ?>  
                            
                </form>
                <?PHP
            }
//liberando los recursos
//cerrando los recursos
$resultado->free();
$conexionmysql->close()
?>	
</body>
</html>