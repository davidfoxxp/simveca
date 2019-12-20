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
        <title></title>	
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
            
            .sinborde {
             border: 0;
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
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
               
                  background-color: #B0C4DE;
            }
            #th11 {
                font-family:Arial, sans-serif;
                font-size:14px;
                font-weight:normal;
                padding:10px 5px;                
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
                        modal: true,
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

            .sinborde {
                border: 0;
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
          
        
       ////////////////////////////////////VERIFICACION
       if(isset($_GET['iddim_Verificacion'])) {
  
           // $iddim_CPosterior = $_GET['iddim_CPosterior'];
         $iddim_Verificacion = $_GET['iddim_Verificacion'];
        
        ?> 
        
        <form name="form2" action="actualizarCPosterior_CFinanza.php" method="POST">
            <table id="t1" border="1" summary="Rellena Formulario">

                <tr>
                    <th id="th1" scope="row" class="especial" colspan="3">
                        ACTUALIZAR INFORMACION DE FINANZAS
                    </th>

                    <?php
                    $hoy = getdate();
                   // echo $hoy = date("d/m/Y");
                    ?>
                </tr>
                <!--Incrustar php-->
                <?php
                             
                //incluir el archivo de conexion
                include './conexionesbd/conexion_mysql.php';
                //realizando una consulta usando la clausula select
                $query = "SELECT ai.idDIM_Oficina, 
dc.iddim_CFinanzas, dc.iddim_CPosterior, 
dc.fecartafinanza1, dc.ncartafinanza1, dc.valorizacion1, dc.red_1,
dc.fecartafinanza2, dc.ncartafinanza2, dc.valorizacion2, dc.red_2,
dc.fecartafinanza3, dc.ncartafinanza3, dc.valorizacion3, dc.red_3,
dc.fecartafinanza4, dc.ncartafinanza4, dc.valorizacion4, dc.red_4,
dc.fecartafinanza5, dc.ncartafinanza5, dc.valorizacion5, dc.red_5,
dc.fCreacion, dc.fActualizacion
FROM dim_cfinanzas dc 
left join dim_aseguradoindevido ai on dc.iddim_Verificacion=ai.iddim_aseguradoindevido
where dc.iddim_Verificacion='$iddim_Verificacion'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila = $result->fetch_assoc()) {
                    $b_idDIM_Oficina = $fila["idDIM_Oficina"];
                    ?>                 
                    
                        <tr>
                        <input id="i1" type="HIDDEN" name="iddim_CFinanzas" size="50" value="<?php echo $fila['iddim_CFinanzas'] ?>" readOnly="readOnly"> 
                        <input id="i1" type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                        </tr>
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               1º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza1'])) { ?>    
                               <input type = "date" max="   
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza1" class="sinborde" required=""
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza1" class="sinborde" value="<?php echo $fila['fecartafinanza1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA PRIMERA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza1'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza1" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza1" class="sinborde" value="<?php echo $fila['ncartafinanza1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_1'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA PRIMERA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion1'])) { ?>    
                               <input type = "number" name = "valorizacion1" step="any" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion1" class="sinborde" value="<?php echo $fila['valorizacion1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                      
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               2º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza2'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza2" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza2" class="sinborde" value="<?php echo $fila['fecartafinanza2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA SEGUNDA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza2'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza2" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza2" class="sinborde" value="<?php echo $fila['ncartafinanza2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_2'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA SEGUNDA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion2'])) { ?>    
                               <input type = "number" name = "valorizacion2" class="sinborde" step="any"
                                      value = "<?php echo $fila["valorizacion2"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion2" class="sinborde" value="<?php echo $fila['valorizacion2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                    
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               3º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza3'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza3" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza3" class="sinborde" value="<?php echo $fila['fecartafinanza3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA TERCERA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza3'])) { ?>    
                                 <input type = "TEXT" name = "ncartafinanza3" class="sinborde">                                     
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza3" class="sinborde" value="<?php echo $fila['ncartafinanza3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_3'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "HIDDEN" name = "red_1" class="sinborde" value="<?php echo $fila['red_3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA TERCERA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion3'])) { ?>    
                               <input type = "number" name = "valorizacion3" class="sinborde" step="any" 
                                      value = "<?php echo $fila["valorizacion3"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion3" class="sinborde" value="<?php echo $fila['valorizacion3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                     
                        <tr><td class="especial" id="td1" style="width:350px;">
                               4º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza4'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza4" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza" value = "<?php echo $fila["fecartafinanza4"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza4" class="sinborde" value="<?php echo $fila['fecartafinanza4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA CUARTA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza4'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza4" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza4" class="sinborde" value="<?php echo $fila['ncartafinanza4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_4'])) { ?>  
                             <select  id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA CUARTA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion4'])) { ?>    
                                 <input type = "number" name = "valorizacion4" class="sinborde" step="any">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion4" class="sinborde" value="<?php echo $fila['valorizacion4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                     
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               5º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza5'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza5" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza5" class="sinborde" value="<?php echo $fila['fecartafinanza5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA QUINTA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza5'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza5" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza5" class="sinborde" value="<?php echo $fila['ncartafinanza5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_5'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA QUINTA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion5'])) { ?>    
                               <input type = "number" name = "valorizacion5" class="sinborde" step="any">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion5" class="sinborde" value="<?php echo $fila['valorizacion5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <?php
                    }
                    if ($b_idDIM_Oficina == $idOficinaUsuario) {
                        ?>
                        <tr>
                            <td colspan = "3" id="td2">

                                <!--<input type = "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar">-->
                                <button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" class="button button2">Actualizar</button><br>
                                <h5>Se actualizara bajo su responsabilidad.</h5>
                            </td>
                        </tr>                         
                        <?php
                    }
                    ?>
            </table> 
            
            
            
            
        </form>

        <?php
         }
         ///////////////////////////////////////POSTERIOR
        
             if(isset($_GET['iddim_CPosterior'])) {
                   $iddim_CPosterior = $_GET['iddim_CPosterior'];
        // $iddim_Verificacion = $_GET['iddim_Verificacion'];
                ?>
        
        <form name="form2" action="actualizarCPosterior_CFinanza.php" method="POST">
            <table id="t1" border="1" summary="Rellena Formulario">

                <tr>
                    <th id="th1" scope="row" class="especial" colspan="3">
                        ACTUALIZAR INFORMACION DE FINANZAS
                    </th>

                    <?php
                    $hoy = getdate();
                   // echo $hoy = date("d/m/Y");
                    ?>
                </tr>
                <!--Incrustar php-->
                <?php                             
                      //incluir el archivo de conexion
                include './conexionesbd/conexion_mysql.php';
                //realizando una consulta usando la clausula select
                $query = "SELECT ai.idDIM_Oficina, 
dc.iddim_CFinanzas, dc.iddim_CPosterior, 
dc.fecartafinanza1, dc.ncartafinanza1, dc.valorizacion1, dc.red_1,
dc.fecartafinanza2, dc.ncartafinanza2, dc.valorizacion2, dc.red_2,
dc.fecartafinanza3, dc.ncartafinanza3, dc.valorizacion3, dc.red_3,
dc.fecartafinanza4, dc.ncartafinanza4, dc.valorizacion4, dc.red_4,
dc.fecartafinanza5, dc.ncartafinanza5, dc.valorizacion5, dc.red_5,
dc.fCreacion, dc.fActualizacion
FROM dim_cfinanzas dc 
left join dim_aseguradoindevido ai on dc.iddim_CPosterior=ai.iddim_aseguradoindevido
where dc.iddim_CPosterior='$iddim_CPosterior'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila = $result->fetch_assoc()) {
                    $b_idDIM_Oficina = $fila["idDIM_Oficina"];
                    ?>                 
                    
                        <tr>
                        <input id="i1" type="HIDDEN" name="iddim_CFinanzas" size="50" value="<?php echo $fila['iddim_CFinanzas'] ?>" readOnly="readOnly"> 
                        <input id="i1" type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                        </tr>
                      
                       
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               1º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza1'])) { ?>    
                               <input type = "date" max="   
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza1" class="sinborde" required=""
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza1" class="sinborde" value="<?php echo $fila['fecartafinanza1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA PRIMERA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza1'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza1" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza1" class="sinborde" value="<?php echo $fila['ncartafinanza1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_1'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA PRIMERA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion1'])) { ?>    
                               <input type = "number" name = "valorizacion1" step="any" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion1" class="sinborde" value="<?php echo $fila['valorizacion1'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                      
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               2º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza2'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza2" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza2" class="sinborde" value="<?php echo $fila['fecartafinanza2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA SEGUNDA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza2'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza2" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza2" class="sinborde" value="<?php echo $fila['ncartafinanza2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_2'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA SEGUNDA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion2'])) { ?>    
                               <input type = "number" name = "valorizacion2" class="sinborde" step="any"
                                      value = "<?php echo $fila["valorizacion2"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion2" class="sinborde" value="<?php echo $fila['valorizacion2'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                    
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               3º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza3'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza3" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza3" class="sinborde" value="<?php echo $fila['fecartafinanza3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA TERCERA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza3'])) { ?>    
                                 <input type = "TEXT" name = "ncartafinanza3" class="sinborde">                                     
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza3" class="sinborde" value="<?php echo $fila['ncartafinanza3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_3'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "HIDDEN" name = "red_1" class="sinborde" value="<?php echo $fila['red_3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA TERCERA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion3'])) { ?>    
                               <input type = "number" name = "valorizacion3" class="sinborde" step="any" 
                                      value = "<?php echo $fila["valorizacion3"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion3" class="sinborde" value="<?php echo $fila['valorizacion3'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                     
                        <tr><td class="especial" id="td1" style="width:350px;">
                               4º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza4'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza4" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza" value = "<?php echo $fila["fecartafinanza4"] ?>">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza4" class="sinborde" value="<?php echo $fila['fecartafinanza4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA CUARTA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza4'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza4" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza4" class="sinborde" value="<?php echo $fila['ncartafinanza4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_4'])) { ?>  
                             <select  id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA CUARTA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion4'])) { ?>    
                                 <input type = "number" name = "valorizacion4" class="sinborde" step="any">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion4" class="sinborde" value="<?php echo $fila['valorizacion4'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                     
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               5º  FECHA CARTA A FINANZA
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['fecartafinanza5'])) { ?>    
                               <input type = "date" max="
                                <?php
                                $hoy = getdate();
                                echo $hoy = date("Y-m-d");
                                ?>" name = "fecartafinanza5" class="sinborde"
                                       min="1990-01-01" id="fecartafinanza">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "fecartafinanza5" class="sinborde" value="<?php echo $fila['fecartafinanza5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> 
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               NUMERO DE LA QUINTA CARTA A FINANZAS
                            </td>                           
                             <TD id="td1">
                            <?php if (is_null($fila['ncartafinanza5'])) { ?>    
                               <input type = "TEXT" name = "ncartafinanza5" class="sinborde">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "ncartafinanza5" class="sinborde" value="<?php echo $fila['ncartafinanza5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
<!--                        <tr><td class="especial" id="td1" style="width:200px;">
                               RED QUE FUE ENVIADO
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['red_5'])) { ?>  
                             <select id ="unidad" name = "red_1" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                                                             
                                        <option value=""></option>
                                        <option value="OAALMENARA">OAALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>  
                                    </select>
                            </td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "red_1" class="sinborde" value="<?php echo $fila['red_5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr> -->
                        
                        <tr><td class="especial" id="td1" style="width:350px;">
                               VALORIZACION DE LA QUINTA CARTA ENVIADA A FINANZAS (S/.)
                            </td>                            
                             <TD id="td1">
                            <?php if (is_null($fila['valorizacion5'])) { ?>    
                               <input type = "number" name = "valorizacion5" class="sinborde" step="any">
                                <br></td>
                                <?php
                            } else {
                                ?>
                               <input type = "" name = "valorizacion5" class="sinborde" value="<?php echo $fila['valorizacion5'] ?>" readOnly>                                
                                <?php
                            }
                            ?>
                        </tr>
                        
                   
                        <?php
                    }
                    if ($b_idDIM_Oficina == $idOficinaUsuario) {
                        ?>
                        <tr>
                            <td colspan = "3" id="td2">

                                <!--<input type = "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar">-->
                                <button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" class="button button2">Actualizar</button><br>
                                <h5>Se actualizara bajo su responsabilidad.</h5>
                            </td>
                        </tr>                      
                        <?php
                    }
                    ?>
                 </table> 
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