<?php
function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
		require_once 'PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tipo de seguridad'; //Modificar
		$mail->Host = 'dominio'; //Modificar
		$mail->Port = puerto; //Modificar
		
		$mail->Username = 'correo emisor'; //Modificar
		$mail->Password = 'password de correo emisor'; //Modificar
		
		$mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
		$mail->addAddress($email, $nombre);
		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);
		
		if($mail->send())
		return true;
		else
		return false;
	}

