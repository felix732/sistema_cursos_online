<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Cursos</title>
    <link rel="stylesheet" href="style-adm/adm-curso.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #b3e0ff, #66ff66);
            margin: 0;
            padding: 0;
        }
    </style>
    <!-- jQuery 3.x CDN -->
    <script src="../admin-general/js/jquery.min.js"></script>



    <script src="../admin-general/js/bootstrap.min.js"></script>
</head>

<body>
    <header id="header" class="header">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <!-- MENU header -->
        <nav>
            <ul class="nav-links">
                <li><a href="adm-curso.php">Panel Control</a></li>
                <li><a href="planif-11.php">Planificacion</a></li>
                <li><a href="../cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <br>

<div class="container">
    <div class="col-sm-12">
        <h2 style="text-align: center;">Registar Cursos</h2>
        <br>
        <div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar Curso </button>
        </div>
        <br>
        <br>
        <br>


        <div class="container">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Curso</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../admin-general/conexion_adm.php");
                    $result = mysqli_query($connection, "SELECT * FROM curso");
                    while ($fila = mysqli_fetch_assoc($result)):
                    ?>
                        <tr>
                            <td><?php echo $fila['id_curso']; ?></td>
                            <td><?php echo $fila['nombre_curso']; ?></td>
                            <td><?php echo $fila['categoria_curso']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id_curso']; ?>">
                                    <i class="fa fa-edit "></i>
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id_curso']; ?>">
                                    <i class="fa fa-trash "></i>
                                </button>


                            </td>

                        </tr>
                        <?php include "editar_curso.php"; ?>
                        <?php include "eliminar_curso.php"; ?>
                        
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<style>
a {
    text-decoration: none;
}

.s {
    padding-top: 50px;
    text-align: center;
}
</style>

<?php include "form-curso.php"; ?>

</html>