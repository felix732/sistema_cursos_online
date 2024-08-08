<?php
    include './con_reg.php';
       $id_persona = $_POST['id_persona'];
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
       $direccion = $_POST['direccion'];
       $curso =$_POST['curso'];

    $sql_query = "UPDATE persona SET cedula='$cedula', nombre='$nombre', seg_nombre='$seg_nombre', apellido='$apellido', 
                    seg_apellido='$seg_apellido', sexo='$sexo', telefono='$telefono',correo='$correo', fecha_nac='$fecha_nac', edad='$edad', 
                    direccion='$direccion',parroquia='$parroquia', municipio='$municipio',estado='$estado', curso='$curso' WHERE id_persona = $id_persona";

    $query=$connection->query($sql_query);

    header("Location: ../admin-general/adm-estudiante.php");  

    ?>   