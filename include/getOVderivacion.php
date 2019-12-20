<?php
       
      include "../conexionesbd/conexion_mysql.php";
        $a = $_GET['a'];  
         
       
	$queryM = "SELECT ve.iddim_Verificacion,ase.iddim_aseguradoindevido,ov.ordenV,ve.an_verifi,ve.num_verifi,ase.idDIM_Oficina ,ofi.cod_oficinaIni, ofi.codOficina, ofi.oficina,
ase.dni_t,ase.autogenerado_t,ase.paterno_t,ase.materno_t,ase.casada_t,ase.nombre1_t,ve.fechaDDerivado,ve.fechaRDerivado
FROM dim_verificacion ve
left join dim_aseguradoindevido ase on ve.iddim_aseguradoindevido=ase.iddim_aseguradoindevido
left join dim_oficina ofi on ase.idDIM_Oficina = ofi.idDIM_Oficina
left join dim_overificacion ov on ve.iddim_Verificacion=ov.iddim_Verificacion
where ov.iddim_OVerificacion='$a'";
	$resultadoM = $conexionmysql->query($queryM);
        
 while ($rowM = $resultadoM->fetch_assoc()){
//     $html= "<input type='text' size='30' name='ordenV' readOnly  value='".$rowM['ordenV']."'><br>";
//     
//     $html1= "<input type='text' size='30' name='fechaDDerivado' readOnly  value='".$rowM['fechaDDerivado']."'><br>";
     try{
         
         
                        $html=" <table>
                            <tr>
                            <td id='th1' class='especial' style='width: 212px'>Nº DE OV - OSPE QUE LE DERIVO EL CASO
                            </td>     
                            <td id='td1' style='height: 30px'>
                            ".$rowM['ordenV']."<br>
                            </td>          
                        </tr>
                        <tr>
                            <td id='th1' class='especial'>FECHA DE ENVIO DE LA OSPE QUE LO INICIO
                            </td> 
    
                            <td id='td1' style='height: 30px'> 
                                ".$rowM['fechaDDerivado']."<br>
                            </td>          
                        </tr>
                        </table>";
         
        echo $html;
     }
 catch (Exception $e)
 {
     echo 'Excepción capturada: ',  $e->getMessage(), "\n";
 }
 }
        
  
?>
