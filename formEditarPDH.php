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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!DOCTYPE html>
<html>
<head>
        <style>
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
                
            #th1 {
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-weight:normal;
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            #td1 {
                font-size: 12px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
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
                
                  background-color: #B0C4DE;
            }
            #h5
            {
                font-family:Arial, sans-serif;
                font-size: 16px;
                font-weight:normal;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
                width: 560px;
                height: 25px;
                text-align: center;
                
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
            table {
                width: 50%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 2px;
            }
            #tablaleyenda{
                border: 0px;
            }
            #trleyenda{
                border: 0px;
            }
            #tdleyenda{
                font-family:Arial, sans-serif;
                font-size:12px;
                border: 0px;
                color:#01A9DB;
            }

            th {text-align: left;}

        </style>
        
<script>
function showUser1(str) {
  if (str==="") {
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
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=0",true);
  xmlhttp.send();
}

function showUser2(str) {
  if (str==="") {
    document.getElementById("txtHint1").innerHTML="";
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
      document.getElementById("txtHint1").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=1",true);
  xmlhttp.send();
}
function showUser3(str) {
  if (str==="") {
    document.getElementById("txtHint2").innerHTML="";
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
      document.getElementById("txtHint2").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=2",true);
  xmlhttp.send();
}
function showUser4(str) {
  if (str==="") {
    document.getElementById("txtHint3").innerHTML="";
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
      document.getElementById("txtHint3").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=3",true);
  xmlhttp.send();
}
function showUser5(str) {
  if (str==="") {
    document.getElementById("txtHint4").innerHTML="";
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
      document.getElementById("txtHint4").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=4",true);
  xmlhttp.send();
}


</script>

</head>
<body>
  
    
    <form name="form" action="actualizarDH_Titulares.php" method="POST">
        <?php
        
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        $iddim_aseguradoindevido = $_GET['iddim_aseguradoindevido'];
//        echo $iddim_CPosterior;
        
        
        ?>
        
        
        
        <table> 
            <tr>
                <td id='tho' colspan="7" style="text-align: center">MANTENIMIENTO DE DERECHOHABIENTES DEL TITULAR A VERIFICAR</td>           
            </tr>                         
                   
        <Tr>            
            <td id='tho' style="text-align: center">Vinculo</td>
            <td>
  <select name = "vinculo0" id="vinculo0" disabled="">
                            <option value = ""></option>
                            <option value = "H">HIJO(A)</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA(O)</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                            
                        </select> 
                
                </td>
                <td><?php //echo $fila['vinculo_0'] ?></td>
                <td id='tho'>DNI</td>
                <td>
    <input type="hidden" name="SCCMVTFT" value="<?php echo $iddim_aseguradoindevido ?>" > 
    <input type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly" >
    
    <input id="txt0" name="dh0" type=text value= "<?php //echo $fila['dni_dh_0'] ?>" disabled="" onkeyup="showUser1(this.value)" size='8' minlength="8" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)event.returnValue = false;"> 
 
                </td>
                <td>
                    <div id="ape0" style="width: 300px; display: block"> <?php// echo $fila['apellido_nombre_0'] ?> </div>
    <div id="txtHint0"></div>
    
    </td>
     
    <td>
                                  
        <input id="botoneditar1" type="button" class="button button1" onclick="botonregistrar.disabled=false;txt0.disabled=false; vinculo0.disabled=false; document.getElementById('ape0').style.display='none';document.getElementById('txtHint0').style.display='block'" name="Editar" value="Editar"/>
        
    </td>   
    
        </Tr>
                                   
     <?php
     
     $query = "SELECT 
                        ai.autogenerado_t, ai.dni_t, ai.idDIM_Oficina                       
                        FROM dim_aseguradoindevido ai                        
                        where ai.iddim_aseguradoindevido='$iddim_aseguradoindevido'";

                //Obteniendo el conjunto de resultados
                $result = $conexionmysql->query($query);
                //recorriendo el conjunto de resultados con un bucle

                while ($fila = $result->fetch_assoc()) {
        
     
                                 //ULTIMOOOOOO CAMBIO
                            if ($fila['idDIM_Oficina'] == $idOficinaUsuario) { 
                                ?>
    <tr>
        <td colspan="4">
        <input  id="botonregistrar" class="button button2" type = "submit" disabled="" onclick="return confirm('Estas seguro que desea Registrar?');" name = "registrar" value = "Registrar">
        <!--<input type = "button" class="button button1" onclick="txt0.disabled = false;txt1.disabled = false;txt2.disabled = false; txt3.disabled = false;txt4.disabled = false; botonregistrar.disabled=false;vinculo0.disabled=false;vinculo1.disabled=false;vinculo2.disabled=false;vinculo3.disabled=false;vinculo4.disabled=false; " name = "editar" value = "Editar" >-->
<!--        <input type="button" class="button button1" onclick="botonregistrar.disabled=false;txt0.disabled=false; vinculo0.disabled=false; document.getElementById('ape0').style.display='none';" name="Editar" value="Editar">-->
        <input type="button" class="button button2" onclick="txt0.disabled=true; vinculo0.disabled=true; document.getElementById('ape0').style.display='block'; document.getElementById('txtHint0').style.display='none'; 
                                                             txt1.disabled=true; vinculo1.disabled=true; document.getElementById('ape1').style.display='block'; document.getElementById('txtHint1').style.display='none'; 
                                                             txt2.disabled=true; vinculo2.disabled=true; document.getElementById('ape2').style.display='block'; document.getElementById('txtHint2').style.display='none'"
                                                                                                              name="Cancelar" value="Cancelar">
<!--//                                                             txt3.disabled=true; vinculo3.disabled=true; document.getElementById('ape3').style.display='block'; document.getElementById('txtHint3').style.display='none'; 
//                                                             txt4.disabled=true; vinculo4.disabled=true; document.getElementById('ape4').style.display='block'; document.getElementById('txtHint4').style.display='none'"-->
                                                             
        <!--<input id="botoneliminar" class="button button1" type="submit"  onclick="return confirm('Estas seguro que desea Eliminar Todo?');"  name="eliminar" value="Eliminar">-->
        </td>
    </tr>
     <?php
     
     
     
                } }
                //liberando los recursos
               //$result000->free();
                ?>
</tbody>
</table>         
           
            <p></p>
       <table id="tablaleyenda" cellspacing="8"> 
        <tr id="trleyenda">
         <td id="tdleyenda" > 
             <u><b> TIPO VINCULO</b></u>
          </td>
          </tr>
          <tr id="trleyenda">
         <td id="tdleyenda">C. Conyuge</td>
          </tr>
          <tr id="trleyenda">
         <td id="tdleyenda">N. Concubino(a)</td>
          </tr>
          <tr id="trleyenda">
         <td id="tdleyenda">G. Gestante</td>
          </tr>
          <tr id="trleyenda">
         <td id="tdleyenda">H. Hijo(a)</td>
          </tr>
         <tr id="trleyenda">
         <td id="tdleyenda">O. Otros</td>
          </tr>
        </table>  

    </form>
    
</body>
</html>
