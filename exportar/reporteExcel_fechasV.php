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

//     $consulta = "SELECT dof.oficina, a.idtusuario, concat_ws(' ',u.pape, u.sape, u.pnom, u.snom) nombres, tea.EstadoActual, count(*) total
//        FROM dim_verificacion a    
//	left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
//        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion     
//        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil        
//        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
//	left join dim_usuario u on a.idtusuario=u.iddim_usuario
//        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
//        where (DATE(a.fCreacion) BETWEEN '$dateinicio' and '$datefin')              
//        and b.idDIM_Oficina='$idDIM_Oficina'
//        and a.idTEstadoActual in ('2','3','4')
//        and a.idTVerificacion='2'        
//        group by dof.oficina, a.idtusuario, nombres, tea.EstadoActual";    
     
      $consulta = "SELECT dof.oficina, a.idtusuario, concat_ws(' ',u.pape, u.sape, u.pnom, u.snom) nombres, tea.EstadoActual, count(*) total
        FROM dim_verificacion a    
	left join dim_aseguradoindevido b on a.iddim_aseguradoindevido=b.iddim_aseguradoindevido
        left join dim_overificacion c on a.iddim_Verificacion=c.iddim_Overificacion     
        left join tipoverificacionperfil tp on a.idTVerificacion=tp.idTVerificacion and a.idTVerificacionPerfil=tp.idTVerificacionPerfil        
        left join dim_oficina dof on b.idDIM_Oficina=dof.idDIM_Oficina  
	left join dim_usuario u on a.idtusuario=u.iddim_usuario
        left join tipoestadoactual tea on a.idTEstadoActual=tea.idTEstadoActual
        left join dim_resboficio rb on c.iddim_Overificacion=rb.iddim_Overificacion
        where (DATE(rb.fechaEmiBOficio) BETWEEN '$dateinicio' and '$datefin')              
        and b.idDIM_Oficina='$idDIM_Oficina'
        and a.idTEstadoActual in ('2','3','4')
        and a.idTVerificacion='2'        
        group by dof.oficina, a.idtusuario, nombres, tea.EstadoActual
        order by a.idtusuario, total asc";
    
    
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
                ->setDescription("Reportes")
                ->setKeywords("reporte alumnos carreras")
                ->setCategory("Reporte excel");

        $tituloReporte = "Reportes";
        $titulosColumnas = array('oficina', 'idtusuario', 'nombres', 'EstadoActual','total');

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:E1');

        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', $tituloReporte)
                ->setCellValue('A3', $titulosColumnas[0])
                ->setCellValue('B3', $titulosColumnas[1])
                ->setCellValue('C3', $titulosColumnas[2])
                ->setCellValue('D3', $titulosColumnas[3])
                ->setCellValue('E3', $titulosColumnas[4]);
        //Se agregan los datos de los alumnos 
        //$i = 4;
        $i = 4;
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $fila['oficina'])
                    ->setCellValue('B' . $i, $fila['idtusuario'])
                    ->setCellValue('C' . $i, $fila['nombres'])
                    ->setCellValue('D' . $i, $fila['EstadoActual'])
                    ->setCellValue('E' . $i, $fila['total']);
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:F3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:F" . ($i - 1));

        for ($i = 'A'; $i <= 'F'; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->getColumnDimension($i)->setAutoSize(TRUE);
        }

        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Alumnos');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        print_r('No hay resultados para mostrar');
    }
}
?>