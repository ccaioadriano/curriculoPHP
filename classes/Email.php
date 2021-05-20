<?php
//CLASSE CONFIGURA O ENVIO DE E-MAIL

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

    class Email
    {
        function __construct(){

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            $envio = $_GET['acao'];

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'caiobhadriano@gmail.com';                     //SMTP username
                $mail->Password = 'Senha';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //DESTINATÁRIO
                $mail->setFrom('caiobhadriano@gmail.com',  'Caio Adriano');
                $mail->addAddress('ccaioadriano@gmail.com', 'Caio Adriano');     //Add a recipient
                //CASO HAJA CÓPIA
                //$mail->addBCC('bcc@example.com');

                //ANEXO
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //NOME DO ANEXO
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //CONTEUDO
                $mail->isHTML(true);                                  //ACEITA HTML
                $mail->Subject = '$email_home';
                $mail->Body    = '$email_body';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if($mail->send()){
                    echo 'Email enviado com sucesso!!';
                }
            } catch (Exception $e) {
                    echo "ERRO NO PHPMAILER: {$mail->ErrorInfo}";
            }
        }
    }
    
?>
