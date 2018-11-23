<?php
  session_start();
  $message = '';
  if (isset($_SESSION['user_id'])) {
    header('Location: cerrar.php');    
  }
  require '../conexion.php';
  
  if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {  
    if($_POST['password'] == $_POST['confirm_password']){
      $query = "SELECT id FROM usuarios WHERE usuario ='".$_POST['usuario']."'";
      $consul = mysqli_query($conexion, $query);
      $results = mysqli_fetch_array($consul);
      
      if (count($results) == 0) {
        $query = "INSERT INTO usuarios (usuario, password, FechaNac, correo) VALUES ('".$_POST['usuario']."' ,'".$_POST['confirm_password']."', '".$_POST['FechaNac']."', '".$_POST['correo']."')";
        $consul = mysqli_query($conexion, $query);     
           
        $message = 'Usuario Creado Correctamente';
      }
      else{
        $message = 'El usuario ya existe';
      }
    }else{
      $message="La contraseña no coincide";
    }
    
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!--<link rel="stylesheet" type="text/css" href="./Skate-Shop/css/estilos.css">-->
	<meta charset="utf-8">
	<title>SignUp</title>
	
</head>
<body style="text-align: center;">

	<header style="text-align: left;">
		<h1>SportsOnline</h1>
		</a>
	</header>
	<nav class="menu2">
	  <menu>
	    <li ><a href="../index.php" class="selected">Inicio</a></li>
	    <li ><a href="../login.php" >Administrador</a></li>
	    <li ><a href="index.php">Perfil</a></li>
	  </menu>
	</nav>

	<?php if(!empty($message)):?>
		<p><?=$message?></p>
	<?php endif; ?>
	
	<h1>Registrate</h1>
	<span>ó <a href="./login.php">Acceso</a></span>
	
	<form action="signup.php" method="post">
		<input style="margin: 20px auto;" type="text" name="usuario" placeholder="Ingresa tu Usuario">
		<input style="margin: 20px auto;" type="password" name="password" placeholder="Ingrea tu Contraseña">
		<input style="margin: 20px auto;" type="password" name="confirm_password" placeholder="Confirmar Contraseña">
		<input style="margin: 20px auto;" type="date" name="FechaNac" placeholder="Fecha de Nacimiento">
		<input style="margin: 20px auto;" type="email" name="correo" placeholder="ejemplo@mail.com">
		<br><input type="submit" value="Enviar">
	</form>
</body>
</html>