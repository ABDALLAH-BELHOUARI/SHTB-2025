<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../libs/phpmailer/PHPMailer.php";
require_once "../libs/phpmailer/SMTP.php";
require_once "../libs/phpmailer/Exception.php";

function sendMailing($Sujet, $Message, $Destinataire, $PJS = false, $Reply = 'contact@location-archedenoe.fr')
{
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = "smtp.hostinger.fr";
    $mail->SMTPAuth = true;
    $mail->Username = "contact@location-archedenoe.fr";
    $mail->Password = 'Iadn@2024';
    $mail->Port = 587;
    $mail->SMTPSecure = "SSL";

    $mail->From = "contact@location-archedenoe.fr";
    $mail->FromName = "Locations Arche de Noé";

    $mail->addAddress($Destinataire);
    $mail->isHTML(true);

    if ($PJS) {
        $mail->addAttachment($PJS);
    }

    $mail->addReplyTo($Reply);

    $mail->Subject = $Sujet;
    $mail->Body = $Message;

    return $mail->send() ? true : false;
}
