<?php
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

/* $sql = "SELECT o.idDIM_Oficina, o.id, u.iddim_usuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
  FROM dim_usuario u
  inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
  where u.iddim_usuario='$idtusuario'";
 */


$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura, o.nomenclaturaOSPE,
        o.oficina,o.direccion,o.Distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";


//inner join dim_aseguradoindevido ai on o.idDIM_Oficina=ai.idDIM_oficina 
//concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombreai
//left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();
$iddim_CPosterior = $_GET['iddim_CPosterior'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t
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

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>   

        <script>var $j = jQuery.noConflict();</script>

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
            
.button1 {padding: 5px 5px;}

            /*programando con css*/
            body {               
                background-repeat: repeat-x;
                background-attachment: fixed;
            }    
            #td1 {
                font-size: 10px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
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
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color: #0060C0;
                background-color:#B0C4DE;
            }
            #tho
            {
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-weight:normal;

                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            tr td {
                vertical-align:left;
            }
            @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
            #i1 {
                border: 0;
            }  
  
        </style>

        <script>
            $(function () {
                // SEGUNDA VENTANA VENTANA  DE PERIODOS A CALIFICAR
                $("#dialog1").hide();
                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 500,
                        width: 680,
                        modal: true
                    });
                }
                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });

                //CARTA A FINANZAS         
                $("#dialog2").hide();
                function abrir2() {
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                        height: 500,
                        width: 680,
                        modal: true
                    });
                }
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });

                // PRIMERA VENTANA  DE PERIODOS A CALIFICAR
                $("#dialog3").hide();
                function abrir3() {
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                        height: 500,
                        width: 680,
                        modal: true
                    });
                }
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });

                 $("#dialog4").hide();//SUBIR PDF
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
                //INGRESAR A LOS DH
                $("#dialog5").hide();
                function abrir5() {
                    $("#dialog5").show();
                    $("#dialog5").dialog({
                        resizable: false,
                        width: 800,
                        height: 500,
                       
                        modal: true
                    });
                }
                $("#abriPoppup5").click(
                        function () {
                            abrir5();
                        });

                //FINANZAS NUEVOS PERIODOS
                $("#dialog6").hide();
                function abrir6() {
                    $("#dialog6").show();
                    $("#dialog6").dialog({
                        resizable: false,
                        height: 500,
                        width: 680,
                        modal: true
                    });
                }
                $("#abriPoppup6").click(
                        function () {
                            abrir6();
                        });
                        
                        //publicacion
                $("#dialog7").hide();
                function abrir7() {
                    $("#dialog7").show();
                    $("#dialog7").dialog({
                        resizable: false,                        
                        width: 700,
                        height: 500,
                        modal: true
                    });
                }
                $("#abriPoppup7").click(
                        function () {
                            abrir7();
                        });
                        
                        //RECONSIDERACIONES
                        $("#dialog8").hide();
                function abrir8() {
                    $("#dialog8").show();
                    $("#dialog8").dialog({
                        resizable: false,                        
                        width: 700,
                        height: 500,
                        modal: true
                    });
                }
                $("#abriPoppup8").click(
                        function () {
                            abrir8();
                        });
                        
                        //domicilio
                        $("#dialog9").hide();
                function abrir9() {
                    $("#dialog9").show();
                    $("#dialog9").dialog({
                        resizable: false,                        
                        width: 700,
                        height: 500,
                        modal: true
                    });
                }
                $("#abriPoppup9").click(
                        function () {
                            abrir9();
                        });


            });
        </script>

        <script>
            function habilitar11(value)
            {
                if (value === "3")
                {
                    // habilitamos
                    document.getElementById("nit").required = true;
                    document.getElementById("femisionBRegistro").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    //document.getElementById("nResBRegistro").required = true;
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true;                   
                } else {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;
                    document.getElementById("femisionBRegistro").required = false;
                    //document.getElementById("idTGeneraBaja").value = "0";
                    //document.getElementById("nResBRegistro").required = false;
                    // document.getElementById("idTGeneraBaja").disabled = false;
                }
            }
        </script>

        <script>
            function habilitar22(value)
            {
                if (value === '1' || value === '0')
                {
                    // habilitamos
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("nit").disabled = false;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("nResBRegistro00").disabled = false;
                    document.getElementById("ano").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("idTEstadoActual").value = "1";
                    document.getElementById("idTEstadoActual").disabled = false;
                    document.getElementById("actualizar").type = "HIDDEN";

                } else if (value === '2') {
                    // deshabilitamos                    

                    document.getElementById("nit").value = "";
                    document.getElementById("nit").disabled = true;

                    document.getElementById("femisionBRegistro").value = "";
                    document.getElementById("femisionBRegistro").disabled = true;

                    document.getElementById("nResBRegistro00").value = "";
                    document.getElementById("nResBRegistro00").disabled = true;

                    document.getElementById("fnotificacionBRegistro").value = "";
                    document.getElementById("fnotificacionBRegistro").disabled = true;

                    document.getElementById("ano").value = "";
                    document.getElementById("ano").disabled = true;

                    document.getElementById("unidad").value = "";
                    document.getElementById("unidad").disabled = true;

                    document.getElementById("idTRRBRegistro").value = "";
                    document.getElementById("idTRRBRegistro").disabled = true;

                    document.getElementById("idTEstadoActual").value = "3";
                    document.getElementById("idTEstadoActual").disabled = true;

//                    document.getElementById("actualizar").type = "submit";

                }
            }
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
                var mostrarValor = function (x) {
                    document.getElementById('textoOAS').value = x;
                }
        </script>
        
        <script type="text/javascript">
function ConfirmDemo2() {
//Ingresamos un mensaje a mostrar
var mensaje = confirm("Estás seguro que desea Eliminar los Periodos de Baja?");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {

alert("Se Elimino Correctamente");

}
//Detectamos si el usuario denegó el mensaje
//else {
//alert("Se regresara");
//}
}
</script>
        
        <script type="text/javascript">
function ConfirmDemo() {
//Ingresamos un mensaje a mostrar
var mensaje = confirm("Estás seguro que desea Actualizar?");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {

alert("Se actualizo correctamente");

}
//Detectamos si el usuario denegó el mensaje
//else {
//alert("Se regresara");
//}
}
</script>


        
        
    </head>
    <body>  

        <?PHP
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $nomenclaturaOSPE = utf8_decode($row['nomenclaturaOSPE']);
        $nomenclatura = utf8_decode($row['nomenclatura']);
        $codOficina = utf8_decode($row['codOficina']);
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
        $iddim_CP="";
        $idDIM_OficinaII="";
        $fCreacionTerminado_m="";
        $hoy = getdate();
        ?>       
        <div>                                   
            <!--Incrustar php-->
            <?php
            //$iddim_CPosterior = $_GET['iddim_CPosterior'];
//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query = "SELECT ai.idDIM_Oficina as idDIM_OficinaII, ai.dni_t, ai.RUC,
                        cp.iddim_CPosterior, 
                        tp.Verificacion,
                        tpf.idTVerificacionPerfil,
                        tpf.VerificacionPerfil,
                        cp.perfil_otros,
                        cp.fconstanciaAcFirme,
                        cp.iddim_aseguradoindevido, 
                        tea.idTEstadoActual,
                        tea.EstadoActual, 
                        cp.idTGeneraBaja,
                        cp.factofirme,
                        ai.TipoRegistro,
case 
when ai.TipoRegistro='1' then 'ASEGURADO'
when ai.TipoRegistro='2' then 'EMPLEADOR'                
end as TipoRegistro_des,   
ai.idTipoTrabajador,  
cp.sunat,
case 
when ai.idTipoTrabajador='1' then 'RG - TRABAJADOR REGULAR'
when ai.idTipoTrabajador='119' then 'TH - TRABAJADOR DEL HOGAR'
when ai.idTipoTrabajador='201' then 'AD - AGRARIO DEPENDIENTE'
when ai.idTipoTrabajador='203' then 'AI - AGRARIO INDEPENDIENTE'
when ai.idTipoTrabajador='805' then 'PP - PESQUERO ARTESANAL'
end as TipoTrabajador_des, 
ai.idTipoAtencion,
case 
when ai.idTipoAtencion='1' then 'TITULAR'
when ai.idTipoAtencion='2' then 'DERECHO HABIENTE'                
end as TipoAtencion_des,  
                        case 
                        when cp.idTGeneraBaja='1' then 'SI'
                        when cp.idTGeneraBaja='2' then 'NO'
                        when cp.idTGeneraBaja='4' then '--'
                        end as GeneraBaja,
                        trr.idTRRBRegistro,
                        trr.RRBRegistro,
                        cp.nit, cp.femisionBRegistro, cp.nResBRegistro, 
                        cp.nombrePDF,
                        cp.fnotificacionBRegistro, cp.respuestaBRegistro,
                        cp.respuestaBRegistro, cp.observaciones,
                        cp.fCreacionTerminado
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                        left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil AND tpf.idTVerificacion='1' 
                        left join tiporrbregistro trr on cp.idTRRBRegistro=trr.idTRRBRegistro
                        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                        where cp.iddim_CPosterior='$iddim_CPosterior'";


            $query2 = "SELECT count(*) total FROM dim_paevaluar_new t
                    where t.iddim_aseguradoindevido='$iddim_CPosterior'";
            //Obteniendo el conjunto de resultados
            $result2 = $conexionmysql->query($query2);
            //recorriendo el conjunto de resultados con un bucle
            while ($fila2 = $result2->fetch_assoc()) {
                $genera_baja = $fila2['total'];
            }

//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle

            while ($fila = $result->fetch_assoc()) {
                $iddim_CP = $fila['iddim_CPosterior'];
                $idDIM_OficinaII = $fila['idDIM_OficinaII'];
                $fCreacionTerminado_m = $fila['fCreacionTerminado'];
                $iidTEstadoActual = $fila['idTEstadoActual'];
                ?>
                <form name="form" method="POST" onSubmit="window.location.reload(true)">
                    <table id="t1" border="1" summary="Rellena Formulario">
                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="4">
                                ACTUALIZACION DE LA INFORMACION DEL CONTROL POSTERIOR
                            </th>
                        </tr> 
                        <tr> 
                            <td id="td1">
                                DESCRIPCION
                            </td>
                            <td id="td1">
                                DATOS ANTERIORES
                            </td>
                            <td id="td1">
                                NUEVOS INGRESOS
                            </td>                                    
                        </tr>
                        <tr>
                            <?php
                            $dni_t = $fila['dni_t'];
                            $ruc = $fila['RUC'];
                            ?> 
                        <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $fila['iddim_CPosterior'] ?>" readOnly="readOnly">  
                        <input type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  

                        </tr>
                        <TR>
    <!--                                                        <th id="th1" scope="row" class="especial" colspan="4">
                                ACTUALIZACION DE LA INFORMACION DEL CONTROL POSTERIOR
                            </th>-->
                          <td class="especial" id="td1">
                                ESTADO ACTUAL
                            </td>
                            <td id="td1"><?php echo $fila['EstadoActual'] ?></td>

                            <?php if ($fila['idTEstadoActual'] == '3') { ?> 
                                <td><input type="HIDDEN" name="idTEstadoActual" size="50" value="3" readOnly="readOnly">  
                                    <select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual" disabled>                                    
                                        <option value = '1'>PENDIENTE</option>
                                        <option value = '2'>EN PROCESO</option>
                                        <option value = '3' selected>TERMINADO</option> 
                                    </select>
                                </td>
                            <?php } else {
                                ?>
                                <td id="td1"><select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual">                                    
                                        <option value = '1'>PENDIENTE</option>
                                        <option value = '2'>EN PROCESO</option>
                                        <option value = '3'>TERMINADO</option>    
                                        <?php
                                    }
                                    ?>                                        
                                </select>
                            </td>
                        </TR>

                        <TR>
                            <td class="especial" id="td1">
                                SELECCION EL TIPO DE PERFIL
                            </td>
                            <td id="td1"><?php echo $fila['VerificacionPerfil'] . " - " . $fila['perfil_otros'] ?><br></td>
                            <td id="td1">

                                <?PHP
                                $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='1'
                                AND NOT b.idTVerificacionPerfil in ('1', '2', '3', '4', '5', '7', '8', '10', '12')";
                                $resultado = $conexionmysql->query($queryM);
                                ?>
                                <?php if (is_null($fila['idTVerificacionPerfil'])) { ?>      
                                    <div>
                                        <select name="cbx_perfil" id="cbx_perfil" class="con_estilos" value="cbx_perfil"  required="">
                                            <option value="">----</option>
                                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php
                                } else {
                                    ?>

                                    <input type = "HIDDEN" name = "cbx_perfil" id="cbx_perfil" maxlength="20" value="<?php echo $fila['idTVerificacionPerfil'] ?>" readOnly>

                                    <?php
                                }
                                ?>

                            </td>
                        </TR>
                        
                        <tr> <td class="especial" id="td1">
                                GENERA BAJA DE REGISTRO
                            </td>
                            <td id="td1"><?php echo $fila['GeneraBaja'] ?><br></td>

                            <?php if (is_null($fila['GeneraBaja'])) { ?>                                 
                                <td id="td1"><select name = "idTGeneraBaja" id="idTGeneraBaja" onchange="habilitar22(this.value);">
                                        <option value="0">--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </td>
                                <?php
                            } else {
                                ?> <td>
                                    <input type = "HIDDEN" name = "idTGeneraBaja" id="idTGeneraBaja" maxlength="20" value="<?php echo $fila['idTGeneraBaja'] ?>" readOnly>

                                </td>
                                <?php
                            }
                            ?>

                        </tr>

                        <tr><td class="especial" id="td1" style="width:200px;">
                               TIPO DE TRABAJADOR
                            </td>
                            <td id="td1" style="width:200px;">
                                <?php echo $fila['TipoTrabajador_des'] ?><br></td>
                             <TD id="td1">
                            <?php if (is_null($fila['idTipoTrabajador'])) { ?>    
                               <select name = "ttrabajador" id="ttrabajador" required style="width:300px;" class="con_estilos">
                                <option value="">--</option>                                
                                <option value="1">RG - TRABAJADOR REGULAR</option>
                                <option value="119">TH - TRABAJADOR DEL HOGAR</option>
                                <option value="201">AD - AGRARIO DEPENDIENTE</option>
                                <option value="203">AI - AGRARIO INDEPENDIENTE</option>
                                <option value="805">PP - PESQUERO ARTESANAL</option>                                
                            </select></td>
                                <?php
                            } else {
                                ?>
                               <input type = "HIDDEN" name = "ttrabajador" id="ttrabajador" value="<?php echo $fila['idTipoTrabajador'] ?>" readOnly>
                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        
                        <tr><td class="especial" id="td1" style="width:200px;">
                               TIPO DE ATENCION
                            </td>
                            <td id="td1" style="width:200px;">
                                <?php echo $fila['TipoAtencion_des'] ?><br></td>
                             <TD id="td1">
                            <?php if (is_null($fila['idTipoAtencion'])) { ?>    
                               <select name = "TipoAtencion" id="TipoAtencion" required>
                                <option value="">--</option>                                
                                <option value="1">TITULAR</option>
                                <option value="2">DERECHO HABIENTE</option>                                
                            </select></td>
                                <?php
                            } else {
                                ?>
                               <input type = "HIDDEN" name = "TipoAtencion" id="TipoAtencion" value="<?php echo $fila['idTipoAtencion'] ?>" readOnly>
                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        
                        <tr><td class="especial" id="td1" style="width:200px;">
                               TIPO DE REGISTRO
                            </td>
                            <td id="td1" style="width:200px;">
                                <?php echo $fila['TipoRegistro_des'] ?><br></td>
                             <TD id="td1">
                            <?php if (is_null($fila['TipoRegistro'])) { ?>    
                               <select name = "cbx_tipoRegistro" id="cbx_tipoRegistro" required>
                               <option value = "">--</option>                                
                                <option value="1">ASEGURADO</option>
                                <option value="2">EMPLEADOR</option>                              
                            </select></td>
                                <?php
                            } else {
                                ?>
                               <input type = "HIDDEN" name = "cbx_tipoRegistro" id="cbx_tipoRegistro" value="<?php echo $fila['TipoRegistro'] ?>" readOnly>
                                
                                <?php
                            }
                            ?>
                        </tr>

                        <tr>
                           <td class="especial" id="td1">
                                NIT
                            </td>                            
                            <td id="td1"><?php echo $fila['nit'] ?><br></td>

                            <?php if (is_null($fila['nit'])) { ?>    
                                <td id="td1">        
                                    <input type = "text" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>" required>
                                </td>
                                <?php
                            } else {
                                ?> 
                                <td>    
                                    <input type = "HIDDEN" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>" readOnly>
                                </td>
                                <?php
                            }
                            ?>

                        </tr>

                        <tr>
                            <td class="especial" id="td1">
                                FECHA DE EMISION DE BAJA DE REGISTRO
                            </td>
                            <TD id="td1">
                                <?php echo $fila['femisionBRegistro'] ?><br></td>

                            <?php if (is_null($fila['femisionBRegistro'])) { ?>    
                                <td id="td1"><input type = "date" name = "femisionBRegistro" min="1900-01-01" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>" 
                                                    id="femisionBRegistro" value="<?php echo $fila['femisionBRegistro'] ?>" required><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "HIDDEN" name = "femisionBRegistro" min="1900-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                                    id="femisionBRegistro" value="<?php echo $fila['femisionBRegistro'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>


                        <tr>
                           <td class="especial" id="td1">
                                Nº RESOLUCION DE BAJA DE REGISTRO (0000)<br>AÑO<br>DESPACHO QUE EMITIO RESOLUCION
                            </td> 
                            <td id="td1"><?php echo $fila['nResBRegistro'] ?><br></td>
                            <?php if (is_null($fila['nResBRegistro'])) { ?>    
                                <td id="td1"> 
                                    <input type = "text" name = "nResBRegistro00" id="nResBRegistro00" minlength="4" maxlength="4" required autocomplete="off"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <br>

                                    <select required="" id ="unidad" name = "unidad" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                      
                                        <option value="1">OSPE</option>
                                        <option value="2">UCF</option>
                                        <option value="3">OAALMENARA</option>
                                        <option value="4">OAREBAGLIATI</option>
                                        <option value="5">OASABOGAL</option>
                                        <option value="6">OALAMBAYEQUE</option>
                                    </select>
                                    <input type="hidden" id="textoOAS" name="textoOAS" value="" readOnly="readOnly"/>


                                    <select name = "ano" id="ano" required>
                                        <option value=""></option>   
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>                                    
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    </select>


                                </td>
                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "HIDDEN" name = "nResBRegistro" id="nResBRegistro" 
                                           value="<?php echo $fila['nResBRegistro'] ?>" readOnly>                                                                  
                                </td>
                                <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td id="td1">Nº RESOLUCION DE BAJA DE REGISTRO GENERADA</td> 
                            <td id="td1"><?php echo $fila['nResBRegistro'] ?><br></td>
                            <?php if (is_null($fila['nResBRegistro'])) { ?>    

                                <td>        
                                    <input type = "hidden" name = "nResBRegistro" id="nResBRegistro"
                                           value="<?php echo $fila['nResBRegistro'] ?>">
                                </td>

                                </td>
                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "hidden" name = "nResBRegistro" id="nResBRegistro"
                                           value="<?php echo $fila['nResBRegistro'] ?>">                                                        
                                </td>
                                <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td id="td1">NOMBRE DEL PDF</td> 
                            <td id="td1" style="color:#0440FE ;font-size: 12px" ><b><?php echo $fila['nombrePDF'] ?></b><br></td></b>                            
                            <?php if (is_null($fila['nombrePDF'])) { ?>                                  
                                <td>        
                                    <input type = "hidden" name = "nombrePDF" id="nombrePDF"
                                           value="<?php echo $fila['nombrePDF'] ?>">
                                </td>

                                </td>
                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "hidden" name = "nombrePDF" id="nombrePDF"
                                           value="<?php echo $fila['nombrePDF'] ?>">                                                       
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <tr>
                            <td id="td1" style="color:#F80000 ;font-size: 12px">REPORTADO A SUNAT</td> 
                                                       
                            <?php if (is_null($fila['sunat'])) { ?>                                  
                                <td >        
                                    <b><?php echo "NO REPORTADO A SUNAT" ?></b><br></td></b>
                                </td>

                                </td>
                                <?php
                            } else {
                                if ($fila['sunat']=='1') {
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO A SUNAT" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                                    
                                } else {
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                                    }                            
                                }
                            ?>
                        </tr>


                        <tr>
                            <td class="especial" id="td1">
                                FECHA NOTIFICACION BAJA DE REGISTRO</td>
                            <td id="td1"><?php echo $fila['fnotificacionBRegistro'] ?><br></td>
                            <?php if (is_null($fila['fnotificacionBRegistro'])) { ?>    
                                <td id="td1">     

                                    <input type = "date" name = "fnotificacionBRegistro" id="fnotificacionBRegistro" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['fnotificacionBRegistro'] ?>">
                                </td>

                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "hidden" name = "fnotificacionBRegistro" id="fnotificacionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['fnotificacionBRegistro'] ?>">
                                           <?php
                                           $inicio = $fila['fnotificacionBRegistro'];
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
                            <td class="especial" id="td1">
                                FECHA DE CONSTANCIA DE ACTO FIRME
                            </td>
                            <td id="td1"><?php echo $fila['fconstanciaAcFirme'] ?><br></td>
                            <?php if (is_null($fila['fconstanciaAcFirme'])) { ?>    
                                <td id="td1">     

                                    <input type = "date" name = "fconstanciaAcFirme" id="fconstanciaAcFirme" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['fconstanciaAcFirme'] ?>">
                                </td>

                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "hidden" name = "fconstanciaAcFirme" id="fconstanciaAcFirme" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['fconstanciaAcFirme'] ?>">
                                 
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td class="especial" id="td1">
                                FECHA ACTO FIRME
                            </td>
                            <td id="td1"><?php echo $fila['factofirme'] ?><br></td>
                            <?php if (is_null($fila['factofirme'])) { ?>    
                                <td id="td1">     

                                    <input type = "date" name = "factofirme" id="fconstanciaAcFirme" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['factofirme'] ?>">
                                </td>

                                <?php
                            } else {
                                ?>
                                <td>        
                                    <input type = "hidden" name = "factofirme" id="fconstanciaAcFirme" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1900-01-01" value="<?php echo $fila['factofirme'] ?>">
                                 
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <tr> <td class="especial" id="td1">
                                ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
                            <td id="td1"><?php echo $fila['RRBRegistro'] ?><br></td>


                            <?php if (is_null($fila['idTRRBRegistro'])) { ?>    
                                <td id="td1"><select name = "idTRRBRegistro" id="idTRRBRegistro" onchange="habilitar3A(this.value);">
                                        <option value = "0"></option>
                                        <option value = "1">FIRME Y CONSENTIDA</option>
<!--                                    <option value = "11">RECONSIDERACION</option>
                                        <option value = "10">APELACION</option>-->
                                        
                                    </select>
                                </td>
                                <?php
                            } else {
                                ?> 
                                <td>
                                    <input type = "HIDDEN" name = "idTRRBRegistro" id="idTRRBRegistro" maxlength="20" value="<?php echo $fila['idTRRBRegistro'] ?>" readOnly>
                                </td>
                                <?php
                            }
                            ?>                         

                        </tr>
                                                
                        <!---------PERIODOS O NUEVAS VENTANAS--------------->
                        <tr>
                            <td colspan="3" id="td1">
                                <a href="#" id="abriPoppup1">PERIODOS A EVALUAR Y DE BAJA
                                </a>                                
                            </td>
                                <td>
                                
                            </td>

                        <div id="dialog1" title="ACTUALIZACION DE LOS PERIODOS A EVALUAR Y DE BAJA" class="contenido">
                            <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>
                        <?php
//                        
                        if ($genera_baja > 0) {
                            ?>


                            <?php if ($fila['idTGeneraBaja'] == '1') { ?> 
                        
                        <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup8">MODULO ESTADO DE LA RESOLUCION
                                        </a>
                                    </td>

                                <div id="dialog8" title="MODULO ESTADO DE LA RESOLUCION" class="contenido">
                                    <iframe src="formReconsideraciones.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>
                                
<!--                                <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup9">MODULO DE REGISTROS DE DOMICILIOS 
                                        </a>
                                    </td>

                                <div id="dialog9" title="MODULO DE REGISTROS DE DOMICILIOS " class="contenido">
                                    <iframe src="formDomiliosTitular.php?iddim_aseguradoindevido=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>-->
                        
                                <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup5">INGRESAR LOS DH DEL TITULAR A VERIFICAR
                                        </a>
                                    </td>

                                <div id="dialog5" title="LISTA DERECHOHABIENTES A VERIFICAR" class="contenido">
                                    <iframe src="formDHRegistrados.php?iddim_aseguradoindevido=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                                    <!--<iframe src="formDHRegistrados.php?dni=<?//php echo $fila['dni_t'] ?>" style="width: 100%; height: 90%"></iframe>-->
                                    <!--<iframe src="formEditarPDH.php?iddim_CPosterior=<?//php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>-->
                                </div>
                                </tr>

                                <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup2">CARTA A FINANZAS
                                        </a>
                                    </td>

                                <div id="dialog2" title="ACTUALIZACIÓN DE LOS PERIODOS Y CARTAS A FINANZAS" class="contenido">
                                    <iframe src="formEditarCFinanza.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>

                                <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup6">PERIODOS CONFORMES A FINANZAS
                                        </a>
                                    </td>

                                <div id="dialog6" title="ACTUALIZACION PERIODOS A ENVIAR FINANZAS" class="contenido">
                                    <iframe src="formEditarPeridoconformeC.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>
                                
                                
                                
                                <tr>
                            <td colspan="3" id="td1">
                                <a href="#" id="abriPoppup7">PUBLICACION
                                </a>
                            </td>

                        <div id="dialog7" title="INGRESAR PUBLICACION" class="contenido">
                            <iframe src="formPublicacionLista_CP.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>

                                <?php
                            }
                        } else {
                            
                        }
                        ?>

                        <tr>
                            <td id="td1">
                                OBSERVACIONES
                            </td>
                            <td id="td1"><?php echo $fila['observaciones'] ?><br></td>
                            <td id="td1"><textarea rows = "4" cols = "50" placeholder="Solo 200 caracteres" name = "observaciones" id="observaciones" maxlength="200"><?php echo $fila['observaciones'] ?></textarea><br>
                            </td>
                        </tr>


                        <tr align = "center">
                            <td colspan = "3" id="td2">
                                <input type = "hidden" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar" id="actualizar"></td> 
                            

                        </tr> 

                        <?php if ($fila['idTGeneraBaja'] == '2') { ?> 

                            <?php
                        } else {
                            ?>    
                            <?php
                            if ($fila['idDIM_OficinaII'] == $idOficinaUsuario) {
                                // $iddim_CPosterior = $_GET['iddim_CPosterior'];
                                //incluir el archivo de conexion
                                // include 'conexion_mysql.php';
                                //realizando una consulta usando la clausula select, cp.fcorreo, 

                                if ($genera_baja > 0) {
                                    ?>



                <?php
                $query5 = "SELECT t.ruta_pdf FROM dim_cposterior t where t.iddim_CPosterior='$iddim_CPosterior'";

                $result5 = $conexionmysql->query($query5);
                //recorriendo el conjunto de resultados con un bucle
                while ($fila5 = $result5->fetch_assoc()) {
                    if (is_null($fila5['ruta_pdf'])) {
                        ?>

                                            <tr>
                                                <td colspan="3" id="td1">                                               
                                                    <a href="#" id="abriPoppup4" style="font-size: 15px">SUBIR PDF *
                                                    </a>
                                                </td>

                                            <div id="dialog4" title="SUBIR PDF - CONTROL POSTERIOR" class="contenido">
                                                <iframe src="formSubirArchivo.php?iddim_CPosterior=<?php echo $iddim_CPosterior ?>" style="width: 100%; height: 100%"></iframe>
                                            </div>
                                            </tr>

                        <?php
                    }
                }
                ?>

                                    <tr align = "center">
                                        <td colspan = "3" id="td2">
                            <!--<input type= "submit" name = "actualizar" value = "Actualizar">-->                                            
                            <!--<button type= "submit" name = "actualizar" class="button button2">Actualizar</button>-->
                            <!--<button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" class="button button2">Actualizar</button>-->
                            
                            <button type="submit" name = "actualizar" onclick="ConfirmDemo()" class="button button2" value="Actualizar">Actualizar</button>
                            
                                        </td>
                                    </tr> 
                <?php
            } else {
                ?>
                                    <tr>
                                        <td colspan="3">
                                            <a href="#" id="abriPoppup3" style="font-size: 11px">POR FAVOR PRIMERO LLENE LOS PERIODOS A EVALUAR Y DE BAJA
                                            </a>
                                        </td>
                                    <div id="dialog3" title="SGVCA" class="conten ido">
                                        <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                    </div>
                                    </tr>   
                <?php
            }
        }
        ?>
                            <?php
                        }
                        ?>

                    </table>
                    <p> *Al Subir el PDF colocar el Nombre Generado Automaticamente</p>                    
                </form>
                <form  method="POST">
                    <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $fila['iddim_CPosterior'] ?>" readOnly="readOnly">  
                    <input type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input type="HIDDEN" name="oficina" size="50" value="<?php echo $oficina ?>" readOnly="readOnly">                       
                    <input type="HIDDEN" name="nomenclatura" size="50" value="<?php echo $nomenclatura ?>" readOnly="readOnly">
                    <input type="HIDDEN" name="direccion" size="50" value="<?php echo $direccion ?>" readOnly="readOnly"> 
                    <input type="HIDDEN" name="Distrito" size="50" value="<?php echo $Distrito ?>" readOnly="readOnly">
                    <input type="HIDDEN" name="nombreai" size="50" value="<?php echo $nombreai ?>" readOnly="readOnly">
                    <input type="HIDDEN" name="dni_t" size="50" value="<?php echo $dniait ?>" readOnly="readOnly"> 
                    <input type="HIDDEN" name="DIRECCION_t" size="50" value="<?php echo $direccionait ?>" readOnly="readOnly"> 
                    <input type="HIDDEN" name="DISTRITO_t" size="50" value="<?php echo $distritoait ?>" readOnly="readOnly"> 
                    <input type="HIDDEN" name="PROVINCIA_t" size="50" value="<?php echo $provinciaait ?>" readOnly="readOnly"> 
                    <input type="HIDDEN" name="nResBRegistro" size="50" value="<?php echo $fila['nResBRegistro'] ?>">
                    <?php if (isset($fila['nResBRegistro'])) { ?> 
                        <input type="submit" name="generar1" value="Generar Notificacion"class="btn btn-info"/>
                    <?php } ?>
                    <input type="hidden" name="generar1" value="Generar Notificacion"class="btn btn-info"/> 
                </form>             
             
                    <?php
                }
//liberando los recursos
                $result->free();
//cerrando los recursos
                $conexionmysql->close()
                ?>	
        </div>
        <?php
        if ($idDIM_OficinaII == $idOficinaUsuario) {
        ?>
        
        <?php
             $factual = date("Y-m-d");
            
            function diferenciaDias_2($inicio, $fin) {
            $inicio = strtotime($inicio);
            $fin = strtotime($fin);
            $dif = $fin - $inicio;
            $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
            return ceil($diasFalt);
            }
                                           
            $numero_dias = diferenciaDias_2($fCreacionTerminado_m, $factual);
        if($iidTEstadoActual==3)    {
            if($numero_dias>=21)
            {
                echo "FECHA DE CREACION TERMINADO ES: ",$fCreacionTerminado_m,'<BR>';
                echo "SE HA EXCEDIDO EL PLAZO PARA MODIFICAR FECHAS.";
            }
            else {
                echo "FECHA DE CREACION TERMINADO ES: ",$fCreacionTerminado_m,'<BR>';
                echo "TIENE 21 DIAS CALENDARIOS DESPUES DE LA FECHA CREACION TERMINADO<BR> PARA MODIFICAR EN CASO SEA NECESARIO";
                ?>
        
        <div>
            <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarPBaja.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminar" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Periodos a Evaluar y de Baja</button>
                                </form>
        </div>
         <div>
             <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarFinanzas.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminarF" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Carta a Finanza</button>
                                </form>
        </div>
        <?php
                               }    }
                               else {
                                    ?>
        <div>
            <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarPBaja.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminar" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Periodos a Evaluar y de Baja</button>
                                </form>
        </div>
         <div>
             <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarFinanzas.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminarF" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Carta a Finanza</button>
                                </form>
        </div>
             <?php                                   
                               }
            ?>
             <?php
        }
        ?>
            <?php
            if (isset($_POST['actualizar'])) {
                if ($_POST['idTEstadoActual'] == '3') {

                    require '../SISGASV/conexionesbd/conexion_mysql.php';

                    $iddimm = $_POST['iddim_usuario'];
                    $iddim_usuario = "'$iddimm'";

                    $iddim = $_POST['iddim_CPosterior'];
                    $iddim_CPosterior = "'$iddim'";

                    //$idTEstadoActualoo = $_POST['idTEstadoActual'];
                    //$idTEstadoActual = "'$idTEstadoActualoo'";

                    if (empty($_POST['ano'])) {
                        $ano = 'NULL';
                    } else {
                        $anooo = $_POST['ano'];
                        $ano = "$anooo";
                    }

                    if (empty($_POST['idTEstadoActual'])) {
                        $idTEstadoActual = 'NULL';
                    } else {
                        $idTEstadoActualoo = $_POST['idTEstadoActual'];
                        $idTEstadoActual = "'$idTEstadoActualoo'";
                    }

                    if (empty($_POST['idTGeneraBaja'])) {
                        $idTGeneraBRegistro = 'NULL';
                    } else {
                        $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
                        $idTGeneraBRegistro = "'$idTGeneraBRegistroo'";
                    }

                    if (empty($_POST['femisionBRegistro'])) {
                        $FEmisionBRegistro = 'NULL';
                    } else {
                        $FEmisionBRegistroo = $_POST['femisionBRegistro'];
                        $FEmisionBRegistro = "'$FEmisionBRegistroo'";
                    }

                    if (empty($_POST['idTRRBRegistro'])) {
                        $idTRRBRegistro = 'NULL';
                    } else {
                        $idTRRBRegistroo = $_POST['idTRRBRegistro'];
                        $idTRRBRegistro = "'$idTRRBRegistroo'";
                    }

                    if (empty($_POST['nit'])) {
                        $nit = 'NULL';
                    } else {
                        $nitt = $_POST['nit'];
                        $nit = "'$nitt'";
                    }


                    if (empty($_POST['fcarga'])) {
                        $datecorreo = 'NULL';
                    } else {
                        $datecorreoo = $_POST['fcarga'];
                        $datecorreo = "'$datecorreoo'";
                    }

                    if (empty($_POST['cbx_perfil'])) {
                        $idTVerificacionPerfil = 'NULL';
                    } else {
                        $idTVerificacionPerfill = $_POST['cbx_perfil'];
                        $idTVerificacionPerfil = "'$idTVerificacionPerfill'";
                    }

                    if (empty($_POST['ttrabajador'])) {
                $ttrabajador = 'NULL';
            } else {
                $ttrabajadorR = $_POST['ttrabajador'];
                $ttrabajador = "$ttrabajadorR";
            } 

                    if (empty($_POST['TipoAtencion'])) {
               $idTipoAtencion = 'NULL';
            } else {
                $idTipoAtencionN = $_POST['TipoAtencion'];
                $idTipoAtencion = "$idTipoAtencionN";
            } 
            
                    if (empty($_POST['cbx_tipoRegistro'])) {
               $tipoRegistro = 'NULL';
            } else {
                $tipoRegistroo = $_POST['cbx_tipoRegistro'];
                $tipoRegistro = "$tipoRegistroo";
            } 

                    if (empty($_POST['nResBRegistro00'])) {
                        $numResolucionRegistro00 = 'NULL';
                    } else {
                        $numResolucionRegistro0000 = $_POST['nResBRegistro00'];
                        $numResolucionRegistro00 = "$numResolucionRegistro0000";
                    }

                    if (empty($_POST['fnotificacionBRegistro'])) {
                        $FNotificacionPAsegurado = 'NULL';
                    } else {
                        $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
                        $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
                    }                                       
                    
                    if (empty($_POST['factofirme'])) {
                        $factofirme = 'NULL';
                    } else {
                        $factofirmee = $_POST['factofirme'];
                        $factofirme = "'$factofirmee'";
                    }
                    
                    if (empty($_POST['fconstanciaAcFirme'])) {
                        $fconstanciaAcFirme = 'NULL';
                    } else {
                        $fconstanciaAcFirmee = $_POST['fconstanciaAcFirme'];
                        $fconstanciaAcFirme = "'$fconstanciaAcFirmee'";
                    }

                    if (empty($_POST['observaciones'])) {
                        $obsOSPE = 'NULL';
                    } else {
                        $obsOSPEo = $_POST['observaciones'];
                        $obsOSPE = "'$obsOSPEo'";
                    }

                    if (empty($_POST['textoOAS'])) {
                        $textoOAS = 'NULL';
                    } else {
                        $textoOASS = $_POST['textoOAS'];
                        $textoOAS = "$textoOASS";
                    }
                    /*
                      $nnnResBRegistro = $numm . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                      $numpdf = $numm . $dni_1 . $eempleadora . $cod_oficinaIni;
                     */

                    date_default_timezone_set('America/Bogota');
                    $fecha_hora_updateo = date('Y-m-d G:i:s');
                    $fecha_hora_update = "'$fecha_hora_updateo'";

                    $queryM = "SELECT a.fCreacionTerminado FROM dim_cposterior a WHERE a.iddim_CPosterior=$iddim_CPosterior";
                    $resultado = $conexionmysql->query($queryM);
                    while ($filaBuscar = $resultado->fetch_assoc()) {

                        if (is_null($filaBuscar['fCreacionTerminado'])) {

                            $queryMR = "SELECT a.nResBRegistro FROM dim_cposterior a WHERE a.iddim_CPosterior=$iddim_CPosterior";

                            $resultado1 = $conexionmysql->query($queryMR);
                            while ($filaBuscar2 = $resultado1->fetch_assoc()) {

                                if (empty($_POST['nResBRegistro00'])) {

                                    $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fCreacionTerminado=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                    
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                    
                                } else {
                                    if ($_POST['unidad'] == '1') {
                                        //$nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $cod_oficinaIni;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fCreacionTerminado=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                        
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                        
                                    } else if ($_POST['unidad'] == '2') {
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fCreacionTerminado=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                                                                
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                        
                                    } else {
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $textoOAS . "-EXSGSA-GAAA-CGSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fCreacionTerminado=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                        
                                        
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                    }
                                }
                            }

                            if ($conexionmysql->query($query)) {     
                                if ($conexionmysql->query($query1)) {
                                echo 'Se Actualizo Correctamente.';
                            } else {
                                echo 'Error al Actualizar registro<br>';
                            }}
                        } else {
                            //resolviendo una consulta con la clausula insert, fcorreo=$fcorreo,

                            $queryMR = "SELECT a.nResBRegistro FROM dim_cposterior a WHERE a.iddim_CPosterior=$iddim_CPosterior";

                            $resultado1 = $conexionmysql->query($queryMR);
                            while ($filaBuscar2 = $resultado1->fetch_assoc()) {

                                if (empty($_POST['nResBRegistro00'])) {

                                    $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                    
                                    
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                } else {

                                    if ($_POST['unidad'] == '1') {
                                        
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $cod_oficinaIni;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro,
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                        
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                        
                                    } else if ($_POST['unidad'] == '2') {
                                        
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                        
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                        
                                    } else {
                                        $nnnResBRegistro = $numResolucionRegistro00 . "-" . $textoOAS . "-EXSGSA-GAAA-CGSPE-ESSALUD" . "-" . $ano;
                                        $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;

                                        $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
            idTGeneraBaja=$idTGeneraBRegistro, 
            idTRRBRegistro=$idTRRBRegistro,
            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
            femisionBRegistro=$FEmisionBRegistro, 
            nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
            fconstanciaAcFirme=$fconstanciaAcFirme,
            factofirme=$factofirme,
            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
            idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
            WHERE iddim_CPosterior=$iddim_CPosterior";
                                        
                                $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                        
                                    }
                                }
                            }
                            if ($conexionmysql->query($query)) {
                                if ($conexionmysql->query($query1)) {
                                echo 'Se Actualizo Correctamente.';
                                echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                            } else {
                                echo 'Error al Actualizar registro<br>';      
                            }
                        }                        
                            }
                    }
                } else {
                    require '../SISGASV/conexionesbd/conexion_mysql.php';

                    $iddim = $_POST['iddim_usuario'];
                    $iddim_usuario = "'$iddim'";

                    $iddim = $_POST['iddim_CPosterior'];
                    $iddim_CPosterior = "'$iddim'";

                    if (empty($_POST['ano'])) {
                        $ano = 'NULL';
                    } else {
                        $anooo = $_POST['ano'];
                        $ano = "$anooo";
                    }

                    if (empty($_POST['idTEstadoActual'])) {
                        $idTEstadoActual = 'NULL';
                    } else {
                        $idTEstadoActualoo = $_POST['idTEstadoActual'];
                        $idTEstadoActual = "'$idTEstadoActualoo'";
                    }

                    if (empty($_POST['idTGeneraBaja'])) {
                        $idTGeneraBRegistro = 'NULL';
                    } else {
                        $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
                        $idTGeneraBRegistro = "'$idTGeneraBRegistroo'";
                    }
                    
                    if (empty($_POST['ttrabajador'])) {
                $ttrabajador = 'NULL';
            } else {
                $ttrabajadorR = $_POST['ttrabajador'];
                $ttrabajador = "$ttrabajadorR";
            } 

             if (empty($_POST['TipoAtencion'])) {
               $idTipoAtencion = 'NULL';
            } else {
                $idTipoAtencionN = $_POST['TipoAtencion'];
                $idTipoAtencion = "$idTipoAtencionN";
            } 
            
            if (empty($_POST['cbx_tipoRegistro'])) {
               $tipoRegistro = 'NULL';
            } else {
                $tipoRegistroo = $_POST['cbx_tipoRegistro'];
                $tipoRegistro = "$tipoRegistroo";
            } 

                    if (empty($_POST['femisionBRegistro'])) {
                        $FEmisionBRegistro = 'NULL';
                    } else {
                        $FEmisionBRegistroo = $_POST['femisionBRegistro'];
                        $FEmisionBRegistro = "'$FEmisionBRegistroo'";
                    }

                    if (empty($_POST['idTRRBRegistro'])) {
                        $idTRRBRegistro = 'NULL';
                    } else {
                        $idTRRBRegistroo = $_POST['idTRRBRegistro'];
                        $idTRRBRegistro = "'$idTRRBRegistroo'";
                    }

                    if (empty($_POST['nit'])) {
                        $nit = 'NULL';
                    } else {
                        $nitt = $_POST['nit'];
                        $nit = "'$nitt'";
                    }

                    if (empty($_POST['fcarga'])) {
                        $datecorreo = 'NULL';
                    } else {
                        $datecorreoo = $_POST['fcarga'];
                        $datecorreo = "'$datecorreoo'";
                    }

                    if (empty($_POST['cbx_perfil'])) {
                        $idTVerificacionPerfil = 'NULL';
                    } else {
                        $idTVerificacionPerfill = $_POST['cbx_perfil'];
                        $idTVerificacionPerfil = "'$idTVerificacionPerfill'";
                    }

                    if (empty($_POST['fnotificacionBRegistro'])) {
                        $FNotificacionPAsegurado = 'NULL';
                    } else {
                        $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
                        $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
                    }

                    if (empty($_POST['fecartafinanza'])) {
                        $FEnvioCFinanzasBRegistro = 'NULL';
                    } else {
                        $FEnvioCFinanzasBRegistroo = $_POST['fecartafinanza'];
                        $FEnvioCFinanzasBRegistro = "'$FEnvioCFinanzasBRegistroo'";
                    }

                    if (empty($_POST['ncartafinanza'])) {
                        $numCartaFinanzasBRegistro = 'NULL';
                    } else {
                        $numCartaFinanzasBRegistroo = $_POST['ncartafinanza'];
                        $numCartaFinanzasBRegistro = "'$numCartaFinanzasBRegistroo'";
                    }

                    if (empty($_POST['freporteresolutor'])) {
                        $freporteresolutor = 'NULL';
                    } else {
                        $freporteresolutorr = $_POST['freporteresolutor'];
                        $freporteresolutor = "'$freporteresolutorr'";
                    }

                    if (empty($_POST['fechaenvioOSPE'])) {
                        $fechaenvioOSPE = 'NULL';
                    } else {
                        $fechaenvioOSPEE = $_POST['fechaenvioOSPE'];
                        $fechaenvioOSPE = "'$fechaenvioOSPEE'";
                    }

                    if (empty($_POST['correo'])) {
                        $correo = 'NULL';
                    } else {
                        $correoo = $_POST['correo'];
                        $correo = "'$correoo'";
                    }

                    if (empty($_POST['operativo'])) {
                        $operativo = 'NULL';
                    } else {
                        $operativoo = $_POST['operativo'];
                        $operativo = "'$operativoo'";
                    }

                    if (empty($_POST['observaciones'])) {
                        $obsOSPE = 'NULL';
                    } else {
                        $obsOSPEo = $_POST['observaciones'];
                        $obsOSPE = "'$obsOSPEo'";
                    }

                    if (empty($_POST['textoOAS'])) {
                        $textoOAS = 'NULL';
                    } else {
                        $textoOASS = $_POST['textoOAS'];
                        $textoOAS = "$textoOASS";
                    }
                     if (empty($_POST['fconstanciaAcFirme'])) {
                        $fconstanciaAcFirme = 'NULL';
                    } else {
                        $fconstanciaAcFirmee = $_POST['fconstanciaAcFirme'];
                        $fconstanciaAcFirme = "'$fconstanciaAcFirmee'";
                    }
                    
                    if (empty($_POST['factofirme'])) {
                        $factofirme = 'NULL';
                    } else {
                        $factofirmee = $_POST['factofirme'];
                        $factofirme = "'$factofirmee'";
                    }

                    if (empty($_POST['nResBRegistro00'])) {
                        $numResolucionRegistro00 = 'NULL';
                    } else {
                        $numResolucionRegistro0000 = $_POST['nResBRegistro00'];
                        $numResolucionRegistro00 = "$numResolucionRegistro0000";
                    }

                    date_default_timezone_set('America/Bogota');
                    $fecha_hora_updateo = date('Y-m-d G:i:s');
                    $fecha_hora_update = "'$fecha_hora_updateo'";

                    $queryMR = "SELECT a.nResBRegistro FROM dim_cposterior a WHERE a.iddim_CPosterior=$iddim_CPosterior";

                    $resultado1 = $conexionmysql->query($queryMR);
                    while ($filaBuscar2 = $resultado1->fetch_assoc()) {

                        if (empty($_POST['nResBRegistro00'])) {
                            $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
                            idTGeneraBaja=$idTGeneraBRegistro, 
                            idTRRBRegistro=$idTRRBRegistro,
                            nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
                            femisionBRegistro=$FEmisionBRegistro,             
                            fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
                            fconstanciaAcFirme=$fconstanciaAcFirme,
                            factofirme=$factofirme,
                            idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
                            WHERE iddim_CPosterior=$iddim_CPosterior";
                            
                             $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                        } else {

                            if ($_POST['unidad'] == '1') {
                                //$nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;                        
                                $nnnResBRegistro = $numResolucionRegistro00 . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $cod_oficinaIni;
                                $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
                                idTGeneraBaja=$idTGeneraBRegistro, 
                                idTRRBRegistro=$idTRRBRegistro,
                                nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
                                femisionBRegistro=$FEmisionBRegistro, 
                                nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
                                fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
                                fconstanciaAcFirme=$fconstanciaAcFirme,
                                factofirme=$factofirme,
                                idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
                                WHERE iddim_CPosterior=$iddim_CPosterior";
                                
                                 $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                 
                            } else if ($_POST['unidad'] == '2') {
                                //$nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;                        
                                $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;                                
                                $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
                                idTGeneraBaja=$idTGeneraBRegistro, 
                                idTRRBRegistro=$idTRRBRegistro,
                                nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
                                femisionBRegistro=$FEmisionBRegistro, 
                                nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
                                fconstanciaAcFirme=$fconstanciaAcFirme,
                                factofirme=$factofirme,
                                fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
                                idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
                                WHERE iddim_CPosterior=$iddim_CPosterior";
                                
                                 $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                                 
                            } else {
                                $nnnResBRegistro = $numResolucionRegistro00 . "-" . $textoOAS . "-EXSGSA-GAAA-CGSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_t . $ruc . $codOficina;
                                $query = "UPDATE dim_cposterior SET idTEstadoActual=$idTEstadoActual, 
                                idTGeneraBaja=$idTGeneraBRegistro, 
                                idTRRBRegistro=$idTRRBRegistro,
                                nit=$nit, idTVerificacionPerfil=$idTVerificacionPerfil,
                                femisionBRegistro=$FEmisionBRegistro, 
                                nResBRegistro='$nnnResBRegistro', nombrePDF='$numpdf',
                                fconstanciaAcFirme=$fconstanciaAcFirme,
                                factofirme=$factofirme,
                                fnotificacionBRegistro=$FNotificacionPAsegurado, observaciones=$obsOSPE,
                                idtusuario_s=$iddim_usuario, fActualizacion=$fecha_hora_update
                                WHERE iddim_CPosterior=$iddim_CPosterior";
                                
                                 $query1="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_CPosterior";
                            }
                        }
                    }

                    if ($conexionmysql->query($query)) {
                        if ($conexionmysql->query($query1)) {

                        echo 'Se Actualizo Correctamente.';    
                        echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                    } else {
                        echo 'Error al Actualizar registro<br>';                        
                    }
                    }
                }
            }
            ?>

        <!--PARA GENERAR EL WORD DE NOTIFICACION-->
        <div> 
        <?php
        require_once dirname(__FILE__) . '/PHPWord-master/src/PhpWord/Autoloader.php';
        \PhpOffice\PhpWord\Autoloader::register();

        use PhpOffice\PhpWord\TemplateProcessor;


        if (isset($_POST['generar1'])) {
            include ('./conexionesbd/conexion_mysql.php');
            $templateWord = new TemplateProcessor('../SISGASV/doc/1 PARA NOTIFICAR ACTOS ADMINISTRATIVOS.docx');

            $nomenclatura = $_POST['nomenclatura'];
            $oficina = $_POST['oficina'];
            $direccion = $_POST['direccion'];
            $Distrito = $_POST['Distrito'];
            $nResBRegistro = $_POST['nResBRegistro']; //1
            $nombreai = $_POST['nombreai']; //1
            $dniait = $_POST['dni_t']; //1
            $direccionait = $_POST['DIRECCION_t']; //1
            $distritoait = $_POST['DISTRITO_t']; //1
            $provinciaait = $_POST['PROVINCIA_t']; //1

            $templateWord->setValue('nomenclatura', $nomenclatura);
            $templateWord->setValue('oficina', $oficina);
            $templateWord->setValue('direccion', $direccion);
            $templateWord->setValue('Distrito', $Distrito);
            $templateWord->setValue('nResBRegistro', $nResBRegistro);
            $templateWord->setValue('nombreai', $nombreai);
            $templateWord->setValue('dni_t', $dniait);
            $templateWord->setValue('DIRECCION_t', $direccionait);
            $templateWord->setValue('DISTRITO_t', $distritoait);
            $templateWord->setValue('PROVINCIA_t', $provinciaait);
            $templateWord->saveAs('Documento1.docx');
            echo '<a href="../SISGASV/Documento1.docx">DESCARGAR ARCHIVO WORD</a><br><br>';
            //}
        }        
        
        ?>

        </div>

    </body>
</html>