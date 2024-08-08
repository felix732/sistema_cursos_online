<?php
session_start();
include './conexion_faci.php';
$sql = "SELECT id_curso, nombre_curso FROM curso";
$resultado = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Curriculum</title>
  <style>
    body {
      background: linear-gradient(to right, #87CEEB, #00FA9A);
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    #form-container {
      background-color: #ffffff;
      border-radius: 15px; /* Borde ligeramente circular */
      padding: 20px;
      width: 300px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9f9f9;
      appearance: none; /* Oculta la flecha del select en algunos navegadores */
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23333%3E%3C/svg%3E'); /* Agrega una flecha personalizada */
      background-repeat: no-repeat;
      background-position: right 8px center;
    }

    /* Cambiar el fondo solo para archivos PDF */
    input[type="file"][accept=".pdf"] {
      background-color: #ffcccc; /* Fondo rojo para archivos PDF */
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .pdf {
      background-color: red;
      color: white;
      border-radius: 10%;
      border: solid 4px black;
      width: 50px;
      height: 30px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-left: 5px;
    }
  </style>
</head>
<body>

<div id="form-container">
  <form action="envio_curriculum.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">


    <input type="hidden" name="estado" value="PENDIENTE">
    <label for="id_curso">Selecciona curso a Postular:</label>
    <select name="id_curso" id="id_curso" class="form-control" required>
      <option value="" disabled selected>Eliga el Curso...</option>
      <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<option value='" . $fila['id_curso'] . "'>" . $fila['nombre_curso'] . "</option>";
        }
      ?>
    </select>
    <label for="curriculumPDF">Selecciona tu curriculum en <div class="pdf">PDF</div></label>
    <input type="file" name="archivo" id="archivo" class="form-control" required><br><br>

    <button type="submit">Enviar Postulación</button>
  </form>
</div>

</body>
</html>
