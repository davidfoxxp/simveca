<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscarfirmesyconsentidas'])) {
    
    $dateinicioF = $_POST['dateinicio']; //1
    $datefinF = $_POST['datefin'];
    $idOficinaUsuario = $_POST['idDIM_Oficina'];  
    $oficinano=$_POST['oficinano'];
//    $iddimoficina= $_POST['iddimoficina'];    
    
    $consulta=  "SELECT cp.iddim_CPosterior,
                concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
                cp.idTVerificacion,
                tvv.Verificacion,
                cp.nResBRegistro,                
                DATE_FORMAT(cp.femisionBRegistro, '%d/%m/%Y') femisionBRegistro,   
                DATE_FORMAT(cp.fnotificacionBRegistro, '%d/%m/%Y') fnotificacionBRegistro,   
                p.fpublicacion_p,
                p.fpublicacion_e,
                p.fpublicacion_c,
                case 
                when ai.TipoRegistro='1' then 'ASEGURADO'
                when ai.TipoRegistro='2' then 'EMPLEADOR'                
                end as TipoRegistro_des,   
                
                case 
                when ai.idTipoTrabajador='1' then 'RG - TRABAJADOR REGULAR'
                when ai.idTipoTrabajador='119' then 'TH - TRABAJADOR DEL HOGAR'
                when ai.idTipoTrabajador='201' then 'AD - AGRARIO DEPENDIENTE'
                when ai.idTipoTrabajador='203' then 'AI - AGRARIO INDEPENDIENTE'
                when ai.idTipoTrabajador='805' then 'PP - PESQUERO ARTESANAL'
                end as TipoTrabajador_des,               
                            
                case 
                when ai.idTipoAtencion='1' then 'TITULAR'
                when ai.idTipoAtencion='2' then 'DERECHO HABIENTE'                
                end as TipoAtencion_des,     
                
                ai.RUC, 
                ai.nomEmpresa, 
                ai.dni_t,                
                ai.paterno_t,
                concat_ws(' ',ai.materno_t,ai.casada_t)as materno_t,  
                concat_ws(' ',ai.nombre1_t,ai.nombre2_t) as asegurado,
                DATE_FORMAT(ai.fechanacimiento, '%d/%m/%Y') fechanacimiento,   

                cp.nombrePDF,
                cf.ncartafinanza1,  
                
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
                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina     
                left join tipoverificacion tvv on cp.idTVerificacion=tvv.idTVerificacion                
                left join dim_publicacion p on cp.nResBRegistro = p.resolucionpublicada
                left join dim_cfinanzas cf on cp.iddim_CPosterior=cf.iddim_CPosterior
                left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil    
                where (DATE(cp.fconstanciaAcFirme) BETWEEN '$dateinicioF' and '$datefinF')
                and tvp.idTVerificacion='1'
                and cp.idTEstadoActual='3' 
                and cp.idTRRBRegistro=1
                and ai.idDIM_Oficina='$idOficinaUsuario'and cp.ruta_pdf is not null            
                and not cp.idtusuario_s=1
                order by cp.iddim_CPosterior, vf.DNI_DH_0, pvf.InicioPCalificar1 asc";
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
                ->setDescription("Reporte de Control Posterior FIRMES Y CONSENTIDAS")
                ->setKeywords("Firmes y COnsentidads de la OSPE")
                ->setCategory("Reporte excel");

        $tituloReporte = "RELACION DE CONTROL POSTERIOR FIRMES Y CONSENTIDAS DE LA OSPE".$oficinano;
        $inicio = strftime("%d-%m-%Y", strtotime($dateinicioF));
        $fin = strftime("%d-%m-%Y", strtotime($datefinF));
        $fechainir="DESDE ".$inicio." HASTA ".$fin;
        $titulosColumnas = array('UCF/OSPE'.PHP_EOL.'(CODIGOS)',
            'PROCESO'.PHP_EOL.'CONTROL POST=01'.PHP_EOL.'VERIFICACION=02',
            
            'NUMERO DE RESOLUCION DE BAJA',
            'FECHA DE'.PHP_EOL.'EMISION DE'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE BAJA'.PHP_EOL.'(dd/mm/yyyy)',
            'FECHA DE'.PHP_EOL.'NOTIFICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'PERSONAL'.PHP_EOL.'(dd/mm/yyyy)',
            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA - EL'.PHP_EOL.'PERUANO'.PHP_EOL.'(dd/mm/yyyy)',
            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'WEB DE'.PHP_EOL.'ESSALUD'.PHP_EOL.'(dd/mm/yyyy)',
            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'DIARIO DE'.PHP_EOL.'MAYOR'.PHP_EOL.'CIRCULACION'.PHP_EOL.'(dd/mm/yyyy)',
            'TIPO DE'.PHP_EOL.'REGISTRO',
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'RAZON SOCIAL -'.PHP_EOL.'EMPLEADOR',
            'TIPO DE'.PHP_EOL.'TRABAJADOR',
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            'TIPO DE'.PHP_EOL.'ASEGURADO',
            'APELLIDO PATERNO -'.PHP_EOL.'ASEGURADO',
            'APELLIDO MATERNO -'.PHP_EOL.'ASEGURADO',
            'NOMBRES -'.PHP_EOL.'ASEGURADO',
            'FECHA DE'.PHP_EOL.'NACIMIENTO-'.PHP_EOL.'ASEGURADO'.PHP_EOL.'(dd/mm/yyyy)',                                   
            
            'VINCULO DH',
            'DNI DH',
            'APELLIDOS Y NOMBRES'.PHP_EOL.'DERECHOHABIENTE',
            'FECHA DE'.PHP_EOL.'INICIO DEL'.PHP_EOL.'PERIODO DE'.PHP_EOL.'BAJA -'.PHP_EOL.'DH O'.PHP_EOL.'(dd/mm/yyyy)',
            'FECHA DE FIN'.PHP_EOL.'DEL PERIODO'.PHP_EOL.'DE BAJA -'.PHP_EOL.'DH O'.PHP_EOL.'(dd/mm/yyyy)',   
            
            'NOMBRE - ARCHIVO PDF - RES BAJA',
            'CARTA A FINANZAS',
            
            'OBSERVACIONES DE'.PHP_EOL.'LA OSPE',
            'CALIFICACION'.PHP_EOL.'SGVCA',
            'COMENTARIO'.PHP_EOL.'SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'.PHP_EOL.'SGVCA',
            );

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:AE1');
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A2:AE2');
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', $tituloReporte)
                ->setCellValue('A2', $fechainir)
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
                
                ->setCellValue('AE3', $titulosColumnas[30]);
                
        //Se agregan los datos de los alumnos
        //$i = 4;
        $i = 4;

        
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValue('B' . $i, $fila['Verificacion'])  
                    ->setCellValue('C' . $i, $fila['nResBRegistro'])                    
                    ->setCellValue('D' . $i, $fila['femisionBRegistro'])
                    ->setCellValue('E' . $i, $fila['fnotificacionBRegistro'])
                    
                    ->setCellValue('F' . $i, $fila['fpublicacion_p'])
                    ->setCellValue('G' . $i, $fila['fpublicacion_e'])
                    ->setCellValue('H' . $i, $fila['fpublicacion_c'])
                    
                    ->setCellValue('I' . $i, $fila['TipoRegistro_des'])  
                    
                    ->setCellValue('J' . $i, 'RUC')                    
                    ->setCellValue('K' . $i, $fila['RUC'])
                    ->setCellValue('L' . $i, $fila['nomEmpresa'])
                    
                    ->setCellValue('M' . $i, $fila['TipoTrabajador_des'])
                    
                    ->setCellValue('N' . $i, 'DNI')
                    ->setCellValueExplicit('O' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    
                    ->setCellValue('P' . $i, $fila['TipoAtencion_des'])
                    
                    ->setCellValue('Q' . $i, $fila['paterno_t'])
                    ->setCellValue('R' . $i, $fila['materno_t'])
                    ->setCellValue('S' . $i, $fila['asegurado'])
                    ->setCellValue('T' . $i, $fila['fechanacimiento'])
                    
                    
                    
                    ->setCellValue('U' . $i, $fila['VINCULO_0_DES'])
                    ->setCellValueExplicit('V' . $i, $fila['DNI_DH_0'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('W' . $i, $fila['APELLIDO_NOMBRE_0'])
                    ->setCellValue('X' . $i, $fila['InicioPFinalDh'])                    
                    ->setCellValue('Y' . $i, $fila['FinPFinalDh'])
                    
                    ->setCellValueExplicit('Z' . $i, $fila['nombrePDF'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('AA' . $i, $fila['ncartafinanza1'])
                    
                    ->setCellValue('AB' . $i, $fila['observaciones'])
                    
                    ->setCellValue('AC' . $i, '')
                    ->setCellValue('AD' . $i, '')
                    ->setCellValue('AE' . $i, '');
            
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
        $estiloTituloReporte1 = array(
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
        
        $estiloTituloColumnas55 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9, 
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'ffff66'
                ),
                'endcolor' => array(
                    'argb' => 'ffff66'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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

 $estiloTituloColumnas = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '60497A'
                ),
                'endcolor' => array(
                    'argb' => '60497A'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '403151'
                ),
                'endcolor' => array(
                    'argb' => '403151'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '60497A'
                ),
                'endcolor' => array(
                    'argb' => '60497A'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '403151'
                ),
                'endcolor' => array(
                    'argb' => '403151'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
  $estiloTituloColumnas4 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '60497A'
                ),
                'endcolor' => array(
                    'argb' => '60497A'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
   $estiloTituloColumnas5 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => '963634'
                ),
                'endcolor' => array(
                    'argb' => '963634'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
     $estiloTituloColumnas6 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'E26B0A'
                ),
                'endcolor' => array(
                    'argb' => 'E26B0A'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
      $estiloTituloColumnas7 = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 9,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => array(
                    'rgb' => 'FFFF00'
                ),
                'endcolor' => array(
                    'argb' => 'FFFF00'
                )
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
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
        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte1);
        $objPHPExcel->getActiveSheet()->getStyle('A3:B3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->getStyle('C3:H3')->applyFromArray($estiloTituloColumnas1);
        $objPHPExcel->getActiveSheet()->getStyle('I3:M3')->applyFromArray($estiloTituloColumnas2);
        $objPHPExcel->getActiveSheet()->getStyle('N3:T3')->applyFromArray($estiloTituloColumnas3);
        $objPHPExcel->getActiveSheet()->getStyle('Z3:Z3')->applyFromArray($estiloTituloColumnas5);
        $objPHPExcel->getActiveSheet()->getStyle('AA3:AA3')->applyFromArray($estiloTituloColumnas4);

        $objPHPExcel->getActiveSheet()->getStyle('U3:Y3')->applyFromArray($estiloTituloColumnas6);
        $objPHPExcel->getActiveSheet()->getStyle('AB3:AB3')->applyFromArray($estiloTituloColumnas3);
        $objPHPExcel->getActiveSheet()->getStyle('AC3:AE3')->applyFromArray($estiloTituloColumnas7);
//        $objPHPExcel->getActiveSheet()->getStyle('AE3:AG3')->applyFromArray($estiloTituloColumnas55);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:AE" . ($i - 1));

        for ($i = 'A'; $i !== 'AE'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('FIRMESYCONSENTIDOS');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_CP_BFyC_SIMVECA.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>