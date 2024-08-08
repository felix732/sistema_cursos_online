<?php
    include './conexion.php';
    $sql = "SELECT * FROM planificacion WHERE statuss IN ('Activo', 'no_activo', 'en_curso')";
    $resultadoCursos = $connection->query($sql);
    $row_cnt = mysqli_num_rows($resultadoCursos);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felix_DEV | Cursos & Certificados</title>
    <link rel="stylesheet" href="style/a01.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="./style/card.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
    background: linear-gradient(to bottom, #87CEEB, #98FB98);
    margin: 0;
    padding: 0;}
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="a01.html"><img src="img/felix_dev.jpg" alt="felix_dev"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="iniciar_sesion.php">Iniciar Sesion</a></li>
                <li class="reistro"><a href="tipo-persona.html">Quiero Inscribirme</a></li>
            </ul>
        </nav>
    </header>
    <div aling="center" class="slider">
        <ul>
            <li>
                <img src="img/img01.jpg">
            </li>
            <li>
                <img src="img/img2.jpg">
            </li>
            <li>
                <img src="img/img3.jpg">
            </li>
            <li>
                <img src="img/img4.jpg">
            </li>
        </ul>

    </div>


    <div class="forum">
        <ul>
            <li><a href="">QUIENES SOMOS</a></li>
            <li><a href="">CONTACTOS</a></li>
            <li><a href="./tipo-persona.html">MIS CURSOS</a></li>
        </ul>
    </div>

    <div class="bib_title">
        <h1 align="center">BIBLIOTECA DE CURSOS</h1>
    </div>


    <div class="container">
    <?php
        while ($row = $resultadoCursos->fetch_assoc()) {
            $curso = $row['curso'];
            $query2 = "SELECT * FROM curso WHERE id_curso = '$curso'";
            $resultado2 = mysqli_query($connection, $query2);
            $fila = mysqli_fetch_assoc($resultado2);
        ?>

            <div class="card">
                <figure>
                    <img src="./img/felix_dev.jpg" alt="Imagen del curso">
                </figure>
                <div class="contenido">
                    <h4><?php echo $fila['nombre_curso']; ?></h4>

                    <?php
                    $estado_curso = $row["statuss"];
                    $razon_no_activo = $row["razon"];
                    $color_fondo = "";
                    $color_letra = "black";

                    if ($estado_curso == "Activo") {
                        $color_fondo = "green";
                        $color_letra = "white";
                    } elseif ($estado_curso == "no_activo") {
                        $color_fondo = "red";
                        $color_letra = "white";
                    } elseif ($estado_curso == "en_curso") {
                        $color_fondo = "orange";
                    }
                    ?>
                    <p style="background-color: <?php echo $color_fondo; ?>; color: <?php echo $color_letra; ?>">Estado:
                        <?php echo $estado_curso; ?>
                    </p><br>
                    <?php
                $fecha_inicio = $row["fecha_inicio"];
                $fecha_cierre = $row["fecha_cierre"];
                ?>
                <p>Tiempo:
                    <?php echo $fecha_inicio; ?> ///
                    <?php echo $fecha_cierre; ?>
                </p><br>
                    <?php
                
                $cupos_disponibles = $row["cupo"];
                echo "<p>Cupos disponibles: $cupos_disponibles</p>";

                if($estado_curso == "no_activo"){
                    echo "<p>Lo sentimos, Este curso esta Apagado.</p>";
                }
                elseif ($cupos_disponibles <= 0) {
                    $estado_curso = "en_curso";
                    $query_update = "UPDATE planificacion SET statuss = 'en_curso' WHERE id_plani = " . $row["id_plani"];
                    mysqli_query($connection, $query_update);
                    echo "<p>Lo sentimos, no hay cupos disponibles para el curso.</p>";
                } else {
                    $estado_curso = "Activo";
                    $query_update = "UPDATE planificacion SET statuss = 'Activo' WHERE id_plani = " . $row["id_plani"];
                    mysqli_query($connection, $query_update);
                    echo '<form method="POST" action="./curso_vista.php">';
                    echo '<button type="submit" class="btn btn-success">Ver más</button>';
                    echo '<input type="hidden" name="curso" value="' . $curso . '">';
                    echo '<input type="hidden" name="plani" value="' . $row["id_plani"] . '">';
                    echo '</form>';
                }

               

            
                if ($estado_curso == "no_activo") {
                    echo '<p class="alert alert-danger">Este Curso está Apagado <br >Razón: ' . $razon_no_activo . '</p>';
                }
                ?>

                </div>
            </div>

        <?php
        }
        ?>
    </div>


    <div class="publicidad">
        <p>
            Desarrollado por Estudiantes de la UPTYAB
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>