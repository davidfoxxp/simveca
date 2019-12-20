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

<!DOCTYPE html>
<html>
<head>
        <style>
            table {
                width: 50%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 2px;
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
    <table>  
        <?php
        
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        
        $iddim_CPosterior = $_GET['iddim_CPosterior'];
        echo $iddim_CPosterior;
        ?>
        
        <thead>
        <h4>INSERTAR DERECHO HABIENTES DEL TITULAR A VERIFICAR</h4>
        </thead>
        <tbody>
        <Tr>            
            <td>Vinculo</td>
            <td>
  <select name = "vinculo0" id="vinculo0">
                            <option value = ""></option>
                            <option value = "H">HIJO</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                            
                        </select> 
                </td>
                <td>DNI</td>
                <td>
    <input type="hidden" name="SCCMVTFT" value="<?php echo $iddim_CPosterior ?>" > 
    <input type="HIDDEN" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly">  
    <input name="dh0" onkeyup="showUser1(this.value)" size='8'> 
                </td>
                <td>
    <div id="txtHint0"></div>
    </td>
    </Tr>
    <Tr>
            <td>Vinculo</td>
            <td>
  <select name = "vinculo1" id="vinculo1">
                            <option value = ""></option>
                            <option value = "H">HIJO</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                           
                        </select> 
                </td>
                <td>DNI</td>
                <td>
    <input name="dh1" onkeyup="showUser2(this.value)" size='8'> 
                </td>
                <td>
    <div id="txtHint1"></div>
    </td>
    </Tr>
    <Tr>
            <td>Vinculo</td>
            <td>
  <select name = "vinculo2" id="vinculo2">
                            <option value = ""></option>
                            <option value = "H">HIJO</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                            
                        </select> 
                </td>
                <td>DNI</td>
                <td>
    <input name="dh2" onkeyup="showUser3(this.value)" size='8'> 
                </td>
                <td>
    <div id="txtHint2"></div>
    </td>
    </Tr>
    <Tr>
            <td>Vinculo</td>
            <td>
  <select name = "vinculo3" id="vinculo3">
                            <option value = ""></option>
                            <option value = "H">HIJO</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                          
                        </select> 
                </td>
                <td>DNI</td>
                <td>
    <input name="dh3" onkeyup="showUser4(this.value)" size='8'> 
                </td>
                <td>
    <div id="txtHint3"></div>
    </td>
    </Tr>
    <Tr>
            <td>Vinculo</td>
            <td>
  <select name = "vinculo4" id="vinculo4">
                            <option value = ""></option>
                             <option value = "H">HIJO</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA</option>
                            <option value = "G">GESTANTE</option>
                            <option value = "O">OTROS</option>                            
                        </select> 
                </td>
                <td>DNI</td>
                <td>
    <input name="dh4" onkeyup="showUser5(this.value)" size='8'> 
                </td>
                <td>
    <div id="txtHint4"></div>
    </td>
    </Tr>
    <tr>
        <td>
        <input type = "submit" onclick="return confirm('Estas seguro que desea Registrar?');" name = "registrar" value = "Registrar">
        </td>
    </tr>
</tbody>
</table>
    </form>
</body>
</html>
