<?php
  session_start();
  	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ../index.php?Error=Acceso denegado");
	}
  require '../../conexion.php';
  $message = '';
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
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>SportsOnline</h1>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="../../admin.php">Ultimas Compras</a></li>
	    <li><a href="./modificar.php" >Modificar Usuario</a></li>
	    <li><a href="#" class="selected">Agregar Usuario</a></li>
	    <li><a href="../../admin/modificar.php" >Productos</a></li>
	    <li><a href="../salir.php">Salir</a></li>
	  </menu>
	</nav>
		<?php if(!empty($message)):?>
		<p><?=$message?></p>
	<?php endif; ?>
	<center><h1>Agregar un Nuevo Usuario</h1></center>
	<form action="agregarUsuario.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Usuario<br>
			<input type="text" name="usuario">
		</fieldset>
		<fieldset>
			Contraseña<br>
			<input type="password" name="password">
		</fieldset>
		<fieldset>
			Fecha Nacimiento<br>
			<input type="date" name="FechaNac">
		</fieldset>
		<fieldset>
			Correo<br>
			<input type="text" name="correo">
		</fieldset>
		<input type="submit" name="accion" value="Enviar" class="aceptar">
	</form>	
	
		</form>
	</section>
</body>
</html>