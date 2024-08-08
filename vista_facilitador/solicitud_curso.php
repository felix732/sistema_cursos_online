<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_aspirante = $_POST['id_aspirante'];
    $estado = $_POST['estado'];
    $id_planificacion = $_POST['id_planificacion'];
    $fecha_inscripcion = date("d-m-y");
    require_once("./conexion_faci.php");

    // Verifica que las IDs no estén vacías antes de realizar la inserción
    if (!empty($id_aspirante) && !empty($id_planificacion)) {
        
        // Validar en la tabla "informacion_academica" antes de realizar la inserción
        $informacion_academica_sql = "SELECT * FROM informacion_academica WHERE id_persona = '$id_aspirante' AND estado = 'PENDIENTE'";
        $informacion_academica_result = $connection->query($informacion_academica_sql);

        if ($informacion_academica_result !== false && $informacion_academica_result->num_rows > 0) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'TODAVIA NO SE ACEPTO TU CURRICULUM',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Volver',
                timer: 5500
              }).then(() => {
                location.assign('a01_vista_faci.php');
              });
        });
        </script>";
        } else {
            $sql = "INSERT INTO solicitud_curso (id_facilitador, id_planificacion, fecha_envio, estado) VALUES ('$id_aspirante', '$id_planificacion', '$fecha_inscripcion', '$estado')";
    
            $resultado = mysqli_query($connection, $sql);

            if ($resultado) {
                echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Solicitud Enviada',
                    text: 'Espere a que se Acepte.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 5500
                  }).then(() => {
                    location.assign('a01_vista_faci.php');
                  });
        });
            </script>
        ";
            } else {
                echo "Error al realizar la inscripción: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error: La ID de aspirante o la ID de planificación está vacía.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
