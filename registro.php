<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <style>
      

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "arial";
    font-size: 14px;
}
body {
            background-color: #007bff; 
            color: white; 
            margin: 0;
            padding: 0;
        }

        .cont_persona {
            display: flex;
            align-items: center; 
        }

        .datos_persona {
            background-color: #fff;
            border-radius: 25px;
            margin: 25px;
            padding: 25px;
            width: 50%; 
        }

        .imagen_lateral {
            flex: 1; 
            text-align: center;
            transform: translate(-30%, -30%); 
        }

        .imagen_lateral img {
            max-width: 100%; /* Ajusta la imagen al ancho del contenedor */
            border-radius: 25px; /* Agrega bordes redondeados */
        }

.header {
    background-color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    /*con esto, los items se centran entre arriba y abajo*/
    height: 70px;
    /*con esto se le da altura a la barra*/
    padding: 5px 10%;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
}

.header .logo {
    cursor: pointer;
    /*con esto se muestra que se le puede poner la manito al logo*/
}
.correo{
            margin-left: -35%;
        }
.alineacion {
            text-align: left; /* Alinea los elementos a la izquierda */
        }
        .fecha_nacimiento,
        .fechita {
            text-align: left;
           transform: translate(-1px, 0);
        }

        .sexos {
            display: flex;
            align-items: center;
            margin-left: 5px; /* Ajusta el margen izquierdo según sea necesario */
        }

        .sexo-label {
            margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
        }

        .sexos input,
        .nacido {
            margin-left: 5px; /* Ajusta el margen izquierdo según sea necesario */
        }


header .logo img {
    /*con esto llamo al header, luego a la clase "logo" y luego a la imagen dentro de esa clase*/
    height: 50px;
    width: auto;
    transition: all 0.3s;
    /*con esto es la transicion*/
}

.reistro {
    background-color: #ff8000;
    border-radius: 10px 10px 10px 10px;
    padding: 20px 10px 10px 10px;
}


/*a continuacion se realiza lo que hace que crezca el logo*/

.header .logo img:hover {
    transform: scale(1.2);
    /*con esto se hace que crezca el logo*/
}

.header .nav-links {
    list-style: none;
    /*con esto se le quitan los puntos a las listas*/
}

.header .nav-links li {
    display: inline-block;
    /*con esto se alinean las tablas*/
    padding: 0 20px;
    /*el 20px es la distancia al rededor de las lineas*/
}


/*con esto se le añade el estilo a las letras*/

.header .nav-links li:hover {
    transform: scale(1.2);
    /*con esto hace crecer las letras*/
}

.header .nav-links li a:hover {
    /*con esto se le cambia el color al zoom de las letras*/
    color: black;
}


/*a continuacion se le hacen unos detalles a los links*/

.header .nav-links a {
    font-size: 17px;
    color: #162B4E;
    /*con esto se le cambia el color a la letra*/
    text-decoration: none;
}


/*--------------------------------------------------------------------------------------------*/

.cont_persona:hover {
    transform: scale(1.01);
}

.datos_persona {
    background-color: #fff;
    border-radius: 25px;
    margin: 25px 25px 25px 25px;
    padding: 25px;
}

input {
    padding: 8px 25px;
    margin: 5px 8px;
    border-radius: 7px;
    text-align: left;
    text-transform: uppercase;
    background-color: #fff;
    color: #493713;
}

input:hover {
    transform: scale(0.99);
}

.correo {
    text-align: center;
    padding: 8px 75px;
    width: 470px;
}

.title1 h2 {
    font-size: 24px;
    color: #302e2a;
}

h2 {
    color: #31250d;
    text-transform: uppercase;
}

.sexos {
    margin-bottom: px;
    margin-bottom: 25px;
}

.fecha_nacimiento {
    margin-top: 10px;
    margin-bottom: -15px;
}

.alineacion {
    align-content: center;
    text-align: center;
}

.direc {
    margin-bottom: 10px;
}

.direc h2 {
    margin-top: 10px;
}

select {
    align-items: center;
    align-content: center;
    padding: 8px 25px;
    border-radius: 7px;
    font-size: 14px;
    text-transform: uppercase;
}



.comunidad1 {
    margin-top: 25px;
    background-color: seagreen;
}

.input-envio {
    background-color: #005eff;
    cursor: pointer;
    border: #dacd17;
    margin-top: 25px;
    color: #fff;
    padding: 15px 55px;
}

.input-envio:hover {
    transform: scale(1.2);
}

.comunidad {
    text-align: center;
    width: 455px;
}

.nacido {
    padding: 7px 51px;
    width: 465px;
    text-align: center;
    align-items: center;
}

.direct {
    width: 450px;
}

.edad {
    width: 465px;
    text-align: center;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <!-- jQuery 3.x CDN -->
    <script src="./js/jquery.min.js"></script>

    <script src="./js/bootstrap.min.js"></script>
    <style>
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
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="a01.html"><img src="img/felix_dev.jpg" alt="logo institucional"></a>
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
            <form name="persona" id="formulario" action="registro_envio.php" method="POST">

                <div class="title1"><h2>mi registro al curso</h2><br></div>
    
                <input  type="text" id="cedula" name="cedula" placeholder="cedula" maxlength="10" required>
    
                <input  type="text" name="nombre" placeholder="nombre" id="nombre" maxlength="60" required autocapitalize="words"><br>
    
                <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre">
            
                <input  type="text"  id="apellido" name="apellido" placeholder="Apellido" maxlength="60" required><br>
    
                <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo Apellido">
            
                <input  type="number" name="telefono" id="telefono" placeholder="numero de Telefono" maxlength="11" required><br>
                <input type="hidden" value="3" name="id_rol">
                <input  type="text" name="usuario" placeholder="usuario" id="" maxlength="60" required>
                <input  type="password" name="clave" placeholder="clave" id="" maxlength="60" required><br><br>
                <div class="alineacion">
                <input class="correo" type="email" name="correo" placeholder="Correo" maxlength="100" required><br><br>
                    <div id="info"></div>
                    <div class="fecha_nacimiento">
                        <h2>SEXO   :<input class="sexos" type="radio" name="sexo" value="M" id="radioM">
                            <label class="sexo-label" for="radioM">M</label>

                            <input class="sexos" type="radio" name="sexo" value="F" id="radioF" checked>
                            <label class="sexo-label" for="radioF">F</label></h2><br><br>
                        
                        <div class="fechita">
                            <h2>Fecha Nac. </h2>
                            <input type="date" name="fecha_nac" id="date" class="nacido">
                        </div>
                    </div>
                </div> <br>

                <input type="text" id="edad" name="edad" class="edad" readonly placeholder="tu edad es" >

    
                <div id="datos_representante">        
                    <div class="title1"><h2>Datos del representante</h2><br></div>
    
                    <input  type="text" id="cedula" name="cedula_rep" placeholder="cedula" maxlength="10" >

                    <input  type="text" name="nombre_rep" placeholder="nombre" id="nombre" maxlength="60"><br>

                    <input  type="text"  id="apellido" name="apellido_rep" placeholder="Apellido" maxlength="60"><br>
                </div><br><br>
                    <h3>DIRECCION:</h3>
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
            </div>
            <div class="registro-section">
                <p>¿Ya tienes una cuenta?</p>
                <a href="./iniciar_sesion.php" class="btn btn-success">Iniciar Sesion</a>
            </div>
            <input type="submit" name="registro" value="REGISTRARME AHORA" class="input-envio"><br>
        </form>
        <a href="tipo-persona.html"><input type="button" name="registro" value="volver atras" class=""></a>
        </div>

        <div class="imagen_lateral">
            <img src="studiante.jpg" alt="estudiante estudiando">
        </div>
    </div>
    <script>
    const date = document.getElementById("date");
    const edad = document.getElementById("edad");
    const calcular = (date) => {
        const fechaActual = new Date();
        const anoActual = parseInt(fechaActual.getFullYear());
        const mesActual = parseInt(fechaActual.getMonth()) + 1;
        const diaActual = parseInt(fechaActual.getDate());

        const anoNacimiento = parseInt(String(date).substring(0, 4));
        const mesNacimiento = parseInt(String(date).substring(5, 7));
        const diaNacimiento = parseInt(String(date).substring(8, 10));
        let edad = anoActual - anoNacimiento;
        if (mesActual < mesNacimiento) {
            edad--;
        } else if (mesActual === mesNacimiento) {
            if (diaActual < diaNacimiento) {
                edad--;
            }
        }

        return edad;
    };

    window.addEventListener('load', function () {
        let ocultarDivDatosRepresentante = document.getElementById("datos_representante");
        ocultarDivDatosRepresentante.style.display = "none";

        // Agregar una condición para validar la edad
        if (parseInt(calcular(edad.value)) < 12) {
            alert("Lo siento, solo se permiten aspirantes de 12 años o más.");
        }

        date.addEventListener('change', function () {
            if (this.value) {
                edad.value = calcular(this.value);
                console.log(edad.value);

                // Ocultar o mostrar el elemento con ID datos_representante según la edad
                const datosRepresentante = document.getElementById("datos_representante");
                if (parseInt(edad.value) < 18) {
                    datosRepresentante.style.display = "block";
                } else {
                    datosRepresentante.style.display = "none";
                }
            }
        });
    });


    const selectElement = document.getElementById("muni");
    const infoElement = document.getElementById("info");

    selectElement.addEventListener("change", function() {
        const selectedCourse = selectElement.value;

        if (selectedCourse !== "") {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "registro_ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    infoElement.textContent = xhr.responseText;
                }
            };
            xhr.send("registro=true&curso=" + selectedCourse);
        } else {
            infoElement.textContent = "";
        }
    });
   
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
