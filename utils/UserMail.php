<?php
require_once "utils/PHPMailer/PHPMailer.php";
require_once "utils/PHPMailer/Exception.php";
require_once "utils/PHPMailer/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
Class UserMail
{
    public static function EnvoyerMail($destinataire,$sujet,$message)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '********';
            $mail->Password   = '***********';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('*******', 'Damien Dev');
            $mail->addAddress($destinataire);

            $mail->isHTML(true);
            $mail->Subject = $sujet;
            $mail->Body    = $message;

            $mail->send();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        }
    }
}
?>