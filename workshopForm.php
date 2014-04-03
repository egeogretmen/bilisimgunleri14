
<?php

if(isset($_POST['submit'])){

	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->CharSet = "UTF-8";
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->Host="mail.bilisimgunleri.com";
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->Username="";
	$mail->Password="";

	$strTo = "";
	$strBcc = "bilisim@ku.edu.tr";
	$strSubject = "Bilişim Günleri '14";
	$strMessage = "";
	$err ="";
	
	$name = filter_var(trim(($_POST['att_name'])), FILTER_SANITIZE_STRING);
	$email = filter_var(trim(($_POST['att_email'])), FILTER_SANITIZE_EMAIL);

	if($name == '') {
		$hasError = true;
		$err .= "Ad Soyad boş olamaz <br />";	
	} else {
		$strMessage .= "Merhaba $name,<br /><br />";
	}

	if($email == '') {
		$hasError = true;
		$err .= "Email adresi boş olamaz <br />";	
	}

	if(!isset($hasError)) {
		$strTo = $email;
		$strMessage .= "Başvurunuz başarıyla alınmıştır.<br><br>İyi günler,<br>Bilişim Kulübü";
		$mail->From="bilisim@ku.edu.tr";
		$mail->FromName="Bilişim Kulübü";
		$mail->AddAddress($strTo);
		$mail->AddBCC($strBcc);
		$mail->Subject=$strSubject;
		$mail->Body=$strMessage;
		$mail->isHTML(true);
		if(!$mail->Send()){
			//header("HTTP/1.1 500 Gönderilemedi.");
			echo $mail->ErrorInfo;
			die();
		} else {

			echo "Başvurunuz başarılı bir şekilde alınmıştır"; // never gonna show up
			return true;
		}

	} else {
		header('HTTP/1.1 500 ' . $err);
		echo $err;
		die();

	}

} 
?>
