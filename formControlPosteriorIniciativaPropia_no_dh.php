 <?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require '../SISGASV/conexionesbd/conexion_mysql.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}

$idtusuario = $_SESSION['usuario'];

$sql = "SELECT o.cod_oficinaIni, o.oficinaIni,
        o.idDIM_Oficina, o.codOficina, u.iddim_usuario, 
        concat(u.pape, ' ', u.sape, ' ', u.pnom, ' ' ,ifnull(u.snom,' ')) as nombres, 
        o.nomenclatura,o.nomenclaturaOSPE, o.oficina
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SIMVECA</title>
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>

        <!-- Beginning of compulsory code below -->

        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>        
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>
        <!-- / END -->
        
        <style type="text/css">
            #th1 { 
                color: #339900;
             
            }
        </style>
        
       <script>
            function habilitarbaja(value)
            {
                if (value === '1')
                {
                    // habilitamos
                    
                    document.getElementById("nResBRegistro00").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("ano").disabled = false;

                    document.getElementById("nit").disabled = false;
                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;
                    document.getElementById("idTEstadoActual").value = "2";
                    document.getElementById("idTEstadoActual").disabled = false;
                   
                    document.getElementById("fechaemi").style.display="block";
                    document.getElementById("fechaeva").style.display="none";
                    document.getElementById("siesno").style.display="block";
                    document.getElementById("siesno2").style.display="block";
                    document.getElementById("siesno3").style.display="none";
                    document.getElementById("finicali").disabled = true;
                    document.getElementById("ffincali").disabled = true;
                    document.getElementById("finicali").required=false;
                    document.getElementById("ffincali").required=false;

                } else if (value === '2') {
                    // deshabilitamos      
                    
                    document.getElementById("nResBRegistro00").disabled = true;
                    document.getElementById("unidad").disabled = true;
                    document.getElementById("ano").disabled = true;
                    document.getElementById("cbx_perfil").required = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("fnotificacionBRegistro").disabled = true;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = true;
                    document.getElementById("idTEstadoActual").disabled = true;
                    document.getElementById("idTEstadoActual").value = "3";
                    document.getElementById("idTEstadoActual0").disabled = false;
                    document.getElementById("idTEstadoActual0").value = "3";
                    
                    document.getElementById("fechaemi").style.display="none";
                    document.getElementById("fechaeva").style.display="block";
                    document.getElementById("siesno").style.display="none";
                    document.getElementById("siesno2").style.display="none";
                    document.getElementById("siesno3").style.display="block";
                    document.getElementById("finicali").disabled = false;
                    document.getElementById("ffincali").disabled = false;
                    document.getElementById("finicali").required=true;
                    document.getElementById("ffincali").required=true;
                }
            }
        </script>
        
        <script>
            function habilitarbaja2(value)
            {
                if (value === '2')
                {
                    // habilitamos
                    
                    document.getElementById("nResBRegistro00").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("ano").disabled = false;

                    document.getElementById("nit").disabled = false;
                    document.getElementById("fnotificacionBRegistro").disabled = false;
                    document.getElementById("femisionBRegistro").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;
                    
                    
                    document.getElementById("nResBRegistro00").required = true;
                    document.getElementById("unidad").required = true;
                    document.getElementById("ano").required = true;
                    document.getElementById("cbx_perfil").required = true;
                    document.getElementById("nit").required = true;
//                    document.getElementById("fnotificacionBRegistro").required = true;
                    document.getElementById("femisionBRegistro").required = true;
//                    document.getElementById("idTRRBRegistro").required = true;
                    document.getElementById("cbx_origencp").required = true;
                    
                    
                    
                    

                } else if (value === '1') {
                    // deshabilitamos      
                    
                    document.getElementById("nResBRegistro00").disabled = true;
                    document.getElementById("unidad").disabled = true;
                    document.getElementById("ano").disabled = true;

                    document.getElementById("nit").disabled = true;
                    document.getElementById("fnotificacionBRegistro").disabled = true;
                    document.getElementById("femisionBRegistro").disabled = true;
                    document.getElementById("idTRRBRegistro").disabled = true;
                    //document.getElementById("idTEstadoActual").disabled = true;
                    document.getElementById("idTEstadoActual").value = "1";
                    document.getElementById("idTEstadoActual0").disabled = false;
                    document.getElementById("idTEstadoActual0").value = "1";
                    document.getElementById("cbx_perfil").required = false;

                }
            }
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


</script>
        
<script type="text/javascript">
    function showContentGrado() {
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
    };
</script>
        
        <script>
    var mostrarValor = function(x){
            document.getElementById('textoOAS').value=x;
            };
</script>
        
        <script>
            document.onkeydown = function(e){ 
tecla = (document.all) ? e.keyCode : e.which;
if (tecla == 116) return false
};
</script>
        
                

        
    </head>
    
    <body class="vimeo-com">

        <h4><img src="imagenes/logo_login.png" alt="" />

            <?PHP
            echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni']) . '-' . ($row['oficina']);
            echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . ($row['oficina']);
            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);
            $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            $codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $nomenclaturaOSPE = $row['nomenclaturaOSPE'];
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina =($row['oficina']);
            ?>  
        </h4>

        <!-- Beginning of compulsory code below -->
        <ul id="nav" class="dropdown dropdown-horizontal">
            <li><a href="welcome.php">Inicio</a></li>
            <li><a href="#">Control Posterior</a>
                <ul>	
                     <li><a href="#">Registros por Iniciativa Propia</a>
                        <ul>
                            <li><a href="formControlPosteriorIniciativaPropia.php">Titulares</a></li>
                            <li><a href="formControlPosteriorIniciativaPropia_dh.php">Derecho Habientes</a></li>
                            <li><a href="formControlPosteriorIniciativaPropia_no_dh.php">Derecho Habientes no Registrado</a></li>
                        </ul>
                    </li>	
                    
                    <!--<li><a href="formControlPosteriorIniciativaPropia.php"><span class=""><i class="icon icon-home3"></i></span>Registros por Iniciativa Propia</a></li>-->
                    <li><a href="#">Listar</a>
                        <ul>
                            <li><a href="formListarControlPosteriorUsuario.php">Registros de Bajas</a></li>
                            <!--<li><a href="formListarControlPosterior.php">Registros de Bajas de TODAS las OSPE</a></li>-->
                        </ul>
                    </li>			
                </ul>
            </li>
            <li><a href="#">Verificacion</a>
                <ul>		
                    <li><a href="#">Registros por Iniciativa Propia</a>
                     <ul>
                            <li><a href="formVerificacionIniciativaPropia.php">Titulares</a></li>
                            <li><a href="formVerificacionIniciativaPropia_n_ruc.php">Titular sin Empresa</a></li>     
                        </ul>
                        </li>
                    <li><a href="#">Listar</a>
                        <ul>
                            <li><a href="formListarVerificacionUsuario.php">Registros de Bajas</a></li>
                            <!--<li><a href="formListarVerificacion.php">Registros de Bajas de TODAS las OSPE</a></li>-->
                        </ul>
                    </li>			
                </ul>
            </li>
            <li><a href="#">Videos</a>
                <ul>
                    <li><a href="#">CONTROL POSTERIOR</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\1.mp4" target="_blank">DIA 1</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\2.mp4" target="_blank">DIA 2</a></li>                            
                        </ul>
                    </li>
                    <li><a href="#">CONTROL POSTERIOR NUEVOS VIDEOS</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_SI_Terminado.mp4" target="_blank">Reg_SI_Terminado</a></li>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Registro_NO_Terminado.mp4" target="_blank">Reg_NO_Terminado</a></li>                            
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\FIRMES_Y_CONSENTIDAS.mp4" target="_blank">FIRM_Y_CONSENT</a></li>                            
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Exportar_pdf_SIMVECA.mp4" target="_blank">EXTRACCION PDF</a></li>
                        </ul>
                    </li>
                    <li><a href="#">VERIFICACION</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\SIMVECA_VERIFICACION_1.mp4" target="_blank">Verificacion</a></li>                           
                        </ul>
                    </li> 
                </ul>
            </li>
            <li><a href="#">MANUALES</a>
                <ul>
                    <li><a href="#">AGREG_+_TIT_OV</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\AGREGAR_MAS_TITULARES_CON_EL_MISMO_NUMERO_OV.pptx" target="_blank">OV</a></li>
                                                                    
                        </ul>
                        </li> 
                    <li><a href="#">ARCHIVO Y DERIVADO</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ARCHIVO_Y_DERIVADO.pptx" target="_blank">ARCHIVO Y DERIVADO</a></li>                                                                    
                        </ul>
                        </li> 
                    <li><a href="#">ELIMINAR CAMPOS</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ELIMINAR_CAMPOS_EN_EL_SIMVECA.pptx" target="_blank">PERIODOS DE BAJA Y CARTA A FINANZA</a></li>                                                                    
                        </ul>
                        </li> 
                      <li><a href="#">ESTADOS RES Y REGISTRO DE C.E.</a>
                     <ul>
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\ESTADOS_RESOLUCION_SIMVECA_FINAL.pptx" target="_blank">MODULO ESTADO DE LA RESOLUCION</a></li>                                                                    
                         <li><a href="..\SISGASV\CAPACITACION_SIMVECA\Extranjeros_en_el_SIMVECA.pptx" target="_blank">MODULO REGISTRO DE EXTRANJEROS (C.E.)</a></li>                                                                    
                        </ul>
                        </li> 
                </ul>
            </li>
            <li><a href="logout.php">Salir</a></li>
        </ul>
        <!-- / END -->

        <?php
        $dni = NULL;
        $periodo = NULL;
        $red = NULL;
        $ruc = NULL;
        $dnidhno=NULL;
        if (isset($_POST['buscar'])) {
            $dni = $_POST['dni'];
            $dnidhno = $_POST['dnidhno'];
            $ruc = $_POST['ruc'];
        }
        $idtusuario = $_SESSION['usuario'];
        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?>   

        <div class="container" id="advanced-search-form">
            <h2>BUSCAR DATOS DEL ASEGURADO</h2>
            <form name="form" action="" method="POST" class="form-horizontal">   
                <div class="form-group">
                    <label for="first-name">INGRESE EL DNI TITULAR:</label>
                    <input type="text" class="form-control" id="first-name" name="dni" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                </div>
                <div class="form-group">
                    <label for="first-name">DNI DH NO VINCULADO:</label>
                    <input type="text" class="form-control" id="first-name" name="dnidhno" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                </div>
                <div class="form-group">
                    <label for="country">HABILITAR RUC</label>                
                    <input type="checkbox" id="check1" value="1" onclick="habilitar()" checked>
                </div>   
                <div class="form-group">
                    <label for="last-name">INGRESE RUC</label>
                    <input type="number" class="form-control" id="ruc" name="ruc" readOnly maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                </div>
         
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search" name="buscar" value="Buscar"> <span class="glyphicon glyphicon-search"></span> Buscar</button>    
            </form>
        </div> 

        <?php
        include './conexionesbd/conexion_oracle.php';
//        $queryT = oci_parse($conexionora, "SELECT sc.dgansas, sc.dgacaut, sc.dgatapa || ' ' ||  sc.dgatama || ' ' ||sc.dgatpno || ' ' || nvl(sc.dgatsno, '') as datos, sc.dgactdi,
//                                                case when sc.dgactdi='1' then 'LE/DNI'
//                                                     when sc.dgactdi='2' then 'Carné de Extranjería'
//                                                     when sc.dgactdi='3' then 'Partida de Nacimiento'
//                                                     when sc.dgactdi='4' then 'RUC'
//                                                     when sc.dgactdi='5' then 'Identificacion Militar'
//                                                     when sc.dgactdi='6' then 'Doc.Prov.de Identidad'
//                                                     when sc.dgactdi='7' then 'Nro Documento'
//                                                     when sc.dgactdi='8' then 'Doc.Educacion Superior'
//                                                     when sc.dgactdi='9' then 'Trabajador Menor de Edad'
//                                                     end as dgactdi_des,
//                                                     sc.dgandid as dni, sc.DGACUGD, sg.departamen || ' - ' || sg.provincia || ' - ' || sg.distrito, sc.DGATCAL || ' ' || sc.DGANILO || ' ' || sc.DGANNMK || ' ' || sc.DGATURB as direccion 
//                                                FROM dim_SCCMDGAT sc 
//                                                left join DIM_SGAD_HIS_ADSCRIPCION_LOCAL sg on sc.DGACUGD=sg.ubigeo
//                                                where sc.dgandid='$dni' and sg.periodo = 
//                                            (select MAX(t.PER_APORTA) from DIM_CUENTA_INDIV_00_161718 t where t.NUM_DOCIDE_ASEG='$dni')");
        
         $queryT = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut, 
                                            (t.TXT_APEPATERNO|| ' ' ||nvl(t.TXT_APEMATERNO,'')|| ' ' ||nvl(t.TXT_APEMATCASADA,'')|| ' ' ||t.TXT_NOMBRES) as datos,
                                            sc.dgactdi,
                                            case when sc.dgactdi='1' then 'LE/DNI'
                                            when sc.dgactdi='2' then 'Carné de Extranjería'
                                            when sc.dgactdi='3' then 'Partida de Nacimiento'
                                            when sc.dgactdi='4' then 'RUC'
                                            when sc.dgactdi='5' then 'Identificacion Militar'
                                            when sc.dgactdi='6' then 'Doc.Prov.de Identidad'
                                            when sc.dgactdi='7' then 'Nro Documento'
                                            when sc.dgactdi='8' then 'Doc.Educacion Superior'
                                            when sc.dgactdi='9' then 'Trabajador Menor de Edad'
                                            end as dgactdi_des,
                                            sc.dgandid as dni, sc.DGACUGD, u.departamento || ' - ' || u.provincia || ' - ' || u.distrito as ubigeo, t.txt_direccion as direccion, 
                                            t.cod_estcivil,       
                                            case when T.cod_sexo='0' then 'MUJER'
                                            when t.cod_sexo='1' then 'HOMBRE' 
                                            end as des_sexo 
                                     from dim_csamreniec t 
                                     LEFT JOIN dim_ubigeo u 
                                     ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                     AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                     AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                     left join dim_SCCMDGAT sc on t.ide_dni=sc.dgandid
                                     WHERE t.ide_dni='$dni'");

        oci_execute($queryT);

        while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
            ?>
            <div class="container" id="advanced-search-form_2">
                <h2>DATOS DEL ASEGURADO - TITULAR</h2>

                <form name="form" method="POST">
                    <div class="form-group">
                        <label for="first-name">APELLIDOS Y NOMBRES</label>                        
                        <input type="text" class="form-control nombres" id="first-name" name="datos" value="<?php echo $row[2] ?>" readonly></input>
                    </div>
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="first-name">DOCUMENTO IDENTIDAD</label>
                        <input class="form-control" type="HIDDEN" name="dgansas" value="<?php echo $row[0] ?>" readOnly="readOnly"></input>
                        <input class="form-control" type="HIDDEN" name="tipodoc"  value="<?php echo $row[3] ?>" readOnly="readOnly"></input>
                        <a href="#" id="abriPoppup1">
                            <input type="text" class="form-control" name="dni" value="<?php echo $row[5] ?>" readOnly></input>
                        </a>
                        <div id="dialog1" title="SGVCA" class="contenido">
                            <iframe src="formularioPersona.php?dni=<?php echo $row[5] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="category">AUTOGENERADO</label>
                        <input type="text" class="form-control" name="dgacaut" value="<?php echo $row[1] ?>" readOnly="readOnly"></input>                            
                    </div>
                    <div class="form-group">
                        <label for="number">UBIGEO</label>
                        <input type="HIDDEN" name="ubigeo" value="<?php echo $row[6] ?>" readOnly="readOnly"></input>   
                        <input type="text" class="form-control" name="dubigeo" value="<?php echo $row[7] ?>" readonly></input>                        
                    </div>
                    <div class="form-group">
                        <label for="sexo">SEXO</label>
                        <input type="text" class="form-control" name="sexo" readonly></input>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">DOMICILIO</label>
                        <input type="text" class="form-control nombres" name="domicilioA" value="<?php echo $row[8] ?>" readonly></input>                            
                    </div>

                     <div class="form-groupppp">
                        <label for="domicilio">TIPO DE REGISTRO</label>
                         <select class="form-control" name = "tregistro" id="ttrabajador" required>
                                <option value = "">--</option>                                
                                <option value="1">ASEGURADO</option>
                                <option value="2">EMPLEADOR</option>                                
                            </select>
                    </div>
                    
                    <div class="clearfix"></div>
                    <?php
                }

//liberando los recursos
                oci_free_statement($queryT);
                ?> 

                <?php
                include './conexionesbd/conexion_oracle.php';
                $querydhno = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut, 
                                            (t.TXT_APEPATERNO|| ' ' ||nvl(t.TXT_APEMATERNO,'')|| ' ' ||nvl(t.TXT_APEMATCASADA,'')|| ' ' ||t.TXT_NOMBRES) as datos,
                                            sc.dgactdi,
                                            case when sc.dgactdi='1' then 'LE/DNI'
                                            when sc.dgactdi='2' then 'Carné de Extranjería'
                                            when sc.dgactdi='3' then 'Partida de Nacimiento'
                                            when sc.dgactdi='4' then 'RUC'
                                            when sc.dgactdi='5' then 'Identificacion Militar'
                                            when sc.dgactdi='6' then 'Doc.Prov.de Identidad'
                                            when sc.dgactdi='7' then 'Nro Documento'
                                            when sc.dgactdi='8' then 'Doc.Educacion Superior'
                                            when sc.dgactdi='9' then 'Trabajador Menor de Edad'
                                            end as dgactdi_des,
                                            sc.dgandid as dni, sc.DGACUGD, u.departamento || ' - ' || u.provincia || ' - ' || u.distrito as ubigeo, t.txt_direccion as direccion, 
                                            t.cod_estcivil,       
                                            case when T.cod_sexo='0' then 'MUJER'
                                            when t.cod_sexo='1' then 'HOMBRE' 
                                            end as des_sexo 
                                     from dim_csamreniec t 
                                     LEFT JOIN dim_ubigeo u 
                                     ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                     AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                     AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                     left join dim_SCCMDGAT sc on t.ide_dni=sc.dgandid
                                     WHERE t.ide_dni='$dnidhno'");
        oci_execute($querydhno);
                

                while ($row = oci_fetch_array($querydhno, OCI_NUM + OCI_RETURN_NULLS)) {
                    
                    ?> 
                    <h2>DATOS DERECHOHABIENTE NO VINCULADO</h2>

                    <div class="form-group">
                        <label for="last-name">APELLIDOS Y NOMBRES</label>
                        <input type="text" class="form-control nombres" id="first-name" name="DHno" value="<?php echo $row[2] ?>" readonly></input>                        
                    </div>     
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="first-name">DOCUMENTO IDENTIDAD</label>                        
                        <input type="text" class="form-control" name="dni_dh" value="<?php echo $row[5] ?>" readOnly></input>                        
                    </div>  
                    
                    <div class="form-group">
                        <label for="category">AUTOGENERADO</label>
                        <input type="text" class="form-control" name="dgacautDH" value="<?php echo $row[1] ?>" readOnly="readOnly"></input>                            
                    </div>
                    <div class="form-group">
                        <label for="number">UBIGEO</label>
                        <input type="HIDDEN" name="ubigeoDH" value="<?php echo $row[6] ?>" readOnly="readOnly"></input>   
                        <input type="text" class="form-control" name="dubigeoDH" value="<?php echo $row[7] ?>" readonly></input>                        
                    </div>
                    <div class="form-group">
                        <label>TIPO DE VINCULO</label>
<!--                        <input type="text" class="form-control" name="sexoDH" readonly></input>-->
                            <select name = "vinculodhno" id="vinculo0" required class="form-control">
                            <option value = ""></option>
                            <option value = "H">HIJO(A)</option>
                            <option value = "C">CONYUGE</option>
                            <option value = "N">CONCUBINA(O)</option>
                            <option value = "G">GESTANTE</option> 
                            <option value = "I">HIJO INCAP.</option> 
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                     <div class="form-group">
                        <label for="first-name">DOMICILIO</label>                        
                        <input type="text" class="form-control nombres" name="domicilioDH" value="<?php echo $row[8] ?>" readonly></input>                        
                    </div>
                    
                    
   
                    <div class="clearfix"></div>
                   
                    <?php
                }
                //liberando los recursos
                oci_free_statement($querydhno);
                ?>

                <?php
                if ($ruc == NULL) {

                    $queryemp = oci_parse($conexionora, "select cc.NOMBRE, cc.NUMRUC, nn.PER_APORTA,
                                            cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion,
                                            cc.UBIGEO, u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO
                                            from dim_cuenta_indiv_01_10_XX nn
                                            left join dim_CONTRIBUYENTES cc on nn.NUM_DOCIDE_EMPL=cc.NUMRUC
                                            left join dim_UBIGEO u 
                                                    on substr(cc.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cc.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cc.UBIGEO, 5, 2)=u.S_DI98
                                            where nn.NUM_DOCIDE_ASEG='$dni' and not nn.COD_TRIBUTO='052101' and not nn.COD_TRIBUTO='052104' and nn.PER_APORTA = 
                                            (select MAX(t.PER_APORTA) from dim_cuenta_indiv_01_10_XX t where t.NUM_DOCIDE_ASEG='$dni' and not t.COD_TRIBUTO='052101' and not t.COD_TRIBUTO='052104')");

                    oci_execute($queryemp);
                    while ($row = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {

                        $periodo = $row[2];
                        ?> 

                        <h2>DATOS DE LA EMPRESA</h2>
                        <div class="form-group">
                            <label for="first-name">RAZON SOCIAL</label>                        
                            <input type="text" class="form-control" id="first-name" name="nombreEntidad1" value="<?php echo $row[0] ?>" readonly></input>                        
                        </div>
                        
                        <div class="form-group">
                            <label for="last-name">RUC</label>
                            <input type="text" class="form-control" id="first-name" name="NUMRUC1" value="<?php echo $row[1] ?>" readonly></input>                                                    
                        </div>
                        
                        <div class="form-group">
                            <label for="first-name">DIRECCION</label>                        
                            <input type="HIDDEN" class="form-control" name="ubigeoAE1" value="<?php echo $row[4] ?>" readOnly></input>  
                            <input type="text" class="form-control" name="direccionAE1" value="<?php echo $row[5], ' - ', $row[3] ?>" readOnly></input>                          
                        </div>  

                        <div class="form-group">
                            <label for="first-name">ULTIMO APORTE</label>                        
                            <input type="text" class="form-control" name="APORTE1" value="<?php echo $row[2] ?>" readOnly></input>                         
                        </div>  
                        <div class="clearfix"></div>


                        <?php
                    }
//liberando los recursos
                    oci_free_statement($queryemp);
//$conexion->close()
                    ?> 

                    <?php
                } else {
                    $queryemp2 = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, 
                                                        case when cc.flag22='00' then 'HABIDO'
                                                        when cc.flag22='01' then 'NO HALLADO SE MUDO DE DOMICILIO'
                                                        when cc.flag22='02' then 'NO HALLADO FALLECIO'
                                                        when cc.flag22='03' then 'NO HALLADO NO EXISTE DOMICILIO'
                                                        when cc.flag22='04' then 'NO HALLADO CERRADO'
                                                        when cc.flag22='05' then 'NO HALLADO NRO.PUERTA NO EXISTE'
                                                        when cc.flag22='06' then 'NO HALLADO DESTINATARIO DESCONOCIDO'
                                                        when cc.flag22='07' then 'NO HALLADO RECHAZADO'
                                                        when cc.flag22='08' then 'NO HALLADO OTROS MOTIVOS'
                                                        when cc.flag22='09' then 'PENDIENTE'
                                                        when cc.flag22='10' then 'NO APLICABLE'
                                                        when cc.flag22='11' then 'POR VERIFICAR'
                                                        when cc.flag22='12' then 'NO HABIDO'
                                                        when cc.flag22='20' then 'NO HALLADO'
                                                        when cc.flag22='21' then 'NO EXISTE LA DIRECCION DECLARADA'
                                                        when cc.flag22='22' then 'DOMICILIO CERRADO'
                                                        when cc.flag22='23' then 'NEGATIVA RECEPCION X PERSONA CAPAZ'
                                                        when cc.flag22='24' then 'AUSENCIA DE PERSONA CAPAZ'
                                                       when cc.flag22='40' then 'DEVUELTO'
                                                        else '-'
                                                   end as cond_domicilio_emp,                                                   
                                                   case when cc.ESTADO='00' then  'ACTIVO'
                                                        when cc.ESTADO='01' then  'BAJA PROVISIONAL'
                                                        when cc.ESTADO='02' then  'BAJA PROV. POR OFICIO'
                                                        when cc.ESTADO='03' then  'SUSPENSION TEMPORAL'
                                                        when cc.ESTADO='04' then  'ANUL.PROVI.-ACTO ILICITO'
                                                        when cc.ESTADO='10' then  'BAJA DEFINITIVA'
                                                        when cc.ESTADO='11' then  'BAJA DE OFICIO'
                                                        when cc.ESTADO='12' then  'BAJA MULT.INSCR. Y OTROS'
                                                        when cc.ESTADO='20' then  'NUM. INTERNO IDENTIF.'
                                                        when cc.ESTADO='21' then  'OTROS OBLIGADOS'
                                                        when cc.ESTADO='22' then  'INHABILITADO-VENT.UNICA'
                                                        when cc.ESTADO='30' then  'ANULACION - ERROR SUNAT'
                                                        when cc.ESTADO='31' then  'ANULACION - ACTO ILICITO'
                                                        else '-'
                                                    end as estado_empresa,
                                                    cc.UBIGEO,
                                                    u.DEPARTAMENTO || ' - ' || u.PROVINCIA || ' - ' || u.DISTRITO UBIGEO,
                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                                    from dim_CONTRIBUYENTES cc
                                                    left join dim_UBIGEO u 
                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
                                                    where cc.NUMRUC='$ruc'");

                    oci_execute($queryemp2);

                    while ($row = oci_fetch_array($queryemp2, OCI_NUM + OCI_RETURN_NULLS)) {
                        $periodo = $row[2];
                        ?>  

                        <h2>DATOS DE LA EMPRESA</h2>
                        <div class="form-group">
                            <label for="first-name">RAZON SOCIAL</label>                        
                            <input type="text" class="form-control" id="first-name" name="nombreEntidad2" value="<?php echo $row[2] ?>" readonly></input>                        
                        </div>
                        
                        <div class="form-group">
                            <label for="last-name">RUC</label>
                            <input type="text" class="form-control" id="first-name" name="NUMRUC2" value="<?php echo $row[1] ?>" readonly></input>                             
                        </div>

                        <div class="form-group">
                            <label for="first-name">UBIGEO</label>                        
                            <input type="text" class="form-control" id="first-name" name="ubigeoAE2" value="<?php echo $row[6] ?>" readonly></input>                        
                        </div>

                        <div class="form-group">
                            <label for="first-name">DIRECCION</label>                        
                            <input type="HIDDEN" class="form-control" name="ubigeoAE2" value="<?php echo $row[5] ?>" readOnly></input>  
                            <input type="text" class="form-control nombres" name="direccionAE2" value="<?php echo $row[7] ?>" readOnly></input>                          
                        </div>                      

                        <div class="clearfix"></div>

                        <?php
                    }
//liberando los recursos
                    oci_free_statement($queryemp2);
                }
//$conexion->close()               
                ?>     
                <?php
                if ($dni != NULL) {
                    ?>

                    <h2>REGISTRAR</h2>
<div class="form-group">
                        <br/><label for="first-name">TIPO DE VERIFICACION</label>                   
                            <select class="form-control" name="cbx_tverificacion" id="cbx_tverificacion" value="cbx_tverificacion"  required="">
                                <option value="1">CONTROL POSTERIOR</option>                                        
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <br/><label for="last-name">GENERA BAJA DE REGISTRO</label>                    
                        <select class="form-control" name = "idTGeneraBaja" id="idTGeneraBaja" class="con_estilos" onchange="habilitarbaja(this.value);" required>
                            <option value="">--</option>
                            <option value="1">SI</option>
                            <option value="2">NO</option>                          
                        </select> 
                    </div> 
                    
                    <div class="form-group">
                        <br/><label for="last-name">ESTADO ACTUAL</label>                    
                        <select class="form-control" name = "idTEstadoActual" id = "idTEstadoActual" onchange="habilitarbaja2(this.value);" required>
                            <option value = "2">EN PROCESO</option>
                            <option value = "1">PENDIENTE</option>                         
                            
                        </select> 
                        <input type = "HIDDEN" name = "idTEstadoActual0" id="idTEstadoActual0" maxlength="20" value="3" disabled></input>
                    </div>
                    
                    <?PHP
                    $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM sisgasv.tipoverificacionperfil b 
                                where b.idTVerificacion='1'
                                AND b.idTVerificacionPerfil in ('7', '10')";
                    $resultado = $conexionmysql->query($queryM);
                    ?>
                    <div class="form-group">
                        <label for="last-name">ORIGEN CONTROL POSTERIOR</label>
                        <select class="form-control" name="cbx_origencp" id="cbx_origencp" required>
                            <option value="">----</option>
                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>                                            
                            <?php } ?>
                        </select> 
                    </div>
                    
                    

                    <?PHP
                    $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='1'
                                AND NOT b.idTVerificacionPerfil in ('1', '2', '3', '4', '5', '7', '8','10','12','15')";
                    $resultado = $conexionmysql->query($queryM);
                    ?>
                    <div class="form-group">
                        <br/><label for="last-name">TIPO DE PERFIL</label>
                      

                            <select class="form-control" name="cbx_perfil" id="cbx_perfil" class="con_estilos" required>
                                <option value="">----</option>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>                                            
                                <?php } ?>
                            </select>
                            <div class="form-groupp"></div>

                    </div>
                                                
                    
                    <div class="form-group">
                        <label for="last-name" id="fechaemi" style="display: block">FECHA EMISION DE BAJA REGISTRO</label>
                        <label for="last-name" id="fechaeva" style="display: none">FECHA DE CONFORMIDAD CONTROL POSTERIOR</label>
                        <input type="date" class="form-control date" name = "femisionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                               id="femisionBRegistro" min="1998-01-01" required></input>
                    </div>    
                      <table id="siesno3" style="display: none" >
                        <tr>
                            <td>  
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA: PERIODO INICIO CALIFICADO</label>
                                <input type="date" class="form-control date" name = "finicali" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1990-01-01" id="finicali" required></input>
                            </div>                      

                        </td>
                            <td>
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA: PERIODO FIN CALIFICADO</label>
                                <input type="date" class="form-control date" name = "ffincali" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1990-01-01" id="ffincali" required></input>
                            </div>     
                            </td>
                          
                        </tr>
                    </table>
                    
                    <table id='siesno'>
                        <tr>
                            <td>  
                            <div class="form-grouppp" style="width: 200px" >
                        <label for="first-name" id="th1">
                           Nº RESOLUCION DE BAJA DE REGISTRO (0000)
                        </label>                       
                            <input type="text" class="form-control" id="nResBRegistro00" minlength="4" autocomplete="off" name="nResBRegistro00"
                               maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>                                          
                            </div>
                        </td>
                            <td>
                    <div class="form-grouppp" style="width: 200px">
                        <label for="first-name" id="th1">DESPACHO QUE EMITIO RESOLUCION</label>
                        <select class="form-control" id ="unidad" name = "unidad" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);" required>                                      
                                        <option value="">----</option>
                                        <option value="1">OSPE</option>
                                        <option value="2">UCF</option>
                                        <option value="OASALMENARA">OASALMENARA</option>
                                        <option value="OAREBAGLIATI">OAREBAGLIATI</option>
                                        <option value="OASABOGAL">OASABOGAL</option>
                                        <option value="OALAMBAYEQUE">OALAMBAYEQUE</option>
                                        <option value="OASHUANUCO">OASHUANUCO</option>       
                                         <option value="OASANMARTIN">OASANMARTIN</option>   
                                    </select>
                        <input type="hidden" id="textoOAS" name="textoOAS" value="" readOnly="readOnly"/>
                    </div>
                            </td>
                            <td>
                                <div class="form-grouppp" style="width: 200px">
                                <br/><label for="first-name" id="th1">AÑO</label>
                                <select class="form-control" name = "ano" id="ano" required>
                                    <option value=""></option>   
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>                                    
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                </div> 
                            </td>
                        </tr>
                    </table>
                   
                    <table id='siesno2'>
                        <tr>
                            <td>  
                                <div class="form-groupppp" style="width: 200px">
                                    <br/><label for="first-name">NIT</label>
                                    <input type="text" class="form-control" name="nit" id="nit" required></input> 
                                </div>
                     
                            </td>
                            <td>   
                             <div class="form-group" style="width: 200px">
                                <label for="last-name">FECHA NOTIFICACION BAJA DE REGISTRO</label>
                                <input type="date" class="form-control date" name = "fnotificacionBRegistro" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                       min="1998-01-01" id="fnotificacionBRegistro"></input>
                            </div>
                             
                            </td>
                            <td>    
                                <div class="form-groupppp" style="width: 200px">
                                <label for="last-name">ESTADO / RESPUESTA A LA RESOLUCION DE BAJA</label>                    
                                <select class="form-control" name = "idTRRBRegistro" id="idTRRBRegistro">
                                    <option value = "0"></option>
                                    <option value = "1">FIRME Y CONSENTIDA</option>
<!--                                    <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                                    <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                                    <option value = "4">IMPROCEDENTE - 1RA INSTANCIA</option>
                                    <option value = "5">FUNDADO EN PARTE - 1RA INSTANCIA</option>
                                    <option value = "6">INADMISIBLE - 1RA INSTANCIA</option>
                                    <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                                    <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                                    <option value = "9">PROCESO DE CALIFICACION</option>
                                    <option value = "10">APELACION</option>
                                    <option value = "11">RECONSIDERACION</option>                            -->
                                </select> 
                                </div>
                            </td> 
                        </tr>
                    </table>

                    <div class="form-groupppp">
                        <label for="first-name">OBSERVACIONES</label>
                        <textarea class="form-control textareaa" placeholder="Solo 200 caracteres" name="observaciones" id="observaciones" maxlength="200" style="margin: 0px -233px 0px 0px; height: 62px; width: 439px;"></textarea>
                    </div>
                    <div class="clearfix"></div>

<!--                    <button type="submit" name="grabar" value="Grabar" class="btn btn-info btn-lg btn-responsive" id="insert"
                            onclick="this.onclick=function(){return false;}"> <span class="glyphicon glyphicon-pencil"></span> Registrar</button>-->

                        <button type= "submit" onclick="return confirm('Estás seguro que desea Grabar?');" value="Grabar" name = "grabar" class="btn btn-info btn-lg btn-responsive" id="insert"
                            onclick="this.onclick=function(){return false;}"> <span class="glyphicon glyphicon-pencil"></span>Grabar</button>    

                    <?php
                }
                ?>

            </form>
        </div>

<!--
        <script>
            function habilitar10(value)
            {
                if (value === '12')
                {
                    // deshabilitamos  
                    document.getElementById("perfil_otros").disabled = false;
                    document.getElementById('perfil_otros').value = "";

                } else {
                    // habilitamos                   
                    document.getElementById("perfil_otros").disabled = true;
                    document.getElementById('perfil_otros').value = "";
                }
            }
        </script>-->

        <script>
            //document.getElementById('ruc').readOnly = this.checked
            function habilitar()
            {
                if (document.getElementById('check1').checked === false)
                {
                    document.getElementById('ruc').readOnly = false;
                }
                if (document.getElementById('check1').checked === true)
                {
                    document.getElementById('ruc').value = "";
                    document.getElementById('ruc').readOnly = true;
                }
            }

            function habilitar2()
            {
                if (document.getElementById('check2').checked === false)
                {
                    document.getElementById('pevaluarF').readOnly = false;
                }
                if (document.getElementById('check2').checked === true)
                {
                    document.getElementById('pevaluarF').value = "";
                    document.getElementById('pevaluarF').readOnly = true;
                }
            }
        </script>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
            }
        </script>

        <script>
            $(function () {
                $("#dialog1").hide();
                $("#dialog2").hide();
                $("#dialog3").hide();
                $("#dialog4").hide();

                function abrir1() {
                    $("#dialog1").show();
                    $("#dialog1").dialog({
                        resizable: false,
                        height: 600,
                        width: 1200,
                        modal: true,
                    });
                }

                function abrir2() {
                    $("#dialog2").show();
                    $("#dialog2").dialog({
                        resizable: false,
                        height: 600,
                        width: 800,
                        modal: true,
                    });
                }
                function abrir3() {
                    $("#dialog3").show();
                    $("#dialog3").dialog({
                        resizable: false,
                        height: 600,
                        width: 900,
                        modal: true,
                    });
                }
                function abrir4() {
                    $("#dialog4").show();
                    $("#dialog4").dialog({
                        resizable: false,
                        height: 850,
                        width: 850,
                        modal: true,
                    });
                }

                $("#abriPoppup1").click(
                        function () {
                            abrir1();
                        });
                $("#abriPoppup2").click(
                        function () {
                            abrir2();
                        });
                $("#abriPoppup3").click(
                        function () {
                            abrir3();
                        });
                $("#abriPoppup4").click(
                        function () {
                            abrir4();
                        });
            });
        </script>

        <?php
        if (isset($_POST['grabar'])) {

            include ('./conexionesbd/conexion_mysql.php');
            include ('./conexionesbd/conexion_oracle.php');

            $dgansas = null;
            $dgatapa = null;
            $dgatama = null;
            $dgatpno = null;
            $sdgatpno = null;
             ////datos de reniec
            $apepatreniec=null;
            $apematreniec=null;
            $apematcasada=null;
            $nombresreniec=null;
            //////////////////////
            $dgactdi = null;
            $DGAFNAC = null;
            $dni_2 = null;
            $dgacaut = null;
            
            $dni_t=null;
            $autogetitularacre=null;
            $nombretitularacre=null;
            $vinculotitularacre=null;
            $idTEstadoActual=null;
            $DGACUGD = null;
            $departamen = null;
            $provincia = null;
            $distrito = null;

            $direccion = null;
            $dni_1 = null;
             $dni_t = null;
            
            $eempleadora = null;
            $iddim_usuario = NULL;
            $TIPO_EMP = null;
            $NUMRUC_EMP = null;
            $NOMBRE_EMP = null;
            $flag22_EMP = null;
            
                $num_resolucion = 0;

            $ESTADO_EMP = null;
            $DEPARTAMENTO_EMP = null;
            $PROVINCIA_EMP = null;
            $DISTRITO_EMP = null;

            $direccion_EMP = null;

             if (empty($_POST['dni_dh'])) {
                $dni_1 = 'NULL';
            } else {
                $dnii = $_POST['dni_dh'];
                $dni_1 = "$dnii";
            }
            
            if (empty($_POST['dni'])) {
                $dni_t = 'NULL';
            } else {
                $dnitt = $_POST['dni'];
                $dni_t = "'$dnitt'";
            }
            
            if (empty($_POST['DHno'])) {
                $datos_1 = 'NULL';
            } else {
                $datoss = $_POST['DHno'];
                $datos_1 = "'$datoss'";
            }
            
            if (empty($_POST['dgacautDH'])) {
                $dgacaut_1 = 'NULL';
            } else {
                $dgacautt = $_POST['dgacautDH'];
                $dgacaut_1 = "'$dgacautt'";
            }
            
  
            
            if (empty($_POST['dgacaut'])) {
                $autogetitularacre = 'NULL';
            } else {
                $autogetitularacrett = $_POST['dgacaut'];
                $autogetitularacre = "'$autogetitularacrett'";
            }
            if (empty($_POST['datos'])) {
                $nombretitularacre = 'NULL';
            } else {
                $nombretitularacrett = $_POST['datos'];
                $nombretitularacre= "'$nombretitularacrett'";
            }
            if (empty($_POST['vinculodhno'])) {
                $vinculotitularacre = 'NULL';
            } else {
                $vinculotitularacrett= $_POST['vinculodhno'];
                $vinculotitularacre = "'$vinculotitularacrett'";
            }
  
//echo "dniauto0: ", $dni_1, $dgacaut_1, $datos_1;

            $querydhno1 = oci_parse($conexionora, "SELECT sc.dgansas, sc.dgacaut, 
                                                t.TXT_APEPATERNO,nvl(t.TXT_APEMATERNO,'')as apematerno,nvl(t.TXT_APEMATCASADA,'')as apematcasada, nvl(t.TXT_NOMBRES,'')as TXT_NOMBRES,
                                                sc.dgactdi,                                               
                                                     TO_CHAR(sc.DGAFNAC, 'YYYY-MM-DD'),
                                                     sc.dgandid as dni,
                                                     t.cod_ubg_dom DGACUGD,u.departamento,u.provincia, u.distrito, 
                                                     t.txt_direccion direccion                                                    
                                                FROM dim_SCCMDGAT sc 
                                                 left join dim_csamreniec t on sc.dgandid=t.ide_dni
                                                LEFT JOIN dim_ubigeo u 
                                                ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                                AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                                AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                                where sc.dgandid='$dni_1'");
            oci_execute($querydhno1);
                        
            while ($row2 = oci_fetch_array($querydhno1, OCI_NUM + OCI_RETURN_NULLS)) {
                $dgansas = $row2[0];
                $dgacaut = $row2[1];
                ///reniec
                $apepatreniec =$row2[2];
                $apematreniec=$row2[3];
                if($row2[4]==NULL){
                    $apematcasada=NULL;
                }else {
                    $apematcasada=$row2[4];
                }
                $nombresreniec=$row2[5];

                $dgactdi = $row2[6];
                $DGAFNAC = $row2[7];
                $dni_2 = $row2[8];

                
            
                $DGACUGD = $row2[9];
                $departamen = $row2[10];
                $provincia = $row2[11];
                $distrito = $row2[12];

                $direccion = $row2[13];
            }
        
        
            $queryA = "SELECT max(m.iddim_aseguradoindevido) as max FROM dim_aseguradoindevido m";
            //$query1 = "SELECT max(ov.correlativo) as max FROM sisgasv.dim_overificacion ov where ov.idDIM_Oficina='$idOficinaUsuario'";
            $resultA = $conexionmysql->query($queryA);
            if ($conexionmysql->query($queryA)) {
                while ($fila = $resultA->fetch_assoc()) {
                    $ma = $fila['max'];
                    $max = $ma + 1;
                }
            }

//
//            if (empty($_POST['NUMRUC1'])) {
//                if ($eempleadora == NULL) {
//                    $eempleadora = $_POST['NUMRUC2'];
//                }
//            } else {
//                $eempleadoraa = $_POST['NUMRUC1'];
//                $eempleadora = "$eempleadoraa";
//            }
////
//            $dni_eempleadora = substr($eempleadora, 2, 8);
////
//            $queryemp = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, CAST(cc.flag22 AS integer), CAST(cc.ESTADO AS integer), 
//                                                    u.DEPARTAMENTO, u.PROVINCIA, u.DISTRITO,
//                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
//                                                    from dim_CONTRIBUYENTES cc
//                                                    left join dim_UBIGEO u 
//                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
//                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
//                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
//                                                    where cc.NUMRUC='$eempleadora'");
//            oci_execute($queryemp);
//
//            while ($row1 = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {
//
//                $TIPO_EMP = $row1[0];
//                $NUMRUC_EMP = $row1[1];
//                $NOMBRE_EMP = $row1[2];
//                $flag22_EMP = $row1[3];
//
//                $ESTADO_EMP = $row1[4];
//                $DEPARTAMENTO_EMP = $row1[5];
//                $PROVINCIA_EMP = $row1[6];
//                $DISTRITO_EMP = $row1[7];
//
//                $direccion_EMP = $row1[8];
//            }


            if (empty($_POST['cbx_tverificacion'])) {
                $idTVerificacion = 'NULL';
            } else {
                $idTVerificacionn = $_POST['cbx_tverificacion'];
                $idTVerificacion = "'$idTVerificacionn'";
            }

            if (empty($_POST['cbx_perfil'])) {
                $idTVerificacionPerfil = 'NULL';
            } else {
                $idTVerificacionPerfill = $_POST['cbx_perfil'];
                $idTVerificacionPerfil = "'$idTVerificacionPerfill'";
            }

            if (empty($_POST['cbx_origencp'])) {
                $cbx_origencp = 'NULL';
            } else {
                $cbx_origencppp = $_POST['cbx_origencp'];
                $cbx_origencp = "'$cbx_origencppp'";
            }

       if (empty($_POST['tregistro'])) {
        $tregistro = 'NULL';
        } else {
        $tregistroo = $_POST['tregistro'];
        $tregistro = "$tregistroo";
       } 

              if (empty($_POST['nit'])) {
                $nit = 'NULL';
            } else {
                $nitt = $_POST['nit'];
                $nit = "'$nitt'";
            }
            
            
            if (empty($_POST['idTEstadoActual'])) {
                if ($idTEstadoActual == NULL) {
                    $idTEstadoActual = $_POST['idTEstadoActual0'];
                }
            } else {
                $idTEstadoActualoo = $_POST['idTEstadoActual'];
                $idTEstadoActual = "$idTEstadoActualoo";
            }

            if (empty($_POST['idTGeneraBaja'])) {
                $idTGeneraBRegistro = 'NULL';
            } else {
                $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
                $idTGeneraBRegistro = "$idTGeneraBRegistroo";
            }

            if (empty($_POST['femisionBRegistro'])) {
                $FEmisionBRegistro = 'NULL';
            } else {
                $FEmisionBRegistroo = $_POST['femisionBRegistro'];
                $FEmisionBRegistro = "'$FEmisionBRegistroo'";
            }

//            if (empty($_POST['nResBRegistro'])) {
//                $nResBRegistro = 'NULL';
//            } else {
//                $nResBRegistroo = $_POST['nResBRegistro'];
//                $nResBRegistro = "'$nResBRegistroo'";
//            }

            if (empty($_POST['idTRRBRegistro'])) {
                $idTRRBRegistro = 'NULL';
            } else {
                $idTRRBRegistroo = $_POST['idTRRBRegistro'];
                $idTRRBRegistro = "'$idTRRBRegistroo'";
            }

           if (empty($_POST['nResBRegistro00'])) {
                    $numResolucionRegistro00 = 'NULL';
                } else {
                    $numResolucionRegistro0000 = $_POST['nResBRegistro00'];
                    $numResolucionRegistro00 = "$numResolucionRegistro0000";
                }
                
                if (empty($_POST['ano'])) {
                    $ano = 'NULL';
                } else {
                    $anooo = $_POST['ano'];
                    $ano = "$anooo";
                }
                
                   if (empty($_POST['textoOAS'])) {
                    $textoOAS = 'NULL';
                } else {
                    $textoOASS = $_POST['textoOAS'];
                    $textoOAS = "$textoOASS";
                }

//            if (empty($_POST['nResBRegistro'])) {
//                $numResolucionRegistro = 'NULL';
//            } else {
//                $numResolucionRegistroo = $_POST['nResBRegistro'];
//                $numResolucionRegistro = "'$numResolucionRegistroo'";
//            }
            if (empty($_POST['fnotificacionBRegistro'])) {
                $FNotificacionPAsegurado = 'NULL';
            } else {
                $FNotificacionPAseguradoo = $_POST['fnotificacionBRegistro'];
                $FNotificacionPAsegurado = "'$FNotificacionPAseguradoo'";
            }

            if (empty($_POST['freporteresolutor'])) {
                $freporteresolutor = 'NULL';
            } else {
                $freporteresolutorr = $_POST['freporteresolutor'];
                $freporteresolutor = "'$freporteresolutorr'";
            }

            if (empty($_POST['observaciones'])) {
                $obsOSPE = 'NULL';
            } else {
                $obsOSPEo = $_POST['observaciones'];
                $obsOSPE = "'$obsOSPEo'";
            }

            if (empty($_POST['perfil_otros'])) {
                $perfil_otros = 'NULL';
            } else {
                $perfil_otross = $_POST['perfil_otros'];
                $perfil_otros = "'$perfil_otross'";
            }
            
            
            if (empty($_POST['unidad'])) {
        $unidad = 'NULL';
    } else {
        $unidadd = $_POST['unidad'];
        $unidad = "'$unidadd'";
    }
        if (empty($_POST['finicali'])) {
        $finicali = 'NULL';
    } else {
        $finicalii = $_POST['finicali'];
        $finicali = "'$finicalii'";
    }
    if (empty($_POST['ffincali'])) {
        $ffincali = 'NULL';
    } else {
        $ffincalii = $_POST['ffincali'];
        $ffincali = "'$ffincalii'";
    }
    
     if ($unidad == 'NULL') { 
         $nnnResBRegistro=NULL;
         $numpdf=NULL;
    }
    else {
            
                                
                                 if ($_POST['unidad'] == '1') { 
                                //$nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
                                $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_2 . $cod_oficinaIni.$ano;
                                 }
                                   else if ($_POST['unidad'] == '2') {
                             $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura .  "-". $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
                                 $numpdf = $numResolucionRegistro00 . $dni_2 . $cod_oficinaIni.$ano;
                                   }
                                     else {
                             $nnnResBRegistro = $numResolucionRegistro00 . "-" . $textoOAS . "-EXSGSA-GAAA-GCSPE-ESSALUD" . "-" . $ano;
                                $numpdf = $numResolucionRegistro00 . $dni_2 . $cod_oficinaIni.$ano;
                                     }
     }
            


            date_default_timezone_set('America/Bogota');
            $fecha_hora_creacione = date('Y-m-d G:i:s');
            $fecha_hora_creacion = "'$fecha_hora_creacione'";

            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";


     if ($idTEstadoActual == '1'){
            $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo,            
            idTipoAtencion,
            tipoRegistro,
            dni_t, autogenerado_t, paterno_t, materno_t,casada_t,
            nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t,DIRECCION_t,            
            titularAcredita_dni, titularAcredita_autog, titularAcredita_nombres,titularAcredita_vinculo,
            idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max,
            '2','$tregistro',
            '$dni_1', $dgacaut_1, '$apepatreniec', '$apematreniec','$apematcasada', 
            '$nombresreniec','','$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion',$dni_t,$autogetitularacre,$nombretitularacre,$vinculotitularacre,
            $idtusuario, $fecha_hora_creacion)";             
            

            $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro,
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s, fCreacion)             
            VALUES 
            ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual, '$idTGeneraBRegistro', $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro,$FNotificacionPAsegurado,$obsOSPE,             
            $idtusuario,$idtusuario, $fecha_hora_creacion)";

            $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values ($max, $max,$idtusuario, $fecha_hora_creacion)";

//            $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,$idtusuario, $fecha_hora_creacion)";
            
             $querynn="SELECT count(*) total, t.nResBRegistro, b.dni_t
                    FROM sisgasv.dim_cposterior t 
                    left join dim_aseguradoindevido b on t.iddim_aseguradoindevido=b.iddim_aseguradoindevido
                    where t.nResBRegistro = '$nnnResBRegistro'
                    group by t.nResBRegistro, b.dni_t";
     
$resultado = $conexionmysql->query($querynn);

while ($row = $resultado->fetch_assoc()) {
    $num_resolucion = $row['total'];
    $dni_t = $row['dni_t'];
}
        
        if($num_resolucion != 0) {
    echo "NO SE PUEDE REGISTRAR POR QUE YA EXISTE EL NUMERO DE RESOLUCION POR EL DNI: ", $dni_t;
}
else { 

            if ($conexionmysql->query($query)) {               
                    if ($conexionmysql->query($query1)) {
                    if ($conexionmysql->query($query2)) {
//                    if ($conexionmysql->query($query3)) {
//                    if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';

                }
                }
                }
                }
            
           
}else if ($idTEstadoActual == '2'){
                $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo,
            idTipoAtencion, 
            tipoRegistro,
            dni_t, autogenerado_t, paterno_t, materno_t,casada_t,
            nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t,DIRECCION_t,            
            titularAcredita_dni, titularAcredita_autog, titularAcredita_nombres,titularAcredita_vinculo,
            idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max,
            '2','$tregistro',
            '$dni_1', $dgacaut_1, '$apepatreniec', '$apematreniec','$apematcasada', 
            '$nombresreniec', '','$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion',$dni_t,$autogetitularacre,$nombretitularacre,$vinculotitularacre,
             $idtusuario, $fecha_hora_creacion)";
             

            $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro, nResBRegistro, nombrePDF,
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s,fCreacion)             
            VALUES 
            ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual, '$idTGeneraBRegistro', $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro, '$nnnResBRegistro', '$numpdf',$FNotificacionPAsegurado,            
            $obsOSPE,$idtusuario, $idtusuario,$fecha_hora_creacion)";

            $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values 
            ($max, $max,$idtusuario, $fecha_hora_creacion)";

//            $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,$idtusuario, $fecha_hora_creacion)";
            
             $querynn="SELECT count(*) total, t.nResBRegistro, b.dni_t
                    FROM sisgasv.dim_cposterior t 
                    left join dim_aseguradoindevido b on t.iddim_aseguradoindevido=b.iddim_aseguradoindevido
                    where t.nResBRegistro = '$nnnResBRegistro'
                    group by t.nResBRegistro, b.dni_t";
     
$resultado = $conexionmysql->query($querynn);

while ($row = $resultado->fetch_assoc()) {
    $num_resolucion = $row['total'];
    $dni_t = $row['dni_t'];
}
        
        if($num_resolucion != 0) {
    echo "NO SE PUEDE REGISTRAR POR QUE YA EXISTE EL NUMERO DE RESOLUCION POR EL DNI: ", $dni_t;
}
else { 
            
if ($conexionmysql->query($query)) {               
                    if ($conexionmysql->query($query1)) {
                    if ($conexionmysql->query($query2)) {
//                    if ($conexionmysql->query($query3)) {
//                    if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';

                }
                }
                }
                }
            
    
}else if ($idTGeneraBRegistro == '2') {
             $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo,
             idTipoAtencion,
            tipoRegistro,
            dni_t, autogenerado_t, paterno_t, materno_t,casada_t,
            nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t,DIRECCION_t,            
            titularAcredita_dni, titularAcredita_autog, titularAcredita_nombres,titularAcredita_vinculo,
            idTusuario ,fCreacion, fCreacionTerminado) 
            VALUES 
            ($max, '$idOficinaUsuario', $max,
            '2','$tregistro','$dni_1', $dgacaut_1, '$apepatreniec', '$apematreniec','$apematcasada', 
            '$nombresreniec', '','$DGAFNAC','$departamen','$provincia','$distrito', 
            '$direccion',$dni_t,$autogetitularacre,$nombretitularacre,$vinculotitularacre,
            $idtusuario, $fecha_hora_creacion,$fecha_hora_creacion)";                         

            $query1 = "INSERT INTO dim_cposterior 
            (iddim_CPosterior, idTVerificacion, idTVerificacionPerfil, origencp, iddim_aseguradoindevido, 
            idTEstadoActual, idTGeneraBaja, idTRRBRegistro, nit, perfil_otros,
            femisionBRegistro,
            fnotificacionBRegistro,             
            observaciones,             
            idtusuario,idtusuario_s, fCreacion, fCreacionTerminado)             
            VALUES 
            ($max, $idTVerificacion, $idTVerificacionPerfil, $cbx_origencp, $max, 
            $idTEstadoActual,'$idTGeneraBRegistro', $idTRRBRegistro, $nit, $perfil_otros,
            $FEmisionBRegistro,$FNotificacionPAsegurado,$obsOSPE,             
            $idtusuario,$idtusuario, $fecha_hora_creacion,$fecha_hora_creacion)";

            $query2 = "INSERT INTO dim_cfinanzas 
            (iddim_CFinanzas, iddim_CPosterior,
            idtusuario, fCreacion) 
            values 
            ($max, $max,$idtusuario,$fecha_hora_creacion)";

//            $query3 = "INSERT INTO dim_pacalificar 
//            (iddim_PaCalificar, iddim_aseguradoindevido,
//            InicioPFinal,FinPFinal,
//            idtusuario, fCreacion) 
//            values 
//            ($max, $max,$finicali,$ffincali,$idtusuario, $fecha_hora_creacion)";
            
            if ($conexionmysql->query($query)) {               
                    if ($conexionmysql->query($query1)) {
                    if ($conexionmysql->query($query2)) {
                   if ($conexionmysql->query($query3)) {
//                    if ($conexionmysql->query($query4)) {
                    echo 'Se Actualizo Correctamente.';
                } else {
                    echo 'Error al Actualizar registro<br>';

                }
                }
                }
                }

         }
           
            
        }
        ?>

    </body>
</html>