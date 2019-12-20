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
                padding:3px 2px;
                border-style:solid;border-width:0.5px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                
                background-color:#B0C4DE;
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
        $iddim_CPosterior = $_GET['iddim_CPosterior'];
        $autogenerado_t="";
        ?>   
        
        <?php 
        
        $sql1 = "SELECT count(*) total FROM dim_paevaluar_new t
                    where t.iddim_aseguradoindevido='$iddim_CPosterior'";

        $resultsql1 = $conexionmysql->query($sql1);

        while ($fila1 = $resultsql1->fetch_assoc()) {
            
            if($fila1['total']==0) {
            
            ?>
   
        <form id ="pcalificart" name="form2" action="actualizarCPosterior_PCalificar.php" method="POST" >            
            <table id="t1" border="1" summary="Rellena Formulario">
                  <input id="i1" type="hidden" name="iddim_PaCalificar" size="50" value="<?php  echo $iddim_CPosterior ?>" readOnly="readOnly">
                  <input id="i1" type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">
                <?php
                $hoy = getdate();
                $i=0;
                //echo $hoy = date("d/m/Y"); 
                ?>
                 <th id="th1" scope="row" class="especial" colspan="1">
                            PERIODOS DE BAJA
                </th>
                <th id="th1" scope="row" style="text-align: center" class="especial" colspan="1">
                            INICIO
                 </th>
                   <th id="th1" scope="row" style="text-align: center"  class="especial" colspan="1">
                            FIN
                </th>         
                    
                        <tr>
                            
                          </tr>    
                            <?php
                            for($i=1;$i<=10;$i++) {
                            ?>
                          <tr>
                              <td id="th11">
                                <?php echo $i; ?>
                            </td>
                            <td id="th11"><input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       name = "InicioPCalificar<?php echo $i?>"  value = ""
                                       min="1985-01-01" id="InicioPCalificar">
                                <br></TD>
                            
                            <td id="th11"><input type = "date" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>" 
                                       name = "FinPCalificar<?php echo $i?>" 
                                       min="1985-01-01" id="FinPCalificar" value = "">
                                <br></TD>
                        </tr>                         
              <?php
                            }
                            ?>
                         </tr> 
                        <th id="th1" scope="row" class="especial" colspan="5">
                        INDICAR DONDE INICIA Y DONDE ACABA EL PERIODO A EVALUAR (PERIODO COMPLETO)
                    </th>
                    <tr>
                        <td id="th11">
                            Periodos a Evaluar
                        </td>

                        
                        <td id="th11"><input type = "date" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                        name = "InicioPFinal" id="InicioPFinal" 
                                             min="1985-01-01" required=""><br></TD>
                       
                        
                        <td id="th11"><input type = "date" max="<?php $year = date("Y")+1; echo $hoy = date("$year-12-31"); ?>"
                        name = "FinPFinal" id="FinPFinal" required
                                             min="1985-01-01"><br></TD>
                    </tr>
                                 <?php
                                $sql2 = "SELECT a.autogenerado_t, a.dni_t, a.idDIM_Oficina
                                        FROM dim_aseguradoindevido a
                                        where a.iddim_aseguradoindevido='$iddim_CPosterior'";

        $resultsql2 = $conexionmysql->query($sql2);

        while ($fila2 = $resultsql2->fetch_assoc()) {
            
            if($fila2['idDIM_Oficina']==$idOficinaUsuario) {                      
                     ?>
                        <tr>
                            <td colspan = "3" id="">
                                
                                <button type= "submit" onclick="return confirm('Estás seguro que desea Grabar?');" name = "actualizar" class="button button2">Grabar</button>
                                <!--<input type = "submit" onclick="return confirm('Estás seguro que desea Actualizar?');" name = "actualizar" value = "Actualizar">-->
                                
                            </td>
                        </tr>
              <?php
        }      }         
                ?> 
            </table>
        </form>
       
    <?php
            }
            else {
                 $query1 = "SELECT a.autogenerado_t, a.dni_t, a.idDIM_Oficina,
b.iddim_PaCalificar, b.iddim_aseguradoindevido,                                            
b.InicioPCalificar1, b.FinPCalificar1, 
b.idtusuario, b.fCreacion, b.fActualizacion
FROM sisgasv.dim_aseguradoindevido a
inner join dim_pacalificar_new b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
where a.iddim_aseguradoindevido='$iddim_CPosterior'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query1);
                $i = 0;
                ?>
        
        <table id="t1" border="1" summary="">                 
                <input id="i1" type="hidden" name="iddim_aseguradoindevido" size="50" value="<?php  echo $iddim_CPosterior ?>" readOnly="readOnly">
                <th id="th1" colspan="5" >LISTA PERIODOS DE BAJA</th>
                <tr>
                    <th id="td1" style="text-align: center">NUMERO</th> 
                    <th id="td1" style="text-align: center">FECHA INICIO</th> 
                    <th id="td1" style="text-align: center">FECHA FIN</th> 
                                        
                </tr>
                 <?php
                while ($fila = $result->fetch_assoc()) {
                    $i++;
                   
               ?>
               <tr>
                        <td id="td1">                           
                        <?php echo $i; ?>
                        </td> 
                        <td id="td1">                           
                        <?php echo $fila['InicioPCalificar1'] ?>
                        </td> 
                        <td id="td1">                           
                        <?php echo $fila['FinPCalificar1'] ?>
                        </td> 
                    </tr>
                    <?php
                }
                    
                    $query = "SELECT a.autogenerado_t, a.dni_t, a.idDIM_Oficina,
c.iddim_aseguradoindevido,  
c.iddim_PaEvaluar_new,                                           
c.InicioPFinal, c.FinPFinal,
c.idtusuario, c.fCreacion, c.fActualizacion
FROM sisgasv.dim_aseguradoindevido a
inner join dim_paevaluar_new c on a.iddim_aseguradoindevido=c.iddim_aseguradoindevido
where a.iddim_aseguradoindevido='$iddim_CPosterior'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                $i = 0;
                    while ($fila = $result->fetch_assoc()) {
                        //SE ACTIVO NUEVAMENTE XQ ARROJABA ERROR
                    $newInicioPFinal = date("Y", strtotime($fila["InicioPFinal"])) . date("m", strtotime($fila["InicioPFinal"])) . date("d", strtotime($fila["InicioPFinal"]));
//                echo $newInicioPFinal;
                    $autogenerado_t=$fila['autogenerado_t'];
                    $newFinPFinal = date("Y", strtotime($fila["FinPFinal"])) . date("m", strtotime($fila["FinPFinal"])) . date("d", strtotime($fila["FinPFinal"]));
//                echo $newFinPFinal;
                    $i++;
                   ?>
                    <tr>
                    <th id="td1" style="text-align: center">NUMERO</th> 
                    <th id="td1" style="text-align: center">INICIO DE EVALUACION</th> 
                    <th id="td1" style="text-align: center">FIN DE EVALUACION</th> 
                                        
                    </tr>
                    <tr>
                        <td id="td1">                           
                        <?php echo $i; ?>
                        </td> 
                        <td id="td1">                           
                        <?php echo $fila['InicioPFinal'] ?>
                        </td> 
                        <td id="td1">                           
                        <?php echo $fila['FinPFinal'] ?>
                        </td> 
                    </tr>
                    <?php
                   
                }
                    ?>
                  
            </table>
        
        <form name="form" action="" method="POST">
                <!--SE ACTIVO NUEVAMENTE XQ ARROJABA ERROR-->
                <input type="hidden" name="inicio" value="<?php echo $newInicioPFinal ?>">                          
                <input type="hidden" name='fin' value="<?php echo $newFinPFinal ?>">                 
                <input type="hidden" name='autogenerado_t' value="<?php echo $autogenerado_t ?>"> 
                <button type= "submit" onclick="pregunta(event)" name = "buscar2" class="button button2">BUSCAR ATENCIONES</button>
                <!--<input type="submit" name="buscar2" onclick="pregunta(event)" value="BUSCAR ATENCIONES"  maxlength="11">-->
            </form>
        
        <?php
            }
                }
               
                ?>   
        
        
        <table id="t1" border="1" summary="Descripcion de la tabla y su contenido">      

<?php
$inicio = NULL;
$fin = NULL;
$autogenerado_t = NULL;

if (isset($_POST['buscar2'])) {
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $autogenerado_t = $_POST['autogenerado_t'];

    include './conexionesbd/conexion_oracle.php';
    $queryT = oci_parse($conexionora, "SELECT t.pa_casi,
                                        t.pa_numhc,
                                        t.pa_fecemi,
                                        t.pa_feccit,
                                        t.pa_autase,
                                        t.pa_nompac,
                                        t.pa_nina,
                                        t.pa_area,
                                        t.pa_actmed,
                                        t.pa_serv,
                                        t.pa_dser,
                                        t.pa_cmp,
                                        t.pa_dcmp,
                                        t.pa_diag,
                                        t.pa_capa,
                                        g.nombre,      
                                        g.nivel,
                                        g.red,
                                        g.direccion 
       FROM V_PAC_ATENCIONES_14_18 t 
       left join CAS_PACATE g on t.pa_casi=g.cas
       WHERE t.pa_autase='$autogenerado_t' 
        and t.pa_feccit > '$inicio' AND t.pa_feccit < '$fin' 
        ORDER BY t.PA_FECCIT DESC");
    ?>
                <tr>
                    <th id="th2">
                        pa_casi
                    </th>
                    <th  id="th2">
                        pa_numhc
                    </th>
                    <th  id="th2">
                        pa_fecemi
                    </th> 
                    <th  id="th2">
                        pa_feccit
                    </th> 
                    <th id="th2">
                        pa_autase
                    </th> 
                    <th id="th2">
                        pa_nompac
                    </th> 
                    <th id="th2">
                        pa_nina
                    </th>
                    <th id="th2">
                        pa_area
                    </th>
                    <th id="th2">
                        pa_actmed
                    </th> 
                    <th id="th2">
                        pa_serv
                    </th> 
                    <th id="th2">
                        pa_dser
                    </th>
                    <th id="th2">
                        pa_cmp
                    </th> 
                    <th id="th2">
                        pa_dcmp
                    </th>
                    <th id="th2">
                        pa_diag
                    </th>
                    <th id="th2">
                        pa_capa
                    </th> 
                    
                    <th id="th2">
                        CENTRO ASIST
                    </th> 
                    <th id="th2">
                        NIVEL
                    </th>
                    <th id="th2">
                        RED
                    </th>
                    <th id="th2">
                        DIRECCION
                    </th> 

                </tr>      


    <?php
    oci_execute($queryT);

    while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
        ?> 
                    <tr>
                        <td id="td2"><?php echo $row[0] ?></td>
                        <td id="td2"><?php echo $row[1] ?></td>
                        <td id="td2"><?php echo $row[2] ?></td>
                        <td id="td2"><?php echo $row[3] ?></td>
                        <td id="td2"><?php echo $row[4] ?></td>
                        <td id="td2"><?php echo $row[5] ?></td>
                        <td id="td2"><?php echo $row[6] ?></td>
                        <td id="td2"><?php echo $row[7] ?></td>
                        <td id="td2"><?php echo $row[8] ?></td>
                        <td id="td2"><?php echo $row[9] ?></td>
                        <td id="td2"><?php echo $row[10] ?></td>
                        <td id="td2"><?php echo $row[11] ?></td>
                        <td id="td2"><?php echo $row[12] ?></td>
                        <td id="td2"><?php echo $row[13] ?></td>
                        <td id="td2"><?php echo $row[14] ?></td>  
                        
                        <td id="td2"><?php echo $row[15] ?></td>
                        <td id="td2"><?php echo $row[16] ?></td>
                        <td id="td2"><?php echo $row[17] ?></td>
                        <td id="td2"><?php echo $row[18] ?></td>   
                    </tr>                    
        <?php
    }
}
?>
        </table>
        
    </body>
</html>