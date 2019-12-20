<?php

/*Creando una cadena de conexion con la extension mysql*/

$conexionmysql = new mysqli('localhost', 'root', '', 'sisgasv');
//$mysqli = new mysqli('localhost', 'root', '', 'sisgasv');

//validando si se realiza la conexion
if(mysqli_connect_errno()) {
	echo 'Error de conexion: ', mysqli_connect_error();
}
else {echo '';}
        
?>