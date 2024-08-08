
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrar Parroquias</title>
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
			<a href="../adm-curso.php"><img src="img/felix_dev.jpg" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="../adm-curso.php">Inicio</a></li>
				<li><a href="./registro_municipio.php">Municipios</a></li>
				<li><a href="../cerrar_sesion.php">Cerrar Sesion</a></li>
			</ul>
		</nav>
	</header>

	<br>

<div class="container">
	<div class="col-sm-12">
		<h2 style="text-align: center;">REGISTRAR PARROQUIAS</h2>
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
						<th>Nombre Parroquia</th>
						<th>Municipio de la Parroquia</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php
    require_once("conexion_ve.php");

    $result = mysqli_query($connection, "SELECT * FROM parroquia");

    while ($fila = mysqli_fetch_assoc($result)) :
        $municipio_id = $fila['n_municipio'];
        
        // Consulta para obtener el nombre del municipio
        $municipio_query = mysqli_query($connection, "SELECT municipio FROM municipio WHERE id_municipio = '$municipio_id'");
        $municipio_nombre = mysqli_fetch_assoc($municipio_query)['municipio'];
    ?>
						<tr>
							<td><?php echo $fila['id_parroquia']; ?></td>
							<td><?php echo $fila['n_parroquia']; ?></td>
							<td><?php echo $municipio_nombre; ?></td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id_parroquia']; ?>">
									<i class="fa fa-edit "></i>
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id_parroquia']; ?>">
                                        <i class="fa fa-trash "></i>
                                    </button>
							</td>
							<?php include "./editar_parroquia.php"; ?>
							<?php include "./borrar_parroquias.php"; ?>
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
<?php include "agregar_parroquia.php"; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>