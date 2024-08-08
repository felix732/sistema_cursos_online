<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    <style>
        body {
            background: linear-gradient(to right, #b3e0ff, #66ff66);
            margin: 0;
            padding: 0;
        }
    .header{
	background-color: #fff;
	display: flex;
	justify-content: space-between;
	align-items: center; /*con esto, los items se centran entre arriba y abajo*/
	height: 70px; /*con esto se le da altura a la barra*/
	padding: 5px 10%; 
	box-shadow: 0px 1px 10px rgba(0,0,0,0.2);

}

.header .logo{
	cursor: pointer; /*con esto se muestra que se le puede poner la manito al logo*/
}

header .logo img{ /*con esto llamo al header, luego a la clase "logo" y luego a la imagen dentro de esa clase*/
	height: 50px;
	width: auto;
	transition: all 0.3s; /*con esto es la transicion*/
}

.reistro{
	background-color: #ff8000;
	border-radius: 10px 10px 10px 10px;
	padding: 20px 10px 10px 10px;

}

.header .logo img:hover{
	transform: scale(1.2); /*con esto se hace que crezca el logo*/
}

.header .nav-links{
	list-style: none; /*con esto se le quitan los puntos a las listas*/
}

.header .nav-links li{
	display: inline-block; /*con esto se alinean las tablas*/
	padding: 0 20px; /*el 20px es la distancia al rededor de las lineas*/
}

/*con esto se le añade el estilo a las letras*/
.header .nav-links li:hover{
		transform: scale(1.2); /*con esto hace crecer las letras*/
}

.header .nav-links li a:hover{ /*con esto se le cambia el color al zoom de las letras*/
	color: black; 
}
/*a continuacion se le hacen unos detalles a los links*/
.header .nav-links a{
	font-size: 17px;
	color: #162B4E; /*con esto se le cambia el color a la letra*/
	text-decoration: none;
}
.table-div{
    background-color: white;
    border-radius: 20px;
    border: none;
}
#searchInput {
            width: 10%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transform: translate(850%, 50%);
        }
#atras{
    transform: translate(0, 165%);
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

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
                <li><a class="dropdown-item" href="./consulta_plani.php">Consulta de Planificacion</a></li>
                <li><a class="dropdown-item" href="./cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">INSCRITOS</h2>
            <br>
            <br>
            <br>
            <br>


            <div class="container">
            <div class="table-div">
            <a href="adm-curso.php" class="btn btn-primary" id="atras">Atrás</a>
            <input type="text" class="form-control" id="searchInput" placeholder="Buscar..."><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aspirante</th>
                            <th>Curso</th>
                            <th>Fecha de Inscripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
require_once("../admin-general/conexion_adm.php");

$result = mysqli_query($connection, "SELECT * FROM inscritos");

while ($fila = mysqli_fetch_assoc($result)) :
    $aspirante_id = $fila['id_persona'];
    
   
    $aspirante_query = mysqli_query($connection, "SELECT nombre, apellido FROM persona WHERE id = '$aspirante_id'");
    $aspirante_info = mysqli_fetch_assoc($aspirante_query);
    $nombre_aspirante = $aspirante_info['nombre'];
    $apellido_aspirante = $aspirante_info['apellido'];


    $id_planificacion = $fila['id_planificacion'];
    $curso_query = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso IN (SELECT curso FROM planificacion WHERE id_plani = '$id_planificacion')");
    $curso = mysqli_fetch_assoc($curso_query);
    $nombre_curso = $curso['nombre_curso'];
?>
    <tr>
        <td><?php echo $fila['id_inscripcion']; ?></td>
        <td><?php echo $nombre_aspirante . ' ' . $apellido_aspirante; ?></td>
        <td><?php echo $nombre_curso; ?></td>
        <td><?php echo $fila['fecha_inscripcion']; ?></td>
        <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id_inscripcion']; ?>">
                <i class="fa fa-trash "></i>
            </button>
        </td>
    </tr>
    <?php include "borrar_ins.php"; ?>
<?php endwhile; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
<script>
        $(document).ready(function() {
        // Función para manejar el evento de cambio en el input de búsqueda
        $('#searchInput').on('input', function() {
            // Obtén el valor del input de búsqueda
            var searchTerm = $(this).val().toLowerCase();

            // Filtra las filas de la tabla según el término de búsqueda
            $('#dataTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
            });
        });
    });
</script>

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


</html>