<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos necesarios de PHPMailer
require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];

    $codigo = generarCodigo();

    enviarCorreo($correo, $codigo);

    actualizarCodigoEnBD($correo, $codigo);

    // Redirige a cambio-clave-confirmacion.php
    header("Location: cambio-clave-cofirmarcion.php");
    exit(); // Asegura que no se ejecute más código después de la redirección
}

function generarCodigo() {
    $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeros = '0123456789';

    $codigo = '';
    for ($i = 0; $i < 3; $i++) {
        $codigo .= $letras[rand(0, strlen($letras) - 1)];
        $codigo .= $numeros[rand(0, strlen($numeros) - 1)];
    }

    return $codigo;
}

// Función para enviar el código por correo electrónico
function enviarCorreo($correo, $codigo) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Fundacite123@hotmail.com';
    $mail->Password = 'yaracuy123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del correo electrónico
    $mail->setFrom('Fundacite123@hotmail.com', 'Fundacite|Yaracuy');
    $mail->addAddress($correo);
    $mail->Subject = 'Código de recuperación de clave';
    $mail->Body = 'Tu código de recuperación es: ' . $codigo;

    if ($mail->send()) {
        echo 'Correo enviado correctamente.';
    } else {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}

// Función para actualizar el código en la base de datos
function actualizarCodigoEnBD($correo, $codigo) {
    include './conexion.php';

    // Verifica la conexión
    if ($connection->connect_error) {
        die("Error de conexión: " . $connection->connect_error);
    }

    // Escapa los datos para evitar inyecciones SQL
    $correo = $connection->real_escape_string($correo);
    $codigo = $connection->real_escape_string($codigo);

    // Actualiza el código en la tabla "aspirante"
    $sql = "UPDATE aspirante SET codigo = '$codigo' WHERE correo = '$correo'";

    if ($connection->query($sql) === TRUE) {
        echo "Código actualizado en la base de datos correctamente";
    } else {
        echo "Error al actualizar el código: " . $connection->error;
    }

    // Cierra la conexión
    $connection->close();
}
?>
