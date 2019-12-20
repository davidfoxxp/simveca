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

$iddim_Verificacion = $_GET['iddim_Verificacion'];
$sql2 = "SELECT concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t) as nombreai, 
                        ai.dni_t,ai.DIRECCION_t,ai.DISTRITO_t,ai.PROVINCIA_t,
                        cp.an_verifi,cp.num_verifi,
                        don.ordenV, dr.numResBOficio
                        FROM dim_verificacion cp
                        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
                        left join dim_overificacion don on don.iddim_Overificacion=cp.iddim_Verificacion
                        left join dim_resboficio dr on don.iddim_Overificacion=dr.iddim_ResBOficio
                        where cp.iddim_Verificacion='$iddim_Verificacion'";
$resultsql2 = $conexionmysql->query($sql2);
$row2 = $resultsql2->fetch_assoc();


$sql3 = "SELECT 
                ase.idDIM_Oficina,ve.iddim_Verificacion,
                ve.fechaRDerivado,ve.casoDerivado,
                ve.fechaDDerivado, dooo.oficina, 
                ve.iddim_VerificacionDerivado 
                FROM sisgasv.dim_verificacion ve
left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
left join tipoverificacionperfil tpf on ve.idTVerificacionPerfil=tpf.idTVerificacionPerfil
left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina

left join tipoOspe dooo on ve.casoDerivado=dooo.codOficina
                        where ve.iddim_Verificacion='$iddim_Verificacion' and ve.idTVerificacion='2'";
$resultsql3 = $conexionmysql->query($sql3);
$row3= $resultsql3->fetch_assoc();



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
<!--        <script language="JavaScript" type="text/javascript" src="ajax.js"></script>-->
        
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
                font-size: 12px;
                font-weight:bold;
                color: #0060C0;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;               
                  background-color: #B0C4DE;
                  text-align: left;
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
                font-size: 10px;
                font-weight:normal;
                text-align: left;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
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

        </script>

 <script>
        function showUser1(cod) {
  if (cod==="") {
    document.getElementById("txtHint0").innerHTML="";
    return;
  } 
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("txtHint0").innerHTML=this.responseText;
    }
    
  }
  xmlhttp.open("GET","../sisgasv/include/getOVderivacion.php?a="+cod,true);
  xmlhttp.send();
}

</script>
<script type="text/javascript">
            
 function ShowSelected()
{
/* Para obtener el valor */
var ofi = document.getElementById("casoDerivado").value;
document.getElementById('ofi').value=ofi;
/* Para obtener el texto */
//var combo = document.getElementById("casoDerivado");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);
}
function ShowSelected1()
{
var ano = document.getElementById("anos").value;
document.getElementById('ano').value=ano;
/* Para obtener el texto */
//var combo = document.getElementById("casoDerivado");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);
}
var mostrarValor = function(x){
            document.getElementById('textoano').value=x;
            };
</script>
 <script>
 function habilitar(value)
            {
                if (value === "1" )
                {

                    document.getElementById("fechaRDerivado").readOnly = true;
                    document.getElementById("fechaRDerivado").style.backgroundColor = '#E5E7E9';
//                    document.getElementById("fechaRDerivado").value=""; 
                    
                    document.getElementById("fechaDDerivado").focus();
                    document.getElementById("fechaDDerivado").readOnly = false;
                    document.getElementById("fechaDDerivado").style.backgroundColor = 'white';
                    
                    document.getElementById("cod").value="";
                    document.getElementById('cod').readOnly= true;
                    document.getElementById('cod').style.backgroundColor = '#E5E7E9';
                    
                    document.getElementById("casoDerivado").disabled=false;
                    document.getElementById("casoDerivado").style.backgroundColor = 'white';
                    
                    document.getElementById("mensaje").style.display="none";
                    document.getElementById("mensaje1").style.display="block";
                
                } else if (value==="2"){
                    document.getElementById("fechaRDerivado").readOnly = false;
                    document.getElementById("fechaRDerivado").style.backgroundColor = 'white';
                    
                    document.getElementById("fechaDDerivado").readOnly = true;
                    document.getElementById("fechaDDerivado").style.backgroundColor = '#E5E7E9';
//                    document.getElementById("fechaDDerivado").value=""; 
                    
                    document.getElementById("casoDerivado").disabled=true;
                    document.getElementById("casoDerivado").style.backgroundColor = '#E5E7E9';
                    
                    
                    document.getElementById('cod').readOnly= false; 
                    document.getElementById('cod').style.backgroundColor = 'white';
                    document.getElementById('cod').focus();
                    document.getElementById("mensaje").style.display="block";
                    document.getElementById("mensaje1").style.display="none";

                }
            }
        </script>
</head>
<body>  
    <?PHP
    $iddim_usuario = utf8_decode($row['iddim_usuario']);
    $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
    $codOficina = utf8_decode($row['codOficina']);
    $ano = utf8_decode($row2['an_verifi']);
    $num_verifi = utf8_decode($row2['num_verifi']);
    $ordenV00 = utf8_decode($row2['ordenV']);
    $numResBOficio = utf8_decode($row2['numResBOficio']);
    $newInicioPFinal = "";
    $newFinPFinal = "";
    $iddim_VerificacionDerivado = utf8_decode($row3['iddim_VerificacionDerivado']);
            
    ?> 

    <form id ="pcalificart" name="form2" action="actualizarVerificacion_CasoDerivado.php" method="POST" > 
        <table id="t1" border="1" summary="Rellena Formulario">

            <!--Incrustar php-->
            <?php
            //$iddim_Verificacion = $_GET['iddim_Verificacion'];
            //incluir el archivo de conexion
            include './conexionesbd/conexion_mysql.php';
            //realizando una consulta usando la clausula select
            $query = "SELECT 
                ase.idDIM_Oficina,ve.iddim_Verificacion,
                ve.fechaRDerivado,ve.casoDerivado,
                ve.fechaDDerivado, dooo.oficina, 
                ve.iddim_VerificacionDerivado 
                FROM sisgasv.dim_verificacion ve
left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
left join tipoverificacionperfil tpf on ve.idTVerificacionPerfil=tpf.idTVerificacionPerfil
left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina
left join tipoOspe dooo on ve.casoDerivado=dooo.codOficina
                        where ve.iddim_Verificacion='$iddim_Verificacion' and ve.idTVerificacion='2'";

            //Obteniendo el conjunto de resultados
           
            $result = $conexionmysql->query($query);
            //recorriendo el conjunto de resultados con un bucle

            while ($fila = $result->fetch_assoc()) {

                
                    ?>

                    <?php
                    $hoy = getdate();
                    //echo $hoy = date("m/Y"); 
                    ?>            
<div>
    <input type="radio" name="radio" id="ENVIO" value="1" onclick="habilitar(this.value)" >
	<label for="envio">ENVIO</label>
</div>
 
<div>
	<input type="radio" name="radio" id="RECEPCION" value="2" onclick="habilitar(this.value)">
	<label for="recepcion">RECEPCION</label>
</div>
                    
                    <input id="i1" type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
                    <input id="i1" type="hidden" name="iddim_Verificacion" size="50" value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly"> 
                  
                    
                       <tr>
                            <td id="th1" class="especial">
                                CODIGO DEL CASO DERIVADO *(RECEPCION)
                            </td>
                            <TD id="td1">
                                <a style="text-align: center;color: #0000CD;font-size: 20px;font-weight: bold;" name="idVerificaDe" value=" " > <?php echo $fila['iddim_VerificacionDerivado']?> </a>
                                    <br>
                            </td>

                            <?php if (is_null($fila['iddim_VerificacionDerivado'])) { ?>    
                             <td id="td1" style="width: 250px"> 
                                    <input type = "text" name = "cod" id="cod" maxlength="6" required autocomplete="off"
                                           onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                               event.returnValue = false;" onkeyup="showUser1(this.value)" readonly >
                            </td>
                                <?php
                            } else {
                                ?>
                             <td id="td1" style="width: 250px"> 
                                 <input type = "hidden" name = "cod" id="cod" value="<?php echo $fila['iddim_VerificacionDerivado']?>" maxlength="6" required autocomplete="off"
                                           onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                               event.returnValue = false;" onkeyup="showUser1(this.value)" readonly >
                            </td>
                                <?php
                            }
                            ?>
                        </tr>                
                    
                    <!--DERIVACION DEL CASO-->
                    
                     <?php //CASO DERIVADO?>
                         <tr>
                             <td id="th1" class="especial">
                                FECHA DE RECEPCION DE CASO DERIVADO
                            </td>
                            <TD id="td1">
    <?php echo $fila['fechaRDerivado'] ?>
                            </td>

    <?php if (is_null($fila['fechaRDerivado'])) { ?>    
                            <td id="td1"><input type = "date" name = "fechaRDerivado" min="1990-01-01" id="fechaRDerivado" value="<?php echo $fila['fechaRDerivado'] ?>" required="" readonly="readonly"><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1">
                                    <input type = "hidden" name = "fechaRDerivado" min="1990-01-01" id="fechaRDerivado" value="<?php echo $fila['fechaRDerivado'] ?>" readonly="readonly"><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>
                        
                         <tr><td id="th1" class="especial">
                                FECHA DE ENVIO/DEVOLUCION DE CASO DERIVADO
                            </td>
                            <TD id="td1">
    <?php echo $fila['fechaDDerivado'] ?><br></td>

    <?php if (is_null($fila['fechaDDerivado'])) { ?>    
                            <td id="td1"><input type = "date" name = "fechaDDerivado" min="1990-01-01" id="fechaDDerivado" value="<?php echo $fila['fechaDDerivado'] ?>" readonly=""><br>
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1"><input type = "hidden" name = "fechaDDerivado" min="1990-01-01" id="fechaDDerivado" value="<?php echo $fila['fechaDDerivado'] ?>" readOnly><br>
                                </TD>
                                <?php
                            }
                            ?>
                        </tr>
                        
                        <?PHP
    $queryOSPES = "SELECT * FROM tipoospe a 
where not  a.codOficina in ('0946','0944','0951','5016','0947','1037','1040','3034','7826')";
    $resultadoOSPES = $conexionmysql->query($queryOSPES);
    
    ?>               
                        <tr>
                             <td id="th1" class="especial">
                                CASO DERIVADO A LA OSPE:
                            </td>
                             <td>
                                <?php echo $fila['oficina'] ?>
                            </td>
                            
                            <?php if (is_null($fila['casoDerivado'])) { ?> 

                                <td id="td1">                            
                                    <select disabled=""name="casoDerivado" required id="casoDerivado" class="especial" onchange="ShowSelected();">
                                <option value="">OSPE</option>
                                <?php while ($row = $resultadoOSPES->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['codOficina']; ?>"><?php echo $row['oficina']; ?></option>
                                <?php } ?>
                            </select> 
                                </td>
                              <td id="td1">                                    
                                  <input type="hidden" id="ofi" name="ofi" value="" />                                  
                              </TD>
                               
                                <?php
                            } else {
                                ?>
                                <td id="td1">
                                    <input type = "hidden" name = "casoDerivado" min="0001-01-01" id="casoDerivado" value="<?php echo $fila['casoDerivado'] ?>" readOnly><br>
                                </TD>
                                
                                <?php
                            }
                            ?>
                         </tr>    
                          <?php 
            $query1="SELECT ve.iddim_Verificacion,ase.iddim_aseguradoindevido,ov.ordenV,ve.an_verifi,ve.num_verifi,ase.idDIM_Oficina ,ofi.cod_oficinaIni, ofi.codOficina, ofi.oficina,
ase.dni_t,ase.autogenerado_t,ase.paterno_t,ase.materno_t,ase.casada_t,ase.nombre1_t 
FROM dim_verificacion ve
left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina
left join dim_overificacion ov on ve.iddim_Verificacion=ov.iddim_Verificacion
left join tipoverificacionperfil tpf on ve.idTVerificacionPerfil=tpf.idTVerificacionPerfil
where ov.iddim_Overificacion='$iddim_VerificacionDerivado' and ve.idTVerificacion='2'";
             $result1 = $conexionmysql->query($query1);
            //recorriendo el conjunto de resultados con un bucle

            while ($fila2 = $result1->fetch_assoc()) {?> 
                         
                         <tr>
                             <td id="th1" class="especial">
                                CASO DERIVADO POR LA OSPE:
                            </td>
                             <td>
                                <?php echo $fila2['oficina'] ?>                                  
                                 <input type = "hidden" name = "cod_oficinaIni" id="cod_oficinaIni" value="<?php echo $fila2['cod_oficinaIni'] ?>" readOnly>
                            </td>
                              <td>
                                
                            </td>
                         </tr>
            <?php }?>
                         
                         <tr>
                            <td id="th1" class="especial">CODIGO DEL CASO QUE SE DERIVA**
                            </td> 
                            <?php if (is_null($fila['fechaDDerivado'])) { ?>    
                                <td id="td1">
                                    <input type="hidden" style="text-align: center;color: #0000CD;font-size: 20px;font-weight: bold;" type="text" class="form-control" id="staticEmail" name="iddim_Verificacion"  value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly">
                                  
                                </TD>
                                <?php
                            } else {
                                ?>
                                <td id="td1">
                                   <input type="text" style="text-align: center;color: #0000CD;font-size: 20px;font-weight: bold;" class="form-control" id="staticEmail" name="iddim_Verificacion"  value="<?php echo $iddim_Verificacion ?>" readOnly="readOnly">
                                  
                                </TD>
                                <?php
                            }
                            ?>
                                <td id="td1">
                                  
                                </TD>            
                          </tr>

                          <tr>
                              <td colspan="3" >
                                  <div id="txtHint0"></div>
                              </td>
                          
                          </tr>
                          
<!--                        <tr>
                            <td id="th1" class="especial">Nº DE OV - OSPE QUE LE DERIVO EL CASO
                            </td> 
                            <td id="td1">
                                
                            </td>
    
                            <td id="td1" style="height: 30px"> 
                                <div id="txtHint0"></div>
                            </td>          
                        </tr>
                        <tr>
                            <td id="th1" class="especial">FECHA DE 
                            </td> 
                            <td id="td1">
                                
                            </td>
    
                            <td id="td1" style="height: 30px"> 
                                <div id="txtHint1"></div>
                            </td>          
                        </tr>-->
                        
                        

                </table>
       
        <label name="mensaje"id="mensaje" style="display:none;">*POR FAVOR INGRESAR EL CODIGO QUE LE PROPORCIONARA LA OSPE QUE LE DERIVA EL CASO</label>
        <label name="mensaje1"id="mensaje1" style="display:none;">**POR FAVOR TENER ENCUENTA EL CODIGO PARA PROPORCIONARLO A LA OSPE QUE RECIBIRA EL CASO</label>
        <?php
        if ($fila['idDIM_Oficina'] == $idOficinaUsuario) {
            
            
        $sql_r= "SELECT COUNT(*) as total FROM dim_verificacion a
                where a.fechaRDerivado is not null and a.fechaDDerivado is not null and a.casoDerivado is not null and a.iddim_VerificacionDerivado is not null
                and iddim_Verificacion='$iddim_Verificacion'";
        
          $result_r = $conexionmysql->query($sql_r);
            //recorriendo el conjunto de resultados con un bucle

            while ($fila_r = $result_r->fetch_assoc()) {                
            $total=$fila_r['total'];
             if ($total == 1) {
             }
             else {
            ?>
                
                <br>
                <!--<input type = "submit"  name = "actualizar" value = "Actualizar">-->
                 <button type= "submit" name = "actualizar" class="button button2">Actualizar</button>
                 <h5>Se actualizara bajo su responsabilidad.</h5>  
                <?php
             }
            }
        }
                ?>
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