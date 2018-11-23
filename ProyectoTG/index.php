<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/carrusel.css">
	<meta charset="utf-8"/>
	<title>SportsOnline</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/cabecera-Login-cuenta.css">
	<script type="text/javascript" href="./js/scripts.js"></script>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" charset="utf-8">
		  $(window).load(function() {
		    $('.flexslider').flexslider({
		    	touch: true,
		    	pauseOnAction: false,
		    	pauseOnHover: false,
		    });
		  });
		</script>
</head>
<body>
	<header>
		<h1>SportsOnline</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	
	<section>

	<nav class="menu2">
	  <menu>
	    <li ><a href="./" class="selected">Inicio</a></li>
	    <li ><a href="./login.php" >Administrador</a></li>
	    <li ><a href="login/index.php">Perfil</a></li>
	  </menu>

	  <div id="botones">
				<a href="login/login.php">
					<button class="btn-IniSesion">Iniciar Sesion</button>
				</a>
				<a href="login/signup.php">
					<button class="btn-crearUsuario">Crear cuenta</button>
				</a>
			</div>
	</nav>
	<!--AQUI INICIA EL CARRUSEL/-->
			<div  class="flexslider">
				<ul class="slides">
					<li>
							<img src="productos/imagen1.jpg">
					</li>
					<li>
							<img src="productos/imagen13.jpg">
					</li>
					<li>
							<img src="productos/imagen20.jpg">
					</li>
					<li>
							<img src="productos/imagen15.jpg">
					</li>
					<li>
							<img src="productos/imagen7.jpg" alt="">
					</li>
					<li>
						<img src="productos/imagen11.jpg" alt="">
					</li>
				</ul>
			</div>
			<!--AQUI TERMINA EL CARRUSEL/-->

		<?php
			include ('conexion.php');
			$consulta="select * from productos";
			$query=mysqli_query($conexion,$consulta);
			while($f=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>

		<div class='producto'>
			<center>
				<img src='./productos/<?php echo $f['imagen'];?>'><br>
				<span><?php echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?php echo $f['id'];?>">ver</a>
			</center>
		</div>
		<?php
			}
		?>
	</section>

	<!--redes sociales/-->
	<div class="social">
			<ul>
				<li><a href="http://www.facebook.com" target="_blank" class="icon icon-facebook"></a></li>
				<li><a href="http://www.twitter.com" target="_blank" class="icon-twitter"></a></li>
				<li><a href="https://www.whatsapp.com/?l=es" target="_blank" class="icon-whatsapp"></a></li>
				<li><a href="http://www.instagram.com" target="_blank" class="icon-instagram"></a></li>
			</ul>
		</div>
</body>
</html>