<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
require 'config.php';

	$config = new Config;
	

	if( isset($_GET['token']) && isset($_GET['client']) ){
		
		$get_token = $_GET['token'];
		$get_client = $_GET['client'];

		$token = $config->getAppKey();
		$clientToken = $config->getClientKey();

		if($get_token === $token && $clientToken === $get_client){

			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Server settings
			    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'devchuckcamp@gmail.com';                 // SMTP username
			    $mail->Password = 'Mlkmzhcmmtt2016!';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('devchuckcamp@gmail.com', 'Mailer');
			    $mail->addAddress('devchuckcamp@gmail.com', 'Tagoy User');     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    $mail->addReplyTo('devchuckcamp@gmail.com', 'Information');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Here is the subject';
			    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
		}else{
			echo 'Invalid Token:' . $get_token ."<br>";
			echo 'Invalid Client Token:' . $get_client;
		}
	}else{
		echo "No connection";
	}