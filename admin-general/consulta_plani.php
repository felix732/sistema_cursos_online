<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificacion</title>
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
a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
    #dataTable {
        border-radius: 10px;
        overflow: hidden;
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <style>
        .container{
            background-color: white;
            border-radius: 20px;
            border: solid 1px black;
        }
  .icon-button {
    background: none;
    border: none;
    cursor: pointer;
  }
  .btn-status{
    transform: translate(20%, 30%);
  }
  .icon-button i {
    font-size: 24px;
    margin-right: 5px;
  }

  .visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
  }
  .button {
      font-size: 24px;
      background-color: #ff0000; /* Color de fondo del botón */
      color: #ffffff; /* Color del texto */
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      border-radius: 20%;
      transform: translate(2700%, 0);
    }
</style>
    
</head>
<header id="header" class="header">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <!-- MENU header -->
        <nav>
            <ul class="nav-links">
                <li><a class="dropdown-item" href="./adm-curso.php">Panel de Control</a></li>
                <li><a class="dropdown-item" href="./Inscritos.php">Inscritos</a></li>
                <li><a class="dropdown-item" href="./cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header><br>

    <h2 style="text-align: center;">Consulta de Planificacion</h2>
<div class="container">
    <div class="col-sm-12">

        <div class="containerr">
        <br><br>
        <a href="planif-11.php" class="btn btn-primary">Atrás</a><br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cursos</th>
                        <th>Status</th>
                        <th>Razon de Deshabilitar Curso</th>
                        <th>Cupo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Cierre</th>
                        <th>Dias Semanas</th>
                        <th>Facilitador</th>
                        <th>Descripcion</th>
                        <th>Objetivos</th>
                        <th>Fecha Creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once("../admin-general/conexion_adm.php");

                $result = mysqli_query($connection, "SELECT * FROM planificacion");
                while ($fila = mysqli_fetch_assoc($result)) :
                    ?>

                        <tr>
                            <td><?php echo $fila['id_plani']; ?></td>
                            <td><?php echo obtenerNombreCurso($fila['curso']); ?></td>
                            <td><center><?php echo $fila['statuss'];?></center>
                            <form action="status.php">
                                <div class="btn-status">
                            <button type="button" class="icon-button" value="Activo" name="status" data-toggle="modal" data-target="#activar<?php echo $fila['id_plani']; ?>">
                                <i class="fas fa-check-circle" style="color: #00FF00;"></i></button>
 
                            <button type="button" class="icon-button" value="no_activo" name="status" data-toggle="modal" data-target="#razon<?php echo $fila['id_plani']; ?>">
                                <i class="fas fa-times-circle" style="color: #FF0000;"></i>
                                <span class="visually-hidden">No Activo</span>
                            </button>
                            <input type="hidden" name="id" value="<?php echo $fila['id_plani']; ?>">
                        </div>
                            </form>
                        </td>
                            <td><?php echo $fila['razon']; ?></td>
                            <td><?php echo $fila['cupo']; ?></td>
                            <td><?php echo $fila['fecha_inicio']; ?></td>
                            <td><?php echo $fila['fecha_cierre']; ?></td>
                            <td><?php echo $fila['dias_semana']; ?></td>
                            <td><?php echo obtenerNombreFacilitador($fila['facilitador']); ?></td>
                            <td>Ver en Edición</td>
                            <td>Ver en Edición</td>
                            <td><?php echo $fila['fecha_envio']; ?></td>
                            <td>
                            <a href="editar-planificacion.php?id_plani=<?php echo $fila['id_plani']; ?>" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                            </a>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id_plani']; ?>">
                                    <i class="fa fa-trash "></i>
                                </button>


                            </td>

                        </tr>
                        
                        <?php include "./activar_plani.php";?>
                        <?php include "./modal_razon.php";?>
                        <?php include "./eliminar_plani.php"; ?>
                        
                        <?php endwhile; ?>

<?php
function obtenerNombreFacilitador($idFacilitador)
{
    global $connection;
    $consultaFacilitador = mysqli_query($connection, "SELECT nombre, apellido FROM persona WHERE id = '$idFacilitador'");
    $datosFacilitador = mysqli_fetch_assoc($consultaFacilitador);

    return $datosFacilitador['nombre'] . ' ' . $datosFacilitador['apellido'];
}
function obtenerNombreCurso($idCurso)
{
    global $connection;
    $consultaCurso = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso = '$idCurso'");
    $datosCurso = mysqli_fetch_assoc($consultaCurso);

    return $datosCurso['nombre_curso'];
}
?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Al final del archivo, antes de cerrar la etiqueta </body> -->
<script src="../admin-general/js/jquery.min.js"></script>
<script src="../admin-general/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

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