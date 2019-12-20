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

            #th2 {
                font-family:Arial, sans-serif;
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                text-align: center;
                  background-color: #B0C4DE;
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

    function pregunta(e){ 
        if (confirm('Se buscara los periodos ya guardados')){     
            }
            else{
                e.preventDefault();
            }
          } 

</script>

    </head>
    <body>  
        <?PHP
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        $newInicioPFinal="";
        $newFinPFinal="";
                
        $iddim_Verificacion = $_GET['iddim_Verificacion'];
        
        ?> 
         
        <!--Incrustar php-->
                <?php
                //$iddim_CPosterior = $_GET['iddim_CPosterior'];

                //incluir el archivo de conexion
                include './conexionesbd/conexion_mysql.php';
                //realizando una consulta usando la clausula select
                $query = "SELECT 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina,
                        dc.iddim_EPConforme, dc.iddim_aseguradoindevido,                     
                        dc.InicioPCalificar1, dc.FinPCalificar1,
                        dc.tipo1,
                        tep.descripcion,
                        dc.idtusuario, dc.fCreacion, dc.fActualizacion
                        FROM dim_epconforme dc 
                        left join dim_aseguradoindevido ai on dc.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipo_epconforme tep on dc.tipo1=tep.idTipo_EPConforme
                        where dc.iddim_aseguradoindevido='$iddim_Verificacion'";
           
                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                $i = 0;
                //recorriendo el conjunto de resultados con un bucle
                
                  ?>    
        
            <table id="t1" border="1" summary="Rellena Formulario">
                
                    <th id="th1" scope="row" class="especial" colspan="6">
                            PERIODOS DE BAJA
                        </th>
                        
                        <tr>    
                        <TD style="width:200px;">PERIODOS</TD>
                        <td style="width:150px;" colspan="2">INICIO</td>                            
                        <td style="width:150px;" colspan="2">FIN</td>
                        <td style="width:150px;" colspan="2">TIPO</td>
                        </tr>       
                <?php
                while ($fila = $result->fetch_assoc()) {
                 $i++;
                    ?>
                <?php
                $hoy = getdate();
                echo $hoy = date("m/Y"); 
                ?>
            
                        <tr>
                            <td id="th11">
                                Inicio <?php echo $i ?>º  Periodo de Baja
                            </td>
                            <td id="th11" colspan="2"><?php echo $fila["InicioPCalificar1"] ?><br></td>                            
                            <td id="th11" colspan="2"><?php echo $fila["FinPCalificar1"] ?><br></td>
                            <td id="th11" colspan="2"><?php echo $fila["descripcion"] ?><br></td>
                        </tr>       
                <?php }?>                            
                    
                  </table> 
         <?php
                     $queryoficina = "SELECT ai.idDIM_Oficina as idDIM_OficinaII                      
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join tipoverificacionperfil tpf on cp.idTVerificacion=tpf.idTVerificacion and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
                        
                        where cp.iddim_Verificacion='$iddim_Verificacion' and cp.idTVerificacion='2'";

//Obteniendo el conjunto de resultados
            $resultoficina = $conexionmysql->query($queryoficina);
//recorriendo el conjunto de resultados con un bucle

            while ($filaoficina = $resultoficina->fetch_assoc()) {
         
                 $query111="SELECT count(*) total FROM dim_epconforme p where p.iddim_aseguradoindevido='$iddim_Verificacion'";
                 $resultado = $conexionmysql->query($query111);
                 while ($fila2 = $resultado->fetch_assoc()) {
                     $total = $fila2['total'];                    
                 if($total==0) {

?>	
        
        <form name="form2" action="" method="POST" >            
            <table id="t1" border="1" summary="Rellena Formulario">
                <input id="i1" type="hidden" name="iddim_aseguradoindevido" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">                           
                <?php
                $hoy = getdate();
               // echo $hoy = date("d/m/Y"); 
                ?>
                <br>
                        <th id="th2" scope="row" class="especial">
                            PERIODOS A COBRAR 
                        </th>
                        <th id="th2" scope="row" class="especial" colspan="1">
                            INICIO
                        </th>
                        <th id="th2" scope="row" class="especial" colspan="1">
                            FIN
                        </th>
                        <th id="th2" scope="row" class="especial" colspan="1">
                            DETALLE
                        </th>
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    
                        <tr>
                            <td id="th11" style="width:150px;">
                                Inicio <?php echo $i ?>º  Periodo de Baja
                            </td>
                            
                            <td id="th11"><input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       name = "InicioPCalificar<?php echo $i ?>" 
                                       min="1990-01-01" id="InicioPCalificar" value = "<?php echo $fila["InicioPCalificar$i"] ?>">
                                <br></TD>
                            
                            <td id="th11"><input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" name = "FinPCalificar<?php echo $i ?>" 
                                       min="1990-01-01" id="FinPCalificar" value = "<?php echo $fila["FinPCalificar$i"] ?>">
                                <br></TD>
                            
                            
                            <?PHP
    $querytipocobro = "SELECT b.idTipo_EPConforme, b.descripcion
                                FROM tipo_epconforme b ";
    $resultado = $conexionmysql->query($querytipocobro);
    ?>    
                           
                            <td id="th11">
                                <select name="cbx_tipocobro<?php echo $i ?>" id="cbx_tipocobro" value="cbx_tipocobro">
                                    <option value=""></option>
                                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTipo_EPConforme']; ?>"><?php echo $row['descripcion']; ?></option>
                                     <?php } ?>
                                </select>
                                
                                <br></TD>
                            
                        </tr> 
                        
                        <?php
                     
                }
//             
                  if ($filaoficina['idDIM_OficinaII'] == $idOficinaUsuario) { 
                      
                ?>
                        
                        <tr>
                            <td colspan = "4" id="">
                                <!--<input type = "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar">-->                                
                                <button type= "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" class="button button2">Actualizar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan = "4">
                                <h5>Se actualizara bajo su responsabilidad.</h5>     
                            </td>
                        </tr>
                        <?php
//                  }
            }
                        ?>
               
            </table>
        </form>
                 <?php
                } 
                 }
       }
                                //liberando los recursos
            $resultoficina->free();
//cerrando los recursos
            $conexionmysql->close()
                ?>

         <?php
if (isset($_POST['actualizar'])) {

    include ('../SISGASV/conexionesbd/conexion_mysql.php');

    $iddim = $_POST['iddim_usuario'];
    $iddim_usuario = "'$iddim'";

    $iddim_CPosteriorr = $_POST['iddim_aseguradoindevido'];
    $iddim_CPosterior = "'$iddim_CPosteriorr'";


//1//////////////////////////////////////////////////////////
    if (empty($_POST['InicioPCalificar1'])) {
        $InicioPCalificar1 = NULL;
    } else {
        $InicioPCalificar11 = $_POST['InicioPCalificar1'];
        $InicioPCalificar1 = "'$InicioPCalificar11'";
    }
//2
    if (empty($_POST['FinPCalificar1'])) {
        $FinPCalificar1 = NULL;
    } else {
        $FinPCalificar11 = $_POST['FinPCalificar1'];
        $FinPCalificar1 = "'$FinPCalificar11'";
    }
    
        if (empty($_POST['cbx_tipocobro1'])) {
        $cbx_tipocobro1 = NULL;
    } else {
        $cbx_tipocobro11 = $_POST['cbx_tipocobro1'];
        $cbx_tipocobro1 = "'$cbx_tipocobro11'";
    }

//1////////////////////////////////////////////////
   if (empty($_POST['InicioPCalificar2'])) {
        $InicioPCalificar2 = NULL;
    } else {
        $InicioPCalificar22 = $_POST['InicioPCalificar2'];
        $InicioPCalificar2 = "'$InicioPCalificar22'";
    }
//2
    if (empty($_POST['FinPCalificar2'])) {
        $FinPCalificar2 = NULL;
    } else {
        $FinPCalificar22 = $_POST['FinPCalificar2'];
        $FinPCalificar2 = "'$FinPCalificar22'";
    }
    
        if (empty($_POST['cbx_tipocobro2'])) {
        $cbx_tipocobro2 = NULL;
    } else {
        $cbx_tipocobro22 = $_POST['cbx_tipocobro2'];
        $cbx_tipocobro2 = "'$cbx_tipocobro22'";
    }

    //1////////////////////////////////////////////
    
if (empty($_POST['InicioPCalificar3'])) {
        $InicioPCalificar3 = NULL;
    } else {
        $InicioPCalificar33 = $_POST['InicioPCalificar3'];
        $InicioPCalificar3 = "'$InicioPCalificar33'";
    }
//2
    if (empty($_POST['FinPCalificar3'])) {
        $FinPCalificar3 = NULL;
    } else {
        $FinPCalificar33 = $_POST['FinPCalificar3'];
        $FinPCalificar3 = "'$FinPCalificar33'";
    }
    
        if (empty($_POST['cbx_tipocobro3'])) {
        $cbx_tipocobro3 = NULL;
    } else {
        $cbx_tipocobro33 = $_POST['cbx_tipocobro3'];
        $cbx_tipocobro3 = "'$cbx_tipocobro33'";
    }

    
    //1//////////////////////////////////////////
    
if (empty($_POST['InicioPCalificar5'])) {
        $InicioPCalificar5 = NULL;
    } else {
        $InicioPCalificar55 = $_POST['InicioPCalificar5'];
        $InicioPCalificar5 = "'$InicioPCalificar55'";
    }
//2
    if (empty($_POST['FinPCalificar5'])) {
        $FinPCalificar5 = NULL;
    } else {
        $FinPCalificar55 = $_POST['FinPCalificar5'];
        $FinPCalificar5 = "'$FinPCalificar55'";
    }
    
        if (empty($_POST['cbx_tipocobro5'])) {
        $cbx_tipocobro5 = NULL;
    } else {
        $cbx_tipocobro55 = $_POST['cbx_tipocobro5'];
        $cbx_tipocobro5 = "'$cbx_tipocobro55'";
    }

    //////////////////////////////////////////////
if (empty($_POST['InicioPCalificar4'])) {
        $InicioPCalificar4 = NULL;
    } else {
        $InicioPCalificar44 = $_POST['InicioPCalificar4'];
        $InicioPCalificar4 = "'$InicioPCalificar44'";
    }
//2
    if (empty($_POST['FinPCalificar4'])) {
        $FinPCalificar4 = NULL;
    } else {
        $FinPCalificar44 = $_POST['FinPCalificar4'];
        $FinPCalificar4 = "'$FinPCalificar44'";
    }
    
        if (empty($_POST['cbx_tipocobro4'])) {
        $cbx_tipocobro4 = NULL;
    } else {
        $cbx_tipocobro44 = $_POST['cbx_tipocobro4'];
        $cbx_tipocobro4 = "'$cbx_tipocobro44'";
    }


//    $idtusuarioo = $_POST['idtusuario'];
//    $idtusuario = "'$idtusuarioo'";

    date_default_timezone_set('America/Bogota');
    $fecha_hora_updateo = date('Y-m-d G:i:s');
    $fecha_hora_update = "'$fecha_hora_updateo'";


    //resolviendo una consulta con la clausula insert
    /* $query = "UPDATE dim_pacalificar SET 
      InicioPEvaluar=$InicioPEvaluar, FinPEvaluar=$FinPEvaluar,
      InicioPCalificar1=$InicioPCalificar1, FinPCalificar1=$FinPCalificar1,
      InicioPCalificar2=$InicioPCalificar2, FinPCalificar2=$FinPCalificar2,
      InicioPCalificar3=$InicioPCalificar3, FinPCalificar3=$FinPCalificar3,
      InicioPCalificar4=$InicioPCalificar4, FinPCalificar4=$FinPCalificar4,
      InicioPCalificar5=$InicioPCalificar5, FinPCalificar5=$FinPCalificar5,
      InicioPFinal=$InicioPFinal, FinPFinal=$FinPFinal,
      idtusuario=$iddim_usuario, fActualizacion= $fecha_hora_update
      WHERE iddim_PaCalificar=$iddim_PaCalificar"; */

if(!is_null($InicioPCalificar1) && !is_null($InicioPCalificar2) && !is_null($InicioPCalificar3) && !is_null($InicioPCalificar4) && !is_null($InicioPCalificar5)) {
    
    $query = "ALTER TABLE dim_epconforme AUTO_INCREMENT = 1";
    
    $query1="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar1, $FinPCalificar1, 
    $cbx_tipocobro1, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query2="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar2, $FinPCalificar2, 
    $cbx_tipocobro2, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query3="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar3, $FinPCalificar3, 
    $cbx_tipocobro3, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query4="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar4, $FinPCalificar4, 
    $cbx_tipocobro4, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query5="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar5, $FinPCalificar5, 
    $cbx_tipocobro5, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";

    if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {
if ($conexionmysql->query($query5)) {
}
}
}
}
}
}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}
else 
if(!is_null($InicioPCalificar1) && !is_null($InicioPCalificar2) && !is_null($InicioPCalificar3) && !is_null($InicioPCalificar4)) {
        
    $query = "ALTER TABLE dim_epconforme AUTO_INCREMENT = 1";
    
    $query1="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar1, $FinPCalificar1, 
    $cbx_tipocobro1, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query2="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar2, $FinPCalificar2, 
    $cbx_tipocobro2, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query3="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar3, $FinPCalificar3, 
    $cbx_tipocobro3, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query4="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar4, $FinPCalificar4, 
    $cbx_tipocobro4, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";


    if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {
if ($conexionmysql->query($query4)) {

}
}
}   
}
} 
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}
    else
   if(!is_null($InicioPCalificar1) && !is_null($InicioPCalificar2) && !is_null($InicioPCalificar3)) {
$query = "ALTER TABLE dim_epconforme AUTO_INCREMENT = 1";
    
    $query1="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar1, $FinPCalificar1, 
    $cbx_tipocobro1, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query2="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar2, $FinPCalificar2, 
    $cbx_tipocobro2, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query3="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar3, $FinPCalificar3, 
    $cbx_tipocobro3, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";


    if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
if ($conexionmysql->query($query3)) {

}
}
}
}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}
else 
if(!is_null($InicioPCalificar1) && !is_null($InicioPCalificar2)) {
$query = "ALTER TABLE dim_epconforme AUTO_INCREMENT = 1";
    
    $query1="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar1, $FinPCalificar1, 
    $cbx_tipocobro1, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    $query2="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar2, $FinPCalificar2, 
    $cbx_tipocobro2, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
if ($conexionmysql->query($query2)) {
}
}
}
//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}
else
if(!is_null($InicioPCalificar1)) {
$query = "ALTER TABLE dim_epconforme AUTO_INCREMENT = 1";
    
    $query1="
    INSERT INTO dim_epconforme (
    iddim_aseguradoindevido, 
    InicioPCalificar1, FinPCalificar1, 
    tipo1, 
    idtusuario, fCreacion, fActualizacion) 
    VALUES (
    $iddim_CPosterior, 
    $InicioPCalificar1, $FinPCalificar1, 
    $cbx_tipocobro1, 
    $iddim_usuario, $fecha_hora_update, $fecha_hora_update)";
    
    
    if ($conexionmysql->query($query)) {
if ($conexionmysql->query($query1)) {
}
}

//if ($conexion->query($query1)) {
echo 'Se Actualizo Correctamente.';
//Cerramos la conexion
// }
}
else {
        echo 'Error al Actualizar registro<br>';
       
}
} 
?>

       
    </body>
</html>