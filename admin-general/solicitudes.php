<?php
include_once './conexion_adm.php';


if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM informacion_academica WHERE estado <> 'ACEPTADA'";
$resultado = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Trabajo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- jQuery 3.x CDN -->
      <script src="../admin-general/js/jquery.min.js"></script>



<script src="../admin-general/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Solicitudes de Trabajo</h2>
        <a href="adm-curso.php" class="btn btn-primary">Atrás</a><br><br>
        <!-- ... tus botones existentes ... -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Curriculum</th>
                    <th>Curso a Postular</th>
                    <th>Fecha de Envío</th>
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

                        // Obtener y mostrar el nombre y apellido del facilitador
                        $idFacilitador = $fila['id_persona'];
                        $idCurso = $fila['id_curso'];
                        $consultarCurso = "SELECT nombre_curso FROM curso WHERE id_curso = $idCurso";
                        $consultaFacilitador = "SELECT nombre, apellido FROM persona WHERE id = $idFacilitador";
                        $resultadoFacilitador = mysqli_query($connection, $consultaFacilitador);
                        $resultadoCurso = mysqli_query($connection, $consultarCurso);
                        $informacionFacilitador = mysqli_fetch_assoc($resultadoFacilitador);
                        $informacionCurso = mysqli_fetch_assoc($resultadoCurso);

                        echo "<td>" . $informacionFacilitador['nombre'] . "</td>";
                        echo "<td>" . $informacionFacilitador['apellido'] . "</td>";

                        echo "<td>" . $estado . "</td>";
                        echo '<td><a href="../admin-general/descargar_curri.php?id=' . $fila['id'] . '" class="btn btn-primary">
                        <i class="fas fa-download"></i></a></td>';
                        echo "<td>" . $informacionCurso['nombre_curso'] . "</td>";
                        echo "<td>" . $fila['fecha_envio'] . "</td>";
                        echo '<td>';
                        echo '<a href="aceptar_soli.php?id=' . $fila['id'] . '" class="btn btn-success"><i class="fas fa-check"></i> Aceptar</a>';
                        echo '<a href="rechazar_soli.php?id=' . $fila['id'] . '" class="btn btn-danger"><i class="fas fa-times"></i> Rechazar</a>';
                        echo '</td>';
                        echo "</tr>";

                        mysqli_free_result($resultadoFacilitador);
                    }
                    mysqli_free_result($resultado);
                } else {
                    echo "Error al obtener las solicitudes: " . mysqli_error($connection);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include "./consultar_curso_modal.php";?>
</body>
</html>
