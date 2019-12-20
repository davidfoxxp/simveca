<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
    
    //$dateinicio = $_POST['dateinicio']; //1
    //$datefin = $_POST['datefin'];
    
    if (isset($_POST['cbx_OficinaAA'])) {
    
    $cbx_OficinaAA = $_POST['cbx_OficinaAA'];

    //$consulta = "SELECT t.eempleadora, t.perevaluarI, t.perevaluarF, t.fCreacion, t.domicilioAcreditaEmp, t.domicilioReniec FROM dim_overificacion t where (DATE(t.fCreacion) BETWEEN '$dateinicio' and '$datefin') and t.idDIM_Oficina='$idDIM_Oficina'";
    
       $consulta = "SELECT cp.iddim_CPosterior, 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,
ai.RUC, ai.nomEmpresa,   
ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
pc.InicioPCalificar1, pc.FinPCalificar1,  
pc.InicioPCalificar2, pc.FinPCalificar2, 
pc.InicioPCalificar3, pc.FinPCalificar3, 
pc.InicioPCalificar4, pc.FinPCalificar4, 
pc.InicioPCalificar5, pc.FinPCalificar5, 
tea.EstadoActual,
tp.Verificacion, 
tpf.VerificacionPerfil, 
case 
when cp.idTGeneraBaja='1' then 'SI'
when cp.idTGeneraBaja='2' then 'NO'
when cp.idTGeneraBaja='4' then '--'
end as GeneraBaja,                     
cp.observaciones                                                  
FROM dim_cposterior cp
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
where ai.idDIM_Oficina='$cbx_OficinaAA'
order by cp.iddim_CPosterior ASC";
    }
    
    
    if (isset($_POST['cbx_estadoActual'])) {
    
    $cbx_estadoActual = $_POST['cbx_estadoActual'];

    //$consulta = "SELECT t.eempleadora, t.perevaluarI, t.perevaluarF, t.fCreacion, t.domicilioAcreditaEmp, t.domicilioReniec FROM dim_overificacion t where (DATE(t.fCreacion) BETWEEN '$dateinicio' and '$datefin') and t.idDIM_Oficina='$idDIM_Oficina'";
    
       $consulta = "SELECT cp.iddim_CPosterior, 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,
ai.RUC, ai.nomEmpresa,   
ai.dni_t, concat(ai.paterno_t, ' ' , ai.materno_t, ' ',ai.nombre1_t, ' ', ai.nombre2_t) nombres,
pc.InicioPCalificar1, pc.FinPCalificar1,  
pc.InicioPCalificar2, pc.FinPCalificar2, 
pc.InicioPCalificar3, pc.FinPCalificar3, 
pc.InicioPCalificar4, pc.FinPCalificar4, 
pc.InicioPCalificar5, pc.FinPCalificar5, 
tea.EstadoActual,
tp.Verificacion, 
tpf.VerificacionPerfil, 
case 
when cp.idTGeneraBaja='1' then 'SI'
when cp.idTGeneraBaja='2' then 'NO'
when cp.idTGeneraBaja='4' then '--'
end as GeneraBaja,                     
cp.observaciones                                                  
FROM dim_cposterior cp
left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina       
left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
where tea.idTEstadoActual='$cbx_estadoActual'
order by cp.iddim_CPosterior ASC";
    }
        if (isset($_POST['cbx_OficinaAA']) and isset($_POST['cbx_estadoActual']) and isset($_POST['cbx_ano']) 
        and isset($_POST['cbx_enero'])and isset($_POST['cbx_febrero'])and isset($_POST['cbx_marzo'])and isset($_POST['cbx_abril'])
        and isset($_POST['cbx_mayo'])and isset($_POST['cbx_junio'])and isset($_POST['cbx_julio'])and isset($_POST['cbx_agosto'])
        and isset($_POST['cbx_setiembre'])and isset($_POST['cbx_octubre'])and isset($_POST['cbx_noviembre'])and isset($_POST['cbx_diciembre'])){

    $idOficinaUsuario = $_POST['cbx_OficinaAA']; 
    $cbx_estadoActual = $_POST['cbx_estadoActual'];
    $ano = $_POST['cbx_ano'];            
    $enero = $_POST['cbx_enero'];            
    $febrero= $_POST['cbx_febrero'];            
    $marzo = $_POST['cbx_marzo'];
    $abril = $_POST['cbx_abril'];            
    $mayo = $_POST['cbx_mayo'];            
    $junio = $_POST['cbx_junio'];
    $julio = $_POST['cbx_julio'];            
    $agosto = $_POST['cbx_agosto'];            
    $setiembre = $_POST['cbx_setiembre'];
    $octubre = $_POST['cbx_octubre'];            
    $noviembre = $_POST['cbx_noviembre'];            
    $diciembre = $_POST['cbx_diciembre'];
    
                
       $consulta = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        cp.idTVerificacion,
        cp.idTVerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        cp.nombrePDF,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,
        ai.dni_t, concat(ai.paterno_t,' ',ai.materno_t,' ',ai.nombre1_t,' ',ai.nombre2_t)as nombres,
        pc.InicioPCalificar1, pc.FinPCalificar1,  
        pc.InicioPCalificar2, pc.FinPCalificar2, 
        pc.InicioPCalificar3, pc.FinPCalificar3, 
        pc.InicioPCalificar4, pc.FinPCalificar4, 
        pc.InicioPCalificar5, pc.FinPCalificar5, 
        cp.observaciones,
        
        tea.EstadoActual,
        tp.Verificacion, 
        tpf.VerificacionPerfil

        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
        
        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
        left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
        
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        where month(cp.fCreacion) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(cp.fCreacion)='$ano' 
        and tea.idTEstadoActual='$cbx_estadoActual' 
        and ai.idDIM_Oficina='$idOficinaUsuario'
        order by cp.iddim_CPosterior ASC";
    }
    
    $resultado = $conexionmysql->query($consulta);
    if ($resultado->num_rows > 0) {

        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli')
            die('Este archivo solo se puede ver desde un navegador web');

        /** Se agrega la libreria PHPExcel */
        require_once '../PHPExcel/PHPExcel.php';

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
                ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
                ->setTitle("Reporte Excel con PHP y MySQL")
                ->setSubject("Reporte Excel con PHP y MySQL")
                ->setDescription("Reporte de alumnos")
                ->setKeywords("reporte alumnos carreras")
                ->setCategory("Reporte excel");

        $tituloReporte = "RELACION DE REGISTROS DE LA OSPE";
        $titulosColumnas = array('Cod. Post.', 'OFICINA', 'RUC', 'RAZON SOCIAL',
            'DNI T', 'APELLIDOS Y NOMBRES', 
            'Ini.P.Cali1', 'FinP.Cali1', 
            'Ini.P.Cali2', 'FinP.Cali2',
            'Ini.P.Cali3', 'FinP.Cali3', 
            'Ini.P.Cali4', 'FinP.Cali4',
            'Ini.P.Cali5', 'FinP.Cali5',             
            'EstadoActual', 'Verificacion', 'VerificacionPerfil',
            'Gen. Baja', 'observaciones',);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:U1');

        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', $tituloReporte)
                ->setCellValue('A3', $titulosColumnas[0])
                ->setCellValue('B3', $titulosColumnas[1])
                ->setCellValue('C3', $titulosColumnas[2])
                ->setCellValue('D3', $titulosColumnas[3])
                ->setCellValue('F3', $titulosColumnas[5])                
                ->setCellValue('G3', $titulosColumnas[6])
                ->setCellValue('H3', $titulosColumnas[7])
                ->setCellValue('I3', $titulosColumnas[8])
                ->setCellValue('J3', $titulosColumnas[9])
                ->setCellValue('K3', $titulosColumnas[10])
                ->setCellValue('L3', $titulosColumnas[11])
                ->setCellValue('M3', $titulosColumnas[12])
                ->setCellValue('N3', $titulosColumnas[13])
                ->setCellValue('O3', $titulosColumnas[14])
                ->setCellValue('P3', $titulosColumnas[15])
                ->setCellValue('Q3', $titulosColumnas[16])                
                ->setCellValue('R3', $titulosColumnas[17])
                ->setCellValue('S3', $titulosColumnas[18])
                ->setCellValue('T3', $titulosColumnas[19])
                ->setCellValue('U3', $titulosColumnas[20]);
               

        //Se agregan los datos de los alumnos
        $i = 4;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['iddim_CPosterior'])
                    ->setCellValue('B' . $i, $fila['OFICINA'])                   
                    ->setCellValue('C' . $i, $fila['RUC'])
                    ->setCellValue('D' . $i, $fila['nomEmpresa'])
                    ->setCellValue('E' . $i, $fila['dni_t'])
//                    ->setCellValueExplicitByColumnAndRow('E' . $i, $fila['dni_t'],utf8_encode(strval('dni_t')), PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('F' . $i, $fila['nombres'])
                    ->setCellValue('G' . $i, $fila['InicioPCalificar1'])
                    ->setCellValue('H' . $i, $fila['FinPCalificar1'])
                    ->setCellValue('I' . $i, $fila['InicioPCalificar2'])
                    ->setCellValue('J' . $i, $fila['FinPCalificar2'])
                    ->setCellValue('K' . $i, $fila['InicioPCalificar3'])
                    ->setCellValue('L' . $i, $fila['FinPCalificar3'])
                    ->setCellValue('M' . $i, $fila['InicioPCalificar4'])
                    ->setCellValue('N' . $i, $fila['FinPCalificar4'])
                    ->setCellValue('O' . $i, $fila['InicioPCalificar5'])
                    ->setCellValue('P' . $i, $fila['FinPCalificar5'])
                    ->setCellValue('Q' . $i, $fila['EstadoActual'])
                    ->setCellValue('R' . $i, $fila['Verificacion'])
                    ->setCellValue('S' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('T' . $i, $fila['GeneraBaja'])
                    ->setCellValue('U' . $i, $fila['observaciones']);  
            $i++;
        }

        $estiloTituloReporte = array(
            'font' => array(
                'name' => 'Verdana',
                'bold' => true,
                'italic' => false,
                'strike' => false,
                'size' => 16,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '000000')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'rotation' => 0,
                'wrap' => TRUE
            )
        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '000000'
                ),
                'endcolor' => array(
                    'argb' => '000000'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => TRUE
        ));

        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
                array(
                    'font' => array(
                        'name' => 'Arial',
                        'color' => array(
                            'rgb' => '000000'
                        )
                    ),
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array(
                        //'argb' => 'FFd9b7f4'
                        )
                    ),
                    'borders' => array(
                        'left' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '3a2a47'
                            )
                        )
                    )
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:U3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:U" . ($i - 1));

        for ($i = 'A'; $i <= 'U'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Tip.Estado');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ReportedeTipoestado.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}

?>