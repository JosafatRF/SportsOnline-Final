<?php
	include ("../../conexion.php");
	if(!isset($_POST['usuario']) &&  !isset($_POST['password']) && !isset($_POST['fecha']) && !isset($_POST['correo'])){
		header("Location: agregarUsuario.php");
	}else{			
		      		$usuario=$_POST['usuario'];
		      		$password=$_POST['password'];
					$fecha=$_POST['fecha'];
					$correo=$_POST['correo'];
					$Sql="insert into usuarios (usuario,password,edad,FechaNac,correo) values(
							'".$usuario."',
							'".$password."',
							'".$fecha."',
							'".$correo."')";
					mysqli_query($conexion,$Sql);
					header ("Location: agregarUsuario.php");
		    
		  }

		
?>