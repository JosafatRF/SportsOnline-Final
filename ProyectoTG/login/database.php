<?php 

	$server = 'localhost';
	$username = 'root';
	$password= '';
	$database= 'sportsonline';
	$conexion=mysqli_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($conexion,$database)or die("la base de datos no existe");
	try {
		$conn= new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
		die('Connection failed: '.$e->getMessage());
	}
 ?>