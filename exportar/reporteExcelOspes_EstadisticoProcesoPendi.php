<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
    
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];

//    $consulta = "SELECT cp.iddim_CPosterior,
//        concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
//        case 
//        when cp.idTVerificacion='1' then 'CONTROL POSTERIOR'
//        when cp.idTVerificacion='2' then 'VERIFICACION'       
//        end as TVerificacion,
//        
//        cp.femisionBRegistro,
//        
//        cp.idTVerificacionPerfil,
//        tpf.VerificacionPerfil,
//        cp.idTEstadoActual,  
//        cp.nResBRegistro,
//        cp.nombrePDF,
//        cp.dia_pdf,
//        case 
//        when cp.idTGeneraBaja='1' then 'SI'
//        when cp.idTGeneraBaja='2' then 'NO'
//        when cp.idTGeneraBaja='4' then '--'
//        end as GeneraBaja,                     
//        ai.RUC, ai.nomEmpresa,
//        ai.titularAcredita_dni, 
//        ai.titularAcredita_nombres,
//        ai.titularAcredita_vinculo,
//        ai.dni_t, concat_ws(' ',ai.paterno_t, ai.materno_t,ai.nombre1_t,ai.nombre2_t)as nombres,
//        pc.InicioPCalificar1, pc.FinPCalificar1,  
//        pc.InicioPCalificar2, pc.FinPCalificar2, 
//        pc.InicioPCalificar3, pc.FinPCalificar3, 
//        pc.InicioPCalificar4, pc.FinPCalificar4, 
//        pc.InicioPCalificar5, pc.FinPCalificar5,
//        pc.InicioPCalificar6, pc.FinPCalificar6, 
//        pc.InicioPCalificar7, pc.FinPCalificar7, 
//        pc.InicioPCalificar8, pc.FinPCalificar8, 
//        pc.InicioPCalificar9, pc.FinPCalificar9, 
//        pc.InicioPCalificar10, pc.FinPCalificar10,
//        pc.InicioPFinal, pc.FinPFinal,
//        cp.observaciones,
//        vf.VINCULO_0,
//        vf.DNI_DH_0, 
//        vf.APELLIDO_NOMBRE_0,
//        pvf.InicioPCalificar1 as IniDh1, pvf.FinPCalificar1 as FinDh1,  
//        pvf.InicioPCalificar2 as IniDh2, pvf.FinPCalificar2 as FinDh2, 
//        pvf.InicioPCalificar3 as IniDh3, pvf.FinPCalificar3 as FinDh3, 
//        pvf.InicioPCalificar4 as IniDh4, pvf.FinPCalificar4 as FinDh4, 
//        pvf.InicioPCalificar5 as IniDh5, pvf.FinPCalificar5 as FinDh5,
//        tea.EstadoActual,
//        tp.Verificacion, 
//        tpf.VerificacionPerfil,
//        cp.fCreacionTerminado,
//        cp.fCreacion,
//        cp.idtusuario,
//        concat(du.pape,' ',du.sape,' ',du.pnom,' ',du.snom)as nombresUsuario,
//        CASE 
//        WHEN CP.femisionBRegistro>='2018-09-01' AND CP.femisionBRegistro<='2018-09-30' THEN '2018_SETIEMBRE'
//        WHEN CP.femisionBRegistro>='2018-10-01' AND CP.femisionBRegistro<='2018-10-31' THEN '2018_OCTUBRE'
//        WHEN CP.femisionBRegistro>='2018-11-01' AND CP.femisionBRegistro<='2018-11-30' THEN '2018_NOVIEMBRE'
//        WHEN CP.femisionBRegistro>='2018-12-01' AND CP.femisionBRegistro<='2018-12-31' THEN '2018_DICIEMBRE'
//        WHEN CP.femisionBRegistro>='2019-01-01' AND CP.femisionBRegistro<='2019-01-31' THEN '2019_ENERO'
//        END AS PERIODO,
//        tvin.descripcion,
//        tvpo.VerificacionPerfil as origen,
//        cp.nit,
//        cp.fnotificacionBRegistro,
//        tbr.RRBRegistro,
//        cp.ncartafinanza,
//        cp.fecartafinanza
//        FROM dim_cposterior cp
//        		               
//
//        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
//        left join dim_sccmvtft vf on ai.iddim_aseguradoindevido=vf.iddim_aseguradoindevido
//        left join dim_pacalificar_dh pvf on vf.SCCMVTFT=pvf.dim_SCCMVTFT
//        left join dim_pacalificar pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido        
//        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
//        left join tipoverificacionperfil tpf on cp.idTVerificacion=tpf.idTVerificacion and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil   
//        left join tipoverificacionperfil tvpo on cp.origencp=tvpo.idTVerificacionPerfil AND tvpo.idTVerificacion='1'
//        
//        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
//        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
//        left join dim_usuario du on cp.idtusuario=du.iddim_usuario
//        LEFT JOIN DIM_USUARIO DUS ON CP.IDTUSUARIO_S=DUS.IDDIM_USUARIO
//        left join dim_cfinanzas df ON CP.IDDIM_CPOSTERIOR=df.IDDIM_CPOSTERIOR
//        left join tipovinculo tvin on ai.titularAcredita_vinculo=tvin.VTFCVFA
//        left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
//        where (DATE(cp.fCreacion) BETWEEN '$dateinicio' and '$datefin')
//        and not cp.idTEstadoActual=3
//        and ai.idDIM_Oficina in ($idDIM_Oficina)
//        order by cp.iddim_CPosterior asc";
    
    
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
        DATE_FORMAT(cp.femisionBRegistro, '%d/%m/%Y') femisionBRegistro, 
        cp.nombrePDF,
        DATE_FORMAT(cp.dia_pdf, '%d/%m/%Y') dia_pdf,   

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
		DATE_FORMAT(pc.InicioPCalificar1, '%d/%m/%Y') InicioPFinal,                    
		DATE_FORMAT(pc.FinPCalificar1, '%d/%m/%Y') FinPFinal, 

        tea.EstadoActual,
        tp.Verificacion, 
        tpf.VerificacionPerfil,
                DATE_FORMAT(cp.fCreacionTerminado, '%d/%m/%Y') fCreacionTerminado,  

                DATE_FORMAT(cp.fCreacion, '%d/%m/%Y') fCreacion,  

        cp.idtusuario,
        concat(du.pape,' ',du.sape,' ',du.pnom,' ',du.snom)as nombresUsuario,
        tvpo.VerificacionPerfil as origen,
        cp.nit,
        DATE_FORMAT(cp.fnotificacionBRegistro, '%d/%m/%Y') fnotificacionBRegistro, 
        tbr.RRBRegistro,
                cf.ncartafinanza1, 
                DATE_FORMAT(cf.fecartafinanza1, '%d/%m/%Y') fecartafinanza1,  
		cp.observaciones
        FROM dim_cposterior cp
        left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido
        left join dim_pacalificar_new pc on ai.iddim_aseguradoindevido=pc.iddim_aseguradoindevido        
        left join tipoverificacion tp on cp.idTVerificacion=tp.idTVerificacion
        left join tipoverificacionperfil tpf on cp.idTVerificacion=tpf.idTVerificacion and cp.idTVerificacionPerfil=tpf.idTVerificacionPerfil
        left join tipoverificacionperfil tvpo on cp.origencp=tvpo.idTVerificacionPerfil
        left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina          
        left join tipoestadoactual tea on cp.idTEstadoActual=tea.idTEstadoActual
        left join dim_usuario du on cp.idtusuario=du.iddim_usuario
        left join tiporrbregistro tbr on cp.idTRRBRegistro=tbr.idTRRBRegistro
        left join dim_cfinanzas cf on cp.iddim_CPosterior=cf.iddim_CPosterior
        where (DATE(cp.fCreacion) BETWEEN '$dateinicio' and '$datefin')
        and ai.idDIM_Oficina in ($idDIM_Oficina)
        and cp.idTEstadoActual=3
        order by cp.iddim_CPosterior, pc.InicioPCalificar1 ASC";
    
    
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
                ->setDescription("Reporte Estadistico")
                ->setKeywords("reporte Estaditisco")
                ->setCategory("Reporte excel");

        $tituloReporte = "DETALLE DEL ESTADISTICO DE LA OSPE";
        $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
        $fin = strftime("%d-%m-%Y", strtotime($datefin));
        $fechainir="DESDE ".$inicio." HASTA ".$fin;
        $tituloReporte = "RELACION DE CONTROL POSTERIOR POR EMISION DE BAJA";
        $titulosColumnas = array('UCF/OSPE',
            'PROCESO',            
            'ORIGEN DEL'.PHP_EOL.'CONTROL'.PHP_EOL.'    POSTERIOR',
            'PERFIL DE LA DATA', 
            'NUMERO DE RUC -'.PHP_EOL.'ENTIDAD'.PHP_EOL.'EMPLEADORA',
            'RAZON SOCIAL /'.PHP_EOL.'APELLIDOS Y'.PHP_EOL.'NOMBRES -'.PHP_EOL.'ENTIDAD'.PHP_EOL.'EMPLEADORA',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'DEL TITULAR', 
            'APELLIDOS Y'.PHP_EOL.'NOMBRES - TITULAR',            
            'NUMERO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'CONYUGE Y/O'.PHP_EOL.'CONCUBINO', 
            'APELLIDOS Y'.PHP_EOL.'NOMBRES -'.PHP_EOL.'CONYUGE Y/O'.PHP_EOL.'CONCUBINO',            
            'ESTADO ACTUAL',
            
            'NIT',            
            'NUMERO DE'.PHP_EOL.'RESOLUCION DE'.PHP_EOL.'BAJA DE REGISTRO',
            'FECHA EMISION'.PHP_EOL.'DE BAJA DE'.PHP_EOL.'REGISTRO',            
            'FECHA DE INICIO DE'.PHP_EOL.'PERIODO DE BAJA',
            'FECHA DE FIN DE'.PHP_EOL.'PERIODO DE BAJA',   
            'FECHA DE'.PHP_EOL.'NOTIFICACION DE'.PHP_EOL.'BAJA DE REGISTRO',
            'ESTADO DEL ACTO'.PHP_EOL.'LA BAJA DE'.PHP_EOL.'REGISTRO',
            'NUMERO DE CARTA'.PHP_EOL.'A RED/FINANZAS',
            'FECHA DERIVADO A'.PHP_EOL.'RED/FINANZAS',   
            'OBSERVACIONES DE'.PHP_EOL.'LA OSPE',
            
            'MES / AÑO DE'.PHP_EOL.'TERMINO',
            'CORREO',
            'CALIFICACION',
            'OBSERVACIONES DE'.PHP_EOL.'LA SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'
            );

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:Z1');

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
                ->setCellValue('Z3', $titulosColumnas[25]);
               

        //Se agregan los datos de los alumnos
        $i = 4;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValue('B' . $i, $fila['TVerificacion'])
                    ->setCellValue('C' . $i, $fila['origen'])
                    ->setCellValue('D' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('E' . $i, $fila['RUC'])  
                    ->setCellValue('F' . $i, $fila['nomEmpresa'])                        
                    ->setCellValueExplicit('G' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('H' . $i, $fila['nombres'])
                    ->setCellValue('I' . $i,'')
                    ->setCellValue('J' . $i,'') 
                    
                    ->setCellValue('K' . $i, $fila['EstadoActual'])    
                    ->setCellValue('L' . $i, $fila['nit'])
                    ->setCellValue('M' . $i, $fila['nResBRegistro'])
                    ->setCellValue('N' . $i, $fila['femisionBRegistro'])                                     
                    ->setCellValue('O' . $i, $fila['InicioPFinal'])
                    ->setCellValue('P' . $i, $fila['FinPFinal'])                                           
                    ->setCellValue('Q' . $i, $fila['fnotificacionBRegistro'])                    
                    ->setCellValue('R' . $i, $fila['RRBRegistro'])                    
                    ->setCellValue('S' . $i, '')  
                    ->setCellValue('T' . $i, '')                    
                    ->setCellValue('U' . $i, $fila['observaciones'])
                    
                    ->setCellValue('V' . $i, '')
                    ->setCellValue('W' . $i, '')
                    ->setCellValue('X' . $i, '')
                    ->setCellValue('Y' . $i, '')
                    ->setCellValue('Z' . $i, '');
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
                    'rgb' => 'D8E4BC'
                ),
                'endcolor' => array(
                    'argb' => 'D8E4BC'
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
                    'rgb' => '95B3DB'
                ),
                'endcolor' => array(
                    'argb' => '95B3DB'
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->getStyle('K3:U3')->applyFromArray($estiloTituloColumnas1);
        $objPHPExcel->getActiveSheet()->getStyle('V3:Z3')->applyFromArray($estiloTituloColumnas2);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:Z" . ($i - 1));

        for ($i = 'A'; $i !=='Z'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('DETALLE DE ESTADISTICO');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="DETALLE DEL ESTADISTICO.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>