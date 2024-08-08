<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <style>
        #searchInput {
            width: 10%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transform: translate(850%, 60%);
        }
        body {
            background: linear-gradient(to right, #b3e0ff, #66ff66);
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .container {
            transform: translate(-10%, 0);
            max-width: 100vh;
            height: 100%;
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

.header .nav-links li a:hover{ 
	color: black; 
}
.header .nav-links a{
	font-size: 17px;
	color: #162B4E;
	text-decoration: none;
}
.table-div {
            border-radius: 20px;
            border: none;
        }
        #formm {
            width: 3000px;
            border-radius: 20px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
            transform: translate(1%, 0);
        }
        #agregarr{
            transform: translate(140%, 350%);
        }
        #backk{
            transform: translate(370%, 185%);
        }
   
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
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
    <h2 style="text-align: center;">Personas Registradas</h2>
    <div class="containerr">
    <div class="table-div">
        <div class="col-sm-12">
            <br>
            <div>
                <button type="button"  id="agregarr" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar </button>
            </div><br>
            <a href="adm-curso.php" id="backk" class="btn btn-primary">Atrás</a>
            <input type="text" class="form-control" id="searchInput" placeholder="Buscar..."><br>


            <div class="container" id="formm">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
				        <th>Cedula</th>
				        <th>Nombre</th>
                        <th>Seg. Nombre</th>
				        <th>Apellido</th>
				        <th>Seg. Apellido</th>
				        <th>Telefono</th>
				        <th>Usuario</th>
                        <th>CLave</th>
                        <th>Email</th>
				        <th>Direccion</th>
                        <th>ROL</th>
				        <th>Editar/Info/Elim.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT 
                        p.id,
                        p.cedula,
                        p.nombre,
                        p.seg_nombre,
                        p.apellido,
                        p.seg_apellido,
                        p.telefono,
                        p.sexo,
                        p.usuario,
                        p.clave,
                        p.correo,
                        p.fecha_nac,
                        p.parroquia,
                        p.direccion,
                        r.rol AS rol,
                        p.cedula_rep,
                        p.nombre_rep,
                        p.apellido_rep
                    FROM persona p
                    INNER JOIN roles r ON p.id_rol = r.id
                    WHERE p.id_rol NOT IN (1)
                ");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                            <td><?php echo $fila['id']?></td>
					        <td><?php echo $fila['cedula']?></td>
					        <td><?php echo $fila['nombre']?></td>
					        <td><?php echo $fila['seg_nombre']?></td>
					        <td><?php echo $fila['apellido']?></td>
					        <td><?php echo $fila['seg_apellido']?></td>
					        <td><?php echo $fila['telefono']?></td>
                            <td><?php echo $fila['usuario']?></td>
                            <td><?php echo $fila['clave']?></td>
                            <td><?php echo $fila ['correo']?></td>
					        <td><?php echo $fila['direccion']?></td>
                            <td><?php echo $fila ['rol']?></td>
                                <td>
                                <a href="editar_persona.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                                </a>

                                    <a href="borrar_estudiante.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar al Usuario?')">
                                    <i class="fa fa-trash"></i>
                                    </a>


                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <?php include "agregar_estudiante.php"; ?>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>