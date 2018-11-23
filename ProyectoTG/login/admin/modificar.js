$(document).ready(function(){
	$(".eliminar").click(function(){
		var imagen=$(this).parent('td').parent('tr').find('.imagen').val();
		$(this).parent('td').parent('tr').remove();
		$.post('./ejecuta.php',{
			Caso:'Eliminar',
			Id:$(this).attr('data-id'),
			Imagen:imagen
		},function(e){
			alert(e);
		});
		
	});
	$(".modificar").click(function(){
		var usuario=$(this).parent('td').parent('tr').find('.usuario').val();
		var edad=$(this).parent('td').parent('tr').find('.edad').val();
		var fecha=$(this).parent('td').parent('tr').find('.fecha').val();
		var correo=$(this).parent('td').parent('tr').find('.correo').val();
		$.post('./ejecuta.php',{
			Caso:'Modificar',
			Id:$(this).attr('data-id'),
			Usuario:usuario,
			Edad:edad,
			Fecha:fecha,
			Correo:correo
		},function(e){
			alert(e);
		});
	});
});