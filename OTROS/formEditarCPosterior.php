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
        <link rel="stylesheet" href="../SISGASV/include/bootstrapform.css" media="screen">

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 

        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
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
                font-size:14px;
                font-weight:normal;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            tr td {
                vertical-align:left
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
                        height: 700,
                        width: 680,
                        modal: true,
                    });
                }
                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });


                $("#dialog2").hide();
                function abrir2() {
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                        height: 700,
                        width: 680,
                        modal: true,
                    });
                }
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
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
                    //document.getElementById("nResBRegistro").required = true;
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true;                   
                } else {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;
                    document.getElementById("femisionBRegistro").required = false;
                    //document.getElementById("nResBRegistro").required = false;
                    //document.getElementById("idTGeneraBaja").value = "0";
                    //document.getElementById("nResBRegistro").required = false;
                    // document.getElementById("idTGeneraBaja").disabled = false;
                }
            }
        </script>

        <script>
            function habilitar22(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("nit").disabled = false;

                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("nResBRegistro").disabled = false;

                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("fecartafinanza").disabled = false;

                    document.getElementById("ncartafinanza").disabled = false;

                    document.getElementById("fechaenvioOSPE").disabled = false;
                    document.getElementById("correo").disabled = false;
                    document.getElementById("operativo").disabled = false;

                    //document.getElementById("fcorreo").disabled = false;

                } else if (value === "2") {
                    // deshabilitamos                    
                    document.getElementById("idTEstadoActual").value = "3";
                    //document.getElementById("idTEstadoActual").disabled = true;
                    //document.getElementById("idTEstadoActual").value = "3";

                    document.getElementById("idTRRBRegistro").value = "";
                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("nit").value = "";
                    document.getElementById("nit").disabled = true;

                    document.getElementById("femisionBRegistro").value = "";
                    document.getElementById("femisionBRegistro").disabled = true;
                    document.getElementById("nResBRegistro").value = "";
                    document.getElementById("nResBRegistro").disabled = true;

                    document.getElementById("fnotificacionBRegistro").value = "";
                    document.getElementById("fnotificacionBRegistro").disabled = true;

                    document.getElementById("fecartafinanza").value = "";
                    document.getElementById("fecartafinanza").disabled = true;

                    document.getElementById("ncartafinanza").value = "";
                    document.getElementById("ncartafinanza").disabled = true;

                    document.getElementById("fechaenvioOSPE").value = "";
                    document.getElementById("fechaenvioOSPE").disabled = true;
                    document.getElementById("correo").value = "";
                    document.getElementById("correo").disabled = true;

                    document.getElementById("operativo").value = "";
                    document.getElementById("operativo").disabled = true;

                    document.getElementById("observaciones").value = "";

                    //document.getElementById("fcorreo").disabled = true;
                }
            }
        </script>

        <script>
            function habilitar33(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("nit").required = true;
                    document.getElementById("fecartafinanza").required = true;
                    document.getElementById("ncartafinanza").required = true;
                    document.getElementById("nResBRegistro").required = true;
                    document.getElementById("idTGeneraBaja").value = "1";
                    //document.getElementById("idTEstadoActual").disabled = true;
                    // document.getElementById("idTGeneraBaja").disabled = true;                   
                } else {
                    // deshabilitamos  
                    document.getElementById("nit").required = false;
                    document.getElementById("fecartafinanza").required = false;
                    document.getElementById("ncartafinanza").required = false;
                    //document.getElementById("nResBRegistro").required = false;
                    document.getElementById("idTGeneraBaja").value = "0";
                    // document.getElementById("idTGeneraBaja").disabled = false;
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

    </head>
    <body>  

        <?PHP
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        ?> 

        <h1>Mantenimiento de las Bajas de Registro</h1>
        <h5>Se actualizara bajo su responsabilidad.
        </h5>
        <div>                                   
            <!--Incrustar php-->
            <?php
            $iddim_CPosterior = $_GET['iddim_CPosterior'];

//incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
//realizando una consulta usando la clausula select, cp.fcorreo, 
            $query = "SELECT ai.idDIM_Oficina as idDIM_OficinaII,
                        cp.iddim_CPosterior, 
                        tp.Verificacion,
                        tpf.VerificacionPerfil,
                        cp.iddim_aseguradoindevido, 
                        tea.idTEstadoActual,
                        tea.EstadoActual, 
                        cp.idTGeneraBaja,
                        case 
                        when cp.idTGeneraBaja='1' then 'SI'
                        when cp.idTGeneraBaja='2' then 'NO'
                        when cp.idTGeneraBaja='4' then '--'
                        end as GeneraBaja,
                        trr.RRBRegistro,
                        cp.nit, cp.femisionBRegistro, cp.nResBRegistro, cp.fnotificacionBRegistro, cp.respuestaBRegistro,
                        cp.respuestaBRegistro, cp.fecartafinanza, cp.ncartafinanza, cp.observaciones, cp.fechaenvioOSPE,
                        cp.correo, cp.fcorreo,
                        cp.operativo, cp.dataentregada 
                        FROM dim_cposterior cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
                        left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                        left join tiporrbregistro trr on cp.idTRRBRegistro=trr.idTRRBRegistro
                        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                        where cp.iddim_CPosterior='$iddim_CPosterior'";
//Obteniendo el conjunto de resultados
            $result = $conexionmysql->query($query);
//recorriendo el conjunto de resultados con un bucle
            while ($fila = $result->fetch_assoc()) {
                ?>		
                <form name="form" action="actualizarCPosterior.php" method="POST" onSubmit="window.location.reload()">
                    <table id="t1" border="1" summary="Rellena Formulario">

                        <tr>
                            <th id="th1" scope="row" class="especial" colspan="4">
                                ACTUALIZACION DE LA INFORMACION DEL CONTROL POSTERIOR
                            </th>
                        </tr> 
                        <tr> <td id="td1">
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
                        <input id="i1" type="HIDDEN" name="iddim_CPosterior" size="50" value="<?php echo $fila['iddim_CPosterior'] ?>" readOnly="readOnly">  
                        <input id="i1" type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                        </tr>
                        <TR>
                            <td>
                                ESTADO ACTUAL
                            </td>
                            <td><?php echo $fila['EstadoActual'] ?><br></td>

                            <?php if ($fila['idTEstadoActual'] == '3') { ?> 
                                <td><input id="i1" type="HIDDEN" name="idTEstadoActual" size="50" value="3" readOnly="readOnly">  
                                    <select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual" disabled>                                    
                                        <option value = "1">PENDIENTE</option>
                                        <option value = "2">EN PROCESO</option>
                                        <option value = "3" selected>TERMINADO</option> 
                                    </select>
                                </td>
                            <?php } else {
                                ?>
                                <td><select name = "idTEstadoActual" onchange="habilitar11(this.value);" id = "idTEstadoActual">                                    
                                        <option value = "1">PENDIENTE</option>
                                        <option value = "2">EN PROCESO</option>
                                        <option value = "3">TERMINADO</option>    
                                        <?php
                                    }
                                    ?>                                        
                                </select>
                            </td>
                        </TR>

                        <tr>
                            <td colspan="3">
                                <a href="#" id="abriPoppup1">PERIODOS A CALIFICAR
                                </a>
                            </td>

                        <div id="dialog1" title="SGVCA" class="contenido">
                            <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                        </div>
                        </tr>   

                        <tr> <td>
                                GENERA BAJA DE REGISTRO
                            </td>
                            <td><?php echo $fila['GeneraBaja'] ?><br></td>

                            <?php if (is_null($fila['GeneraBaja'])) { ?>                                 
                                <td><select name = "idTGeneraBaja" id="idTGeneraBaja" onchange="habilitar22(this.value);">
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

                        <tr> <td>
                                ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
                            <td><?php echo $fila['RRBRegistro'] ?><br></td>
                            <td><select name = "idTRRBRegistro" id="idTRRBRegistro" onchange="habilitar33(this.value);">
                                    <option value = "0"></option>
                                    <option value = "1">FIRME Y CONSENTIDA</option>
                                    <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                                    <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                                    <option value = "4">IMPROCEDENTE - 1RA INSTANCIA</option>
                                    <option value = "5">FUNDADO EN PARTE - 1RA INSTANCIA</option>
                                    <option value = "6">INADMISIBLE - 1RA INSTANCIA</option>
                                    <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                                    <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                                    <option value = "9">PROCESO DE CALIFICACION</option>
                                    <option value = "10">APELACION</option>
                                    <option value = "11">RECONSIDERACION</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>NIT</td>                            
                            <td><?php echo $fila['nit'] ?><br></td>
                            
                            <?php if (is_null($fila['nit'])) { ?>    
                            <td>        
                                <input type = "text" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>">
                            </td>
                            <?php
                            } else {
                            ?> 
                            <td>    
                            <input type = "text" name = "nit" id="nit" maxlength="20" value="<?php echo $fila['nit'] ?>" readOnly>
                            </td>
                            <?php
                            }
                            ?>
                            
                        </tr>

                        <tr><td>
                                FECHA DE EMISION DE BAJA DE REGISTRO
                            </td>
                            <TD>
                                <?php echo $fila['femisionBRegistro'] ?><br></td>
                            
                            <?php if (is_null($fila['femisionBRegistro'])) { ?>    
                            <td><input type = "date" name = "femisionBRegistro" min="0001-01-01" id="femisionBRegistro" value="<?php echo $fila['femisionBRegistro'] ?>"><br>
                            </TD>
                            <?php
                            } else {
                            ?>
                            <td><input type = "date" name = "femisionBRegistro" min="0001-01-01" id="femisionBRegistro" value="<?php echo $fila['femisionBRegistro'] ?>" readOnly><br>
                            </TD>
                            <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td>Nº RESOLUCION DE BAJA DE REGISTRO</td>
                            <td><?php echo $fila['nResBRegistro'] ?><br></td>
                             <?php if (is_null($fila['nResBRegistro'])) { ?>    
                            <td>        
                                <input type = "text" name = "nResBRegistro" id="nResBRegistro" maxlength="50" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                            event.returnValue = false;" value="<?php echo $fila['nResBRegistro'] ?>">
                            </td>
                            <?php
                            } else {
                            ?>
                            <td>        
                                <input type = "text" name = "nResBRegistro" id="nResBRegistro" maxlength="50" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                            event.returnValue = false;" value="<?php echo $fila['nResBRegistro'] ?>" readOnly>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>

                        <tr><td>
                                FECHA NOTIFICACION BAJA DE REGISTRO
                            </td>
                            <TD><?php echo $fila['fnotificacionBRegistro'] ?><br></td>
                            <td><input type = "date" name = "fnotificacionBRegistro" id="fnotificacionBRegistro"
                                       min="0001-01-01" value="<?php echo $fila['fnotificacionBRegistro'] ?>"><br></TD>
                        </tr>          

                        <tr><td>
                                FECHA ENVIO DE CARTA A <br>FINANZAS POR RECUPERO DE BAJA
                            </td>
                            <TD><?php echo $fila['fecartafinanza'] ?><br></td>
                            <td><input type = "date" name = "fecartafinanza" id="fecartafinanza"
                                       min="0001-01-01" value="<?php echo $fila['fecartafinanza'] ?>"><br></TD>
                        </tr> 

                        <tr><td>
                                NUMERO DE CARTA A <br>FINANZAS POR RECUPERO BAJA
                            </td>
                            <TD><?php echo $fila['ncartafinanza'] ?><br></td>
                            <td><input type = "text" name = "ncartafinanza" id="ncartafinanza" maxlength="50" value="<?php echo $fila['ncartafinanza'] ?>"><br></TD>
                        </tr>


                        <tr><td>
                                FECHA DE ENVIO A LA OSPE
                            </td>
                            <TD><?php echo $fila['fechaenvioOSPE'] ?><br></td>
                            <td><input type = "date" name = "fechaenvioOSPE" id="fechaenvioOSPE" value="<?php echo $fila['fechaenvioOSPE'] ?>"
                                       min="0001-01-01"><br></TD>
                        </tr> 

                        <tr><td>
                                CORREO DONDE SE COMUNICO A LA SUBGERENCIA
                            </td>
                            <TD><?php echo $fila['correo'] ?><br></td>
                            <td><input type = "date" name = "correo" id="correo" value="<?php echo $fila['correo'] ?>"><br></TD>
                        </tr>

                        <tr>
                            <td>
                                MES QUE PERTENECE LA DATA
                            </td>
                            <?php
                            if ($fila['fcorreo'] == NULL) {
                                ?>
                                <TD><?php echo $fila['fcorreo'] ?><br></td>
                                <TD>
                                    <select name="fcarga" class="" id="fcarga">
                                        <?php
                                        $mes = date("n");
                                        $rango = 4;
                                        for ($i = $mes; $i <= $mes + $rango; $i++) {
                                            $mesano = date('Ym', mktime(0, 0, 0, $i, 1, date("Y")));
                                            $meses = date('F', mktime(0, 0, 0, $i, 1, date("Y")));
                                            if ($meses == "January")
                                                $meses = "Enero";
                                            if ($meses == "February")
                                                $meses = "Febrero";
                                            if ($meses == "March")
                                                $meses = "Marzo";
                                            if ($meses == "April")
                                                $meses = "Abril";
                                            if ($meses == "May")
                                                $meses = "Mayo";
                                            if ($meses == "June")
                                                $meses = "Junio";
                                            if ($meses == "July")
                                                $meses = "Julio";
                                            if ($meses == "August")
                                                $meses = "Agosto";
                                            if ($meses == "September")
                                                $meses = "Septiembre";
                                            if ($meses == "October")
                                                $meses = "Octubre";
                                            if ($meses == "November")
                                                $meses = "Noviembre";
                                            if ($meses == "December")
                                                $meses = "Diciembre";
                                            $ano = date('Y', mktime(0, 0, 0, $i, 1, date("Y")));
                                            echo "<option value='$mesano'>$meses/$ano</option>";
                                        }
                                        ?> 
                                    </select>
                                    <?php
                                    //echo $mesano;
                                }
                                else {
                                    ?>
                                <TD><?php echo $fila['fcorreo'] ?><br></td>
                                <?php
                            }
                            ?>
                            </TD>
                        </tr>

                        <tr><td>
                                OPERATIVO
                            </td>
                            <td><?php echo $fila['operativo'] ?><br></td>
                            <td><input type = "text" name = "operativo" id="operativo" maxlength="100" value="<?php echo $fila['operativo'] ?>"><br></td>
                        </tr> 

                        <tr>
                            <td>
                                OBSERVACIONES
                            </td>
                            <td><?php echo $fila['observaciones'] ?><br></td>
                            <td><textarea rows = "4" cols = "50" placeholder="Solo 200 caracteres" name = "observaciones" id="observaciones" maxlength="200"><?php echo $fila['observaciones'] ?></textarea><br>
                            </td>
                        </tr>

                        <?php
                        if ($fila['idDIM_OficinaII'] == $idOficinaUsuario) {
                            // $iddim_CPosterior = $_GET['iddim_CPosterior'];
                            //incluir el archivo de conexion
                            // include 'conexion_mysql.php';
                            //realizando una consulta usando la clausula select, cp.fcorreo, 
                            $query2 = "select
                        case 
                        when d.InicioPCalificar1 is not null then '1' 
                        when d.InicioPCalificar2 is not null then '1'
                        when d.InicioPCalificar3 is not null then '1' 
                        when d.InicioPCalificar4 is not null then '1'
                        when d.InicioPCalificar5 is not null then '1' 
                        when d.InicioPCalificar1 is null then '0' 
                        when d.InicioPCalificar2 is null then '0'
                        when d.InicioPCalificar3 is null then '0' 
                        when d.InicioPCalificar4 is null then '0'
                        when d.InicioPCalificar5 is null then '0' 
                        end as GeneraBaja
                        from dim_pacalificar d 
                        WHERE d.iddim_PaCalificar='$iddim_CPosterior'";
                            //Obteniendo el conjunto de resultados
                            $result2 = $conexionmysql->query($query2);
                            //recorriendo el conjunto de resultados con un bucle
                            while ($fila2 = $result2->fetch_assoc()) {
                                if ($fila2['GeneraBaja'] == 1) {
                                    ?>
                                    <tr align = "center">
                                        <td colspan = "3" id="td2">
                                            <input type = "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar"></td> 

                                    </tr>    

                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">
                                            <a href="#" id="abriPoppup2">POR FAVOR PRIMERO LLENE EL PERIODOS A CALIFICAR
                                            </a>
                                        </td>

                                    <div id="dialog2" title="SGVCA" class="contenido">
                                        <iframe src="formEditarPCalificar.php?iddim_CPosterior=<?php echo $fila['iddim_CPosterior'] ?>" style="width: 100%; height: 90%"></iframe>
                                    </div>
                                    </tr>   
                                    <?php
                                }
                            }
                        }
                        ?>

                    </table>     
                </form>
                <?php
            }
//liberando los recursos
            $result->free();
//cerrando los recursos
            $conexionmysql->close()
            ?>	

        </div>
    </body>
</html>