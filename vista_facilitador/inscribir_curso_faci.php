<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger la ID de aspirante desde la variable de sesión
    $id_aspirante = $_POST['id_aspirante'];

    // Recoger la ID de planificación desde el formulario
    $id_planificacion = $_POST['id_planificacion'];

    // Obtener la fecha actual
    $fecha_inscripcion = date("d-m-y");

    // Aquí puedes realizar la inserción en la base de datos con las IDs proporcionadas
    require_once("conexion_faci.php");

    // Verifica que las IDs no estén vacías antes de realizar la inserción
    if (!empty($id_aspirante) && !empty($id_planificacion)) {
        // Realizar la inserción
        $sql = "INSERT INTO inscritos (id_persona, id_planificacion, fecha_inscripcion) VALUES ('$id_aspirante', '$id_planificacion', '$fecha_inscripcion')";
        $resultado = mysqli_query($connection, $sql);

        if ($resultado) {
            // Éxito al inscribirse
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Inscrito al Curso',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                }).then(() => {
                    location.assign('cursos_inscritos_faci.php');
                });
            });
            </script>
            ";
        } else {
            // Error al realizar la inscripción
            echo "Error al realizar la inscripción: " . mysqli_error($connection);
        }

        // Restar cupo del curso específico
        $update_sql = "UPDATE planificacion SET cupo = cupo - 1 WHERE id_plani = '$id_planificacion'";
        if ($connection->query($update_sql) === TRUE) {
            // Éxito al actualizar los cupos disponibles
            echo "Cupos actualizados correctamente.";
        } else {
            // Error al actualizar los cupos disponibles
            echo "Error al actualizar los cupos disponibles: " . $connection->error;
        }
    } else {
        // Error: La ID de aspirante o la ID de planificación está vacía.
        echo "Error: La ID de aspirante o la ID de planificación está vacía.";
    }
} else {
    // Acceso no permitido.
    echo "Acceso no permitido.";
}

// Resto de tu código
$sql = "SELECT curso, cupo, id_plani FROM planificacion";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $curso = $row["curso"];
        $cupos_disponibles = $row["cupo"];
        $id_planificacion = $row["id_plani"];

        if ($cupos_disponibles > 0) {
            
            $cupos_disponibles--;

            $update_sql = "UPDATE planificacion SET cupo = $cupos_disponibles WHERE id_plani = '$id_planificacion'";
            if ($connection->query($update_sql) === TRUE) {
                
                echo ".";
            } else {
                echo "Error al actualizar los cupos disponibles para el curso '$curso': " . $connection->error;
            }
        }
    }
} else {
    echo "No se encontraron cursos en la base de datos.";
}

$connection->close();
?>
