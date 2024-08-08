<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/SMTP.php';

include './conexion_adm.php';
set_time_limit(60);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoEstado = $_POST["status"];
    $idPlanificacion = $_POST["id"];
    $razon = $_POST["razon"];
    $enviarCorreo = isset($_POST["enviarCorreo"]) ? $_POST["enviarCorreo"] : "";

    // Validación de inputs
    

    if (!$connection) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM planificacion WHERE id_plani = $idPlanificacion";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $curso = $row['curso'];

        // Obtiene todos los correos de los usuarios
        $correosUsuarios = obtenerCorreosUsuarios();

        // Actualiza el estado del curso
        $queryUpdate = "UPDATE planificacion SET statuss = '$nuevoEstado', razon = '$razon' WHERE id_plani = $idPlanificacion";

        if (mysqli_query($connection, $queryUpdate)) {
            // Envía el correo a todos los usuarios si la opción está marcada
            if ($enviarCorreo == "si") {
                foreach ($correosUsuarios as $correoUsuario) {
                    enviarCorreo($correoUsuario, $curso, $nuevoEstado, $razon);
                }
            }

            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro fue actualizado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'CONTINUAR',
                        timer: 10500
                    }).then(() => {
                        location.assign('consulta_plani.php');
                    });
                });
                </script>
            ";
        } else {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en la actualización',
                        text: 'Hubo un problema al intentar actualizar el curso.',
                        showCancelButton: false,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('consulta_plani.php');
                    });
                });
                </script>
            ";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    header("Location: pagina_de_error.php");
    exit();
}

function obtenerCorreosUsuarios() {
    global $connection;

    // Consulta todos los correos de los usuarios registrados
    $query = "SELECT correo FROM persona";
    $result = mysqli_query($connection, $query);

    $correos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $correos[] = $row['correo'];
    }

    return $correos;
}
function obtenerNombreCurso($idCurso)
{
    global $connection;
    $consultaCurso = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso = '$idCurso'");
    $datosCurso = mysqli_fetch_assoc($consultaCurso);

    return $datosCurso['nombre_curso'];
}

function enviarCorreo($correoDestino, $cursoId, $nuevoEstado, $razon) {
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp-mail.outlook.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Fundacite123@hotmail.com'; 
        $mail->Password   = 'yaracuy123'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('Fundacite123@hotmail.com', 'Administracion|Fundacite');
        $mail->addAddress($correoDestino);
        $nombreCurso = obtenerNombreCurso($cursoId);

        if ($nuevoEstado == 'no_activo') {
            $mail->Subject = "Curso $nombreCurso, Esta Apagado";
            $mail->Body = "Estimado usuario,\n\n El curso $nombreCurso se ha apagado por esta. Razón: $razon,  este al pendiente cuando se active";
        } elseif ($nuevoEstado == 'Activo') {
            $mail->Subject = "Curso $nombreCurso activo";
            $mail->Body = "Estimado usuario,\n\n El curso $nombreCurso esta de nuevo en Linea.";
        }

        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


?>
