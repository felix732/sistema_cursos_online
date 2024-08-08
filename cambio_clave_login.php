<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/iniciar_sesion.css">
    <link rel="stylesheet" href="style/header.css">

    <title>Recuperacion de clave</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="a01.html"><img src="FC.png" alt="logo institucional"></a>
        </div>
    </header>

    <center>
        <div class="contenedor">
            <div class="form">
                <h2 class="inicio-sesion"> Recuperacion de clave</h2>
                <form action="cambio_clave.php" name="inicio-sesion" method="post">
                    <input type="email" placeholder="Correo Electrónico" name="correo"><br>
                    <input type="submit" value="Enviar Codigo" class="enviador">
                </form>
                <button class="volver-atras"><a href="iniciar_sesion.php">Volver Atrás</a></button>
            </div>

            <div class="imagen">
                <img src="estudiante.jpg" alt="estudiante" class="imagen">
            </div>
        </div> 
    </center>
</body>

</html>
