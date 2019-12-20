<?php
/*-----------------------
Autor: Obed Alvarado
http://www.obedalvarado.pw
Fecha: 27-02-2016
Version de PHP: 5.6.3
----------------------------*/
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'sisgasv');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
    
	/*Inicia validacion del lado del servidor*/
                    
//                    if (empty($_POST['iddim_PaCalificar'])) {
//                        $id = 'NULL';
//                    } else {
//                        $idd = $_POST['iddim_PaCalificar'];
//                        $id = "'$idd'";
//                    }
                    if (empty($_POST['InicioPFinal'])) {
                        $InicioPFinal = 'NULL';
                    } else {
                        $InicioPFinall = $_POST['InicioPFinal'];
                        $InicioPFinal = "'$InicioPFinall'";
                    }                    
                    if (empty($_POST['FinPFinal'])) {
                        $FinPFinal = 'NULL';
                    } else {
                        $FinPFinall = $_POST['FinPFinal'];
                        $FinPFinal = "'$FinPFinall'";
                    }
                    if (empty($_POST['InicioPCalificar1'])) {
                        $InicioPCalificar1 = 'NULL';
                    } else {
                        $InicioPCalificar11 = $_POST['InicioPCalificar1'];
                        $InicioPCalificar1 = "'$InicioPCalificar11'";
                    }
                     if (empty($_POST['FinPCalificar1'])) {
                        $FinPCalificar1 = 'NULL';
                    } else {
                        $FinPCalificar11 = $_POST['FinPCalificar1'];
                        $FinPCalificar1 = "'$FinPCalificar11'";
                    }
                    if (empty($_POST['InicioPCalificar2'])) {
                        $InicioPCalificar2 = 'NULL';
                    } else {
                        $InicioPCalificar22 = $_POST['InicioPCalificar2'];
                        $InicioPCalificar2 = "'$InicioPCalificar22'";
                    }
                     if (empty($_POST['FinPCalificar2'])) {
                        $FinPCalificar2 = 'NULL';
                    } else {
                        $FinPCalificar22 = $_POST['FinPCalificar2'];
                        $FinPCalificar2 = "'$FinPCalificar22'";
                    }
    
		// escaping, additionally removing everything that could be (html/javascript-) code
//		$InicioPFinal=mysqli_real_escape_string($con,(strip_tags($_POST["InicioPFinal"],ENT_QUOTES)));
//                $FinPFinal=mysqli_real_escape_string($con,(strip_tags($_POST["FinPFinal"],ENT_QUOTES)));
//                $InicioPCalificar1=mysqli_real_escape_string($con,(strip_tags($_POST["InicioPCalificar1"],ENT_QUOTES)));
//                $FinPCalificar1=mysqli_real_escape_string($con,(strip_tags($_POST["FinPCalificar1"],ENT_QUOTES)));
//                $InicioPCalificar2=mysqli_real_escape_string($con,(strip_tags($_POST["InicioPCalificar2"],ENT_QUOTES)));
                //1
//    if (empty($_POST['InicioPCalificar2'])) {
//        $InicioPCalificar2=mysqli_real_escape_string($con,(strip_tags('NULL',ENT_QUOTES)));
//    } else {
//        $InicioPCalificar22=mysqli_real_escape_string($con,(strip_tags($_POST["InicioPCalificar2"],ENT_QUOTES)));
//        $InicioPCalificar2 = "'$InicioPCalificar22'";
//    }
////2
//    if (empty($_POST['FinPCalificar2'])) {
//        $FinPCalificar2=mysqli_real_escape_string($con,(strip_tags('NULL',ENT_QUOTES)));
//    } else {
//        $FinPCalificar22=mysqli_real_escape_string($con,(strip_tags($_POST["FinPCalificar2"],ENT_QUOTES)));
//        $FinPCalificar2 = "'$FinPCalificar22'";
//    }
//                $FinPCalificar2=mysqli_real_escape_string($con,(strip_tags($_POST["FinPCalificar2"],ENT_QUOTES)));


//                $InicioPFinal=($_POST["InicioPFinal"]);
//                $FinPFinal=($_POST["FinPFinal"]);
//                $InicioPCalificar1=($_POST["InicioPCalificar1"]);
//                $FinPCalificar1=($_POST["FinPCalificar1"]);
//                $InicioPCalificar2=($_POST["InicioPCalificar2"]);
//                $FinPCalificar2=($_POST["FinPCalificar2"]);
                
		$id=intval($_POST['iddim_PaCalificar']);
		$sql="UPDATE dim_pacalificar SET 
                        InicioPCalificar1=$InicioPCalificar1,
                        FinPCalificar1=$FinPCalificar1,
                        InicioPCalificar2=$InicioPCalificar2,
                        FinPCalificar2=$FinPCalificar2,
                        InicioPFinal=$InicioPFinal,
                        FinPFinal=$FinPFinal WHERE iddim_PaCalificar='".$id."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		
			
			?>