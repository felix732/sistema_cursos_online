<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilitadores</title>
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
                <li><a class="dropdown-item" href="./cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">Registar Facilitador</h2>
            <br>
            <br>
            <br>
            <center><a href="adm-curso.php" class="btn btn-primary">Atrás</a></center>
            <br>


            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Usuario</th>
                            <th>Clave</th>
                            <th>Correo</th>
                            <th>Curso</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
require_once("../admin-general/conexion_adm.php");

$result = mysqli_query($connection, "SELECT p.id, p.cedula, p.nombre, p.apellido, p.telefono, p.usuario, p.clave, p.correo, c.nombre_curso AS nombre_curso, ia.fecha_envio FROM persona p INNER JOIN informacion_academica ia ON p.id = ia.id_persona INNER JOIN curso c ON ia.id_curso = c.id_curso WHERE ia.estado <> 'PENDIENTE'");

while ($fila = mysqli_fetch_assoc($result)) :
?>
    <tr>
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['cedula']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['apellido']; ?></td>
        <td><?php echo $fila['telefono']; ?></td>
        <td><?php echo $fila['usuario']; ?></td>
        <td><?php echo $fila['clave']; ?></td>
        <td><?php echo $fila['correo']; ?></td>
        <td><?php echo $fila['nombre_curso']; ?></td>
        <td><?php echo $fila['fecha_envio']; ?></td>
        <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id']; ?>">
                <i class="fa fa-trash "></i>
            </button>
        </td>
    </tr>
    <?php include "borrar_facilitador.php"; ?>
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

</html>