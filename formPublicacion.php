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
 function ShowSelected()
            {
                /* Para obtener el valor */
                var fecharesoluciones = document.getElementById("publicar").value;
                document.getElementById('fecharesoluciones').value = fecharesoluciones;
                /* Para obtener el texto */
//var combo = document.getElementById("casoDerivado");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);
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


        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        
        $ano = utf8_decode($row2['an_verifi']);
        $num_verifi = utf8_decode($row2['num_verifi']);
        $ordenV00 = utf8_decode($row2['ordenV']);
        $numResBOficio = utf8_decode($row2['numResBOficio']);
        $numero = utf8_decode($row2['numero']);
        $numeroConCeros = str_pad($numero, 3, "0", STR_PAD_LEFT);

        //$iddim_CPosterior="20363";
        ?> 


        <form id ="pcalificart" name="form2" action="actualizarPublicacion.php" method="POST" > 
                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="num_verifi" size="50" value="<?php echo $num_verifi ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="dniait" size="50" value="<?php echo $dniait ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="eempleadora" size="50" value="<?php echo $eempleadora ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="codOficina" size="50" value="<?php echo $codOficina ?>" readOnly="readOnly">                    
                    <input id="i1" type="hidden" name="cod_oficinaIni" size="50" value="<?php echo $cod_oficinaIni ?>" readOnly="readOnly">                    

                    <table>

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                NUMERO DE ACTO<BR>ADMINISTRATIVO O ACTO DE LA<BR>ADMINISTRACION A PUBLICAR
                            </td>
                            <td id="td1" colspan="2" style="width: 400px">
                               <?PHP
                                include './conexionesbd/conexion_mysql.php';
                                $queryP = "SELECT ve.iddim_verificacion, 
                                    ov.iddim_Overificacion,ov.ordenV,ov.fechaEmision,
                                    re.iddim_ResBOficio,re.numResBOficio,re.fechaEmiBOficio,fechaNPCInicioPSInh,
                                    inh.iddim_Inhabilitacion,inh.nResInhabilitacion,inh.fechaEmiRInh,
                                    inh.numCartaIni,inh.fechaNCInicioPSInh,
                                    ov.numero
                                    FROM dim_verificacion ve
                                    left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
                                    left join dim_overificacion ov on ve.iddim_Verificacion=ov.iddim_Overificacion
                                    left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
                                    left join dim_inhabilitacion inh on re.iddim_ResBOficio=inh.iddim_ResBOficio
                                    WHERE ve.iddim_Verificacion= '$iddim_Verificacion'";
                                
                                $queryP1 = "SELECT ve.iddim_verificacion, 
                                    ov.iddim_Overificacion,ov.ordenV,
                                    re.iddim_ResBOficio,re.numResBOficio,
                                    inh.iddim_Inhabilitacion,inh.nResInhabilitacion,
                                    ov.numero,
                                    mu.iddim_multa,mu.numRMulta,mu.fechaERMulta,
                                    mu.numCInicioPSMulta,mu.fechaNPCInicioPSmult
                                    FROM dim_verificacion ve
                                    left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
                                    left join dim_overificacion ov on ve.iddim_Verificacion=ov.iddim_Overificacion
                                    left join dim_resboficio re on ov.iddim_Overificacion=re.iddim_Overificacion
                                    left join dim_inhabilitacion inh on re.iddim_ResBOficio=inh.iddim_ResBOficio
                                    left join dim_multa mu on ov.iddim_Overificacion=mu.iddim_Overificacion
                                    WHERE ve.iddim_Verificacion= '$iddim_Verificacion'";
                                
                                $resultado = $conexionmysql->query($queryP);
                                $resultado1 = $conexionmysql->query($queryP1);                     
                                ?>
                                <select name="publicar" id="publicar" class="form-control" onchange="ShowSelected();" >
                                    <option value="">----</option>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['ordenV'];?>,<?php echo $row['fechaEmision'];?>">ORDEN VER.: <?php echo $row['ordenV']; ?></option>
                                    <option value="<?php echo $row['numResBOficio'];?>,<?php echo $row['fechaEmiBOficio'];?>">RESOLUCION: <?php echo $row['numResBOficio']; ?></option>
                                    <option value="<?php echo $row['numCartaIni'];?>,<?php echo $row['fechaNPCInicioPSInh'];?>">CARTA IPS INHA.: <?php echo $row['numCartaIni']; ?></option>
                                    <option value="<?php echo $row['nResInhabilitacion'];?>,<?php echo $row['fechaEmiRInh'];?>">INHABILITACION: <?php echo $row['nResInhabilitacion']; ?></option>
                                    
                                <?php } ?>
                                    <?php while ($row1 = $resultado1->fetch_assoc()) { 
                                        $numero_OV=$row1['numero'];
                                                ?>      
                                    <option value="<?php echo $row1['numCInicioPSMulta'];?>,<?php echo $row1['fechaNPCInicioPSmult'];?>">CARTA IPS MULTA: <?php echo $row1['numCInicioPSMulta']; ?></option>
                                    <option value="<?php echo $row1['numRMulta'];?>,<?php echo $row1['fechaERMulta'];?>">MULTA: <?php echo $row1['numRMulta']; ?></option>                                    
                                    
                                <?php } ?>
                                </select>

                                <input type="" style="width: 315px;" readonly class="form-control" id="fecharesoluciones" name="fecharesoluciones"  /> 
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
                                <input type = "date" name = "fechapubliActoW" min="1990-01-01" >
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
                                &nbsp;&nbsp;&nbsp;<input type="checkbox" name="seleccion[]" value="1"><label>ASEGURADO</label><br/>
                                
                                &nbsp;&nbsp;&nbsp;<input type="checkbox" name="seleccion[]" value="2"><label>EMPLEADOR</label><br/>
                               
                            </td>
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
                <?PHP


//liberando los recursos
//cerrando los recursos
$resultado->free();
$conexionmysql->close()
?>	
</body>
</html>