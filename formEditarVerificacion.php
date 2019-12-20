<?php
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura, o.oficina,o.direccion,o.Distrito
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Verificacion = $_GET['iddim_Verificacion'];

$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        where cp.iddim_Verificacion='$iddim_Verificacion'";
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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
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
            #cbx_perfil {
                font-size: 8px;
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
                font-size: 10px;
                font-weight:normal;                
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color: #47a447;
            }

            #tho
            {
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

            #th4
            {
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-weight:normal;               
                padding:5px 0px;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;

                background-color: #000;
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
                $("#dialog1").hide();
                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        width: 890,
                        height: 500,
                        modal: true
                    });
                }
                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });


                $("#dialog2").hide();
                function abrir2() { //formEditarCFinanza
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                       width: 580,
                        height: 690,
                        modal: true
                    });
                }
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });

                $("#dialog3").hide();
                function abrir3() { //formAgregarAIAdicionales
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                        height: 430,
                        width: 890,
                        modal: true
                    });
                }
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });

                $("#dialog4").hide();
                function abrir4() { //formSubirArchivo_V
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                        height: 300,
                        width: 650,
                        modal: true
                    });
                }
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });

                $("#dialog5").hide(); //formDHRegistrados
                function abrir5() {
                    $("#dialog5").show();
                    $("#dialog5").dialog({
                        resizable: false,
                        height: 530,
                        width: 860,
                        modal: true
                    });
                }
                $("#abriPoppup5").click(
                        function () {
                            abrir5();
                        });

                $("#dialog6").hide();
                function abrir6() { //formEditarPeridoconforme
                    $("#dialog6").show();
                    $("#dialog6").dialog({
                        resizable: false,
                        width: 800,
                        height: 400,
                        modal: true
                    });
                }
                $("#abriPoppup6").click(
                        function () {
                            abrir6();
                        });

                $("#dialog7").hide(); //formResBOficio
                function abrir7() {
                    $("#dialog7").show();
                    $("#dialog7").dialog({
                        resizable: false,
                        width: 800,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup7").click(
                        function () {
                            abrir7();
                        });


                $("#dialog8").hide();
                function abrir8() { //formResBInhabilitacion
                    $("#dialog8").show();
                    $("#dialog8").dialog({
                        resizable: false,
                        width: 800,
                        height: 640,
                        modal: true
                    });
                }
                $("#abriPoppup8").click(
                        function () {
                            abrir8();
                        });

                $("#dialog9").hide();
                function abrir9() { //formMulta
                    $("#dialog9").show();
                    $("#dialog9").dialog({
                        resizable: false,
                        width: 1100,
                        height: 640,
                        modal: true
                    });
                }
                $("#abriPoppup9").click(
                        function () {
                            abrir9();
                        });

                $("#dialog10").hide(); //formEditarPCalificar
                function abrir10() {
                    $("#dialog10").show();
                    $("#dialog10").dialog({
                        resizable: false,
                        width: 890,
                        height: 500,
                        modal: true
                    });
                }
                $("#abriPoppup10").click(
                        function () {
                            abrir10();
                        });

                $("#dialog11").hide();
                function abrir11() {    //formDerivacionCaso
                    $("#dialog11").show();
                    $("#dialog11").dialog({
                        resizable: false,
                        width: 730,
                        height: 530,
                        modal: true
                    });
                }
                $("#abriPoppup11").click(
                        function () {
                            abrir11();
                        });
                        
               $("#dialog12").hide();
                function abrir12() {    //formDerivacionCaso
                    $("#dialog12").show();
                    $("#dialog12").dialog({
                        resizable: false,
                        width: 830,
                        height: 530,
                        modal: true
                    });
                }
                $("#abriPoppup12").click(
                        function () {
                            abrir12();
                        });
                        
                $("#dialog13").hide();
                function abrir13() {    //formCARTAAMPLIATORIA
                    $("#dialog13").show();
                    $("#dialog13").dialog({
                        resizable: false,
                        width: 830,
                        height: 530,
                        modal: true
                    });
                }                
                $("#abriPoppup13").click(
                        function () {
                            abrir13();
                        });
                         
                         
                 $("#dialog14").hide();                      
                function abrir14() {    //formCARTAAMPLIATORIA
                    $("#dialog14").show();
                    $("#dialog14").dialog({
                        resizable: false,
                        width: 500,
                        height: 200,
                        modal: true
                    });
                }
                $("#abriPoppup14").click(
                        function () {
                            abrir14();
                        });
                        
                        $("#dialog15").hide();                      
                function abrir15() {    //reconsideradciones
                    $("#dialog15").show();
                    $("#dialog15").dialog({
                        resizable: false,
                        height: 530,
                        width: 860,
                        modal: true
                    });
                }
                $("#abriPoppup15").click(
                        function () {
                            abrir15();
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
                    document.getElementById("nResBRegistro").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    document.getElementById("siesno3").style.display="block";

                } else if (value ==='4') {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;
                    document.getElementById("femisionBRegistro").required = false;
                    document.getElementById("nResBRegistro").required = false;
                    document.getElementById("siesno3").style.display="block";
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
                    document.getElementById("idTRRBRegistro").value = "";
                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTEstadoActual").value = "3";
                    document.getElementById("actualizar").type = "submit";

                }
            }
        </script>

        <script>
            function habilitar3A(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("nit").required = true;
                    document.getElementById("nResBRegistro00").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    document.getElementById("dialog44").readonly = true;
                }
            }

        </script>  
        <script>
            function dias_transcurridos($fecha_i, $fecha_f)
            {
                $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
                $dias = abs($dias);
                $dias = floor($dias);
                return $dias;
            }
            function diferenciaDias($inicio, $fin)
            {
                $inicio = strtotime($inicio);
                $fin = strtotime($fin);
                $dif = $fin - $inicio;
                $diasFalt = ((($dif / 60) / 60) / 24);
                return ceil($diasFalt);
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
            
            #destino {
  width:400px;
  height:100px;
  border:1px solid #ccc;
}
        </style>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 390,top = 50');
            }
        </script>

        <script type="text/javascript">
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Se ha copiado el texto: " + copyText.value);
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

    </head>
    <body>  

        <?PHP
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
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
        ?>        
        <div>                                   
            <!--Incrustar php-->
            <?php
            //$iddim_Verificacion = $_GET['iddim_Verificacion'];
//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query = "SELECT ai.idDIM_Oficina as idDIM_OficinaII, ai.dni_t, ai.RUC,
ai.TipoRegistro,
case 
when ai.TipoRegistro='1' then 'ASEGURADO'
when ai.TipoRegistro='2' then 'EMPLEADOR'                
end as TipoRegistro_des,   
ai.idTipoTrabajador,                
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
                        cp.iddim_Verificacion, 
                        'VERIFICACION' Verificacion,
                        cp.origenverif,          
                        tp.VerificacionPerfil origenverificacion,
                        cp.idTVerificacionPerfil,
                        tpf.VerificacionPerfil,                       
                        cp.iddim_aseguradoindevido, 
                        tea.idTEstadoActual,
                        tea.EstadoActual, 
                        dr.sunat,
                        trr.idTRRBRegistro,
                        trr.RRBRegistro, 
                        ov.ordenV,
                        ov.iddim_Overificacion,
                        ov.numero,
                        ov.fechaEmision,
                        ov.fechanotificacionOV,
                        ov.fechanotificacionOVE,
                        dr.numResBOficio,
                        dr.fechaEmiBOficio,
                        cp.fechaDevInfFinalJOSPE,
                        cp.an_verifi,
                        cp.num_verifi,
                        cp.codigocaso,
                        cp.fechaEIFinalJOSPE,                        
                        da.iddim_Verificadores1,
                        doo.apellidonombre,
                        da.iddim_Verificadores2,
                        doooo.apellidonombre apellidonombre2,
                        da.fultimaActaVe,                        
                        cp.an_verifi,
                        cp.num_verifi,
                        cp.nit,                        
                        cp.fechaRDerivado,
                        cp.fechaDDerivado,
                        cp.casoDerivado,
                        cp.fechateinfoFinalVe,
                        cp.Observaciones,
                        dooo.oficina as ofifi,
                        cp.fCreacionTerminado
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacionperfil tp on tp.idTVerificacion='2' and cp.origenverif=tp.idTVerificacionPerfil
                        left join tipoverificacionperfil tpf on cp.idTVerificacion=tpf.idTVerificacion and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                        left join dim_overificacion ov on  cp.iddim_Verificacion=ov.iddim_Overificacion
                        left join dim_resboficio dr on  ov.iddim_Overificacion=dr.iddim_Overificacion
                        left join tiporrbregistro trr on dr.idTRRBRegistro=trr.idTRRBRegistro
                        left join dim_actaverificacion da on cp.iddim_Verificacion=da.iddim_ActaVerificacion
                        left join dim_oficina doo on da.iddim_Verificadores1=doo.idDIM_Oficina
                        left join dim_oficina doooo on da.iddim_Verificadores2=doooo.idDIM_Oficina
                        left join tipoOspe dooo on cp.casoDerivado=dooo.codOficina
                        where cp.iddim_Verificacion='$iddim_Verificacion' and cp.idTVerificacion='2'";

//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle

            while ($fila = $result->fetch_assoc()) {
                $fCreacionTerminado_m = $fila['fCreacionTerminado'];                
                ?>

                <form name="form" method="POST" >
                    <table id="t1" border="1" summary="Rellena Formulario">
                        <tr>
                            <th style="height: 30px" id="tho" scope="row" class="tho" colspan="4">
                                ACTUALIZACION DE LA INFORMACION DE VERIFICACION
                            </th>
                        </tr> 
                        <tr> <td id="td1">
                                DESCRIPCION
                            </td>
                            <td id="td1"style="width:200px;">
                                DATOS ANTERIORES
                            </td>
                            <td id="td1"style="width:200px;">
                                NUEVOS INGRESOS
                            </td>                                    
                        </tr>
                        <?php
                        $hoy = getdate();
                        $dni_t = $fila['dni_t'];
                        $ruc = $fila['RUC'];
                        $iddim_CP = $fila['iddim_aseguradoindevido'];
                        $idDIM_OficinaII=$fila['idDIM_OficinaII'];
                        $iidTEstadoActual=$fila['idTEstadoActual'];
                        ?> 
                        <input type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $fila['iddim_Verificacion'] ?>" readOnly="readOnly">  
                        <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                        <TR>

                            <td id="td1" class="especial">
                                ESTADO ACTUAL
                            </td>
                            <td id="td1"><?php echo $fila['EstadoActual'] ?>
                            </td>

                            <?php if ($fila['idTEstadoActual'] == '3') { ?> 
                                <td><input type="HIDDEN" name="idTEstadoActual" size="50" value="3" readOnly="readOnly">  
                                    <select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual" disabled>                                    
                                        <option value = '2'>EN PROCESO</option>
                                        <option value = '3' selected>TERMINADO</option>
                                        <option value = '4'>ARCHIVO</option>
                                    </select>
                                </td>
                            <?php } else
                            if ($fila['idTEstadoActual'] == '4') { ?> 
                                <td><input type="HIDDEN" name="idTEstadoActual" size="50" value="4" readOnly="readOnly">  
                                    <select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual" disabled>                                    
                                        <option value = '2'>EN PROCESO</option>
                                        <option value = '3'>TERMINADO</option>
                                        <option value = '4' selected>ARCHIVO</option>
                                    </select>
                                       
                            <a href="#" id="abriPoppup14" class="btn btn-danger" title="Ingresar Fecha Archivo" ><span class="glyphicon glyphicon-search" title="Ingresar Fecha Archivo"></span></a>
                            <div id="dialog14" title="ENVIAR ARCHIVO" class="contenido">
                                <iframe src="formArchivo.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                            </div>
                                </td>
                            <?php } else {
                                ?>
                                <td id="td1">                                    
                                    <select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual">                                    
                                        <option value = '2'>EN PROCESO</option>
                                        <option value = '3'>TERMINADO</option>
                                        <option value = '4'>ARCHIVO</option> 
                                        <?php
                                    }
                                    ?>                                        
                                </select>

                            </td>
                        </tr>
                            
                        
<!--                        <tr  id="siesno3" style="display: none">
                            <td>  
                                <div class="form-group" style="width: 200px">
                                    <label for="last-name">FECHA: PERIODO INICIO CALIFICADO</label>
                                    <input type="date" class="form-control date" name = "finicali" min="1998-01-01" id="finicali" required></input>
                                </div>   
                            </td>
                            <td>
                                <div class="form-group" style="width: 200px">
                                    <label for="last-name">FECHA: PERIODO FIN CALIFICADO</label>
                                    <input type="date" class="form-control date" name = "ffincali" min="1998-01-01" id="ffincali" required></input>
                                </div>     
                            </td>                          
                        </tr>-->
                        
                             <!--<table id="archivofecha" style="display: none">-->                              
 
                            <!--</table>--> 
                        <TR>
                            <td class="especial" id="td1" style="width:200px;">
                                SELECCION EL ORIGEN DE LA VERIFICACION
                            </td>
                            <td id="td1"><?php echo $fila['origenverificacion'] ?><br></td>
                            <td id="td1">
                                <?PHP
                                $queryO = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='2'
                                AND b.idTVerificacionPerfil in ('21', '22', '23', '24','47')";
                                $resultado = $conexionmysql->query($queryO);
                                ?>
                                <?php if (is_null($fila['origenverificacion'])) { ?>      
                                    <div>
                                        <select name="cbx_origen_perfil" id="cbx_origen_perfil" style="width:300px;" class="con_estilos" value="cbx_origen_perfil"  required="">
                                            <option value="">----</option>
                                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <input type = "HIDDEN" name = "cbx_origen_perfil" id="cbx_origen_perfil" maxlength="20" value="<?php echo $fila['origenverif'] ?>" readOnly>
                                    <?php
                                }
                                ?>
                            </td>
                        </TR>
                        
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
                        
                        <TR>
                            <td class="especial" id="td1" style="width:200px;">
                                SELECCION EL TIPO DE PERFIL
                            </td>
                            <td id="td1" style="width:200px;"><?php echo $fila['VerificacionPerfil'] ?><br></td>
                            <td id="td1">
                                <?PHP
                                $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='2'
                                AND NOT b.idTVerificacionPerfil in ('21', '22', '23', '24')";
                                $resultado = $conexionmysql->query($queryM);
                                ?>
                                <?php if (is_null($fila['idTVerificacionPerfil'])) { ?>      
                                    <div>
                                        <select name="cbx_perfil" id="cbx_perfil" style="width:300px;" class="con_estilos" value="cbx_perfil"  required="">
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
                        
                        <tr>
                            <td class="especial" id="td1" style="width:200px;">
                                VERIFICADOR QUE INICIA
                            </td>
                            <TD id="td1"><?php echo $fila['apellidonombre']?><br></td>
                            <td id="td1">
                  
                            <?php if (is_null($fila['iddim_Verificadores1'])) { ?>  
                                       <?PHP
                        $queryN = "SELECT dv.idDIM_Oficina, dv.apellidonombre FROM dim_oficina dv where dv.codOficina ='$codOficina' and not dv.idtperfiles='3'";
                        $resultadoN = $conexionmysql->query($queryN);
                        ?> 
                                    <div>      
                                <select name="cbx_verificador" id="cbx_verificador" style="width: 250px;font-size: 10px;" class="con_estilos" required>
                                    <option value="">----</option>
                            <?php while ($row = $resultadoN->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idDIM_Oficina']; ?>"><?php echo $row['apellidonombre']; ?></option>                                            
                            <?php } ?>
                                </select>  
                                    </div>
                            
                          <?php   } else {
                                ?>                           
                                <input type = "hidden" name ="cbx_verificador" id="cbx_verificador" maxlength="20" value="<?php echo $fila['iddim_Verificadores1'] ?>" readOnly><br>
                                <?php
                            }
                            ?>                                
                            </td>
                        </tr>   
                        
                        <tr>
                            <td class="especial" id="td1" style="width:200px;">
                                VERIFICADOR QUE FINALIZA
                            </td>
                            <TD id="td1"><?php echo $fila['apellidonombre2']?><br></td>
                            <td id="td1">
                  
                            <?php if (is_null($fila['iddim_Verificadores2'])) { ?>  
                                       <?PHP
                        $queryN = "SELECT dv.idDIM_Oficina, dv.apellidonombre FROM dim_oficina dv where dv.codOficina ='$codOficina' and not dv.idtperfiles='3'";
                        $resultadoN = $conexionmysql->query($queryN);
                        ?> 
                                    <div>      
                                <select name="cbx_verificador2" id="cbx_verificador2" style="width: 250px;font-size: 10px;" class="con_estilos" required>
                                    <option value="">----</option>
                            <?php while ($row = $resultadoN->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idDIM_Oficina']; ?>"><?php echo $row['apellidonombre']; ?></option>                                            
                            <?php } ?>
                                </select>  
                                    </div>
                            
                          <?php   } else {
                                ?>                           
                                <input type = "hidden" name ="cbx_verificador2" id="cbx_verificador2" maxlength="20" value="<?php echo $fila['iddim_Verificadores2'] ?>" readOnly><br>
                                <?php
                            }
                            ?>                                
                            </td>
                        </tr>
                        
                        <tr><td id="td1" class="especial">
                                FECHA DE LA ULTIMA ACTA DE VERIFICACION
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fultimaActaVe'] ?><br></td>

                            <?php if (is_null($fila['fultimaActaVe'])) { ?>    
                                <td id="td1"><input type = "date" name = "fultimaActaVe" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"   id="fultimaActaVe" value="<?php echo $fila['fultimaActaVe'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "HIDDEN" name = "fultimaActaVe" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fultimaActaVe" value="<?php echo $fila['fultimaActaVe'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr> 

                        <tr>
                            <td id="td1" class="especial">
                                NIT
                            </td>                            
                            <td id="td1"><?php echo $fila['nit'] ?></td>

                            <?php if (is_null($fila['nit'])) { ?>    
                                <td id="td1">        
                                    <input type = "text" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>" required>
                                </td>
                                <?php
                            } else {
                                ?> 
                                <td>    
                                    <input type = "hidden" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>" readOnly>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>                                                
                        
                        
                       <tr> <td id="td1">
                                CODIGO DEL CASO
                            </td>
                            <td id="td1" colspan="2">
                                <?php echo $fila['codigocaso'] ?>                               
                            </td>                                  
                        </tr>
                        
                        <tr><td id="td1" class="especial">
                                FECHA DE EMISION DE LA ORDEN DE VERIFICACION
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fechaEmision'] ?><br></td>

                            <?php if (is_null($fila['fechaEmision'])) { ?>    
                                <td id="td1"><input type = "date" name = "fechaEmisionOV" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaEmisionOV" value="<?php echo $fila['fechaEmision'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "HIDDEN" name = "fechaEmisionOV" min="1990-01-01" id="fechaEmisionOV" value="<?php echo $fila['fechaEmision'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>                                             
                        
                        
                        <tr>
                            <td style="height: 45px" id="td1" class="especial">Nº ORDEN DE VERIFICACION (000000)<br>AÑO
                            </td> 
                            <td id="td1"><?php echo $fila['ordenV'] ?>
                                <input type = "HIDDEN" name = "ordenV" id="nResBRegistro" 
                                       value="<?php echo $fila['ordenV'] ?>" readOnly>  
                            </td>
                            <?php if (is_null($fila['ordenV'])) { ?>    
                                <td id="td1"> 
                                    <input type = "text" name = "ordenV00" id="nResBRegistro00" minlength="6" maxlength="6" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                                        event.returnValue = false;" required="" autocomplete="off">
                                    <br>
                                    <select name = "ano" id="ano" style="height: 18px" required="">
                                        <option value=""></option>                                       
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </td>
                                <?php
                            } else {
                                ?>
                                <td>        

                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <tr><td id="td1" class="especial">
                                FECHA DE NOTIFICACION DE ORDEN DE VERIFICACION ASEGURADO
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fechanotificacionOV'] ?><br></td>

                            <?php if (is_null($fila['fechanotificacionOV'])) { ?>    
                                <td id="td1"><input type = "date" name = "fechanotificacionOV" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaEmisionOV" value="<?php echo $fila['fechanotificacionOV'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td style="font-size: 12px;"><input type = "HIDDEN" name = "fechanotificacionOV" min="1990-01-01" id="fechaEmisionOV" value="<?php echo $fila['fechanotificacionOV'] ?>" readOnly><br>
                                <?php
                                           $inicio = $fila['fechanotificacionOV'];
                                           $fin = date("Y-m-d");

                                           function diferenciaDias($inicio, $fin) {
                                               $inicio = strtotime($inicio);
                                               $fin = strtotime($fin);
                                               $dif = $fin - $inicio;
                                               $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
                                               return ceil($diasFalt);
                                           }
                                           ?>
                                    <label>Dias de notificado al Asegurado</label>
                                    <?php
                                    echo diferenciaDias($inicio, $fin)
                                    ?>
                                
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>  
                        
                        <tr><td id="td1" class="especial">
                                FECHA DE NOTIFICACION DE ORDEN DE VERIFICACION EMPLEADOR
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fechanotificacionOVE'] ?><br></td>

                            <?php if (is_null($fila['fechanotificacionOVE'])) { ?>    
                                <td id="td1">
                                    <!--<div class="form-group has-feedback">-->
                                     <input type= "date" name = "fechanotificacionOVE" min="1990-01-01" id="fechanotificacionOVE" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  value="<?php echo $fila['fechanotificacionOVE'] ?>">
                                    <!--<span class="glyphicon glyphicon-calendar form-control-feedback"></span>-->
                                    <br> 
                                    <!--</div>-->
                                                   
                                </td>
                                <?php
                            } else {
                                ?>
                                <td style="font-size: 12px;"><input type = "HIDDEN" name = "fechanotificacionOVE" min="1990-01-01" id="fechanotificacionOVE" value="<?php echo $fila['fechanotificacionOVE'] ?>" readOnly><br>
                                <?php
                                           $inicio = $fila['fechanotificacionOVE'];
                                           $fin = date("Y-m-d");

                                           function diferenciaDiasE($inicio, $fin) {
                                               $inicio = strtotime($inicio);
                                               $fin = strtotime($fin);
                                               $dif = $fin - $inicio;
                                               $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
                                               return ceil($diasFalt);
                                           }
                                           ?>
                                    <label>Dias de notificado al Empleador</label>
                                    <?php
                                    echo diferenciaDiasE($inicio, $fin)
                                    ?>
                                
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>                        
                        
                        <tr><td id="td1" class="especial">
                                FECHA DE ENTREGA DEL INFORME FINAL AL JEFE DE OSPE
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fechaEIFinalJOSPE'] ?><br></td>

                            <?php if (is_null($fila['fechaEIFinalJOSPE'])) { ?>    
                                <td id="td1"><input type = "date" name = "fechaEIF" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaEIF" value="<?php echo $fila['fechaEIFinalJOSPE'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "HIDDEN" name = "fechaEIF" min="1990-01-01" id="fechaEIF" value="<?php echo $fila['fechaEIFinalJOSPE'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <tr><td id="td1" class="especial">
                               FECHA DEVOLUCION DEL INFORME FINAL POR JEFE DE OSPE
                            </td>
                            <TD id="td1">
                                <?php echo $fila['fechaDevInfFinalJOSPE'] ?><br></td>

                            <?php if (is_null($fila['fechaDevInfFinalJOSPE'])) { ?>    
                                <td id="td1"><input type = "date" name = "fechaDIF" min="1990-01-01" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>"  id="fechaEIF" value="<?php echo $fila['fechaDevInfFinalJOSPE'] ?>"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "HIDDEN" name = "fechaDIF" min="1990-01-01" id="fechaEIF" value="<?php echo $fila['fechaDevInfFinalJOSPE'] ?>" readOnly><br>
                                </TD>
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
                                ?>
                                <td id="td1" style="color:#F80000 ;font-size: 12px" >        
                                    <b><?php echo "SI REPORTADO A SUNAT" ?></b><br></td></b>                                                      
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        

                        <tr>
                            <td colspan="3" id="td1" class="especial">
                                <a href="#" id="abriPoppup10">
                                    PERIODOS DE BAJA
                                </a>
                            </td>                   
                        <div id="dialog10" title="PERIODOS A CONSIDERAR PARA LA VERIFICACION" class="contenido">
                            <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>    
                        </tr>

                        <?php
                        $query2 = "SELECT count(*) total FROM dim_paevaluar_new t
                    where t.iddim_aseguradoindevido='$iddim_Verificacion'";
                            //Obteniendo el conjunto de resultados
                            $result2 = $conexionmysql->query($query2);
                            //recorriendo el conjunto de resultados con un bucle
                            while ($fila2 = $result2->fetch_assoc()) {
                                $GeneraBaja=$fila2['total'];
                            }
                                if ($GeneraBaja > 0) {
                        ?>
                        
                        <tr>
                                    <td colspan="3" id="td1">
                                        <a href="#" id="abriPoppup15">MODULO ESTADO DE LA RESOLUCION
                                        </a>
                                    </td>

                                <div id="dialog15" title="MODULO ESTADO DE LA RESOLUCION" class="contenido">
                                    <iframe src="formReconsideraciones_verif.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                                </div>
                                </tr>
                        
                        <tr>
                            <td style="height: 40px" id="td1" class="especial">
                                <a href="#" id="abriPoppup7">
                                    Nº DE RESOLUCION DE BAJA DE OFICIO <label style="color: #F80000">/ ARCHIVO</label>
                                </a>
                            </td>                     
                            <td id="td1"><?php echo $fila['numResBOficio'] ?><br></td>
                        <div id="dialog7" title="RESOLUCION BAJA DE OFICIO / ARCHIVO" class="contenido">
                            <iframe src="formResBOficio.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>                       
                        </tr>

                        <tr>
                            <td colspan="3" id="td1">
                                <a href="#" id="abriPoppup5">INGRESAR LOS DH DEL TITULAR A VERIFICAR
                                </a>
                            </td>
                        <div id="dialog5" title="LISTA DERECHOHABIENTES A VERIFICAR" class="contenido">
                            <iframe src="formDHRegistrados.php?iddim_aseguradoindevido=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>
                        
                        <tr>
                            <td colspan="" id="td1">
                                <a href="#" id="abriPoppup11">
                                    DERIVACION Y/O RECEPCION DEL CASO
                                </a>
                            </td>                   
                        <div id="dialog11" title="DERIVACION Y/O RECEPCION DEL CASO" class="contenido">
                            <iframe src="formDerivacionCaso.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>    
                        </tr>

                        <?php if ($fila['numero'] == '1') { ?>    
                            <tr>
                                <td colspan="3" id="td1">
                                    <a href="#" id="abriPoppup3">INGRESAR OTROS TITULARES CON LA MISMA ORDEN DE VERIFICACION
                                    </a>
                                </td>

                            <div id="dialog3" title="INGRESAR OTROS TITULARES CON LA MISMA ORDEN DE VERIFICACION" class="contenido">
                                <iframe src="formAgregarAIAdicionales.php?iddim_aseguradoindevido=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                            </div>
                            </tr>

                        <?php } ?> 
                            
                            <?php if ($fila['numero'] == '1') { ?>    
<!--                            <tr>
                                <td colspan="3" id="td1">
                                    <a href="#" id="abriPoppup13">INGRESAR OTROS TITULARES CON LA MISMA CARTA AMPLIATORIA
                                    </a>
                                </td>

                            <div id="dialog13" title="INGRESAR OTROS TITULARES CON LA MISMA CARTA AMPLIATORIA" class="contenido">
                                <iframe src="formAgregarAIAdicionales_CA.php?iddim_aseguradoindevido=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                            </div>
                            </tr>-->

                        <?php } ?> 

                        <tr>
                            <td colspan="3" id="td1">
                                <a href="#" id="abriPoppup2">CARTA A FINANZAS
                                </a>
                            </td>

                        <div id="dialog2" title="ACTUALIZACIÓN DE LOS PERIODOS Y CARTAS A FINANZAS" class="contenido">
                            <iframe src="formEditarCFinanza.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr> 

                        <tr>
                            <td colspan="3" id="td1">
                                <a href="#" id="abriPoppup6">PERIODOS CONFORMES A FINANZAS
                                </a>
                            </td>

                        <div id="dialog6" title="PERIODOS CONFORMES A FINANZAS" class="contenido">
                            <iframe src="formEditarPeridoconforme.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>

                        

                        <tr>
                            <td colspan="" id="th4" class="especial">
                                <a href="#" id="abriPoppup8" style="color:white;">INHABILITACION
                                </a>
                            </td>

                        <div id="dialog8" title="ACTUALIZACION INHABILITACION" class="contenido">
                            <iframe src="formResBInhabilitacion.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>

                        <?php if ($fila['numero'] == '1') { ?> 
                            <tr>
                                <td colspan="" id="th4" class="especial">
                                    <a href="#" id="abriPoppup9" style="color:white;">
                                        MULTA
                                    </a>
                                </td>

                            <div id="dialog9" title="ACTUALIZACION MULTA" class="contenido">
                                <iframe src="formMulta.php?iddim_Overificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                            </div>
                            </tr>
                        <?php } 
                                }
                                ?> 

                        <tr>
                            <td colspan="" id="th4" class="especial">
                                <a href="#" id="abriPoppup12" style="color:white;">PUBLICAR
                                </a>
                            </td>

                        <div id="dialog12" title="INGRESAR PUBLICACION" class="contenido">
                            <iframe src="formPublicacionLista.php?iddim_Verificacion=<?php echo $fila['iddim_aseguradoindevido'] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                        </tr>
                        
                        
                        <tr>
                            <td id="td1">
                                OBSERVACIONES
                            </td>
                            <td id="td1" style="width:200px;"><?php echo $fila['Observaciones'] ?><br></td>
                            <td id="td1"><textarea rows = "4" cols = "50" placeholder="Solo 200 caracteres" 
                            name = "Observaciones" id="observaciones" maxlength="200" style="resize: none"><?php echo $fila['Observaciones'] ?></textarea><br>
                            </td>
                        </tr>                                            

                        <?php
                        if ($fila['idDIM_OficinaII'] == $idOficinaUsuario) {
                            $query2 = "SELECT count(*) total FROM dim_paevaluar_new t
                    where t.iddim_aseguradoindevido='$iddim_Verificacion'";
                            //Obteniendo el conjunto de resultados
                            $result2 = $conexionmysql->query($query2);
                            //recorriendo el conjunto de resultados con un bucle
                            while ($fila2 = $result2->fetch_assoc()) {
                                $GeneraBaja=$fila2['total'];
                            }
                                if ($GeneraBaja > 0) {
                                    ?>

                                    <tr align = "center">
                                        <td colspan = "3" id="td1">
                                            <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
<!--                                            <input type= "submit" name = "actualizar" value = "Actualizar">-->
                                        </td>                            

                                    </tr> 
                                    <?php
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="3">
                                            <a href="#" id="abriPoppup1" style="font-size: 11px">POR FAVOR PRIMERO LLENE LOS PERIODOS A EVALUAR Y DE BAJA
                                            </a>
                                        </td>
                                    <div id="dialog1" title="SGVCA" class="contenido">
                                        <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_aseguradoindevido'] ?>"style="width: 100%; height: 90%"></iframe>
                                    </div>
                                    </tr>   
                                    <?php
                                }
                                ?>
                                <?php
                            
                        }
                        ?>

                    </table> 
                    <!--<h6>*Al Subir el PDF colocar el Nombre Generado Automaticamente</h6>-->     
                    <h6>Se actualizara bajo su responsabilidad.</h6>
                </form>
            
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
                    
            
            if($iidTEstadoActual==3 || $iidTEstadoActual==4)    {
            if($numero_dias>=21)
            {
                echo "FECHA DE CREACION TERMINADO ES: ",$fila['fCreacionTerminado'],'<BR>';
                echo "SE HA EXCEDIDO EL PLAZO PARA MODIFICAR FECHAS.";
            }
            else {
                echo "FECHA DE CREACION TERMINADO ES: ",$fila['fCreacionTerminado'],'<BR>';
                echo "TIENE 21 DIAS CALENDARIOS PARA MODIFICAR EN CASO SEA NECESARIO";
                ?>
            
            <div>
             <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarPBaja.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminar" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Periodos a Evaluar y de Baja</button>
                                </form>
        </div>
            
            <div>
                <form id ="pcalificart" name="form" action="actualizarVerificacion_EliminarFinanzas.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminarF" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Carta a Finanza</button>
                                </form>
        </div>            
            <?php
                }
             } else { 
                 ?>
        <div>
            <form id ="pcalificart" name="form" action="actualizarCPosterior_EliminarPBaja.php" method="POST" >  
                <input type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $iddim_CP ?>" readOnly="readOnly">  
                <button type="submit" name = "eliminar" onclick="ConfirmDemo2()" class="button button2" value="Eliminar">Eliminar Periodos a Evaluar y de Baja</button>
                                </form>
        </div>
         <div>
             <form id ="pcalificart" name="form" action="actualizarVerificacion_EliminarFinanzas.php" method="POST" >  
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

                <form  method="POST">
                    <input type="HIDDEN" name="iddim_Verificacion" size="50" value="<?php echo $fila['iddim_Verificacion'] ?>" readOnly="readOnly">  
                    <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <!--<input type="hidden" name="oficina" size="50" value="<?php echo $oficina ?>" readOnly="readOnly">-->                       
                    
                    <?php //if (isset($fila['nResBRegistro'])) { ?> 
                        <input type="submit" name="generar1" value="Genera ANEXOS 01 AL 05"class="btn btn-info"/>
                    <?php// } ?>
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
        if (isset($_POST['actualizar'])) {


            require '../SISGASV/conexionesbd/conexion_mysql.php';

            $iddimm = $_POST['iddim_usuario'];
            $iddim_usuario = "'$iddimm'";

            $iddim = $_POST['iddim_Verificacion'];
            $iddim_Verificacion = "'$iddim'";

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

            if (empty($_POST['cbx_perfil'])) {
                $cbx_perfil = 'NULL';
            } else {
                $cbx_perfil0 = $_POST['cbx_perfil'];
                $cbx_perfil = "'$cbx_perfil0'";
            }
            
            if (empty($_POST['cbx_verificador'])) {
                $cbx_verificador = 'NULL';
            } else {
                $cbx_verificador0 = $_POST['cbx_verificador'];
                $cbx_verificador = "'$cbx_verificador0'";
            }
                        
            if (empty($_POST['cbx_verificador2'])) {
                $cbx_verificador2 = 'NULL';
            } else {
                $cbx_verificador02 = $_POST['cbx_verificador2'];
                $cbx_verificador2 = "'$cbx_verificador02'";
            }

            if (empty($_POST['fechaEmisionOV'])) {
                $fechaEmisionOV = 'NULL';
            } else {
                $fechaEmisionOV0 = $_POST['fechaEmisionOV'];
                $fechaEmisionOV = "'$fechaEmisionOV0'";
            }

            if (empty($_POST['ordenV00'])) {
                $ordenV00 = 'NULL';
            } else {
                $ordenV000 = $_POST['ordenV00'];
                $ordenV00 = "$ordenV000";
            }

            if (empty($_POST['nit'])) {
                $nit = 'NULL';
            } else {
                $nitt = $_POST['nit'];
                $nit = "'$nitt'";
            }

            if (empty($_POST['nomcaso'])) {
                $nomcaso = 'NULL';
            } else {
                $nomcaso0 = $_POST['nomcaso'];
                $nomcaso = "'$nomcaso0'";
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
            
            if (empty($_POST['fechaInforme'])) {
                $fechaInforme = 'NULL';
            } else {
                $fechaInforme0 = $_POST['fechaInforme'];
                $fechaInforme = "'$fechaInforme0'";
            }

            if (empty($_POST['fechaEIF'])) {
                $fechaEIF = 'NULL';
            } else {
                $fechaEIF0 = $_POST['fechaEIF'];
                $fechaEIF = "'$fechaEIF0'";
            }

            if (empty($_POST['fechaDIJ'])) {
                $fechaDIJ = 'NULL';
            } else {
                $fechaDIJ0 = $_POST['fechaDIJ'];
                $fechaDIJ = "'$fechaDIJ0'";
            }

            if (empty($_POST['fechaDIF'])) {
                $fechaDIF = 'NULL';
            } else {
                $fechaDIF0 = $_POST['fechaDIF'];
                $fechaDIF = "'$fechaDIF0'";
            }
            if (empty($_POST['fechaEBO'])) {
                $fechaEBO = 'NULL';
            } else {
                $fechaEBO0 = $_POST['fechaEBO'];
                $fechaEBO = "'$fechaEBO0'";
            }

            if (empty($_POST['idTRRBRegistro'])) {
                $idTRRBRegistro = 'NULL';
            } else {
                $idTRRBRegistro0 = $_POST['idTRRBRegistro'];
                $idTRRBRegistro = "'$idTRRBRegistro0'";
            }

            if (empty($_POST['Observaciones'])) {
                $obsOSPE = 'NULL';
            } else {
                $obsOSPEo = $_POST['Observaciones'];
                $obsOSPE = "'$obsOSPEo'";
            }

            if (empty($_POST['fechaRDerivado'])) {
                $fechaRDerivado = 'NULL';
            } else {
                $fechaRDerivadoo = $_POST['fechaRDerivado'];
                $fechaRDerivado = "'$fechaRDerivadoo'";
            }

            if (empty($_POST['fechaDDerivado'])) {
                $fechaDDerivado = 'NULL';
            } else {
                $fechaDDerivadoo = $_POST['fechaDDerivado'];
                $fechaDDerivado = "'$fechaDDerivadoo'";
            }

            if (empty($_POST['casoDerivado'])) {
                $casoDerivado = 'NULL';
            } else {
                $casoDerivadoo = $_POST['casoDerivado'];
                $casoDerivado = "'$casoDerivadoo'";
            }
            
            if (empty($_POST['fechanotificacionOV'])) {
                $fechanotificacionOV = 'NULL';
            } else {
                $fechanotificacionOVo = $_POST['fechanotificacionOV'];
                $fechanotificacionOV = "'$fechanotificacionOVo'";
            }
            
            if (empty($_POST['fechanotificacionOVE'])) {
                $fechanotificacionOVE = 'NULL';
            } else {
                $fechanotificacionOVEo = $_POST['fechanotificacionOVE'];
                $fechanotificacionOVE = "'$fechanotificacionOVEo'";
            }
            
            if (empty($_POST['fultimaActaVe'])) {
                $fultimaActaVe = 'NULL';
            } else {
                $fultimaActaVeo = $_POST['fultimaActaVe'];
                $fultimaActaVe = "'$fultimaActaVeo'";
            }
                                     
            if (empty($_POST['fechateinfoFinalVe'])) {
                $fechateinfoFinalVe = 'NULL';
            } else {
                $fechateinfoFinalVeo = $_POST['fechateinfoFinalVe'];
                $fechateinfoFinalVe = "'$fechateinfoFinalVeo'";
            }
            
            if (empty($_POST['cbx_origen_perfil'])) {
                $cbx_origen_perfil = 'NULL';
            } else {
                $cbx_origen_perfill = $_POST['cbx_origen_perfil'];
                $cbx_origen_perfil = "'$cbx_origen_perfill'";
            }
            
            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";
  $queryM = "SELECT a.fCreacionTerminado FROM dim_verificacion a WHERE a.iddim_Verificacion=$iddim_Verificacion";
  $resultado = $conexionmysql->query($queryM);
           if ($_POST['idTEstadoActual'] == '3' || $_POST['idTEstadoActual'] == '4') { //     
               while ($filaBuscar = $resultado->fetch_assoc()) {
                if (is_null($filaBuscar['fCreacionTerminado'])){
                    $query = "UPDATE dim_overificacion 
                               SET  
                               fechaEmision=$fechaEmisionOV,                                   
                               fechanotificacionOV= $fechanotificacionOV, 
                               fechanotificacionOVE= $fechanotificacionOVE,                               
                               idtusuario=$iddim_usuario,
                               fActualizacion=$fecha_hora_update
                               WHERE iddim_Overificacion=$iddim_Verificacion";

                     $query2 = "UPDATE dim_verificacion SET                             
                            idTEstadoActual=$idTEstadoActual,
                            fechateinfoFinalVe=$fechateinfoFinalVe,
                            fechaEIFinalJOSPE=$fechaEIF, 
                            fechaDevInfFinalJOSPE=$fechaDIF,
                            nit=$nit,
                                origenverif=$cbx_origen_perfil,
                            idTVerificacionPerfil=$cbx_perfil,
                            observaciones=$obsOSPE,
                    
                            idtusuario=$iddim_usuario,
                            fActualizacion=$fecha_hora_update,
                            fCreacionTerminado=$fecha_hora_update 
                            WHERE iddim_Verificacion=$iddim_Verificacion";
                        
                        $query3 = "UPDATE dim_actaverificacion 
                           SET iddim_Verificadores1=$cbx_verificador,
                               iddim_Verificadores2=$cbx_verificador2,
                               fultimaActaVe=$fultimaActaVe
                               WHERE iddim_ActaVerificacion=$iddim_Verificacion";
                        
                        $query4="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_Verificacion";
            }   else  { 
                 
                        $query = "UPDATE dim_overificacion 
                               SET 
                               fechaEmision=$fechaEmisionOV,                                   
                               fechanotificacionOV= $fechanotificacionOV,
                               fechanotificacionOVE= $fechanotificacionOVE,                               
                               idtusuario=$iddim_usuario,
                               fActualizacion=$fecha_hora_update
                               WHERE iddim_Overificacion=$iddim_Verificacion";

                        $query2 = "UPDATE dim_verificacion SET                             
                            idTEstadoActual=$idTEstadoActual,
                            fechateinfoFinalVe=$fechateinfoFinalVe,
                            fechaEIFinalJOSPE=$fechaEIF,
                            fechaDevInfFinalJOSPE=$fechaDIF,
                            observaciones=$obsOSPE,
                            idTVerificacionPerfil=$cbx_perfil,
                            nit=$nit,
                            origenverif=$cbx_origen_perfil,
                      
                            idtusuario=$iddim_usuario,
                            fActualizacion=$fecha_hora_update 
                            WHERE iddim_Verificacion=$iddim_Verificacion";

                         $query3 = "UPDATE dim_actaverificacion 
                           SET iddim_Verificadores1=$cbx_verificador,    
                               iddim_Verificadores2=$cbx_verificador2,
                               fultimaActaVe=$fultimaActaVe  
                               WHERE iddim_ActaVerificacion=$iddim_Verificacion";
                         
                         $query4="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_Verificacion";
                    }                
            } 
            }else {
                 $query = "UPDATE dim_overificacion 
                               SET 
                               fechaEmision=$fechaEmisionOV,                                   
                               fechanotificacionOV= $fechanotificacionOV,
                               fechanotificacionOVE= $fechanotificacionOVE,                               
                               idtusuario=$iddim_usuario,
                               fActualizacion=$fecha_hora_update
                               WHERE iddim_Overificacion=$iddim_Verificacion";

                        $query2 = "UPDATE dim_verificacion SET                             
                            idTEstadoActual=$idTEstadoActual,
                            fechateinfoFinalVe=$fechateinfoFinalVe,
                            fechaEIFinalJOSPE=$fechaEIF,
                            fechaDevInfFinalJOSPE=$fechaDIF,
                            observaciones=$obsOSPE,
                            idTVerificacionPerfil=$cbx_perfil,
                            nit=$nit,
                            origenverif=$cbx_origen_perfil,
                            idtusuario=$iddim_usuario,
                            fActualizacion=$fecha_hora_update 
                            WHERE iddim_Verificacion=$iddim_Verificacion";

                         $query3 = "UPDATE dim_actaverificacion 
                           SET iddim_Verificadores1=$cbx_verificador,    
                               iddim_Verificadores2=$cbx_verificador2,
                               fultimaActaVe=$fultimaActaVe  
                               WHERE iddim_ActaVerificacion=$iddim_Verificacion";
                         
                         $query4="UPDATE dim_aseguradoindevido SET 
                                tipoRegistro='$tipoRegistro', idTipoTrabajador='$ttrabajador',
                                idTipoAtencion='$idTipoAtencion' 
                                WHERE iddim_aseguradoindevido=$iddim_Verificacion";
            }
            
            if ($conexionmysql->query($query)) {
                if ($conexionmysql->query($query2)) {
                    if ($conexionmysql->query($query3)) {
                        if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';     
                    echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                     }
            }}
            } else {
                
                echo 'error.';                
                  echo 'nit: ',$nit, '<br>';
                  echo 'observa: ', $obsOSPE, '<br>';
            }
        }
        
            
        ?>

        <!--PARA GENERAR EL WORD DE NOTIFICACION-->
        <div> 
            <?php
            require_once dirname(__FILE__) . '/PHPWord-master/src/PhpWord/Autoloader.php';
            \PhpOffice\PhpWord\Autoloader::register();

            use PhpOffice\PhpWord\TemplateProcessor;

            $templateWord = new TemplateProcessor('../SISGASV/doc/ANEXON01.docx');
            if (isset($_POST['generar1'])) {
                include ('./conexionesbd/conexion_mysql.php');
                
                $anexo01="";
                $anexo02="";
                
                $array1[]="";
                $array2[]="";
                
                $apellidonombre_v[]="";
                $dni_v[]="";
                
    $queryA = "SELECT h.*, a.*, b.*, c.*, doo.apellidonombre, doo.dni dni_v1, 
                doooo.apellidonombre apellidonombre2, doooo.dni dni_v2,
                e.num_cartaPVerificacion, e.num_cartaAmPVerificacion, da.numeroActaVe
                FROM dim_aseguradoindevido h
                inner join dim_verificacion a on h.iddim_aseguradoindevido=a.iddim_aseguradoindevido
                inner join dim_overificacion b on a.iddim_Verificacion=b.iddim_Overificacion
                inner join dim_cartapverificacion e on b.iddim_Overificacion=e.iddim_Overificacion
                inner join dim_resboficio c on b.iddim_Overificacion=c.iddim_Overificacion
                inner join dim_actaverificacion da on a.iddim_Verificacion=da.iddim_ActaVerificacion
                left join dim_oficina doo on da.iddim_Verificadores1=doo.idDIM_Oficina
                left join dim_oficina doooo on da.iddim_Verificadores2=doooo.idDIM_Oficina
                where h.iddim_aseguradoindevido='$iddim_Verificacion'";
    
    $queryB = "SELECT * FROM dim_pacalificar_new a where a.iddim_aseguradoindevido='$iddim_Verificacion'";    
    $resultB = $conexionmysql->query($queryB);    
    while($row=$resultB->fetch_assoc()) { 
    $array1[] = $row['InicioPCalificar1'];
    $array2[] = $row['FinPCalificar1'];
    }
    
    $queryC = "SELECT * FROM dim_oficina_2 a where a.cod_oficinaIni='$cod_oficinaIni' and not a.nomenclatura='UCF'";    
    $resultC = $conexionmysql->query($queryC);    
    while($row=$resultC->fetch_assoc()) { 
    $anexo01 = $row['anexo01'];
    $anexo02 = $row['anexo02'];
    }
    
    $queryD = "SELECT dv.idDIM_Oficina, dv.apellidonombre, dv.dni dni_v FROM dim_oficina dv where dv.codOficina ='$codOficina' and not dv.idtperfiles='3'";    
    $resultD = $conexionmysql->query($queryD);    
    while($row=$resultD->fetch_assoc()) { 
    $apellidonombre_v[] = $row['apellidonombre'];
    $dni_v[] = $row['dni_v'];
    }
    
    $resultA = $conexionmysql->query($queryA);
        while ($fila = $resultA->fetch_assoc()) {
            $DISTRITO_emp = $fila['DISTRITO_emp'];
            $nomEmpresa = $fila['nomEmpresa'];
            $RUC = $fila['RUC'];
            $DIRECCION_emp = $fila['DIRECCION_emp'];            
            $DEPARTAMENT_emp = $fila['DEPARTAMENT_emp'];
            $PROVINCIA_emp = $fila['PROVINCIA_emp'];
            
            $fechaEmision = $fila['fechaEmision'];
            $ordenV = $fila['ordenV'];
            $nit = $fila['nit'];
            $numeroActaVe = $fila['numeroActaVe'];
            $num_cartaAmPVerificacion = $fila['num_cartaAmPVerificacion'];
            $num_cartaPVerificacion = $fila['num_cartaPVerificacion'];
            
            $apellidonombre_iv1 = $fila['apellidonombre'];
            $dni_iv1 = $fila['dni_v1'];
//            $apellidonombre2 = $fila['apellidonombre2'];
//            $dni_v2 = $fila['dni_v2'];            
            
            $apellidonombre_t = $fila['paterno_t']. ' ' .$fila['materno_t'] . ' ' . $fila['casada_t'] . ' ' . $fila['nombre1_t'] . ' ' . $fila['nombre2_t'];
            $dni_t = $fila['dni_t'];            
            
              
                $templateWord->setValue('oficina', $oficina);
            
                $templateWord->setValue('nombreEntidad', $nomEmpresa);
                $templateWord->setValue('eempleadora', $RUC);
                $templateWord->setValue('DIRECCION_emp', $DIRECCION_emp);
                $templateWord->setValue('DEPARTAMENT_emp', $DEPARTAMENT_emp);
                $templateWord->setValue('PROVINCIA_emp', $PROVINCIA_emp);
                $templateWord->setValue('DISTRITO_emp', $DISTRITO_emp);
                $templateWord->setValue('nit', $nit);
                $templateWord->setValue('ordenV', $ordenV);
                $templateWord->setValue('numeroActaVe', $numeroActaVe);
                $templateWord->setValue('num_cartaAmPVerificacion', $num_cartaAmPVerificacion);
                $templateWord->setValue('num_cartaPVerificacion', $num_cartaPVerificacion);
                $templateWord->setValue('fechaEmision', $fechaEmision);

                $templateWord->setValue('apellidonombre_iv1', $apellidonombre_iv1);
                $templateWord->setValue('dni_iv1', $dni_iv1);
//                $templateWord->setValue('apellidonombre2', $apellidonombre2);
//                $templateWord->setValue('dni_v2', $dni_v2);
                
                $templateWord->setValue('apellidonombre_t', $apellidonombre_t);
                $templateWord->setValue('dni_t', $dni_t);
                
                $templateWord->setValue('anexo01', $anexo01);
                $templateWord->setValue('anexo02', $anexo02);
                
                $templateWord->setValue('InicioPCalificar1', $array1[1]);
                $templateWord->setValue('FinPCalificar1', $array2[1]);                              
                
                if (isset($array1[2])) {
                $templateWord->setValue('InicioPCalificar2', $array1[2]);
                $templateWord->setValue('FinPCalificar2', $array2[2]);
                } else {
                $templateWord->setValue('InicioPCalificar2', "");
                $templateWord->setValue('FinPCalificar2', "");                
                }
                
                if (isset($array1[3])) {
                $templateWord->setValue('InicioPCalificar3', $array1[3]);
                $templateWord->setValue('FinPCalificar3', $array2[3]);                
                } else {
                $templateWord->setValue('InicioPCalificar3', "");
                $templateWord->setValue('FinPCalificar3', "");                
                }                
                
                if (isset($array1[4])) {
                $templateWord->setValue('InicioPCalificar4', $array1[4]);
                $templateWord->setValue('FinPCalificar4', $array2[4]);
                } else {
                $templateWord->setValue('InicioPCalificar4', "");
                $templateWord->setValue('FinPCalificar4', "");                
                }                
                
                if (isset($array1[5])) {
                $templateWord->setValue('InicioPCalificar5', $array1[5]);
                $templateWord->setValue('FinPCalificar5', $array2[5]);                                
                } else {
                $templateWord->setValue('InicioPCalificar5', "");
                $templateWord->setValue('FinPCalificar5', "");                
                }
                
                
                /***********VERIFICADORES*************************/
                
                $templateWord->setValue('apellidonombre_v1', $apellidonombre_v[1]);
                $templateWord->setValue('dni_v1', $dni_v[1]);                              
                
                if (isset($apellidonombre_v[2])) {
                $templateWord->setValue('apellidonombre_v2', $apellidonombre_v[2]);
                $templateWord->setValue('dni_v2', $dni_v[2]);
                } else {
                $templateWord->setValue('apellidonombre_v2', "");
                $templateWord->setValue('dni_v2', "");                
                }
                
                if (isset($apellidonombre_v[3])) {
                $templateWord->setValue('apellidonombre_v3', $apellidonombre_v[3]);
                $templateWord->setValue('dni_v3', $dni_v[3]);                
                } else {
                $templateWord->setValue('apellidonombre_v3', "");
                $templateWord->setValue('dni_v3', "");                
                }                
                
                if (isset($apellidonombre_v[4])) {
                $templateWord->setValue('apellidonombre_v4', $apellidonombre_v[4]);
                $templateWord->setValue('dni_v4', $dni_v[4]);
                } else {
                $templateWord->setValue('apellidonombre_v4', "");
                $templateWord->setValue('dni_v4', "");                
                }                
                
                if (isset($apellidonombre_v[5])) {
                $templateWord->setValue('apellidonombre_v5', $apellidonombre_v[5]);
                $templateWord->setValue('dni_v5', $dni_v[5]);                                
                } else {
                $templateWord->setValue('apellidonombre_v5', "");
                $templateWord->setValue('dni_v5', "");                
                }               
              
                if (isset($apellidonombre_v[6])) {
                $templateWord->setValue('apellidonombre_v6', $apellidonombre_v[6]);
                $templateWord->setValue('dni_v6', $dni_v[2]);
                } else {
                $templateWord->setValue('apellidonombre_v6', "");
                $templateWord->setValue('dni_v6', "");                
                }
                
                if (isset($apellidonombre_v[7])) {
                $templateWord->setValue('apellidonombre_v7', $apellidonombre_v[7]);
                $templateWord->setValue('dni_v7', $dni_v[3]);                
                } else {
                $templateWord->setValue('apellidonombre_v7', "");
                $templateWord->setValue('dni_v7', "");                
                }                
                
                if (isset($apellidonombre_v[8])) {
                $templateWord->setValue('apellidonombre_v8', $apellidonombre_v[8]);
                $templateWord->setValue('dni_v8', $dni_v[4]);
                } else {
                $templateWord->setValue('apellidonombre_v8', "");
                $templateWord->setValue('dni_v8', "");                
                }                
                
                if (isset($apellidonombre_v[9])) {
                $templateWord->setValue('apellidonombre_v9', $apellidonombre_v[9]);
                $templateWord->setValue('dni_v9', $dni_v[5]);                                
                } else {
                $templateWord->setValue('apellidonombre_v9', "");
                $templateWord->setValue('dni_v9', "");                
                }
                
                if (isset($apellidonombre_v[10])) {
                $templateWord->setValue('apellidonombre_v10', $apellidonombre_v[10]);
                $templateWord->setValue('dni_v10', $dni_v[5]);                                
                } else {
                $templateWord->setValue('apellidonombre_v10', "");
                $templateWord->setValue('dni_v10', "");                
                }
                
                /************************************************/
                
                
                
                $templateWord->saveAs('Documento2.docx');
                echo '<a href="../SISGASV/Documento2.docx">DESCARGAR ARCHIVO WORD</a><br><br>';
                    }
                }
            ?>

        </div>

    </body>
</html>