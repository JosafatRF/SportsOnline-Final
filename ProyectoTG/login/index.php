<?php  
  session_start();
  require '../conexion.php';
  
  if (!empty($_POST['usuario'])) {
		$sql = "UPDATE usuarios SET usuario='$_POST[usuario]', FechaNac='$_POST[FechaNac]', correo='$_POST[correo]' WHERE id='$_SESSION[user_id]'";
		$stmt = $conexion->prepare($sql);
		$stmt->execute();
		
		if($stmt->execute()){
			$message='Datos Actualizados Correctamente';
			}else{
				$message='Ocurrio un error al actualizar los datos';
			}
		}

  
  if (isset($_SESSION['user_id'])) {
    $query = "SELECT id, usuario, password, FechaNac, correo FROM usuarios WHERE id ='".$_SESSION['user_id']."'";
    $consul = mysqli_query($conexion, $query);
    $results = mysqli_fetch_array($consul);
  }
  else{
    header('Location: ./login.php');  
  }
  $user = null;
  
  if (count($results) > 0) {
    $user = $results;
  } 
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<title>index</title>
</head>
<body>
	<header>
		<br>
		<h1>SportsOnline</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
		<nav class="menu2">
		  <menu>
		    <li><a href="../index.php" class="selected">Tienda</a></li>
		    <li><a href="./salir.php" >Salir</a></li>
		  </menu>
		</nav>
	</header>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	<div>
	<?php if(!empty($user)): ?>
		<center><h1>Bienvenido <?=$user['usuario']?></h1></center>
	<div class="left">
	<aside>
		<section>
		<form action="" method="POST">	
			<br>Usuario: <input type="text" name="usuario" value="<?= $user['usuario']?>">
			<br>Fecha de Nacimiento: <input type="date" name="FechaNac" value="<?= $user['FechaNac'] ?>">
			<br>Su correo: <input type="text" name="correo" value="<?= $user['correo'] ?>">
			<br><input type="submit" name="actualizar" value="Actualizar">
		</form>
		</section>
	</aside>
	</div>
	<form action="" method="POST">
	<div class="main">
	<section>
		<h2>Sus compras</h2>
		<textarea id="texto" name="seccion1"></textarea>
	</section>
	</div>
		</form>
		<?php else: ?>
      <h1> Porfavor Inicie Sesión o Registrese</h1>

      <a href="login.php"> Inicia Sesión</a> or
      <a href="signup.php"> Regístrate</a>
    <?php endif; ?>
</div>
</body>
</html>