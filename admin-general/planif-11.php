<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Planificación</title>
    <link rel="stylesheet" href="style-adm/planif-1.css">
    <link rel="stylesheet" href="style-adm/plafi-11.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        * {
    margin: 0;
    padding: 0;
    outline: none;
    font-family: 'Poppins', sans-serif;
}
        body {
            padding: 20px;
            background: linear-gradient(to right, #b0e57c, #56abfb);
            color: #333; /* Color del texto */
        }
        
        .form-container {
            max-width: 500px;
            border-radius: 10px;
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: solid 1px black;
        }

        .form-control {
            border-radius: 8px;
        }
        .header{
            border-radius: 20px;
        }
        .barra-inferior{
            border-radius: 10px;
        }
        #cursoSeleccionado{
            max-width: 40%;
            transform: translate(150%, -163%);
        }
        #faci{
            max-width: 40%;
        }

        #form-labell{
            transform: translate(180%, -297%);
        }
    </style>
</head>
<body>
<header id="header" class="header">
            <div class="logo">
                <a href="adm-general.html"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
            </div>

            <nav>
                <ul class="nav-links">
                    <li><a href="adm-curso.php">Panel Control</a></li>
                    <li><a href="adm-curso-1.php">Curso</a></li>
                    <li><a href="consulta_plani.php">Controlador de Planificación</a></li>
                    <li><a href="./cerrar_sesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
        <div class="barra-inferior">
            <center><h1>Aqui Puedes Consultar o Crear la Planificación</h1></center>
        </div>
<div class="form-container">
    <h1 class="mt-4 mb-4">Crea una Planificación</h1>

    <form action="envio_plani.php" method="POST">
        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <select name="curso" id="curso" autocomplete="off" class="form-select">
                <option value="" disabled selected>Selecciona un Curso</option>
                <?php
                include_once 'conexion_adm.php';
                $queryy = mysqli_query($connection, "SELECT * FROM curso");
                while ($datos = mysqli_fetch_array($queryy)) {
                        ?>
                <option value="<?php echo $datos['id_curso'] ?>"><?php echo $datos['nombre_curso'] ?> - <?php echo $datos['id_curso'] ?></option>
                    <?php
                    }
                ?></td>
            </select>
        </div><br>

        <div class="mb-3">
        <center><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#select">
            Seleccionar Facilitador
		</button></center><br>
        <label for="faci" class="form-label">Facilitador seleccionado|</label>
        <input type="text" class="form-control" id="faci" name="facii" readonly>
        <label for="cursoSeleccionado" class="form-labell" id="form-labell">Curso que Imparte|</label>
        <input type="text" class="form-control" id="cursoSeleccionado" name="cursoSeleccionado" readonly>
        <input type="hidden" id="idPersona" name="faci" value="">
        </div>

        <input type="hidden" name="status" value="Activo">
        <div class="mb-3">
            <label for="cupos" class="form-label">Cupos del Curso</label>
            <input type="number" class="form-control" id="max-registrations" name="max-registrations" required>
        </div>

        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
        </div>

        <div class="mb-3">
            <label for="fechaCierre" class="form-label">Fecha de Cierre</label>
            <input type="date" class="form-control" name="fecha_cierre" required>
        </div>

        <div class="mb-3">
            <label for="diasSemana" class="form-label">Días de la Semana</label>
            <select name="dias" id="" class="form-select" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
						    </select>
        </div><br>

        
        <span>No Poner Tantos Caracteres 500 Maximo:</span>
        <div class="mb-3">
            <label for="objetivos" class="form-label">Objetivos</label>
            <textarea class="form-control" id="objetivos" name="objetivos" rows="3" maxlength="500" required></textarea>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="500" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <center>
                <a href="adm-curso.php"><input type="button" name="Volver Atras" value="Volver Atras" class="volver"></a>
            </center>
    </form>
</div>
<?php include './obtener_facilitador.php';?>

<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var maxRegistrationsInput = document.getElementById("max-registrations");
                        var maxRegistrations = maxRegistrationsInput.value;

                        
                        document.querySelector('.next-1').addEventListener('click', function () {
                            var fechaInicio = new Date(document.getElementsByName("fecha_inicio")[0].value);
                            var fechaCierre = new Date(document.getElementsByName("fecha_cierre")[0].value);

                            
                            var diferencia = fechaCierre - fechaInicio;

                          
                            var diasDiferencia = Math.ceil(diferencia / (1000 * 60 * 60 * 24));

                            
                            var botonSiguiente = document.querySelector('.next-1');

                            if (diasDiferencia < 7) {
                                alert("Primer Aviso: La diferencia entre la fecha de inicio y cierre debe ser de al menos una semana no se enviara la Planificacion si es necesario recargue la pagina.");                             botonSiguiente.disabled = true;
                            } else {
                                botonSiguiente.disabled = false;
                            }
                        });
                    });
               
var maxRegistrationsInput = document.getElementById("max-registrations");
var maxRegistrations = maxRegistrationsInput.value;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>              
<script>
    function seleccionarFacilitador(idPersona, nombreFacilitador, cursoSeleccionado) {
        document.getElementById('faci').value = nombreFacilitador;
        document.getElementById('idPersona').value = idPersona;
        document.getElementById('cursoSeleccionado').value = cursoSeleccionado;
        $('#select').modal('hide');
    }
</script>
    </body>

    </html>