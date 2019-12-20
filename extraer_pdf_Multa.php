<?php  

 $oficinaa = $_POST["oficinaa"];
// Creamos un instancia de la clase ZipArchive
 $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
 $zip->open("miarchivo.zip",ZipArchive::CREATE);
 // Añadimos un directorio
 $dir = '';
 $zip->addEmptyDir($dir);
 
 if ( !empty($_POST["seleccion"]) && is_array($_POST["seleccion"]) ) { 
    
    foreach ( $_POST["seleccion"] as $valores ) { 
        
     
 
 // Añadimos un archivo en la raid del zip.
 $zip->addFile("C:/wamp64/www/SISGASV/OSPES_SISGASV/OSPE_$oficinaa/PDF_MULTA/$valores.pdf","$valores.pdf");
  
  }     
} 
 
 //Añadimos un archivo dentro del directorio que hemos creado
 //$zip->addFile("015907157115100715711520945.pdf",$dir."015907157115100715711520945.pdf");
 // Una vez añadido los archivos deseados cerramos el zip.
 $zip->close();
 // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=miarchivo.zip");
 // leemos el archivo creado
 readfile('miarchivo.zip');
 // Por último eliminamos el archivo temporal creado
 unlink('miarchivo.zip');//Destruye el archivo temporal
 
 //http://191.0.140.180:81/sisgasv/otros/welcome_1_2.php


//if ( !empty($_POST["valores"]) && is_array($_POST["valores"]) ) { 
//    echo "<ul>";
//    foreach ( $_POST["valores"] as $valores ) { 
//            echo "<li>";
//            echo $valores; 
//            echo "</li>"; 
//     }
//     echo "</ul>";
//}

?>