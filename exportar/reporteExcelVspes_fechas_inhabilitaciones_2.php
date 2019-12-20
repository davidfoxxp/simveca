<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
       
    $dateinicio = $_POST['dateinicio']; //1
    $datefin = $_POST['datefin'];
    $idDIM_Oficina = $_POST['idDIM_Oficina'];
    $oficinano=$_POST['oficinano'];
    
    $consulta = "SELECT  
b.dni_t, 
b.paterno_t,
concat_ws(' ',b.materno_t,b.casada_t) as materno_t, 
concat_ws(' ',b.nombre1_t,b.nombre2_t) as asegurado,

DATE_FORMAT(i.fechaNPCInicioPSInh, '%d/%m/%Y') fechaNPCInicioPSInh, 

case 
when a.idTVerificacion='1' then '01'
when a.idTVerificacion='2' then '02'       
end as TVerificacion, 

concat(dof.nomenclatura,' - ',dof.oficina) OFICINA,	
a.iddim_aseguradoindevido, 
a.idTVerificacion,
tvv.Verificacion,
a.idTVerificacionPerfil,
a.idTEstadoActual,
b.RUC, b.nomEmpresa,                                                     
c.ordenV,
DATE_FORMAT(i.dia_pdf, '%d/%m/%Y') dia_pdf, 
DATE_FORMAT(i.fechaECInicioPSInh, '%d/%m/%Y') fechaECInicioPSInh, 
DATE_FORMAT(i.fechaEmiRInh, '%d/%m/%Y') fechaEmiRInh, 

DATE_FORMAT(p.fpublicacion_p, '%d/%m/%Y') fpublicacion_p, 
DATE_FORMAT(p.fpublicacion_e, '%d/%m/%Y') fpublicacion_e, 
DATE_FORMAT(p.fpublicacion_c, '%d/%m/%Y') fpublicacion_c, 


b.RUC, 
b.nomEmpresa, 
b.idTipoTrabajador,
tptra.descripcionTTrabajador,

DATE_FORMAT(i.fechaFinPInh, '%d/%m/%Y') fechaFinPInh, 
DATE_FORMAT(i.fechaIFinalInstructor, '%d/%m/%Y') fechaIFinalInstructor, 
DATE_FORMAT(i.fechaInicioPInh, '%d/%m/%Y') fechaInicioPInh, 
DATE_FORMAT(i.fechaNCInicioPSInh, '%d/%m/%Y') fechaNCInicioPSInh, 

DATE_FORMAT(i.fechaNMCirculacion, '%d/%m/%Y') fechaNMCirculacion, 

DATE_FORMAT(i.fechaNotRInh, '%d/%m/%Y') fechaNotRInh, 
DATE_FORMAT(i.fechaNPCInicioPSInh, '%d/%m/%Y') fechaNPCInicioPSInh, 

DATE_FORMAT(i.fechaNPeruano, '%d/%m/%Y') fechaNPeruano, 
DATE_FORMAT(i.fechaNWebEssalud, '%d/%m/%Y') fechaNWebEssalud, 

 i.iddim_Inhabilitacion, i.iddim_ResBOficio,
i.idTActosverificacion, i.nombrePDFinhabi, i.nResInhabilitacion, i.numCartaIni, i.ruta_pdf_inhabi, i.supuesto_1, i.supuesto_2,
i.usuario_pdf, i.validacion,              
i.observaciones_inh observaciones, i.f_despacho, i.carta_despacho, 
concat_ws(' ',usu.pape,usu.sape,usu.pnom,usu.snom)as usuarioase,
a.fCreacion,
tvp.VerificacionPerfil
        FROM dim_verificacion a      
        left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina   
	left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_usuario usu on a.idtusuario=usu.iddim_usuario 
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion
        left join dim_inhabilitacion i on d.iddim_ResBOficio=i.iddim_ResBOficio
        left join dim_publicacion p on i.nResInhabilitacion = p.resolucionpublicada
        left join tipotrabajador tptra on b.idTipoTrabajador=tptra.idTipoTrabajador
        left join tipoverificacion tvv on a.idTVerificacion=tvv.idTVerificacion
        left join tipoverificacionperfil tvp on a.idTVerificacion=tvp.idTVerificacion and a.idTVerificacionPerfil =tvp.idTVerificacionPerfil  
        where (DATE(i.fechaNotRInh) BETWEEN '$dateinicio' and '$datefin')         
        and a.idTVerificacion='2' 
        and i.nResInhabilitacion is not null
        and i.ruta_pdf_inhabi is not null
        and i.f_despacho is null
        and b.idDIM_Oficina='$idDIM_Oficina'
        order by a.iddim_Verificacion asc";
    
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
//                ->setKeywords("Verificaciones Inhabilitaciones")
//                ->setCategory("Reporte excel");
//        
//        $tituloReporte = "RELACION DE RESOLUCIONES DE INHABILITACIONES DE LA OSPE".$oficinano;
//        $inicio = strftime("%d-%m-%Y", strtotime($dateinicio));
//        $fin = strftime("%d-%m-%Y", strtotime($datefin));
//        $fechainir="DESDE ".$inicio." HASTA ".$fin; 
        $titulosColumnas = array('UCF/OSPE'.PHP_EOL.'(CODIGOS)',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',
            
            'NUMERO DE RESOLUCION DE'.PHP_EOL.'INHABILITACION',
            'EMISION DE'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE INHABILITACION'.PHP_EOL.'(FECHA)',
            'NOTIFICACION'.PHP_EOL.'DE RES'.PHP_EOL.'INHABILITACION'.PHP_EOL.'-PERSONAL'.PHP_EOL.'(FECHA)',
            'PUBLICACION'.PHP_EOL.'RES'.PHP_EOL.'INHABILITACION'.PHP_EOL.'-EL PERUANO'.PHP_EOL.'(FECHA)',
            'PUBLICACION'.PHP_EOL.'RES'.PHP_EOL.'INHABILITACION'.PHP_EOL.'-WEB DE'.PHP_EOL.'ESSALUD'.PHP_EOL.'(FECHA)',
            'PUBLICACION'.PHP_EOL.'RES'.PHP_EOL.'INHABILITACION'.PHP_EOL.'-DIARIO DE'.PHP_EOL.'MAYOR'.PHP_EOL.'CIRCULACION'.PHP_EOL.'(FECHA)',
            
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
//            'FECHA DE'.PHP_EOL.'NACIMIENTO-'.PHP_EOL.'ASEGURADO'.PHP_EOL.'(dd/mm/yyyy)',
            'PERIODO INICIO'.PHP_EOL.'INHABILITACION'.PHP_EOL.'ASEGURADO O'.PHP_EOL.'EMPLEADOR'.PHP_EOL.'(yyyymm)',
            'PERIODO FIN'.PHP_EOL.'INHABILITACION'.PHP_EOL.'ASEGURADO O'.PHP_EOL.'EMPLEADOR'.PHP_EOL.'(yyyymm)',
            'CARTA DE INICIO'.PHP_EOL.'DEL PROCED'.PHP_EOL.'SANCIONADOR'.PHP_EOL.'(FECHA)',
            'INFORME FINAL'.PHP_EOL.'DE INSTRUCCION'.PHP_EOL.'(ddmmaaaa)',
            'NOMBRE - ARCHIVO PDF - RES INHABILITACION',
            'CALIFICACION'.PHP_EOL.'SGVCA',
            'COMENTARIO'.PHP_EOL.'SGVCA',
            'PERSONAL'.PHP_EOL.'CALIFICADOR'
            
            );//28

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
                ->setCellValue('Y1', $titulosColumnas[24])
                ->setCellValue('Z1', $titulosColumnas[25])
                ->setCellValue('AA1', $titulosColumnas[26]);
//                ->setCellValue('AB3', $titulosColumnas[27]);
              
           $i = 2;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['TVerificacion'], PHPExcel_Cell_DataType::TYPE_STRING)
                    
                    ->setCellValue('C' . $i, $fila['nResInhabilitacion'])
                    ->setCellValue('D' . $i, $fila['fechaEmiRInh'])
                    ->setCellValue('E' . $i, $fila['fechaNotRInh'])
                    ->setCellValue('F' . $i, $fila['fpublicacion_p'])
                    ->setCellValue('G' . $i, $fila['fpublicacion_e'])
                    ->setCellValue('H' . $i, $fila['fpublicacion_c'])
                    
                    ->setCellValue('I' . $i, 'ASEGURADO')               
                    ->setCellValue('J' . $i, 'RUC')
                    ->setCellValue('K' . $i, $fila['RUC'])
                    ->setCellValue('L' . $i, $fila['nomEmpresa'])
                    ->setCellValue('M' . $i, $fila['descripcionTTrabajador'])
                    
                    ->setCellValue('N' . $i, 'DNI')
                    ->setCellValueExplicit('O' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('P' . $i, 'TITULAR')
                    ->setCellValue('Q' . $i, $fila['paterno_t'])
                    ->setCellValue('R' . $i, $fila['materno_t'])
                    ->setCellValue('S' . $i, $fila['asegurado'])
//                    ->setCellValue('T' . $i, $fila['fechanacimiento'])
                    
                    ->setCellValue('T' . $i, $fila['fechaInicioPInh'])
                    ->setCellValue('U' . $i, $fila['fechaFinPInh'])
                    
                    ->setCellValue('V' . $i, $fila['fechaNPCInicioPSInh'])
                    
                    ->setCellValue('W' . $i, $fila['fechaIFinalInstructor'])
                    ->setCellValueExplicit('X' . $i, $fila['nombrePDFinhabi'], PHPExcel_Cell_DataType::TYPE_STRING)
                    
                    ->setCellValue('Y' . $i, '')
                    ->setCellValue('Z' . $i, '')
                    ->setCellValue('AA' . $i, '');
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
                    'rgb' => '0F243E'
                ),
                'endcolor' => array(
                    'argb' => '0F243E'
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
                    'rgb' => '16365C'
                ),
                'endcolor' => array(
                    'argb' => '16365C'
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
                    'rgb' => '0F243E'
                ),
                'endcolor' => array(
                    'argb' => '0F243E'
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


//        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
//        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte1);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AA1')->applyFromArray($estiloTituloColumnas);
//        $objPHPExcel->getActiveSheet()->getStyle('C3:H3')->applyFromArray($estiloTituloColumnas1);
//        $objPHPExcel->getActiveSheet()->getStyle('I3:M3')->applyFromArray($estiloTituloColumnas2);
//        $objPHPExcel->getActiveSheet()->getStyle('N3:T3')->applyFromArray($estiloTituloColumnas3);
//        $objPHPExcel->getActiveSheet()->getStyle('U3:X3')->applyFromArray($estiloTituloColumnas4);
//        $objPHPExcel->getActiveSheet()->getStyle('Y3:Y3')->applyFromArray($estiloTituloColumnas5);
//        $objPHPExcel->getActiveSheet()->getStyle('Z3:AB3')->applyFromArray($estiloTituloColumnas7);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:AA" . ($i - 1));

        for ($i = 'A'; $i !== 'AA'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('INHABILITACIONES');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Verif_Inhab_SIMVECA.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>