<?php
// header('Content-Type: text/html; charset=UTF-8');
session_start();



use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$toemails = array();

$toemails[] = array(
	// 'email' => 'interdual.control@gmail.com', // Your Email Address

'email' => 'direccion@kindergandhi.com.mx', // Your Email Address
'name' => utf8_decode('Kinder Gandhi') // Your Name
);


// // Form Processing Messages
$message_success = 'Mensaje enviado, en breve te contactaremos.';

// Add this only if you use reCaptcha with your Contact Forms
$recaptcha_secret = ''; // Your reCaptcha Secret

$mail = new PHPMailer();

// If you intend you use SMTP, add your SMTP Code after this Line




if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( $_POST['template-contactform-email'] != '' ) {



		$name = isset($_POST['template-contactform-name']) ?  $_POST['template-contactform-name'] : '';
		$email = isset( $_POST['template-contactform-email'] ) ? $_POST['template-contactform-email'] : '';
		$phone = isset( $_POST['template-contactform-phone'] ) ? $_POST['template-contactform-phone'] : '';
		$subject = isset( $_POST['template-contactform-subject'] ) ? $_POST['template-contactform-subject'] : '';
		// $service = isset( $_POST['template-contactform-service'] ) ? $_POST['template-contactform-service'] : '';
		$message = isset( $_POST['template-contactform-message'] ) ? $_POST['template-contactform-message'] : '';

		$subject = $subject ? utf8_decode($subject) : utf8_decode('kindergandhi.com');

		$botcheck = $_POST['template-contactform-botcheck'];

		if( $botcheck == '' ) {

			$mail->SetFrom( "direccion@kindergandhi.com.mx" , utf8_decode("WEB") );
			$mail->AddReplyTo( $email , $name );
			foreach( $toemails as $toemail ) {
				$mail->AddAddress( $toemail['email'] , $toemail['name'] );
			}
			$mail->Subject = $subject;

			$name = isset($name) ? "Nombre : $name<br>" : '';
			$email = isset($email) ? "Email: $email<br>" : '';

			$phone = isset($phone) ? "Contacto: $phone<br>" : '';
			$message = isset($message) ? "Mensaje: $message" : '';

			$referrer = "Enviado desde kindergandhi.com.mx";

			$body = "$name $email $phone $message <br>  $referrer";

			// Runs only when File Field is present in the Contact Form
			if ( isset( $_FILES['template-contactform-file'] ) && $_FILES['template-contactform-file']['error'] == UPLOAD_ERR_OK ) {
				$mail->IsHTML(true);
				$mail->AddAttachment( $_FILES['template-contactform-file']['tmp_name'], $_FILES['template-contactform-file']['name'] );
			}

			// Runs only when reCaptcha is present in the Contact Form
			if( isset( $_POST['g-recaptcha-response'] ) ) {

				$recaptcha_data = array(
					'secret' => $recaptcha_secret,
					'response' => $_POST['g-recaptcha-response']
				);

				$recap_verify = curl_init();
				curl_setopt( $recap_verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify" );
				curl_setopt( $recap_verify, CURLOPT_POST, true );
				curl_setopt( $recap_verify, CURLOPT_POSTFIELDS, http_build_query( $recaptcha_data ) );
				curl_setopt( $recap_verify, CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $recap_verify, CURLOPT_RETURNTRANSFER, true );
				$recap_response = curl_exec( $recap_verify );

				

				$g_response = json_decode( $recap_response );

				if ( $g_response->success !== true ) {
					echo '{ "alert": "error", "message": "Captcha not Validated! Please Try Again." }';
					die;
				}
			}

			// Uncomment the following Lines of Code if you want to Force reCaptcha Validation

			// if( !isset( $_POST['g-recaptcha-response'] ) ) {
			// 	echo '{ "alert": "error", "message": "Captcha not Submitted! Please Try Again." }';
			// 	die;
			// }

			$mail->MsgHTML( $body );


			$sendEmail = $mail->Send();


// $sendEmail= true;

			if( $sendEmail == true ):


echo '{ "paso": "no", "alert": "success", "message": "' . $message_success . '" }';

			else:
				echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
			endif;
		} else {
			echo '{ "alert": "error", "message": "Bot <strong>Detected</strong>.! Clean yourself Botster.!" }';
		}
	} else {
		echo '{ "alert": "error", "message": "Please <strong>Fill up</strong> all the Fields and Try Again." }';
	}
} else {
	echo '{ "alert": "error", "message": "An <strong>unexpected error</strong> occured. Please Try Again later." }';
}

?>