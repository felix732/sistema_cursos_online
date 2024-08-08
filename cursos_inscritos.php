<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.php");
    exit();
}
include_once './conexion.php';
if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}
$usuario = $_SESSION['id'];
$sql = "SELECT * FROM inscritos WHERE id_persona = '$usuario'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idPlanificacion = $row['id_planificacion'];
    $fecha = $row['fecha_inscripcion'];
} else {
    $idPlanificacion = "No disponible";
    $fecha = "No te haz inscrito a ningún curso";
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style_vistas/headerr.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card {
            max-width: 400px;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(to right, #66bb6a, #0d47a1);
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .bienvenido {
            font-size: 10px;
            font-weight: bold;
            color: #333;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            transform: translateX(40%) translateY(50%);
        }

        .header {
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            padding: 5px 10%;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
            max-width: 400%;
            border-radius: 10px;
        }

        .btn-cerrar {
            transform: translate(-30%, -50%);
            font-size: 10px;
        }

        header .logo img {
            height: 50px;
            width: auto;
            transform: translate(-70%, 0);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Cursos Inscritos</title>
</head>

<body class="d-flex flex-column align-items-center vh-100">
    <header class="header">
        <div class="logo">
            <a href="a01_vista.php"><img src="img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <div class="bienvenido">
                Bienvenido,
                <?php echo $_SESSION['usuario'];?>, a tus Cursos Inscritos
            </div>
            <div class="btn-cerrar">
                <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </nav>
    </header>

    <div class="card mt-3 mx-auto">
    <div class="card-header" id="nombreCurso">
            Curso
        </div>
        <div class="card-body">
        <h5 class="card-title">ID Planificación: <?php echo $idPlanificacion; ?> </h5>
            <p class="card-text">Fecha de entrada: <?php echo $fecha; ?></p>
            <a href="./borrar_curso.php" class="btn btn-danger">Salir del Curso</a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var idPlanificacion = <?php echo $idPlanificacion; ?>;

           
            $.ajax({
                type: "POST",
                url: "id_curso.php",
                data: { idPlanificacion: idPlanificacion },
                success: function (idCurso) {
                    
                    $.ajax({
                        type: "POST",
                        url: "nombre_curso.php",
                        data: { idCurso: idCurso },
                        success: function (response) {
                            $("#nombreCurso").html(response);
                        }
                    });
                }
            });
        });
    </script>
    <script>
    $(document).ready(function () {
        $("a.btn-danger").on("click", function () {
            // Muestra un cuadro de confirmación
            var confirmacion = confirm("¿Estás seguro de que quieres salir del curso?");
            
            if (confirmacion) {
                console.log("El usuario ha confirmado la salida del curso.");
                window.location.href = $(this).attr("href");
            } else {
                console.log("El usuario ha cancelado la salida del curso.");
                return false;
            }
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php

?>
