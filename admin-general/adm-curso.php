<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="style-adm/adm-curso.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #b3e0ff, #66ff66);
            margin: 0;
            padding: 0;
        }
       .dropdown-menu {
            background-color: #f9f9f9;
            animation: fadeIn 0.3s ease-out; /* Agregar animación de desvanecimiento */
        }

        .dropdown-item:hover {
            background-color: #ddd;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <header id="header" class="header">
        <div class="logo">
            <a href=""><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <!-- MENU header -->
        <nav>
            <ul class="nav-links">
                <li><a href="planif-11.php">Planificacion</a></li>
                <li><a href="solicitudes.php">Solicitudes</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Regiones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_estado.php">Estados</a></li>
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_municipio.php">Municipios</a></li>
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_parroquias.php">Parroquias</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configuración
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../cambio_clave_login.php">Cambiar Clave</a></li>
                        <li><a class="dropdown-item" href="">Manual de Usuario</a></li>
                        <li><a class="dropdown-item" href="./cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!--AHORA VIENEN LAS CARDS-->
    <div class="contenedor">
        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/pizarra.jpg" alt="">
            </figure>
            <h3>Personas</h3>
            <p>Personas Inscritas podras Editar/Eliminar</p>
            <a href="adm-estudiante.php">Ver Mas</a>
        </div>

        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/pagina.jpg" alt="">
            </figure>
            <h3>FACILITADORES</h3>
            <p>Profesores Inscritos.</p>
            <a href="facilitador.php">Ver Mas</a>
        </div>

        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/castor.jpg" alt="">
            </figure>
            <h3>CURSO</h3>
            <p>Crea y Gestiona Cursos Aca</p>
            <a href="adm-curso-1.php">Ver Mas</a>
        </div>
        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/inscritos.png" alt="">
            </figure>
            <h3>INSCRITOS</h3>
            <p>Usuarios Inscritos.</p>
            <a href="inscritos.php">Ver Mas</a>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>