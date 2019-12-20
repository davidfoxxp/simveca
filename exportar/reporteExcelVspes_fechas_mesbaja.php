<?php
require '../conexionesbd/conexion_mysql.php';

if (isset($_POST['buscar'])) {
       
        if (isset($_POST['cbx_ano']) and isset($_POST['cbx_enero'])and isset($_POST['cbx_febrero'])and isset($_POST['cbx_marzo'])and isset($_POST['cbx_abril'])
                and isset($_POST['cbx_mayo'])and isset($_POST['cbx_junio'])and isset($_POST['cbx_julio'])and isset($_POST['cbx_agosto'])
                and isset($_POST['cbx_setiembre'])and isset($_POST['cbx_octubre'])and isset($_POST['cbx_noviembre'])and isset($_POST['cbx_diciembre'])){
    
    $idDIM_Oficina = $_POST['idDIM_Oficina'];
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
    $oficinano=$_POST['oficinano'];
    
    $consulta = "SELECT a.iddim_Verificacion,
concat(dof.nomenclatura,' - ',dof.oficina) OFICINA, 
a.idTVerificacion,
year(c.fechaEmision) as anocaso,
a.origenverif,
a.idTVerificacionPerfil, 
tp.VerificacionPerfil,
tpp.VerificacionPerfil as OrigenVeri,
b.RUC, 
b.nomEmpresa, 

b.idTipoTrabajador,

                case 
                when b.TipoRegistro='1' then 'ASEGURADO'
                when b.TipoRegistro='2' then 'EMPLEADOR'                
                end as TipoRegistro_des,   
                
        case 
        when a.idTVerificacion='1' then '01'
        when a.idTVerificacion='2' then '02'       
        end as Verificacion,
                
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



b.dni_t, 
concat_ws(' ',b.paterno_t,b.materno_t,b.casada_t,b.nombre1_t,b.nombre2_t)as asegurado,  
a.codigocaso,
c.ordenV,
DATE_FORMAT(c.fechaEmision, '%d/%m/%Y') fechaEmision,   
DATE_FORMAT(c.fechanotificacionOV, '%d/%m/%Y') fechanotificacionOV, 

DATE_FORMAT(a.fechaEIFinalJOSPE, '%d/%m/%Y') fechaEIFinalJOSPE,   
DATE_FORMAT(a.fechaDevInfFinalJOSPE, '%d/%m/%Y') fechaDevInfFinalJOSPE, 

DATE_FORMAT(a.fechaRDerivado, '%d/%m/%Y') fechaRDerivado,   
DATE_FORMAT(a.fechaDDerivado, '%d/%m/%Y') fechaDDerivado, 
a.nit,
a.casoDerivado,
ts.oficina,
d.numResBOficio, 
DATE_FORMAT(d.fechaEmiBOficio, '%d/%m/%Y') fechaEmiBOficio, 
		DATE_FORMAT(pc.InicioPCalificar1, '%d/%m/%Y') InicioPFinal,                    
		DATE_FORMAT(pc.FinPCalificar1, '%d/%m/%Y') FinPFinal, 
d.id_EstadoReso,
dtt.RRBRegistro,

dofxx.apellidonombre, 
a.observaciones, 
a.idTEstadoActual, 
tea.EstadoActual
        FROM dim_verificacion a     
		left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion
        left join dim_resboficio d on c.iddim_Overificacion=d.iddim_Overificacion        
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil
        left join tipoverificacionperfil tpp on a.idTVerificacion=tpp.idTVerificacion and a.origenverif=tpp.idTVerificacionPerfil   
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
        left join tiporrbregistro dtt on d.idTRRBRegistro=dtt.idTRRBRegistro 
        
        left join tipoospe ts on a.casoDerivado =ts.codOficina
        left join dim_pacalificar_new pc on b.iddim_aseguradoindevido=pc.iddim_aseguradoindevido   	
        left join dim_actaverificacion dofx on a.iddim_Verificacion=dofx.iddim_Verificacion
        left join dim_oficina dofxx on dofx.iddim_verificadores1=dofxx.idDIM_Oficina  
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        where month(d.fechaEmiBOficio) in ($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $setiembre, $octubre, $noviembre, $diciembre) and 
        year(d.fechaEmiBOficio)='$ano'             
        and b.idDIM_Oficina='$idDIM_Oficina'
        and a.idTVerificacion='2'        
        order by a.iddim_Verificacion, pc.InicioPCalificar1 asc";
    
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
//                ->setKeywords("Reporte de Bajas Emitidas")
//                ->setCategory("Reporte excel");
//
//        $tituloReporte = "RELACION DE REGISTROS DE LA OSPE ".$oficinano;
        $titulosColumnas = array('UCF/OSPE',
            'PROCESO'.PHP_EOL.'CONTROL POSTERIOR=01'.PHP_EOL.'VERIFICACION=02',      
            'ESTADO DEL'.PHP_EOL.'CASO',
            'AÑO DE'.PHP_EOL.'GENERACION'.PHP_EOL.'DEL CASO',
            'ORIGEN DE LA'.PHP_EOL.'VERIFICACION',
            'PERFIL DE RIESGO', 
            'NUMERO DE RUC -'.PHP_EOL.'ENTIDAD'.PHP_EOL.'EMPLEADORA',
            'RAZON SOCIAL / APELLIDOS Y'.PHP_EOL.'NOMBRES DE ENTIDAD'.PHP_EOL.'EMPLEADORA', 
            'TIPO'.PHP_EOL.'TRABAJADOR',
            'NUMERO DE'.PHP_EOL.'DOCUMENTO DE'.PHP_EOL.'IDENTIDAD -'.PHP_EOL.'DEL TITULAR', 
            'TITULAR'.PHP_EOL.'APELLIDOS Y NOMBRES',               
//            'CODIGO DE CASO',
            
            'N° OV',
            'EMISION'.PHP_EOL.'DE LA OV'.PHP_EOL.'(FECHA)', 
            'NIT', 
            'ENTREGA'.PHP_EOL.'DEL'.PHP_EOL.'INFORME'.PHP_EOL.'FINAL AL'.PHP_EOL.'JEFE DE OSPE'.PHP_EOL.'(FECHA)', 
            'DEVOLUCION'.PHP_EOL.'DEL'.PHP_EOL.'INFORME'.PHP_EOL.'FINAL POR'.PHP_EOL.'JEFE DE OSPE'.PHP_EOL.'(FECHA)', 
            'RECEPCION'.PHP_EOL.'DE CASO'.PHP_EOL.'DERIVADO' .PHP_EOL.'(FECHA)', 
            'DEVOLUCION'.PHP_EOL.'DE CASO'.PHP_EOL.'DERIVADO'.PHP_EOL.'(FECHA)', 
            'CASO'.PHP_EOL.'DERIVADO'.PHP_EOL.'DE LA OSPE',
            'N° RESOLUCION DE BAJA DE OFICIO',           
            'EMISION'.PHP_EOL.'BAJA DE'.PHP_EOL.'OFICIO'.PHP_EOL.'/ ARCHIVO'.PHP_EOL.'(FECHA)',                  
            'INICIO DE'.PHP_EOL.'PERIODO DE BAJA'.PHP_EOL.'(FECHA)',
            'FIN DE'.PHP_EOL.'PERIODO DE BAJA'.PHP_EOL.'(FECHA)', 
            
//            'ESTADO DEL ACTO'.PHP_EOL.'ADMINISTRATIVO -'.PHP_EOL.'RES BAJA',
//            'N° RESOLUCION DE INHABILITACION',            
//            'FECHA EMISION'.PHP_EOL.'RESOLUCION DE'.PHP_EOL.'INHABILITACION', 
//            'N° RESOLUCION DE MULTA',            
//            'FECHA'.PHP_EOL.'EMISION'.PHP_EOL.'RESOLUCION'.PHP_EOL.'DE MULTA',
//            'ESTADO DEL ACTO'.PHP_EOL.'ADMINISTRATIVO'.PHP_EOL.'MULTA', 
//            'FECHA'.PHP_EOL.'DERIVADO A'.PHP_EOL.'RED/FINANZAS',
//            'N° CARTA'.PHP_EOL.'RED/FINANZAS',            
            'APELLIDOS Y NOMBRES DEL VERIFICADOR',  
            'OBSERVACION'
//            'ESTADO DEL'.PHP_EOL.'CASO'
            );//53

//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A1:AG1');
//        $objPHPExcel->setActiveSheetIndex(0)
//                ->mergeCells('A2:BA2');

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
//                ->setCellValue('Z3', $titulosColumnas[25])
//                ->setCellValue('AA3', $titulosColumnas[26])
//                ->setCellValue('AB3', $titulosColumnas[27])                
//                ->setCellValue('AC3', $titulosColumnas[28])
//                ->setCellValue('AD3', $titulosColumnas[29])
//                ->setCellValue('AE3', $titulosColumnas[30])
//                ->setCellValue('AF3', $titulosColumnas[31])
//                ->setCellValue('AG3', $titulosColumnas[32]);       
              
           $i = 2;
//        $i = 10;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['OFICINA'])
                    ->setCellValueExplicit('B' . $i, $fila['Verificacion'], PHPExcel_Cell_DataType::TYPE_STRING)                  
                    ->setCellValue('C' . $i, $fila['EstadoActual'])
                    ->setCellValue('D' . $i, $fila['anocaso'])
                    ->setCellValue('E' . $i, $fila['OrigenVeri'])
                    ->setCellValue('F' . $i, $fila['VerificacionPerfil'])
                    ->setCellValue('G' . $i, $fila['RUC'])
                    ->setCellValue('H' . $i, $fila['nomEmpresa'])
                    ->setCellValue('I' . $i, $fila['TipoTrabajador_des'])
                    ->setCellValueExplicit('J' . $i, $fila['dni_t'], PHPExcel_Cell_DataType::TYPE_STRING)                  
                    ->setCellValue('K' . $i, $fila['asegurado'])
//                    ->setCellValueExplicit('K' . $i, $fila['codigocaso'], PHPExcel_Cell_DataType::TYPE_STRING)
                    ->setCellValue('L' . $i, $fila['ordenV'])
                    ->setCellValue('M' . $i, $fila['fechaEmision'])
                    ->setCellValue('N' . $i, $fila['nit'])
                    ->setCellValue('O' . $i, $fila['fechaEIFinalJOSPE'])
                    ->setCellValue('P' . $i, $fila['fechaDevInfFinalJOSPE'])
                    ->setCellValue('Q' . $i, $fila['fechaRDerivado'])
                    ->setCellValue('R' . $i, $fila['fechaDDerivado'])
                    ->setCellValue('S' . $i, $fila['oficina'])
                    ->setCellValue('T' . $i, $fila['numResBOficio'])
                    ->setCellValue('U' . $i, $fila['fechaEmiBOficio'])

                    ->setCellValue('V' . $i, $fila['InicioPFinal'])
                    ->setCellValue('W' . $i, $fila['FinPFinal'])
//                    ->setCellValue('W' . $i, $fila['RRBRegistro'])
//                    ->setCellValue('X' . $i, $fila['nResInhabilitacion'])
//                    ->setCellValue('Y' . $i, $fila['fechaEmiRInh'])
//                    ->setCellValue('Z' . $i, $fila['numRMulta'])
//                    ->setCellValue('AA' . $i, $fila['fechaNMulta'])
//                    ->setCellValue('AB' . $i, $fila['idTRRBRegistro'])
//                    ->setCellValue('AC' . $i, $fila['fecartafinanza1'])
//                    ->setCellValue('AD' . $i, $fila['ncartafinanza1'])
                    ->setCellValue('X' . $i, $fila['apellidonombre'])
                    ->setCellValue('Y' . $i, $fila['observaciones']);                   
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
        $objPHPExcel->getActiveSheet()->getStyle('A1:Y1')->applyFromArray($estiloTituloColumnas);
//        $objPHPExcel->getActiveSheet()->getStyle('L3:AG3')->applyFromArray($estiloTituloColumnas1);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:Y" . ($i - 1));

        for ($i = 'A'; $i !== 'Y'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Bajas Emitidas');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        $objPHPExcel->getActiveSheet(0)->freezePane('A2');
//        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 24);

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
}
?>