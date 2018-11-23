<?php
session_start();
include "../conexion.php";
		$arreglo=$_SESSION['carrito'];
		$numeroventa=0;
		$consulta="select * from compras order by numeroventa DESC limit 1";	
		$query=mysqli_query($conexion,$consulta);
		while($f=mysqli_fetch_array($query)){
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			$conexion->query("insert into compras (numeroventa, imagen,nombre,precio,cantidad,subtotal) values(
				".$numeroventa.",
				'".$arreglo[$i]['Imagen']."',
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}
		unset($_SESSION['carrito']);
		header("Location: ../admin.php");

?>