<?php
if (isset($email_user)) {
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'soulaima.hleli@esprit.tn';                 // SMTP username
$mail->Password = 'rxilpwgcaeaywild';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@soulaima.com', 'no-reply');
$mail->addAddress($email_user);     // Add a recipient
echo $email_user;
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);   


$link='localhost/mouhanned/Views/front/verifierUtilisateur.php?email='.$email_user;

$mail->Subject = 'Bienvenue EDITED';
$mail->Body = 'Bonjour ' .$nom_user.' '.$prenom_user .',
                <br><br>
                Nous sommes heureux de vous avoir parmi nous. <br><br>
                Afin de compléter la création de votre compte, veuillez vérifier votre adresse mail en appuyant sur le lien ci dessous. 
                <br> <a href="'.$link.'"> verifier </a>
                <br><br>
                Cordialement.'.'
                <br><br>
               this message was sent from an unmonitored address . Please do not reply to this address.<br><br>Best regards,<br>soulaima hleli';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: sign-in.php');
    echo 'Message has been sent';
}
//---------------------end sending mail -----------//
header('Location: sign-in.php');

}else {
    header('Location: sign-in.php');
}
?>