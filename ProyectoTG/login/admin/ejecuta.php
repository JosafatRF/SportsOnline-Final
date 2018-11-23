<?php 
	include "../../conexion.php";
	if($_POST['Caso']=="Eliminar"){
		mysqli_query($conexion,"delete from usuarios where Id=".$_POST['Id']);
		echo 'El Usuario se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){
		mysqli_query($conexion,"update usuarios set Usuario='".$_POST['Usuario']."' where Id=".$_POST['Id']);
		mysqli_query($conexion,"update usuarios set Edad='".$_POST['Edad']."' where Id=".$_POST['Id']);
		mysqli_query($conexion,"update usuarios set Fecha='".$_POST['Fecha']."' where Id=".$_POST['Id']);
		mysqli_query($conexion,"update usuarios set Correo='".$_POST['Correo']."' where Id=".$_POST['Id']);
		echo 'El Usuario se ha modificado';
	}

?>