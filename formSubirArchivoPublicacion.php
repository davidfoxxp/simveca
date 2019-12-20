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

<!doctype html>
<html lang="es">
    <head>
        <title>Conexion con MySQL</title>	
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        </style>

        <script type="text/javascript">
            function popUp(URL) {
                window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,status=0, titlebar=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 390,top = 50');
            }
        </script>      

    </head>
    <body style="background-color:#26ADE4;">         
        <h4>
            <?PHP
//            echo '<BR>OSPE: ' . utf8_decode($row['cod_oficinaIni']) . '-' . utf8_decode($row['oficinaIni'] . '-' . utf8_decode($row['oficina']));
//            echo '<br>UCF: ' . utf8_decode($row['codOficina']) . '-' . utf8_decode($row['oficina']);
//            echo '<BR><BR>Bienvenido<br>' . utf8_decode($row['nombres']);

            //$idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
            //$codOficina = utf8_decode($row['codOficina']);
            $nomenclatura = utf8_decode($row['nomenclatura']);
            $cod_oficinaIni = utf8_decode($row['cod_oficinaIni']);
            $oficinaIni = utf8_decode($row['oficinaIni']);
            $oficina = ($row['oficina']);
            ?>  
        </h4>

        <?PHP
        
        $iddim_usuario = utf8_decode($row['iddim_usuario']);
        $idOficinaUsuario = utf8_decode($row['idDIM_Oficina']);
        $codOficina = utf8_decode($row['codOficina']);
        ?>   
              
        <form action="" method="post" style="text-align: center" enctype="multipart/form-data" name="inscripcion">
            <label style="font-size: 18px;">SELECCIONAR ARCHIVO</label>
            <br>
            <br>
            
            
            <table>               
                
                <tr>
                    <td>
                         <label>Archivo:</label>
                    </td>  
                    <td>
                        <input style="background-color: #FFF288"type="file" name="archivo[]" multiple="multiple" height="22px"><BR>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2">
                        <input style="background-color: #FFF288" type="submit" value="Enviar"  class="trig">
                    </td>
                </tr>   
                <tr style="text-align: left">
                    <td colspan="2" >   
                        <input type="checkbox" name="validar" value="1" required=""><label id="check_td" style="font-size: 10px">Confirma que el Pdf contiene toda la informacion de la FIRME Y CONSENTIDA</label></input>
                    </td>
                </tr> 
            </table>            
        </form>
        
        <?php
        # definimos la carpeta destino
        //$carpetaDestino="C:/wamp64/www/SISGASV/pdf/";
        /*
          if($cod_oficinaIni=="0949") {
          $carpetaDestino = "H:/OSPES_SISGASV/OSPE_JESUS_MARIA/PDF/";
          }
          else {}
         * <?php echo $_SERVER["PHP_SELF"] ?>
         */
       $valida= (isset($_REQUEST["validar"])?$_REQUEST["validar"]:0);
        switch ($cod_oficinaIni) { 
            
            case "1035": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_AMAZONAS/PDF_PUBLICACIONES/";
                break;
            case "1036": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_ANCASH/PDF_PUBLICACIONES/";
                break;
            case "1037": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_APURIMAC/PDF_PUBLICACIONES/";
                break;
            case "1038": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_AREQUIPA/PDF_PUBLICACIONES/";
                break;
            case "1039": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_AYACUCHO/PDF_PUBLICACIONES/";
                break;
            case "1040": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_CAJAMARCA/PDF_PUBLICACIONES/";
                break;
            case "0947": $carpetaDestino = utf8_decode("C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_CAÑETE/PDF_PUBLICACIONES/");
                break;
            case "0945": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_CORPORATIVA/PDF_PUBLICACIONES/";
                break;
            case "1041": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_CUSCO/PDF_PUBLICACIONES/";
                break;
            case "0950": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_HUACHO/PDF_PUBLICACIONES/";
                break;
            case "1042": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_HUANCAVELICA/PDF_PUBLICACIONES/";
                break;
            case "1043": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_HUANUCO/PDF_PUBLICACIONES/";
                break;
            case "1044": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_ICA/PDF_PUBLICACIONES/";
                break;
            case "0949": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_JESUSMARIA/PDF_PUBLICACIONES/";
                break;
            case "3736": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_JULIACA/PDF_PUBLICACIONES/";
                break;
            case "1045": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_JUNIN/PDF_PUBLICACIONES/";
                break;
            case "1046": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_LALIBERTAD/PDF_PUBLICACIONES/";
                break;
            case "1047": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_LAMBAYEQUE/PDF_PUBLICACIONES/";
                break;
            case "5016": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_COMAS/PDF_PUBLICACIONES/";
                break;
            case "0951": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SANMARTINDEPORRES/PDF_PUBLICACIONES/";
                break;
            case "1048": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_LORETO/PDF_PUBLICACIONES/";
                break;
            case "1049": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_MADREDEDIOS/PDF_PUBLICACIONES/";
                break;
            case "1050": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_MOQUEGUA/PDF_PUBLICACIONES/";
                break;            
            case "7826": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_MOYOBAMBA/PDF_PUBLICACIONES/";
                break;
            case "1051": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_PASCO/PDF_PUBLICACIONES/";
                break;
            case "1052": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_PIURA/PDF_PUBLICACIONES/";
                break;
            case "1053": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_PUNO/PDF_PUBLICACIONES/";
                break;
            case "0946": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SALAMANCA/PDF_PUBLICACIONES/";
                break;
            case "0948": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SANISIDRO/PDF_PUBLICACIONES/";
                break;
            case "0944": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SANJUANDELURIGANCHO/PDF_PUBLICACIONES/";
                break;
            case "3034": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SANMARTIN/PDF_PUBLICACIONES/";
                break;
            case "5013": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_SANMIGUEL/PDF_PUBLICACIONES/";
                break;
            case "1055": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_TACNA/PDF_PUBLICACIONES/";
                break;
            case "1056": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_TUMBES/PDF_PUBLICACIONES/";
                break;
            case "1057": $carpetaDestino = "C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_UCAYALI/PDF_PUBLICACIONES/";
                break;

        }
        
            ///se agrego
            date_default_timezone_set('America/Bogota');
            $fecha_hora_creacione = date('Y-m-d G:i:s');
            $fecha_hora_creacion = "'$fecha_hora_creacione'";

        # si hay algun archivo que subir
        if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]) {

            # recorremos todos los arhivos que se han subido
            for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
                
                /*
                 * Lo ideal es modificar el archivo php.ini y configurar upload_max_filesize y post_max_size con un valor mayor.

Por ejemplo, para configurar 32 MiB usando notación shorthand, deberemos poner:

upload_max_filesize = 32M
post_max_size = 32M
Otra opción alternativa es crear un archivo .htaccess (si usas apache y está habilitado su uso) con el siguiente contenido:

php_value upload_max_filesize 32M
php_value post_max_size 32M
                 */

                # si es un formato de pdf
                if ($_FILES["archivo"]["type"][$i] == "application/pdf") {

                    # si exsite la carpeta o se ha creado
                    if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                        $origen = $_FILES["archivo"]["tmp_name"][$i];
                        $destino = $carpetaDestino . $_FILES["archivo"]["name"][$i];
                        $nombre_pdf= $_FILES["archivo"]["name"][$i];

                        # movemos el archivo
                        if (@move_uploaded_file($origen, $destino)) {
                            $iddim_Publicacion= $_GET['iddim_Publicacion'];                            
                            
                            $query = "UPDATE dim_publicacion SET validacion='$valida', ruta_pdf_publi='/SISGASV/OSPES_SISGASV/OSPE_$oficina/PDF_PUBLICACIONES/$nombre_pdf', usuario_pdf='$idtusuario', dia_pdf=$fecha_hora_creacion WHERE iddim_Publicacion='$iddim_Publicacion'";
                            
            
                            if ($conexionmysql->query($query)) {
                                //if ($conexion->query($query1)) {
                                echo "<br>" . $_FILES["archivo"]["name"][$i] . " movido correctamente";
                                
                                //Cerramos la conexion
                                // }
                            }
                        } else {
                            echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"][$i];
                        }
                    } else {
                        echo "<br>No se ha podido crear la carpeta: " . $carpetaDestino;
                    }
                } else {
                    echo "<br>" . $_FILES["archivo"]["name"][$i] . " - NO es pdf";
                }
            }
        } else {
            echo "No se ha subido ningun documento pdf";
        }
        ?>
    </body>
</html>

