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
//$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
//        FROM dim_usuario u 
//        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
//        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Multa = $_GET['iddim_Multa'];

$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi, cp.num_verifi,
                        don.ordenV, dr.numResBOficio,
                        ai.RUC
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join dim_overificacion don on cp.iddim_Verificacion=don.iddim_Overificacion
                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
                        left join dim_multa mu on don.iddim_Overificacion=mu.iddim_Overificacion
                        where mu.iddim_Multa='$iddim_Multa'";
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

<script>
		function habilitar(value)
		{
			if(value===true)
			{
				// habilitamos
				document.getElementById("fechaIFinalInstructormult").disabled=true;
			}else if(value===false){
				// deshabilitamos
				document.getElementById("fechaIFinalInstructormult").disabled=false;
			}
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
        $eempleadora= utf8_decode($row2['RUC']);
    $iddim_usuario = utf8_decode($row['iddim_usuario']);
    $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
    $codOficina = utf8_decode($row['codOficina']);
    $ano = utf8_decode($row2['an_verifi']);
    $num_verifi = utf8_decode($row2['num_verifi']);
    $ordenV00 = utf8_decode($row2['ordenV']);
    $numResBOficio = utf8_decode($row2['numResBOficio']);
    $newInicioPFinal = "";
    $newFinPFinal = "";
    $hoy = getdate();
    //$max;
    //$iddim_CPosterior="20363";
    ?> 

    
     <!--Incrustar php-->
            <?php
           // $iddim_Overificacion = $_GET['iddim_Overificacion'];

            //incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
            //realizando una consulta usando la clausula select
         
//            $query="SELECT * FROM dim_verificacion t
//                    where t.iddim_Verificacion='$iddim_Overificacion'";
//            
            $query = "SELECT t.num,t.iddim_Multa
FROM dim_multa t
where t.iddim_Multa='$iddim_Multa'";


            //Obteniendo el conjunto de resultados
//            $result = $conexionmysql->query($query);
             $result = $conexionmysql->query($query);
           // $entero = mysqli_num_rows($result);
            
              while ($fila = $result->fetch_assoc()) {
                       
                 $ma = $fila['num'];
                 $max = str_pad($ma, 3, "0", STR_PAD_LEFT);
            //recorriendo el conjunto de resultados con un bucle
             $nombre_pdf_multa= "M".$num_verifi.$dniait.$eempleadora.$cod_oficinaIni.$max.$ano ;
             //   if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
                    ?>

                    <?php
                    $hoy = getdate();
                    //echo $hoy = date("m/Y"); 
                    ?>
 <form id ="pcalificart" name="form2" action="actualizarVerificacion_Multa.php" method="POST" > 
        <table id="t1" border="1" summary="Rellena Formulario">           
                    
                    <input id="i1" type="hidden" name="iddim_usuario" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <!--<input id="i1" type="hidden" name="iddim_Overificacion"  value="<?php echo $iddim_Overificacion ?>" readOnly="readOnly">--> 
                    <input id="i1" type="hidden" name="max" value="<?php echo $max ?>" readOnly="readOnly"> 
                    <input id="i1" type="hidden" name="iddim_Multa" value="<?php echo $iddim_Multa ?>" readOnly="readOnly"> 

                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA NOTIFICACION DE LA <BR>CARTA DE INICIO DEL PROCESO SANCIONADOR<br>                                
                            </td>
                            <td id="td1" colspan="2" style="width: 100px">
                                <input type = "date" name = "fechaNCInicioPSmult" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" class="form-control" id="inputPassword" placeholder="date" required="">
                            </TD>                           
                        </tr>
                        
                         <!--///NUMERO 2 //-->
                        <tr>
                            <td id="tho" class="especial" style="width: 215px" >
                                FECHA INFORME FINAL DE INSTRUCCIÓN<br>
                                <span class="label label-danger">MARCAR SI NO TIENE INFORME FINAL DE INSTRUCCIÓN   <input type = "checkbox" name = "chklist" id="checkbox" onchange="habilitar(this.checked);" value="0"></span>                      
                            </td>                      
                            <td id="td1" colspan="2" style="width: 100px">
                                <input type = "date" name = "fechaIFinalInstructormult" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" class="form-control" id="fechaIFinalInstructormult" placeholder="date" required="">
                            </TD>                            
                        </tr>
                        
  <!----------------------HJASTA ACA SE HICIERON LOS CAMBIOS LUEGO SON DATOS Q SE DEBEN AGREGAR------------------------------------------>
                        <tr>
                        <td id="tho" class="especial" style="width: 215px" >
                            NUMERO DE RESOLUCION <br>DE BAJA DE OFICIO
                        </td>        
                        <td id="td1" colspan="2" style="width: 220px">
                            <select name="unidad" id="unidad" style="width:320px;" class="form-control" onchange="ShowSelected();" required="">                                     
                                        <option value="">----</option>
                                        <option value="<?php echo $cod_oficinaIni . "-" . $ano . "-VCA-" . $num_verifi . "-086-". $max; ?>">OSPE</option>
                                        <option value="<?php echo $codOficina . "-" . $ano . "-VCA-" . $num_verifi . "-086-". $max; ?>">UCF</option>
                                        <option value="<?php echo "0864" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OAALMENARA</option>
                                        <option value="<?php echo "0833" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OAREBAGLIATI</option>
                                        <option value="<?php echo "0682" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OASABOGAL</option>
                                        
                                        <option value="<?php echo $codOficina . "-" ."0864" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">UCF/OAALMENARA</option>
                                        <option value="<?php echo $codOficina . "-" ."0833" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">UCF/OAREBAGLIATI</option>
                                        <option value="<?php echo $codOficina . "-" ."0682" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">UCF/OASABOGAL</option>  
                                        
                                        <option value="<?php echo $cod_oficinaIni . "-" .$codOficina ."-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/UCF</option>
                                        
                                        <option value="<?php echo $cod_oficinaIni . "-" ."0864" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/OAALMENARA</option>
                                        <option value="<?php echo $cod_oficinaIni . "-" ."0833" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/OAREBAGLIATI</option>
                                        <option value="<?php echo $cod_oficinaIni . "-" ."0682" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/OASABOGAL</option>
                                        
                                        <option value="<?php echo $cod_oficinaIni . "-" .$codOficina . "-" ."0864" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/UCF/OAALMENARA</option>
                                        <option value="<?php echo $cod_oficinaIni . "-" .$codOficina . "-" ."0833" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/UCF/OAREBAGLIATI</option>
                                        <option value="<?php echo $cod_oficinaIni . "-" .$codOficina . "-" ."0682" . "-" . $ano . "-VCA-" . $num_verifi . "-086-$max"; ?>">OSPE/UCF/OASABOGAL</option>
                                        
                                </select>
                                <input  style="width: 320px;" readonly class="form-control" id="numRMulta" name="numRMulta" value="" />   
                        </TD>  
                    </tr>
                        
                       <tr>  
                        <td id="tho" class="especial" style="width: 215px" >
                                NOMBRE PDF MULTA
                        </td>   
                        <td id="td1" colspan="2" style="width: 220px">                                
                        <input  style="width: 320px;" name="nombre_pdf_multa" class="form-control" value="<?php echo $nombre_pdf_multa ;?>" readonly/>   
                        </td> 
                    </tr> 
                        
                         <tr>  
                    <td id="tho" class="especial" style="width: 215px" >
                            FECHA EMISION DE <br> RESOLUCION DE MULTA
                    </td> 
                    <td id="td1" colspan="2" style="width: 220px">
                        <input style="width: 250px;" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" name="fechaDIF" type="date" class="form-control" id="staticEmail" required="">
                    </td>
                    </tr>
                        
   

<!----------------------HJASTA ACA SE HICIERON LOS CAMBIOS LUEGO SON DATOS Q SE DEBEN AGREGAR------------------------------------------>

                    <TR>                            
                            <td id="tho" class="especial" style="width: 215px" >
                                INFRACCIONES / SANCION
                            </td>

                            <td id="td1" colspan="2" style="width: 100px">
                                <?PHP
                                $queryM = "SELECT * FROM sisgasv.tipo_infracciones";
                                $resultado2 = $conexionmysql->query($queryM);
                                ?>

                                <div>
                                    <select name="cbx_infraccion" id="cbx_infraccion" style="width:320px;" class="form-control" required="">
                                        <option class="form-control" value="">SELECCIONE PERFIL</option>

                                        <?php while ($row = $resultado2->fetch_assoc()) { ?>
                                            <option class="form-control" value="<?php echo $row['idtipo_infracciones']; ?>"><?php echo $row['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php
                                ?>
                            </td>                           
                        </tr>    
                        
                        <TR>
                             <td id="tho" class="especial" style="width: 215px" >
                                CANTIDAD DE TRABAJADORES
                            </td>

                            <td>
                                <div>
                                    <select name="cbx_uit" id="cbx_uit" style="width:320px;" class="form-control" required="">
                                        <option class="form-control" value="">SELECCIONE LA CANTIDAD</option>
                                        <option class="form-control" value="0.50">1 A 50</option>
                                        <option class="form-control" value="1">51 A 100</option>
                                        <option class="form-control" value="2">101 A MAS</option>
                                    </select>
                                </div>
                            </td>
                        </TR>
                                     
                </table>  
                <?php
                
            
            $queryoficina = "SELECT b.idDIM_Oficina, t.iddim_Multa
                    FROM dim_multa t
                    left join tiporrbregistro a on t.idTRRBRegistro=a.idTRRBRegistro
                    left join dim_overificacion b on t.iddim_Overificacion=b.iddim_Overificacion
                    where t.iddim_Multa='$iddim_Multa'";
            //Obteniendo el conjunto de resultados
            $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

            while ($filaoficina = $resultoficina->fetch_assoc()) {
                if ($filaoficina['idDIM_Oficina'] == $idOficinaUsuario) {
                    ?>
                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->                
                <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                    <h5>Se actualizara bajo su responsabilidad.
                    </h5>
            <?php } 
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