<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
       
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];
    $oficinano=$_POST['oficinano'];
    
    $consulta = "SELECT
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,
a.iddim_CPosterior,
tvv.Verificacion,

case 
                when a.idTVerificacion='1' then '01'
                when a.idTVerificacion='2' then '02'       
                end as TVerificacion, 

p.resolucionpublicada,
p.femision,
p.fnotificacion,
p.fnotificacion_v,
p.fpublicacion_p,
p.fpublicacion_e,
p.fpublicacion_c,


                DATE_FORMAT(p.femision, '%d/%m/%Y') femision,   
                DATE_FORMAT(p.fnotificacion, '%d/%m/%Y') fnotificacion,   
                DATE_FORMAT(p.fnotificacion_v, '%d/%m/%Y') fnotificacion_v,  
                DATE_FORMAT(p.fpublicacion_p, '%d/%m/%Y') fpublicacion_p, 
                DATE_FORMAT(p.fpublicacion_e, '%d/%m/%Y') fpublicacion_e,   
                DATE_FORMAT(p.fpublicacion_c, '%d/%m/%Y') fpublicacion_c,   
p.tipo_registro, 
p.tipo_registro, 
        case 
        when b.idTipoAtencion='1' then '01'
        when b.idTipoAtencion='2' and (p.tipo_registro='1' or p.tipo_registro='2') then '02'   
        when b.idTipoAtencion='2' and p.tipo_registro='3' then '03'
         end as TipoAtencion, 
case 
when p.tipo_registro='1' then 'ASEGURADO'
when p.tipo_registro='2' then 'EMPLEADOR'
when p.tipo_registro='3' then 'TITULAR'
end as TipoRegistro, 
b.RUC, 
b.nomEmpresa,    
b.idTipoTrabajador,
tptra.descripcionTTrabajador,

case 
when p.tipo_registro='1' then b.dni_t
when p.tipo_registro='2' then b.dni_t
when p.tipo_registro='3' then b.titularAcredita_dni
end as dni_t, 

a.idTVerificacion,
a.idTVerificacionPerfil,
tvp.VerificacionPerfil,
a.idTEstadoActual,  
b.paterno_t, 
concat_ws(' ',b.materno_t,b.casada_t) as materno_t, 
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,
p.nombrePDPubli,

case 
when p.tipo_registro='1' then concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t)
when p.tipo_registro='2' then concat_ws(' ',b.paterno_t,b.materno_t,b.nombre1_t,b.nombre2_t)
when p.tipo_registro='3' then concat_ws(' ',b.titularAcredita_nombres)
end as nombres, 

concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
p.fCreacion,
tvp.VerificacionPerfil,
p.ruta_pdf_publi,
p.nombrePDPubli

        FROM dim_cposterior a
      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   	
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_publicacion p on a.iddim_aseguradoindevido = p.iddim_CPosterior
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(p.fnotificacion) BETWEEN '$dateinicio' and '$datefin')  
        and a.idTVerificacion='1' 
        and p.nombrePDPubli is not null
        and p.ruta_pdf_publi is not null
        and b.idDIM_Oficina='$idDIM_Oficina'
        order by a.iddim_CPosterior asc";
    
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
//                ->setKeywords("Verificaciones Publicaciones")
//                ->setCategory("Reporte excel");
//        
//            $tituloReporte = "RELACION DE PUBLICACIONES DE LA OSPE".$oficinano;
//            $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
//            $fin = strftime("%d-%m-%Y", strtotime($datefin));
//            $fechainir="DESDE ".$inicio." HASTA ".$fin; 
            $titulosColumnas = array('UCF/OSPE'.PHP_EOL.'(CODIGOS)',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',
            
            'NUMERO DE ACTO ADMINISTRATIVO O'.PHP_EOL.'ACTO DE LA ADMINISTRACION A'.PHP_EOL.'PUBLICAR',
            'EMISION DE'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE BAJA'.PHP_EOL.'(FECHA)',
            'NOTIFICACION'.PHP_EOL.'RES BAJA -'.PHP_EOL.'PERSONAL'.PHP_EOL.'(FECHA)',
            'PUBLICACION'.PHP_EOL.'DEL ACTO - EL'.PHP_EOL.'PERUANO'.PHP_EOL.'(FECHA)',
            'PUBLICACION-'.PHP_EOL.'WEB DE'.PHP_EOL.'ESSALUD'.PHP_EOL.'(FECHA)',
            'PUBLICACION-'.PHP_EOL.'DIARIO DE'.PHP_EOL.'MAYOR'.PHP_EOL.'CIRCULACION'.PHP_EOL.'(FECHA)',
            'TIPO DE'.PHP_EOL.'REGISTRO',
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'EMPLEADOR',
            'RAZON SOCIAL -'.PHP_EOL.'EMPLEADOR',
            'TIPO DE'.PHP_EOL.'TRABAJADOR',
            'ASEGURADO'.PHP_EOL.'TITULAR=01'.PHP_EOL.'DERECHO HABIENTE=02'.PHP_EOL.'TITULAR_DA_DERECHO=03',
            'TIPO DE'.PHP_EOL.'DOCUMENTO'.PHP_EOL.'DE IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'ASEGURADO',
            
            'ASEGURADO' .PHP_EOL.'APELLIDO PATERNO'.PHP_EOL.'APELLIDO MATERNO'.PHP_EOL.'NOMBRES',
                
//            'APELLIDO PATERNO -'.PHP_EOL.'ASEGURADO',
//            'APELLIDO MATERNO -'.PHP_EOL.'ASEGURADO',
//            'NOMBRES -'.PHP_EOL.'ASEGURADO',
            'NOMBRE - ARCHIVO PDF - PUBLICACION',
            'CALIFICACION'.PHP_EOL.'SGVCA',
            'COMENTARIO'.PHP_EOL.'SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'
            
            );//28

//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A1:w1');
//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A2:w2');

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
                ->setCellValue('U1', $titulosColumnas[20]);
//                ->setCellValue('V1', $titulosColumnas[21])
//                ->setCellValue('W1', $titulosColumnas[22]) ;
              
           $i = 2;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['TVerificacion'], PHPExcel_Cell_DataType::TYPE_STRING)  
                    
                    ->setCellValue('C' . $i, $fila['resolucionpublicada'])
                    ->setCellValue('D' . $i, $fila['femision'])
                    ->setCellValue('E' . $i, $fila['fnotificacion_v'])
                    ->setCellValue('F' . $i, $fila['fpublicacion_p'])
                    ->setCellValue('G' . $i, $fila['fpublicacion_e'])
                    ->setCellValue('H' . $i, $fila['fpublicacion_c'])
                    
                    ->setCellValue('I' . $i, $fila['TipoRegistro'])               
                    ->setCellValue('J' . $i, 'RUC')
                    ->setCellValue('K' . $i, $fila['RUC'])
                    ->setCellValue('L' . $i, $fila['nomEmpresa'])
                    ->setCellValue('M' . $i, $fila['descripcionTTrabajador'])
                    
                    ->setCellValueExplicit('N' . $i, $fila['TipoAtencion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('O' . $i, 'DNI')
                    
                    ->setCellValueExplicit('P' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('Q' . $i, $fila['nombres'])
//                    ->setCellValue('R' . $i, $fila['materno_t'])
//                    ->setCellValue('S' . $i, $fila['asegurado'])
                    
                    ->setCellValueExplicit('R' . $i, $fila['nombrePDPubli'], PHPExcel_Cell_DataType::TYPE_STRING)
                    
                    ->setCellValue('S' . $i, '')
                    ->setCellValue('T' . $i, '')
                    ->setCellValue('U' . $i, '');
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
                    'rgb' => '215967'
                ),
                'endcolor' => array(
                    'argb' => '215967'
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


//        $objPHPExcel->getActiveSheet()->getStyle('A1:W1')->applyFromArray($estiloTituloReporte);
//        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte1);
        $objPHPExcel->getActiveSheet()->getStyle('A1:U1')->applyFromArray($estiloTituloColumnas);
//        $objPHPExcel->getActiveSheet()->getStyle('C3:M3')->applyFromArray($estiloTituloColumnas1);
//        $objPHPExcel->getActiveSheet()->getStyle('N3:S3')->applyFromArray($estiloTituloColumnas2);        
//        $objPHPExcel->getActiveSheet()->getStyle('T3:T3')->applyFromArray($estiloTituloColumnas3);        
//        $objPHPExcel->getActiveSheet()->getStyle('U3:W3')->applyFromArray($estiloTituloColumnas7);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:U" . ($i - 1));

        for ($i = 'A'; $i !== 'U'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('PUBLICACIONES');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        $objPHPExcel->getActiveSheet(0)->freezePane('A2');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Verif_Publi_SIMVECA.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>