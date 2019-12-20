<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
       
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];
    $oficinano=$_POST['oficinano'];
    
    $consulta = "SELECT 
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
a.idTVerificacion,
d.numResBOficio, 

case 
when b.TipoRegistro='1' then 'ASEGURADO'
when b.TipoRegistro='2' then 'EMPLEADOR'                
end as TipoRegistro_des,   

case 
when a.idTVerificacion='1' then '01'
when a.idTVerificacion='2' then '02'       
end as TVerificacion, 

        case 
        when b.idTipoAtencion='1' then '01'
        when b.idTipoAtencion='2' then '02'       
        end as TipoAtencion, 
                
case 
when b.idTipoTrabajador='1' then 'RG - TRABAJADOR REGULAR'
when b.idTipoTrabajador='119' then 'TH - TRABAJADOR DEL HOGAR'
when b.idTipoTrabajador='201' then 'AD - AGRARIO DEPENDIENTE'
when b.idTipoTrabajador='203' then 'AI - AGRARIO INDEPENDIENTE'
when b.idTipoTrabajador='805' then 'PP - PESQUERO ARTESANAL'
end as TipoTrabajador_des, 

case 
when b.idTipoAtencion='1' then 'TITULAR'
when b.idTipoAtencion='2' then 'DERECHO HABIENTE'                
end as TipoAtencion_des,  

DATE_FORMAT(d.fechaEmiBOficio, '%d/%m/%Y') fechaEmiBOficio, 
DATE_FORMAT(d.fechaNAsegurado, '%d/%m/%Y') fechaNAsegurado, 

case 
when b.TipoRegistro='1' then 'ASEGURADO'
when b.TipoRegistro='2' then 'EMPLEADOR'                
end as TipoRegistro_des,   
                
case 
when b.idTipoTrabajador='1' then 'RG - TRABAJADOR REGULAR'
when b.idTipoTrabajador='119' then 'TH - TRABAJADOR DEL HOGAR'
when b.idTipoTrabajador='201' then 'AD - AGRARIO DEPENDIENTE'
when b.idTipoTrabajador='203' then 'AI - AGRARIO INDEPENDIENTE'
when b.idTipoTrabajador='805' then 'PP - PESQUERO ARTESANAL'
end as TipoTrabajador_des, 

case 
when b.idTipoAtencion='1' then 'TITULAR'
when b.idTipoAtencion='2' then 'DERECHO HABIENTE'                
end as TipoAtencion_des,    

b.RUC, 
b.nomEmpresa, 

b.dni_t, 
b.paterno_t,
concat_ws(' ',b.materno_t,b.casada_t)as materno_t, 
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,

DATE_FORMAT(pc.InicioPCalificar1, '%d/%m/%Y') InicioPFinal,   
DATE_FORMAT(pc.FinPCalificar1, '%d/%m/%Y') FinPFinal,  

DATE_FORMAT(d.fechaActFirme, '%d/%m/%Y') fechaconstanciaActFirme,   
DATE_FORMAT(d.factofirme, '%d/%m/%Y') factofirme,  

d.nombre_PDF_reso,
cf.ncartafinanza1,
DATE_FORMAT(cf.fecartafinanza1, '%d/%m/%Y') fecartafinanza1,
case 
when cf.ncartafinanza1 IS NOT NULL then 'SI'  
else 'NO'
end as prestaciones, 

a.observaciones

        FROM dim_verificacion a    
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
         
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion        
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoverificacionperfil tpp on a.idTVerificacion=tpp.idTVerificacion and a.origenverif=tpp.idTVerificacionPerfil        
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join tiporrbregistro dtt on d.id_EstadoReso=dtt.idTRRBRegistro 
        
        left join dim_pacalificar_new pc on b.iddim_aseguradoindevido=pc.iddim_aseguradoindevido
        left join dim_cfinanzas cf on a.iddim_Verificacion=cf.iddim_Verificacion
        
        left join dim_actaverificacion dofx on a.iddim_Verificacion=dofx.iddim_Verificacion
        left join dim_oficina dofxx on dofx.iddim_verificadores1=dofxx.idDIM_Oficina  
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        where (DATE(d.factofirme) BETWEEN '$dateinicio' and '$datefin')   
        and b.idDIM_Oficina='$idDIM_Oficina' and d.ruta_pdf_reso is not null
        and a.idTEstadoActual in ('3')
        and a.idTVerificacion='2'
	order by b.iddim_aseguradoindevido, pc.InicioPCalificar1 asc";
    
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
//                ->setDescription("Reporte de Verificacion")
//                ->setKeywords("Verificaciones firmes y consentidas")
//                ->setCategory("Reporte excel");
//        
//        $tituloReporte = "RELACION DE VERIFICACIONES ACTOS FIRMES Y CONSENTIDAS DE LA OSPE".$oficinano;
//        $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
//        $fin = strftime("%d-%m-%Y", strtotime($datefin));
//        $fechainir="DESDE ".$inicio." HASTA ".$fin; 
        $titulosColumnas = array('UCF/OSPE'.PHP_EOL.'(CODIGOS)',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',
            
            'NUMERO DE RESOLUCION DE BAJA',
            
            'EMISION DE'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE BAJA'.PHP_EOL.'(FECHA)',
            'NOTIFICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'PERSONAL'.PHP_EOL.'(FECHA)',
            
            'ACTO FIRME'.PHP_EOL.'(FECHA)',
//            'CONSTANCIA DE ACTO FIRME'.PHP_EOL.'(FECHA)',
                        
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA - EL'.PHP_EOL.'PERUANO'.PHP_EOL.'(dd/mm/yyyy)',
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'WEB DE'.PHP_EOL.'ESSALUD'.PHP_EOL.'(dd/mm/yyyy)',
//            'FECHA DE'.PHP_EOL.'PUBLICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'DIARIO DE'.PHP_EOL.'MAYOR'.PHP_EOL.'CIRCULACION'.PHP_EOL.'(dd/mm/yyyy)',
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
            'INICIO DEL'.PHP_EOL.'PERIODO DE'.PHP_EOL.'BAJA -'.PHP_EOL.'ASEGURADO O'.PHP_EOL.'EMPLEADOR'.PHP_EOL.'(FECHA)',
            'FIN'.PHP_EOL.'DEL PERIODO'.PHP_EOL.'DE BAJA -'.PHP_EOL.'ASEGURADO O'.PHP_EOL.'EMPLEADOR'.PHP_EOL.'(FECHA)',
            
            'NOMBRE - ARCHIVO PDF - RES BAJA',
            'PRESTACIONES'.PHP_EOL.'(DEPENDE CARTA A FINANZA)',
            'CARTA A FINANZAS',
                  
            'OBSERVACIONES DE'.PHP_EOL.'LA OSPE',
            'CALIFICACION'.PHP_EOL.'SGVCA',
            'COMENTARIO'.PHP_EOL.'SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'.PHP_EOL.'SGVCA',
            
            );//28
//
//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A1:AB1');
//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A2:AB2');

        // Se agregan los titulos del reporte
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
                ->setCellValue('Y1', $titulosColumnas[24]);
//                ->setCellValue('Z1', $titulosColumnas[25]);
//                ->setCellValue('AA3', $titulosColumnas[26])   
//                ->setCellValue('AB3', $titulosColumnas[27]);
   
           $i = 2;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['TVerificacion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('C' . $i, $fila['numResBOficio'])
                    
                     ->setCellValue('D' . $i, $fila['fechaEmiBOficio'])
                    ->setCellValue('E' . $i, $fila['fechaNAsegurado'])
                    ->setCellValue('F' . $i, $fila['factofirme'])                    
//                    ->setCellValue('G' . $i, $fila['fechaconstanciaActFirme']) 
                    
//                    ->setCellValue('I' . $i, $fila['TipoRegistro_des'])           

                    ->setCellValue('G' . $i, 'RUC')                    
                    ->setCellValue('H' . $i, $fila['RUC'])
                    ->setCellValue('I' . $i, $fila['nomEmpresa'])
                    
                    ->setCellValueExplicit('J' . $i, $fila['TipoAtencion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('K' . $i, $fila['TipoTrabajador_des'])
                    
                    ->setCellValue('L' . $i, 'DNI')
                    ->setCellValueExplicit('M' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    
//                    ->setCellValue('P' . $i, $fila['TipoAtencion_des'])
                    ->setCellValue('N' . $i, $fila['paterno_t'])
                    ->setCellValue('O' . $i, $fila['materno_t'])
                    ->setCellValue('P' . $i, $fila['asegurado'])
//                    ->setCellValue('T' . $i, $fila['fechanacimiento'])
                    
                    ->setCellValue('Q' . $i, $fila['InicioPFinal'])
                    ->setCellValue('R' . $i, $fila['FinPFinal'])                    
                    ->setCellValueExplicit('S' . $i, $fila['nombre_PDF_reso'], PHPExcel_Cell_DataType::TYPE_STRING)                    
                    ->setCellValue('T' . $i, $fila['prestaciones'])
                    ->setCellValue('U' . $i, $fila['ncartafinanza1'])                                      
                    ->setCellValue('V' . $i, $fila['observaciones'])
                    
                    ->setCellValue('W' . $i, '')
                    ->setCellValue('X' . $i, '')
                    ->setCellValue('Y' . $i, '');
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
//        $estiloTituloReporte1 = array(
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


//        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
//        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte1);
        $objPHPExcel->getActiveSheet()->getStyle('A1:Y1')->applyFromArray($estiloTituloColumnas);
//        $objPHPExcel->getActiveSheet()->getStyle('C3:H3')->applyFromArray($estiloTituloColumnas1);
//        $objPHPExcel->getActiveSheet()->getStyle('I3:M3')->applyFromArray($estiloTituloColumnas2);
//        $objPHPExcel->getActiveSheet()->getStyle('N3:T3')->applyFromArray($estiloTituloColumnas3);
//        $objPHPExcel->getActiveSheet()->getStyle('U3:V3')->applyFromArray($estiloTituloColumnas4);
//        $objPHPExcel->getActiveSheet()->getStyle('W3:W3')->applyFromArray($estiloTituloColumnas5);
//        $objPHPExcel->getActiveSheet()->getStyle('X3:X3')->applyFromArray($estiloTituloColumnas6);
//        $objPHPExcel->getActiveSheet()->getStyle('Y3:Y3')->applyFromArray($estiloTituloColumnas3);
////        $objPHPExcel->getActiveSheet()->getStyle('Y3:AD3')->applyFromArray($estiloTituloColumnas7);
//        $objPHPExcel->getActiveSheet()->getStyle('Z3:AB3')->applyFromArray($estiloTituloColumnas55);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:Y" . ($i - 1));

        for ($i = 'A'; $i !== 'Y'; $i++) {
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
        header('Content-Disposition: attachment;filename="Reporte_Verif_BFyC_SIMVECA_Act_SDH.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>