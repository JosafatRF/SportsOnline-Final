<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>SportsOnline</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Detalles</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
		  	<menu>
		    	<li><a href="./">Inicio</a></li>
		    	<li><a href="./login.php" class="selected">Administrador</a></li>
		    	<li><a href="./login/index.php">Perfil</a></li>
		  	</menu>
		</nav>  
		<?php
			include 'conexion.php';
			$ide=$_GET['id'];
			$consulta="select * from productos where id='$ide'";
			$query=mysqli_query($conexion,$consulta);
			while($f=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>

		<div class='producto'>
			<center>
				<img src='./productos/<?php echo $f['imagen'];?>'><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<a href="./carritodecompras.php?id=<?php echo $f['id'];?>">Añadir al carrito de compras</a>
			</center>
		</div>
		<?php
			}
		?>
		<center><a href="./">Ver catalogo</a></center>

	</section>
</body>
</html>