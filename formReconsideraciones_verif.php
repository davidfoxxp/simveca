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

//$sql = "SELECT o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
//        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, concat(o.nomenclatura, ' ', o.oficina) AS OFICINA
//        FROM dim_usuario u 
//        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
//        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();

$iddim_Verificacion = $_GET['iddim_Verificacion'];


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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="../SISGASV/css/bootstrapform.css" media="screen">
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script> 
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <link rel="stylesheet" href="../SISGASV/css/dist/css/bootstrap.min.css" media="screen">
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
                background-color: aliceblue;
               
            }
            
            #t2 {
                text-align:center;
                background-color: aliceblue;
               
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
                font-size: 12px;
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
        <script>
            $(function () {
                $("#dialog1").hide();
                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 260,
                        width: 450,
                        scrollbars: false,
                        toolbar: false,
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

            .tooltip {
                position: relative;
                display: inline-block;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 140px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -75px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
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
        //  $ano = utf8_decode($row2['an_verifi']);
        // $num_verifi = utf8_decode($row2['num_verifi']);
        // $numero = utf8_decode($row2['numero']);
        // $ordenV00 = utf8_decode($row2['ordenV']);
        // $numResBOficio = utf8_decode($row2['numResBOficio']);
        $hoy = getdate();

        $nuevo_oficna = "";
        $newInicioPFinal = "";
        $newFinPFinal = "";
        //$iddim_CPosterior="20363";
        // $nombre_pdf_multa = $num_verifi . $dniait . $eempleadora . $cod_oficinaIni;
        ?> 
        
        <table>
            <tr>
                    <h2>ESTADOS DE LA RESOLUCION</h2>
                    </tr>
            <tr>
                <td>
                    <label>
                        *Si ingresa el estado FIRME Y CONSENTIDA, ya no podra ingresar mas estados.
                    </label>
                </td>
            </tr>
        </table>

        
          
        <!--Incrustar php-->
        <?php
        // $iddim_Verificacion = $_GET['iddim_Verificacion'];
        //incluir el archivo de conexion
        include './conexionesbd/conexion_mysql.php';
        //realizando una consulta usando la clausula select
        $query1 = "SELECT dr.iddim_ResBOficio,
                            ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,                      
                            dr.fechaActFirme,
                            dr.factofirme,
                            trr.idTRRBRegistro idTRRBRegistroV,
                            trr.RRBRegistro RRBRegistroV,
                            dr.numResBOficio,
                            rr.iddim_Reconsideracion,
                            rr.Resolucion, rr.idTRRBRegistro idTRRBRegistroREC, rr.fechaReconsideracion,
                            rr.fechaReconsideracion1,rr.fechaReconsideracion2,
                            trrr.RRBRegistro RRBRegistroREC
                            FROM dim_resboficio dr
                            left join dim_aseguradoindevido ai on dr.iddim_ResBOficio=ai.iddim_aseguradoindevido
                            left join tiporrbregistro trr on dr.idTRRBRegistro=trr.idTRRBRegistro
                            left join dim_reconsideracion rr on dr.iddim_ResBOficio=rr.iddim_ResBOficio
                            left join tiporrbregistro trrr on rr.idTRRBRegistro=trrr.idTRRBRegistro
                            where dr.iddim_ResBOficio='$iddim_Verificacion'";
        
                $query2 = "SELECT MIN(dr.idTRRBRegistro) idTRRBRegistroMIN
                            FROM dim_reconsideracion dr
                            where dr.iddim_ResBOficio='$iddim_Verificacion'";


        //Obteniendo el conjunto de resultados
        $result = $conexionmysql->query($query1);
        //recorriendo el conjunto de resultados con un bucle
            $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $i++;
            $nuevo_oficna = $fila['idDIM_Oficina'];
            
            if (!is_null($fila['iddim_Reconsideracion'])) {
                
                ?>

                <?php
                $hoy = getdate();
                //echo $hoy = date("m/Y"); 
                ?>
        <form name="form2" action="" method="POST">  
        <table id="t1" border="1" summary="Rellena Formulario">
            <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
            <input id="i1" type="hidden" name="iddim_Reconsideracion" size="50" value="<?php echo $fila['iddim_Reconsideracion'] ?>" readOnly="readOnly">  
            <input id="i1" type="hidden" name="id" size="50" value="<?php echo $i ?>" readOnly="readOnly">  
                    <tr>
                        <td id="tho" class="especial"style="width: 200px">
                            ESTADO DE LA RESOLUCION*** 
                        </td>

                            <td id="td1" style="width: 350px">
                                <?php echo $fila['RRBRegistroREC'] ?>   
                            </td>
                    </tr>

                    <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA DE PRESENTACION DEL RECURSO</td>

                        <?php if (is_null($fila['fechaReconsideracion'])) { ?>    
                            <td id="td1">   
                                <input type = "date" name = "fechaReconsideracion" id="fnotificacionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1900-01-01">
                            </td>  
                            <?php
                        } else {
                            ?>
                            <td id="td1" style="width: 350px">
                                <?php echo $fila['fechaReconsideracion'] ?>   
                            </td>        
                            <?php
                        }
                        ?>
                   </tr>
                   
<!--                   <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA DE EMISION DE RESOLUCION</td>

                        <?php if (is_null($fila['fechaReconsideracion1'])) { ?> 
                            <td id="td1">   
                                <input type = "date" name = "fechaReconsideracion_n<?php echo $i?>" id=""
                                       min="1900-01-01">
                            </td>
                            <?php
                        } else {
                            ?>                          
                            <td id="td1" style="width: 350px">
                                <input type = "date" name = "fechaReconsideracion_n<?php echo $i?>" id=""
                                       min="1900-01-01" value="<?php echo $fila['fechaReconsideracion1'] ?>" readonly="">                                   
                            </td>  
                            <?php
                        }
                        ?>
                   </tr>
                   
                   <tr>
                        <td id="tho" class="especial" style="width: 200px">
                            FECHA DE NOTIFICACION DE LA RESOLUCION</td>

                        <?php if (is_null($fila['fechaReconsideracion2'])) { ?>                           
                            <td id="td1">   
                                <input type = "date" name = "fechaReconsideracion_nm<?php echo $i?>" id=""
                                       min="1900-01-01">
                            </td>

                            <?php
                        } else {
                            ?>                          
                            <td id="td1" style="width: 350px">
                                 <input type = "date" name = "fechaReconsideracion_nm<?php echo $i?>" id=""
                                        min="1900-01-01" value="<?php echo $fila['fechaReconsideracion2'] ?>" readonly>                                
                            </td>  
                            <?php
                        }
                        ?>
                   </tr>-->
                <?PHP
        
        ?>
                   <?php if ($nuevo_oficna == $idOficinaUsuario) { ?>

<!--                    <tr>
                        <td colspan="2">
                    <div class="input-group mb-3" style="width: 60%">
                        <div class="input-group-prepend">
                            <button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" class="button button2">Actualizar</button>
                        </div>
                    </div>
                            </td>                            
                    </tr>-->
    <?php
        }
        ?>
                   
        </table> 
             </form>
                    <?php
            }
        }
        ?>
        
        <?php
        $result2 = $conexionmysql->query($query2);
        //recorriendo el conjunto de resultados con un bucle idTRRBRegistroMIN

        while ($fila2 = $result2->fetch_assoc()) {
            $idTRRBRegistroMIN=$fila2['idTRRBRegistroMIN'];
            //echo $idTRRBRegistroMIN;
            if ($idTRRBRegistroMIN!=1) {  
        ?>
        
        <br>  
        <form name="form2" action="" method="POST" style="border: outset;">  
            <table id="t1" summary="Rellena Formulario" >
                <tr>
                <h2>INGRESAR MAS ESTADOS</h2>
                </tr>
                
                <tr>
                <div class="input-group mb-3" style="width: 60%">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">ESTADO DE LA RESOLUCION* </label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name = "idTRRBRegistroREC_n" required="">
                                    <option value = ""></option>                                    
                                    <option value = "22">FUNDADO - RECONSIDERACION</option>
                                    <option value = "23">INFUNDADO - RECONSIDERACION</option>
                                    <option value = "24">IMPROCEDENTE - RECONSIDERACION</option>
                                    <option value = "25">FUNDADO - APELACION</option>
                                    <option value = "26">INFUNDADO - APELACION</option>
                                    <option value = "27">IMPROCEDENTE - APELACION</option>
                                    <option value = "1">FIRME Y CONSENTIDA</option>
                    </select>
                </div>
                </tr>  
                <tr>

                <div class="input-group mb-3" style="width: 60%">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">FECHA DE PRESENTACION DEL RECURSO*</label>
                    </div>
                    <input class="custom-select" id="inputGroupSelect01" type = "date" name = "fechaReconsideracion_n" id="fechaReconsideracion_n" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                           min="1900-01-01" value="" required>
                </div>
                
<!--                <div class="input-group mb-3" style="width: 60%">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">FECHA DE EMISION DE LA RESOLUCION</label>
                    </div>
                    <input class="custom-select" id="inputGroupSelect01" type = "date" name = "fechaReconsideracion_n1" id="fechaReconsideracion_n"
                           min="1900-01-01" value="">
                </div>
                
                <div class="input-group mb-3" style="width: 60%">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">FECHA DE NOTIFICACION DE LA RESOLUCION</label>
                    </div>
                    <input class="custom-select" id="inputGroupSelect01" type = "date" name = "fechaReconsideracion_nm2" id="fechaReconsideracion_n"
                           min="1900-01-01" value="">
                </div>-->

                </tr>



                <?php
                $result1 = $conexionmysql->query($query1);
                while ($fila2 = $result1->fetch_assoc()) {
                    ?>

                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_ResBOficio" size="50" value="<?php echo $fila2['iddim_ResBOficio'] ?>" readOnly="readOnly">  
                    <input type="hidden" name="numResBOficio" id="nResBRegistro" value="<?php echo $fila2['numResBOficio'] ?>" readonly="">


    <?php
}
?>

<?php if ($nuevo_oficna == $idOficinaUsuario) { ?>

                    <tr>

                    <div class="input-group mb-3" style="width: 60%">
                        <div class="input-group-prepend">
                            <button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "registrar" class="button button2">Registrar</button>

                        </div>
                    </div>
                    <div>
                        <h5>Se actualizara bajo su responsabilidad.
                        </h5> 
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
//liberando los recursos
//cerrando los recursos
                
                $result->free();
                
                $conexionmysql->close()
                ?>

        

    </body>
</html>
    
        <?php
        if (isset($_POST['actualizar'])) {

            include ('../SISGASV/conexionesbd/conexion_mysql.php');

            $iddim = $_POST['iddim_usuario'];
            $iddim_usuario = "'$iddim'";
            
            $iddim_Reconsideracion = $_POST['iddim_Reconsideracion'];
            $id = $_POST['id'];
            
            if($id==1) {
            if (empty($_POST['fechaReconsideracion_n1'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n1'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            } 
            
            if (empty($_POST['fechaReconsideracion_nm1'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm1'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            } 
            }
            if($id==2) {            
            if (empty($_POST['fechaReconsideracion_n2'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n2'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }
            if (empty($_POST['fechaReconsideracion_nm2'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm2'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            }    
            }
            if($id==3) {
            if (empty($_POST['fechaReconsideracion_n3'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n3'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }

            if (empty($_POST['fechaReconsideracion_nm3'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm3'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            }    
            }
            if($id==4) {            
            if (empty($_POST['fechaReconsideracion_n4'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n4'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }

            if (empty($_POST['fechaReconsideracion_nm4'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm4'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            }  
            }
            
            if($id==5) {
            if (empty($_POST['fechaReconsideracion_n5'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n5'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }

            if (empty($_POST['fechaReconsideracion_nm5'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm5'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            } 
            }
            
            if($id==6) {
            if (empty($_POST['fechaReconsideracion_n6'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n6'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }

            if (empty($_POST['fechaReconsideracion_nm6'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm6'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            }    
            }
            
            if($id==7) {
            if (empty($_POST['fechaReconsideracion_n7'])) {
                $fechaReconsideracion_n1 = 'NULL';
            } else {
                $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n7'];
                $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
            }

            if (empty($_POST['fechaReconsideracion_nm7'])) {
                $fechaReconsideracion_n2 = 'NULL';
            } else {
                $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm7'];
                $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
            }      
            }
//            $fechaReconsideracion_n1 = $_POST['fechaReconsideracion_n1'];
//            $fechaReconsideracion_n2 = $_POST['fechaReconsideracion_n2'];

//            $nResBRegistro = $_POST['nResBRegistro'];

            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";
 
            $query = "UPDATE dim_reconsideracion SET 
                                fechaReconsideracion1=$fechaReconsideracion_n1,
                                fechaReconsideracion2=$fechaReconsideracion_n2,                                
                                idtUsuario=$iddim_usuario, fActualizacion=$fecha_hora_update
                                WHERE iddim_Reconsideracion=$iddim_Reconsideracion";       

            if ($conexionmysql->query($query)) {           
                    echo 'Se Actualizo Correctamente.';
                    echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                }           
            else {                
            }
        }
    else
        if (isset($_POST['registrar'])) {

            include ('../SISGASV/conexionesbd/conexion_mysql.php');

            $iddim = $_POST['iddim_usuario'];
            $iddim_usuario = "'$iddim'";

            $iddim_ResBOficioo = $_POST['iddim_ResBOficio'];
            $iddim_ResBOficio = "'$iddim_ResBOficioo'";

            $idTRRBRegistroREC_n = $_POST['idTRRBRegistroREC_n'];
            $fechaReconsideracion_n = $_POST['fechaReconsideracion_n'];
            
            if (empty($_POST['fechaReconsideracion_n1'])) {
        $fechaReconsideracion_n1 = 'NULL';
    } else {
        $fechaReconsideracion_n11 = $_POST['fechaReconsideracion_n1'];
        $fechaReconsideracion_n1 = "'$fechaReconsideracion_n11'";
    }
    
    if (empty($_POST['fechaReconsideracion_nm2'])) {
        $fechaReconsideracion_n2 = 'NULL';
    } else {
        $fechaReconsideracion_n22 = $_POST['fechaReconsideracion_nm2'];
        $fechaReconsideracion_n2 = "'$fechaReconsideracion_n22'";
    }  

            $numResBOficio = $_POST['numResBOficio'];

            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";

            if($idTRRBRegistroREC_n==1) { 
                
                $query5 = "UPDATE dim_resboficio SET 
                                idTRRBRegistro=$idTRRBRegistroREC_n,                                
                                idtusuario=$iddim_usuario, fActualizacion=$fecha_hora_update
                                WHERE iddim_ResBOficio=$iddim_ResBOficio";
                
               $query4 = "ALTER TABLE dim_reconsideracion AUTO_INCREMENT = 1";

            $query3 = "INSERT INTO dim_reconsideracion (iddim_ResBOficio, Resolucion, idTRRBRegistro, fechaReconsideracion, fechaReconsideracion1, fechaReconsideracion2, idtUsuario, fCreacion) 
            VALUES ($iddim_ResBOficio, '$numResBOficio', $idTRRBRegistroREC_n, '$fechaReconsideracion_n', $fechaReconsideracion_n1, $fechaReconsideracion_n2, $iddim_usuario, $fecha_hora_update)";
            
            }
            else {
                
            $query5="ALTER TABLE dim_reconsideracion AUTO_INCREMENT = 1";
            
            $query4 = "ALTER TABLE dim_reconsideracion AUTO_INCREMENT = 1";

            $query3 = "INSERT INTO dim_reconsideracion (iddim_ResBOficio, Resolucion, idTRRBRegistro, fechaReconsideracion, fechaReconsideracion1, fechaReconsideracion2, idtUsuario, fCreacion) 
            VALUES ($iddim_ResBOficio, '$numResBOficio', $idTRRBRegistroREC_n, '$fechaReconsideracion_n', $fechaReconsideracion_n1, $fechaReconsideracion_n2, $iddim_usuario, $fecha_hora_update)";
            }

            if ($conexionmysql->query($query5)) {
            if ($conexionmysql->query($query4)) {
                if ($conexionmysql->query($query3)) {
                    echo 'Se Actualizo Correctamente.';
                    echo '<input onClick="javascript:window.history.back();" type="button" name="Submit" value="Atrás" />';
                }
            } }
            else {
                 echo 'NO';
            }
        }
        ?>