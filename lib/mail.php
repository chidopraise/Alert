<?php
// Adjust the path as necessary
require 'phpmailer/PHPMailer-master/src/Exception.php';
require 'phpmailer/PHPMailer-master/src/PHPMailer.php';
require 'phpmailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
        // Server settings
        $mail->SMTPDebug = 2;                                     // Enable verbose debug output
        $mail->isSMTP();                                          // Set mailer to use SMTP
        $mail->Host       = 'us2.smtp.mailhostbox.com';           // Specify main and backup SMTP servers        
		$mail->SMTPAuth   = true;                  				// Enable SMTP authentication
        $mail->Username   = 'alert@abrahamlivinus.tech';          // SMTP username
        $mail->Password   = 'Pd$^FqINx0';                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('alert@abrahamlivinus.tech', 'ALERT');
        $mail->addAddress($_REQUEST['re'], $_REQUEST['rn']);   // Add a recipient
        $mail->addReplyTo('alert@abrahamlivinus.teck', 'alert');

        // Content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = $_REQUEST['es'];
        $mail->Body    = $_REQUEST['eb'];
        $mail->AltBody = $_REQUEST['eab'];

        $mail->send();
        echo 'Message has been sent';
        echo"<script type='text/javascript'>alert('CONGRATULATIONS: A Link And Code Has Been Sent To Your Email Address. Click The Link Or Provide The Code To Confirm Your Email And Have Access To Your Account, Check Your Spam/junk For The Mail !!!'); window.location.href= '../index.php'; </script>";
} catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo"<script type='text/javascript'> alert('You Are Registered But Message Could Not Be Sent. Mailer Error: Contact Support For Manual Confirmation.'); window.location.href= '../index.php'; </script>";
}
?>