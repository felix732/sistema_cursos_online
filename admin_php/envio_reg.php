<?php
include './con_reg.php';
       $cedula = $_POST['cedula'];
       $nombre =$_POST['nombre'];
       $seg_nombre = $_POST['seg_nombre'];
       $apellido = $_POST['apellido'];
       $seg_apellido = $_POST['seg_apellido'];
       $telefono = $_POST['telefono'];
       $correo = $_POST['correo'];
       $sexo = $_POST['sexo'];
       $fecha_nac = date('Y-m-d', strtotime($_POST['fecha_nac']));
       $edad = $_POST['edad'];
       $estado = $_POST['estado'];
       $municipio = $_POST['municipio'];
       $parroquia = $_POST['parroquia'];
       $dir_casa = $_POST['direccion'];
       $curso =$_POST['curso'];


       $sql_query = "INSERT INTO persona(cedula, nombre, seg_nombre, apellido, seg_apellido,
       telefono, correo, sexo, fecha_nac, edad, estado, municipio, parroquia, direccion, curso)
                   VALUES ('$cedula','$nombre','$seg_nombre','$apellido','$seg_apellido',
                   '$telefono','$correo','$sexo','$fecha_nac','$edad','$estado',
                   '$municipio','$parroquia','$direccion','$curso')";


       $query=$connection->query($sql_query);

       header("Location: ../admin-general/adm-estudiante.php");  
?>