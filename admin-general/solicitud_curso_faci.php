<?php
include_once './conexion_adm.php';


if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM solicitud_curso WHERE estado <> 'ACEPTADA'";
$resultado = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Curso para Facilitar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- jQuery 3.x CDN -->
      <script src="../admin-general/js/jquery.min.js"></script>



<script src="../admin-general/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Solicitudes de Curso</h2>

        <a href="consulta_plani.php" class="btn btn-primary">Atrás</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Planificacion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $estado = $fila['estado'];
                        $background = $estado == 'PENDIENTE' ? 'background-color: orange;' : '';
                        echo "<tr style='$background'>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['id_facilitador'] . "</td>";
                        echo "<td>" . $fila['id_planificacion'] . "</td>";
                        echo "<td>" . $estado . "</td>";
                        echo '<td>';
                        echo '<a href="./accion_de_curso.php?id=' . $fila['id'] . '" class="btn btn-success"><i class="fas fa-check"></i> Aceptar</a>';
                        echo '<a href="./accion_de_curso.php?id=' . $fila['id'] . '" class="btn btn-danger"><i class="fas fa-times"></i> Rechazar</a>';
                        echo '</td>';
                        echo "</tr>";
                    }
                    mysqli_free_result($resultado);
                } else {
                    echo "Error al obtener las solicitudes: " . mysqli_error($connection);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
