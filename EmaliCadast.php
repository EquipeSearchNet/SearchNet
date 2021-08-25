<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$cnpj = $_POST['$cnpj'];
$nome = $_POST['$nome'];
$email = $_POST['$email'];

$token = MD5($cnpj);
$linkUsu = "http://localhost/Company/np.php?token=$token";


$mail = new PHPMailer(true);

$subject = "Search Net - Validação de provedora " . $nome;

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Usernome   = 'equipesearchnet@gmail.com';                     //SMTP usernome
    $mail->Password   = 'searchnet1234';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = "UTF-8";

    //To load the French version
    $mail->setLanguage('pt_br', '/PHPMailer-master/language/phpmailer.lang-pt_br.php');

    //Recipients

    //Remetente
    $mail->setFrom('equipesearchnet@gmail.com', $nome);

    //Destinatario
    $mail->addAddress($email, $nome);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('equipesearchnet@gmail.com', 'Information');
    //$mail->addCC('equipesearchnet@gmail.com');    
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->AddEmbeddedImage('img/Search_Net.png', 'logo_SN');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional nome

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<html> <body style='font-family:Raleway'>";
    $mail->Body  .= "<b>Boa noite, $nome</b><br><br>Confirme seu cadastro.<br><br>";
    $mail->Body .= '<table cellpadding="3">';
    $mail->Body  .= "
            <tr>
            <td width='50'> <strong> Nome </strong> </td>
            <td width='5'> : </td>
            <td> $nome </td>
            </tr>
            <tr>
            <td> <strong> Email </strong> </td>
            <td> : </td>
            <td> $email </td>
            </tr>
            <tr>
            <td> <strong><a href='$linkUsu'>Validar minha conta.</a></strong></td>
            </tr>
            </table>
            </body>
            <img src='cid:logo_SN' width='170' height='100'> </html>";;

    $mail->AltBody = $subject;

    $mail->send();
    echo 'Email enviado com Sucesso';
} catch (Exception $e) {
    echo "Email enviado com Sucesso: {$mail->ErrorInfo}";
}
?>