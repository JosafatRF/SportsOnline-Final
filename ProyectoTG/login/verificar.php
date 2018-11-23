<?php
session_start();
include '../conexion.php';
$consulta=("select * from administrador where Usuario='".$_POST['Usuario']."' AND 
 					Password='".$_POST['Password']."'");
	$query=mysqli_query($conexion,$consulta);
	while ($f=mysqli_fetch_array($query)) {
		$arreglo[]=array('Nombre'=>$f['Nombre'],
			'Apellido'=>$f['Apellido'],'Imagen'=>$f['Imagen']);
	}
	if(isset($arreglo)){
		$_SESSION['Usuario']=$arreglo;
		header("Location:../admin.php");
	}else{
		header("Location:../login.php?error=datos no validos");
	}
?>