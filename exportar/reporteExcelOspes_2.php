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
cp.femisionBRegistro,
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
cp.femisionBRegistro,
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
    
    if (isset($_POST['cbx_OficinaAA']) and isset($_POST['cbx_ano']) 
                and isset($_POST['cbx_enero'])and isset($_POST['cbx_febrero'])and isset($_POST['cbx_marzo'])and isset($_POST['cbx_abril'])
                and isset($_POST['cbx_mayo'])and isset($_POST['cbx_junio'])and isset($_POST['cbx_julio'])and isset($_POST['cbx_agosto'])
                and isset($_POST['cbx_setiembre'])and isset($_POST['cbx_octubre'])and isset($_POST['cbx_noviembre'])and isset($_POST['cbx_diciembre'])){
    
    $idOficinaUsuario = $_POST['cbx_OficinaAA']; 
   // $cbx_estadoActual = $_POST['cbx_estadoActual'];
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
        when cp.idTVerificacion='1' then '01'
        when cp.idTVerificacion='2' then '02'       
        end as TVerificacion, 
        case 
        when ai.idTipoAtencion='1' then '01'
        when ai.idTipoAtencion='2' then '02'       
        end as TipoAtencion, 
        
        cp.idTVerificacionPerfil,
        tpf.VerificacionPerfil,
        cp.idTEstadoActual,  
        cp.nResBRegistro,
        DATE_FORMAT(cp.femisionBRegistro, '%d/%m/%Y') femisionBRegistro, 
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

        tea.EstadoActual,
        tp.Verificacion, 
        tpf.VerificacionPerfil,
        cp.fCreacionTerminado,
        cp.fCreacion,
        cp.idtusuario,
        concat(du.pape,' ',du.sape,' ',du.pnom,' ',du.snom)as nombresUsuario,
        tvpo.VerificacionPerfil as origen,
        cp.nit,
        DATE_FORMAT(cp.fnotificacionBRegistro, '%d/%m/%Y') fnotificacionBRegistro, 
        tbr.RRBRegistro,
        case 
                when vf.VINCULO_0='C' then 'CONYUGE'
                when vf.VINCULO_0='G' then 'MADRE GESTANTE DE HIJO EXTRAMATRIMONIAL'  
                when vf.VINCULO_0='H' then 'HIJO'
                when vf.VINCULO_0='I' then 'HIJO MAYOR DE EDAD INCAPACITADO'  
                when vf.VINCULO_0='N' then 'CONCUBINA'
                when vf.VINCULO_0='T' then 'TITULAR'  
                end as VINCULO_0_DES, 
				vf.DNI_DH_0, 
                vf.APELLIDO_NOMBRE_0,
                DATE_FORMAT(pvf.InicioPCalificar1, '%d/%m/%Y') InicioPFinalDh,                    
                DATE_FORMAT(pvf.FinPCalificar1, '%d/%m/%Y') FinPFinalDh,
        
		cp.observaciones
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_sccmvtft vf on ai.iddim_aseguradoindevido=vf.iddim_aseguradoindevido                
		left join dim_pacalificar_new_dh pvf on vf.SCCMVTFT=pvf.SCCMVTFT     
        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
        left join tipoverificacionperfil tpf on cp.idTVerificacion=tpf.idTVerificacion and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil 
        left join tipoverificacionperfil tvpo on cp.origencp=tvpo.idTVerificacionPerfil
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario=du.iddim_usuario

        left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
        where month(cp.femisionBRegistro) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(cp.femisionBRegistro)='$ano' 
        and ai.idDIM_Oficina='$idOficinaUsuario'
        and cp.idTEstadoActual=3
        order by cp.iddim_CPosterior, vf.DNI_DH_0, pvf.InicioPCalificar1 ASC";
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
//        $objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
//                ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
//                ->setTitle("Reporte Excel con PHP y MySQL")
//                ->setSubject("Reporte Excel con PHP y MySQL")
//                ->setDescription("Reporte de Control Posterior Emision de Baja")
//                ->setKeywords("Por Emision de Baja de la OSPE")
//                ->setCategory("Reporte excel");

//        $tituloReporte = "RELACION DE CONTROL POSTERIOR POR EMISION DE BAJA";
        $titulosColumnas = array('UCF/OSPE',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',          
            'ORIGEN DEL'.PHP_EOL.'CONTROL'.PHP_EOL.'    POSTERIOR',
            'PERFIL DE LA DATA', 
            
            'NUMERO DE RUC -'.PHP_EOL.'ENTIDAD'.PHP_EOL.'EMPLEADORA',
            'RAZON SOCIAL - EMPLEADOR',
            'ASEGURADO'.PHP_EOL.'TITULAR=01'.PHP_EOL.'DERECHO HABIENTE=02', 
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'DEL TITULAR', 
            'TITULAR/DERECHO HABIENTE'.PHP_EOL.'APELLIDOS Y NOMBRES',        
            
            'VINCULO DH',
            'DNI DH',
            'APELLIDOS Y NOMBRES'.PHP_EOL.'DERECHOHABIENTE',
           'INICIO DEL'.PHP_EOL.'PERIODO DE'.PHP_EOL.'BAJA -'.PHP_EOL.'DH O'.PHP_EOL.'(FECHA)',
            'FIN'.PHP_EOL.'DEL PERIODO'.PHP_EOL.'DE BAJA -'.PHP_EOL.'DH O'.PHP_EOL.'(FECHA)', 
            
            'ESTADO ACTUAL',            
            'NIT',            
            'NUMERO DE'.PHP_EOL.'RESOLUCION DE'.PHP_EOL.'BAJA DE REGISTRO',
            'EMISION'.PHP_EOL.'DE BAJA DE'.PHP_EOL.'REGISTRO'.PHP_EOL.'(FECHA)',
            
            
            
            'OBSERVACIONES DE'.PHP_EOL.'LA OSPE',
            
            'TERMINADO'.PHP_EOL.'(FECHA Y HORA)',
            'CORREO',
            'CALIFICACION',
            'OBSERVACIONES DE'.PHP_EOL.'LA SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'
            );

//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A1:AC1');

        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
//                ->setCellValue('A1', $tituloReporte)
                ->setCellValue('A1', $titulosColumnas[0])
                ->setCellValue('B1', $titulosColumnas[1])
                ->setCellValue('C1', $titulosColumnas[2])
                ->setCellValue('D1', $titulosColumnas[3])
                ->setCellValue('E1', $titulosColumnas[4])
                ->setCellValue('F1', $titulosColumnas[5])                
                ->setCellValue('G1', $titulosColumnas[6])
                ->setCellValue('H1', $titulosColumnas[7])
                ->setCellValue('I1', $titulosColumnas[8])                
                ->setCellValue('J1', $titulosColumnas[9])
                
                ->setCellValue('K1', $titulosColumnas[10])                
                ->setCellValue('L1', $titulosColumnas[11])
                ->setCellValue('M1', $titulosColumnas[12])
                ->setCellValue('N1', $titulosColumnas[13])
                ->setCellValue('O1', $titulosColumnas[14])
                ->setCellValue('P1', $titulosColumnas[15])
                ->setCellValue('Q1', $titulosColumnas[16])                
                ->setCellValue('R1', $titulosColumnas[17])
                ->setCellValue('S1', $titulosColumnas[18])
                ->setCellValue('T1', $titulosColumnas[19])
                ->setCellValue('U1', $titulosColumnas[20])
                
                ->setCellValue('V1', $titulosColumnas[21])
                ->setCellValue('W1', $titulosColumnas[22])
                ->setCellValue('X1', $titulosColumnas[23]);
           
               

        //Se agregan los datos de los alumnos
        $i = 2;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['TVerificacion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('C' . $i, $fila['origen'])
                    ->setCellValue('D' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('E' . $i, $fila['RUC'])  
                    ->setCellValue('F' . $i, $fila['nomEmpresa']) 
                    ->setCellValueExplicit('G' . $i, $fila['TipoAtencion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValueExplicit('H' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('I' . $i, $fila['nombres'])

                    
                    ->setCellValue('J' . $i, $fila['VINCULO_0_DES'])
                    ->setCellValueExplicit('K' . $i, $fila['DNI_DH_0'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('L' . $i, $fila['APELLIDO_NOMBRE_0'])
                    ->setCellValue('M' . $i, $fila['InicioPFinalDh'])                    
                    ->setCellValue('N' . $i, $fila['FinPFinalDh'])
                    
                    ->setCellValue('O' . $i, $fila['EstadoActual'])    
                    ->setCellValue('P' . $i, $fila['nit'])
                    ->setCellValue('Q' . $i, $fila['nResBRegistro'])
                    ->setCellValue('R' . $i, $fila['femisionBRegistro']) 
                    
                    
                    ->setCellValue('S' . $i, $fila['observaciones'])
                    
                    ->setCellValue('T' . $i, $fila['fCreacionTerminado'])
                    ->setCellValue('U' . $i, '')
                    ->setCellValue('V' . $i, '')
                    ->setCellValue('W' . $i, '')
                    ->setCellValue('X' . $i, '');
            $i++;
        }

//        $estiloTituloReporte = array(
//            'font' => array(
//                'name' => 'Verdana',
//                'bold' => true,
//                'italic' => false,
//                'strike' => false,
//                'size' => 16,
//                'color' => array(
//                    'rgb' => 'FFFFFF'
//                )
//            ),
//            'fill' => array(
//                'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                'color' => array('argb' => '000000')
//            ),
//            'borders' => array(
//                'allborders' => array(
//                    'style' => PHPExcel_Style_Border::BORDER_NONE
//                )
//            ),
//            'alignment' => array(
//                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
//                'rotation' => 0,
//                'wrap' => TRUE
//            )
//        );

       $estiloTituloColumnas = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'ffffff'
                ),
                'endcolor' => array(
                    'argb' => 'ffffff'
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
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'left' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
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
       
       
         $estiloTituloColumnas1 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'ffffff'
                ),
                'endcolor' => array(
                    'argb' => 'ffffff'
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
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'left' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
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
         
          $estiloTituloColumnas2 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'ffffff'
                ),
                'endcolor' => array(
                    'argb' => 'ffffff'
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
                ),
                
                 'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'left' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
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
                        ),
                     'top' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '3a2a47'
                            )
                        ),
                         'right' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '3a2a47'
                            )
                        ),
                        
                         'bottom' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '3a2a47'
                            )
                        )
                    )      
        ));

//        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);        
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->getStyle('K1:O1')->applyFromArray($estiloTituloColumnas2);
        $objPHPExcel->getActiveSheet()->getStyle('P1:X1')->applyFromArray($estiloTituloColumnas1);
//        $objPHPExcel->getActiveSheet()->getStyle('X1:AC1')->applyFromArray($estiloTituloColumnas2);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:X" . ($i - 1));

        for ($i = 'A'; $i !=='X'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('BAJAS EMITIDAS');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ReporteBajasEmitidas.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}

?>