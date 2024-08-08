<?php
  include './con_reg.php';
  $id_persona = $_POST['id_persona'];
  $query="SELECT * FROM persona";
  $resultado=$connection->query($query);
  $row = mysqli_fetch_array($resultado);

  $masculino = "";
  $femenino = "";
  $robotica = "";
  $ingles = "";
  $frances = "";
  $portugues = "";
  $aleman = "";
  $ruso = "";
  $coreano = "";
  $informatica = "";

  $cm_sanfelipe ="";
  $albarico ="";
  $salom ="";
  $temerla ="";

  $municipio ="";
  $san_felipe = "";
  $independencia ="";

  $estado ="";
  $yaracuy ="";

  if($row['sexo'] == "M"){
    $masculino = "checked";
  }
  else{
    $femenino = "checked";
  }

  switch ($row['curso']) {
    case 'robotica':
        $robotica = "selected";
        break;
    case 'ingles':
        $ingles = "selected";
        break;
    case 'frances':
        $frances = "selected";
        break;
    case 'portugues':
        $portugues = "selected";
        break;
    case 'aleman':
        $aleman = "selected";
        break;
    case 'ruso':
        $ruso = "selected";
        break;
    case 'coreano':
        $coreano = "selected";
        break;
    case 'informatica':
        $informatica = "selected";
        break;
}
	switch($row['parroquia']) {
		case 'cm_sanfelipe':
			$cm_sanfelipe = "selected";
			break;
		case'albarico':
			$albarico = "selected";
			break;
		case'salom':
			$salom = "selected";
			break;
		case'temerla':
			$temerla = "selected";
			break;
}
switch($row['municipio']) {
	case 'municipio':
		$municipio = "selected";
		break;
	case'san_felipe':
		$san_felipe = "selected";
		break;
	case'independencia':
		$independencia = "selected";
		break;
	}
switch($row['estado']) {
	case 'estado':
		$estado = "selected";
		break;
	case 'yaracuy':
		$yaracuy = "selected";
		break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Estudiante</title>
	<link rel="stylesheet" href="../admin-general/style-adm/form-estudiante.css">
</head>
<body>
	<header id="header" class="header">
		<div class="logo">
			<a href="../admin-general/adm-general.html"><img src="../admin-general/adm-interna/adm-img/FC.png" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="../admin-general/adm-general.html">Panel Control</a></li>
				<li><a href="../admin-general/adm-estudiante.php">Panel Estudiante</a></li>
				<li><a href="">Configuracion</a></li>
				<li><a href="">Cerrar Sesion</a></li>
			</ul>
		</nav>

	</header>
<center>

<div class="contenido-estud">

<form name="persona" action="./editar_estudiante_sql.php" method="post">
	<section class="form-register">
<table align="center">

	<h2 align="center" class="titulo">REGISTRO DE ESTUDIANTES</h2>
	<tr>
		<td><input class="controls" value="<?php echo $row['cedula']?>" type="text" name="cedula" placeholder="cedula" maxlength="10" required></td>
	</tr>
	<tr>
		<td><input class="controls" value="<?php echo $row['nombre']?>" type="text" name="nombre" placeholder="nombre" maxlength="60" required></td>
	</tr>
	<tr>
		<td><input type="text" value="<?php echo $row['seg_nombre']?>" name="seg_nombre" id="" placeholder="Segundo Nombre"></td>
	</tr>
		<tr>
		<td><input class="controls" value="<?php echo $row['apellido']?>" type="text" name="apellido" placeholder="Apellido" maxlength="60" required></td>
	</tr>
	<tr>
		<td><input type="text" value="<?php echo $row['seg_apellido']?>" name="seg_apellido" id="" placeholder="Segundo Apellido"></td>
	</tr>
	</tr>
		<tr>
		<td><input class="controls" value="<?php echo $row['telefono']?>" type="text" name="telefono" placeholder="numero de Telefono" maxlength="11" required></td>
	</tr>

	<tr>
		<td><input type="email" name="correo" value="<?php echo $row['correo']?>" placeholder="Correo"></td>
	</tr>

	<tr class="sexos1">
		<td><h2>SEXO   :<input class="sexos" type="radio" name="sexo" value="M" <?php echo $masculino?>>M
		<input class="sexos" type="radio" name="sexo" value="F" <?php echo $femenino?>> F</h2></td>
	<tr>
		<div class="conteudo">
		<td class="fech-nac"><h2>Fecha Nac. </h2><input type="date" value="<?php echo $row['fecha_nac']?>" name="fecha_nac" id="" class="select"></td>
		</div>
	</tr>
	<tr>
		<td><input type="text" name="edad" value="<?php echo $row['edad']?>" id="edad" placeholder="edad"></td>
	</tr>
	<td>
        <select name="curso" id="">
        	<option value="robotica" <?php echo $robotica?>>Robotica</option>
        	<option value="ingles" <?php echo $ingles?>>ingles</option>
        	<option value="frances" <?php echo $frances?>>frances</option>
        	<option value="portugues" <?php echo $portugues?>>portugues</option>
        	<option value="aleman" <?php echo $aleman?>>aleman</option>
        	<option value="ruso" <?php echo $ruso?>>ruso</option>
        	<option value="coreano" <?php echo $coreano?>>coreano</option>
        	<option value="informatica" <?php echo $informatica?>>informatica</option>
        </select>
        </td>
	<tr>
		<td><input type="text" name="direccion" value="<?php echo $row['direccion']?>" id="" placeholder="calle, casa, comunidad"></td>
	</tr>
		<tr>
		<td><select name="parroquia" id="" >
			<option value="cm_sanfelipe" <?php echo $cm_sanfelipe?>>cm_sanfelipe</option>
			<option value="albarico" <?php echo $albarico?>>albarico</option>
			<option value="salom" <?php echo $salom?>>Salom</option>
			<option value="temerla" <?php echo $temerla?>>temerla</option>
		</select></td>
	</tr>

	<tr>
		<td><select name="municipio" id="" >
			<option value="municipio" <?php echo $municipio?>>municipio</option>
			<option value="san_felipe" <?php echo $san_felipe?>>San felipe</option>
			<option value="independencia" <?php echo $independencia?>>independencia</option>
		</select></td>
	</tr>

	<tr>
		<td><select name="estado" id="">
			<option value="estado" <?php echo $estado?>>estado</option>
			<option value="yaracuy" <?php echo $yaracuy?>>yaracuy</option>
		</select></td>
	</tr>

        <tr class="centrado">
           <td class="centrar"><button type="submit" name="registro" class="input-envio"><input type="hidden" name="id" value="<?php echo $id ?>">EDITAR</button</td>
    </tr>
    <tr class="centrado">
           <td class="centrar"><a href="../admin-general/adm-estudiante.php"><input type="button" name="registro" value="volver atras" class="input-envio"></a></td>
    </tr>
    </section>
</form>
 </div>
</center>


	
</body>
</html>