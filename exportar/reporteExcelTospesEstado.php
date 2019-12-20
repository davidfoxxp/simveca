<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
    

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
    

    //$consulta = "SELECT t.eempleadora, t.perevaluarI, t.perevaluarF, t.fCreacion, t.domicilioAcreditaEmp, t.domicilioReniec FROM dim_overificacion t where (DATE(t.fCreacion) BETWEEN '$dateinicio' and '$datefin') and t.idDIM_Oficina='$idDIM_Oficina'";
                    
                      
       $consulta = "SELECT cp.iddim_CPosterior,
        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
        case 
        when cp.idTVerificacion='1' then 'CONTROL POSTERIOR'
        when cp.idTVerificacion='2' then 'VERIFICACION'       
        end as TVerificacion, 
        
        cp.idTVerificacionPerfil,
        tpf.VerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        cp.nombrePDF,
        cp.dia_pdf,
        case 
        when cp.idTGeneraBaja='1' then 'SI'
        when cp.idTGeneraBaja='2' then 'NO'
        when cp.idTGeneraBaja='4' then '--'
        end as GeneraBaja,                     
        ai.RUC, ai.nomEmpresa,
        ai.titularAcredita_dni, 
        ai.titularAcredita_nombres,
        ai.titularAcredita_vinculo,
        ai.dni_t, concat_ws(' ',ai.paterno_t, ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,
        pc.InicioPCalificar1, pc.FinPCalificar1,  
        pc.InicioPCalificar2, pc.FinPCalificar2, 
        pc.InicioPCalificar3, pc.FinPCalificar3, 
        pc.InicioPCalificar4, pc.FinPCalificar4, 
        pc.InicioPCalificar5, pc.FinPCalificar5,
        pc.InicioPCalificar6, pc.FinPCalificar6, 
        pc.InicioPCalificar7, pc.FinPCalificar7, 
        pc.InicioPCalificar8, pc.FinPCalificar8, 
        pc.InicioPCalificar9, pc.FinPCalificar9, 
        pc.InicioPCalificar10, pc.FinPCalificar10,
        pc.InicioPFinal, pc.FinPFinal,
        cp.observaciones,
        vf.VINCULO_0,
        vf.DNI_DH_0, 
        vf.APELLIDO_NOMBRE_0,
        pvf.InicioPCalificar1 as IniDh1, pvf.FinPCalificar1 as FinDh1,  
        pvf.InicioPCalificar2 as IniDh2, pvf.FinPCalificar2 as FinDh2, 
        pvf.InicioPCalificar3 as IniDh3, pvf.FinPCalificar3 as FinDh3, 
        pvf.InicioPCalificar4 as IniDh4, pvf.FinPCalificar4 as FinDh4, 
        pvf.InicioPCalificar5 as IniDh5, pvf.FinPCalificar5 as FinDh5,
        tea.EstadoActual,
        tp.Verificacion, 
        tpf.VerificacionPerfil,
        cp.fCreacionTerminado,
        cp.fCreacion,
        cp.idtusuario,
        concat(du.pape,' ',du.sape,' ',du.pnom,' ',du.snom)as nombresUsuario

        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_sccmvtft vf on ai.iddim_aseguradoindevido=vf.iddim_aseguradoindevido
        left join dim_pacalificar_dh pvf on vf.SCCMVTFT=pvf.dim_SCCMVTFT
        left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido        
        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
        left join tipoverificacionperfil tpf on cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil        
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario=du.iddim_usuario
        where month(cp.fCreacion) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(cp.fCreacion)='$ano' 
        and tea.idTEstadoActual='$cbx_estadoActual' 
        and ai.idDIM_Oficina='$idOficinaUsuario'
        order by cp.iddim_CPosterior ASC";
    }
    
    $resultado = $conexionmysql->query($consulta);
    if ($resultado->num_rows > 0) {

        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli') {
            die('Este archivo solo se puede ver desde un navegador web');
        }

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
        $titulosColumnas = array('Cod. Post.',
            'OFICINA', 
            'EstadoActual',
            'fCreacionTerminado',
            'TVerificacion', 
            'GeneraBaja',
            'VerificacionPerfil', 
            'nResBRegistro',
            'nombrePDF', 
            'dia_pdf',            
            'RUC',
            'RAZON SOCIAL',
            'titularAcredita_dni', 
            'titularAcredita_nombres',
            'titularAcredita_vinculo',            
            'dni_t', 
            'nombres',
            'Ini.P.Cali1', 'FinP.Cali1', 
            'Ini.P.Cali2', 'FinP.Cali2',
            'Ini.P.Cali3', 'FinP.Cali3', 
            'Ini.P.Cali4', 'FinP.Cali4',
            'Ini.P.Cali5', 'FinP.Cali5',  
            'Ini.P.Cali6', 'FinP.Cali6', 
            'Ini.P.Cali7', 'FinP.Cali7',
            'Ini.P.Cali8', 'FinP.Cali8', 
            'Ini.P.Cali9', 'FinP.Cali9',
            'Ini.P.Cali10', 'FinP.Cali10', 
            'InicioPFinal', 'FinPFinal',  
            'observaciones',
            'VINCULO_0', 
            'DNI_DH_0', 
            'APELLIDO_NOMBRE_0',
            'Ini.P.Cali1', 'FinP.Cali1', 
            'Ini.P.Cali2', 'FinP.Cali2',
            'Ini.P.Cali3', 'FinP.Cali3', 
            'Ini.P.Cali4', 'FinP.Cali4',
            'Ini.P.Cali5', 'FinP.Cali5',
            'fCreacion', 'nombresUsuario',
            );

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:BC1');

        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', $tituloReporte)
                ->setCellValue('A3', $titulosColumnas[0])
                ->setCellValue('B3', $titulosColumnas[1])
                ->setCellValue('C3', $titulosColumnas[2])
                ->setCellValue('D3', $titulosColumnas[3])
                ->setCellValue('E3', $titulosColumnas[4])
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
                ->setCellValue('U3', $titulosColumnas[20])
               ->setCellValue('V3', $titulosColumnas[21])
               ->setCellValue('W3', $titulosColumnas[22])
                
                ->setCellValue('X3', $titulosColumnas[23])                
                ->setCellValue('Y3', $titulosColumnas[24])
                ->setCellValue('Z3', $titulosColumnas[25])
                ->setCellValue('AA3', $titulosColumnas[26])
                ->setCellValue('AB3', $titulosColumnas[27])                
                ->setCellValue('AC3', $titulosColumnas[28])
                ->setCellValue('AD3', $titulosColumnas[29])
                ->setCellValue('AE3', $titulosColumnas[30])
                ->setCellValue('AF3', $titulosColumnas[31])
                ->setCellValue('AG3', $titulosColumnas[32])
                ->setCellValue('AH3', $titulosColumnas[33])
                ->setCellValue('AI3', $titulosColumnas[34])
                ->setCellValue('AJ3', $titulosColumnas[35])
                ->setCellValue('AK3', $titulosColumnas[36])
                ->setCellValue('AL3', $titulosColumnas[37])
                ->setCellValue('AM3', $titulosColumnas[38])
                ->setCellValue('AN3', $titulosColumnas[39])
                ->setCellValue('AO3', $titulosColumnas[40])
                ->setCellValue('AP3', $titulosColumnas[41])
                ->setCellValue('AQ3', $titulosColumnas[42])
                ->setCellValue('AR3', $titulosColumnas[43])
                ->setCellValue('AS3', $titulosColumnas[44])
                ->setCellValue('AT3', $titulosColumnas[45])
                ->setCellValue('AU3', $titulosColumnas[46])
                ->setCellValue('AV3', $titulosColumnas[47])
                ->setCellValue('AW3', $titulosColumnas[48])
                ->setCellValue('AX3', $titulosColumnas[49])
                ->setCellValue('AY3', $titulosColumnas[50])
                ->setCellValue('AZ3', $titulosColumnas[51])
                ->setCellValue('BA3', $titulosColumnas[52])
                ->setCellValue('BB3', $titulosColumnas[53])
                ->setCellValue('BC3', $titulosColumnas[54]);
               

        //Se agregan los datos de los alumnos
        $i = 4;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['iddim_CPosterior'])
                    ->setCellValue('B' . $i, $fila['OFICINA'])                   
                    ->setCellValue('C' . $i, $fila['EstadoActual'])
                    ->setCellValue('D' . $i, $fila['fCreacionTerminado'])
                    ->setCellValue('E' . $i, $fila['TVerificacion'])
//                    ->setCellValueExplicitByColumnAndRow('E' . $i, $fila['dni_t'],utf8_encode(strval('dni_t')), PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('F' . $i, $fila['GeneraBaja'])
                    ->setCellValue('G' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('H' . $i, $fila['nResBRegistro'])
                    ->setCellValueExplicit('I' . $i, $fila['nombrePDF'], PHPExcel_Cell_DataType::TYPE_STRING)                   
                    ->setCellValue('J' . $i, $fila['dia_pdf'])
                    ->setCellValue('K' . $i, $fila['RUC'])
                    ->setCellValue('L' . $i, $fila['nomEmpresa'])
                    ->setCellValue('M' . $i, $fila['titularAcredita_dni'])
                    ->setCellValue('N' . $i, $fila['titularAcredita_nombres'])
                    ->setCellValue('O' . $i, $fila['titularAcredita_vinculo'])
                    ->setCellValueExplicit('P' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('Q' . $i, $fila['nombres'])
                    //AA
                    ->setCellValue('R' . $i, $fila['InicioPCalificar1'])
                    ->setCellValue('S' . $i, $fila['FinPCalificar1'])
                    ->setCellValue('T' . $i, $fila['InicioPCalificar2'])
                    ->setCellValue('U' . $i, $fila['FinPCalificar2'])
                    ->setCellValue('V' . $i, $fila['InicioPCalificar3'])
                    ->setCellValue('W' . $i, $fila['FinPCalificar3'])
                    ->setCellValue('X' . $i, $fila['InicioPCalificar4'])
                    ->setCellValue('Y' . $i, $fila['FinPCalificar4'])
                    ->setCellValue('Z' . $i, $fila['InicioPCalificar5'])
                    ->setCellValue('AA' . $i, $fila['FinPCalificar5'])
                    ->setCellValue('AB' . $i, $fila['InicioPCalificar6'])
                    ->setCellValue('AC' . $i, $fila['FinPCalificar6'])
                    ->setCellValue('AD' . $i, $fila['InicioPCalificar7'])
                    ->setCellValue('AE' . $i, $fila['FinPCalificar7'])
                    ->setCellValue('AF' . $i, $fila['InicioPCalificar8'])
                    ->setCellValue('AG' . $i, $fila['FinPCalificar8'])
                    ->setCellValue('AH' . $i, $fila['InicioPCalificar9'])
                    ->setCellValue('AI' . $i, $fila['FinPCalificar9'])
                    ->setCellValue('AJ' . $i, $fila['InicioPCalificar10'])
                    ->setCellValue('AK' . $i, $fila['FinPCalificar10'])                    
                    ->setCellValue('AL' . $i, $fila['InicioPFinal'])
                    ->setCellValue('AM' . $i, $fila['FinPFinal'])
                    ->setCellValue('AN' . $i, $fila['observaciones'])
                    ->setCellValue('AO' . $i, $fila['VINCULO_0'])
                    ->setCellValueExplicit('AP' . $i, $fila['DNI_DH_0'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('AQ' . $i, $fila['APELLIDO_NOMBRE_0'])
                    ->setCellValue('AR' . $i, $fila['IniDh1'])
                    ->setCellValue('AS' . $i, $fila['FinDh1'])
                    ->setCellValue('AT' . $i, $fila['IniDh2'])
                    ->setCellValue('AU' . $i, $fila['FinDh2'])
                    ->setCellValue('AV' . $i, $fila['IniDh3'])
                    ->setCellValue('AW' . $i, $fila['FinDh3'])
                    ->setCellValue('AX' . $i, $fila['IniDh4'])
                    ->setCellValue('AY' . $i, $fila['FinDh4'])
                    ->setCellValue('AZ' . $i, $fila['IniDh5'])
                    ->setCellValue('BA' . $i, $fila['FinDh5'])
                    ->setCellValue('BB' . $i, $fila['fCreacion'])
                    ->setCellValue('BC' . $i, $fila['nombresUsuario']);       
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:BC3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:BC" . ($i - 1));

        for ($i = 'A'; $i <= 'BC'; $i++) {
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