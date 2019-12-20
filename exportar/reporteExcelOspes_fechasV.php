<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
    
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];
    
//     $consulta = "SELECT t.eempleadora, t.perevaluarI, t.perevaluarF, t.fCreacion, t.domicilioAcreditaEmp, t.domicilioReniec 
//            FROM dim_overificacion t 
//            where (DATE(t.fCreacion) 
//            BETWEEN '$dateinicio' and '$datefin') 
//            and t.idDIM_Oficina='$idDIM_Oficina'";

    $consulta = "SELECT 
a.iddim_Verificacion, 
a.idTVerificacion, 
'VERIFICACION' as VERIFICACION,
a.idTVerificacionPerfil, 
tp.VerificacionPerfil,
a.iddim_aseguradoindevido, 
a.idTEstadoActual, 
tea.EstadoActual,
a.fechateinfoFinalVe, 
a.fechaEIFinalJOSPE, 
a.fechaDevInfFinalJOSPE, 
a.nit, 
a.fechaRDerivado, 
a.fechaDDerivado, 
a.casoDerivado, 
a.iddim_VerificacionDerivado, 
a.codigocaso, 
a.observaciones, 
a.idTusuario, 
concat_ws(' ', du.pape,du.sape,du.pnom,du.snom)as nombresUsuario,
a.fCreacion,
b.idDIM_Oficina,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
b.RUC, 
b.nomEmpresa, 
b.dni_t, 
b.autogenerado_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t) as asegurado,
b.fechanacimiento,
c.ordenV, c.numero, 
c.fechaEmision, 
c.fechanotificacionOV,
d.fechaEmiBOficio, 
d.numResBOficio, 
d.nombre_PDF_reso, 
d.idTRRBRegistro, 
dt.RRBRegistro,
d.fechaNAsegurado,
e.fultimaActaVe, 
e.iddim_Verificadores1,
dofx.apellidonombre, 
pc.InicioPCalificar1, pc.FinPCalificar1,  
pc.InicioPCalificar2, pc.FinPCalificar2, 
pc.InicioPCalificar3, pc.FinPCalificar3, 
pc.InicioPCalificar4, pc.FinPCalificar4, 
pc.InicioPCalificar5, pc.FinPCalificar5,

b.titularAcredita_dni, 
b.titularAcredita_nombres,
b.titularAcredita_vinculo,

vf.VINCULO_0,
vf.DNI_DH_0, 
vf.APELLIDO_NOMBRE_0,

pvf.InicioPCalificar1 as IniDh1, pvf.FinPCalificar1 as FinDh1,  
pvf.InicioPCalificar2 as IniDh2, pvf.FinPCalificar2 as FinDh2, 
pvf.InicioPCalificar3 as IniDh3, pvf.FinPCalificar3 as FinDh3, 
pvf.InicioPCalificar4 as IniDh4, pvf.FinPCalificar4 as FinDh4, 
pvf.InicioPCalificar5 as IniDh5, pvf.FinPCalificar5 as FinDh5
        FROM dim_verificacion a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_actaverificacion e on a.iddim_Verificacion=e.iddim_Verificacion
        left join dim_pacalificar pc on b.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
        left join dim_sccmvtft vf on b.iddim_aseguradoindevido=vf.iddim_aseguradoindevido
        left join dim_pacalificar_dh pvf on vf.SCCMVTFT=pvf.dim_SCCMVTFT
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on a.idtusuario=du.iddim_usuario
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join dim_oficina dofx on b.idDIM_Oficina=dofx.idDIM_Oficina
        left join tiporrbregistro dt on e.iddim_Verificadores1=dt.idTRRBRegistro          
        where (DATE(a.fCreacion) BETWEEN '$dateinicio' and '$datefin')              
        and b.idDIM_Oficina='$idDIM_Oficina'        
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion DESC";
    
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
            
            'femisionBRegistro',
            
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
                ->setCellValue('BC3', $titulosColumnas[54])
                ->setCellValue('BD3', $titulosColumnas[55]);
               

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
                    
                    ->setCellValue('F' . $i, $fila['femisionBRegistro'])
                    
//                    ->setCellValueExplicitByColumnAndRow('E' . $i, $fila['dni_t'],utf8_encode(strval('dni_t')), PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('G' . $i, $fila['GeneraBaja'])
                    ->setCellValue('H' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('I' . $i, $fila['nResBRegistro'])
                    ->setCellValueExplicit('J' . $i, $fila['nombrePDF'], PHPExcel_Cell_DataType::TYPE_STRING)                   
                    ->setCellValue('K' . $i, $fila['dia_pdf'])
                    ->setCellValue('L' . $i, $fila['RUC'])
                    ->setCellValue('M' . $i, $fila['nomEmpresa'])
                    ->setCellValue('N' . $i, $fila['titularAcredita_dni'])
                    ->setCellValue('O' . $i, $fila['titularAcredita_nombres'])
                    ->setCellValue('P' . $i, $fila['titularAcredita_vinculo'])
                    ->setCellValueExplicit('Q' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('R' . $i, $fila['nombres'])
                    //AA
                    ->setCellValue('S' . $i, $fila['InicioPCalificar1'])
                    ->setCellValue('T' . $i, $fila['FinPCalificar1'])
                    ->setCellValue('U' . $i, $fila['InicioPCalificar2'])
                    ->setCellValue('V' . $i, $fila['FinPCalificar2'])
                    ->setCellValue('W' . $i, $fila['InicioPCalificar3'])
                    ->setCellValue('X' . $i, $fila['FinPCalificar3'])
                    ->setCellValue('Y' . $i, $fila['InicioPCalificar4'])
                    ->setCellValue('Z' . $i, $fila['FinPCalificar4'])
                    ->setCellValue('AA' . $i, $fila['InicioPCalificar5'])
                    ->setCellValue('AB' . $i, $fila['FinPCalificar5'])
                    ->setCellValue('AC' . $i, $fila['InicioPCalificar6'])
                    ->setCellValue('AD' . $i, $fila['FinPCalificar6'])
                    ->setCellValue('AE' . $i, $fila['InicioPCalificar7'])
                    ->setCellValue('AF' . $i, $fila['FinPCalificar7'])
                    ->setCellValue('AG' . $i, $fila['InicioPCalificar8'])
                    ->setCellValue('AH' . $i, $fila['FinPCalificar8'])
                    ->setCellValue('AI' . $i, $fila['InicioPCalificar9'])
                    ->setCellValue('AJ' . $i, $fila['FinPCalificar9'])
                    ->setCellValue('AK' . $i, $fila['InicioPCalificar10'])
                    ->setCellValue('AL' . $i, $fila['FinPCalificar10'])                    
                    ->setCellValue('AM' . $i, $fila['InicioPFinal'])
                    ->setCellValue('AN' . $i, $fila['FinPFinal'])
                    ->setCellValue('AO' . $i, $fila['observaciones'])
                    ->setCellValue('AP' . $i, $fila['VINCULO_0'])
                    ->setCellValueExplicit('AQ' . $i, $fila['DNI_DH_0'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('AR' . $i, $fila['APELLIDO_NOMBRE_0'])
                    ->setCellValue('AS' . $i, $fila['IniDh1'])
                    ->setCellValue('AT' . $i, $fila['FinDh1'])
                    ->setCellValue('AU' . $i, $fila['IniDh2'])
                    ->setCellValue('AV' . $i, $fila['FinDh2'])
                    ->setCellValue('AW' . $i, $fila['IniDh3'])
                    ->setCellValue('AX' . $i, $fila['FinDh3'])
                    ->setCellValue('AY' . $i, $fila['IniDh4'])
                    ->setCellValue('AZ' . $i, $fila['FinDh4'])
                    ->setCellValue('BA' . $i, $fila['IniDh5'])
                    ->setCellValue('BB' . $i, $fila['FinDh5'])
                    ->setCellValue('BC' . $i, $fila['fCreacion'])
                    ->setCellValue('BD' . $i, $fila['nombresUsuario']);       
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