<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: ./ProyectoTG.php');    
  }
  require '../conexion.php';
  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {    
    
    $query = "SELECT id, usuario, password, FechaNac, correo FROM usuarios WHERE usuario ='".$_POST['usuario']."'AND password = '".$_POST['password']."'";
    $consul = mysqli_query($conexion, $query);
    $results = mysqli_fetch_array($consul);
    $message = '';   
    
    if (count($results) >0 ) {
      $_SESSION['user_id'] = $results["id"];
      header("Location: index.php");
      #echo '<script>location.href="partials/header.php;</script>';
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<meta charset="utf-8">
	<title>Login</title>
	
</head>
<body style="text-align: center;">
  <header style="text-align: left;">
    <h1>SportsOnline</h1>
  </header>
  <nav class="menu2">
    <menu>
      <li ><a href="../index.php" class="selected">Inicio</a></li>
      <li ><a href="../login.php" >Administrador</a></li>
      <li ><a href="index.php">Perfil</a></li>
    </menu>
  </nav>
	<h1>Acceso</h1>
	<span>ó <a href="./signup.php">Registrate</a></span>
	<?php if (!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	<form action="login.php" method="post">
		<input style="margin: 20px auto;" type="text" name="usuario" placeholder="Ingresa tu Usuario">
		<input style="margin: 20px auto;" type="password" name="password" placeholder="Ingrea tu Contraseña">
		<input type="submit" value="Enviar">
		
	</form>

</body>
</html>