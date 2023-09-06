<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer(true);

try {
     //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
     $mail->isSMTP();                                            
     $mail->Host       = 'mail.ticketgospel.com.br';                     
     $mail->SMTPAuth   = true;                                   
     $mail->Username   = 'idegoiania@ticketgospel.com.br';                    
     $mail->Password   = 'Yq-SL1rtZ&Vn';                               
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
     $mail->Port       = 465;  

     //Recipients
    $mail->setFrom('idegoiania@ticketgospel.com.br', 'Mailer');   
    $mail->addAddress('idegoiania@ticketgospel.com.br', 'Mailer');              
    
     //Attachments
     $att=$_FILES['exampleFormControlFile1'];

     if(isset($att['name']) and !empty($att['name'])){
     $mail->addAttachment($att['tmp_name'], $att['name']); 
     }

      //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Caravana';
    $mail->Body    = $_POST['message'];    

    $mail->send();
   


    echo 'Mensagem enviada com sucesso';
} catch (Exception $e) {
    echo "Erro ao enviar a mensagem. Mailer Error: {$mail->ErrorInfo}";
}
?>