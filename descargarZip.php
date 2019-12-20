<?php
         if (isset($_POST['descargar'])) {
       
        if(isset($_POST['seleccion'])){
//         $_POST['descargar'] {       
//        $_POST['seleccion']{
           $array=($_POST['seleccion']);
           $longitud=count($array);
           // Creamos un instancia de la clase ZipArchive
$zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
 $zip->open("miarchivo.zip",ZipArchive::CREATE);
 // Añadimos un directorio
 $dir = '';
 $zip->addEmptyDir($dir);
           
            for($i=0;$i<$longitud;$i++){   
               $array[$i];
               echo "<br>";
               $nompdf=substr($array[$i],43);
               $zip->addFile("C:/wamp64/www$array[$i]","$nompdf");
//               echo $array[$i];
//               echo "<br>";
//               $nompdf=substr($array[$i],43);
//                echo $nompdf;
//                echo "<br>";    
           }
           $zip->close();
 // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=miarchivo.zip");
 // leemos el archivo creado
 readfile('miarchivo.zip');
 // Por último eliminamos el archivo temporal creado
 unlink('miarchivo.zip');//Destruye el archivo temporal
           
         }
      }
          

    ?>
