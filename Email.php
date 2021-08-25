<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name       = $_POST["txtUsu"];
$email      = $_POST["txtEmail"];
$fone       = $_POST["txtTel"];
$codAssunto = $_POST["selContat"];

if ($codAssunto == "1") {
    $descrAssunto = "sugestão";
} elseif ($codAssunto == "2") {
    $descrAssunto = "reclamação";
} elseif ($codAssunto == "3") {
    $descrAssunto = "feedback";
}

$subject = "Search Net mensagem - Assunto " . $descrAssunto;

$message = $_POST["txtMsg"];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'equipesearchnet@gmail.com';                     //SMTP username
    $mail->Password   = 'searchnet1234';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = "UTF-8";

    //To load the French version
    $mail->setLanguage('pt_br', '/PHPMailer-master/language/phpmailer.lang-pt_br.php');

    //Recipients

    //Remetente
    $mail->setFrom('equipesearchnet@gmail.com', $name);

    //Destinatario
    $mail->addAddress('equipesearchnet@gmail.com', $name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('equipesearchnet@gmail.com', 'Information');
    //$mail->addCC('equipesearchnet@gmail.com');    
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->AddEmbeddedImage('img/Search_Net.png', 'logo_SN');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<html> <body style='font-family:Raleway'>";
    $mail->Body  .= "<b>Nova Mensagem,</b><br><br>Novo email do Contato.<br><br>";
    $mail->Body .= '<table cellpadding="3">';
    $mail->Body  .= "
                        <tr>
                        <td width='50'> <strong> Nome </strong> </td>
                        <td width='5'> : </td>
                        <td> $name </td>
                        </tr>
                        <tr>
                        <td> <strong> Email </strong> </td>
                        <td> : </td>
                        <td> $email </td>
                        </tr>
                        <tr>
                        <td> <strong> Fone </strong> </td>
                        <td> : </td>
                        <td> $fone </td>
                        </tr>
                        <tr>
                        <td> <strong> Mensagem </strong> </td>
                        <td> : </td>
                        <td> $message </td>
                        </tr>
                        </table>
                        </body>
                        <img src='cid:logo_SN' width='170' height='100'> </html>";;
                        
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Email enviado com Sucesso';
} catch (Exception $e) {
    echo "Erro no envio: {$mail->ErrorInfo}";
} 
/*
require_once("phpmailer/class.phpmailer.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

//VARIAVEIS PARA O ENVIO
$name       = $_POST["txtUsu"];
$email      = $_POST["txtEmail"];
$fone       = $_POST["txtTel"];
$codAssunto = $_POST["selContat"];

if ($codAssunto = "1") {
    $descrAssunto = "Sugestão";
} elseif ($codAssunto = "2") {
    $descrAssunto = "Reclamação";
} elseif ($codAssunto = "3") {
    $descrAssunto = "Feedback";
}

$subject = "Search Net Mensagem - Assunto " . $descrAssunto;

$message = $_POST["txtMsg"];

//INSTANCIADO CLASSE E CONFIGURANDO
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true; // This Must Be True
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; // Your SMTP PArameter
$mail->Port = 465;
$mail->Username = 'equipesearchnet@gmail.com'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = 'searchnet1234'; // Senha do servidor SMTP (senha do email usado)
$mail->CharSet = "UTF-8";
//$mail->SMTPSecure = 'tls'; // Check Your Server's Connections for TLS or SSL

//REMETENTE
$mail->SetFrom("equipesearchnet@gmail.com", "Admin");

//DESTINATARIO
//No caso de fale conosco o destinatário será o administrador café
$nomeDest  = "Mensagem Site";
$emailDest = "equipesearchnet@gmail.com";
$mail->AddAddress($emailDest, $nomeDest);

//SETANDO CORPO DO EMAIL COM HTML
$mail->IsHTML(true);

//PREPARANDO ASSUNTO DO EMAIL
$mail->Subject = $subject;

//CRIANDO CORPO DO EMAIL
$mail_body = "<html> <body>";
$mail_body .= "<b>Olá Admin,</b><br><br>Novo email do Fale Conosco.<br><br>";
$mail_body .= '<table style="" cellpadding="3">';
$mail_body .= "
                    <tr>
                    <td width='50'> <strong> Nome </strong> </td>
                    <td width='5'> : </td>
                    <td> $name </td>
                    </tr>
                    <tr>
                    <td> <strong> Email </strong> </td>
                    <td> : </td>
                    <td> $email </td>
                    </tr>
                    <tr>
                    <td> <strong> Fone </strong> </td>
                    <td> : </td>
                    <td> $fone </td>
                    </tr>
                    <tr>
                    <td> <strong> Mensagem </strong> </td>
                    <td> : </td>
                    <td> $message </td>
                    </tr>
                    </table>
                    </body> </html>";
//COLOCANDO MESSAGE COM HTML NO BODY DO EMAIL
$mail->Body = $mail_body;

if (!$mail->Send()) {
    echo 'Erro no envio de email: ' . $mail->ErrorInfo;
} else {
    echo 'Email enviado com Sucesso';
}
*/
