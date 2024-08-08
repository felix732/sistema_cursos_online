
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrar Estado</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/registro_estado.css">
</head>
<body>
	<header id="header" class="header">
		<div class="logo">
			<a href=""><img src="img/felix_dev.jpg" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="../adm-curso.php">Inicio</a></li>
				<li><a href="registro_municipio.php">Registrar Municipio</a></li>
				<li><a href="../cerrar_sesion.php">Cerrar Sesion</a></li>
			</ul>
		</nav>
	</header>

	<br>

<div class="container">
	<div class="col-sm-12">
		<h2 style="text-align: center;">REGISTRAR ESTADO</h2>
		<br>
		<div>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar </button>



		</div>
		<br>
		<br>
		<br>


		<div class="container">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require_once("conexion_ve.php");
					$result = mysqli_query($connection, "SELECT * FROM estado");
					while ($fila = mysqli_fetch_assoc($result)) :
					?>
						<tr>
							<td><?php echo $fila['id_estado']; ?></td>
							<td><?php echo $fila['n_estado']; ?></td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id_estado']; ?>">
									<i class="fa fa-edit "></i>
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id_estado']; ?>">
                                        <i class="fa fa-trash "></i>
                                    </button>
							</td>
							<?php include "editar_estado.php"; ?>
							<?php include "eliminar_estado.php"; ?>
						<?php endwhile; ?>
						</tr>
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
<?php include "agregar_estado.php"; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>