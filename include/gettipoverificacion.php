<?php 

include "../conexionesbd/conexion_mysql.php";
// aqui hacemos la coneccion mysq, etc 
$queryM = "SELECT * FROM sisgasv.tipoverificacionperfil b where b.VerificacionPerfil like ".$_POST['textoverificacion']."%'";
$resultadoM = $conexionmysql->query($queryM);
$row = mysql_fetch_assoc($queryM); 
echo json_encode($row); 

?>