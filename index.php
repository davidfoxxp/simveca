<?php
require ('../SISGASV/conexionesbd/conexion_mysql.php');

session_start();

if (!empty($_POST)) {

    $usuario = mysqli_real_escape_string($conexionmysql, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexionmysql, $_POST['pass']);
    $error = '';
    //$sha1_pass = sha1($password);
    $sql = "SELECT u.iddim_usuario, u.idTperfiles FROM dim_usuario u where u.login='$usuario' and u.pass='$password' and u.estado='1'";
    $result = $conexionmysql->query($sql);
    $row = $result->num_rows;

    if ($row > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['iddim_usuario'];
        $_SESSION['perfil'] = $row['idTperfiles'];

        
        $sql1 = "SELECT t.dni FROM dim_sectoristas t where t.dni='$usuario'";
    $result1 = $conexionmysql->query($sql1);
    $row1 = $result1->num_rows;
        
        if($row1>0) {
        header("location: index_formListarControlPosterior.php");
    }
    else {
       header("location: welcome.php");
         
    }
        
     
    } else {
        $error = "El nombre o contraseña son incorrectos";
    }
}
?>
<html>
    <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link rel="shortcut icon" type="image/x-icon" href="../SISGASV/images/GASV.ICO/ms-icon-70x70.png">
        <meta charset="UTF-8">		
        <title> ::::: INTRANET::::</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                
        <style type="text/css">
body{
  background-attachment: fixed;
  background-position: center center;
  background-size: 100% 100%;
  background-image: url(imagenes/OUTSOURCING.jpg);
  
  #td1 {
                font-size: 12px;
                border-collapse:collapse;
                border-spacing:0;
                border-color:#999;
            }
  
/*border: none;
  margin-top: 1.5em;
  padding: 0.75em 1.5em;
  border-radius: 3px;
  font-family: Verdana, sans-serif;
  color: white;*/

            }

        </style>
        
    </head>

    <body bgcolor='#A9D0F5'>   
        <div id="globalWrapper">
        <div align='center'> 
            <br><br><br><br><br><br><br><br>         
            <img src="imagenes/logo_login.png" width="240" height="98"><br>
            <H3>
                <b><span style="color: #4192C6">SISTEMA INTEGRAL DE MONITOREO DE VERIFICACIÓN Y CONTROL DE AFILIACIÓN</span><BR></b>
            <b><span style="color: #4192C6">SIMVECA</span></b>
        </H3>
        </div>
            <br>
        <form id="form1" name="form1" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <table width='207' border='0' align='center' cellpadding='2' cellpadding='2' >
    
                <tr>
                    <td width='49'>
                        <h3 style="color: #FFFFFF"> USUARIO: </h3>
                        <br>
                        
                    </td>
                    <td width='144' class="form-group has-feedback">
                       <div class="form-group has-feedback" >
                         <input id="td1" style="margin:-0.2% 0; width: -webkit-fill-available;" type="text" name="usuario" class="form-control" placeholder="Usuario">
                         <span class="glyphicon glyphicon-user form-control-feedback"></span>
                       </div>
                    </td>                    
                </tr>
                <tr>
                    <!--
                    <td width='49'><span style="color: #FFFFFF">CONTRASE&Ntilde;A:</span></td>
                    -->
                    
                    <td width='49'>
                        <h3 style="color: #FFFFFF">CONTRASE&Ntilde;A:</h3>
                        <br>
                        
                    </td>
                    
                   <td width='144' class="form-group has-feedback">
                       <div class="form-group has-feedback" >
                         <input id="pass" style="margin:-0.2% 0; width: -webkit-fill-available;" type="password" name="pass" class="form-control" placeholder="Contraseña">
                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                       </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align='center'>                        
                        <label><input name="login" value="LOGIN" type="submit" class="Estilo1"/></label>
                    </td>
                </tr>
            </table>
        </form>
    </div>
        
    </body>
</html>
