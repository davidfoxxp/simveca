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
        o.nomenclatura, o.oficina
        FROM dim_usuario u 
        inner join dim_oficina o on u.idDIM_Oficina=o.idDIM_Oficina
        where u.iddim_usuario='$idtusuario'";

$resultsql = $conexionmysql->query($sql);

$row = $resultsql->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SISGASV</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <!-- Beginning of compulsory code below -->

        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />


        <script type="text/javascript" src="../SISGASV/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="../SISGASV/js/jquery-ui.css" media="screen"/>        
        <script type="text/javascript" src="../SISGASV/js/jquery-ui.js"></script> 
        <script type="text/javascript" src="../SISGASV/js/jquery.js"></script>         
        <script>var $j = jQuery.noConflict();</script>

        <style type="text/css">
            /*programando con css*/            
            #td1 {
                font-size: 10px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }  

            #th1 { 
                color: #339900;

            }    

        </style>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 50');
            }
        </script>

        <script type="text/javascript">
            function showContent() {
                element1 = document.getElementById("content1");
                element2 = document.getElementById("content2");
                element3 = document.getElementById("content3");
                element4 = document.getElementById("content4");
                element5 = document.getElementById("content5");
                element6 = document.getElementById("content6");
                check1 = document.getElementById("check1");
                check2 = document.getElementById("check2");
                check3 = document.getElementById("check3");
                check4 = document.getElementById("check4");
                check5 = document.getElementById("check5");
                check6 = document.getElementById("check6");

                if (check1.checked) {
                    element1.style.display = 'block';
                } else {
                    element1.style.display = 'none';
                }

                if (check2.checked) {
                    element2.style.display = 'block';
                } else {
                    element2.style.display = 'none';
                }

                if (check3.checked) {
                    element3.style.display = 'block';
                } else {
                    element3.style.display = 'none';
                }

                if (check4.checked) {
                    element4.style.display = 'block';
                } else {
                    element4.style.display = 'none';
                }

                if (check5.checked) {
                    element5.style.display = 'block';
                } else {
                    element5.style.display = 'none';
                }

                if (check6.checked) {
                    element6.style.display = 'block';
                } else {
                    element6.style.display = 'none';
                }

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
<style type="text/css"> 
html, body, iframe { 
margin:0; 
padding:0; 
height:100%; 
} 
iframe { 
display:block; 
width:100%; 
border:none; } 

fieldset { 
    
    margin: 20px;  
    padding: 0 0px 10px;  
    /*border: 1px solid red;*/ 
    border-radius: 8px;  
    box-shadow: 0 0 10px #666; 
    padding-top: 10px; 
    width: 660px;
}

legend {  
    padding: 2px 4px; 
    background: #fff; 
     /* For better legibility against the box-shadow */ 
} 
 
fieldset > legend { 
 
    float: left;  
    /*margin-top: -20px;*/ 
 
} 
</style>
        
<!--<script>
            function habilitarbaja(value)
            {
                if (value === '2')
                {
                    // habilitamos
                    
                    document.getElementById("nnorden").disabled = false;
                    document.getElementById("unidad").disabled = false;
                    document.getElementById("ano").disabled = false;
                    document.getElementById("cbx_verificador").disabled = false;
                    document.getElementById("tipoverificacio").disabled = false;

                    document.getElementById("femiordverif").disabled = false;
                    document.getElementById("fechanotificacionOV").disabled = false;
                    document.getElementById("fultimaActaVe").disabled = false;
                    document.getElementById("fechateinfoFinalVe").disabled = false;
                    document.getElementById("fentreinffinal").disabled = false;
                    document.getElementById("fdevinffinal").disabled = false;
                    document.getElementById("nit").disabled = false;
                    document.getElementById("femibof").disabled = false;
                    document.getElementById("idTRRBRegistro").disabled = false;

                } else if (value === '4') {
                    // deshabilitamos      
                    
                    document.getElementById("nnorden").disabled = true;
                    document.getElementById("unidad").disabled = true;
                    document.getElementById("ano").disabled = true;
                    document.getElementById("cbx_verificador").disabled = true;
                    document.getElementById("tipoverificacio").disabled = true;

                    document.getElementById("femiordverif").disabled = true;
                    document.getElementById("fechanotificacionOV").disabled = true;
                    document.getElementById("fultimaActaVe").disabled = true;
                    document.getElementById("fechateinfoFinalVe").disabled = true;
                    document.getElementById("fentreinffinal").disabled = true;
                    document.getElementById("fdevinffinal").disabled = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("femibof").disabled = true;
                    document.getElementById("idTRRBRegistro").disabled = true;

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

        <script>
    var mostrarValor = function(x){
            document.getElementById('textoOAS').value=x;
            }
</script>
                           
<script>
 $(document).ready(function() {
var data = {};
$("#tipoverificacion option").each(function(i,el) {  
   data[$(el).data("value")] = $(el).val();
});
console.log(data, $("#tipoverificacion option").val());

    $('#tipoverificacio').change(function()
    {
        var value = $('#tipoverificacio').val();
//        alert($('#tipoverificacion [value="' + value + '"]').data('value'));
        document.getElementById('tv').value=($('#tipoverificacion [value="' + value + '"]').data('value'));
    });
});
</script>

<!-- <script>
            document.onkeydown = function(e){ 
tecla = (document.all) ? e.keyCode : e.which;
if (tecla == 116) return false
}

</script>       -->

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
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = ($row['oficina']);
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
<!--            <li><a href="#">Otros</a>
                <ul>
                    <li><a href="formFyConsentidas.php">REGISTRO FIRMES Y CONSENTIDAS</a></li>  
                    <li><a href="formOrdenVerificacion.php">ORDEN DE VERIFICACION</a></li> 
                    <li><a href="#">ENTREVISTAS</a>
                        <ul>
                            <li><a href="formOVEntrevistaAsegurado.php">Verificacion/Entrevista al Asegurado</a></li>  

                        </ul>
                    </li>
                    <li><a href="#">REPORTES</a>
                        <ul>
                            <li><a href="formListarOV.php">Reporte Orden Verificacion</a></li>    

                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dir">Otros Aplicativos
                <ul>
                    <li class="first"><a href="./" class="dir">Institucionales</a>
                        <ul>
                            <li class="first"><a href="./">Corporate Use</a></li>
                            <li class="last"><a href="./">Private Use</a></li>
                        </ul>
                    </li>
                    <li><a href="./" class="dir">Externos</a>
                        <ul>
                            <li class="first"><a href="./">Corporate Use</a></li>
                            <li class="last"><a href="./">Private Use</a></li>
                        </ul>			
                </ul>
            </li>-->
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
                        <li><a href="#">CONSULTAS BAJ F Y CONS</a>
                <ul>
                    <li><a href="#">Remesas SUNAT</a>
                     <ul>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_01.xlsx" target="_blank">2018_Remesa_01</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_02.xlsx" target="_blank">2018_Remesa_02</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_03.xlsx" target="_blank">2018_Remesa_03</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_04.xlsx" target="_blank">2018_Remesa_04</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2018_Remesa_05.xlsx" target="_blank">2018_Remesa_05</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\2019_Remesa_01.xlsx" target="_blank">2019_Remesa_01</a></li>
                         
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_01.xlsx" target="_blank">Pasivo_Remesa_01</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_02.xlsx" target="_blank">Pasivo_Remesa_02</a></li>
                         <li><a href="..\SISGASV\repositorio_excel\Pasivo_Remesa_Lote_03.xlsx" target="_blank">Pasivo_Remesa_03</a></li>
                      
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
        if (isset($_POST['buscar'])) {
            $dni = $_POST['dni'];
            $ruc = $_POST['ruc'];
        }
        $idtusuario = $_SESSION['usuario'];
        //incluir el archivo de conexion
        //realizando una consulta usando la clausula select
        ?>   

        <div class="container" id="advanced-search-form">
            <h2>BUSCAR DATOS DEL ASEGURADO</h2>
            <form name="form" action="" method="POST">   
                <div class="form-group">
                    <label for="first-name">INGRESE EL DNI:</label>
                    <input type="text" class="form-control" id="first-name" name="dni" minLength="8" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
                </div>
                <div class="form-group">
                    <label for="last-name">INGRESE RUC</label>
                    <input type="number" class="form-control" id="ruc" name="ruc" readOnly maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
                </div>
                <div class="form-group">
                    <label for="country">HABILITAR</label>                
                    <input type="checkbox" id="check1" value="1" onclick="habilitar()" checked></input>
                </div>            
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search" name="buscar" value="Buscar"> <span class="glyphicon glyphicon-search"></span> Buscar</button>    
            </form>
        </div> 

        <?php
        include './conexionesbd/conexion_oracle.php';
        $queryT = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut, sc.dgatapa || ' ' ||  sc.dgatama || ' ' ||sc.dgatpno || ' ' || nvl(sc.dgatsno, '') as datos, sc.dgactdi,
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
                <form name="form" method="POST">                    
                    <fieldset style="border: 1px solid red;">
                    <legend>DATOS DEL ASEGURADO - TITULAR</legend>                    
                    <div class="form-group">
                        <label for="first-name">APELLIDOS Y NOMBRES</label>                        
                        <input style="font-size: 15px"type="text" class="form-control nombres" id="first-name" name="datos" value="<?php echo $row[2] ?>" readonly></input>
                    </div>
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="first-name">DOCUMENTO IDENTIDAD (<?php echo $row[4] ?>)</label>
                        <input class="form-control" type="HIDDEN" name="dgansas" value="<?php echo $row[0] ?>" readOnly="readOnly"></input>
                        <input class="form-control" type="HIDDEN" name="tipodoc"  value="<?php echo $row[3] ?>" readOnly="readOnly"></input>
                        <input type="text" class="form-control" name="dni" value="<?php echo $row[5] ?>" readOnly></input>
<!--                        <a href="#" id="abriPoppup1">
                            <input style="font-size: 15px"type="text" class="form-control" name="dni" value="<?php echo $row[5] ?>" readOnly></input>
                        </a>
                        <div id="dialog1" title="SGVCA" class="contenido">
                            <iframe src="formularioPersona.php?dni=<?php echo $row[5] ?>" style="width: 100%; height: 100%"></iframe>
                        </div>-->
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
                    
                    <div class="form-group">
                        <label for="last-name"></label>
                        <input type="hidden" class="form-control" id="last-name"></input>
                    </div>
                    
                    <div class="form-group">
                        <label for="domicilio">TIPO DE TRABAJADOR</label>
                         <select class="form-control" name = "ttrabajador" id="ttrabajador" required>
                                <option value = "">--</option>                                
                                <option value="1">RG - TRABAJADOR REGULAR</option>
                                <option value="119">TH - TRABAJADOR DEL HOGAR</option>
                                <option value="201">AD - AGRARIO DEPENDIENTE</option>
                                <option value="203">AI - AGRARIO INDEPENDIENTE</option>
                                <option value="805">PP - PESQUERO ARTESANAL</option>                                
                            </select>
                    </div>
                    
                     <div class="form-groupppp">
                        <label for="domicilio">TIPO DE REGISTRO</label>
                         <select class="form-control" name = "tregistro" id="tregistro" required>
                                <option value = "">--</option>                                
                                <option value="1">ASEGURADO</option>
                                <option value="2">EMPLEADOR</option>                                
                            </select>
                    </div>

                    <div class="clearfix"></div>
                    </fieldset>
                    <?php
                }

//liberando los recursos
                oci_free_statement($queryT);
                ?> 

                <?php
                $querydh = oci_parse($conexionora, "select
                                            c.vtfcvfa as tipo_vinculo, 
                                            D.DGACAUT AS DGACAUT_dh, 
                                            d.DGANSAS as DGANSAS_dh,
                                            d.dgandid as dgandid_dh,
                                            d.DGATAPA ||  ' ' || d.DGATAMA ||  ' ' || d.DGATPNO ||  ' ' || d.DGATSNO as nombres_dh
                                            from dim_SCCMDGAT a 
                                            inner join dim_sccmvtft C     ON a.dgansas = c.VTFNSAS 
                                            inner join dim_sccmdgat D     ON C.VTFNSAF = D.DGANSAS 
                                            where a.dgandid='$dni'");

                oci_execute($querydh);
                ?>
                
                    <?PHP
                while ($row = oci_fetch_array($querydh, OCI_NUM + OCI_RETURN_NULLS)) {
                    ?> 
<fieldset style="border: 2px solid #339900;">
                    <legend> DATOS DE LOS DERECHOHABIENTES</legend>
                    <table >
                        <tr>
                            <td>
                                <div class="form-group" style="width: 130px;text-align: center">
                                 <label for="first-name">TIPO DE VINCULO</label>                        
                                  <input style="width: 50px;text-align: center;display: block;margin: auto" type="text" class="form-control" id="first-name" name="vinculo" value="<?php echo $row[0] ?>" readonly></input>                        
                                </div>
                            </td>
                            <td>
                                <div class="form-group" style="width: 250px; text-align: center">
                                <label for="last-name">APELLIDOS Y NOMBRES</label>
                                <input type="text" class="form-control" name="DH" value="<?php echo $row[4] ?>" readonly></input>                        
                                </div>
                            </td>
                            <td>
                                <div class="form-group" style="width:200px;text-align: center" >
                                <label for="first-name">DOCUMENTO IDENTIDAD</label>                        
                                <input style="width: 100px;text-align: center;display: block;margin: auto;font-size: 15px" type="text" class="form-control" name="dni_dh" value="<?php echo $row[3] ?>" readOnly></input>                        
                                </div>                                 
                         </td>
                        </tr>  
                     </table>  
<!--                     <table >
                        <tr>
                            <td>
                                <div class="form-group" style="width: 130px;text-align: center">                                                      
                                  <input style="width: 50px;text-align: center;display: block;margin: auto" type="text" class="form-control" id="first-name" name="vinculo" value="<?php echo $row[0] ?>" readonly></input>                        
                                </div>
                            </td>
                            <td>
                                <div class="form-group" style="width: 250px; text-align: center">
                                <input type="text" class="form-control" name="DH" value="<?php echo $row[4] ?>" readonly></input>                        
                                </div>
                            </td>
                            <td>
                                <div class="form-group" style="width:200px;text-align: center" >           
                                <input style="width: 100px;text-align: center;display: block;margin: auto;font-size: 15px" type="text" class="form-control" name="dni_dh" value="<?php echo $row[3] ?>" readOnly></input>                        
                                </div>                                 
                         </td>
                        </tr>  
                     </table>  -->
                     </fieldset>
                    <?php
                }?>
               
                    <?PHP
                //liberando los recursos
                oci_free_statement($querydh);
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
                    <fieldset style="border: 2px solid  #77d5f7;" >
                    <legend> DATOS DEL EMPLEADOR</legend>
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
                        </fieldset>
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
            <fieldset style="border: 2px solid  #77d5f7;" >
                    <legend> DATOS DEL EMPLEADOR</legend>
                        <div class="form-group">
                            <label for="first-name">RAZON SOCIAL</label>                        
                            <input type="text" class="form-control" id="first-name" name="nombreEntidad2" value="<?php echo $row[2] ?>" readonly></input>                        
                        </div>
                        <div class="form-group">
                            <label for="last-name">RUC</label>
                            <a href="#" id="abriPoppup3">
                                <input type="text" class="form-control" name="NUMRUC2" value="<?php echo $row[1] ?>" readonly></input>                        
                            </a>
                            <div id="dialog3" title="SGVCA" class="contenido">
                                <iframe src="formEntidades.php?ruc=<?php echo $row[1] ?>" style="width: 100%; height: 100%"></iframe>
                            </div>
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
                    </fieldset>
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

                    <h2>REGISTRAR<BR>
                    <label style="color: #F80000; font-size: 8px;">* CAMPOS OBLIGATORIOS</label></h2>

                    <div class="form-group">
                        <label for="first-name">TIPO DE VERIFICACION</label><label style="color: #F80000">*</label>
                        <select class="form-control" name="cbx_tverificacion" id="cbx_tverificacion" value="cbx_tverificacion"  required="">
                            <option value="2">VERIFICACION</option>                                        
                        </select>
                    </div>
                    <?PHP
                    $queryMA = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM tipoverificacionperfil b 
                                where b.idTVerificacion='2'
                                AND b.idTVerificacionPerfil in ('21', '22', '23', '24','47')";
                    $resultadoA = $conexionmysql->query($queryMA);
                    ?>
                    <div class="form-group">
                        <label for="last-name">ORIGEN DE VERIFICACION</label><label style="color: #F80000">*</label>
                        <select class="form-control" name="cbx_origencp" id="cbx_origencp" required>
                            <option value="">----</option>
                            <?php while ($row = $resultadoA->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idTVerificacionPerfil']; ?>"><?php echo $row['VerificacionPerfil']; ?></option>                                            
                            <?php } ?>
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="last-name">ESTADO ACTUAL</label><label style="color: #F80000">*</label>                 
                        <select class="form-control" name = "idTEstadoActual" onchange="habilitarbaja(this.value);" id = "idTEstadoActual">   
                            <option value = "2">EN PROCESO</option>                           
                            <option value = "4">ARCHIVO</option>
                        </select> 
                    </div>




                    <div class="form-group has-success has-feedback">
                        <label for="first-name" id="th1">N° ORDEN VERIFICACION<label style="color: #F80000">*</label><br>(0000)</label>                     
                        <input type="text" class="form-control" name="nnorden" id="nnorden" minlength="4" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="" autocomplete="off"></input>                           
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label for="first-name" id="th1">DESPACHO QUE EMITIO LA OV<label style="color: #F80000">*</label>
                        <select class="form-control" required="" id ="unidad" name = "unidad" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">                                      
                            <option value="1">OSPE</option>
                            <option value="2">UCF</option>
                            <option value="3">OAALMENARA</option>
                            <option value="4">OAREBAGLIATI</option>
                            <option value="5">OASABOGAL</option>
                            <option value="6">OALAMBAYEQUE</option>
                        </select>
                        <input type="hidden" id="textoOAS" name="textoOAS" value="" readOnly="readOnly"/>
                    </div>


                    <div class="form-group has-success has-feedback">
                        <br><label for="first-name" id="th1">AÑO</label><label style="color: #F80000">*</label>
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

                    <div class="form-grouppp">
                        <?PHP
                        $queryN = "SELECT dv.idDIM_Oficina, dv.apellidonombre FROM dim_oficina dv where dv.codOficina ='$codOficina' and not dv.idtperfiles='3'";
                        $resultadoN = $conexionmysql->query($queryN);
                        ?>
                         <label for="last-name">VERIFICADOR INICIO EL CASO</label><label style="color: #F80000">*</label>
                        <select class="form-control" name="cbx_verificador" id="cbx_verificador" required style="width: 200px">
                            <option value="">----</option>
                            <?php while ($row = $resultadoN->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idDIM_Oficina']; ?>"><?php echo $row['apellidonombre']; ?></option>                                            
                            <?php } ?>
                        </select>                        
                    </div>

                    <?PHP
                    $queryM = "SELECT b.idTVerificacionPerfil, b.VerificacionPerfil, b.descripcion
                                FROM sisgasv.tipoverificacionperfil b 
                                where b.idTVerificacion='2' and not b.idTVerificacionPerfil in ('31','21','22','23','24')";
                    $resultado = $conexionmysql->query($queryM);                    
                    ?>
                    <div class="form-groupppp">
                        <label for="last-name">TIPO DE PERFIL</label><label style="color: #F80000">*</label>                                 
                        
                        <input id="tipoverificacio" style="width: 420px;" name="tipoverificacio" list="tipoverificacion" class="con_estilos" required></input>
                        <datalist id="tipoverificacion">
                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                            <option  data-value="<?php echo $row['idTVerificacionPerfil'] ; ?> " value="<?php echo $row['VerificacionPerfil']; ?>"></option>                                            
                            <?php } ?>
                        </datalist>                      
                        <input type="hidden" id="tv" name="cbx_perfil" value="" readonly />

                    </div>     
                    <table>                        
                        <tr>
                            <td>
                                <div class="form-group" style="width: 200px">
                                    <label for="first-name">FECHA EMISION DE LA ORDEN DE VERIFICACION<label style="color: #F80000">*</label></label>
                                    <input id = "femiordverif" type="date" class="form-control date" name = "femiordverif" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01" required></input>
                                </div>
                            </td>
                            <td>
                                <div class="form-groupp" style="width: 200px">
                                    <label for="first-name">FECHA DE NOT DE ORDEN DE VERIF(ASEGURADO)</label>
                                    <input id = "fechanotificacionOV" type="date" class="form-control date" name = "fechanotificacionOV" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01"></input>
                                </div> 
                            </td>
                            
                            <td>
                                <div class="form-groupp" style="width: 200px">
                                    <label for="first-name">FECHA DE NOT DE ORDEN DE VERIF(EMPLEADOR)</label>
                                    <input id = "fechanotificacionOVE" type="date" class="form-control date" name = "fechanotificacionOVE" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01"></input>
                                </div> 
                            </td>
                                                       
                                                     
                        </tr>  
                        <tr>
                            <td>
                                <div class="form-group" style="width: 200px">
                                    <label for="first-name">FECHA DE LA ULTIMA ACTA DE VERIFICACION</label>
                                    <input id = "fultimaActaVe" type="date" class="form-control date" name = "fultimaActaVe" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01"></input>
                                </div>
                            </td>   
                            
                            <td>
                                <div class="form-grouppp" style="width: 200px">
                                    <label for="first-name">FECHA TERMINO DEL INF FINAL DEL VERIFICADOR</label>
                                    <input id = "fechateinfoFinalVe" type="date" class="form-control date" name = "fechateinfoFinalVe" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01" ></input> 
                                </div>  
                            </td> 

                            <td>
                                <div class="form-groupp" style="width: 200px">
                                    <label for="first-name">FECHA ENTREGA DEL INF FINAL AL JEFE DE OSPE</label>
                                    <input id = "fentreinffinal" type="date" class="form-control date" name = "fentreinffinal" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01" ></input>
                                </div> 
                            </td>
                           
                            
                        </tr>
                    </table>
                    
                    <table>
                        <tr>
                            <td>
                                <div class="form-grouppp" style="width: 200px">
                                    <label for="first-name">FECHA DEVOLUCION DEL INF FINAL POR JEFE OSPE</label>
                                    <input id = "fdevinffinal" type="date" class="form-control date" name = "fdevinffinal" max="<?php $hoy = getdate(); echo $hoy = date("Y-12-31"); ?>" 
                                           min="1990-01-01" ></input> 
                                </div>  
                            </td> 
                            
                            <td>
                                <div class="form-grouppp" style="width: 200px">
                                    <br><label for="first-name">NIT</label>
                                    <input id="nit" type="text" class="form-control date" name="nit"></input> 
                                </div>  
                            </td> 
                        </tr>                        
                    </table>

                    
<!--                <table> 
                    <tr>
                        <td>
                        <div class="form-groupp" style="width: 200px">
                        <label for="first-name">FECHA EMISION BAJA DE OFICIO</label>
                        <input id = "femibof" type="date" class="form-control date" name = "femibof" min="0001-01-01"></input>
                    </div>
                        </td>
                    
                        <td>
                        <div class="form-groupppp" style="width: 200px">                       
                        <label for="first-name">ESTADO / RESPUESTA A LA RESOLUCION DE BAJA</label>                    
                        <select id = "idTRRBRegistro" class="form-control nombres" name = "idTRRBRegistro" id="idTRRBRegistro">
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
                            <option value = "10">APELACION</option>
                            <option value = "11">RECONSIDERACION</option>                            
                        </select> 
                    </div>                            
                        </td>
                        </tr>
                </table>-->


                    <div class="form-group">
                        <label for="first-name">OBSERVACIONES</label>
                        <textarea class="form-control textareaa" placeholder="Solo 200 caracteres" name="observaciones" id="observaciones" maxlength="200" style="margin: 0px -233px 0px 0px; height: 62px; width: 439px; resize: none"></textarea>
                    </div>

                    <div class="clearfix"></div>

                    <button type="submit" name="grabar" value="Grabar" class="btn btn-info btn-lg btn-responsive" id="insert" > <span class="glyphicon glyphicon-pencil"></span> Registrar</button>

                    <?php
                }
                ?>

            </form>
        </div>

        <?php
             
        
        
        if (isset($_POST['grabar'])) {

            include ('./conexionesbd/conexion_mysql.php');
            include ('./conexionesbd/conexion_oracle.php');

            $dgansas = null;
//            $dgatapa = null;
//            $dgatama = null;
//            $dgatpno = null;
            $sdgatpno = null;
            
            $apepaterno = null;
            $apematerno = null;
            $apematcasada = null;
            $nombresreniec = null;     
                                        
                  
            $dgactdi = null;
            $DGAFNAC = null;
            $dni_2 = null;

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
            
            $num_ov=0;

            $ESTADO_EMP = null;
            $DEPARTAMENTO_EMP = null;
            $PROVINCIA_EMP = null;
            $DISTRITO_EMP = null;

            $direccion_EMP = null;

            if (empty($_POST['dni'])) {
                $dni_1 = 'NULL';
            } else {
                $dnii = $_POST['dni'];
                $dni_1 = "$dnii";
            }

            $queryT = oci_parse($conexionora, "select sc.dgansas, sc.dgacaut,
                                                nvl(t.TXT_APEPATERNO,'')as TXT_APEPATERNO, nvl(t.TXT_APEMATERNO,'')as apematerno,
                                                nvl(t.TXT_APEMATCASADA,'')as apematcasada,t.TXT_NOMBRES,                                                
                                                sc.dgactdi, TO_CHAR(sc.DGAFNAC, 'YYYY-MM-DD') fnac, sc.dgandid as dni,
                                                t.cod_ubg_dom DGACUGD,
                                                u.departamento,
                                                u.provincia,
                                                u.distrito,     
                                                t.txt_direccion direccion,
                                                t.cod_estcivil,       
                                                t.cod_sexo       
                                         from dim_csamreniec t 
                                         LEFT JOIN dim_ubigeo u 
                                         ON SUBSTR(t.cod_ubg_dom, 1, 2)=u.R_DD98 
                                         AND SUBSTR(t.cod_ubg_dom, 3, 2)=u.R_PP98 
                                         AND SUBSTR(t.cod_ubg_dom, 5, 2)=u.R_DI98 
                                         left join dim_SCCMDGAT sc on t.ide_dni=sc.dgandid
                                         WHERE t.ide_dni='$dni_1'");
            oci_execute($queryT);
            while ($row2 = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                $dgansas = $row2[0];
                $dgacaut = $row2[1];                
                $apepaterno = $row2[2];
                $apematerno = $row2[3];
                
                if ($row2[4] == NULL) {
                    $apematcasada = NULL;
                } else {
                    $apematcasada = $row2[4];
                }

                $nombresreniec = $row2[5]; 
                
                $dgactdi = $row2[6];
                $DGAFNAC = $row2[7];
                $dni_2 = $row2[8];

                $DGACUGD = $row2[9];
                $departamen = $row2[10];
                $provincia = $row2[11];
                $distrito = $row2[12];

                $direccion = addslashes($row2[13]);
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


            if (empty($_POST['NUMRUC1'])) {
                if ($eempleadora == NULL) {
                    $eempleadora = $_POST['NUMRUC2'];
                }
            } else {
                $eempleadoraa = $_POST['NUMRUC1'];
                $eempleadora = "$eempleadoraa";
            }

            $dni_eempleadora = substr($eempleadora, 2, 8);

            $queryemp = oci_parse($conexionora, "select cc.TIPOEMP, cc.NUMRUC, cc.NOMBRE, CAST(cc.flag22 AS integer), CAST(cc.ESTADO AS integer), 
                                                    u.DEPARTAMENTO, u.PROVINCIA, u.DISTRITO,
                                                    cc.NOMVIA || '' || cc.NUMER1 || ' ' || cc.INTER1 || ' ' || cc.NOMZON || ' ' ||cc.REFER1 as direccion
                                                    from dim_CONTRIBUYENTES cc
                                                    left join dim_UBIGEO u 
                                                    on substr(cC.UBIGEO, 1, 2)=u.S_DD98 
                                                    and substr(cC.UBIGEO, 3, 2)=u.S_PP98 
                                                    and substr(cC.UBIGEO, 5, 2)=u.S_DI98
                                                    where cc.NUMRUC='$eempleadora'");
            oci_execute($queryemp);

            while ($row1 = oci_fetch_array($queryemp, OCI_NUM + OCI_RETURN_NULLS)) {

                $TIPO_EMP = $row1[0];
                $NUMRUC_EMP = $row1[1];
                $NOMBRE_EMP = addslashes($row1[2]);
                $flag22_EMP = $row1[3];

                $ESTADO_EMP = $row1[4];
                $DEPARTAMENTO_EMP = $row1[5];
                $PROVINCIA_EMP = $row1[6];
                $DISTRITO_EMP = $row1[7];

                $direccion_EMP = addslashes($row1[8]);
            }


            if (empty($_POST['idTEstadoActual'])) {
                $idTEstadoActual = 'NULL';
            } else {
                $idTEstadoActuall = $_POST['idTEstadoActual'];
                $idTEstadoActual = "$idTEstadoActuall";
            }



            /*             * ****************************************** */

            if (empty($_POST['fentreinffinal'])) {
                $fentreinffinal = 'NULL';
            } else {
                $fentreinffinall = $_POST['fentreinffinal'];
                $fentreinffinal = "'$fentreinffinall'";
            }

            if (empty($_POST['fterminoperbaja'])) {
                $fterminoperbaja = 'NULL';
            } else {
                $fterminoperbajaa = $_POST['fterminoperbaja'];
                $fterminoperbaja = "'$fterminoperbajaa'";
            }

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

            if (empty($_POST['nnorden'])) {
                $nnorden = 'NULL';
            } else {
                $nnordenn = $_POST['nnorden'];
                $nnorden = "$nnordenn";
            }
            
            if (empty($_POST['ttrabajador'])) {
                $ttrabajador = 'NULL';
            } else {
                $ttrabajadorR = $_POST['ttrabajador'];
                $ttrabajador = "$ttrabajadorR";
            }

            if (empty($_POST['idTGeneraBaja'])) {
                $idTGeneraBRegistro = 'NULL';
            } else {
                $idTGeneraBRegistroo = $_POST['idTGeneraBaja'];
                $idTGeneraBRegistro = "'$idTGeneraBRegistroo'";
            }

            if (empty($_POST['femisionBRegistro'])) {
                $FEmisionBRegistro = 'NULL';
            } else {
                $FEmisionBRegistroo = $_POST['femisionBRegistro'];
                $FEmisionBRegistro = "'$FEmisionBRegistroo'";
            }

            if (empty($_POST['nResBRegistro'])) {
                $nResBRegistro = 'NULL';
            } else {
                $nResBRegistroo = $_POST['nResBRegistro'];
                $nResBRegistro = "'$nResBRegistroo'";
            }

            if (empty($_POST['tregistro'])) {
        $tregistro = 'NULL';
        } else {
        $tregistroo = $_POST['tregistro'];
        $tregistro = "$tregistroo";
       } 
            
            if (empty($_POST['idTRRBRegistro'])) {
                $idTRRBRegistro = 'NULL';
            } else {
                $idTRRBRegistroo = $_POST['idTRRBRegistro'];
                $idTRRBRegistro = "'$idTRRBRegistroo'";
            }

            if (empty($_POST['femiordverif'])) {
                $femiordverif = 'NULL';
            } else {
                $femiordveriff = $_POST['femiordverif'];
                $femiordverif = "'$femiordveriff'";
            }
            
            if (empty($_POST['fechanotificacionOV'])) {
                $fechanotificacionOV = 'NULL';
            } else {
                $fechanotificacionOVf = $_POST['fechanotificacionOV'];
                $fechanotificacionOV = "'$fechanotificacionOVf'";
            }
            
            if (empty($_POST['fechanotificacionOVE'])) {
                $fechanotificacionOVE = 'NULL';
            } else {
                $fechanotificacionOVEf = $_POST['fechanotificacionOVE'];
                $fechanotificacionOVE = "'$fechanotificacionOVEf'";
            }
            
            
            
            if (empty($_POST['fultimaActaVe'])) {
                $fultimaActaVe = 'NULL';
            } else {
                $fultimaActaVef = $_POST['fultimaActaVe'];
                $fultimaActaVe = "'$fultimaActaVef'";
            }
            
            if (empty($_POST['fechateinfoFinalVe'])) {
                $fechateinfoFinalVe = 'NULL';
            } else {
                $fechateinfoFinalVef = $_POST['fechateinfoFinalVe'];
                $fechateinfoFinalVe = "'$fechateinfoFinalVef'";
            }
            
            
             if (empty($_POST['nit'])) {
        $nit = 'NULL';
    } else {
        $nitt = $_POST['nit'];
        $nit = "'$nitt'";
    }

            if (empty($_POST['femibof'])) {
                $femibof = 'NULL';
            } else {
                $femiboff = $_POST['femibof'];
                $femibof = "'$femiboff'";
            }


            if (empty($_POST['cbx_verificador'])) {
                $cbx_verificador = 'NULL';
            } else {
                $cbx_verificadorr = $_POST['cbx_verificador'];
                $cbx_verificador = "'$cbx_verificadorr'";
            }
//
            if (empty($_POST['apellidonombre'])) {
                $apellidonombre = 'NULL';
            } else {
                $apellidonombree = $_POST['apellidonombre'];
                $apellidonombre = "'$apellidonombree'";
            }

            if (empty($_POST['nResBRegistro'])) {
                $numResolucionRegistro = 'NULL';
            } else {
                $numResolucionRegistroo = $_POST['nResBRegistro'];
                $numResolucionRegistro = "'$numResolucionRegistroo'";
            }
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

            if (empty($_POST['fdevinffinal'])) {
                $fdevinffinal = 'NULL';
            } else {
                $fdevinffinall = $_POST['fdevinffinal'];
                $fdevinffinal = "'$fdevinffinall'";
            }

            if (empty($_POST['observaciones'])) {
                $obsOSPE = 'NULL';
            } else {
                $obsOSPEo = $_POST['observaciones'];
                $obsOSPE = "'$obsOSPEo'";
            }

            if (empty($_POST['ano'])) {
                $ano = 'NULL';
            } else {
                $anoo = $_POST['ano'];
                $ano = "$anoo";
            }

            if (empty($_POST['textoOAS'])) {
                $textoOAS = 'NULL';
            } else {
                $textoOASS = $_POST['textoOAS'];
                $textoOAS = "$textoOASS";
            }

            if (empty($_POST['unidad'])) {
                $unidad = 'NULL';
            } else {
                $unidadd = $_POST['unidad'];
                $unidad = "'$unidadd'";
            }

            date_default_timezone_set('America/Bogota');
            $fecha_hora_creacione = date('Y-m-d G:i:s');
            $fecha_hora_creacion = "'$fecha_hora_creacione'";

            date_default_timezone_set('America/Bogota');
            $fecha_hora_updateo = date('Y-m-d G:i:s');
            $fecha_hora_update = "'$fecha_hora_updateo'";


            if ($unidad == 'NULL') {
                $ordenVV=NULL;
                $cod_caso=NULL;
                $cc=NULL;
                $ordenCV=NULL;
                $ordenACV=NULL;
                $ordenAmPCV=NULL;
            } else {
                $ordenVV=NULL;
                $cod_caso=NULL;
                $ordenCV=NULL;
                $ordenACV=NULL;
                $ordenAmPCV=NULL;
                $cc=NULL;
//                $ordenVV = $codOficina . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
//                $cod_caso = $dni_1 . $eempleadora . $oficina . $ano;

                if ($_POST['unidad'] == '1') {                    
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $oficinaIni . $oficina . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $cod_oficinaIni;                   
                    
                    $ordenVV = $cod_oficinaIni . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = $cod_oficinaIni . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = $cod_oficinaIni . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = $cod_oficinaIni . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . $cod_oficinaIni . $ano;
                    $cc=$cod_oficinaIni;
                } else if ($_POST['unidad'] == '2') {
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $codOficina;
                    
                    $ordenVV = $codOficina . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = $codOficina . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = $codOficina . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = $codOficina . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . $codOficina . $ano;
                    $cc=$codOficina;
                
                }
                else if ($_POST['unidad'] == '3') {
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $codOficina;
                    
                    $ordenVV = "0864" . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = "0864" . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = "0864" . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = "0864" . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . "0864" . $ano;
                    $cc="0864";
                }
                else if ($_POST['unidad'] == '4') {
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $codOficina;
                    
                    $ordenVV = "0833" . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = "0833" . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = "0833" . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = "0833" . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . "0833" . $ano;
                    $cc="0833";
                }
                    else if ($_POST['unidad'] == '5') {
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $codOficina;
                    
                    $ordenVV = "0682" . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = "0682" . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = "0682" . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = "0682" . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . "0682" . $ano;
                    $cc="0682";
              }
               else if ($_POST['unidad'] == '6') {
//                    $nnnResBRegistro = $numResolucionRegistro00 . "-" . $nomenclatura . "-" . $nomenclaturaOSPE . "-GCSPE-ESSALUD" . "-" . $ano;
//                    $numpdf = $numResolucionRegistro00 . $dni_1 . $eempleadora . $codOficina;
                    
                    $ordenVV = "1047" . "-" . $ano . "-VCA-" . $nnorden . "-084-001";
                    $ordenCV = "1047" . "-" . $ano . "-VCA-" . $nnorden . "-237-001";
                    $ordenACV = "1047" . "-" . $ano . "-VCA-" . $nnorden . "-026-001";
                    $ordenAmPCV = "1047" . "-" . $ano . "-VCA-" . $nnorden . "-142-001";
                    $cod_caso = $dni_1 . $eempleadora . "0682" . $ano;
                    $cc="1047";
                      
              }
            }

            if ($idTEstadoActual == '3') {
            $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, 
            idTipoTrabajador,
            idTipoAtencion,
            tipoRegistro,
            RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t, materno_t, 
            casada_t,nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max, 
            '$ttrabajador', '1', '$tregistro',
            '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_1', '$dgacaut', '$apepaterno', '$apematerno',
            '$apematcasada','$nombresreniec', '', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion)";


            $query1 = "INSERT INTO 
                    dim_overificacion (iddim_Verificacion, iddim_Overificacion, idDIM_Oficina, ordenV, numero, 
                    fechaEmision,fechanotificacionOV, fechanotificacionOVE, idTActosverificacion, 
                    idtusuario, fCreacion) 
                    VALUES ($max, $max, '$idOficinaUsuario', '$ordenVV', '1',
                    $femiordverif,$fechanotificacionOV, $fechanotificacionOVE, '084',
                    $idtusuario, $fecha_hora_creacion)";

            $query2 = "INSERT INTO 
                    dim_resboficio (iddim_Overificacion, iddim_ResBOficio,
                    idtusuario, fCreacion) 
                    VALUES ($max, $max, 
                    $idtusuario, $fecha_hora_creacion)";

            $query3 = "INSERT INTO dim_actaverificacion 
                    (iddim_Verificacion, iddim_ActaVerificacion, numeroActaVe, idTActosverificacion, fultimaActaVe,iddim_Verificadores1, idTusuario, fCreacion) 
                    VALUES 
                    ($max,$max, '$ordenACV', '026', $fultimaActaVe,$cbx_verificador, $idtusuario, $fecha_hora_creacion)";


            $query5 = "INSERT INTO dim_verificacion (iddim_Verificacion, 
                     idTVerificacion, 
                     idTVerificacionPerfil,
                     origenverif,
                     iddim_aseguradoindevido,
                     idTEstadoActual,
                     an_verifi, num_verifi, ospe_verifi,
                     fechateinfoFinalVe,
                     fechaEIFinalJOSPE,
                     fechaDevInfFinalJOSPE,
                     codigocaso,
                     nit,
                     observaciones, 
                     idtusuario, fCreacion, fCreacionTerminado) VALUES ($max, '2', $idTVerificacionPerfil,
                     $cbx_origencp,
                     $max, 
                     $idTEstadoActual,
                     $ano, '$nnorden', '$cc',
                     $fechateinfoFinalVe,
                     $fentreinffinal,
                     $fdevinffinal,
                     '$cod_caso',
                     $nit,
                     $obsOSPE, 
                     $idtusuario, $fecha_hora_creacion, $fecha_hora_creacion)";


            $query6 = "INSERT INTO dim_cartapverificacion 
                        (iddim_Overificacion, num_cartaPVerificacion, num_cartaAmPVerificacion, idTusuario, fCreacion) 
                        VALUES
                        ($max, '$ordenCV', '$ordenAmPCV', $idtusuario, $fecha_hora_creacion)";

            $query7 = "INSERT INTO dim_cfinanzas ( 
            iddim_CFinanzas, iddim_Verificacion,
            idtusuario, fCreacion
            ) 
            values (
            $max, $max,
            $idtusuario, $fecha_hora_creacion    
            )";
    } else {
        $query = "INSERT INTO dim_aseguradoindevido 
            (iddim_aseguradoindevido, idDIM_Oficina, idcorrelativo, 
            idTipoTrabajador,
            idTipoAtencion,
            tipoRegistro,
            RUC, dni_empresa, 
            nomEmpresa, idTCondicion, idTEstado, DEPARTAMENT_emp, PROVINCIA_emp, 
            DISTRITO_emp, DIRECCION_emp, dni_t, autogenerado_t, paterno_t, materno_t, 
            casada_t,nombre1_t, nombre2_t, fechanacimiento, DEPARTAMENT_t, PROVINCIA_t, DISTRITO_t, 
            DIRECCION_t, idTusuario ,fCreacion) 
            VALUES 
            ($max, '$idOficinaUsuario', $max, 
            '$ttrabajador', '1', '$tregistro',
            '$eempleadora', '$dni_eempleadora', 
            '$NOMBRE_EMP', $flag22_EMP, $ESTADO_EMP, '$DEPARTAMENTO_EMP', '$PROVINCIA_EMP',
            '$DISTRITO_EMP', '$direccion_EMP', '$dni_1', '$dgacaut', '$apepaterno', '$apematerno', 
            '$apematcasada','$nombresreniec', '', '$DGAFNAC', '$departamen', '$provincia', '$distrito', 
            '$direccion', $idtusuario, $fecha_hora_creacion)";


            $query1 = "INSERT INTO 
                    dim_overificacion (iddim_Verificacion, iddim_Overificacion, idDIM_Oficina, ordenV, numero, 
                    fechaEmision,fechanotificacionOV, fechanotificacionOVE, idTActosverificacion, 
                    idtusuario, fCreacion) 
                    VALUES ($max, $max, '$idOficinaUsuario', '$ordenVV', '1',
                    $femiordverif,$fechanotificacionOV, $fechanotificacionOVE, '084',
                    $idtusuario, $fecha_hora_creacion)";

            $query2 = "INSERT INTO 
                    dim_resboficio (iddim_Overificacion, iddim_ResBOficio, 
                    idtusuario, fCreacion) 
                    VALUES ($max, $max,
                    $idtusuario, $fecha_hora_creacion)";

            $query3 = "INSERT INTO dim_actaverificacion 
                    (iddim_Verificacion, iddim_ActaVerificacion, numeroActaVe, idTActosverificacion, fultimaActaVe,iddim_Verificadores1, idTusuario, fCreacion) 
                    VALUES 
                    ($max,$max, '$ordenACV', '026', $fultimaActaVe,$cbx_verificador, $idtusuario, $fecha_hora_creacion)";


            $query5 = "INSERT INTO dim_verificacion (iddim_Verificacion, idTVerificacion, idTVerificacionPerfil,origenverif, iddim_aseguradoindevido,
                     idTEstadoActual,
                     an_verifi, num_verifi, ospe_verifi,
                     fechateinfoFinalVe,
                     fechaEIFinalJOSPE,
                     fechaDevInfFinalJOSPE,
                     codigocaso,
                     nit,
                     observaciones, 
                     idtusuario, fCreacion) VALUES ($max, '2', $idTVerificacionPerfil,$cbx_origencp, $max, 
                     $idTEstadoActual,
                     $ano, '$nnorden', '$cc',
                     $fechateinfoFinalVe,
                     $fentreinffinal,
                     $fdevinffinal,
                     '$cod_caso',
                     $nit,
                     $obsOSPE, 
                     $idtusuario, $fecha_hora_creacion)";


                    $query6 = "INSERT INTO dim_cartapverificacion 
                        (iddim_Overificacion, num_cartaPVerificacion, num_cartaAmPVerificacion, idTusuario, fCreacion) 
                        VALUES
                        ($max, '$ordenCV', '$ordenAmPCV', $idtusuario, $fecha_hora_creacion)";

            $query7 = "INSERT INTO dim_cfinanzas ( 
            iddim_CFinanzas, iddim_Verificacion,
            idtusuario, fCreacion
            ) 
            values (
            $max, $max,
            $idtusuario, $fecha_hora_creacion    
            )";
    }

     $querynn="SELECT count(a.ordenV) total, a.ordenV, b.dni_t
                FROM dim_overificacion a 
                left join dim_aseguradoindevido b on a.iddim_Overificacion=b.iddim_aseguradoindevido
                where a.ordenV='$ordenVV'
                group by ordenV,b.dni_t";
     
$resultado = $conexionmysql->query($querynn);

while ($row = $resultado->fetch_assoc()) {
    $num_ov = $row['total'];
    $dni_t = $row['dni_t'];
}
            
            if($num_ov != 0) {
    echo "NO SE PUEDE REGISTRAR POR QUE YA EXISTE EL NUMERO DE LA ORDEN DE VERIFICACION, DNI: ", $dni_t;
}
else { 
    
            if ($conexionmysql->query($query)) {
                if ($conexionmysql->query($query1)) {
                    if ($conexionmysql->query($query2)) {
                        if ($conexionmysql->query($query3)) {

                            if ($conexionmysql->query($query5)) {
                                if ($conexionmysql->query($query6)) {
                                    if ($conexionmysql->query($query7)) {
                                        echo 'Se Actualizo Correctamente.';
                                        //echo $max;  
                                 
                                    } else {
                                        echo 'Error al Actualizar registro<br>';
                                        echo '$MAX: ', $max, '<br><br>';
                                        echo '$idTVerificacion: ', $idTVerificacion, '<br>';

                                        echo '$idTVerificacionPerfil: ', $idTVerificacionPerfil, '<br><br>';
                                        echo '$idTRRBRegistro: ', $idTRRBRegistro, '<br><br>';

                                        echo '$idTEstadoActual: ', $idTEstadoActual, '<br>';
                                        echo '$fentreinffinal: ', $fentreinffinal, '<br>';
                                        echo '$obsOSPE: ', $obsOSPE, '<br>';
                                        echo '$idtusuario: ', $idtusuario, '<br>';
                                        echo '$fecha_hora_creacion: ', $fecha_hora_creacion, '<br><br>';
                                        
                                        echo '$ordenVV: ', $ordenVV, '<br>';
                                        echo '$cod_caso: ', $cod_caso, '<br>';
                                            }                                 
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        ?>

    </body>
</html>