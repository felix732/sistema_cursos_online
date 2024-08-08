<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Facilitador</title>
    <link rel="stylesheet" href="./style/registro_css.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <!-- jQuery 3.x CDN -->
    <script src="./js/jquery.min.js"></script>



    <script src="./js/bootstrap.min.js"></script>
    <style>
        body{
            background-color: lightblue;
        }
   .cont_persona {
    background-color: lightgreen;
    align-items: center;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    margin: 45px;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
    border-radius: 25px;
   }
    .imagen_lateral img {
    width: 550px;
    height: 550px;
    border-radius: 150px;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
    margin-left: 50px;
}

h2 {
    color: #31250d;
    text-transform: uppercase;
    font-size: 20px;
}
.sexos {
      display: none; 
    }
    .sexo-label {
      display: inline-block;
      background-color: #f0f0f0;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: 1px solid #ccc;
    }

    .sexos:checked + .sexo-label {
      background-color: #007bff;
      color: #fff;
      border: 1px solid #007bff;
    }

    .mensaje-container {
      background-color: lightcoral;
      border: 1px solid #ccc;
      padding: 20px;
      text-align: center;
      font-size: 18px;
      border-radius: 10px;
      transform: translate(100%, -900px);
    }

    .mensaje-text {
      color: #333;
    }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.html"><img src="img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="iniciar_sesion.php">Iniciar Sesion</a></li>
                <li class="reistro"><a href="./tipo-persona.html">Quiero Inscribirme</a></li>
            </ul>
        </nav>
    </header>


    <div class="cont_persona">

        <div class="datos_persona">
            <form name="persona" id="formulario" action="./registro_envio.php" method="POST" enctype="multipart/form-data">

                <div class="title1">
                    <h2>registro de facilitador</h2><br></div>

                <input type="text" id="cedula" name="cedula" placeholder="cedula" maxlength="10" required>

                <input type="text" name="nombre" placeholder="nombre" id="nombre" maxlength="60" required><br>
                <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre">

                <input type="text" id="apellido" name="apellido" placeholder="Apellido" maxlength="60" required><br>
                <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo Apellido">


                <input type="number" name="telefono" id="telefono" placeholder="numero de Telefono" maxlength="11" required><br>
                <input type="hidden" value="2" name="id_rol">
                <input type="text" name="usuario" placeholder="usuario" id="" maxlength="60" required>
                <input type="password" name="clave" placeholder="clave" id="" maxlength="60" required><br><br>
                <div class="alineacion">
                    <input class="email" type="email" name="correo" placeholder="Correo" maxlength="100" required><br>
                    <br>

                    <div class="fecha_nacimiento">
                        <h2>SEXO :</h2>
                        <input class="sexos" type="radio" name="sexo" value="M" id="radioM">
                        <label class="sexo-label" for="radioM">M</label>

                        <input class="sexos" type="radio" name="sexo" value="F" id="radioF" checked>
                        <label class="sexo-label" for="radioF">F</label></h2><br><br>

                        <div class="fechita">
                            <h2>Fecha Nac. </h2>
                            <input type="date" name="fecha_nac" id="date" class="nacido">
                        </div>
                    </div>
                </div> <br>

                <input type="text" id="edad" name="edad" class="edad" readonly placeholder="tu edad es"><br><br>
                <h3>DIRECCION</h3>
                <div class="direc">
            <h2>Estado</h2>
                <select name="estado" id="estado" autocomplete="off" class="direct" onchange="cargarMunicipios()">
                <option value="" disabled selected>Selecciona un Estado</option>
                    <?php
                    include_once 'conexion.php';
                    $queryy = mysqli_query($connection, "SELECT * FROM estado");
                    while ($datos = mysqli_fetch_array($queryy)) {
                    ?>
                <option value="<?php echo $datos['id_estado'] ?>"><?php echo $datos['n_estado'] ?></option>
                <?php
                }
                ?>
                </select>
                <h2>Municipio</h2>
                <select name="municipio" id="municipio" autocomplete="off" class="direct" onchange="cargarParroquia()">
                <option value="" disabled selected>Selecciona un Municipio</option>
                </select>
                    <br>
                <h2>Parroquia</h2>
                <select class="direct" name= "parroquia" id="parroquia" onchange="obtenerIdParroquia()">
                <option value="" disabled selected>Selecciona una Parroquia</option>
                </select><br>
                
            <div>
                <h2>Direccion de la Casa</h2>
                <input class="comunidad"  type="text" name="direccion" placeholder="calle,avenida,comunidad" maxlength="200" required><br>
            </div>
            </div><br><br>
                <div class="registro-section">
                    <p>¿Ya tienes una cuenta?</p>
                    <a href="./iniciar_sesion.php" class="btn btn-success">Iniciar Sesion</a>
                </div>
                        
                   
    
                    <input  type="hidden" id="cedula" value="" name="cedula_rep" placeholder="cedula" maxlength="10" >

                    <input  type="hidden" value="" name="nombre_rep" placeholder="nombre" id="nombre" maxlength="60"><br>

                    <input  type="hidden" value="" id="apellido" name="apellido_rep" placeholder="Apellido" maxlength="60"><br>
                <input type="hidden" name="fecha_registro" value="<?php echo date("Y-m-d H:i:s"); ?>">
                <input type="submit" name="registro" value="REGISTRARME AHORA" class="input-envio"><br><br>
            </form>
            <a href="tipo-persona.html"><input type="button" name="registro" value="volver atras" class=""></a>
        </div>


        <div class="imagen_lateral">
            <img src="./facilitador.png" alt="facilitador">
        </div>
    </div>
    <script>
          const date = document.getElementById("date");
    const edad = document.getElementById("edad");

    const calcularEdad = (fechaNacimiento) => {
        const fechaActual = new Date();
        const fechaNac = new Date(fechaNacimiento);
        const edadMilisegundos = fechaActual - fechaNac;

        const edadAnios = Math.floor(edadMilisegundos / 31536000000);

        return edadAnios;
    };

    date.addEventListener('change', function () {
        if (this.value) {
            const edadCalculada = calcularEdad(this.value);
            edad.value = edadCalculada;
        }
    });

    date.dispatchEvent(new Event('change'));

    function cargarMunicipios() {
    const estadoSelect = document.getElementById("estado");
    const municipioSelect = document.getElementById("municipio");

    const selectedEstado = estadoSelect.value;

    // Realizar la solicitud AJAX para obtener los municipios
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "registro_ajax.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const municipios = JSON.parse(xhr.responseText);

            // Limpiar y actualizar el selector de municipios
            municipioSelect.innerHTML = "<option value='' disabled selected>Selecciona un Municipio</option>";
            municipios.forEach(function(municipio) {
                municipioSelect.innerHTML += "<option value='" + municipio.id + "'>" + municipio.nombre + "</option>";
            });
        }
    };
    xhr.send("estado=" + selectedEstado);
}

function cargarParroquia() {
    const municipioSelect = document.getElementById("municipio");
    const parroquiaSelect = document.getElementById("parroquia");

    const selectedMunicipio = municipioSelect.value;

    // Realizar la solicitud AJAX para obtener las parroquias
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "registro_ajax.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const parroquias = JSON.parse(xhr.responseText);

            // Limpiar y actualizar el selector de parroquias
            parroquiaSelect.innerHTML = "<option value='' disabled selected>Selecciona una Parroquia</option>";
            parroquias.forEach(function(parroquia) {
                parroquiaSelect.innerHTML += "<option value='" + parroquia.id + "'>" + parroquia.nombre + "</option>";
            });
        }
    };
    xhr.send("municipio=" + selectedMunicipio);
}

    </script>


</body>

</html>