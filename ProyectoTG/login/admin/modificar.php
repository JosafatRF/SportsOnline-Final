<?php
	session_start();
	include "../../conexion.php";
	if(isset($_SESSION['Usuario'])){
	}else{
		header("Location: ../index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./modificar.js"></script>
</head>
<body>
	<header>
		<h1>SportsOnline</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
			<menu>
				<li><a href="../../admin.php">Ultimas Compras</a></li>
				<li><a href="./modificar.php" class="selected">Modificar Usuario</a></li>
	    		<li><a href="./agregarUsuario.php">Agregar Usuario</a></li>
				<li><a href="../../admin/modificar.php" >Productos</a></li>
	    		<li><a href="../salir.php">Salir</a></li>
			</menu>
		</nav>
		<h1>Modificar y/o Eliminar</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Fecha Nacimiento</td>
				<td>correo</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
			$resultado="select * from usuarios";
			$query=mysqli_query($conexion,$resultado);
			while($row=mysqli_fetch_array($query)){
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row[0].'">'.$row[0].'
					</td>
					<td><input type="text" class="usuario" value="'.$row[1].'"></td>
					<td><input type="text" class="fecha" value="'.$row[3].'"></td>
					<td><input type="text" class="correo" value="'.$row[4].'"></td>
					<td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	</section>
</body>
</html>