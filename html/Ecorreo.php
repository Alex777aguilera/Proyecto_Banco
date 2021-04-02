<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Mail/Exception.php';
require '../Mail/PHPMailer.php';
require '../Mail/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aguileraa18@gmail.com';                     //SMTP username
    $mail->Password   = 'Alejandro189AAAB';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('aguileraa18@gmail.com', 'Alejandro'); //DE
    $mail->addAddress('alex777aguilera@gmail.com', 'Sr Aguilera');     //Para
    // $mail->addAddress('ellen@example.com');               //Otro, en caso que se envie a varias personas
    // $mail->addReplyTo('info@example.com', 'Information'); // Respuesta del remitente
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Envio de archivos multimedia
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Contenido html avilitado.
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'IMPORTANTE';//Asunto
    $mail->Body    = '<em>En hora buenarda, ya estas participando en el sortedo de <b>1000,000.00 de LPS</b>, por ser uno de nuestros afiliados, un cordial saludo!!.</em> <hr><br><b><em>Este mensaje ha sido enviado desde el localhost!</em></b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //MSJ alternativo

    $mail->send();
    echo 'Mensaje enviado con exito!';
} catch (Exception $e) {
    echo "<b>Fatal Error!<b>: {$mail->ErrorInfo}";
}
