<?php
if (isset($email_user)) {
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'soulaima.hleli@esprit.tn';                 // SMTP username
$mail->Password = 'pzwxfugpkhfcyayi';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@abdou.com', 'no-reply');
$mail->addAddress($email_user);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);   



$mail->Subject = 'annulation de livraison';
$mail->Body = 'Bonjour .,
                <br><br>
                livraion annulé
                Cordialement.'.'
                <br><br>
               this message was sent from an unmonitored address . Please do not reply to this address.<br><br>Best regards,<br>abdou';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
}
//---------------------end sending mail -----------//
}

?>