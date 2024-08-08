<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["email"];

    // Configura la conexión SMTP
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp-mail.outlook.com';  // Cambia esto por tu servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Fundacite123@hotmail.com'; // Cambia esto por tu dirección de correo
        $mail->Password   = 'yaracuy123'; // Cambia esto por tu contraseña
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Configura el remitente y el destinatario
        $mail->setFrom('Fundacite123@hotmail.com', 'Fundacite');
        $mail->addAddress($to);

        // Asunto y cuerpo del correo
        $mail->Subject = 'Bienvenido/a';
        $mail->Body    = '¡Gracias por registrarte! Bienvenido/a a nuestro sitio.';

        // Envía el correo
        $mail->send();

        // Redirecciona o muestra un mensaje de éxito
        echo ("ENVIADO");
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
