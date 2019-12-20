<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscarfirmesyconsentidasCP'])) {
    
    $dateinicioF = $_POST['dateinicio']; //1
    $datefinF = $_POST['datefin'];
//    $idOficinaUsuario = $_POST['idDIM_Oficina'];    
    $iddimoficina= $_POST['iddimoficina'];    
    $oficinano=$_POST['oficinano'];
    
//    $consulta="SELECT cp.iddim_CPosterior,
//                concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,		
//                cp.idTVerificacion,
//                tvv.Verificacion,
//                cp.nResBRegistro,                
//                DATE_FORMAT(cp.femisionBRegistro, '%d/%m/%Y') femisionBRegistro,   
//                DATE_FORMAT(cp.fnotificacionBRegistro, '%d/%m/%Y') fnotificacionBRegistro,   
//                p.fpublicacion_p,
//                p.fpublicacion_e,
//                p.fpublicacion_c,
//                case 
//                when ai.TipoRegistro='1' then 'ASEGURADO'
//                when ai.TipoRegistro='2' then 'EMPLEADOR'                
//                end as TipoRegistro_des,   
//                
//                case 
//                when ai.idTipoTrabajador='1' then 'RG - TRABAJADOR REGULAR'
//                when ai.idTipoTrabajador='119' then 'TH - TRABAJADOR DEL HOGAR'
//                when ai.idTipoTrabajador='201' then 'AD - AGRARIO DEPENDIENTE'
//                when ai.idTipoTrabajador='203' then 'AI - AGRARIO INDEPENDIENTE'
//                when ai.idTipoTrabajador='805' then 'PP - PESQUERO ARTESANAL'
//                end as TipoTrabajador_des,               
//                            
//                case 
//                when ai.idTipoAtencion='1' then 'TITULAR'
//                when ai.idTipoAtencion='2' then 'DERECHO HABIENTE'                
//                end as TipoAtencion_des,     
//                
//                ai.RUC, 
//                ai.nomEmpresa, 
//                ai.dni_t,                
//                ai.paterno_t,
//                ai.materno_t,
//                concat_ws(' ',ai.nombre1_t,ai.nombre2_t) as asegurado,
//                DATE_FORMAT(ai.fechanacimiento, '%d/%m/%Y') fechanacimiento,   
//
//                cp.nombrePDF,
//                cf.ncartafinanza1,  
//                
//                case 
//                when vf.VINCULO_0='C' then 'CONYUGE'
//                when vf.VINCULO_0='G' then 'MADRE GESTANTE DE HIJO EXTRAMATRIMONIAL'  
//                when vf.VINCULO_0='H' then 'HIJO'
//                when vf.VINCULO_0='I' then 'HIJO MAYOR DE EDAD INCAPACITADO'  
//                when vf.VINCULO_0='N' then 'CONCUBINA'
//                when vf.VINCULO_0='T' then 'TITULAR'  
//                end as VINCULO_0_DES, 
//                
//                vf.DNI_DH_0, 
//                vf.APELLIDO_NOMBRE_0,
//                DATE_FORMAT(pvf.InicioPCalificar1, '%d/%m/%Y') InicioPFinalDh,                    
//                DATE_FORMAT(pvf.FinPCalificar1, '%d/%m/%Y') FinPFinalDh,
//                cp.observaciones
//                FROM dim_cposterior cp
//                left join dim_aseguradoindevido ai on cp.iddim_aseguradoindevido=ai.iddim_aseguradoindevido                  
//                left join dim_sccmvtft vf on ai.iddim_aseguradoindevido=vf.iddim_aseguradoindevido
//		left join dim_pacalificar_new_dh pvf on vf.SCCMVTFT=pvf.SCCMVTFT        
//                left join dim_oficina dof on ai.idDIM_Oficina=dof.idDIM_Oficina     
//                left join tipoverificacion tvv on cp.idTVerificacion=tvv.idTVerificacion                
//                left join dim_publicacion p on cp.nResBRegistro = p.resolucionpublicada
//                left join dim_cfinanzas cf on cp.iddim_CPosterior=cf.iddim_CPosterior
//                left join tipoverificacionperfil tvp on cp.idTVerificacion=tvp.idTVerificacion and cp.idTVerificacionPerfil=tvp.idTVerificacionPerfil  
//                where (DATE(cp.fconstanciaAcFirme) BETWEEN '$dateinicioF' and '$datefinF')
//                and cp.idTEstadoActual='3'
//                and cp.idTRRBRegistro=1
//                and ai.idDIM_Oficina='$iddimoficina' and cp.ruta_pdf is not null
//                and pvf.InicioPCalificar1 is not null                
//                and not cp.idtusuario_s=1
//                order by cp.iddim_CPosterior, vf.DNI_DH_0, pvf.InicioPCalificar1 asc";
    
    
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
        when cp.idTVerificacion='1' then '01'
        when cp.idTVerificacion='2' then '02'       
        end as TVerificacion, 

        case 
        when ai.idTipoAtencion='1' then '01'
        when ai.idTipoAtencion='2' then '02'       
        end as TipoAtencion, 
                
                ai.RUC, 
                ai.nomEmpresa, 
                ai.dni_t,                
                ai.paterno_t,
                ai.materno_t,
                concat_ws(' ',ai.nombre1_t,ai.nombre2_t) as asegurado,
                DATE_FORMAT(ai.fechanacimiento, '%d/%m/%Y') fechanacimiento,  
                
                DATE_FORMAT(cp.factofirme, '%d/%m/%Y') factofirme, 
                DATE_FORMAT(cp.fconstanciaAcFirme, '%d/%m/%Y') fconstanciaAcFirme, 
                                
                DATEDIFF(cp.fconstanciaAcFirme, cp.factofirme) diferenciafechas_act_firme_const,
                
                cp.nombrePDF,
                cf.ncartafinanza1,  
                
                case 
		when cf.ncartafinanza1 IS NOT NULL then 'SI'  
                else 'NO'
		end as prestaciones, 
                
                case 
                when cp.sunat='1' then 'SI'
                when cp.sunat IS NULL then 'NO'                
                end as SUNAT_S, 
                
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
                where (DATE(cp.factofirme) BETWEEN '$dateinicioF' and '$datefinF')
                and tvp.idTVerificacion='1'
                and cp.idTEstadoActual='3' 
                and cp.idTRRBRegistro=1
                and ai.idDIM_Oficina='$iddimoficina' and cp.ruta_pdf is not null            
                and not cp.idtusuario_s=1
                and cp.sunat is null or not cp.sunat in ('1', '2')
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
//        $objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
//                ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
//                ->setTitle("Reporte Excel con PHP y MySQL")
//                ->setSubject("Reporte Excel con PHP y MySQL")
//                ->setDescription("Reporte de Control Posterior FIRMES Y CONSENTIDAS")
//                ->setKeywords("Terminados de la OSPE")
//                ->setCategory("Reporte excel");

//       $tituloReporte = "RELACION DE CONTROL POSTERIOR FIRMES Y CONSENTIDAS POR LA OSPE";
//        $inicio = strftime("%d-%m-%Y", strtotime($dateinicioF));
//        $fin = strftime("%d-%m-%Y", strtotime($datefinF));
//        $fechainir="DESDE ".$inicio." HASTA ".$fin;
        $titulosColumnas = array('UCF/OSPE'.PHP_EOL.'(CODIGOS)',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',
            
            'NUMERO DE RESOLUCION DE BAJA',
            
            'EMISION DE'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE BAJA'.PHP_EOL.'(FECHA)',
            'NOTIFICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'PERSONAL'.PHP_EOL.'(FECHA)',
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA - EL'.PHP_EOL.'PERUANO'.PHP_EOL.'(dd/mm/yyyy)',
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'WEB DE'.PHP_EOL.'ESSALUD'.PHP_EOL.'(dd/mm/yyyy)',
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'DIARIO DE'.PHP_EOL.'MAYOR'.PHP_EOL.'CIRCULACION'.PHP_EOL.'(dd/mm/yyyy)',
            
            'ACTO FIRME'.PHP_EOL.'(FECHA)',
//            'CONSTANCIA DE ACTO FIRME'.PHP_EOL.'(FECHA)',
//            'DIFERENCIAS DE DIA ENTRE EL '.PHP_EOL.'ACTO Y LA CONSTANCIA',
            
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'RAZON SOCIAL -'.PHP_EOL.'EMPLEADOR',
            'ASEGURADO'.PHP_EOL.'TITULAR=01'.PHP_EOL.'DERECHO HABIENTE=02', 
            'TIPO DE'.PHP_EOL.'TRABAJADOR',
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            
            'APELLIDO PATERNO -'.PHP_EOL.'ASEGURADO',
            'APELLIDO MATERNO -'.PHP_EOL.'ASEGURADO',
            'NOMBRES -'.PHP_EOL.'ASEGURADO',
//            'FECHA DE'.PHP_EOL.'NACIMIENTO-'.PHP_EOL.'ASEGURADO'.PHP_EOL.'(dd/mm/yyyy)',                                   
            
            'VINCULO DH',
            'DNI DH',
            'APELLIDOS Y NOMBRES'.PHP_EOL.'DERECHOHABIENTE',
            'INICIO DEL'.PHP_EOL.'PERIODO DE'.PHP_EOL.'BAJA -'.PHP_EOL.'DH'.PHP_EOL.'(FECHA)',
            'FIN'.PHP_EOL.'DEL PERIODO'.PHP_EOL.'DE BAJA -'.PHP_EOL.'DH'.PHP_EOL.'(FECHA)',
            
            'NOMBRE - ARCHIVO PDF - RES BAJA',
            'PRESTACIONES'.PHP_EOL.'(DEPENDE CARTA A FINANZA)',
            'CARTA A FINANZAS',
//            'SUNAT',
            'OBSERVACIONES DE'.PHP_EOL.'LA OSPE',
            'CALIFICACION'.PHP_EOL.'SGVCA',
            'COMENTARIO'.PHP_EOL.'SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'.PHP_EOL.'SGVCA',
            );

//         $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A1:AH1');
//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A2:AH2');
//        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
//                ->setCellValue('A1', $tituloReporte)
//                ->setCellValue('A2', $fechainir)
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
                ->setCellValue('X1', $titulosColumnas[23])                
                ->setCellValue('Y1', $titulosColumnas[24])
                
                ->setCellValue('Z1', $titulosColumnas[25])
                ->setCellValue('AA1', $titulosColumnas[26])
                ->setCellValue('AB1', $titulosColumnas[27]);
//                ->setCellValue('AC1', $titulosColumnas[28]);
//                ->setCellValue('AD1', $titulosColumnas[29]);                
//                ->setCellValue('AE1', $titulosColumnas[30])
//                
//                ->setCellValue('AF1', $titulosColumnas[31])                                
//                ->setCellValue('AG1', $titulosColumnas[32])                
//                ->setCellValue('AH1', $titulosColumnas[33]);
        //Se agregan los datos de los alumnos
        //$i = 4;
        $i = 2;

        
         while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['TVerificacion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('C' . $i, $fila['nResBRegistro']) 
                                 
                    ->setCellValue('D' . $i, $fila['femisionBRegistro']) 
                    ->setCellValue('E' . $i, $fila['fnotificacionBRegistro'])
                    
                    ->setCellValue('F' . $i, $fila['factofirme'])                    
//                    ->setCellValue('G' . $i, $fila['fconstanciaAcFirme']) 
//                    ->setCellValue('H' . $i, $fila['diferenciafechas_act_firme_const'])
                    
//                    ->setCellValue('I' . $i, $fila['fpublicacion_p'])
//                    ->setCellValue('J' . $i, $fila['fpublicacion_e'])
//                    ->setCellValue('K' . $i, $fila['fpublicacion_c'])
                    
//                    ->setCellValue('I' . $i, $fila['TipoRegistro_des'])  
                    
                    ->setCellValue('G' . $i, 'RUC')                    
                    ->setCellValue('H' . $i, $fila['RUC'])
                    ->setCellValue('I' . $i, $fila['nomEmpresa'])
                  ->setCellValueExplicit('J' . $i, $fila['TipoAtencion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('K' . $i, $fila['TipoTrabajador_des'])
                    
                    ->setCellValue('L' . $i, 'DNI')
                    ->setCellValueExplicit('M' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                                        
                    ->setCellValue('N' . $i, $fila['paterno_t'])
                    ->setCellValue('O' . $i, $fila['materno_t'])
                    ->setCellValue('P' . $i, $fila['asegurado'])
//                    ->setCellValue('W' . $i, $fila['fechanacimiento'])
                    
                    
                    
                    ->setCellValue('Q' . $i, $fila['VINCULO_0_DES'])
                    ->setCellValueExplicit('R' . $i, $fila['DNI_DH_0'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('S' . $i, $fila['APELLIDO_NOMBRE_0'])
                    ->setCellValue('T' . $i, $fila['InicioPFinalDh'])                    
                    ->setCellValue('U' . $i, $fila['FinPFinalDh'])
                    
                    ->setCellValueExplicit('V' . $i, $fila['nombrePDF'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('W' . $i, $fila['prestaciones'])
                    ->setCellValue('X' . $i, $fila['ncartafinanza1'])
                    
                    ->setCellValue('Y' . $i, $fila['observaciones'])
                    
                    ->setCellValue('Z' . $i, '')
                    ->setCellValue('AA' . $i, '')
                    ->setCellValue('AB' . $i, '');
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
//                'rgb' => 'FFFFFF'
//                )
//            ),
//            'fill' => array(
//                'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                'color' => array('argb' => '000000')
//            ),
//            'borders' => array(
//                'allborders' => array(
//                'style' => PHPExcel_Style_Border::BORDER_NONE
//                )
//            ),
//            'alignment' => array(
//                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
//                'rotation' => 0,
//                'wrap' => TRUE
//            )
//        );
 $estiloTituloReporte1 = array(
            'font' => array(
                'name' => 'Verdana',
                'bold' => true,
                'italic' => false,
                'strike' => false,
                'size' => 16,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'ffffff')
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
                'size' => 9,
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
                    'rgb' => 'ffffff'
                ),
                'endcolor' => array(
                    'argb' => 'ffffff'
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
                    'rgb' => 'ffffff'
                ),
                'endcolor' => array(
                    'argb' => 'ffffff'
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
                        'argb' => 'ffffff'
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
//        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte1);
        
        $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($estiloTituloColumnas);
//        $objPHPExcel->getActiveSheet()->getStyle('C3:H3')->applyFromArray($estiloTituloColumnas1);
//        $objPHPExcel->getActiveSheet()->getStyle('I3:M3')->applyFromArray($estiloTituloColumnas2);
//        $objPHPExcel->getActiveSheet()->getStyle('N3:T3')->applyFromArray($estiloTituloColumnas3);
//        $objPHPExcel->getActiveSheet()->getStyle('Z3:Z3')->applyFromArray($estiloTituloColumnas5);
        $objPHPExcel->getActiveSheet()->getStyle('M1:W1')->applyFromArray($estiloTituloColumnas3);
        $objPHPExcel->getActiveSheet()->getStyle('X1:AB1')->applyFromArray($estiloTituloColumnas6);
//        $objPHPExcel->getActiveSheet()->getStyle('AC1:AC1')->applyFromArray($estiloTituloColumnas5);

//        $objPHPExcel->getActiveSheet()->getStyle('AF1:AH1')->applyFromArray($estiloTituloColumnas7);
//        $objPHPExcel->getActiveSheet()->getStyle('AE3:AG3')->applyFromArray($estiloTituloColumnas55);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:AB" . ($i - 1));

        for ($i = 'A'; $i !== 'AB'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('FIRMESYCONSENTIDAS');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 2);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_CP_FirmesyConsentidas_Act_CDH.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>