<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscartodoingresadoCP'])) {
    
    $dateiniciot = $_POST['dateiniciot']; //1
    $datefint = $_POST['datefint'];
    $idOficinaUsuario = $_POST['idDIM_Oficina'];    

    
    $consulta="SELECT cp.iddim_CPosterior,
                concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                cp.idTVerificacion,
                cp.idTVerificacionPerfil,
                tvp.VerificacionPerfil,
                tea.EstadoActual,
                cp.nResBRegistro,
                cp.nombrePDF,
                cp.ruta_pdf,
                case 
                when cp.idTGeneraBaja='1' then 'SI'
                when cp.idTGeneraBaja='2' then 'NO'
                when cp.idTGeneraBaja='4' then '--'
                end as GeneraBaja,                     
                ai.RUC, ai.nomEmpresa,                                                     
                ai.dni_t, concat_ws(' ',ai.paterno_t,ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,
                ai.titularAcredita_dni,
                ai.titularAcredita_nombres,
                ai.titularAcredita_vinculo,
                tvin.descripcion,
                cp.observaciones,
                concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
                cp.fCreacion,
                cp.fCreacionTerminado,
                cp.fActualizacion,
                cp.origencp,
                tvpo.VerificacionPerfil as origen,
                cp.nit,
                cp.femisionBRegistro,
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
                cp.fnotificacionBRegistro,
                tbr.RRBRegistro,
                cp.ncartafinanza,
                cp.fecartafinanza,
                
                dh.VINCULO_0,
                dh.DNI_DH_0,
                dh.APELLIDO_NOMBRE_0,
                pdh.InicioPCalificar1 as IniDh1, pdh.FinPCalificar1 as FinDh1,  
                pdh.InicioPCalificar2 as IniDh2, pdh.FinPCalificar2 as FinDh2, 
                pdh.InicioPCalificar3 as IniDh3, pdh.FinPCalificar3 as FinDh3, 
                pdh.InicioPCalificar4 as IniDh4, pdh.FinPCalificar4 as FinDh4, 
                pdh.InicioPCalificar5 as IniDh5, pdh.FinPCalificar5 as FinDh5,
                pdh.InicioPFinal, pdh.FinPFinal
                
                FROM dim_cposterior cp
                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                
                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
                left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
                left join dim_usuario usu on cp.idtusuario=usu.iddim_usuario
                left join tipoverificacionperfil tvp on cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil
                left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
                left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
                left join tipoverificacionperfil tvpo on cp.origencp=tvpo.idTVerificacionPerfil
                left join tipovinculo tvin on ai.titularAcredita_vinculo=tvin.VTFCVFA
                left join dim_sccmvtft dh on ai.iddim_aseguradoindevido = dh.iddim_aseguradoindevido
                left join dim_pacalificar_dh pdh on dh.SCCMVTFT=pdh.dim_SCCMVTFT               

                where (DATE(cp.fCreacion) BETWEEN '$dateiniciot' and '$datefint')
                and ai.idDIM_Oficina='$idOficinaUsuario'
                order by cp.iddim_CPosterior desc";
    $resultado = $conexionmysql->query($consulta);
    if ($resultado->num_rows > 0) {

        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli')
        {
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
                ->setDescription("Reporte de Control Posterior Terminados")
                ->setKeywords("Terminados de la OSPE")
                ->setCategory("Reporte excel");

        $tituloReporte = "RELACION DE CONTROL POSTERIOR TERMINADOS DE LA OSPE";
        $titulosColumnas = array('OFICINA',                        
            'RUC',            
            'NOM. EMPL.',
            'DNI'.PHP_EOL.'ASEG. INDE.', 
            'APELLIDOS Y NOMBRES'.PHP_EOL.'ASEGURADO INDEBIDO',
            'TIPO DE'.PHP_EOL.'VINCUO',
            'DNI TITULAR', 
            'APELLIDOS Y NOMBRES'.PHP_EOL.'ASEGURADO TITULAR',
            
            'PERFIL DATA', 
            'ORIGEN C.P.',
            
            'ESTADO ACTUAL',
            'GENERO BAJA',            
            'NIT',
            'FECHA EMISION'.PHP_EOL.'BAJA DE REGISTRO',            
            'N° RESOLUCION DE BAJA DE REGISTRO',
            'PERIODO'.PHP_EOL.'INICIO 1', 'PERIODO'.PHP_EOL.'FIN 1', 
            'PERIODO'.PHP_EOL.'INICIO 2', 'PERIODO'.PHP_EOL.'FIN 2',
            'PERIODO'.PHP_EOL.'INICIO 3', 'PERIODO'.PHP_EOL.'FIN 3',
            'PERIODO'.PHP_EOL.'INICIO 4', 'PERIODO'.PHP_EOL.'FIN 4',
            'PERIODO'.PHP_EOL.'INICIO 5', 'PERIODO'.PHP_EOL.'FIN 5',
            'PERIODO'.PHP_EOL.'INICIO 6', 'PERIODO'.PHP_EOL.'FIN 6',
            'PERIODO'.PHP_EOL.'INICIO 7', 'PERIODO'.PHP_EOL.'FIN 7',
            'PERIODO'.PHP_EOL.'INICIO 8', 'PERIODO'.PHP_EOL.'FIN 8',
            'PERIODO'.PHP_EOL.'INICIO 9', 'PERIODO'.PHP_EOL.'FIN 9',
            'PERIODO'.PHP_EOL.'INICIO 10', 'PERIODO'.PHP_EOL.'FIN 10',     
            'PERIODO'.PHP_EOL.'INI TOTAL', 'PERIODO'.PHP_EOL.'FIN TOTAL',   
            'FECHA NOTIFICACION BAJA',
            'ESTADO DE LA BAJA DE REGISTRO',
            'CARTA RED/FINANZAS',
            'FECHA RED/FINANZAS',
            'VINCULO DH',
            'DNI DH',
            'APELLIDOS Y NOMBRES'.PHP_EOL.'DERECHOHABIENTE',
            'PERIODO DH'.PHP_EOL.'INICIO 1', 'PERIODO DH'.PHP_EOL.'FIN 1', 
            'PERIODO DH'.PHP_EOL.'INICIO 2', 'PERIODO DH'.PHP_EOL.'FIN 2',
            'PERIODO DH'.PHP_EOL.'INICIO 3', 'PERIODO DH'.PHP_EOL.'FIN 3',
            'PERIODO DH'.PHP_EOL.'INICIO 4', 'PERIODO DH'.PHP_EOL.'FIN 4',
            'PERIODO DH'.PHP_EOL.'INICIO 5', 'PERIODO DH'.PHP_EOL.'FIN 5',           
            
            'OBSERVACIONES'
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
        //$i = 4;
        $i = 4;

        
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)              
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValue('B' . $i, $fila['RUC'])  
                    ->setCellValue('C' . $i, $fila['nomEmpresa'])                        
                    ->setCellValueExplicit('D' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('E' . $i, $fila['nombres'])
                    ->setCellValue('F' . $i, $fila['descripcion'])
                    ->setCellValueExplicit('G' . $i, $fila['titularAcredita_dni'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('H' . $i, $fila['titularAcredita_nombres'])
                    
                    ->setCellValue('I' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('J' . $i, $fila['origen'])
                    ->setCellValue('K' . $i, $fila['EstadoActual'])
                    ->setCellValue('L' . $i, $fila['GeneraBaja'])
                    ->setCellValueExplicit('M' . $i, $fila['nit'], PHPExcel_Cell_DataType::TYPE_STRING)                 
                    ->setCellValue('N' . $i, $fila['femisionBRegistro'])
                    ->setCellValue('O' . $i, $fila['nResBRegistro'])                    
                    ->setCellValue('P' . $i, $fila['InicioPCalificar1'])
                    ->setCellValue('Q' . $i, $fila['FinPCalificar1'])
                    ->setCellValue('R' . $i, $fila['InicioPCalificar2'])
                    ->setCellValue('S' . $i, $fila['FinPCalificar2'])
                    ->setCellValue('T' . $i, $fila['InicioPCalificar3'])
                    ->setCellValue('U' . $i, $fila['FinPCalificar3'])
                    ->setCellValue('V' . $i, $fila['InicioPCalificar4'])
                    ->setCellValue('W' . $i, $fila['FinPCalificar4'])
                    ->setCellValue('X' . $i, $fila['InicioPCalificar5'])
                    ->setCellValue('Y' . $i, $fila['FinPCalificar5'])
                    ->setCellValue('Z' . $i, $fila['InicioPCalificar6'])
                    ->setCellValue('AA' . $i, $fila['FinPCalificar6'])
                    ->setCellValue('AB' . $i, $fila['InicioPCalificar7'])
                    ->setCellValue('AC' . $i, $fila['FinPCalificar7'])
                    ->setCellValue('AD' . $i, $fila['InicioPCalificar8'])
                    ->setCellValue('AE' . $i, $fila['FinPCalificar8'])
                    ->setCellValue('AF' . $i, $fila['InicioPCalificar9'])
                    ->setCellValue('AG' . $i, $fila['FinPCalificar9'])
                    ->setCellValue('AH' . $i, $fila['InicioPCalificar10'])
                    ->setCellValue('AI' . $i, $fila['FinPCalificar10'])                    
                    ->setCellValue('AJ' . $i, $fila['InicioPFinal'])
                    ->setCellValue('AK' . $i, $fila['FinPFinal'])                    
                    ->setCellValue('AL' . $i, $fila['fnotificacionBRegistro'])
                    ->setCellValue('AM' . $i, $fila['RRBRegistro'])
                    ->setCellValue('AN' . $i, $fila['ncartafinanza'])                    
                    ->setCellValue('AO' . $i, $fila['fecartafinanza'])
                    
                    ->setCellValue('AP' . $i, $fila['VINCULO_0'])
                    ->setCellValue('AQ' . $i, $fila['DNI_DH_0']) 
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
                    
                    ->setCellValue('BC' . $i, $fila['observaciones']);
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
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'FFE699'
                ),
                'endcolor' => array(
                    'argb' => 'FFE699'
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
                    'rgb' => '00B0F0'
                ),
                'endcolor' => array(
                    'argb' => '00B0F0'
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
                    'rgb' => '92D050'
                ),
                'endcolor' => array(
                    'argb' => '92D050'
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
          
         $estiloTituloColumnas3 = array(
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
                    'rgb' => 'FFB9DC'
                ),
                'endcolor' => array(
                    'argb' => 'FFB9DC'
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

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);        
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->getStyle('I3:J3')->applyFromArray($estiloTituloColumnas1);
        $objPHPExcel->getActiveSheet()->getStyle('K3:AO3')->applyFromArray($estiloTituloColumnas2);
        $objPHPExcel->getActiveSheet()->getStyle('AP3:BC3')->applyFromArray($estiloTituloColumnas3);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:BC" . ($i - 1));


        for ($i = 'A'; $i !== 'BC'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('TERMINADOS');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ReportedeTerminados.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>