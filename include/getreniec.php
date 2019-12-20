<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
        header("Content-Type: text/html;charset=utf-8");
      
      include '../conexionesbd/conexion_oracle.php';
        $q = $_GET['q'];    
        $a = $_GET['a']; 
        
        echo $q;
        $queryT = oci_parse($conexionora, "select 
       T.IDE_DNI,
       T.TXT_APEPATERNO,
       T.TXT_APEMATERNO,
       T.TXT_PRENOMBRES,
       T.TXT_NOMBRES,
       T.txt_apematcasada
        from DIM_CSAMRENIEC t where t.ide_dni='$q'");
                
        oci_execute($queryT);
        
        
        while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
//            $apepa=addslashes($row[1]);
//            $apema=addslashes($row[2]);
//            $apeca=addslashes($row[5]);
//            $apenom=addslashes($row[4]);
//            $cadena=addslashes($apepa.' '.$apema.' '.$apeca.' '.$apenom);
            echo "<table>";
            
            echo "<tr>";
//            $parametros0=addslashes($row[1].$row[2].$row[5].$row[4]);
//            $parametros = str_replace("\'","'",$parametros0);  
//            $parametros = str_replace("\'","'",$row[1].$row[2].$row[5].$row[4]);  
//            echo "<td><input name='nom".$a."' value='" . stripslashes($row[1]) . ' ' . stripslashes($row[2]) . ' ' .stripslashes($row[5]) . ' ' . stripslashes($row[4]). "' type='text' size='50' readOnly></td>";
            echo "<td><input name='nom".$a."' value='" . $row[1] . ' ' . $row[2] . ' ' .$row[5] . ' ' . $row[4]. "' type='text' size='50' readOnly></td>";
//              echo "<td><input name='nom".$a."' value='" . $apepa . ' ' . $apema . ' ' . $apeca . ' ' . $apenom. "' type='text' size='50' readOnly></td>";
//            echo "<td><input name='nom".$a."' value='" .$parametros. "' type='text' size='50' readOnly></td>";
            
            //echo "<td><input name='f0' value='" . $row[12] . "' type='text' size='7' readOnly></td>";
           
            echo "</tr>";
        }
        echo "</table>";
        oci_free_statement($queryT);
        ?>
    </body>
</html>