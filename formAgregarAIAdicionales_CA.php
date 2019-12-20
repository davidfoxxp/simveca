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
?>

<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/funciones.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen">
        <script type="text/javascript" src="../SISGASV/js/jquery-1.12.4.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>   

        <script>var $j = jQuery.noConflict();</script>

        <style type="text/css">
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
                padding:10px 5px;
                border-style:solid;border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
               
                  background-color: #B0C4DE;
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
            $(function () {
                $("#dialog1").hide();
                function abrir1() {     //formEditarPCalificar_dh
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        width: 600,
                        height: 480,
                        modal: true
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
                       width: 600,
                          height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });


                $("#dialog3").hide();
                function abrir3() {
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                   width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });

                $("#dialog4").hide();
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                     width: 600,
                          height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });

                $("#dialog5").hide();
                function abrir5() {
                    $("#dialog5").show();
                    $("#dialog5").dialog({
                        resizable: false,
                    width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup5").click(
                        function () {
                            abrir5();
                        });
                        
                        $("#dialog6").hide();
                function abrir6() {
                    $("#dialog6").show();
                    $("#dialog6").dialog({
                        resizable: false,
                    width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup6").click(
                        function () {
                            abrir6();
                        });
                        
                        $("#dialog7").hide();
                function abrir7() {
                    $("#dialog7").show();
                    $("#dialog7").dialog({
                        resizable: false,
                     width: 600,
                        height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup7").click(
                        function () {
                            abrir7();
                        });
                        
                        $("#dialog8").hide();
                function abrir8() { //formEditarPDH
                    $("#dialog8").show();
                    $("#dialog8").dialog({
                        resizable: false,
                     width: 600,
                         height: 290,
                        modal: true
                    });
                }
                $("#abriPoppup8").click(
                        function () {
                            abrir8();
                        });
                function abrir9() {
                    $("#dialog9").show();
                    $("#dialog9").dialog({
                        resizable: false,
                      width: 600,
                         height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup9").click(
                        function () {
                            abrir9();
                        });
                        
                function abrir10() {
                    $("#dialog10").show();
                    $("#dialog10").dialog({
                        resizable: false,
                       width: 890,
                         height: 480,
                        modal: true
                    });
                }
                $("#abriPoppup10").click(
                        function () {
                            abrir10();
                        });

            });
        </script>

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

function showUser6(str) {
  if (str==="") {
    document.getElementById("txtHint5").innerHTML="";
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
      document.getElementById("txtHint5").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=5",true);
  xmlhttp.send();
}

function showUser7(str) {
  if (str==="") {
    document.getElementById("txtHint6").innerHTML="";
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
      document.getElementById("txtHint6").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../sisgasv/include/getreniec.php?q="+str+" & a=6",true);
  xmlhttp.send();
}


</script>

    </head>
    <body>  
        
        <form name="form" action="actualizarDHt.php" method="POST">

<?php
$iddim_usuario = utf8_decode($row['iddim_usuario']);
$idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
$codOficina = utf8_decode($row['codOficina']);

$iddim_aseguradoindevido = $_GET['iddim_aseguradoindevido'];
$vacio="";
?>
            <?php
            $query000 = "SELECT b.dni_t, a.iddim_Overificacion, a.idDIM_Oficina, a.ordenV, numero 
                            FROM dim_overificacion a 
                            left join dim_aseguradoindevido b on a.iddim_Overificacion=b.iddim_aseguradoindevido
                            WHERE a.iddim_Verificacion=$iddim_aseguradoindevido";

//Obteniendo el conjunto de resultados
            $result000 = $conexionmysql->query($query000);
            $i = 0;
//recorriendo el conjunto de resultados con un bucle
            ?>
            
            <table id="t1" border="1" summary="">                 

                <th id="th1" colspan="3" >LISTA ACTUAL ASEGURADOS INDEBIDOS DE LA MISMA EMPRESA</th>
                <tr>
                    <th id="td1" style="text-align: center">DNI </th> 
                    <th id="td1" style="text-align: center">ORDEN DE VERIFICACION </th> 
                    <th id="td1" style="text-align: center">CORRELATIVO</th> 
                </tr>
<?php
    while ($fila = $result000->fetch_assoc()) {
    $i++;
    $vacio =  $fila['dni_t'];
    ?>

                    <tr>
                        <th id="td1">                           
                        <?php echo $fila['dni_t'] ?>
                        </th>   

                        <th id="td1">                           
                        <?php echo $fila['ordenV'] ?>
                        </th>     
                        <th id="td1">
                            <?php echo $fila['numero'] ?>
                        </th>  
                    </tr>

                        <?php } ?>
                         <tr>
         <td colspan="2" style="font-size: 10px">
                 <a href="#" id="abriPoppup8" style="">INGRESAR MANUALMENTE MAS ASEGURADOS INDEBIDOS DE LA MISMA EMPRESA
                                </a>
            
                            </td>

                        <div id="dialog8" title="ASEGURADOS INDEBIDOS DE LA MISMA EMPRESA" class="contenido">
                            <iframe src="formAgregarAIAdicionales_Agrega.php?iddim_aseguradoindevido=<?php echo $iddim_aseguradoindevido ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                         
     </tr>    
    
            </table>
            <table>
                <tr id="trleyenda">
        <td id="tdleyenda" > 
          <h5>Se actualizara bajo su responsabilidad.</h5>  
     </td>
     </tr>
            </table>
        </form>
    </body>
</html>





