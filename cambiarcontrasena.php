<?php
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

// <link rel="stylesheet" href="/resources/demos/style.css">
//<script type="text/javascript" src="../../../js/jquery-3.1.1.min.js"></script>
//<script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
//<script type="text/javascript" src="../../../js/cambiarPestanna.js"></script>
?>
<!doctype html>
<html lang="es">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png"></link>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-32"/>
        <title></title>	

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
<style type="text/css">
            .con_estilos {
                width: auto;
                padding: 5px;
                font-size: 14px;
                border: 1px solid #ccc;
                height: 26px;                
            }
</style>
<style type="text/css">
            /*programando con css*/
            body {
                background-color:white;
                background-repeat: repeat-x;
                background-attachment: fixed;
                height: 100%;
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
                font-size: 22px;
                font-weight:normal;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
                font: oblique bold 120% cursive;
                vertical-align: middle;
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
            td{
              border: hidden;  
            }
                     
        </style>
    </head>
    <body>
        <form name="form" action="actualizarcontrasena.php" method="POST">
            <?php
            $iddim_usuario = utf8_decode($row['iddim_usuario']);
            ?>
        <table  align="center" border="2" width="100%" height="100%" cellpadding="0" cellspacing="0">
            
            <tr>
                <td>
                    <br>Se actualizara bajo su responsabilidad<br><br>
                    <input type="hidden" name="iddim_usuario" size="50" value="<?php echo $iddim_usuario ?>" readOnly="readOnly" >
                </td>
            </tr>
             <tr>
                <td>
                    <b>Contraseña Anterior:*</b>
                    <input name="contrasenaante" type="text" id="contraa" maxlength="8" size="15" /><br><br>
                </td>                   
             </tr>
            <tr>
                <td>
                    <b>Nueva Contraseña:*</b>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input  name="nuevacontrasena" type="text"  id="ncontra" maxlength="8" size="15"/><br><br>
                </td>                   
             </tr>
            <tr align = "center">
                <td>
                    <input type="submit" name="actualizar" value="ACTUALIZAR"/>
                </td>
            </tr>
        </table>
        </form>
     </body>
</html>