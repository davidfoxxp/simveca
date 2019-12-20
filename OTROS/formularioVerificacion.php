<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require 'conexion.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.codOficina, u.idtusuario, concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
        FROM tusuario u 
        inner join oficinat o on u.idOficinaT=o.idOficinaT
        where u.idtusuario='$idtusuario'";



$resultsql = $conexion->query($sql);

$row = $resultsql->fetch_assoc();
?>


<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <title>Conexion con MySQL</title>		
        <style type="text/css">
            /*programando con css*/
            body {
                background: #D2EDF6;
            }            

            #td1 {
                background: #FFFFFF;
            }

            #th1 {
                text-align: center;
                font-size: 15px;  
                background: #8FA1B2;
            }

            th {   
                background: #EDEDED;
                text-align: left;            
                width: 180px; 
                font-size: 12px;
            }
            tr td {
                font-weight: bold;
                text-align: left;
                font-family: arial;
                font-size: 12px;
            }

            #i1 {
                border: 0;

            }

        </style>

        <script>
            function habilitar(value)
            {
                if (value === "1")
                {
                    // habilitamos
                    document.getElementById("FEmisionBRegistro").readOnly = false;
                    document.getElementById("FEmisionBRegistro").type = "date";

                    document.getElementById("numResolucionRegistro").readOnly = false;

                    document.getElementById("FNotificacionPAsegurado").readOnly = false;
                    document.getElementById("FNotificacionPAsegurado").type = "date";
                    //////
                    document.getElementById("piniciobaja").readOnly = false;
                    document.getElementById("piniciobaja").type = "date";

                    document.getElementById("pfinbaja").readOnly = false;
                    document.getElementById("pfinbaja").type = "date";
                    ///    
                    document.getElementById("idTRRBRegistro").disabled = false;

                    document.getElementById("FEnvioCFinanzasBRegistro").readOnly = false;
                    document.getElementById("FEnvioCFinanzasBRegistro").type = "date";

                    document.getElementById("numCartaFinanzasBRegistro").readOnly = false;
                } else if (value === "2") {
                    // deshabilitamos                    
                    document.getElementById("FEmisionBRegistro").type = "text";
                    document.getElementById("FEmisionBRegistro").value = "";
                    document.getElementById("FEmisionBRegistro").readOnly = true;

                    document.getElementById("piniciobaja").type = "text";
                    document.getElementById("piniciobaja").value = "";
                    document.getElementById("piniciobaja").readOnly = true;

                    document.getElementById("pfinbaja").type = "text";
                    document.getElementById("pfinbaja").value = "";
                    document.getElementById("pfinbaja").readOnly = true;

                    document.getElementById("numResolucionRegistro").value = "";
                    document.getElementById("numResolucionRegistro").readOnly = true;

                    document.getElementById("FNotificacionPAsegurado").type = "text";
                    document.getElementById("FNotificacionPAsegurado").readOnly = true;

                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTRRBRegistro").value = "0";
                    document.getElementById("idTRRBRegistro").readOnly = true;

                    document.getElementById("FEnvioCFinanzasBRegistro").type = "text";
                    document.getElementById("FEnvioCFinanzasBRegistro").readOnly = true;

                    document.getElementById("numCartaFinanzasBRegistro").value = "";
                    document.getElementById("numCartaFinanzasBRegistro").readOnly = true;
                }
            }
        </script>

        <script>
            function habilitar22(value)
            {
                if (value === "3" || value === "2" || value === "1")
                {
                    // habilitamos
                    document.getElementById("idTGeneraBaja").disabled = false;
                    document.getElementById("idTGeneraBaja").value = "0";

                    document.getElementById("FEmisionBRegistro").readOnly = false;
                    document.getElementById("FEmisionBRegistro").type = "date";

                    document.getElementById("numResolucionRegistro").readOnly = false;
                    //document.getElementById("numResolucionRegistro").type = "number";

                    document.getElementById("piniciobaja").readOnly = false;
                    document.getElementById("piniciobaja").type = "date";

                    document.getElementById("pfinbaja").readOnly = false;
                    document.getElementById("pfinbaja").type = "date";

                    document.getElementById("FNotificacionPAsegurado").readOnly = false;
                    document.getElementById("FNotificacionPAsegurado").type = "date";

                    document.getElementById("idTRRBRegistro").disabled = false;

                    document.getElementById("FEnvioCFinanzasBRegistro").readOnly = false;
                    document.getElementById("FEnvioCFinanzasBRegistro").type = "date";

                    document.getElementById("numCartaFinanzasBRegistro").readOnly = false;
                    //document.getElementById("numCartaFinanzasBRegistro").type = "number";
                } else if (value === "4") {
                    // deshabilitamos      

                    document.getElementById("idTGeneraBaja").disabled = true;
                    document.getElementById("idTGeneraBaja").value = "2";
                    document.getElementById("idTGeneraBaja").readOnly = true;

                    document.getElementById("FEmisionBRegistro").type = "text";
                    document.getElementById("FEmisionBRegistro").value = "";
                    document.getElementById("FEmisionBRegistro").readOnly = true;

                    document.getElementById("numResolucionRegistro").value = "";
                    document.getElementById("numResolucionRegistro").readOnly = true;

                    document.getElementById("FNotificacionPAsegurado").type = "text";
                    document.getElementById("FNotificacionPAsegurado").readOnly = true;

                    document.getElementById("piniciobaja").type = "text";
                    document.getElementById("piniciobaja").value = "";
                    document.getElementById("piniciobaja").readOnly = true;

                    document.getElementById("pfinbaja").type = "text";
                    document.getElementById("pfinbaja").value = "";
                    document.getElementById("pfinbaja").readOnly = true;

                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTRRBRegistro").value = "0";
                    document.getElementById("idTRRBRegistro").readOnly = true;

                    document.getElementById("FEnvioCFinanzasBRegistro").type = "text";
                    document.getElementById("FEnvioCFinanzasBRegistro").readOnly = true;

                    document.getElementById("numCartaFinanzasBRegistro").value = "";
                    document.getElementById("numCartaFinanzasBRegistro").readOnly = true;
                }
            }
        </script>


    </head>
    <body>
        <h4><?PHP
            echo 'Bienvenid@<br>' . utf8_decode($row['nombres']);
            echo '<BR>OFICINA: ' . utf8_decode($row['OFICINA']);
            $idOficinaUsuario = utf8_decode($row['codOficina']);
            ?>  
            <br><a href="logout.php">Cerrar Session</a>
        </h4>                
        <br>
        <h1>FORMULARIO CONTROL POSTERIOR</h1>
        <h5>Datos Distribuidos a nivel Nacional dirigido a cada OSPE.
        </h5>        
        <div>            
            <!--Incrustar php
            <form action="" method="GET">-->

            <?php
            $dni = 0;
            if (isset($_POST['buscar'])) {
                $dni = $_POST['dni'];
            }
            $idtusuario = $_SESSION['usuario'];
            //incluir el archivo de conexion
            include 'conexion.php';
            //realizando una consulta usando la clausula select

            $query = "SELECT 
                        m.idTMaestra as id, o.idOficinaT, 
                        o.oficina, o.codOficina as codOficina,
                        s.sectoristas, 
                        v.Verificacion, 
                        tp.VerificacionPerfil, 
                        ifnull(vh.idTVinculoDh,''),
                        ifnull(m.idTentidad_TPersona, ''), 
                        ifnull(vv.nomyApellidos, ' ') as nomyApellidos, 
                        ifnull(m.idTCPosterior, ''), 
                        ifnull(m.idTVerificadores, ''), 
                        ifnull(m.idTVerificacion, ''), 
                        ifnull(m.obsSGVCA,'')
                        FROM tmaestra m
                            left join oficinat o on m.idOficinaT=o.idOficinaT
                            left join tsectoristas s on o.idTSectoristas=s.idTSectoristas
                            left join tverificacion v on m.idTVerificacion=v.idTVerificacion
                            left join tverificacionperfil tp on m.idTVerificacionPerfil=tp.idTVerificacionPerfil
                            left join tvinculodh vh on m.idTVinculoDh=vh.idTVinculoDh
                            left join tverificadores vv on m.idTVerificadores=vv.idTVerificadores
                        where m.idTMaestra=( 
                            SELECT m.idTMaestra
                            FROM tmaestra m	
                            where m.idTVinculoDh=
                                (SELECT tv.idTVinculoDh 
                                FROM tvinculodh tv
				left join tpersona p on tv.idTPersonaT=p.idTPersona
				where p.numDocIdentidad='$dni')
                            or m.idTentidad_TPersona=
                                (SELECT tt.idTentidad_TPersona
                                FROM tentidad_tpersona tt
				left join tpersona p on tt.idTPersona=p.idTPersona
				where p.numDocIdentidad='$dni'))";

            $queryT = "SELECT 
                        concat(p.pape, ' ',  p.sape, ' ',p.pnom, ' ', ifnull(p.snom, '')) as datos, p.numDocIdentidad as dni
                        FROM tpersona p
                        where p.numDocIdentidad='$dni'";


            $query1 = "SELECT w.idTVinculoDh, 
                                tv.descripcion as vinculo,
                                p1.idTtdocidentidad as tdocdh, p1.numDocIdentidad as dni, 
                                concat(p1.pape, ' ',  p1.sape, ' ',p1.pnom, ' ', ifnull(p1.snom, ' ')) as DH
                                FROM tvinculodh w
                                inner join tpersona p on w.idTPersonaT=p.idTPersona
                                inner join ttipovinculo tv on w.idTTipoVinculo=tv.idTTipoVinculo
                                inner join tpersona p1 on w.idTPersonaDh=p1.idTPersona
                                where p.numDocIdentidad='$dni'";

            $query2 = "SELECT te.numentidad as ruc, te.nombreEntidad
                               FROM tpersona t                                
                               left join tentidad_tpersona tt on tt.idTPersona=t.idTPersona                                
                               left join tentidad te on tt.idTentidad=te.idTentidad
                               where t.numDocIdentidad='$dni'";

            $query3 = "SELECT 
                        m.idTCPosterior
                        FROM tmaestra m
                                left join oficinat o on m.idOficinaT=o.idOficinaT
                                left join tsectoristas s on m.idTSectoristas=s.idTSectoristas
                            left join tverificacion v on m.idTVerificacion=v.idTVerificacion
                            left join tverificacionperfil tp on m.idTVerificacionPerfil=tp.idTVerificacionPerfil
                            left join tvinculodh vh on m.idTVinculoDh=vh.idTVinculoDh
                        where m.idTVinculoDh=
                                (SELECT tv.idTVinculoDh 
                                FROM tvinculodh tv
                                left join tpersona p on tv.idTPersonaT=p.idTPersona
                                where p.numDocIdentidad='$dni')
                        or m.idTentidad_TPersona=
                                (SELECT tt.idTentidad_TPersona
                                FROM tentidad_tpersona tt
                                left join tpersona p on tt.idTPersona=p.idTPersona
                                where p.numDocIdentidad='$dni')";


            $query4 = "SELECT c.idTCPosterior, te.EstadoActual, tg.GeneraBaja, c.FEmisionBRegistro, c.numResolucionRegistro, c.FNotificacionPAsegurado, tr.RRBRegistro, c.FEnvioCFinanzasBRegistro, c.numCartaFinanzasBRegistro, c.obsOSPE
                        FROM tcposterior c
                        left join testadoactual te on c.idTEstadoActual=te.idTEstadoActual
                        left join tgenerabaja tg on c.idTGeneraBRegistro=tg.idTGeneraBaja
                        left join trrbregistro tr on c.idTRRBRegistro=tr.idTRRBRegistro
                        where c.idTCPosterior=(SELECT m.idTCPosterior
                        FROM tmaestra m	
                        where m.idTVinculoDh=
                                (SELECT tv.idTVinculoDh 
                                FROM tvinculodh tv
                                left join tpersona p on tv.idTPersonaT=p.idTPersona
                                where p.numDocIdentidad='$dni')
                        or m.idTentidad_TPersona=
                                (SELECT tt.idTentidad_TPersona
                                FROM tentidad_tpersona tt
                                left join tpersona p on tt.idTPersona=p.idTPersona
                                where p.numDocIdentidad='$dni')
                        )";

//            $query5 = "SELECT m.idTVerificacion as verificacion
//                        FROM tmaestra m	
//                        where m.idTVinculoDh=
//                                (SELECT tv.idTVinculoDh 
//                                FROM tvinculodh tv
//                                left join tpersona p on tv.idTPersonaT=p.idTPersona
//                                where p.numDocIdentidad='$dni')
//                        or m.idTentidad_TPersona=
//                                (SELECT tt.idTentidad_TPersona
//                                FROM tentidad_tpersona tt
//                                left join tpersona p on tt.idTPersona=p.idTPersona
//                                where p.numDocIdentidad='$dni')";


            $query6 = "SELECT IFNULL(m.idTCPosterior,false) as POS, m.idTVerificacion as verificacion
                        FROM tmaestra m	
                        where m.idTVinculoDh=
                                (SELECT tv.idTVinculoDh 
                                FROM tvinculodh tv
                                left join tpersona p on tv.idTPersonaT=p.idTPersona
                                where p.numDocIdentidad='$dni')
                        or m.idTentidad_TPersona=
                                (SELECT tt.idTentidad_TPersona
                                FROM tentidad_tpersona tt
                                left join tpersona p on tt.idTPersona=p.idTPersona
                                where p.numDocIdentidad='$dni')";

            $query7 = "SELECT IFNULL(m.idTMverificacion,false) as PVER, m.idTVerificacion as verificacion
                        FROM tmaestra m	
                        where m.idTVinculoDh=
                                (SELECT tv.idTVinculoDh 
                                FROM tvinculodh tv
                                left join tpersona p on tv.idTPersonaT=p.idTPersona
                                where p.numDocIdentidad='$dni')
                        or m.idTentidad_TPersona=
                                (SELECT tt.idTentidad_TPersona
                                FROM tentidad_tpersona tt
                                left join tpersona p on tt.idTPersona=p.idTPersona
                                where p.numDocIdentidad='$dni')";
            ?>            

            <form name="form" action="" method="POST">

                INGRESE EL DNI: 
                <input type="text" name="dni"><input type="submit" name="buscar" value="Buscar">


            </form>
            <h5>
                DATOS DEL REGISTRO SOLICITADO
            </h5>
            <form name="form" action="grabar.php" method="POST">

                <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">  

                    <?php
                    //Obteniendo el conjunto de resultados
                    $result = $conexion->query($query);
                    //recorriendo el conjunto de resultados con un bucle
                    if ($conexion->query($query)) {
                        while ($fila = $result->fetch_assoc()) {
                            $idOficinaCaso = $fila['codOficina'];
                            ?>

                            <tr>
                                <th id="th1" scope="row" class="especial" colspan="4">
                                    DATOS DE LA VERIFICACION
                                </th>
                            </tr>

                            <tr>
                                <th scope="row" class="especial">
                                    Nº DE CORRELATIVO
                                </th>
                                <td id="td1"><input id="i1" type="text" name="id" value="<?php echo $fila['id'] ?>" readonly>
                                </td>
                                <th scope="row" class="especial">
                                    OFICINA
                                </th>
                                <td id="td1"><input id="i1" type="text" size="50" name="oficina" value="<?php echo $fila['oficina'] ?>" readonly>
                            </tr>
                            <tr>  
                                <th scope="row" class="especial">
                                    TIPO DE VERIFICACION
                                </th>
                                <td id="td1">
                                    <input id="i1" type="text" name="Verificacion" size="50" value="<?php echo $fila['Verificacion'] ?>" readonly>
                                <th scope="row" class="especial">
                                    PERFIL DE VERIFICACION
                                </th>
                                <td id="td1"><input id="i1" type="text" name="VerificacionPerfil" size="50" value="<?php echo $fila['VerificacionPerfil'] ?>" readonly>                              
                            </tr> 

                            <tr>
                                <th scope="row" class="especial">
                                    SECTORISTA
                                </th>
                                <td id="td1"><input id="i1" type="text" name="sectoristas" size="50" value="<?php echo $fila['sectoristas'] ?>" readonly>                             
                            </tr>
                            <tr>
                                <th scope="row" class="especial">
                                    VERIFICADOR
                                </th>
                                <td id="td1"><input id="i1" type="text" name="nomyApellidos" size="50" value="<?php echo $fila['nomyApellidos'] ?>" readonly>                             
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo 'Error al cargar';
                    }
                    //liberando los recursos
                    $result->free();
                    ?> 
                    <?php
                    //Obteniendo el conjunto de resultados
                    $resultT = $conexion->query($queryT);
                    //recorriendo el conjunto de resultados con un bucle
                    if ($conexion->query($queryT)) {
                        while ($fila = $resultT->fetch_assoc()) {
                            ?>        
                            <tr>
                                <th id="th1" scope="row" class="especial" colspan="4">
                                    TITULAR
                                </th>  
                            </tr>
                            <tr>
                                <th class="especial">
                                    APELLIDOS Y NOMBRES
                                </th>
                                <td colspan="2" id="td1"><input id="i1" type="text" name="datos" size="50" value="<?php echo $fila['datos'] ?>" readonly>                            
                            </tr>
                            <tr>
                                <th class="especial">
                                    DOCUMENTO IDENTIDAD
                                </th>
                                <td colspan="2" id="td1">
                                    <a href="#" id="dni" onclick="MyWindow = window.open('formularioPersona.php?dni=<?php echo $fila['dni'] ?>', 'MyWindow', width = 600, height = 300);
                                            return false;">
                                        <?php echo $fila['dni'] ?></a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo 'Error al cargar';
                    }
                    //liberando los recursos
                    $resultT->free();
                    ?> 

                    <?php
                    $result1 = $conexion->query($query1);
                    //recorriendo el conjunto de resultados con un bucle
                    if ($conexion->query($query1)) {
                        while ($fila = $result1->fetch_assoc()) {
                            ?>   

                            <tr>
                                <th id="th1" scope="row" class="especial" colspan="4">
                                    DERECHO HABIENTE
                                </th>                                               
                            </tr>

                            <tr>                               
                                <th class="especial">
                                    TIPO DE VINCULO DEL DH
                                </th>      
                                <td colspan="2" id="td1"><input id="i1" type="text" name="vinculo" size="50" value="<?php echo $fila['vinculo'] ?>" readonly>       
                            </tr>

                            <tr>
                                <th class="especial">
                                    APELLIDOS Y NOMBRES
                                </th>
                                <td colspan="2" id="td1"><input id="i1" type="text" size="50" name="DH" value="<?php echo $fila['DH'] ?>" readonly>                            
                            </tr>
                            <tr>
                                <th class="especial">
                                    DOCUMENTO IDENTIDAD
                                </th>
                                <td colspan="2" id="td1">
                                    <a href="#" id="dni" onclick="MyWindow = window.open('formularioPersona.php?dni=<?php echo $fila['dni'] ?>', 'MyWindow', width = 600, height = 300);
                                            return false;">
                                        <?php echo $fila['dni'] ?></a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo 'Error al cargar';
                    }
                    //liberando los recursos
                    $result1->free();
                    ?> 

                    <?php
                    $result2 = $conexion->query($query2);
                    //recorriendo el conjunto de resultados con un bucle
                    if ($conexion->query($query2)) {
                        while ($fila = $result2->fetch_assoc()) {
                            ?>   
                            <tr>
                                <th id="th1" scope="row" class="especial" colspan="4">
                                    EMPRESA
                                </th>                                               
                            </tr>
                            <tr>
                                <th class="especial">
                                    NOMBRE FISCAL
                                </th>
                                <td colspan="2" id="td1"><input id="i1" type="text" size="50" name="nombreEntidad" value="<?php echo $fila['nombreEntidad'] ?>" readonly>                              
                            </tr>
                            <tr>
                                <th class="especial">
                                    RUC
                                </th>
                                <td id="td1">
                                    <a href="#" id="ruc" onclick="MyWindow = window.open('formEntidades.php?ruc=<?php echo $fila['ruc'] ?>', 'MyWindow', width = 100, height = 100);
                                            return false;">
                                        <?php echo $fila['ruc'] ?></a></td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo 'Error al cargar';
                    }
                    //liberando los recursos
                    $result2->free();
                    ?> 
                </table> 
                <br>
                <?php
                $result4 = $conexion->query($query4);
                //recorriendo el conjunto de resultados con un bucle
                if ($conexion->query($query4)) {
                    while ($fila = $result4->fetch_assoc()) {
                        echo '<br>id Oficina: ', $idOficinaCaso;
                        echo '<br>id UsuarioOfi: ', $idOficinaUsuario;
                        ?>  
                        <table id="t1" border="1" summary="Rellena Formulario">
                            <tr>
                                <th id="th1" scope="row" class="especial" colspan="4">
                                    Control Posterior
                                </th>                                               
                            </tr>

                            <tr><th class="especial">
                                    Estado Actual
                                </th>
                                <td colspan="2" id="td1">    
                                    <?php echo $fila['EstadoActual'] ?>
                                </td>                                             
                            </tr>
                            <tr>
                                <th class="especial">
                                    Genera Baja
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['GeneraBaja'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Fecha de Emision Baja de Registro
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['FEmisionBRegistro'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Numero Resolucion Registro
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['numResolucionRegistro'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Fecha Notificacion P Asegurado
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['FNotificacionPAsegurado'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    RRBRegistro
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['RRBRegistro'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Fecha Envio Carta a Finanzas Baja Registro
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['FEnvioCFinanzasBRegistro'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Numero Carta Finanzas Baja Registro
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['numCartaFinanzasBRegistro'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="especial">
                                    Observaciones OSPE
                                </th>
                                <td colspan="2" id="td1">                             
                                    <?php echo $fila['obsOSPE'] ?>
                                </td>
                            </tr>

                            <?php
                            if ($idOficinaCaso == $idOficinaUsuario) {
                                ?>
                                <td id="td1">
                                    <a href="#" id="ruc" onclick="MyWindow = window.open('formEditarCPosterior.php?idTCPosterior=<?php echo $fila['idTCPosterior'] ?>&idtusuario=<?php echo $idtusuario ?>', 'MyWindow', width = 100, height = 100);
                                                return false;">
                                        Editar Control Posterior</a></td>
                                <?php
                            } else {
                                ?>
                                <?php
                            }
                            ?>  
                            </tr>
                        </table>
                        <br>
        <?php
    }
} else {
    echo 'Error al cargar';
}
//liberando los recursos
$result4->free();
?>         


<?php
$result6 = $conexion->query($query6);
//recorriendo el conjunto de resultados con un bucle
if ($conexion->query($query6)) {
    while ($fila = $result6->fetch_assoc()) {
        if ($fila['POS'] == '0' && $fila['verificacion'] == '1') {
            echo $fila['POS'];
            echo $fila['verificacion'];
            echo '<br>id Oficina: ', $idOficinaCaso;
            echo '<br>id UsuarioOfi: ', $idOficinaUsuario;
            ?>  
                            <table id="t1" border="1" summary="Rellena Formulario"> 
                                <?php
                                        if ($idOficinaCaso == $idOficinaUsuario) {
                                            ?>
                                <tr>
                                    <th id="th1" scope="row" class="especial" colspan="4">
                                        INGRESE LOS DATOS BASICOS PARA EL REGISTRO
                                    </th>
                                </tr> 
                                <tr> <td>
                                        ESTADO ACTUAL
                                    </td>
                                    <td>
                                        <select name = "idTEstadoActual" onchange="habilitar22(this.value);" id = "idTEstadoActual">
                                            <option value = '1'>PENDIENTE</option>
                                            <option value = '2'>EN PROCESO</option>
                                            <option value = '3'>TERMINADO</option>
                                            <option value = '4'>ARCHIVADO</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr> <td>
                                        GENERA BAJA</td>
                                    <td><select name = "idTGeneraBaja" onchange="habilitar(this.value);" id="idTGeneraBaja">
                                            <option value="0">--</option>
                                            <option value="1">SI</option>
                                            <option value="2">NO</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr><td>
                                        FECHA DE EMISION DE BAJA OFICIO
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FEmisionBRegistro" min="0001-01-01" id="FEmisionBRegistro"><br></TD>
                                </tr>
                                <tr>
                                    <td>Nº RESOLUCION DE BAJA DE OFICIO</td>
                                    <td><input type = "number" name = "numResolucionRegistro" id="numResolucionRegistro"></td>
                                </tr>
                                <tr><td>
                                        FECHA P INICIA BAJA
                                    </td>
                                    <TD>
                                        <input type = "date" name = "piniciobaja" id="piniciobaja"
                                               min="0001-01-01"><br></TD>
                                </tr>
                                <tr><td>
                                        FECHA P FIN BAJA
                                    </td>
                                    <TD>
                                        <input type = "date" name = "pfinbaja" id="pfinbaja"
                                               min="0001-01-01"><br></TD>
                                </tr>

                                <tr><td>
                                        FECHA NOTIFICACION PERSONAL ASEGURADO
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FNotificacionPAsegurado" id="FNotificacionPAsegurado"
                                               min="0001-01-01"><br></TD>
                                </tr>
                                <tr> <td>
                                        ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
                                    <td><select name = "idTRRBRegistro" id="idTRRBRegistro">
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
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>
                                        FECHA DE ENVIO DE CARTA A <br>FINANZAS POR RECUPERO BAJA
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FEnvioCFinanzasBRegistro" id="FEnvioCFinanzasBRegistro"
                                               min="0001-01-01"><br></TD>
                                </tr>
                                <tr>
                                    <td>NºCARTA A FINANZAS POR RECUPERO BAJA</td>
                                    <td><input type = "number" name = "numCartaFinanzasBRegistro" id="numCartaFinanzasBRegistro"></td>
                                </tr>                   
                                <tr>
                                    <td>
                                        OBSERVACIONES
                                    </td>
                                    <td>
                                        <textarea rows = "4" cols = "80" name = "obsOSPE" id="obsOSPE"></textarea><br>
                                    </td>
                                </tr>
                                <tr><td>
                                        USUARIO
                                    </td>
                                    <TD>
                                        <input type = "TEXT" value = "<?php echo $idtusuario ?>" name = "idtusuario" readonly="readonly"><br></TD>
                                </tr> 
                                <tr align = "center">
                                    <td colspan = "2">
                                        
                                            <input type = "submit" name = "grabarCP" value = "Grabar" ></td>
                                            <?php
                                        } else {
                                            ?>                                    
                                        <?php
                                        echo '<br>USUARIO NO AUTORIZADO!';
                                    }
                                    ?>  
                                </tr>
                            </table>



                                <?php
                            }
                        }
                    }
                    $result6->free();
                    ?>	                	

                <?php
                $result7 = $conexion->query($query7);
                //recorriendo el conjunto de resultados con un bucle
                if ($conexion->query($query7)) {
                    while ($fila = $result7->fetch_assoc()) {
                        if ($fila['PVER'] == '0' && $fila['verificacion'] == '2') {
                            echo $fila['PVER'];
                            echo $fila['verificacion'];
                            echo "SE VAAA A CAMBIAR TODO";
                            ?>  
                            <table id="t1" border="1" summary="Rellena Formulario"> 
                                <tr>
                                    <th id="th1" scope="row" class="especial" colspan="4">
                                        INGRESE LOS DATOS BASICOS PARA EL REGISTRO
                                    </th>
                                </tr> 

                                <tr> <td>
                                        AÑO GENERACION DEL CASO</td>
                                    <td><select name = "anocaso" id="idTGeneraBaja">
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>                                            
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        N° DE CASO DE LA ORDEN VERIFICACION (OV)
                                    </td>
                                    <TD>
                                        <input type = "number" name = "nov"><br></TD>
                                </tr>

                                <tr>
                                    <td>
                                        SECUENCIA DEL SUFIJO DE LA ORDEN DE VERIFICACION (OV)
                                    </td>
                                    <TD>
                                        <input type = "number" name = "sov"><br></TD>
                                </tr>

                                <tr>
                                    <td>Nº ORDEN DE VERIFICACIÓN</td>
                                    <td><input type = "number" name = "numOrdenVerificacion" id="numOrdenVerificacciono"></td>
                                </tr>

                                <tr><td>
                                        FECHA EMISION DE LA ORDEN DE VERIFICACIÓN (OV)
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FEmisionOV" id="FEmisionOV"
                                               min="0001-01-01"><br></TD>
                                </tr>    

                                <tr><td>
                                        FECHA DE NOTIFICACIÓN OV AL EMPLEADOR
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FNotOvEmpleador" id="FNotOvEmpleador"
                                               min="0001-01-01"><br></TD>
                                </tr>   

                                <tr><td>
                                        FECHA DE NOTIFICACIÓN OV AL ASEGURADO
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FNotOvAsegurado" id="FNotOvAsegurado"
                                               min="0001-01-01"><br></TD>
                                </tr> 

                                <tr><td>
                                        FECHA DE LA ULTIMA ACTA O DJ TOMADA
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FUltActaTomada" id="FUltActaTomada"
                                               min="0001-01-01"><br></TD>
                                </tr> 
                                <tr><td>
                                        FECHA DE ENTREGA INFORME FINAL AL JEFE DE OSPE
                                    </td>
                                    <TD>
                                        <input type = "date" name = "EntregaIFOSPE" id="EntregaIFOSPE"
                                               min="0001-01-01"><br></TD>
                                </tr> 

                                <tr><td>
                                        FECHA APROBACION POR JEFE DE OSPE DE INFORME FINAL
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FDevIF" id="FDevIF"
                                               min="0001-01-01"><br></TD>
                                </tr> 


                                <tr> <td>
                                        TIPO DE ACTO RESOLUTIVO / DERIVADO / INFORME FINAL</td>
                                    <td><select name = "idTAResol" id="idTAResol">
                                            <option value = "0"></option>
                                            <option value = "1">RESOLUCION DE BAJA</option>
                                            <option value = "2">RESOLUCION DE MULTA</option>
                                            <option value = "3">RESOLUCION DE INHABILITACION</option>
                                            <option value = "4">DERIVADO</option>
                                            <option value = "5">INFORME FINAL</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr><td>
                                        FECHA DE CASO DERIVADO
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FCasoDerivado" id="FCasoDerivado"
                                               min="0001-01-01"><br></TD>
                                </tr>

                                <tr> <td>
                                        CASO DERIVADO A LA OSPE</td>
                                    <td><select name = "idTAResol" id="idTAResol">
                                            <option value = "0"></option>
                                            <option value = "1">AMAZONAS</option>
                                            <option value = "2">ANCASH</option>
                                            <option value = "3">APURIMAC</option>
                                            <option value = "4">AREQUIPA</option>
                                            <option value = "5">AYACUCHO</option>
                                            <option value = "6">CAJAMARCA</option>
                                            <option value = "7">CUSCO</option>
                                            <option value = "8">HUANCAVELICA</option>
                                            <option value = "9">HUANUCO</option>
                                            <option value = "10">ICA</option>
                                            <option value = "11">JUNIN</option>
                                            <option value = "12">LA LIBERTAD</option>
                                            <option value = "13">LAMBAYEQUE</option>
                                            <option value = "14">LORETO</option>
                                            <option value = "15">MADRE DE DIOS</option>
                                            <option value = "16">MOQUEGUA</option>
                                            <option value = "17">PASCO</option>
                                            <option value = "18">PIURA</option>
                                            <option value = "19">PUNO</option>
                                            <option value = "20">SAN MARTIN</option>
                                            <option value = "21">TACNA</option>
                                            <option value = "22">TUMBES/option>
                                            <option value = "23">UCAYALI</option>
                                            <option value = "24">CORPORATIVA</option>
                                            <option value = "25">JESUS MARIA</option>
                                            <option value = "26">SAN ISIDRO</option>
                                            <option value = "27">SAN MIGUEL</option>
                                            <option value = "28">HUACHO</option>
                                            <option value = "29">JULIACA</option>
                                            <option value = "30">MOYOBAMBA</option>


                                        </select>
                                    </td>
                                </tr>

                                <tr><td>
                                        FECHA DE NOTIFICACION CARTA CUMPLIMIENTO O ARCHIVO
                                    </td>
                                    <TD>
                                        <input type = "date" name = "FNotCartaArch" id="FNotCartaArch"
                                               min="0001-01-01"><br></TD>
                                </tr>

                                <TR>
                                    <td>
                                        OBSERVACIONES OSPE
                                    </td>
                                    <td>
                                        <textarea rows = "4" cols = "80" name = "obsOSPE" id="obsOSPE"></textarea><br>
                                    </td>
                                </tr>

                                <TR>
                                    <td>
                                        OBSERVACIONES SGVCA
                                    </td>
                                    <td>
                                        <textarea rows = "4" cols = "80" name = "obsSGVCA" id="obsSGVCA"></textarea><br>
                                    </td>
                                </tr>

                                <tr align = "center">
                                    <td colspan = "2">
                                        <input type = "submit" name = "grabarVere" value = "Grabar"></td>
                                </tr>
                                <tr>                                
                            </table>
            <?php
        }
    }
}
$result7->free();

$conexion->close()
?>
            </form>   
        </div>        
    </body>
</html>